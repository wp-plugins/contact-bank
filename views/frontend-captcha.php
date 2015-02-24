<?php 
ob_start();
session_start();
if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
{
	include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
}

//Add captcha on login form
if($captcha_for_login == "1")
{
	add_action( "login_form", "captcha_bank_form" );
	add_filter("wp_authenticate_user","captcha_bank_login_check",20,2 );
}

//Add captcha on register form
if($captcha_for_register == "1")
{
	add_action( "register_form", "captcha_bank_form" );
	add_action( "register_post", "captcha_bank_register_post",10,3);
}

//Add captcha on lost password form
if($captcha_for_reset_password == "1")
{
	add_action( "lostpassword_form", "captcha_bank_form" );
	add_action( "allow_password_reset", "captcha_bank_lostpassword_post",1);
}

//Add captcha on comment form

if($captcha_for_comment == "1")
{
	add_action( "comment_form_after_fields", "captcha_bank_form", 1);
	add_action( "pre_comment_on_post", "captcha_bank_comment_post" );
}

//Add captcha on admin comment form
if($captcha_for_admin_comment == "1" || $hide_captcha_for_reg_user == "0" )
{
	add_action("comment_form_logged_in_after", "captcha_comment_form", 1);
	add_action( "pre_comment_on_post", "captcha_bank_comment_post" );
}

//Add captcha on registration form for multisite
if(is_multisite() && $captcha_for_register == "1")
{
	add_action("signup_extra_fields","captcha_bank_form_mu");
	add_filter("wpmu_validate_user_signup", "captcha_bank_register_post_mu");
}

//this add captcha on login form, register form, lost password form, comment form
if ( ! function_exists( "captcha_bank_form" ) ) 
{
	function captcha_bank_form() 
	{
		global $wpdb;
		if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
		}
		$captcha_url = admin_url("admin-ajax.php"). "?captcha_code=";
		?>
		<label>
			<?php _e("Enter Code", captcha_bank); ?>
			<span style="color: #b94a48;">*</span>
		</label>
		<input type="text" name="captcha_challenge_field" id="captcha_challenge_field" class="captcha_challenge_field" />
		<label style="display:block;"><?php echo $captcha_title;?></label>
		<?php
			if($show_border == "1")
			{
				?>
				<img src="<?php echo $captcha_url . rand(111,99999);?>" class="captcha_code_img"  id="captcha_code_img" title="<?php echo $captcha_tooltip;?>" style= "margin-top:10px; cursor:pointer; border:<?php echo $border_size?>px solid <?php echo $border_color?>" />
				<?php
			}
			else
			{
				?>
				<img src="<?php echo $captcha_url . rand(111,99999);?>" class="captcha_code_img"  id="captcha_code_img" title="<?php echo $captcha_tooltip;?>" style= "margin-top:10px; cursor:pointer;" />
				<?php
			}
		?>
		<img style= "vertical-align: top !important; margin-top:9px; cursor:pointer;" onclick="refresh(); " alt="Reload Image" height="25" width="25" src="<?php echo plugins_url("/assets/images/refresh-icon.png",dirname(__FILE__))?>"/>
		
		<script type="text/javascript">
			function refresh()
			{
				var randNum = Math.floor((Math.random() * 99999) + 1);
				jQuery("#captcha_code_img").attr("src","<?php echo $captcha_url; ?>"+randNum);
				return true;
			}
		</script>
		<?php
	}
}

//this add captcha on admin comment form

if ( ! function_exists( "captcha_comment_form" ) )
{
	function captcha_comment_form()
	{
		global $wpdb,$current_user;
		if(is_super_admin())
		{
			$captcha_role = "administrator";
		}
		else
		{
			$captcha_role = $wpdb->prefix . "capabilities";
			$current_user->role = array_keys($current_user->$captcha_role);
			$captcha_role = $current_user->role[0];
		}
		if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
		}
		
		if(($captcha_role == "administrator" && $captcha_for_admin_comment == 1 ) || ($captcha_role != "administrator" && $hide_captcha_for_reg_user == 0))
		{
			$captcha_url = admin_url("admin-ajax.php"). "?captcha_code=";
			?>
				<label>
					<?php _e("Enter Code", captcha_bank); ?>
					<span style="color: #b94a48;">*</span>
				</label>
				<input type="text" name="captcha_challenge_field" id="captcha_challenge_field" class="captcha_challenge_field" />
				<label style="display:block;">
					<?php echo $captcha_title;?>
				</label>
				<?php
					if($show_border == "1")
					{
						?>
						<img src="<?php echo $captcha_url . rand(111,99999);?>" class="captcha_code_img"  id="captcha_code_img" title="<?php echo $captcha_tooltip;?>" style= "margin-top:10px; cursor:pointer; border:<?php echo $border_size?>px solid <?php echo $border_color?>" />
						<?php
					}
					else
					{
						?>
						<img src="<?php echo $captcha_url . rand(111,99999);?>" class="captcha_code_img"  id="captcha_code_img" title="<?php echo $captcha_tooltip;?>" style= "margin-top:10px; cursor:pointer;" />
						<?php
					}
				?>
				<img style= "vertical-align: top !important; margin-top:9px; cursor:pointer;" onclick="refresh(); " alt="Reload Image" height="25" width="25" src="<?php echo plugins_url("/assets/images/refresh-icon.png",dirname(__FILE__))?>"/>

				<script type="text/javascript">
					function refresh()
					{
						var randNum = Math.floor((Math.random() * 99999) + 1);
						jQuery("#captcha_code_img").attr("src","<?php echo $captcha_url; ?>"+randNum);
						return true;
					}
				</script>
			<?php
		}
		else 
		{
			return;
		}
	}
}

