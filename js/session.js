$('.add_session').on('click', function (){
    var brand = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "/session",
        data: {
            'brand':brand, "_token": csrf_token
        },
        success:function(response)
        {
            if(response.message == 'success')
            {
                location.replace('/');
            }
        }
    })
});

$('.forget_session').on('click', function (){
    $.ajax({
        type: "POST",
        url: "/forget_session",
        data: {
            "_token": csrf_token
        },
        success:function(response)
        {
            if(response.message == 'success')
            {
                location.replace('/');
            }
        }
    })
});
