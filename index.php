<?php
/*
*Plugin name: Property Management
*Plugin URI: www.github.com/mwalugha
*Description: You want to manage your property easily!! You're at the right place.
*Author: Mwalugha Bura
*Author URI: www.github.com/mwalughabura
*Version: 1.0
*License: GPLv2
*/

if (!defined('ABSPATH')) {
	exit;
}

function wpsc_register_post_type()
{
	$singular = 'Property Listing';
	$plural = 'Property Listings';

	$labels  = array(
		'name'				=> $plural, 
		'singular_name' 	=> $singular,
		'add_name' 			=> 'Add New',
		'add_a_new_item'	=> 'Add New' . $singular,
		'edit' 				=> 'Edit',
		'edit_item' 		=> 'Edit' . $singular,
		'new_item' 			=> 'New' . $singular,
		'view' 				=> 'View' . $singular,
		'view_item' 		=> 'View' . $singular,
		'search_term' 		=> 'Search' . $plural,
		'parent'			=> 'Parent' . $singular,
		'not_found'			=> 'No ' . $plural . 'found',
		'not_found_in_trash'=> 'No ' . $plural . 'in Trash'
	);

	$args = array(
		'labels'				=> $labels,
		'public' 				=> true,
		'publicly_quriable' 	=> true,
		'exclude_from_search'	=> false,
		'show_in_nav_menus'		=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 6,
		'menu_icon'				=> 'dashicons_businessman',
		'can_export'			=> true,
		'delete_with_user'		=> false,
		'heirarchical'			=> false,
		'has_archive'			=> true,
		'query_var'				=> true,
		'capability_type'		=> 'post',
		'map_meta_cap'			=> true,
		'rewrite'				=> array(
			'slug' => 'properties',
			'with_front' => true,
			'pages'	=> true,
			'feeds' => true,
		),
		'supports'				=> array(
			'title',
			'author',
			'custom_fields'
		),
	);

	register_post_type('property', $args);
}

add_action('init', 'wpsc_register_post_type');


add_filter( 'rwmb_meta_boxes', 'your_prefix_meta_boxes' );
function your_prefix_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Test Meta Box', 'textdomain' ),
        'post_types' => 'property',
        'fields'     => array(
            array(
                'id'   => 'name',
                'name' => __( 'Property name', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'address',
                'name' => __( 'Address', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'status',
                'name' => __( 'Status', 'textdomain' ),
                'type' => 'select',
                'options' => array(
                	'Developed',
                	'Undeveloped'
                )
            ),
        ),
    );
    return $meta_boxes;
}