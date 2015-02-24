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
	if(!class_exists("save_captcha_setting"))
	{
		class save_captcha_setting
		{
			function insert_data($tbl, $data)
			{
				global $wpdb;
				$wpdb->insert($tbl,$data);
			}
			
			function update_data($tbl, $data, $where)
			{
				global $wpdb;
				$wpdb->update($tbl,$data,$where);
			}
		}
	}
	if(isset($_REQUEST["param"]))
	{
		switch($_REQUEST["param"])
		{
			case "update_captcha_settings":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "captcha_settings"))
				{
					$update = new save_captcha_setting();
					$setting_value = array();
					$setting_key = array();
					$captcha_settings_array = json_decode(stripcslashes(html_entity_decode($_REQUEST["captcha_settings_array"])));
					foreach ($captcha_settings_array as $val => $innerKey)
					{
						$setting_value["settings_value"] = htmlspecialchars(htmlspecialchars_decode((string)current($innerKey)));
						$setting_key["settings_key"] = key($innerKey);
						$update->update_data(captcha_bank_settings(),$setting_value,$setting_key);
					}
					die();
				}
			break;
			case "update_licensing_setting":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "captcha_licensing"))
				{
					$api_key = esc_attr($_REQUEST["ux_api_key"]);
					$order_id = esc_attr($_REQUEST["ux_order_id"]);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"UPDATE " . captcha_bank_licensing() . " SET api_key = %s, order_id = %s ",
							$api_key,
							$order_id
						)
					);
					update_option("captcha-bank-activation", $api_key);
					die();
				}
			break;
			case "block_ip_address":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "login_logs_block_ip"))
				{
					$update_action = new save_captcha_setting();
					$block_ip = array();
					$block_ip["block_ip"] = esc_attr($_REQUEST["block"]);
					$where = array();
					$where["id"] = intval($_REQUEST["ip_id"]);
					$update_action->update_data(captcha_bank_log(),$block_ip,$where);
					die();
				}
			break;
			case "insert_block_ip":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "block_ip_single"))
				{
					$block_ip = esc_attr($_REQUEST["block_ip"]);
					$insert_block_ip = array();
					$insert_block_ip["block_ip_address"] = $block_ip;
					$insert = new save_captcha_setting();
					$insert->insert_data(captcha_bank_block_single_ip(),$insert_block_ip);
					die();
				}
			break;
			case "insert_block_ip_range":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "block_ip_range"))
				{
					$start_block_ip = esc_attr($_REQUEST["start_block_ip"]);
					$end_block_ip = esc_attr($_REQUEST["end_block_ip"]);
					$insert_block_ip_range = array();
					$insert_block_ip_range["block_start_range"] = $start_block_ip;
					$insert_block_ip_range["block_end_range"] = $end_block_ip;
					$insert = new save_captcha_setting();
					$insert->insert_data(captcha_bank_block_range_ip(),$insert_block_ip_range);
					die();
				}
			break;
			case "delete_block_ip":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "delete_block_single_ip"))
				{
					$delete_block_ip = esc_attr($_REQUEST["delete_block_ip"]);
					$split = explode(",",$delete_block_ip);
					for($flag=0; $flag<count($split); $flag++)
					{
						$delete = $wpdb->query
						(
							$wpdb->prepare
							(
								"DELETE FROM ". captcha_bank_block_single_ip()." WHERE block_ip_address=%s",
								$split[$flag]
							)
						);
					}
					die();
				}
			break;
			case "delete_block_ip_range":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "delete_block_range_ip"))
				{
					$delete_block_ip_range = esc_attr($_REQUEST["delete_block_ip_range"]);
					$split_comma = explode(",",$delete_block_ip_range);
					for($flag=0; $flag< count($split_comma);$flag++)
					{
						$split_minus = explode("-",$split_comma[$flag]);
						$start_range = trim($split_minus[0]);
						$end_range = trim($split_minus[1]);
						$delete = $wpdb->query
						(
							"DELETE FROM ". captcha_bank_block_range_ip()." WHERE block_start_range= '$start_range' and block_end_range = '$end_range'"
						);
					}
					die();
				}
			break;
			case "captcha_plugin_settings":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "plugin_settings"))
				{
					$update = new save_captcha_setting();
					$plugin_setting_array = array();
					$setting_value = array();
					$setting_key = array();
					$plugin_setting_array["show_captcha_plugin_menu_admin"] = isset($_REQUEST["ux_chk_admin"]) ? esc_attr($_REQUEST["ux_chk_admin"]) : "1";
					$plugin_setting_array["show_captcha_plugin_menu_editor"] = isset($_REQUEST["ux_chk_editor"]) ? esc_attr($_REQUEST["ux_chk_editor"]) : "0";
					$plugin_setting_array["show_captcha_plugin_menu_author"] = isset($_REQUEST["ux_chk_author"]) ? esc_attr($_REQUEST["ux_chk_author"]) : "0";
					$plugin_setting_array["show_captcha_plugin_menu_contributor"] = isset($_REQUEST["ux_chk_contributor"]) ? esc_attr($_REQUEST["ux_chk_contributor"]) : "0";
					$plugin_setting_array["show_captcha_plugin_menu_subscriber"] = isset($_REQUEST["ux_chk_admin_subscriber"]) ? esc_attr($_REQUEST["ux_chk_admin_subscriber"]) : "0";
					$plugin_setting_array["captcha_menu_top_bar"] = isset($_REQUEST["ux_rdl_enable_menu"]) ? esc_attr($_REQUEST["ux_rdl_enable_menu"]) : "0";
					foreach ($plugin_setting_array as $val => $innerKey)
					{
						$setting_value["plugin_settings_value"] = $innerKey;
						$setting_key["plugin_settings_key"] = $val;
						$update->update_data(captcha_bank_plugin_settings(),$setting_value,$setting_key);
					}
					die();
				}
			break;
		}
	}
}

?>