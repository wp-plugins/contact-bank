<?php 
global $wpdb;

$form_id = intval($_REQUEST["id"]);
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
											<input type="text" name="ux_form_name_txt" class="layout-span7"  value ="<?php echo $form_name;?>" id="ux_form_name_txt" placeholder="<?php _e( "Enter Form Name", contact_bank);?>" />
										</div>
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
													"SELECT * FROM " .contact_bank_dynamic_settings_form().  " WHERE " .contact_bank_dynamic_settings_form().".dynamicId = %d ORDER BY dynamic_settings_id ASC",
													$column_dynamicId
												)
											);
											
											?>
											<script type="text/javascript"> 
												jQuery(function()
												{
													
													edit_control_dynamic_ids.push(<?php echo $column_dynamicId ; ?>);
													edit_created_control_type.push(<?php echo $field_type ;?>);
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
									<input type="hidden" id="hdn_control_type" name="hdn_control_type" />
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
array_text = [];
array_textarea = [];
array_email = [];
array_dropdown = [];
array_checkbox = [];
array_multiple = [];
array_captcha = [];
array_file_upload=[];
array_recaptcha=[];
array_date = [];
array_time = [];
array_hidden = [];
array_password = [];
delete_control_dynamicIds = [];// Array to store dynamicids of controls to be deleted.
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
});
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
	
	var control_request_type = control_type;
	jQuery("#hdn_control_type").val(control_type);
	if(dynamicId == undefined)
	{
		dynamicId = Math.floor((Math.random() * 1000)+1);
	}
	
	switch(parseInt(control_request_type))
	{
		case 1:
		create_control_div(dynamicId,arrayControl);
		break;
		case 2:
		create_control_div(dynamicId,arrayControl);
		break;
		case 3:
		create_control_div(dynamicId,arrayControl);
		break;
		case 4:
		create_control_div(dynamicId,arrayControl);
		break;
		case 5:
		create_control_div(dynamicId,arrayControl);
		break;
		case 6:
		create_control_div(dynamicId,arrayControl);
		break;
		case 9:
		if(new_file_upload == "")
		{
			 create_control_div(dynamicId,arrayControl);
		}
		break;
		case 12:
		create_control_div(dynamicId,arrayControl);
		break;
		case 13:
		create_control_div(dynamicId,arrayControl);
		break;
		case 14:
		create_control_div(dynamicId,arrayControl);
		break;
		case 15:
		create_control_div(dynamicId,arrayControl);
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

function create_control_div(dynamicId,arrayControl)
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
					jQuery.each(edit_control_dynamic_ids,function(index,value)
					{
					   jQuery('#left_block').append(jQuery("#div_"+value+"_"+edit_created_control_type[index]));
					});
					
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
					array_text[dynamicId] = [];
					jQuery("#control_label_"+dynamicId).html(arrayControl == undefined ? "<?php _e( "Untitled :", contact_bank ); ?>" : arrayControl[0].dynamic_settings_value + " :");
					jQuery("#txt_description_"+dynamicId).html(arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value);
					jQuery("#txt_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[4].dynamic_settings_value);
					jQuery("#show_tooltip"+dynamicId).attr("data-original-title",arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value);
					jQuery(".hovertip").tooltip();
					if((arrayControl == undefined ? "" : arrayControl[2].dynamic_settings_value) == 1)
					{
						jQuery("#txt_required_"+dynamicId).css("display","block");
					}
					else
					{
						jQuery("#txt_required_"+dynamicId).css("display","none");
					}
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function()
					{
						add_settings(dynamicId,1,arrayControl)
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
					jQuery.each(edit_control_dynamic_ids,function(index,value)
					{
					   jQuery('#left_block').append(jQuery("#div_"+value+"_"+edit_created_control_type[index]));
					});
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
					array_textarea[dynamicId] = [];
					jQuery("#control_label_"+dynamicId).html(arrayControl == undefined ? "<?php _e( "Untitled :", contact_bank ); ?>" : arrayControl[0].dynamic_settings_value + " :");
					jQuery("#txt_description_"+dynamicId).html(arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value);
					jQuery("#textarea_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[4].dynamic_settings_value);
					jQuery("#show_tooltip"+dynamicId).attr("data-original-title",arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value);
					jQuery(".hovertip").tooltip();
					if((arrayControl == undefined ? "" : arrayControl[2].dynamic_settings_value) == 1)
					{
						jQuery("#txt_required_"+dynamicId).css("display","block");
					}
					else
					{
						jQuery("#txt_required_"+dynamicId).css("display","none");
					}
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() 
					{
						 add_settings(dynamicId,2,arrayControl)
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
					jQuery.each(edit_control_dynamic_ids,function(index,value)
					{
					   jQuery('#left_block').append(jQuery("#div_"+value+"_"+edit_created_control_type[index]));
					});
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
					array_email[dynamicId] = [];
					jQuery("#control_label_"+dynamicId).html(arrayControl == undefined ? "<?php _e( "Email :", contact_bank ); ?>" : arrayControl[0].dynamic_settings_value +" :");
					jQuery("#txt_description_"+dynamicId).html(arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value);
					jQuery("#email_"+dynamicId).attr("data-original-title",arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value);
					jQuery(".hovertip").tooltip();
					if((arrayControl == undefined ? "1" : arrayControl[2].dynamic_settings_value) == 1)
					{
						jQuery("#txt_required_"+dynamicId).css("display","block");
					}
					else
					{
						jQuery("#txt_required_"+dynamicId).css("display","none");
					}
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
					 add_settings(dynamicId,3,arrayControl)
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
					jQuery.each(edit_control_dynamic_ids,function(index,value)
					{
					   jQuery('#left_block').append(jQuery("#div_"+value+"_"+edit_created_control_type[index]));
					});
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
					jQuery("#show_tooltip"+dynamicId).attr("data-original-title",arrayControl == undefined ? "" : arrayControl[2].dynamic_settings_value);
					jQuery(".hovertip").tooltip();
					jQuery("#control_label_"+dynamicId).html(arrayControl == undefined ? "<?php _e( "Untitled :", contact_bank ); ?>" : arrayControl[0].dynamic_settings_value +" :");
					array_dropdown[dynamicId] = [];
					array_option_id_dropdown[dynamicId] = [];//Dynamic Array to store advance-dynamic-Ids of dynamic options of dropdown control.
					array_options_dropdown[dynamicId] = [];// Dynamic Array to store values of dynamic options of dropdown control.
					if((arrayControl == undefined ? "" :  arrayControl[3].dynamic_settings_value) != "")
					{
						var options_dynamicId_str = arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value;
						var options_dynamicId = options_dynamicId_str.split(";"); 
						var ddl_options_str = arrayControl == undefined ? "" : arrayControl[4].dynamic_settings_value;
						var ddl_option_value = ddl_options_str.split(";");
						for(var flag =0;flag <options_dynamicId.length;flag++)
						{
							var optionsId = options_dynamicId[flag];
							var ddl_options = ddl_option_value[flag];
							jQuery("#select_"+dynamicId).append('<option id="option_tr_'+optionsId+'" value='+ddl_options+'>'+ddl_options+'</option>');
						}
						jQuery("#option_tr_"+dynamicId).remove();
					}
					if((arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value) == 1)
					{
						jQuery("#txt_required_"+dynamicId).css("display","block");
					}
					else
					{
						jQuery("#txt_required_"+dynamicId).css("display","none");
					}
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() 
					{
						add_settings(dynamicId,4,arrayControl)
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
					jQuery.each(edit_control_dynamic_ids,function(index,value)
					{
					   jQuery('#left_block').append(jQuery("#div_"+value+"_"+edit_created_control_type[index]));
					});
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
					jQuery("#post_back_checkbox_"+dynamicId).attr("data-original-title",arrayControl == undefined ? "" : arrayControl[2].dynamic_settings_value);
					jQuery(".hovertip").tooltip();
					jQuery("#control_label_"+dynamicId).html(arrayControl == undefined ? "<?php _e( "Untitled :", contact_bank ); ?>" : arrayControl[0].dynamic_settings_value + " :");
					array_checkbox[dynamicId] = [];
					array_option_id_chk[dynamicId] = [];// Dynamic Array to store advance-dynamic-Ids of dynamic options of checkbox control.
					array_options_chk[dynamicId] = [];// Dynamic Array to store values of dynamic options of checkbox control.
					if((arrayControl == undefined ? "" :  arrayControl[3].dynamic_settings_value) != "")
					{
						var optionId_str = arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value;
						var optionId = optionId_str.split(";");
						var option_value_str = arrayControl == undefined ? "" : arrayControl[4].dynamic_settings_value;
						var option_value = option_value_str.split(";");
						for(var flag = 0;flag <optionId.length ;flag++)
						{
							var options_dynamicId = optionId[flag];
							var add_chk_options = option_value[flag];
							jQuery("#add_chk_options_here_"+dynamicId).append('<span id="input_id_'+options_dynamicId+'"><input id="chk_'+options_dynamicId+'" name="chk_'+options_dynamicId+'" type="checkbox"/><label style="margin:0px 5px;" id="chk_id_'+options_dynamicId+'" >'+add_chk_options+'</label></span>');
						}
						jQuery("#chk_"+dynamicId).hide();
					}
					if((arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value) == 1)
					{
						jQuery("#txt_required_"+dynamicId).css("display","block");
					}
					else
					{
						jQuery("#txt_required_"+dynamicId).css("display","none");
					}
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
					add_settings(dynamicId,5,arrayControl)
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
					jQuery.each(edit_control_dynamic_ids,function(index,value)
					{
					   jQuery('#left_block').append(jQuery("#div_"+value+"_"+edit_created_control_type[index]));
					});
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
					jQuery("#post_back_radio_button_"+dynamicId).attr("data-original-title",arrayControl == undefined ? "" : arrayControl[2].dynamic_settings_value);
					jQuery(".hovertip").tooltip();
					jQuery("#control_label_"+dynamicId).html(arrayControl == undefined ? "<?php _e( "Untitled :", contact_bank ); ?>" : arrayControl[0].dynamic_settings_value + " :");
					array_multiple[dynamicId] = [];
					array_option_id_radio[dynamicId] = [];// Dynamic Array to store advance-dynamic-Ids of dynamic options of Multiple control.
					array_options_radio[dynamicId] = [];// Dynamic Array to store values of dynamic options of Multiple control.
					if((arrayControl == undefined ? "" :  arrayControl[3].dynamic_settings_value) != "")
					{
						var options_dynamicId_str = arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value;
						var options_dynamicIds = options_dynamicId_str.split(";"); 
						var options_value_str = arrayControl == undefined ? "" : arrayControl[4].dynamic_settings_value;
						var options_value = options_value_str.split(";");
						for(var flag =0;flag <options_dynamicIds.length;flag++)
						{
							var options_dynamicId = options_dynamicIds[flag];
							var add_radio_options = options_value[flag];
							jQuery("#add_radio_options_here_"+dynamicId).append('<span class="hovertip" id="input_id_'+options_dynamicId+'"><input  name="radio" type="radio" id="add_radio_'+options_dynamicId+'" /><label style="margin:0px 5px;" id="add_radio_lab_'+options_dynamicId+'" >'+add_radio_options+'</label></span>');
						}
						jQuery("#radio_"+dynamicId).hide();
					}
					if((arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value) == 1)
					{
						jQuery("#txt_required_"+dynamicId).css("display","block");
					}
					else
					{
						jQuery("#txt_required_"+dynamicId).css("display","none");
					}
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
					add_settings(dynamicId,6,arrayControl)
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
					new_file_upload = 1;
					jQuery("#left_block").append(data);
					jQuery.each(edit_control_dynamic_ids,function(index,value)
					{
					   jQuery('#left_block').append(jQuery("#div_"+value+"_"+edit_created_control_type[index]));
					});
					jQuery("#file_upload_content_postback").css('display','block');
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
					array_file_upload[dynamicId] = [];
					jQuery("#control_label_"+dynamicId).html(arrayControl == undefined ? "<?php _e( "File Upload :", contact_bank ); ?>" :  arrayControl[0].dynamic_settings_value + " :");
					jQuery("#txt_description_"+dynamicId).html(arrayControl == undefined ? "" :  arrayControl[1].dynamic_settings_value);
					jQuery("#tip"+dynamicId).attr("data-original-title",arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value);
					jQuery(".hovertip").tooltip();
					if((arrayControl == undefined ? "" : arrayControl[2].dynamic_settings_value) == 1)
					{
						jQuery("#txt_required_"+dynamicId).css("display","block");
					}
					else
					{
						jQuery("#txt_required_"+dynamicId).css("display","none");
					}
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
						add_settings(dynamicId,9,arrayControl)
					});
					var ux_allow_multiple_file = arrayControl == undefined ? "false" : arrayControl[6].dynamic_settings_value;
					var ux_allowed_file_extensions = arrayControl == undefined ? "*.jpg,*.png,*.gif,*.bmp,*.txt,*.zip,*.rar" : arrayControl[7].dynamic_settings_value;
					var ux_maximum_file_allowed = arrayControl == undefined ? "1024" : arrayControl[8].dynamic_settings_value;
					var ux_uploaded_file_email_db = arrayControl == undefined ? "" : arrayControl[9].dynamic_settings_value;
					jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&ux_allow_multiple_file="+ux_allow_multiple_file+"&ux_allowed_file_extensions="+ux_allowed_file_extensions+
					"&ux_maximum_file_allowed="+ux_maximum_file_allowed+"&ux_uploaded_file_email_db="+ux_uploaded_file_email_db+"&param=ux_allow_multiple_file_upload&action=add_contact_form_library", function(data)
					{
						jQuery("#file_upload_content").remove();
						var dat = data;
						jQuery("#file_upload_content_postback").html(dat);
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
					jQuery.each(edit_control_dynamic_ids,function(index,value)
					{
					   jQuery('#left_block').append(jQuery("#div_"+value+"_"+edit_created_control_type[index]));
					});
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
					array_date[dynamicId] = [];
					
					jQuery("#control_label_"+dynamicId).html(arrayControl == undefined ? "<?php _e( "Date :", contact_bank ); ?>" : arrayControl[0].dynamic_settings_value + " :");
					jQuery("#txt_description_"+dynamicId).html(arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value);
					jQuery("#select_day_"+dynamicId).val(arrayControl == undefined ? (new Date).getDate() : arrayControl[8].dynamic_settings_value == "" ? "0" :  arrayControl[8].dynamic_settings_value);
					jQuery("#select_month_"+dynamicId).val(arrayControl == undefined ? (new Date).getMonth()+1 : arrayControl[9].dynamic_settings_value == "" ? "0" : arrayControl[9].dynamic_settings_value);
					jQuery("#show_tooltip"+dynamicId).attr("data-original-title",arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value);
					jQuery(".hovertip").tooltip();
					var start_year = arrayControl == undefined ? "0" :  arrayControl[6].dynamic_settings_value;
					var end_year = arrayControl == undefined ? "0" :  arrayControl[7].dynamic_settings_value;
					if((start_year == "0" && end_year == "0") || (start_year == "" && end_year == ""))
					{
						jQuery("#select_year_"+dynamicId).html('<option value=0>Year</option>');
						for(flag12=1900; flag12 <= 2100; flag12++)
						{
							jQuery("#select_year_"+dynamicId).append('<option value='+flag12+'>'+flag12+'</option>');
						}
						jQuery("#select_year_"+dynamicId).val(arrayControl == undefined || (start_year == "" && end_year == "") ? (new Date).getFullYear() :  arrayControl[10].dynamic_settings_value);
						
					}
					else
					{
						jQuery("#select_year_"+dynamicId).empty();
						jQuery("#select_year_"+dynamicId).html('<option value=0>Year</option>');
						
						for(flag11=start_year; flag11 <= end_year; flag11++)
						{
							jQuery("#select_year_"+dynamicId).append('<option value='+flag11+'>'+flag11+'</option>');
						}
						jQuery("#select_year_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[10].dynamic_settings_value);
						
					}
					if((arrayControl == undefined ? "" : arrayControl[2].dynamic_settings_value) == 1)
					{
						jQuery("#txt_required_"+dynamicId).css("display","block");
					}
					else
					{
						jQuery("#txt_required_"+dynamicId).css("display","none");
					}
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
						 add_settings(dynamicId,12,arrayControl)
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
					jQuery.each(edit_control_dynamic_ids,function(index,value)
					{
					   jQuery('#left_block').append(jQuery("#div_"+value+"_"+edit_created_control_type[index]));
					});
					jQuery("#ux_drop_hour_time_"+dynamicId).val("12");
					jQuery("#select_hr_24_"+dynamicId).hide();
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
					
					if((arrayControl == undefined ? "" : arrayControl[2].dynamic_settings_value) == 1)
					{
						jQuery("#txt_required_"+dynamicId).css("display","block");
					}
					else
					{
						jQuery("#txt_required_"+dynamicId).css("display","none");
					}
					array_time[dynamicId] = [];
					
					jQuery("#control_label_"+dynamicId).html(arrayControl == undefined ? "<?php _e( "Time :", contact_bank ); ?>" : arrayControl[0].dynamic_settings_value + " :");
					jQuery("#txt_description_"+dynamicId).html(arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value);
					var minute_format = parseInt(arrayControl == undefined ? "1" :  arrayControl[10].dynamic_settings_value);

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
					if((arrayControl == undefined ? "12" :  arrayControl[6].dynamic_settings_value) == 12)
					{
						jQuery("#select_hr_24_"+dynamicId).hide();
						jQuery("#select_hr_12_"+dynamicId).show();
						jQuery("#select_am_"+dynamicId).show();
						jQuery("#select_hr_12_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[7].dynamic_settings_value);	
					}
					else if((arrayControl == undefined ? "24" :  arrayControl[6].dynamic_settings_value) == 24)
					{
						jQuery("#select_hr_12_"+dynamicId).hide();
						jQuery("#select_hr_24_"+dynamicId).show();
						jQuery("#select_am_"+dynamicId).hide();
						jQuery("#select_hr_24_"+dynamicId).val(arrayControl == undefined ? "" :   arrayControl[7].dynamic_settings_value);	
					}
					
					jQuery("#select_min_"+dynamicId).val(arrayControl == undefined ? "" :   arrayControl[8].dynamic_settings_value);
					jQuery("#select_am_"+dynamicId).val(arrayControl == undefined ? "0" : arrayControl[9].dynamic_settings_value == "" ? "0" :  arrayControl[9].dynamic_settings_value);
					jQuery("#show_tooltip"+dynamicId).attr("data-original-title",arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value);
					jQuery(".hovertip").tooltip();
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
						 add_settings(dynamicId,13,arrayControl)
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
					jQuery.each(edit_control_dynamic_ids,function(index,value)
					{
					   jQuery('#left_block').append(jQuery("#div_"+value+"_"+edit_created_control_type[index]));
					});
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
					array_hidden[dynamicId] = [];
					jQuery("#control_label_"+dynamicId).html(arrayControl == undefined ? "<?php _e( "Untitled(hidden) :", contact_bank ); ?>" : arrayControl[0].dynamic_settings_value + " :");
					jQuery("#txt_hide_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value);
					jQuery(".hovertip").tooltip();
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
						add_settings(dynamicId,14,arrayControl)
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
					jQuery.each(edit_control_dynamic_ids,function(index,value)
					{
					   jQuery('#left_block').append(jQuery("#div_"+value+"_"+edit_created_control_type[index]));
					});
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
					if((arrayControl == undefined ? "" : arrayControl[2].dynamic_settings_value) == 1)
					{
						jQuery("#txt_required_"+dynamicId).css("display","block");
					}
					else
					{
						jQuery("#txt_required_"+dynamicId).css("display","none");
					}
					array_password[dynamicId] = [];
					jQuery("#control_label_"+dynamicId).html(arrayControl == undefined ? "<?php _e( "Password : ", contact_bank ); ?>" : arrayControl[0].dynamic_settings_value + " :");
					jQuery("#txt_description_"+dynamicId).html(arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value);
					jQuery("#show_tooltip"+dynamicId).attr("data-original-title",arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value);
					jQuery(".hovertip").tooltip();
					jQuery( "#add_setting_control_"+dynamicId).live( "click", function() {
					add_settings(dynamicId,15,arrayControl)
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
function img_show(dynamicId)
{
 	jQuery("#anchor_del_"+dynamicId + "img").attr("src","<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg-hover.png");
}
function img_hide(dynamicId)
{
	jQuery("#anchor_del_"+dynamicId + "img").attr("src","<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png");
}
function add_settings(dynamicId,field_type,arrayControl)
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
	else if(field_type == 4 && array_dropdown[dynamicId].length != 0)
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
				if(array_date[dynamicId][8] == "" && array_date[dynamicId][9] == "")
				{
					
					jQuery("#select_year_"+dynamicId).html('<option value=0>Year</option>');
				}
				else
				{
					jQuery("#select_year_"+dynamicId).empty();
					jQuery("#select_year_"+dynamicId).html('<option value=0>Year</option>');
					for(flag=array_date[dynamicId][8]; flag <= array_date[dynamicId][9]; flag++)
					{
						
						jQuery("#select_year_"+dynamicId).append('<option value='+flag+'>'+flag+'</option');
						jQuery("#select_year_"+dynamicId).val(array_date[dynamicId][12]);
					}
				
				}
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
				ux_minute_format(dynamicId,array_time[dynamicId][12]);
				if(array_time[dynamicId][8] == 12)
				{
					jQuery("#ux_default_hours_24_"+dynamicId).hide();
					jQuery("#ux_default_hours_12_"+dynamicId).show();
					jQuery("#ux_default_am_"+dynamicId).show();
					jQuery("#ux_default_hours_12_"+dynamicId).val(array_time[dynamicId][9]);
					jQuery("#ux_default_minute_"+dynamicId).val(array_time[dynamicId][10]);
					jQuery("#ux_default_am_"+dynamicId).val(array_time[dynamicId][11]);
					jQuery("#select_hr_24_"+dynamicId).hide();
					jQuery("#select_hr_12_"+dynamicId).show();
					jQuery("#select_am_"+dynamicId).show();
					jQuery("#select_hr_12_"+dynamicId).val(array_time[dynamicId][9]);
					jQuery("#select_min_"+dynamicId).val(array_time[dynamicId][10]);
					jQuery("#select_am_"+dynamicId).val(array_time[dynamicId][11]);
				}
				else if(array_time[dynamicId][8] == 24)
				{
					jQuery("#ux_default_hours_12_"+dynamicId).hide();
					jQuery("#ux_default_hours_24_"+dynamicId).show();
					jQuery("#ux_default_am_"+dynamicId).hide();
					jQuery("#ux_default_hours_24_"+dynamicId).val(array_time[dynamicId][9]);	
					jQuery("#ux_drop_hour_time_"+dynamicId).val(array_time[dynamicId][8]);
					jQuery("#ux_default_minute_"+dynamicId).val(array_time[dynamicId][10]);
					jQuery("#ux_default_am_"+dynamicId).val(array_time[dynamicId][11]);
					jQuery("#select_hr_12_"+dynamicId).hide();
					jQuery("#select_hr_24_"+dynamicId).show();
					jQuery("#select_am_"+dynamicId).hide();
					jQuery("#select_hr_12_"+dynamicId).val(array_time[dynamicId][9]);
					jQuery("#select_min_"+dynamicId).val(array_time[dynamicId][10]);
					jQuery("#select_am_"+dynamicId).val(array_time[dynamicId][11]);	
				}
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
		if(array_password[dynamicId][1] == dynamicId)
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
			show_Popup();
			if(field_type == 12)
			{
				 default_day(dynamicId,arrayControl == undefined ? "" :  arrayControl[6].dynamic_settings_value,arrayControl == undefined ? "" :  arrayControl[7].dynamic_settings_value);
				 dropdown_heading(dynamicId);
			}
			switch(field_type)
			{
				case 1:
			
					jQuery("#ux_label_text_"+dynamicId).val(arrayControl == undefined ? "<?php _e( "Untitled", contact_bank ); ?>" : arrayControl[0].dynamic_settings_value);
					jQuery("#ux_description_control_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value);
					jQuery("#ux_required_control_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[2].dynamic_settings_value)
					if(jQuery("#ux_required_control_"+dynamicId).val() != "" && jQuery("#ux_required_control_"+dynamicId).val() == 1)
					{
						jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value);
					jQuery("#ux_default_value_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[4].dynamic_settings_value);
					jQuery("#ux_admin_label_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[5].dynamic_settings_value);
					if((arrayControl == undefined ? "" : arrayControl[6].dynamic_settings_value) == "true")
					{
						jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
					}
					jQuery("#button_set_outer_label_textbox_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[7].dynamic_settings_value);
					if(jQuery("#button_set_outer_label_textbox_"+dynamicId).val() != "")
					{
						jQuery("#ux_label_textbox_"+dynamicId).css("display","block");
						
						jQuery("#ux_label_textbox_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#button_set_txt_input_textbox_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[8].dynamic_settings_value);
					if(jQuery("#button_set_txt_input_textbox_"+dynamicId).val() != "")
					{
						jQuery("#ux_textinput_textbox_"+dynamicId).css("display","block");
						
						jQuery("#ux_textinput_textbox_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#button_set_txt_description_textbox_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[9].dynamic_settings_value);
					if(jQuery("#button_set_txt_description_textbox_"+dynamicId).val() != "")
					{
						jQuery("#ux_description_textbox_"+dynamicId).css("display","block");
						
						jQuery("#ux_description_textbox_"+dynamicId).attr("style", "position:inherit");
					}
					if((arrayControl == undefined ? "" : arrayControl[10].dynamic_settings_value) == "true")
					{
						jQuery("#ux_checkbox_alpha_filter_"+dynamicId).attr("checked","checked");
					}
					if((arrayControl == undefined ? "" : arrayControl[11].dynamic_settings_value) == "true")
					{
						jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).attr("checked","checked");
					}
					if((arrayControl == undefined ? "" : arrayControl[12].dynamic_settings_value) == "true")
					{
						jQuery("#ux_checkbox_digit_filter_"+dynamicId).attr("checked","checked");
					}
					if((arrayControl == undefined ? "" : arrayControl[13].dynamic_settings_value) == "true")
					{
						jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).attr("checked","checked");
					}
					if((arrayControl == undefined ? "" : arrayControl[14].dynamic_settings_value) == "true")
					{
						jQuery("#ux_checkbox_trim_filter_"+dynamicId).attr("checked","checked");
					}
				break;
				case 2:
				
					jQuery("#ux_label_text_"+dynamicId).val(arrayControl == undefined ? "<?php _e("Untitled", contact_bank); ?>" : arrayControl[0].dynamic_settings_value);
					jQuery("#ux_description_control_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value);
					jQuery("#ux_required_control_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[2].dynamic_settings_value)
					if((arrayControl == undefined ? "" : arrayControl[2].dynamic_settings_value) == 1)
					{
						jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value);
					jQuery("#ux_default_value_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[4].dynamic_settings_value);
					jQuery("#ux_admin_label_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[5].dynamic_settings_value);
					jQuery("#ux_show_email_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[6].dynamic_settings_value);
					if(jQuery("#ux_show_email_"+dynamicId).val() == "true")
					{
						jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
					}
					jQuery("#button_set_outer_label_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[7].dynamic_settings_value);
					if(jQuery("#button_set_outer_label_"+dynamicId).val() != "")
					{
						jQuery("#ux_label_textbox_"+dynamicId).css("display","block");
						jQuery("#text_area_label_"+dynamicId).attr("style", "position:inherit");
						
					}
					jQuery("#button_set_textinput_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[8].dynamic_settings_value);
					if(jQuery("#button_set_textinput_"+dynamicId).val() != "")
					{
						jQuery("#text_area_text_input_"+dynamicId).css("display","block");
						jQuery("#text_area_text_input_"+dynamicId).attr("style", "position:inherit");
						
					}
					jQuery("#button_set_outer_description_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[9].dynamic_settings_value);
					if(jQuery("#button_set_outer_description_"+dynamicId).val() != "")
					{
						jQuery("#text_area_description_"+dynamicId).css("display","block");
						jQuery("#text_area_description_"+dynamicId).attr("style", "position:inherit");
						
					}
					jQuery("#ux_checkbox_alpha_filter_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[10].dynamic_settings_value);
					if(jQuery("#ux_checkbox_alpha_filter_"+dynamicId).val() == "true")
					{
						jQuery("#ux_checkbox_alpha_filter_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[11].dynamic_settings_value);
					if(jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).val() == "true")
					{
						jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_checkbox_digit_filter_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[12].dynamic_settings_value);
					if(jQuery("#ux_checkbox_digit_filter_"+dynamicId).val() == "true")
					{
						jQuery("#ux_checkbox_digit_filter_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[13].dynamic_settings_value);
					if(jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).val() == "true")
					{
						jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_checkbox_trim_filter_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[14].dynamic_settings_value);
					if(jQuery("#ux_checkbox_trim_filter_"+dynamicId).val() == "true")
					{
						jQuery("#ux_checkbox_trim_filter_"+dynamicId).attr("checked","checked");
					}
				break;
				case 3:
					jQuery("#ux_label_text_"+dynamicId).val(arrayControl == undefined ? "<?php _e("Email", contact_bank ); ?>" : arrayControl[0].dynamic_settings_value);
					jQuery("#ux_description_control_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[1].dynamic_settings_value);
					jQuery("#ux_required_control_"+dynamicId).val(arrayControl == undefined ? "1" : arrayControl[2].dynamic_settings_value);
					if(jQuery("#ux_required_control_"+dynamicId).val() == 1)
					{
						jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
					}
					else
					{
						jQuery("#ux_required_control_"+dynamicId).removeAttr("checked");
						jQuery("#ux_required_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[3].dynamic_settings_value);
					jQuery("#ux_admin_label_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[4].dynamic_settings_value);
					jQuery("#ux_show_email_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[5].dynamic_settings_value);
					if(jQuery("#ux_show_email_"+dynamicId).val() == "true")
					{
						jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_email_set_outer_label_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[6].dynamic_settings_value);
					if((arrayControl == undefined ? "" : arrayControl[6].dynamic_settings_value) != "")
					{
						jQuery("#ux_advance_label_"+dynamicId).css("display","block");
						
						jQuery("#ux_advance_label_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_email_txt_input_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[7].dynamic_settings_value);
					if((arrayControl == undefined ? "" : arrayControl[7].dynamic_settings_value) != "")
					{
						jQuery("#advance_text_input_"+dynamicId).css("display","block");
						
						jQuery("#advance_text_input_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_email_description_textarea_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[8].dynamic_settings_value);
					if((arrayControl == undefined ? "" : arrayControl[8].dynamic_settings_value) != "")
					{
						jQuery("#advance_text_description_"+dynamicId).css("display","block");
						
						jQuery("#advance_text_description_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_email_alpha_filter_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[9].dynamic_settings_value);
					if((arrayControl == undefined ? "" : arrayControl[9].dynamic_settings_value) == "true")
					{
						jQuery("#ux_email_alpha_filter_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_email_alpha_num_filter_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[10].dynamic_settings_value);
					if((arrayControl == undefined ? "" : arrayControl[10].dynamic_settings_value) == "true")
					{
						jQuery("#ux_email_alpha_num_filter_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_email_digit_filter_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[11].dynamic_settings_value);
					if((arrayControl == undefined ? "" : arrayControl[11].dynamic_settings_value)  == "true")
					{
						jQuery("#ux_email_digit_filter_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_email_strip_tag_filter_"+dynamicId).val(arrayControl == undefined ? "" : arrayControl[12].dynamic_settings_value);
					if((arrayControl == undefined ? "" : arrayControl[12].dynamic_settings_value)  == "true")
					{
						jQuery("#ux_email_strip_tag_filter_"+dynamicId).attr("checked","checked");
					}
					if((arrayControl == undefined ? "" : arrayControl[13].dynamic_settings_value)  == "true")
					{
						jQuery("#ux_email_trim_filter_"+dynamicId).attr("checked","checked");
					}
				break;
				case 4:
					jQuery("#ux_label_text_"+dynamicId).val(arrayControl == undefined ? "<?php _e( "Untitled", contact_bank ); ?>" :  arrayControl[0].dynamic_settings_value);
					jQuery("#ux_required_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[1].dynamic_settings_value)
					if(jQuery("#ux_required_control_"+dynamicId).val() != "" && jQuery("#ux_required_control_"+dynamicId).val() == 1)
					{
						jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[2].dynamic_settings_value);
					if((arrayControl == undefined ? "" :  arrayControl[3].dynamic_settings_value) != "")
					{
						var options_dynamicId_str = arrayControl[3].dynamic_settings_value;
						var options_dynamicId = options_dynamicId_str.split(";"); 
						var ddl_options_str = arrayControl[4].dynamic_settings_value;
						var ddl_option_value = ddl_options_str.split(";");
						for(var flag = 0;flag <options_dynamicId.length;flag++)
						{
							var optionsId = options_dynamicId[flag];
							var ddl_options = ddl_option_value[flag];
							var place_of_option_in_array_id = jQuery.inArray(optionsId,array_option_id_dropdown[dynamicId]);
							if(place_of_option_in_array_id == -1)
							{
								array_option_id_dropdown[dynamicId].push(optionsId);
								array_options_dropdown[dynamicId].push(ddl_options);
							}
							jQuery("#dropdown_ddl_option_"+dynamicId).append('<div class="layout-control-group" id="input_option_tr_'+optionsId+'"><div class="layout-controls"><input type="text" class="layout-span8" id="input_option_'+optionsId+'" name="input_option_'+optionsId+'" value="'+ddl_options+'" /><input type="hidden" value="'+ddl_options+'" id="ddl_existing_options_'+optionsId+'" name="ddl_existing_options_'+optionsId+'" /><a style="padding-left:2px;" onclick="delete_ddl_option('+optionsId+','+dynamicId+')" ><img style="vertical-align: top;margin-top: 2px;" src="<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" /></a><input style="margin-left:5px;" class="btn btn-info layout-span3"  type="button" onclick="update_dropdown_option('+optionsId+','+dynamicId+')" value="Update"></div></div>');
							
						}
					}
					jQuery("#ux_admin_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[5].dynamic_settings_value);
					jQuery("#ux_email_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[6].dynamic_settings_value);
					if(jQuery("#ux_email_"+dynamicId).val() == "true")
					{
						jQuery("#ux_email_"+dynamicId).attr("checked","checked");
					}
					jQuery("#button_set_outer_label_ddl_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[7].dynamic_settings_value);
					if(jQuery("#button_set_outer_label_ddl_"+dynamicId).val() != "")
					{
						jQuery("#show_data_label_tr_ddl_"+dynamicId).css("display","block");
						
						jQuery("#show_data_label_tr_ddl_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_dropdown_menu_textarea_ddl_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[8].dynamic_settings_value);
					if(jQuery("#ux_dropdown_menu_textarea_ddl_"+dynamicId).val() != "")
					{
						jQuery("#show_data_dropdown_menu_tr_ddl_"+dynamicId).css("display","block");
						
						jQuery("#show_data_dropdown_menu_tr_ddl_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_description_textarea_ddl_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[9].dynamic_settings_value);
					if(jQuery("#ux_description_textarea_ddl_"+dynamicId).val() != "")
					{
						jQuery("#show_data_description_tr_ddl_"+dynamicId).css("display","block");
						
						jQuery("#show_data_description_tr_ddl_"+dynamicId).attr("style", "position:inherit");
					}
				break;
				case 5:
					jQuery("#ux_label_text_"+dynamicId).val(arrayControl == undefined ? "<?php _e( "Untitled", contact_bank ); ?>" :  arrayControl[0].dynamic_settings_value);
					jQuery("#ux_required_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[1].dynamic_settings_value)
					if(jQuery("#ux_required_control_"+dynamicId).val() != "" && jQuery("#ux_required_control_"+dynamicId).val() == 1)
					{
						jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[2].dynamic_settings_value);
					if((arrayControl == undefined ? "" :  arrayControl[3].dynamic_settings_value) != "")
					{
	 					var optionId_str = arrayControl[3].dynamic_settings_value;
						var optionId = optionId_str.split(";");
						var option_value_str = arrayControl[4].dynamic_settings_value;
						var option_value = option_value_str.split(";");
						for(var flag = 0;flag <optionId.length ;flag++)
						{
							var options_dynamicId = optionId[flag];
							var add_chk_option = option_value[flag];
							var place_of_option_in_array_id = jQuery.inArray(options_dynamicId,array_option_id_chk[dynamicId]);
							if(place_of_option_in_array_id == -1)
							{
								array_option_id_chk[dynamicId].push(options_dynamicId);
								array_options_chk[dynamicId].push(add_chk_option);
							}
							jQuery("#append_chk_option_"+dynamicId).append('<div class="layout-control-group" id="selected_item_'+options_dynamicId+'"><div class="layout-controls"><input type= "text" class="layout-span8" value="'+add_chk_option+'" id="input_type_'+options_dynamicId+'"><input type="hidden" value="'+add_chk_option+'" id="chk_existing_options_'+options_dynamicId+'" name="ddl_existing_options_'+options_dynamicId+'" /><a style="padding-left:2px;" onclick="delete_chk('+options_dynamicId+','+dynamicId+')"><img style="vertical-align: top;margin-top: 2px;" src="<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" /></a><input  class="btn btn-info layout-span3" type="button" style="margin-left:5px;" onclick="update_chk_option('+options_dynamicId+','+dynamicId+')" value="Update"></div></div>');
							
						}
					}
					jQuery("#ux_admin_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[5].dynamic_settings_value);
					jQuery("#ux_show_email_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[6].dynamic_settings_value);
					if(jQuery("#ux_show_email_"+dynamicId).val() == "true")
					{
						jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
					}
					jQuery("#button_set_outer_label_chk_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[7].dynamic_settings_value);
					if(jQuery("#button_set_outer_label_chk_"+dynamicId).val() != "")
					{
						jQuery("#show_data_label_tr_chk_"+dynamicId).css("display","block");
						
						jQuery("#show_data_label_tr_chk_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_description_textarea_chk_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[8].dynamic_settings_value);
					if(jQuery("#ux_description_textarea_chk_"+dynamicId).val() != "")
					{
						jQuery("#show_data_description_tr_chk_"+dynamicId).css("display","block");
						
						jQuery("#show_data_description_tr_chk_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_button_options_outer_wrapper_chk_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[9].dynamic_settings_value);
					if(jQuery("#ux_button_options_outer_wrapper_chk_"+dynamicId).val() != "")
					{
						jQuery("#show_data_option_outer_wrapper_tr_chk_"+dynamicId).css("display","block");
						
						jQuery("#show_data_option_outer_wrapper_tr_chk_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_button_option_wrapper_chk_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[10].dynamic_settings_value);
					if(jQuery("#ux_button_option_wrapper_chk_"+dynamicId).val() != "")
					{
						jQuery("#show_data_option_wrapper_tr_chk_"+dynamicId).css("display","block");
						
						jQuery("#show_data_option_wrapper_tr_chk_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_button_option_label_chk_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[11].dynamic_settings_value);
					if(jQuery("#ux_button_option_label_chk_"+dynamicId).val() != "")
					{
						jQuery("#show_data_option_label_tr_chk_"+dynamicId).css("display","block");
						
						jQuery("#show_data_option_label_tr_chk_"+dynamicId).attr("style", "position:inherit");
					}
				break;
				case 6:
					jQuery("#ux_label_text_"+dynamicId).val(arrayControl == undefined ? "<?php _e( "Untitled", contact_bank ); ?>" :  arrayControl[0].dynamic_settings_value);
					jQuery("#ux_required_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[1].dynamic_settings_value)
					if((arrayControl == undefined ? "" :  arrayControl[1].dynamic_settings_value) == 1)
					{
						jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[2].dynamic_settings_value);
					if((arrayControl == undefined ? "" :  arrayControl[3].dynamic_settings_value) != "")
					{
			 			var optionId_str = arrayControl[3].dynamic_settings_value;
						var optionId = optionId_str.split(";");
						var option_value_str = arrayControl[4].dynamic_settings_value;
						var option_value = option_value_str.split(";");
						for(var flag = 0;flag <optionId.length ;flag++)
						{
							var options_dynamicId = optionId[flag];
							var add_radio_option = option_value[flag];
							var place_of_option_in_array_id = jQuery.inArray(options_dynamicId,array_option_id_radio[dynamicId]);
							if(place_of_option_in_array_id == -1)
							{
								array_option_id_radio[dynamicId].push(options_dynamicId);
								array_options_radio[dynamicId].push(add_radio_option);
							}
							jQuery("#append_multiple_option_"+dynamicId).append('<div class="layout-control-group" id="input_tr_'+options_dynamicId+'"><div class="layout-controls"><input type="text" class="layout-span8" id="input_option_'+options_dynamicId+'" name="input_option_'+options_dynamicId+'" value="'+add_radio_option+'" /><input type="hidden" value="'+add_radio_option+'" id="radio_existing_options_'+options_dynamicId+'" name="radio_existing_options_'+options_dynamicId+'"/><a style="padding-left:2px;" onclick="delete_radio('+options_dynamicId+','+dynamicId+')"><img style="vertical-align: top;margin-top: 2px;" src="<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" /></a><input class="btn btn-info layout-span3" style="margin-left:5px;" type="button" onclick="update_radio_option('+options_dynamicId+','+dynamicId+')" value="Update"></div></div>');
						}
					}
					jQuery("#ux_admin_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[5].dynamic_settings_value);
					if((arrayControl == undefined ? "" :  arrayControl[6].dynamic_settings_value) == "true")
					{
						jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
					}
					jQuery("#button_set_outer_label_radio_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[7].dynamic_settings_value);
					if(jQuery("#button_set_outer_label_radio_"+dynamicId).val() != "")
					{
						jQuery("#show_data_label_tr_radio_"+dynamicId).css("display","block");
						
						jQuery("#show_data_label_tr_radio_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_description_textarea_radio_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[8].dynamic_settings_value);
					if(jQuery("#ux_description_textarea_radio_"+dynamicId).val() != "")
					{
						jQuery("#show_data_description_tr_radio_"+dynamicId).css("display","block");
						
						jQuery("#show_data_description_tr_radio_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_button_options_outer_wrapper_radio_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[9].dynamic_settings_value);
					if((arrayControl == undefined ? "" :  arrayControl[9].dynamic_settings_value) != "")
					{
						jQuery("#show_data_option_outer_wrapper_tr_radio_"+dynamicId).css("display","block");
						
						jQuery("#show_data_option_outer_wrapper_tr_radio_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_button_option_wrapper_radio_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[10].dynamic_settings_value);
					if((arrayControl == undefined ? "" :  arrayControl[10].dynamic_settings_value) != "")
					{
						jQuery("#show_data_option_wrapper_tr_radio_"+dynamicId).css("display","block");
						
						jQuery("#show_data_option_wrapper_tr_radio_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_button_option_label_radio_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[11].dynamic_settings_value);
					if((arrayControl == undefined ? "" :  arrayControl[11].dynamic_settings_value) != "")
					{
						jQuery("#show_data_option_label_tr_radio_"+dynamicId).css("display","block");
						
						jQuery("#show_data_option_label_tr_radio_"+dynamicId).attr("style", "position:inherit");
					}
				break;
				
				case 9:
					jQuery("#ux_label_text_"+dynamicId).val(arrayControl == undefined ? "<?php _e( "File Upload", contact_bank ); ?>" :  arrayControl[0].dynamic_settings_value);
					jQuery("#ux_description_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[1].dynamic_settings_value);
					jQuery("#ux_required_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[2].dynamic_settings_value)
					if(jQuery("#ux_required_control_"+dynamicId).val() == 1)
					{
						jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[3].dynamic_settings_value);
					jQuery("#ux_admin_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[4].dynamic_settings_value);
					jQuery("#ux_show_email_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[5].dynamic_settings_value);
					if(jQuery("#ux_show_email_"+dynamicId).val() == "true")
					{
						jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_allow_multiple_file_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[6].dynamic_settings_value);
					if(jQuery("#ux_allow_multiple_file_"+dynamicId).val() == "true")
					{
						jQuery("#ux_allow_multiple_file_"+dynamicId).attr("checked","checked");
					}
					else
					{
						jQuery("#ux_allow_multiple_file_"+dynamicId).removeAttr("checked");
					}
					jQuery("#ux_allowed_file_extensions_"+dynamicId).val(arrayControl == undefined ? "jpg;jpeg;png;gif;" :  arrayControl[7].dynamic_settings_value);
					jQuery("#ux_maximum_file_allowed_"+dynamicId).val(arrayControl == undefined ? "<?php _e( "1024", contact_bank ); ?>" :  arrayControl[8].dynamic_settings_value);
					jQuery("#ux_uploaded_file_email_db_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[9].dynamic_settings_value);
					if(jQuery("#ux_uploaded_file_email_db_"+dynamicId).val() == "true")
					{
						jQuery("#ux_uploaded_file_email_db_"+dynamicId).attr("checked","checked");
					}
					jQuery("#button_set_outer_label_file"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[10].dynamic_settings_value);
					if(jQuery("#button_set_outer_label_file"+dynamicId).val() != "")
					{
						jQuery("#ux_label_fileupload_"+dynamicId).css("display","block");
						jQuery("#ux_label_fileupload_"+dynamicId).attr("style", "position:inherit");
						
					}
					jQuery("#button_set_outer_description_fileuplod"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[11].dynamic_settings_value);
					if(jQuery("#button_set_outer_description_fileuplod"+dynamicId).val() != "")
					{
						jQuery("#ux_description_fileupload_"+dynamicId).css("display","block");
						jQuery("#ux_description_fileupload_"+dynamicId).attr("style", "position:inherit");
						
					}
				break;
				
				case 12:
					jQuery("#ux_label_text_"+dynamicId).val(arrayControl == undefined ? "<?php _e( "Date", contact_bank ); ?>" :  arrayControl[0].dynamic_settings_value);
					jQuery("#ux_description_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[1].dynamic_settings_value);
					jQuery("#ux_required_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[2].dynamic_settings_value)
					if(jQuery("#ux_required_control_"+dynamicId).val() == 1)
					{
						jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[3].dynamic_settings_value);
					jQuery("#ux_admin_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[4].dynamic_settings_value);
					jQuery("#ux_show_email_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[5].dynamic_settings_value);
					if(jQuery("#ux_show_email_"+dynamicId).val() == "true")
					{
						jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
					}
					
					jQuery("#ux_start_year_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[6].dynamic_settings_value);
					jQuery("#ux_last_year_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[7].dynamic_settings_value);
					jQuery("#ux_default_day_type_"+dynamicId).val(arrayControl == undefined ? "0" :  arrayControl[8].dynamic_settings_value);
					jQuery("#ux_default_month_type_"+dynamicId).val(arrayControl == undefined ? "0" :  arrayControl[9].dynamic_settings_value);
					var start_year = arrayControl == undefined ? "" :  arrayControl[6].dynamic_settings_value;
					var end_year = arrayControl == undefined ? "" :  arrayControl[7].dynamic_settings_value;
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
							jQuery("#ux_default_year_type_"+dynamicId).val(arrayControl == undefined ? "0" :  arrayControl[10].dynamic_settings_value);
						}
					}
					else
					{
						jQuery("#ux_default_year_type_"+dynamicId).empty();
						jQuery("#ux_default_year_type_"+dynamicId).html('<option value=0><?php _e( "Year", contact_bank ); ?></option>');
						for(flag=start_year; flag <= end_year; flag++)
						{
							jQuery("#ux_default_year_type_"+dynamicId).append('<option value='+flag+'>'+flag+'</option');
							jQuery("#ux_default_year_type_"+dynamicId).val(arrayControl == undefined ? "0" :  arrayControl[10].dynamic_settings_value);
						}
					}
					jQuery("#ux_last_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[11].dynamic_settings_value);
					jQuery("#uxDefaultDateFormat_"+dynamicId).val(arrayControl == undefined ? "0" :  arrayControl[12].dynamic_settings_value);
					jQuery("#ux_date_set_outer_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[13].dynamic_settings_value);
					if(jQuery("#ux_date_set_outer_label_"+dynamicId).val() != "")
					{
						jQuery("#ux_advance_label_"+dynamicId).attr("display","block");
						jQuery("#ux_advance_label_"+dynamicId).attr("style", "position:inherit");
						
					}
					jQuery("#ux_date_txt_input_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[14].dynamic_settings_value);
					if(jQuery("#ux_date_txt_input_"+dynamicId).val() != "")
					{
						jQuery("#advance_text_input_"+dynamicId).attr("display","block");
						jQuery("#advance_text_input_"+dynamicId).attr("style", "position:inherit");
						
					}
					jQuery("#ux_date_description_textarea_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[15].dynamic_settings_value);
					if(jQuery("#ux_date_description_textarea_"+dynamicId).val() != "")
					{
						jQuery("#advance_text_description_"+dynamicId).attr("display","block");
						jQuery("#advance_text_description_"+dynamicId).attr("style", "position:inherit");
						
					}
					jQuery("#ux_day_textarea_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[16].dynamic_settings_value);
					if(jQuery("#ux_day_textarea_"+dynamicId).val() != "")
					{
						jQuery("#ux_advance_day_"+dynamicId).attr("display","block");
						jQuery("#ux_advance_day_"+dynamicId).attr("style", "position:inherit");
						
					}
					
					jQuery("#ux_month_textarea_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[17].dynamic_settings_value);
					if(jQuery("#ux_month_textarea_"+dynamicId).val() != "")
					{
						jQuery("#advance_text_month_"+dynamicId).attr("display","block");
						jQuery("#advance_text_month_"+dynamicId).attr("style", "position:inherit");
						
					}
					jQuery("#ux_year_textarea_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[18].dynamic_settings_value);
					if(jQuery("#ux_year_textarea_"+dynamicId).val() != "")
					{
						jQuery("#advance_text_year_"+dynamicId).attr("display","block");
						jQuery("#advance_text_year_"+dynamicId).attr("style", "position:inherit");
						
					}
				break;
				case 13:
					jQuery("#ux_default_hours_24_"+dynamicId).hide();
					jQuery("#ux_label_text_"+dynamicId).val(arrayControl == undefined ? "<?php _e( "Time", contact_bank ); ?>" :  arrayControl[0].dynamic_settings_value);
					jQuery("#ux_description_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[1].dynamic_settings_value);
					jQuery("#ux_required_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[2].dynamic_settings_value)
					if(jQuery("#ux_required_control_"+dynamicId).val() == 1)
					{
						jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[3].dynamic_settings_value);
					jQuery("#ux_admin_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[4].dynamic_settings_value);
					jQuery("#ux_email_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[5].dynamic_settings_value);
					if(jQuery("#ux_email_"+dynamicId).val() == "true")
					{
						jQuery("#ux_email_"+dynamicId).attr("checked","checked");
					}
				
					jQuery("#ux_drop_hour_time_"+dynamicId).val(arrayControl == undefined ? "12" :  arrayControl[6].dynamic_settings_value);
					
					var minute_format = parseInt(arrayControl == undefined ? "1" :arrayControl[10].dynamic_settings_value);
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
					if(arrayControl == undefined ? "12" :  arrayControl[6].dynamic_settings_value != "" )
					{
						jQuery("#select_min_"+dynamicId).html(dropdown_min);
						jQuery("#ux_default_minute_"+dynamicId).html(dropdown_min);
						jQuery("#ux_minute_format_"+dynamicId).val(1);
					}
					else
					{
						jQuery("#select_min_"+dynamicId).html(dropdown_min);
						jQuery("#ux_default_minute_"+dynamicId).html(dropdown_min);
					}
					jQuery("#ux_drop_hour_time_"+dynamicId).val(arrayControl == undefined ? "12" :  arrayControl[6].dynamic_settings_value);
					if((arrayControl == undefined ? "12" :  arrayControl[6].dynamic_settings_value) == 12)
					{
						jQuery("#ux_default_hours_24_"+dynamicId).hide();
						jQuery("#ux_default_hours_12_"+dynamicId).show();
						jQuery("#ux_default_hours_12_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[7].dynamic_settings_value);
						jQuery("#ux_default_am_"+dynamicId).show();
					}
					
					else if((arrayControl == undefined ? "12" :  arrayControl[6].dynamic_settings_value) == 24)
					{
						jQuery("#ux_default_hours_12_"+dynamicId).hide();
						jQuery("#ux_default_hours_24_"+dynamicId).show();
						jQuery("#ux_default_hours_24_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[7].dynamic_settings_value);
						jQuery("#ux_default_am_"+dynamicId).hide();
					}
					jQuery("#ux_default_minute_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[8].dynamic_settings_value);
					jQuery("#ux_default_am_"+dynamicId).val(arrayControl == undefined ? "0" :  arrayControl[9].dynamic_settings_value);
					jQuery("#ux_minute_format_"+dynamicId).val(arrayControl == undefined ? "1" :  arrayControl[10].dynamic_settings_value);
					jQuery("#button_set_outer_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[11].dynamic_settings_value);
					if(jQuery("#button_set_outer_label_"+dynamicId).val() != "")
					{
						jQuery("#time_css_label_"+dynamicId).css("display","block");
						jQuery("#time_css_label_"+dynamicId).attr("style", 'position:inherit');
						
					}
					jQuery("#button_set_textinput_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[12].dynamic_settings_value);
					if(jQuery("#button_set_textinput_"+dynamicId).val() != "")
					{
						jQuery("#time_text_input_"+dynamicId).css("display","block");
						jQuery("#time_text_input_"+dynamicId).attr("style", 'position:inherit');
						
					}
					jQuery("#button_set_outer_description_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[13].dynamic_settings_value);
					if(jQuery("#button_set_outer_description_"+dynamicId).val() != "")
					{
						jQuery("#time_description_"+dynamicId).css("display","block");
						jQuery("#time_description_"+dynamicId).attr("style", 'position:inherit');
						
					}
					jQuery("#ux_time_hour_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[14].dynamic_settings_value);
					if(jQuery("#ux_time_hour_"+dynamicId).val() != "")
					{
						jQuery("#time_set_time_hour_"+dynamicId).css("display","block");
						jQuery("#time_set_time_hour_"+dynamicId).attr("style", 'position:inherit');
						
					}
					jQuery("#ux_time_minute_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[15].dynamic_settings_value);
					if(jQuery("#ux_time_minute_"+dynamicId).val() != "")
					{
						jQuery("#button_set_time_minute_"+dynamicId).css("display","block");
						jQuery("#button_set_time_minute_"+dynamicId).attr("style", 'position:inherit');
						
					}
					jQuery("#button_set_time_am_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[16].dynamic_settings_value);
					if(jQuery("#button_set_time_am_"+dynamicId).val() != "")
					{
						jQuery("#ux_tr_set_time_am_"+dynamicId).css("display","block");
						jQuery("#ux_tr_set_time_am_"+dynamicId).attr("style", 'position:inherit');
						
					}
				break;
				case 14:
					jQuery("#ux_label_text_"+dynamicId).val(arrayControl == undefined ? "<?php _e( "Untitled(hidden)", contact_bank ); ?>" :  arrayControl[0].dynamic_settings_value);
					jQuery("#ux_default_value_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[1].dynamic_settings_value);
					jQuery("#ux_admin_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[2].dynamic_settings_value);
					jQuery("#ux_show_email_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[3].dynamic_settings_value);
					if(jQuery("#ux_show_email_"+dynamicId).val() == "true")
					{
						jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
					}
				break;
				case 15:
					jQuery("#ux_label_text_"+dynamicId).val(arrayControl == undefined ? "<?php _e( "Password", contact_bank ); ?>" :  arrayControl[0].dynamic_settings_value);
					jQuery("#ux_description_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[1].dynamic_settings_value);
					jQuery("#ux_required_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[2].dynamic_settings_value)
					if(jQuery("#ux_required_control_"+dynamicId).val() == 1)
					{
						jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_tooltip_control_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[3].dynamic_settings_value);
					jQuery("#ux_admin_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[4].dynamic_settings_value);
					jQuery("#ux_show_email_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[5].dynamic_settings_value);
					if(jQuery("#ux_show_email_"+dynamicId).val() == "true")
					{
						jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_password_label_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[6].dynamic_settings_value);
					if(jQuery("#ux_password_label_"+dynamicId).val() != "")
					{
						jQuery("#password_label_"+dynamicId).css("display","block");
						
						jQuery("#password_label_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_password_text_input_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[7].dynamic_settings_value);
					if(jQuery("#ux_password_text_input_"+dynamicId).val() != "")
					{
						jQuery("#password_text_input_"+dynamicId).css("display","block");
						
						jQuery("#password_text_input_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_password_description_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[8].dynamic_settings_value);
					if(jQuery("#ux_password_description_"+dynamicId).val() != "")
					{
						jQuery("#password_description_"+dynamicId).css("display","block");
						
						jQuery("#password_description_"+dynamicId).attr("style", "position:inherit");
					}
					jQuery("#ux_checkbox_alpha_filter_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[9].dynamic_settings_value);
					if(jQuery("#ux_checkbox_alpha_filter_"+dynamicId).val() == "true")
					{
						jQuery("#ux_checkbox_alpha_filter_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[10].dynamic_settings_value);
					if(jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).val() == "true")
					{
						jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_checkbox_digit_filter_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[11].dynamic_settings_value);
					if(jQuery("#ux_checkbox_digit_filter_"+dynamicId).val() == "true")
					{
						jQuery("#ux_checkbox_digit_filter_"+dynamicId).attr("checked","checked");
					}
					jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).val(arrayControl == undefined ? "" :  arrayControl[12].dynamic_settings_value);
					if(jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).val() == "true")
					{
						jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).attr("checked","checked");
					}
					if((arrayControl == undefined ? "" : arrayControl[13].dynamic_settings_value) == "true")
					{
						jQuery("#ux_checkbox_trim_filter_"+dynamicId).attr("checked","checked");
					}
				break;
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
	if(control_no == 9)
	{
		new_file_upload = "";
	}
	if(edit_created_control_type.length != 0)
	{
		var index = jQuery.inArray(dynamicId,edit_control_dynamic_ids);
		if(index > -1)
		{
			jQuery("#" + div_id.id).remove();
			edit_control_dynamic_ids.splice(index, 1);
			edit_created_control_type.splice(index, 1);
		}
	}
	var index = jQuery.inArray(dynamicId,new_control_dynamic_ids);
	if(index > -1)
	{
		
		jQuery("#" + div_id.id).remove();
		new_control_dynamic_ids.splice(index, 1);
		created_control_type.splice(index, 1);
	}
	delete_control_dynamicIds.push(dynamicId);
	jQuery("#div_"+dynamicId).remove();
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
		jQuery("#update_form_success_message").css("display","block");
		jQuery.ajax({
			type: "POST",
			url: ajaxurl + "?delete_control_dynamicIds="+delete_control_dynamicIds+"&param=delete_controls&action=edit_contact_form_library",
			
			success : function(data) 
			{
			}
			});	
			var field_no = created_control_type.length;
			var form_name = jQuery("#ux_form_name_txt").val();
			var form_id = <?php echo $form_id; ?>;
			
			if(field_order.length == 0)
			{
				field_order = 0;
			}
			
		jQuery.ajax({
			type: "POST",
			url: ajaxurl + "?form_name="+form_name+"&form_id="+form_id+"&edit_created_control_type="+edit_created_control_type+"&field_order="+field_order+"&edit_control_dynamic_ids="+edit_control_dynamic_ids+"&new_control_dynamic_ids="+new_control_dynamic_ids+"&created_control_type="+created_control_type+"&field_dynamic_id="+field_dynamic_id+"&form=1&param=submit_controls&action=edit_contact_form_library",
			
			success : function(data) 
			{
				if(created_control_type.length > 0)
				{
					for(flag = 0;flag<field_no; flag++)
					{
						switch(parseInt(created_control_type[flag]))
						{
							case 1:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
								type: "POST",
								url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_text="+encodeURIComponent(array_text[dynamicId])+"&form=0&control_type=1&param=submit_controls&action=add_contact_form_library",
								
								success : function(data) 
								{
								}
								});
							break;
							case 2:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
								type: "POST",
								url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_textarea="+encodeURIComponent(array_textarea[dynamicId])+"&form=0&control_type=2&param=submit_controls&action=add_contact_form_library",
								
								success : function(data) 
								{
								}
								});
							break;
							case 3:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
								type: "POST",
								url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_email="+encodeURIComponent(array_email[dynamicId])+"&form=0&control_type=3&param=submit_controls&action=add_contact_form_library",
								
								success : function(data) 
								{
									
								}
								});
							break;
							case 4:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
								type: "POST",
								url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_dropdown="+encodeURIComponent(array_dropdown[dynamicId])+"&form=0&control_type=4&param=submit_controls&action=add_contact_form_library",
								
								success : function(data) 
								{
									
								}
								});
							break;
							case 5:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
								type: "POST",
								url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_checkbox="+encodeURIComponent(array_checkbox[dynamicId])+"&form=0&control_type=5&param=submit_controls&action=add_contact_form_library",
								
								success : function(data) 
								{
								
								}
								});
							break;
							case 6:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
								type: "POST",
								url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_multiple="+encodeURIComponent(array_multiple[dynamicId])+"&form=0&control_type=6&param=submit_controls&action=add_contact_form_library",
								
								success : function(data) 
								{
									
								}
								});
							break;
							
							case 9:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
								type: "POST",
								url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_file_upload="+encodeURIComponent(array_file_upload[dynamicId])+"&form=0&control_type=9&param=submit_controls&action=add_contact_form_library",
								
								success : function(data) 
								{
									
								}
								});
							break;
							
							case 12:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
								type: "POST",
								url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_date="+encodeURIComponent(array_date[dynamicId])+"&form=0&control_type=12&param=submit_controls&action=add_contact_form_library",
								
								success : function(data) 
								{
									
								}
								});
							break;
							case 13:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
								type: "POST",
								url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_time="+encodeURIComponent(array_time[dynamicId])+"&form=0&control_type=13&param=submit_controls&action=add_contact_form_library",
								
								success : function(data) 
								{
									
								}
								});
							break;
							case 14:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
								type: "POST",
								url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_hidden="+encodeURIComponent(array_hidden[dynamicId])+"&form=0&control_type=14&param=submit_controls&action=add_contact_form_library",
								
								success : function(data) 
								{
									
								}
								});
							break;
							case 15:
								var dynamicId = new_control_dynamic_ids[flag];
								jQuery.ajax({
								type: "POST",
								url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_password="+encodeURIComponent(array_password[dynamicId])+"&form=0&control_type=15&param=submit_controls&action=add_contact_form_library",
								
								success : function(data) 
								{
									
								}
								});
							break;
						}
					}
				}
				var field_edit = edit_created_control_type.length;
				for(flag = 0;flag<field_edit; flag++)
				{
					switch(parseInt(edit_created_control_type[flag]))
					{
						case 1:
							var dynamicId = edit_control_dynamic_ids[flag];
							jQuery.ajax({
							type: "POST",
							url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_text="+encodeURIComponent(array_text[dynamicId])+"&form=0&control_type=1&param=submit_controls&action=edit_contact_form_library",
							
							success : function(data) 
							{
								
							}
							});
						break;
						case 2:
							var dynamicId = edit_control_dynamic_ids[flag];
							jQuery.ajax({
							type: "POST",
							url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_textarea="+encodeURIComponent(array_textarea[dynamicId])+"&form=0&control_type=2&param=submit_controls&action=edit_contact_form_library",
							
							success : function(data) 
							{
								
							}
							});
						break;
						case 3:
							var dynamicId = edit_control_dynamic_ids[flag];
							jQuery.ajax({
							type: "POST",
							url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_email="+encodeURIComponent(array_email[dynamicId])+"&form=0&control_type=3&param=submit_controls&action=edit_contact_form_library",
							
							success : function(data) 
							{
								
							}
							});
						break;
						case 4:
							var dynamicId = edit_control_dynamic_ids[flag];
							jQuery.ajax({
							type: "POST",
							url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_dropdown="+encodeURIComponent(array_dropdown[dynamicId])+"&form=0&control_type=4&param=submit_controls&action=edit_contact_form_library",
							
							success : function(data) 
							{
								
							}
							});
						break;
						case 5:
							var dynamicId = edit_control_dynamic_ids[flag];
							jQuery.ajax({
							type: "POST",
							url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_checkbox="+encodeURIComponent(array_checkbox[dynamicId])+"&form=0&control_type=5&param=submit_controls&action=edit_contact_form_library",
							
							success : function(data) 
							{
								
							}
							});
						break;
						case 6:
							var dynamicId = edit_control_dynamic_ids[flag];
							jQuery.ajax({
							type: "POST",
							url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_multiple="+encodeURIComponent(array_multiple[dynamicId])+"&form=0&control_type=6&param=submit_controls&action=edit_contact_form_library",
							
							success : function(data) 
							{
								
							}
							});
						break;
						
						case 9:
							var dynamicId = edit_control_dynamic_ids[flag];
							jQuery.ajax({
							type: "POST",
							url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_file_upload="+encodeURIComponent(array_file_upload[dynamicId])+"&form=0&control_type=9&param=submit_controls&action=edit_contact_form_library",
							
							success : function(data) 
							{
								
							}
							});
						break;
						
						case 12:
							var dynamicId = edit_control_dynamic_ids[flag];
							jQuery.ajax({
							type: "POST",
							url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_date="+encodeURIComponent(array_date[dynamicId])+"&form=0&control_type=12&param=submit_controls&action=edit_contact_form_library",
							
							success : function(data) 
							{
								
							}
							});
						break;
						case 13:
							var dynamicId = edit_control_dynamic_ids[flag];
							jQuery.ajax({
							type: "POST",
							url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_time="+encodeURIComponent(array_time[dynamicId])+"&form=0&control_type=13&param=submit_controls&action=edit_contact_form_library",
							
							success : function(data) 
							{
								
							}
							});
						break;
						case 14:
							var dynamicId = edit_control_dynamic_ids[flag];
							jQuery.ajax({
							type: "POST",
							url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_hidden="+encodeURIComponent(array_hidden[dynamicId])+"&form=0&control_type=14&param=submit_controls&action=edit_contact_form_library",
							
							success : function(data) 
							{
								
							}
							});
						break;
						case 15:
							var dynamicId = edit_control_dynamic_ids[flag];
							jQuery.ajax({
							type: "POST",
							url: ajaxurl + "?"+ jQuery(form).serialize() + "&form_id="+form_id+"&dynamicId="+dynamicId+"&array_password="+encodeURIComponent(array_password[dynamicId])+"&form=0&control_type=15&param=submit_controls&action=edit_contact_form_library",
							
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