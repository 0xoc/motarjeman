<?php
/*
Plugin Name: افزونه پیامک فریلنس انجین
Plugin URI: http://farstheme.com/
Description: این افزونه سیستم پیامک را به فریلنس انجین اضافه میکند
Version: 6.3
Author: 09178766504|مرتضی لطفی نژاد
Author URI: http://farstheme.com/
License: GPLv2
Text Domain: farstheme
*/
include( plugin_dir_path( __FILE__ ) . 'Classes/inc.php');
/**
 * add settings
 */
if( !function_exists('ae_sms_add_settings' ) ){
    function ae_sms_add_settings( $pages ){
        $options = AE_Options::get_instance();
	    $sections = array();

        $sections[] = array(
            'args'   => array(
                'title' => 'پنل های پیامکی',
                'id'    => 'sms-settings',
                'icon'  => 'w',
                'class' => ''
            ),
            'groups' => array(
	            array(
		            'args' => array(
			            'title' => "تنظیمات عمومی" ,
			            'id' => 'sms-panel-type',
			            'class' => '',
			            'desc' => "پنل پیامکی مورد نظر خودتون رو انتخاب کنید"
		            ) ,
		            'fields' => array(
			            array(
				            'id' => 'sms_panel_type',
				            'type' => 'select',
				            'title' =>"" ,
				            'name' => 'sms_panel_type',
				            'class' => '',
				            'default'=>'SMSIR',
				            'data' => array(
					            'SMSIR' => 'پنل پبامک sms.ir' ,
					            'MPKIR' => 'پنل ملی پیامک (melipayamak.ir)',
					            'FRZSMS' => 'پنل فراز اس ام اس (farazsms.com)',
				            )
			            ),
			            array(
				            'id' => 'admin_mobile_number',
				            'type' => 'text',
				            'name' => 'admin_mobile_number',
				            'class' => '',
				            'label' => 'شماره همراه مدیر' ,
				            'placeholder' => "شماره همراه مدیر را وارد نمایید" ,
			            ),
		            )
	            ),
                array(
                    'args'   => array(
                        'title' => "تنظیمات پنل sms.ir",
                        'id'    => 'fre_sms',
                        'class' => '',
                        'desc'  => " برای بدست آوردن کلید وب سرویس و کد امنیتی در سایت sms.ir بعد از وارد شدن به پنل کاربری به منوی (برنامه نویسان->کلید وب سرویس) رفته در قسمت کد امنیتی کد مورد نظر خودرا وارد کرده(مثال: GD#@%123) و سپس بر روی دکمه ایجاد کلید زده تا کلید وب سرویس به شما داده شود. <br><br> برای بدست آوردن شماره پیامک ارسال کننده به (منوی تنظیمات -> تغییر شماره پیشفرض) بروید."
                    ),
                    'fields' => array(
                        array(
                            'id'          => 'SMSIR_APIKey',
                            'type'        => 'text',
                            'name'        => 'SMSIR_APIKey',
                            'class' => '',
                            'label'       => "کلید وب سرویس",
                            'placeholder' => "کلید وب سرویس را در این قسمت وارد نمایید",
                        ),
                        array(
                            'id'          => 'SMSIR_SecretKey',
                            'type'        => 'text',
                            'name'        => 'SMSIR_SecretKey',
                            'class' => '',
                            'label'       => "کد امنیتی",
                            'placeholder' => "کد امنیتی را در این قسمت وارد نمایید",
                        ),
                        array(
                            'id'          => 'SMSIR_LineNumber',
                            'type'        => 'text',
                            'name'        => 'SMSIR_LineNumber',
                            'class' => '',
                            'label'       => "شماره پیامک ارسال کننده",
                            'placeholder' => "شماره خط ارسال کننده پیام را در این قسمت وارد نمایید",
                        ),
	                    array(
		                    'id'          => '',
		                    'type'        => 'desc',
		                    'name'        => '',
		                    'class' => '',
		                    'text'       => 'وضعیت: '.(!empty(sms_get_credit('SMSIR')) ? '<span style="color:#56903c ;">'.sms_get_credit('SMSIR').' پیامک </span>' : '<span style="color: #B80000">فعال نیست</span>'),
	                    )

                    ),

                ),
	            array(
		            'args'   => array(
			            'title' => "تنظیمات پنل ملی پیامک (melipayamak.ir)",
			            'id'    => 'fre_sms',
			            'class' => '',
			            'desc'  => ''
		            ),
		            'fields' => array(
			            array(
				            'id'          => 'MPKIR_userName',
				            'type'        => 'text',
				            'name'        => 'MPKIR_userName',
				            'class' => '',
				            'label'       => "نام کاربری",
			            ),
			            array(
				            'id'          => 'MPKIR_password',
				            'type'        => 'text',
				            'name'        => 'MPKIR_password',
				            'class' => '',
				            'label'       => "رمز عبور",

			            ),
			            array(
				            'id'          => 'MPKIR_lineNumber',
				            'type'        => 'text',
				            'name'        => 'MPKIR_lineNumber',
				            'class' => '',
				            'label'       => "شماره پیامک ارسال کننده",
				            'placeholder' => "شماره خط ارسال کننده پیام را در این قسمت وارد نمایید",
			            ),
			            array(
				            'id'          => '',
				            'type'        => 'desc',
				            'name'        => '',
				            'class' => '',
//				            'text'       => 'موجودی اعتبار: <b>'.sms_get_credit('MPKIR').'<b> ',
				            'text'       => 'وضعیت: '.(!empty(sms_get_credit('MPKIR')) ? '<span style="color:#56903c ;">'.sms_get_credit('MPKIR').'</span>' : '<span style="color: #B80000">فعال نیست</span>'),
			            )

		            ),

	            ),
	            array(
		            'args'   => array(
			            'title' => "تنظیمات پنل فراز اس ام اس (farazsms.com)",
			            'id'    => 'fre_sms',
			            'class' => '',
			            'desc'  => ''
		            ),
		            'fields' => array(
			            array(
				            'id'          => 'FRZSMS_userName',
				            'type'        => 'text',
				            'name'        => 'FRZSMS_userName',
				            'class' => '',
				            'label'       => "نام کاربری",
			            ),
			            array(
				            'id'          => 'FRZSMS_password',
				            'type'        => 'text',
				            'name'        => 'FRZSMS_password',
				            'class' => '',
				            'label'       => "رمز عبور",

			            ),
			            array(
				            'id'          => 'FRZSMS_lineNumber',
				            'type'        => 'text',
				            'name'        => 'FRZSMS_lineNumber',
				            'class' => '',
				            'label'       => "شماره پیامک ارسال کننده",
				            'placeholder' => "شماره خط ارسال کننده پیام را در این قسمت وارد نمایید",
			            ),
			            array(
				            'id'          => '',
				            'type'        => 'desc',
				            'name'        => '',
				            'class' => '',
//				            'text'       => 'موجودی اعتبار: <b>'.sms_get_credit('FRZSMS').'<b> ',
				            'text'       => 'وضعیت: '.(!empty(sms_get_credit('FRZSMS')) ? '<span style="color:#56903c ;">'.sms_get_credit('FRZSMS').'</span>' : '<span style="color: #B80000">فعال نیست</span>')
			            )

		            ),

	            ),
            )
        );

	    $sections[] = array(
		    'args'   => array(
			    'title' => 'قالب های پیامک',
			    'id'    => 'sms-template',
			    'icon'  => 'q',
			    'class' => ''
		    ),
		    'groups' => array(
			    array(
				    'args' => array(
					    'title' => 'قالب پیامک ها' ,
					    'id' => 'private-message-mail-description-group',
					    'class' => '',
					    'name' => ''
				    ) ,
				    'fields' => array(
					    array(
						    'id' => 'mail-description',
						    'type' => 'desc',
						    'title' => __("Mail description here", ET_DOMAIN) ,
						    'text' => __("Email templates for new message. You can use placeholders to include some specific content.", ET_DOMAIN) . '<a class="icon btn-template-help payment" data-icon="?" href="#" title="View more details"></a>' . '<div class="cont-template-help payment-setting">
                                                     [user_login],[display_name],[user_email] : ' . __("user's details you want to send mail", ET_DOMAIN) . '<br />
                                                     [dashboard] : ' . __("member dashboard url ", ET_DOMAIN) . '<br />
                                                     [title], [link], [excerpt],[desc], [author] : ' . __("project title, link, details, author", ET_DOMAIN) . ' <br />
                                                     [activate_url] : ' . __("activate link is require for user to renew their pass", ET_DOMAIN) . ' <br />
                                                     [site_url],[blogname],[admin_email] : ' . __(" site info, admin email", ET_DOMAIN) . '
                                                     [project_list] : ' . __("list projects employer send to freelancer when invite him to join", ET_DOMAIN) . '
                                                 </div>',
						    'class' => '',
						    'name' => 'mail_description'
					    )
				    )
			    ),
			    //Send active code to user
			    array(
				    'args' => array(
					    'title' => 'الگوی پیامک کد فعال سازی' ,
					    'id' => '',
					    'class' => 'payment-gateway',
					    'desc' => "اگر این گزینه فعال شود ثبت نام دو مرحله ای خواهد شد.در مرحله اول اطلاعات و در مرحله دوم کد تایید باید وارد شود",
				    ) ,
				    'fields' => array(
					    array(
						    'id' => 'active_code_sms_template_status',
						    'type' => 'switch',
						    'name' => 'active_code_sms_template_status',
						    'class' => ''
					    ),
					    array(
						    'id' => 'active_code_sms_template',
						    'type' => 'editor',
						    'title' => "" ,
						    'name' => 'active_code_sms_template',
						    'class' => '',
						    'reset' => 1
					    )
				    )
			    ),
			    //Send to admin when the site has a new payment
			    array(
				    'args' => array(
					    'title' => 'الگوی پیامک اعلان بررسی پرداخت' ,
					    'id' => '',
					    'class' => 'payment-gateway',
					    'desc' => 'ارسال به مدیر زمانی این سایت دارای یک پرداخت جدید است.',
				    ) ,
				    'fields' => array(
					    array(
						    'id' => 'new_payment_sms_template_status',
						    'type' => 'switch',
						    'name' => 'new_payment_sms_template_status',
						    'class' => ''
					    ),
					    array(
						    'id' => 'new_payment_sms_template',
						    'type' => 'editor',
						    'title' => __("Review payment notification", ET_DOMAIN) ,
						    'name' => 'new_payment_sms_template',
						    'class' => '',
						    'reset' => 1
					    )
				    )
			    ),
			    //Send to user when he has a new message on workspace.
			    array(
				    'args' => array(
					    'title' => 'قالب پیامک پیام جدید' ,
					    'id' => '',
					    'class' => '',
					    'desc' => 'وقتی که کاربر در فضای کاری پیام جدید دریافت میکند برایش ارسال کن',
				    ) ,
				    'fields' => array(
					    array(
						    'id' => 'new_message_sms_template_status',
						    'type' => 'switch',
						    'name' => 'new_message_sms_template_status',
						    'class' => ''
					    ),
					    array(
						    'id' => 'new_message_sms_template',
						    'type' => 'editor',
						    'title' => __("Inbox Mail", ET_DOMAIN) ,
						    'name' => 'new_message_sms_template',
						    'class' => '',
						    'reset' => 1
					    )
				    )
			    ),
			    //Send to user when someone invites him join a project.
			    array(
				    'args' => array(
					    'title' => 'قالب پیامک دعوت نامه' ,
					    'id' => '',
					    'class' => '',
					    'desc' => 'وقتی که کسی کاربر را برای پروژه ای دعوت کرد برایش ارسال کن',
				    ) ,
				    'fields' => array(
					    array(
						    'id'    => 'invite_sms_template_status',
						    'type'  => 'switch',
						    'name'  => 'invite_sms_template_status',
						    'class' => ''
					    ),
					    array(
						    'id'    => 'invite_sms_template',
						    'type'  => 'editor',
						    'title' => __( "Invite Mail", ET_DOMAIN ),
						    'name'  => 'invite_sms_template',
						    'class' => '',
						    'reset' => 1
					    )

				    )
			    ),
			    //Sent to users when a candidate bid their projects.
			    array(
				    'args' => array(
					    'title' => 'قالب پیامک پیشنهاد جدید' ,
					    'id' => '',
					    'class' => '',
					    'desc' => 'ارسال به کاربران زمانی که فرد مورد نظر در مورد پروژه شان پیشنهاد می دهد.',
				    ) ,
				    'fields' => array(
					    array(
						    'id' => 'bid_sms_template_status',
						    'type' => 'switch',
						    'name' => 'bid_sms_template_status',
						    'class' => ''
					    ),
					    array(
						    'id' => 'bid_sms_template',
						    'type' => 'editor',
						    'title' => __("Bid Mail", ET_DOMAIN) ,
						    'name' => 'bid_sms_template',
						    'class' => '',
						    'reset' => 1
					    )
				    )
			    ),
			    //Send to freelancer when his bid was accepted.
			    array(
				    'args' => array(
					    'title' => 'قالب پیامک پذیرفته شدن پیشنهاد' ,
					    'id' => '',
					    'class' => '',
					    'desc' => 'فرستاد به فریلنسر زمانی که پیشنهادش پذیرفته شد.',
				    ) ,
				    'fields' => array(
					    array(
						    'id' => 'bid_accepted_sms_template_status',
						    'type' => 'switch',
						    'name' => 'bid_accepted_sms_template_status',
						    'class' => ''
					    ),
					    array(
						    'id' => 'bid_accepted_sms_template',
						    'type' => 'editor',
						    'title' => __("Bid Accepted Mail", ET_DOMAIN) ,
						    'name' => 'bid_accepted_sms_template',
						    'class' => '',
						    'reset' => 1
					    )
				    )
			    ),
			    //Send to the freelancer when employer finished a project
			    array(
				    'args' => array(
					    'title' => 'قالب پیامک پروژه توسط کارفرما به پایان رسید' ,
					    'id' => '',
					    'class' => '',
					    'desc' => 'ارسال به فریلنسر زمانی که کارفرما پروژه ای را تمام می کند.',
				    ) ,
				    'fields' => array(
					    array(
						    'id' => 'complete_sms_template_status',
						    'type' => 'switch',
						    'name' => 'complete_sms_template_status',
						    'class' => ''
					    ),
					    array(
						    'id' => 'complete_sms_template',
						    'type' => 'editor',
						    'title' => __("Complete Mail", ET_DOMAIN) ,
						    'name' => 'complete_sms_template',
						    'class' => '',
						    'reset' => 1
					    )
				    )
			    ),
			    //Send to employer when freelancer reviews and rate for him
			    array(
				    'args' => array(
					    'title' => 'ارسال اعلان به کارفرما زمانی که فریلنسر بررسی و امتیاز دهی را انجام می دهد' ,
					    'id' => '',
					    'class' => '',
					    'desc' => 'ارسال به کارفرما زمانی که فریلنسر بررسی و امتیاز دهی را انجام می دهد',
				    ) ,
				    'fields' => array(
					    array(
						    'id' => 'review_for_employer_sms_template_status',
						    'type' => 'switch',
						    'name' => 'review_for_employer_sms_template_status',
						    'class' => ''
					    ),
					    array(
						    'id' => 'review_for_employer_sms_template',
						    'type' => 'editor',
						    'title' => __("Notify employer when freelancer review for employer.", ET_DOMAIN) ,
						    'name' => 'review_for_employer_sms_template',
						    'class' => '',
						    'reset' => 1
					    )
				    )
			    ),
			    //Send to freelancers when a new project which related to his profile category is posted.
			    array(
				    'args' => array(
					    'title' => 'قالب پیامک پروژه جدید' ,
					    'id' => '',
					    'class' => '',
					    'desc' => 'پروژه های جدیدی که با دسته بندی پروفایل فریلنسر مطابقت می کند برایش ارسال کن.',
				    ) ,
				    'fields' => array(
					    array(
						    'id' => 'new_project_sms_template_status',
						    'type' => 'switch',
						    'name' => 'new_project_sms_template_status',
						    'class' => ''
					    ),
					    array(
						    'id' => 'new_project_sms_template',
						    'type' => 'editor',
						    'title' => __("New Project Mail", ET_DOMAIN) ,
						    'name' => 'new_project_sms_template',
						    'class' => '',
						    'reset' => 1
					    )
				    )
			    ),
			    //Send to freelancer when employer finishes his project, the payment is successful sent.
			    array(
				    'args' => array(
					    'title' => 'اطلاع به فریلنسر زمانی که پرداخت فرستاده شد - غیر فعال کردن انتقال دستی مبلغ.' ,
					    'id' => '',
					    'class' => '',
					    'desc' =>'زمانی که کارفرما کار را به اتمام می رساند، موفق بودن پرداخت را به اطلاع فریلنسر برسان.',
				    ) ,
				    'fields' => array(
					    array(
						    'id' => 'fre_notify_freelancer_sms_template_status',
						    'type' => 'switch',
						    'name' => 'fre_notify_freelancer_sms_template_status',
						    'class' => ''
					    ),
					    array(
						    'id' => 'fre_notify_freelancer_sms_template',
						    'type' => 'editor',
						    'title' => __("Notify freelancer when the payment is sent - Disable manual transfer.", ET_DOMAIN) ,
						    'name' => 'fre_notify_freelancer_sms_template',
						    'class' => '',
						    'reset' => 1
					    )
				    )
			    ),

		    )
	    );

	    $temp = array();
	    foreach ($sections as $key => $section) {
		    $temp[] = new AE_section($section['args'], $section['groups'], $options);
	    }

        $sms_setting = new AE_container(array(
            'class' => 'sms-settings',
            'id' => 'settings',
        ) , $temp, $options);
        $pages[] = array(
            'args' => array(
                'parent_slug' => 'et-overview',
                'page_title' =>"پیامک",
                'menu_title' =>"پیامک",
                'cap' => 'administrator',
                'slug' => 'ae-sms',
                'icon' => 'w',
                'desc' => "تنظیمات پنل پیامک در این قسمت قرار می گیرد"
            ) ,
            'container' => $sms_setting
        );
        return $pages;
    }
}
add_filter('ae_admin_menu_pages', 'ae_sms_add_settings');

