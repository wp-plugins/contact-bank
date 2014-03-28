<?php
global $wpdb;
$last_form_id = $wpdb->get_var
(
	$wpdb->prepare
	(
		"SELECT form_id FROM " .contact_bank_contact_form(). " order by form_id desc limit 1",
		""
	)
);

?>
<div class="fluid-layout">
	<div class="layout-span12">
		<div class="widget-layout">
			<div class="widget-layout-title">
				<h4>
					<?php _e("Dashboard - Contact Bank", contact_bank); ?>
				</h4>
			</div>
			<div class="widget-layout-body">
				<?php
				$form_count = $wpdb->get_var
				(
					$wpdb->prepare
					(
						"SELECT count(form_id) FROM ".contact_bank_contact_form(),""
					)
				);
				if($form_count < 1)
				{
					?>
						<a class="btn btn-info"
							href="admin.php?page=contact_bank&form_id=<?php echo count($last_form_id) == 0 ? 1 : $last_form_id + 1; ?>"><?php _e("Add New Form", contact_bank); ?>
						</a>
					<?php
				}
				?>
				<a class="btn btn-info" href="#"
					onclick="delete_forms();"><?php _e("Delete All Forms", contact_bank); ?>
				</a>
				<a class="btn btn-danger" href="#"
					onclick="restore_factory_settings();"><?php _e("Restore Factory Settings", contact_bank); ?>
				</a>
				<div class="separator-doubled" style="margin-bottom: 5px;"></div>
				<a rel="prettyPhoto[contact]"  href="<?php echo CONTACT_BK_PLUGIN_URL . "/assets/images/how-to-setup-short-code-cb.png";?>">How to setup Short-Codes for Contact Bank into your WordPress Page/Post?</a>
				<div class="fluid-layout">
					<div class="layout-span12" style="min-height:600px;">
						<div class="widget-layout">
							<div class="widget-layout-title">
								<h4>
									<?php _e("Form", contact_bank); ?>
								</h4>
							</div>
							<div class="widget-layout-body">
								<table class="table table-striped" id="data-table-form">
									<thead>
									<tr>
										<th style="width: 15%"><?php _e("Form", contact_bank); ?></th>
										<th style="width: 30%"><?php _e("Shortcode", contact_bank); ?></th>
										<th style="width: 15%"><?php _e("Total Controls", contact_bank); ?></th>
										<th style="width: 40%" style="padding-left: 5%;"></th>
									</tr>
									</thead>
									<tbody>
									<?php
									global $wpdb;
									$form_data = $wpdb->get_results
									(
										$wpdb->prepare
										(
											"SELECT * FROM " . contact_bank_contact_form(), ""
										)
									);
									for ($flag = 0; $flag < count($form_data); $flag++) 
									{
										$total_control = $wpdb->get_var
										(
											$wpdb->prepare
											(
												" SELECT count(" . contact_bank_contact_form() . ".form_id) FROM " . contact_bank_contact_form() . " JOIN ". create_control_Table() . " ON " . create_control_Table() .".form_id = ".contact_bank_contact_form(). 
												".form_id WHERE " . contact_bank_contact_form() . ".form_id = %d",
												$form_data[$flag]->form_id
											)
										);
										?>
										<tr>
											<td>
												<?php echo $form_data[$flag]->form_name; ?>
											</td>
											<td>
												<?php echo "[contact_bank form_id=" . $form_data[$flag]->form_id . "]"; ?>
											</td>
											<td>
												<?php echo $total_control;?>
											</td>
											<td>
												<a href="admin.php?page=contact_bank&form_id=<?php echo $form_data[$flag]->form_id; ?>"
													class="btn hovertip"
													data-original-title="<?php _e("Edit Form", contact_bank) ?>">
													<i class="icon-pencil"></i>
												</a>
												<a href="admin.php?page=layout_settings&form_id=<?php echo $form_data[$flag]->form_id; ?>"
													class="btn hovertip"
													data-original-title="<?php _e("Global Settings", contact_bank) ?>">
													<i class="icon-wrench"></i>
												</a>
												<a href="admin.php?page=contact_email&form_id=<?php echo $form_data[$flag]->form_id; ?>"
													class="btn hovertip"
													data-original-title="<?php _e("Email Settings", contact_bank) ?>">
													<i class="icon-envelope"></i>
												</a>
												<a href="admin.php?page=frontend_data&form_id=<?php echo $form_data[$flag]->form_id; ?>"
													class="btn hovertip"
													data-original-title="<?php _e("Form Entries", contact_bank) ?>">
													<i class="icon-tasks"></i>
												</a>
												<a href="admin.php?page=form_preview&form_id=<?php echo $form_data[$flag]->form_id; ?>"
													class="btn hovertip"
													data-original-title="<?php _e("Form Preview", contact_bank) ?>">
													<i class="icon-eye-open"></i>
												</a>
												<a herf="#"
													onclick="delete_form(<?php echo $form_data[$flag]->form_id; ?>);"
													class="btn hovertip"
													data-original-title="<?php _e("Delete Form", contact_bank) ?>">
													<i class="icon-trash"></i>
												</a>	
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
	</div>
</div>
<script type="text/javascript">
	jQuery(".hovertip").tooltip();
	jQuery(document).ready(function()
	{
		jQuery("a[rel^=\"prettyPhoto\"]").prettyPhoto
		({
			animation_speed: 1000, 
			slideshow: 4000, 
			autoplay_slideshow: false,
			opacity: 0.80, 
			show_title: false,
			allow_resize: true
		});
	});
	oTable = jQuery("#data-table-form").dataTable
	({
		"bJQueryUI": false,
		"bAutoWidth": true,
		"sPaginationType": "full_numbers",
		"sDom": "<\"datatable-header\"fl>t<\"datatable-footer\"ip>",
		"oLanguage": {
		"sLengthMenu": "<span>Show entries:</span> _MENU_"
		},
		"aaSorting": [
			[ 0, "asc" ]
		],
		"aoColumnDefs": [
			{ "bSortable": false, "aTargets": [2] }
		]
	});
	function delete_form(form_Id) {
		var check_str = confirm("<?php _e( "Are you sure, you want to delete this Form?", contact_bank ); ?>");
		if (check_str == true)
		{
			jQuery.post(ajaxurl, "id=" + form_Id + "&param=delete_form&action=add_contact_form_library", function (data)
			{
				location.reload();
			});
		}
	}
	function delete_forms() {
		var checkstr = confirm("<?php _e( "Are you sure, you want to delete all Forms?", contact_bank ); ?>");
		if (checkstr == true) 
		{
			jQuery.post(ajaxurl, "param=delete_forms&action=add_contact_form_library", function (data) {
			location.reload();
			});
		}
	}
	function restore_factory_settings() {
		alert("<?php _e( "This Feature is only available in Paid Premium Edition!", contact_bank ); ?>");
	}
</script>