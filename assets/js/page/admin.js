var checked = false;
function checkAll(form){
	var the_form = document.getElementById(form);
	
    if (checked == false){
        checked = true;
    }
    else{
        checked = false;
    }
    
    for (var i =0; i < the_form.elements.length; i++){
        the_form.elements[i].checked = checked;
    }
}

function add_category(prod_id){
	$('#add_category_modal').modal('show');
	$('#add_category_modal #progress').html('<center><i class="icon-spinner icon-spin icon-3x"></i><br />Loading data...</center>');
	
	$.post(site_url + 'product/get_category', {
		pid : prod_id
	}, function(data){
		if(data.status == 1){
			$('#add_category_modal #progress').html(data.response);
			$('#add_category_modal #update_cat').attr('data-product-id', prod_id);
		}
		else if(data.status == 2){
			alert(data.response);
			window.location.reload();
		}
		else{
			$('#add_category_modal #progress').html('<p class="alert alert-error">'+ data.response +'</p>');
		}
	}, 'json');
}

function update_artisan(prod_id){
	$('#update_artisan_modal').modal('show');
	$('#update_artisan_modal #progress').html('<center><i class="icon-spinner icon-spin icon-3x"></i><br />Loading data...</center>');
	$('#update_artisan_modal #update_artisan').attr('data-product-id', prod_id);
	$('#update_artisan_modal #prod_price').focus();
}

$(function(){
	$('#add_category_modal #update_cat').on('click', function(){
		var pid = $(this).attr('data-product-id');
		var categories = $('#category_name').val();
		
		if(categories != null){
			$('#add_category_modal #save-msg').html('<i class="icon-spinner icon-spin"></i> saving product category...');
			$(this).attr('disabled', 'disabled');
			
			$.post(site_url + 'product/update_category', {
				cat : categories,
				pid : pid
			}, function(data){
				if(data.status == 1){
					$('#add_category_modal #save-msg').html('<span class="label label-success arrowed-in">'+ data.response +'</span>');
					$('#add_category_modal #save_desc').removeAttr('disabled');
					
				   	window.location = site_url + 'product/' + pid;
				}
				else if(data.status == 2){
					alert(data.response);
					window.location.reload();
				}
				else{
					$('#add_category_modal #save-msg').html('<span class="label label-danger arrowed-in">'+ data.response +'</span>');
				}
			}, 'json');
		}
		else{
			$('#add_category_modal #save-msg').html('<span class="label label-danger arrowed-in">Select category for this product</span>');
		}
	});
	
	$('#update_artisan_modal #update_artisan').on('click', function(){
		var pid = $(this).attr('data-product-id');
		var artisan = $('#update_artisan_modal #prod_artisan').val();
		
		if(artisan != ""){
			$('#update_artisan_modal #save-msg').html('<i class="icon-spinner icon-spin"></i> saving product category...');
			$(this).attr('disabled', 'disabled');
			
			$.post(site_url + 'product/update_artisan', {
				artisan : artisan,
				pid : pid
			}, function(data){
				if(data.status == 1){
					$('#update_artisan_modal #save-msg').html('<span class="label label-success arrowed-in">'+ data.response +'</span>');
					$('#update_artisan_modal #save_desc').removeAttr('disabled');
					
				   	window.location = site_url + 'product/' + pid;
				}
				else if(data.status == 2){
					alert(data.response);
					window.location.reload();
				}
				else if(data.status == 3){
					$('#update_artisan_modal #save-msg').html('<span class="label label-info arrowed-in">'+ data.response +'</span>');
					$('#update_artisan_modal #save_desc').removeAttr('disabled');
				}
				else{
					$('#update_artisan_modal #save-msg').html('<span class="label label-danger arrowed-in">'+ data.response +'</span>');
					$('#update_artisan_modal #save_desc').removeAttr('disabled');
				}
			}, 'json');
		}
		else{
			$('#update_artisan_modal #save-msg').html('<span class="label label-danger arrowed-in">Select artisan for this product</span>');
		}
	});

	$(".clean-name").on('keyup', function(){
		string_value = $(this).val();
		output_destination = "#" + $(this).attr('clean-name-output');
		
		$.post(site_url + 'page/clean_url', {
				string : string_value
			}, function(data){
				if(data.clean_url){
					$(output_destination).val(data.clean_url);
					url = site_url + data.clean_url;
					$("#display-url").text(url);
				}
			}, 'json');
	});
	
});
