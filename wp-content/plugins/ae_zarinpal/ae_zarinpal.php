<?php
/**
 * @author Morteza Lotfi Nejad
 * @copyright 2016
 * @package AppEngine Payment
 */

/*
Plugin Name: درگاه زرین پال فریلنس انجین
Plugin URI: http://farstheme.com/
Description: این افزونه درگاه زرین پال را به فریلنس انجین اضافه میکند
Version: 2.1
Author: مرتضی لطفی نژاد
Author URI: http://farstheme.com/
License: GPLv2
Text Domain: farstheme
*/

add_filter('ae_admin_menu_pages', 'ae_zarinpal_add_settings');
function ae_zarinpal_add_settings($pages) {
    $sections = array();
    $options = AE_Options::get_instance();
    /**
     * ae fields settings
     */
    $sections = array(
        'args' => array(
            'title' => __("zarinpal API", ET_DOMAIN) ,
            'id' => 'zarinpal_field',
            'icon' => 'F',
            'class' => ''
        ) ,

        'groups' => array(
            array(
                'args' => array(
                    'title' => __("zarinpal API", ET_DOMAIN) ,
                    'id' => 'zarinpal-secret-key',
                    'class' => '',
                    'desc' => __('', ET_DOMAIN) ,
                    'name' => 'zarinpal'
                ) ,
                'fields' => array(
                    array(
                        'id' => 'zarinpal_Merchant_ID',
                        'type' => 'text',
                        'label' => __("Merchant ID zarinpal", ET_DOMAIN) ,
                        'name' => 'zarinpal_merchan_ID',
                        'class' => ''
                    ) ,
                )
            )
        )
    );
    // khoi tao section
    $temp = new AE_section($sections['args'], $sections['groups'], $options);

    // call field appengine AE_container in Appengine/Fields/Container.php
    $zarinpal_setting = new AE_container(array(
        'class' => 'field-settings',
        'id' => 'settings',
    ) , $temp, $options);
    // Create infomation in this pages the same setting
    // Hien thi thong tin giong nhu setting phan menu trong admin
    // Dua toan bo thong tin vao trong args
    // Chuan bi du lieu truyen di
    $pages[] = array(
        'args' => array(
            'parent_slug' => 'et-overview',
            'page_title' => __('zarinpal', ET_DOMAIN) ,
            'menu_title' => __('zarinpal', ET_DOMAIN) ,
            'cap' => 'administrator',
            'slug' => 'ae-zarinpal',
            'icon' => '$',
            'desc' => __("Integrate the zarinpal payment gateway to your site", ET_DOMAIN)
        ) ,
        'container' => $zarinpal_setting
    );

    return $pages;
}

// add support gateway

add_filter('ae_support_gateway', 'ae_zarinpal_add_support');
function ae_zarinpal_add_support($gateways) {
    $gateways['zarinpal'] = 'zarinpal';
    return $gateways;
}

//add button front end
add_action('after_payment_list', 'ae_zarinpal_render_button');
function ae_zarinpal_render_button() {
//    $zarinpal_info = ae_get_option('zarinpal');
//    if($zarinpal_info['zarinpal_Merchant_ID'] == ""){
//        return false;
//    }
?>
    <li class="panel">
        <span class="title-plan zarinpal-payment" data-type="zarinpal">
            <?php _e("zarinpal", ET_DOMAIN); ?>
            <span><?php _e("Send your payment to our zarinpal account", ET_DOMAIN); ?></span>
        </span>
        <a href="#" id="" class="probtnsabt btn collapsed btn-submit-price-plan select-payment" data-type="zarinpal"><?php
    _e("Select", ET_DOMAIN); ?></a>

    </li>

<?php
    
    //end if
}

// setup thanh toan

