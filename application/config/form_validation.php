<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	'batch_action_product' => array(
		array(
            'field' => 'batch_actions',
            'label' => 'Batch Action',
            'rules' => 'required|trim|xss_clean'
		),
		array(
            'field' => 'product_item[]',
            'label' => 'Item',
            'rules' => 'required|trim|xss_clean'
		),// batch_action_product
	),
    'create_product' => array(
        array(
            'field' => 'product_name',
            'label' => 'Product Name',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'prod_desc',
            'label' => 'Product Description',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'theme_name[]',
            'label' => 'Theme',
            'rules' => 'required|trim|xss_clean'
        ),
		array(
            'field' => 'artisan_name[]',
            'label' => 'Artisan',
            'rules' => 'required|trim|xss_clean'
        ),
		array(
            'field' => 'product_length',
            'label' => 'Length',
            'rules' => 'required|numeric|trim|xss_clean'
        ),
		array(
            'field' => 'product_width',
            'label' => 'Width',
            'rules' => 'required|numeric|trim|xss_clean'
        ),
		array(
            'field' => 'product_height',
            'label' => 'Height',
            'rules' => 'required|numeric|trim|xss_clean'
        ),
		array(
            'field' => 'product_weight',
            'label' => 'Weight',
            'rules' => 'required|numeric|trim|xss_clean'
        ),
        array(
            'field' => 'product_price',
            'label' => 'Price',
            'rules' => 'required|numeric|trim|xss_clean'
        ),
        array(
            'field' => 'product_quantity',
            'label' => 'SKU',
            'rules' => 'required|numeric|trim|xss_clean'
        ),
    ), // create_product
    'create_article' => array(
        array(
            'field' => 'article_title',
            'label' => 'Article Title',
            'rules' => 'required|trim|xss_clean'
        ),
        array(
            'field' => 'article_body',
            'label' => 'Article Body',
            'rules' => 'required|trim|xss_clean'
        ),
    ), // create_article
	'create_artisan' => array(
		array(
            'field' => 'artisan_name',
            'label' => 'Artisan Name',
            'rules' => 'required|trim|xss_clean'
		),
		array(
            'field' => 'artisan_description',
            'label' => 'Artisan Description',
            'rules' => 'required|trim|xss_clean'
		),
		array(
            'field' => 'enterprise_id',
            'label' => 'Artisan\'s Enterprise',
            'rules' => 'required|trim|xss_clean'
		),
	),//create_artisan
	'create_enterprise' => array(
		array(
            'field' => 'enterprise_name',
            'label' => 'Enterprise Name',
            'rules' => 'required|trim|xss_clean'
		),
		array(
            'field' => 'enterprise_description',
            'label' => 'Enterprise Description',
            'rules' => 'required|trim|xss_clean'
		),//create_enterprise
	),
);
