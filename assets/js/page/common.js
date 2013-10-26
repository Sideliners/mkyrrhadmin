function show_modal(modal_name, title, msg, data_id, action, stats){
    if(isNaN(data_id) && isNaN(stats)){
        alert('Invalid Parameters');
        return false;
    }
    else{
        $('#'+ modal_name +' .modal-footer #modal-buttons #close_btn').hide();
        $('#'+ modal_name +' .modal-footer #modal-buttons .btn').removeAttr('disabled');
        $('#'+ modal_name +' .modal-header #myModalLabel').text(title);
        $('#'+ modal_name +' .modal-body .modal-message').text(msg);
        $('#'+ modal_name +' .modal-footer #yes_btn').attr({
            'data-item' : data_id,
            'action' : action,
            'data-action' : stats
        });

        $('#'+ modal_name).modal('show');
    }
}
