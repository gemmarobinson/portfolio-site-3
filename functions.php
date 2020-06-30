<?php
	/*--------------------------------------------------
	    | Theme & WordPress core functions files
	--------------------------------------------------*/
		require get_template_directory() . '/includes/core/wp-admin.php';
		require get_template_directory() . '/includes/core/enqueue.php';
		require get_template_directory() . '/includes/core/theme-setup.php';
		require get_template_directory() . '/includes/core/theme-support.php';
		require get_template_directory() . '/includes/core/excerpt.php';
		require get_template_directory() . '/includes/core/nav-walker.php';
		require get_template_directory() . '/includes/core/google-analytics.php';
		
	/*-----------------------------------------------------------------------------
		| Custom Post Types
	-----------------------------------------------------------------------------*/

		@include ('includes/custom-post-types/cpt-careers.php');



	/*-----------------------------------------------------------------------------
		| Taxonomies
	-----------------------------------------------------------------------------*/

		@include ('includes/taxonomies/taxonomy-post-type.php');


		@include ('includes/helpers.php');

		function set_industry_default_post_type_taxonomy( $post_id, $post ) {
			if ( 'publish' === $post->post_status && $post->post_type === 'post' ) {
				$defaults = array(
					'post-type' => array( 'industry' )
				);
				$taxonomies = get_object_taxonomies( $post->post_type );

				foreach ( (array) $taxonomies as $taxonomy ) {
					$terms = wp_get_post_terms( $post_id, $taxonomy );
					if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
						wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
					}
				}
			}
		}
		add_action( 'save_post', 'set_industry_default_post_type_taxonomy', 100, 2 );