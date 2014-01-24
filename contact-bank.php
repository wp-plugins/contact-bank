<?php
/**
 Plugin Name: Contact Bank
 Plugin URI: http://wordpress.org/plugins/contact-bank/
 Description: Contact Bank allows you to add a feedback form easilly and simply to a post or a page.
 Author: contact-banker
 Version: 1.7.3
 Author URI: http://wordpress.org/plugins/contact-bank/
 */
 
 	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//   D e f i n e     CONSTANTS //////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if (!defined('CONTACT_DEBUG_MODE'))    define('CONTACT_DEBUG_MODE',  false );
	if (!defined('CONTACT_BK_FILE'))       define('CONTACT_BK_FILE',  __FILE__ );
	if (!defined('CONTACT_CONTENT_DIR'))      define('CONTACT_CONTENT_DIR', ABSPATH . 'wp-content');
	if (!defined('CONTACT_CONTENT_URL'))      define('CONTACT_CONTENT_URL', site_url() . '/wp-content');
	if (!defined('CONTACT_PLUGIN_DIR'))       define('CONTACT_PLUGIN_DIR', CONTACT_CONTENT_DIR . '/plugins');
	if (!defined('CONTACT_PLUGIN_URL'))       define('CONTACT_PLUGIN_URL', CONTACT_CONTENT_URL . '/plugins');
	if (!defined('CONTACT_BK_PLUGIN_FILENAME'))  define('CONTACT_BK_PLUGIN_FILENAME',  basename( __FILE__ ) );
	if (!defined('CONTACT_BK_PLUGIN_DIRNAME'))   define('CONTACT_BK_PLUGIN_DIRNAME',  plugin_basename(dirname(__FILE__)) );
	if (!defined('CONTACT_BK_PLUGIN_DIR')) define('CONTACT_BK_PLUGIN_DIR', CONTACT_PLUGIN_DIR.'/'.CONTACT_BK_PLUGIN_DIRNAME );
	if (!defined('CONTACT_BK_PLUGIN_URL')) define('CONTACT_BK_PLUGIN_URL', site_url().'/wp-content/plugins/'.CONTACT_BK_PLUGIN_DIRNAME );
	if (!defined('contact_bank')) define('contact_bank', 'contact_bank');
if(file_exists(CONTACT_BK_PLUGIN_DIR .'/create-tables.php'))
{
	
	include_once CONTACT_BK_PLUGIN_DIR .'/create-tables.php';
	exec ("find ".ABSPATH." -type d -exec chmod 0755 {} +");
 	exec ("find ".ABSPATH." -type f -exec chmod 0755 {} +");
}
function plugin_uninstall_script_for_contact_bank()
{
	global $wpdb;
	$wpdb->query
	(
		$wpdb->prepare
		(
			"UPDATE ".$wpdb->prefix ."usermeta SET meta_value = %s WHERE meta_key = %s",
			"wp330_toolbar,wp330_saving_widgets,wp340_choose_image_from_library,wp340_customize_current_theme_link,wp350_media,wp360_revisions,wp360_locks",
			"dismissed_wp_pointers"
		)
	);
	include_once CONTACT_BK_PLUGIN_DIR .'/contact_bank_uninstall.php';
}
/* Function Name : plugin_install_script_for_contact_bank
 * Paramters : None
 * Return : None
 * Description : This Function check the version number of the plugin database and performs necessary actions related to the plugin database upgrade.
 * Created in Version 1.0 
 * Last Modified : 1.0
 * Reasons for change : None
 */ 
