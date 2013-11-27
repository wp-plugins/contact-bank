<?php
if($_REQUEST["param"] == "create_check_control")
{
	$dynamicId = intval($_REQUEST["dynamicId"]);
	$field_id = intval($_REQUEST["field_id"]);
	?>
	<div class="layout-control-group div_border" id="div_<?php echo $dynamicId; ?>_5">
		<label class="layout-control-label" id="control_label_<?php echo $dynamicId; ?>" ><?php _e("Untitled", contact_bank); ?> : </label>
		<span id="txt_required_<?php echo $dynamicId; ?>"  class="error">*</span>
		<div class="layout-controls hovertip" id="post_back_checkbox_<?php echo $dynamicId; ?>"><div id="show_tooltip<?php echo $dynamicId; ?>">
			<input type="checkbox"  id="chk_<?php echo $dynamicId; ?>" name="chk_<?php echo $dynamicId; ?>" />
			<span id="add_chk_options_here_<?php echo $dynamicId; ?>" ></span>
			<a class="btn btn-info  inline" href="#setting_controls_postback"  id="add_setting_control_<?php echo $dynamicId; ?>" ><?php _e( "Settings", contact_bank); ?></a>	
			<a style="cursor:pointer;"  onclick="delete_textbox(div_<?php echo $dynamicId; ?>_5,<?php echo $dynamicId; ?>)" id="anchor_del_<?php echo $dynamicId; ?>" >
				<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px"/>
			</a>
		</div>
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
			<h4><?php _e( "Checkbox Control", contact_bank ); ?></h4>
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
								<label class="layout-control-label"><?php _e( "Required", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="radio" id="ux_required_control_<?php echo $dynamicId; ?>" name="ux_required_control_radio_<?php echo $dynamicId; ?>" value="1"/><label style="margin-left: 5px;"><?php _e( "Required", contact_bank ); ?></label>
									<input type="radio" checked="checked" id="ux_required_<?php echo $dynamicId; ?>" name="ux_required_control_radio_<?php echo $dynamicId; ?>" value="0"/><label style="margin-left: 5px;"><?php _e( "Not Required", contact_bank ); ?></label>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("Tooltip Text", contact_bank); ?> :</label>
								<div class="layout-controls">
									<input type="text" class="layout-span12" id="ux_tooltip_control_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Tooltip", contact_bank ); ?>" name="ux_tooltip_control_<?php echo $dynamicId; ?>" />
									<input type="hidden" id="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" name="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("Options", contact_bank); ?> :</label>
								<div class="layout-controls">
									<input type="text" onKeyPress="white_space(event)" class="layout-span9" id="chk_options_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Options", contact_bank ); ?>" name="chk_options_<?php echo $dynamicId; ?>" /><input  value="<?php _e( "Add option", contact_bank ); ?>" type="button" class="btn btn-info layout-span3" id="chk_options_button_<?php echo $dynamicId; ?>" onclick="add_chk_options(<?php echo $dynamicId; ?>);"  name="chk_options_button_<?php echo $dynamicId; ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<span id="append_chk_option_<?php echo $dynamicId; ?>"></span>
							</div>
						</div>
					</div>
					<div id="tabs-nohdr-2"  style="display:none;">
						<div id="div_optional_<?php echo $dynamicId; ?>">
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Admin Label", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="text" value="<?php _e( "Untitled", contact_bank ); ?>" class="layout-span12" id="ux_admin_label_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Admin Label", contact_bank ); ?>" name="ux_admin_label_<?php echo $dynamicId; ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Do not show in the email", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="checkbox" id="ux_show_email_<?php echo $dynamicId; ?>"  name="ux_show_email_<?php echo $dynamicId; ?>" value="1" >
								</div>
							</div>
						</div>
					</div>
					<div id="tabs-nohdr-1"  style="display:none;">
						<div id="div_advanced_<?php echo $dynamicId; ?>">
							<div class="layout-control-group" id="show_data_label_tr_chk_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e("Css Label :", contact_bank); ?></label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_outer_label_chk_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Label", contact_bank ); ?>" name="button_set_outer_label_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_button_outer_label_chk(<?php echo $dynamicId; ?>);" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="show_data_description_tr_chk_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "CSS Description :", contact_bank ); ?></label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_description_textarea_chk_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Description", contact_bank ); ?>" name="ux_description_textarea_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_button_set_description_chk(<?php echo $dynamicId; ?>);" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="show_data_option_outer_wrapper_tr_chk_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "CSS Options outer wrapper :", contact_bank ); ?></label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_button_options_outer_wrapper_chk_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Outer Wrapper", contact_bank ); ?>" name="ux_description_textarea_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_button_options_outer_wrapper_chk(<?php echo $dynamicId; ?>);" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="show_data_option_wrapper_tr_chk_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "CSS Option Wrapper :", contact_bank ); ?></label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_button_option_wrapper_chk_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Option Wrapper", contact_bank ); ?>" name="ux_description_textarea_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_button_option_wrapper_chk(<?php echo $dynamicId; ?>);" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="show_data_option_label_tr_chk_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "CSS Options Label :", contact_bank ); ?></label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_button_option_label_chk_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Options", contact_bank ); ?>" name="ux_description_textarea_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_button_option_label_chk(<?php echo $dynamicId; ?>);" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Add a style to", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="button" class="btn btn-inverse layout-span4" id="ux_button_label_style_<?php echo $dynamicId; ?>" name="ux_button_label_style_<?php echo $dynamicId; ?>" onclick="button_set_outer_label_chk(<?php echo $dynamicId; ?>)" style="margin-bottom: 5px;" value="<?php _e( "Label", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span4" id="ux_button_description_style_<?php echo $dynamicId; ?>" name="ux_button_description_style_<?php echo $dynamicId; ?>" onclick="button_set_description_chk(<?php echo $dynamicId; ?>);" style="margin-bottom: 5px;display: none;" value="<?php _e( "Description", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span5" id="ux_button_options_outer_wrapper_<?php echo $dynamicId; ?>" name="ux_button_options_outer_wrapper_<?php echo $dynamicId; ?>" onclick="button_options_outer_wrapper_chk(<?php echo $dynamicId; ?>);" style="margin-bottom: 5px;" value="<?php _e( "Options outer wrapper", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span4" id="ux_button_option_wrapper_<?php echo $dynamicId; ?>" name="ux_button_option_wrapper_<?php echo $dynamicId; ?>" onclick="button_option_wrapper_chk(<?php echo $dynamicId; ?>);" style="margin-bottom: 5px;" value="<?php _e( "Options wrapper", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span4" id="ux_button_option_label_<?php echo $dynamicId; ?>" name="ux_button_option_label_<?php echo $dynamicId; ?>" onclick="button_option_label_chk(<?php echo $dynamicId; ?>);" style="margin-bottom: 5px;" value="<?php _e( "Options label", contact_bank ); ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="layout-control-group">	
		<input type="button" style="float:left;margin-left: 0px;" class="btn btn-info layout-span2" onclick="save_checkbox_control(<?php echo $dynamicId; ?>)" value="<?php _e( "Save", contact_bank ); ?>" />
	</div>