/**
 * add to user profile
 */
function mobile_to_profile(){
    global $user_ID;
    ?>
    <div class="form-group">
        <div class="fre-input-field">
            <input type="text" class="fieldechange form-control" id="mobile" name="mobile" value="<?php echo get_user_meta( $user_ID, 'mobile', true ); ?>" placeholder="شماره موبایل *">  <!-- mene77  fieldechange -->
        </div>
    </div>
    <div class="clearfix"></div>
    <?php
}
add_action('ae_profile_fields', 'mobile_to_profile');


/**
 * add to register
 */
function mobile_to_register(){
    ?>
    <div class="fre-input-field">
        <input type="text" name="mobile" id="mobile" placeholder="موبایل" required>
    </div>
    <?php
}
add_action('middle_register_field', 'mobile_to_register');


/**
 * add to register
 */
function add_sms_step_register(){
	?>
    <div class="fre-input-field">
        <span id="errorFile" style="text-align: center;color:#e81010;"></span>
        <a class="fre-btn btn-step2 primary-bg-color" data-send="0">رفتن به مرحله بعد</a>
    </div>

    <fieldset id="approve_mobile" class="hidden">
        <div class="fre-input-field">
            <span> کد 6 رقمی که به همراه شما ارسال شده در قسمت پایین وارد نمایید و دکمه ثبت نام را بزنید</span>
            <input type="text" style="text-align: center;font-size: 36px;" name="sms_active_code" id="sms_active_code" placeholder="کد 6 رقمی">
            <style>
                #send-active-code{
                    cursor: pointer
                }
                #sms-timer{
                    width: 50%;
                    text-align: left;
                    float: right;
                    margin-top: 14px;
                    font-size: 20px
                }
            </style>
            <span style="margin-top: 10px">

                                            <span style="width: 50%;float: right;margin-top: 10px" ><button class="btn btn-secondary" id="send-active-code" style="margin-bottom: 20px;">ارسال مجدد کد تایید</button></span>
                                            <span id="sms-timer">60 ثانیه</span>
                                        <div class="row" style="clear: both;" id="status-active-code"></div>
                                    </span>

        </div>
		<?php ae_gg_recaptcha( $container = 'fre-input-field' );?>
        <div class="fre-input-field">
            <button disabled="disabled" class="fre-btn btn-submit primary-bg-color"><?php _e('Sign Up', ET_DOMAIN);?></button>
            <a class="fre-btn btn-step1 primary-bg-color">بازگشت به مرحله 1</a>
        </div>
    </fieldset>
	<?php
}
add_action('add_sms_step', 'add_sms_step_register');


