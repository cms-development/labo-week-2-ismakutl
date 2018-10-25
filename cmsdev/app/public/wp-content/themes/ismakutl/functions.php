<?php

function content_theme_css() {
	wp_enqueue_style('normalize', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/vendors/bulma.min.css', array(), '1.0.0', 'all');
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/main.css');
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'content_theme_css');

// Init Widgets
function theme_slug_widgets_init() {
	register_sidebar(array(
		'id' => 'sidebar-1',
		'name' => 'Sidebar Main',
		'before_widget' => '<div class="widget-container">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}
add_action('widgets_init', 'theme_slug_widgets_init');


/*===================================================================================*/
/*	Custom post type: RECIPE
/*===================================================================================*/
function custom_post_type_recipe() {
	register_post_type( 'recipe',
		array(
			'labels' => array(
				'name' => __( 'Recipes' ),
				'singular_name' => __( 'Recipe' ),
				'all_items' => __('All recipes'),
        'add_new_item' => __('Add new recipe'),
        'edit_item' => __('Edit recipe'),
        'new_item' => __('Add new recipe'),
        'view_item' => __('View recipe'),
        'search_item' => __('Search recipe')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'recipes'),
			'taxonomies' => array(
				'category',
				'allergen',
				'difficulty'
			),
			'supports' => array(
				'title',
				'editor',
				'custom-fields',
				'excerpt',
				'thumbnail',
				'revisions'
			),
			'menu_position' => 5,
    	'exclude_from_search' => false
		)
	);
}
add_action('init', 'custom_post_type_recipe');

/*===================================================================================*/
/*	Custom post type: EVENT
/*===================================================================================*/
function custom_post_type_event() {
	register_post_type( 'event',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' ),
				'all_items' => __('All events'),
        'add_new_item' => __('Add new event'),
        'edit_item' => __('Edit event'),
        'new_item' => __('Add new event'),
        'view_item' => __('View event'),
        'search_item' => __('Search event')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'events'),
			'taxonomies' => array(
				'province',
				'tag',
				'setting'
			),
			'supports' => array(
				'title',
				'editor',
				'custom-fields',
				'excerpt',
				'thumbnail',
				'revisions'
			),
			'menu_position' => 5,
    	'exclude_from_search' => false
		)
	);
}
add_action('init', 'custom_post_type_event');

/*===================================================================================*/
/*	Custom post type: CAR (custom)
/*===================================================================================*/
function custom_post_type_car() {
	register_post_type( 'car',
		array(
			'labels' => array(
				'name' => __( 'Cars' ),
				'singular_name' => __( 'Car' ),
				'all_items' => __('All cars'),
        'add_new_item' => __('Add new car'),
        'edit_item' => __('Edit car'),
        'new_item' => __('Add new car'),
        'view_item' => __('View car'),
        'search_item' => __('Search car')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'cars'),
			'taxonomies' => array(
				'status',
				'transmission',
				'equipment',
			),
			'supports' => array(
				'title',
				'editor',
				'custom-fields',
				'excerpt',
				'thumbnail',
				'revisions'
			),
			'menu_position' => 5,
    	'exclude_from_search' => false
		)
	);
}
add_action('init', 'custom_post_type_car');

/*===================================================================================*/
/*	Taxonomy: RECIPE
/*===================================================================================*/
function register_taxonomy_recipe() {
	// Taxonomy: difficulty (recipe)
	register_taxonomy('difficulty', array('recipe'), [
		'hierarchical' => true,
		'labels' => [
			'name' => _x('Difficulties', 'taxonomy general name'),
			'singular_name' => _x('Difficulty', 'taxonomy singular name'),
			'search_items' => __('Search Difficulties'),
			'all_items' => __('All Difficulties'),
			'parent_item' => __('Parent Difficulty'),
			'parent_item_colon' => __('Parent Difficulty:'),
			'edit_item' => __('Edit Difficulty'),
			'update_item' => __('Update Difficulty'),
			'add_new_item' => __('Add New Difficulty'),
			'new_item_name' => __('New Difficulty Name'),
			'menu_name' => __('Difficulty')
		],
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => ['slug' => 'difficulty'],
	]);

	// Taxonomy: allergen (recipe)
	register_taxonomy('allergen', array('recipe'), [
		'hierarchical' => true,
		'labels' => [
			'name' => _x('Allergens', 'taxonomy general name'),
			'singular_name' => _x('Allergen', 'taxonomy singular name'),
			'search_items' => __('Search Allergens'),
			'all_items' => __('All Allergens'),
			'parent_item' => __('Parent Allergen'),
			'parent_item_colon' => __('Parent Allergen:'),
			'edit_item' => __('Edit Allergen'),
			'update_item' => __('Update Allergen'),
			'add_new_item' => __('Add New Allergen'),
			'new_item_name' => __('New Allergen Name'),
			'menu_name' => __('Allergen')
		],
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => ['slug' => 'allergen'],
	]);
}
add_action('init', 'register_taxonomy_recipe');

/*===================================================================================*/
/*	Taxonomy: EVENT
/*===================================================================================*/
function register_taxonomy_event() {
	// Taxonomy: province (event)
	register_taxonomy('province', array('event'), [
		'hierarchical' => true,
		'labels' => [
			'name' => _x('Provinces', 'taxonomy general name'),
			'singular_name' => _x('Province', 'taxonomy singular name'),
			'search_items' => __('Search Provinces'),
			'all_items' => __('All Provinces'),
			'parent_item' => __('Parent Province'),
			'parent_item_colon' => __('Parent Province:'),
			'edit_item' => __('Edit Province'),
			'update_item' => __('Update Province'),
			'add_new_item' => __('Add New Province'),
			'new_item_name' => __('New Province Name'),
			'menu_name' => __('Province')
		],
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => ['slug' => 'province'],
	]);

	// Taxonomy: setting (event)
	register_taxonomy('setting', array('event'), [
		'hierarchical' => true,
		'labels' => [
			'name' => _x('Settings', 'taxonomy general name'),
			'singular_name' => _x('Setting', 'taxonomy singular name'),
			'search_items' => __('Search Settings'),
			'all_items' => __('All Settings'),
			'parent_item' => __('Parent Setting'),
			'parent_item_colon' => __('Parent Setting:'),
			'edit_item' => __('Edit Setting'),
			'update_item' => __('Update Setting'),
			'add_new_item' => __('Add New Setting'),
			'new_item_name' => __('New Setting Name'),
			'menu_name' => __('Setting')
		],
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => ['slug' => 'setting'],
	]);
}
add_action('init', 'register_taxonomy_event');

/*===================================================================================*/
/*	Taxonomy: Car (custom)
/*===================================================================================*/
function register_taxonomy_car() {
	// Taxonomy: status (car)
	register_taxonomy('status', array('car'), [
		'hierarchical' => true,
		'labels' => [
			'name' => _x('Status', 'taxonomy general name'),
			'singular_name' => _x('Status', 'taxonomy singular name'),
			'search_items' => __('Search Statuses'),
			'all_items' => __('All Statuses'),
			'parent_item' => __('Parent Status'),
			'parent_item_colon' => __('Parent Status:'),
			'edit_item' => __('Edit Status'),
			'update_item' => __('Update Status'),
			'add_new_item' => __('Add New Status'),
			'new_item_name' => __('New Status Name'),
			'menu_name' => __('Status')
		],
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => ['slug' => 'status'],
	]);

	// Taxonomy: transmission (car)
	register_taxonomy('transmission', array('car'), [
		'hierarchical' => true,
		'labels' => [
			'name' => _x('Transmissions', 'taxonomy general name'),
			'singular_name' => _x('Transmission', 'taxonomy singular name'),
			'search_items' => __('Search Transmissions'),
			'all_items' => __('All Transmissions'),
			'parent_item' => __('Parent Transmission'),
			'parent_item_colon' => __('Parent Transmission:'),
			'edit_item' => __('Edit Transmission'),
			'update_item' => __('Update Transmission'),
			'add_new_item' => __('Add New Transmission'),
			'new_item_name' => __('New Transmission Name'),
			'menu_name' => __('Transmission')
		],
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => ['slug' => 'transmission'],
	]);

	// Taxonomy: equipment (car)
	register_taxonomy('equipment', array('car'), [
		'hierarchical' => true,
		'labels' => [
			'name' => _x('Equipments', 'taxonomy general name'),
			'singular_name' => _x('Equipment', 'taxonomy singular name'),
			'search_items' => __('Search Equipments'),
			'all_items' => __('All Equipments'),
			'parent_item' => __('Parent Equipment'),
			'parent_item_colon' => __('Parent Equipment:'),
			'edit_item' => __('Edit Equipment'),
			'update_item' => __('Update Equipment'),
			'add_new_item' => __('Add New Equipment'),
			'new_item_name' => __('New Equipment Name'),
			'menu_name' => __('Equipment')
		],
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => ['slug' => 'equipment'],
	]);
}
add_action('init', 'register_taxonomy_car');

/*===================================================================================*/
/*	Custom field: RECIPE
/*===================================================================================*/
function ismakutl_add_recipe_box() {
  $screens = array('recipes');
  foreach($screens as $screen) {
      add_meta_box(
          'recipe_box',
          __('Our Custom Recipe Fields', 'ismakutl'),
          'ismakutl_recipe_box_callback',
          $screen
      );
  }
}
add_action('add_meta_boxes', 'ismakutl_add_recipe_box');

// Re-enable custom fields
add_filter('acf/settings/remove_wp_meta_box', '__return_false');
