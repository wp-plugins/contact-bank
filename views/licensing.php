<?php
switch($captcha_role)
{
	case "administrator":
		$user_role_permission = "manage_options";
	break;
	case "editor":
		$user_role_permission = "publish_pages";
	break;
	case "author":
		$user_role_permission = "publish_posts";
	break;
	case "contributor":
		$user_role_permission = "edit_posts";
	break;
	case "subscriber":
		$user_role_permission = "read";
	break;
}
if (!current_user_can($user_role_permission))
{
	return;
}
else
{
	$licensing_captcha = wp_create_nonce( "captcha_licensing" );
	$licensing = $wpdb->get_row
	(
		"SELECT * FROM " . captcha_bank_licensing()
	);
?>
	<div id="message" class="top-right message" style="display: none;">
		<div class="message-notification"></div>
		<div class="message-notification ui-corner-all growl-success" >
			<div onclick="message_close('message');" id="close-message" class="message-close">x</div>
			<div class="message-header"><?php _e("Success!",  captcha_bank); ?></div>
			<div class="message-message" id="licensing_message"></div>
		</div>
	</div>
	<div id="top-error" class="top-right top-error" style="display: none;">
		<div class="top-error-notification"></div>
		<div class="top-error-notification ui-corner-all growl-top-error" >
			<div onclick="message_close('top-error');" id="close-top-error" class="top-error-close">x</div>
			<div class="top-error-header"><?php _e("Error!",  captcha_bank); ?></div>
			<div class="top-error-top-error" id="licensing_error_message"></div>
		</div>
	</div>
	<form id="captcha_bank_licensing" class="layout-form" method="post" style="width:1000px;">
		<div class="fluid-layout">
			<div class="layout-span12">
				<div class="widget-layout">
					<div class="widget-layout-title">
						<h4><?php _e("WP Captcha Bank Licensing Module", captcha_bank); ?></h4>
					</div>
					<div class="widget-layout-body">
						<div class="fluid-layout">
							<div class="layout-span12 responsive">
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("Version", captcha_bank); ?> :</label>
									<div class="layout-controls">
										<input type="text" class="layout-span12" readonly="readonly" name="ux_version"
											id="ux_version" value="<?php echo $licensing->version; ?>"/>
									</div>
								</div>
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("Type", captcha_bank); ?> :</label>
									<div class="layout-controls">
										<input type="text" class="layout-span12" readonly="readonly" name="ux_type"
										id="ux_type" value="<?php echo $licensing->type; ?>"/>
									</div>
								</div>
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("URL", captcha_bank); ?> :</label>
									<div class="layout-controls">
										<input type="text" class="layout-span12" readonly="readonly" name="ux_site_url"
												id="ux_site_url" value="<?php echo $licensing->url; ?>"/>
									</div>
								</div>
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("API Key", captcha_bank); ?> :<span class="error">*</span></label>
									<div class="layout-controls">
										<input type="text" class="layout-span12" name="ux_api_key" id="ux_api_key"
												value="<?php echo $licensing->api_key; ?>" placeholder="Enter your API Key" />
									</div>
								</div>
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("Order ID", captcha_bank); ?> :<span class="error">*</span></label>
									<div class="layout-controls">
										<input type="text" class="layout-span12" onkeypress="return OnlyNumbers(event);" name="ux_order_id" id="ux_order_id"
												onfocus="prevent_paste(this);" value="<?php echo $licensing->order_id; ?>" placeholder="Enter your Order ID" />
									</div>
								</div>
								<div class="layout-control-group">
									<div class="layout-controls">
										<button type="submit" class="button-primary"><?php _e("Update", captcha_bank); ?></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script type="text/javascript">
		jQuery("#captcha_bank_licensing").validate
		({
			rules: 
			{
				ux_api_key: 
				{
					required: true
				},
				ux_order_id: 
				{
					required: true,
					digits:true
				}
			},
			errorPlacement: function(error, element)
			{
				jQuery(element).css("background-color","#FFCCCC");
				jQuery(element).css("border","1px solid red");
			},
			submitHandler: function (form) 
			{
				var overlay_opacity = jQuery("<div class=\"opacity_overlay\"></div>");
				jQuery("body").append(overlay_opacity);
				var overlay = jQuery("<div class=\"loader_opacity\"><div class=\"processing_overlay\"></div></div>");
				jQuery("body").append(overlay);
				var domain_url = "<?php echo site_url();?>";
				jQuery("#top-error").css("display", "none");
				jQuery.post("http://tech-banker.com/wp-admin/admin-ajax.php", jQuery(form).serialize() +"&ux_product_key=17148&ux_domain="+domain_url+"&param=license&action=license_validator", function (data) 
				{
					jQuery(".loader_opacity").remove();
					jQuery(".opacity_overlay").remove();
					if(data == "")
					{
						jQuery("#licensing_message").html("<?php _e("Success! License has been validated.", captcha_bank); ?>");
						jQuery.post(ajaxurl, jQuery(form).serialize() +"&param=update_licensing_setting&action=captcha_settings_library&_wpnonce=<?php echo $licensing_captcha;?>", function (data) 
						{
							jQuery("body,html").animate({scrollTop: jQuery("body,html").position().top}, "slow");
							jQuery("#message").css("display", "block"); 
							setTimeout(function () 
							{
								window.location.href = "admin.php?page=captcha_bank";
							}, 4000);
						});
					}
					else
					{
						jQuery("#message").css("display", "none");
						jQuery("#licensing_error_message").html(data);
						jQuery("#top-error").css("display", "block");
					}
				});
			}
		});
		function prevent_paste(control)
		{
			jQuery(control).live("paste",function(e)
			{
				e.preventDefault();
			});
		}
		function OnlyNumbers(evt) 
		{
			var charCode = (evt.which) ? evt.which : event.keyCode;
			return (charCode > 47 && charCode < 58) || charCode == 127 || charCode == 8;
		}
		if (typeof(message_close) != "function")
		{
			function message_close(id)
			{
				jQuery("#"+id).css("display", "none");
			}
		}
	</script>
<?php 
}
?>