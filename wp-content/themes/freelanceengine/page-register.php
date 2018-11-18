<?php
/**
 * Template Name: Register Page Template
*/
global $post;
	get_header();
	if(!isset($_REQUEST['role'])){
?>
<div class="fre-page-wrapper">
	<div class="fre-page-section">
		<div class="container">
			<div class="fre-authen-wrapper">
				<div class="fre-register-default">
					<h2><?php _e('Sign Up Free Account', ET_DOMAIN)?></h2>
					<div class="fre-register-wrap">
						<div class="row">
							<div class="col-sm-6">
								<div class="register-employer">
									<h3><?php _e('Employer', ET_DOMAIN);?></h3>
									<p><?php _e('Post project, find freelancers and hire favorite to work.', ET_DOMAIN);?></p>
									<a class="fre-small-btn primary-bg-color" href="<?php echo  et_get_page_link( 'register',array('role' => EMPLOYER) );?>"><?php _e('Sign Up', ET_DOMAIN);?></a>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="register-freelancer">
									<h3><?php _e('Freelancer', ET_DOMAIN);?></h3>
									<p><?php _e('Create professional profile and find freelance jobs to work.', ET_DOMAIN);?></p>
									<a class="fre-small-btn primary-bg-color" href="<?php echo  et_get_page_link( 'register',array('role' => FREELANCER) );?>"><?php _e('Sign Up', ET_DOMAIN);?></a>
								</div>
							</div>
						</div>
					</div>
					<div class="fre-authen-footer">
						<?php
			                if(fre_check_register() && function_exists('ae_render_social_button')){
			                    $before_string = __("You can use social account to login", ET_DOMAIN);
			                    ae_render_social_button( array(), array(), $before_string );
			                }
			            ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	}else{
		$role = $_REQUEST['role'];
		$re_url = '';
		if( isset($_GET['ae_redirect_url']) ){
			$re_url = $_GET['ae_redirect_url'];
		}
?>
	<div class="fre-page-wrapper">
		<div class="fre-page-section">
			<div class="container">
				<div class="fre-authen-wrapper">
					<div class="fre-authen-register">
						<?php if($role == 'employer'){ ?>
								<h2><?php _e('Sign Up Employer Account', ET_DOMAIN);?></h2>
						<?php }else{ ?>
								<h2><?php _e('Sign Up Freelancer Account', ET_DOMAIN);?></h2>
						<?php } ?>
						<form role="form" id="signup_form">
							<input type="hidden" name="ae_redirect_url"  value="<?php echo $re_url ?>" />
							<input type="hidden" name="role" id="role" value="<?php echo $role;?>" />
							<?php
							//fa_v1.8.6.2
							do_action('before_register_field');
							?>
							<div class="fre-input-field">
										<!--///  mene77  ///-->
								<input type="text" name="first_name" id="first_name" placeholder="<?php _e('Your name', ET_DOMAIN);?>">     
							</div>
						<!--	<div class="fre-input-field">
								<input type="text" name="last_name" id="last_name" placeholder="<?php _e('Last Name', ET_DOMAIN);?>">
							</div>   -->    <!--///  mene77  ///-->
							<?php
							//fa_v1.8.6.2
							do_action('middle_register_field');
							?>
							<div class="fre-input-field">
								<input type="text" name="user_email" id="user_email" placeholder="<?php _e('Email', ET_DOMAIN);?>">
							</div>
                             <div class="fre-input-field">
                                <input type="text" name="user_login" id="user_login" placeholder="<?php _e('Username', ET_DOMAIN);?>">
                            </div> 
							<div class="fre-input-field">
								<input type="password" name="user_pass" id="user_pass" placeholder="<?php _e('Password', ET_DOMAIN);?>">
							</div>
                            <div class="fre-input-field">
                                <input type="password" name="repeat_pass" id="repeat_pass" placeholder="<?php _e('Confirm Your Password', ET_DOMAIN);?>">
                            </div>
							<?php
							//fa_v1.8.6.2
							do_action('after_register_field');
							?>

                            <?php
                            //fa_v1.8.6.2
                            $sms_status=ae_get_option('active_code_sms_template_status');
                            if(function_exists('ae_sms_add_settings' ) && $sms_status){  ?>
	                            <?php
	                            //fa_v1.8.6.2
	                            do_action('add_sms_step');
	                            ?>
                            <?php }else{ ?>
	                            <?php ae_gg_recaptcha( $container = 'fre-input-field' );?>
                                <div class="fre-input-field">
                                    <button class="probtnsabt fre-btn btn-submit primary-bg-color"><?php _e('Sign Up', ET_DOMAIN);?></button>
                                </div>
                            <?php } ?>

						</form>
						<?php
							$tos = et_get_page_link('tos', array() ,false);
			                $url_tos = '<a href="https://noorando.com/terms/" class="secondary-color" rel="noopener noreferrer" target="_Blank">'.__('Term of Use and Privacy policy', ET_DOMAIN).'</a>';
			                if($tos) {
			                	echo "<p>";
			                	printf(__('By signing up to create an account I accept the %s', ET_DOMAIN), $url_tos );
			                	echo "</p>";
			                }
						?>
						<div class="fre-authen-footer">
							<p><?php _e('Already have an account?', ET_DOMAIN);?> <a href="<?php echo et_get_page_link("login") ?>" class="secondary-color"><?php _e('Log In', ET_DOMAIN);?></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	}
	get_footer();