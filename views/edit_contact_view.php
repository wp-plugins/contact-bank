<?php 
global $wpdb;
$form_id = intval($_REQUEST["id"]);
$form_content = $wpdb->get_row
(
	$wpdb->prepare
	(
		"SELECT form_name,success_message,chk_url,redirect_url FROM " .contact_bank_contact_form()." WHERE form_id = %d",
		$form_id
	)
);
$fields = $wpdb->get_results
(
	$wpdb->prepare
	(
		"SELECT * FROM " .create_control_Table()."  WHERE form_id = %d ORDER BY " .create_control_Table().".sorting_order",
		$form_id
	)
);
?>
<form id="ux_dynamic_form_submit" class="layout-form">
	<div class="fluid-layout">
		<div class="layout-span12">
			<div class="widget-layout">
				<div class="widget-layout-title">
					<h4><?php _e( "Edit Existing Form", contact_bank ); ?></h4>
				</div>
				<div class="widget-layout-body">
					<a class="btn btn-info" href="admin.php?page=dashboard"><?php _e("Back to Dashboard", contact_bank);?></a>
					<div class="separator-doubled"></div>
					<div id="update_form_success_message" class="message green" style="display: none;">
						<span>
							<strong><?php _e("Form Updated. Kindly wait for the redirect.", contact_bank); ?></strong>
						</span>
					</div>
					<div class="fluid-layout">
						<div class="layout-span9">
							<div class="widget-layout">
								<div class="widget-layout-title">
									<h4><?php _e( "Edit Form", contact_bank ); ?></h4>
								</div>
								<div class="widget-layout-body">
									<div class="layout-control-group div_border" style="border: 1px dashed #B6B4B4;padding: 5px;cursor: default" id="div_100">
										<label class="layout-control-label"><?php _e('Form Name :', contact_bank);?> </label>
										<span style="display: block" class="error">*</span>
										<div class="layout-controls hovertip" id="show_tooltip100">
											<input type="text" name="ux_txt_form_name" class="layout-span7"  value ="<?php echo $form_content->form_name;?>" id="ux_txt_form_name" placeholder="<?php _e( "Enter Form Name", contact_bank);?>" />
										</div>
									</div>
									<div class="layout-control-group div_border" style="border: 1px dashed #B6B4B4;padding: 5px;cursor: default">
										<label class="layout-control-label"><?php _e('Success Message :', contact_bank);?> </label>
										<span style="display: block" class="error">*</span>
										<div class="layout-controls hovertip" id="show_tooltip100">
											<input type="text" name="ux_txt_sucess_message" class="layout-span7" value ="<?php echo $form_content->success_message;?>" id="ux_txt_sucess_message" placeholder="<?php _e( "Enter Success Message", contact_bank);?>" />
										</div>
									</div>
									<?php
									if($form_content->chk_url == 1)
									{
										?>
										<div class="layout-control-group div_border" style="border: 1px dashed #B6B4B4;padding: 5px;cursor: default">
											<label class="layout-control-label"><?php _e('Redirect URL :', contact_bank);?> </label>
											<div class="layout-controls hovertip" id="show_tooltip100">
												<input type="checkbox"  id="ux_chk_redirect_url" name="ux_chk_redirect_url" checked="checked" value="1" onclick="show_url_control();" style="margin-top: 8px;" />
											</div>
										</div>
										<?php
									}
									else {
										?>
										<div class="layout-control-group div_border" style="border: 1px dashed #B6B4B4;padding: 5px;cursor: default">
											<label class="layout-control-label"><?php _e('Redirect URL :', contact_bank);?> </label>
											<div class="layout-controls hovertip" id="show_tooltip100">
												<input type="checkbox"  id="ux_chk_redirect_url" name="ux_chk_redirect_url" value="0" onclick="show_url_control();" style="margin-top: 8px;" />
											</div>
										</div>
										<?php
									}
									?>
									
									<div class="layout-control-group div_border" id="div_url" style="border: 1px dashed #B6B4B4;padding: 5px;cursor: default;display: none;" >
										<label class="layout-control-label"><?php _e('URL :', contact_bank);?> </label>
										<span style="display: block" class="error">*</span>
										<div class="layout-controls hovertip" id="show_tooltip100">
											<input type="text" name="ux_txt_redirect_url" class="layout-span7" value ="<?php echo $form_content->redirect_url;?>" id="ux_txt_redirect_url" placeholder="<?php _e( "Enter Redirect URL", contact_bank);?>" />
										</div>
									</div>
									
										<div class="layout-control-group div_border" id="div_1_1" style="display: none;">
											<label class="layout-control-label" id="control_label_"><?php _e("Untitled", contact_bank); ?> : </label>
											<span id="txt_required_" class="error">*</span>
											<div class="layout-controls hovertip" id="show_tooltip">
												<input class="layout-span7" type="text" id="ux_txt_textbox_control_" name="ux_txt_textbox_control_" />
												<a class="btn btn-info inline" id="add_setting_control_" href="#setting_controls_postback"  ><?php _e( "Settings", contact_bank ); ?></a>
												<a style="cursor:pointer;" id="anchor_del_" >
													<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px" />
												</a>
												<br />
												<span class="span-description" id="txt_description_"></span>
											</div>
										</div>
										<div class="layout-control-group div_border" id="div_2_2" style="display: none;">
											<label class="layout-control-label" id="control_label_"><?php _e("Untitled", contact_bank); ?> : </label>
											<span id="txt_required_" class="error">*</span>
											<div class="layout-controls hovertip" id="show_tooltip">
												<textarea type="textarea" class="layout-span7"  id="ux_textarea_control_" name="ux_textarea_control_" ></textarea>
												<a class="btn btn-info inline" id="add_setting_control_" href="#setting_controls_postback"  ><?php _e( "Settings", contact_bank ); ?></a>
												<a style="cursor:pointer;"  id="anchor_del_" >
													<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px"/>
												</a>
												<br />
												<span class="span-description" id="txt_description_"></span>
											</div>
										</div>
										<div class="layout-control-group div_border" id="div_3_3" style="display: none;">
											<label class="layout-control-label" id="control_label_" ><?php _e("Email", contact_bank); ?> : </label>
											<span style="display: block" id="txt_required_"  class="error">*</span>
											<div class="layout-controls hovertip" id="show_tooltip">		
												<input class=" layout-span7" type="text" id="ux_txt_email_" name="ux_txt_email_" />
												<a class="btn btn-info inline"  id="add_setting_control_" href="#setting_controls_postback"  ><?php _e( "Settings", contact_bank ); ?></a>	
												<a style="cursor:pointer;" id="anchor_del_" >
													<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px" />
												</a>
												<br />
												<span class="span-description"  id="txt_description_"></span> 
											</div>
										</div>
										<div class="layout-control-group div_border" id="div_4_4" style="display: none;">
											<label class="layout-control-label" id="control_label_" ><?php _e("Untitled", contact_bank); ?> :</label>
											<span id="txt_required_"  class="error">*</span>
											<div class="layout-controls hovertip" id="show_tooltip">
												<select type="select" class="layout-span7" id="ux_ddl_select_control" name="ux_ddl_select_control">
													<option value="0"><?php _e("Select option",contact_bank);?></option>
												</select>
												<a class="btn btn-info inline"  href="#setting_controls_postback" id="add_setting_control_" ><?php _e( "Settings", contact_bank); ?></a>	
												<a style="cursor:pointer;" id="anchor_del_">
													<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px" />
												</a>
											</div>
										</div>
										<div class="layout-control-group div_border" id="div_5_5" style="display: none;"> 
											<label class="layout-control-label" id="control_label_" ><?php _e("Untitled", contact_bank); ?> : </label>
											<span id="txt_required_"  class="error">*</span>
											<div class="layout-controls hovertip" id="post_back_checkbox_">
												<div id="show_tooltip">
													<input type="checkbox"  id="ux_chk_checkbox_control_" name="ux_chk_checkbox_control_" />
													<span id="add_chk_options_here_" ></span>
													<a class="btn btn-info inline" href="#setting_controls_postback"  id="add_setting_control_" ><?php _e( "Settings", contact_bank); ?></a>	
													<a style="cursor:pointer;" id="anchor_del_" >
														<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px"/>
													</a>
												</div>
											</div>
										</div>
										<div class="layout-control-group div_border" id="div_6_6" style="display: none;">
											<label class="layout-control-label" id="control_label_" ><?php _e('Untitled', contact_bank); ?> : </label>
											<span id="txt_required_"  class="error">*</span>
											<div class="layout-controls hovertip" id="post_back_radio_button_">
												<div id="show_tooltip">
													<input type="radio" id="ux_radio_button_control_" name="ux_radio_button_control_" />
													<span  id="add_radio_options_here_" ></span>
													<a class="btn btn-info inline"  id="add_setting_control_" href="#setting_controls_postback"  ><?php _e( "Settings", contact_bank); ?></a>	
													<a style="cursor:pointer;"  id="anchor_del_" >
													<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px"/></a> 
												</div>
											</div>
										</div>
										<div class="layout-control-group div_border file_upload" id="div_9_9" style="display: none;">
											<label class="layout-control-label" id="control_label_" ><?php _e("File Upload", contact_bank); ?> : </label>
											<span id="txt_required_"  class="error">*</span>
											<div class="layout-controls"  id="show_tooltip">
												<a class="btn btn-info inline"  id="add_setting_control_" href="#setting_controls_postback"  ><?php _e( "Settings", contact_bank ); ?></a>	
													<a style="cursor:pointer;" class="delete_control" id="anchor_del_" >
														<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;vertical-align: middle;"/>
													</a>
												<label class="layout-controls hovertip" id="tip" style="margin-left:-75%;">
												<div id="file_upload_content" style="float:left;width:357px;">
													<?php 
													include_once CONTACT_BK_PLUGIN_DIR ."/phpfileuploader/phpuploader/include_phpuploader.php";
													$uploader=new PhpUploader();
													$uploader->MultipleFilesUpload=false;
													$uploader->InsertText = "Please choose Files";
													$uploader->MaxSizeKB = 1024;
													$uploader->AllowedFileExtensions = "*.jpg,*.png,*.gif,*.bmp,*.txt,*.zip,*.rar";
													$uploader->SaveDirectory= CONTACT_BK_PLUGIN_DIR ."/phpfileuploader/savefiles/";
													$uploader->FlashUploadMode = "Partial";
													$uploader->Render();
													?>
												</div>
												<div id="file_upload_content_postback" style="display:none;float:left;width:357px;">
												</div>
												</label>
												<br />
												<span class="span-description" id="txt_description_"></span>
											</div>
										</div>
										<div class="layout-control-group div_border" id="div_12_12" style="display: none;">
											<label class="layout-control-label" id="control_label_" ><?php _e("Date", contact_bank); ?> : </label>
											<span id="txt_required_"  class="error">*</span>
												<div class="layout-controls hovertip" id="show_tooltip">	
													<select class="layout-span2" type="day" id="ux_ddl_select_day_" name="ux_ddl_select_day_" >
														<option value="0"><?php _e("Day", contact_bank); ?></option>
														<?php
														for($flag=1; $flag <= 31; $flag++)
														{
															if($flag < 10)
															{
																?>
																<option value=<?php echo $flag; ?>>0<?php echo $flag; ?></option>
																<?php
															}
															else
															{
																?>
																<option value=<?php echo $flag; ?>><?php echo $flag; ?></option>
																<?php
															}
														}
														?>
													</select>
													<select class="layout-span3" type="month" id="ux_ddl_select_month_" name="ux_ddl_select_month_">
														<option value="0"><?php _e("Month", contact_bank); ?></option>
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
													<select class="layout-span2" type="year" id="ux_ddl_select_year_" name="ux_ddl_select_year_">
														<option value="0"><?php _e("Year", contact_bank); ?></option>
														<?php
														for($flag=1900; $flag <= 2100; $flag++)
														{
															?>
															<option value=<?php echo $flag; ?>><?php echo $flag; ?></option>
															<?php
														}
														?>
													</select>
													<script type="text/javascript">
														jQuery("#ux_ddl_select_day_<?php echo $dynamicId; ?>").val(<?php echo date("d"); ?> );
														jQuery("#ux_ddl_select_month_<?php echo $dynamicId; ?>").val(<?php echo date("m"); ?> );
														jQuery("#ux_ddl_select_year_<?php echo $dynamicId; ?>").val(<?php echo date("Y"); ?> );
													</script>
														<a class="btn btn-info inline"   href="#setting_controls_postback" id="add_setting_control_"><?php _e( "Settings", contact_bank ); ?></a>
														<a style="cursor:pointer;" id="anchor_del_" >
															<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px"/>
														</a>
														<br />
														<span class="span-description" id="txt_description_"></span>
												</div>
											</div>
											<div class="layout-control-group div_border"  id="div_13_13" style="display: none;">
												<label class="layout-control-label" id="control_label_" ><?php _e("Time", contact_bank); ?> : </label>
												<span id="txt_required_"  class="error">*</span>
													<div class="layout-controls hovertip" id="show_tooltip">
														<select class="layout-span2" type="hour12" id="ux_ddl_select_hr_12_" name="ux_ddl_select_hr_12_">";
															<option selected="selected" value=""><?php _e("Hour", contact_bank); ?></option>
															<?php
															for($flag=1; $flag <= 12; $flag++)
															{
																if($flag < 10)
																{
																?>
																<option value="0<?php echo $flag ?>">0<?php echo $flag ?></option>
																<?php
																}
																else
																{
																?>		
																<option value="<?php echo $flag; ?>"><?php echo $flag ?></option>
																<?php	
																}
															}
															?>
														</select>
														<select style="display: none;" class="layout-span3" type="hour24" id="ux_ddl_select_hr_24_" name="ux_ddl_select_hr_24_">";
															<option selected="selected" value=""><?php _e("Hour", contact_bank); ?></option>
															<?php
															for($flag=1; $flag <= 24; $flag++)
															{
																if($flag < 10)
																{
																?>
																<option value="0<?php echo $flag ?>">0<?php echo $flag ?></option>
																<?php
																}
																else
																{
																?>		
																<option value="<?php echo $flag; ?>"><?php echo $flag ?></option>
																<?php	
																}
															}
															?>
														</select>
														<select class="hovertip layout-span3" type="minute" id="ux_ddl_select_minute_" name="ux_ddl_select_minute_">
															<option selected="selected" value=""><?php _e("Minute", contact_bank); ?></option>
															<?php
															for($flag=0; $flag <= 59; $flag++)
															{
																if($flag < 10)
																{
																?>
																<option value="0<?php echo $flag ?>">0<?php echo $flag ?></option>
																<?php	
																}
																else
																{
																?>
																<option value="<?php echo $flag ?>"><?php echo $flag ?></option>
																<?php
																}
															}
															?>
														</select>
														<select class="hovertip layout-span2" type="am" id="ux_ddl_select_ampm_" name="ux_ddl_select_ampm_">
															<option value="0">AM</option>
															<option value="1">PM</option>
														</select>
														<a class="btn btn-info inline"  id="add_setting_control_"  href="#setting_controls_postback" ><?php _e( "Settings", contact_bank ); ?></a>	
														<a style="cursor:pointer;" id="anchor_del_" >
															<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px"/>
														</a> 
														<br />
														<span class="span-description" id="txt_description_"></span>
													</div>
											</div>
											<div class="layout-control-group div_border" id="div_14_14" style="display: none;">
												<label class="layout-control-label" id="control_label_" ><?php _e("Untitled (hidden)", contact_bank); ?> :</label>
												<span id="txt_required_"  class="error">*</span>
												<div class="layout-controls" id="show_tooltip">	
													<input class="hovertip layout-span7" data-original-title="<?php _e( "Hidden", contact_bank ); ?>" type="text" id="ux_txt_hidden_control_" name="ux_txt_hidden_control_" />
													<a class="btn btn-info inline" id="add_setting_control_"   href="#setting_controls_postback"  ><?php _e( "Settings", contact_bank ); ?></a>	
													<a style="cursor:pointer;" id=anchor_del_ >
												 		<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px"/>
												 	</a>
												 	<br />
													<span class="span-description" id="txt_description_"></span> 
												</div>
											</div>
											<div class="layout-control-group div_border" id="div_15_15" style="display: none;">
												<label class="layout-control-label" id="control_label_" ><?php _e("Password", contact_bank); ?> : </label>
												<span id="txt_required_"  class="error">*</span>
												<div class="layout-controls hovertip" id="show_tooltip">
													<input class=" layout-span7"  type="password" id="ux_txt_password_control_" name="ux_txt_password_control_" />
													<a class="btn btn-info inline"  id="add_setting_control_" href="#setting_controls_postback"><?php _e( "Settings", contact_bank ); ?></a>
													<a style="cursor:pointer;" id="anchor_del_" >
														<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px" />
													</a>
													<br />
													<span class="span-description" id="txt_description_"></span>
												</div>
											</div>
										<div id="left_block">
										</div>
									<?php 
										for($flag=0;$flag<count($fields);$flag++)
										{
											$field_type = $fields[$flag]->field_id;
											$column_dynamicId = $fields[$flag]->column_dynamicId;
											$fields_dynamic_controls = $wpdb->get_results
											(
												$wpdb->prepare
												(
													"SELECT * FROM " .contact_bank_dynamic_settings_form().  " JOIN " .create_control_Table()." ON " .create_control_Table().".column_dynamicId = " .contact_bank_dynamic_settings_form().  ".dynamicId  WHERE " .contact_bank_dynamic_settings_form().".dynamicId = %d AND " .create_control_Table().".form_id = %d ORDER BY dynamic_settings_id ASC",
													$column_dynamicId,
													$form_id
												)
											);
											?>
											
											<script type="text/javascript"> 
												jQuery(function()
												{
													edit_control_dynamic_ids.push(<?php echo $column_dynamicId ; ?>);
													create_control(<?php echo $field_type ;?>,<?php echo $column_dynamicId ; ?>,<?php echo json_encode($fields_dynamic_controls); ?>);
												});
											</script>
											<?php
										}
									?>
									<div id="left_block">
									</div>
								</div>
							</div>
							<div class="layout-control-group">
								<input  class="btn btn-info layout-span2" type="submit" id="submit_button" name="submit_button"  value="<?php _e("Save", contact_bank); ?>" /></td>
							</div>
						</div>
						<div class="layout-span3">
							<div class="widget-layout">
								<div class="widget-layout-title">
									<h4><?php _e( "Control Buttons", contact_bank ); ?></h4>
								</div>
								<div class="widget-layout-body connectedSortable">
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_textbox" name="btn_textbox" value="<?php _e("Text Box", contact_bank); ?>"  onclick="create_control(1);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12"  type="button" id="btn_textarea" name="btn_textarea" value="<?php _e("Text Area", contact_bank); ?>"  onclick="create_control(2);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_email" name="btn_email" value="<?php _e("Email Address", contact_bank); ?>"  onclick="create_control(3);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_dropdown" name="btn_dropdown" value="<?php _e("Dropdown Menu", contact_bank); ?>"  onclick="create_control(4);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_checkbox" name="btn_checkbox" value="<?php _e("Checkboxes", contact_bank); ?>"  onclick="create_control(5);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_multiple" name="btn_multiple" value="<?php _e("Multiple Choice", contact_bank); ?>"  onclick="create_control(6);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_file_upload" name="btn_file_upload" value="<?php _e("File Upload", contact_bank); ?>" onclick="create_control(9);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_date" name="btn_date" value="<?php _e("Date", contact_bank); ?>" onclick="create_control(12);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_time" name="btn_time" value="<?php _e("Time", contact_bank); ?>" onclick="create_control(13);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_hidden" name="btn_hidden" value="<?php _e("Hidden", contact_bank); ?>" onclick="create_control(14);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_Password" name="btn_Password" value="<?php _e("Password", contact_bank); ?>" onclick="create_control(15);" />
									</div>
									<input type="hidden" id="hidden_dynamic_id" name="hidden_dynamic_id" />
									<input type="hidden" id="hidden_div_id" name="hidden_div_id" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
