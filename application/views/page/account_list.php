<?php if(!empty($accounts)): ?>
<pre>
<?php print_r($accounts); ?>
</pre>
<?php else: ?>
<p class="alert alert-info">No Accounts, <a href="<?=site_url('superadmin/create');?>">Create Now</a></p>
<?php endif; ?>