/**
 * @param $request
 * add mobile to user info
 */
function insert_mobile_profile($request){
    global $user_ID;
    if ( isset( $request['mobile'] ) and ! empty( $request['mobile'] ) ) {
        update_user_meta($user_ID, 'mobile',$request['mobile']);
    }
}
add_action('insert_mobile_profile', 'insert_mobile_profile');




/**
 * @param $mobile
 * @param $message
 * @param array $filter
 * @return mixed
 */

function send_message($mobile,$message, $filter = array()){
	$smsPanel=ae_get_option('sms_panel_type');//mobile number admin

    switch ($smsPanel){
        case 'SMSIR';
            $status=send_by_sms_ir($mobile,$message, $filter);
            return $status;
        break;
        case 'MPKIR';
	        $status=send_by_melipayamak_ir($mobile,$message, $filter );
	        return $status;
	    break;
	    case 'FRZSMS';
		    $status=send_by_farazsms_com($mobile,$message, $filter );
		    return $status;
		    break;
        default:
	    break;
    }
}

function sms_get_credit($smsPanel){
	switch ($smsPanel){
		case 'SMSIR';
			 return get_credit_sms_ir();
			break;
		case 'MPKIR';
			return get_credit_melipayamak_ir();
			break;
		case 'FRZSMS';
			return get_credit_farazsms_com();
			break;
		default:
			break;
	}
}



