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
											<input type="text" name="ux_form_name_txt" class="layout-span7" value="" id="ux_form_name_txt" placeholder="<?php _e( "Enter Form Name", contact_bank);?>" />
										</div>
									</div>
									<div id="left_block"></div>
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
									<input type="hidden" id="hdn_control_type" name="hdn_control_type" />
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
new_control_dynamic_ids = [];
created_control_type = [];
array_option_id_chk = [];// Array to store advance-dynamic-Ids of dynamic options of checkbox control.
array_options_chk = [];// Array to store values of dynamic options of checkbox control.
array_option_id_radio = [];// Array to store advance-dynamic-Ids of dynamic options of multiple control.
array_options_radio = [];// Array to store values of dynamic options of multiple control.
array_option_id_dropdown = [];// Array to store advance-dynamic-Ids of dynamic options of dropdown control.
array_options_dropdown = [];// Array to store values of dynamic options of dropdown control.
array_text = [];
array_textarea = [];
array_email = [];
array_dropdown = [];
array_checkbox = [];
array_multiple = [];
array_file_upload=[];
array_date = [];
array_time = [];
array_hidden = [];
array_password = [];
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
			console.log(order);
			for(flag=0;flag<order.length;flag++)
			{
				field_order_str = order[flag].split("div_");
				console.log(order[flag]);
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
	var control_request_type = control_type;
	jQuery("#hdn_control_type").val(control_type);
	var dynamicId = Math.floor((Math.random() * 1000)+1);
	jQuery("#hidden_dynamic_id").val(dynamicId);
	switch(parseInt(control_request_type))
	{
		case 1:
			create_control_div(dynamicId);
			created_control_type.push(1);
		break;
		case 2:
			create_control_div(dynamicId);
			created_control_type.push(2);
		break;
		case 3:
			create_control_div(dynamicId);
			created_control_type.push(3);
		break;
		case 4:
			create_control_div(dynamicId);
			created_control_type.push(4);
		break;
		case 5:
			create_control_div(dynamicId);
			created_control_type.push(5);
		break;
		case 6:
			create_control_div(dynamicId);
			created_control_type.push(6);
		break;
		case 9:
			var file_upload = jQuery.inArray(9,created_control_type);
			if(file_upload == -1)
			{
				create_control_div(dynamicId);
				created_control_type.push(9);
			}
		break;
		case 12:
			create_control_div(dynamicId);
			created_control_type.push(12);
		break;
		case 13:
			create_control_div(dynamicId);
			created_control_type.push(13);
		break;
		case 14:
			create_control_div(dynamicId);
			created_control_type.push(14);
		break;
		case 15:
			create_control_div(dynamicId);
			created_control_type.push(15);
		break;
	}
}
/* Function Name : create_control_div
 * Paramters : dynamicId
 * Return : None
 * Description : This Function is used to create the dynamic controls according to type of control.
 * Created in Version 1.0 
 * Last Modified : 1.0
 * Reasons for change : None
 */ 
