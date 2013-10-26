<!DOCTYPE HTML>
<html lang="en">
    <head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Makaya Admin</title>

		<meta name="description" content="User login page">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- basic styles -->
		<link href="<?=base_url('assets/css/login.css');?>" rel="stylesheet"/>
		<link href="<?=base_url('assets/theme/bootstrap.css');?>" rel="stylesheet"/>
		<link href="<?=base_url('assets/css/font-awesome.css');?>" rel="stylesheet"/>

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?=base_url('assets/css/font-awesome-ie7.min.css');?>" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link href="<?=base_url('assets/theme/css.css');?>" rel="stylesheet"/>

		<!-- ace styles -->

		<link href="<?=base_url('assets/theme/ace.css');?>" rel="stylesheet"/>
		<link href="<?=base_url('assets/theme/ace-rtl.css');?>" rel="stylesheet"/>

		<!--[if lte IE 8]>
		<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
        <script type='text/javascript'>var site_url = '<?=site_url('');?>';</script>
        <script src='<?=base_url('assets/js/jquery-1.10.2.js');?>' type='text/javascript'></script>
        <script src='<?=base_url('assets/js/jquery-ui-1.8.20.custom.min.js');?>' type='text/javascript'></script>
        <script type="text/javascript">
        $(function(){
            $('#login-form').on('submit', function(){
                $('#login_msg').removeAttr('class').addClass('alert alert-info').html('<i class="icon-spinner icon-spin"></i> verifying account...');
                
                $.post(site_url + 'users/login',{
                    user_email : $('#user_email').val(),
                    user_password : $('#user_password').val(),
                    remember : $('#remember_me').is(':checked')
                }, function(data){
                    if(data.s > 0){
                        $('#login_msg').removeAttr('class').addClass('alert alert-success').html('<i class="icon-refresh icon-spin"></i> ' + data.m);
                        window.location.reload();
                    }
                    else{
                        $('#login_msg').removeAttr('class').addClass('alert alert-danger').html('<i class="icon-exclamation-sign"></i> ' + data.m);
                        return false;
                    }
                }, 'json');
        
                return false;
            });
        });
        
        function show_box(id) {
            $('.widget-box.visible').removeClass('visible');
            $('#'+id).addClass('visible');
        }
		</script>
        
        <title>Admin</title>
    </head>
    <body class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                    	<div class="center">
                            <h1>
                                <i class="icon-leaf green"></i>
                                <span class="red">Makaya</span> <span class="white">Admin</span>
                            </h1>
                        </div>
                        
                        <div class="space-6"></div>
                        
                        <div class="position-relative">
							<?php $attr = array('method' => 'post', 'class' => 'no-margin', 'id' => 'login-form'); ?>
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger no-margin-top">
                                            <i class="icon-leaf green"></i> Login to <?=$this->config->item('sitename');?>
                                        </h4>
                                        <div id="login_msg"></div>
                                        <?php echo form_open('', $attr); ?>
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="email" id="user_email" name="user_email" class="form-control input-block-level" placeholder="Email Address" autofocus required tabindex="1"/>
                                                        <i class="icon-user"></i>
                                                    </span>
                                                </label>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" id="user_password" name="user_password" class="form-control input-block-level" placeholder="Password" required tabindex="2" />
                                                        <i class="icon-lock"></i>
                                                    </span>
                                                </label>
                                                <div class="space"></div>
                                                <div class="clearfix">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" id="remember_me" name="remember_me" value="1" />
                                                        <span class="lbl"> Remember Me</span>
                                                    </label>
                                                    <button type="submit" class="width-35 pull-right btn btn-sm btn-primary" tabindex="3"><i class="icon-key"></i> Login</button>
                                                </div>
                                                <div class="space-4"></div>
                                            </fieldset>
                                        <?php echo form_close(); ?>
                                    </div>
                                    <div class="toolbar clearfix">
                                        <div>
                                            <a class="forgot-password-link" onclick="show_box('forgot-box'); return false;" href="#"><i class="icon-arrow-left"></i> I forgot my password</a>
                                        </div>
                                    </div>
                                </div><!--widget-body -->
                            </div><!-- login-box -->
                            
                            <div id="forgot-box" class="forgot-box widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header red lighter bigger no-margin-top"><i class="icon-key"></i> Retrieve Password</h4>
                                        <div class="space-6"></div>
                                        <p>Enter your email address</p>
                                        <form>
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input class="form-control input-block-level" placeholder="Email" type="email" /><i class="icon-envelope"></i>
                                                    </span>
                                                </label>
                            
                                                <div class="clearfix">
                                                    <button type="button" class="width-35 pull-right btn btn-sm btn-danger"><i class="icon-lightbulb"></i> Send Me!</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div><!-- /widget-main -->
                            
                                    <div class="toolbar clearfix">
                                        <a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link pull-right">Back to login <i class="icon-arrow-right"></i></a>
                                    </div>
                                </div><!-- /widget-body -->
                            </div><!-- /forgot-box -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>





