<?php
if($_REQUEST["param"] == "create_select_time_control")
{
	$dynamicId = intval($_REQUEST["dynamicId"]);
	$field_id = intval($_REQUEST["field_id"]);
	?>
	<div class="layout-control-group div_border"  id="div_<?php echo $dynamicId; ?>_13">
	<label class="layout-control-label" id="control_label_<?php echo $dynamicId; ?>" ><?php _e("Time", contact_bank); ?> : </label>
	<span id="txt_required_<?php echo $dynamicId; ?>"  class="error">*</span>
		<div class="layout-controls hovertip" id="show_tooltip<?php echo $dynamicId; ?>">
			<select class="layout-span2" id="select_hr_12_<?php echo $dynamicId; ?>" name="select_hr_12_<?php echo $dynamicId; ?>">";
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
			<select class="layout-span3" id="select_hr_24_<?php echo $dynamicId; ?>" name="select_hr_24_<?php echo $dynamicId; ?>">";
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
			<select class="hovertip layout-span3" id="select_min_<?php echo $dynamicId; ?>" name="select_min_<?php echo $dynamicId; ?>">
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
			<select class="hovertip layout-span2" id="select_am_<?php echo $dynamicId; ?>" name="select_am_<?php echo $dynamicId; ?>">
				<option value="0">AM</option>
				<option value="1">PM</option>
			</select>
			<a class="btn btn-info inline"  id="add_setting_control_<?php echo $dynamicId; ?>"  href="#setting_controls_postback" ><?php _e( "Settings", contact_bank ); ?></a>	
			<a style="cursor:pointer;"  onclick="delete_textbox(div_<?php echo $dynamicId; ?>_13,<?php echo $dynamicId; ?>);" id="anchor_del_<?php echo $dynamicId; ?>" >
				<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px" onmouseover="img_show(<?php echo $dynamicId; ?>)" onmouseout="img_hide(<?php echo $dynamicId; ?>)"  />
			</a> 
			<br />
			<span class="span-description" id="txt_description_<?php echo $dynamicId; ?>"></span>
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
								<div class="layout-controls">
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
								<div class="layout-controls">
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
								<label class="layout-control-label"><?php _e( "Css Label", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_outer_label_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Label", contact_bank ); ?>" name="button_set_outer_label_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_label(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="time_text_input_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Css Text Input", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_textinput_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Text Input", contact_bank ); ?>" name="button_set_textinput_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_textinput(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="time_description_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Css Description", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_outer_description_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Description", contact_bank ); ?>" name="button_set_outer_description_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_description(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="time_set_time_hour_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Css Hour", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_time_hour_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Hour", contact_bank ); ?>" name="ux_time_hour_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_hour(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="button_set_time_minute_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Css Minute", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_time_minute_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Minute", contact_bank ); ?>" name="ux_time_minute_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_minute(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="ux_tr_set_time_am_<?php echo $dynamicId; ?>" style="display: none" >
								<label class="layout-control-label"><?php _e( "Css am/pm", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_time_am_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css am/pm", contact_bank ); ?>" name="button_set_time_am_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_am(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Add a style to", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="button" class="btn btn-inverse layout-span3" id="ux_button_label_style_<?php echo $dynamicId; ?>" name="ux_button_label_style_<?php echo $dynamicId; ?>" onclick="button_set_outer_label(<?php echo $dynamicId; ?>,13);" style="margin-bottom: 5px;" value="<?php _e( "Label", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span3" id="ux_button_txt_input_save_<?php echo $dynamicId; ?>" name="ux_button_txt_input_save_<?php echo $dynamicId; ?>" onclick="button_set_txt_input(<?php echo $dynamicId; ?>,13);" style="margin-bottom: 5px;display: none;" value="<?php _e( "Text input", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span3" id="ux_button_description_style_<?php echo $dynamicId; ?>" name="ux_button_description_style_<?php echo $dynamicId; ?>" onclick="button_set_description(<?php echo $dynamicId; ?>,13);" style="margin-bottom: 5px;" value="<?php _e( "Description", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span5" id="ux_button_set_time_hour_<?php echo $dynamicId; ?>" name="ux_button_set_time_hour_<?php echo $dynamicId; ?>" onclick="button_set_time_hour(<?php echo $dynamicId; ?>,13);" style="margin-bottom: 5px;" value="<?php _e( "Time hour dropdown", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span5" id="ux_button_set_time_minute_<?php echo $dynamicId; ?>" name="ux_button_set_time_minute_<?php echo $dynamicId; ?>" onclick="button_set_time_minute(<?php echo $dynamicId; ?>,13);" style="margin-bottom: 5px;" value="<?php _e( "Time minute dropdown", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span5" id="ux_button_set_time_am_<?php echo $dynamicId; ?>" name="ux_button_set_time_am_<?php echo $dynamicId; ?>" onclick="button_set_time_am(<?php echo $dynamicId; ?>,13);" style="margin-bottom: 5px;" value="<?php _e( "Time am/pm dropdown", contact_bank ); ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="layout-control-group">	
		<input type="button" style="float:left;margin-left: 0px;" class="btn btn-info layout-span2" onclick="save_time_control(<?php echo $dynamicId; ?>)" value="<?php _e( "Save", contact_bank ); ?>" />
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
		var dynamicId = <?php echo $dynamicId; ?>;
		jQuery("#ux_label_text_"+dynamicId).val(array_time[dynamicId][2]);
		jQuery("#ux_description_control_"+dynamicId).val(array_time[dynamicId][3]);
		if(array_time[dynamicId][4] == 1)
		{
			jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
		}
		else
		{
			jQuery("#ux_required_"+dynamicId).attr("checked","checked");
		}
		jQuery("#ux_tooltip_control_"+dynamicId).val(array_time[dynamicId][5]);
		jQuery("#ux_admin_label_"+dynamicId).val(array_time[dynamicId][6]);
		if(array_time[dynamicId][7] == true)
		{
			jQuery("#ux_email_"+dynamicId).attr("checked","checked");
		}
		
		if(array_time[dynamicId][8] == 12)
		{
			jQuery("#ux_default_hours_24_"+dynamicId).hide();
			jQuery("#ux_default_hours_12_"+dynamicId).show();
			jQuery("#ux_default_hours_12_"+dynamicId).val(array_time[dynamicId][9]);	
			jQuery("#ux_drop_hour_time_"+dynamicId).val(array_time[dynamicId][8]);	
			jQuery("#ux_default_minute_"+dynamicId).val(array_time[dynamicId][10]);	
			jQuery("#ux_default_am_"+dynamicId).val(array_time[dynamicId][11]);	
			jQuery("#ux_minute_format_"+dynamicId).val(array_time[dynamicId][12]);
			jQuery("#ux_default_am_"+dynamicId).show();
		}
		else if(array_time[dynamicId][8] == 24)
		{
			jQuery("#ux_default_hours_12_"+dynamicId).hide();
			jQuery("#ux_default_hours_24_"+dynamicId).show();
			jQuery("#ux_default_hours_24_"+dynamicId).val(array_time[dynamicId][9]);	
			jQuery("#ux_drop_hour_time_"+dynamicId).val(array_time[dynamicId][8]);	
			jQuery("#ux_default_minute_"+dynamicId).val(array_time[dynamicId][10]);	
			jQuery("#ux_default_am_"+dynamicId).val(array_time[dynamicId][11]);	
			jQuery("#ux_minute_format_"+dynamicId).val(array_time[dynamicId][12]);
			jQuery("#ux_default_am_"+dynamicId).hide();
		}
		if(array_time[dynamicId][13] != "")
		{
			jQuery("#button_set_outer_label_"+dynamicId).html(array_time[dynamicId][13]);
			jQuery("#time_css_label_"+dynamicId).attr("style","display:block");
			jQuery("#time_css_label_"+dynamicId).attr("style","position:inherit");
		}
		if(array_time[dynamicId][14] != "")
		{
			jQuery("#button_set_textinput_"+dynamicId).html(array_time[dynamicId][14]);
			jQuery("#time_text_input_"+dynamicId).attr("style","display:block");
			jQuery("#time_text_input_"+dynamicId).attr("style","position:inherit");
		}
		if(array_time[dynamicId][15] != "")
		{
			jQuery("#button_set_outer_description_"+dynamicId).html(array_time[dynamicId][15]);
			jQuery("#time_description_"+dynamicId).attr("style","display:block");
			jQuery("#time_description_"+dynamicId).attr("style","position:inherit");
		}
		if(array_time[dynamicId][16] != "")
		{
			jQuery("#ux_time_hour_"+dynamicId).html(array_time[dynamicId][16]);
			jQuery("#time_set_time_hour_"+dynamicId).attr("style","display:block");
			jQuery("#time_set_time_hour_"+dynamicId).attr("style","position:inherit");
		}	
		if(array_time[dynamicId][17] != "")
		{
			jQuery("#ux_time_minute_"+dynamicId).html(array_time[dynamicId][17]);
			jQuery("#button_set_time_minute_"+dynamicId).attr("style","display:block");
			jQuery("#button_set_time_minute_"+dynamicId).attr("style","position:inherit");
		}
		if(array_time[dynamicId][18] != "")
		{
			jQuery("#button_set_time_am_"+dynamicId).html(array_time[dynamicId][18]);
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
		
		jQuery("#select_min_"+dynamicId).html(dropdown_min);
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
		jQuery("#select_min_"+dynamicId).val(ux_default_min);
	}
	function select_format(dynamicId)
	{
		var ux_default_format = jQuery("#ux_default_am_"+dynamicId).val();
		jQuery("#select_am_"+dynamicId).val(ux_default_format);
	}
	
	function save_time_control(dynamicId)
	{
		array_time[dynamicId] = [];
		array_time[dynamicId].push(13);
		array_time[dynamicId].push(dynamicId);
		array_time[dynamicId].push(jQuery("#ux_label_text_"+dynamicId).val());
		array_time[dynamicId].push(jQuery("#ux_description_control_"+dynamicId).val());
		if(jQuery("#ux_required_control_"+dynamicId).prop("checked") == true)
		{
			array_time[dynamicId].push("1");
		}
		else
		{
			array_time[dynamicId].push("0");
		}
		array_time[dynamicId].push(jQuery("#ux_tooltip_control_"+dynamicId).val());
		array_time[dynamicId].push(jQuery("#ux_admin_label_"+dynamicId).val());
		array_time[dynamicId].push(jQuery("#ux_email_"+dynamicId).prop("checked"));
		array_time[dynamicId].push(jQuery("#ux_drop_hour_time_"+dynamicId).val());
		if(jQuery("#ux_drop_hour_time_"+dynamicId).val() == 12)
		{
			array_time[dynamicId].push(jQuery("#ux_default_hours_12_"+dynamicId).val());
			
			jQuery("#ux_default_hours_24_"+dynamicId).hide();
			jQuery("#ux_default_hours_12_"+dynamicId).show();
		}
		else if(jQuery("#ux_drop_hour_time_"+dynamicId).val() == 24)
		{
			jQuery("#ux_default_hours_12_"+dynamicId).hide();
			jQuery("#ux_default_hours_24_"+dynamicId).show();
			array_time[dynamicId].push(jQuery("#ux_default_hours_24_"+dynamicId).val());
		}
		array_time[dynamicId].push(jQuery("#ux_default_minute_"+dynamicId).val());
		array_time[dynamicId].push(jQuery("#ux_default_am_"+dynamicId).val());
		array_time[dynamicId].push(jQuery("#ux_minute_format_"+dynamicId).val());
		array_time[dynamicId].push(jQuery("#button_set_outer_label_"+dynamicId).val());
		array_time[dynamicId].push(jQuery("#button_set_textinput_"+dynamicId).val());
		array_time[dynamicId].push(jQuery("#button_set_outer_description_"+dynamicId).val());
		array_time[dynamicId].push(jQuery("#ux_time_hour_"+dynamicId).val());
		array_time[dynamicId].push(jQuery("#ux_time_minute_"+dynamicId).val());
		array_time[dynamicId].push(jQuery("#button_set_time_am_"+dynamicId).val());
		
		
		jQuery("#control_label_"+dynamicId).html(jQuery("#ux_label_text_"+dynamicId).val()+" :");
		jQuery("#txt_description_"+dynamicId).html(jQuery("#ux_description_control_"+dynamicId).val());
		var tooltip_text = jQuery("#ux_tooltip_control_"+dynamicId).val();
		jQuery("#tooltip_txt_hidden_value_"+dynamicId).val(tooltip_text);
		jQuery("#show_tooltip"+dynamicId).attr("data-original-title",tooltip_text);
		if(jQuery("#ux_drop_hour_time_"+dynamicId).val() == 12)
		{
			jQuery("#select_hr_24_"+dynamicId).hide();
			jQuery("#select_hr_12_"+dynamicId).show();
			jQuery("#select_hr_12_"+dynamicId).val(jQuery("#ux_default_hours_12_"+dynamicId).val());
			jQuery("#select_am_"+dynamicId).show();
		}
		else if(jQuery("#ux_drop_hour_time_"+dynamicId).val() == 24)
		{
			jQuery("#select_hr_12_"+dynamicId).hide();
			jQuery("#select_hr_24_"+dynamicId).show();
			jQuery("#select_hr_24_"+dynamicId).val(jQuery("#ux_default_hours_24_"+dynamicId).val());
			jQuery("#select_am_"+dynamicId).hide();
		}
		jQuery("#select_min_"+dynamicId).val(jQuery("#ux_default_minute_"+dynamicId).val());
		jQuery("#select_am_"+dynamicId).val(jQuery("#ux_default_am_"+dynamicId).val());
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
<?php
}
?>