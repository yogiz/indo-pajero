<?php 

add_action( 'init', 'codex_cpt_init' );

function codex_cpt_init() {

	// cpt gallery
	$gallery_labels = array(
		'name'               => _x( 'gallery', 'post type general name', 'pajero' ),
		'singular_name'      => _x( 'gallery', 'post type singular name', 'pajero' ),
		'menu_name'          => _x( 'gallery', 'admin menu', 'pajero' ),
		'name_admin_bar'     => _x( 'gallery', 'add new on admin bar', 'pajero' ),
		'add_new'            => _x( 'Add New', 'gallery', 'pajero' ),
		'add_new_item'       => __( 'Add New gallery', 'pajero' ),
		'new_item'           => __( 'New gallery', 'pajero' ),
		'edit_item'          => __( 'Edit gallery', 'pajero' ),
		'view_item'          => __( 'View gallery', 'pajero' ),
		'all_items'          => __( 'All gallery', 'pajero' ),
		'search_items'       => __( 'Search gallery', 'pajero' ),
		'parent_item_colon'  => __( 'Parent gallery:', 'pajero' ),
		'not_found'          => __( 'No gallery found.', 'pajero' ),
		'not_found_in_trash' => __( 'No gallery found in Trash.', 'pajero' )
	);

	$gallery_args = array(
		'labels'             => $gallery_labels,
        'description'        => __( 'Description.', 'pajero' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'gallery' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail' )
	);
	register_post_type( 'gallery', $gallery_args );

	//cpt event
		$event_labels = array(
		'name'               => _x( 'event', 'post type general name', 'pajero' ),
		'singular_name'      => _x( 'event', 'post type singular name', 'pajero' ),
		'menu_name'          => _x( 'event', 'admin menu', 'pajero' ),
		'name_admin_bar'     => _x( 'event', 'add new on admin bar', 'pajero' ),
		'add_new'            => _x( 'Add New', 'event', 'pajero' ),
		'add_new_item'       => __( 'Add New event', 'pajero' ),
		'new_item'           => __( 'New event', 'pajero' ),
		'edit_item'          => __( 'Edit event', 'pajero' ),
		'view_item'          => __( 'View event', 'pajero' ),
		'all_items'          => __( 'All event', 'pajero' ),
		'search_items'       => __( 'Search event', 'pajero' ),
		'parent_item_colon'  => __( 'Parent event:', 'pajero' ),
		'not_found'          => __( 'No event found.', 'pajero' ),
		'not_found_in_trash' => __( 'No event found in Trash.', 'pajero' )
	);

	$event_args = array(
		'labels'             => $event_labels,
        'description'        => __( 'Description.', 'pajero' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title','editor', 'thumbnail' )
	);
	register_post_type( 'event', $event_args );


}


// GET FEATURED IMAGE
function ST4_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
        return $post_thumbnail_img[0];
    }
}

// ADD NEW COLUMN
function ST4_columns_head($defaults) {
    $defaults['featured_image'] = 'Featured Image';
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function ST4_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = ST4_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '"  height="100"/>';
        }
    }
}

add_filter('manage_gallery_posts_columns', 'ST4_columns_head');
add_action('manage_gallery_posts_custom_column', 'ST4_columns_content', 10, 2);





?>
