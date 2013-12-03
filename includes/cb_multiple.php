<div class="layout-span7">
	<div class="widget-layout widget-tabs">
		<div class="widget-layout-title">
			<h4><?php _e( "Radio Buttons", contact_bank ); ?></h4>
		</div>
		<div class="fluid-layout">
			<div class="layout-span12">
				<div class="widget-layout-body layout-form" >
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
									<input type="text" class="layout-span12" id="ux_label_text_<?php echo $dynamicId; ?>" onkeyup="enter_admin_label(<?php echo $dynamicId; ?>);" value="<?php _e( "Untitled", contact_bank ); ?>" placeholder="<?php _e( "Enter Label", contact_bank ); ?>" name="ux_label_text_<?php echo $dynamicId; ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("Required", contact_bank); ?> :</label>
								<div class="layout-controls" style="padding-top:5px;">
									<input type="radio" id="ux_required_control_<?php echo $dynamicId; ?>" name="ux_required_control_radio_<?php echo $dynamicId; ?>" value="1"/><label style="margin-left: 5px;"><?php _e( "Required", contact_bank ); ?></label>				
									<input type="radio" checked="checked" id="ux_required_<?php echo $dynamicId; ?>" name="ux_required_control_radio_<?php echo $dynamicId; ?>" value="0"/><label style="margin-left: 5px;"><?php _e( "Not Required", contact_bank ); ?></label>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("Tooltip Text", contact_bank); ?> :</label>
								<div class="layout-controls">
									<input type="text" class="layout-span12" id="ux_tooltip_control_<?php echo $dynamicId; ?>"  name="ux_tooltip_control_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Tooltip Text", contact_bank ); ?>"/>
								</div>
								<input type="hidden" id="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" name="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" />
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("Options", contact_bank); ?> :</label>
								<div class="layout-controls">
									<input type="text" onKeyPress="white_space(event)" class="layout-span9" id="radio_options_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Option", contact_bank ); ?>" name="radio_options_<?php echo $dynamicId; ?>" /><input class="btn btn-info layout-span2" style="margin-left: 7px;" value="<?php _e( "Add option", contact_bank ); ?>" type="button" id="radio_options_button_<?php echo $dynamicId; ?>" onclick="add_radio_options(<?php echo $dynamicId; ?>);"/>
								</div>
							</div>
							<div class="layout-control-group">
								<span  id="append_multiple_option_<?php echo $dynamicId; ?>"></span>
							</div>
						</div>
					</div>
					<div id="tabs-nohdr-2"  style="display:none;">
						<div id="div_optional_<?php echo $dynamicId; ?>">
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Admin label", contact_bank ); ?> :</label>
								<div class="layout-controls">	
									<input type="text" value="<?php _e( "Untitled", contact_bank ); ?>" class="layout-span12" id="ux_admin_label_<?php echo $dynamicId; ?>" name="ux_admin_label_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Admin Label", contact_bank ); ?>"/>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Do not show in the email", contact_bank ); ?> :</label>
								<div class="layout-controls" style="padding-top:5px;">
									<input type="checkbox" id="ux_show_email_<?php echo $dynamicId; ?>" name="ux_show_email_<?php echo $dynamicId; ?>" value="1" >
								</div>
							</div>
						</div>
					</div>
					<div id="tabs-nohdr-1"  style="display:none;">
						<div id="div_advanced_<?php echo $dynamicId; ?>">
							<div class="layout-control-group" id="show_data_label_tr_radio_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e('Label Style', contact_bank); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_outer_label_radio_<?php echo $dynamicId; ?>" name="button_set_outer_label_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Label Style", contact_bank ); ?>"></textarea>
									<a style='cursor:pointer;'  onclick='delete_button_outer_label_radio(<?php echo $dynamicId; ?>);' ><img src= '<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png' style='vertical-align: middle' /></a>
								</div>
							</div>
							<div class="layout-control-group" id="show_data_description_tr_radio_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Description Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_description_textarea_radio_<?php echo $dynamicId; ?>" name="ux_description_textarea_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Description Style", contact_bank ); ?>"></textarea>
									<a style='cursor:pointer;'  onclick='delete_button_set_description_radio(<?php echo $dynamicId; ?>);' ><img src= '<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png' style='vertical-align: middle' /></a>
								</div>
							</div>
							<div class="layout-control-group" id="show_data_option_outer_wrapper_tr_radio_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Options Outer Wrapper Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_button_options_outer_wrapper_radio_<?php echo $dynamicId; ?>" name="ux_description_textarea_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Options Outer Wrapper Style", contact_bank ); ?>"></textarea>
									<a style='cursor:pointer;'  onclick='delete_button_options_outer_wrapper_radio(<?php echo $dynamicId; ?>);' ><img src= '<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png' style='vertical-align: middle' /></a>
								</div>
							</div>
							<div class="layout-control-group" id="show_data_option_wrapper_tr_radio_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Options Wrapper Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_button_option_wrapper_radio_<?php echo $dynamicId; ?>" name="ux_description_textarea_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Options Wrapper Style", contact_bank ); ?>"></textarea>
									<a style='cursor:pointer;'  onclick='delete_button_option_wrapper_radio(<?php echo $dynamicId; ?>);' ><img src= '<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png' style='vertical-align: middle' /></a>
								</div>
							</div>
							<div class="layout-control-group" id="show_data_option_label_tr_radio_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Option Label Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_button_option_label_radio_<?php echo $dynamicId; ?>" name="ux_description_textarea_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Option Label Style", contact_bank ); ?>"></textarea>
									<a style='cursor:pointer;'  onclick='delete_button_option_label_radio(<?php echo $dynamicId; ?>);' ><img src= '<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png' style='vertical-align: middle' /></a>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Add a Style to", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_label_style_<?php echo $dynamicId; ?>" name="ux_button_label_style_<?php echo $dynamicId; ?>" onclick="button_set_outer_label_radio(<?php echo $dynamicId; ?>);" style="margin-bottom: 5px;" value="<?php _e( "Label", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_description_style_<?php echo $dynamicId; ?>" name="ux_button_description_style_<?php echo $dynamicId; ?>" onclick="button_set_description_radio(<?php echo $dynamicId; ?>);" style="margin-bottom: 5px;display: none;" value="<?php _e( "Description", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span4" id="ux_button_optional_outer_wrapper_style_<?php echo $dynamicId; ?>" name="ux_button_optional_outer_wrapper_style_<?php echo $dynamicId; ?>" onclick="button_options_outer_wrapper_radio(<?php echo $dynamicId; ?>);" style="margin-bottom: 5px;" value="<?php _e( "Options Outer Wrapper", contact_bank ); ?>"/>
									<input type="button" class="btn btn-inverse layout-span3" id="ux_button_Option wrapper_<?php echo $dynamicId; ?>" name="ux_button_Option wrapper_<?php echo $dynamicId; ?>" onclick="button_option_wrapper_radio(<?php echo $dynamicId; ?>);" style="margin-bottom: 5px;" value="<?php _e( "Options  Wrapper", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span3" id="ux_button_Option label_<?php echo $dynamicId; ?>" name="ux_button_Option label_<?php echo $dynamicId; ?>" onclick="button_option_label_radio(<?php echo $dynamicId; ?>);" style="margin-bottom: 5px;" value="<?php _e( "Options Label", contact_bank ); ?>"  />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="layout-control-group">	
		<input type="button"  class="btn btn-info layout-span2" onclick="save_multiple_control(<?php echo $dynamicId; ?>)" value="<?php _e( "Save Settings", contact_bank ); ?>" />
	</div>
