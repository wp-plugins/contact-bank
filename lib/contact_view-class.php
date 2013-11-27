<?php
global $current_user;
$current_user = wp_get_current_user();
if (!current_user_can("edit_posts") && ! current_user_can("edit_pages"))
{
	return;
}
else
{
	if(isset($_REQUEST["param"]))
	{
		if($_REQUEST["param"] == "add_settings_div")
		{
			$dynamicId = intval($_REQUEST["dynamicId"]);
			$field_type = intval($_REQUEST["field_type"]);
			$count_id = intval($_REQUEST["count_id"]);
			
			if($count_id == 1)
			{
				$count = intval($_REQUEST["count"]);
			}
			else 
			{
				$count = 0;
			}
			switch($field_type)
			{
				case 1:
					$param = "textbox_settings";
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_text.php";
				break;
				case 2:
					$param = "textarea_settings";
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_textarea.php";
				break;
				case 3:
					$param = "email_settings";
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_email.php";
				break;
				case 4:
					$param = "dropdown_settings";
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_dropdown.php";
				break;
				case 5:
					$param = "checkbox_settings";
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_checkbox.php";
				break;
				
				case 6:
					$param = "radio_button_settings";
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_multiple.php";
				break;
				case 9:
					$param = "file-upload_settings";
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_file_upload.php";
				break;
				case 12:
					$param = "date_settings";
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_date.php";
				break;
				case 13:
					$param = "time_settings";
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_time.php";
				break;
				case 14:
					$param = "hidden_settings";
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_hidden.php";
				break;
				case 15:
					$param = "password_settings";
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_password.php";
				break;
			}
			die();
		}
		else if($_REQUEST["param"]== "delete_form")
		{
			$form_id =  intval($_REQUEST["id"]);
			global $wpdb;
			$dynamicIds = $wpdb->get_results
			(
				$wpdb->prepare
				(
					"SELECT * FROM " .create_control_Table()." WHERE form_id = %d ",
					$form_id
				)
			);
			for($flag =0;$flag<count($dynamicIds);$flag++)
			{
				echo $dynamic_Id = $dynamicIds[$flag]->column_dynamicId;
				$wpdb->query
				(
					$wpdb->prepare
					(
						"DELETE FROM " .contact_bank_dynamic_settings_form()." WHERE dynamicId = %d ",
						$dynamic_Id
					)
				);
			}
			$wpdb->query
			(
				$wpdb->prepare
				(
					"DELETE FROM " .contact_bank_contact_form()." WHERE form_id = %d ",
					$form_id
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"DELETE FROM " .create_control_Table()." WHERE form_id = %d ",
					$form_id
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"DELETE FROM " .contact_bank_email_template_admin()." WHERE form_id = %d ",
					$form_id
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"DELETE FROM " .frontend_controls_data_Table()." WHERE form_id = %d ",
					$form_id
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"DELETE FROM " .contact_bank_frontend_forms_Table()." WHERE form_id = %d ",
					$form_id
				)
			);
			die();
		}
		else if($_REQUEST["param"]== "delete_forms")
		{
			global $wpdb;
				$wpdb->query
				(
					$wpdb->prepare
					(
						"TRUNCATE Table ".create_control_Table(),""
					)
				);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"TRUNCATE Table ".contact_bank_dynamic_settings_form(),""
					)
				);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"TRUNCATE Table ".contact_bank_contact_form(),""
					)
				);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"TRUNCATE Table ".contact_bank_email_template_admin(),""
					)
				);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"TRUNCATE Table ".frontend_controls_data_Table(),""
					)
				);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"TRUNCATE Table ".contact_bank_frontend_forms_Table(),""
					)
				);
			die();
		}
		else if($_REQUEST["param"] == "submit_controls")
		{
			
			$form = intval($_REQUEST["form"]);
			if($form == 1)
			{
				$field_order = esc_attr($_REQUEST["field_order"]);
				if(isset($_REQUEST["field_order"]))
				{
					$field_order = esc_attr($_REQUEST["field_order"]);
					if($field_order != "")
					{
						$field_order_id =  (explode(",",$field_order));
					}
				}
				$control_dynamic_id = esc_attr($_REQUEST["new_control_dynamic_ids"]);
				$new_control_dynamic_ids =  (explode(",",$control_dynamic_id));
				
				$control_type = esc_attr($_REQUEST["created_control_type"]);
				$control_type_ids = $control_type != "" ? explode(",",$control_type) : Array();
				
				$field_dynamic_id = esc_attr($_REQUEST["field_dynamic_id"]);
				$field_exist_dynamic_id = $field_dynamic_id != "" ? explode(",",$field_dynamic_id) : Array();
				
				$ux_form_name_txt = esc_attr($_REQUEST["form_name"]);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"INSERT INTO ".contact_bank_contact_form()."(form_name) VALUES(%s)",
						$ux_form_name_txt
					)
				);
				echo $form_id=$wpdb->insert_id;
				
				for($flag = 0; $flag < count($control_type_ids); $flag++)
				{
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO " . create_control_Table() . "(form_id,field_id,column_dynamicId) VALUES(%s,%s,%s)",
							$form_id,
							$control_type_ids[$flag],
							$new_control_dynamic_ids[$flag]
						)
					);
					
					$sort_id=$wpdb->insert_id;
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"UPDATE " . create_control_Table() . " SET sorting_order = %d WHERE control_id = %d",
							$sort_id,
							$sort_id
						)
					);
				}
				
				for($flag1=0;$flag1<count($field_order_id);$flag1++)
				{
					$wpdb->query
					(
						$wpdb->prepare
						(
							"UPDATE " . create_control_Table() . " SET sorting_order = %d WHERE column_dynamicId = %d",
							$flag1,
							$field_exist_dynamic_id[$flag1]
						)
					);
				}
			}
			else 
			{
				$control_type = intval($_REQUEST["control_type"]);
				switch($control_type)
				{
					case 1:
						$dynamicId = intval($_REQUEST["dynamicId"]);
						$array_text = esc_attr(html_entity_decode($_REQUEST["array_text"]));
						$array_text_data = (explode(",",$array_text));
						if(count($array_text_data) == 1)
						{
							$array_text_data[2] = "Untitled";
							$array_text_data[3] = "";
							$array_text_data[4] = "";
							$array_text_data[5] = "";
							$array_text_data[6] = "";
							$array_text_data[7] = "Untitled";
							$array_text_data[8] = "";
							$array_text_data[9] = "";
							$array_text_data[10] = "";
							$array_text_data[11] = "";
							$array_text_data[12] = "";
							$array_text_data[13] = "";
							$array_text_data[14] = "";
							$array_text_data[15] = "";
							$array_text_data[16] = "";
						}
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_label_value",
								$array_text_data[2]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_description",
								$array_text_data[3]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_control_required",
								$array_text_data[4]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_tooltip_txt",
								$array_text_data[5]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_default_txt_val",
								$array_text_data[6]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_admin_label",
								$array_text_data[7]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_show_email",
								$array_text_data[8]
							)
						);
						
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_button_set_outer_label_textbox", 
								$array_text_data[9]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_button_set_txt_input_textbox", 
								$array_text_data[10]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_button_set_txt_description_textbox", 
								$array_text_data[11]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_checkbox_alpha_filter", 
								$array_text_data[12]
							)
						);
							
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_ux_checkbox_alpha_num_filter", 
								$array_text_data[13]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_checkbox_digit_filter", 
								$array_text_data[14]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_checkbox_strip_tag_filter", 
								$array_text_data[15]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								"cb_checkbox_trim_filter", 
								$array_text_data[16]
							)
						);
						die();
					break;
				case 2:	
					$dynamicId = intval($_REQUEST["dynamicId"]);
					$array_textarea = esc_attr(html_entity_decode($_REQUEST["array_textarea"]));
					$array_textarea_data=  (explode(",",$array_textarea));
					if(count($array_textarea_data) == 1)
					{
						$array_textarea_data[2] = "Untitled";
						$array_textarea_data[3] = "";
						$array_textarea_data[4] = "";
						$array_textarea_data[5] = "";
						$array_textarea_data[6] = "";
						$array_textarea_data[7] = "Untitled";
						$array_textarea_data[8] = "";
						$array_textarea_data[9] = "";
						$array_textarea_data[10] = "";
						$array_textarea_data[11] = "";
						$array_textarea_data[12] = "";
						$array_textarea_data[13] = "";
						$array_textarea_data[14] = "";
						$array_textarea_data[15] = "";
						$array_textarea_data[16] = "";
					}
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_label_value",
							$array_textarea_data[2]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_description",
							$array_textarea_data[3]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_control_required",
							$array_textarea_data[4]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_tooltip_txt",
							$array_textarea_data[5]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
		
							$dynamicId,
							"cb_default_txt_val",
							$array_textarea_data[6]
						)
					);
					
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_admin_label",
							$array_textarea_data[7]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_show_email",
							$array_textarea_data[8]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_outer_label",  
							$array_textarea_data[9]
						)
					);
		
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_textinput", 
							$array_textarea_data[10]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_outer_description", 
							$array_textarea_data[11]
						)
					);
				
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_alpha_filter", 
							$array_textarea_data[12]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_alpha_num_filter", 
							$array_textarea_data[13]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_digit_filter", 
							$array_textarea_data[14]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"checkbox_strip_tag_filter",
							$array_textarea_data[15]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"checkbox_trim_filter",
							$array_textarea_data[16]
						)
					);
				break;
				case 3:
					$dynamicId = intval($_REQUEST["dynamicId"]);
					$array_email = esc_attr(html_entity_decode($_REQUEST["array_email"]));
					$array_email_data=  (explode(",",$array_email));
					if(count($array_email_data) == 1)
					{
						$array_email_data[2] = "Email";
						$array_email_data[3] = "";
						$array_email_data[4] = "1";
						$array_email_data[5] = "";
						$array_email_data[6] = "Email";
						$array_email_data[7] = "";
						$array_email_data[8] = "";
						$array_email_data[9] = "";
						$array_email_data[10] = "";
						$array_email_data[11] = "";
						$array_email_data[12] = "";
						$array_email_data[13] = "";
						$array_email_data[14] = "";
						$array_email_data[15] = "";
					}
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_label_value",
							$array_email_data[2]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_description",
							$array_email_data[3]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_control_required",
							$array_email_data[4]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_tooltip_txt",
							$array_email_data[5]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_admin_label",
							$array_email_data[6]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_show_email",
							$array_email_data[7]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_outer_label", 
							$array_email_data[8]
						)
					);
		
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_txt_input", 
							$array_email_data[9]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_txt_description", 
							$array_email_data[10]
						)
					);
				
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_alpha_filter", 
							$array_email_data[11]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_ux_checkbox_alpha_num_filter", 
							$array_email_data[12]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_digit_filter", 
							$array_email_data[13]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_strip_tag_filter", 
							$array_email_data[14]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_trim_filter",
							$array_email_data[15]
						)
					);
				break;
				case 4:
					$dynamicId = intval($_REQUEST["dynamicId"]);
					$array_dropdown = esc_attr(html_entity_decode($_REQUEST["array_dropdown"]));
					$array_ddl_data=  (explode(",",$array_dropdown));
					if(count($array_ddl_data) == 1)
					{
						$array_ddl_data[2] = "Untitled";
						$array_ddl_data[3] = "";
						$array_ddl_data[4] = "";
						$array_ddl_data[5] = "";
						$array_ddl_data[6] = "";
						$array_ddl_data[7] = "Untitled";
						$array_ddl_data[8] = "";
						$array_ddl_data[9] = "";
						$array_ddl_data[10] = "";
						$array_ddl_data[11] = "";
					}
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_label_value",
							$array_ddl_data[2]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_control_required",
							$array_ddl_data[3]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_tooltip_txt",
							$array_ddl_data[4]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_dropdown_options_dynamicId",
							$array_ddl_data[5]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_dropdown_options",
							$array_ddl_data[6]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_admin_label",
							$array_ddl_data[7]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_show_email",
							$array_ddl_data[8]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_outer_label", 
							$array_ddl_data[9]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_dropdown_menu", 
							$array_ddl_data[10]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_description",
							$array_ddl_data[11]
						)
					);
				break;
				case 5:
					$dynamicId = intval($_REQUEST["dynamicId"]);
					$array_checkbox = esc_attr(html_entity_decode($_REQUEST["array_checkbox"]));
					$array_checkbox_data=  (explode(",",$array_checkbox));
					if(count($array_checkbox_data) == 1)
					{
						$array_checkbox_data[2] = "Untitled";
						$array_checkbox_data[3] = "";
						$array_checkbox_data[4] = "";
						$array_checkbox_data[5] = "";
						$array_checkbox_data[6] = "";
						$array_checkbox_data[7] = "Untitled";
						$array_checkbox_data[8] = "";
						$array_checkbox_data[9] = "";
						$array_checkbox_data[10] = "";
						$array_checkbox_data[11] = "";
						$array_checkbox_data[12] = "";
						$array_checkbox_data[13] = "";
					}
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_label_value",
							$array_checkbox_data[2]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_control_required",
							$array_checkbox_data[3]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_tooltip_txt",
							$array_checkbox_data[4]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_options_dynamicId",
							$array_checkbox_data[5]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_options",
							$array_checkbox_data[6]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_admin_label",
							$array_checkbox_data[7]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_show_email",
							$array_checkbox_data[8]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_outer_label", 
							$array_checkbox_data[9]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_description", 
							$array_checkbox_data[10]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_options_outer_wrapper",
							$array_checkbox_data[11]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_options_wrapper",
							$array_checkbox_data[12]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_options_label",
							$array_checkbox_data[13]
						)
					);
				break;
				case 6:
					$dynamicId = intval($_REQUEST["dynamicId"]);
					$array_multiple = esc_attr(html_entity_decode($_REQUEST["array_multiple"]));
					$array_multiple_data=  (explode(",",$array_multiple));
					if(count($array_multiple_data) == 1)
					{
						$array_multiple_data[2] = "Untitled";
						$array_multiple_data[3] = "";
						$array_multiple_data[4] = "";
						$array_multiple_data[5] = "";
						$array_multiple_data[6] = "";
						$array_multiple_data[7] = "Untitled";
						$array_multiple_data[8] = "";
						$array_multiple_data[9] = "";
						$array_multiple_data[10] = "";
						$array_multiple_data[11] = "";
						$array_multiple_data[12] = "";
						$array_multiple_data[13] = "";
					}
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_label_value",
							$array_multiple_data[2]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_control_required",
							$array_multiple_data[3]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_tooltip_txt",
							$array_multiple_data[4]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_multiple_options_dyanmicId",
							$array_multiple_data[5]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_multiple_options",
							$array_multiple_data[6]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_admin_label",
							$array_multiple_data[7]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_show_email",
							$array_multiple_data[8]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_outer_label", 
							$array_multiple_data[9]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_description", 
							$array_multiple_data[10]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_options_outer_wrapper",
							$array_multiple_data[11]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_options_wrapper",
							$array_multiple_data[12]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_options_label",
							$array_multiple_data[13]
						)
					);
				break;
				case 9:
					$dynamicId = intval($_REQUEST["dynamicId"]);
					$array_file_upload = esc_attr(html_entity_decode($_REQUEST["array_file_upload"]));
					$array_file_upload_data=  (explode(",",$array_file_upload));
					if(count($array_file_upload_data) == 1)
					{
						$array_file_upload_data[2] = "File Upload";
						$array_file_upload_data[3] = "";
						$array_file_upload_data[4] = "";
						$array_file_upload_data[5] = "";
						$array_file_upload_data[6] = "File Upload";
						$array_file_upload_data[7] = "";
						$array_file_upload_data[8] = "";
						$array_file_upload_data[9] = "jpg;jpeg;png;gif;";
						$array_file_upload_data[10] = "1024";
						$array_file_upload_data[11] = "";
						$array_file_upload_data[12] = "";
						$array_file_upload_data[13] = "";
					}
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_label_value",
							$array_file_upload_data[2]
						
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_description",
							$array_file_upload_data[3]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_control_required",
							$array_file_upload_data[4]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_tooltip_txt",
							$array_file_upload_data[5]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_admin_label",
							$array_file_upload_data[6]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_show_email",
							$array_file_upload_data[7]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_allow_multiple_file",
							$array_file_upload_data[8]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_allow_file_ext_upload",
							$array_file_upload_data[9]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_maximum_file_allowed",
							$array_file_upload_data[10]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_uploaded_file_email_db",
							$array_file_upload_data[11]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_outer_label_file",  
							$array_file_upload_data[12]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_outer_description_fileuplod", 
							$array_file_upload_data[13]
						)
					);
				break;
				case 12:
					$dynamicId = intval($_REQUEST["dynamicId"]);
					$array_date = esc_attr(html_entity_decode($_REQUEST["array_date"]));
					$array_date_data=  (explode(",",$array_date));
					if(count($array_date_data) == 1)
					{
						
						$array_date_data[2] = "Date";
						$array_date_data[3] = "";
						$array_date_data[4] = "";
						$array_date_data[5] = "";
						$array_date_data[6] = "Date";
						$array_date_data[7] = "";
						$array_date_data[8] = "";
						$array_date_data[9] = "";
						$array_date_data[10] = date("d");
						$array_date_data[11] = date("m");
						$array_date_data[12] = date("Y");
						$array_date_data[13] = "";
						$array_date_data[14] = "0";
						$array_date_data[15] = "";
						$array_date_data[16] = "";
						$array_date_data[17] = "";
						$array_date_data[18] = "";
						$array_date_data[19] = "";
						$array_date_data[20] = "";
						
					}
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_label_value",
							$array_date_data[2]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_description",
							$array_date_data[3]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_control_required",
							$array_date_data[4]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_tooltip_txt",
							$array_date_data[5]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_admin_label",
							$array_date_data[6]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_show_email",
							$array_date_data[7]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_start_year",
							$array_date_data[8]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_end_year",
							$array_date_data[9]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_default_value_day",
							$array_date_data[10]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_default_value_month",
							$array_date_data[11]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_default_value_year",
							$array_date_data[12]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_error_invalid",
							$array_date_data[13]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_date_format",
							$array_date_data[14]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_outer_label", 
							$array_date_data[15]
						)
					);
		
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_txt_input", 
							$array_date_data[16]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_description", 
							$array_date_data[17]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_date_day_dropdown", 
							$array_date_data[18]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_date_month_dropdown", 
							$array_date_data[19]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_date_year_dropdown", 
							$array_date_data[20]
						)
					);
				break;
				case 13:
					$dynamicId = intval($_REQUEST["dynamicId"]);
					$array_time = esc_attr(html_entity_decode($_REQUEST["array_time"]));
					$array_time_data=  (explode(",",$array_time));
					if(count($array_time_data) == 1)
					{
						$array_time_data[2] = "Time";
						$array_time_data[3] = "";
						$array_time_data[4] = "";
						$array_time_data[5] = "";
						$array_time_data[6] = "Time";
						$array_time_data[7] = "";
						$array_time_data[8] = "12";
						$array_time_data[9] = "";
						$array_time_data[10] = "";
						$array_time_data[11] = "0";
						$array_time_data[12] = "1";
						$array_time_data[13] = "";
						$array_time_data[14] = "";
						$array_time_data[15] = "";
						$array_time_data[16] = "";
						$array_time_data[17] = "";
						$array_time_data[18] = "";
					}
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_label_value",
							$array_time_data[2]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_description",
							$array_time_data[3]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_control_required",
							$array_time_data[4]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_tooltip_txt",
							$array_time_data[5]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_admin_label",
							$array_time_data[6]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_show_email",
							$array_time_data[7]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_hour_format",
							$array_time_data[8]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_hours",
							$array_time_data[9]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_minutes",
							$array_time_data[10]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_am_pm",
							$array_time_data[11]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_time_format",
							$array_time_data[12]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_outer_label", 
							$array_time_data[13]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_txt_input", 
							$array_time_data[14]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_description", 
							$array_time_data[15]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_time_hour_dropdown", 
							$array_time_data[16]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_time_minute_dropdown", 
							$array_time_data[17]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_time_am_pm_dropdown", 
							$array_time_data[18]
						)
					);
				break;
				case 14:
					$dynamicId = intval($_REQUEST["dynamicId"]);
					$array_hidden = esc_attr(html_entity_decode($_REQUEST["array_hidden"]));
					$array_hidden_data=  (explode(",",$array_hidden));
					if(count($array_hidden_data) == 1)
					{
						$array_hidden_data[2] = "Untitled(hidden)";
						$array_hidden_data[3] = "";
						$array_hidden_data[4] = "Untitled(hidden)";
						$array_hidden_data[5] = "";
					}
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_label_value",
							$array_hidden_data[2]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_default_value",
							$array_hidden_data[3]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_admin_label",
							$array_hidden_data[4]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_show_email",
							$array_hidden_data[5]
						)
					);
				break;
				case 15:
					$dynamicId = intval($_REQUEST["dynamicId"]);
					$array_password = esc_attr(html_entity_decode($_REQUEST["array_password"]));
					$array_password_data=  (explode(",",$array_password));
					if(count($array_password_data) == 1)
					{
						$array_password_data[2] = "Password";
						$array_password_data[3] = "";
						$array_password_data[4] = "";
						$array_password_data[5] = "";
						$array_password_data[6] = "Password";
						$array_password_data[7] = "";
						$array_password_data[8] = "";
						$array_password_data[9] = "";
						$array_password_data[10] = "";
						$array_password_data[11] = "";
						$array_password_data[12] = "";
						$array_password_data[13] = "";
						$array_password_data[14] = "";
						$array_password_data[15] = "";
					}
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_label_value",
							$array_password_data[2]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_description",
							$array_password_data[3]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_control_required",
							$array_password_data[4]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_tooltip_txt",
							$array_password_data[5]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_admin_label",
							$array_password_data[6]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_show_email",
							$array_password_data[7]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_outer_label", 
							$array_password_data[8]
						)
					);
		
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_txt_input", 
							$array_password_data[9]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_button_set_txt_description", 
							$array_password_data[10]
						)
					);
				
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_alpha_filter", 
							$array_password_data[11]
						)
					);
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_ux_checkbox_alpha_num_filter", 
							$array_password_data[12]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_digit_filter", 
							$array_password_data[13]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_strip_tag_filter", 
							$array_password_data[14]
						)
					);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
							$dynamicId,
							"cb_checkbox_trim_filter", 
							$array_password_data[15]
						)
					);
					break;
				}
			}
			die();			
		}
		else if($_REQUEST["param"] == "ux_allow_multiple_file_upload")
		{
			ob_start();
			$dynamicId = esc_attr($_REQUEST["dynamicId"]);
			?>
			
			<script>jQuery("#AjaxUploaderFilesButton").css("float","left")</script>
			<?php
			include CONTACT_BK_PLUGIN_DIR ."/phpfileuploader/phpuploader/include_phpuploader.php";
			$ux_allowed_file_extensions = esc_attr($_REQUEST["ux_allowed_file_extensions"]);
			$ux_allow_multiple_file = esc_attr($_REQUEST["ux_allow_multiple_file"]);
			$file_extensions = str_replace (";",",*.",$ux_allowed_file_extensions);
			$allowed_file_extension = "*.".$file_extensions;
			$ux_maximum_file_allowed_in_mb = esc_attr($_REQUEST["ux_maximum_file_allowed"]);
			$ux_maximum_file_allowed_in_kb = $ux_maximum_file_allowed_in_mb * 1;
			$uploader=new PhpUploader();
			$uploader->MultipleFilesUpload = $ux_allow_multiple_file == "true" ? true : false;
			$uploader->InsertText="Please choose Files";
			$uploader->MaxSizeKB=$ux_maximum_file_allowed_in_kb;
			$uploader->AllowedFileExtensions=$allowed_file_extension;
			$uploader->SaveDirectory= CONTACT_BK_PLUGIN_DIR ."/phpfileuploader/savefiles/";
			$uploader->FlashUploadMode="Partial";
			$uploader->Render();
			$allow_multiple = "";
			die();
		}
	}
}
?>