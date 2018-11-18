<?php
include_once( "Class_SendMessage.php" );
include_once( "GetCredit.php" );

function send_by_sms_ir( $mobile, $message, $filter ) {
	try {

		date_default_timezone_set( "Asia/Tehran" );


		// your sms.ir panel configuration
		$APIKey     = ae_get_option( 'SMSIR_APIKey' );
		$SecretKey  = ae_get_option( 'SMSIR_SecretKey' );//username sms provider
		$LineNumber = ae_get_option( 'SMSIR_LineNumber' );//password sms provider

		// your mobile numbers
		if ( is_array( $mobile ) ) {
			$MobileNumbers = $mobile;
		} else {
			$MobileNumbers[] = $mobile;
		}


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


		$Messages[] = $message;

		// sending date
		@$SendDateTime = date( "Y-m-d" ) . "T" . date( "H:i:s" );

		$SmsIR_SendMessage = new SmsIR_SendMessage( $APIKey, $SecretKey, $LineNumber );
		$SendMessage       = $SmsIR_SendMessage->SendMessage( $MobileNumbers, $Messages, $SendDateTime );
		return $SendMessage;

	} catch ( Exeption $e ) {
//        return 0;
		echo 'Error SendMessage : ' . $e->getMessage();
	}
}

function get_credit_sms_ir(){
	$APIKey     = ae_get_option( 'SMSIR_APIKey' );
	$SecretKey  = ae_get_option( 'SMSIR_SecretKey' );//username sms provider

	if(!empty($APIKey) && !empty($SecretKey)){
		try {

			date_default_timezone_set("Asia/Tehran");

			// your sms.ir panel configuration

			$SmsIR_GetCredit = new SmsIR_GetCredit($APIKey,$SecretKey);
			$GetCredit = $SmsIR_GetCredit->GetCredit();
			return $GetCredit;

		} catch (Exeption $e) {
			echo 'Error GetCredit : '.$e->getMessage();
		}
	}

}