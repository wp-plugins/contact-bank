<form id="ux_dynamic_form_submit" class="layout-form">
	<div class="fluid-layout">
		<div class="layout-span12">
			<div class="widget-layout">
				<div class="widget-layout-title">
					<h4><?php _e( "Add New Form", contact_bank ); ?></h4>
				</div>
				<div class="widget-layout-body">
					<a class="btn btn-info" href="admin.php?page=dashboard"><?php _e("Back to Dashboard", contact_bank);?></a>
					<div class="separator-doubled"></div>
					<div id="form_success_message" class="message green" style="display: none;">
						<span>
							<strong><?php _e("Form Submited. Kindly wait for the redirect.", contact_bank); ?></strong>
						</span>
					</div>
					<div class="fluid-layout">
						<div class="layout-span9">
							<div class="widget-layout">
								<div class="widget-layout-title">
									<h4><?php _e( "Form", contact_bank ); ?></h4>
								</div>
								<div class="widget-layout-body" >
									<div class="layout-control-group div_border" style="border: 1px dashed #B6B4B4;padding: 5px;cursor: default" id="div_100">
										<label class="layout-control-label"><?php _e('Form Name :', contact_bank);?> </label>
										<span style="display: block" class="error">*</span>
										<div class="layout-controls hovertip" id="show_tooltip100">
											<input type="text" name="ux_txt_form_name" class="layout-span7" value="" id="ux_txt_form_name" placeholder="<?php _e( "Enter Form Name", contact_bank);?>" />
										</div>
									</div>
									<div class="layout-control-group div_border" style="border: 1px dashed #B6B4B4;padding: 5px;cursor: default">
										<label class="layout-control-label"><?php _e('Success Message :', contact_bank);?> </label>
										<span style="display: block" class="error">*</span>
										<div class="layout-controls hovertip" id="show_tooltip100">
											<input type="text" name="ux_txt_sucess_message" class="layout-span7" value="" id="ux_txt_sucess_message" placeholder="<?php _e( "Enter Success Message", contact_bank);?>" />
										</div>
									</div>
									<div class="layout-control-group div_border" style="border: 1px dashed #B6B4B4;padding: 5px;cursor: default">
										<label class="layout-control-label"><?php _e('Redirect URL :', contact_bank);?> </label>
										<div class="layout-controls hovertip" id="show_tooltip100">
											<input type="checkbox"  id="ux_chk_redirect_url" name="ux_chk_redirect_url" value="1" onclick="show_url_control();" style="margin-top: 8px;" />
										</div>
									</div>
									<div class="layout-control-group div_border" id="div_url" style="border: 1px dashed #B6B4B4;padding: 5px;cursor: default;display: none;" >
										<label class="layout-control-label"><?php _e('URL :', contact_bank);?> </label>
										<span style="display: block" class="error">*</span>
										<div class="layout-controls hovertip" id="show_tooltip100">
											<input type="text" name="ux_txt_redirect_url" class="layout-span7" value="" id="ux_txt_redirect_url" placeholder="<?php _e( "Enter Redirect URL", contact_bank);?>" />
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
											<div class="layout-controls" id="show_tooltip">
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
											<span id="txt_required_" class="error">*</span>
											<div class="layout-controls" id="show_tooltip">	
												<input class="hovertip layout-span7" data-original-title="<?php _e( "Hidden", contact_bank ); ?>" type="text" id="ux_txt_hidden_control_" name="ux_txt_hidden_control_" />
												<a class="btn btn-info inline" id="add_setting_control_" href="#setting_controls_postback"  ><?php _e( "Settings", contact_bank ); ?></a>	
												<a style="cursor:pointer;" id=anchor_del_ >
													<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px"/>
												</a>
												<br />
												<span class="span-description" id="txt_description_"></span>
											</div>
										</div>
										<div class="layout-control-group div_border" id="div_15_15" style="display: none;">
											<label class="layout-control-label" id="control_label_" ><?php _e("Password", contact_bank); ?> : </label>
											<span id="txt_required_" class="error">*</span>
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
								</div>
							</div>
							<div class="layout-control-group">
								<input  class="btn btn-info layout-span2" type="submit" id="submit_button" name="submit_button"  value="<?php _e( "Save", contact_bank);?>" /></td>
							</div>
						</div>
						<div class="layout-span3" id="right_div">
							<div class="widget-layout">
								<div class="widget-layout-title">
									<h4><?php _e( "Control Buttons", contact_bank ); ?></h4>
								</div>
								<div class="widget-layout-body">
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_textbox" name="btn_textbox" value="<?php _e('Text Box', contact_bank); ?>"  onclick="create_control(1);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12"  type="button" id="btn_textarea" name="btn_textarea" value="<?php _e('Text Area', contact_bank); ?>"  onclick="create_control(2);" />
									</div>	
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_email" name="btn_email" value="<?php _e('Email Address', contact_bank); ?>"  onclick="create_control(3);" />
									</div>	
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_dropdown" name="btn_dropdown" value="<?php _e('Dropdown Menu', contact_bank); ?>"  onclick="create_control(4);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_checkbox" name="btn_checkbox" value="<?php _e('Checkboxes', contact_bank); ?>"  onclick="create_control(5);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_multiple" name="btn_multiple" value="<?php _e('Multiple Choice', contact_bank); ?>"  onclick="create_control(6);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_file_upload" name="btn_file_upload" value="<?php _e('File Upload', contact_bank); ?>" onclick="create_control(9);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_date" name="btn_date" value="<?php _e('Date', contact_bank); ?>" onclick="create_control(12);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_time" name="btn_time" value="<?php _e('Time', contact_bank); ?>" onclick="create_control(13);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_hidden" name="btn_hidden" value="<?php _e('Hidden', contact_bank); ?>" onclick="create_control(14);" />
									</div>
									<div class="layout-control-group">
										<input class="btn btn-info layout-span12" type="button" id="btn_Password" name="btn_Password" value="<?php _e('Password', contact_bank); ?>" onclick="create_control(15);" />
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
jQuery(document).ready(function()
{
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
});
var dynamicCount = 0;

