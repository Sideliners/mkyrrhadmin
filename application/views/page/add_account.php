<?php echo (isset($response))? $response : ''; ?>
<?php echo form_open_multipart('', array('method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>
<div class="control-group">
	<label class="control-label" for="user_type">User type</label>
    <div class="controls">
    	<select id="user_type" name="user_type" tabindex="1" autofocus="autofocus">
        	<option value=""></option>
            <?php foreach($usertypes as $type): ?>
            <option value="<?=$type->user_type_id;?>" <?php echo set_select('user_type', $type->user_type_id);?>><?=$type->type_name;?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="control-group">
	<label class="control-label" for="firstname">First Name</label>
    <div class="controls">
    	<input type="text" name="firstname" id="firstname" value="<?php echo set_value('firstname'); ?>" tabindex="2"/>
    </div>
</div>

<div class="control-group">
	<label class="control-label" for="lastname">Last Name</label>
    <div class="controls">
    	<input type="text" name="lastname" id="lastname" value="<?php echo set_value('lastname'); ?>" tabindex="3"/>
    </div>
</div>

<div class="control-group">
	<label class="control-label" for="user_email">Email Address</label>
    <div class="controls">
    	<input type="text" name="user_email" id="user_email" value="<?php echo set_value('user_email'); ?>" tabindex="4" />
    </div>
</div>

<hr />

<div class="clearfix">
	<div class="pull-right">
    	<button type="button" class="btn" onclick="window.history.back()">Cancel</button>
    	<button type="submit" class="btn btn-primary" name="create_account"><i class="icon-save"></i> Create Account</button>
        <input type="hidden" name="id" value="<?=$this->uri->segment(3);?>" />        
    </div>
</div>
<?php echo form_close(); ?>
