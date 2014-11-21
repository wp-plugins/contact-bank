<?php
/**
Plugin Name: Contact Bank Lite Edition
Plugin URI: http://tech-banker.com
Description: Build Complex, Powerful Contact Forms in Just Seconds. No Programming Knowledge Required! Yeah, It's Really That Easy.
Author: Tech Banker
Version: 2.0.79
Author URI: http://tech-banker.com
 */
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//   D e f i n e     CONSTANTS //////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!defined("CONTACT_BK_PLUGIN_DIR")) define("CONTACT_BK_PLUGIN_DIR",  plugin_dir_path( __FILE__ ));
if (!defined("CONTACT_BK_PLUGIN_DIRNAME")) define("CONTACT_BK_PLUGIN_DIRNAME", plugin_basename(dirname(__FILE__)));
if (!defined("contact_bank")) define("contact_bank", "contact_bank");
if (!defined("tech_bank")) define("tech_bank", "tech-banker");
if (!defined("CONTACT_BK_PLUGIN_BASENAME")) define("CONTACT_BK_PLUGIN_BASENAME", plugin_basename(__FILE__));

function plugin_uninstall_script_for_contact_bank()
{
   // include CONTACT_BK_PLUGIN_DIR ."/lib/uninstall-script.php";
}
/* Function Name : plugin_install_script_for_contact_bank
 * Paramters : None
 * Return : None
 * Description : This Function check the version number of the plugin database and performs necessary actions related to the plugin database upgrade.
 * Created in Version 1.0
 * Last Modified : 1.0
 * Reasons for change : None
 */
if(!function_exists("plugin_install_script_for_contact_bank"))
{
	function plugin_install_script_for_contact_bank()
	{
		global $wpdb;
		if (is_multisite())
		{
			$blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach($blog_ids as $blog_id)
			{
				switch_to_blog($blog_id);
				if(file_exists(CONTACT_BK_PLUGIN_DIR. "/lib/install-script.php"))
				{
					include CONTACT_BK_PLUGIN_DIR ."/lib/install-script.php";
				}
				restore_current_blog();
			}
		}
		else
		{
			if(file_exists(CONTACT_BK_PLUGIN_DIR. "/lib/install-script.php"))
			{
				include CONTACT_BK_PLUGIN_DIR ."/lib/install-script.php";
			}
		}
	}
}

/* Function Name : create_global_menus_for_contact_bank
 * Paramters : None
 * Return : None
 * Description : This Function creates menus in the admin menu sidebar and related mention function in each menu are being called.
 * Created in Version 1.0
 * Last Modified : 1.0
 * Reasons for change : None
 */
