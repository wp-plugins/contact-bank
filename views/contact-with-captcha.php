<?php
if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
{
	include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
}

//this add captcha on Contact Bank Form
if ( ! function_exists( "captcha_with_contact_bank_form" ) )
{
	function captcha_with_contact_bank_form()
	{
		global $wpdb;
		if(file_exists(WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php"))
		{
			include WP_CAPTCHA_BK_PLUGIN_DIR . "/lib/get-settings.php";
		}
		$captcha_url = admin_url("admin-ajax.php"). "?captcha_code=";
		?>
		<label style="display:block;"><?php echo $captcha_title;?></label>
		<?php
			if($show_border == "1")
			{
				?>
				<img src="<?php echo $captcha_url . rand(111,99999);?>" class="captcha_code_img"  id="captcha_code_img" title="<?php echo $captcha_tooltip;?>" style= "margin-top:10px; cursor:pointer; border:<?php echo $border_size?>px solid <?php echo $border_color?>" />
				<?php
			}
			else
			{
				?>
				<img src="<?php echo $captcha_url . rand(111,99999);?>" class="captcha_code_img"  id="captcha_code_img" title="<?php echo $captcha_tooltip;?>" style= "margin-top:10px; cursor:pointer;" />
				<?php
			}
		?>
		<img style= "vertical-align: top !important; margin-top:9px; cursor:pointer;" onclick="refresh(); " alt="Reload Image" height="25" width="25" src="<?php echo plugins_url("/assets/images/refresh-icon.png",dirname(__FILE__))?>"/>
		<script type="text/javascript">
			function refresh()
			{
				var randNum = Math.floor((Math.random() * 99999) + 1);
				jQuery("#captcha_code_img").attr("src","<?php echo $captcha_url; ?>"+randNum);
				return true;
			}
	</script>
		<?php
	}
}
?>
