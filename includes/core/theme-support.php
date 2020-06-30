<?php
    /*--------------------------------------------------
        | Theme Supports
    --------------------------------------------------*/

        function sixthstory_theme_support(){

            # Create an administration page for general options like ACF.
            if( function_exists( 'acf_add_options_page' ) ) {

                $option_page = acf_add_options_page(array(
                    'page_title'    => 'Options',
                    'menu_slug'     => 'general-options',
                    'capability'    => 'edit_posts',
                    'redirect'  => false
                ));

            }

            # Add extra theme options such as post featured images & menu pages.
            add_theme_support( 'post-thumbnails' );
            add_theme_support( 'menus' );
            add_theme_support( 'title-tag' );

            # Register Menus
            register_nav_menus( [
                'main-menu'    => __( 'Main Menu' ),
            ] );

            # HTML5 on WP elements
            add_theme_support( 'html5', ['search-form', 'caption'] );

        }
        add_action( 'after_setup_theme', 'sixthstory_theme_support' );


        # Speed Up ACF in /wp-admin - https://www.advancedcustomfields.com/resources/acf-settings/
        add_filter('acf/settings/remove_wp_meta_box', '__return_true');


        # Add slug to body class
        function add_slug_body_class( $classes ) {
            global $post;

            if ( isset( $post ) ) {
                $classes[] = $post->post_type . '-' . $post->post_name;
            }

            return $classes;
        }
        add_filter( 'body_class', 'add_slug_body_class' );


        # Automatic Emptying of Trash after 5 Days
        define('EMPTY_TRASH_DAYS', 5 );


        # Allow SVG to be uploaded to the media uploader
        function cc_mime_types($mimes) {
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }
        add_filter('upload_mimes', 'cc_mime_types');


        # Remove p tags from Contact Form 7 
        add_filter('wpcf7_autop_or_not', '__return_false');


        # Remove span wrappers from Contact Form 7 
        add_filter('wpcf7_form_elements', function($content) {
            $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

            return $content;
        });


        # Remove WordPress Welcome Message
        remove_action('welcome_panel', 'wp_welcome_panel');


        # Remove the Default dashboard Widgets
        function disable_default_dashboard_widgets() {
            global $wp_meta_boxes;
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
            unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
            unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
        }
        add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 999);


        # Add Custom Sixth Story dashboard widget 
        function sixth_story_dashboard_widget_content() {
            echo "<p>Welcome to your custom built website by Sixth Story. If you need assistance then please don't hesitate to contact us by calling <a href='tel:01217736257'>0121 773 6257</a>, <a href='mailto:haveacuppa@sixthstory.co.uk'>emailing</a> us, or through our <a href='https://sixthstory.co.uk/contact/' target='_blank'>website</a>.";
        }
 
        function sixth_story_dashboard_widget() {
            global $wp_meta_boxes;
             
            wp_add_dashboard_widget('custom_help_widget', 'Do you need help?', 'sixth_story_dashboard_widget_content');
        } 
        add_action('wp_dashboard_setup', 'sixth_story_dashboard_widget');


        # Hide Login Errors to give less information to potential hackers
        function no_wordpress_errors(){
            return 'Something is wrong!';
        }
        add_filter( 'login_errors', 'no_wordpress_errors' );


        # Disabling built-in WordPress image optomiser as we use a plugin
        function smashing_jpeg_quality() {
            return 100;
        }
        add_filter( 'jpeg_quality', 'smashing_jpeg_quality' );


        // /**
        //  * Wordpress has a known bug with the posts_per_page value and overriding it using
        //  * query_posts. The result is that although the number of allowed posts_per_page
        //  * is abided by on the first page, subsequent pages give a 404 error and act as if
        //  * there are no more custom post type posts to show and thus gives a 404 error.
        //  *
        //  * This fix is a nicer alternative to setting the blog pages show at most value in the
        //  * WP Admin reading options screen to a low value like 1.
        //  *
        //  */
        // function custom_posts_per_page( $query ) {

        //     if ( $query->is_archive('post') ) {
        //         set_query_var('posts_per_page', 8);
        //     }
        // }
        // add_action( 'pre_get_posts', 'custom_posts_per_page' );