/**
 * @param $content
 * @param $user_id
 * @param string $active_link
 * @return mixed
 */
function filter_authentication_placeholder( $content, $user_id, $active_link = '' ) {
    $user = new WP_User( $user_id );

    /**
     * member user login, username
     */
    $content = str_ireplace( '[user_login]', $user->user_login, $content );
    $content = str_ireplace( '[user_name]', $user->user_login, $content );
    $content = str_ireplace( '[active_link]', $active_link, $content );

    // user nicename plaholder
    $content = str_ireplace( '[user_nicename]', ucfirst( $user->user_nicename ), $content );

    //member email
    $content = str_ireplace( '[user_email]', $user->user_email, $content );

    /**
     * member display name
     */
    $content = str_ireplace( '[display_name]', ucfirst( $user->display_name ), $content );
    $content = str_ireplace( '[member]', ucfirst( $user->display_name ), $content );

    /**
     * author posts link
     */
    $author_link =  get_author_posts_url( $user_id ) ;
    $content     = str_ireplace( '[author_link]', $author_link, $content );

    $confirm_link = add_query_arg( array(
        'act' => 'confirm',
        'key' => md5( $user->user_email )
    ), home_url() );

    $confirm_link = $confirm_link;

    /**
     * confirm link
     */
    $content = str_ireplace( '[confirm_link]', $confirm_link, $content );

    /**
     * filter mail content et_filter_auth_email
     *
     * @param String $content mail content will be filter
     * @param id $user_id The user id who the email will be sent to
     */
    $content = apply_filters( 'ae_filter_auth_email', $content, $user_id );

    return $content;
}

