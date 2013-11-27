<form id="email_form" class="layout-form">
	<div class="fluid-layout" >
		<div class="layout-span12">
			<div class="widget-layout">
				<div class="widget-layout-title">
					<h4><?php _e( "Email Settings", contact_bank ); ?></h4>
				</div>
				<div class="widget-layout-body">
					<a class="btn btn-info" href="admin.php?page=dashboard"><?php _e("Back to Dashboard", contact_bank);?></a>
					<div class="separator-doubled"></div>
					<div id="email_success_message" class="message green" style="display: none;">
						<span>
							<strong><?php _e("Email Settings Saved. Kindly wait for the redirect.", contact_bank); ?></strong>
						</span>
					</div>
					<div class="fluid-layout">
						<div class="layout-control-group">
							<label class="layout-control-label"><?php _e( "Select Form", contact_bank ); ?> :</label>
							<div class="layout-controls">	
								<?php
								global $wpdb;
								$form_data = $wpdb->get_results
								(
									$wpdb->prepare
									(
										"SELECT * FROM " .contact_bank_contact_form(),""
									)
								);
								$admin_data = $wpdb->get_row
								(
									$wpdb->prepare
									(
										"SELECT * FROM " .contact_bank_email_template_admin()." WHERE form_id = %d and type = %d",
										0,
										1
									)
								);
								$client_data = $wpdb->get_row
								(
									$wpdb->prepare
									(
										"SELECT * FROM " .contact_bank_email_template_admin()." WHERE form_id = %d and type = %d",
										0,
										2
									)
								);
								?>
								<select class=" layout-span12" id="select_" name="select_" onchange="select_form();">
									<option value=""><?php _e("Select Form",contact_bank); ?></option>
								<?php
								for($flag=0;$flag<count($form_data);$flag++)
								{
									?>
									<option value="<?php echo $form_data[$flag]->form_id ;?>"><?php echo $form_data[$flag]->form_name ;?></option>
									<?php
								}
								?>
								</select>
							</div>
						</div>
						<div class="fluid-layout">
							<div class="layout-span12">
								<div class="widget-layout">
									<div class="widget-layout-title">
											<h4><?php _e( "Admin Email", contact_bank); ?></h4>
									</div>
									<div class="widget-layout-body">
										<div class="fluid-layout">
											<div class="layout-span9">
												<div class="widget-layout">
													<div class="widget-layout-title">
														<h4><?php _e( "Email", contact_bank ); ?></h4>
													</div>
													<div class="widget-layout-body">
														<div class="layout-control-group">
															<label class="layout-control-label"><?php _e( "To", contact_bank ); ?> :</label>
															<div class="layout-controls">	
																<input type="text" class="layout-span12" id="ux_email_to" name="ux_email_to" value="" placeholder="<?php _e( "Enter Admin Email", contact_bank ); ?>"/>
															</div>
														</div>
														<div class="layout-control-group">
															<label class="layout-control-label"><?php _e( "From", contact_bank ); ?> :</label>
															<div class="layout-controls">	
																<input type="text" class="layout-span12" id="ux_email_from" name="ux_email_from" placeholder="<?php _e( "Enter Email Address", contact_bank ); ?>"/>
															</div>
														</div>
													
														<div class="layout-control-group">
															<label class="layout-control-label"><?php _e( "Subject", contact_bank ); ?> :</label>
															<div class="layout-controls">	
																<input type="text" class="layout-span12" id="ux_email_subject" name="ux_email_subject" placeholder="<?php _e( "Enter Subject", contact_bank ); ?>"/>
															</div>
														</div>
													</div>
												</div>
												<div class="widget-layout">
													<div class="widget-layout-body">
														<div class="fluid-layout">
															<div class="layout-control-group">
																<label class="layout-control-label"><?php _e( "Email Content", contact_bank ); ?> :</label>
																<div class="layout-controls">
																<?php
																	$distribution = "";
																	wp_editor( $distribution, $id = 'uxadminEmailTemplate', array("media_buttons" => true, "textarea_rows" => 8, "tabindex" => 4 ) ); 
																	?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="layout-span3">
												<div class="widget-layout">
													<div class="widget-layout-title">
														<h4><?php _e("Short Code Controls for Email", contact_bank ); ?></h4>
														<span id="admin_controls_content" style="display:none;"></span>
													</div>
													<div class="widget-layout-body" id="form_control_buttons">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="widget-layout">
						<div class="widget-layout-title">
							<h4><?php _e( "Client Email", contact_bank ); ?></h4>
						</div>
						<div class="fluid-layout">
							<div class="layout-span12">
								<div class="widget-layout-body layout-form">
									<div class="fluid-layout">
										<div class="layout-span9">
											<div class="widget-layout">
												<div class="widget-layout-title">
														<h4><?php _e( "Email", contact_bank ); ?></h4>
												</div>
												<div class="widget-layout-body">
													<div class="layout-control-group">
														<label class="layout-control-label"><?php _e( "From", contact_bank ); ?> :</label>
														<div class="layout-controls">	
															<input type="text" class="layout-span12" id="ux_email_from2" name="ux_email_from2" placeholder="<?php _e( "Enter Email Address", contact_bank ); ?>"/>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label"><?php _e( "Subject", contact_bank ); ?> :</label>
														<div class="layout-controls">	
															<input type="text" class="layout-span12" id="ux_email_subject2" name="ux_email_subject2" placeholder="<?php _e( "Enter Subject", contact_bank ); ?>"/>
														</div>
													</div>
												
													</div>
												</div>
												<div class="widget-layout">
													<div class="widget-layout-body">
														<div class="fluid-layout">
															<div class="layout-control-group">
																<label class="layout-control-label"><?php _e( "Email Content", contact_bank ); ?> :</label>
																<div class="layout-controls">	
																		<?php
																			$distribution = "";
																			wp_editor( $distribution, $id = 'uxclientEmailTemplate', array("media_buttons" => true, "textarea_rows" => 8, "tabindex" => 4 ) ); 
																		?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="layout-span3">
												<div class="widget-layout">
													<div class="widget-layout-title">
														<h4><?php _e("Short Code Controls for Email", contact_bank ); ?></h4>
														<span id="client_controls_content" style="display:none;"></span>
													</div>
													<div class="widget-layout-body" id="form_control_client_buttons">
													</div>
												</div>
											</div>
											<div class="widget-layout" style="border-width: 0px 0px 0px 0px;">
												<input class="btn btn-info layout-span1" type="submit" id="submit_button" name="submit_button"  value="<?php _e("Save", contact_bank); ?>" /></td>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<script>
	function select_form()
	{
		
		var form_id = jQuery("#select_").val();
		jQuery.post(ajaxurl, jQuery("#email_form").serialize() +"&form_id="+form_id+"&param=email_admin_controls&action=email_contact_form_library", function(data) 
		{
			
			var dat = data.split("|"); 
			if(dat[0] == "" || dat[0] == undefined)
			{
				<?php $admin_email = get_option( 'admin_email' ); ?>
				jQuery("#ux_email_to").val("<?php echo get_option( 'admin_email' ); ?>");
			}
			else
			{
				jQuery("#ux_email_to").val(dat == undefined ? "" : dat[0]);
			}
			if(dat[1] == "" || dat[1] == undefined)
			{
				<?php $admin_email = get_option( 'admin_email' ); ?>
				jQuery("#ux_email_from").val("<?php echo get_option( 'admin_email' ); ?>");
			}
			else
			{
				jQuery("#ux_email_from").val(dat == undefined ? "" : dat[1]);
			}
			jQuery("#uxadminEmailTemplate").val(dat == undefined ? "" : dat[2]);
			if(dat[2] == "" || dat[2] == undefined)
			{
				tinyMCE.get('uxadminEmailTemplate').setContent("");
			}
			else
			{
				tinyMCE.get('uxadminEmailTemplate').setContent(dat[2]);
			}
			jQuery("#ux_email_subject").val(dat == undefined ? "" : dat[3]);
		});
		jQuery.post(ajaxurl, "form_id="+form_id+"&param=admin_control_buttons&action=email_contact_form_library", function(data) 
		{
			
			jQuery("#form_control_buttons").html(data);
		});
		jQuery.post(ajaxurl, "form_id="+form_id+"&param=client_control_buttons&action=email_contact_form_library", function(data) 
		{
			jQuery("#form_control_client_buttons").html(data);
		});
		jQuery.post(ajaxurl, jQuery("#email_form").serialize() +"&form_id="+form_id+"&param=email_client_controls&action=email_contact_form_library", function(data) 
		{
			var email_client = data.split("|"); 
			if(email_client[1] == "" || email_client[1] == undefined)
			{
				<?php $admin_email = get_option( 'admin_email' ); ?>
				jQuery("#ux_email_from2").val("<?php echo get_option( 'admin_email' ); ?>");
			}
			else
			{
				jQuery("#ux_email_from2").val(email_client == undefined ? "" : email_client[1]);
			}
			jQuery("#ux_email_subject2").val(email_client == undefined ? "" : email_client[3]);
		
			jQuery("#uxclientEmailTemplate").val(email_client == undefined ? "" : email_client[2]);
			if(email_client[2] == "" || email_client[2] == undefined)
			{
				tinyMCE.get('uxclientEmailTemplate').setContent("");
			}
			else
			{
				tinyMCE.get('uxclientEmailTemplate').setContent(email_client[2]);
			}
		});
	}
	jQuery("#email_form").validate
	({
		rules: 
		{
			select_ : 
			{
				required : true,
			},
			ux_email_to : 
			{
				required : true,
				email : true
			},
			ux_email_from : 
			{
				required : true,
				email : true
			},
			ux_email_subject : 
			{
				required : true
				
			},
			ux_email_from2 : 
			{
				required : true,
				email : true
			},
			ux_email_subject2 : 
			{
				required : true
				
			},
			uxadminEmailTemplate : 
			{
				required : true
				
			},
			uxclientEmailTemplate : 
			{
				required : true
			}
		},
		submitHandler: function(form)
		{
			jQuery("#email_success_message").css("display","block");
			jQuery('body,html').animate({
			scrollTop: jQuery('body,html').position().top}, 'slow');
			var form_id = jQuery("#select_").val();
			if (jQuery("#wp-uxadminEmailTemplate-wrap").hasClass("tmce-active"))
			{
				var uxDescription_admin  =  encodeURIComponent(tinyMCE.get('uxadminEmailTemplate').getContent());
			}
			else
			{
				var uxDescription_admin  = encodeURIComponent(jQuery('#uxadminEmailTemplate').val());
				
			}
			if (jQuery("#wp-uxclientEmailTemplate-wrap").hasClass("tmce-active"))
			{
				var uxDescription_client  = encodeURIComponent(tinyMCE.get('uxclientEmailTemplate').getContent());
			}
			else
			{
				var uxDescription_client  = encodeURIComponent(jQuery('#uxclientEmailTemplate').val());
			}
			
			var form_id = jQuery("#select_").val();
			jQuery.post(ajaxurl, jQuery("#email_form").serialize() +"&form_id="+form_id+"&uxDescription_admin="+uxDescription_admin+"&uxDescription_client="+uxDescription_client+"&param=update_email_controls&action=email_contact_form_library", function(data) 
			{
				setTimeout(function()
				{
					jQuery("#email_success_message").css("display","none");
					window.location.href = "admin.php?page=contact_email";
				}, 2000);
			});
		},
	});
	
	function create_control(control_type,dynamicId)
	{
		
		var control_request_type = control_type;
		switch(parseInt(control_request_type))
		{
			case 1:
				if (jQuery("#wp-uxadminEmailTemplate-wrap").hasClass("tmce-active"))
				{
					var uxDescription_admin  =  tinyMCE.get('uxadminEmailTemplate').getContent();
				}
				else
				{
					var uxDescription_admin  = jQuery('#uxadminEmailTemplate').val();
				}
				jQuery('#admin_controls_content').empty();
				jQuery('#admin_controls_content').append(uxDescription_admin);
				jQuery('#admin_controls_content').append(jQuery("#btn_textbox_"+dynamicId).val() +" : [control_"+dynamicId+"]<br />");
				jQuery("#uxadminEmailTemplate").val(jQuery('#admin_controls_content').html());
				tinyMCE.get('uxadminEmailTemplate').setContent(jQuery('#admin_controls_content').html());
			break;
			case 2:
				jQuery('#admin_controls_content').empty();
				if (jQuery("#wp-uxadminEmailTemplate-wrap").hasClass("tmce-active"))
				{
					var uxDescription_admin  =  tinyMCE.get('uxadminEmailTemplate').getContent();
				}
				else
				{
					var uxDescription_admin  = jQuery('#uxadminEmailTemplate').val();
				}
				jQuery('#admin_controls_content').append(uxDescription_admin);
				jQuery('#admin_controls_content').append(jQuery("#btn_textarea_"+dynamicId).val() +" : [control_"+dynamicId+"]<br />");
				jQuery("#uxadminEmailTemplate").val(jQuery('#admin_controls_content').html());
				tinyMCE.get('uxadminEmailTemplate').setContent(jQuery('#admin_controls_content').html());
				
			break;
			case 3:
				jQuery('#admin_controls_content').empty();
				if (jQuery("#wp-uxadminEmailTemplate-wrap").hasClass("tmce-active"))
				{
					var uxDescription_admin  =  tinyMCE.get('uxadminEmailTemplate').getContent();
				}
				else
				{
					var uxDescription_admin  = jQuery('#uxadminEmailTemplate').val();
				}
				jQuery('#admin_controls_content').append(uxDescription_admin);
				jQuery('#admin_controls_content').append(jQuery("#btn_email_"+dynamicId).val() +" : [control_"+dynamicId+"]<br />");
				jQuery("#uxadminEmailTemplate").val(jQuery('#admin_controls_content').html());
				tinyMCE.get('uxadminEmailTemplate').setContent(jQuery('#admin_controls_content').html());
				
			break;
			case 4:
				jQuery('#admin_controls_content').empty();
				if (jQuery("#wp-uxadminEmailTemplate-wrap").hasClass("tmce-active"))
				{
					var uxDescription_admin  =  tinyMCE.get('uxadminEmailTemplate').getContent();
				}
				else
				{
					var uxDescription_admin  = jQuery('#uxadminEmailTemplate').val();
				}
				jQuery('#admin_controls_content').append(uxDescription_admin);
				jQuery('#admin_controls_content').append(jQuery("#btn_dropdown_"+dynamicId).val() +" : [control_"+dynamicId+"]<br />");
				jQuery("#uxadminEmailTemplate").val(jQuery('#admin_controls_content').html());
				tinyMCE.get('uxadminEmailTemplate').setContent(jQuery('#admin_controls_content').html());
				
			break;
			case 5:
				jQuery('#admin_controls_content').empty();
				if (jQuery("#wp-uxadminEmailTemplate-wrap").hasClass("tmce-active"))
				{
					var uxDescription_admin  =  tinyMCE.get('uxadminEmailTemplate').getContent();
				}
				else
				{
					var uxDescription_admin  = jQuery('#uxadminEmailTemplate').val();
				}
				jQuery('#admin_controls_content').append(uxDescription_admin);
				jQuery('#admin_controls_content').append(jQuery("#btn_checkbox_"+dynamicId).val() +" : [control_"+dynamicId+"]<br />");
				jQuery("#uxadminEmailTemplate").val(jQuery('#admin_controls_content').html());
				tinyMCE.get('uxadminEmailTemplate').setContent(jQuery('#admin_controls_content').html());
				
			break;
			case 6:
				jQuery('#admin_controls_content').empty();
				if (jQuery("#wp-uxadminEmailTemplate-wrap").hasClass("tmce-active"))
				{
					var uxDescription_admin  =  tinyMCE.get('uxadminEmailTemplate').getContent();
				}
				else
				{
					var uxDescription_admin  = jQuery('#uxadminEmailTemplate').val();
				}
				jQuery('#admin_controls_content').append(uxDescription_admin);
				jQuery('#admin_controls_content').append(jQuery("#btn_multiple_"+dynamicId).val() +" : [control_"+dynamicId+"]<br />");
				jQuery("#uxadminEmailTemplate").val(jQuery('#admin_controls_content').html());
				tinyMCE.get('uxadminEmailTemplate').setContent(jQuery('#admin_controls_content').html());
				
			break;
			case 9:
				jQuery('#admin_controls_content').empty();
				if (jQuery("#wp-uxadminEmailTemplate-wrap").hasClass("tmce-active"))
				{
					var uxDescription_admin  =  tinyMCE.get('uxadminEmailTemplate').getContent();
				}
				else
				{
					var uxDescription_admin  = jQuery('#uxadminEmailTemplate').val();
				}
				jQuery('#admin_controls_content').append(uxDescription_admin);
				jQuery('#admin_controls_content').append(jQuery("#btn_file_upload_"+dynamicId).val() +" : [control_"+dynamicId+"]<br />");
				jQuery("#uxadminEmailTemplate").val(jQuery('#admin_controls_content').html());
				tinyMCE.get('uxadminEmailTemplate').setContent(jQuery('#admin_controls_content').html());
				
			break;
			case 12:
				jQuery('#admin_controls_content').empty();
				if (jQuery("#wp-uxadminEmailTemplate-wrap").hasClass("tmce-active"))
				{
					var uxDescription_admin  =  tinyMCE.get('uxadminEmailTemplate').getContent();
				}
				else
				{
					var uxDescription_admin  = jQuery('#uxadminEmailTemplate').val();
				}
				jQuery('#admin_controls_content').append(uxDescription_admin);
				jQuery('#admin_controls_content').append(jQuery("#btn_date_"+dynamicId).val() +" : [control_"+dynamicId+"]<br />");
				jQuery("#uxadminEmailTemplate").val(jQuery('#admin_controls_content').html());
				tinyMCE.get('uxadminEmailTemplate').setContent(jQuery('#admin_controls_content').html());
				
			break;
			case 13:
				jQuery('#admin_controls_content').empty();
				if (jQuery("#wp-uxadminEmailTemplate-wrap").hasClass("tmce-active"))
				{
					var uxDescription_admin  =  tinyMCE.get('uxadminEmailTemplate').getContent();
				}
				else
				{
					var uxDescription_admin  = jQuery('#uxadminEmailTemplate').val();
				}
				jQuery('#admin_controls_content').append(uxDescription_admin);
				jQuery('#admin_controls_content').append(jQuery("#btn_time_"+dynamicId).val() +" : [control_"+dynamicId+"]<br />");
				jQuery("#uxadminEmailTemplate").val(jQuery('#admin_controls_content').html());
				tinyMCE.get('uxadminEmailTemplate').setContent(jQuery('#admin_controls_content').html());
				
			break;
			case 14:
				jQuery('#admin_controls_content').empty();
				if (jQuery("#wp-uxadminEmailTemplate-wrap").hasClass("tmce-active"))
				{
					var uxDescription_admin  =  tinyMCE.get('uxadminEmailTemplate').getContent();
				}
				else
				{
					var uxDescription_admin  = jQuery('#uxadminEmailTemplate').val();
				}
				jQuery('#admin_controls_content').append(uxDescription_admin);
				jQuery('#admin_controls_content').append(jQuery("#btn_hidden_"+dynamicId).val() +" : [control_"+dynamicId+"]<br />");
				jQuery("#uxadminEmailTemplate").val(jQuery('#admin_controls_content').html());
				tinyMCE.get('uxadminEmailTemplate').setContent(jQuery('#admin_controls_content').html());
				
			break;
			case 15:
				jQuery('#admin_controls_content').empty();
				if (jQuery("#wp-uxadminEmailTemplate-wrap").hasClass("tmce-active"))
				{
					var uxDescription_admin  =  tinyMCE.get('uxadminEmailTemplate').getContent();
				}
				else
				{
					var uxDescription_admin  = jQuery('#uxadminEmailTemplate').val();
				}
				jQuery('#admin_controls_content').append(uxDescription_admin);
				jQuery('#admin_controls_content').append(jQuery("#btn_Password_"+dynamicId).val() +" : [control_"+dynamicId+"]<br />");
				jQuery("#uxadminEmailTemplate").val(jQuery('#admin_controls_content').html());
				tinyMCE.get('uxadminEmailTemplate').setContent(jQuery('#admin_controls_content').html());
				
			break;
		}
	}
		
		function create_client_control(control_type,dynamicId)
		{
			var control_request_type = control_type;
			
			switch(parseInt(control_request_type))
			{
				case 1:
					if (jQuery("#wp-uxclientEmailTemplate-wrap").hasClass("tmce-active"))
					{
						var uxDescription_client  =  tinyMCE.get('uxclientEmailTemplate').getContent();
					}
					else
					{
						var uxDescription_client  = jQuery('#uxclientEmailTemplate').val();
					}
					jQuery('#client_controls_content').empty();
					jQuery('#client_controls_content').append(uxDescription_client);
					jQuery('#client_controls_content').append(jQuery("#btn_textbox_"+dynamicId).val() +" : [control_client_"+dynamicId+"]<br />");
					jQuery("#uxclientEmailTemplate").val(jQuery('#client_controls_content').html());
					tinyMCE.get('uxclientEmailTemplate').setContent(jQuery('#client_controls_content').html());
					
				break;
				case 2:
					if (jQuery("#wp-uxclientEmailTemplate-wrap").hasClass("tmce-active"))
					{
						var uxDescription_client  =  tinyMCE.get('uxclientEmailTemplate').getContent();
					}
					else
					{
						var uxDescription_client  = jQuery('#uxclientEmailTemplate').val();
					}
					jQuery('#client_controls_content').empty();
					jQuery('#client_controls_content').append(uxDescription_client);
					jQuery('#client_controls_content').append(jQuery("#btn_textarea_"+dynamicId).val() +" : [control_client_"+dynamicId+"]<br />");
					jQuery("#uxclientEmailTemplate").val(jQuery('#client_controls_content').html());
					tinyMCE.get('uxclientEmailTemplate').setContent(jQuery('#client_controls_content').html());
					
				break;
				case 3:
					if (jQuery("#wp-uxclientEmailTemplate-wrap").hasClass("tmce-active"))
					{
						var uxDescription_client  =  tinyMCE.get('uxclientEmailTemplate').getContent();
					}
					else
					{
						var uxDescription_client  = jQuery('#uxclientEmailTemplate').val();
					}
					jQuery('#client_controls_content').empty();
					jQuery('#client_controls_content').append(uxDescription_client);
					jQuery('#client_controls_content').append(jQuery("#btn_email_"+dynamicId).val() +" : [control_client_"+dynamicId+"]<br />");
					jQuery("#uxclientEmailTemplate").val(jQuery('#client_controls_content').html());
					tinyMCE.get('uxclientEmailTemplate').setContent(jQuery('#client_controls_content').html());
					
				break;
				case 4:
					if (jQuery("#wp-uxclientEmailTemplate-wrap").hasClass("tmce-active"))
					{
						var uxDescription_client  =  tinyMCE.get('uxclientEmailTemplate').getContent();
					}
					else
					{
						var uxDescription_client  = jQuery('#uxclientEmailTemplate').val();
					}
					jQuery('#client_controls_content').empty();
					jQuery('#client_controls_content').append(uxDescription_client);
					jQuery('#client_controls_content').append(jQuery("#btn_dropdown_"+dynamicId).val() +" : [control_client_"+dynamicId+"]<br />");
					jQuery("#uxclientEmailTemplate").val(jQuery('#client_controls_content').html());
					tinyMCE.get('uxclientEmailTemplate').setContent(jQuery('#client_controls_content').html());
					
				break;
				case 5:
					if (jQuery("#wp-uxclientEmailTemplate-wrap").hasClass("tmce-active"))
					{
						var uxDescription_client  =  tinyMCE.get('uxclientEmailTemplate').getContent();
					}
					else
					{
						var uxDescription_client  = jQuery('#uxclientEmailTemplate').val();
					}
					jQuery('#client_controls_content').empty();
					jQuery('#client_controls_content').append(uxDescription_client);
					jQuery('#client_controls_content').append(jQuery("#btn_checkbox_"+dynamicId).val() +" : [control_client_"+dynamicId+"]<br />");
					jQuery("#uxclientEmailTemplate").val(jQuery('#client_controls_content').html());
					tinyMCE.get('uxclientEmailTemplate').setContent(jQuery('#client_controls_content').html());
					
				break;
				case 6:
					if (jQuery("#wp-uxclientEmailTemplate-wrap").hasClass("tmce-active"))
					{
						var uxDescription_client  =  tinyMCE.get('uxclientEmailTemplate').getContent();
					}
					else
					{
						var uxDescription_client  = jQuery('#uxclientEmailTemplate').val();
					}
					jQuery('#client_controls_content').empty();
					jQuery('#client_controls_content').append(uxDescription_client);
					jQuery('#client_controls_content').append(jQuery("#btn_multiple_"+dynamicId).val() +" : [control_client_"+dynamicId+"]<br />");
					jQuery("#uxclientEmailTemplate").val(jQuery('#client_controls_content').html());
					tinyMCE.get('uxclientEmailTemplate').setContent(jQuery('#client_controls_content').html());
					
				break;
				case 9:
					if (jQuery("#wp-uxclientEmailTemplate-wrap").hasClass("tmce-active"))
					{
						var uxDescription_client  =  tinyMCE.get('uxclientEmailTemplate').getContent();
					}
					else
					{
						var uxDescription_client  = jQuery('#uxclientEmailTemplate').val();
					}
					jQuery('#client_controls_content').empty();
					jQuery('#client_controls_content').append(uxDescription_client);
					jQuery('#client_controls_content').append(jQuery("#btn_file_upload_"+dynamicId).val() +" : [control_client_"+dynamicId+"]<br />");
					jQuery("#uxclientEmailTemplate").val(jQuery('#client_controls_content').html());
					tinyMCE.get('uxclientEmailTemplate').setContent(jQuery('#client_controls_content').html());
					
				break;
				case 12:
					if (jQuery("#wp-uxclientEmailTemplate-wrap").hasClass("tmce-active"))
					{
						var uxDescription_client  =  tinyMCE.get('uxclientEmailTemplate').getContent();
					}
					else
					{
						var uxDescription_client  = jQuery('#uxclientEmailTemplate').val();
					}
					jQuery('#client_controls_content').empty();
					jQuery('#client_controls_content').append(uxDescription_client);
					jQuery('#client_controls_content').append(jQuery("#btn_date_"+dynamicId).val() +" : [control_client_"+dynamicId+"]<br />");
					jQuery("#uxclientEmailTemplate").val(jQuery('#client_controls_content').html());
					tinyMCE.get('uxclientEmailTemplate').setContent(jQuery('#client_controls_content').html());
					
				break;
				case 13:
					if (jQuery("#wp-uxclientEmailTemplate-wrap").hasClass("tmce-active"))
					{
						var uxDescription_client  =  tinyMCE.get('uxclientEmailTemplate').getContent();
					}
					else
					{
						var uxDescription_client  = jQuery('#uxclientEmailTemplate').val();
					}
					jQuery('#client_controls_content').empty();
					jQuery('#client_controls_content').append(uxDescription_client);
					jQuery('#client_controls_content').append(jQuery("#btn_time_"+dynamicId).val() +" : [control_client_"+dynamicId+"]<br />");
					jQuery("#uxclientEmailTemplate").val(jQuery('#client_controls_content').html());
					tinyMCE.get('uxclientEmailTemplate').setContent(jQuery('#client_controls_content').html());
					
				break;
				case 14:
					if (jQuery("#wp-uxclientEmailTemplate-wrap").hasClass("tmce-active"))
					{
						var uxDescription_client  =  tinyMCE.get('uxclientEmailTemplate').getContent();
					}
					else
					{
						var uxDescription_client  = jQuery('#uxclientEmailTemplate').val();
					}
					jQuery('#client_controls_content').empty();
					jQuery('#client_controls_content').append(uxDescription_client);
					jQuery('#client_controls_content').append(jQuery("#btn_hidden_"+dynamicId).val() +" : [control_client_"+dynamicId+"]<br />");
					jQuery("#uxclientEmailTemplate").val(jQuery('#client_controls_content').html());
					tinyMCE.get('uxclientEmailTemplate').setContent(jQuery('#client_controls_content').html());
					
				break;
				case 15:
					if (jQuery("#wp-uxclientEmailTemplate-wrap").hasClass("tmce-active"))
					{
						var uxDescription_client  =  tinyMCE.get('uxclientEmailTemplate').getContent();
					}
					else
					{
						var uxDescription_client  = jQuery('#uxclientEmailTemplate').val();
					}
					jQuery('#client_controls_content').empty();
					jQuery('#client_controls_content').append(uxDescription_client);
					jQuery('#client_controls_content').append(jQuery("#btn_Password_"+dynamicId).val() +" : [control_client_"+dynamicId+"]<br />");
					jQuery("#uxclientEmailTemplate").val(jQuery('#client_controls_content').html());
					tinyMCE.get('uxclientEmailTemplate').setContent(jQuery('#client_controls_content').html());
					
				break;
			}
		}
</script>