//this function is to display captcha code on registration form for multisite
if ( ! function_exists( "captcha_bank_form_mu" ) )
{
	function captcha_bank_form_mu($errors)
	{
		$error = $errors->get_error_message('captcha');
		if( isset($error) && $error != '') {
			echo '<p class="error">' . $error . '</p>';
		}
		captcha_bank_form();
	}
}

//this function is to check captcha code in login form
if ( ! function_exists( "captcha_bank_login_check" ) )
{
	function captcha_bank_login_check($user, $password) 
	{
		global $wpdb,$errors;
		if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
		}
		$err = captcha_login_errors();
		if($err)
		{
			$today = date_i18n('Y-m-d');
			$auto_block = $wpdb->get_var
			(
				"SELECT count(captcha_status) FROM " . captcha_bank_log() ." where captcha_status = 0 AND date_time LIKE '$today%'"
			);
			$max_attempts= $max_login_attempts-$auto_block;
			if($errors == NULL) $errors;		
			if($errors == NULL) $errors = new WP_Error();
			if($err == "empty")
			{
				if($auto_ip_block == "1")
				{
					$message = str_replace("[maxAttempts]",$max_attempts,$max_login_msg); 
					$error = new WP_Error( "captcha_wrong", $captcha_empty_msg . " " . $message);
				}
				else 
				{
					$error = new WP_Error( "captcha_wrong", "<strong> ERROR: </strong>".$captcha_empty_msg);
				}
				return $error;
			}
			else if($err == "invalid")
			{
				if($auto_ip_block == "1")
				{
					$message = str_replace("[maxAttempts]",$max_attempts,$max_login_msg); 
					$error = new WP_Error( "captcha_wrong", $captcha_invalid_msg . " " . $message);
				}
				else 
				{
					$error = new WP_Error( "captcha_wrong", "<strong> ERROR: </strong>".$captcha_invalid_msg);
				}
				return $error;
			}
		}
		return $user;
	}
}
//this function is to check captcha code in registration form
if ( ! function_exists( "captcha_bank_register_post" ) )
{
	function captcha_bank_register_post($user,$email,$errors)
	{
		global $wpdb;
		if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
		}
		$err = captcha_errors();
		if($err)
		{
			if($err == "empty")
			{
				$errors->add("captcha_error", "<strong> ERROR: </strong>".$captcha_empty_msg);
			}
			else if($err == "invalid")
			{
				$errors->add("captcha_error", "<strong> ERROR: </strong>".$captcha_invalid_msg);
			}
			return $errors;
		}
	}
}
//this function is to check captcha code in lostpassword form
if ( ! function_exists( "captcha_bank_lostpassword_post" ) )
{
	function captcha_bank_lostpassword_post($user)
	{
		global $wpdb;
		if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
		}
		global $errors;
		$err = captcha_errors();
		if($err)
		{
			if($errors == NULL) $errors;
			if($errors == NULL) $errors = new WP_Error();
			if($err == "empty")
			{
				$error = new WP_Error( "captcha_wrong", "<strong> ERROR: </strong>".$captcha_empty_msg);
			}
			else if($err == "invalid")
			{
				$error = new WP_Error( "captcha_wrong", "<strong> ERROR: </strong>".$captcha_invalid_msg);
			}
			return $error;
		}
		return $user;
	}
}

//this function is to check captcha code in comment form
if ( ! function_exists( "captcha_bank_comment_post" ) )
{
	function captcha_bank_comment_post()
	{
		global $wpdb;
		if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
		}
		$err = captcha_errors();
		if($err)
		{
			if($err == "empty")
			{
				wp_die( $captcha_empty_msg);
			}
			else if($err == "invalid")
			{
				wp_die( $captcha_invalid_msg);
			}
		}
		else
		{
			return;
		}
	}
}

//this function is to check captcha code on registration form for multisite
if ( ! function_exists( "captcha_bank_register_post_mu" ) )
{
	function captcha_bank_register_post_mu($errors)
	{
		global $wpdb;
		if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
		}
		if ($_POST["stage"] == "validate-user-signup")
		{
			$err = captcha_errors();
			if($err)
			{
				if($err == "empty")
				{
					$errors['errors']->add("captcha", "<strong> ERROR: </strong>".$captcha_empty_msg);
				}
				else if($err == "invalid")
				{
					$errors["errors"]->add("captcha", "<strong> ERROR: </strong>".$captcha_invalid_msg);
				}
				return $errors;
			}
		}
		return($errors);
	}
}