var existing_array_control_types = [];
array_controls = [];
var array_dynamicCount = [];
var new_control_dynamic_ids = [];
var created_control_type = [];
var edit_control_dynamic_ids = [];//Array declare to store new ccreated control id on Edit Form 
var edit_created_control_type = [];//Array declare to store control id on Edit Form 
array_option_id_chk = [];// Array to store advance-dynamic-Ids of dynamic options of checkbox control.
array_options_chk = [];// Array to store values of dynamic options of checkbox control.
array_option_id_radio = [];// Array to store advance-dynamic-Ids of dynamic options of multiple control.
array_options_radio = [];// Array to store values of dynamic options of multiple control.
array_option_id_dropdown = [];// Array to store advance-dynamic-Ids of dynamic options of dropdown control.
array_options_dropdown = [];// Array to store values of dynamic options of dropdown control.
delete_control_dynamicIds = [];// Array to store dynamicids of controls to be deleted.
var dynamicCount = 0;	
jQuery(document).ready(function()
{
	field_order = [];
	field_dynamic_id = [];
	jQuery("#left_block").sortable
	({
		opacity: 0.6,
		cursor: 'move',
		update: function()
		{
			var order = jQuery("#left_block").sortable('toArray');
			
			for(flag=0;flag<order.length;flag++)
			{
				var field_order_str = order[flag].split("div_");
				field_order.push(field_order_str[1].split("_")[1]);
				field_dynamic_id.push(field_order_str[1].split("_")[0]);
			}
		}
	});
	var divWhiteContent = jQuery("<div class=\"white_content\" id=\"setting_controls_postback\"></div>");
	jQuery('#wpwrap').append(divWhiteContent);
	var divblackOverlay = jQuery("<div class=\"black_overlay\" id=\"fade\"></div>");
	jQuery('#wpwrap').append(divblackOverlay);
	jQuery(window).resize(function() 
	{
		var windowHeight =  jQuery(window).height() - 200;
		var windowWidth =  jQuery(window).width() - 200;
		var lightboxHeight = jQuery("#setting_controls_postback").height();
		var lightboxWidth = jQuery("#setting_controls_postback").width();
		var proposedTop =  (jQuery(window).height() - lightboxHeight - 40) / 2 ;
		var proposedLeft =  (jQuery(window).width() - lightboxWidth - 40) / 2 ;
		jQuery("#setting_controls_postback").css('top',proposedTop + 'px');
		jQuery("#setting_controls_postback").css('left',proposedLeft + 'px');
	});
	show_url_control();
});

//var dynamicId = edit_control_dynamic_ids.length + 1;
/* Function Name : create_control
 * Paramters : control_type
 * Return : None
 * Description : This Function is used to generate Dynamic Id for all new created controls and check which request type of created control and call the create_control_div function.
 * Created in Version 1.0 
 * Last Modified : 1.0
 * Reasons for change : None
 */ 