function create_global_menus_for_contact_bank()
{
	global $wpdb,$current_user;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else 
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
	switch ($cb_role) {
		case "administrator":
			add_menu_page("Contact Bank", __("Contact Bank", contact_bank), "read", "dashboard","",plugins_url("/assets/images/icon.png" , __FILE__));
		    add_submenu_page("dashboard", "Dashboard", __("Dashboard", contact_bank), "read", "dashboard","dashboard");
		    add_submenu_page("","","", "read", "contact_bank","contact_bank");
			add_submenu_page("dashboard", "Short-Codes", __("Short-Codes", contact_bank), "read", "short_code", "short_code" );
		    add_submenu_page("dashboard", "Form Entries", __("Form Entries", contact_bank), "read", "frontend_data","frontend_data");
		    add_submenu_page("dashboard", "Email Settings", __("Email Settings", contact_bank), "read", "contact_email", "contact_email");
		    add_submenu_page("dashboard", "Global Settings", __("Global Settings", contact_bank), "read", "layout_settings", "layout_settings");
			add_submenu_page("dashboard", "System Status", __("System Status", contact_bank), "read", "system_status", "system_status" );
		    add_submenu_page("dashboard", "Recommendations", __("Recommendations", contact_bank), "read", "contact_bank_recommended_plugins", "contact_bank_recommended_plugins");
		    add_submenu_page("dashboard", "Premium Editions", __("Premium Editions", contact_bank), "read", "pro_version", "pro_version" );
		    add_submenu_page("dashboard", " Our Other Services ", __("Our Other Services", contact_bank), "read", "contact_bank_other_services", "contact_bank_other_services");
		    add_submenu_page("","","", "read", "add_contact_email_settings", "add_contact_email_settings" );
			add_submenu_page("","","", "read", "form_preview", "form_preview" );
		break;
		case "editor":
			add_menu_page("Contact Bank", __("Contact Bank", contact_bank), "read", "dashboard","",plugins_url("/assets/images/icon.png" , __FILE__));
		    add_submenu_page("dashboard", "Dashboard", __("Dashboard", contact_bank), "read", "dashboard","dashboard");
		    add_submenu_page("","","", "read", "contact_bank","contact_bank");
			add_submenu_page("dashboard", "Short-Codes", __("Short-Codes", contact_bank), "read", "short_code", "short_code" );
		    add_submenu_page("dashboard", "Form Entries", __("Form Entries", contact_bank), "read", "frontend_data","frontend_data");
		    add_submenu_page("dashboard", "Email Settings", __("Email Settings", contact_bank), "read", "contact_email", "contact_email");
		    add_submenu_page("dashboard", "Global Settings", __("Global Settings", contact_bank), "read", "layout_settings", "layout_settings");
			add_submenu_page("dashboard", "System Status", __("System Status", contact_bank), "read", "system_status", "system_status" );
		    add_submenu_page("dashboard", "Recommendations", __("Recommendations", contact_bank), "read", "contact_bank_recommended_plugins", "contact_bank_recommended_plugins");
		    add_submenu_page("dashboard", "Premium Editions", __("Premium Editions", contact_bank), "read", "pro_version", "pro_version" );
		    add_submenu_page("dashboard", " Our Other Services ", __("Our Other Services", contact_bank), "read", "contact_bank_other_services", "gallery_bank_other_services");
		    add_submenu_page("","","", "read", "add_contact_email_settings", "add_contact_email_settings" );
			add_submenu_page("","","", "read", "form_preview", "form_preview" );
		break;
		case "author":
			add_menu_page("Contact Bank", __("Contact Bank", contact_bank), "read", "dashboard","",plugins_url("/assets/images/icon.png" , __FILE__));
			add_submenu_page("dashboard", "Dashboard", __("Dashboard", contact_bank), "read", "dashboard","dashboard");
			add_submenu_page("","","", "read", "contact_bank","contact_bank");
			add_submenu_page("dashboard", "Short-Codes", __("Short-Codes", contact_bank), "read", "short_code", "short_code" );
			add_submenu_page("dashboard", "Form Entries", __("Form Entries", contact_bank), "read", "frontend_data","frontend_data");
			add_submenu_page("dashboard", "Email Settings", __("Email Settings", contact_bank), "read", "contact_email", "contact_email");
			add_submenu_page("dashboard", "Global Settings", __("Global Settings", contact_bank), "read", "layout_settings", "layout_settings");
			add_submenu_page("dashboard", "System Status", __("System Status", contact_bank), "read", "system_status", "system_status" );
			add_submenu_page("dashboard", "Recommendations", __("Recommendations", contact_bank), "read", "contact_bank_recommended_plugins", "contact_bank_recommended_plugins");
		    add_submenu_page("dashboard", "Premium Editions", __("Premium Editions", contact_bank), "read", "pro_version", "pro_version" );
		    add_submenu_page("dashboard", " Our Other Services ", __("Our Other Services", contact_bank), "read", "contact_bank_other_services", "gallery_bank_other_services");
			add_submenu_page("","","", "read", "add_contact_email_settings", "add_contact_email_settings" );
			add_submenu_page("","","", "read", "form_preview", "form_preview" );
		break;
		case "contributor":
			break;
				
		case "subscriber":
			break;
		
	}
}
/* Function Name : contact_bank
 * Paramters : None
 * Return : None
 * Description : This Function used to linked menu page is requested.
 * Created in Version 1.0
 * Last Modified : 1.0
 * Reasons for change : None
 */
function contact_bank()
{
	
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
	include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
	include CONTACT_BK_PLUGIN_DIR ."/views/contact_view.php";
	include CONTACT_BK_PLUGIN_DIR . "/views/includes_common_after.php";
	include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}
function dashboard()
{
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}	
	include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
	include CONTACT_BK_PLUGIN_DIR ."/views/dashboard.php";
	include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}