function create_control_div(dynamicId)
{
	
	
	switch(parseInt(jQuery("#hdn_control_type").val()))
	{
		case 1:
			jQuery.ajax({
				type: "POST",
				url: ajaxurl + "?dynamicId="+dynamicId+"&field_id=1&param=create_textbox_control&action=create_textbox_library",
				
				success : function(data) 
				{
					jQuery("#left_block").append(data);
					new_control_dynamic_ids.push(dynamicId);
					array_text[dynamicId] = [];
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
					add_settings(dynamicId,1)
					});
				}
			});
		break;
		case 2:
			jQuery.ajax({
				type: "POST",
				url: ajaxurl + "?dynamicId="+dynamicId+"&field_id=2&param=create_textarea_control&action=create_textarea_library",
				
				success : function(data) 
				{
					jQuery("#left_block").append(data);
					new_control_dynamic_ids.push(dynamicId);
					array_textarea[dynamicId] = [];
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
					add_settings(dynamicId,2)
					});
				}
			});
		break;
		case 3:
			jQuery.ajax({
				type: "POST",
				url: ajaxurl + "?dynamicId="+dynamicId+"&field_id=3&param=create_email_control&action=create_email_library",
				
				success : function(data) 
				{
					jQuery("#left_block").append(data);
					new_control_dynamic_ids.push(dynamicId);
					array_email[dynamicId] = [];
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
						add_settings(dynamicId,3)
					});
				}
			});
		break;
		case 4:
			jQuery.ajax({
				type: "POST",
				url: ajaxurl + "?dynamicId="+dynamicId+"&field_id=4&param=create_select_control&action=create_dropdown_library",
				
				success : function(data) 
				{
					jQuery("#left_block").append(data);
					new_control_dynamic_ids.push(dynamicId);
					array_dropdown[dynamicId] = [];
					array_option_id_dropdown[dynamicId] = [];//Dynamic Array to store advance-dynamic-Ids of dynamic options of dropdown control.
					array_options_dropdown[dynamicId] = [];// Dynamic Array to store values of dynamic options of dropdown control.
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
						add_settings(dynamicId,4)
					});
				}
			});
		break;
		case 5:
		jQuery.ajax({
			type: "POST",
			url: ajaxurl + "?dynamicId="+dynamicId+"&field_id=5&param=create_check_control&action=create_checkbox_library",
			
			success : function(data) 
			{
				jQuery("#left_block").append(data);
				new_control_dynamic_ids.push(dynamicId);
				array_checkbox[dynamicId] = [];
				array_option_id_chk[dynamicId] = [];// Dynamic Array to store advance-dynamic-Ids of dynamic options of checkbox control.
				array_options_chk[dynamicId] = [];// Dynamic Array to store values of dynamic options of checkbox control.
				jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
					add_settings(dynamicId,5)
				});
			}
			});
		break;
		case 6:
		jQuery.ajax({
			type: "POST",
			url: ajaxurl + "?dynamicId="+dynamicId+"&field_id=6&param=create_multiple_control&action=create_multiple_library",
			
			success : function(data) 
			{
				jQuery("#left_block").append(data);
				new_control_dynamic_ids.push(dynamicId);
				array_multiple[dynamicId] = [];
				array_option_id_radio[dynamicId] = [];// Dynamic Array to store advance-dynamic-Ids of dynamic options of Multiple control.
				array_options_radio[dynamicId] = [];// Dynamic Array to store values of dynamic options of Multiple control.
				jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
					add_settings(dynamicId,6)
				});
			}
			});
		break;
		case 9:
			jQuery.ajax({
				type: "POST",
				url: ajaxurl + "?dynamicId="+dynamicId+"&field_id=9&param=create_txt_file_control&action=create_txt_file_library",
				
				success : function(data) 
				{
					jQuery("#left_block").append(data);
					new_control_dynamic_ids.push(dynamicId);
					array_file_upload[dynamicId] = [];
					jQuery("#AjaxUploaderFilesButton").css('float','left');
					jQuery("#AjaxUploaderFilesButton").css('visibility','visible');
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
						add_settings(dynamicId,9)
					});
				}
			});
		break;
		case 12:
		jQuery.ajax({
				type: "POST",
				url: ajaxurl + "?dynamicId="+dynamicId+"&field_id=12&param=create_date_control&action=create_date_library",
				
				success : function(data) 
				{
					jQuery("#left_block").append(data);
					new_control_dynamic_ids.push(dynamicId);
					array_date[dynamicId] = [];
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
						add_settings(dynamicId,12)
					});
				}
			});
		break;
		case 13:
		jQuery.ajax({
				type: "POST",
				url: ajaxurl + "?dynamicId="+dynamicId+"&field_id=13&param=create_select_time_control&action=create_time_library",
				
				success : function(data) 
				{
					jQuery("#left_block").append(data);
					new_control_dynamic_ids.push(dynamicId);
					jQuery("#select_hr_24_"+dynamicId).hide();
					array_time[dynamicId] = [];
					 jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
						add_settings(dynamicId,13)
					});
				}
			});
		break;
		case 14:
		jQuery.ajax({
				type: "POST",
				url: ajaxurl + "?dynamicId="+dynamicId+"&field_id=14&param=create_txt_hide_control&action=create_hidden_library",
				
				success : function(data) 
				{
					jQuery("#left_block").append(data);
					new_control_dynamic_ids.push(dynamicId);
					jQuery(".hovertip").tooltip();	
					array_hidden[dynamicId] = [];
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
						add_settings(dynamicId,14)
					});
				}
			});
		break;
		case 15:
		jQuery.ajax({
				type: "POST",
				url: ajaxurl + "?dynamicId="+dynamicId+"&field_id=15&param=create_txt_password_control&action=create_password_library",
				
				success : function(data) 
				{
					jQuery("#left_block").append(data);
					new_control_dynamic_ids.push(dynamicId);
					array_password[dynamicId] = [];
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
						add_settings(dynamicId,15)
					});
				}
			});
		break;
	}
}
/* Function Name : add_settings
 * Paramters : dynamicId
 * Return : None
 * Description : This Function is used for change or to add new setting to dynamic controls.
 * Created in Version 1.0 
 * Last Modified : 1.0
 * Reasons for change : None
 */ 
