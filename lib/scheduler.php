<?php
switch($captcha_role)
{
	case "administrator":
		$user_role_permission = "manage_options";
		break;
	case "editor":
		$user_role_permission = "publish_pages";
		break;
	case "author":
		$user_role_permission = "publish_posts";
		break;
	case "contributor":
		$user_role_permission = "edit_posts";
		break;
	case "subscriber":
		$user_role_permission = "read";
		break;
}

if (!current_user_can($user_role_permission))
{
	return;
}
else
{
	$updation_keys = $wpdb->get_row
	(
		"SELECT * FROM " . captcha_bank_licensing()
	);
	$url = get_option("tech-banker-updation-check-url");
	$response = wp_remote_post($url, array
	(
		"method" => "POST",
		"timeout" => 45,
		"redirection" => 5,
		"httpversion" => "1.0",
		"blocking" => true,
		"headers" => array(),
		"body" => array( "ux_product_key" => "17148", "ux_domain" => $updation_keys->url, "ux_order_id" => $updation_keys->order_id, "ux_api_key"=>$updation_keys->api_key,"param"=>"check_license","action"=>"license_validator")
	)
	);

	if ( is_wp_error( $response ) )
	{
		delete_option("captcha-bank-activation");
	}
	else
	{
		$response["body"] == "" ? update_option("captcha-bank-activation",$updation_keys->api_key) : delete_option("captcha-bank-activation");
	}
}
?>