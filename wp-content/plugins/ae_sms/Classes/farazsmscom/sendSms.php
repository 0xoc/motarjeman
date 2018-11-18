<?php
ini_set( "soap.wsdl_cache_enabled", "0" );
function send_by_farazsms_com( $mobile, $message, $filter ) {

		$url                 = '37.130.202.188/services.jspd';

		//
		$Username     = ae_get_option( 'FRZSMS_userName' );
		$Password  = ae_get_option( 'FRZSMS_password' );//username sms provider
		$LineNumber = ae_get_option( 'FRZSMS_lineNumber' );//password sms provider

		/**
		 * filter message
		 */
		if ( isset( $filter['user_id'] ) ) {
			if ( isset( $filter['active_link'] ) ) {
				$message = filter_authentication_placeholder( $message, $filter['user_id'], $filter['active_link'] );
			} else {
				$message = filter_authentication_placeholder( $message, $filter['user_id'] );
			}
		}

		if ( isset( $filter['post'] ) ) {
			// filter post placeholder
			$message = filter_post_placeholder( $message, $filter['post'] );
		}

		$message = str_ireplace( '[blogname]', get_bloginfo( 'blogname' ), $message );

		// your text messages
		// filter message html tag
		$message = strip_tags( $message ,'<p>');

		//change </p> to new line
		$message = str_ireplace( '<p>', '', $message );
		$message = str_ireplace( '</p>', "\n", $message );


		if ( is_array( $mobile ) ) {
			$MobileNumbers = $mobile;
		} else {
			$MobileNumbers[] = $mobile;
		}




		$param = array
		(
			'uname'=>$Username,
			'pass'=>$Password,
			'from'=>$LineNumber,
			'message'=>$message,
			'to'=>json_encode($MobileNumbers),
			'op'=>'send'
		);

		$handler = curl_init($url);
		curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
		curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
		$response2 = curl_exec($handler);

		$response2 = json_decode($response2);
		$res_code = $response2[0];
		$res_data = $response2[1];

		return $res_code;

}

function get_credit_farazsms_com(){
	$Username     = ae_get_option( 'FRZSMS_userName' );
	$Password  = ae_get_option( 'FRZSMS_password' );

	if(!empty($Username) && !empty($Password)){
		$url = "37.130.202.188/services.jspd";
		$param = array
		(
			'uname'=>$Username,
			'pass'=>$Password,
			'op'=>'credit'
		);

		$handler = curl_init($url);
		curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
		curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
		$response2 = curl_exec($handler);

		$response2 = json_decode($response2);
		$res_code = $response2[0];
		$res_data = $response2[1];


		return $res_data;
	}

}