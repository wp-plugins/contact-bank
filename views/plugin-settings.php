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
	$settings_plugin = wp_create_nonce( "plugin_settings" );
	if (file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-plugin-settings.php"))
	{
		include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-plugin-settings.php";
	}
?>
<div id="message" class="top-right message" style="display: none;">
	<div class="message-notification"></div>
	<div class="message-notification ui-corner-all growl-success" >
		<div onclick="message_close();" id="close-message" class="message-close">x</div>
		<div class="message-header"><?php _e("Success!",  captcha_bank); ?></div>
		<div class="message-message"><?php _e("Plugin Settings has been updated ",  captcha_bank); ?></div>
	</div>
</div>
	<form class="layout-form wpcb-page-width" id="frm_wp_plugin_settings" method="post">
		<div class="fluid-layout wpcb-page-width">
			<div class="layout-span12">
				<div class="widget-layout">
					<div class="widget-layout-title">
						<h4>
							<?php _e("Plugin Settings", captcha_bank); ?>
						</h4>
					</div>
					<div class="widget-layout-body">
						<div class="fluid-layout">
							<div class="layout-span12 responsive">
								<div class="layout-control-group">
									<label class="layout-control-label-captcha">
										<?php _e("Show Captcha Plugin Menu", captcha_bank); ?> :
										<span class="hovertip" data-original-title ='<?php _e("Allows you to control the capabilities of WP Captcha Bank among different roles of WordPress users.",captcha_bank) ;?>'>
											<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
										</span>
									</label>
									<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
										<span class="check-bottom">
											<input type="checkbox" id="ux_chk_admin" name="ux_chk_admin" disabled="disabled" value="1" <?php echo $captcha_admin_role == "1" ? "checked=\"checked\"" : "";?> />
											<label class="wpcb-layout-controls-label">
												<?php _e("Administrator", captcha_bank); ?>
											</label>
										</span>
										<span class="check-bottom">
											<input type="checkbox" id="ux_chk_editor" name="ux_chk_editor" value="1" <?php echo $captcha_editor_role == "1" ? "checked=\"checked\"" : "";?>/>
											<label class="wpcb-layout-controls-label">
												<?php _e("Editor", captcha_bank); ?>
											</label>
										</span>
										<span class="check-bottom">
											<input type="checkbox" id="ux_chk_author" name="ux_chk_author"value="1" <?php echo $captcha_author_role == "1" ? "checked=\"checked\"" : "";?>/>
											<label class="wpcb-layout-controls-label">
												<?php _e("Author", captcha_bank); ?>
											</label>
										</span>
										<span class="check-bottom">
											<input type="checkbox"  id="ux_chk_contributor" name="ux_chk_contributor" value="1" <?php echo $captcha_contributor_role == "1" ? "checked=\"checked\"" : "";?>/>
											<label class="wpcb-layout-controls-label">
												<?php _e("Contributor", captcha_bank); ?>
											</label>
										</span>
										<span class="check-bottom">
											<input type="checkbox"  id="ux_chk_admin_subscriber" name="ux_chk_admin_subscriber" value="1" <?php echo $captcha_subscriber_role == "1" ? "checked=\"checked\"" : "";?>/>
											<label class="wpcb-layout-controls-label">
												<?php _e("Subscriber", captcha_bank); ?>
											</label>
										</span>
									</div>
								</div>
								<div class="layout-control-group">
									<label class="layout-control-label-captcha">
										<?php _e("Captcha Menu Top Bar", captcha_bank); ?> :
										<span class="hovertip" data-original-title ='<?php _e("Allows you to enable or disable WP Captcha Bank for top menu bar among different roles of WordPress users.",captcha_bank) ;?>'>
											<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
										</span>
									</label>
									<div class="layout-controls custom-layout-controls-captcha rdl_captcha">
									<?php
										if($captcha_menu_top_bar == "1")
										{
											?>
											<input type="radio" id="ux_rdl_enable_border" name= "ux_rdl_enable_menu" checked="checked"  value="1" > <?php _e( "Enable", captcha_bank ); ?>
											<input type="radio" style="margin-left:10px;" id="ux_rdl_enable_border" name="ux_rdl_enable_menu" value="0" > <?php _e( "Disable", captcha_bank ); ?>
											<?php
										}
										else
										{
											?>
											<input type="radio" id="ux_rdl_enable_border" name= "ux_rdl_enable_menu"  value="1" > <?php _e( "Enable", captcha_bank ); ?>
											<input type="radio" style="margin-left:10px;" id="ux_rdl_enable_border" checked="checked"  name="ux_rdl_enable_menu" value="0" > <?php _e( "Disable", captcha_bank ); ?>
											<?php
										}
										?>
									</div>
								</div>
								<div class="separator-doubled"></div>
								<input type="submit" value="<?php _e("Save Changes", captcha_bank); ?>" class="btn btn-success" style="float:right; margin-top: 12px;"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script type="text/javascript">
	jQuery(".hovertip").tooltip({placement: "right"});
	jQuery("#frm_wp_plugin_settings").validate
	({
		submitHandler: function(form)
		{
			var overlay_opacity = jQuery("<div class=\"opacity_overlay\"></div>");
			jQuery("body").append(overlay_opacity);
			var overlay = jQuery("<div class=\"loader_opacity\"><div class=\"processing_overlay\"></div></div>");
			jQuery("body").append(overlay)
			jQuery.post(ajaxurl, jQuery("#frm_wp_plugin_settings").serialize()+"&param=captcha_plugin_settings&action=captcha_settings_library&_wpnonce=<?php echo $settings_plugin;?>", function (data)
			{
				jQuery("body,html").animate({scrollTop: jQuery("body,html").position().top}, "slow");
				setTimeout(function () {
					jQuery("#message").css("display", "block");
					jQuery(".loader_opacity").remove();
					jQuery(".opacity_overlay").remove();
				}, 2000);
				setTimeout(function () {
					jQuery("#message").css("display", "none");
					window.location.href = "admin.php?page=wpcb_plugin_settings";
				}, 4000);
			});
		}
	});
	function message_close()
	{
		jQuery("#message").css("display", "none");
	}
	</script>
	<?php 
}
	?>