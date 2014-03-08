<?php
global $wpdb;
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
if (count($wpdb->get_var('SHOW TABLES LIKE "' . contact_bank_contact_form() . '"')) == 0)
{
	$sql = 'CREATE TABLE ' . contact_bank_contact_form() . '(
	form_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	form_name VARCHAR(200) NOT NULL,
	success_message VARCHAR(200) NOT NULL,
	chk_url INTEGER(10) NOT NULL,
	redirect_url VARCHAR(200) NOT NULL,
	PRIMARY KEY (form_id)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
	dbDelta($sql);
}
if (count($wpdb->get_var('SHOW TABLES LIKE "' . contact_bank_dynamic_settings_form() . '"')) == 0)
{
	$sql = 'CREATE TABLE ' . contact_bank_dynamic_settings_form() . '(
	dynamic_settings_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	dynamicId INTEGER(10) NOT NULL,
	dynamic_settings_key VARCHAR(100) NOT NULL,
	dynamic_settings_value TEXT NOT NULL,
	PRIMARY KEY (dynamic_settings_id)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
	dbDelta($sql);
}
else
{
	$wpdb->query
	(
		$wpdb->prepare
		(
		  "UPDATE " . contact_bank_dynamic_settings_form() . " SET `dynamic_settings_key` = %s where `dynamic_settings_key` = %s",
		   "cb_checkbox_alpha_num_filter",
		   "cb_ux_checkbox_alpha_num_filter"
		)
	);
}
if (count($wpdb->get_var('SHOW TABLES LIKE "' . create_control_Table() . '"')) == 0)
{
	$sql= 'CREATE TABLE '.create_control_Table(). '(
	control_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	field_id INTEGER(50) NOT NULL,
	form_id INTEGER(10) NOT NULL,
	column_dynamicId INTEGER(10) NOT NULL,
	sorting_order INTEGER(10) NOT NULL,
	PRIMARY KEY(control_id)
	)ENGINE = MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
	dbDelta($sql);
}
if (count($wpdb->get_var('SHOW TABLES LIKE "' . frontend_controls_data_Table() . '"')) == 0)
{
	$sql = 'CREATE TABLE ' . frontend_controls_data_Table() . '(
	id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	form_id INTEGER(10) NOT NULL,
	field_Id INTEGER(10) NOT NULL,
	dynamic_control_id VARCHAR(100) NOT NULL,
	dynamic_frontend_value TEXT NOT NULL,
	form_submit_id INTEGER(10) NOT NULL,
	PRIMARY KEY (id)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
	dbDelta($sql);
}
if (count($wpdb->get_var('SHOW TABLES LIKE "' . contact_bank_email_template_admin() . '"')) == 0)
{
	$sql = 'CREATE TABLE ' . contact_bank_email_template_admin() . '(
	email_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	email_to VARCHAR(100) NOT NULL,
	email_from VARCHAR(100) NOT NULL,
	body_content TEXT NOT NULL,
	subject VARCHAR(400) NOT NULL,
	form_id INTEGER(10) NOT NULL,
	type  INTEGER(10) NOT NULL,
	PRIMARY KEY (email_id)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
	dbDelta($sql);
	
}
if (count($wpdb->get_var('SHOW TABLES LIKE "' . contact_bank_frontend_forms_Table() . '"')) == 0)
{
	$sql = 'CREATE TABLE ' . contact_bank_frontend_forms_Table() . '(
	id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	form_id INTEGER(10) NOT NULL,
	submit_id INTEGER(10) NOT NULL,
	PRIMARY KEY (id)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
	dbDelta($sql);
}
if (count($wpdb->get_var('SHOW TABLES LIKE "' . contact_bank_contact_form() . '"')) != 0)
{
	$sucess_url_check = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . contact_bank_contact_form() . " LIKE 'success_message'",""
		)
	);
	if($sucess_url_check != "success_message")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . contact_bank_contact_form() . " ADD success_message VARCHAR(200) NOT NULL",""
			)
		);
	}
	$chk_url_column  = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . contact_bank_contact_form() . " LIKE 'chk_url'",""
		)
	);
	if($chk_url_column != "chk_url")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . contact_bank_contact_form() . " ADD chk_url INTEGER(10) NOT NULL",""
			)
		);
	}
	$redirect_url_check  = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . contact_bank_contact_form() . " LIKE 'redirect_url'",""
		)
	);
	if($redirect_url_check != "redirect_url")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . contact_bank_contact_form() . " ADD redirect_url VARCHAR(200) NOT NULL",""
			)
		);
	}
	$column_dynamic   = $wpdb->get_var
 	(
  		$wpdb->prepare
  		(
   			"ALTER TABLE " . create_control_Table() . " MODIFY COLUMN column_dynamicId INTEGER(10) NOT NULL",""
  		)
 	);
}
?>