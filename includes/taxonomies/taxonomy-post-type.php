<?php

	// creation of two taxonomies, genres and writers, for the post type "post"
	function create_post_type_taxonomies() {

		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Post Types', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'Post Type', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Search Post Types', 'textdomain' ),
			'all_items'         => __( 'All Post Types', 'textdomain' ),
			'parent_item'       => __( 'Parent Post Type', 'textdomain' ),
			'parent_item_colon' => __( 'Parent Post Type:', 'textdomain' ),
			'edit_item'         => __( 'Edit Post Type', 'textdomain' ),
			'update_item'       => __( 'Update Post Type', 'textdomain' ),
			'add_new_item'      => __( 'Add New Post Type', 'textdomain' ),
			'new_item_name'     => __( 'New Post Type Name', 'textdomain' ),
			'menu_name'         => __( 'Post Type', 'textdomain' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			//'rewrite'           => array( 'slug' => 'genre' ),
		);
		register_taxonomy( 'post-type', array( 'post' ), $args );
	}
	add_action( 'init', 'create_post_type_taxonomies', 0 );
?>