<?php
/*
Plugin Name: WP Captcha Bank Pro Edition
Plugin URI: http://tech-banker.com
Description: This plugin allows you to implement security captcha form into web forms to prevent spam.
Author: Tech Banker
Version: 2.2.0
Author URI: http://tech-banker.com
*/
/////////////////////////////////////  Define  WP Captcha Bank  Constants  //////////////////////////////////

if (!defined("WP_CAPTCHA_BK_PLUGIN_DIR")) define("WP_CAPTCHA_BK_PLUGIN_DIR", plugin_dir_path(__FILE__));
if (!defined("WP_CAPTCHA_BK_PLUGIN_DIRNAME")) define("WP_CAPTCHA_BK_PLUGIN_DIRNAME", plugin_basename(dirname(__FILE__)));
if (!defined("captcha_bank")) define("captcha_bank", "captcha-bank");
if (!defined("WP_CAPTCHA_BK_PLUGIN_REF")) define("WP_CAPTCHA_BK_PLUGIN_REF", WP_PLUGIN_URL . "/" . WP_CAPTCHA_BK_PLUGIN_DIRNAME);
if (!defined("WP_CAPTCHA_BK_PLUGIN_BASENAME")) define("WP_CAPTCHA_BK_PLUGIN_BASENAME", plugin_basename(__FILE__));
if (!defined("tech_bank")) define("tech_bank", "tech-banker");
if (!defined("CAPTCHA_FILE")) define("CAPTCHA_FILE","captcha-bank-pro-edition/captcha-bank-pro-edition.php");

///////////////////////////////////// File Exist Function for Frontend /////////////////////////////////////

if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "views/frontend-captcha.php")) 
{
	global $wpdb;
	include WP_CAPTCHA_BK_PLUGIN_DIR . "views/frontend-captcha.php";
}

///////////////////////////////////// This Function created for using JavaScript at Frontend. ////////////////////////////////////////

if(!function_exists("frontend_js_calls_for_captcha_bank"))
{
	function frontend_js_calls_for_captcha_bank()
	{
		wp_enqueue_script("jquery");
	}
}

///////////////////////////////////// This Function created for using JavaScript at Backend. ////////////////////////////////////////

if(!function_exists("admin_panel_js_calls_for_captcha_bank"))
{
	function admin_panel_js_calls_for_captcha_bank()
	{
		wp_enqueue_script("jquery");
		wp_enqueue_script("farbtastic");
		wp_enqueue_script("jquery.validate.min.js", plugins_url("/assets/js/jquery.validate.min.js", __file__));
		wp_enqueue_script("jquery.dataTables.min.js", plugins_url("/assets/js/jquery.dataTables.min.js", __file__));
		wp_enqueue_script("jquery_google_map.js", plugins_url("/assets/js/jquery_google_map.js", __file__));
		wp_enqueue_script("jquery.Tooltip.js", plugins_url("/assets/js/jquery.Tooltip.js", __file__));
	}
}

///////////////////////////////////// This Function created for using Cascade Style Sheet at Backend. ////////////////////////////////////////

if(!function_exists("admin_panel_css_calls_for_captcha_bank"))
{
	function admin_panel_css_calls_for_captcha_bank()
	{
		wp_enqueue_style("farbtastic");
		wp_enqueue_style("captcha-bank-framework.css", plugins_url("/assets/css/framework.css", __file__));
		wp_enqueue_style("captcha-bank-custom.css", plugins_url("/assets/css/captcha-bank-custom.css", __file__));
	}
}

/////////////////////////////////////  This Function creates menus on the admin bar. ////////////////////////////////////////

