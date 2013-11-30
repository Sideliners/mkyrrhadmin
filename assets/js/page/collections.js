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

			post_url = site_url + "collection/update_status";
			redirect_url = site_url + 'collection/' + id;			
			
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
	
	$('body').on('click', '#edit-collection-name #save_collection_name', function(event){
		$('#edit-collection-name #save-msg').html('<i class="icon-spinner icon-spin"></i> updating collection\'s name...');
		
		if($('#edit-collection-name #collection_name').val() == ''){
			$('#edit-collection-name #save-msg').html('<span class="label label-lg label-danger arrowed-right">Enter collection\'s name</span>');
			$('#edit-collection-name #collection_name').focus();
		}
		else{
			$.post(site_url + 'collection/update', {
				id : $(this).attr('data-collection'),
				name : $('#edit-collection-name #collection_name').val()
			}, function(data){
				if(data.status == 1){
					$('#edit-collection-name #save-msg').html('<span class="label label-lg label-success arrowed-right">'+ data.response +'</span>');
					$('div#collection_name').html($('#edit-collection-name #collection_name').val());
				}
				else if(data.status == 2){
					alert(data.response);
					window.location = document.URL;
				}
				else{
					$('#edit-collection-name #save-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>');
				}
			}, 'json');
		}
	});
	
	$('body').on('click', '#delete-collection #btn_del_collection', function(event){
		/* delete artisan */
		
		$('#delete-collection #delete-msg').html('<i class="icon-spinner icon-spin"></i> deleting collection...');
		
		if(!$('#delete-collection #btn_del_collection').attr('data-collection-id')) {
			alert('Hacker Detected!');
		}
		
		collection_id=$('#delete-collection #btn_del_collection').attr('data-collection-id');				
		if(isNaN(collection_id)) {
			alert('Hacker Detected!');
		}
		
		$.post(site_url + 'collection/delete', {
			collection_id : collection_id
		}, function(data){			
			if(data.status == 1){
				$('#delete-collection #delete-msg').html('<span class="label label-lg label-success arrowed-right">'+ data.response +'</span>');
				
				$('#delete-collection .modal-footer #modal-buttons .btn').hide();
                $('#delete-collection .modal-footer #modal-buttons #close_btn').show();
				
				$('#delete-collection').on('hidden', function() {
					window.location = site_url + 'collection/listings';
				});
			}
			else if(data.status == 2){
				$('#delete-collection #delete-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>');  				
			}
			else{
				$('#delete-collection #delete-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>'); 
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
            show_modal('confirm-modal', 'Deleting collection...', 'Are you sure to delete '+ item_name +'?', item_id, 'delete', stats);
        }
    });

    $('.update-collection-status').on('click', function(){
        var item_id = $(this).attr('data-item');
        var item_name = $(this).attr('data-name');
        var stats = $(this).attr('data-action');

        if(isNaN(item_id) && isNaN(stats)){
            alert('Invalid Parameters');
            return false;
        }
        else{
            show_modal('confirm-modal', 'Unpublishing collection...', 'Are you sure to unpublish '+ item_name +'?', item_id, 'update_status', stats);
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
            $('#confirm-modal .modal-body .modal-message').html('<i class="icon-refresh icon-spin"></i> Updating collection status...');
            $('#confirm-modal .modal-footer #modal-buttons .btn').attr('disabled', 'disabled');

            $.post(site_url +'collection/'+ $(this).attr('action'), {
                collection_id : item_id,
				status : stats
            }, function(data){
                if(data.status == 1){
                    $('#confirm-modal .modal-body .modal-message').html('<p class="alert alert-success"><i class="icon-info"></i> '+ data.response +'</p>');
					$('#confirm-modal').on('hidden', function() {
						window.location = site_url + 'collection/listings';
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
	
	$('#edit-collection-name, #alert-modal #confirm-modal').on('hidden', function(){ window.location = document.URL; });		
});
