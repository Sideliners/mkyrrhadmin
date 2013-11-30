$(function(){
    $('a.delete-item').on('click', function(){
        var item_id = $(this).attr('data-item');
        var item_name = $(this).attr('data-name');
        var stats = $(this).attr('data-action');

        if(isNaN(item_id) && isNaN(stats)){
            alert('Invalid Parameters');
            return false;
        }
        else{
            show_modal('prodConfirmModal', 'Deleting product...', 'Are you sure to delete '+ item_name +'?', item_id, 'delete', stats);
        }
    });

    $('a.update-product-status').on('click', function(){
        var item_id = $(this).attr('data-item');
        var item_name = $(this).attr('data-name');
        var stats = $(this).attr('data-action');

        if(isNaN(item_id) && isNaN(stats)){
            alert('Invalid Parameters');
            return false;
        }
        else{
            show_modal('prodConfirmModal', 'Unpublishing product...', 'Are you sure to unpublish '+ item_name +'?', item_id, 'update_status', stats);
        }
    });

    $('body').on('click', '#prodConfirmModal #yes_btn', function(event){
        var item_id = $(this).attr('data-item');
        var stats = $(this).attr('data-action');

        if(isNaN(item_id) && isNaN(stats)){
            alert('Invalid Parameters');
            return false;
        }
        else{
            $('#prodConfirmModal .modal-body .modal-message').html('<i class="icon-refresh icon-spin"></i> Updating product status...');
            $('#prodConfirmModal .modal-footer #modal-buttons .btn').attr('disabled', 'disabled');

            $.post(site_url +'product/'+ $(this).attr('action'), {
                id : item_id,
                status : stats 
            }, function(data){
                if(data.status == 1){
                    $('#prodConfirmModal .modal-body .modal-message').html('<p class="alert alert-success"><i class="icon-info"></i> '+ data.response +'</p>');
					$('#prodConfirmModal').on('hidden', function() {
						window.location = site_url + 'product/lists';
					});
                }
                else if(data.status == 2){
                    alert(data.response);
                    window.location = site_url;
                }
                else{
                    $('#prodConfirmModal .modal-body .modal-message').html('<p class="alert alert-error"><i class="icon-exclamation-sign"></i> '+ data.response +'</p>');
                }

                $('#prodConfirmModal .modal-footer #modal-buttons .btn').removeAttr('disabled');
                $('#prodConfirmModal .modal-footer #modal-buttons .btn').hide();
                $('#prodConfirmModal .modal-footer #modal-buttons #close_btn').show();
            }, 'json');
        }
    });

    $('#prodConfirmModal').on('hidden', function(){ window.location.reload(); });
});