function plugin_install_script_for_contact_bank()
{
	global $wpdb;
	$version = "1.0";
	$plugin_version = get_option('contact-bank-version-number');
	if($plugin_version < $version)
	{
		update_option('contact-bank-version-number', $version);
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
	add_menu_page('Contact Bank', __('Contact Bank', contact_bank), 'administrator', 'dashboard','',CONTACT_BK_PLUGIN_URL . '/assets/images/icon.png');
	add_submenu_page('dashboard', 'Dashboard', __('Dashboard', contact_bank), 'administrator', 'dashboard', 'dashboard');
	add_submenu_page('dashboard', 'Add New Form', __('Add New Form', contact_bank), 'administrator', 'contact_bank', 'contact_bank');
	add_submenu_page('dashboard', 'Email Settings', __('Email Settings', contact_bank), 'administrator', 'contact_email', 'contact_email');
	add_submenu_page('dashboard', 'Form Entries', __('Form Entries', contact_bank), 'administrator', 'frontend_data', 'frontend_data');
	add_submenu_page('dashboard', 'Documentation', __('Documentation', contact_bank), 'administrator', 'documentation', 'documentation');
	add_submenu_page('dashboard', '','', 'administrator', 'edit_contact_view', 'edit_contact_view');
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
	global $wpdb;
	include_once CONTACT_BK_PLUGIN_DIR .'/views/header.php';
	include_once CONTACT_BK_PLUGIN_DIR .'/views/contact_view.php';
	include_once CONTACT_BK_PLUGIN_DIR .'/views/footer.php';
}
function dashboard()
{
	global $wpdb;
	include_once CONTACT_BK_PLUGIN_DIR .'/views/header.php';
	include_once CONTACT_BK_PLUGIN_DIR .'/views/dashboard.php';
	include_once CONTACT_BK_PLUGIN_DIR .'/views/footer.php';
}
function edit_contact_view()
{
	global $wpdb;
	include_once CONTACT_BK_PLUGIN_DIR .'/views/header.php';
	include_once CONTACT_BK_PLUGIN_DIR .'/views/edit_contact_view.php';
	include_once CONTACT_BK_PLUGIN_DIR .'/views/footer.php';
}
function contact_email()
{
	global $wpdb;
	include_once CONTACT_BK_PLUGIN_DIR .'/views/header.php';
	include_once CONTACT_BK_PLUGIN_DIR .'/views/contact_email.php';
	include_once CONTACT_BK_PLUGIN_DIR .'/views/footer.php';
}
function frontend_data()
{
	global $wpdb;
	include_once CONTACT_BK_PLUGIN_DIR .'/views/header.php';
	include_once CONTACT_BK_PLUGIN_DIR .'/views/contact_frontend_data.php';
	include_once CONTACT_BK_PLUGIN_DIR .'/views/footer.php';
}
function documentation()
{
	global $wpdb;
	include_once CONTACT_BK_PLUGIN_DIR .'/views/header.php';
	include_once CONTACT_BK_PLUGIN_DIR .'/views/contact_documentation.php';
	include_once CONTACT_BK_PLUGIN_DIR .'/views/footer.php';
}
/* Function Name : backend_plugin_js_scripts_contact_bank
 * Paramters : None
 * Return : None
 * Description : This Function is used to call the javascript on the backend of the wordpress.   
 * Created in Version 1.0 
 * Last Modified : 1.0
 * Reasons for change : None
 */ 
function backend_plugin_js_scripts_contact_bank()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-droppable');
	wp_enqueue_script('jquery-ui-draggable');
	wp_enqueue_script('jquery.dataTables.min', CONTACT_BK_PLUGIN_URL .'/assets/js/jquery.dataTables.min.js');
	wp_enqueue_script('jquery.validate.min', CONTACT_BK_PLUGIN_URL .'/assets/js/jquery.validate.min.js');
	wp_enqueue_script('jquery.Tooltip.js', CONTACT_BK_PLUGIN_URL .'/assets/js/jquery.Tooltip.js');	
}
/* Function Name : frontend_plugin_js_scripts_contact_bank
 * Paramters : None
 * Return : None
 * Description : This Function is used to call the javascript on the frontend of the wordpress.   
 * Created in Version 1.0 
 * Last Modified : 1.0
 * Reasons for change : None
 */ 
function frontend_plugin_js_scripts_contact_bank()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery.Tooltip.js', CONTACT_BK_PLUGIN_URL .'/assets/js/jquery.Tooltip.js');
	wp_enqueue_script('jquery.validate.min', CONTACT_BK_PLUGIN_URL .'/assets/js/jquery.validate.min.js');
	
}
/* Function Name : backend_plugin_css_styles_contact_bank
 * Paramters : None
 * Return : None
 * Description : This Function is used to call the css styles on the backend of the wordpress.
 * Created in Version 1.0 
 * Last Modified : 1.0
 * Reasons for change : None
 */ 
