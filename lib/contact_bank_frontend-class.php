<?php
if(isset($_REQUEST["param"]))
{
	if($_REQUEST["param"] == "frontend_submit_controls")
	{
		
		$form_id = intval($_REQUEST["form_id"]);
		$fields = $wpdb->get_results
		(
			$wpdb->prepare
			(
				"SELECT field_id,column_dynamicId FROM " .create_control_Table()."  WHERE form_id = %d",
				$form_id
			)
		);
		$wpdb->query
		(
			$wpdb->prepare
			(
				"INSERT INTO " . contact_bank_frontend_forms_Table(). " (form_id) VALUES(%d)",
				$form_id
			)
		);
		echo $form_submit_id = $wpdb->insert_id;
		$wpdb->query
		(
			$wpdb->prepare
			(
				"UPDATE " . contact_bank_frontend_forms_Table(). " SET submit_id = %d WHERE id = %d",
				$form_submit_id,
				$form_submit_id
			)
		);
		for($flag = 0;$flag<count($fields);$flag++)
		{
			$field_id = $fields[$flag]->field_id;
			$dynamicId = $fields[$flag]->column_dynamicId;
			switch($field_id)
			{
				case 1:
					$ux_txt = esc_attr($_REQUEST['txt_'.$dynamicId]);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO " . frontend_controls_data_Table(). " (form_id,field_id,dynamic_control_id,dynamic_frontend_value,form_submit_id) VALUES(%d,%d,%d,%s,%d)",
							$form_id,
							$field_id,
							$dynamicId,
							$ux_txt,
							$form_submit_id
						)
					);
				break;
				case 2:
					$ux_textarea = esc_attr($_REQUEST['textarea_'.$dynamicId]);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO " . frontend_controls_data_Table(). " (form_id,field_id,dynamic_control_id,dynamic_frontend_value,form_submit_id) VALUES(%d,%d,%d,%s,%d)",
							$form_id,
							$field_id,
							$dynamicId,
							$ux_textarea,
							$form_submit_id
						)
					);
				break;
				case 3:
					$ux_email = esc_attr($_REQUEST['email_'.$dynamicId]);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO " . frontend_controls_data_Table(). " (form_id,field_id,dynamic_control_id,dynamic_frontend_value,form_submit_id) VALUES(%d,%d,%d,%s,%d)",
							$form_id,
							$field_id,
							$dynamicId,
							$ux_email,
							$form_submit_id
						)
					);
				break;
				case 4:
					$ux_dropdown = esc_attr($_REQUEST['select_'.$dynamicId]);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO " . frontend_controls_data_Table(). " (form_id,field_id,dynamic_control_id,dynamic_frontend_value,form_submit_id) VALUES(%d,%d,%d,%s,%d)",
							$form_id,
							$field_id,
							$dynamicId,
							$ux_dropdown,
							$form_submit_id
						)
					);
				break;
				case 5:
					$ux_checkbox = $_REQUEST[$dynamicId.'_chk'];
					$checkbox_options = "";
					for($flag1 =0;$flag1<count($ux_checkbox);$flag1++)
					{
						$checkbox_options .= $ux_checkbox[$flag1];
						if($flag1 < count($ux_checkbox)-1)
						{
							$checkbox_options .= "-";
						}
					}
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO " . frontend_controls_data_Table(). " (form_id,field_id,dynamic_control_id,dynamic_frontend_value,form_submit_id) VALUES(%d,%d,%d,%s,%d)",
							$form_id,
							$field_id,
							$dynamicId,
							$checkbox_options,
							$form_submit_id
						)
					);
				break;
				case 6:
					$ux_multiple = esc_attr($_REQUEST['radio_'.$dynamicId]);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO " . frontend_controls_data_Table(). " (form_id,field_id,dynamic_control_id,dynamic_frontend_value,form_submit_id) VALUES(%d,%d,%d,%s,%d)",
							$form_id,
							$field_id,
							$dynamicId,
							$ux_multiple,
							$form_submit_id
						)
					);
				break;
				case 9:
						$file_uploaded = esc_attr($_REQUEST['file_uploaded_path']);
						$file_uploaded_path = explode(",", $file_uploaded);
						$file_path ="";
						for($flag1=0;$flag1<count($file_uploaded_path)-1;$flag1++)
						{
							$file_path .= CONTACT_BK_PLUGIN_DIR ."/phpfileuploader/savefiles/".$file_uploaded_path[$flag1];
							if($flag1 < count($file_uploaded_path)-2)
							{
								$file_path .= ",";
							}
						}
						
						$wpdb->query
						(
							$wpdb->prepare
							(
								"INSERT INTO " . frontend_controls_data_Table(). " (form_id,field_id,dynamic_control_id,dynamic_frontend_value,form_submit_id) VALUES(%d,%d,%d,%s,%d)",
								$form_id,
								$field_id,
								$dynamicId,
								$file_path,
								$form_submit_id
							)
						);
				break;
				case 12:
					$ux_day = esc_attr($_REQUEST['select_day_'.$dynamicId]);
					$ux_month = esc_attr($_REQUEST['select_month_'.$dynamicId]);
					$ux_year = esc_attr($_REQUEST['select_year_'.$dynamicId]);
					$ux_date = $ux_year."-".$ux_month."-".$ux_day;
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO " . frontend_controls_data_Table(). " (form_id,field_id,dynamic_control_id,dynamic_frontend_value,form_submit_id) VALUES(%d,%d,%d,%s,%d)",
							$form_id,
							$field_id,
							$dynamicId,
							$ux_date,
							$form_submit_id
						)
					);
				break;
				case 13:
					$ux_hour = esc_attr($_REQUEST['select_hr_'.$dynamicId]);
					$ux_minute = esc_attr($_REQUEST['select_min_'.$dynamicId]);
					$ux_am_pm = esc_attr($_REQUEST['select_am_'.$dynamicId]);
					$ux_time = $ux_hour."-".$ux_minute."-".$ux_am_pm;
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO " . frontend_controls_data_Table(). " (form_id,field_id,dynamic_control_id,dynamic_frontend_value,form_submit_id) VALUES(%d,%d,%d,%s,%d)",
							$form_id,
							$field_id,
							$dynamicId,
							$ux_time,
							$form_submit_id
						)
					);
				break;
				case 14:
					$ux_hidden = esc_attr($_REQUEST['txt_hide_'.$dynamicId]);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO " . frontend_controls_data_Table(). " (form_id,field_id,dynamic_control_id,dynamic_frontend_value,form_submit_id) VALUES(%d,%d,%d,%s,%d)",
							$form_id,
							$field_id,
							$dynamicId,
							$ux_hidden,
							$form_submit_id
						)
					);
				break;
				case 15:
					$ux_password = esc_attr($_REQUEST['txt_password_'.$dynamicId]);
					$wpdb->query
					(
						$wpdb->prepare
						(
							"INSERT INTO " . frontend_controls_data_Table(). " (form_id,field_id,dynamic_control_id,dynamic_frontend_value,form_submit_id) VALUES(%d,%d,%d,%s,%d)",
							$form_id,
							$field_id,
							$dynamicId,
							$ux_password,
							$form_submit_id
						)
					);
				break;
			}
		}
		die();
	}
}

?>