if(!function_exists("create_admin_bar_menus_for_captcha_bank"))
{
	function create_admin_bar_menus_for_captcha_bank($meta = true)
	{
		global $wp_admin_bar, $wpdb, $current_user;
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
		if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-plugin-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-plugin-settings.php";		
			if($captcha_menu_top_bar == "1")
			{
				switch($captcha_role)
				{
					case "administrator":
						if($captcha_admin_role == "1")
						{
							if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/admin-bar-menu.php"))
							{
								include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/admin-bar-menu.php";
							}
						}
					break;
					case "editor":
						if($captcha_editor_role == "1")
						{
							if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/admin-bar-menu.php"))
							{
								include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/admin-bar-menu.php";
							}
						}
					break;
					case "author":
						if($captcha_author_role == "1")
						{
							if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/admin-bar-menu.php"))
							{
								include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/admin-bar-menu.php";
							}
						}
					break;
					case "contributor":
						if($captcha_contributor_role == "1")
						{
							if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/admin-bar-menu.php"))
							{
								include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/admin-bar-menu.php";
							}
						}
					break;
					case "subscriber":
						if($captcha_subscriber_role == "1")
						{
							if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/admin-bar-menu.php"))
							{
								include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/admin-bar-menu.php";
							}
						}
					break;
				}
			}
		}
	}
}
///////////////////////////////////// This Function creates menus in the admin menu sidebar. /////////////////////////////////////

if(!function_exists("create_global_menus_for_captcha_bank"))
{
	function create_global_menus_for_captcha_bank()
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
		if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-plugin-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-plugin-settings.php";
			switch($captcha_role)
			{
				case "administrator":
					if($captcha_admin_role == "1")
					{
						if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/menus.php"))
						{
							include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/menus.php";
						}
					}
				break;
				case "editor":
					if($captcha_editor_role == "1")
					{
						if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/menus.php"))
						{
							include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/menus.php";
						}
					}
				break;
				case "author":
					if($captcha_author_role == "1")
					{
						if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/menus.php"))
						{
							include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/menus.php";
						}
					}
				break;
				case "contributor":
					if($captcha_contributor_role == "1")
					{
						if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/menus.php"))
						{
							include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/menus.php";
						}
					}
				break;
				case "subscriber":
					if($captcha_subscriber_role == "1")
					{
						if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/menus.php"))
						{
							include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/menus.php";
						}
					}
				break;
			}
		}
	}
}

/////////////////////////////////////  Functions for Returing Table Names  /////////////////////////////////

function captcha_bank_settings()
{
	global $wpdb;
	return $wpdb->prefix . "captcha_bank_settings";
}

function captcha_bank_licensing()
{
	global $wpdb;
	return $wpdb->prefix . "captcha_bank_licensing";
}

function captcha_bank_log()
{
	global $wpdb;
	return $wpdb->prefix . "captcha_bank_login_log";
}

function captcha_bank_block_single_ip()
{
	global $wpdb;
	return $wpdb->prefix . "captcha_bank_block_single_ip";
}

function captcha_bank_block_range_ip()
{
	global $wpdb;
	return $wpdb->prefix . "captcha_bank_block_range_ip";
}
function captcha_bank_plugin_settings()
{
	global $wpdb;
	return $wpdb->prefix . "captcha_bank_plugin_settings";
}

add_action("admin_init","wp_captcha_bank_check_updation");
if(!function_exists("wp_captcha_bank_check_updation"))
{
	function wp_captcha_bank_check_updation()
	{
		if (!wp_next_scheduled("wp_captcha_bank_scheduler"))
		{
			$this_time = 60*60*24;
			wp_schedule_event(time() + $this_time, "daily", "wp_captcha_bank_scheduler");
		}
	}
}
if(!function_exists("wp_captcha_bank_scheduler"))
{
	function wp_captcha_bank_scheduler()
	{
		if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/scheduler.php"))
		{
			global $wpdb;
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/scheduler.php";
		}
	}
}

/////////////////////////////////////  Call Install Script on Plugin Activation /////////////////////////////////

if(!function_exists("plugin_install_script_for_captcha_bank"))
{
	function plugin_install_script_for_captcha_bank()
	{
		global $wpdb;
		if (is_multisite())
		{
			$blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach($blog_ids as $blog_id)
			{
				switch_to_blog($blog_id);
				if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/install-script.php"))
				{
					include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/install-script.php";
				}
				restore_current_blog();
			}
		}
		else
		{
			if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/install-script.php"))
			{
				include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/install-script.php";
			}
		}
	}
}

/////////////////////////////////////  Call Uninstall Script on Plugin Deactivation ////////////////////////////////

