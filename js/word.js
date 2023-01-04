 tinymce.init({
    selector: '.tinymce',
    height: 800,
    width: '100%',
    verify_html: false,
    theme: 'silver',
    plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen table',
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help | tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
    image_advtab: true,
    file_picker_callback: function(callback, value, meta) {
    if (meta.filetype == 'image') {
    $('#upload').trigger('click');
    $('#upload').on('change', function() {
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
    callback(e.target.result, {
    alt: ''
});
};
    reader.readAsDataURL(file);
});
}
},
    templates: [{
    title: 'Test template 1',
    content: 'Test 1'
},
{
    title: 'Test template 2',
    content: 'Test 2'
}
    ],
    content_css: []
});
