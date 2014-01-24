<div class="layout-span7">
	<div class="widget-layout widget-tabs">
		<div class="widget-layout-title">
			<h4><?php _e( "Hidden Control", contact_bank ); ?></h4>
		</div>
		<div class="fluid-layout">
			<div class="layout-span12">
				<div class="widget-layout-body layout-form">
					<ul style="margin-bottom:30px;" class="nav nav-tabs" id="tabs-nohdr_<?php echo $dynamicId; ?>">
						<li class="active" id="li3">
							<a id="tab3"><?php _e( "Settings", contact_bank ); ?></a>
						</li>
					</ul>
					<div id="tabs-nohdr-3">
						<div id="div_settings_<?php echo $dynamicId; ?>">
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Label", contact_bank ); ?> :</label>
								<div class="layout-controls">
								 <input type="text" class="layout-span12" id="ux_label_text_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Label", contact_bank ); ?>"  name="ux_label_text_<?php echo $dynamicId; ?>"  onkeyup="enter_admin_label(<?php echo $dynamicId; ?>);" value="<?php _e( "Untitled(hidden)", contact_bank ); ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								 <label class="layout-control-label"><?php _e("Default Value", contact_bank); ?> :</label>
								<div class="layout-controls">
									<input type="text" class="layout-span12" id="ux_default_value_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Default Value", contact_bank ); ?>" name="ux_default_value_<?php echo $dynamicId; ?>"  value="">
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Admin label", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="text" value="<?php _e( "Untitled(hidden)", contact_bank ); ?>" placeholder="<?php _e( "Enter Admin label", contact_bank ); ?>" class="layout-span12" id="ux_admin_label_<?php echo $dynamicId; ?>" name="ux_admin_label_<?php echo $dynamicId; ?>"/>
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
				</div>
			</div>
		</div>
	</div>
	<div class="layout-control-group">	
		<input type="button" class="btn btn-info layout-span2" onclick="save_hidden_control(<?php echo $dynamicId; ?>,<?php echo $dynamicCount;?>)" value="<?php _e( "Save Settings", contact_bank ); ?>" />
	</div>
</div>
<script type="text/javascript">
	jQuery(".hovertip").tooltip();	
	
	var count = <?php echo $count; ?>;
	if(count != 0)
	{
		
		var dynamicId = <?php echo $dynamicId; ?>;
		jQuery("#ux_label_text_"+dynamicId).val(array_controls[<?php echo $dynamicCount;?>][2].cb_label_value);
		jQuery("#ux_default_value_"+dynamicId).val(array_controls[<?php echo $dynamicCount;?>][3].cb_default_txt_val);
		jQuery("#ux_admin_label_"+dynamicId).val(array_controls[<?php echo $dynamicCount;?>][4].cb_admin_label);
		if(array_controls[<?php echo $dynamicCount;?>][5].cb_show_email == "1")
		{
			jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
		}
	}
	function save_hidden_control(dynamicId,dynamicCount)
	{
		
		array_controls[dynamicCount] = [];
		array_controls[dynamicCount].push({"control_type" : "14"});
		array_controls[dynamicCount].push({"hidden_dynamicId" : dynamicId});
		array_controls[dynamicCount].push({"cb_label_value" : jQuery("#ux_label_text_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_default_txt_val" : jQuery("#ux_default_value_"+dynamicId).val()});
		array_controls[dynamicCount].push({"cb_admin_label" : jQuery("#ux_admin_label_"+dynamicId).val()});
		jQuery("#ux_show_email_"+dynamicId).prop("checked") == true ? array_controls[dynamicCount].push({"cb_show_email": "1"}) : array_controls[dynamicCount].push({"cb_show_email": 0});
		jQuery("#ux_txt_hidden_control_"+dynamicId).val(jQuery("#ux_default_value_"+dynamicId).val());
		jQuery("#control_label_"+dynamicId).html(jQuery("#ux_label_text_"+dynamicId).val());
		//console.log("pushed control : 14, Dynamic Count : " + dynamicCount + ", Array Count = " + array_controls[dynamicCount].length);
		//console.log(JSON.stringify(array_controls[dynamicCount]));
		CloseLightbox();
	}
	function enter_admin_label(dynamicId)
	{
		var ux_label = jQuery("#ux_label_text_"+dynamicId).val();
		jQuery("#ux_admin_label_"+dynamicId).val(ux_label);
	}
</script>