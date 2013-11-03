$(function(){
	$(".chosen-select").chosen();
	
	$('textarea.limited').inputlimiter({
        remText: '%n character%s remaining...',
        limitText: 'max allowed : %n.'
    });
	
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
	
	$('body').on('click', '#edit-enterprise-name #save_enterprise_name', function(event){
		$('#edit-enterprise-name #save-msg').html('<i class="icon-spinner icon-spin"></i> updating enterprise\'s name...');
		
		if($('#edit-enterprise-name #enterprise_name').val() == ''){
			$('#edit-enterprise-name #save-msg').html('<span class="label label-lg label-danger arrowed-right">Enter enterprise\'s name</span>');
			$('#edit-enterprise-name #enterprise_name').focus();
		}
		else{
			$.post(site_url + 'enterprise/update', {
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
			$.post(site_url + 'enterprise/update', {
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
		
		$('#delete-enterprise #delete-msg').html('<i class="icon-spinner icon-spin"></i> Deleting enterprise...');
		
		if(!$('#delete-enterprise #btn_del_enterprise').attr('data-enterprise-id')) {
			 window.location.reload();
		}
		
		enterprise_id=$('#delete-enterprise #btn_del_enterprise').attr('data-enterprise-id');				
		if(isNaN(enterprise_id)) {
			window.location.reload();
		}
		
		$.post(site_url + 'enterprise/delete', {
			enterprise_id : enterprise_id
		}, function(data){
			if(data.status == 1){
				$('#delete-enterprise #delete-msg').html('<span class="label label-lg label-success arrowed-right">'+ data.response +'</span>');
				
				$('#delete-enterprise .modal-footer #modal-buttons .btn').hide();
                $('#delete-enterprise .modal-footer #modal-buttons #close_btn').show();
				
				$('#delete-enterprise').on('hidden', function() {
					window.location = site_url + 'enterprise/listings';
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
	
	$('.status-button').on('click', function(){
		var stats = $(this).attr('data-status');
		var id = $(this).attr('data-status-id');
		var type = $(this).attr('data-status-type');
				
		if ( stats == 0 ) {
			stats_label = "Unpublish";
		}
		else if (stats == 1) {
			stats_label = "Publish";
		}
				
		$('#status-modal #myModalLabel').html( stats_label + " this " + type + "?");
		$('#status-modal #update-status-type').html( type );
		$('#status-modal #btn-status-yes').attr('data-status', stats);
		$('#status-modal #btn-status-yes').attr('data-status-id', id);
		$('#status-modal #btn-status-yes').attr('data-status-type', type);
		$('#status-modal').modal('show');
	});
	
	$('#status-modal #btn-status-yes').on('click', function(){
		var stats = $(this).attr('data-status');
		var id = $(this).attr('data-status-id');
		var type = $(this).attr('data-status-type');
	
		if(isNaN(stats) && isNaN(id) && type == ''){
			alert('Hacker Detected!');
			// logout
		}
		else{			
			$('#status-modal #label-msg').html('<i class="icon-spinner icon-spin"></i> Updating status...');
			
			post_url = site_url + "enterprise/update_status";
			redirect_url = site_url + 'enterprise/details/' + id;
			
			$.post( post_url , {
				id : id,
				status : stats
			}, function(data){
				$('#status-modal').modal('hide');
				$("#alert-modal").modal('show');
				
				if(data.status == 1){
					$("#alert-modal .modal-body h5 span").html(data.response);
				}
				else if (data.status == 2){
					alert(data.response);
				}
				else {
					// an error occured					
					$("#alert-modal").on('hidden', function(){						
						$("#alert-modal").modal('hide');
					});
				}
			}, 'json');
		}
	});
	
	$('#edit-enterprise-desc, #edit-enterprise-name, #delete-enterprise, #alert-modal').on('hidden', function(){ window.location = document.URL; });
});