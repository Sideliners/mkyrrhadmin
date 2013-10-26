<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </a>
         
        <!-- Be sure to leave the brand out there if you want it shown -->
        <a class="brand logo" href="<?=base_url();?>"><?=$site_title;?></a>
         
        <!-- Everything you want hidden at 940px or less, place within here -->
        <div class="nav-collapse collapse navbar-responsive-collapse">
            <ul class="nav">
                <li><a href="http://s02.wearemakaya.com" target="_blank">Visit Site</a></li>
            </ul>
            
            <ul class="nav pull-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php  echo ucwords($user->firstname); ?> <b class="icon-caret-down"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=site_url('account/settings');?>">Account settings</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=site_url('users/logout');?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
