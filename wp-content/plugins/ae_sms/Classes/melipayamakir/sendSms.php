<?php
ini_set( "soap.wsdl_cache_enabled", "0" );
function send_by_melipayamak_ir( $mobile, $message, $filter ) {
	try{
		$client = new SoapClient( 'http://api.payamak-panel.com/post/send.asmx?wsdl', array( 'encoding' => 'UTF-8' ));

		// your melipayamak.ir panel configuration
		$Username     = ae_get_option( 'MPKIR_userName' );
		$Password  = ae_get_option( 'MPKIR_password' );//username sms provider
		$LineNumber = ae_get_option( 'MPKIR_lineNumber' );//password sms provider

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

		$parameters['username'] = $Username;
		$parameters['password'] = $Password;
		$parameters['from']     = $LineNumber;
		$parameters['to']       = $MobileNumbers;
		$parameters['text']     = $message;
		$parameters['isflash']  = false;
		$parameters['udh']      = "";
		$parameters['recId']    = array( 0 );
		$parameters['status']   = 0x0;
		$status1=$client->GetCredit( array( "username" => "wsdemo", "password" => "wsdemo" ) )->GetCreditResult;
		$status=$client->SendSms( $parameters )->SendSmsResult;
		return $status;

	} catch ( SoapFault $ex ) {
		echo $ex->faultstring;
	}
}

function get_credit_melipayamak_ir(){
	$Username     = ae_get_option( 'MPKIR_userName' );
	$Password  = ae_get_option( 'MPKIR_password' );//username sms provider

	if(!empty($Username) && !empty($Password)){
		ini_set("soap.wsdl_cache_enabled", "0");
		$sms_client = new SoapClient('http://api.payamak-panel.com/post/Send.asmx?wsdl', array('encoding'=>'UTF-8'));

		$parameters['username'] = $Username;
		$parameters['password'] = $Password;

		return $sms_client->GetCredit($parameters)->GetCreditResult;
	}

}