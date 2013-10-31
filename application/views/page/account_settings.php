<div>
    <h4>Account Information</h4>
    <hr />
    <div>
        <dl class="dl-horizontal">
            <dt>Name</dt> <dd><?=$user->firstname.' '.$user->lastname;?></dd>
            <dt>Email Adress</dt> <dd><?=$user->user_email;?></dd>
            <dt>User Type</dt> <dd><?=ucwords($user->type_name);?></dd>
            <dt>Member since</dt> <dd><?=date('M j, Y g:i A', strtotime($user->date_created));?></dd>
            <dt>Last Modified</dt> <dd><?php echo (!is_null($user->last_modified))? date('M j, Y', strtotime($user->last_modified)) : '<em>No yet modified</em>';?></dd>
        </dl>
    </div>
    <div>
        <a href="#update-account-modal" class="btn btn-info btn-small" role="button" data-toggle="modal"><i class="icon-edit"></i> Update Information</a>
    </div>
</div>
