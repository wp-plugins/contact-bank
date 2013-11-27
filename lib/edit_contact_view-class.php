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
		if($_REQUEST["param"] == "submit_controls")
		{
			$form = intval($_REQUEST["form"]);
			$form_id = intval($_REQUEST["form_id"]);
			$field_order = esc_attr($_REQUEST["field_order"]);
			$field_order_id =  (explode(",",$field_order));
			if($form == 1)
			{
				$ux_form_name_txt = esc_attr($_REQUEST["form_name"]);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"UPDATE ".contact_bank_contact_form()." SET form_name =%s Where form_id = %d",
						$ux_form_name_txt,
						$form_id
					)
				);
				
				$created_control = esc_attr($_REQUEST["created_control_type"]);
				$control_type_ids = $created_control != "" ? explode(",",$created_control) :  Array();
				
				$control_dynamic_id = esc_attr($_REQUEST["new_control_dynamic_ids"]);
				$new_control_dynamic_ids = $control_dynamic_id != "" ? explode(",",$control_dynamic_id) :  Array();
				
				$field_dynamic_id = esc_attr($_REQUEST["field_dynamic_id"]);
				$field_exist_dynamic_id = $field_dynamic_id != "" ? explode(",",$field_dynamic_id) :  Array();
				
				$edit_created_control = esc_attr($_REQUEST["edit_created_control_type"]);
				$exist_created_control_type =  (explode(",",$edit_created_control));
				
				$edit_control_dynamic = esc_attr($_REQUEST["edit_control_dynamic_ids"]);
				$exist_control_dynamic_ids =  (explode(",",$edit_control_dynamic));
				for($flag = 0; $flag < count($control_type_ids); $flag++)
				{
					
					$wpdb->query
					(
						$wpdb->prepare
						(
							 "INSERT INTO " . create_control_Table() . "(form_id,field_id,column_dynamicId) VALUES(%d,%d,%s)",
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
				for($flag1 = 0; $flag1 < count($field_order_id); $flag1++)
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
				if(isset($_REQUEST["control_type"]))
				{
					$control_type = intval($_REQUEST["control_type"]);
					switch($control_type)
					{
						case 1:
							$dynamicId = intval($_REQUEST["dynamicId"]);
							$array_text = esc_attr(html_entity_decode($_REQUEST["array_text"]));
							$array_text_data = (explode(",",$array_text));
							if(count($array_text_data) > 1)
							{
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[2],
										$dynamicId,
										"cb_label_value"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[3],
										$dynamicId,
										"cb_description"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[4],
										$dynamicId,
										"cb_control_required"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[5],
										$dynamicId,
										"cb_tooltip_txt"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[6],
										$dynamicId,
										"cb_default_txt_val"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[7],
										$dynamicId,
										"cb_admin_label"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[8],
										$dynamicId,
										"cb_show_email"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[9],
										$dynamicId,
										"cb_button_set_outer_label_textbox"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[10],
										$dynamicId,
										"cb_button_set_txt_input_textbox"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[11],
										$dynamicId,
										"cb_button_set_txt_description_textbox"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[12],
										$dynamicId,
										"cb_checkbox_alpha_filter"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[13],
										$dynamicId,
										"cb_ux_checkbox_alpha_num_filter"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[14],
										$dynamicId,
										"cb_checkbox_digit_filter"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[15],
										$dynamicId,
										"cb_checkbox_strip_tag_filter"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_text_data[16],
										$dynamicId,
										"cb_checkbox_trim_filter"
									)
								);
							}
						break;
						case 2:
							$dynamicId = intval($_REQUEST["dynamicId"]);
							$array_textarea = esc_attr(html_entity_decode($_REQUEST["array_textarea"]));
							$array_textarea_data=  (explode(",",$array_textarea));
							if(count($array_textarea_data) > 1)
							{
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[2],
										$dynamicId,
										"cb_label_value"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[3],
										$dynamicId,
										"cb_description"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[4],
										$dynamicId,
										"cb_control_required"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[5],
										$dynamicId,
										"cb_tooltip_txt"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[6],
										$dynamicId,
										"cb_default_txt_val"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[7],
										$dynamicId,
										"cb_admin_label"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[8],
										$dynamicId,
										"cb_show_email"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[9],
										$dynamicId,
										"cb_button_set_outer_label"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[10],
										$dynamicId,
										"cb_button_set_textinput"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[11],
										$dynamicId,
										"cb_button_set_outer_description"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[12],
										$dynamicId,
										"cb_checkbox_alpha_filter"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[13],
										$dynamicId,
										"cb_checkbox_alpha_num_filter"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[14],
										$dynamicId,
										"cb_checkbox_digit_filter"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[15],
										$dynamicId,
										"checkbox_strip_tag_filter"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
										$array_textarea_data[16],
										$dynamicId,
										"checkbox_trim_filter"
									)
								);
							}
						break;
						case 3:
							$dynamicId = intval($_REQUEST["dynamicId"]);
							$array_email = esc_attr(html_entity_decode($_REQUEST["array_email"]));
							$array_email_data =  (explode(",",$array_email));
							if(count($array_email_data) > 1)
							{
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[2],
										$dynamicId,
										"cb_label_value"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[3],
										$dynamicId,
										"cb_description"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[4],
										$dynamicId,
										"cb_control_required"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[5],
										$dynamicId,
										"cb_tooltip_txt"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[6],
										$dynamicId,
										"cb_admin_label"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[7],
										$dynamicId,
										"cb_show_email"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[8],
										$dynamicId,
										"cb_button_set_outer_label"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[9],
										$dynamicId,
										"cb_button_set_txt_input"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[10],
										$dynamicId,
										"cb_button_set_txt_description"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[11],
										$dynamicId,
										"cb_checkbox_alpha_filter"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[12],
										$dynamicId,
										"cb_ux_checkbox_alpha_num_filter"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[13],
										$dynamicId,
										"cb_checkbox_digit_filter"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_email_data[14],
										$dynamicId,
										"cb_checkbox_strip_tag_filter"
									)
								);
							}
							$wpdb->query
							(
								$wpdb->prepare
								(
									"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
									$array_email_data[15],
									$dynamicId,
									"cb_checkbox_trim_filter"
								)
							);
						break;
						case 4:
							$dynamicId = intval($_REQUEST["dynamicId"]);
							$array_dropdown = esc_attr(html_entity_decode($_REQUEST["array_dropdown"]));
							$array_dropdown_data =  (explode(",",$array_dropdown));
							if(count($array_dropdown_data) > 1)
							{
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_dropdown_data[2],
										$dynamicId,
										"cb_label_value"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_dropdown_data[3],
										$dynamicId,
										"cb_control_required"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_dropdown_data[4],
										$dynamicId,
										"cb_tooltip_txt"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_dropdown_data[5],
										$dynamicId,
										"cb_dropdown_options_dynamicId"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_dropdown_data[6],
										$dynamicId,
										"cb_dropdown_options"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_dropdown_data[7],
										$dynamicId,
										"cb_admin_label"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_dropdown_data[8],
										$dynamicId,
										"cb_show_email"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_dropdown_data[9],
										$dynamicId,
										"cb_button_set_outer_label"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_dropdown_data[10],
										$dynamicId,
										"cb_button_set_dropdown_menu"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_dropdown_data[11],
										$dynamicId,
										"cb_button_set_description"
									)
								);
							}
						break;
						case 5:
							$dynamicId = intval($_REQUEST["dynamicId"]);
							$array_checkbox = esc_attr(html_entity_decode($_REQUEST["array_checkbox"]));
							$array_checkbox_data =  (explode(",",$array_checkbox));
							if(count($array_checkbox_data) > 1)
							{
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_checkbox_data[2],
										$dynamicId,
										"cb_label_value"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_checkbox_data[3],
										$dynamicId,
										"cb_control_required"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_checkbox_data[4],
										$dynamicId,
										"cb_tooltip_txt"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_checkbox_data[5],
										$dynamicId,
										"cb_checkbox_options_dynamicId"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_checkbox_data[6],
										$dynamicId,
										"cb_checkbox_options"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_checkbox_data[7],
										$dynamicId,
										"cb_admin_label"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_checkbox_data[8],
										$dynamicId,
										"cb_show_email"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_checkbox_data[9],
										$dynamicId,
										"cb_button_set_outer_label"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_checkbox_data[10],
										$dynamicId,
										"cb_button_set_description"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_checkbox_data[11],
										$dynamicId,
										"cb_button_set_options_outer_wrapper"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_checkbox_data[12],
										$dynamicId,
										"cb_button_set_options_wrapper"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_checkbox_data[13],
										$dynamicId,
										"cb_button_set_options_label"
									)
								);
							}
						break;
						case 6:
							$dynamicId = intval($_REQUEST["dynamicId"]);
							$array_multiple = esc_attr(html_entity_decode($_REQUEST["array_multiple"]));
							$array_multiple_data =  (explode(",",$array_multiple));
							if(count($array_multiple_data) > 1)
							{
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_multiple_data[2],
										$dynamicId,
										"cb_label_value"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_multiple_data[3],
										$dynamicId,
										"cb_control_required"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_multiple_data[4],
										$dynamicId,
										"cb_tooltip_txt"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_multiple_data[5],
										$dynamicId,
										"cb_multiple_options_dyanmicId"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_multiple_data[6],
										$dynamicId,
										"cb_multiple_options"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_multiple_data[7],
										$dynamicId,
										"cb_admin_label"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_multiple_data[8],
										$dynamicId,
										"cb_show_email"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_multiple_data[9],
										$dynamicId,
										"cb_button_set_outer_label"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_multiple_data[10],
										$dynamicId,
										"cb_button_set_description"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_multiple_data[11],
										$dynamicId,
										"cb_button_set_options_outer_wrapper"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_multiple_data[12],
										$dynamicId,
										"cb_button_set_options_wrapper"
									)
								);
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
										$array_multiple_data[13],
										$dynamicId,
										"cb_button_set_options_label"
									)
								);
							}
						break;
						case 9:
								$dynamicId = intval($_REQUEST["dynamicId"]);
								$array_file_upload = esc_attr(html_entity_decode($_REQUEST["array_file_upload"]));
								$array_file_upload_data =  (explode(",",$array_file_upload));
								if(count($array_file_upload_data) > 1)
								{
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_file_upload_data[2],
											$dynamicId,
											"cb_label_value"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_file_upload_data[3],
											$dynamicId,
											"cb_description"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_file_upload_data[4],
											$dynamicId,
											"cb_control_required"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_file_upload_data[5],
											$dynamicId,
											"cb_tooltip_txt"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_file_upload_data[6],
											$dynamicId,
											"cb_admin_label"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_file_upload_data[7],
											$dynamicId,
											"cb_show_email"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_file_upload_data[8],
											$dynamicId,
											"cb_allow_multiple_file"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_file_upload_data[9],
											$dynamicId,
											"cb_allow_file_ext_upload"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_file_upload_data[10],
											$dynamicId,
											"cb_maximum_file_allowed"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_file_upload_data[11],
											$dynamicId,
											"cb_uploaded_file_email_db"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_file_upload_data[12],
											$dynamicId,
											"cb_button_set_outer_label_file"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_file_upload_data[13],
											$dynamicId,
											"cb_button_set_outer_description_fileuplod"
										)
									);
								}
							break;
							case 12:
								$dynamicId = intval($_REQUEST["dynamicId"]);
								$array_date = esc_attr(html_entity_decode($_REQUEST["array_date"]));
								$array_date_data=  (explode(",",$array_date));
								if(count($array_date_data) > 1)
								{
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[2],
											$dynamicId,
											"cb_label_value"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[3],
											$dynamicId,
											"cb_description"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[4],
											$dynamicId,
											"cb_control_required"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[5],
											$dynamicId,
											"cb_tooltip_txt"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[6],
											$dynamicId,
											"cb_admin_label"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[7],
											$dynamicId,
											"cb_show_email"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[8],
											$dynamicId,
											"cb_start_year"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[9],
											$dynamicId,
											"cb_end_year"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[10],
											$dynamicId,
											"cb_default_value_day"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[11],
											$dynamicId,
											"cb_default_value_month"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[12],
											$dynamicId,
											"cb_default_value_year"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[13],
											$dynamicId,
											"cb_error_invalid"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[14],
											$dynamicId,
											"cb_date_format"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[15],
											$dynamicId,
											"cb_button_set_outer_label"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[16],
											$dynamicId,
											"cb_button_set_txt_input"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[17],
											$dynamicId,
											"cb_button_set_description"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[18],
											$dynamicId,
											"cb_date_day_dropdown"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[19],
											$dynamicId,
											"cb_date_month_dropdown"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_date_data[20],
											$dynamicId,
											"cb_date_year_dropdown"
										)
									);
								}
							break;
							case 13:
								$dynamicId = intval($_REQUEST["dynamicId"]);
								$array_time = esc_attr(html_entity_decode($_REQUEST["array_time"]));
								$array_time_data=  (explode(",",$array_time));
								
								if(count($array_time_data) > 1)
								{
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[2],
											$dynamicId,
											"cb_label_value"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[3],
											$dynamicId,
											"cb_description"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[4],
											$dynamicId,
											"cb_control_required"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[5],
											$dynamicId,
											"cb_tooltip_txt"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[6],
											$dynamicId,
											"cb_admin_label"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[7],
											$dynamicId,
											"cb_show_email"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[8],
											$dynamicId,
											"cb_hour_format"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[9],
											$dynamicId,
											"cb_hours"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[10],
											$dynamicId,
											"cb_minutes"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[11],
											$dynamicId,
											"cb_am_pm"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[12],
											$dynamicId,
											"cb_time_format"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[13],
											$dynamicId,
											"cb_button_set_outer_label"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[14],
											$dynamicId,
											"cb_button_set_txt_input"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[15],
											$dynamicId,
											"cb_button_set_description"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[16],
											$dynamicId,
											"cb_button_set_time_hour_dropdown"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[17],
											$dynamicId,
											"cb_button_set_time_minute_dropdown"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d AND dynamic_settings_key = %s ",
											$array_time_data[18],
											$dynamicId,
											"cb_button_set_time_am_pm_dropdown"
										)
									);
								}
							break;
							case 14:
								$dynamicId = intval($_REQUEST["dynamicId"]);
								$array_hidden = esc_attr(html_entity_decode($_REQUEST["array_hidden"]));
								$array_hidden_data =  (explode(",",$array_hidden));
								if(count($array_hidden_data) > 1)
								{
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_hidden_data[2],
											$dynamicId,
											"cb_label_value"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_hidden_data[3],
											$dynamicId,
											"cb_default_value"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_hidden_data[4],
											$dynamicId,
											"cb_admin_label"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_hidden_data[5],
											$dynamicId,
											"cb_show_email"
										)
									);
								}
							break;
							case 15:
								$dynamicId = intval($_REQUEST["dynamicId"]);
								$array_password = esc_attr(html_entity_decode($_REQUEST["array_password"]));
								$array_password_data =  (explode(",",$array_password));
								if(count($array_password_data) > 1)
								{
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[2],
											$dynamicId,
											"cb_label_value"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[3],
											$dynamicId,
											"cb_description"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[4],
											$dynamicId,
											"cb_control_required"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[5],
											$dynamicId,
											"cb_tooltip_txt"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[6],
											$dynamicId,
											"cb_admin_label"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[7],
											$dynamicId,
											"cb_show_email"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[8],
											$dynamicId,
											"cb_button_set_outer_label"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[9],
											$dynamicId,
											"cb_button_set_txt_input"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[10],
											$dynamicId,
											"cb_button_set_txt_description"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[11],
											$dynamicId,
											"cb_checkbox_alpha_filter"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[12],
											$dynamicId,
											"cb_ux_checkbox_alpha_num_filter"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[13],
											$dynamicId,
											"cb_checkbox_digit_filter"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[14],
											$dynamicId,
											"cb_checkbox_strip_tag_filter"
										)
									);
									$wpdb->query
									(
										$wpdb->prepare
										(
											"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s WHERE dynamicId = %d  AND  dynamic_settings_key = %s ",
											$array_password_data[15],
											$dynamicId,
											"cb_checkbox_trim_filter"
										)
									);
								}
								break;
							}
						}
					}
					die();
				}
				else if($_REQUEST["param"] == "delete_controls")
				{
					$dynamicId_str = esc_attr($_REQUEST['delete_control_dynamicIds']);
					$dynamicIds = explode(",",$dynamicId_str);
					for($flag2=0;$flag2<count($dynamicIds);$flag2++)
					{
						$wpdb->query
						(
							$wpdb->prepare
							(
								"DELETE FROM ".create_control_Table()." WHERE column_dynamicId = %s",
								$dynamicIds[$flag2]
							)
						);
						$wpdb->query
						(
							$wpdb->prepare
							(
								"DELETE FROM ".contact_bank_dynamic_settings_form()." WHERE dynamicId = %d",
								$dynamicIds[$flag2]
							)
						);
					}
					die();
				}
			}
		}
?>