/**
 * @param $content
 * @param string $post_id
 * @return mixed
 */
function filter_post_placeholder( $content, $post_id = '' ) {
    if ( ! $post_id ) {
        return $content;
    }
    $post = get_post( $post_id );

    if ( ! $post || is_wp_error( $post ) ) {
        return $content;
    }


    $title = apply_filters( 'the_title', $post->post_title );

    /**
     * post content
     */
    $content = str_ireplace( '[title]', $title, $content );
    $content = str_ireplace( '[desc]', apply_filters( 'the_content', $post->post_content ), $content );
    $content = str_ireplace( '[excerpt]', apply_filters( 'the_excerpt', $post->post_excerpt ), $content );
    $content = str_ireplace( '[author]', get_the_author_meta( 'display_name', $post->post_author ), $content );

    /**
     * post link
     */
	$post_link=wp_get_shortlink($post_id, 'post',true );
//    $post_link = get_permalink( $post_id );
    $content   = str_ireplace( '[link]', $post_link, $content );

    /**
     * author posts link
     */
    $author_link = get_author_posts_url( $post->post_author );
    $content     = str_ireplace( '[author_link]', $author_link, $content );

    /**
     * filter mail content et_filter_ad_email
     *
     * @param String $content mail content will be filter
     * @param id $user_id The post id which the email is related to
     */
    $content = apply_filters( 'ae_filter_post_email', $content, $post_id );

    return $content;
}