function edit_contact_view()
{
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
    include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/contact_view.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}
function contact_email()
{
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
    include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/contact_email_settings.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}
function frontend_data()
{
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
    include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/contact_frontend_data.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}
function add_contact_email_settings()
{
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
    include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/add_contact_email.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}
function layout_settings()
{
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
    include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/contact_bank_layout_settings.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}

function system_status()
{
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
    include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/contact-bank-system-report.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}

function form_preview()
{
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
    include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/contact_bank_form_preview.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}
function pro_version()
{
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
    include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/purchase_pro_version.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}
function contact_bank_recommended_plugins()
{
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
	include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
	include CONTACT_BK_PLUGIN_DIR ."/views/recommended-plugins.php";
	include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}
function contact_bank_other_services()
{
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
	include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
	include CONTACT_BK_PLUGIN_DIR ."/views/other-services.php";
	include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}
function short_code()
{
	global $wpdb,$current_user,$cb_user_role_permission;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
    include CONTACT_BK_PLUGIN_DIR ."/views/header.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/shortcode.php";
    include CONTACT_BK_PLUGIN_DIR ."/views/footer.php";
}

function backend_plugin_js_scripts_contact_bank()
{
    wp_enqueue_script("jquery");
    wp_enqueue_script("jquery-ui-sortable");
    wp_enqueue_script("jquery-ui-droppable");
    wp_enqueue_script("jquery-ui-draggable");
    wp_enqueue_script("farbtastic");
	wp_enqueue_script("jquery-ui-dialog");
    wp_enqueue_script("jquery.Tooltip.js", plugins_url("/assets/js/jquery.Tooltip.js",__FILE__));
    wp_enqueue_script("jquery.dataTables.min", plugins_url("/assets/js/jquery.dataTables.min.js",__FILE__));
    wp_enqueue_script("jquery.validate.min", plugins_url("/assets/js/jquery.validate.min.js",__FILE__));
    wp_enqueue_script("bootstrap.js", plugins_url("/assets/js/bootstrap.js",__FILE__));
    wp_enqueue_script("jquery.prettyPhoto.js", plugins_url("/assets/js/jquery.prettyPhoto.js",__FILE__));
}
function frontend_plugin_js_scripts_contact_bank()
{
    wp_enqueue_script("jquery");
    wp_enqueue_script("jquery.Tooltip.js", plugins_url("/assets/js/jquery.Tooltip.js",__FILE__));
    wp_enqueue_script("jquery.validate.min", plugins_url("/assets/js/jquery.validate.min.js",__FILE__));
}
function backend_plugin_css_styles_contact_bank()
{
    wp_enqueue_style("farbtastic");
    wp_enqueue_style("wp-jquery-ui-dialog");
    wp_enqueue_style("stylesheet", plugins_url("/assets/css/stylesheet.css",__FILE__));
    wp_enqueue_style("font-awesome", plugins_url("/assets/css/font-awesome/css/font-awesome.css",__FILE__));
    wp_enqueue_style("system-message", plugins_url("/assets/css/system-message.css",__FILE__));
	wp_enqueue_style("css3_grid_style", plugins_url("/assets/css/css3_grid_style.css",__FILE__));
	wp_enqueue_style("prettyPhoto", plugins_url("/assets/css/prettyPhoto.css",__FILE__));
	wp_enqueue_style("premium-edition.css", plugins_url("/assets/css/premium-edition.css",__FILE__));
	wp_enqueue_style("responsive.css", plugins_url("/assets/css/responsive.css",__FILE__));
	wp_enqueue_style("google-fonts-roboto", "//fonts.googleapis.com/css?family=Roboto Condensed:300|Roboto Condensed:300|Roboto Condensed:300|Roboto Condensed:regular|Roboto Condensed:300");
}
function frontend_plugin_css_styles_contact_bank()
{
    wp_enqueue_style("stylesheet", plugins_url("/assets/css/stylesheet.css",__FILE__));
    wp_enqueue_style("system-message", plugins_url("/assets/css/system-message.css",__FILE__));
}
if(isset($_REQUEST["action"]))
{
    switch($_REQUEST["action"])
    {
        case "add_contact_form_library":
            add_action( "admin_init", "add_contact_form_library");
            function add_contact_form_library()
            {
            	global $wpdb,$current_user,$cb_user_role_permission;
            	if (is_super_admin())
            	{
            		$cb_role = "administrator";
            	}
            	else
            	{
            		$cb_role = $wpdb->prefix . "capabilities";
            		$current_user->role = array_keys($current_user->$cb_role);
            		$cb_role = $current_user->role[0];
            	}
                include CONTACT_BK_PLUGIN_DIR . "/lib/contact_view-class.php";
            }
            break;
        case "frontend_contact_form_library":
            add_action( "admin_init", "frontend_contact_form_library");
            function frontend_contact_form_library()
            {
                include CONTACT_BK_PLUGIN_DIR . "/lib/contact_bank_frontend-class.php";
            }
            break;
        case "email_contact_form_library":
            add_action( "admin_init", "email_contact_form_library");
            function email_contact_form_library()
            {
            	global $wpdb,$current_user,$cb_user_role_permission;
           		if (is_super_admin())
            	{
            		$cb_role = "administrator";
            	}
            	else
            	{
            		$cb_role = $wpdb->prefix . "capabilities";
            		$current_user->role = array_keys($current_user->$cb_role);
            		$cb_role = $current_user->role[0];
            	}
                include CONTACT_BK_PLUGIN_DIR . "/lib/contact_bank_email-class.php";
            }
            break;
        case "email_management_contact_form_library":
            add_action( "admin_init", "email_management_contact_form_library");
            function email_management_contact_form_library()
            {
                include CONTACT_BK_PLUGIN_DIR . "/lib/contact_bank_email_management.php";
            }
            break;
        case "frontend_data_contact_library":
            add_action( "admin_init", "frontend_data_contact_library");
            function frontend_data_contact_library()
            {
            	global $wpdb,$current_user,$cb_user_role_permission;
            	if (is_super_admin())
            	{
            		$cb_role = "administrator";
            	}
            	else
            	{
            		$cb_role = $wpdb->prefix . "capabilities";
            		$current_user->role = array_keys($current_user->$cb_role);
            		$cb_role = $current_user->role[0];
            	}
                include CONTACT_BK_PLUGIN_DIR . "/lib/contact_frontend_data_class.php";
            }
            break;
        
		case "show_form_control_data_contact_library":
            add_action( "admin_init", "show_form_control_data_contact_library");
            function show_form_control_data_contact_library()
            {
            	global $wpdb,$current_user,$cb_user_role_permission;
            	if (is_super_admin())
            	{
            		$cb_role = "administrator";
            	}
            	else
            	{
            		$cb_role = $wpdb->prefix . "capabilities";
            		$current_user->role = array_keys($current_user->$cb_role);
            		$cb_role = $current_user->role[0];
            	}
                include CONTACT_BK_PLUGIN_DIR . "/lib/contact_bank_show_form_control_data-class.php";
            }
            break;
            case "layout_settings_contact_library":
            add_action( "admin_init", "layout_settings_contact_library");
            function layout_settings_contact_library()
            {
            	global $wpdb,$current_user,$cb_user_role_permission;
            	if (is_super_admin())
            	{
            		$cb_role = "administrator";
            	}
            	else
            	{
            		$cb_role = $wpdb->prefix . "capabilities";
            		$current_user->role = array_keys($current_user->$cb_role);
            		$cb_role = $current_user->role[0];
            	}
                include CONTACT_BK_PLUGIN_DIR . "/lib/contact_bank_layout_settings-class.php";
            }
            break;
    }
}
/*
 * Description : THESE FUNCTIONS USED FOR REPLACING TABLE NAMES
 * Created in Version 1.0
 * Last Modified : 1.0
 * Reasons for change : None
 */
