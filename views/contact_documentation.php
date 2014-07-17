<?php
global $wpdb,$current_user,$cb_user_role_permission;
$cb_role = $wpdb->prefix . "capabilities";
$current_user->role = array_keys($current_user->$cb_role);
$cb_role = $current_user->role[0];
switch($cb_role)
{
	case "administrator":
		$cb_user_role_permission = "manage_options";
		break;
	case "editor":
		$cb_user_role_permission = "publish_pages";
		break;
	case "author":
		$cb_user_role_permission = "publish_posts";
		break;
	case "contributor":
		$cb_user_role_permission = "edit_posts";
		break;
	case "subscriber":
		$cb_user_role_permission = "read";
		break;
}
if (!current_user_can($cb_user_role_permission))
{
	return;
}
else
{ 

?>
<div class="fluid-layout" >
	<div class="layout-span12">
		<div class="widget-layout">
			<div class="widget-layout-title">
				<h4><?php _e( "Documentation - Contact Bank", contact_bank ); ?></h4>
			</div>
			<div class="widget-layout-body">
				<iframe width="560" height="315" src="//www.youtube.com/embed/EcqbsXmPbaI" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
<?php 
}
?>