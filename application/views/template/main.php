<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?=$header_elements;?>
    <?php echo (isset($styles) || !is_null($styles))? $styles : '';?>
    <title>
    <?php
    if(isset($page_title)){
        if(isset($site_title)){
            echo $page_title.' | '.$site_title;
        }
        else{
            echo $page_title;
        }
    }
    else if(isset($site_title)){
        echo $site_title;
    }
    else{
        echo 'Admin';
    }
    ?>
    </title>
</head>
<body class="<?php echo (!isset($user->firstname))? 'login-layout' : ''; ?>">
    <div class="container-fluid no-padding">
        <?php if(isset($navigation)){ echo $navigation; } ?>
        <div class="row-fluid">
            <?php if(isset($sidemenu)): ?>
            <div class="clearfix affix">
                <?=$sidemenu;?>
            </div>
            <?php endif; ?>
            <div class="row-fluid <?php if(isset($sidemenu)): ?>span10<?php endif; ?> pull-left main-content">
                <div class="page-content no-padding">
                    <?php if(isset($page_title)): ?>
                    <div class="page-header no-padding">
                        <h1>
                            <?=$page_title;?>
                            <?php
							$subpage_array = array(
								'productslist',
								'articlelist',
								'artisanslist',
								'enterpriseslist'
							);
							?>
                            <?php if(in_array($sub_page, $subpage_array)): ?>
                            <div class="pull-right" style="margin-top: 2px;">
                                <?php
                                $method = ''; 
								
								if($sub_page == 'productslist'){ $method = 'products'; }
								if($sub_page == 'articlelist'){ $method = 'articles'; }
								if($sub_page == 'artisanslist'){ $method = 'artisans'; }
								if($sub_page == 'enterpriseslist'){ $method = 'enterprise'; }
								?>
                                <?=form_open('search/'.$method, array('class' => 'no-margin input-append'));?>
                                    <input type="text" name="search" id="search" placeholder="search <?=$method;?>" required />
                                    <button type="submit" class="btn" name="do_search_product"><i class="icon-search"></i></button>
                                <?=form_close();?>
                            </div>
                            <?php endif; ?>
                        </h1>
                    </div>
                    <?php endif; ?>
                    <div class="<?php if(isset($user->firstname)): ?>margin-sides background-white padding-vertical clearfix<?php else: ?>main-content<?php endif; ?>">
                        <?=$page;?>
                    </div>
                </div>
            </div>
        </div>
    <!-- <div class="footer">footer</div> -->
    </div>
    <?=(isset($global_modal))? $global_modal : '' ;?>
    <?=(isset($modal))? $modal : '' ;?>
    <?=$scripts;?>
</body>
</html>
