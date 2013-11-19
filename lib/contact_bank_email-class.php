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
		if($_REQUEST["param"] == "email_admin_controls")
		{
			$form_id = intval($_REQUEST["form_id"]);
			$email_data = $wpdb->get_row
			(
				$wpdb->prepare
				(
					"SELECT * FROM " .contact_bank_email_template_admin()." WHERE form_id = %d AND type = %d",
					$form_id,
					1
				)
			);
			if($email_data != "")
			{
				echo $email_data->email_to ."|".$email_data->email_from."|".stripslashes($email_data->body_content)."|".$email_data->subject;
			}
			die();
		}
		else if($_REQUEST["param"] == "email_client_controls")
		{
			$form_id = intval($_REQUEST["form_id"]);
			$email_data2 = $wpdb->get_row
			(
				$wpdb->prepare
				(
					"SELECT * FROM " .contact_bank_email_template_admin()." WHERE form_id = %d AND type = %d",
					$form_id,
					2
				)
			);
			if($email_data2 != "")
			{
				echo $email_data2->email_to ."|".$email_data2->email_from."|".$email_data2->body_content."|".$email_data2->subject;
			}
			die();
		}
		else if($_REQUEST["param"] == "admin_control_buttons")
		{
			$form_id = intval($_REQUEST["form_id"]);
			$fields = $wpdb->get_results
			(
				$wpdb->prepare
				(
					"SELECT * FROM " .create_control_Table()."  WHERE form_id = %d ORDER BY " .create_control_Table().".sorting_order",
					$form_id
				)
			);
			for($flag=0;$flag<count($fields);$flag++)
			{
				$field_type = $fields[$flag]->field_id;
				$column_dynamicId = $fields[$flag]->column_dynamicId;
				$fields_dynamic_controls = $wpdb->get_results
				(
					$wpdb->prepare
					(
						"SELECT * FROM " .contact_bank_dynamic_settings_form().  " WHERE " .contact_bank_dynamic_settings_form().".dynamicId = %d",
						$column_dynamicId
					)
				);
				$keys = array();
				for($flag1=0;$flag1<count($fields_dynamic_controls);$flag1++)
				{
					array_push($keys,$fields_dynamic_controls[$flag1]->dynamic_settings_key);
				}
				switch($field_type)
				{
					case 1:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
							?>
							<div class="layout-control-group">
								<input class="btn btn-info layout-span12" type="button" id="btn_textbox_<?php echo $column_dynamicId;?>" name="btn_textbox_<?php echo $column_dynamicId;?>" value="<?php echo $label_text; ?>"  onclick="create_control(1,<?php echo $column_dynamicId;?>);" />
								
							</div>
							<?php
						}
					break;
					case 2:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
							?>
							<div class="layout-control-group">
								<input class="btn btn-info layout-span12"  type="button" id="btn_textarea_<?php echo $column_dynamicId;?>" name="btn_textarea_<?php echo $column_dynamicId;?>" value="<?php echo $label_text; ?>"  onclick="create_control(2,<?php echo $column_dynamicId;?>);" />
							</div>	
							<?php
						}
					break;
					case 3:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_email_<?php echo $column_dynamicId;?>" name="btn_email_<?php echo $column_dynamicId;?>" value="<?php echo $label_text; ?>"  onclick="create_control(3,<?php echo $column_dynamicId;?>);" />
							
						</div>	
						<?php
						}
					break;
					case 4:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_dropdown_<?php echo $column_dynamicId;?>" name="btn_dropdown_<?php echo $column_dynamicId;?>" value="<?php echo $label_text; ?>"  onclick="create_control(4,<?php echo $column_dynamicId;?>);" />
							
						</div>
						<?php
						}
					break;
					case 5:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_checkbox_<?php echo $column_dynamicId;?>" name="btn_checkbox_<?php echo $column_dynamicId;?>" value="<?php  echo $label_text; ?>"  onclick="create_control(5,<?php echo $column_dynamicId;?>);" />
							
						</div>
						<?php
						}
					break;
					case 6:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_multiple_<?php echo $column_dynamicId;?>" name="btn_multiple_<?php echo $column_dynamicId;?>" value="<?php  echo $label_text; ?>"  onclick="create_control(6,<?php echo $column_dynamicId;?>);" />
							
						</div>
						<?php
						}
					break;
					case 9:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_file_upload_<?php echo $column_dynamicId;?>" name="btn_file_upload_<?php echo $column_dynamicId;?>" value="<?php  echo $label_text; ?>" onclick="create_control(9,<?php echo $column_dynamicId;?>);" />
							
						</div>
						<?php
						}
					break;
					case 12:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_date_<?php echo $column_dynamicId;?>" name="btn_date_<?php echo $column_dynamicId;?>" value="<?php  echo $label_text; ?>" onclick="create_control(12,<?php echo $column_dynamicId;?>);" />
						</div>
						<?php
						}
					break;
					case 13:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_time_<?php echo $column_dynamicId;?>" name="btn_time_<?php echo $column_dynamicId;?>" value="<?php  echo $label_text; ?>" onclick="create_control(13,<?php echo $column_dynamicId;?>);" />
						</div>
						<?php
						}
					break;
					case 14:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_hidden_<?php echo $column_dynamicId;?>" name="btn_hidden_<?php echo $column_dynamicId;?>" value="<?php  echo $label_text; ?>" onclick="create_control(14,<?php echo $column_dynamicId;?>);" />
						</div>
						<?php
						}
					break;
					case 15:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_Password_<?php echo $column_dynamicId;?>" name="btn_Password_<?php echo $column_dynamicId;?>" value="<?php  echo $label_text; ?>" onclick="create_control(15,<?php echo $column_dynamicId;?>);" />
						</div>
						<?php
						}
					break;
				}
			}
			
			die();
		}
		else if($_REQUEST["param"] == "client_control_buttons")
		{
			$form_id = intval($_REQUEST["form_id"]);
			$fields = $wpdb->get_results
			(
				$wpdb->prepare
				(
					"SELECT * FROM " .create_control_Table()."  WHERE form_id = %d ORDER BY " .create_control_Table().".sorting_order",
					$form_id
				)
			);
			for($flag=0;$flag<count($fields);$flag++)
			{
				$field_type = $fields[$flag]->field_id;
				$column_dynamicId = $fields[$flag]->column_dynamicId;
				$fields_dynamic_controls = $wpdb->get_results
				(
					$wpdb->prepare
					(
						"SELECT * FROM " .contact_bank_dynamic_settings_form().  " WHERE " .contact_bank_dynamic_settings_form().".dynamicId = %d",
						$column_dynamicId
					)
				);
				$keys = array();
				for($flag1=0;$flag1<count($fields_dynamic_controls);$flag1++)
				{
					array_push($keys,$fields_dynamic_controls[$flag1]->dynamic_settings_key);
				}
				switch($field_type)
				{
					case 1:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_textbox" name="btn_textbox" value="<?php echo $label_text; ?>" onclick="create_client_control(1,<?php echo $column_dynamicId;?>);"  />
						</div>
						<?php
						}
					break;
					case 2:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12"  type="button" id="btn_textarea" name="btn_textarea" value="<?php echo $label_text; ?>"  onclick="create_client_control(2,<?php echo $column_dynamicId;?>);" />
						</div>	
						<?php
						}
					break;
					case 3:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_email" name="btn_email" value="<?php echo $label_text; ?>"  onclick="create_client_control(3,<?php echo $column_dynamicId;?>);" />
						</div>	
						<?php
						}
					break;
					case 4:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_dropdown" name="btn_dropdown" value="<?php echo $label_text; ?>"  onclick="create_client_control(4,<?php echo $column_dynamicId;?>);" />
						</div>
						<?php
						}
					break;
					case 5:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_checkbox" name="btn_checkbox" value="<?php  echo $label_text; ?>"  onclick="create_client_control(5,<?php echo $column_dynamicId;?>);" />
						</div>
						<?php
						}
					break;
					case 6:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_multiple" name="btn_multiple" value="<?php  echo $label_text; ?>"  onclick="create_client_control(6,<?php echo $column_dynamicId;?>);" />
						</div>
						<?php
						}
					break;
					case 9:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_file_upload" name="btn_file_upload" value="<?php  echo $label_text; ?>" onclick="create_client_control(9,<?php echo $column_dynamicId;?>);" />
						</div>
						<?php
						}
					break;
					case 12:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_date" name="btn_date" value="<?php  echo $label_text; ?>" onclick="create_client_control(12,<?php echo $column_dynamicId;?>);" />
						</div>
						<?php
						}
					break;
					case 13:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_time" name="btn_time" value="<?php  echo $label_text; ?>" onclick="create_client_control(13,<?php echo $column_dynamicId;?>);" />
						</div>
						<?php
						}
					break;
					case 14:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_hidden" name="btn_hidden" value="<?php  echo $label_text; ?>" onclick="create_client_control(14,<?php echo $column_dynamicId;?>);" />
						</div>
						<?php
						}
					break;
					case 15:
						$index = array_search("cb_admin_label", $keys);
						$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
						
						$index = array_search("cb_show_email", $keys);
						$show_mail = $fields_dynamic_controls[$index]->dynamic_settings_value;
						if($show_mail == "false" || $show_mail == "")
						{
						?>
						<div class="layout-control-group">
							<input class="btn btn-info layout-span12" type="button" id="btn_Password" name="btn_Password" value="<?php  echo $label_text; ?>" onclick="create_client_control(15,<?php echo $column_dynamicId;?>);" />
						</div>
						<?php
						}
					break;
				}
			}
			?>
			
			<?php
			die();
		}

		else if($_REQUEST["param"] == "update_email_controls")
		{
			$form_id = intval($_REQUEST["form_id"]);
			$check_form_exist = $wpdb->get_results
			(
				$wpdb->prepare
				(
					"SELECT * FROM " .contact_bank_email_template_admin()." WHERE form_id = %d ",
					$form_id
				)
			);
			$email_to_client = esc_attr($_REQUEST["ux_email_to2"]);
			$email_from_client = esc_attr($_REQUEST["ux_email_from2"]);
			$subject_client = esc_attr($_REQUEST["ux_email_subject2"]);
			
			$uxDescription_client = html_entity_decode($_REQUEST["uxDescription_client"]);			
			$email_to_admin = esc_attr($_REQUEST["ux_email_to"]);
			$email_from_admin  = esc_attr($_REQUEST["ux_email_from"]);
			$subject_admin  = esc_attr($_REQUEST["ux_email_subject"]);
			
			$uxDescription_admin = html_entity_decode($_REQUEST["uxDescription_admin"]);
			if(count($check_form_exist)>0)
			{
				$wpdb->query
				(
					$wpdb->prepare
					(
						"UPDATE " . contact_bank_email_template_admin() . " SET email_to = %s,email_from = %s,body_content = %s,subject = %s WHERE form_id = %d and type = %d",
						$email_to_admin,
						$email_from_admin,
						$uxDescription_admin,
						$subject_admin,
						$form_id,
						'1'
					)
				);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"UPDATE " . contact_bank_email_template_admin() . " SET email_to = %s,email_from = %s,body_content = %s,subject = %s WHERE form_id = %d and type = %d",
						$email_to_client,
						$email_from_client,
						$uxDescription_client,
						$subject_client,
						$form_id,
						'2'
					)
				);
				
			}
			else
			{
				$wpdb->query
				(
					$wpdb->prepare
					(
						"INSERT INTO " . contact_bank_email_template_admin(). " (email_to,email_from,body_content,subject,form_id,type) VALUES(%s,%s,%s,%s,%d,%d)",
						$email_to_admin,
						$email_from_admin,
						$uxDescription_admin,
						$subject_admin,
						$form_id,
						1
					)
				);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"INSERT INTO " . contact_bank_email_template_admin(). " (email_to,email_from,body_content,subject,form_id,type) VALUES(%s,%s,%s,%s,%d,%d)",
						$email_to_client,
						$email_from_client,
						$uxDescription_client,
						$subject_client,
						$form_id,
						2
					)
				);
				
			}
			die();
		}
	}
}
?>