var new_file_upload = "";
function create_control(control_type,dynamicId,arrayControl)
{
	if(control_type == 9)
	{	
		if(jQuery.inArray(9,created_control_type) != -1  || jQuery.inArray(9,existing_array_control_types) != -1)
		{
			alert("<?php _e( "Only One File Uploader can be used on a Form. ", contact_bank ); ?>");
			return;					
		}
	}
	
	dynamicCount++;
	array_controls[dynamicCount] = [];
	if(dynamicId == undefined)
	{
		var dynamicId = Math.floor((Math.random()*100000)+1);
		array_dynamicCount.push(dynamicCount);
	}
	else
	{
		existing_array_control_types.push(control_type);
		edit_created_control_type.push(dynamicCount);
	}
	
	switch(parseInt(control_type))
	{
		case 1:
		
			jQuery("#div_1_1").clone(false).attr("id","div_"+dynamicId+"_1").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_1").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_1").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_1").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("input[type='text']").attr("id","ux_txt_textbox_control_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId ).children("input[type='text']").attr("name","ux_txt_textbox_control_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+",1,"+JSON.stringify(arrayControl)+","+dynamicCount+")");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_1,"+dynamicId+",1)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_1").attr("style","display:block");
			jQuery(".hovertip").tooltip();
			
			var result = jQuery.inArray(dynamicId,edit_control_dynamic_ids);
			if(result == -1)
			{
				new_control_dynamic_ids.push(dynamicId);
				created_control_type.push(1);
				jQuery.each(new_control_dynamic_ids,function(index,value)
				{
				   jQuery('#left_block').append(jQuery("#div_"+value+"_"+created_control_type[index]));
				});
			}
			
			if(arrayControl != undefined)
			{
				jQuery("#control_label_"+dynamicId).html(arrayControl[0].dynamic_settings_value);
				jQuery("#txt_description_"+dynamicId).html(arrayControl[1].dynamic_settings_value);
				
				jQuery("#ux_txt_textbox_control_"+dynamicId).val(arrayControl[4].dynamic_settings_value);
				jQuery("#show_tooltip"+dynamicId).attr("data-original-title",arrayControl[3].dynamic_settings_value);				
				arrayControl[2].dynamic_settings_value == "1" ? jQuery("#txt_required_"+dynamicId).css("display","block") : jQuery("#txt_required_"+dynamicId).css("display","none");
			}
			
		break;
		case 2:
		
			jQuery("#div_2_2").clone(false).attr("id","div_"+dynamicId+"_2").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_2").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_2").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_2").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("textarea[type='textarea']").attr("id","ux_textarea_control_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId ).children("textarea[type='textarea']").attr("name","ux_textarea_control_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+",2,"+JSON.stringify(arrayControl)+","+dynamicCount+")");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_2,"+dynamicId+",2)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_2").attr("style","display:block");
			jQuery(".hovertip").tooltip();
			
			var result = jQuery.inArray(dynamicId, edit_control_dynamic_ids);
			if(result == -1)
			{
				new_control_dynamic_ids.push(dynamicId);
				created_control_type.push(2);
				jQuery.each(new_control_dynamic_ids,function(index,value)
				{
					jQuery('#left_block').append(jQuery("#div_"+value+"_"+created_control_type[index]));
				});
			}
			
			if(arrayControl != undefined)
			{		
				jQuery("#control_label_"+dynamicId).html( arrayControl[0].dynamic_settings_value);
				jQuery("#txt_description_"+dynamicId).html( arrayControl[1].dynamic_settings_value);
				jQuery("#ux_textarea_control_"+dynamicId).val( arrayControl[4].dynamic_settings_value);
				jQuery("#show_tooltip"+dynamicId).attr("data-original-title", arrayControl[3].dynamic_settings_value);
				arrayControl[2].dynamic_settings_value == "1" ? jQuery("#txt_required_"+dynamicId).css("display","block") :	jQuery("#txt_required_"+dynamicId).css("display","none");
			}
			
		break;
		case 3:
		
			jQuery("#div_3_3").clone(false).attr("id","div_"+dynamicId+"_3").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_3").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_3").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_3").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#div_"+dynamicId+"_3" ).children("input[type='text']").attr("id","ux_txt_email_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+",3,"+JSON.stringify(arrayControl)+","+dynamicCount+")");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_3,"+dynamicId+",3)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_3").attr("style","display:block");
			jQuery(".hovertip").tooltip();
			
			var result = jQuery.inArray(dynamicId, edit_control_dynamic_ids);
			if(result == -1)
			{
				new_control_dynamic_ids.push(dynamicId);
				created_control_type.push(3);
				jQuery.each(new_control_dynamic_ids,function(index,value)
				{
					jQuery('#left_block').append(jQuery("#div_"+value+"_"+created_control_type[index]));
				});
			}
			if(arrayControl != undefined)
			{			
				jQuery("#control_label_"+dynamicId).html(arrayControl[0].dynamic_settings_value +" :");
				jQuery("#txt_description_"+dynamicId).html(arrayControl[1].dynamic_settings_value);
				jQuery("#show_tooltip"+dynamicId).attr("data-original-title", arrayControl[3].dynamic_settings_value);
				
				arrayControl[2].dynamic_settings_value == "1" ? jQuery("#txt_required_"+dynamicId).css("display","block") : jQuery("#txt_required_"+dynamicId).css("display","none"); 
			}
			
		break;
		case 4:
		
			jQuery("#div_4_4").clone(false).attr("id","div_"+dynamicId+"_4").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_4").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_4").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_4").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("select[type='select']").attr("id","ux_ddl_select_control"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("select[type='select']").attr("name","ux_ddl_select_control"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+",4,"+JSON.stringify(arrayControl)+","+dynamicCount+")");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_4,"+dynamicId+",4)");
			jQuery("#div_"+dynamicId+"_4").attr("style","display:block");
			jQuery(".hovertip").tooltip();
			
			var result = jQuery.inArray(dynamicId, edit_control_dynamic_ids);
			if(result == -1)
			{
				new_control_dynamic_ids.push(dynamicId);
				created_control_type.push(4);
				jQuery.each(new_control_dynamic_ids,function(index,value)
				{
					jQuery('#left_block').append(jQuery("#div_"+value+"_"+created_control_type[index]));
				});
			}
			
			if(arrayControl != undefined)
			{
				jQuery("#show_tooltip"+dynamicId).attr("data-original-title",arrayControl[2].dynamic_settings_value);
				jQuery("#control_label_"+dynamicId).html(arrayControl[0].dynamic_settings_value +" :");
				if((arrayControl[3].dynamic_settings_value) != "")
				{
					var options_dynamicId_str = arrayControl[3].dynamic_settings_value;
					var options_dynamicId = options_dynamicId_str.split(";");
					
					var ddl_options_str = arrayControl[4].dynamic_settings_value;
					var ddl_option_value = ddl_options_str.split(";");
					
					for(var flag =0;flag <options_dynamicId.length;flag++)
					{
						var optionsId = options_dynamicId[flag];
						var ddl_options = ddl_option_value[flag];
						
						jQuery("#ux_ddl_select_control"+dynamicId).append('<option id="option_tr_'+optionsId+'" value='+ddl_options+'>'+ddl_options+'</option>');
					}
					jQuery("#option_tr_"+dynamicId).remove();
				}
				arrayControl[1].dynamic_settings_value == "1" ? jQuery("#txt_required_"+dynamicId).css("display","block") : jQuery("#txt_required_"+dynamicId).css("display","none");
			}
			
		break;
		case 5:
			jQuery("#div_5_5").clone(false).attr("id","div_"+dynamicId+"_5").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_5").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_5").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_5").children("div").attr("id","post_back_checkbox_"+dynamicId);
			jQuery("#post_back_checkbox_"+dynamicId).children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("input[type='checkbox']").attr("id","ux_chk_checkbox_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("input[type='checkbox']").attr("name","ux_chk_checkbox_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("span").attr("id","add_chk_options_here_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+",5,"+JSON.stringify(arrayControl)+","+dynamicCount+")");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_5,"+dynamicId+",5)");
			jQuery("#div_"+dynamicId+"_5").attr("style","display:block");
			jQuery(".hovertip").tooltip();
			
			var result = jQuery.inArray(dynamicId, edit_control_dynamic_ids);
			if(result == -1)
			{
				new_control_dynamic_ids.push(dynamicId);
				created_control_type.push(5);
				jQuery.each(new_control_dynamic_ids,function(index,value)
				{
					jQuery('#left_block').append(jQuery("#div_"+value+"_"+created_control_type[index]));
				});
			}
			
			if(arrayControl !=undefined)
			{
				jQuery("#post_back_checkbox_"+dynamicId).attr("data-original-title", arrayControl[2].dynamic_settings_value);
				jQuery("#control_label_"+dynamicId).html( arrayControl[0].dynamic_settings_value + " :");
				if(( arrayControl[3].dynamic_settings_value) != "")
				{
					var optionId_str =  arrayControl[3].dynamic_settings_value;
					var optionId = optionId_str.split(";");
					
					var option_value_str = arrayControl[4].dynamic_settings_value;
					var option_value = option_value_str.split(";");
					
					for(var flag = 0;flag <optionId.length ;flag++)
					{
						var options_dynamicId = optionId[flag];
						var add_chk_options = option_value[flag];
						
						jQuery("#add_chk_options_here_"+dynamicId).append('<span id="input_id_'+options_dynamicId+'"><input id="ux_chk_checkbox_control_'+options_dynamicId+'" name="ux_chk_checkbox_control_'+options_dynamicId+'" type="checkbox"/><label style="margin:0px 5px;" id="chk_id_'+options_dynamicId+'" >'+add_chk_options+'</label></span>');
					}
					jQuery("#ux_chk_checkbox_control_"+dynamicId).hide();
				}
				
				arrayControl[1].dynamic_settings_value == "1" ? jQuery("#txt_required_"+dynamicId).css("display","block") : jQuery("#txt_required_"+dynamicId).css("display","none");
			}
			
		break;
		case 6:
			jQuery("#div_6_6").clone(false).attr("id","div_"+dynamicId+"_6").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_6").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_6").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_6").children("div").attr("id","post_back_radio_button_"+dynamicId);
			jQuery("#post_back_radio_button_"+dynamicId).children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("input[type='radio']").attr("id","ux_radio_button_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("input[type='radio']").attr("name","ux_radio_button_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("span").attr("id","add_radio_options_here_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+",6,"+JSON.stringify(arrayControl)+","+dynamicCount+")");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_6,"+dynamicId+",6)");
			jQuery("#div_"+dynamicId+"_6").attr("style","display:block");
			jQuery(".hovertip").tooltip();
			
			var result = jQuery.inArray(dynamicId, edit_control_dynamic_ids);
			if(result == -1)
			{
				new_control_dynamic_ids.push(dynamicId);
				created_control_type.push(6);
				jQuery.each(new_control_dynamic_ids,function(index,value)
				{
					jQuery('#left_block').append(jQuery("#div_"+value+"_"+created_control_type[index]));
				});
			}
			
			if(arrayControl != undefined)
			{
				jQuery("#post_back_radio_button_"+dynamicId).attr("data-original-title",arrayControl[2].dynamic_settings_value);
				jQuery("#control_label_"+dynamicId).html( arrayControl[0].dynamic_settings_value + " :");
				if(( arrayControl[3].dynamic_settings_value) != "")
				{
					var options_dynamicId_str = arrayControl[3].dynamic_settings_value;
					var options_dynamicIds = options_dynamicId_str.split(";"); 
					var options_value_str = arrayControl[4].dynamic_settings_value;
					var options_value = options_value_str.split(";");
					for(var flag =0;flag <options_dynamicIds.length;flag++)
					{
						var options_dynamicId = options_dynamicIds[flag];
						var add_radio_options = options_value[flag];
						jQuery("#add_radio_options_here_"+dynamicId).append('<span class="hovertip" id="input_id_'+options_dynamicId+'"><input  name="radio" type="radio" id="add_radio_'+options_dynamicId+'" /><label style="margin:0px 5px;" id="add_radio_lab_'+options_dynamicId+'" >'+add_radio_options+'</label></span>');
					}
					jQuery("#ux_radio_button_control_"+dynamicId).hide();
				}
				
				arrayControl[1].dynamic_settings_value == "1" ? jQuery("#txt_required_"+dynamicId).css("display","block") : jQuery("#txt_required_"+dynamicId).css("display","none");
			}
			
		break;
		case 9:
				var oldId_file_upload = jQuery(".file_upload").attr("id");
				jQuery("#"+oldId_file_upload).appendTo("#left_block");
				jQuery("#"+oldId_file_upload).attr("style","display:block;");
				jQuery("#"+oldId_file_upload).attr("id","div_"+dynamicId+"_9");
				jQuery("#div_"+dynamicId+"_9").children("label.layout-control-label").attr("id","control_label_"+dynamicId);
				jQuery("#div_"+dynamicId+"_9").children("span").attr("id","txt_required_"+dynamicId);
				jQuery("#div_"+dynamicId+"_9").children("div").attr("id","show_tooltip"+dynamicId);
				jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
				jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+",9,"+JSON.stringify(arrayControl)+","+dynamicCount+")");
				jQuery("#show_tooltip"+dynamicId).children(".delete_control").attr("id","anchor_del_"+dynamicId);
				jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_9,"+dynamicId+",9)");
				jQuery("#show_tooltip"+dynamicId).children("label.hovertip").attr("id","tip"+dynamicId);
				jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
				jQuery("#div_"+dynamicId+"_9").attr("style","display:block");
				jQuery("#file_upload_content_postback").css('display','block');
				jQuery(".hovertip").tooltip();
				
				var result = jQuery.inArray(dynamicId, edit_control_dynamic_ids);
				if(result == -1)
				{
					new_control_dynamic_ids.push(dynamicId);
					created_control_type.push(9);
					jQuery.each(new_control_dynamic_ids,function(index,value)
					{
						jQuery('#left_block').append(jQuery("#div_"+value+"_"+created_control_type[index]));
					});
				}
				
				if(arrayControl != undefined)
				{
					jQuery("#control_label_"+dynamicId).html( arrayControl[0].dynamic_settings_value + " :");
					jQuery("#txt_description_"+dynamicId).html(arrayControl[1].dynamic_settings_value);
					jQuery("#tip"+dynamicId).attr("data-original-title", arrayControl[3].dynamic_settings_value);
				
					arrayControl[2].dynamic_settings_value == "1" ? jQuery("#txt_required_"+dynamicId).css("display","block") : jQuery("#txt_required_"+dynamicId).css("display","none");
					
					var ux_allow_multiple_file = arrayControl[6].dynamic_settings_value;
					var ux_allowed_file_extensions = arrayControl[7].dynamic_settings_value;
					var ux_maximum_file_allowed =  arrayControl[8].dynamic_settings_value;
					var ux_uploaded_file_email_db =  arrayControl[9].dynamic_settings_value;
					
					jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&ux_allow_multiple_file="+ux_allow_multiple_file+"&ux_allowed_file_extensions="+ux_allowed_file_extensions+
					"&ux_maximum_file_allowed="+ux_maximum_file_allowed+"&ux_uploaded_file_email_db="+ux_uploaded_file_email_db+"&param=ux_allow_multiple_file_upload&action=add_contact_form_library", function(data)
					{
						jQuery("#file_upload_content").remove();
						var dat = data;
						jQuery("#file_upload_content_postback").html(dat);
					});
				}
			
			
			
		break;
		case 12:
		
			jQuery("#div_12_12").clone(false).attr("id","div_"+dynamicId+"_12").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_12").children("label.layout-control-label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_12").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_12").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='day']").attr("id","ux_ddl_select_day_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='day']").attr("name","ux_ddl_select_day_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='month']").attr("id","ux_ddl_select_month_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='month']").attr("name","ux_ddl_select_month_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='year']").attr("id","ux_ddl_select_year_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='year']").attr("name","ux_ddl_select_year_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+",12,"+JSON.stringify(arrayControl)+","+dynamicCount+")");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_12,"+dynamicId+",12)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_12").attr("style","display:block");
			jQuery("#hidden_dynamic_id").val("div_"+dynamicId+"_12");
			jQuery(".hovertip").tooltip();
			
			var result = jQuery.inArray(dynamicId, edit_control_dynamic_ids);
			if(result == -1)
			{
				new_control_dynamic_ids.push(dynamicId);
				created_control_type.push(12);
				jQuery.each(new_control_dynamic_ids,function(index,value)
				{
					jQuery('#left_block').append(jQuery("#div_"+value+"_"+created_control_type[index]));
				});
			}
			if(arrayControl != undefined)
			{
				jQuery("#control_label_"+dynamicId).html( arrayControl[0].dynamic_settings_value + " :");
				jQuery("#txt_description_"+dynamicId).html( arrayControl[1].dynamic_settings_value);
				jQuery("#ux_ddl_select_day_"+dynamicId).val( arrayControl[8].dynamic_settings_value == "" ? "0" :  arrayControl[8].dynamic_settings_value);
				jQuery("#ux_ddl_select_month_"+dynamicId).val(arrayControl[9].dynamic_settings_value == "" ? "0" : arrayControl[9].dynamic_settings_value);
				jQuery("#show_tooltip"+dynamicId).attr("data-original-title", arrayControl[3].dynamic_settings_value);
			
				var start_year =  arrayControl[6].dynamic_settings_value;
				var end_year =  arrayControl[7].dynamic_settings_value;
				
				jQuery("#ux_ddl_select_year_"+dynamicId).empty();
				jQuery("#ux_ddl_select_year_"+dynamicId).html('<option value=0>Year</option>');
						
				for(flag11=start_year; flag11 <= end_year; flag11++)
				{
					jQuery("#ux_ddl_select_year_"+dynamicId).append('<option value='+flag11+'>'+flag11+'</option>');
				}
				jQuery("#ux_ddl_select_year_"+dynamicId).val( arrayControl[10].dynamic_settings_value);
				arrayControl[2].dynamic_settings_value == "1" ? jQuery("#txt_required_"+dynamicId).css("display","block") : jQuery("#txt_required_"+dynamicId).css("display","none");
			}
			else
			{
				jQuery("#ux_ddl_select_year_"+dynamicId).html('<option value=0>Year</option>');
				for(flag12=1900; flag12 <= 2100; flag12++)
				{
					jQuery("#ux_ddl_select_year_"+dynamicId).append('<option value='+flag12+'>'+flag12+'</option>');
				}
			}
			
		break;
		case 13:
			
			jQuery("#div_13_13").clone(false).attr("id","div_"+dynamicId+"_13").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_13").children("label.layout-control-label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_13").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_13").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='hour12']").attr("id","ux_ddl_select_hr_12_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='hour12']").attr("name","ux_ddl_select_hr_12_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='hour24']").attr("id","ux_ddl_select_hr_24_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='hour24']").attr("name","ux_ddl_select_hr_24_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='minute']").attr("id","ux_ddl_select_minute_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='minute']").attr("name","ux_ddl_select_minute_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='am']").attr("id","ux_ddl_select_ampm_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("select[type='am']").attr("name","ux_ddl_select_ampm_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+",13,"+JSON.stringify(arrayControl)+","+dynamicCount+")");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_13,"+dynamicId+",13)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_13").attr("style","display:block");
			jQuery("#hidden_dynamic_id").val("div_"+dynamicId+"_13");	
			jQuery("#ux_drop_hour_time_"+dynamicId).val("12");
			jQuery("#ux_ddl_select_hr_24_"+dynamicId).hide();
			
			jQuery(".hovertip").tooltip();
			
			var result = jQuery.inArray(dynamicId, edit_control_dynamic_ids);
			if(result == -1)
			{
				new_control_dynamic_ids.push(dynamicId);
				created_control_type.push(13);
				jQuery.each(new_control_dynamic_ids,function(index,value)
				{
					jQuery('#left_block').append(jQuery("#div_"+value+"_"+created_control_type[index]));
				});
			}
			
			if(arrayControl != undefined)
			{
				arrayControl[2].dynamic_settings_value == "1" ? jQuery("#txt_required_"+dynamicId).css("display","block") : jQuery("#txt_required_"+dynamicId).css("display","none");
				jQuery("#control_label_"+dynamicId).html( arrayControl[0].dynamic_settings_value + " :");
				jQuery("#txt_description_"+dynamicId).html(arrayControl[1].dynamic_settings_value);
				
				var minute_format = parseInt(arrayControl[10].dynamic_settings_value);
				var dropdown_min = "<option selected='selected' value=''>Minute</option>";
				for(flag=0; flag < 60;)
				{
					if(flag < 10)
					{
						dropdown_min += "<option  value=0"+flag+">0"+ flag + "</option>";
					}
					else
					{
						dropdown_min += "<option value="+flag+">"+ flag + "</option>";
					}
					flag = flag + minute_format;
				}
				if(arrayControl[6].dynamic_settings_value == "12")
				{
					jQuery("#ux_ddl_select_hr_24_"+dynamicId).hide();
					jQuery("#ux_ddl_select_hr_12_"+dynamicId).show();
					jQuery("#ux_ddl_select_ampm_"+dynamicId).show();
					jQuery("#ux_ddl_select_hr_12_"+dynamicId).val(arrayControl[7].dynamic_settings_value);	
				}
				else if(arrayControl[6].dynamic_settings_value == "24")
				{
					jQuery("#ux_ddl_select_hr_12_"+dynamicId).hide();
					jQuery("#ux_ddl_select_hr_24_"+dynamicId).show();
					jQuery("#ux_ddl_select_ampm_"+dynamicId).hide();
					jQuery("#ux_ddl_select_hr_24_"+dynamicId).val( arrayControl[7].dynamic_settings_value);
				}
				jQuery("#ux_ddl_select_minute_"+dynamicId).val( arrayControl[8].dynamic_settings_value);
				jQuery("#ux_ddl_select_ampm_"+dynamicId).val( arrayControl[9].dynamic_settings_value == "" ? "0" :  arrayControl[9].dynamic_settings_value);
				jQuery("#show_tooltip"+dynamicId).attr("data-original-title", arrayControl[3].dynamic_settings_value);
			}

		break;
		case 14:
		
			jQuery("#div_14_14").clone(false).attr("id","div_"+dynamicId+"_14").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_14").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_14").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_14").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("input[type='text']").attr("id","ux_txt_hidden_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("input[type='text']").attr("name","ux_txt_hidden_control_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+",14,"+JSON.stringify(arrayControl)+","+dynamicCount+")");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_14,"+dynamicId+",14)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_14").attr("style","display:block");
			jQuery("#hidden_dynamic_id").val("div_"+dynamicId+"_14");
			jQuery(".hovertip").tooltip();
			
			var result = jQuery.inArray(dynamicId, edit_control_dynamic_ids);
			if(result == -1)
			{
				new_control_dynamic_ids.push(dynamicId);
				created_control_type.push(14);
				jQuery.each(new_control_dynamic_ids,function(index,value)
				{
					jQuery('#left_block').append(jQuery("#div_"+value+"_"+created_control_type[index]));
				});
			}
			if(arrayControl != undefined)
			{
				
				jQuery("#control_label_"+dynamicId).html(arrayControl[0].dynamic_settings_value + " :");
				jQuery("#ux_txt_hidden_control_"+dynamicId).val(arrayControl[1].dynamic_settings_value);
			}
			
		break;
		case 15:
		
			jQuery("#div_15_15").clone(false).attr("id","div_"+dynamicId+"_15").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_15").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_15").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_15").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("input[type='password']").attr("id","ux_txt_password_control_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId ).children("input[type='password']").attr("name","ux_txt_password_control_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+",15,"+JSON.stringify(arrayControl)+","+dynamicCount+")");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_15,"+dynamicId+",15)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_15").attr("style","display:block");
			jQuery(".hovertip").tooltip();
			
			var result = jQuery.inArray(dynamicId, edit_control_dynamic_ids);
			if(result == -1)
			{
				new_control_dynamic_ids.push(dynamicId);
				created_control_type.push(15);
				jQuery.each(new_control_dynamic_ids,function(index,value)
				{
					jQuery('#left_block').append(jQuery("#div_"+value+"_"+created_control_type[index]));
				});
			}
			if(arrayControl != undefined)
			{
				arrayControl[2].dynamic_settings_value == "1" ?	jQuery("#txt_required_"+dynamicId).css("display","block") :	jQuery("#txt_required_"+dynamicId).css("display","none");
				jQuery("#control_label_"+dynamicId).html( arrayControl[0].dynamic_settings_value + " :");
				jQuery("#txt_description_"+dynamicId).html( arrayControl[1].dynamic_settings_value);
				jQuery("#show_tooltip"+dynamicId).attr("data-original-title",arrayControl[3].dynamic_settings_value);
			}

		break;
	}
}

