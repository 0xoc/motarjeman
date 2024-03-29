<?php
/*
Plugin Name: FrE Private Message
Plugin URI: http://farstheme.com/
Description: این افزونه سیستم پیام خصوصی را به فریلنس انجین اضافه خواهد کرد
Version: 1.2.1
Author: مرتضی لطفی نژاد - 09178766504
Author URI: http://farstheme.com/
License: GPLv2
Text Domain: farstheme
*/
/**
 * init email template when active plugin
 * @param void
 * @return void
 * @since 1.0
 * @package FREELANCEENGINE
 * @category PRIVATE MESSAGE
 * @author Tambh
 * translate By morteza
 */
function ae_private_message_activate(){
    update_option('ae_private_message_mail_template', '<p>سلام [display_name]</p><p>شما پیام جدیدی از [from_user] بر روی [blogname] دریافت کرده اید.<p>پیام: [private_message]</p>شما می توانید بوسیله این لینک آن را ببینید: [message_link]</p>');
    ae_private_message_add_cap();
}
/**
 * add cap to edit conversation of user
 * @param void
 * @return void
 * @since 1.0
 * @package FREELANCEENGINE
 * @category PRIVATE MESSAGE
 * @author Tambh
 */
function ae_private_message_add_cap(){
    $employer = get_role( EMPLOYER );
    $freelancer = get_role( FREELANCER );
    $employer->add_cap( 'edit_others_ae_private_message' );
    $freelancer->add_cap( 'edit_others_ae_private_message' );
}
register_activation_hook( __FILE__, 'ae_private_message_activate' );
/**
* Run this plugin after setup theme
* @param void
* @return void
* @since 1.0
* @package AE_ESCROW
* @category STRIPE
* @author Tambh
*/
function require_plugin_file()
{
    if(!class_exists('AE_Base') ){
        return 0;
    }
    add_action( 'wp_enqueue_scripts', 'ae_plugin_enqueue_scripts' );
    require_once dirname(__FILE__) . '/settings.php';
    require_once dirname(__FILE__) . '/template.php';
    require_once dirname(__FILE__) . '/functions.php';
    require_once dirname(__FILE__) . '/class-private-message-posttype.php';
    require_once dirname(__FILE__) . '/class-private-message-actions.php';
    require_once dirname(__FILE__) . '/class-ae-search.php';
    require_once dirname(__FILE__) . '/update.php';
    if( !defined ( 'ET_DOMAIN' ) ){
        define( 'ET_DOMAIN', 'enginetheme' );
    }
    $ae_private_message = AE_Private_Message_Posttype::getInstance();
    $ae_private_message->init();
    $ae_private_message_action = AE_Private_Message_Actions::getInstance();
    $ae_private_message_action->init();
}
add_action('after_setup_theme', 'require_plugin_file');
/**
* Enqueue script for private message
* @param void
* @return void
* @since 1.0
* @package FREELANCEENGINE
* @category PRIVATE MESSAGE
* @author Tambh
*/
function ae_plugin_enqueue_scripts(){
    global $user_ID;
    wp_enqueue_style('ae_plugin_css', plugin_dir_url(__FILE__) . 'assets/plugincss.css', array(), '1.0');
    wp_enqueue_style('mCustomScrollbar_css', plugin_dir_url(__FILE__) . 'assets/jquery.mCustomScrollbar.css', array(), '1.0');
    wp_enqueue_script('mCustomScrollbar', plugin_dir_url(__FILE__) . 'assets/jquery.mCustomScrollbar.min.js', array(
        'underscore',
        'backbone',
        'appengine',
        'front'
    ), '1.0', true);
    wp_enqueue_script('ae_plugin_js', plugin_dir_url(__FILE__) . 'assets/pluginjs.js', array(
        'underscore',
        'backbone',
        'appengine',
        'front'
    ), '1.0', true);
    wp_localize_script('ae_plugin_js', 'ae_plugin_globals', array(
        'no_message' => __('<li class="no-result"><span class="no-message">No messages found. <br/>
Please come back to your bidders list to start a new conversation.</span></li>', ET_DOMAIN),
        'no_reply' => __('<span class="no-message">No messages found. <br/>
Please come back to your bidders list to start a new conversation.</span>', ET_DOMAIN),
        'user_ID' => $user_ID,
        'is_mobile'=> et_load_mobile(),
        'private_message_link'=> et_get_page_link('private-message')
    ));
}
/**
 * hook to add translate string to plugins
 *
 * @param Array $entries Array of translate entries
 * @return Array $entries
 * @since 1.0
 * @author Dakachi
 */
function ae_plugin_add_translate_string ($entries) {
    $lang_path = dirname(__FILE__).'/lang/default.po';
    if(file_exists($lang_path)) {
        $pot        =   new PO();
        $pot->import_from_file($lang_path);
        return  array_merge($entries, $pot->entries);
    }
    return $entries;
}
add_filter( 'et_get_translate_string', 'ae_plugin_add_translate_string' );