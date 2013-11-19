<?php

if($_REQUEST["param"] == "create_textarea_control")
{
	$dynamicId = intval($_REQUEST["dynamicId"]);
	$field_id = intval($_REQUEST["field_id"]);
	?>
	<div class="layout-control-group div_border" id="div_<?php echo $dynamicId; ?>_2">
		<label class="layout-control-label" id="control_label_<?php echo $dynamicId; ?>" ><?php _e('Untitled', contact_bank); ?> : </label>
		<span class="error" id="txt_required_<?php echo $dynamicId; ?>"> *</span>
		<div class="layout-controls hovertip" id="show_tooltip<?php echo $dynamicId; ?>">
			<textarea class="layout-span7" id="textarea_<?php echo $dynamicId; ?>" name="textarea_<?php echo $dynamicId; ?>" />
			<a class="btn btn-info inline"  id="add_setting_control_<?php echo $dynamicId; ?>"  href="#setting_controls_postback" ><?php _e( "Settings", contact_bank ); ?></a>	
			<a style="cursor:pointer;"  onclick="delete_textbox(div_<?php echo $dynamicId; ?>_2,<?php echo $dynamicId; ?>);" id="anchor_del_<?php echo $dynamicId; ?>" >
				<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px" onmouseover="img_show(<?php echo $dynamicId; ?>)" onmouseout"img_hide(<?php echo $dynamicId; ?>)"  />
			</a> 
			<br />
			<span class="span-description"  id="txt_description_<?php echo $dynamicId; ?>"></span> 
		</div>
	</div>
	<?php
	die();
}
else 
{
?>
<div class="layout-span7">
	<div class="widget-layout widget-tabs">
		<div class="widget-layout-title">
			<h4><?php _e( "Textarea Control", contact_bank ); ?></h4>
			
		</div>
		<div class="fluid-layout">
			<div class="layout-span12">
				<div class="widget-layout-body layout-form">
					<ul style="margin-bottom:30px;" class="nav nav-tabs" id="tabs-nohdr_<?php echo $dynamicId; ?>">
						<li id="li3">
							<a id="tab3" onclick="tabsFunc(this);"><?php _e( "Advanced", contact_bank ); ?></a>
						</li>
						<li id="li2">
							<a id="tab2" onclick="tabsFunc(this);"><?php _e( "Options", contact_bank ); ?></a>
						</li>
						<li id="li1" class="active">
							<a id="tab1" onclick="tabsFunc(this);"><?php _e( "Settings", contact_bank ); ?></a>
						</li>
					</ul>
					<div id="tabs-nohdr-3">
						<div id="div_settings_<?php echo $dynamicId; ?>">
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Label", contact_bank ); ?> :</label>
								<div class="layout-controls">
								<input value="<?php _e( "Untitled", contact_bank ); ?>" onkeyup="enter_admin_label(<?php echo $dynamicId; ?>);" placeholder="<?php _e( "Enter label", contact_bank);?>" type="text" class="layout-span12" id="ux_label_text_<?php echo $dynamicId; ?>"   name="ux_label_text_<?php echo $dynamicId; ?>"  />
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("Description", contact_bank); ?> :</label>
								<div class="layout-controls">				
									<textarea placeholder="<?php _e( "Enter  Description", contact_bank);?>" class="layout-span12" id="ux_description_control_<?php echo $dynamicId; ?>"  name="ux_description_control_<?php echo $dynamicId; ?>"  ></textarea>
								</div>
							</div>	
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Required", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="radio" id="ux_required_control_<?php echo $dynamicId; ?>" name="ux_required_control_radio_<?php echo $dynamicId; ?>" value="1"/><label style="margin-left: 5px;"><?php _e( "Required", contact_bank ); ?></label>    
									<input type="radio" checked="checked" id="ux_required_<?php echo $dynamicId; ?>" name="ux_required_control_radio_<?php echo $dynamicId; ?>" value="0"/><label style="margin-left: 5px;"><?php _e( "Not Required", contact_bank ); ?></label>
								</div>
							</div>
							<div class="layout-control-group">
								<label  class="layout-control-label"><?php _e("Tooltip text", contact_bank); ?> :</label>
								<div class="layout-controls">
									<input placeholder="<?php _e( "Enter Tooltip", contact_bank);?>" type="text" class="layout-span12" id="ux_tooltip_control_<?php echo $dynamicId; ?>"  name="ux_tooltip_control_<?php echo $dynamicId; ?>" />
								</div>
							</div>
						
							<div class="layout-control-group">
								<div class="layout-controls">
									<input type="hidden" id="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" name="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" />
								</div>
							</div>		
						</div>
					</div>
					<div id="tabs-nohdr-2" style="display:none;">
						<div  id="div_optional_<?php echo $dynamicId; ?>" style="height: auto;overflow: hidden;">
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Default value", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input placeholder="<?php _e( "Enter Default value", contact_bank);?>" class="layout-span12" type="text" id="ux_default_value_<?php echo $dynamicId; ?>"  name="ux_default_value_<?php echo $dynamicId; ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Admin label", contact_bank ); ?> : </label>
								<div class="layout-controls">
									<input value="<?php _e( "Untitled", contact_bank ); ?>" placeholder="<?php _e( "Enter Admin label", contact_bank);?>" class="layout-span12" type="text" class="layout-span12" id="ux_admin_label_<?php echo $dynamicId; ?>" name="ux_admin_label_<?php echo $dynamicId; ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Do not show in the email", contact_bank ); ?> : </label>
								<div class="layout-controls">
									<input type="checkbox"  id="ux_show_email_<?php echo $dynamicId; ?>" name="ux_show_email_<?php echo $dynamicId; ?>" style="margin-top: 10px;" value="1" >
								</div>
							</div>
						</div>
					</div>
					<div id="tabs-nohdr-1"  style="display:none;">
						<div  id="div_advanced_<?php echo $dynamicId; ?>">
							<div class="layout-control-group" id="text_area_label_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "CSS label", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea placeholder="<?php _e( "Enter css Label", contact_bank);?>" class="layout-span11" id="button_set_outer_label_<?php echo $dynamicId; ?>" name="button_set_outer_label_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;" onclick="delete_css_style_label(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle;" /></a> 
								</div>
							</div>
							<div class="layout-control-group" id="text_area_text_input_<?php echo $dynamicId; ?>" style="display:none">
								<label class="layout-control-label"><?php _e( "CSS textinput", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea  placeholder="<?php _e( "Enter css textinput", contact_bank);?>"class="layout-span11" id="button_set_textinput_<?php echo $dynamicId; ?>" name="button_set_textinput_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;" onclick="delete_css_style_textinput(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle;" /></a> 
								</div>
							</div>
							<div class="layout-control-group" id="text_area_description_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "CSS description", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea placeholder="<?php _e( "Enter css description", contact_bank);?>" class="layout-span11" id="button_set_outer_description_<?php echo $dynamicId; ?>" name="button_set_outer_description_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;" onclick="delete_css_style_description(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle;" /></a> 
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Add a style to", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="button" class="btn btn-inverse layout-span3" id="ux_button_label_style_<?php echo $dynamicId; ?>" name="ux_button_label_style_<?php echo $dynamicId; ?>" onclick="button_set_outer_label(<?php echo $dynamicId; ?>,2);" value="<?php _e( "Label", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span3" id="ux_button_txt_input_save_<?php echo $dynamicId; ?>" name="ux_button_txt_input_save_<?php echo $dynamicId; ?>" onclick="button_set_txt_input(<?php echo $dynamicId; ?>,2);" value="<?php _e( "Text input", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span3" id="ux_button_description_style_<?php echo $dynamicId; ?>" name="ux_button_description_style_<?php echo $dynamicId; ?>" onclick="button_set_description(<?php echo $dynamicId; ?>,2);" value="<?php _e( "Description", contact_bank ); ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Add a filter", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="checkbox" value="1" id="ux_checkbox_alpha_filter_<?php echo $dynamicId; ?>" name="ux_checkbox_alpha_filter_<?php echo $dynamicId; ?>"  /><span style="margin-left: 5px"><?php _e( "Alpha", contact_bank ); ?></span><br>
									<input type="checkbox"  value="1"  id="ux_checkbox_alpha_num_filter_<?php echo $dynamicId; ?>" name="ux_checkbox_alpha_num_filter_<?php echo $dynamicId; ?>"  value="Alpha Numeric" /><span style="margin-left: 5px"><?php _e( "Alpha Numeric", contact_bank ); ?></span><br>
									<input type="checkbox"  value="1"  id="ux_checkbox_digit_filter_<?php echo $dynamicId; ?>" name="ux_checkbox_digit_filter_<?php echo $dynamicId; ?>"  value="Digits" /><span style="margin-left: 5px"><?php _e( "Digits", contact_bank ); ?></span><br>
									<input type="checkbox"  value="1"  id="ux_checkbox_strip_tag_filter_<?php echo $dynamicId; ?>" name="ux_checkbox_strip_tag_filter_<?php echo $dynamicId; ?>"  value="Strip Tags" /><span style="margin-left: 5px"><?php _e( "Strip Tags", contact_bank ); ?></span><br>
									<input type="checkbox" value="1" id="ux_checkbox_trim_filter_<?php echo $dynamicId; ?>" name="ux_checkbox_trim_filter_<?php echo $dynamicId; ?>"  value="Trim" /><span style="margin-left: 5px"><?php _e( "Trim", contact_bank ); ?></span><br>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<div class="layout-control-group">	
		<input type="button" style="float:left;margin-left: 0px;" class="btn btn-info layout-span2" onclick="save_textarea_control(<?php echo $dynamicId; ?>)" value="<?php _e( "Save", contact_bank ); ?>" />
	</div>
</div>
<script type="text/javascript">
	jQuery(".hovertip").tooltip();
	function tabsFunc(control)
	{
		switch(control.id)
		{
			case "tab1":
					jQuery("#tabs-nohdr-1").css("display","none");
					jQuery("#tabs-nohdr-2").css("display","none");
					jQuery("#tabs-nohdr-3").css("display","block");
					jQuery("#li1").attr("class","active");
					jQuery("#li2").removeAttr("class");
					jQuery("#li3").removeAttr("class");
			break;
			case "tab2":
					jQuery("#tabs-nohdr-1").css("display","none");
					jQuery("#tabs-nohdr-3").css("display","none");
					jQuery("#tabs-nohdr-2").css("display","block");
					jQuery("#li2").attr("class","active");
					jQuery("#li1").removeAttr("class");
					jQuery("#li3").removeAttr("class");
			break;
			case "tab3":
					jQuery("#tabs-nohdr-3").css("display","none");
					jQuery("#tabs-nohdr-2").css("display","none");
					jQuery("#tabs-nohdr-1").css("display","block");
					jQuery("#li3").attr("class","active");
					jQuery("#li1").removeAttr("class");
					jQuery("#li2").removeAttr("class");
			break;
		}
		
	}
	function save_textarea_control(dynamicId)
	{
		array_textarea[dynamicId] = [];
		array_textarea[dynamicId].push(2);
		array_textarea[dynamicId].push(dynamicId);
		array_textarea[dynamicId].push(jQuery("#ux_label_text_"+dynamicId).val());
		array_textarea[dynamicId].push( jQuery("#ux_description_control_"+dynamicId).val());
		if(jQuery("#ux_required_control_"+dynamicId).prop("checked") == true)
		{
			array_textarea[dynamicId].push("1");
		}
		else
		{
			array_textarea[dynamicId].push("0");
		}
		array_textarea[dynamicId].push(jQuery("#ux_tooltip_control_"+dynamicId).val());
		array_textarea[dynamicId].push(jQuery("#ux_default_value_"+dynamicId).val());
		array_textarea[dynamicId].push(jQuery("#ux_admin_label_"+dynamicId).val());
		array_textarea[dynamicId].push( jQuery("#ux_show_email_"+dynamicId).prop("checked"));
		array_textarea[dynamicId].push( jQuery("#button_set_outer_label_"+dynamicId).val());
		array_textarea[dynamicId].push( jQuery("#button_set_textinput_"+dynamicId).val());
		array_textarea[dynamicId].push( jQuery("#button_set_outer_description_"+dynamicId).val());
		array_textarea[dynamicId].push( jQuery("#ux_checkbox_alpha_filter_"+dynamicId).prop("checked"));
		array_textarea[dynamicId].push( jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).prop("checked"));
		array_textarea[dynamicId].push( jQuery("#ux_checkbox_digit_filter_"+dynamicId).prop("checked"));
		array_textarea[dynamicId].push( jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).prop("checked")); 
		array_textarea[dynamicId].push( jQuery("#ux_checkbox_trim_filter_"+dynamicId).prop("checked"));
		jQuery("#control_label_"+dynamicId).html(jQuery("#ux_label_text_"+dynamicId).val()+" :");
		jQuery("#txt_description_"+dynamicId).html(jQuery("#ux_description_control_"+dynamicId).val());
		jQuery("#textarea_"+dynamicId).val(jQuery("#ux_default_value_"+dynamicId).val());
		var tooltip_text = jQuery("#ux_tooltip_control_"+dynamicId).val();
		jQuery("#show_tooltip"+dynamicId).attr("data-original-title",tooltip_text);
		if(jQuery("#ux_required_control_"+dynamicId).prop("checked") == true)
		{
			jQuery("#txt_required_"+dynamicId).css("display","block");
		}
		else
		{
			jQuery("#txt_required_"+dynamicId).css("display","none");
		}
		CloseLightbox();
	}
	function enter_admin_label(dynamicId)
	{
		var ux_label = jQuery("#ux_label_text_"+dynamicId).val();
		jQuery("#ux_admin_label_"+dynamicId).val(ux_label);
	}
	var count = <?php echo $count; ?>;
	if(count != 0)
	{
		var dynamicId = <?php echo $dynamicId; ?>;
		jQuery("#ux_label_text_"+dynamicId).val(array_textarea[dynamicId][2]);
		jQuery("#ux_description_control_"+dynamicId).val(array_textarea[dynamicId][3]);
		if(array_textarea[dynamicId][4] == 1)
		{
			jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
		}
		else
		{
			jQuery("#ux_required_"+dynamicId).attr("checked","checked");
		}
		jQuery("#ux_tooltip_control_"+dynamicId).val(array_textarea[dynamicId][5]);
		jQuery("#ux_default_value_"+dynamicId).val(array_textarea[dynamicId][6]);
		jQuery("#ux_admin_label_"+dynamicId).val(array_textarea[dynamicId][7]);
		if(array_textarea[dynamicId][8] == true)
		{
			jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
		}
		if(array_textarea[dynamicId][9] != "")
		{
			jQuery("#button_set_outer_label_"+dynamicId).html(array_textarea[dynamicId][9]);
			jQuery("#text_area_label_"+dynamicId).attr("style","display:block");
			jQuery("#text_area_label_"+dynamicId).attr("style","position:inherit");
		}
		if(array_textarea[dynamicId][10] != "")
		{
			jQuery("#button_set_textinput_"+dynamicId).html(array_textarea[dynamicId][10]);
			jQuery("#text_area_text_input_"+dynamicId).attr("style","display:block");
			jQuery("#text_area_text_input_"+dynamicId).attr("style","position:inherit");
		}
		if(array_textarea[dynamicId][11] != "")
		{
			jQuery("#button_set_outer_description_"+dynamicId).html(array_textarea[dynamicId][11]);
			jQuery("#text_area_description_"+dynamicId).attr("style","display:block");
			jQuery("#text_area_description_"+dynamicId).attr("style","position:inherit");
		}		
		if(array_textarea[dynamicId][12] == true)
		{
			jQuery("#ux_checkbox_alpha_filter_"+dynamicId).attr("checked","checked");
		}
		if(array_textarea[dynamicId][13] == true)
		{
			jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).attr("checked","checked");
		}
		if(array_textarea[dynamicId][14] == true)
		{
			jQuery("#ux_checkbox_digit_filter_"+dynamicId).attr("checked","checked");
		}
		if(array_textarea[dynamicId][15] == true)
		{
			jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).attr("checked","checked");
		}
		if(array_textarea[dynamicId][16] == true)
		{
			jQuery("#ux_checkbox_trim_filter_"+dynamicId).attr("checked","checked");
		}
	}	
	function button_set_outer_label(dynamicId)
	{
		
		jQuery("#text_area_label_"+dynamicId).css("display","block");
		jQuery("#text_area_label_"+dynamicId).attr("style", 'position:inherit');
		
	}
	
	function button_set_txt_input(dynamicId)
	{
		
		jQuery("#text_area_text_input_"+dynamicId).css("display","block");
		
		jQuery("#text_area_text_input_"+dynamicId).attr("style", 'position:inherit');
		
	}
	function button_set_description(dynamicId)
	{
		
		jQuery("#text_area_description_"+dynamicId).css("display","block");
		
		jQuery("#text_area_description_"+dynamicId).attr("style", 'position:inherit');
		
	}
	function delete_css_style_label(dynamicId)
	{
		jQuery("#text_area_label_" +dynamicId).css("display","none");
		jQuery("#button_set_outer_label_"+dynamicId).val("");
	}
	function delete_css_style_textinput(dynamicId)
	{
		jQuery("#text_area_text_input_" +dynamicId).css("display","none");
		jQuery("#button_set_textinput_"+dynamicId).val("");
	}
	function delete_css_style_description(dynamicId)
	{
		jQuery("#text_area_description_" +dynamicId).css("display","none");
		jQuery("#button_set_outer_description_"+dynamicId).val("");
	}
</script>
<?php
}
?>