function contact_bank_contact_form()
{
    global $wpdb;
    return $wpdb->prefix . "cb_contact_form";
}
function contact_bank_dynamic_settings_form()
{
    global $wpdb;
    return $wpdb->prefix . "cb_dynamic_settings";
}
function create_control_Table()
{
    global $wpdb;
    return $wpdb->prefix . "cb_create_control_form";
}
function frontend_controls_data_Table()
{
    global $wpdb;
    return $wpdb->prefix . "cb_frontend_data_table";
}
function contact_bank_email_template_admin()
{
    global $wpdb;
    return $wpdb->prefix . "cb_email_template_admin";
}
function contact_bank_frontend_forms_Table()
{
    global $wpdb;
    return $wpdb->prefix . "cb_frontend_forms_table";
}
function contact_bank_form_settings_Table()
{
    global $wpdb;
    return $wpdb->prefix . "cb_form_settings_table";
}
function contact_bank_layout_settings_Table()
{
    global $wpdb;
    return $wpdb->prefix . "cb_layout_settings_table";
}
function contact_bank_licensing()
{
    global $wpdb;
    return $wpdb->prefix . "cb_licensing";
}
function contact_bank_roles_capability()
{
    global $wpdb;
    return $wpdb->prefix . "cb_roles_capability";
}
function contact_bank_short_code($atts)
{
    extract(shortcode_atts(array(
        "form_id" => "",
        "show_title" => "",
    ), $atts));
    return extract_short_code($form_id,$show_title);
}
function extract_short_code($form_id,$show_title)
{
    ob_start();
    require CONTACT_BK_PLUGIN_DIR."/frontend_views/contact_bank_forms.php";
    $contact_bank_output = ob_get_clean();
    wp_reset_query();
    return $contact_bank_output;
}
function add_contact_bank_icon($meta = TRUE)
{
	global $wp_admin_bar,$wpdb,$current_user;
	if (is_super_admin())
	{
		$cb_role = "administrator";
	}
	else
	{
		$cb_role = $wpdb->prefix . "capabilities";
		$current_user->role = array_keys($current_user->$cb_role);
		$cb_role = $current_user->role[0];
	}
	if (!is_user_logged_in() ) { return; }
	switch ($cb_role)
	{
		case "administrator":
			
			$wp_admin_bar->add_menu( array(
	    "id" => "contact_bank_links",
	    "title" =>  "<img src=\"".plugins_url("/assets/images/icon.png",__FILE__)."\" width=\"25\" height=\"25\" style=\"vertical-align:text-top; margin-right:5px;\" />Contact Bank" ,
	    "href" => site_url() ."/wp-admin/admin.php?page=dashboard",
		));
		$wp_admin_bar->add_menu( array(
		    "parent" => "contact_bank_links",
		    "id"     => "dashboard_links",
		    "href"  => site_url() ."/wp-admin/admin.php?page=dashboard",
		    "title" => __( "Dashboard", contact_bank) )         /* set the sub-menu name */
	    );
		$wp_admin_bar->add_menu( array(
	        "parent" => "contact_bank_links",
		    "id"     => "short_code_links",
		    "href"  => site_url() ."/wp-admin/admin.php?page=short_code",
		    "title" => __( "Short-Codes", contact_bank))         /* set the sub-menu name */
		);
	   $wp_admin_bar->add_menu( array(
	        "parent" => "contact_bank_links",
		    "id"     => "frontend_data_links",
		    "href"  => site_url() ."/wp-admin/admin.php?page=frontend_data",
		    "title" => __( "Form Entries", contact_bank))         /* set the sub-menu name */
		);
		$wp_admin_bar->add_menu( array(
		    "parent" => "contact_bank_links",
		    "id"     => "email_links",
		    "href"  => site_url() ."/wp-admin/admin.php?page=contact_email",
		    "title" => __( "Email Settings", contact_bank) )         /* set the sub-menu name */
		);
		$wp_admin_bar->add_menu( array(
		    "parent" => "contact_bank_links",
		    "id"     => "form_settings_data_links",
		    "href"  => site_url() ."/wp-admin/admin.php?page=layout_settings",
		    "title" => __( "Global Settings", contact_bank))         /* set the sub-menu name */
		);	
	 	$wp_admin_bar->add_menu( array(
	        "parent" => "contact_bank_links",
		    "id"     => "system_status_data_links",
		    "href"  => site_url() ."/wp-admin/admin.php?page=system_status",
		    "title" => __( "System Status", contact_bank))         /* set the sub-menu name */
		);
		$wp_admin_bar->add_menu(array(
	    		"parent" => "contact_bank_links",
	    		"id" => "gallery_bank_recommended_plugins_links",
	    		"href" => site_url() . "/wp-admin/admin.php?page=contact_bank_recommended_plugins",
	    		"title" => __("Recommendations", contact_bank))
	    );
	
		$wp_admin_bar->add_menu(array(
	        "parent" => "contact_bank_links",
	        "id" => "pro_version_links",
	        "href" => site_url() . "/wp-admin/admin.php?page=pro_version",
	        "title" => __("Premium Editions", contact_bank))
	    );
		
		$wp_admin_bar->add_menu(array(
				"parent" => "contact_bank_links",
				"id" => "gallery_bank_other_services_links",
				"href" => site_url() . "/wp-admin/admin.php?page=contact_bank_other_services",
				"title" => __("Our Other Services", contact_bank))
		);
		break;	
		case "editor":
			$wp_admin_bar->add_menu( array(
	    "id" => "contact_bank_links",
	    "title" =>  "<img src=\"".plugins_url("/assets/images/icon.png",__FILE__)."\" width=\"25\" height=\"25\" style=\"vertical-align:text-top; margin-right:5px;\" />Contact Bank" ,
	    
	    "href" => site_url() ."/wp-admin/admin.php?page=dashboard",
		));
	
		$wp_admin_bar->add_menu( array(
		    "parent" => "contact_bank_links",
		    "id"     => "dashboard_links",
		    "href"  => site_url() ."/wp-admin/admin.php?page=dashboard",
		    "title" => __( "Dashboard", contact_bank) )         /* set the sub-menu name */
	    );
		$wp_admin_bar->add_menu( array(
	        "parent" => "contact_bank_links",
		    "id"     => "short_code_links",
		    "href"  => site_url() ."/wp-admin/admin.php?page=short_code",
		    "title" => __( "Short-Codes", contact_bank))         /* set the sub-menu name */
		);
	   $wp_admin_bar->add_menu( array(
	        "parent" => "contact_bank_links",
		    "id"     => "frontend_data_links",
		    "href"  => site_url() ."/wp-admin/admin.php?page=frontend_data",
		    "title" => __( "Form Entries", contact_bank))         /* set the sub-menu name */
		);
		$wp_admin_bar->add_menu( array(
		    "parent" => "contact_bank_links",
		    "id"     => "email_links",
		    "href"  => site_url() ."/wp-admin/admin.php?page=contact_email",
		    "title" => __( "Email Settings", contact_bank) )         /* set the sub-menu name */
		);
		$wp_admin_bar->add_menu( array(
		    "parent" => "contact_bank_links",
		    "id"     => "form_settings_data_links",
		    "href"  => site_url() ."/wp-admin/admin.php?page=layout_settings",
		    "title" => __( "Global Settings", contact_bank))         /* set the sub-menu name */
		);	
	 	
	   
	    $wp_admin_bar->add_menu( array(
	        "parent" => "contact_bank_links",
		    "id"     => "system_status_data_links",
		    "href"  => site_url() ."/wp-admin/admin.php?page=system_status",
		    "title" => __( "System Status", contact_bank))         /* set the sub-menu name */
		);
		$wp_admin_bar->add_menu(array(
	    		"parent" => "contact_bank_links",
	    		"id" => "gallery_bank_recommended_plugins_links",
	    		"href" => site_url() . "/wp-admin/admin.php?page=contact_bank_recommended_plugins",
	    		"title" => __("Recommendations", contact_bank))
	    );
	
		$wp_admin_bar->add_menu(array(
	        "parent" => "contact_bank_links",
	        "id" => "pro_version_links",
	        "href" => site_url() . "/wp-admin/admin.php?page=pro_version",
	        "title" => __("Premium Editions", contact_bank))
	    );
		
		$wp_admin_bar->add_menu(array(
				"parent" => "contact_bank_links",
				"id" => "gallery_bank_other_services_links",
				"href" => site_url() . "/wp-admin/admin.php?page=contact_bank_other_services",
				"title" => __("Our Other Services", contact_bank))
		);
		break;	
		case "author":
			$wp_admin_bar->add_menu( array(
		    "id" => "contact_bank_links",
		    "title" =>  "<img src=\"".plugins_url("/assets/images/icon.png",__FILE__)."\" width=\"25\" height=\"25\" style=\"vertical-align:text-top; margin-right:5px;\" />Contact Bank" ,
		    "href" => site_url() ."/wp-admin/admin.php?page=dashboard",
			));
		
			$wp_admin_bar->add_menu( array(
			    "parent" => "contact_bank_links",
			    "id"     => "dashboard_links",
			    "href"  => site_url() ."/wp-admin/admin.php?page=dashboard",
			    "title" => __( "Dashboard", contact_bank) )         /* set the sub-menu name */
		    );
			$wp_admin_bar->add_menu( array(
		        "parent" => "contact_bank_links",
			    "id"     => "short_code_links",
			    "href"  => site_url() ."/wp-admin/admin.php?page=short_code",
			    "title" => __( "Short-Codes", contact_bank))         /* set the sub-menu name */
			);
		   $wp_admin_bar->add_menu( array(
		        "parent" => "contact_bank_links",
			    "id"     => "frontend_data_links",
			    "href"  => site_url() ."/wp-admin/admin.php?page=frontend_data",
			    "title" => __( "Form Entries", contact_bank))         /* set the sub-menu name */
			);
			$wp_admin_bar->add_menu( array(
			    "parent" => "contact_bank_links",
			    "id"     => "email_links",
			    "href"  => site_url() ."/wp-admin/admin.php?page=contact_email",
			    "title" => __( "Email Settings", contact_bank) )         /* set the sub-menu name */
			);
			$wp_admin_bar->add_menu( array(
			    "parent" => "contact_bank_links",
			    "id"     => "form_settings_data_links",
			    "href"  => site_url() ."/wp-admin/admin.php?page=layout_settings",
			    "title" => __( "Global Settings", contact_bank))         /* set the sub-menu name */
			);	
		 	$wp_admin_bar->add_menu(array(
		    		"parent" => "contact_bank_links",
		    		"id" => "gallery_bank_recommended_plugins_links",
		    		"href" => site_url() . "/wp-admin/admin.php?page=contact_bank_recommended_plugins",
		    		"title" => __("Recommendations", contact_bank))
		    );
		
			$wp_admin_bar->add_menu(array(
		        "parent" => "contact_bank_links",
		        "id" => "pro_version_links",
		        "href" => site_url() . "/wp-admin/admin.php?page=pro_version",
		        "title" => __("Premium Editions", contact_bank))
		    );
			
			$wp_admin_bar->add_menu(array(
					"parent" => "contact_bank_links",
					"id" => "gallery_bank_other_services_links",
					"href" => site_url() . "/wp-admin/admin.php?page=contact_bank_other_services",
					"title" => __("Our Other Services", contact_bank))
			);
		break;		
	}
}
add_action( "media_buttons_context", "add_contact_shortcode_button", 1);
function add_contact_shortcode_button($context) {
    add_thickbox();
    $context .= "<a href=\"#TB_inline?width=300&height=400&inlineId=contact-bank\"  class=\"button thickbox\"  title=\"" . __("Add Contact Bank Form", contact_bank) . "\">
    <span class=\"contact_icon\"></span> Add Contact Bank Form</a>";
    return $context;
}
add_action("admin_footer","add_contact_mce_popup");

