<?php
if($_REQUEST["param"] == "create_txt_hide_control")
{
	$dynamicId = intval($_REQUEST["dynamicId"]);
	$field_id = intval($_REQUEST["field_id"]);
	?>
	<div class="layout-control-group div_border" id="div_<?php echo $dynamicId; ?>_14">
		<label class="layout-control-label" id="control_label_<?php echo $dynamicId; ?>" ><?php _e("Untitled (hidden)", contact_bank); ?> :</label>
		<span id="txt_required_<?php echo $dynamicId; ?>"  class="error">*</span>
			<div class="layout-controls" id="show_tooltip<?php echo $dynamicId; ?>">	
				<input class="hovertip layout-span7" data-original-title="<?php _e( "Hidden", contact_bank ); ?>" type="text" id="txt_hide_<?php echo $dynamicId; ?>" name="<?php echo $dynamicId; ?>" />
				<a class="btn btn-info inline" id="add_setting_control_<?php echo $dynamicId; ?>"   href="#setting_controls_postback"  ><?php _e( "Settings", contact_bank ); ?></a>	
				<a style="cursor:pointer;"  onclick="delete_textbox(div_<?php echo $dynamicId; ?>_14,<?php echo $dynamicId; ?>);" id=anchor_del_<?php echo $dynamicId; ?> >
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
								<div class="layout-controls">
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
		<input type="button" style="float:left;margin-left: 0px;" class="btn btn-info layout-span2" onclick="save_hidden_control(<?php echo $dynamicId; ?>)" value="<?php _e( "Save", contact_bank ); ?>" />
	</div>
</div>
<script type="text/javascript">
	jQuery(".hovertip").tooltip();	
	
	var count = <?php echo $count; ?>;
	if(count != 0)
	{
		var dynamicId = <?php echo $dynamicId; ?>;
		jQuery("#ux_label_text_"+dynamicId).val(array_hidden[dynamicId][2]);
		jQuery("#ux_default_value_"+dynamicId).val(array_hidden[dynamicId][3]);
		jQuery("#ux_admin_label_"+dynamicId).val(array_hidden[dynamicId][4]);
		if(array_hidden[dynamicId][5] == true)
		{
			jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
		}
	}
	function save_hidden_control(dynamicId)
	{
		array_hidden[dynamicId] = [];
		array_hidden[dynamicId].push(14);
		array_hidden[dynamicId].push(dynamicId);
		array_hidden[dynamicId].push(jQuery("#ux_label_text_"+dynamicId).val());
		array_hidden[dynamicId].push(jQuery("#ux_default_value_"+dynamicId).val());
		array_hidden[dynamicId].push(jQuery("#ux_admin_label_"+dynamicId).val());
		array_hidden[dynamicId].push(jQuery("#ux_show_email_"+dynamicId).prop("checked"));
		jQuery("#txt_hide_"+dynamicId).val(jQuery("#ux_default_value_"+dynamicId).val());
		CloseLightbox();
	}
	function enter_admin_label(dynamicId)
	{
		var ux_label = jQuery("#ux_label_text_"+dynamicId).val();
		jQuery("#ux_admin_label_"+dynamicId).val(ux_label);
	}
</script>
<?php
}
?>