<div class="layout-span7">
	<div class="widget-layout widget-tabs">
		<div class="widget-layout-title">
			<h4><?php _e( "Date Control", contact_bank ); ?></h4>
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
									<input onkeyup="enter_admin_label(<?php echo $dynamicId; ?>);" value="<?php _e( "Date", contact_bank ); ?>" type="text" class="layout-span12" id="ux_label_text_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Label", contact_bank ); ?>"  name="ux_label_text_<?php echo $dynamicId; ?>"/>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("Description", contact_bank); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span12" id="ux_description_control_<?php echo $dynamicId; ?>"  placeholder="<?php _e( "Enter Description", contact_bank ); ?>"  name="ux_description_control_<?php echo $dynamicId; ?>"></textarea>
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
									<input type="text" class="layout-span12" id="ux_tooltip_control_<?php echo $dynamicId; ?>"  placeholder="<?php _e( "Enter Tooltip", contact_bank ); ?>" name="ux_tooltip_control_<?php echo $dynamicId; ?>"/>
									<input type="hidden" id="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" name="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" />
								</div>
							</div>
						</div>
					</div>
					<div id="tabs-nohdr-2"  style="display:none;">
						<div id="div_optional_<?php echo $dynamicId; ?>">
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Admin label", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="text" value="<?php _e( "Date", contact_bank ); ?>" class="layout-span12" id="ux_admin_label_<?php echo $dynamicId; ?>"  placeholder="<?php _e( "Enter Admin Label", contact_bank ); ?>" name="ux_admin_label_<?php echo $dynamicId; ?>"/>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Do not show in the email", contact_bank ); ?> :</label>
								<div class="layout-controls" style="padding-top:5px;">
									<input type="checkbox" id="ux_show_email_<?php echo $dynamicId; ?>"   name="ux_show_email_<?php echo $dynamicId; ?>" value="1" >
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Start year", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="text" value="1900" onkeypress="return OnlyNumbers(event)" maxlength="4" class="layout-span12"  placeholder="<?php _e( "Enter Start Year", contact_bank ); ?>"  onblur="test(<?php echo $dynamicId; ?>)" id="ux_start_year_label_<?php echo $dynamicId; ?>" name="ux_start_year_label_<?php echo $dynamicId; ?>"/>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "End year", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="text" value="2100"  onkeypress="return OnlyNumbers(event)" maxlength="4" class="layout-span12"  id="ux_last_year_label_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter End Year ", contact_bank ); ?>" onblur="test(<?php echo $dynamicId; ?>)" name="ux_last_year_label_<?php echo $dynamicId; ?>"/>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Default value", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<select class="layout-span4"  name="ux_default_day_type_<?php echo $dynamicId; ?>" onchange="set_default_day(<?php echo $dynamicId; ?>)" id="ux_default_day_type_<?php echo $dynamicId; ?>">
										<option value="inherit" selected="selected"><?php _e( "Day", contact_bank ); ?></option>
									</select>
									<label id="day_<?php echo $dynamicId; ?>"></label>
									<select class="layout-span4"  name="ux_default_month_type_<?php echo $dynamicId; ?>" onchange="set_default_month(<?php echo $dynamicId; ?>)" id="ux_default_month_type_<?php echo $dynamicId; ?>">
										<option value="inherit" selected="selected"><?php _e( "Month", contact_bank ); ?></option>	
									</select>
									<select class="layout-span4"  name="ux_default_year_type_<?php echo $dynamicId; ?>" onchange="set_default_year(<?php echo $dynamicId; ?>)" id="ux_default_year_type_<?php echo $dynamicId; ?>">
										<option value="inherit" selected="selected"><?php _e( "Year", contact_bank ); ?></option>
									</select>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Error message if invalid date", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="text" class="layout-span12" id="ux_last_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Error Message", contact_bank ); ?>" name="ux_last_<?php echo $dynamicId; ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Date format", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<select class="layout-span12" name="uxDefaultDateFormat_<?php echo $dynamicId; ?>" class="style required" id="uxDefaultDateFormat_<?php echo $dynamicId; ?>">
										<?php
										$date = date("j"); 
										$monthName = date("F");
										$monthNumeric = date("m");
										$year = date("Y");
										?>	
										<option value="0" selected="selected"><?php echo  $monthName ." ".$date.",  ".$year; ?></option>
										<option value="1" ><?php echo  $year ."/".$monthNumeric."/".$date; ?></option>
										<option value="2"><?php echo  $monthNumeric ."/".$date."/".$year; ?></option>
										<option value="3"><?php echo $date ."/".$monthNumeric."/".$year;  ?></option>
									</select> 
								</div>
							</div>
						</div>
					</div>
					<div id="tabs-nohdr-1"  style="display:none;">
						<div class="layout-control-group" id="div_advanced_<?php echo $dynamicId; ?>">
							<div class="layout-control-group" id="ux_advance_label_<?php echo $dynamicId; ?>" style="display: none;" >
								<label class="layout-control-label"><?php _e( "Label Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea  class="layout-span11" id="ux_date_set_outer_label_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Label Style", contact_bank ); ?>"  name="ux_date_set_outer_label_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;" onclick="delete_date_css_style_label(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png"  style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="advance_text_input_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Text Input Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_date_txt_input_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Text Input Style", contact_bank ); ?>" name="ux_date_txt_input_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_date_css_style_text_input(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png"  style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="advance_text_description_<?php echo $dynamicId; ?>" style="display:none;">
								<label class="layout-control-label"><?php _e( "Description Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_date_description_textarea_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Description Style", contact_bank ); ?>" name="ux_date_description_textarea_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_date_css_style_description(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png"  style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="ux_advance_day_<?php echo $dynamicId; ?>" style="display: none;" >
								<label class="layout-control-label"><?php _e( "Day Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_day_textarea_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Day Style", contact_bank ); ?>" name="ux_day_textarea_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;" onclick="delete_css_style_day(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png"  style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="advance_text_month_<?php echo $dynamicId; ?>" style="display: none">
								<label class="layout-control-label"><?php _e( "Month Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_month_textarea_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Month Style", contact_bank ); ?>" name="ux_month_textarea_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_date_css_style_month(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png"  style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group" id="advance_text_year_<?php echo $dynamicId; ?>" style="display:none;">
								<label class="layout-control-label"><?php _e( "Year Style", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="ux_year_textarea_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Year Style", contact_bank ); ?>" name="ux_year_textarea_<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;"  onclick="delete_css_style_year(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png"  style="vertical-align: middle" /></a>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Add a Style to", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_label_style_<?php echo $dynamicId; ?>" name="ux_button_label_style_<?php echo $dynamicId; ?>" onclick="button_set_outer_label(<?php echo $dynamicId; ?>,12);" style="margin-bottom: 5px;" value="<?php _e( "Label", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_txt_input_save_<?php echo $dynamicId; ?>" name="ux_button_txt_input_save_<?php echo $dynamicId; ?>" onclick="button_set_txt_input(<?php echo $dynamicId; ?>,12);" style="margin-bottom: 5px;display: none;" value="<?php _e( "Text Input", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_button_description_style_<?php echo $dynamicId; ?>" name="ux_button_description_style_<?php echo $dynamicId; ?>" onclick="button_set_description(<?php echo $dynamicId; ?>,12);" style="margin-bottom: 5px;" value="<?php _e( "Description", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_day_<?php echo $dynamicId; ?>" name="ux_day_<?php echo $dynamicId; ?>" onclick="ux_date_day(<?php echo $dynamicId; ?>,12);" style="margin-bottom: 5px;" value="<?php _e( "Day", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_month_<?php echo $dynamicId; ?>" name="ux_month_<?php echo $dynamicId; ?>" onclick="ux_date_month(<?php echo $dynamicId; ?>,12);" style="margin-bottom: 5px;" value="<?php _e( "Month", contact_bank ); ?>" />
									<input type="button" class="btn btn-inverse layout-span2" id="ux_year_<?php echo $dynamicId; ?>" name="ux_year_<?php echo $dynamicId; ?>" onclick="ux_date_year(<?php echo $dynamicId; ?>,12);" style="margin-bottom: 5px;" value="<?php _e( "Year", contact_bank ); ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="layout-control-group">	
		<input type="button" class="btn btn-info layout-span2" onclick="save_date_control(<?php echo $dynamicId; ?>)" value="<?php _e( "Save Settings", contact_bank ); ?>" />
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
	function test(dynamicId)
	{
		var start_year = jQuery("#ux_start_year_label_"+dynamicId).val();
		var end_year = jQuery("#ux_last_year_label_"+dynamicId).val();
		var dropdown_year = "<select id=select_year_"+dynamicId+" name=select_year_"+dynamicId+">";
		var ddl_heading = jQuery("#ux_show_date_"+dynamicId).prop("checked");
		dropdown_year += "<option value=0><?php _e( "Year", contact_bank ); ?></option>";
		for(flag=start_year; flag <= end_year; flag++)
		{
			if(start_year ==  flag)
			{
				dropdown_year += "<option selected='selected' value="+flag+">"+ flag + "</option>";
			}
			dropdown_year += "<option value="+flag+">"+ flag + "</option>";
		}
		dropdown_year += "</select>";
		jQuery("#bind_year_"+dynamicId).html(dropdown_year);
		jQuery("#ux_default_year_type_"+dynamicId).html(dropdown_year);
		jQuery("#select_year_"+dynamicId).html(dropdown_year);
	}
	function dropdown_heading(dynamicId)
	{
		var dropdown_day = "<select id=select_day_"+dynamicId+" name=select_day_"+dynamicId+">";
		dropdown_day += "<option value=0><?php _e( "Day", contact_bank ); ?></option>";
		for(flag=1; flag <= 31; flag++)
		{
			if(flag < 10)
			{
				dropdown_day += "<option value="+flag+">0"+ flag + "</option>";
			}
			else
			{
				dropdown_day += "<option value="+flag+">"+ flag + "</option>";
			}
		}
		dropdown_day += "</select>";
			
		var dropdown_month = "<select id=select_month_"+dynamicId+" name=select_month_"+dynamicId+">";
		dropdown_month += "<option value=0><?php _e( "Month", contact_bank ); ?></option>";
		dropdown_month +="<option value=1>January</option>";
		dropdown_month +="<option value=2>February</option>";
		dropdown_month +="<option value=3>March</option>";
		dropdown_month +="<option value=4>April</option>";
		dropdown_month +="<option value=5>May</option>";
		dropdown_month +="<option value=6>June</option>";
		dropdown_month +="<option value=7>July</option>";
		dropdown_month +="<option value=8>August</option>";
		dropdown_month +="<option value=9>September</option>";
		dropdown_month +="<option value=10>October</option>";
		dropdown_month +="<option value=11>November</option>";
		dropdown_month +="<option value=12>December</option>";
		dropdown_month += "</select>";
		var start_year = jQuery("#ux_start_year_label_"+dynamicId).val();
		
		if(start_year == "")
		{
			start_year1 = 1900;
		}
		else
		{
			start_year1 = start_year;
		}
		var end_year = jQuery("#ux_last_year_label_"+dynamicId).val();
		if(end_year == "")
		{
			end_year1 = 2100;
		}
		else
		{
			end_year1 = end_year;
		}	
		var dropdown_year = "<select id=select_year_"+dynamicId+" name=select_year_"+dynamicId+">";
		dropdown_year += "<option value=0><?php _e( "Year", contact_bank ); ?></option>";
		for(flag=start_year1; flag <= end_year1; flag++)
		{
			dropdown_year += "<option value="+flag+">"+ flag + "</option>";
		}
		dropdown_year += "</select>";
		jQuery("#select_day_"+dynamicId).html(dropdown_day);
		jQuery("#select_month_"+dynamicId).html(dropdown_month);
		jQuery("#select_year_"+dynamicId).html(dropdown_year);
		jQuery("#ux_default_month_type_"+dynamicId).html(dropdown_month);
		jQuery("#ux_default_day_type_"+dynamicId).html(dropdown_day);
		jQuery("#ux_default_year_type_"+dynamicId).html(dropdown_year);
		var d = new Date();
		var month = d.getMonth()+1;
		var day = d.getDate();
		var output = d.getFullYear();
		jQuery("#ux_default_month_type_"+dynamicId).val(month);
		jQuery("#ux_default_day_type_"+dynamicId).val(day);
		jQuery("#ux_default_year_type_"+dynamicId).val(output);
	}
	function default_day(dynamicId,start_yr,end_yr)
	{
		var dropdown_day = "<select id=select_day_"+dynamicId+" name=select_day_"+dynamicId+">";
		dropdown_day += "<option value=0><?php _e( "Day", contact_bank ); ?></option>";
		for(flag=1; flag <= 31; flag++)
		{
			if(flag < 10)
			{
				dropdown_day += "<option value=0"+flag+">0"+ flag + "</option>";
			}
			else
			{
				dropdown_day += "<option value="+flag+">"+ flag + "</option>";
			}
		}
		dropdown_day += "</select>";
		
		var dropdown_month = "<select id=select_month_"+dynamicId+" name=select_month_"+dynamicId+">";
		dropdown_month += "<option value=0><?php _e( "Month", contact_bank ); ?></option>";
		dropdown_month +="<option value=1>January</option>";
		dropdown_month +="<option value=2>February</option>";
		dropdown_month +="<option value=3>March</option>";
		dropdown_month +="<option value=4>April</option>";
		dropdown_month +="<option value=5>May</option>";
		dropdown_month +="<option value=6>June</option>";
		dropdown_month +="<option value=7>July</option>";
		dropdown_month +="<option value=8>August</option>";
		dropdown_month +="<option value=9>September</option>";
		dropdown_month +="<option value=10>October</option>";
		dropdown_month +="<option value=11>November</option>";
		dropdown_month +="<option value=12>December</option>";
		dropdown_month += "</select>";

		var start_year = jQuery("#ux_start_year_label_"+dynamicId).val();
		start_year1 = (start_year == "" || start_yr == "") ? 1900 : start_year;

		var end_year = jQuery("#ux_last_year_label_"+dynamicId).val();
		end_year1 = (end_year == "" || end_yr == "") ? 2100 : end_year;

		var dropdown_year = "<select id=select_year_"+dynamicId+" name=select_year_"+dynamicId+">";
		dropdown_year += "<option value=0><?php _e( "Year", contact_bank ); ?></option>";
		
		for(flag=start_year1; flag <= end_year1; flag++)
		{
			dropdown_year += "<option value="+flag+">"+ flag + "</option>";
		}
		dropdown_year += "</select>";
		
		jQuery("#ux_default_day_type_"+dynamicId).html(dropdown_day);
		jQuery("#ux_default_month_type_"+dynamicId).html(dropdown_month);
		jQuery("#ux_default_year_type_"+dynamicId).html(dropdown_year);
	}
	function set_default_day(dynamicId)
	{
		var ux_default_day_type = jQuery("#ux_default_day_type_"+dynamicId).val();
		jQuery("#select_day_"+dynamicId).val(ux_default_day_type);
	}
	function set_default_month(dynamicId)
	{
		var ux_default_day_type = jQuery("#ux_default_month_type_"+dynamicId).val();
		jQuery("#select_month_"+dynamicId).val(ux_default_day_type);
	}
	function set_default_year(dynamicId)
	{
		var ux_default_day_type = jQuery("#ux_default_year_type_"+dynamicId).val();
		jQuery("#select_year_"+dynamicId).val(ux_default_day_type);	
	}
	var count = <?php echo $count; ?>;
	if(count != 0)
	{
		var dynamicCount = "<?php echo $dynamicCount;?>";
		var dynamicId = <?php echo $dynamicId; ?>;
		jQuery("#ux_label_text_"+dynamicId).val(array_controls[dynamicCount][2].cb_label_value);
		jQuery("#ux_description_control_"+dynamicId).html(array_controls[dynamicCount][3].cb_description);
		if(array_controls[dynamicCount][4].cb_control_required == 1)
		{
			jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
		}
		else
		{
			jQuery("#ux_required_"+dynamicId).attr("checked","checked");
		}
		jQuery("#ux_tooltip_control_"+dynamicId).val(array_controls[dynamicCount][5].cb_tooltip_txt);
		jQuery("#ux_admin_label_"+dynamicId).val(array_controls[dynamicCount][6].cb_admin_label);
		
		if(array_controls[dynamicCount][7].cb_show_email == true)
		{
			jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
		}
		 
		jQuery("#ux_start_year_label_"+dynamicId).val(array_controls[dynamicCount][8].cb_start_year);
		jQuery("#ux_last_year_label_"+dynamicId).val(array_controls[dynamicCount][9].cb_end_year);
		jQuery("#ux_default_day_type_"+dynamicId).val(array_controls[dynamicCount][10].cb_default_value_day);
		jQuery("#ux_default_month_type_"+dynamicId).val(array_controls[dynamicCount][11].cb_default_value_month);
		jQuery("#ux_default_year_type_"+dynamicId).val(array_controls[dynamicCount][12].cb_default_value_year);
		jQuery("#ux_last_"+dynamicId).val(array_controls[dynamicCount][13].cb_error_invalid);
		jQuery("#uxDefaultDateFormat_"+dynamicId).val(array_controls[dynamicCount][14].cb_date_format);
		
		if(array_controls[dynamicCount][15].cb_button_set_outer_label != "")
		{
			jQuery("#ux_date_set_outer_label_"+dynamicId).html(array_controls[dynamicCount][15].cb_button_set_outer_label);
			jQuery("#ux_advance_label_"+dynamicId).attr("style","display:block");
			jQuery("#ux_advance_label_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][16].cb_button_set_txt_input != "")
		{
			jQuery("#ux_date_txt_input_"+dynamicId).html(array_controls[dynamicCount][16].cb_button_set_txt_input);
			jQuery("#advance_text_input_"+dynamicId).attr("style","display:block");
			jQuery("#advance_text_input_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][17].cb_button_set_description != "")
		{
			jQuery("#ux_date_description_textarea_"+dynamicId).html(array_controls[dynamicCount][17].cb_button_set_description);
			jQuery("#advance_text_description_"+dynamicId).attr("style","display:block");
			jQuery("#advance_text_description_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][18].cb_date_day_dropdown != "")
		{
			jQuery("#ux_day_textarea_"+dynamicId).html(array_controls[dynamicCount][18].cb_date_day_dropdown);
			jQuery("#ux_advance_day_"+dynamicId).attr("style","display:block");
			jQuery("#ux_advance_day_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][19].cb_date_month_dropdown != "")
		{
			jQuery("#ux_month_textarea_"+dynamicId).html(array_controls[dynamicCount][19].cb_date_month_dropdown);
			jQuery("#advance_text_month_"+dynamicId).attr("style","display:block");
			jQuery("#advance_text_month_"+dynamicId).attr("style","position:inherit");
		}
		if(array_controls[dynamicCount][20].cb_date_year_dropdown != "")
		{
			jQuery("#ux_year_textarea_"+dynamicId).html(array_controls[dynamicCount][20].cb_date_year_dropdown);
			jQuery("#advance_text_year_"+dynamicId).attr("style","display:block");
			jQuery("#advance_text_year_"+dynamicId).attr("style","position:inherit");
		}
	}
	function save_date_control(dynamicId)
	{
		var dynamicCount = "<?php echo $dynamicCount;?>";
		array_controls[dynamicCount] = [];
		array_controls[dynamicCount].push({"control_type" : 12});
		array_controls[dynamicCount].push({"date_dynamicId" : dynamicId});
		array_controls[dynamicCount].push({"cb_label_value" : jQuery("#ux_label_text_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_description" : jQuery("#ux_description_control_"+dynamicId).val()});
		jQuery("#ux_required_control_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_control_required": 1}) : array_controls[dynamicCount].push({"cb_control_required": 0});
		array_controls[dynamicCount].push({"cb_tooltip_txt" : jQuery("#ux_tooltip_control_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_admin_label" : jQuery("#ux_admin_label_"+dynamicId).val()});
		jQuery("#ux_show_email_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_show_email": 1}) : array_controls[dynamicCount].push({"cb_show_email": 0});
		array_controls[dynamicCount].push({"cb_start_year" : jQuery("#ux_start_year_label_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_end_year" : jQuery("#ux_last_year_label_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_default_value_day" : jQuery("#ux_default_day_type_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_default_value_month" : jQuery("#ux_default_month_type_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_default_value_year" : jQuery("#ux_default_year_type_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_error_invalid" : jQuery("#ux_last_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_date_format" : jQuery("#uxDefaultDateFormat_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_outer_label" : jQuery("#ux_date_set_outer_label_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_txt_input" : jQuery("#ux_date_txt_input_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_button_set_description" : jQuery("#ux_date_description_textarea_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_date_day_dropdown" : jQuery("#ux_day_textarea_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_date_month_dropdown" : jQuery("#ux_month_textarea_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_date_year_dropdown" : jQuery("#ux_year_textarea_"+dynamicId).val()});
		jQuery("#select_day_"+dynamicId).val(jQuery("#ux_default_day_type_"+dynamicId).val());
		jQuery("#select_month_"+dynamicId).val(jQuery("#ux_default_month_type_"+dynamicId).val());
		jQuery("#control_label_"+dynamicId).html(jQuery("#ux_label_text_"+dynamicId).val()+" :");
		jQuery("#txt_description_"+dynamicId).html(jQuery("#ux_description_control_"+dynamicId).val());
		
		jQuery("#show_tooltip"+dynamicId).attr("data-original-title",jQuery("#ux_tooltip_control_"+dynamicId).val());
		
		if(jQuery("#ux_required_control_"+dynamicId).prop("checked") == true)
		{
			jQuery("#txt_required_"+dynamicId).css("display","block");
		}
		else
		{
			jQuery("#txt_required_"+dynamicId).css("display","none");
		}
		jQuery("#select_year_"+dynamicId).val(jQuery("#ux_default_year_type_"+dynamicId).val());
		CloseLightbox();
	}
	function enter_admin_label(dynamicId)
	{
		var ux_label = jQuery("#ux_label_text_"+dynamicId).val();
		jQuery("#ux_admin_label_"+dynamicId).val(ux_label);
	}
	function button_set_outer_label(dynamicId)
	{
		jQuery("#ux_advance_label_"+dynamicId).attr("display","block");
		jQuery("#ux_advance_label_"+dynamicId).attr("style", "position:inherit");
		
	}
	function button_set_txt_input(dynamicId)
	{
		jQuery("#advance_text_input_"+dynamicId).attr("display","block");
		jQuery("#advance_text_input_"+dynamicId).attr("style", "position:inherit");
		
	}
	function button_set_description(dynamicId)
	{
		jQuery("#advance_text_description_"+dynamicId).attr("display","block");
		jQuery("#advance_text_description_"+dynamicId).attr("style", "position:inherit");
		
	}
	function ux_date_day(dynamicId)
	{
		jQuery("#ux_advance_day_"+dynamicId).attr("display","block");
		jQuery("#ux_advance_day_"+dynamicId).attr("style", "position:inherit");
		
	}
	function ux_date_month(dynamicId)
	{
		jQuery("#advance_text_month_"+dynamicId).attr("display","block");
		jQuery("#advance_text_month_"+dynamicId).attr("style", "position:inherit");
		
	}
	function ux_date_year(dynamicId)
	{
		jQuery("#advance_text_year_"+dynamicId).attr("display","block");
		jQuery("#advance_text_year_"+dynamicId).attr("style", "position:inherit");
		
	}
	function delete_date_css_style_label(dynamicId)
	{
		jQuery("#ux_advance_label_"+dynamicId).css("display","none");
		jQuery("#ux_date_set_outer_label_"+dynamicId).val("");
	}
	function delete_date_css_style_text_input(dynamicId)
	{
		jQuery("#advance_text_input_"+dynamicId).css("display","none");
		jQuery("#ux_date_txt_input_"+dynamicId).val("");
	}
	function delete_date_css_style_description(dynamicId)
	{
		jQuery("#advance_text_description_"+dynamicId).css("display","none");
		jQuery("#ux_date_description_textarea_"+dynamicId).val("");
	}
	function delete_css_style_day(dynamicId)
	{
		jQuery("#ux_advance_day_"+dynamicId).css("display","none");
		jQuery("#ux_day_textarea_"+dynamicId).val("");
	}
	function delete_date_css_style_month(dynamicId)
	{
		jQuery("#advance_text_month_"+dynamicId).css("display","none");
		jQuery("#ux_month_textarea_"+dynamicId).val("");
	}
	function delete_css_style_year(dynamicId)
	{
		jQuery("#advance_text_year_"+dynamicId).css("display","none");
		jQuery("#ux_year_textarea_"+dynamicId).val("");
	}	
	function OnlyNumbers(evt) 
	{
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if ((charCode > 47 && charCode < 58) || charCode == 127 || charCode == 8) 
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
</script>
