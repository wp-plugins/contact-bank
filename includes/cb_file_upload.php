<?php 
include_once CONTACT_BK_PLUGIN_DIR ."/phpfileuploader/phpuploader/include_phpuploader.php";
if($_REQUEST["param"] == "create_txt_file_control")
{
	$dynamicId = intval($_REQUEST["dynamicId"]);
	$field_id = intval($_REQUEST["field_id"]);
	?>
		<div class="layout-control-group div_border" id="div_<?php echo $dynamicId; ?>_9">
			<label class="layout-control-label" id="control_label_<?php echo $dynamicId; ?>" ><?php _e("File Upload", contact_bank); ?> : </label>
			<span id="txt_required_<?php echo $dynamicId; ?>"  class="error">*</span>
			<div class="layout-controls"  id="show_tooltip<?php echo $dynamicId; ?>">
				<a class="btn btn-info inline"  id="add_setting_control_<?php echo $dynamicId; ?>" href="#setting_controls_postback"  ><?php _e( "Settings", contact_bank ); ?></a>	
					<a style="cursor:pointer;" onclick="delete_textbox(div_<?php echo $dynamicId; ?>_9,<?php echo $dynamicId; ?>,9)" id="anchor_del_<?php echo $dynamicId; ?>" >
						<img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="margin-left: 1%;vertical-align: middle;"/>
					</a>
				<label class="layout-controls hovertip" id="tip<?php echo $dynamicId; ?>" style="margin-left:-92%;">
				<div id="file_upload_content" style="float:left;width:357px;">
					
					<?php 
					$uploader=new PhpUploader();
					$uploader->MultipleFilesUpload=false;
					$uploader->InsertText="Please choose Files";
					$uploader->MaxSizeKB=1024;
					$uploader->AllowedFileExtensions="*.jpg,*.png,*.gif,*.bmp,*.txt,*.zip,*.rar";
					$uploader->SaveDirectory= CONTACT_BK_PLUGIN_DIR ."/phpfileuploader/savefiles/";
					$uploader->FlashUploadMode="Partial";
					$uploader->Render();
					?>
				</div>
				<div id="file_upload_content_postback" style="display:none;float:left;width:357px;">
				</div>
				</label>
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
			<h4><?php _e( "Fileupload Control", contact_bank ); ?></h4>
			
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
									<input type="text" class="layout-span12" id="ux_label_text_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Label", contact_bank ); ?>" onkeyup="enter_admin_label(<?php echo $dynamicId; ?>);" value="<?php _e( "File Upload", contact_bank ); ?>"  name="ux_label_text_<?php echo $dynamicId; ?>"  />
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("Description", contact_bank); ?> :</label>
								<div class="layout-controls">				
									<textarea class="layout-span12" id="ux_description_control_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Description", contact_bank ); ?>" name="ux_description_control_<?php echo $dynamicId; ?>"  ></textarea>
								</div>
							</div>	
							<div class="layout-control-group" style="display: none;">
								<label class="layout-control-label"><?php _e( "Required", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="radio" id="ux_required_control_<?php echo $dynamicId; ?>" name="ux_required_control_radio_<?php echo $dynamicId; ?>" value="1"/><label style="margin-left: 5px;"><?php _e( "Required", contact_bank ); ?></label>    
									 <input type="radio" checked="checked" id="ux_required_<?php echo $dynamicId; ?>" name="ux_required_control_radio_<?php echo $dynamicId; ?>" value="0"/><label style="margin-left: 5px;"><?php _e( "Not Required", contact_bank ); ?></label>
								</div>
							</div>
							<div class="layout-control-group">
								<label  class="layout-control-label"><?php _e("Tooltip Text", contact_bank); ?> :</label>
								<div class="layout-controls">
									<input type="text" class="layout-span12" id="ux_tooltip_control_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Tooltip", contact_bank ); ?>" name="ux_tooltip_control_<?php echo $dynamicId; ?>" />
								</div>
							</div>
							<div class="layout-control-group">
								<div class="layout-controls">
									<input type="hidden" id="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" name="tooltip_txt_hidden_value_<?php echo $dynamicId; ?>" />
								</div>
							</div>
						</div>
					</div>
					<div id="tabs-nohdr-2"  style="display:none;">
						<div id="div_optional_<?php echo $dynamicId; ?>">
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Admin Label", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input  class="layout-span12"type="text" value="<?php _e( "File Upload", contact_bank ); ?>" id="ux_admin_label_<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Admin Label", contact_bank ); ?>" name="ux_admin_label_<?php echo $dynamicId; ?>" />
								</div>	
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Do not show in the email", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input type="checkbox" id="ux_show_email_<?php echo $dynamicId; ?>"  name="ux_show_email_<?php echo $dynamicId; ?>" style="margin-top: 10px;" value="1" > 
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Allow Multiple Uploads", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input  type="checkbox" id="ux_allow_multiple_file_<?php echo $dynamicId; ?>" name="ux_allow_multiple_file_<?php echo $dynamicId; ?>" style="margin-top: 10px;" value="1" >
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Allowed File Extensions", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input class="layout-span12" type="text" onkeypress="allow_file_ext_upload(event);" placeholder="<?php _e( "Enter File Extensions", contact_bank ); ?>" id="ux_allowed_file_extensions_<?php echo $dynamicId; ?>" name="ux_allowed_file_extensions_<?php echo $dynamicId; ?>" value="jpg;jpeg;png;gif" />
									<br />
         							<span style="margin-top: 5px;"><?php _e( "The file extensions must be seperated with semicolons(' ; ')", contact_bank ); ?></span>
								</div>
							</div>
							<div class="layout-control-group">	
								<label class="layout-control-label"><?php _e( "Allowed File Size", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input class="layout-span12" type="text" id="ux_maximum_file_allowed_<?php echo $dynamicId; ?>"   name="ux_maximum_file_allowed_<?php echo $dynamicId; ?>" value="1024" />
									<br />
									<p style="margin-top: 5px;"><?php _e( "File Size must be in Kb", contact_bank ); ?></p>
								</div>
							</div>
							<div class="layout-control-group" style="display: none">	
								<div class="layout-controls">
									<input  type="checkbox" id="ux_uploaded_file_email_db_<?php echo $dynamicId; ?>"  name="ux_uploaded_file_email_db_<?php echo $dynamicId; ?>" style="margin-top: 10px;float: left;" value="1" >&nbsp;<label class="layout-control-label" style="margin-left: 5px;">"Attach uploaded files to the notification email"</label>
								</div>
							</div>
						</div>
					</div>
					<div id="tabs-nohdr-1"  style="display:none;">
						<div id="div_advanced_<?php echo $dynamicId; ?>">
							<div class="layout-control-group" style="display: none" id="ux_label_fileupload_<?php echo $dynamicId; ?>">
								<label class="layout-control-label"><?php _e( "Css Label", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_outer_label_file<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Label", contact_bank ); ?>" name="button_set_outer_label_file<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;" onclick="delete_css_style_label_fileupload(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle;" /></a> 
								</div>
							</div>	
							<div class="layout-control-group" style="display: none" id="ux_description_fileupload_<?php echo $dynamicId; ?>" >
								<label class="layout-control-label"><?php _e( "Css Description", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<textarea class="layout-span11" id="button_set_outer_description_fileuplod<?php echo $dynamicId; ?>" placeholder="<?php _e( "Enter Css Description", contact_bank ); ?>" name="button_set_outer_description_fileuplod<?php echo $dynamicId; ?>"></textarea>
									<a style="cursor:pointer;" onclick="delete_css_style_description_fileupload(<?php echo $dynamicId; ?>);" id="anchor_del_" ><img src= "<?php echo CONTACT_BK_PLUGIN_URL; ?>/assets/images/delete-bg.png" style="vertical-align: middle;" /></a> 
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e( "Add a style to", contact_bank ); ?> :</label>
								<div class="layout-controls">
									<input class="btn btn-inverse layout-span3" type="button"  id="ux_button_label_style_<?php echo $dynamicId; ?>" name="ux_button_label_style_<?php echo $dynamicId; ?>" onclick="button_set_outer_label(<?php echo $dynamicId; ?>,9);" value="<?php _e( "Label", contact_bank ); ?>" />
									<input class="btn btn-inverse layout-span3"type="button"  id="ux_button_description_style_<?php echo $dynamicId; ?>" name="ux_button_description_style_<?php echo $dynamicId; ?>" onclick="button_set_description(<?php echo $dynamicId; ?>,9);" value="<?php _e( "Description", contact_bank ); ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="layout-control-group">	
		<input type="button" style="float:left;margin-left: 0px;" class="btn btn-info layout-span2" onclick="save_file_uploader(<?php echo $dynamicId; ?>)" value="<?php _e( "Save", contact_bank ); ?>" />
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
		jQuery("#ux_label_text_"+dynamicId).val(array_file_upload[dynamicId][2]);
		jQuery("#ux_description_control_"+dynamicId).val(array_file_upload[dynamicId][3]);
		if(array_file_upload[dynamicId][4] == 1)
		{
			jQuery("#ux_required_control_"+dynamicId).attr("checked","checked");
		}
		else
		{
			jQuery("#ux_required_"+dynamicId).attr("checked","checked");
		}
		jQuery("#ux_tooltip_control_"+dynamicId).val(array_file_upload[dynamicId][5]);
		jQuery("#ux_admin_label_"+dynamicId).val(array_file_upload[dynamicId][6]);
		if(array_file_upload[dynamicId][7] == true)
		{
			jQuery("#ux_show_email_"+dynamicId).attr("checked","checked");
		}
		if(array_file_upload[dynamicId][8] == true)
		{
			jQuery("#ux_allow_multiple_file_"+dynamicId).attr("checked","checked");
		}
		else
		{
			jQuery("#ux_allow_multiple_file_"+dynamicId).removeAttr("checked");
		}
		jQuery("#ux_allowed_file_extensions_"+dynamicId).val(array_file_upload[dynamicId][9]);
		jQuery("#ux_maximum_file_allowed_"+dynamicId).val(array_file_upload[dynamicId][10]);
		if(array_file_upload[dynamicId][11] == true)
		{
			jQuery("#ux_uploaded_file_email_db_"+dynamicId).attr("checked","checked");
		}
		if(array_file_upload[dynamicId][12] != "")
		{
			jQuery("#button_set_outer_label_file"+dynamicId).html(array_file_upload[dynamicId][12]);
			jQuery("#ux_label_fileupload_"+dynamicId).attr("style","display:block");
			jQuery("#ux_label_fileupload_"+dynamicId).attr("style","position:inherit");
		}
		if(array_file_upload[dynamicId][13] != "")
		{
			jQuery("#button_set_outer_description_fileuplod"+dynamicId).html(array_file_upload[dynamicId][13]);
			jQuery("#ux_description_fileupload_"+dynamicId).attr("style","display:block");
			jQuery("#ux_description_fileupload_"+dynamicId).attr("style","position:inherit");
		}	
	}	
	function save_file_uploader(dynamicId)
	{
		jQuery("#file_upload_content").remove();
		var ux_allow_multiple_file = jQuery("#ux_allow_multiple_file_"+dynamicId).prop("checked");
		var ux_allowed_file_extensions = jQuery("#ux_allowed_file_extensions_"+dynamicId).val();
		var ux_maximum_file_allowed = jQuery("#ux_maximum_file_allowed_"+dynamicId).val();
		var ux_uploaded_file_email_db = jQuery("#ux_uploaded_file_email_db"+dynamicId).prop("checked");
		jQuery.post(ajaxurl, "dynamicId="+dynamicId+"&ux_allow_multiple_file="+ux_allow_multiple_file+"&ux_allowed_file_extensions="+ux_allowed_file_extensions+
		"&ux_maximum_file_allowed="+ux_maximum_file_allowed+"&ux_uploaded_file_email_db="+ux_uploaded_file_email_db+"&param=ux_allow_multiple_file_upload&action=add_contact_form_library", function(data)
		{
			var dat = data;
			jQuery("#file_upload_content_postback").css('display','block')
			jQuery("#file_upload_content_postback").html(dat);
		});
		array_file_upload[dynamicId] = [];
		array_file_upload[dynamicId].push(9);
		array_file_upload[dynamicId].push(dynamicId);
		array_file_upload[dynamicId].push(jQuery("#ux_label_text_"+dynamicId).val());
		array_file_upload[dynamicId].push(jQuery("#ux_description_control_"+dynamicId).val());
		if(jQuery("#ux_required_control_"+dynamicId).prop("checked") == true)
		{
			array_file_upload[dynamicId].push("1");
		}
		else
		{
			array_file_upload[dynamicId].push("0");
		}
		array_file_upload[dynamicId].push(jQuery("#ux_tooltip_control_"+dynamicId).val());
		array_file_upload[dynamicId].push(jQuery("#ux_admin_label_"+dynamicId).val());
		array_file_upload[dynamicId].push(jQuery("#ux_show_email_"+dynamicId).prop("checked"));
		array_file_upload[dynamicId].push(jQuery("#ux_allow_multiple_file_"+dynamicId).prop("checked"));
		array_file_upload[dynamicId].push(jQuery("#ux_allowed_file_extensions_"+dynamicId).val());
		array_file_upload[dynamicId].push(jQuery("#ux_maximum_file_allowed_"+dynamicId).val());
		array_file_upload[dynamicId].push(jQuery("#ux_uploaded_file_email_db_"+dynamicId).prop("checked"));
		array_file_upload[dynamicId].push(jQuery("#button_set_outer_label_file"+dynamicId).val());
		array_file_upload[dynamicId].push(jQuery("#button_set_outer_description_fileuplod"+dynamicId).val());
		jQuery("#control_label_"+dynamicId).html(jQuery("#ux_label_text_"+dynamicId).val()+" :");
		jQuery("#txt_description_"+dynamicId).html(jQuery("#ux_description_control_"+dynamicId).val());
		var tooltip_text = jQuery("#ux_tooltip_control_"+dynamicId).val();
		jQuery("#tip"+dynamicId).attr("data-original-title",tooltip_text);	
		if(jQuery("#ux_required_control_"+dynamicId).prop("checked") == true)
		{
			jQuery("#txt_required_"+dynamicId).css("display","block");
		}
		else
		{
			jQuery("#txt_required_"+dynamicId).css("display","none");
		}
		jQuery("#AjaxUploaderFilesButton").css('float','left');
		jQuery("#AjaxUploaderFilesButton").css('visibility','visible');
		CloseLightbox();
	}
	function enter_admin_label(dynamicId)
	{
		var ux_label = jQuery("#ux_label_text_"+dynamicId).val();
		jQuery("#ux_admin_label_"+dynamicId).val(ux_label);
	}
	function browse_btn_name(dynamicId)
	{
		var browse_value = jQuery("#ux_button_text_"+dynamicId).val();
		jQuery("#AjaxUploaderFilesButton").html(browse_value);
		jQuery("#AjaxUploaderFilesButton").html(browse_value);
	}
	function button_set_outer_label(dynamicId)
	{
		jQuery("#ux_label_fileupload_"+dynamicId).css("display","block");
		jQuery("#ux_label_fileupload_"+dynamicId).attr("style", "position:inherit");
	}
	function button_set_description(dynamicId)
	{
		jQuery("#ux_description_fileupload_"+dynamicId).css("display","block");
		jQuery("#ux_description_fileupload_"+dynamicId).attr("style", "position:inherit");
	} 
	function delete_css_style_label_fileupload(dynamicId)
	{
		jQuery("#ux_label_fileupload_"+dynamicId).css("display","none");
		jQuery("#button_set_outer_label_file"+dynamicId).val("");
	}
	function delete_css_style_description_fileupload(dynamicId)
	{
		jQuery("#ux_description_fileupload_"+dynamicId).css("display","none");
		jQuery("#button_set_outer_description_fileuplod"+dynamicId).val("");
	}
	function allow_file_ext_upload(e) ///////////////////allow spaces and  only alpha,alphanumeric,digits
	{
	var regex = new RegExp("^[a-zA-Z;]*$");
	var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
	if (regex.test(str)) {
	return true;
	}
	e.preventDefault();
	return false;
	}
</script>
<?php
}
?>