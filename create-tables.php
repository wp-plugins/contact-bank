<?php
global $wpdb;
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
if (count($wpdb->get_var('SHOW TABLES LIKE "' . contact_bank_contact_form() . '"')) == 0)
{
	$sql = 'CREATE TABLE ' . contact_bank_contact_form() . '(
	form_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	form_name VARCHAR(200) NOT NULL,
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
	dynamic_settings_value VARCHAR(100) NOT NULL,
	PRIMARY KEY (dynamic_settings_id)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
	dbDelta($sql);
}
if (count($wpdb->get_var('SHOW TABLES LIKE "' . create_control_Table() . '"')) == 0)
{
	$sql= 'CREATE TABLE '.create_control_Table(). '(
	control_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	field_id INTEGER(50) NOT NULL,
	form_id INTEGER(10) NOT NULL,
	column_dynamicId VARCHAR(10) NOT NULL,
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
?>