if ( ! function_exists( "captcha_login_errors" ) )
{
	function captcha_login_errors($errors = NULL)
	{
		global $wpdb;
		if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
		}
		if(!class_exists("insert_log_data"))
		{
			class insert_log_data
			{
				function insert_data($tbl, $data)
				{
					global $wpdb;
					$wpdb->insert($tbl,$data);
				}
			}
		}
		if(isset($_REQUEST["captcha_challenge_field"]))
		{
			$setting_value = array();
			$ipAddress = getIpAddress();
			$date_time = date("Y-m-d H:i:s");
			$log_data = get_ip_location($ipAddress);
			$insert = new insert_log_data();
			$setting_value["username"] = $_REQUEST["log"];
			$setting_value["ip_address"] = $ipAddress;
			if($log_data->city =="" || $log_data->country_name =="")
			{
				$setting_value["geo_location"] = $log_data->city.$log_data->country_name;
			}
			else
			{
				$setting_value["geo_location"] = $log_data->city.", ".$log_data->country_name;
			}
			$setting_value["latitude"] = $log_data->latitude;
			$setting_value["longitude"] = $log_data->longitude;
			$setting_value["date_time"] = $date_time;
			if($captcha_case_sensitive == "1")
			{
				$captcha_challenge_field = trim($_REQUEST["captcha_challenge_field"]);
			}
			else 
			{
				$captcha_challenge_field = strtolower(trim($_REQUEST["captcha_challenge_field"]));
			}	
			if(strlen($captcha_challenge_field)<=0)
			{
				$errors = "empty";
				$setting_value["captcha_status"] = 0;
			}
			else 
			{
				$setting_value["captcha_status"] = 1;
			}
			if(strlen($captcha_challenge_field)>0)
			{
				if(isset($_SESSION["6_letters_code"]))
				{
					if($captcha_case_sensitive == "1")
					{
						$code = $_SESSION["6_letters_code"];
					}
					else 
					{
						$code = strtolower($_SESSION["6_letters_code"]);
					}
					
					if($code != $captcha_challenge_field)
					{
						$errors = "invalid";	
						$setting_value["captcha_status"] = 0;
					}
					else
					{
						$setting_value["captcha_status"] = 1;
					}
				}
			}
			$insert->insert_data(captcha_bank_log(),$setting_value);
			if($auto_ip_block == "1")
			{
				$today = date_i18n('Y-m-d');
				$auto_block = $wpdb->get_results
				(
					"SELECT ip_address FROM " .captcha_bank_log() ." where captcha_status = 0 AND date_time LIKE '$today%' GROUP BY ip_address HAVING COUNT(ip_address) >= $max_login_attempts"
				);
				$block_ip_automatic = array();
				foreach( $auto_block as $ip)
				{
					$block_ip_automatic[] = $ip->ip_address;
				}
				$ip = getIpAddress();
				if(in_array($ip,$block_ip_automatic ))
				{
					die($max_login_exceeded_msg);
				}
			}
		}
		return $errors;
	}
}
if ( ! function_exists( "captcha_errors" ) )
{
	function captcha_errors($errors = NULL)
	{
		global $wpdb;
		if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
		}
		if(isset($_REQUEST["captcha_challenge_field"]))
		{
			if($captcha_case_sensitive == "1")
			{
				$captcha_challenge_field = trim($_REQUEST["captcha_challenge_field"]);
			}
			else
			{
				$captcha_challenge_field = strtolower(trim($_REQUEST["captcha_challenge_field"]));
			}
			if(strlen($captcha_challenge_field)<=0)
			{
				$errors = "empty";
			}
			if(strlen($captcha_challenge_field)>0)
			{
				if(isset($_SESSION["6_letters_code"]))
				{
					if($captcha_case_sensitive == "1")
					{
						$code = $_SESSION["6_letters_code"];
					}
					else
					{
						$code = strtolower($_SESSION["6_letters_code"]);
					}
					if($code != $captcha_challenge_field)
					{
						$errors = "invalid";
					}
				}
			}
		}
		return $errors;
	}
}
if(!function_exists("get_ip_location"))
{
	function get_ip_location($ipAddress)
	{
		$apiCall = "http://tech-banker.com/tracker/LocateIp.php?ip_address=".$ipAddress;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $apiCall);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$jsonData = curl_exec($ch);
		return json_decode($jsonData);
	}
}
if(!function_exists("getIpAddress"))
{
	function getIpAddress()
	{
		foreach (array("HTTP_CLIENT_IP", "HTTP_X_FORWARDED_FOR", "HTTP_X_FORWARDED", "HTTP_X_CLUSTER_CLIENT_IP", "HTTP_FORWARDED_FOR", "HTTP_FORWARDED", "REMOTE_ADDR") as $key)
		{
			if (array_key_exists($key, $_SERVER) === true)
			{
				foreach (explode(",", $_SERVER[$key]) as $ip)
				{
					return $ip = trim($ip); // just to be safe
				}
			}
		}
	}
}
ob_get_clean();
?>
