<div>
    <h4>Account Summary</h4>
    <hr />
    <div>
        <dl class="dl-horizontal">
            <dt>Name</dt> <dd><?=$user->firstname.' '.$user->lastname;?></dd>
            <dt>Email Adress</dt> <dd><?=$user->user_email;?></dd>
            <?php
            switch($user->user_type){
                case 1:
                    $usertype = 'Superadmin';
                    break;
                case 2:
                    $usertype = 'Administrator';
                    break;
                case 3:
                    $usertype = 'Staff';
                    break;
            }
            ?>
            <dt>User Type</dt> <dd><?=$usertype;?></dd>
            <dt>Member since</dt> <dd><?=date('M j, Y', strtotime($user->date_created));?></dd>
            <dt>Last Modified</dt> <dd><?php echo (!is_null($user->last_modified))? date('M j, Y', strtotime($user->last_modified)) : '<em>No yet modified</em>';?></dd>
        </dl>
    </div>
</div>