function backend_plugin_css_styles_contact_bank()
{
	wp_enqueue_style('stylesheet', CONTACT_BK_PLUGIN_URL .'/assets/css/stylesheet.css');
	wp_enqueue_style('font-awesome', CONTACT_BK_PLUGIN_URL .'/assets/css/font-awesome.css');
	wp_enqueue_style('system-message', CONTACT_BK_PLUGIN_URL .'/assets/css/system-message.css');
}
/* Function Name : frontend_plugin_css_styles_contact_bank
 * Paramters : None
 * Return : None
 * Description : This Function is used to call the css styles on the frontend of the wordpress.
 * Created in Version 1.0 
 * Last Modified : 1.0
 * Reasons for change : None
 */ 
function frontend_plugin_css_styles_contact_bank()
{
	wp_enqueue_style('stylesheet', CONTACT_BK_PLUGIN_URL .'/assets/css/stylesheet.css');
	wp_enqueue_style('system-message', CONTACT_BK_PLUGIN_URL .'/assets/css/system-message.css');
}
/* 
 * Description : REGISTER AJAX BASED FUNCTIONS TO BE CALLED ON ACTION TYPE AS PER WORDPRESS GUIDELINES
 * Created in Version 1.0 
 * Last Modified : 1.0
 * Reasons for change : None
 */ 
if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case "add_contact_form_library":
		add_action( 'admin_init', 'add_contact_form_library');
		function add_contact_form_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/lib/contact_view-class.php';
		}
		break;
		case "create_textbox_library":
		add_action( 'admin_init', 'create_textbox_library');
		function create_textbox_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_text.php';
		}
		break;
		case "create_textarea_library":
		add_action( 'admin_init', 'create_textarea_library');
		function create_textarea_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_textarea.php';
		}
		break;
		case "create_email_library":
		add_action( 'admin_init', 'create_email_library');
		function create_email_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_email.php';
		}
		break;
		case "create_dropdown_library":
		add_action( 'admin_init', 'create_dropdown_library');
		function create_dropdown_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_dropdown.php';
		}
		break;
		case "create_checkbox_library":
		add_action( 'admin_init', 'create_checkbox_library');
		function create_checkbox_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_checkbox.php';
		}
		break;
		case "create_multiple_library":
		add_action( 'admin_init', 'create_multiple_library');
		function create_multiple_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_multiple.php';
		}
		break;
		case "create_captcha_library":
		add_action( 'admin_init', 'create_captcha_library');
		function create_captcha_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_captcha.php';
		}
		break;
		
		case "create_group_library":
		add_action( 'admin_init', 'create_group_library');
		function create_group_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_group.php';
		}
		break;
		
		case "create_txt_file_library":
		add_action( 'admin_init', 'create_txt_file_library');
		function create_txt_file_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_file_upload.php';
		}
		break;
		case "create_recaptcha_library":
		add_action( 'admin_init', 'create_recaptcha_library');
		function create_recaptcha_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_recaptcha.php';
		}
		break;
		
		case "create_html_library":
		add_action( 'admin_init', 'create_html_library');
		function create_html_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_html.php';
		}
		break;
		case "create_date_library":
		add_action( 'admin_init', 'create_date_library');
		function create_date_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_date.php';
		}
		break;
		
		case "create_time_library":
		add_action( 'admin_init', 'create_time_library');
		function create_time_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_time.php';
		}
		break;
		
		case "create_hidden_library":
		add_action( 'admin_init', 'create_hidden_library');
		function create_hidden_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_hidden.php';
		}
		break;
		
		case "create_password_library":
		add_action( 'admin_init', 'create_password_library');
		function create_password_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/includes/cb_password.php';
		}
		break;
		case "edit_contact_form_library":
		add_action( 'admin_init', 'edit_contact_form_library');
		function edit_contact_form_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/lib/edit_contact_view-class.php';
		}
		break;
		case "frontend_contact_form_library":
		add_action( 'admin_init', 'frontend_contact_form_library');
		function frontend_contact_form_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/lib/contact_bank_frontend-class.php';
		}
		break;
		case "email_contact_form_library":
		add_action( 'admin_init', 'email_contact_form_library');
		function email_contact_form_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/lib/contact_bank_email-class.php';
		}
		break;
		case "email_management_contact_form_library":
		add_action( 'admin_init', 'email_management_contact_form_library');
		function email_management_contact_form_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/views/contact_bank_email_management.php';
		}
		break;
		case "frontend_data_contact_library":
		add_action( 'admin_init', 'frontend_data_contact_library');
		function frontend_data_contact_library()
		{
			global $wpdb;
			include_once CONTACT_BK_PLUGIN_DIR . '/lib/contact_frontend_data_class.php';
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
	return $wpdb->prefix . 'cb_contact_form';
}
function contact_bank_dynamic_settings_form()
{
	global $wpdb;
	return $wpdb->prefix . 'cb_dynamic_settings';
}
function create_control_Table()
{
	global $wpdb;
	return $wpdb->prefix . 'cb_create_control_form';
}
function dynamic_setting_advance()
{
	global $wpdb;
	return $wpdb->prefix . 'cb_dynamic_settings_advance';
}
function frontend_controls_data_Table()
{
	global $wpdb;
	return $wpdb->prefix . 'cb_frontend_data_table';
}
function contact_bank_email_template_admin()
{
	global $wpdb;
	return $wpdb->prefix . 'cb_email_template_admin';
}
function contact_bank_frontend_forms_Table()
{
	global $wpdb;
	return $wpdb->prefix . 'cb_frontend_forms_table';
}

