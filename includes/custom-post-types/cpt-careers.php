<?php
	function careers_cpt() {
		register_post_type( 'careers',
			array (
				'labels' => array(
					'name' => 'Careers',
					'singular_name' => 'Career',					
					'add_new_item' => 'Add New Career',
					'edit' => 'Edit Career',
					'new_item' => 'New Career',
					'view_item' => 'View Career',
					'search_items' => 'Search Careers',
					'not_found' => 'No Careers Found',
					'not_found_in_trash' => 'No Careers found in trash',
				),

				'public' => true,			
				'has_archive'	=> false,
				'supports' => array( 'title', 'editor', 'thumbnail'),
				'show_ui'  =>   true,
				'rewrite' => array (
					'with_front' => false 
				)
			)
		);
	}
	add_action( 'init', 'careers_cpt' );
?>