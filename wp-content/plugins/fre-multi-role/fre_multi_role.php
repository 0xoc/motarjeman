<?php
/*
Plugin Name: افزونه تغییر نقش کاربری فریلنس انجین فارسی
Plugin URI: http://farstheme.com/
Description: این افزونه ویژگی تغییر نقش کاربری را به فریلنس انجین فارسی اضافه می کند
Version: 2
Author: مرتضی لطفی نژاد
Author URI: http://farstheme.com/
Text Domain: farstheme
*/

/**
 * add js file
 * By Morteza Lotfi Nejad
 */
add_action('wp_enqueue_scripts', 'change_role_script', 100);
function change_role_script()
{
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_script('change_role_script_handle', $plugin_url . '/assets/js/change-role.js', array(
		'jquery',
		'underscore',
		'backbone',
		'appengine',
		'front'
	), ET_VERSION, true);

	wp_enqueue_style( 'style1', $plugin_url . '/assets/css/style.css' );
}



/**
 * change user role
 * By Morteza Lotfi Nejad
 */
add_action('wp_ajax_change_role_profile', 'change_role_profile');
function change_role_profile()
{
	global $current_user;
	//if set freelancer
	if ($_POST['role'] == 'freelancer') {

		$user = new WP_User($current_user->ID);
		$user->set_role('freelancer');

	} else {
		//if set employer
		$user = new WP_User($current_user->ID);
		$user->set_role('employer');
	}

	die();
}


/**
 * add multi role box to top profile
 */
add_action('before_profile_box', 'add_multi_role_to_profile');
function add_multi_role_to_profile(){ ?>
	<?php
	global $current_user;
	if($current_user->caps['freelancer']==1){
		$checked='';
	}else if($current_user->caps['employer']==1){
		$checked='checked';
	}
	if(!isset($current_user->caps['administrator'])|| $current_user->caps['administrator']!=1){

		?>

		<div class="fre-profile-box change-role-box">
			<div class="profile-employer-secure-wrap active">

				<h2>تغییر نقش کاربری</h2>

			</div>
			<div class="profile-secure-code-wrap">
				<div class="fre-input-field">
					<label class="employer-title"><?php _e( 'Employer', ET_DOMAIN ) ?></label>
					<label for="fre-switch-user-role" class="fre-switch">
						<input id="fre-switch-user-role"
						       type="checkbox" <?php echo $checked; ?>>
						<div class="fre-switch-slider">
						</div>
					</label>
					<label class="freelancer-title"><?php _e( 'Freelancer', ET_DOMAIN ) ?></label>
				</div>
			</div>
		</div>
		<!--End Add By morteza -->
	<?php } ?>

<?php
}


