tinymce.init({
	mode: "exact",
    elements : 'page_body',
    height : '300px',
    //selector : String(textarea_id),
    //selector : 'textarea',
    plugins  : 'image, lists, textcolor, link, table, media',
    menubar  : false,
    image_advtab : true,
    toolbar  : 'styleselect | fontsizeselect | bold italic | bullist numlist | outdent indent | forecolor backcolor | link unlink | table image media removeformat',
});

$(function(){
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

			post_url = site_url + "page/update_status";
			redirect_url = site_url + 'page/details/' + id;
			
			$.post( post_url , {
				page_id : id,
				status : stats
			}, function(data){
				$('#status-modal').modal('hide');
				$("#alert-modal").modal('show');				
				if(data.status == 1){
					$("#alert-modal .modal-body h5 span").html(data.response);
					$('#alert-modal').on('hidden', function() {
						window.location = redirect_url;
					});
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
	
	$('body').on('click', '#edit-page-name #save_page_name', function(event){
		$('#edit-page-name #save-msg').html('<i class="icon-spinner icon-spin"></i> updating page\'s name...');
		
		if($('#edit-page-name #page_name').val() == ''){
			$('#edit-page-name #save-msg').html('<span class="label label-lg label-danger arrowed-right">Enter page\'s name</span>');
			$('#edit-page-name #page_name').focus();
		}
		else{
			$.post(site_url + 'page/update', {
				id : $(this).attr('data-page'),
				name : $('#edit-page-name #page_name').val()
			}, function(data){				
				if(data.status == 1){
					$('#edit-page-name #save-msg').html('<span class="label label-lg label-success arrowed-right">'+ data.response +'</span>');
					$('div#page_name').html($('#edit-page-name #page_name').val());
				}
				else if(data.status == 2){
					alert(data.response);
					window.location = document.URL;
				}
				else{
					$('#edit-page-name #save-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>');
				}
			}, 'json');
		}
	});
	
	$('body').on('click', '#edit-page-description #save_page_description', function(event){
		$('#edit-page-description #save-msg').html('<i class="icon-spinner icon-spin"></i> updating page\'s description...');
		
		if($('#edit-page-description #page_description').val() == ''){
			$('#edit-page-description #save-msg').html('<span class="label label-lg label-danger arrowed-right">Enter page\'s description</span>');
			$('#edit-page-description #page_description').focus();
		}
		else{
			$.post(site_url + 'page/update', {
				id : $(this).attr('data-page'),
				description : $('#edit-page-description #page_description').val()
			}, function(data){				
				if(data.status == 1){
					$('#edit-page-description #save-msg').html('<span class="label label-lg label-success arrowed-right">'+ data.response +'</span>');
					$('div#page_description').html($('#edit-page-description #page_description').val());
				}
				else if(data.status == 2){
					alert(data.response);
					window.location = document.URL;
				}
				else{
					$('#edit-page-description #save-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>');
				}
			}, 'json');
		}
	});
	
	$('body').on('click', '#edit-page-body #save_page_body', function(event){
		$('#edit-page-body #save-msg').html('<i class="icon-spinner icon-spin"></i> updating page\'s body...');
		
		if($('#edit-page-body #page_body').val() == ''){
			$('#edit-page-body #save-msg').html('<span class="label label-lg label-danger arrowed-right">Enter page\'s body</span>');
			$('#edit-page-body #page_body').focus();
		}
		else{			
			$.post(site_url + 'page/update', {
				id : $(this).attr('data-page'),
				page_body : $('#edit-page-body #page_body').val()
			}, function(data){
				
				if(data.status == 1){
					$('#edit-page-body #save-msg').html('<span class="label label-lg label-success arrowed-right">'+ data.response +'</span>');
					$('div#page_body').html($('#edit-page-body #page_body').val());
				}
				else if(data.status == 2){
					alert(data.response);
					window.location = document.URL;
				}
				else{
					$('#edit-page-body #save-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>');
				}
			}, 'json');
		}
	});
	
	$('body').on('click', '#delete-page #btn_del_page', function(event){
		/* delete artisan */
		
		$('#delete-page #delete-msg').html('<i class="icon-spinner icon-spin"></i> deleting page...');
		
		if(!$('#delete-page #btn_del_page').attr('data-page-id')) {
			alert('Hacker Detected!');
		}
		
		page_id=$('#delete-page #btn_del_page').attr('data-page-id');				
		if(isNaN(page_id)) {
			alert('Hacker Detected!');
		}
		
		$.post(site_url + 'page/delete', {
			page_id : page_id
		}, function(data){			
			if(data.status == 1){
				$('#delete-page #delete-msg').html('<span class="label label-lg label-success arrowed-right">'+ data.response +'</span>');
				
				$('#delete-page .modal-footer #modal-buttons .btn').hide();
                $('#delete-page .modal-footer #modal-buttons #close_btn').show();
				
				$('#delete-page').on('hidden', function() {
					window.location = site_url + 'page/listings';
				});
			}
			else if(data.status == 2){
				$('#delete-page #delete-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>');  				
			}
			else{
				$('#delete-page #delete-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>'); 
			}
		}, 'json');
	});
	
	$('.delete-item').on('click', function(){		
        var item_id = $(this).attr('data-item');
        var item_name = $(this).attr('data-name');
        var stats = $(this).attr('data-action');

        if(isNaN(item_id) && isNaN(stats)){
            alert('Invalid Parameters');
            return false;
        }
        else{
            show_modal('confirm-modal', 'Deleting page...', 'Are you sure to delete '+ item_name +'?', item_id, 'delete', stats);
        }
    });

    $('.update-page-status').on('click', function(){
        var item_id = $(this).attr('data-item');
        var item_name = $(this).attr('data-name');
        var stats = $(this).attr('data-action');
		
        if(isNaN(item_id) && isNaN(stats)){
            alert('Invalid Parameters');
            return false;
        }
        else{
			
            show_modal('confirm-modal', 'Unpublishing page...', 'Are you sure to unpublish '+ item_name +'?', item_id, 'update_status', stats);
        }
    });

    $('body').on('click', '#confirm-modal #yes_btn', function(event){
        var item_id = $(this).attr('data-item');
        var stats = $(this).attr('data-action');		

        if(isNaN(item_id) && isNaN(stats)){
            alert('Invalid Parameters');
            return false;
        }
        else{
            $('#confirm-modal .modal-body .modal-message').html('<i class="icon-refresh icon-spin"></i> Updating page status...');
            $('#confirm-modal .modal-footer #modal-buttons .btn').attr('disabled', 'disabled');

            $.post(site_url +'page/'+ $(this).attr('action'), {
                page_id : item_id,
				status : stats
            }, function(data){
                if(data.status == 1){
                    $('#confirm-modal .modal-body .modal-message').html('<p class="alert alert-success"><i class="icon-info"></i> '+ data.response +'</p>');
					$('#confirm-modal').on('hidden', function() {
						window.location = site_url + 'page/listings';
					});
                }
                else if(data.status == 2){
                    alert(data.response);
                    window.location = site_url;
                }
                else{
                    $('#confirm-modal .modal-body .modal-message').html('<p class="alert alert-error"><i class="icon-exclamation-sign"></i> '+ data.response +'</p>');
                }

                $('#confirm-modal .modal-footer #modal-buttons .btn').removeAttr('disabled');
                $('#confirm-modal .modal-footer #modal-buttons .btn').hide();
                $('#confirm-modal .modal-footer #modal-buttons #close_btn').show();
            }, 'json');
        }		
    });
	
	$('#edit-page-name, #alert-modal, #confirm-modal, #edit-page-description, #edit-page-body').on('hidden', function(){ window.location.reload(); });		
});