function img_show(dynamicId)
{
 	jQuery("#anchor_del_"+dynamicId + "img").attr("src","<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg-hover.png");
}
function img_hide(dynamicId)
{
	jQuery("#anchor_del_"+dynamicId + "img").attr("src","<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png");
}
function add_settings(dynamicId,field_type,arrayControl,dynamicCount)
{
	
	if(field_type == 1 && array_controls[dynamicCount].length != 0)
	{
		if(array_controls[dynamicCount][1].text_dynamicId == dynamicId)
		{
			
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&dynamicCount="+dynamicCount+"&field_type="+field_type+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
		
	}
	else if(field_type == 2 && array_controls[dynamicCount].length != 0)
	{
		if( array_controls[dynamicCount][1].textarea_dynamicId == dynamicId)
		{
		
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&dynamicCount="+dynamicCount+"&field_type="+field_type+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				
				
				show_Popup();
			});
		}
	}
	else if(field_type == 3 && array_controls[dynamicCount].length != 0)
	{
		
		if( array_controls[dynamicCount][1].email_dynamicId == dynamicId)
		{
			
			
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&dynamicCount="+dynamicCount+"&field_type="+field_type+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	else if(field_type == 4 && array_controls[dynamicCount].length != 0)
	{
		if( array_controls[dynamicCount][1].dropdown_dynamicId == dynamicId)
		{
			
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&dynamicCount="+dynamicCount+"&field_type="+field_type+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	else if(field_type == 5 && array_controls[dynamicCount].length != 0)
	{
		if( array_controls[dynamicCount][1].checkbox_dynamicId == dynamicId)
		{
		
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&dynamicCount="+dynamicCount+"&field_type="+field_type+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	else if(field_type == 6 && array_controls[dynamicCount].length != 0)
	{
		if( array_controls[dynamicCount][1].radio_dynamicId == dynamicId)
		{
			
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&dynamicCount="+dynamicCount+"&field_type="+field_type+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	else if(field_type == 9 && array_controls[dynamicCount].length != 0)
	{
		if( array_controls[dynamicCount][1].file_upload_dynamicId == dynamicId)
		{
		
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&dynamicCount="+dynamicCount+"&field_type="+field_type+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	else if(field_type == 12 && array_controls[dynamicCount].length != 0)
	{
		if( array_controls[dynamicCount][1].date_dynamicId == dynamicId)
		{
			
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&dynamicCount="+dynamicCount+"&field_type="+field_type+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				dropdown_heading(dynamicId);
				jQuery("#ux_default_day_type_"+dynamicId).val(array_controls[dynamicCount][10].cb_default_value_day);
				jQuery("#ux_default_month_type_"+dynamicId).val(array_controls[dynamicCount][11].cb_default_value_month);
				jQuery("#ux_default_year_type_"+dynamicId).val(array_controls[dynamicCount][12].cb_default_value_year);
				jQuery("#ux_ddl_select_day_"+dynamicId).val(array_controls[dynamicCount][10].cb_default_value_day);
				jQuery("#ux_ddl_select_month_"+dynamicId).val(array_controls[dynamicCount][11].cb_default_value_month);
				if(array_controls[dynamicCount][8].cb_start_year == "" && array_controls[dynamicCount][9].cb_end_year == "")
				{
					jQuery("#ux_ddl_select_year_"+dynamicId).html('<option value=0>Year</option>');
				}
				else
				{
					jQuery("#ux_ddl_select_year_"+dynamicId).empty();
					jQuery("#ux_ddl_select_year_"+dynamicId).html('<option value=0>Year</option>');
					for(flag=array_controls[dynamicCount][8].cb_start_year; flag <= array_controls[dynamicCount][9].cb_end_year; flag++)
					{
						
						jQuery("#ux_ddl_select_year_"+dynamicId).append('<option value='+flag+'>'+flag+'</option');
						jQuery("#ux_ddl_select_year_"+dynamicId).val(array_controls[dynamicCount][12].cb_default_value_year);
					}
				
				}
				show_Popup();
			});
		}
	}
	else if(field_type == 13 && array_controls[dynamicCount].length != 0)
	{
		if( array_controls[dynamicCount][1].time_dynamicId == dynamicId)
		{
			
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&dynamicCount="+dynamicCount+"&field_type="+field_type+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				ux_minute_format(dynamicId,array_controls[dynamicCount][12]);
				if(array_controls[dynamicCount][8].cb_hour_format == 12)
				{
					jQuery("#ux_default_hours_24_"+dynamicId).hide();
					jQuery("#ux_default_hours_12_"+dynamicId).show();
					jQuery("#ux_default_am_"+dynamicId).show();
					jQuery("#ux_default_hours_12_"+dynamicId).val(array_controls[dynamicCount][9].cb_hours);
					jQuery("#ux_default_minute_"+dynamicId).val(array_controls[dynamicCount][10].cb_minutes);
					jQuery("#ux_default_am_"+dynamicId).val(array_controls[dynamicCount][11].cb_am_pm);
					jQuery("#ux_ddl_select_hr_24_"+dynamicId).hide();
					jQuery("#ux_ddl_select_hr_12_"+dynamicId).show();
					jQuery("#ux_ddl_select_ampm_"+dynamicId).show();
					jQuery("#ux_ddl_select_hr_12_"+dynamicId).val(array_controls[dynamicCount][9].cb_hours);
					jQuery("#ux_ddl_select_minute_"+dynamicId).val(array_controls[dynamicCount][10].cb_minutes);
					jQuery("#ux_ddl_select_ampm_"+dynamicId).val(array_controls[dynamicCount][11].cb_am_pm);
				}
				else if(array_controls[dynamicCount][8].cb_hour_format == 24)
				{
					jQuery("#ux_default_hours_12_"+dynamicId).hide();
					jQuery("#ux_default_hours_24_"+dynamicId).show();
					jQuery("#ux_default_am_"+dynamicId).hide();
					jQuery("#ux_default_hours_24_"+dynamicId).val(array_controls[dynamicCount][9].cb_hours);	
					jQuery("#ux_drop_hour_time_"+dynamicId).val(array_controls[dynamicCount][8].cb_hour_format);
					jQuery("#ux_default_minute_"+dynamicId).val(array_controls[dynamicCount][10].cb_minutes);
					jQuery("#ux_default_am_"+dynamicId).val(array_controls[dynamicCount][11].cb_am_pm);
					jQuery("#ux_ddl_select_hr_12_"+dynamicId).hide();
					jQuery("#ux_ddl_select_hr_24_"+dynamicId).show();
					jQuery("#ux_ddl_select_ampm_"+dynamicId).hide();
					jQuery("#ux_ddl_select_hr_12_"+dynamicId).val(array_controls[dynamicCount][9].cb_hours);
					jQuery("#ux_ddl_select_minute_"+dynamicId).val(array_controls[dynamicCount][10].cb_minutes);
					jQuery("#ux_ddl_select_ampm_"+dynamicId).val(array_controls[dynamicCount][11].cb_am_pm);	
				}
				show_Popup();
			});
		}
	}
	else if(field_type == 14 && array_controls[dynamicCount].length != 0)
	{
		if( array_controls[dynamicCount][1].hidden_dynamicId == dynamicId)
		{
			
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&dynamicCount="+dynamicCount+"&field_type="+field_type+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	else if(field_type == 15 && array_controls[dynamicCount].length != 0)
	{
		if( array_controls[dynamicCount][1].password_dynamicId == dynamicId)
		{
			
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&dynamicCount="+dynamicCount+"&field_type="+field_type+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	
	else
	{
		jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&dynamicCount="+dynamicCount+"&field_type="+field_type+"&count_id=0&param=add_settings_div&action=add_contact_form_library", function(data)
		{
			jQuery("#setting_controls_postback").html(data);
			show_Popup();
			if(arrayControl != undefined)
			{
				switch(field_type)
				{
					case 1:
				
						jQuery("#ux_label_text_"+dynamicId).val(arrayControl[0].dynamic_settings_value);
						jQuery("#ux_description_control_"+dynamicId).val(arrayControl[1].dynamic_settings_value);
						arrayControl[2].dynamic_settings_value == "1" ? jQuery("#ux_required_control_"+dynamicId).attr("checked","checked") : jQuery("#ux_required_control_"+dynamicId).removeAttr("checked");
						jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl[3].dynamic_settings_value);
						jQuery("#ux_default_value_"+dynamicId).val(arrayControl[4].dynamic_settings_value);
						jQuery("#ux_admin_label_"+dynamicId).val(arrayControl[5].dynamic_settings_value);
						arrayControl[6].dynamic_settings_value == "1" ? jQuery("#ux_show_email_"+dynamicId).attr("checked","checked") : jQuery("#ux_show_email_"+dynamicId).removeAttr("checked") ;
						jQuery("#button_set_outer_label_textbox_"+dynamicId).val(arrayControl[7].dynamic_settings_value);
						if(jQuery("#button_set_outer_label_textbox_"+dynamicId).val() != "")
						{
							jQuery("#ux_label_textbox_"+dynamicId).css("display","block");
							jQuery("#ux_label_textbox_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#button_set_txt_input_textbox_"+dynamicId).val(arrayControl[8].dynamic_settings_value);
						
						if(jQuery("#button_set_txt_input_textbox_"+dynamicId).val() != "")
						{
							jQuery("#ux_textinput_textbox_"+dynamicId).css("display","block");
							
							jQuery("#ux_textinput_textbox_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#button_set_txt_description_textbox_"+dynamicId).val(arrayControl[9].dynamic_settings_value);
						
						if(jQuery("#button_set_txt_description_textbox_"+dynamicId).val() != "")
						{
							jQuery("#ux_description_textbox_"+dynamicId).css("display","block");
							
							jQuery("#ux_description_textbox_"+dynamicId).attr("style", "position:inherit");
						}
						
						arrayControl[10].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_alpha_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_alpha_filter_"+dynamicId).removeAttr("checked") ;
						arrayControl[11].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).removeAttr("checked") ;
						arrayControl[12].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_digit_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_digit_filter_"+dynamicId).removeAttr("checked") ;
						arrayControl[13].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).removeAttr("checked") ;
						arrayControl[14].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_trim_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_trim_filter_"+dynamicId).removeAttr("checked") ;
						
					break;
					case 2:
					
						jQuery("#ux_label_text_"+dynamicId).val(arrayControl[0].dynamic_settings_value);
						jQuery("#ux_description_control_"+dynamicId).val(arrayControl[1].dynamic_settings_value);
						jQuery("#ux_required_control_"+dynamicId).val(arrayControl[2].dynamic_settings_value)
						arrayControl[2].dynamic_settings_value == "1" ? jQuery("#ux_required_control_"+dynamicId).attr("checked","checked") :  jQuery("#ux_required_control_"+dynamicId).removeAttr("checked");
						jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl[3].dynamic_settings_value);
						jQuery("#ux_default_value_"+dynamicId).val(arrayControl[4].dynamic_settings_value);
						jQuery("#ux_admin_label_"+dynamicId).val(arrayControl[5].dynamic_settings_value);
						arrayControl[6].dynamic_settings_value == "1" ?  jQuery("#ux_show_email_"+dynamicId).attr("checked","checked") : jQuery("#ux_show_email_"+dynamicId).removeAttr("checked","checked"); 
						jQuery("#button_set_outer_label_"+dynamicId).val(arrayControl[7].dynamic_settings_value);
					
						if(jQuery("#button_set_outer_label_"+dynamicId).val() != "")
						{
							jQuery("#ux_label_textbox_"+dynamicId).css("display","block");
							jQuery("#text_area_label_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#button_set_textinput_"+dynamicId).val(arrayControl[8].dynamic_settings_value);
						
						if(jQuery("#button_set_textinput_"+dynamicId).val() != "")
						{
							jQuery("#text_area_text_input_"+dynamicId).css("display","block");
							jQuery("#text_area_text_input_"+dynamicId).attr("style", "position:inherit");
							
						}
						
						jQuery("#button_set_outer_description_"+dynamicId).val(arrayControl[9].dynamic_settings_value);
						
						if(jQuery("#button_set_outer_description_"+dynamicId).val() != "")
						{
							jQuery("#text_area_description_"+dynamicId).css("display","block");
							jQuery("#text_area_description_"+dynamicId).attr("style", "position:inherit");
							
						}
						
						arrayControl[10].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_alpha_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_alpha_filter_"+dynamicId).removeAttr("checked");
						arrayControl[11].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).removeAttr("checked");
						arrayControl[12].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_digit_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_digit_filter_"+dynamicId).removeAttr("checked");
						arrayControl[13].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).removeAttr("checked");
						arrayControl[14].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_trim_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_trim_filter_"+dynamicId).removeAttr("checked"); 
						
					break;
					case 3:
					
						jQuery("#ux_label_text_"+dynamicId).val(arrayControl[0].dynamic_settings_value);
						jQuery("#ux_description_control_"+dynamicId).val(arrayControl[1].dynamic_settings_value);
						jQuery("#ux_required_control_"+dynamicId).val(arrayControl[2].dynamic_settings_value);
						arrayControl[2].dynamic_settings_value == "1" ? jQuery("#ux_required_control_"+dynamicId).attr("checked","checked") : jQuery("#ux_required_control_"+dynamicId).removeAttr("checked");
						jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl[3].dynamic_settings_value);
						jQuery("#ux_admin_label_"+dynamicId).val(arrayControl[4].dynamic_settings_value);
						arrayControl[5].dynamic_settings_value == "1" ? jQuery("#ux_show_email_"+dynamicId).attr("checked","checked") : jQuery("#ux_show_email_"+dynamicId).removeAttr("checked");
						
						jQuery("#ux_email_set_outer_label_"+dynamicId).val(arrayControl[6].dynamic_settings_value);
						
						if(arrayControl[6].dynamic_settings_value != "")
						{
							jQuery("#ux_advance_label_"+dynamicId).css("display","block");
							jQuery("#ux_advance_label_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_email_txt_input_"+dynamicId).val(arrayControl[7].dynamic_settings_value);
						
						if(arrayControl[7].dynamic_settings_value != "")
						{
							jQuery("#advance_text_input_"+dynamicId).css("display","block");
							
							jQuery("#advance_text_input_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_email_description_textarea_"+dynamicId).val(arrayControl[8].dynamic_settings_value);
						
						if(arrayControl[8].dynamic_settings_value != "")
						{
							jQuery("#advance_text_description_"+dynamicId).css("display","block");
							
							jQuery("#advance_text_description_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_email_alpha_filter_"+dynamicId).val(arrayControl[9].dynamic_settings_value);
						
						if(arrayControl[9].dynamic_settings_value == "1")
						{
							jQuery("#ux_email_alpha_filter_"+dynamicId).attr("checked","checked");
						}
						
						arrayControl[10].dynamic_settings_value == "1" ? jQuery("#ux_email_alpha_num_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_email_alpha_num_filter_"+dynamicId).removeAttr("checked");
						arrayControl[11].dynamic_settings_value == "1" ? jQuery("#ux_email_digit_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_email_digit_filter_"+dynamicId).removeAttr("checked");
						arrayControl[12].dynamic_settings_value == "1" ? jQuery("#ux_email_strip_tag_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_email_strip_tag_filter_"+dynamicId).removeAttr("checked");
						arrayControl[13].dynamic_settings_value == "1" ? jQuery("#ux_email_trim_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_email_trim_filter_"+dynamicId).removeAttr("checked");
	
					break;
					case 4:
						
						array_option_id_dropdown[dynamicCount] = [];
						array_options_dropdown[dynamicCount] = [];
						
						jQuery("#ux_label_text_"+dynamicId).val(arrayControl[0].dynamic_settings_value);
						arrayControl[1].dynamic_settings_value == "1" ? jQuery("#ux_required_control_"+dynamicId).attr("checked","checked") : jQuery("#ux_required_control_"+dynamicId).removeAttr("checked");
						
						jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl[2].dynamic_settings_value);
						
						if(arrayControl[3].dynamic_settings_value!= "")
						{
							var options_dynamicId_str = arrayControl[3].dynamic_settings_value;
							var options_dynamicId = options_dynamicId_str.split(";");
							 
							var ddl_options_str = arrayControl[4].dynamic_settings_value;
							var ddl_option_value = ddl_options_str.split(";");
							
							for(var flag = 0;flag <options_dynamicId.length;flag++)
							{
								var optionsId = options_dynamicId[flag];
								var ddl_options = ddl_option_value[flag];
						
								array_option_id_dropdown[dynamicCount].push(parseInt(optionsId));
								array_options_dropdown[dynamicCount].push(ddl_options);
								
								jQuery("#dropdown_ddl_option_"+dynamicId).append('<div class="layout-control-group" id="input_option_tr_'+optionsId+'"><div class="layout-controls"><input type="text" class="layout-span8" id="input_option_'+optionsId+'" name="input_option_'+optionsId+'" value="'+ddl_options+'" /><a style="padding-left:2px;" onclick="delete_ddl_option('+optionsId+','+dynamicId+')" ><img style="vertical-align: top;margin-top: 2px;" src="<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" /></a></div></div>');
							}
						}
						
						jQuery("#ux_admin_label_"+dynamicId).val(arrayControl[5].dynamic_settings_value);
						
						arrayControl[6].dynamic_settings_value == "1" ? jQuery("#ux_email_"+dynamicId).attr("checked","checked") : jQuery("#ux_email_"+dynamicId).removeAttr("checked");
	
						jQuery("#button_set_outer_label_ddl_"+dynamicId).val(arrayControl[7].dynamic_settings_value);
						
						if(jQuery("#button_set_outer_label_ddl_"+dynamicId).val() != "")
						{
							jQuery("#show_data_label_tr_ddl_"+dynamicId).css("display","block");
							
							jQuery("#show_data_label_tr_ddl_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_dropdown_menu_textarea_ddl_"+dynamicId).val(arrayControl[8].dynamic_settings_value);
						
						if(jQuery("#ux_dropdown_menu_textarea_ddl_"+dynamicId).val() != "")
						{
							jQuery("#show_data_dropdown_menu_tr_ddl_"+dynamicId).css("display","block");
							
							jQuery("#show_data_dropdown_menu_tr_ddl_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_description_textarea_ddl_"+dynamicId).val(arrayControl[9].dynamic_settings_value);
						
						if(jQuery("#ux_description_textarea_ddl_"+dynamicId).val() != "")
						{
							jQuery("#show_data_description_tr_ddl_"+dynamicId).css("display","block");
							
							jQuery("#show_data_description_tr_ddl_"+dynamicId).attr("style", "position:inherit");
						}
						
					break;
					case 5:
						
						jQuery("#ux_label_text_"+dynamicId).val(arrayControl[0].dynamic_settings_value);
						arrayControl[1].dynamic_settings_value == "1" ? jQuery("#ux_required_control_"+dynamicId).attr("checked","checked") : jQuery("#ux_required_control_"+dynamicId).removeAttr("checked");
						jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl[2].dynamic_settings_value);
						if(arrayControl[3].dynamic_settings_value != "")
						{
		 					var optionId_str = arrayControl[3].dynamic_settings_value;
							var optionId = optionId_str.split(";");
							
							var option_value_str = arrayControl[4].dynamic_settings_value;
							var option_value = option_value_str.split(";");
							
							for(var flag = 0;flag <optionId.length ;flag++)
							{
								var options_dynamicId = optionId[flag];
								var add_chk_option = option_value[flag];
								array_option_id_chk[dynamicCount].push(parseInt(options_dynamicId));
								array_options_chk[dynamicCount].push(add_chk_option);
								
								jQuery("#append_chk_option_"+dynamicId).append('<div class="layout-control-group" id="selected_item_'+options_dynamicId+'"><div class="layout-controls"><input type= "text" class="layout-span8" value="'+add_chk_option+'" id="input_type_'+options_dynamicId+'"><a style="padding-left:2px;" onclick="delete_chk('+options_dynamicId+','+dynamicId+')"><img style="vertical-align: top;margin-top: 2px;" src="<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" /></a></div></div>');
								
							}
						}
						jQuery("#ux_admin_label_"+dynamicId).val(arrayControl[5].dynamic_settings_value);
						arrayControl[6].dynamic_settings_value == "1" ? jQuery("#ux_show_email_"+dynamicId).attr("checked","checked") : jQuery("#ux_show_email_"+dynamicId).removeAttr("checked");
						
						jQuery("#button_set_outer_label_chk_"+dynamicId).val(arrayControl[7].dynamic_settings_value);
						
						if(jQuery("#button_set_outer_label_chk_"+dynamicId).val() != "")
						{
							jQuery("#show_data_label_tr_chk_"+dynamicId).css("display","block");
							jQuery("#show_data_label_tr_chk_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_description_textarea_chk_"+dynamicId).val(arrayControl[8].dynamic_settings_value);
						
						if(jQuery("#ux_description_textarea_chk_"+dynamicId).val() != "")
						{
							jQuery("#show_data_description_tr_chk_"+dynamicId).css("display","block");
							jQuery("#show_data_description_tr_chk_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_button_options_outer_wrapper_chk_"+dynamicId).val(arrayControl[9].dynamic_settings_value);
						
						if(jQuery("#ux_button_options_outer_wrapper_chk_"+dynamicId).val() != "")
						{
							jQuery("#show_data_option_outer_wrapper_tr_chk_"+dynamicId).css("display","block");
							jQuery("#show_data_option_outer_wrapper_tr_chk_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_button_option_wrapper_chk_"+dynamicId).val(arrayControl[10].dynamic_settings_value);
						
						if(jQuery("#ux_button_option_wrapper_chk_"+dynamicId).val() != "")
						{
							jQuery("#show_data_option_wrapper_tr_chk_"+dynamicId).css("display","block");
							jQuery("#show_data_option_wrapper_tr_chk_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_button_option_label_chk_"+dynamicId).val(arrayControl[11].dynamic_settings_value);
						
						if(jQuery("#ux_button_option_label_chk_"+dynamicId).val() != "")
						{
							jQuery("#show_data_option_label_tr_chk_"+dynamicId).css("display","block");
							jQuery("#show_data_option_label_tr_chk_"+dynamicId).attr("style", "position:inherit");
						}
						
					break;
					case 6:
					
						jQuery("#ux_label_text_"+dynamicId).val(arrayControl[0].dynamic_settings_value);
						arrayControl[1].dynamic_settings_value == "1" ? jQuery("#ux_required_control_"+dynamicId).attr("checked","checked") : jQuery("#ux_required_control_"+dynamicId).removeAttr("checked");
						jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl[2].dynamic_settings_value);
						
						if(arrayControl[3].dynamic_settings_value != "")
						{
				 			var optionId_str = arrayControl[3].dynamic_settings_value;
							var optionId = optionId_str.split(";");
							
							var option_value_str = arrayControl[4].dynamic_settings_value;
							var option_value = option_value_str.split(";");
							
							for(var flag = 0;flag <optionId.length ;flag++)
							{
								var options_dynamicId = optionId[flag];
								var add_radio_option = option_value[flag];
								
								array_option_id_radio[dynamicCount].push(parseInt(options_dynamicId));
								array_options_radio[dynamicCount].push(add_radio_option);
							
								jQuery("#append_multiple_option_"+dynamicId).append('<div class="layout-control-group" id="input_tr_'+options_dynamicId+'"><div class="layout-controls"><input type="text" class="layout-span8" id="input_option_'+options_dynamicId+'" name="input_option_'+options_dynamicId+'" value="'+add_radio_option+'" /><a style="padding-left:2px;" onclick="delete_radio('+options_dynamicId+','+dynamicId+')"><img style="vertical-align: top;margin-top: 2px;" src="<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" /></a></div></div>');
							}
						}
						
						jQuery("#ux_admin_label_"+dynamicId).val(arrayControl[5].dynamic_settings_value);
						
						arrayControl[6].dynamic_settings_value == "1" ? jQuery("#ux_show_email_"+dynamicId).attr("checked","checked") : jQuery("#ux_show_email_"+dynamicId).removeAttr("checked");
						 
						jQuery("#button_set_outer_label_radio_"+dynamicId).val(arrayControl[7].dynamic_settings_value);
						
						if(jQuery("#button_set_outer_label_radio_"+dynamicId).val() != "")
						{
							jQuery("#show_data_label_tr_radio_"+dynamicId).css("display","block");
							jQuery("#show_data_label_tr_radio_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_description_textarea_radio_"+dynamicId).val(arrayControl[8].dynamic_settings_value);
						
						if(jQuery("#ux_description_textarea_radio_"+dynamicId).val() != "")
						{
							jQuery("#show_data_description_tr_radio_"+dynamicId).css("display","block");
							jQuery("#show_data_description_tr_radio_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_button_options_outer_wrapper_radio_"+dynamicId).val(arrayControl[9].dynamic_settings_value);
						
						if(arrayControl[9].dynamic_settings_value != "")
						{
							jQuery("#show_data_option_outer_wrapper_tr_radio_"+dynamicId).css("display","block");
							jQuery("#show_data_option_outer_wrapper_tr_radio_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_button_option_wrapper_radio_"+dynamicId).val(arrayControl[10].dynamic_settings_value);
						
						if(arrayControl[10].dynamic_settings_value != "")
						{
							jQuery("#show_data_option_wrapper_tr_radio_"+dynamicId).css("display","block");
							jQuery("#show_data_option_wrapper_tr_radio_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_button_option_label_radio_"+dynamicId).val(arrayControl[11].dynamic_settings_value);
						if(arrayControl[11].dynamic_settings_value != "")
						{
							jQuery("#show_data_option_label_tr_radio_"+dynamicId).css("display","block");
							jQuery("#show_data_option_label_tr_radio_"+dynamicId).attr("style", "position:inherit");
						}
						
					break;
					case 9:
					
						jQuery("#ux_label_text_"+dynamicId).val(arrayControl[0].dynamic_settings_value);
						jQuery("#ux_description_control_"+dynamicId).val(arrayControl[1].dynamic_settings_value);
						
						arrayControl[2].dynamic_settings_value == "1" ? jQuery("#ux_required_control_"+dynamicId).attr("checked","checked") : jQuery("#ux_required_control_"+dynamicId).removeAttr("checked"); 
						jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl[3].dynamic_settings_value);
						jQuery("#ux_admin_label_"+dynamicId).val(arrayControl[4].dynamic_settings_value);
						arrayControl[5].dynamic_settings_value == "1" ? jQuery("#ux_show_email_"+dynamicId).attr("checked","checked") : jQuery("#ux_show_email_"+dynamicId).removeAttr("checked");
						arrayControl[6].dynamic_settings_value == "1" ? jQuery("#ux_allow_multiple_file_"+dynamicId).attr("checked","checked") : jQuery("#ux_allow_multiple_file_"+dynamicId).removeAttr("checked");
						jQuery("#ux_allowed_file_extensions_"+dynamicId).val(arrayControl[7].dynamic_settings_value);
						jQuery("#ux_maximum_file_allowed_"+dynamicId).val(arrayControl[8].dynamic_settings_value);
						arrayControl[9].dynamic_settings_value == "1" ? jQuery("#ux_uploaded_file_email_db_"+dynamicId).attr("checked","checked") : jQuery("#ux_uploaded_file_email_db_"+dynamicId).removeAttr("checked"); 
	
						jQuery("#button_set_outer_label_file"+dynamicId).val(arrayControl[10].dynamic_settings_value);
						
						if(jQuery("#button_set_outer_label_file"+dynamicId).val() != "")
						{
							jQuery("#ux_label_fileupload_"+dynamicId).css("display","block");
							jQuery("#ux_label_fileupload_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#button_set_outer_description_fileuplod"+dynamicId).val(arrayControl[11].dynamic_settings_value);
						
						if(jQuery("#button_set_outer_description_fileuplod"+dynamicId).val() != "")
						{
							jQuery("#ux_description_fileupload_"+dynamicId).css("display","block");
							jQuery("#ux_description_fileupload_"+dynamicId).attr("style", "position:inherit");
						}
						
					break;
					case 12:
					
						default_day(dynamicId,arrayControl == undefined ? "" :  arrayControl[6].dynamic_settings_value,arrayControl == undefined ? "" :  arrayControl[7].dynamic_settings_value);
						dropdown_heading(dynamicId);
						jQuery("#ux_label_text_"+dynamicId).val(arrayControl[0].dynamic_settings_value);
						jQuery("#ux_description_control_"+dynamicId).val(arrayControl[1].dynamic_settings_value);
						arrayControl[2].dynamic_settings_value == "1" ? jQuery("#ux_required_control_"+dynamicId).attr("checked","checked") : jQuery("#ux_required_control_"+dynamicId).removeAttr("checked"); 
						jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl[3].dynamic_settings_value);
						jQuery("#ux_admin_label_"+dynamicId).val(arrayControl[4].dynamic_settings_value);

						arrayControl[5].dynamic_settings_value == "1" ? jQuery("#ux_show_email_"+dynamicId).attr("checked","checked") : jQuery("#ux_show_email_"+dynamicId).removeAttr("checked");
						
						jQuery("#ux_start_year_label_"+dynamicId).val(arrayControl[6].dynamic_settings_value);
						jQuery("#ux_last_year_label_"+dynamicId).val(arrayControl[7].dynamic_settings_value);
						jQuery("#ux_default_day_type_"+dynamicId).val(arrayControl[8].dynamic_settings_value);
						jQuery("#ux_default_month_type_"+dynamicId).val(arrayControl[9].dynamic_settings_value);
						
						var start_year = arrayControl[6].dynamic_settings_value;
						var end_year = arrayControl[7].dynamic_settings_value;
						
						if(start_year == "" && end_year == "")
						{
							jQuery("#ux_default_year_type_"+dynamicId).html('<option value=0><?php _e( "Year", contact_bank ); ?></option>');
							jQuery("#ux_start_year_label_"+dynamicId).val("1900");
							jQuery("#ux_last_year_label_"+dynamicId).val("2100");
							var start_year = 1900;
							var end_year = 2100;
							for(flag=start_year; flag <= end_year; flag++)
							{
								jQuery("#ux_default_year_type_"+dynamicId).append('<option value='+flag+'>'+flag+'</option');
								jQuery("#ux_default_year_type_"+dynamicId).val(arrayControl[10].dynamic_settings_value);
							}
						}
						else
						{
							jQuery("#ux_default_year_type_"+dynamicId).empty();
							jQuery("#ux_default_year_type_"+dynamicId).html('<option value=0><?php _e( "Year", contact_bank ); ?></option>');
							for(flag=start_year; flag <= end_year; flag++)
							{
								jQuery("#ux_default_year_type_"+dynamicId).append('<option value='+flag+'>'+flag+'</option');
								jQuery("#ux_default_year_type_"+dynamicId).val(arrayControl[10].dynamic_settings_value);
							}
						}
						
						jQuery("#ux_last_"+dynamicId).val(arrayControl[11].dynamic_settings_value);
						jQuery("#uxDefaultDateFormat_"+dynamicId).val(arrayControl[12].dynamic_settings_value);
						
						jQuery("#ux_date_set_outer_label_"+dynamicId).val(arrayControl[13].dynamic_settings_value);
						
						if(jQuery("#ux_date_set_outer_label_"+dynamicId).val() != "")
						{
							jQuery("#ux_advance_label_"+dynamicId).attr("display","block");
							jQuery("#ux_advance_label_"+dynamicId).attr("style", "position:inherit");
							
						}
						
						jQuery("#ux_date_txt_input_"+dynamicId).val(arrayControl[14].dynamic_settings_value);
						
						if(jQuery("#ux_date_txt_input_"+dynamicId).val() != "")
						{
							jQuery("#advance_text_input_"+dynamicId).attr("display","block");
							jQuery("#advance_text_input_"+dynamicId).attr("style", "position:inherit");
							
						}
						
						jQuery("#ux_date_description_textarea_"+dynamicId).val(arrayControl[15].dynamic_settings_value);
						
						if(jQuery("#ux_date_description_textarea_"+dynamicId).val() != "")
						{
							jQuery("#advance_text_description_"+dynamicId).attr("display","block");
							jQuery("#advance_text_description_"+dynamicId).attr("style", "position:inherit");
							
						}
						
						jQuery("#ux_day_textarea_"+dynamicId).val(arrayControl[16].dynamic_settings_value);
						
						if(jQuery("#ux_day_textarea_"+dynamicId).val() != "")
						{
							jQuery("#ux_advance_day_"+dynamicId).attr("display","block");
							jQuery("#ux_advance_day_"+dynamicId).attr("style", "position:inherit");
							
						}
						
						jQuery("#ux_month_textarea_"+dynamicId).val(arrayControl[17].dynamic_settings_value);
						
						if(jQuery("#ux_month_textarea_"+dynamicId).val() != "")
						{
							jQuery("#advance_text_month_"+dynamicId).attr("display","block");
							jQuery("#advance_text_month_"+dynamicId).attr("style", "position:inherit");
							
						}
						
						jQuery("#ux_year_textarea_"+dynamicId).val(arrayControl[18].dynamic_settings_value);
						
						if(jQuery("#ux_year_textarea_"+dynamicId).val() != "")
						{
							jQuery("#advance_text_year_"+dynamicId).attr("display","block");
							jQuery("#advance_text_year_"+dynamicId).attr("style", "position:inherit");
						}
						
					break;
					case 13:
						
						
						jQuery("#ux_label_text_"+dynamicId).val(arrayControl[0].dynamic_settings_value);
						jQuery("#ux_description_control_"+dynamicId).val(arrayControl[1].dynamic_settings_value);
						
						arrayControl[2].dynamic_settings_value == "1" ? jQuery("#ux_required_control_"+dynamicId).attr("checked","checked") : jQuery("#ux_required_control_"+dynamicId).removeAttr("checked");
						 
						jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl[3].dynamic_settings_value);
						jQuery("#ux_admin_label_"+dynamicId).val(arrayControl[4].dynamic_settings_value);
						
						arrayControl[5].dynamic_settings_value == "1" ? jQuery("#ux_email_"+dynamicId).attr("checked","checked") : jQuery("#ux_email_"+dynamicId).removeAttr("checked");
						
						jQuery("#ux_drop_hour_time_"+dynamicId).val(arrayControl[6].dynamic_settings_value);
						
						var minute_format = parseInt(arrayControl[10].dynamic_settings_value);
						var dropdown_min = "<option selected='selected' value=''><?php _e( "Minute", contact_bank ); ?></option>";
						
						for(flag=0; flag < 60;)
						{
							if(flag < 10)
							{
								dropdown_min += "<option  value=0"+flag+">0"+ flag + "</option>";
							}
							else
							{
								dropdown_min += "<option value="+flag+">"+ flag + "</option>";
							}
							flag = flag + minute_format;
						}
						
						if(arrayControl[6].dynamic_settings_value != "" )
						{
							jQuery("#ux_ddl_select_minute_"+dynamicId).html(dropdown_min);
							jQuery("#ux_default_minute_"+dynamicId).html(dropdown_min);
							jQuery("#ux_minute_format_"+dynamicId).val(1);
						}
						else
						{
							jQuery("#ux_ddl_select_minute_"+dynamicId).html(dropdown_min);
							jQuery("#ux_default_minute_"+dynamicId).html(dropdown_min);
						}
						
						jQuery("#ux_drop_hour_time_"+dynamicId).val(arrayControl[6].dynamic_settings_value);
						
						if(arrayControl[6].dynamic_settings_value == "12")
						{
							jQuery("#ux_default_hours_24_"+dynamicId).hide();
							jQuery("#ux_default_hours_12_"+dynamicId).show();
							jQuery("#ux_default_hours_12_"+dynamicId).val(arrayControl[7].dynamic_settings_value);
							jQuery("#ux_default_am_"+dynamicId).show();
						}					
						else if(arrayControl[6].dynamic_settings_value == "24")
						{
							jQuery("#ux_default_hours_12_"+dynamicId).hide();
							jQuery("#ux_default_hours_24_"+dynamicId).show();
							jQuery("#ux_default_hours_24_"+dynamicId).val(arrayControl[7].dynamic_settings_value);
							jQuery("#ux_default_am_"+dynamicId).hide();
						}
						
						jQuery("#ux_default_minute_"+dynamicId).val(arrayControl[8].dynamic_settings_value);
						jQuery("#ux_default_am_"+dynamicId).val(arrayControl[9].dynamic_settings_value);
						jQuery("#ux_minute_format_"+dynamicId).val(arrayControl[10].dynamic_settings_value);
						
						jQuery("#button_set_outer_label_"+dynamicId).val(arrayControl[11].dynamic_settings_value);
						
						if(jQuery("#button_set_outer_label_"+dynamicId).val() != "")
						{
							jQuery("#time_css_label_"+dynamicId).css("display","block");
							jQuery("#time_css_label_"+dynamicId).attr("style", 'position:inherit');
							
						}
						
						jQuery("#button_set_textinput_"+dynamicId).val(arrayControl[12].dynamic_settings_value);
						
						if(jQuery("#button_set_textinput_"+dynamicId).val() != "")
						{
							jQuery("#time_text_input_"+dynamicId).css("display","block");
							jQuery("#time_text_input_"+dynamicId).attr("style", 'position:inherit');
							
						}
						
						jQuery("#button_set_outer_description_"+dynamicId).val(arrayControl[13].dynamic_settings_value);
						
						if(jQuery("#button_set_outer_description_"+dynamicId).val() != "")
						{
							jQuery("#time_description_"+dynamicId).css("display","block");
							jQuery("#time_description_"+dynamicId).attr("style", 'position:inherit');
							
						}
						
						jQuery("#ux_time_hour_"+dynamicId).val(arrayControl[14].dynamic_settings_value);
						
						if(jQuery("#ux_time_hour_"+dynamicId).val() != "")
						{
							jQuery("#time_set_time_hour_"+dynamicId).css("display","block");
							jQuery("#time_set_time_hour_"+dynamicId).attr("style", 'position:inherit');
							
						}
						
						jQuery("#ux_time_minute_"+dynamicId).val(arrayControl[15].dynamic_settings_value);
						
						if(jQuery("#ux_time_minute_"+dynamicId).val() != "")
						{
							jQuery("#button_set_time_minute_"+dynamicId).css("display","block");
							jQuery("#button_set_time_minute_"+dynamicId).attr("style", 'position:inherit');
							
						}
						
						jQuery("#button_set_time_am_"+dynamicId).val(arrayControl[16].dynamic_settings_value);
						
						if(jQuery("#button_set_time_am_"+dynamicId).val() != "")
						{
							jQuery("#ux_tr_set_time_am_"+dynamicId).css("display","block");
							jQuery("#ux_tr_set_time_am_"+dynamicId).attr("style", 'position:inherit');
						}
						
					break;
					case 14:
						
						jQuery("#ux_label_text_"+dynamicId).val(arrayControl[0].dynamic_settings_value);
						jQuery("#ux_default_value_"+dynamicId).val(arrayControl[1].dynamic_settings_value);
						jQuery("#ux_admin_label_"+dynamicId).val(arrayControl[2].dynamic_settings_value);
						arrayControl[3].dynamic_settings_value == "1" ? jQuery("#ux_show_email_"+dynamicId).attr("checked","checked") : jQuery("#ux_show_email_"+dynamicId).removeAttr("checked");
	
					break;
					case 15:
					
						jQuery("#ux_label_text_"+dynamicId).val(arrayControl[0].dynamic_settings_value);
						jQuery("#ux_description_control_"+dynamicId).val(arrayControl[1].dynamic_settings_value);
						arrayControl[2].dynamic_settings_value == "1" ? jQuery("#ux_required_control_"+dynamicId).attr("checked","checked") : jQuery("#ux_required_control_"+dynamicId).removeAttr("checked");
	
						jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl[3].dynamic_settings_value);
						jQuery("#ux_admin_label_"+dynamicId).val(arrayControl[4].dynamic_settings_value);
						
						arrayControl[5].dynamic_settings_value == "1" ? jQuery("#ux_show_email_"+dynamicId).attr("checked","checked") : jQuery("#ux_show_email_"+dynamicId).removeAttr("checked"); 
	
						jQuery("#ux_password_label_"+dynamicId).val(arrayControl[6].dynamic_settings_value);
						
						if(jQuery("#ux_password_label_"+dynamicId).val() != "")
						{
							jQuery("#password_label_"+dynamicId).css("display","block");
							jQuery("#password_label_"+dynamicId).attr("style", "position:inherit");
						}
						jQuery("#ux_password_text_input_"+dynamicId).val(arrayControl[7].dynamic_settings_value);
						
						if(jQuery("#ux_password_text_input_"+dynamicId).val() != "")
						{
							jQuery("#password_text_input_"+dynamicId).css("display","block");
							jQuery("#password_text_input_"+dynamicId).attr("style", "position:inherit");
						}
						
						jQuery("#ux_password_description_"+dynamicId).val(arrayControl[8].dynamic_settings_value);
						
						if(jQuery("#ux_password_description_"+dynamicId).val() != "")
						{
							jQuery("#password_description_"+dynamicId).css("display","block");
							jQuery("#password_description_"+dynamicId).attr("style", "position:inherit");
						}
						arrayControl[9].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_alpha_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_alpha_filter_"+dynamicId).removeAttr("checked");
						arrayControl[10].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).removeAttr("checked");
						arrayControl[11].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_digit_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_digit_filter_"+dynamicId).removeAttr("checked");
						arrayControl[12].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).removeAttr("checked");
						arrayControl[13].dynamic_settings_value == "1" ? jQuery("#ux_checkbox_trim_filter_"+dynamicId).attr("checked","checked") : jQuery("#ux_checkbox_trim_filter_"+dynamicId).removeAttr("checked");
						
					break;
				}
			}
			else
			{
				if(field_type == 12)
				{
					default_day(dynamicId,"","");
					dropdown_heading(dynamicId);
				}
				else if(field_type == 13)
				{
					jQuery("#ux_default_hours_24_"+dynamicId).hide();
				}
			}
		});
	}
}
/* Function Name : div_show
 * Paramters : dynamicId
 * Return : None
 * Description : This Function is used Drag and Drop of controls parseInto fieldset .
 * Created in Version 1.0 
 * Last Modified : 1.0
 * Reasons for change : None
 */ 
function div_show(dynamicId,field_id)
{
	jQuery("#AjaxUploaderFilesButton").css('float','left');	
}

function delete_textbox(div_id,dynamicId,control_no)
{
	
	if(edit_created_control_type.length != 0)
	{
		var index = jQuery.inArray(dynamicId,edit_control_dynamic_ids);
		if(index > -1)
		{
			if(control_no == 9)
			{
				new_file_upload = "";
				jQuery(".file_upload").attr("style","display:none");
			}
			else
			{
				jQuery("#" + div_id.id).remove();
			}
			edit_control_dynamic_ids.splice(index, 1);
			edit_created_control_type.splice(index, 1);
		}
	}
	var index = jQuery.inArray(dynamicId,new_control_dynamic_ids);
	if(index > -1)
	{
		if(control_no == 9)
		{
			new_file_upload = "";
			jQuery(".file_upload").attr("style","display:none");
		}
		else
		{
			jQuery("#" + div_id.id).remove();
		}
		new_control_dynamic_ids.splice(index, 1);
		created_control_type.splice(index, 1);
	}
	delete_control_dynamicIds.push(dynamicId);
	
}
function field_reqired(dynamicId)
{
	var ux_dyn_default_value = jQuery("#ux_required_control_"+dynamicId).prop("checked");
	
	if(ux_dyn_default_value == true)
	{
		jQuery("#txt_required_"+dynamicId).css("display","inline");	
	}
	else
	{
		jQuery("#txt_required_"+dynamicId).css("display","none");
	}
}
function show_Popup()
{
	jQuery("#fade").css('display','block');
	var windowHeight =  jQuery(window).height() - 200;
	var windowWidth =  jQuery(window).width() - 200;
	var anchor = jQuery("<a class=\"closeButtonLightbox\" onclick=\"CloseLightbox();\"></a>");
	jQuery("#setting_controls_postback").append(anchor);
	var lightboxHeight = jQuery("#setting_controls_postback").height();	
	var lightboxWidth = jQuery("#setting_controls_postback").width();	
	var proposedTop =  (jQuery(window).height() - lightboxHeight - 40) / 2 ;
	var proposedLeft =  (jQuery(window).width() - lightboxWidth - 40) / 2 ;
	jQuery("#setting_controls_postback").css('top',proposedTop + 'px');
	jQuery("#setting_controls_postback").css('left',proposedLeft + 'px');
	jQuery("#setting_controls_postback").fadeIn(200);

}
function CloseLightbox()
{
	jQuery("#setting_controls_postback").css('display','none');
	jQuery("#fade").fadeOut(200);
}
jQuery("#ux_dynamic_form_submit").validate
({
	rules: 
	{
		ux_txt_form_name: "required",
		ux_txt_sucess_message: "required",
		ux_txt_redirect_url: 
		{
			required: function()
			{
				return jQuery("#ux_chk_redirect_url").prop("checked");
			}
		}
	},
	submitHandler: function(form)
	{
		jQuery("#update_form_success_message").css("display","block");
		jQuery('body,html').animate({
		scrollTop: jQuery('body,html').position().top}, 'slow');
		jQuery.ajax
		({
			type: "POST",
			url: ajaxurl + "?delete_control_dynamicIds="+delete_control_dynamicIds+"&param=delete_controls&action=edit_contact_form_library",
			async: false,
			success : function(data) 
			{
			}
		});	
		var field_no = created_control_type.length;
		var form_name = jQuery("#ux_txt_form_name").val();
		var form_id = <?php echo $form_id; ?>;
		if(field_order.length == 0)
		{
			field_order = 0;
		}
		var imaginaryCount = 0;
		
		jQuery.ajax
		({
			type: "POST",
			url: ajaxurl + "?form_name="+form_name+"&form_id="+form_id+"&field_order="+field_order+"&edit_control_dynamic_ids="+edit_control_dynamic_ids+"&new_control_dynamic_ids="+new_control_dynamic_ids+"&created_control_type="+created_control_type+"&field_dynamic_id="+field_dynamic_id+"&ux_sucess_message="+jQuery("#ux_txt_sucess_message").val()+"&chk_redirect_url="+jQuery("#ux_chk_redirect_url").prop("checked")+"&ux_redirect_url="+jQuery("#ux_txt_redirect_url").val()+"&form=1&param=submit_controls&action=edit_contact_form_library",
			success : function(data) 
			{
				if(created_control_type.length > 0)
				{
					for(flag = 0;flag<field_no; flag++)
					{
						var dynamicCount = array_dynamicCount[flag];
						switch(parseInt(created_control_type[flag]))
						{
							case 1:
							if(array_controls[dynamicCount].length == 0)
							{
									array_controls[dynamicCount].push({"control_type" : 1});
									array_controls[dynamicCount].push({"text_dynamicId" : new_control_dynamic_ids[flag]});
									array_controls[dynamicCount].push({"cb_label_value" : "<?php _e("Untitled", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_description" : ""});
									array_controls[dynamicCount].push({"cb_control_required" : "0"}) ;
									array_controls[dynamicCount].push({"cb_tooltip_txt" : ""});
									array_controls[dynamicCount].push({"cb_default_txt_val" : ""});
									array_controls[dynamicCount].push({"cb_admin_label" : "<?php _e("Untitled", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_show_email" : "0"}) ;
									array_controls[dynamicCount].push({"cb_button_set_outer_label" : ""});
									array_controls[dynamicCount].push({"cb_button_set_txt_input" : ""});
									array_controls[dynamicCount].push({"cb_button_set_txt_description" : ""});
									array_controls[dynamicCount].push({"cb_checkbox_alpha_filter": "0"});
									array_controls[dynamicCount].push({"cb_ux_checkbox_alpha_num_filter": "0"});
									array_controls[dynamicCount].push({"cb_checkbox_digit_filter": "0"});
									array_controls[dynamicCount].push({"cb_checkbox_strip_tag_filter": "0"});
									array_controls[dynamicCount].push({"cb_checkbox_trim_filter": "0"});
								}
							break;
							
							case 2:
								if(array_controls[dynamicCount].length == 0)
								{
									array_controls[dynamicCount].push({"control_type" : 2});
									array_controls[dynamicCount].push({"textarea_dynamicId" : new_control_dynamic_ids[flag]});
									array_controls[dynamicCount].push({"cb_label_value" :"<?php _e("Untitled", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_description" : ""});
									array_controls[dynamicCount].push({"cb_control_required": "0"});
									array_controls[dynamicCount].push({"cb_tooltip_txt" : ""});
									array_controls[dynamicCount].push({"cb_default_txt_val" : "" });
									array_controls[dynamicCount].push({"cb_admin_label" : "<?php _e("Untitled", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_show_email" : "0"});
									array_controls[dynamicCount].push({"cb_button_set_outer_label" : ""});
									array_controls[dynamicCount].push({"cb_button_set_txt_input" : ""});
									array_controls[dynamicCount].push({"cb_button_set_txt_description" : ""});
									array_controls[dynamicCount].push({"cb_checkbox_alpha_filter": "0"});
									array_controls[dynamicCount].push({"cb_ux_checkbox_alpha_num_filter": "0"});
									array_controls[dynamicCount].push({"cb_checkbox_digit_filter": "0"});
									array_controls[dynamicCount].push({"cb_checkbox_strip_tag_filter": "0"});
									array_controls[dynamicCount].push({"cb_checkbox_trim_filter": "0"});
								}
							break;
							case 3:
								if(array_controls[dynamicCount].length == 0)
								{
									array_controls[dynamicCount].push({"control_type" : 3});
									array_controls[dynamicCount].push({"email_dynamicId" : new_control_dynamic_ids[flag]});
									array_controls[dynamicCount].push({"cb_label_value" : "<?php _e("Email", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_description" : ""});
									array_controls[dynamicCount].push({"cb_control_required": "1"});
									array_controls[dynamicCount].push({"cb_tooltip_txt" :""});
									array_controls[dynamicCount].push({"cb_admin_label" : "<?php _e("Email", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_show_email" : "0"});
									array_controls[dynamicCount].push({"cb_button_set_outer_label" : ""});
									array_controls[dynamicCount].push({"cb_button_set_txt_input" : ""});
									array_controls[dynamicCount].push({"cb_button_set_txt_description" : ""});
									array_controls[dynamicCount].push({"cb_checkbox_alpha_filter": "0"});
									array_controls[dynamicCount].push({"cb_ux_checkbox_alpha_num_filter": "0"});
									array_controls[dynamicCount].push({"cb_checkbox_digit_filter": "0"});
									array_controls[dynamicCount].push({"cb_checkbox_strip_tag_filter": "0"});
									array_controls[dynamicCount].push({"cb_checkbox_trim_filter": "0"});
								}
							break;
							case 4:
								if(array_controls[dynamicCount].length == 0)
								{
									array_controls[dynamicCount].push({"control_type" : 4});
									array_controls[dynamicCount].push({"dropdown_dynamicId" : new_control_dynamic_ids[flag]});
									array_controls[dynamicCount].push({"cb_label_value" : "<?php _e("Untitled", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_control_required": "0"});
									array_controls[dynamicCount].push({"cb_tooltip_txt" : ""});
									array_controls[dynamicCount].push({"cb_dropdown_option_id" : ""});
									array_controls[dynamicCount].push({"cb_dropdown_option_val" : ""});
									array_controls[dynamicCount].push({"cb_admin_label" : "<?php _e("Untitled", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_show_email" : "0"});
									array_controls[dynamicCount].push({"cb_button_set_outer_label" :""});
									array_controls[dynamicCount].push({"cb_button_set_dropdown_menu" : ""});
									array_controls[dynamicCount].push({"cb_button_set_description" : ""});
								}
							break;
							case 5:
								if(array_controls[dynamicCount].length == 0)
								{
									array_controls[dynamicCount].push({"control_type" : 5});
									array_controls[dynamicCount].push({"checkbox_dynamicId" : new_control_dynamic_ids[flag]});
									array_controls[dynamicCount].push({"cb_label_value" : "<?php _e("Untitled", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_control_required": "0"});
									array_controls[dynamicCount].push({"cb_tooltip_txt" : ""});
									array_controls[dynamicCount].push({"cb_checkbox_option_id" : ""});
									array_controls[dynamicCount].push({"cb_checkbox_option_val" : ""});
									array_controls[dynamicCount].push({"cb_admin_label" : "<?php _e("Untitled", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_show_email" : "0"});
									array_controls[dynamicCount].push({"cb_button_set_outer_label" :""});
									array_controls[dynamicCount].push({"cb_button_set_description" : ""});
									array_controls[dynamicCount].push({"cb_button_set_options_outer_wrapper" : ""});
									array_controls[dynamicCount].push({"cb_button_set_options_wrapper" : ""});
									array_controls[dynamicCount].push({"cb_button_set_options_label" : ""});
								}
							break;
							
							case 6:
								if(array_controls[dynamicCount].length == 0)
								{
									array_controls[dynamicCount].push({"control_type" : 6});
									array_controls[dynamicCount].push({"radio_dynamicId" : new_control_dynamic_ids[flag]});
									array_controls[dynamicCount].push({"cb_label_value" : "<?php _e("Untitled", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_control_required": "0"});
									array_controls[dynamicCount].push({"cb_tooltip_txt" : ""});
									array_controls[dynamicCount].push({"cb_radio_option_id" : ""});
									array_controls[dynamicCount].push({"cb_radio_option_val" : ""});
									array_controls[dynamicCount].push({"cb_admin_label" : "<?php _e("Untitled", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_show_email" : "0"});
									array_controls[dynamicCount].push({"cb_button_set_outer_label" : ""});
									array_controls[dynamicCount].push({"cb_button_set_description" : ""});
									array_controls[dynamicCount].push({"cb_button_set_options_outer_wrapper" : ""});
									array_controls[dynamicCount].push({"cb_button_set_options_wrapper" : ""});
									array_controls[dynamicCount].push({"cb_button_set_options_label" : ""});	
								}
							break;
							case 9:
								if(array_controls[dynamicCount].length == 0)
								{
									array_controls[dynamicCount].push({"control_type" : 9});
									array_controls[dynamicCount].push({"file_upload_dynamicId" : new_control_dynamic_ids[flag]});
									array_controls[dynamicCount].push({"cb_label_value" : "<?php _e("File Upload", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_description" : ""});
									array_controls[dynamicCount].push({"cb_control_required": "0"});
									array_controls[dynamicCount].push({"cb_tooltip_txt" : ""});
									array_controls[dynamicCount].push({"cb_admin_label" : "<?php _e("File Upload", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_show_email" : "0"});
									array_controls[dynamicCount].push({"cb_allow_multiple_file" : "0"});
									array_controls[dynamicCount].push({"cb_allow_file_ext_upload" : "*.jpg,*.png,*.gif,*.bmp,*.txt,*.zip,*.rar"});
									array_controls[dynamicCount].push({"cb_maximum_file_allowed" : "1024"});
									array_controls[dynamicCount].push({"cb_uploaded_file_email_db" : "0"});
									array_controls[dynamicCount].push({"cb_button_set_outer_label_file" : ""});
									array_controls[dynamicCount].push({"cb_button_set_outer_description_fileuplod" : ""});
								}
							break;
							case 12:
								if(array_controls[dynamicCount].length == 0)
								{
									array_controls[dynamicCount].push({"control_type" : 12});
									array_controls[dynamicCount].push({"date_dynamicId" : new_control_dynamic_ids[flag]});
									array_controls[dynamicCount].push({"cb_label_value" : "<?php _e("Date", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_description" : ""});
									array_controls[dynamicCount].push({"cb_control_required": "0"});
									array_controls[dynamicCount].push({"cb_tooltip_txt" : ""});
									array_controls[dynamicCount].push({"cb_admin_label" : "<?php _e("Date", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_show_email" : ""});
									array_controls[dynamicCount].push({"cb_start_year" : "1900"});
									array_controls[dynamicCount].push({"cb_end_year" : "2100"});
									array_controls[dynamicCount].push({"cb_default_value_day" : (new Date).getDate()});
									array_controls[dynamicCount].push({"cb_default_value_month" : (new Date).getMonth()+1});
									array_controls[dynamicCount].push({"cb_default_value_year" : (new Date).getFullYear()});
									array_controls[dynamicCount].push({"cb_error_invalid" : ""});
									array_controls[dynamicCount].push({"cb_date_format" : "0"});
									array_controls[dynamicCount].push({"cb_button_set_outer_label" : ""});
									array_controls[dynamicCount].push({"cb_button_set_txt_input" : ""});
									array_controls[dynamicCount].push({"cb_button_set_description" : ""});
									array_controls[dynamicCount].push({"cb_date_day_dropdown" : ""});
									array_controls[dynamicCount].push({"cb_date_month_dropdown" : ""});
									array_controls[dynamicCount].push({"cb_date_year_dropdown" : ""});
								}
							break;
							case 13:
								if(array_controls[dynamicCount].length == 0)
								{
									array_controls[dynamicCount].push({"control_type" : 13});
									array_controls[dynamicCount].push({"time_dynamicId" : new_control_dynamic_ids[flag]});
									array_controls[dynamicCount].push({"cb_label_value" : "<?php _e("Time", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_description" : ""});
									array_controls[dynamicCount].push({"cb_control_required": "0"});
									array_controls[dynamicCount].push({"cb_tooltip_txt" : ""});
									array_controls[dynamicCount].push({"cb_admin_label" : "<?php _e("Time", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_show_email" : ""});
									array_controls[dynamicCount].push({"cb_hour_format" : "12"});
									array_controls[dynamicCount].push({"cb_hours" : ""});
									array_controls[dynamicCount].push({"cb_minutes" : ""});
									array_controls[dynamicCount].push({"cb_am_pm" : "0"});
									array_controls[dynamicCount].push({"cb_time_format" : "1"});
									array_controls[dynamicCount].push({"cb_button_set_outer_label" : ""});
									array_controls[dynamicCount].push({"cb_button_set_txt_input" : ""});
									array_controls[dynamicCount].push({"cb_button_set_description" : ""});
									array_controls[dynamicCount].push({"cb_button_set_time_hour_dropdown" : ""});
									array_controls[dynamicCount].push({"cb_button_set_time_minute_dropdown" : ""});
									array_controls[dynamicCount].push({"cb_button_set_time_am_pm_dropdown" : ""});
								}
							break;
							case 14:
								if(array_controls[dynamicCount].length == 0)
								{
									array_controls[dynamicCount].push({"control_type" : 14});
									array_controls[dynamicCount].push({"hidden_dynamicId" : new_control_dynamic_ids[flag]});
									array_controls[dynamicCount].push({"cb_label_value" : "<?php _e("Untitled(Hidden)", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_default_txt_val" : ""});
									array_controls[dynamicCount].push({"cb_admin_label" : "<?php _e("Untitled(Hidden)", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_show_email": "0"});
								}
							break;
							case 15:
								if(array_controls[dynamicCount].length == 0)
								{
									array_controls[dynamicCount].push({"control_type" : 15});
									array_controls[dynamicCount].push({"password_dynamicId" : new_control_dynamic_ids[flag]});
									array_controls[dynamicCount].push({"cb_label_value" : "<?php _e("Password", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_description" : ""});
									array_controls[dynamicCount].push({"cb_control_required": "0"});
									array_controls[dynamicCount].push({"cb_tooltip_txt" : ""});
									array_controls[dynamicCount].push({"cb_admin_label" : "<?php _e("Password", contact_bank); ?>"});
									array_controls[dynamicCount].push({"cb_show_email" : "0"});
									array_controls[dynamicCount].push({"cb_button_set_outer_label" : ""});
									array_controls[dynamicCount].push({"cb_button_set_txt_input" : ""});
									array_controls[dynamicCount].push({"cb_button_set_txt_description" : ""});
									array_controls[dynamicCount].push({"cb_checkbox_alpha_filter": "0"});
									array_controls[dynamicCount].push({"ux_checkbox_alpha_num_filter_": "0"});
									array_controls[dynamicCount].push({"cb_checkbox_digit_filter": "0"});
									array_controls[dynamicCount].push({"cb_checkbox_strip_tag_filter": "0"});
									array_controls[dynamicCount].push({"cb_checkbox_trim_filter": "0"});
								}
								break;
							}
						jQuery.ajax
						({
							type: "POST",
							url: ajaxurl + "?"+jQuery(form).serialize() + "&array_controls="+encodeURIComponent(JSON.stringify(array_controls[array_dynamicCount[flag]]))+"&form=0&control_type=1&param=submit_controls&action=add_contact_form_library",
							success : function(data) 
							{
								imaginaryCount++;
								var totalLength = parseInt(created_control_type.length) + parseInt(edit_created_control_type.length);
								if(imaginaryCount == totalLength)
								{
									setTimeout(function()
									{
										new_control_dynamic_ids.length = 0;
										created_control_type.length = 0;
										edit_control_dynamic_ids.length = 0;
										edit_created_control_type.length = 0;
										jQuery("#form_success_message").css("display","none");
										window.location.href = "admin.php?page=dashboard";
									}, 2000);
								}
							}
						});
					}
				}
				
				var field_edit = edit_created_control_type.length;
				for(flag = 0;flag<field_edit; flag++)
				{
					if(array_controls[edit_created_control_type[flag]].length > 0)
					{
						jQuery.ajax
						({
							type: "POST",
							url: ajaxurl + "?"+ jQuery(form).serialize() +  "&field_order="+field_order+"&form_id="+form_id+"&array_controls="+encodeURIComponent(JSON.stringify(array_controls[edit_created_control_type[flag]]))+"&form=0&control_type=1&param=submit_controls&action=edit_contact_form_library",
							success : function(data) 
							{
								imaginaryCount++;
								var totalLength = parseInt(created_control_type.length) + parseInt(edit_created_control_type.length);
								if(imaginaryCount == totalLength)
								{
									setTimeout(function()
									{
										new_control_dynamic_ids.length = 0;
										created_control_type.length = 0;
										jQuery("#form_success_message").css("display","none");
										window.location.href = "admin.php?page=dashboard";
									}, 2000);
								}
							}
						});
					}
					else
					{
						imaginaryCount++;
						var totalLength = parseInt(created_control_type.length) + parseInt(edit_created_control_type.length);
						if(imaginaryCount == totalLength)
						{
							setTimeout(function()
							{
								edit_control_dynamic_ids.length = 0;
								edit_created_control_type.length = 0;
								jQuery("#form_success_message").css("display","none");
								window.location.href = "admin.php?page=dashboard";
							}, 2000);
						}
					}
				}
			}
		});
	}
});
function show_url_control()
{
	var chk_redirect_url =  jQuery("#ux_chk_redirect_url").prop("checked");
	if(chk_redirect_url == true)
	{
		jQuery("#div_url").css("display","block");
	}
	else
	{
		jQuery("#div_url").css("display","none");
	}
}
</script>