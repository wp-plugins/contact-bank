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
			$dynamicCount= intval($_REQUEST["dynamicCount"]);
			//$array_text = ($_REQUEST["array_text"]);
			if($count_id == 1)
			{
				$count = 1;
			}
			else 
			{
				$count = 0;
			}
			switch($field_type)
			{
				case 1:
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_text.php";
				break;
				case 2:
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_textarea.php";
				break;
				case 3:
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_email.php";
				break;
				case 4:
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_dropdown.php";
				break;
				case 5:
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_checkbox.php";
				break;
				case 6:
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_multiple.php";
				break;
				case 9:
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_file_upload.php";
				break;
				case 12:
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_date.php";
				break;
				case 13:
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_time.php";
				break;
				case 14:
					include_once CONTACT_BK_PLUGIN_DIR ."/includes/cb_hidden.php";
				break;
				case 15:
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
				if(esc_attr($_REQUEST["chk_redirect_url"]) == "true")
				{
					$redirect_chkbox_val = 1;
				}
				else
				{
					$redirect_chkbox_val = 0;
				}
				
				$wpdb->query
				(
					$wpdb->prepare
					(
						"INSERT INTO ".contact_bank_contact_form()."(form_name,success_message,chk_url,redirect_url) VALUES(%s,%s,%d,%s)",
						$ux_form_name_txt,
						esc_attr($_REQUEST["ux_sucess_message"]),
						$redirect_chkbox_val,
						esc_attr($_REQUEST["ux_redirect_url"])
					)
				);
				$form_id=$wpdb->insert_id;
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
				$array_controls = json_decode(stripcslashes(html_entity_decode($_REQUEST["array_controls"])));
				$count = 0;
				$dynamicId = 0;				
				foreach ($array_controls as $val => $keyInner) 
				{
					$count++;
					if($count > 2)
					{
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO ".contact_bank_dynamic_settings_form()."(dynamicId,dynamic_settings_key,dynamic_settings_value) VALUES(%d,%s,%s)",
								$dynamicId,
								key($keyInner),
								(string)current($keyInner)
							)
						);
						
					}
					else if($count == 2)
					{
						$dynamicId = current($keyInner);
					}
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
			if($ux_maximum_file_allowed_in_mb == "" || $ux_maximum_file_allowed_in_mb == 0)
			{
				$ux_maximum_file_allowed_in_mb = 1;
			}
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