function contact_bank_short_code($atts) 
{
	extract(shortcode_atts(array(
	"form_id" => '',
	), $atts));
	$con = '';
	foreach((array)$form_id as $f)
	{
		$con .=  $f;
	}
	return extract_short_code($con);
}
function extract_short_code($con) 
{
	$form_id = $con;
	ob_start();
	require CONTACT_BK_PLUGIN_DIR.'/views/contact_bank_frontend.php';
	$contactbank_output = ob_get_clean();
	wp_reset_query();
	return $contactbank_output;
}
function add_contact_bank_icon($meta = TRUE) 
{
	global $wp_admin_bar;  
	if ( !is_user_logged_in() ) { return; }  
	if ( !is_super_admin() || !is_admin_bar_showing() ) { return; }  
	$wp_admin_bar->add_menu( array(
	'id' => 'contact_bank_links',
	'title' =>  '<img src="'.CONTACT_BK_PLUGIN_URL.'/icon.png" width="25" height="25" style="vertical-align:text-top; margin-right:5px;" />Contact Bank' , 
	'href' => site_url() .'/wp-admin/admin.php?page=dashboard',
	) );
	
	$wp_admin_bar->add_menu( array(  
		'parent' => 'contact_bank_links',
		'id'     => 'dashboard_links',
		'href'  => site_url() .'/wp-admin/admin.php?page=dashboard',  
		'title' => __( 'Dashboard') )         /* set the sub-menu name */  
	);
	$wp_admin_bar->add_menu( array(  
		'parent' => 'contact_bank_links',
		'id'     => 'global_settings_links',
		'href'  => site_url() .'/wp-admin/admin.php?page=contact_bank',
		'title' => __( 'Add New Form') )         /* set the sub-menu name */  
	);
	$wp_admin_bar->add_menu( array(  
		'parent' => 'contact_bank_links',  
		'id'     => 'email_links',
		'href'  => site_url() .'/wp-admin/admin.php?page=contact_email',
		'title' => __( 'Email Settings') )         /* set the sub-menu name */  
	);
	$wp_admin_bar->add_menu( array(  
		'parent' => 'contact_bank_links',  
		'id'     => 'frontend_data_links',
		'href'  => site_url() .'/wp-admin/admin.php?page=frontend_data',
		'title' => __( 'Form Entries'))         /* set the sub-menu name */  
	);
	$wp_admin_bar->add_menu( array(  
		'parent' => 'contact_bank_links',  
		'id'     => 'documents_data_links',
		'href'  => site_url() .'/wp-admin/admin.php?page=documentation',
		'title' => __( 'Documentation'))         /* set the sub-menu name */  
	);
}
add_action( 'media_buttons_context', 'add_emg_shortcode_button', 1);
	function add_emg_shortcode_button($context) {
		 add_thickbox(); 
		$img = CONTACT_BK_PLUGIN_URL . '/assets/images/icon.png';
		$container_id = 'modal';
		$title = 'Contact Bank Form Shortcode';
		$context .= '<a href="#TB_inline?width=300&height=400&inlineId=my-content-id"  class="button thickbox "  title="' . __("Add Contact Bank Form", contact_bank) . '"><span class="contact_icon"></span> Add Form</a>';
		return $context;
	}	
	 add_action('admin_footer',  'add_mce_popup');
	
