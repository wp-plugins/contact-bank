<div class="layout-span7">
	<div class="widget-layout widget-tabs">
		<div class="widget-layout-title">
			<h4><?php _e( "Time Control", contact_bank ); ?></h4>
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
						<div  id="div_optional_<?php echo $dynamicId; ?>">
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Label", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="text" class="layout-span12" onkeyup="enter_admin_label(<?php echo $dynamicId; ?>);" value="<?php _e( "Time", contact_bank ); ?>" id="ux_label_text_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Label", contact_bank ); ?>" name="ux_label_text_<?php echo $dynamicId; ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("Description", contact_bank); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span12" id="ux_description_control_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Description", contact_bank ); ?>" name="ux_description_control_<?php echo $dynamicId; ?>" ></textarea>
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
								<label class="layout-control-label"><?php _e("Tooltip Text", contact_bank); ?> :</label>
								<div class="layout-controls">
									<input type="text" class="layout-span12" id="ux_tooltip_control_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Tooltip", contact_bank ); ?>"  name="ux_tooltip_control_<?php echo $dynamicId; ?>" />
								</div>
								<input type="hidden" id="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" name="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" />
							</div>
						</div>
					</div>
					<div id="tabs-nohdr-2"  style="display:none;">
						<div id="div_optional_<?php echo $dynamicId; ?>">
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Admin Label", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="text" class="layout-span12" value="<?php _e( "Time", contact_bank ); ?>" id="ux_admin_label_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Admin Label", contact_bank ); ?>" name="ux_admin_label_<?php echo $dynamicId; ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Do not show in the email", contact_bank ); ?> :</label>
								<div class="layout-controls" style="padding-top:5px;">
									<input type="checkbox" id="ux_email_<?php echo $dynamicId; ?>"  name="ux_email_<?php echo $dynamicId; ?>" value="1" >
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "12/24 hour time", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<select class="layout-span12" id="ux_drop_hour_time_<?php echo $dynamicId; ?>" name="ux_drop_hour_time_<?php echo $dynamicId; ?>" onchange="time_format(<?php echo $dynamicId; ?>);">
										<option  value='12' selected="selected">12 hours</option>
										<option value=24>24 hours</option>
									</select>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Time format", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<select class="layout-span12" id="ux_minute_format_<?php echo $dynamicId; ?>" name="ux_minute_format_<?php echo $dynamicId; ?>" onchange="ux_minute_format(<?php echo $dynamicId; ?>);">
										<option value="1" selected="selected">1</option>
										<option value="5">5</option>
										<option value="10">10</option>
										<option value="15">15</option>
										<option value="20">20</option>
										<option value="30">30</option>
									</select>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Default value", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<select  class="layout-span4"  id="ux_default_hours_12_<?php echo $dynamicId; ?>" name="ux_default_hours_12_<?php echo $dynamicId; ?>" onchange="select_hours(<?php echo $dynamicId; ?>);" >
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
									<select  class="layout-span4" id="ux_default_hours_24_<?php echo $dynamicId; ?>"  name="ux_default_hours_24_<?php echo $dynamicId; ?>" onchange="select_hours(<?php echo $dynamicId; ?>);" >
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
									<select class="layout-span4" id="ux_default_minute_<?php echo $dynamicId; ?>" name="ux_default_minute_<?php echo $dynamicId; ?>" onchange="select_minutes(<?php echo $dynamicId; ?>);">
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
									<select class="layout-span4" id="ux_default_am_<?php echo $dynamicId; ?>" name="ux_default_am_<?php echo $dynamicId; ?>" onchange="select_format(<?php echo $dynamicId; ?>);">
										<option value="0" >AM</option>
										<option value="1" >PM</option>
									</select>
								</div>
							</div>
							
						</div>
					</div>
					<div id="tabs-nohdr-1"  style="display:none;">
						<div id="div_advanced_<?php echo $dynamicId; ?>">
							<div class="layout-control-group" id="time_css_label_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Label Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_outer_label_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Label Style", contact_bank ); ?>" name="button_set_outer_label_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_label(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="time_text_input_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Text Input Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_textinput_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Text Input Style", contact_bank ); ?>" name="button_set_textinput_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_textinput(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="time_description_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Description Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_outer_description_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Description Style", contact_bank ); ?>" name="button_set_outer_description_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_description(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="time_set_time_hour_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Hour Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_time_hour_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Hour Style", contact_bank ); ?>" name="ux_time_hour_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_hour(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="button_set_time_minute_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Minute Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_time_minute_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Minute Style", contact_bank ); ?>" name="ux_time_minute_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_minute(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="ux_tr_set_time_am_<?php echo $dynamicId; ?>" style="display: none" >
								<label class="layout-control-label"><?php _e( "AM/PM Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_time_am_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter AM/PM Style", contact_bank ); ?>" name="button_set_time_am_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_am(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Add a Style to", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_label_style_<?php echo $dynamicId; ?>" name="ux_button_label_style_<?php echo $dynamicId; ?>" onclick="button_set_outer_label(<?php echo $dynamicId; ?>,13);" style="margin-bottom: 5px;" value="<?php _e( "Label", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_txt_input_save_<?php echo $dynamicId; ?>" name="ux_button_txt_input_save_<?php echo $dynamicId; ?>" onclick="button_set_txt_input(<?php echo $dynamicId; ?>,13);" style="margin-bottom: 5px;display: none;" value="<?php _e( "Text Input", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_description_style_<?php echo $dynamicId; ?>" name="ux_button_description_style_<?php echo $dynamicId; ?>" onclick="button_set_description(<?php echo $dynamicId; ?>,13);" style="margin-bottom: 5px;" value="<?php _e( "Description", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_set_time_hour_<?php echo $dynamicId; ?>" name="ux_button_set_time_hour_<?php echo $dynamicId; ?>" onclick="button_set_time_hour(<?php echo $dynamicId; ?>,13);" style="margin-bottom: 5px;" value="<?php _e( "Hour", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_set_time_minute_<?php echo $dynamicId; ?>" name="ux_button_set_time_minute_<?php echo $dynamicId; ?>" onclick="button_set_time_minute(<?php echo $dynamicId; ?>,13);" style="margin-bottom: 5px;" value="<?php _e( "Minute", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_set_time_am_<?php echo $dynamicId; ?>" name="ux_button_set_time_am_<?php echo $dynamicId; ?>" onclick="button_set_time_am(<?php echo $dynamicId; ?>,13);" style="margin-bottom: 5px;" value="<?php _e( "AM/PM", contact_bank ); ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="layout-control-group">	
		<input type="button" class="btn btn-info layout-span2" onclick="save_time_control(<?php echo $dynamicId; ?>)" value="<?php _e( "Save Settings", contact_bank ); ?>" />
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
		jQuery("#ux_admin_label_"+dynamicId).val(array_controls[dynamicCount][6].cb_admin_label);
		if(array_controls[dynamicCount][7].cb_show_email == "1")
		{
			jQuery("#ux_email_"+dynamicId).attr("checked","checked");
		}
		if(array_controls[dynamicCount][8].cb_hour_format == "12")
		{
			jQuery("#ux_default_hours_24_"+dynamicId).hide();
			jQuery("#ux_default_hours_12_"+dynamicId).show();
			jQuery("#ux_default_hours_12_"+dynamicId).val(array_controls[dynamicCount][9].cb_hours);	
			jQuery("#ux_drop_hour_time_"+dynamicId).val(array_controls[dynamicCount][8].cb_hour_format);	
			jQuery("#ux_default_minute_"+dynamicId).val(array_controls[dynamicCount][10].cb_minutes);	
			jQuery("#ux_default_am_"+dynamicId).val(array_controls[dynamicCount][11].cb_am_pm);	
			jQuery("#ux_minute_format_"+dynamicId).val(array_controls[dynamicCount][12].cb_time_format);
			jQuery("#ux_default_am_"+dynamicId).show();
		}
		else if(array_controls[dynamicCount][8].cb_hour_format == "24")
		{
			jQuery("#ux_default_hours_12_"+dynamicId).hide();
			jQuery("#ux_default_hours_24_"+dynamicId).show();
			jQuery("#ux_default_hours_24_"+dynamicId).val(array_controls[dynamicCount][9].cb_hours);	
			jQuery("#ux_drop_hour_time_"+dynamicId).val(array_controls[dynamicCount][8].cb_hour_format);	
			jQuery("#ux_default_minute_"+dynamicId).val(array_controls[dynamicCount][10].cb_minutes);	
			jQuery("#ux_default_am_"+dynamicId).val(array_controls[dynamicCount][11].cb_am_pm);	
			jQuery("#ux_minute_format_"+dynamicId).val(array_controls[dynamicCount][12].cb_time_format);
			jQuery("#ux_default_am_"+dynamicId).hide();
		}
		if(array_controls[dynamicCount][13].cb_button_set_outer_label != "")
		{
			jQuery("#button_set_outer_label_"+dynamicId).html(array_controls[dynamicCount][13].cb_button_set_outer_label);
			jQuery("#time_css_label_"+dynamicId).attr("style","display:block");
			jQuery("#time_css_label_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][14].cb_button_set_txt_input != "")
		{
			jQuery("#button_set_textinput_"+dynamicId).html(array_controls[dynamicCount][14].cb_button_set_txt_input);
			jQuery("#time_text_input_"+dynamicId).attr("style","display:block");
			jQuery("#time_text_input_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][15].cb_button_set_description != "")
		{
			jQuery("#button_set_outer_description_"+dynamicId).html(array_controls[dynamicCount][15].cb_button_set_description);
			jQuery("#time_description_"+dynamicId).attr("style","display:block");
			jQuery("#time_description_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][16].cb_button_set_time_hour_dropdown != "")
		{
			jQuery("#ux_time_hour_"+dynamicId).html(array_controls[dynamicCount][16].cb_button_set_time_hour_dropdown);
			jQuery("#time_set_time_hour_"+dynamicId).attr("style","display:block");
			jQuery("#time_set_time_hour_"+dynamicId).attr("style","position:inherit");
		}	
		if(array_controls[dynamicCount][17].cb_button_set_time_minute_dropdown != "")
		{
			jQuery("#ux_time_minute_"+dynamicId).html(array_controls[dynamicCount][17].cb_button_set_time_minute_dropdown);
			jQuery("#button_set_time_minute_"+dynamicId).attr("style","display:block");
			jQuery("#button_set_time_minute_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][18].cb_button_set_time_am_pm_dropdown != "")
		{
			jQuery("#button_set_time_am_"+dynamicId).html(array_controls[dynamicCount][18].cb_button_set_time_am_pm_dropdown);
			jQuery("#ux_tr_set_time_am_"+dynamicId).attr("style","display:block");
			jQuery("#ux_tr_set_time_am_"+dynamicId).attr("style","position:inherit");
		}
	}
	function time_format(dynamicId)
	{
		var ux_drop_hour_time= jQuery("#ux_drop_hour_time_"+dynamicId).val();
		if(ux_drop_hour_time == 12)
		{
			jQuery("#ux_default_hours_24_"+dynamicId).hide();
			jQuery("#ux_default_hours_12_"+dynamicId).show();
			jQuery("#ux_default_am_"+dynamicId).show();
		}
		else if(ux_drop_hour_time == 24)
		{
			jQuery("#ux_default_hours_12_"+dynamicId).hide();
			jQuery("#ux_default_hours_24_"+dynamicId).show();
			jQuery("#ux_default_am_"+dynamicId).hide();
		}
	}
	function ux_minute_format(dynamicId)
	{
		var minute_format = parseInt(jQuery("#ux_minute_format_"+dynamicId).val());		
		var dropdown_min = "<option selected='selected' value=><?php _e( "Minute", contact_bank ); ?></option>";
		for(flag=0; flag < 60; )
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
		jQuery("#ux_ddl_select_minute_"+dynamicId).html(dropdown_min);
		jQuery("#ux_default_minute_"+dynamicId).html(dropdown_min);
	}
	function select_hours(dynamicId)
	{
		var ux_default_hour = jQuery("#ux_default_hours_"+dynamicId).val();
		jQuery("#select_hr_"+dynamicId).val(ux_default_hour);
	}
	function select_minutes(dynamicId)
	{
		var ux_default_min = jQuery("#ux_default_minute_"+dynamicId).val();
		jQuery("#ux_ddl_select_minute_"+dynamicId).val(ux_default_min);
	}
	function select_format(dynamicId)
	{
		var ux_default_format = jQuery("#ux_default_am_"+dynamicId).val();
		jQuery("#ux_ddl_select_ampm_"+dynamicId).val(ux_default_format);
	}
	
	function save_time_control(dynamicId)
	{
		var dynamicCount = "<?php echo $dynamicCount;?>";
		array_controls[dynamicCount] = [];
		array_controls[dynamicCount].push({"control_type" :" 13"});
		array_controls[dynamicCount].push({"time_dynamicId" : dynamicId});
		array_controls[dynamicCount].push({"cb_label_value" : jQuery("#ux_label_text_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_description" : jQuery("#ux_description_control_"+dynamicId).val()});
		jQuery("#ux_required_control_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_control_required": "1"}) : array_controls[dynamicCount].push({"cb_control_required": "0"});
		array_controls[dynamicCount].push({"cb_tooltip_txt" : jQuery("#ux_tooltip_control_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_admin_label" : jQuery("#ux_admin_label_"+dynamicId).val()});
		jQuery("#ux_email_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_show_email": "1"}) : array_controls[dynamicCount].push({"cb_show_email": "0"});
		array_controls[dynamicCount].push({"cb_hour_format" : jQuery("#ux_drop_hour_time_"+dynamicId).val()});
		if(jQuery("#ux_drop_hour_time_"+dynamicId).val() == 12)
		{
			array_controls[dynamicCount].push({"cb_hours" : jQuery("#ux_default_hours_12_"+dynamicId).val()});
			jQuery("#ux_default_hours_24_"+dynamicId).hide();
			jQuery("#ux_default_hours_12_"+dynamicId).show();
			jQuery("#ux_ddl_select_hr_24_"+dynamicId).hide();
			jQuery("#ux_ddl_select_hr_12_"+dynamicId).show();
			jQuery("#ux_ddl_select_hr_12_"+dynamicId).val(jQuery("#ux_default_hours_12_"+dynamicId).val());
			jQuery("#ux_ddl_select_ampm_"+dynamicId).show();
		}
		else if(jQuery("#ux_drop_hour_time_"+dynamicId).val() == 24)
		{
			jQuery("#ux_default_hours_12_"+dynamicId).hide();
			jQuery("#ux_default_hours_24_"+dynamicId).show();
			jQuery("#ux_ddl_select_hr_12_"+dynamicId).hide();
			jQuery("#ux_ddl_select_hr_24_"+dynamicId).show();
			jQuery("#ux_ddl_select_hr_24_"+dynamicId).val(jQuery("#ux_default_hours_24_"+dynamicId).val());
			jQuery("#ux_ddl_select_ampm_"+dynamicId).hide();
			array_controls[dynamicCount].push({"cb_hours" : jQuery("#ux_default_hours_24_"+dynamicId).val()});
		}
		array_controls[dynamicCount].push({"cb_minutes" : jQuery("#ux_default_minute_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_am_pm" : jQuery("#ux_default_am_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_time_format" : jQuery("#ux_minute_format_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_outer_label" : jQuery("#button_set_outer_label_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_txt_input" : jQuery("#button_set_textinput_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_description" : jQuery("#button_set_outer_description_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_time_hour_dropdown" : jQuery("#ux_time_hour_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_time_minute_dropdown" : jQuery("#ux_time_minute_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_time_am_pm_dropdown" : jQuery("#button_set_time_am_"+dynamicId).val()});
		jQuery("#control_label_"+dynamicId).html(jQuery("#ux_label_text_"+dynamicId).val()+" :");
		jQuery("#txt_description_"+dynamicId).html(jQuery("#ux_description_control_"+dynamicId).val());
		jQuery("#tooltip_txt_hidden_value_"+dynamicId).val(jQuery("#ux_tooltip_control_"+dynamicId).val());
		jQuery("#show_tooltip"+dynamicId).attr("data-original-title",jQuery("#ux_tooltip_control_"+dynamicId).val());
		
		jQuery("#ux_ddl_select_minute_"+dynamicId).val(jQuery("#ux_default_minute_"+dynamicId).val());
		jQuery("#ux_ddl_select_ampm_"+dynamicId).val(jQuery("#ux_default_am_"+dynamicId).val());
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
	function button_set_outer_label(dynamicId)
	{
		jQuery("#time_css_label_"+dynamicId).css("display","block");
		jQuery("#time_css_label_"+dynamicId).attr("style", 'position:inherit');
	}
	function button_set_txt_input(dynamicId)
	{
		jQuery("#time_text_input_"+dynamicId).css("display","block");
		jQuery("#time_text_input_"+dynamicId).attr("style", 'position:inherit');
	}
	function button_set_description(dynamicId)
	{
		jQuery("#time_description_"+dynamicId).css("display","block");
		jQuery("#time_description_"+dynamicId).attr("style", 'position:inherit');
	}
	function button_set_time_hour(dynamicId)
	{
		jQuery("#time_set_time_hour_"+dynamicId).css("display","block");
		jQuery("#time_set_time_hour_"+dynamicId).attr("style", 'position:inherit');
	}
	function button_set_time_minute(dynamicId)
	{
		jQuery("#button_set_time_minute_"+dynamicId).css("display","block");
		jQuery("#button_set_time_minute_"+dynamicId).attr("style", 'position:inherit');
	}
	function button_set_time_am(dynamicId)
	{
		jQuery("#ux_tr_set_time_am_"+dynamicId).css("display","block");
		jQuery("#ux_tr_set_time_am_"+dynamicId).attr("style", 'position:inherit');
	}
	function delete_css_style_label(dynamicId)
	{
		jQuery("#time_css_label_" +dynamicId).css("display","none");
		jQuery("#button_set_outer_label_"+dynamicId).val("");
	}
	function delete_css_style_textinput(dynamicId)
	{
		jQuery("#time_text_input_" +dynamicId).css("display","none");
		jQuery("#button_set_textinput_"+dynamicId).val("");
	}
	function delete_css_style_description(dynamicId)
	{
		jQuery("#time_description_" +dynamicId).css("display","none");
		jQuery("#button_set_outer_description_"+dynamicId).val("");
	}
	function delete_css_style_hour(dynamicId)
	{
		jQuery("#time_set_time_hour_" +dynamicId).css("display","none");
		jQuery("#ux_time_hour_"+dynamicId).val("");
	}
	function delete_css_style_minute(dynamicId)
	{
		jQuery("#button_set_time_minute_" +dynamicId).css("display","none");
		jQuery("#ux_time_minute_"+dynamicId).val("");
	}
	function delete_css_style_am(dynamicId)
	{
		jQuery("#ux_tr_set_time_am_"+dynamicId).css("display","none");
		jQuery("#button_set_time_am_"+dynamicId).val("");
	}
</script>