/**
 * @param sms_templates
 * @return mixed
 */
function fre_sms_default_message($sms_template){
	$sms_template['active_code_sms_template']               = "<p>کد فعالسازی شما: [active_code]</p><p>[blogname]</p>";
    $sms_template['new_payment_sms_template']               = "<p>سلام مدیر,</p><p>[user_name] بسته [package_name] درسایت شما خرید.</p>";
    $sms_template['new_message_sms_template']               = "<p>سلام [display_name],</p><p>شما پیام جدیدی بر روی پروژه [title] دریافت کرده اید. جزییات:</p><p>[message]</p><p>همه پیام ها در [workspace]</p><p>با احترام,<br>[blogname]</p>";
    $sms_template['invite_sms_template']                    = "<p>سلام [display_name],</p> <p>شما دعوت نامه ای از  [blogname] برای پیوستن به پروژه ای دریافت کردید</p><p>لینک پروژه : [link]</p><p>با احترام,<br />[blogname]</p>";
    $sms_template['bid_sms_template']                       = "<p>سلام [display_name],</p><p>پیشنهاد جدید بر روی : [title].</p><p>پیام فریلنسر : [message].</p><p>اطلاعات بیشتر : [link]</p><p>با احترام,</p><p>[blogname]</p>";
    $sms_template['bid_accepted_sms_template']              = "<p>سلام [display_name],</p><p>پیشنهاد شما بر پروژه [link] پذیرش شد.</p><p>برای گفتگو با کارفرما به [workspace] وارد شوید</p><p>[blogname]</p>";
    $sms_template['complete_sms_template']                  = '<p>سلام,</p><p>[employer] وضعیت پروژه <b>[title]</b> را به "اتمام شده"  تغییر داد </p><p>بررسی و امتیاز:</p><p>[link_review]</p><p>با احترام,<br />[blogname]</p>';
    $sms_template['review_for_employer_sms_template']       = '<p>سلام, </p><p>[freelance] از پروژه [link] بازدید کرد و به شما رای داد.</p><p>:جزییات پروژه</p><p>[link_profile]</p><p>با احترام, <br>[blogname]</p>';
    $sms_template['new_project_sms_template']               = "<p>سلام,</p><p>امروز کار جدید برای شما وجود دارد. برای ارسال پیشنهاد به پروژه [project_link] عجله نمایید</p><p>با امید روزی پر برکت</p>";
    $sms_template['fre_notify_freelancer_sms_template']     = '<p>سلام, </p><p>پروژه با عنوان [title] کامل شد و مبلغ آن به حساب شما اضافه شد لطفا از اضافه شدن هزینه به حساب خود مطمئن شوید</p><p>بازدید از پروژه و ارسال دیدگاه به [employer]:</p><p>[link]</p><p>با احترام, <br>[blogname]</p>';

    return $sms_template;
}
add_filter('fre_default_setting_option', 'fre_sms_default_message');


/**
 * edit for admin profile
 */
add_action( 'edit_user_profile', 'add_user_information_to_admin_profile' );
function add_user_information_to_admin_profile( $user ){

    $mobile=get_user_meta($user->ID, 'mobile',true);
    echo '<h3 class="heading">اطلاعات ضروری</h3>';

    ?>

    <table class="form-table">
        <tr>
            <th><label for="contact">شماره همراه</label></th>
            <td><input type="text" class="regular-text form-control" name="mobile" id="mobile" value="<?php echo $mobile ?>" /></td>

        </tr>

    </table>

    <?php
}


/**
 * update user meta for mobile
 */
add_action( 'edit_user_profile_update', 'save_user_information_from_admin_profile' );

function save_user_information_from_admin_profile( $user_id )
{

    update_user_meta($user_id, 'mobile', $_POST['mobile']);
}