// if(!function_exists("plugin_uninstall_script_for_captcha_bank"))
// {
// 	function plugin_uninstall_script_for_captcha_bank()
// 	{
// 	global $wpdb;
		
// 		if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/uninstall-script.php"))
// 		{
// 			include_once WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/uninstall-script.php";
// 		}
// 	}
// }

///////////////////////////////////// Register Ajax Based Function ////////////////////////////////////////////////

if (isset($_REQUEST["action"])) 
{
	switch ($_REQUEST["action"]) 
	{
		case "captcha_settings_library":
			add_action("admin_init", "captcha_settings_library");
			function captcha_settings_library() 
			{
				global $wpdb, $current_user, $user_role_permission;
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
				if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/settings-class.php"))
				{
					include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/settings-class.php";
				}
			}
		break;
	}
} 
else
{
	if (isset($_REQUEST["captcha_code"]))
	{
		global $wpdb;
		if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/views/generate-code.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/views/generate-code.php";
		}
		die();
	}
}

///////////////////////////////////// To Check Captcha Menu on Contact Bank //////////////////////////////////////////////////////

if (!function_exists("create_captcha_bank_menues"))
{
	function create_captcha_bank_menues()
	{
		
	}
}

///////////////////////////////////// Function for Block IP Address ////////////////////////////////////////////////

if(!function_exists("blacklist_check"))
{
	function blacklist_check()
	{
		global $wpdb;
		if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
		}
		$block_ip = array();
		$block_ip_mannual = $wpdb->get_results
		(
			"SELECT block_ip_address FROM " . captcha_bank_block_single_ip()
		);
		foreach( $block_ip_mannual as $ip)
		{
			$block_ip[] = $ip->block_ip_address;
		}
		$block_ip_range = $wpdb->get_results
		(
			"SELECT * FROM " . captcha_bank_block_range_ip()
		);
		if(count($block_ip_range)>0)
		{
			$block_start_range = array();
			$block_end_range = array();
			foreach( $block_ip_range as $range_block)
			{
				$block_start_range[] = $range_block->block_start_range;
				$block_end_range[] = $range_block->block_end_range;
			}
			$ip = getIpAddress();
			if($ip >=  $range_block->block_start_range && $ip <= $range_block->block_end_range)
			{
				die($ip_block_msg);
			}
		}
		$blocklist_check = $wpdb->get_results
		(
			$wpdb->prepare
			(
				"SELECT ip_address FROM " . captcha_bank_log() ." where block_ip = %d",
				1
			)
		);
		foreach( $blocklist_check as $ip)
		{ 
			$block_ip[] = $ip->ip_address;
		}
		$ip = getIpAddress();
		if(in_array($ip,$block_ip ))
		{
			die($ip_block_msg);
		}
	}
}

///////////////////////////////////// Function to get IP Address ////////////////////////////////////////////////

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

/////////////////////////////////////Language Convertions//////////////////////////////////////////////////////////
if(!function_exists( "plugin_load_textdomain_wp_captcha_bank" ))
{
	function plugin_load_textdomain_wp_captcha_bank()
	{
		load_plugin_textdomain(captcha_bank, false, WP_CAPTCHA_BK_PLUGIN_DIRNAME ."/languages");
	}
}

if(!function_exists("plugin_load_textdomain_wp_captcha_bank_services"))
{
	function plugin_load_textdomain_wp_captcha_bank_services()
	{
		if(function_exists( "load_plugin_textdomain" ))
		{
			load_plugin_textdomain(tech_bank, false, WP_CAPTCHA_BK_PLUGIN_DIRNAME ."/tech-banker-services");
		}
	}
}
/////////////////////////////////////Plugin Updater Checker/////////////////////////////////////////////////////////

require_once(WP_CAPTCHA_BK_PLUGIN_DIR."/plugin-updates/plugin-update-checker.php");
$MyUpdateChecker = new PluginUpdateChecker(
		"http://tech-banker.com/wp-content/plugins/gallery-bank-pro-edition-3.1/lib/update-pro-edition-captcha-bank.json",
		__FILE__,
		"captcha-bank-pro-edition"
);

////////////////////////////////////Additional Links to Plugin/////////////////////////////////////////

