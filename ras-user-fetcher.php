<?php

/**
 * @link              rasta.online
 * @since             1.0.0
 * @package           Ras_User_Fetcher
 *
 * @wordpress-plugin
 * Plugin Name:       RasUserFetcher
 * Plugin URI:        rasta.online
 * Description:       this plugin creates a custom user fetcher endpoint to retrieve external user data
 * Version:           1.0.0
 * Author:            Jens Krause
 * Author URI:        rasta.online
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}
require __DIR__ . '/vendor/autoload.php';

define('RAS_USER_FETCHER_VERSION', '1.0.0');


$PluginActivator = new Rasta\UserFetcher\Activator();

register_activation_hook(__FILE__, [$PluginActivator, 'activate']);
register_deactivation_hook(__FILE__, [$PluginActivator, 'deactivate']);
add_action('wp_enqueue_scripts', [$PluginActivator, 'loadScripts']);

$PluginApi = new Rasta\UserFetcher\Api();
//add_action('wp_ajax_nopriv_list-users', [$PluginApi, 'fetchUserRequest']);
add_action('wp_ajax_list-users', [$PluginApi, 'fetchUserRequest']);
add_action('wp_ajax_user-details', [$PluginApi, 'fetchUserDetails']);
add_action('wp_ajax_user-posts', [$PluginApi, 'fetchUserPosts']);
add_action('wp_ajax_user-todos', [$PluginApi, 'fetchUserTodos']);
add_action('wp_ajax_user-albums', [$PluginApi, 'fetchUserAlbums']);