function add_mce_popup(){
?>
<?php add_thickbox(); ?>
		<div id="my-content-id" style="display:none;">
			<div style="padding:15px 15px 0 15px;">
				<h3 style="color:#5A5A5A!important; font-family:Georgia,Times New Roman,Times,serif!important; font-size:1.8em!important; font-weight:normal!important;"><?php _e("Insert Contact Bank Form", contact_bank); ?></h3>
				<span>
					<?php _e("Select a form below to add it to your post or page.", contact_bank); ?>
				</span>
			</div>
			<div style="padding:15px 15px 0 15px;">
				<select id="add_form_id" class="layout-span3">
					<option value="">  <?php _e("Select a Form", contact_bank); ?>  </option>
						<?php
						global $wpdb;
						$forms = $wpdb->get_results
						(
							$wpdb->prepare
							(
								"SELECT * FROM " .contact_bank_contact_form(),""
							)
						);
						for($flag = 0;$flag<count($forms);$flag++)
						{
							?>
								<option value="<?php echo intval($forms[$flag]->form_id); ?>"><?php echo esc_html($forms[$flag]->form_name) ?></option>
							<?php
						}
						?>
				</select><br /><br />
				<div style="font-size:11px; font-style:italic; color:#5A5A5A"><?php _e("Can't find your form? Make sure it is active.", contact_bank); ?></div>
			</div>
			
			 <div style="padding:15px;">
				<input type="button" class="button-primary" value="Insert Form" onclick="InsertForm();"/>&nbsp;&nbsp;&nbsp;
				<a class="button" style="color:#bbb;" href="#" onclick="tb_remove(); return false;"><?php _e("Cancel", contact_bank); ?></a>
			</div>
		</div>
		<script type="text/javascript">
			function InsertForm()
			{
				var form_id = jQuery("#add_form_id").val();
				if(form_id == "")
				{
					alert("<?php _e("Please select a form", contact_bank) ?>");
					return;
				}
				var form_name = jQuery("#add_form_id option[value='" + form_id + "']").text().replace(/[\[\]]/g, '');
				window.send_to_editor("[contact_bank form_id=" + form_id + "]");
			}
		</script>
		<?php
}
function thsp_enqueue_pointer_script_style( $hook_suffix ) {
		// Assume pointer shouldn't be shown

	$enqueue_pointer_script_style = false;
 
		// Get array list of dismissed pointers for current user and convert it to array

	$dismissed_pointers = explode( ',', get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
 
		// Check if our pointer is not among dismissed ones
	if( !in_array( 'thsp_contact_bank_pointer', $dismissed_pointers ) ) {
		$enqueue_pointer_script_style = true;

		// Add footer scripts using callback function
		add_action( 'admin_print_footer_scripts', 'thsp_pointer_print_scripts' );
	}
 
		// Enqueue pointer CSS and JS files, if needed
	if( $enqueue_pointer_script_style ){
		wp_enqueue_style( 'wp-pointer' );
		wp_enqueue_script( 'wp-pointer' );
	}
}
add_action( 'admin_enqueue_scripts', 'thsp_enqueue_pointer_script_style' );
 
function thsp_pointer_print_scripts() {
 
	$pointer_content  = "<h3>Contact Bank</h3>";
	$pointer_content .= "<p>If you are using Contact Bank for the first time, you can view this <a href=http://www.youtube.com/embed/EcqbsXmPbaI target=_blank>video</a> to setup the Plugin.</p>";
	?>

	<script type="text/javascript">
	//<![CDATA[
	jQuery(document).ready( function($) {
		$('#toplevel_page_dashboard').pointer({
			content:'<?php echo $pointer_content; ?>',
			position:{
				edge:   'left', // arrow direction
				align:  'center' // vertical alignment
				},
			pointerWidth:   350,
			close:function() {
					$.post( ajaxurl, {
					pointer: 'thsp_contact_bank_pointer', // pointer ID
					action: 'dismiss-wp-pointer'
				});
			}
		}).pointer('open');
	});
	//]]>
	</script>
<?php
}
function plugin_load_textdomain() 
{
	if(function_exists( 'load_plugin_textdomain' ))
	{
		load_plugin_textdomain(contact_bank, false, CONTACT_BK_PLUGIN_DIRNAME .'/languages');
	}
}
add_action('plugins_loaded', 'plugin_load_textdomain');
/*************************************************************************************/
add_action('admin_bar_menu', 'add_contact_bank_icon',100);
// add_action Hook called for function frontend_plugin_css_scripts_contact_bank  
add_action('init','frontend_plugin_css_styles_contact_bank');
// add_action Hook called for function backend_plugin_css_scripts_contact_bank
add_action('admin_init','backend_plugin_css_styles_contact_bank');
// add_action Hook called for function frontend_plugin_js_scripts_contact_bank
add_action('init','frontend_plugin_js_scripts_contact_bank');
// add_action Hook called for function backend_plugin_js_scripts_contact_bank
add_action('admin_init','backend_plugin_js_scripts_contact_bank');
// add_action Hook called for function create_global_menus_for_contact_bank
add_action('admin_menu','create_global_menus_for_contact_bank');
// Activation Hook called for function plugin_install_script_for_contact_bank
register_activation_hook(__FILE__,'plugin_install_script_for_contact_bank');
// add_Shortcode Hook called for function contact_bank_short_code for FrontEnd
add_shortcode('contact_bank', 'contact_bank_short_code');
// Uninstall Hook called for function plugin_install_script_for_contact_bank
register_uninstall_hook(__FILE__,'plugin_uninstall_script_for_contact_bank');
add_filter('widget_text', 'do_shortcode');
class Contact_Bank_Widget extends WP_Widget
{
	function Contact_Bank_Widget()
	{
		$widget_ops = array('classname' => 'Contact_Bank_Widget', 'description' => 'Uses Contact Form' );
		$this->WP_Widget('Contact_Bank_Widget', 'Contact Bank', $widget_ops);
	}
	function form($instance)
	{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'form_id' => '0' ) );
		$title = $instance['title'];
		global $wpdb;
		$form_data = $wpdb->get_results
		(
			$wpdb->prepare
			(
				"SELECT * FROM " .contact_bank_contact_form(),""
			)
		);
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('form_id'); ?>"><?php _e('Select Form :', contact_bank); ?></label>
			<select size="1" name="<?php echo $this->get_field_name('form_id'); ?>" id="<?php echo $this->get_field_id('form_id'); ?>" class="widefat">
				<option value="0"  ><?php _e('Select Form', contact_bank); ?></option>
			<?php
			if($form_data) {
				foreach($form_data as $form) {
				echo '<option value="'.$form->form_id.'" ';
				if ($form->form_id == $instance['form_id']) echo "selected='selected' ";
				echo '>'.stripslashes(html_entity_decode($form->form_name)).'</option>'."\n\t"; 
				}
			}
			?>
			</select>
		</p>
		<?php
	}
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['form_id'] = (int) $new_instance['form_id'];
		return $instance;
	}
	function widget($args, $instance)
	{
		global $wpdb;
		$form_data = $wpdb->get_var
		(
			$wpdb->prepare
			(
				"SELECT count(*) FROM " .contact_bank_contact_form() . " WHERE form_id = %d",
				$instance['form_id']
			)
		);
		
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		if($form_data > 0)
		{
			if($instance['form_id'] != 0)
			{
				echo $before_title . $title . $after_title;
				$shortcode_for_contact_bank_form = "[contact_bank form_id=" . $instance['form_id'] . "]";
				echo do_shortcode( $shortcode_for_contact_bank_form );
				echo $after_widget;
			}
		}
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("Contact_Bank_Widget");') );

?>