</div>
<script type="text/javascript">
	array_options_radio["<?php echo $dynamicCount;?>"] = [];
	array_option_id_radio["<?php echo $dynamicCount;?>"] = [];
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
	var count = <?php echo $count; ?>;
	if(count != 0)
	{
		var dynamicCount = "<?php echo $dynamicCount;?>";
		var dynamicId = <?php echo $dynamicId; ?>;
		if(array_controls[dynamicCount][5].cb_radio_option_id != "")
		{
			var optionId_str = array_controls[dynamicCount][5].cb_radio_option_id;
			var optionId = optionId_str.split(";");
			var option_value_str = array_controls[dynamicCount][6].cb_radio_option_val;
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
		jQuery("#ux_label_text_"+dynamicId).val(array_controls[dynamicCount][2].cb_label_value);
		if(array_controls[dynamicCount][3].cb_control_required == "1")
		{
			jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
		}
		else
		{
			jQuery("#ux_required_"+dynamicId).attr("checked","checked");
		}
		jQuery("#ux_tooltip_control_"+dynamicId).val(array_controls[dynamicCount][4].cb_tooltip_txt);
		jQuery("#ux_admin_label_"+dynamicId).val(array_controls[dynamicCount][7].cb_admin_label);
		if(array_controls[dynamicCount][8].cb_show_email == "1")
		{
			jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
		}
		if(array_controls[dynamicCount][9].cb_button_set_outer_label != "")
		{
			jQuery("#button_set_outer_label_radio_"+dynamicId).html(array_controls[dynamicCount][9].cb_button_set_outer_label);
			jQuery("#show_data_label_tr_radio_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_label_tr_radio_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][10].cb_button_set_description != "")
		{
			jQuery("#ux_description_textarea_radio_"+dynamicId).html(array_controls[dynamicCount][10].cb_button_set_description);
			jQuery("#show_data_description_tr_radio_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_description_tr_radio_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][11].cb_button_set_options_outer_wrapper != "")
		{
			jQuery("#ux_button_options_outer_wrapper_radio_"+dynamicId).html(array_controls[dynamicCount][11].cb_button_set_options_outer_wrapper);
			jQuery("#show_data_option_outer_wrapper_tr_radio_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_option_outer_wrapper_tr_radio_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][12].cb_button_set_options_wrapper != "")
		{
			jQuery("#ux_button_option_wrapper_radio_"+dynamicId).html(array_controls[dynamicCount][12].cb_button_set_options_wrapper);
			jQuery("#show_data_option_wrapper_tr_radio_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_option_wrapper_tr_radio_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][13].cb_button_set_options_label != "")
		{
			jQuery("#ux_button_option_label_radio_"+dynamicId).html(array_controls[dynamicCount][13].cb_button_set_options_label);
			jQuery("#show_data_option_label_tr_radio_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_option_label_tr_radio_"+dynamicId).attr("style","position:inherit");
		}
	}
	function add_radio_options(dynamicId)
	{
		var add_radio_options = jQuery("#radio_options_"+dynamicId).val();
		if(add_radio_options=="")
		{
			alert("<?php _e( "Please Fill an Option.", contact_bank ); ?>");
		}
		else 
		{
			var options_dynamicId = Math.floor((Math.random()*10000)+1);
			array_options_radio[dynamicCount].push(add_radio_options);
			array_option_id_radio[dynamicCount].push(options_dynamicId);
			jQuery("#append_multiple_option_"+dynamicId).append('<div class="layout-control-group" id="input_tr_'+options_dynamicId+'"><div class="layout-controls"><input type="text" class="layout-span8" id="input_option_'+options_dynamicId+'" name="input_option_'+options_dynamicId+'" value="'+add_radio_options+'" /><a style="padding-left:2px;" onclick="delete_radio('+options_dynamicId+','+dynamicId+')"><img style="vertical-align: top;margin-top: 2px;" src="<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" /></a></div></div>');
			jQuery("#radio_options_"+dynamicId).val("");
		}
	}
	function delete_radio(options_dynamicId,dynamicId)
	{
		var input_type_value = jQuery("#input_option_"+options_dynamicId).val();
		jQuery("#input_tr_"+options_dynamicId).remove();
		var place_of_option_in_array_id = jQuery.inArray(parseInt(options_dynamicId),array_option_id_radio[dynamicCount]);
		if(place_of_option_in_array_id != -1)
		{
			array_options_radio[dynamicCount].splice(place_of_option_in_array_id,1);
			array_option_id_radio[dynamicCount].splice(place_of_option_in_array_id,1);
		}
	}
	
	function button_set_outer_label_radio(dynamicId)
	{
		jQuery("#show_data_label_tr_radio_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_label_tr_radio_"+dynamicId).attr("style", "position:inherit");
	}
	function button_set_description_radio(dynamicId)
	{
		jQuery("#show_data_description_tr_radio_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_description_tr_radio_"+dynamicId).attr("style", "position:inherit");
	}
	function button_options_outer_wrapper_radio(dynamicId)
	{
		jQuery("#show_data_option_outer_wrapper_tr_radio_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_option_outer_wrapper_tr_radio_"+dynamicId).attr("style", "position:inherit");
	}
	function button_option_wrapper_radio(dynamicId)
	{
		jQuery("#show_data_option_wrapper_tr_radio_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_option_wrapper_tr_radio_"+dynamicId).attr("style", "position:inherit");
	}
	function button_option_label_radio(dynamicId)
	{
		jQuery("#show_data_option_label_tr_radio_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_option_label_tr_radio_"+dynamicId).attr("style", "position:inherit");
	}
	function delete_button_outer_label_radio(dynamicId)
	{
		jQuery("#show_data_label_tr_radio_"+dynamicId).attr("style","display:none");
		jQuery("#button_set_outer_label_radio_"+dynamicId).val("");
	}
	function delete_button_set_description_radio(dynamicId)
	{
		jQuery("#show_data_description_tr_radio_"+dynamicId).attr("style","display:none");
		jQuery("#ux_description_textarea_radio_"+dynamicId).val("");
	}
	function delete_button_options_outer_wrapper_radio(dynamicId)
	{
		jQuery("#show_data_option_outer_wrapper_tr_radio_"+dynamicId).attr("style","display:none");
		jQuery("#ux_button_options_outer_wrapper_radio_"+dynamicId).val("");
	}
	function delete_button_option_wrapper_radio(dynamicId)
	{
		jQuery("#show_data_option_wrapper_tr_radio_"+dynamicId).attr("style","display:none");
		jQuery("#ux_button_option_wrapper_radio_"+dynamicId).val("");
	}
	function delete_button_option_label_radio(dynamicId)
	{
		jQuery("#show_data_option_label_tr_radio_"+dynamicId).attr("style","display:none");
		jQuery("#ux_button_option_label_radio_"+dynamicId).val("");
	}
	function save_multiple_control(dynamicId)
	{
		var dynamicCount = "<?php echo $dynamicCount;?>";
		array_controls[dynamicCount] = [];
		array_controls[dynamicCount].push({"control_type" : "6"});
		array_controls[dynamicCount].push({"radio_dynamicId" : dynamicId});
		array_controls[dynamicCount].push({"cb_label_value" : jQuery("#ux_label_text_"+dynamicId).val()});
		jQuery("#ux_required_control_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_control_required": "1"}) : array_controls[dynamicCount].push({"cb_control_required": "0"});
		array_controls[dynamicCount].push({"cb_tooltip_txt" : jQuery("#ux_tooltip_control_"+dynamicId).val()});
		var radio_optionId_str = "";
		var radio_option_str = "";
		jQuery("#ux_radio_button_control_"+dynamicId).hide();
		jQuery("#add_radio_options_here_"+dynamicId).empty();
		if(array_options_radio[dynamicCount].length == 0)
		{
			jQuery("#ux_radio_button_control_"+dynamicId).show();
		}
		for(var flag=0;flag<array_option_id_radio[dynamicCount].length;flag++)
		{
			radio_optionId_str = radio_optionId_str+array_option_id_radio[dynamicCount][flag];
			if(flag < array_option_id_radio[dynamicCount].length-1)
			{
				radio_optionId_str = radio_optionId_str+";";
			}
			options_dynamicId = array_option_id_radio[dynamicCount][flag];
			add_radio_options = array_options_radio[dynamicCount][flag];
			jQuery("#add_radio_options_here_"+dynamicId).append('<span  id="input_id_'+options_dynamicId+'"><input  name="radio" type="radio" id="add_radio_'+options_dynamicId+'" /><label style="margin:0px 5px;" id="add_radio_lab_'+options_dynamicId+'" >'+add_radio_options+'</label></span>');
		}
		for(var flag=0;flag<array_option_id_radio[dynamicCount].length;flag++)
		{
			radio_option_str = radio_option_str+array_options_radio[dynamicCount][flag];
			if(flag < array_option_id_radio[dynamicCount].length-1)
			{
				radio_option_str = radio_option_str+";";
			}
		}
		array_controls[dynamicCount].push({"cb_radio_option_id" : radio_optionId_str});
		array_controls[dynamicCount].push({"cb_radio_option_val" : radio_option_str});
		array_controls[dynamicCount].push({"cb_admin_label" : jQuery("#ux_admin_label_"+dynamicId).val()});
		jQuery("#ux_show_email_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_show_email": "1"}) : array_controls[dynamicCount].push({"cb_show_email": "0"});
		array_controls[dynamicCount].push({"cb_button_set_outer_label" : jQuery("#button_set_outer_label_radio_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_description" : jQuery("#ux_description_textarea_radio_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_options_outer_wrapper" : jQuery("#ux_button_options_outer_wrapper_radio_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_options_wrapper" : jQuery("#ux_button_option_wrapper_radio_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_options_label" : jQuery("#ux_button_option_label_radio_"+dynamicId).val()});
		jQuery("#control_label_"+dynamicId).html(jQuery("#ux_label_text_"+dynamicId).val()+" :");
		jQuery("#post_back_radio_button_"+dynamicId).attr("data-original-title",jQuery("#ux_tooltip_control_"+dynamicId).val());	
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
 	function white_space(e)
	{
		var regex = new RegExp("^[0-9a-zA-Z-.~`^_!@\b#$%&*()+={}\| ]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) 
		{
			return true;
		}
		e.preventDefault();
		return false;
	}
</script>	