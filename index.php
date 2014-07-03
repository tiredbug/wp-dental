<?php
/*
Plugin Name: WP Dental
Plugin URI: http://basoro.org/wp-dental/
Description: WordPress Plugins Medical Record for Dentist
Version: 0.1
Author: Basoro
Author URI: http://basoro.org
*/

// Flush rewrite rules on activation
function my_rewrite_flush() {

    register_wp_dental();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

include_once('post_type_register.php');
include_once('post_type_meta.php');
include_once('post_type_columns.php');
include_once('post_type_hooks.php');
include_once('post_type_comments.php');

?>