/**
 * add js file
 */
add_action('wp_enqueue_scripts', 'fre_sms_script', 100);
function fre_sms_script()
{
	wp_enqueue_script('fre_sms_script_handle', plugins_url( '/assets/js/fre_sms.js', __FILE__ ), array(
		'jquery'
	), ET_VERSION, true);
}


/**
 * send active code
 */
add_action( 'wp_ajax_nopriv_sms_send_active_code', 'sms_send_active_code' );
add_action( 'wp_ajax_sms_send_active_code', 'sms_send_active_code' );
function sms_send_active_code(){
    global $wpdb;
   $mobile=$_POST['mobile'];

	$sms_status=ae_get_option('active_code_sms_template_status');
	$sms_template=ae_get_option('active_code_sms_template');
	if($sms_status){

	    $random_code=$six_digit_random_number = mt_rand(100000, 999999);
		$sms = $sms_template;
		$sms = str_replace( '[active_code]',$random_code, $sms );

		$table_name = $wpdb->prefix . 'fre_sms';

		$mylink = $wpdb->get_row( "SELECT * FROM $table_name WHERE mobile = $mobile", ARRAY_A );
		if($mylink){
			$insert_db=$wpdb->update($table_name,array('code' => $random_code),array( 'mobile' =>$mobile ));
        }else{
			$insert_db=$wpdb->insert($table_name,array('mobile' => $mobile,'code' => $random_code),array('%s','%d'));
        }

		if($insert_db){
			 $status=send_message($mobile,$sms,null);
            if($status){
                echo 1;
            }else{
                echo 0;
            }
        }

	}

    die();
}


/**
 * start insert database
 */
global $fre_sms_db_version;
$fre_sms_db_version = '1.0';

add_action( 'plugins_loaded', 'fre_sms_update_db_check' );
function fre_sms_update_db_check() {
	global $fre_sms_db_version;
	if ( get_site_option( 'fre_sms_db_version' ) != $fre_sms_db_version ) {
		fre_sms_tbl_install();
	}
}

//register_activation_hook( __FILE__, 'fre_sms_tbl_install' );
function fre_sms_tbl_install() {
	global $wpdb;
	global $fre_sms_db_version;


	$table_name = $wpdb->prefix . 'fre_sms';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		mobile text NOT NULL,
		code text NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'fre_sms_db_version', $fre_sms_db_version );
}

/**
 * process active code before insert user
 */
add_filter( 'ae_pre_insert_user', 'check_sms_active_code', 15 );
function check_sms_active_code( $user_data ) {
	global $wpdb;

	$code       = $user_data['sms_active_code'];
	$mobile     = $user_data['mobile'];
	$table_name = $wpdb->prefix . 'fre_sms';

	$sms_status = ae_get_option( 'active_code_sms_template_status' );
	if ( $sms_status ) {
		$data = $wpdb->get_row( "SELECT * FROM $table_name WHERE mobile = $mobile AND code = $code", ARRAY_A );

		if ( ! $data ) {
			$user_data = new WP_Error( 'active_code_invalid', "کد وارد شده صحیح نیست" );
		}

	}
	return $user_data;
}


/*******************************
 ****** add actions email ******
 ******************************/
add_action( 'in_new_payment_notification', 'in_new_payment_notification',10,2);
function in_new_payment_notification($product,$author){
	$sms_status=ae_get_option('new_payment_sms_template_status');//mobile number admin
	$sms_template=ae_get_option('new_payment_sms_template');
	if($sms_status){

		$sms = $sms_template;
		$sms = str_replace( '[package_name]', $product['NAME'], $sms );
		$sms = str_replace( '[user_name]', $author->display_name, $sms );
		$sms = str_replace( '[blogname]', get_bloginfo( 'blogname' ), $sms );

		//send sms
		$mobile = ae_get_option('admin_mobile_number');
		//$user_number = get_the_author_meta( 'mobile', $post_author );
		send_message($mobile,$sms,null);

	}
}


add_action( 'in_bid_mail', 'new_bid_sms',10,4);
function new_bid_sms($bid_msg,$author,$project_id,$post_author){
	$sms_status=ae_get_option('bid_sms_template_status');//mobile number admin
	$sms_template=ae_get_option('bid_sms_template');

	if($sms_status){

		$sms = $sms_template;
		$sms = str_replace( '[message]', $bid_msg, $sms );

		//send sms
		$user_number = get_the_author_meta( 'mobile', $author->ID );
		send_message($user_number,$sms,array(
			'post'    => $project_id,
			'user_id' => $post_author
		));
	}
}