if(!function_exists("captcha_plugin_row"))
{
	function captcha_plugin_row($links,$file)
	{
		if ($file == WP_CAPTCHA_BK_PLUGIN_BASENAME)
		{
			$captcha_row_meta = array(
				"docs"  => "<a href='".esc_url( apply_filters("wp_captcha_bank_docs_url","http://tech-banker.com/products/wp-captcha-bank/knowledge-base/"))."' title='".esc_attr(__( "View WP Captcha Bank Documentation",captcha_bank))."'>".__("Docs",captcha_bank)."</a>",
			);
			return array_merge($links,$captcha_row_meta);
		}
		return (array)$links;
	}
}

/////////////////  Update Tables for existing plugin when clicked on update now link  ////////////////

$version = get_option("captcha-bank-version-number");
if($version == "" || $version != "")
{
	add_action("admin_init", "plugin_install_script_for_captcha_bank");
}

////////////////////////////////////CODE FOR PLUGIN UPDATE MESSAGE/////////////////////////////////////////

if(!function_exists("captcha_bank_plugin_update_message"))
{
	function captcha_bank_plugin_update_message($args)
	{
		$response = wp_remote_get( 'http://tech-banker.com/changelogs/readme-wp-captcha-bank.txt' );
		if ( ! is_wp_error( $response ) && ! empty( $response['body'] ) )
		{
			// Output Upgrade Notice
			$matches        = null;
			$regexp         = '~==\s*Changelog\s*==\s*=\s*[0-9.]+\s*=(.*)(=\s*' . preg_quote($args['Version']) . '\s*=|$)~Uis';
			$upgrade_notice = '';
			if ( preg_match( $regexp, $response['body'], $matches ) )
			{
				$changelog = (array) preg_split('~[\r\n]+~', trim($matches[1]));
				$upgrade_notice .= '<div class="framework_plugin_message">';
				foreach ( $changelog as $index => $line )
				{
					$upgrade_notice .= "<p>".$line."</p>";
				}
				$upgrade_notice .= '</div> ';
				echo $upgrade_notice;
			}
		}
	}
}
///////////////////////////////////  Call Hooks   /////////////////////////////////////////////////////

// activation Hook called for installation_for_captcha bank
register_activation_hook(__FILE__, "plugin_install_script_for_captcha_bank");

// activation Hook called for uninstallation_for_captcha bank
//register_uninstall_hook(__FILE__, "plugin_uninstall_script_for_captcha_bank");

// add_action Hook called for languages for captcha bank
add_action("plugins_loaded", "plugin_load_textdomain_wp_captcha_bank");

// add_action Hook called for languages for captcha bank services
add_action("plugins_loaded", "plugin_load_textdomain_wp_captcha_bank_services");

// add_action Hook called for function backend_plugin_css_styles_for_captcha_bank
add_action("admin_init", "admin_panel_css_calls_for_captcha_bank");

// add_action Hook called for function backend_plugin_java_script_for_captcha_bank
add_action("admin_init", "admin_panel_js_calls_for_captcha_bank");

// add_action Hook called for function frontend_plugin_css_styles_for_captcha_bank
add_action("init", "frontend_js_calls_for_captcha_bank");

// add_action Hook called for check updation
add_action("wp_captcha_bank_scheduler", "wp_captcha_bank_scheduler");

// add_action Hook called for function create_admin_bar_for_captcha_bank
add_action("admin_bar_menu", "create_admin_bar_menus_for_captcha_bank", 100);

// add_action Hook called for function create_global_menus_for_captcha bank
add_action("admin_menu", "create_global_menus_for_captcha_bank");

// add_action Hook called for function blacklist_check_for_captcha bank
add_action("init", "blacklist_check");

// plugin_row_meta Hook called for function custom_plugin_row to add additional link to the plugin.
add_filter("plugin_row_meta","captcha_plugin_row", 10, 2 );

// add_action Hook called for function create_global_menus_for_captcha bank for multisite
add_action( "network_admin_menu", "create_global_menus_for_captcha_bank" );

// add_action Hook called for function for plugin update message
add_action("in_plugin_update_message-".CAPTCHA_FILE,"captcha_bank_plugin_update_message" );
?>