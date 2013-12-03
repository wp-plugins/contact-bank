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
								<div class="layout-controls" style="padding-top:5px;">
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
								<label class="layout-control-label"><?php _e( "Label Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea placeholder="<?php _e( "Enter Label Style", contact_bank);?>" class="layout-span11" id="button_set_outer_label_<?php echo $dynamicId; ?>" name="button_set_outer_label_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;" onclick="delete_css_style_label(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle;" /></a> 
								</div>
							</div>
							<div class="layout-control-group" id="text_area_text_input_<?php echo $dynamicId; ?>" style="display:none">
								<label class="layout-control-label"><?php _e( "Text Input Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea  placeholder="<?php _e( "Enter Text Input Style", contact_bank);?>"class="layout-span11" id="button_set_textinput_<?php echo $dynamicId; ?>" name="button_set_textinput_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;" onclick="delete_css_style_textinput(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle;" /></a> 
								</div>
							</div>
							<div class="layout-control-group" id="text_area_description_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Description Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea placeholder="<?php _e( "Enter Description Style", contact_bank);?>" class="layout-span11" id="button_set_outer_description_<?php echo $dynamicId; ?>" name="button_set_outer_description_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;" onclick="delete_css_style_description(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle;" /></a> 
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Add a Style to", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_label_style_<?php echo $dynamicId; ?>" name="ux_button_label_style_<?php echo $dynamicId; ?>" onclick="button_set_outer_label(<?php echo $dynamicId; ?>,2);" value="<?php _e( "Label", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_txt_input_save_<?php echo $dynamicId; ?>" name="ux_button_txt_input_save_<?php echo $dynamicId; ?>" onclick="button_set_txt_input(<?php echo $dynamicId; ?>,2);" value="<?php _e( "Text Input", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_description_style_<?php echo $dynamicId; ?>" name="ux_button_description_style_<?php echo $dynamicId; ?>" onclick="button_set_description(<?php echo $dynamicId; ?>,2);" value="<?php _e( "Description", contact_bank ); ?>" />
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
		<input type="button" class="btn btn-info layout-span2" onclick="save_textarea_control(<?php echo $dynamicId; ?>)" value="<?php _e( "Save Settings", contact_bank ); ?>" />
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
		var dynamicCount = "<?php echo $dynamicCount;?>";
		array_controls[dynamicCount] = [];
		array_controls[dynamicCount].push({"control_type" : "2"});
		array_controls[dynamicCount].push({"textarea_dynamicId" : dynamicId});
		array_controls[dynamicCount].push({"cb_label_value" : jQuery("#ux_label_text_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_description" : jQuery("#ux_description_control_"+dynamicId).val()});
		jQuery("#ux_required_control_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_control_required": "1"}) : array_controls[dynamicCount].push({"cb_control_required": "0"});
		array_controls[dynamicCount].push({"cb_tooltip_txt" : jQuery("#ux_tooltip_control_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_default_txt_val" : jQuery("#ux_default_value_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_admin_label" : jQuery("#ux_admin_label_"+dynamicId).val()});
		jQuery("#ux_show_email_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_show_email": "1"}) : array_controls[dynamicCount].push({"cb_show_email": "0"});
		array_controls[dynamicCount].push({"cb_button_set_outer_label" : jQuery("#button_set_outer_label_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_txt_input" : jQuery("#button_set_textinput_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_txt_description" : jQuery("#button_set_outer_description_"+dynamicId).val()});
		jQuery("#ux_checkbox_alpha_filter_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_checkbox_alpha_filter": "1"}) : array_controls[dynamicCount].push({"cb_checkbox_alpha_filter": "0"});
		jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_ux_checkbox_alpha_num_filter": "1"}) : array_controls[dynamicCount].push({"cb_ux_checkbox_alpha_num_filter": "0"});
		jQuery("#ux_checkbox_digit_filter_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_checkbox_digit_filter": "1"}) : array_controls[dynamicCount].push({"cb_checkbox_digit_filter": "0"});
		jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_checkbox_strip_tag_filter": "1"}) : array_controls[dynamicCount].push({"cb_checkbox_strip_tag_filter": "0"});
		jQuery("#ux_checkbox_trim_filter_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_checkbox_trim_filter": "1"}) : array_controls[dynamicCount].push({"cb_checkbox_trim_filter": "0"});
		jQuery("#control_label_"+dynamicId).html(jQuery("#ux_label_text_"+dynamicId).val()+" :");
		jQuery("#txt_description_"+dynamicId).html(jQuery("#ux_description_control_"+dynamicId).val());
		jQuery("#ux_textarea_control_"+dynamicId).val(jQuery("#ux_default_value_"+dynamicId).val());
		jQuery("#show_tooltip"+dynamicId).attr("data-original-title",jQuery("#ux_tooltip_control_"+dynamicId).val());
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
		var dynamicCount = "<?php echo $dynamicCount;?>";
		var dynamicId = <?php echo $dynamicId; ?>;
		jQuery("#ux_label_text_"+dynamicId).val(array_controls[dynamicCount][2].cb_label_value);
		jQuery("#ux_description_control_"+dynamicId).val(array_controls[dynamicCount][3].cb_description);
		if(array_controls[dynamicCount][4].cb_control_required == "1")
		{
			jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
		}
		else
		{
			jQuery("#ux_required_"+dynamicId).attr("checked","checked");
		}
		jQuery("#ux_tooltip_control_"+dynamicId).val(array_controls[dynamicCount][5].cb_tooltip_txt);
		jQuery("#ux_default_value_"+dynamicId).val(array_controls[dynamicCount][6].cb_default_txt_val);
		jQuery("#ux_admin_label_"+dynamicId).val(array_controls[dynamicCount][7].cb_admin_label);
		if(array_controls[dynamicCount][8].cb_show_email == "1")
		{
			jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
		}
		if(array_controls[dynamicCount][9].cb_button_set_outer_label != "")
		{
			jQuery("#button_set_outer_label_"+dynamicId).html(array_controls[dynamicCount][9].cb_button_set_outer_label);
			jQuery("#text_area_label_"+dynamicId).attr("style","display:block");
			jQuery("#text_area_label_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][10].cb_button_set_txt_input != "")
		{
			jQuery("#button_set_textinput_"+dynamicId).html(array_controls[dynamicCount][10].cb_button_set_txt_input);
			jQuery("#text_area_text_input_"+dynamicId).attr("style","display:block");
			jQuery("#text_area_text_input_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][11].cb_button_set_txt_description != "")
		{
			jQuery("#button_set_outer_description_"+dynamicId).html(array_controls[dynamicCount][11].cb_button_set_txt_description);
			jQuery("#text_area_description_"+dynamicId).attr("style","display:block");
			jQuery("#text_area_description_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][12].cb_checkbox_alpha_filter == "1")
		{
			jQuery("#ux_checkbox_alpha_filter_"+dynamicId).attr("checked","checked");
		}
		if(array_controls[dynamicCount][13].cb_ux_checkbox_alpha_num_filter == "1")
		{
			jQuery("#ux_checkbox_alpha_num_filter_"+dynamicId).attr("checked","checked");
		}
		if(array_controls[dynamicCount][14].cb_checkbox_digit_filter == "1")
		{
			jQuery("#ux_checkbox_digit_filter_"+dynamicId).attr("checked","checked");
		}
		if(array_controls[dynamicCount][15].cb_checkbox_strip_tag_filter == "1")
		{
			jQuery("#ux_checkbox_strip_tag_filter_"+dynamicId).attr("checked","checked");
		}
		if(array_controls[dynamicCount][16].cb_checkbox_trim_filter == "1")
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