function page() {
    var i = 0;
    $('tbody tr').each(function () {
        $(this).find('td:eq(1)').text(++i);
    })
}
$('.add_news').on('click', function(){
    var mycontent = tinymce.get("myTextarea").getContent();
    var formData = new FormData($('#add_news')[0]);
    formData.append('mycontent', mycontent);
    $.ajax({
        type: "POST",
        url: "/add_news",
        data: formData,
        cache:false,
        processData:false,
        contentType:false,
        success:function (response){
            if (response.message == 'success') {
                $('input[name=header]').val('');
                $('input[name=image_]').val('');
                tinymce.get("myTextarea").setContent('');
                toastr.success('Xəbər əlavə edildi');
            }
        },
        error: function (request, error, response) {
            toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
        }
    });
});

$('.edit_news').on('click', function(){
    var id = $(this).attr('name');
    var mycontent = tinymce.get("myTextarea").getContent();
    var formData = new FormData($('#edit_news')[0]);
    formData.append('mycontent', mycontent);
    formData.append('id', id);
    $.ajax({
        type: "POST",
        url: "/edit_news",
        data: formData,
        cache:false,
        processData:false,
        contentType:false,
        success:function (response){
            if (response.message == 'success') {
                toastr.success('Xəbər məlumatları yeniləndi');
                if (response.image != 1){
                    $('.header_pic').attr('src','/images/'+response.image);
                }
                console.log(response.picture)
            }
        },
        error: function (request, error, response) {
            toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
        }
    });
});

$('.delete_news').on('click', function (){
    var id = $(this).attr('name');
    $('#myConfirm').find('.delete_new').attr('name',id);
});

$('.delete_new').on('click', function(){
    var id =$(this).attr('name');
    var tr = $('#'+id+'');
    $.ajax({
        type: "POST",
        url: "/delete_news",
        data: { 'id':id, "_token": csrf_token},
        success: function (response) {
            tr.remove();
            page();
            $('#myConfirm').modal('hide');
            toastr.success('Xəbər silindi');
        },
        error: function (request, error, response) {
            toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
        }
    });
});
