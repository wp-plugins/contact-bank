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
				if(esc_attr($_REQUEST["chk_redirect_url"]) == "true")
				{
					$redirect_chkbox_val = 1;
				}
				else
				{
					$redirect_chkbox_val = 0;
				}
				echo $redirect_chkbox_val;
				$wpdb->query
				(
					$wpdb->prepare
					(
						"UPDATE ".contact_bank_contact_form()." SET form_name =%s, success_message = %s, chk_url = %d, redirect_url = %s  Where form_id = %d",
						$ux_form_name_txt,
						esc_attr($_REQUEST["ux_sucess_message"]),
						$redirect_chkbox_val,
						esc_attr($_REQUEST["ux_redirect_url"]),
						$form_id
					)
				);
				
				$created_control = esc_attr($_REQUEST["created_control_type"]);
				$control_type_ids = $created_control != "" ? explode(",",$created_control) :  Array();
				
				$control_dynamic_id = esc_attr($_REQUEST["new_control_dynamic_ids"]);
				$new_control_dynamic_ids = $control_dynamic_id != "" ? explode(",",$control_dynamic_id) :  Array();
				
				$field_dynamic_id = esc_attr($_REQUEST["field_dynamic_id"]);
				$field_exist_dynamic_id = $field_dynamic_id != "" ? explode(",",$field_dynamic_id) :  Array();
				
			
				
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
				$control_type = intval($_REQUEST["control_type"]);
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
								"UPDATE ".contact_bank_dynamic_settings_form()." SET dynamic_settings_value = %s  WHERE dynamicId = %d  AND dynamic_settings_key = %s ",
								(string)current($keyInner),
								$dynamicId,
								key($keyInner)
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