function add_settings(dynamicId,field_type)
{
	if(field_type == 1 && array_text[dynamicId].length != 0)
	{
		if( array_text[dynamicId][1] == dynamicId)
		{
			
			var count = array_text[dynamicId].length;
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&field_type="+field_type+"&count="+count+"&array_text_dynamicId="+array_text[dynamicId]+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				if(array_text[dynamicId][7] == true)
				{
					jQuery("#tr_def_val_blur_"+dynamicId).css("display","block");
				}
				show_Popup();
			});
		}
		
	}
	else if(field_type == 2 && array_textarea[dynamicId].length != 0)
	{		
		if( array_textarea[dynamicId][1] == dynamicId)
		{
			var count = array_textarea[dynamicId].length;
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&field_type="+field_type+"&count="+count+"&array_textarea_dynamicId="+array_textarea[dynamicId]+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				
				if(array_textarea[dynamicId][7] == true)
				{
					jQuery("#tr_def_val_blur_"+dynamicId).css("display","block");
					
				}
				show_Popup();
			});
		}
	}
	else if(field_type == 3 && array_email[dynamicId].length != 0)
	{
		if( array_email[dynamicId][1] == dynamicId)
		{
			
			var count = array_email[dynamicId].length;
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&field_type="+field_type+"&count="+count+"&array_email_dynamicId="+array_email[dynamicId]+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	else if(field_type == 4 && array_dropdown[dynamicId].length!=0)
	{
		if( array_dropdown[dynamicId][1] == dynamicId)
		{
			var count = array_dropdown[dynamicId].length;
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&field_type="+field_type+"&count="+count+"&array_dropdown_dynamicId="+array_dropdown[dynamicId]+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	else if(field_type == 5 && array_checkbox[dynamicId].length != 0)
	{
		if( array_checkbox[dynamicId][1] == dynamicId)
		{
			var count = array_checkbox[dynamicId].length;
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&field_type="+field_type+"&count="+count+"&array_checkbox_dynamicId="+array_checkbox[dynamicId]+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	else if(field_type == 6 && array_multiple[dynamicId].length != 0)
	{
		
		if( array_multiple[dynamicId][1] == dynamicId)
		{
			var count = array_multiple[dynamicId].length;
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&field_type="+field_type+"&count="+count+"&array_multiple_dynamicId="+array_multiple[dynamicId]+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	else if(field_type == 9 && array_file_upload[dynamicId].length != 0)
	{
		if( array_file_upload[dynamicId][1] == dynamicId)
		{
			var count = array_file_upload[dynamicId].length;
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&field_type="+field_type+"&count="+count+"&array_file_upload_dynamicId="+array_file_upload[dynamicId]+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	else if(field_type == 12 && array_date[dynamicId].length != 0)
	{
		if( array_date[dynamicId][1] == dynamicId)
		{
			var count = array_date[dynamicId].length;
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&field_type="+field_type+"&count="+count+"&array_date_dynamicId="+array_date[dynamicId]+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				dropdown_heading(dynamicId);
				jQuery("#ux_default_day_type_"+dynamicId).val(array_date[dynamicId][10]);
				jQuery("#ux_default_month_type_"+dynamicId).val(array_date[dynamicId][11]);
				jQuery("#ux_default_year_type_"+dynamicId).val(array_date[dynamicId][12]);
				jQuery("#select_day_"+dynamicId).val(array_date[dynamicId][10]);
				jQuery("#select_month_"+dynamicId).val(array_date[dynamicId][11]);
				jQuery("#select_year_"+dynamicId).val(array_date[dynamicId][12]);
				show_Popup();
			});
		}
	}
	else if(field_type == 13 && array_time[dynamicId].length!=0)
	{
		
		if( array_time[dynamicId][1] == dynamicId)
		{
			var count = array_time[dynamicId].length;
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&field_type="+field_type+"&count="+count+"&array_time_dynamicId="+array_time[dynamicId]+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				ux_minute_format(dynamicId);
				jQuery("#ux_drop_hour_time_"+dynamicId).val(array_time[dynamicId][8]);
				jQuery("#ux_default_hours_"+dynamicId).val(array_time[dynamicId][9]);
				jQuery("#ux_default_minute_"+dynamicId).val(array_time[dynamicId][10]);
				jQuery("#ux_default_am_"+dynamicId).val(array_time[dynamicId][11]);
				jQuery("#ux_minute_format_"+dynamicId).val(array_time[dynamicId][12]);
				jQuery("#select_hr_"+dynamicId).val(array_time[dynamicId][9]);
				jQuery("#select_min_"+dynamicId).val(array_time[dynamicId][10]);
				jQuery("#select_am_"+dynamicId).val(array_time[dynamicId][11]);
				show_Popup();
			});
		}
	}
	else if(field_type == 14 && array_hidden[dynamicId].length!=0)
	{
		if( array_hidden[dynamicId][1] == dynamicId)
		{
			var count = array_hidden[dynamicId].length;
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&field_type="+field_type+"&count="+count+"&array_hidden_dynamicId="+array_hidden[dynamicId]+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
			});
		}
	}
	else if(field_type == 15 && array_password[dynamicId].length != 0)
	{
		if( array_password[dynamicId][1] == dynamicId)
		{
			var count = array_password[dynamicId].length;
			jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&field_type="+field_type+"&count="+count+"&array_password_dynamicId="+array_password[dynamicId]+"&count_id=1&param=add_settings_div&action=add_contact_form_library", function(data)
			{
				jQuery("#setting_controls_postback").html(data);
				show_Popup();
				
			});
		}
	}
	else
	{
		jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&field_type="+field_type+"&count_id=0&param=add_settings_div&action=add_contact_form_library", function(data)
		{
			jQuery("#setting_controls_postback").html(data);
			jQuery("#ux_default_hours_24_"+dynamicId).hide();
			show_Popup();
			if(field_type == 4)
			{
			array_option_id_dropdown[dynamicId] = [];
			array_options_dropdown[dynamicId] = [];
			}
			if(field_type == 5)
			{
				array_option_id_chk[dynamicId] = [];
				array_options_chk[dynamicId] = [];
			}
			if(field_type == 6)
			{
				array_options_radio[dynamicId] = [];
				array_option_id_radio[dynamicId] = [];
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
function delete_textbox(div_id,dynamicId)
{
	var index = jQuery.inArray(dynamicId,new_control_dynamic_ids);
	if(index > -1)
	{
		jQuery("#" + div_id.id).remove();
		new_control_dynamic_ids.splice(index, 1);
		created_control_type.splice(index, 1);
		jQuery("#tabs-nohdr_"+dynamicId).remove();
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
	jQuery("#setting_controls_postback").fadeIn(500);
}
function CloseLightbox()
{
	jQuery("#setting_controls_postback").css('display','none');
	jQuery("#fade").fadeOut(500);
}
jQuery("#ux_dynamic_form_submit").validate
({
	rules: 
	{
		ux_form_name_txt: "required"
	},
	submitHandler: function(form)
	{
		jQuery("#submit_button").hide();
		jQuery("#form_success_message").css("display","block");
		var form_name = jQuery("#ux_form_name_txt").val();
		var field_no = created_control_type.length;
		jQuery.ajax({
				type: "POST",
				url: ajaxurl + "?form_name="+form_name+"&field_order="+field_order+"&new_control_dynamic_ids="+new_control_dynamic_ids+"&created_control_type="+created_control_type+"&field_dynamic_id="+field_dynamic_id+"&form=1&param=submit_controls&action=add_contact_form_library",
				
				success : function(data) 
				{
					var form_id = data;
					for(flag = 0;flag<field_no; flag++)
					{
						switch(parseInt(created_control_type[flag]))
						{
							case 1:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
									type: "POST",
									url: ajaxurl + "?"+ jQuery(form).serialize() + "&dynamicId="+dynamicId+"&array_text="+encodeURIComponent(array_text[dynamicId])+"&form=0&control_type=1&param=submit_controls&action=add_contact_form_library",
									
									success : function(data) 
									{
									}
								});
							break;
							case 2:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
									type: "POST",
									url: ajaxurl + "?"+ jQuery(form).serialize() + "&dynamicId="+dynamicId+"&array_textarea="+encodeURIComponent(array_textarea[dynamicId])+"&form=0&control_type=2&param=submit_controls&action=add_contact_form_library",
									
									success : function(data) 
									{	
										
									}
								});
							break;
							case 3:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
									type: "POST",
									url: ajaxurl + "?"+jQuery(form).serialize() + "&dynamicId="+dynamicId+"&array_email="+encodeURIComponent(array_email[dynamicId])+"&form=0&control_type=3&param=submit_controls&action=add_contact_form_library",
									
									success : function(data) 
									{	
										
									}
								});
							break;
							case 4:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
									type: "POST",
									url: ajaxurl + "?"+jQuery(form).serialize() + "&dynamicId="+dynamicId+"&array_dropdown="+encodeURIComponent(array_dropdown[dynamicId])+"&form=0&control_type=4&param=submit_controls&action=add_contact_form_library",
									
									success : function(data) 
									{	
									}
								});
							break;
							case 5:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
									type: "POST",
									url: ajaxurl + "?"+jQuery(form).serialize() + "&dynamicId="+dynamicId+"&array_checkbox="+encodeURIComponent(array_checkbox[dynamicId])+"&form=0&control_type=5&param=submit_controls&action=add_contact_form_library",
									
									success : function(data) 
									{	
										
									}
								});
							break;
							case 6:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
									type: "POST",
									url: ajaxurl + "?"+jQuery(form).serialize() + "&dynamicId="+dynamicId+"&array_multiple="+encodeURIComponent(array_multiple[dynamicId])+"&form=0&control_type=6&param=submit_controls&action=add_contact_form_library",
									
									success : function(data) 
									{	
										
									}
								});
							break;
							case 9:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
									type: "POST",
									url: ajaxurl + "?"+jQuery(form).serialize() + "&dynamicId="+dynamicId+"&array_file_upload="+encodeURIComponent(array_file_upload[dynamicId])+"&form=0&control_type=9&param=submit_controls&action=add_contact_form_library",
									
									success : function(data) 
									{	
										
									}
								});
							break;
							case 12:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
									type: "POST",
									url: ajaxurl + "?"+jQuery(form).serialize() + "&dynamicId="+dynamicId+"&array_date="+encodeURIComponent(array_date[dynamicId])+"&form=0&control_type=12&param=submit_controls&action=add_contact_form_library",
									
									success : function(data) 
									{	
									}
								});
							break;
							case 13:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
									type: "POST",
									url: ajaxurl + "?"+jQuery(form).serialize() + "&dynamicId="+dynamicId+"&array_time="+encodeURIComponent(array_time[dynamicId])+"&form=0&control_type=13&param=submit_controls&action=add_contact_form_library",
									
									success : function(data) 
									{
								
										
									}
								});
							break;
							case 14:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
									type: "POST",
									url: ajaxurl + "?"+jQuery(form).serialize() + "&dynamicId="+dynamicId+"&array_hidden="+encodeURIComponent(array_hidden[dynamicId])+"&form=0&control_type=14&param=submit_controls&action=add_contact_form_library",
									
									success : function(data) 
									{
								
										
									}
								});
							break;
							case 15:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
									type: "POST",
									url: ajaxurl + "?"+jQuery(form).serialize() + "&dynamicId="+dynamicId+"&array_password="+encodeURIComponent(array_password[dynamicId])+"&form=0&control_type=15&param=submit_controls&action=add_contact_form_library",
									
									success : function(data) 
									{
										
									}
								});
							break;
						}
					}
					setTimeout(function()
					{
						jQuery("#form_success_message").css("display","none");
						window.location.href = "admin.php?page=dashboard";
					}, 2000);
			}
		});
	}
});
</script>