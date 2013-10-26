//var resizeHeight = parseInt($('body').height() - 128);
//tinymce.DOM.setStyle(tinyMCE.DOM.get("article_body" + '_ifr'), 'height', resizeHeight + 'px');

tinymce.init({
	mode: "exact",
    elements : 'article_body',
    height : '300px',
    //selector : String(textarea_id),
    //selector : 'textarea',
    plugins  : 'image, lists, textcolor, link, table, media',
    menubar  : false,
    image_advtab : true,
    toolbar  : 'styleselect | fontsizeselect | bold italic | bullist numlist | outdent indent | forecolor backcolor | link unlink | table image media removeformat',
});

$(function(){
    $(".chosen-select").chosen();

    $("#article_image").ace_file_input({
        style : 'well',
        no_file: 'No file...',
        btn_choose: 'Choose image',
        //btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: true,
        preview_error : function(filename, error_code) {
            //name of the file that failed
            //error_code values
            //1 = 'FILE_LOAD_FAILED',
            //2 = 'IMAGE_LOAD_FAILED',
            //3 = 'THUMBNAIL_FAILED'
            alert(error_code);
        },
        whitelist:'gif|png|jpg|jpeg',
        blacklist:'exe|php|zip'
    })/*.on('change', function(){
        alert('image');
    });*/
    
    $("#article_image_update").ace_file_input({
        style : 'well',
        no_file: 'No file...',
        btn_choose: 'Change image',
        //btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: true,
        preview_error : function(filename, error_code) {
            //name of the file that failed
            //error_code values
            //1 = 'FILE_LOAD_FAILED',
            //2 = 'IMAGE_LOAD_FAILED',
            //3 = 'THUMBNAIL_FAILED'
            alert(error_code);
        },
        whitelist:'gif|png|jpg|jpeg',
        blacklist:'exe|php|zip'
    })/*.on('change', function(){
        alert('image');
    });*/

    $('#articles').on('submit', function(){
        var action = $('#batch_actions');
        var items = $('.articles-item:checked').length;

        if(action.val() == '' || isNaN(action.val())){
            action.tooltip({
                placement : 'bottom',
                title : 'Select an action!'
            }).tooltip('show');

            return false;
        }
        else{
            if(items == 0){
                $('div#article-list').tooltip({
                    placement : 'top',
                    title : 'Select an article(s) to update'
                }).tooltip('show');

                return false;
            }
            else{
                return true;
            }
        }
    });
});
