<ul class="nav nav-list bs-docs-sidenav no-margin">
    <li class="<?php echo ($page == 'dashboard')? 'active' : '';?>"><a href="<?=base_url();?>"><i class="icon-dashboard"></i> Dashboard</a></li>
    <li><a href="#"><i class="icon-inbox"></i> Orders</a></li>
    <li><a href="#"><i class="icon-group"></i> Customers</a></li>

    <li class="<?php echo ($page == 'products' || $page == 'prod_articles' || $page == 'prod_artisans' || $page == 'prod_enterprises' || $page == 'artisan_articles' || $page == 'enterprise_articles' || $page == 'collections' || $page == 'pages')? 'active open' : '';?>">
        <a href="#" class="dropdown-toggle"><i class="icon-tags"></i> Contents <b class="arrow icon-angle-down"></b></a>
        <ul class="submenu">
            <li class="<?php echo ($sub_page == 'productslist')? 'active' : '';?>">
                <a href="<?=site_url('product/listings');?>"><i class="icon-double-angle-right"></i> Products</a>
            </li>
            <li class="<?php echo ($sub_page == 'artisanslist')? 'active' : '';?>">
                <a href="<?=site_url('artisan/listings');?>"><i class="icon-double-angle-right"></i> Artisans</a>
            </li>
            <li class="<?php echo ($sub_page == 'enterpriseslist')? 'active' : '';?>">
                <a href="<?=site_url('enterprise/listings');?>"><i class="icon-double-angle-right"></i> Enterprises</a>
            </li>
            <li class="<?php echo ($sub_page == 'articlelist' || $sub_page == 'articleview' || $sub_page == 'newarticle') ? 'active' : '';?>">
                <a href="<?=site_url('article/listings');?>"><i class="icon-double-angle-right"></i> Articles</a>
            </li>
            <li class="<?php echo ($sub_page == 'collectionlist' || $sub_page == 'collectionview' || $sub_page == 'newcollection') ? 'active' : '';?>">
                <a href="<?=site_url('collection/listings');?>"><i class="icon-double-angle-right"></i> Collections / Themes</a>
            </li>
            <li class="<?php echo ($sub_page == 'pagelist' || $sub_page == 'pageview' || $sub_page == 'newpage') ? 'active' : '';?>">
                <a href="<?=site_url('page/listings');?>"><i class="icon-double-angle-right"></i> Pages</a>
            </li>
        </ul>
    </li>
    <?php if($user->user_type == 1 || $user->user_type == 2): ?>
    <li class="<?php echo ($page == 'accounts' )? 'active' : '';?>"><a href="<?=site_url('superadmin/accounts');?>"><i class="icon-group"></i> Accounts</a></li>
    <?php endif; ?>
</ul>
