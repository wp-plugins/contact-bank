<?php
global $wpdb;
$form_name = $wpdb->get_var
(
	$wpdb->prepare
	(
		"SELECT form_name FROM " .contact_bank_contact_form()." WHERE form_id = %d",
		$form_id
	)
);
$fields = $wpdb->get_results
(
	$wpdb->prepare
	(
		"SELECT * FROM " .create_control_Table()."  WHERE form_id = %d ORDER BY sorting_order",
		$form_id
	)
);
?>
<form id="ux_contact_form_submit" class="layout-form">
	<div class="fluid-layout">
		<div class="layout-span12">
			<div class="widget-layout">
				<div class="widget-layout-title">
					<h4><?php echo $form_name; ?></h4>
				</div>
				<div class="widget-layout-body">
					<div class="layout-control-group">
					</div>
					<?php
						for($flag=0;$flag<count($fields);$flag++)
						{
							$field_type = $fields[$flag]->field_id;
							$dynamicId = $fields[$flag]->column_dynamicId;
							$fields_dynamic_controls = $wpdb->get_results
							(
								$wpdb->prepare
								(
									"SELECT * FROM " .contact_bank_dynamic_settings_form().  " WHERE " .contact_bank_dynamic_settings_form().".dynamicId = %d ORDER BY dynamic_settings_id ASC",
									$dynamicId
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
									$index = array_search("cb_label_value", $keys);
									$label_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_description", $keys);
									$description_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_control_required", $keys);
									$control_required_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
														
									$index = array_search("cb_tooltip_txt", $keys);
									$tooltip_txt_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_default_txt_val", $keys);
									$default_txt_val_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_alpha_filter", $keys);
									$checkbox_alpha_filter_text= $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_alpha_num_filter", $keys);
									$checkbox_alpha_num_filter_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_digit_filter", $keys);
									$checkbox_digit_filter_text = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_alpha_filter", $keys);
									$checkbox_alpha_filter_textbox = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_ux_checkbox_alpha_num_filter", $keys);
									$checkbox_alpha_num_filter_textbox = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_digit_filter", $keys);
									$checkbox_digit_filter_textbox = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_strip_tag_filter", $keys);
									$checkbox_strip_tag_filter_textbox = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_trim_filter", $keys);
									$checkbox_trim_filter_textbox = $fields_dynamic_controls[$index]->dynamic_settings_value;
									$checkbox_trim_filter = "";
									if($checkbox_trim_filter_textbox == "true")
									{
										$checkbox_trim_filter = "onfocusout='trim($dynamicId,1)'";
									}
									$checkbox_strip_tag="";
									if($checkbox_strip_tag_filter_textbox == "true")
									{
										$checkbox_strip_tag = "onblur='return strip_tags(event,1,$dynamicId)'";
									}
									$checkbox_alpha_filter = $checkbox_alpha_filter_textbox;
									$checkbox_alpha_num = $checkbox_alpha_num_filter_textbox;
									$checkbox_digit_filter = $checkbox_digit_filter_textbox;
									$checkbox_alpha = "";
									if($checkbox_alpha_filter == "true" && $checkbox_alpha_num == "false" && $checkbox_digit_filter == "false")
									{
										$checkbox_alpha = "onkeypress='return alpha(event)'";
									}
									else if($checkbox_alpha_filter == "true" && $checkbox_alpha_num == "true" && $checkbox_digit_filter == "false")
									{
										$checkbox_alpha = "onkeypress='return alphanumeric(event)'";
									}
										else if($checkbox_alpha_filter == "false" && $checkbox_alpha_num == "true" && $checkbox_digit_filter == "false")
									{
										$checkbox_alpha = "onkeypress='return alphanumeric(event)'";
									}
									else if($checkbox_alpha_filter == "true" && $checkbox_alpha_num == "true" && $checkbox_digit_filter == "true")
									{
										$checkbox_alpha = "onkeypress='return alpha_num_digits(event)'";
									}
									else if($checkbox_alpha_filter == "false" && $checkbox_alpha_num == "true" && $checkbox_digit_filter == "true")
									{
										$checkbox_alpha = "onkeypress='return alphanumeric(event)'";
									}
									else if($checkbox_alpha_filter == "false" && $checkbox_alpha_num == "false" && $checkbox_digit_filter == "true")
									{
										$checkbox_alpha = "onkeypress='return OnlyNumbers(event)'";
									}
									else if($checkbox_alpha_filter == "true" && $checkbox_alpha_num == "false" && $checkbox_digit_filter == "true")
									{
										$checkbox_alpha = "onkeypress='return alphanumeric(event)'";
									}
									
									$index = array_search("cb_button_set_outer_label_textbox", $keys);
									$cb_button_set_outer_label_textbox = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_txt_input_textbox", $keys);
									$cb_button_set_txt_input_textbox = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_txt_description_textbox", $keys);
									$cb_button_set_txt_description_textbox = $fields_dynamic_controls[$index]->dynamic_settings_value;	
									?>
									<div class="layout-control-group" id="div_<?php echo $dynamicId; ?>">
										<label class="layout-control-label" style="<?php echo $cb_button_set_outer_label_textbox;?>" id="control_label_<?php echo $dynamicId; ?>"><?php echo $label_text; ?> : </label>
										<?php
										if($control_required_text == 1)
										{
											?>
												<span id="txt_required_<?php echo $dynamicId; ?>" class="error" style="display:block;">*</span>
											<?php
										}
										?>
										<div class="layout-controls">
											<input <?php echo $checkbox_trim_filter ; ?> <?php echo $checkbox_alpha ; ?> <?php echo $checkbox_strip_tag; ?>  class="hovertip layout-span8" placeholder="<?php _e("Enter Text", contact_bank); ?>" style="<?php echo $cb_button_set_txt_input_textbox;?>" type="text"  id="txt_<?php echo $dynamicId; ?>" name="txt_<?php echo $dynamicId; ?>" data-original-title="<?php echo $tooltip_txt_text; ?>" value="<?php echo $default_txt_val_text;?>"/>
											<br />
											<span class="span-description" style="<?php echo $cb_button_set_txt_description_textbox;?>" id="txt_description_<?php echo $dynamicId; ?>"><?php echo $description_text; ?></span>
										</div>
									</div>
									<?php
								break;
								case 2:
									$index = array_search("cb_label_value", $keys);
									$label_value_textarea = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_description", $keys);
									$description_value_textarea = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_control_required", $keys);
									$control_required_textarea = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_tooltip_txt", $keys);
									$tooltip_txt_textarea = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_default_txt_val", $keys);
									$default_value_textarea = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_alpha_filter", $keys);
									$checkbox_alpha_filter_textarea = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_alpha_num_filter", $keys);
									$checkbox_alpha_num_filter_textarea = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_digit_filter", $keys);
									$checkbox_digit_filter_textarea = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("checkbox_strip_tag_filter", $keys);
									$checkbox_strip_tag_filter_textarea = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("checkbox_trim_filter", $keys);
									$checkbox_trim_filter_textarea = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$checkbox_trim_filter = "";
									if($checkbox_trim_filter_textarea == "true")
									{
										$checkbox_trim_filter = "onfocusout='trim($dynamicId,2)'";
									}
									$checkbox_strip_tag = "";
									
									if($checkbox_strip_tag_filter_textarea == "true")
									{
										$checkbox_strip_tag = "onblur='return strip_tags(event,2,$dynamicId)'";
									}
									$checkbox_alpha_filter = $checkbox_alpha_filter_textarea;
									$checkbox_alpha_num = $checkbox_alpha_num_filter_textarea;
									$checkbox_digit_filter = $checkbox_digit_filter_textarea;
									$checkbox_alpha = "";
									if($checkbox_alpha_filter == "true" && $checkbox_alpha_num == "false" && $checkbox_digit_filter == "false")
									{
										$checkbox_alpha = "onkeypress='return alpha(event)'";
									}
									else if($checkbox_alpha_filter == "true" && $checkbox_alpha_num == "true" && $checkbox_digit_filter == "false")
									{
										$checkbox_alpha = "onkeypress='return alphanumeric(event)'";
									}
										else if($checkbox_alpha_filter == "false" && $checkbox_alpha_num == "true" && $checkbox_digit_filter == "false")
									{
										$checkbox_alpha = "onkeypress='return alphanumeric(event)'";
									}
									else if($checkbox_alpha_filter == "true" && $checkbox_alpha_num == "true" && $checkbox_digit_filter == "true")
									{
										$checkbox_alpha = "onkeypress='return alpha_num_digits(event)'";
									}
									else if($checkbox_alpha_filter == "false" && $checkbox_alpha_num == "true" && $checkbox_digit_filter == "true")
									{
										$checkbox_alpha = "onkeypress='return alphanumeric(event)'";
									}
									else if($checkbox_alpha_filter == "false" && $checkbox_alpha_num == "false" && $checkbox_digit_filter == "true")
									{
										$checkbox_alpha = "onkeypress='return OnlyNumbers(event)'";
									}
									else if($checkbox_alpha_filter == "true" && $checkbox_alpha_num == "false" && $checkbox_digit_filter == "true")
									{
										$checkbox_alpha = "onkeypress='return alphanumeric(event)'";
									}
									$index = array_search("cb_button_set_outer_label", $keys);
									$cb_button_set_outer_label = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_textinput", $keys);
									$cb_button_set_textinput = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_outer_description", $keys);
									$cb_button_set_outer_description = $fields_dynamic_controls[$index]->dynamic_settings_value;
									?>
									<div class="layout-control-group"  id="div_<?php echo $dynamicId; ?>">
										<label class="layout-control-label" style="<?php echo $cb_button_set_outer_label;?>" id="control_label_<?php echo $dynamicId; ?>" ><?php echo $label_value_textarea; ?> </label>
										<?php
											if($control_required_textarea == 1)
											{
											?>
											<span id="txt_required_<?php echo $dynamicId; ?>" class="error" style="display:block;">*</span>
											<?php
											}
										?>
										<div class="layout-controls">
											<textarea <?php echo $checkbox_trim_filter ; ?>  <?php echo $checkbox_alpha; ?> <?php echo $checkbox_strip_tag; ?> data-original-title="<?php echo $tooltip_txt_textarea; ?>" style="<?php echo $cb_button_set_textinput;?>" class="hovertip layout-span8" id="textarea_<?php echo $dynamicId; ?>" name="textarea_<?php echo $dynamicId; ?>" ><?php echo $default_value_textarea; ?></textarea>
											<br />
											<span class="span-description" style="<?php echo $cb_button_set_outer_description;?>" id="txt_description_<?php echo $dynamicId; ?>"><?php echo $description_value_textarea; ?></span> 
										</div>
									</div>
									<?php
								break;
								case 3:
									$index = array_search("cb_label_value", $keys);
									$label_email = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_description", $keys);
									$description_email = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_control_required", $keys);
									$control_required_email = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_tooltip_txt", $keys);
									$tooltip_txt_email = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_alpha_filter", $keys);
									$checkbox_alpha_filter_email = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_ux_checkbox_alpha_num_filter", $keys);
									$checkbox_alpha_num_filter_email = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_digit_filter", $keys);
									$checkbox_digit_filter_email = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_strip_tag_filter", $keys);
									$checkbox_strip_tag_filter_email = $fields_dynamic_controls[$index]->dynamic_settings_value;
									$checkbox_strip_tag = "";
									if($checkbox_strip_tag_filter_email == "true")
									{
										$checkbox_strip_tag = "onblur='return strip_tags(event,3,$dynamicId)'";
									}
									$checkbox_alpha_filter = $checkbox_alpha_filter_email;
									$checkbox_alpha_num_filter = $checkbox_alpha_num_filter_email;
									$checkbox_digit_filter = $checkbox_digit_filter_email;
									$filter_applied = "";
									if($checkbox_alpha_filter == "true" && $checkbox_alpha_num_filter == "false" && $checkbox_digit_filter == "false")
									{
										$filter_applied = "onkeypress='return alpha(event)'";
									}
									else if($checkbox_alpha_filter == "true" && $checkbox_alpha_num_filter == "true" && $checkbox_digit_filter == "false")
									{
										$filter_applied = "onkeypress='return alphanumeric(event)'";
									}
										else if($checkbox_alpha_filter == "false" && $checkbox_alpha_num_filter == "true" && $checkbox_digit_filter == "false")
									{
										$filter_applied = "onkeypress='return alphanumeric(event)'";
									}
									else if($checkbox_alpha_filter == "true" && $checkbox_alpha_num_filter == "true" && $checkbox_digit_filter == "true")
									{
										$filter_applied = "onkeypress='return alpha_num_digits(event)'";
									}
									else if($checkbox_alpha_filter == "false" && $checkbox_alpha_num_filter == "true" && $checkbox_digit_filter == "true")
									{
										$filter_applied = "onkeypress='return alphanumeric(event)'";
									}
									else if($checkbox_alpha_filter == "false" && $checkbox_alpha_num_filter == "false" && $checkbox_digit_filter == "true")
									{
										$filter_applied = "onkeypress='return OnlyNumbers(event)'";
									}
									else if($checkbox_alpha_filter == "true" && $checkbox_alpha_num_filter == "false" && $checkbox_digit_filter == "true")
									{
										$filter_applied = "onkeypress='return alphanumeric(event)'";
									}
									$index = array_search("cb_button_set_outer_label", $keys);
									$cb_button_set_outer_label = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_txt_input", $keys);
									$cb_button_set_txt_input = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_txt_description", $keys);
									$cb_button_set_txt_description = $fields_dynamic_controls[$index]->dynamic_settings_value;
									?>
									<div class="layout-control-group"  id="div_<?php echo $dynamicId; ?>">
										<label class="layout-control-label" style="<?php echo $cb_button_set_outer_label;?>" id="control_label_<?php echo $dynamicId; ?>" ><?php echo $label_email;  ?> : </label>
										<?php
											if($control_required_email == 1)
											{
										?>
											<span id="txt_required_<?php echo $dynamicId; ?>" class="error" style="display:block;">*</span>
										<?php
											}
											?>
										<div class="layout-controls">		
											<input <?php echo $filter_applied; ?> <?php echo $checkbox_strip_tag; ?> data-original-title="<?php echo $tooltip_txt_email; ?>" style="<?php echo $cb_button_set_txt_input;?>" placeholder="<?php _e("Enter Email Address", contact_bank); ?>" class="hovertip layout-span8" type="text" id="email_<?php echo $dynamicId; ?>" name="email_<?php echo $dynamicId; ?>" />
											<br />
											<span class="span-description" style="<?php echo $cb_button_set_txt_description;?>" id="txt_description_<?php echo $dynamicId; ?>"><?php echo $description_email; ?></span>
										</div>
									</div>
									<?php
								break;
								case 4:
									$index = array_search("cb_default_value", $keys);
									$label_ddl = $fields_dynamic_controls[$index]->dynamic_settings_value;

									$index = array_search("cb_control_required", $keys);
									$control_required_ddl = $fields_dynamic_controls[$index]->dynamic_settings_value;

									$index = array_search("cb_tooltip_txt", $keys);
									$tooltip_txt_ddl = $fields_dynamic_controls[$index]->dynamic_settings_value;

									$index = array_search("cb_dropdown_options", $keys);
									$options_str_ddl = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_outer_label", $keys);
									$cb_button_set_outer_label = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_dropdown_menu", $keys);
									$cb_button_set_dropdown_menu = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									?>
									<div class="layout-control-group"  id="div_<?php echo $dynamicId; ?>">
										<label class="layout-control-label" style="<?php echo $cb_button_set_outer_label;?>" id="control_label_<?php echo $dynamicId; ?>" ><?php echo $label_ddl; ?> :</label>
										<?php
											if($control_required_ddl == 1)
											{
										?>
												<span id="txt_required_<?php echo $dynamicId; ?>"  class="error" style="display:block;">*</span>
										<?php
											}
										?>
										<div class="layout-controls">
											
												<?php 
												if($options_str_ddl != "")
												{
													?>
													<select class="hovertip layout-span8" type="dropdown" style="<?php echo $cb_button_set_dropdown_menu;?>" id="select_<?php echo $dynamicId; ?>" data-original-title="<?php echo $tooltip_txt_ddl; ?>" name="select_<?php echo $dynamicId; ?>">
													<option value=""><?php _e("Select option",contact_bank);?></option>
													<?php
													$options_ddl = explode(";",$options_str_ddl);
													for($flag5 = 0;$flag5<count($options_ddl);$flag5++)
													{
														?>
														<option value="<?php echo $options_ddl[$flag5];?>"><?php echo $options_ddl[$flag5];?></option>
														<?php
													}
												}
												else 
												{
													?>
													<select class="hovertip layout-span8" type="dropdown" style="<?php echo $cb_button_set_dropdown_menu;?>" id="select_default_<?php echo $dynamicId; ?>" data-original-title="<?php echo $tooltip_txt_ddl; ?>" name="select_default_<?php echo $dynamicId; ?>">
													<option value="0"><?php _e("Select option",contact_bank);?></option>
													<?php
												}
												?>
											</select>
											<span id="error_message_dropdown_<?php echo $dynamicId; ?>"></span>
										</div>
									</div>
									<?php
								break;
								case 5:
									$index = array_search("cb_default_value", $keys);
									$label_chk = $fields_dynamic_controls[$index]->dynamic_settings_value;

									$index = array_search("cb_control_required", $keys);
									$control_required_chk = $fields_dynamic_controls[$index]->dynamic_settings_value;

									$index = array_search("cb_tooltip_txt", $keys);
									$tooltip_txt_chk = $fields_dynamic_controls[$index]->dynamic_settings_value;

									$index = array_search("cb_checkbox_options_dynamicId", $keys);
									$options_dynamicId_str_chk = $fields_dynamic_controls[$index]->dynamic_settings_value;

									$index = array_search("cb_checkbox_options", $keys);
									$options_str_chk = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_outer_label", $keys);
									$cb_button_set_outer_label = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_options_outer_wrapper", $keys);
									$cb_button_set_options_outer_wrapper = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_options_wrapper", $keys);
									$cb_button_set_options_wrapper = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_options_label", $keys);
									$cb_button_set_options_label = $fields_dynamic_controls[$index]->dynamic_settings_value;
									?>
									<div class="layout-control-group hovertip" style="<?php echo $cb_button_set_options_outer_wrapper;?>" id="div_<?php echo $dynamicId; ?>">
										<label class="layout-control-label" style="<?php echo $cb_button_set_outer_label;?>" id="control_label_<?php echo $dynamicId; ?>" ><?php echo $label_chk; ?> : </label>
										<?php
											if($control_required_chk == 1)
											{
										?>
												<span id="txt_required_<?php echo $dynamicId; ?>"  class="error" style="display:block;">*</span>
										<?php
											}
										?>
										<div class="layout-controls hovertip" style="<?php echo $cb_button_set_options_wrapper;?>" id="post_back_checkbox_<?php echo $dynamicId; ?>" data-original-title="<?php echo $tooltip_txt_chk; ?>">
											<?php
												if($options_dynamicId_str_chk != "")
												{
												?>
													<span  id="add_chk_options_here_<?php echo $dynamicId; ?>" >
													<?php
														$options_dynamicId_chk = explode(";",$options_dynamicId_str_chk);
														$options_chk = explode(";",$options_str_chk);
														for($flag6 = 0;$flag6<count($options_dynamicId_chk);$flag6++)
														{
															?>
															<input type="checkbox" id="chk_<?php echo $options_dynamicId_chk[$flag6]; ?>" name="<?php echo $dynamicId; ?>_chk[]" title="This field Is Required" value ="<?php echo $options_chk[$flag6]; ?>" />
															<label style="margin:0px;vertical-align: middle;<?php echo $cb_button_set_options_label;?>" id="chk_id_<?php echo $options_dynamicId_chk[$flag6]; ?>"><?php echo $options_chk[$flag6]; ?></label>
															<?php
														}
													?>
													</span>
													<?php
												}
												else
												{
													?>
													<input type="checkbox" id="chk_<?php echo $dynamicId; ?>" name="chk[]" />
													<?php
												}
											?>
										</div>
									</div>
									<?php
								break;
								case 6:
									$index = array_search("cb_default_value", $keys);
									$label_radio = $fields_dynamic_controls[$index]->dynamic_settings_value;

									$index = array_search("cb_control_required", $keys);
									$control_required_radio = $fields_dynamic_controls[$index]->dynamic_settings_value;

									$index = array_search("cb_tooltip_txt", $keys);
									$tooltip_txt_radio = $fields_dynamic_controls[$index]->dynamic_settings_value;

									$index = array_search("cb_multiple_options_dyanmicId", $keys);
									$options_dynamicId_str_radio = $fields_dynamic_controls[$index]->dynamic_settings_value;

									$index = array_search("cb_multiple_options", $keys);
									$options_str_radio = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_outer_label", $keys);
									$cb_button_set_outer_label = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_options_outer_wrapper", $keys);
									$cb_button_set_options_outer_wrapper = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_options_wrapper", $keys);
									$cb_button_set_options_wrapper = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_options_label", $keys);
									$cb_button_set_options_label = $fields_dynamic_controls[$index]->dynamic_settings_value;
									?>
									<div class="layout-control-group hovertip" style="<?php echo $cb_button_set_options_outer_wrapper;?>" id="div_<?php echo $dynamicId; ?>">
										<label class="layout-control-label" style="<?php echo $cb_button_set_outer_label;?>" id="control_label_<?php echo $dynamicId; ?>" ><?php echo $label_radio; ?> : </label>
										<?php
											if($control_required_radio == 1)
											{
										?>
												<span id="txt_required_<?php echo $dynamicId; ?>"  class="error" style="display:block;">*</span>
										<?php
											}
										?>
										<div class="layout-controls hovertip" style="<?php echo $cb_button_set_options_wrapper;?>" id="post_back_radio_button_<?php echo $dynamicId; ?>" data-original-title="<?php echo $tooltip_txt_radio; ?>">
											<?php
												if($options_dynamicId_str_radio != "")
												{
												?>
													<span  id="add_radio_options_here_<?php echo $dynamicId; ?>" >
													<?php
														$options_dynamicId_radio = explode(";",$options_dynamicId_str_radio);
														$options_radio = explode(";",$options_str_radio);
														for($flag7 = 0;$flag7<count($options_dynamicId_radio);$flag7++)
														{
															?>
															<input type="radio" id="radio_<?php echo $options_dynamicId_radio[$flag7]; ?>" title="This field is Required" name="radio_<?php echo $dynamicId; ?>" value="<?php echo $options_radio[$flag7]; ?>" />
															<label  style="margin:0px;vertical-align: middle;<?php echo $cb_button_set_options_label;?>" id="radio_id_<?php echo $options_dynamicId_radio[$flag7]; ?>"><?php echo $options_radio[$flag7]; ?></label>
															<?php
														}
													?>
													</span>
													<?php
												}
												else
												{
													?>
													<input type="radio" id="radio_<?php echo $dynamicId; ?>" name="radio" />
													<?php
												}
											?>
										</div>
									</div>
									<?php
								break;
								case 9:
									include_once CONTACT_BK_PLUGIN_DIR ."/phpfileuploader/phpuploader/include_phpuploader.php";  
									$index = array_search("cb_label_value", $keys);
									$label_file_upload = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_description", $keys);
									$description_file_upload = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_control_required", $keys);
									$control_required_file_upload = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_tooltip_txt", $keys);
									$tooltip_txt_file_upload = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_allow_multiple_file", $keys);
									$allow_multiple_file = $fields_dynamic_controls[$index]->dynamic_settings_value;
									if($allow_multiple_file == "true")
									{
										$allow_multiple_file = 1;
									}
									else 
									{
										$allow_multiple_file = 0;
									}
									$index = array_search("cb_allow_file_ext_upload", $keys);
									$allow_file_ext_upload = $fields_dynamic_controls[$index]->dynamic_settings_value;
									$allowed_file_ext = str_replace(";",",","$allow_file_ext_upload");
									
									$index = array_search("cb_maximum_file_allowed", $keys);
									$maximum_file_allowed = $fields_dynamic_controls[$index]->dynamic_settings_value;
									if($maximum_file_allowed == 0 || $maximum_file_allowed == "")
									{
										$maximum_file_allowed = 1;
									}
									$maximum_file_size_allowed = $maximum_file_allowed * 1;
									
									$index = array_search("cb_uploaded_file_email_db", $keys);
									$uploaded_file_email_db = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_outer_label_file", $keys);
									$cb_button_set_outer_label_file = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_outer_description_fileuplod", $keys);
									$cb_button_set_outer_description_fileuplod = $fields_dynamic_controls[$index]->dynamic_settings_value;
									?>
									
									<div class="layout-control-group "  id="div_<?php echo $dynamicId; ?>">
										<label class="layout-control-label" style="<?php echo $cb_button_set_outer_label_file;?>" id="control_label_<?php echo $dynamicId; ?>" ><?php echo $label_file_upload ; ?> :</label>
											<?php
											if($control_required_file_upload == 1)
											{
											?>
											<span id="txt_required_<?php echo $dynamicId; ?>" class="error" style="display:block;">*</span>
											<?php
											}
											?>
										<div class="layout-controls" id="show_tooltip<?php echo $dynamicId; ?>">
											<div id="file_upload_content">
											<?php 
												$uploader=new PhpUploader();
												$uploader->MultipleFilesUpload = $allow_multiple_file;
												$uploader->InsertText="Please choose Files";
												$uploader->Name="myuploader";
												$uploader->MaxSizeKB=$maximum_file_size_allowed;
												$uploader->AllowedFileExtensions=$allowed_file_ext;
												$uploader->SaveDirectory= CONTACT_BK_PLUGIN_DIR ."/phpfileuploader/savefiles/";
												$uploader->FlashUploadMode="Partial";
												$uploader->Render();
											?>
											</div>
											<div id="file_upload_content_postback"></div>
											<span class="span-description" style="<?php echo $cb_button_set_outer_description_fileuplod;?>"  id="txt_description_<?php echo $dynamicId; ?>"><?php echo $description_file_upload; ?></span>
										</div>
									</div>
										<script>jQuery("#myuploaderButton").attr("class","hovertip");
											jQuery("#myuploaderButton").attr("data-original-title","<?php echo $tooltip_txt_file_upload; ?>");
									</script>
									<?php
								break;
								case 12:
									$index = array_search("cb_label_value", $keys);
									$label_date = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_description", $keys);
									$description_date = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_control_required", $keys);
									$control_required_date = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_tooltip_txt", $keys);
									$tooltip_txt_date = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_start_year", $keys);
									$start_year_date = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_end_year", $keys);
									$end_year_date = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_default_value_day", $keys);
									$default_value_day_date = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_default_value_month", $keys);
									$default_value_month = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_default_value_year", $keys);
									$default_value_year_date = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_outer_label", $keys);
									$cb_button_set_outer_label = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_description", $keys);
									$cb_button_set_description = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_date_day_dropdown", $keys);
									$cb_date_day_dropdown = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_date_month_dropdown", $keys);
									$cb_date_month_dropdown = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_date_year_dropdown", $keys);
									$cb_date_year_dropdown = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_error_invalid", $keys);
									$cb_error_invalid = $fields_dynamic_controls[$index]->dynamic_settings_value;
									?>
									<div class="layout-control-group" id="div_<?php echo $dynamicId; ?>">
										<label class="layout-control-label" style="<?php echo $cb_button_set_outer_label;?>" id="control_label_<?php echo $dynamicId; ?>" ><?php echo $label_date ; ?> : </label>
											<?php
												if($control_required_date == 1)
												{
												?>
												<span id="txt_required_<?php echo $dynamicId; ?>" class="error" style="display:block;">*</span>
												<?php
												}
											?>
											<div class="layout-controls hovertip" id="show_tooltip<?php echo $dynamicId; ?>" data-original-title="<?php echo $tooltip_txt_date; ?>">
												<select class="layout-span3" type="select" id="select_day_<?php echo $dynamicId; ?>" name="select_day_<?php echo $dynamicId; ?>" style="<?php echo $cb_date_day_dropdown;?>">
													<option selected="selected" value=""><?php _e("Day",contact_bank);?></option>
													<?php
													for($flag1=1; $flag1 <= 31; $flag1++)
													{
														if($flag1 < 10)
														{
															?>
															<option value=<?php echo $flag1; ?>>0<?php echo $flag1; ?></option>
															<?php
														}
														else
														{
															?>
															<option value=<?php echo $flag1; ?>><?php echo $flag1; ?></option>
															<?php
														}
													}
													?>
												</select>
												<input type="hidden" id="ux_date_error_msg_<?php echo $dynamicId; ?>" name="ux_date_error_msg_<?php echo $dynamicId; ?>" value="<?php echo $cb_error_invalid;?>" />
												<script>
												jQuery("#select_day_<?php echo $dynamicId; ?>").val(<?php echo $default_value_day_date; ?>);
												if(<?php echo $default_value_day_date; ?> == "0")
												{
													jQuery("#select_day_<?php echo $dynamicId; ?>").val("");
												}
												</script>
												<select class="layout-span3" type="select" id="select_month_<?php echo $dynamicId; ?>" name="select_month_<?php echo $dynamicId; ?>" style="<?php echo $cb_date_month_dropdown;?>">
													<option selected="selected" value=""><?php _e("Month",contact_bank);?></option>
													<option value="1">January</option>
													<option value="2">February</option>
													<option value="3">March</option>
													<option value="4">April</option>
													<option value="5">May</option>
													<option value="6">June</option>
													<option value="7">July</option>
													<option value="8">August</option>
													<option value="9">September</option>
													<option value="10">October</option>
													<option value="11">November</option>
													<option value="12">December</option>
												</select>
												<script>
												jQuery("#select_month_<?php echo $dynamicId; ?>").val(<?php echo $default_value_month; ?>)
												if(<?php echo $default_value_month; ?> == "0")
												{
													jQuery("#select_month_<?php echo $dynamicId; ?>").val("");
												}
												</script>
												<select class="layout-span3" type="select" id="select_year_<?php echo $dynamicId; ?>" name="select_year_<?php echo $dynamicId; ?>" style="<?php echo $cb_date_year_dropdown;?>">
														<option selected="selected" value="" ><?php _e("Year",contact_bank);?></option>
														<?php
														if($start_year_date != 0 && $end_year_date != 0)
														{
														?>
														
															<?php
															for($flag2=$start_year_date; $flag2 <= $end_year_date; $flag2++)
															{
																if($flag2 == $default_value_year_date)
																{
																	?>
																	<option selected="selected" value=<?php echo $flag2; ?>><?php echo $flag2; ?></option>
																	<?php
																}
																else 
																{
																	?>
																	<option  value=<?php echo $flag2; ?>><?php echo $flag2; ?></option>
																	<?php
																}
															}
														}
														else
														{
															for($flag2=1900; $flag2 <= 2100; $flag2++)
															{
																?>
																<option value=<?php echo $flag2; ?>><?php echo $flag2; ?></option>
																<?php
															}
														}
														?>
														
												</select>
												<script>
													if(<?php echo $default_value_year_date; ?> == "0")
													{
														jQuery("#select_year_<?php echo $dynamicId; ?>").val("");
													}
												</script>
												<span style="color: #CC0000;font-size: 12px;" id="error_message_date_<?php echo $dynamicId; ?>"></span>
												<br />
												<span class="span-description" style="<?php echo $cb_button_set_description;?>" id="txt_description_<?php echo $dynamicId; ?>"><?php echo $description_date; ?></span>
											</div>
									</div>
									<?php
								break;
								case 13:
									$index = array_search("cb_hours", $keys);
									$hours_time = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_minutes", $keys);
									$minutes_time = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_am_pm", $keys);
									$am_pm_time = $fields_dynamic_controls[$index]->dynamic_settings_value;
														
									$index = array_search("cb_label_value", $keys);
									$label_time = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_description", $keys);
									$description_time = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_control_required", $keys);
									$control_required_time = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_tooltip_txt", $keys);
									$tooltip_txt_time = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_hour_format", $keys);
									$cb_hour_format_time = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_time_format", $keys);
									$cb_time_format_time = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_outer_label", $keys);
									$cb_button_set_outer_label = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_description", $keys);
									$cb_button_set_description = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_time_hour_dropdown", $keys);
									$cb_button_set_time_hour_dropdown = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_time_minute_dropdown", $keys);
									$cb_button_set_time_minute_dropdown = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_time_am_pm_dropdown", $keys);
									$cb_button_set_time_am_pm_dropdown = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									?>
									<div class="layout-control-group"  id="div_<?php echo $dynamicId; ?>">
										<label style="<?php echo $cb_button_set_outer_label; ?>" class="layout-control-label" id="control_label_<?php echo $dynamicId; ?>"><?php echo $label_time ; ?> : </label>
											<?php
												if($control_required_time == 1)
												{
											?>
												<span id="txt_required_<?php echo $dynamicId; ?>" class="error" style="display:block;">*</span>
											<?php
												}
											?>
											<div class="layout-controls hovertip" id="show_tooltip<?php echo $dynamicId; ?>" data-original-title="<?php echo $tooltip_txt_time; ?>">
												<?php
												if($cb_hour_format_time == 12)
												{
													?>
												<select style="<?php echo $cb_button_set_time_hour_dropdown; ?>" class="layout-span3" type="select_time" id="select_hr_<?php echo $dynamicId; ?>" name="select_hr_<?php echo $dynamicId; ?>">
													<option value=""><?php _e("Hour",contact_bank);?></option>
													<?php
													for($flag3=1; $flag3 <= 12; $flag3++)
													{
														if($flag3 < 10)
														{
														?>
														<option value="<?php echo $flag3; ?>">0<?php echo $flag3; ?></option>
														<?php
														}
														else
														{
														?>		
														<option value="<?php echo $flag3; ?>"><?php echo $flag3; ?></option>
														<?php	
														}
													}
													?>
												</select>
												<script>jQuery("#select_hr_<?php echo $dynamicId; ?>").val(<?php echo $hours_time; ?>)</script>
												<?php
												}
												else if($cb_hour_format_time == 24)
												{
													?>
												<select style="<?php echo $cb_button_set_time_hour_dropdown; ?>" class="layout-span3" type="select_time" id="select_hr_<?php echo $dynamicId; ?>" name="select_hr_<?php echo $dynamicId; ?>">
												<option value=""><?php _e("Hour", contact_bank); ?></option>
													<?php
													for($flag9=1; $flag9 <= 24; $flag9++)
													{
														if($flag9 < 10)
														{
														?>
														<option value="<?php echo $flag9 ?>">0<?php echo $flag9 ?></option>
														<?php
														}
														else
														{
														?>		
														<option value="<?php echo $flag9; ?>"><?php echo $flag9 ?></option>
														<?php	
														}
													}
													?>
												</select>
												<script>jQuery("#select_hr_<?php echo $dynamicId; ?>").val(<?php echo $hours_time; ?>)</script>
												<?php
												}
											else
												{
												?>
												<select style="<?php echo $cb_button_set_time_hour_dropdown; ?>" class="layout-span3" type="select_time" id="select_hr_<?php echo $dynamicId; ?>" name="select_hr_<?php echo $dynamicId; ?>">
													<option selected="selected" value=""><?php _e("Hour",contact_bank);?></option>
													<?php
													for($flag15=0; $flag15 <= 12; $flag15++)
													{
														if($flag15 < 10)
														{
														?>
														<option value="<?php echo $flag15; ?>">0<?php echo $flag15; ?></option>
														<?php
														}
														else
														{
														?>		
														<option value="<?php echo $flag15; ?>"><?php echo $flag15; ?></option>
														<?php	
														}
													}
													?>
												</select>
												<script>jQuery("#select_hr_<?php echo $dynamicId; ?>").val(<?php echo $hours_time; ?>)</script>
												<?php
												}
												?>
												<select style="<?php echo $cb_button_set_time_minute_dropdown; ?>" class="layout-span3" type="select_time" id="select_min_<?php echo $dynamicId; ?>" name="select_min_<?php echo $dynamicId; ?>">
													<option value=""><?php _e("Minute",contact_bank);?></option>
													<?php
													for($flag4=0; $flag4 < 60;)
													{
														
														?>
														<option value="<?php echo $flag4; ?>"><?php echo $flag4; ?></option>
														<?php
														$flag4 = $flag4 + $cb_time_format_time;
													}
													?>
													
													</select>
												<script>jQuery("#select_min_<?php echo $dynamicId; ?>").val(<?php echo $minutes_time; ?>)</script>
												<select style="<?php echo $cb_button_set_time_am_pm_dropdown; ?>" class="layout-span3" id="select_am_<?php echo $dynamicId; ?>" name="select_am_<?php echo $dynamicId; ?>">
													<option value="0">AM</option>
													<option value="1">PM</option>
												</select>
												<?php
												if($cb_hour_format_time == 12)
												{
												?>
												<script>jQuery("#select_am_<?php echo $dynamicId; ?>").val(<?php echo $am_pm_time; ?>)</script>
												<?php
												}
												else if($cb_hour_format_time == 24)
												{
												?>
												<script>jQuery("#select_am_<?php echo $dynamicId; ?>").hide()</script>
												<?php
												}
												else
												{
												?>
												<script>jQuery("#select_am_<?php echo $dynamicId; ?>").show();</script>
												<?php
												}	
												?>
												<span id="error_message_time_<?php echo $dynamicId; ?>"></span>
												<br />
												<span style="<?php echo $cb_button_set_description; ?>" class="span-description"  id="txt_description_<?php echo $dynamicId; ?>"><?php echo $description_time; ?></span>
											</div>
									</div>
									<?php
								break;
								case 14:
									$index = array_search("cb_label_value", $keys);
									$label_hidden = $fields_dynamic_controls[$index]->dynamic_settings_value;
									$index = array_search("cb_default_value", $keys);  
									$default_value_hidden = $fields_dynamic_controls[$index]->dynamic_settings_value;
										?>
									<div class="layout-control-group"  id="div_<?php echo $dynamicId; ?>">
										<label class="layout-control-label" id="control_label_<?php echo $dynamicId; ?>" ><?php echo $label_hidden ; ?> : </label>
										<span id="txt_required_<?php echo $dynamicId; ?>"  class="error">*</span>
											<div class="layout-controls">	
												<input class="hovertip layout-span8" placeholder="<?php _e("Enter Hidden Text", contact_bank); ?>" data-original-title="<?php _e( "Hidden", contact_bank ); ?>" type="text" id="txt_hide_<?php echo $dynamicId; ?>" name="txt_hide_<?php echo $dynamicId; ?>" value="<?php echo $default_value_hidden;?>" />
											</div>
									</div>
									<?php
								break;
								case 15:
									$index = array_search("cb_label_value", $keys);
									$label_password = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_description", $keys);
									$description_password = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_control_required", $keys);
									$control_required_password = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_tooltip_txt", $keys);
									$tooltip_txt_password = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_alpha_filter", $keys);
									$checkbox_alpha_filter_password = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_ux_checkbox_alpha_num_filter", $keys);
									$checkbox_alpha_num_filter_password = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_digit_filter", $keys);
									$checkbox_digit_filter_password = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_checkbox_strip_tag_filter", $keys);
									$checkbox_strip_tag_filter_password = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$checkbox_strip_tag_filter="";
									
									if($checkbox_strip_tag_filter_password == "true")
									{
										$checkbox_strip_tag_filter = "onblur='return strip_tags(event,15,$dynamicId)'";
									}
									$checkbox_alpha_filter = $checkbox_alpha_filter_password;
									$checkbox_alpha_num_filter = $checkbox_alpha_num_filter_password;
									$checkbox_digit_filter = $checkbox_digit_filter_password;
									$filtter_aplied = "";
									if($checkbox_alpha_filter == "true" && $checkbox_alpha_num_filter == "false" && $checkbox_digit_filter == "false")
									{
										$filtter_aplied = "onkeypress='return alpha(event)'";
									}
									else if($checkbox_alpha_filter == "true" && $checkbox_alpha_num_filter == "true" && $checkbox_digit_filter == "false")
									{
										$filtter_aplied = "onkeypress='return alphanumeric(event)'";
									}
									else if($checkbox_alpha_filter == "false" && $checkbox_alpha_num_filter == "true" && $checkbox_digit_filter == "false")
									{
										$filtter_aplied = "onkeypress='return alphanumeric(event)'";
									}
									else if($checkbox_alpha_filter == "true" && $checkbox_alpha_num_filter == "true" && $checkbox_digit_filter == "true")
									{
										$filtter_aplied = "onkeypress='return alpha_num_digits(event)'";
									}
									else if($checkbox_alpha_filter == "false" && $checkbox_alpha_num_filter == "true" && $checkbox_digit_filter == "true")
									{
										$filtter_aplied = "onkeypress='return alphanumeric(event)'";
									}
									else if($checkbox_alpha_filter == "false" && $checkbox_alpha_num_filter == "false" && $checkbox_digit_filter == "true")
									{
										$filtter_aplied = "onkeypress='return OnlyNumbers(event)'";
									}
									else if($checkbox_alpha_filter == "true" && $checkbox_alpha_num_filter == "false" && $checkbox_digit_filter == "true")
									{
										$filtter_aplied = "onkeypress='return alphanumeric(event)'";
									}
									$index = array_search("cb_button_set_outer_label", $keys);
									$cb_button_set_outer_label = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_txt_input", $keys);
									$cb_button_set_txt_input = $fields_dynamic_controls[$index]->dynamic_settings_value;
									
									$index = array_search("cb_button_set_txt_description", $keys);
									$cb_button_set_txt_description = $fields_dynamic_controls[$index]->dynamic_settings_value;
									?>
									<div class="layout-control-group" id="div_<?php echo $dynamicId; ?>">
										<label class="layout-control-label" style="<?php echo $cb_button_set_outer_label;?>" id="control_label_<?php echo $dynamicId; ?>" ><?php echo $label_password ; ?> : </label>
											<?php
											if($control_required_password == 1)
											{
											?>
												<span id="txt_required_<?php echo $dynamicId; ?>" class="error" style="display:block;">*</span>
											<?php
											}
											?>
										<div class="layout-controls hovertip" id="show_tooltip<?php echo $dynamicId; ?>" data-original-title="<?php echo $tooltip_txt_password; ?>">
											<input <?php echo $filtter_aplied; ?> <?php echo $checkbox_strip_tag_filter; ?> style="<?php echo $cb_button_set_txt_input;?>" class="hovertip layout-span8" placeholder="<?php _e("Enter Password", contact_bank); ?>" type="password" id="txt_password_<?php echo $dynamicId; ?>" name="txt_password_<?php echo $dynamicId; ?>" />
											<br />
											<span class="span-description" style="<?php echo $cb_button_set_txt_description;?>" id="txt_description_<?php echo $dynamicId; ?>"><?php echo $description_password; ?></span>
										</div>
									</div>
									<?php
								break;
							}
						}
					?>
					<div class="layout-control-group">
						<input  class="btn btn-info layout-span2" type="submit" id="submit_button" name="submit_button"  value="<?php _e("Submit Form", contact_bank); ?>" /></td>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
var file_uploaded_path = "";
function CuteWebUI_AjaxUploader_OnTaskComplete(task)
{
	file_uploaded_path += task.FileName +",";
}
var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
jQuery(".hovertip").tooltip();
var form_id = <?php echo $form_id ;?>;
jQuery("#ux_contact_form_submit").validate
({
	rules: 
	{
		<?php
			$required_controls = $wpdb->get_results
			(
				$wpdb->prepare
				(
					"SELECT ".create_control_Table().".field_id, ".create_control_Table().".column_dynamicId, ".contact_bank_dynamic_settings_form().".dynamic_settings_key, ".contact_bank_dynamic_settings_form().".dynamic_settings_value FROM ".create_control_Table(). " JOIN ".contact_bank_dynamic_settings_form()." ON ".create_control_Table().".column_dynamicId = ".contact_bank_dynamic_settings_form().".dynamicId WHERE ".create_control_Table().".form_id = %d AND ".contact_bank_dynamic_settings_form().".dynamic_settings_key = %s" ,
					$form_id,
					"cb_control_required"
				)
			);
			$dynamic = "";
			$dynamicId = "";
			for($flag9 = 0;$flag9<count($required_controls);$flag9++)
			{
				$dynamicId1 = $required_controls[$flag9]->column_dynamicId;
				$dynamicId = $dynamicId1;
				$controls = $required_controls[$flag9]->field_id;
				switch($required_controls[$flag9]->field_id) 
				{
					case 1:
						if($required_controls[$flag9]->dynamic_settings_value == 1)
						{
							$dynamic .= "txt_".$dynamicId1. ':{ required :true }';
						}
						break;
					case 2:
						if($required_controls[$flag9]->dynamic_settings_value == 1)
						{
							$dynamic .= "textarea_".$dynamicId1. ':{ required :true }';
						}
					break;
					case 3:
						if($required_controls[$flag9]->dynamic_settings_value == 1)
						{
							$dynamic .= "email_".$dynamicId1. ':{ required :true,email :true }';
						}
					break;
					case 4:
						if($required_controls[$flag9]->dynamic_settings_value == 1)
						{
							$dynamic .= "select_".$dynamicId1. ':{ required: true}';
						}
					break;
					case 5:
						if($required_controls[$flag9]->dynamic_settings_value == 1)
						{
							$dynamic .= "'".$dynamicId1."_chk[]'". ':{ required :true }';
						}
					break;
					case 6:
						if($required_controls[$flag9]->dynamic_settings_value == 1)
						{
							$dynamic .= "radio_".$dynamicId1. ':{ required :true }';
						}
					break;
					case 9:
						if($required_controls[$flag9]->dynamic_settings_value == 1)
						{
							$dynamic .= "file_upload_".$dynamicId1. ':{ required :true }';
						}
					break;
					case 12:
						if($required_controls[$flag9]->dynamic_settings_value == 1)
						{
							$dynamic .= "select_day_".$dynamicId1.':{ required : true},';
							$dynamic .= "select_month_".$dynamicId1.':{ required : true},';
							$dynamic .= "select_year_".$dynamicId1.':{ required :true}';
						}
					break;
					case 13:
						if($required_controls[$flag9]->dynamic_settings_value == 1)
						{
							$dynamic .= "select_hr_".$dynamicId1.':{ required :true },';
							$dynamic .= "select_min_".$dynamicId1.':{ required :true}';
						}
					break;
					case 14:
						if($required_controls[$flag9]->dynamic_settings_value == 1)
						{
							$dynamic .= "hidden_".$dynamicId1. ':{ required :true }';
						}
					break;
					case 15:
						if($required_controls[$flag9]->dynamic_settings_value == 1)
						{
							$dynamic .= "txt_password_".$dynamicId1. ':{ required :true }';
						}
					break;
				}
				if( count($required_controls)> 1 && $flag9 < count($required_controls) - 1 && $required_controls[$flag9]->dynamic_settings_value == 1 )
				{
					$dynamic .= ",";
				}
			}
			echo $dynamic;
		?>
	},
	errorPlacement: function(error, element)
	{
		if (element.attr('type') === 'radio') 
		{
			var dynamicId_str_radio = element.attr('name');
			var dynamicId_radio = dynamicId_str_radio.split("_")[1];
			error.insertAfter(jQuery("#add_radio_options_here_"+dynamicId_radio));
		}
		else if(element.attr('type') === 'checkbox') 
		{
			var dynamicId_str_chk = element.attr('name');
			var dynamicId_chk = dynamicId_str_chk.split("_")[0];
			error.insertAfter(jQuery("#add_chk_options_here_"+dynamicId_chk));
		}
		else if(element.attr('type') === 'select') 
		{
			
			var dynamicId_str_select = element.attr('name');
			var dynamicId_select = dynamicId_str_select.split("_")[2];
			var ux_date_error_msg = jQuery("#ux_date_error_msg_"+dynamicId_select).val();
			jQuery("#error_message_date_"+dynamicId_select).empty();
			if(ux_date_error_msg != "")
			{
				jQuery("#error_message_date_"+dynamicId_select).html(ux_date_error_msg);
			}
			else
			{
				error.appendTo(jQuery("#error_message_date_"+dynamicId_select));
			}
			
		}
		else if(element.attr('type') === 'select_time') 
		{
			var dynamicId_str_time = element.attr('name');
			var dynamicId_time = dynamicId_str_time.split("_")[2];
			jQuery("#error_message_time_"+dynamicId_time).empty();
			error.appendTo(jQuery("#error_message_time_"+dynamicId_time));
		}
		else if(element.attr('type') === 'dropdown') 
		{
			var dynamicId_str_dropdown = element.attr('name');
			var dynamicId_dropdown = dynamicId_str_dropdown.split("_")[1];
			jQuery("#error_message_dropdown_"+dynamicId_dropdown).empty();
			error.appendTo(jQuery("#error_message_dropdown_"+dynamicId_dropdown));
		}
		else
		{
			error.insertBefore(element.parent().children("br"));
		}
	},
	submitHandler: function(form)
	{
		
		var form_id = <?php echo $form_id ;?>;
		jQuery.post(ajaxurl, jQuery(form).serialize() +"&form_id="+form_id+"&file_uploaded_path="+file_uploaded_path+"&param=frontend_submit_controls&action=frontend_contact_form_library", function(data) 
		{
			var submit_id = data;
			jQuery.post(ajaxurl, "form_id="+form_id+"&submit_id="+submit_id+"&param=email_management&action=email_management_contact_form_library", function(data) 
			{
				window.location.reload();
			});
		});
	}
});
function OnlyNumbers(e) ///////////////////////////////////allow only digits
{
	var regex = new RegExp("^[0-9 .\b]*$");
	var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
	if (regex.test(str)) {
	return true;
	}
	e.preventDefault();
	return false;
}
function alpha_num_digits(e,dynamicId) ///////////////////allow spaces and  only alpha,alphanumeric,digits
{
	var regex = new RegExp("^[a-zA-Z0-9 .@\b]*$");
	var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
	if (regex.test(str)) {
	return true;
	}
	e.preventDefault();
	return false;
}
function alpha(e,dynamicId) ///////////////////////////////only alpha
{
	var regex = new RegExp("^[a-zA-Z @\b]+$");
	var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
	if (regex.test(str)) {
	return true;
	}
	e.preventDefault();
	return false;
}
function alphanumeric(e,dynamicId) ///////////////////only alpha and alphanumeric
{
	var regex = new RegExp("^[a-zA-Z0-9 @\b]+$");
	var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
	if (regex.test(str)) {
	return true;
	}
	e.preventDefault();
	return false;
}
function strip_tags(e,field_id,dynamicId)
{
	switch(field_id)
	{
		case 1 :
			var txtbox_id =	jQuery("#txt_"+dynamicId).val();
			var  text_strip =  txtbox_id.replace(/<\/?[^>]+>/gi, '');
			jQuery("#txt_"+dynamicId).val(text_strip);
		break;
		case 2 :
			var txtbox_id =	jQuery("#textarea_"+dynamicId).val();
			var  text_strip =  txtbox_id.replace(/<\/?[^>]+>/gi, '');
			jQuery("#textarea_"+dynamicId).val(text_strip);
		break;
		case 3 :
			var txtbox_id =	jQuery("#email_"+dynamicId).val();
			var  text_strip =  txtbox_id.replace(/<\/?[^>]+>/gi, '');
			jQuery("#email_"+dynamicId).val(text_strip);
		break;
		case 15 :
			var txtbox_id =	jQuery("#txt_password_"+dynamicId).val();
			var  text_strip =  txtbox_id.replace(/<\/?[^>]+>/gi, '');
			jQuery("#txt_password_"+dynamicId).val(text_strip);
		break;
	}
}
function trim(dynamicId,field_id)
{
	switch(field_id)
	{
		case 1:
		var textbox_value =jQuery("#txt_"+dynamicId).val();
		textbox_value = textbox_value.replace(/ +(?= )/g,'');
		jQuery("#txt_"+dynamicId).val(textbox_value);
		break;
		case 2:
		var textarea_value =jQuery("#textarea_"+dynamicId).val();
		textarea_value = textarea_value.replace(/ +(?= )/g,'');
		jQuery("#textarea_"+dynamicId).val(textarea_value);
		break;
	}
}
</script>