add_filter('ae_setup_payment','ae_zarinpal_setup_payment', 10, 3);
function ae_zarinpal_setup_payment($response, $paymentType, $order) {

    if ($paymentType == 'ZARINPAL') {

        //zarinpal info
        $zarinpal_info = ae_get_option('zarinpal');

        $order_pay = $order->generate_data_to_pay();
        $MerchantID=$zarinpal_info['zarinpal_merchan_ID'];

        $orderId = $order_pay['product_id'];
        $amount = $order_pay['total'];
        $currency = $order_pay['currencyCodeType'];

        $pakage_info = array_pop($order_pay['products']);
        $pakage_name = $pakage_info['NAME'];

        $CallbackURL =et_get_page_link( 'process-payment', array('paymentType' => 'zarinpal','order-id' => $order_pay['ID']) );

        try{

            $Server = 'https://www.zarinpal.com/pg/services/WebGate/wsdl';
            $client = new SoapClient( $Server, array('encoding' => 'UTF-8'));
            $result = $client->PaymentRequest(
                array(
                    'MerchantID' 	=> $MerchantID,
                    'Amount' 	=> $amount,
                    'Description' 	=> $pakage_name,
                    'Email' 	=> '-',
                    'Mobile' 	=> '-',
                    'CallbackURL' 	=> $CallbackURL
                )
            );

            $order->update_order();
            //Redirect to Zarinpal
            if($result->Status == 100){

                $response = array(
                    'success' => true,
                    'data' => array(
                        'url' => 'https://www.zarinpal.com/pg/StartPay/'.$result->Authority,
                        'ACK' => true,
                    ) ,
                    'paymentType' => 'zarinpal'
                );
            }else{
                $response = array(
                    'success' => false,
                    'data' => array(
                        'result'=> $result->Status,
                        'url' => site_url('post-place') ,
                        'ACK' => false
                    ),
                    'msg' => 'خطایی برای ارتباط با درگاه زرین پال رخ داده است',
                    'paymentType' => 'zarinpal'
                );
            }

        }
        catch(Exception $e) {
            $value  =   $e->getJsonBody();
            var_dump($value);
            $response = array(
                'success' => false,
                'msg' => 'خطایی برای ارتباط با درگاه زرین پال رخ داده است',
                'paymentType' => 'zarinpal'
            );
        }

    }
    return $response;
}

add_filter('ae_process_payment','ae_zarinpal_process_payment', 10, 2);
function ae_zarinpal_process_payment($payment_return, $data) {

    $payment_type = $data['payment_type'];

    //get data return from zarinpal
    if ($payment_type == 'zarinpal') {


        $order = $data['order'];
        $zarinpal_info = ae_get_option('zarinpal');
        $MerchantID=$zarinpal_info['zarinpal_merchan_ID'];

        $order_data = $order->get_order_data();


        $Amount = $order_data['total']; //Amount will be based on Toman
        $Authority = $_GET['Authority'];


        if ($_GET['Status'] == 'OK') {

            $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $Amount,
                ]
            );

            if ($result->Status == 100) {
                //echo 'Transation success. RefID:'.$result->RefID;
                $payment_return = array(
                    'ACK' => true,
                    'payment' => 'zarinpal',
                    'payment_status' => 'Completed'
                );
                $order->set_status('publish');
                $order->update_order();
            } else {
                //echo 'Transation failed. Status:'.$result->Status;
                $payment_return = array(
                    'ACK' => false,
                    'payment' => 'zarinpal',
                    'payment_status' => 'complete',
                    'msg' => __('zarinpal payment method false.', ET_DOMAIN)
                );
            }

        } else {
            $payment_return = array(
                'ACK' => false,
                'payment' => 'zarinpal',
                'payment_status' => 'fail',
                'msg' => __('Transaction canceled by user', ET_DOMAIN)
            );
        }
    }
    return $payment_return;
}
/**
 * hook to add translate string to plugins
 * @param Array $entries Array of translate entries
 * @since 1.0
 * @author Dakachi
 */
add_filter( 'et_get_translate_string', 'ae_zarinpal_add_translate_string' );
function ae_zarinpal_add_translate_string ($entries) {
    $lang_path = dirname(__FILE__).'/lang/default.po';
    if(file_exists($lang_path)) {
        $pot        =   new PO();
        $pot->import_from_file($lang_path, true );

        return  array_merge($entries, $pot->entries);
    }
    return $entries;
}