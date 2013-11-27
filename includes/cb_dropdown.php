<?php
if($_REQUEST["param"] == "create_select_control")
{
	$dynamicId = intval($_REQUEST["dynamicId"]);
	$field_id = intval($_REQUEST["field_id"]);
	?>
	<div class="layout-control-group div_border" id="div_<?php echo $dynamicId; ?>_4">
		<label class="layout-control-label" id="control_label_<?php echo $dynamicId; ?>" ><?php _e("Untitled", contact_bank); ?> :</label>
		<span id="txt_required_<?php echo $dynamicId; ?>"  class="error">*</span>
		<div class="layout-controls hovertip" id="show_tooltip<?php echo $dynamicId; ?>">
			<select class=" layout-span7" id="select_<?php echo $dynamicId; ?>" name="select_<?php echo $dynamicId; ?>">
				<option value="0"><?php _e("Select option",contact_bank);?></option>
			</select>
			<a class="btn btn-info inline"  href="#setting_controls_postback" id="add_setting_control_<?php echo $dynamicId; ?>" ><?php _e( "Settings", contact_bank); ?></a>	
			<a style="cursor:pointer;"  onclick="delete_textbox(div_<?php echo $dynamicId; ?>_4,<?php echo $dynamicId; ?>)" id="anchor_del_<?php echo $dynamicId; ?>">
				<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px" onmouseover="img_show(<?php echo $dynamicId; ?>)" onmouseout="img_hide(<?php echo $dynamicId; ?>)"  />
			</a>
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
			<h4><?php _e( "Dropdown Control", contact_bank ); ?></h4>
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
									<input type="text" class="layout-span11" onkeyup="enter_admin_label(<?php echo $dynamicId; ?>);" value="<?php _e( "Untitled", contact_bank ); ?>" id="ux_label_text_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Label", contact_bank ); ?>" name="ux_label_text_<?php echo $dynamicId; ?>" />
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
								<label class="layout-control-label"><?php _e("Tooltip Text", contact_bank); ?> : </label>
								<div class="layout-controls">
									<input type="text" class="layout-span11" id="ux_tooltip_control_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Tooltip", contact_bank ); ?>" name="ux_tooltip_control_<?php echo $dynamicId; ?>"/>
								</div>
								<input type="hidden" id="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" name="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" />
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("Options", contact_bank); ?> : </label>
								<div class="layout-controls">
									<input type="text" onKeyPress="white_space(event)" class="layout-span9" id="ddl_options_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Option", contact_bank ); ?>" name="ddl_options_<?php echo $dynamicId; ?>" /><input class="btn btn-info layout-span3"  value="<?php _e( "Add option", contact_bank ); ?>" type="button" id="ddl_options_button_<?php echo $dynamicId; ?>" onclick="add_ddl_options(<?php echo $dynamicId; ?>);"  name="ddl_options_button_<?php echo $dynamicId; ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<span id="dropdown_ddl_option_<?php echo $dynamicId; ?>"></span>
							</div>
						</div>
					</div>
					<div id="tabs-nohdr-2"  style="display:none;">
						<div id="div_optional_<?php echo $dynamicId; ?>">
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Admin Label", contact_bank ); ?> : </label>
								<div class="layout-controls">
									<input type="text" class="layout-span11" value="<?php _e( "Untitled", contact_bank ); ?>" id="ux_admin_label_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Admin Label", contact_bank ); ?>" name="ux_admin_label_<?php echo $dynamicId; ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Do not show in the email", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="checkbox" id="ux_email_<?php echo $dynamicId; ?>"  name="ux_email_<?php echo $dynamicId; ?>" value="1" >
								</div>
							</div>
						</div>
					</div>
					<div id="tabs-nohdr-1"  style="display:none;">	
						<div id="div_advanced_<?php echo $dynamicId; ?>">
							<div class="layout-control-group" id="show_data_label_tr_ddl_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e("Css Label", contact_bank); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_outer_label_ddl_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Label", contact_bank ); ?>" name="button_set_outer_label_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_button_outer_label_ddl(<?php echo $dynamicId; ?>);" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="show_data_dropdown_menu_tr_ddl_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e("Css Dropdown Menu", contact_bank); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_dropdown_menu_textarea_ddl_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Dropdown Menu", contact_bank ); ?>" name="ux_dropdown_menu_textarea_<?php echo $dynamicId; ?>" ></textarea>
									<a style="cursor:pointer;"  onclick="delete_button_dropdown_menu_ddl(<?php echo $dynamicId; ?>);" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="show_data_description_tr_ddl_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Css Description", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_description_textarea_ddl_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Description", contact_bank ); ?>" name="ux_description_textarea_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_button_set_description_ddl(<?php echo $dynamicId; ?>);" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Add a style to", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="button" class="btn btn-inverse layout-span4" id="ux_button_label_style_<?php echo $dynamicId; ?>" name="ux_button_label_style_<?php echo $dynamicId; ?>" onclick="button_set_outer_label_ddl(<?php echo $dynamicId; ?>);"  value="<?php _e( "Label", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span4" id="ux_button_dropdown_menu_<?php echo $dynamicId; ?>" name="ux_button_dropdown_menu_<?php echo $dynamicId; ?>" onclick="button_dropdown_menu_ddl(<?php echo $dynamicId; ?>);" value="<?php _e( "Dropdown menu", contact_bank ); ?>" />
									<input type="button" style="display: none;" class="btn btn-inverse layout-span4" id="ux_button_description_style_<?php echo $dynamicId; ?>" name="ux_button_description_style_<?php echo $dynamicId; ?>" onclick="button_set_description_ddl(<?php echo $dynamicId; ?>);" value="<?php _e( "Description", contact_bank ); ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="layout-control-group">	
		<input type="button" style="float:left;margin-left: 0px;" class="btn btn-info layout-span2" onclick="save_dropdownlist_control(<?php echo $dynamicId; ?>)" value="<?php _e( "Save", contact_bank ); ?>" />
	</div>
</div>
<script type="text/javascript">
	var dynamicId = <?php echo $dynamicId ?>;
	array_option_id_dropdown[dynamicId] = [];
	array_options_dropdown[dynamicId] = [];
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
	function button_set_outer_label_ddl(dynamicId)
	{
		jQuery("#show_data_label_tr_ddl_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_label_tr_ddl_"+dynamicId).attr("style", "position:inherit");
	}
	function button_dropdown_menu_ddl(dynamicId)
	{
		jQuery("#show_data_dropdown_menu_tr_ddl_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_dropdown_menu_tr_ddl_"+dynamicId).attr("style", "position:inherit");
	}
	function button_set_description_ddl(dynamicId)
	{
		jQuery("#show_data_description_tr_ddl_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_description_tr_ddl_"+dynamicId).attr("style", "position:inherit");
	}
	function delete_button_outer_label_ddl(dynamicId)
	{
		jQuery("#show_data_label_tr_ddl_"+dynamicId).attr("style","display:none");
		jQuery("#button_set_outer_label_ddl_"+dynamicId).val("");
	}
	function delete_button_dropdown_menu_ddl(dynamicId)
	{
		jQuery("#show_data_dropdown_menu_tr_ddl_"+dynamicId).attr("style","display:none");
		jQuery("#ux_dropdown_menu_textarea_ddl_"+dynamicId).val("");
	}
	function delete_button_set_description_ddl(dynamicId)
	{
		jQuery("#show_data_description_tr_ddl_"+dynamicId).attr("style","display:none");
		jQuery("#ux_description_textarea_ddl_"+dynamicId).val("");
	}
	function delete_css_style(dynamicId)
	{
		jQuery("#cb_div_show_outer_wrapper_" +dynamicId).remove();
		array_css_style.splice(index, 1);
		jQuery("#cb_css_no_style").css("display","block");
	}
	function set_default_value(dynamicId)
	{
		var default_value = jQuery("#ux_default_value_"+dynamicId).val();
		jQuery("#select_"+dynamicId).val(default_value);
	}
	var count = <?php echo $count; ?>;
	if(count != 0)
	{
		var dynamicId = <?php echo $dynamicId; ?>;
		if(array_dropdown[dynamicId][5] != "")
		{
			var optionId_str = array_dropdown[dynamicId][5];
			var optionId = optionId_str.split(";");
			var option_value_str = array_dropdown[dynamicId][6];
			var option_value = option_value_str.split(";");
			
			for(var flag = 0;flag <optionId.length ;flag++)
			{
				var optionsId = optionId[flag];
				var ddl_options = option_value[flag];
				array_options_dropdown[dynamicId].push(ddl_options);
				array_option_id_dropdown[dynamicId].push(optionsId);
				jQuery("#dropdown_ddl_option_"+dynamicId).append('<div class="layout-control-group" id="input_option_tr_'+optionsId+'"><div class="layout-controls"><input type="text" class="layout-span8" id="input_option_'+optionsId+'" name="input_option_'+optionsId+'" value="'+ddl_options+'" /><input type="hidden" value="'+ddl_options+'" id="ddl_existing_options_'+optionsId+'" name="ddl_existing_options_'+optionsId+'" /><a style="padding-left:2px;" onclick="delete_ddl_option('+optionsId+','+dynamicId+')" ><img style="vertical-align: top;margin-top: 2px;" src="<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" /></a><input class="btn btn-info layout-span3"  type="button" onclick="update_dropdown_option('+optionsId+','+dynamicId+')" value="<?php _e( "Update", contact_bank ); ?>"></div></div>');
			}
		}
		jQuery("#ux_label_text_"+dynamicId).val(array_dropdown[dynamicId][2]);
		if(array_dropdown[dynamicId][3] == 1)
		{
			jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
		}
		else
		{
			jQuery("#ux_required_"+dynamicId).attr("checked","checked");
		}
		jQuery("#ux_tooltip_control_"+dynamicId).val(array_dropdown[dynamicId][4]);
		jQuery("#ux_admin_label_"+dynamicId).val(array_dropdown[dynamicId][7]);
		if(array_dropdown[dynamicId][8] == true)
		{
			jQuery("#ux_email_"+dynamicId).attr("checked","checked");
		}
		if(array_dropdown[dynamicId][9] != "")
		{
			jQuery("#button_set_outer_label_ddl_"+dynamicId).html(array_dropdown[dynamicId][9]);
			jQuery("#show_data_label_tr_ddl_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_label_tr_ddl_"+dynamicId).attr("style","position:inherit");
		}
		if(array_dropdown[dynamicId][10] != "")
		{
			jQuery("#ux_dropdown_menu_textarea_ddl_"+dynamicId).html(array_dropdown[dynamicId][10]);
			jQuery("#show_data_dropdown_menu_tr_ddl_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_dropdown_menu_tr_ddl_"+dynamicId).attr("style","position:inherit");
		}
		if(array_dropdown[dynamicId][11] != "")
		{
			jQuery("#ux_description_textarea_ddl_"+dynamicId).html(array_dropdown[dynamicId][11]);
			jQuery("#show_data_description_tr_ddl_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_description_tr_ddl_"+dynamicId).attr("style","position:inherit");
		}
	}
	function add_ddl_options(dynamicId)
	{
		var ddl_options = jQuery("#ddl_options_"+dynamicId).val();
		if(ddl_options=="")
		{
			alert("<?php _e( "Please Fill an Option.", contact_bank ); ?>");
		}
		else 
		{
			var place_of_option_in_array = jQuery.inArray(ddl_options,array_options_dropdown[dynamicId]);
			if(place_of_option_in_array == -1)
			{
				var optionsId = Math.floor((Math.random()*1000)+1);
				jQuery("#dropdown_ddl_option_"+dynamicId).append('<div class="layout-control-group" id="input_option_tr_'+optionsId+'"><div class="layout-controls"><input type="text" class="layout-span8"  id="input_option_'+optionsId+'" name="input_option_'+optionsId+'" value="'+ddl_options+'"/><input type="hidden" value="'+ddl_options+'" id="ddl_existing_options_'+optionsId+'" name="ddl_existing_options_'+optionsId+'" value="'+ddl_options+'" /><a style="padding-left:2px;" onclick="delete_ddl_option('+optionsId+','+dynamicId+')" ><img style="vertical-align: top;margin-top: 2px;" src="<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" /></a><input class="btn btn-info layout-span3" style="margin-left:5px;" type="button" onclick="update_dropdown_option('+optionsId+','+dynamicId+')" value="<?php _e( "Update", contact_bank ); ?>"></div></div>');
				jQuery("#ddl_options_"+dynamicId).val("");
				array_option_id_dropdown[dynamicId].push(optionsId);
				array_options_dropdown[dynamicId].push(ddl_options);
				
			}
			else
			{
				alert("<?php _e( "This Option Already Exists. ", contact_bank ); ?>");
			}
		}
	}
	function delete_ddl_option(optionsId,dynamicId)
	{
		var input_type_value = jQuery("#input_option_"+optionsId).val();
		jQuery("#input_option_tr_"+optionsId).remove("");
		var place_of_option_in_array_id = jQuery.inArray(input_type_value,array_options_dropdown[dynamicId]);
		if(place_of_option_in_array_id != -1)
		{
			array_options_dropdown[dynamicId].splice(place_of_option_in_array_id,1);
			array_option_id_dropdown[dynamicId].splice(place_of_option_in_array_id,1);
		}
	}
	function update_dropdown_option(optionsId,dynamicId)
	{
		var existing_input_type_value = jQuery("#ddl_existing_options_"+optionsId).val();
		var updated_input_type_value = jQuery("#input_option_"+optionsId).val();
		var check_option_in_array = jQuery.inArray(updated_input_type_value,array_options_dropdown[dynamicId]);
		if(check_option_in_array != -1)
		{
			alert("<?php _e( "This Option Already Exists. ", contact_bank ); ?>");
			if(existing_input_type_value != 0)
			{
				jQuery("#input_option_"+optionsId).val(existing_input_type_value);
			}
		}
		else
		{
			place_of_option_in_array = jQuery.inArray(existing_input_type_value,array_options_dropdown[dynamicId]);
			array_options_dropdown[dynamicId][place_of_option_in_array] = updated_input_type_value;
			jQuery("#ddl_existing_options_"+optionsId).val(updated_input_type_value);
			alert("<?php _e( "Option updated", contact_bank ); ?>")
		}
	}
	function change_label_drop(optionsId)
	{
		var lable_value = jQuery("#input_option_"+optionsId).val();
		jQuery("#option_tr_"+optionsId).html(lable_value);
	}
	function save_dropdownlist_control(dynamicId)
	{
		array_dropdown[dynamicId] = [];
		array_dropdown[dynamicId].push(4);
		array_dropdown[dynamicId].push(dynamicId);
		array_dropdown[dynamicId].push(jQuery("#ux_label_text_"+dynamicId).val());
		if(jQuery("#ux_required_control_"+dynamicId).prop("checked") == true)
		{
			array_dropdown[dynamicId].push("1");
		}
		else
		{
			array_dropdown[dynamicId].push("0");
		}
		array_dropdown[dynamicId].push( jQuery("#ux_tooltip_control_"+dynamicId).val());
		var dropdown_optionId_str = "";
		jQuery("#select_"+dynamicId).append().empty();
		jQuery("#select_"+dynamicId).append('<option value="0"><?php _e("Select option",contact_bank);?></option>');
		for(var flag=0;flag<array_option_id_dropdown[dynamicId].length;flag++)
		{
			dropdown_optionId_str = dropdown_optionId_str+array_option_id_dropdown[dynamicId][flag];
			if(flag < array_option_id_dropdown[dynamicId].length-1)
			{
				dropdown_optionId_str = dropdown_optionId_str+";";
			}
			optionsId = array_option_id_dropdown[dynamicId][flag];
			ddl_options = array_options_dropdown[dynamicId][flag];
			jQuery("#select_"+dynamicId).append('<option id="option_tr_'+optionsId+'" value='+ddl_options+'>'+ddl_options+'</option>');
		}
		var dropdown_option_str = "";
		for(var flag=0;flag<array_option_id_dropdown[dynamicId].length;flag++)
		{
			dropdown_option_str = dropdown_option_str+array_options_dropdown[dynamicId][flag];
			if(flag < array_option_id_dropdown[dynamicId].length-1)
			{
				dropdown_option_str = dropdown_option_str+";";
			}
		}
		array_dropdown[dynamicId].push(dropdown_optionId_str);
		array_dropdown[dynamicId].push(dropdown_option_str);
		array_dropdown[dynamicId].push(jQuery("#ux_admin_label_"+dynamicId).val());
		array_dropdown[dynamicId].push( jQuery("#ux_email_"+dynamicId).prop("checked"));
		array_dropdown[dynamicId].push(jQuery("#button_set_outer_label_ddl_"+dynamicId).val());
		array_dropdown[dynamicId].push(jQuery("#ux_dropdown_menu_textarea_ddl_"+dynamicId).val());
		array_dropdown[dynamicId].push(jQuery("#ux_description_textarea_ddl_"+dynamicId).val());
		jQuery("#control_label_"+dynamicId).html(jQuery("#ux_label_text_"+dynamicId).val()+" :");
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
<?php
}
?>