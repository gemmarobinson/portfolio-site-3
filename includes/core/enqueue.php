<?php
	/*--------------------------------------------------
		| Enqueue Stylesheet and JavaScript
	--------------------------------------------------*/


		/**
		 * Get cache-busting hashed filename from rev-manifest.json.
		 *
		 * @param  string $filename Original name of the file.
		 * @return string Current cache-busting hashed name of the file.
		 */
		function get_asset_path( $filename ) {
		 
		    // Cache the decoded manifest so that we only read it in once.
		    static $manifest = null;
		    if ( null === $manifest ) {
		        $manifest_path = get_stylesheet_directory() . '/assets/dist/rev-manifest.json';
		        $manifest = file_exists( $manifest_path )
		            ? json_decode( file_get_contents( $manifest_path ), true )
		            : [];
		    }
		 
		    // If the manifest contains the requested file, return the hashed name.
		    if ( array_key_exists( $filename, $manifest ) ) {
		        return '/assets/dist/' . $manifest[ $filename ];
		    }
		 
		    // Assume the file has not been hashed when it was not found within the
		    // manifest.
		    return $filename;
		}
		

		# Deregister default javascripts & includes all of the style sheets rather than using link rel.
		function sixthstory_enqueue() {
			$time = time();

			# Deregister the defaults and implement our stylesheets.
			wp_deregister_script( 'jquery' );
			wp_deregister_script( 'wp-embed' );

			# CSS
			wp_enqueue_style( 'main', get_template_directory_uri().get_asset_path('app.min.css'), '', $time, false);

			# JS 
			wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', '', '', true );
			wp_enqueue_script('jquery');
			wp_enqueue_script('appjs', get_template_directory_uri().get_asset_path('bundle.js'), array('jquery'), $time, true);

			# Google Maps
			// if (is_page(*PAGEID*)) {
			//   wp_enqueue_script('gmap', 'https://maps.googleapis.com/maps/api/js?key=*API-KEY*', array('jquery'), '1.0', true);
			// }

		}
		add_action( 'wp_enqueue_scripts', 'sixthstory_enqueue');