</div>
<script type="text/javascript">
	var dynamicId = <?php echo $dynamicId ?>;
	array_option_id_chk[dynamicId] = [];
	array_options_chk[dynamicId] = [];
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
		var dynamicId = <?php echo $dynamicId; ?>;
		if(array_checkbox[dynamicId][5] != "")
		{
			var optionId_str = array_checkbox[dynamicId][5];
			var optionId = optionId_str.split(";");
			var option_value_str = array_checkbox[dynamicId][6];
			var option_value = option_value_str.split(";");
			for(var flag = 0;flag <optionId.length ;flag++)
			{
				var options_dynamicId = optionId[flag];
				var add_chk_option = option_value[flag];
				array_option_id_chk[dynamicId].push(options_dynamicId);
				array_options_chk[dynamicId].push(add_chk_option);
				jQuery("#append_chk_option_"+dynamicId).append('<div class="layout-control-group" id="selected_item_'+options_dynamicId+'"><div class="layout-controls"><input type="text" class="layout-span8" value="'+add_chk_option+'" id="input_type_'+options_dynamicId+'"><input type="hidden" value="'+add_chk_option+'" id="chk_existing_options_'+options_dynamicId+'" name="ddl_existing_options_'+options_dynamicId+'" /><a style="padding-left:2px;" onclick="delete_chk('+options_dynamicId+','+dynamicId+')"><img style="vertical-align: top;margin-top: 2px;" src="<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" /></a><input class="btn btn-info layout-span3" type="button" style="margin-left:5px;" onclick="update_chk_option('+options_dynamicId+','+dynamicId+')" value="<?php _e( "Update", contact_bank ); ?>"></div></div>');
			}
		}
		jQuery("#ux_label_text_"+dynamicId).val(array_checkbox[dynamicId][2]);
		if(array_checkbox[dynamicId][3] == 1)
		{
			jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
		}
		else
		{
			jQuery("#ux_required_"+dynamicId).attr("checked","checked");
		}
		jQuery("#ux_tooltip_control_"+dynamicId).val(array_checkbox[dynamicId][4]);
		jQuery("#ux_admin_label_"+dynamicId).val(array_checkbox[dynamicId][7]);
		if(array_checkbox[dynamicId][8] == true)
		{
			jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
		}
		if(array_checkbox[dynamicId][9] != "")
		{
			jQuery("#button_set_outer_label_chk_"+dynamicId).html(array_checkbox[dynamicId][9]);
			jQuery("#show_data_label_tr_chk_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_label_tr_chk_"+dynamicId).attr("style","position:inherit");
		}
		if(array_checkbox[dynamicId][10] != "")
		{
			jQuery("#ux_description_textarea_chk_"+dynamicId).html(array_checkbox[dynamicId][10]);
			jQuery("#show_data_description_tr_chk_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_description_tr_chk_"+dynamicId).attr("style","position:inherit");
		}
		if(array_checkbox[dynamicId][11] != "")
		{
			jQuery("#ux_button_options_outer_wrapper_chk_"+dynamicId).html(array_checkbox[dynamicId][11]);
			jQuery("#show_data_option_outer_wrapper_tr_chk_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_option_outer_wrapper_tr_chk_"+dynamicId).attr("style","position:inherit");
		}
		if(array_checkbox[dynamicId][12] != "")
		{
			jQuery("#ux_button_option_wrapper_chk_"+dynamicId).html(array_checkbox[dynamicId][12]);
			jQuery("#show_data_option_wrapper_tr_chk_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_option_wrapper_tr_chk_"+dynamicId).attr("style","position:inherit");
		}
		if(array_checkbox[dynamicId][13] != "")
		{
			jQuery("#ux_button_option_label_chk_"+dynamicId).html(array_checkbox[dynamicId][13]);
			jQuery("#show_data_option_label_tr_chk_"+dynamicId).attr("style","display:block");
			jQuery("#show_data_option_label_tr_chk_"+dynamicId).attr("style","position:inherit");
		}
	}
	function add_chk_options(dynamicId)
	{
		var add_chk_options = jQuery("#chk_options_"+dynamicId).val();
		if(add_chk_options=="")
		{
			alert("<?php _e( "Please Fill an Option.", contact_bank ); ?>");
		}
		else
		{
			var place_of_option_in_array = jQuery.inArray(add_chk_options,array_options_chk[dynamicId]);
			if(place_of_option_in_array == -1)
			{
				//jQuery("#chk_"+dynamicId).hide();	
				var options_dynamicId = Math.floor((Math.random() * 1000)+1);
				array_options_chk[dynamicId].push(add_chk_options);
				array_option_id_chk[dynamicId].push(options_dynamicId);
				jQuery("#append_chk_option_"+dynamicId).append('<div class="layout-control-group" id="selected_item_'+options_dynamicId+'"><div class="layout-controls"><input type= "text" class="layout-span8" value="'+add_chk_options+'" id="input_type_'+options_dynamicId+'"><input type="hidden" value="'+add_chk_options+'" id="chk_existing_options_'+options_dynamicId+'" name="ddl_existing_options_'+options_dynamicId+'" /><a style="padding-left:2px;" onclick="delete_chk('+options_dynamicId+','+dynamicId+')"><img style="vertical-align: top;margin-top: 2px;" src="<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" /></a><input class="btn btn-info layout-span3" type="button" style="margin-left:5px;" onclick="update_chk_option('+options_dynamicId+','+dynamicId+')" value="<?php _e( "Update", contact_bank ); ?>"></div></div>');
				jQuery("#chk_options_"+dynamicId).val("");
			}
			else
			{
				alert("<?php _e( "This Option Already Exists.", contact_bank ); ?>");
			}
		}
	}	
	function delete_chk(options_dynamicId,dynamicId)
	{
		var ux_value = jQuery("#input_type_"+options_dynamicId).val();
		jQuery("#selected_item_"+options_dynamicId).remove();
		var place_of_option_in_array_id = jQuery.inArray(ux_value,array_options_chk[dynamicId]);
		if(place_of_option_in_array_id != -1)
		{
			array_option_id_chk[dynamicId].splice(place_of_option_in_array_id,1);
			array_options_chk[dynamicId].splice(place_of_option_in_array_id,1);
		}
	}
	function update_chk_option(options_dynamicId,dynamicId)
	{
		var existing_input_type_value = jQuery("#chk_existing_options_"+options_dynamicId).val();
		var updated_input_type_value = jQuery("#input_type_"+options_dynamicId).val();
		var check_option_in_array = jQuery.inArray(updated_input_type_value,array_options_chk[dynamicId]);
		if(check_option_in_array != -1)
		{
			alert("<?php _e( "This Option Already Exists. ", contact_bank ); ?>");
			if(existing_input_type_value !=0)
			{
				jQuery("#input_type_"+options_dynamicId).val(existing_input_type_value);
			}
		}
		else
		{
			place_of_option_in_array = jQuery.inArray(existing_input_type_value,array_options_chk[dynamicId]);
			array_options_chk[dynamicId][place_of_option_in_array] = updated_input_type_value;
			jQuery("#chk_existing_options_"+options_dynamicId).val(updated_input_type_value);
			alert("<?php _e( "Option updated", contact_bank ); ?>");
		}
	}
	function button_set_outer_label_chk(dynamicId)
	{
		jQuery("#show_data_label_tr_chk_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_label_tr_chk_"+dynamicId).attr("style", "position:inherit");
		
	}
	function button_set_description_chk(dynamicId)
	{
		jQuery("#show_data_description_tr_chk_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_description_tr_chk_"+dynamicId).attr("style", "position:inherit");
		
	}
	function button_options_outer_wrapper_chk(dynamicId)
	{
		jQuery("#show_data_option_outer_wrapper_tr_chk_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_option_outer_wrapper_tr_chk_"+dynamicId).attr("style", "position:inherit");
		
	}
	function button_option_wrapper_chk(dynamicId)
	{
		jQuery("#show_data_option_wrapper_tr_chk_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_option_wrapper_tr_chk_"+dynamicId).attr("style", "position:inherit");
		
	}
	function button_option_label_chk(dynamicId)
	{
		jQuery("#show_data_option_label_tr_chk_"+dynamicId).attr("style","display:block");
		jQuery("#show_data_option_label_tr_chk_"+dynamicId).attr("style", "position:inherit");
		
	}
	function delete_button_outer_label_chk(dynamicId)
	{
		jQuery("#show_data_label_tr_chk_"+dynamicId).attr("style","display:none");
		jQuery("#button_set_outer_label_chk_"+dynamicId).val("");
	}
	function delete_button_set_description_chk(dynamicId)
	{
		jQuery("#show_data_description_tr_chk_"+dynamicId).attr("style","display:none");
		jQuery("#ux_description_textarea_chk_"+dynamicId).val("");
	}
	function delete_button_options_outer_wrapper_chk(dynamicId)
	{
		jQuery("#show_data_option_outer_wrapper_tr_chk_"+dynamicId).attr("style","display:none");
		jQuery("#ux_button_options_outer_wrapper_chk_"+dynamicId).val("");
	}	
	function delete_button_option_wrapper_chk(dynamicId)
	{
		jQuery("#show_data_option_wrapper_tr_chk_"+dynamicId).attr("style","display:none");
		jQuery("#ux_button_option_wrapper_chk_"+dynamicId).val("");
	}
	function delete_button_option_label_chk(dynamicId)
	{
		jQuery("#show_data_option_label_tr_chk_"+dynamicId).attr("style","display:none");
		jQuery("#ux_button_option_label_chk_"+dynamicId).val("");
	}
	function save_checkbox_control(dynamicId)
	{
		array_checkbox[dynamicId] = [];
		array_checkbox[dynamicId].push(5);
		array_checkbox[dynamicId].push(dynamicId);
		array_checkbox[dynamicId].push(jQuery("#ux_label_text_"+dynamicId).val());
		if(jQuery("#ux_required_control_"+dynamicId).prop("checked") == true)
		{
			array_checkbox[dynamicId].push("1");
		}
		else
		{
			array_checkbox[dynamicId].push("0");
		}
		array_checkbox[dynamicId].push(jQuery("#ux_tooltip_control_"+dynamicId).val());
		var checkbox_option_str = "";
		var checkbox_optionId_str = "";
		jQuery("#chk_"+dynamicId).hide();
		jQuery("#add_chk_options_here_"+dynamicId).empty();
		if(array_options_chk[dynamicId].length == 0)
		{
			jQuery("#chk_"+dynamicId).show();
		}
		for(var flag=0;flag<array_option_id_chk[dynamicId].length;flag++)
		{
			checkbox_option_str = checkbox_option_str+array_options_chk[dynamicId][flag];
			if(flag < array_option_id_chk[dynamicId].length-1)
			{
				checkbox_option_str = checkbox_option_str+";";
			}
			options_dynamicId = array_option_id_chk[dynamicId][flag];
			add_chk_options = array_options_chk[dynamicId][flag];
			jQuery("#add_chk_options_here_"+dynamicId).append('<span id="input_id_'+options_dynamicId+'"><input id="chk_'+options_dynamicId+'" name="chk_'+options_dynamicId+'" type="checkbox"/><label style="margin:0px 5px;" id="chk_id_'+options_dynamicId+'" >'+add_chk_options+'</label></span>');
		}
		for(var flag=0;flag<array_option_id_chk[dynamicId].length;flag++)
		{
			checkbox_optionId_str = checkbox_optionId_str+array_option_id_chk[dynamicId][flag];
			if(flag < array_option_id_chk[dynamicId].length-1)
			{
				checkbox_optionId_str = checkbox_optionId_str+";";
			}
		}
		array_checkbox[dynamicId].push(checkbox_optionId_str);
		array_checkbox[dynamicId].push(checkbox_option_str);
		array_checkbox[dynamicId].push(jQuery("#ux_admin_label_"+dynamicId).val());
		array_checkbox[dynamicId].push(jQuery("#ux_show_email_"+dynamicId).prop("checked"));
		array_checkbox[dynamicId].push(jQuery("#button_set_outer_label_chk_"+dynamicId).val());
		array_checkbox[dynamicId].push(jQuery("#ux_description_textarea_chk_"+dynamicId).val());
		array_checkbox[dynamicId].push(jQuery("#ux_button_options_outer_wrapper_chk_"+dynamicId).val());
		array_checkbox[dynamicId].push(jQuery("#ux_button_option_wrapper_chk_"+dynamicId).val());
		array_checkbox[dynamicId].push(jQuery("#ux_button_option_label_chk_"+dynamicId).val());
		jQuery("#control_label_"+dynamicId).html(jQuery("#ux_label_text_"+dynamicId).val()+" :");
		var tooltip_text = jQuery("#ux_tooltip_control_"+dynamicId).val();
		jQuery("#tooltip_txt_hidden_value_"+dynamicId).val(tooltip_text);
		jQuery("#post_back_checkbox_"+dynamicId).attr("data-original-title",tooltip_text);	
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