array_controls = [];
var array_dynamicCount = [];
new_control_dynamic_ids = [];
created_control_type = [];
array_option_id_chk = [];// Array to store advance-dynamic-Ids of dynamic options of checkbox control.
array_options_chk = [];// Array to store values of dynamic options of checkbox control.
array_option_id_radio = [];// Array to store advance-dynamic-Ids of dynamic options of multiple control.
array_options_radio = [];// Array to store values of dynamic options of multiple control.
array_option_id_dropdown = [];// Array to store advance-dynamic-Ids of dynamic options of dropdown control.
array_options_dropdown = [];// Array to store values of dynamic options of dropdown control.
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
			field_order = [];
			field_dynamic_id = [];
			var order = jQuery("#left_block").sortable('toArray');
			
			for(flag=0;flag<order.length;flag++)
			{
				field_order_str = order[flag].split("div_");
				
				field_order.push(field_order_str[1].split("_")[1]);
				field_dynamic_id.push(field_order_str[1].split("_")[0]);
			}
			
		}
	});
});
/* Function Name : create_control
 * Paramters : control_type
 * Return : None
 * Description : This Function is used to generate Dynamic Id for all new created controls and check which request type of created control and call the create_control_div function.
 * Created in Version 1.0 
 * Last Modified : 1.0
 * Reasons for change : None
 */ 
