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
	$block_ip = wp_create_nonce( "login_logs_block_ip" );
	$alternate="";
	$logs = $wpdb->get_results
	(
		"SELECT * FROM " . captcha_bank_log() ." order by date_time desc"
	);
	?>
	<div id="message" class="top-right message" style="display: none;">
		<div class="message-notification"></div>
		<div class="message-notification ui-corner-all growl-success" >
			<div onclick="message_close();" id="close-message" class="message-close">x</div>
			<div class="message-header"><?php _e("Success!",  captcha_bank); ?></div>
			<div class="message-message"><?php _e("Action has been updated ",  captcha_bank); ?></div>
		</div>
	</div>
	<div class="fluid-layout wpcb-page-width">
		<div class="layout-span12">
			<div class="widget-layout">
				<div class="widget-layout-title">
					<h4><?php _e("Login Logs", captcha_bank); ?></h4>
				</div>
				<div class="widget-layout-body">
					<div class="fluid-layout wpcb-page-width">
						<div class="layout-span12">
							<div class="widget-layout">
								<div class="widget-layout-title">
									<h4>
										<?php _e("Recent Login Details on World Map", captcha_bank); ?>
									</h4>
								</div>
								<div class="widget-layout-body">
									<input type="hidden" id="geocomplete" name="geocomplete" class="layout-span12" value=""/>
									<input type="hidden" id="lat" class="layout-span12" onblur="codeLatLng();" name="lat" value=""/>
									<input type="hidden" id="lng" class="layout-span12" onblur="codeLatLng();" name="lng" value=""/>
									<script type="text/javascript">
										var bentley = [{"featureType":"landscape","stylers":[{"hue":"#F1FF00"},{"saturation":-27.4},{"lightness":9.4},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#0099FF"},{"saturation":-20},{"lightness":36.4},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#00FF4F"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FFB300"},{"saturation":-38},{"lightness":11.2},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00B6FF"},{"saturation":4.2},{"lightness":-63.4},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#9FFF00"},{"saturation":0},{"lightness":0},{"gamma":1}]}];
										var manage_location_array = [];
										var geocoder;
										var map;
										var map_theme = bentley;
										function initialize() 
										{
											geocoder = new google.maps.Geocoder();
											var latitude = jQuery("#lat").val() == "" ? "10.434753083771703" : jQuery("#lat").val(); 
											var longitude= jQuery("#lng").val() == "" ? "12.412856439147959" : jQuery("#lng").val(); 
											var latlng = new google.maps.LatLng(latitude, longitude);
											var mapOptions = 
											{
												scrollwheel: true,
												zoomControl: true, 
												zoom:2,
												center: latlng,
												styles : map_theme,
												mapTypeId: google.maps.MapTypeId.ROADMAP
											}
											map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
											<?php 
											for($flag_markers = 0; $flag_markers < count($logs); $flag_markers++ ) 
											{
											?>
												var position = new google.maps.LatLng("<?php echo $logs[$flag_markers]->latitude;?>", "<?php echo $logs[$flag_markers]->longitude;?>");
												marker = new google.maps.Marker(
												{
													position: position,
													map: map,
													draggable:false,
													animation: google.maps.Animation.DROP,
												});
											<?php
											}
											?>
										}
									</script>
									<div id="map_canvas" style="width: 930px; height: 300px; border:4px solid #000000; margin-top:10px;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="widget-layout">
						<div class="widget-layout-title">
							<h4><?php _e( "Recent Login Details", captcha_bank ); ?></h4>
						</div>
						<div class="widget-layout-body">
							<table class="widefat" style="background-color:#ffffff; margin-top:10px;" id="data-table-logs">
								<thead>
									<tr>
										<th style="width:10%">
											<?php _e( "Username", captcha_bank ); ?>
											<span class="hovertip" data-original-title ='<?php _e("Allows you to view the username of recent logged in users.",captcha_bank) ;?>'>
												<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
											</span>
										</th>
										<th style="width:14%">
											<?php _e( "IP Address", captcha_bank ); ?>
											<span class="hovertip" data-original-title ='<?php _e("Allows you to view the IP Address of the logged in users.",captcha_bank) ;?>'>
												<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
											</span>
										</th>
										<th style="width:13%">
											<?php _e( "Location", captcha_bank ); ?>
											<span class="hovertip" data-original-title ='<?php _e("Allows you to view the current location of the logged in users.",captcha_bank) ;?>'>
												<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
											</span>
										</th>
										<th style="width:16%">
											<?php _e( "Login Date & Time", captcha_bank ); ?>
											<span class="hovertip" data-original-title ='<?php _e("Allows you to view the logged in date and time of the users.",captcha_bank) ;?>'>
												<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
											</span>
										</th>
										<th style="width:10%; text-align: center;">
											<?php _e( "Status", captcha_bank ); ?>
											<span class="hovertip" data-original-title ='<?php _e("Lets, you know the status of the users, whether they have successfully logged in or not.",captcha_bank) ;?>'>
												<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
											</span>
										</th>
										<th style="width:14%;">
											<?php _e( "Action", captcha_bank ); ?>
											<span class="hovertip" data-original-title ='<?php _e("Allows you to block or whitelist IP Addresses for the logged in users as per your requirement.",captcha_bank) ;?>'>
												<img class="tooltip_img" src="<?php echo plugins_url("/assets/images/questionmark_icon.png",dirname(__FILE__))?>"/>
											</span>
										</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									for($flag=0; $flag<count($logs); $flag++)
									{
										$alternate= (empty($alternate)) ? "class='alternate'" : "";
										?>
										<tr <?php echo $alternate; ?>>
											<td>
												<?php echo $logs[$flag]->username; ?>
											</td>
											<td>
												<?php echo $logs[$flag]->ip_address; ?>
											</td>
											<td>
												<?php echo $logs[$flag]->geo_location; ?>
											</td>
											<td>
												<?php echo date_format(date_create($logs[$flag]->date_time),"d M, Y g:i A e "); ?>
											</td>
											<td style="text-align: center !important">
												<?php 
												if($logs[$flag]->captcha_status == 1)
												{
													?>
													<span class="log_success"><?php _e( "Success", captcha_bank ); ?></span>
													<?php 
												} 
												else
												{
													?>
													<span class="log_Failed"><?php _e( "Failed", captcha_bank ); ?></span>
													<?php
												}
												?>
											</td>
											<td>
												<?php 
												if($logs[$flag]->block_ip == "1")
												{
													?>
													<a href="#" style="color:#0d1ff6;"  onclick="block_ip(<?php echo $logs[$flag]->id; ?>,0);"><?php _e("Whitelist IP Address", captcha_bank); ?></a>
													<?php 
												}
												else 
												{
													?>
													<a href="#" style="color:#0d1ff6;" onclick="block_ip(<?php echo $logs[$flag]->id; ?>,1);"><?php _e("Block IP Address", captcha_bank); ?></a>
													<?php 
												}
												?>
											</td>
										</tr>
										<?php
									}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	jQuery(".hovertip").tooltip({placement: "right"});
	jQuery(document).ready(function()
	{
		var oTable = jQuery("#data-table-logs").dataTable
		({
			"bJQueryUI": false,
			"bAutoWidth": true,
			"sPaginationType": "full_numbers",
			"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
			"oLanguage": 
			{
				"sLengthMenu": "<span>Show entries:</span> _MENU_"
			},
			"aaSorting": [[ 5, "desc" ]]
		});
		initialize();
	});
	function block_ip(ip_id,block)
	{
		var overlay_opacity = jQuery("<div class=\"opacity_overlay\"></div>");
		jQuery("body").append(overlay_opacity);
		var overlay = jQuery("<div class=\"loader_opacity\"><div class=\"processing_overlay\"></div></div>");
		jQuery("body").append(overlay);
		jQuery("#captcha_bank_message").css("display", "block");
		
		jQuery.post(ajaxurl,"&block="+block+"&ip_id="+ip_id+"&param=block_ip_address&action=captcha_settings_library&_wpnonce=<?php echo $block_ip;?>", function(data)
		{
			setTimeout(function () {
				jQuery("#message").css("display", "block");
				jQuery(".loader_opacity").remove();
				jQuery(".opacity_overlay").remove();
			}, 2000);
			setTimeout(function () {
				jQuery("#message").css("display", "none");
				window.location.href = "admin.php?page=wpcb_login_logs";
			}, 4000)
		});
	}
	function message_close()
	{
		jQuery("#message").css("display", "none");
	}
</script>
<?php 
}
?>