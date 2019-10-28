<?php
/**
 * Adan y Eva Theme
 * Functions.php
 *
 * ===== NOTES ==================================================================
 * 
 * Unlike style.css, the functions.php of a child theme does not override its 
 * counterpart from the parent. Instead, it is loaded in addition to the parent's 
 * functions.php. (Specifically, it is loaded right before the parent's file.)
 * 
 * In that way, the functions.php of a child theme provides a smart, trouble-free 
 * method of modifying the functionality of a parent theme. 
 * 
 * =============================================================================== */
 
function adanyeva_enqueue_scripts() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'adanyeva_enqueue_scripts' );

/**
 * Enqueue custom styles.
 *
 * @action wp_enqueue_scripts
 */
function adanyeva_scripts() {
    $script_filemtime = get_stylesheet_directory() . '/main.min.css';

    wp_enqueue_style( 'adanyeva-main', get_stylesheet_directory_uri() . '/main.min.css', filemtime( $script_filemtime ), true, 'all' );
    wp_enqueue_script( 'adanyeva-custom-script', get_stylesheet_directory_uri() . '/custom.min.js', array(), filemtime( $script_filemtime ), true );
}
add_action( 'wp_enqueue_scripts', 'adanyeva_scripts' );

/**
 * Add custom body class base on page slug
 *
 * @param string $classes
 * @return string $classes
 * @action body_class
 */
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
        }
    return $classes;
    }
add_filter( 'body_class', 'add_slug_body_class' );

/**
 *  Enqueue Styles for Admin DashoboaRD
 *
 * @action admin_enqueue_scripts
 */
function admin_style() {
    wp_enqueue_style('admin-styles', get_stylesheet_directory_uri() . '/admin-css/admin.css');
  }
  add_action('admin_enqueue_scripts', 'admin_style');

/**
 *  Enqueue Styles for Login
 *
 * @action login_enqueue_scripts
 */
function adanyeva_login_stylesheet() {

    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/admin-css/admin.css' );
}
add_action( 'login_enqueue_scripts', 'adanyeva_login_stylesheet' );

/**
 * Remove admin menu items for non super-admins
 *
 * @action admin_menu
 */
function remove_admin_menu_links(){
    $user = wp_get_current_user();
    if( $user && isset($user->user_email) && 'elpuas@gmail.com' != $user->user_email ) {
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'themes.php' );
    remove_menu_page( 'options-general.php' );
    remove_menu_page( 'plugins.php' );
    // remove_menu_page('users.php');
    remove_menu_page( 'edit-comments.php' );
    // remove_menu_page('page.php');
    remove_menu_page( 'upload.php' );
    // remove_menu_page( 'edit.php?post_type=page' ); 
    // remove_menu_page( 'edit.php?post_type=videos' );
    // remove_menu_page( 'edit.php' );
		
    }
}
add_action( 'admin_menu', 'remove_admin_menu_links' );