function create_control(control_type)
{
	if(control_type == 9)
	{	
		if(jQuery.inArray(9,created_control_type) != -1)
		{
			alert("<?php _e( "Only One File Uploader can be used on a Form. ", contact_bank ); ?>");
			return;
		}
	}
	dynamicCount = parseInt(dynamicCount) + 1;

	array_dynamicCount.push(dynamicCount);
	array_controls[dynamicCount] = [];
	var dynamicId = Math.floor((Math.random()*100000)+1);
	new_control_dynamic_ids.push(dynamicId);
	created_control_type.push(control_type);
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
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+","+dynamicCount+",1)");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_1,"+dynamicId+",1)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_1").attr("style","display:block");
			
			
			
		break;
		case 2:
			jQuery("#div_2_2").clone(false).attr("id","div_"+dynamicId+"_2").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_2").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_2").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_2").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("textarea[type='textarea']").attr("id","ux_textarea_control_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId ).children("textarea[type='textarea']").attr("name","ux_textarea_control_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+","+dynamicCount+",2)");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_2,"+dynamicId+",2)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_2").attr("style","display:block");
			
			
		break;
		case 3:
			jQuery("#div_3_3").clone(false).attr("id","div_"+dynamicId+"_3").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_3").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_3").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_3").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#div_"+dynamicId+"_3" ).children("input[type='text']").attr("id","ux_txt_email_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+","+dynamicCount+",3)");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_3,"+dynamicId+",3)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_3").attr("style","display:block");

			
		break;
		case 4:
			jQuery("#div_4_4").clone(false).attr("id","div_"+dynamicId+"_4").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_4").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_4").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_4").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("select[type='select']").attr("id","ux_ddl_select_control"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("select[type='select']").attr("name","ux_ddl_select_control"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+","+dynamicCount+",4)");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_4,"+dynamicId+",4)");
			jQuery("#div_"+dynamicId+"_4").attr("style","display:block");

			
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
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+","+dynamicCount+",5)");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_5,"+dynamicId+",5)");
			jQuery("#div_"+dynamicId+"_5").attr("style","display:block");
			
			
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
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+","+dynamicCount+",6)");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_6,"+dynamicId+",6)");
			jQuery("#div_"+dynamicId+"_6").attr("style","display:block");

			
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
				jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+","+dynamicCount+",9)");
				jQuery("#show_tooltip"+dynamicId).children(".delete_control").attr("id","anchor_del_"+dynamicId);
				jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_9,"+dynamicId+",9)");
				jQuery("#show_tooltip"+dynamicId).children("label.hovertip").attr("id","tip"+dynamicId);
				jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
				jQuery("#div_"+dynamicId+"_9").attr("style","display:block");
			
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
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+","+dynamicCount+",12)");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_12,"+dynamicId+",12)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_12").attr("style","display:block");
			jQuery("#ux_ddl_select_day_"+dynamicId).val((new Date).getDate());
			jQuery("#ux_ddl_select_month_"+dynamicId).val((new Date).getMonth()+1);
			jQuery("#ux_ddl_select_year_"+dynamicId).val((new Date).getFullYear());
			
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
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+","+dynamicCount+",13)");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_13,"+dynamicId+",13)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_13").attr("style","display:block");
			
		break;
		case 14:
			jQuery("#div_14_14").clone(false).attr("id","div_"+dynamicId+"_14").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_14").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_14").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_14").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("input[type='text']").attr("id","ux_txt_hidden_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("input[type='text']").attr("name","ux_txt_hidden_control_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+","+dynamicCount+",14)");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_14,"+dynamicId+",14)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_14").attr("style","display:block");
			
		break;
		case 15:
			jQuery("#div_15_15").clone(false).attr("id","div_"+dynamicId+"_15").appendTo("#left_block");
			jQuery("#div_"+dynamicId+"_15").children("label").attr("id","control_label_"+dynamicId);
			jQuery("#div_"+dynamicId+"_15").children("span").attr("id","txt_required_"+dynamicId);
			jQuery("#div_"+dynamicId+"_15").children("div").attr("id","show_tooltip"+dynamicId);
			jQuery("#show_tooltip"+dynamicId ).children("input[type='password']").attr("id","ux_txt_password_control_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId ).children("input[type='password']").attr("name","ux_txt_password_control_"+dynamicId); 
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("id","add_setting_control_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("a.btn").attr("onclick","add_settings("+dynamicId+","+dynamicCount+",15)");
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_").attr("id","anchor_del_"+dynamicId);
			jQuery("#show_tooltip"+dynamicId).children("#anchor_del_"+dynamicId).attr("onclick","delete_textbox(div_"+dynamicId+"_15,"+dynamicId+",15)");
			jQuery("#show_tooltip"+dynamicId).children("span").attr("id","txt_description_"+dynamicId);
			jQuery("#div_"+dynamicId+"_15").attr("style","display:block");
			
		break;
	}
}
function add_settings(dynamicId,dynamicCount,field_type)
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
				jQuery("#ux_ddl_select_year_"+dynamicId).val(array_controls[dynamicCount][12].cb_default_value_year);
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
				ux_minute_format(dynamicId);
				jQuery("#ux_drop_hour_time_"+dynamicId).val(array_controls[dynamicCount][8].cb_hour_format);
				jQuery("#ux_default_hours_"+dynamicId).val(array_controls[dynamicCount][9].cb_hours);
				jQuery("#ux_default_minute_"+dynamicId).val(array_controls[dynamicCount][10].cb_minutes);
				jQuery("#ux_default_am_"+dynamicId).val(array_controls[dynamicCount][11].cb_am_pm);
				jQuery("#ux_minute_format_"+dynamicId).val(array_controls[dynamicCount][12].cb_time_format);
				jQuery("#select_hr_"+dynamicId).val(array_controls[dynamicCount][9].cb_hours);
				jQuery("#ux_ddl_select_minute_"+dynamicId).val(array_controls[dynamicCount][10].cb_minutes);
				jQuery("#ux_ddl_select_ampm_"+dynamicId).val(array_controls[dynamicCount][11].cb_am_pm);
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
			jQuery("#ux_default_hours_24_"+dynamicId).hide();
			show_Popup();
			if(field_type == 4)
			{
				array_option_id_dropdown[dynamicCount] = [];
				array_options_dropdown[dynamicCount] = [];
			}
			if(field_type == 5)
			{
				array_option_id_chk[dynamicCount] = [];
				array_options_chk[dynamicCount] = [];
			}
			if(field_type == 6)
			{
				array_options_radio[dynamicCount] = [];
				array_option_id_radio[dynamicCount] = [];
			}
			if(field_type == 12)
			{
				 default_day(dynamicId);
				 dropdown_heading(dynamicId);
			}
		});
	}
}
/* Function Name : div_show
 * Paramters : dynamicId
 * Return : None
 * Description : This Function is used Drag and Drop of controls into fieldset .
 * Created in Version 1.0 
 * Last Modified : 1.0
 * Reasons for change : None
 */ 
