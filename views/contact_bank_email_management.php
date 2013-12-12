<?php
if(isset($_REQUEST['param']))
{
	if($_REQUEST['param'] == "email_management")
	{
		$form_id = intval($_REQUEST['form_id']);
		$form_submit_id = intval($_REQUEST['submit_id']);
		
		$email_content = $wpdb->get_row
		(
			$wpdb->prepare
			(
				"SELECT * FROM " .contact_bank_email_template_admin()."  WHERE form_id = %d AND type = %d",
				$form_id,
				1
			)
		);
		$email_content_client = $wpdb->get_row
		(
			$wpdb->prepare
			(
				"SELECT * FROM " .contact_bank_email_template_admin()."  WHERE form_id = %d AND type = %d",
				$form_id,
				2
			)
		);
		
		
		$file_uploaded_path_admin = "";
		$file_path ="";
		$messageTxt = stripcslashes($email_content->body_content);
		$file_uploaded_path_client = "";
		$file_path ="";
		$messageTxt_client = stripcslashes($email_content_client->body_content);
		$client_email = "";
		$frontend_control_value = $wpdb->get_results
		(
			$wpdb->prepare
			(
				
				"SELECT * FROM  " . contact_bank_frontend_forms_Table(). " JOIN  " . frontend_controls_data_Table(). " ON " . contact_bank_frontend_forms_Table(). ".submit_id = " . frontend_controls_data_Table(). ".form_submit_id  WHERE " . contact_bank_frontend_forms_Table(). ".submit_id = %d",
				$form_submit_id
			)
		);
		$emailSubject = $email_content->subject;
		$emailSubject_client = $email_content_client->subject;
		for($flag=0;$flag<count($frontend_control_value);$flag++)
		{
			$dynamicId = $frontend_control_value[$flag]->dynamic_control_id;
			$emailSubject = str_replace("[control_".$dynamicId."]",$frontend_control_value[$flag]->dynamic_frontend_value,$emailSubject);
			$emailSubject_client = str_replace("[control_".$dynamicId."]",$frontend_control_value[$flag]->dynamic_frontend_value,$emailSubject_client);
			if($frontend_control_value[$flag]->field_Id == 3)
			{
				if($client_email != "")
				{
					$client_email .= ";" . $frontend_control_value[$flag]->dynamic_frontend_value;	
				}
				else {
					$client_email = $frontend_control_value[$flag]->dynamic_frontend_value;	
				}
				
			}
			else if($frontend_control_value[$flag]->field_Id == 12)
			{
				$date_format = $wpdb->get_var
				(
					$wpdb->prepare
					(
						"SELECT dynamic_settings_value FROM " .contact_bank_dynamic_settings_form()."  WHERE dynamicId = %d AND dynamic_settings_key = %s",
						$frontend_control_value[$flag]->dynamic_control_id,
						"cb_date_format"
					)
				);
				if($date_format == "0")
				{
					$frontend_control =  date("F d, Y", strtotime($frontend_control_value[$flag]->dynamic_frontend_value));
				}
				else if($date_format == "1")
				{
					$frontend_control =  date("Y/m/d", strtotime($frontend_control_value[$flag]->dynamic_frontend_value));
				} 
				else if($date_format == "2")
				{
					$frontend_control = date("m/d/Y", strtotime($frontend_control_value[$flag]->dynamic_frontend_value));
				} 
				else if($date_format == "3")
				{
					$frontend_control =  date("d/m/Y", strtotime($frontend_control_value[$flag]->dynamic_frontend_value));
				}
					$messageTxt = str_replace("[control_".$dynamicId."]",$frontend_control, $messageTxt)."<br />" ;
					$messageTxt_client = str_replace("[control_client_".$dynamicId."]",$frontend_control, $messageTxt_client)."<br />" ;
			}
			else if($frontend_control_value[$flag]->field_Id == 13) 
			{
				$hour_format = $wpdb->get_var
				(
					$wpdb->prepare
					(
						"SELECT dynamic_settings_value FROM " .contact_bank_dynamic_settings_form()."  WHERE dynamicId = %d AND dynamic_settings_key = %s",
						$frontend_control_value[$flag]->dynamic_control_id,
						"cb_hour_format"
					)
				);
				if($hour_format == "12")
				{
					$time_content = explode("-", $frontend_control_value[$flag]->dynamic_frontend_value);
					if(intval($time_content[2])== 0)
					{
						$AM = "AM";
					}
					else
					{
						$AM = "PM";
					}
					if(intval($time_content[1]) < 10)
					{
						$time_final = $time_content[0].":"."0".$time_content[1]." ".$AM;
					}
					else 
					{
						$time_final = $time_content[0].":".$time_content[1]." ".$AM;
					}
					$messageTxt = str_replace("[control_".$dynamicId."]",$time_final, $messageTxt)."<br />" ;
					$messageTxt_client = str_replace("[control_client_".$dynamicId."]",$time_final, $messageTxt_client)."<br />" ;
				}
				else 
				{
					$time_content = explode("-", $frontend_control_value[$flag]->dynamic_frontend_value);
					$time_final = $time_content[0].":".$time_content[1];
					$messageTxt = str_replace("[control_".$dynamicId."]",$time_final, $messageTxt)."<br />" ;
					$messageTxt_client = str_replace("[control_client_".$dynamicId."]",$time_final, $messageTxt_client)."<br />" ;
				}
			}
			else if($frontend_control_value[$flag]->field_Id == 9) 
			{
				$cb_show_email = $wpdb->get_var
				(
					$wpdb->prepare
					(
						"SELECT dynamic_settings_value FROM " .contact_bank_dynamic_settings_form()."  WHERE dynamicId = %d AND dynamic_settings_key = %s",
						$frontend_control_value[$flag]->dynamic_control_id,
						"cb_show_email"
					)
				);
				if($cb_show_email == "0")
				{
					$file_path_data = $frontend_control_value[$flag]->dynamic_frontend_value;
					$file_uploaded_path_admin = explode(",", $file_path_data);
				}
			}
			else if($frontend_control_value[$flag]->field_Id == 5) 
			{
				$chk_options =  str_replace("-",", ", $frontend_control_value[$flag]->dynamic_frontend_value);
				$messageTxt = str_replace("[control_".$dynamicId."]",$chk_options, $messageTxt)."<br />" ;
				$messageTxt_client = str_replace("[control_client_".$dynamicId."]",$chk_options, $messageTxt_client)."<br />" ;
			}
			else 
			{
				
				$messageTxt = str_replace("[control_".$dynamicId."]",$frontend_control_value[$flag]->dynamic_frontend_value, $messageTxt)."<br />" ;
				$messageTxt_client = str_replace("[control_client_".$dynamicId."]",$frontend_control_value[$flag]->dynamic_frontend_value, $messageTxt_client)."<br />" ;
			}
		}
		$admin_label = get_option( 'admin_email');
		$to = $email_content->email_to;
		$title = get_bloginfo('name');
		$headers =  "From: " .$email_content->email_from. " <". $admin_label . ">" ."\n" .
					"Content-Type: text/html; charset=\"" .
					get_option('blog_charset') . "\n";
		if($file_uploaded_path_admin == "")
		{
			wp_mail($to, $emailSubject, $messageTxt, $headers);
		}
		else 
		{
			wp_mail($to, $emailSubject, $messageTxt, $headers, $file_uploaded_path_admin);
		}
		if($client_email != "")
		{
			$admin_label = get_option( 'admin_email');
			$Client_to = $client_email;
			$title_client = get_bloginfo('name');
			$headers_client =  "From: " .$email_content_client->email_from. " <". $admin_label . ">" ."\n" .
						"Content-Type: text/html; charset=\"" .
						get_option('blog_charset') . "\n";
			
			wp_mail($Client_to,$emailSubject_client, $messageTxt_client, $headers_client);
			
		}
	}
	die();
}
?>