<?php
if(isset($_REQUEST["param"]))
{
	if($_REQUEST["param"] == "frontend_form_data")
	{
		$form_id = intval($_REQUEST["form_id"]);
		$form_data = $wpdb->get_results
		(
			$wpdb->prepare
			(
				"SELECT * FROM " .create_control_Table()." WHERE form_id = %d ORDER BY sorting_order ASC",
				$form_id
			)
		);
		?>
		<table class="table table-striped" id="data-table-frontend" style="width:100%;">
			<thead>
				<?php
				for($flag=0;$flag<count($form_data);$flag++)
				{
					$form_control_labels = $wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT dynamic_settings_value FROM " .contact_bank_dynamic_settings_form()." WHERE dynamicId = %d AND dynamic_settings_key = %s",
							$form_data[$flag]->column_dynamicId,
							"cb_label_value"
						)
					);
				?>
				<th><?php echo $form_control_labels ?></th>
				<?php
				}
				?>
			</thead>
			<tbody>
				<?php
					$form_submit_count = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT * FROM ".contact_bank_frontend_forms_Table()." WHERE form_id = %d",
							$form_id
						)
					);
					for($flag1=0;$flag1<count($form_submit_count);$flag1++)
					{
						?>
						<tr>
						<?php
							for($flag2=0;$flag2<count($form_data);$flag2++)
							{
								$form_control_labels_values = $wpdb->get_var
								(
									$wpdb->prepare
									(
										"SELECT dynamic_frontend_value FROM " .frontend_controls_data_Table()." WHERE dynamic_control_id = %d AND form_id = %d AND form_submit_id = %d",
										$form_data[$flag2]->column_dynamicId,
										$form_id,
										$form_submit_count[$flag1]->submit_id
									)
								);
								if($form_data[$flag2]->field_id == 5)
								{
									if($form_control_labels_values != "")
									{
										$chk_options =  str_replace("-",", ", $form_control_labels_values);
										?>
										<td><?php echo $chk_options; ?></td>
										<?php
									}
									else
									{
										?>
										<td ></td>
										<?php
									}
								}
								else if($form_data[$flag2]->field_id == 9)
								{
									if($form_control_labels_values != "")
									{
										$no_of_files =  explode(",",$form_control_labels_values);
										?>
										<td>
											<?php
											for($flag3=0;$flag3<=count($no_of_files)-1;$flag3++)
											{
												$file_path = explode("/",$no_of_files[$flag3]);
												?>
												<a target="_blank" id="file_path" href="<?php echo CONTACT_BK_PLUGIN_URL .'/phpfileuploader/savefiles/'.$file_path[count($file_path)-1];?>" style="cursor: pointer;"><?php echo $file_path[count($file_path)-1]; ?></a><br/>
											<?php
											}
											?>
										</td>
										<?php
									}
									else 
									{
										?>
										<td ></td>
										<?php
									}
								}
								else if ($form_data[$flag2]->field_id == 12)
								{
									if($form_control_labels_values != "")
									{
										$date_format = $wpdb->get_var
										(
											$wpdb->prepare
											(
												"SELECT dynamic_settings_value FROM " .contact_bank_dynamic_settings_form()."  WHERE dynamicId = %d AND dynamic_settings_key = %s",
												$form_data[$flag2]->column_dynamicId,
												"cb_date_format"
											)
										);
										if($date_format == 0)
										{
											$formated_date =  date("F d, Y", strtotime($form_control_labels_values));
										}
										else if($date_format == 1)
										{
											$formated_date =  date("Y/m/d", strtotime($form_control_labels_values));
										} 
										else if($date_format == 2)
										{
											$formated_date = date("m/d/Y", strtotime($form_control_labels_values));
										} 
										else if($date_format == 3)
										{
											$formated_date =  date("d/m/Y", strtotime($form_control_labels_values));
										}
										?>
										<td ><?php echo $formated_date; ?></td>
										<?php
									}
									else
									{
										?>
										<td ></td>
										<?php
									}
								}
								else if($form_data[$flag2]->field_id == 13)
								{
									if($form_control_labels_values != "")
									{
										$hour_format = $wpdb->get_var
										(
											$wpdb->prepare
											(
												"SELECT dynamic_settings_value FROM " .contact_bank_dynamic_settings_form()."  WHERE dynamicId = %d AND dynamic_settings_key = %s",
												$form_data[$flag2]->column_dynamicId,
												"cb_hour_format"
											)
										);
										$time_str = explode("-",$form_control_labels_values);
										if($time_str[1] < 10)
										{
											$time = $time_str[0].":"."0".$time_str[1];
										}
										else 
										{
											$time = $time_str[0].":".$time_str[1];
										}
										if($hour_format != 24)
										{
											if($time_str[2] == 0)
											{
												$time = $time." AM";
											}
											else
											{
												$time = $time." PM";
											}
										}
										?>
										<td ><?php echo $time; ?></td>
									<?php
									}
									else
									{
										?>
										<td ></td>
										<?php
									}
								}
								else 
								{
									?>
									<td ><?php echo $form_control_labels_values; ?></td>
									<?php
								}
							}
						?>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
		<script type="text/javascript">
			oTable = jQuery('#data-table-frontend').dataTable
			({
				"bJQueryUI": false,
				"bAutoWidth": true,
				"sPaginationType": "full_numbers",
				"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
				"oLanguage": 
				{
					"sLengthMenu": "<span>Show entries:</span> _MENU_"
				},
				"aaSorting": [[ 0, "asc" ]]
			});
			jQuery(".fluid-layout .table thead th").css('vertical-align','top');
		</script>
		<?php
		die();
	}
}
?>