function div_show(dynamicId,field_id)
{
	jQuery("#AjaxUploaderFilesButton").css('float','left');
	jQuery("#add_setting_control_"+dynamicId).css('display','inline');
	jQuery("#anchor_del_"+dynamicId).css('display','inline');	
	jQuery("#add_setting_control_"+dynamicId).css('visibility','visible');
	jQuery("#anchor_del_"+dynamicId).css('visibility','visible');
}
function div_hide(dynamicId)
{
	jQuery("#anchor_del_"+dynamicId).css('visibility','hidden');
	jQuery("#add_setting_control_"+dynamicId).css('visibility','hidden');
}
function img_show(dynamicId)
{
	jQuery('#anchor_del_'+dynamicId + 'img').attr("src","<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg-hover.png");
}
function img_hide(dynamicId)
{
	jQuery('#anchor_del_'+dynamicId + 'img').attr("src","<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png");
}
function delete_textbox(div_id,dynamicId,control_type)
{
	var index = jQuery.inArray(dynamicId,new_control_dynamic_ids);
	if(index > -1)
	{
		jQuery("#" + dynamicId).remove();
		new_control_dynamic_ids.splice(index, 1);
		created_control_type.splice(index, 1);
		if(control_type == 9)
		{
			jQuery(".file_upload").attr("style","display:none");
		}
		else
		{
			jQuery("#"+div_id.id).remove();
		}
		jQuery("#tabs-nohdr_"+dynamicId).remove();
		if(created_control_type.length == 0)
		{
			jQuery("#hidden_dynamic_id").val("");
		}
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
		jQuery("#form_success_message").css("display","block");
		jQuery('body,html').animate({
		scrollTop: jQuery('body,html').position().top}, 'slow');
		var form_name = jQuery("#ux_txt_form_name").val();
		var field_no = created_control_type.length;
		var count =0; 
		jQuery.ajax
		({
			type: "POST",
			url: ajaxurl + "?form_name="+form_name+"&field_order="+field_order+"&new_control_dynamic_ids="+new_control_dynamic_ids+"&created_control_type="+created_control_type+"&field_dynamic_id="+field_dynamic_id+"&ux_sucess_message="+jQuery("#ux_txt_sucess_message").val()+"&chk_redirect_url="+jQuery("#ux_chk_redirect_url").prop("checked")+"&ux_redirect_url="+jQuery("#ux_txt_redirect_url").val()+"&form=1&param=submit_controls&action=add_contact_form_library",
			success : function(data) 
			{
				
				for(flag = 0;flag<array_dynamicCount.length; flag++)
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
						url: ajaxurl + "?"+ jQuery(form).serialize() + "&array_controls="+encodeURIComponent(JSON.stringify(array_controls[array_dynamicCount[flag]]))+"&form=0&control_type=1&param=submit_controls&action=add_contact_form_library",
						success : function(data)
						{
							if(field_no == flag)
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
				if(new_control_dynamic_ids.length == 0)
				{
					setTimeout(function()
					{
						jQuery("#form_success_message").css("display","none");
						window.location.href = "admin.php?page=dashboard";
					}, 2000);
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