function add_contact_mce_popup(){
	?>
	<?php add_thickbox(); ?>
	<div id="contact-bank" style="display:none;">
		<div class="fluid-layout responsive">
			<div style="padding:20px 0 10px 15px;">
			    <h3 class="label-shortcode"><?php _e("Insert Contact Bank Form", contact_bank); ?></h3>
					<span>
						<i><?php _e("Select a form below to add it to your post or page.", contact_bank); ?></i>
					</span>
			</div>
			<div class="layout-span12 responsive" style="padding:15px 15px 0 0;">
				<div class="layout-control-group">
					<label class="custom-layout-label" for="ux_form_name"><?php _e("Form Name", contact_bank); ?> : </label>
					<select id="add_contact_form_id" class="layout-span9">
						<option value="0"><?php _e("Select a Form", contact_bank); ?>  </option>
						<?php
						global $wpdb;
						$forms = $wpdb->get_results
						(
							"SELECT * FROM " .contact_bank_contact_form()
						);
						for($flag = 0;$flag<count($forms);$flag++)
						{
							?>
							<option value="<?php echo intval($forms[$flag]->form_id); ?>"><?php echo esc_html($forms[$flag]->form_name) ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="layout-control-group">
					<label class="custom-layout-label"><?php _e("Show Form Title", contact_bank); ?> : </label>
					<input type="checkbox" checked="checked" name="ux_form_title" id="ux_form_title"/>
				</div>
				<div class="layout-control-group">
					<label class="custom-layout-label"></label>
					<input type="button" class="button-primary" value="<?php _e("Insert Form", contact_bank); ?>"
						onclick="Insert_Contact_Form();"/>&nbsp;&nbsp;&nbsp;
					<a class="button" style="color:#bbb;" href="#"
						onclick="tb_remove(); return false;"><?php _e("Cancel", contact_bank); ?></a>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function Insert_Contact_Form()
		{
			var form_id = jQuery("#add_contact_form_id").val();
			var show_title = jQuery("#ux_form_title").prop("checked");
			if(form_id == 0)
			{
			    alert("<?php _e("Please choose a Form to insert into Shortcode", contact_bank) ?>");
			    return;
			}
			window.send_to_editor("[contact_bank form_id=" + form_id + " show_title=" + show_title +" ]");
		}
	</script>
<?php
}
function plugin_load_textdomain_contact_bank()
{
    if(function_exists( "load_plugin_textdomain" ))
    {
        load_plugin_textdomain(contact_bank, false, CONTACT_BK_PLUGIN_DIRNAME ."/languages");
    }
}
add_action("plugins_loaded", "plugin_load_textdomain_contact_bank");

function plugin_load_textdomain_contact_bank_services()
{
	if(function_exists( "load_plugin_textdomain" ))
	{
		load_plugin_textdomain(tech_bank, false, CONTACT_BK_PLUGIN_DIRNAME ."/tech-banker-services");
	}
}
add_action("plugins_loaded", "plugin_load_textdomain_contact_bank_services");
$version = get_option("contact-bank-version-number");
if($version != "")
{
	add_action('admin_init', 'plugin_install_script_for_contact_bank');
}

function contact_bank_plugin_row($links,$file)
{
	if ($file == CONTACT_BK_PLUGIN_BASENAME)
	{
		$cpo_row_meta = array(
			"docs"  => "<a href='".esc_url( apply_filters("contact_bank_docs_url","http://tech-banker.com/products/wp-contact-bank/knowledge-base/"))."' title='".esc_attr(__( "View Contact Bank Documentation",contact_bank))."'>".__("Docs",contact_bank)."</a>",
			"gopremium" => "<a href='" .esc_url( apply_filters("contact_bank_premium_editions_url", "http://tech-banker.com/products/wp-contact-bank/pricing/"))."' title='".esc_attr(__( "View Contact Bank Premium Editions",contact_bank))."'>".__("Go for Premium!",contact_bank)."</a>",
		);
		return array_merge($links,$cpo_row_meta);
	}
	return (array)$links;
}
add_filter("plugin_row_meta","contact_bank_plugin_row", 10, 2 );
/*************************************************************************************/
add_action("admin_bar_menu", "add_contact_bank_icon",100);
// add_action Hook called for function frontend_plugin_css_scripts_contact_bank
add_action("init","frontend_plugin_css_styles_contact_bank");
// add_action Hook called for function backend_plugin_css_scripts_contact_bank
add_action("admin_init","backend_plugin_css_styles_contact_bank");
// add_action Hook called for function frontend_plugin_js_scripts_contact_bank
add_action("init","frontend_plugin_js_scripts_contact_bank");
// add_action Hook called for function backend_plugin_js_scripts_contact_bank
add_action("admin_init","backend_plugin_js_scripts_contact_bank");
// add_action Hook called for function create_global_menus_for_contact_bank
add_action("admin_menu","create_global_menus_for_contact_bank");
// Activation Hook called for function plugin_install_script_for_contact_bank
register_activation_hook(__FILE__,"plugin_install_script_for_contact_bank");
// add_Shortcode Hook called for function contact_bank_short_code for FrontEnd
add_shortcode("contact_bank", "contact_bank_short_code");
// Uninstall Hook called for function plugin_install_script_for_contact_bank
register_uninstall_hook(__FILE__,"plugin_uninstall_script_for_contact_bank");

add_action( "network_admin_menu", "create_global_menus_for_contact_bank" );

?>