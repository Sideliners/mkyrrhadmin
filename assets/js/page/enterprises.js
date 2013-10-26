$(function(){
    $("#enterprise_image").ace_file_input({
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
    });/*.on('change', function(){
        alert('image');
    });*/	
	
	$('#edit-enterprise-desc, #edit-enterprise-name, #delete-enterprise').on('hidden', function(){ window.location = document.URL; });
	
	$('body').on('click', '#edit-enterprise-name #save_enterprise_name', function(event){
		$('#edit-enterprise-name #save-msg').html('<i class="icon-spinner icon-spin"></i> updating enterprise\'s name...');
		
		if($('#edit-enterprise-name #enterprise_name').val() == ''){
			$('#edit-enterprise-name #save-msg').html('<span class="label label-lg label-danger arrowed-right">Enter enterprise\'s name</span>');
			$('#edit-enterprise-name #enterprise_name').focus();
		}
		else{
			$.post(site_url + 'enterprises/update', {
				enterprise_id : $(this).attr('data-enterprise-id'),
				name : $('#edit-enterprise-name #enterprise_name').val()
			}, function(data){
				if(data.status == 1){
					$('#edit-enterprise-name #save-msg').html('<span class="label label-lg label-success arrowed-right">'+ data.response +'</span>');
					$('div#enterprise_name').html($('#edit-enterprise-name #enterprise_name').val());
				}
				else if(data.status == 2){
					alert(data.response);
					window.location = document.URL;
				}
				else{
					$('#edit-enterprise-name #save-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>');
				}
			}, 'json');
		}
	});
	
	$('body').on('click', '#edit-enterprise-description #save_enterprise_description', function(event){
		$('#edit-enterprise-description #save-msg').html('<i class="icon-spinner icon-spin"></i> updating enterprise\'s description...');
		
		if($('#edit-enterprise-description #enterprise_description').val() == ''){
			$('#edit-enterprise-description #save-msg').html('<span class="label label-lg label-danger arrowed-right">Enter enterprise\'s description</span>');
			$('#edit-enterprise-description #enterprise_description').focus();
		}
		else{
			$.post(site_url + 'enterprises/update', {
				enterprise_id : $(this).attr('data-enterprise-id'),
				description : $('#edit-enterprise-description #enterprise_description').val()
			}, function(data){
				if(data.status == 1){
					$('#edit-enterprise-description #save-msg').html('<span class="label label-lg label-success arrowed-right">'+ data.response +'</span>');
					$('div#enterprise_description').html($('#edit-enterprise-description #enterprise_description').val());
				}
				else if(data.status == 2){
					alert(data.response);
					window.location = document.URL;
				}
				else{
					$('#edit-enterprise-description #save-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>');
				}
			}, 'json');
		}
	});
	
	$('body').on('click', '#delete-enterprise #btn_del_enterprise', function(event){
		/* delete artisan */
		
		$('#delete-enterprise #delete-msg').html('<i class="icon-spinner icon-spin"></i> deleting enterprise...');
		
		if(!$('#delete-enterprise #btn_del_enterprise').attr('data-enterprise-id')) {
			 window.location.reload();
		}
		
		enterprise_id=$('#delete-enterprise #btn_del_enterprise').attr('data-enterprise-id');				
		if(isNaN(enterprise_id)) {
			window.location.reload();
		}
		
		$.post(site_url + 'enterprises/delete', {
			enterprise_id : enterprise_id
		}, function(data){
			if(data.status == 1){
				$('#delete-enterprise #delete-msg').html('<span class="label label-lg label-success arrowed-right">'+ data.response +'</span>');
				$('#delete-enterprise').on('hidden', function() {
					window.location = site_url + 'enterprises/listings';
				});
			}
			else if(data.status == 2){
				$('#delete-enterprise #delete-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>');  
				window.location = document.URL;
			}
			else{
				$('#delete-enterprise #delete-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>'); 
			}
		}, 'json');
	});	
});