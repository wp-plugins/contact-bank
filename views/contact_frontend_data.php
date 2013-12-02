<div class="fluid-layout">
	<div class="layout-span12">
		<div class="widget-layout">
			<div class="widget-layout-title">
				<h4><?php _e( "Form Entries", contact_bank ); ?></h4>
			</div>
			<div class="widget-layout-body layout-form">
				<a class="btn btn-info" href="admin.php?page=dashboard"><?php _e("Back to Dashboard", contact_bank);?></a>
				<div class="separator-doubled"></div>
				<div class="fluid-layout">
					<div class="layout-span12">
						<div class="widget-layout">
							<div class="widget-layout-title">
								<h4><?php _e( "Form", contact_bank ); ?></h4>
							</div>
							<div class="widget-layout-body" >
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
											?>
											<select class=" layout-span12" id="select_form" name="select_form" onchange="select_form_id();">
												<option value="0"><?php _e("Select Form",contact_bank); ?></option>
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
								</div>
								<div id="ux_frontend_data_postback"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function select_form_id()
{
	var form_id = jQuery("#select_form").val();
	if(form_id != 0)
	{
		jQuery.post(ajaxurl, "form_id="+form_id+"&param=frontend_form_data&action=frontend_data_contact_library", function(data)
		{
			jQuery("#ux_frontend_data_postback").empty();
			jQuery("#ux_frontend_data_postback").append(data);
		});
	}
	else
	{
		jQuery("#ux_frontend_data_postback").empty();
	}
}
</script>