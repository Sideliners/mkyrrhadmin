$(function(){
	$('.single').ace_file_input({
		no_file:'No File ...',
		btn_choose:'Choose',
		btn_change:'Change',
		droppable:false,
		onchange:null,
		thumbnail:false //| true | large
		//whitelist:'gif|png|jpg|jpeg'
		//blacklist:'exe|php'
		//onchange:''
		//
	});
	
    $(".chosen-select").chosen();

    $('textarea.limited').inputlimiter({
        remText: '%n character%s remaining...',
        limitText: 'max allowed : %n.'
    });

    $(".product_image").ace_file_input({
        style : 'well',
        no_file: 'No file...',
        btn_choose: 'Choose image',
        //btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: true,
		no_icon : 'icon-cloud-upload',
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

    $('#is_highlight').on('change', function(){
        var hl = $(this).val();

        if($(this).is(':checked')){
            $('#prod_hl').modal('show');
        }
        else{
            $('#alert-modal .modal-body p').html('You cannot set this off');
            $('#alert-modal').modal('show');
        }
    });

    $('#prod_hl, #alert-modal').on('hidden', function(){
        window.location = document.URL;
    });

    $('body').on('click', '#prod_hl #hl_product', function(event){
        var prod_id = $(this).attr('data-product-id');

        if(isNaN(prod_id) || prod_id == ''){
            alert('uh-oh! Hacker alert!');
            window.location = '/users/logout'
        }
        else{
            $('#prod_hl #save-msg').html('<i class="icon-refresh icon-spin"></i> Updating...');

            $.post(site_url + 'product/set_highlight', {
                pid : prod_id,
                hl : $(this).attr('data-status')
            }, function(data){
                if(data.status > 0){
                    $('#prod_hl #save-msg').html('<span class="label label-success arrowed-in">' + data.response + '</span>');
                    $('#prod_hl #action-btns').html('<button type="button" class="btn btn-mini btn-success" data-dismiss="modal" aria-hidden="true">OK</button>');
                }
                else{
                    $('#prod_hl #save-msg').html('<span class="label label-danger arrowed-in">' + data.response + '</span>');
                }
            }, 'json');
        }
    });
		
	$('body').on('click', '#delete-product #btn_del_product', function(event){
		/* delete product */
		
		$('#delete-product #delete-msg').html('<i class="icon-spinner icon-spin"></i> deleting product...');
		
		if(!$('#delete-product #btn_del_product').attr('data-product-id')) {
			 window.location.reload();
		}
		
		product_id=$('#delete-product #btn_del_product').attr('data-product-id');				
		if(isNaN(product_id)) {
			window.location.reload();
		}
		
		$.post(site_url + 'product/delete', {
			product_id : product_id
		}, function(data){
			if(data.status == 1){
				$('#delete-product #delete-msg').html('<span class="label label-lg label-success arrowed-right">'+ data.response +'</span>');
				$('#delete-product').on('hidden', function() {
					window.location = site_url + 'product/lists';
				});
			}
			else if(data.status == 2){
				$('#delete-product #delete-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>');  
				window.location = document.URL;
			}
			else{
				$('#delete-product #delete-msg').html('<span class="label label-lg label-danger arrowed-right">'+ data.response +'</span>'); 
			}
		}, 'json');
	});	

	$('#update_prod_name #save_prodname').on('click', function(){
		var pid = $(this).attr('data-product-id');
		var product_name = $('#update_prod_name #prod_name');
		
		if(product_name.val() == ''){
			$('#update_prod_name #save-msg').html('<span class="label label-danger arrowed-in">Invalid product name</span>');
			product_name.focus();
		}		
		else{
			$('#update_prod_name #save-msg').html('<i class="icon-spinner icon-spin"></i> saving product name...');			
			$(this).attr('disabled', 'disabled');
			
			$.post(site_url + 'product/update_name', {
				product_name : product_name.val(),
				product_id : pid
			}, function(data){
				if(data.status == 1){
					$('#update_prod_name #save-msg').html('<span class="label label-success arrowed-in">'+ data.response +'</span>');
					$('#update_prod_name #save_prodname').removeAttr('disabled');
					
				  	window.location = site_url + 'product/' + pid;
				}
				else if(data.status == 2){
					alert(data.response);
					window.location.reload();
				}
				else if(data.status == 3){
					$('#update_prod_name #save-msg').html('<span class="label label-info arrowed-in">'+ data.response +'</span>');
					$('#update_prod_name #save_prodname').removeAttr('disabled');
				}
				else{
					$('#update_prod_name #save-msg').html('<span class="label label-danger arrowed-in">'+ data.response +'</span>');
					$('#update_prod_name #save_prodname').removeAttr('disabled');
				}
			}, 'json');
		}
	});
	
	$('#edit_prod_desc #save_desc').on('click', function(){
		//var desc = tinyMCE.activeEditor.getContent();
		var desc = $('#edit_prod_desc #prod_desc').val();
		
		if(desc == ''){
			$('#edit_prod_desc #save-msg').html('<span class="label label-danger arrowed-in">Product must have description</span>');
			//tinyMCE.execCommand('mceFocus', false, 'prod_desc');
			$('#edit_prod_desc #prod_desc').focus();
		}
		else{
			$('#edit_prod_desc #save-msg').html('<i class="icon-spinner icon-spin"></i> saving product description...');
			$(this).attr('disabled', 'disabled');
			
			$.post(site_url + 'product/update_desc', {
				description : desc,
				product_id : $(this).attr('data-product-id')
			}, function(data){
				if(data.status == 1){
					$('#edit_prod_desc #save-msg').html('<span class="label label-success arrowed-in">'+ data.response +'</span>');
					$('#edit_prod_desc #save_desc').removeAttr('disabled');
					
					$('div#prod_description').html(desc);
				}
				else if(data.status == 2){
					alert(data.response);
					window.location.reload();
				}
				else if(data.status == 3){
					$('#edit_prod_desc #save-msg').html('<span class="label label-info arrowed-in">'+ data.response +'</span>');
				}
				else{
					$('#edit_prod_desc #save-msg').html('<span class="label label-danger arrowed-in">'+ data.response +'</span>');
				}
			}, 'json');
		}
	});
	
	$('#update_details_modal #update_details').on('click', function(){
		var pid = $(this).attr('data-product-id');
		var price = $('#update_details_modal #prod_price');
		var weight = $('#update_details_modal #prod_weight');
		var height = $('#update_details_modal #prod_height');
		var stock = $('#update_details_modal #prod_stock');
		
		if(isNaN(price.val()) || price.val() == ''){
			$('#update_details_modal #save-msg').html('<span class="label label-danger arrowed-in">Invalid price value</span>');
			price.focus();
		}
		else if(isNaN(weight.val()) || weight.val() == ''){
			$('#update_details_modal #save-msg').html('<span class="label label-danger arrowed-in">Invalid weight value</span>');
			weight.focus();
		}
		else if(isNaN(height.val()) || height.val() == ''){
			$('#update_details_modal #save-msg').html('<span class="label label-danger arrowed-in">Invalid height value</span>');
			height.focus();
		}
		else if(isNaN(stock.val()) || stock.val() == ''){
			$('#update_details_modal #save-msg').html('<span class="label label-danger arrowed-in">Invalid stock value</span>');
			stock.focus();
		}
		else{
			$('#update_details_modal #save-msg').html('<i class="icon-spinner icon-spin"></i> saving product details...');
			
			$.post(site_url + 'product/update_details', {
				price : price.val(),
				weight : weight.val(),
				height : height.val(),
				stock : stock.val(),
				pid : pid
			}, function(data){
				if(data.status == 1){
					$('#update_details_modal #save-msg').html('<span class="label label-success arrowed-in">'+ data.response +'</span>');
					$('#update_details_modal #save_desc').removeAttr('disabled');
					
				  	window.location = document.URL;
				}
				else if(data.status == 2){
					alert(data.response);
					window.location.reload();
				}
				else if(data.status == 3){
					$('#update_details_modal #save-msg').html('<span class="label label-info arrowed-in">'+ data.response +'</span>');
					$('#update_details_modal #save_desc').removeAttr('disabled');
				}
				else{
					$('#update_details_modal #save-msg').html('<span class="label label-danger arrowed-in">'+ data.response +'</span>');
					$('#update_details_modal #save_desc').removeAttr('disabled');
				}
			}, 'json');
		}
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
			
			post_url = site_url + "product/update_status";
			redirect_url = site_url + 'product/' + id;
			
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
	
	$('#update_prod_name, #edit_prod_desc, #upload_prod_image, #alert-modal, #add-product-modal').on('hidden', function(){ window.location = document.URL; });
});