add_action( 'in_review_freelancer_email', 'review_freelancer_sms',10,4);
function review_freelancer_sms($post_link,$employer,$project_id,$freelancer_id){
	$sms_status=ae_get_option('complete_sms_template_status');//mobile number admin
	$sms_template=ae_get_option('complete_sms_template');

	if($sms_status){

		$sms = $sms_template;
		$sms = str_replace( '[link_review]', $post_link, $sms );
		$sms = str_replace( '[employer]', $employer, $sms );

		//send sms
		$user_number = get_the_author_meta( 'mobile', $freelancer_id );
		send_message($user_number,$sms,array(
			'post'    => $project_id,
			'user_id' => $freelancer_id
		));

	}
}


add_action( 'in_review_employer_email', 'review_employer_sms',10,4);
function review_employer_sms($employer,$project_id,$link_profile,$employer_id){
	$sms_status=ae_get_option('review_for_employer_sms_status');
	$sms_template=ae_get_option('review_for_employer_sms_template');

	if($sms_status){

		$sms = $sms_template;

		$sms = str_replace( '[freelance]', $employer, $sms );
		$sms = str_replace( '[link_profile]', $link_profile, $sms );

		//send sms
		$user_number = get_the_author_meta( 'mobile', $employer_id );
		send_message($user_number,$sms,array(
			'post'    => $project_id,
			'user_id' => $employer_id
		));
	}
}


add_action( 'in_invite_mail', 'invite_sms',10,3);
function invite_sms($project_info,$user_id,$value){
	$sms_status=ae_get_option('invite_sms_template_status');
	$sms_template=ae_get_option('invite_sms_template');

	if($sms_status){

		// get sms template
		$sms = '';
		if ( $sms_template ) {
			$sms = $sms_template;
		}

		// replace project list by placeholder
		$sms = str_replace( '[project_list]', $project_info, $sms );


		//send sms
		$user_number = get_the_author_meta( 'mobile', $user_id );
		send_message($user_number,$sms,array(
			'user_id' => $user_id,
			'post'    => $value
		));

	}
}

add_action( 'in_bid_accepted', 'bid_accepted_sms',10,3);
function bid_accepted_sms($workspace_link,$freelancer_id,$project_id){

	$sms_status=ae_get_option('bid_accepted_sms_template_status');
	$sms_template=ae_get_option('bid_accepted_sms_template');

	if($sms_status){

//		$workspace_link = '<a href="' . $workspace_link . '">' . $workspace_link . '</a>';
		$workspace_link=wp_get_shortlink($project_id, 'post',true );
		$sms        = str_replace( '[workspace]', $workspace_link.'&workspace=1', $sms_template );


		//send sms
		$user_number = get_the_author_meta( 'mobile', $freelancer_id );
		send_message($user_number,$sms,array(
			'user_id' => $freelancer_id,
			'post'    => $project_id
		));
	}

}

add_action( 'in_new_message', 'new_message_sms',10,4);
function new_message_sms($message,$workspace_link,$receiver,$project){
	$sms_status=ae_get_option('new_message_sms_template_status');
	$sms_template=ae_get_option('new_message_sms_template');

	if($sms_status){

		$sms = $sms_template;

		// replace message content place holder
		$sms = str_replace( '[message]', $message->comment_content, $sms );

		// replace workspace place holder
//		$workspace_link = '<a href="' . $workspace_link . '">' . __( "Workspace", ET_DOMAIN ) . '</a>';
		$workspace_link=wp_get_shortlink($project, 'post',true );
		$sms  = str_replace( '[workspace]', $workspace_link.'&workspace=1', $sms );


		//send sms
		$user_number = get_the_author_meta( 'mobile', $receiver );
		send_message($user_number,$sms,array(
			'user_id' => $receiver,
			'post'    => $project
		));

	}
}

add_action( 'in_notify_execute', 'notify_execute_sms',10,5);
function notify_execute_sms($employer,$link_project,$bid_owner,$project_owner,$project_id){
	$sms_status=ae_get_option('fre_notify_freelancer_sms_template_status');
	$sms_template=ae_get_option('fre_notify_freelancer_sms_template');

	if($sms_status){

		$sms = $sms_template;
		$sms = str_replace( '[employer]', $employer, $sms );
		$link_project=wp_get_shortlink($project_id, 'post',true );
		$sms = str_replace( '[link]', $link_project, $sms );

		//send sms
		$user_number = get_the_author_meta( 'mobile', $bid_owner );
		send_message($user_number,$sms,array(
			'user_id' => $project_owner,
			'post'    => $project_id
		));

	}
}

add_action( 'in_new_project_of_category', 'new_project_of_category_sms',10,2);
function new_project_of_category_sms($link,$mobiles){
	$sms_status=ae_get_option('new_project_sms_template_status');
	$sms_template=ae_get_option('new_project_sms_template');

	if($sms_status){

		$sms    = $sms_template;
		$sms    = str_replace( '[project_link]', $link, $sms );

		//send sms
		send_message($mobiles,$sms);

	}
}

function get_mobiles_for_new_project_of_category($user_id){
	$mobile = get_user_meta( $user_id,'mobile',true );
//	$mobiles[]=$user_number;
	return $mobile;
}