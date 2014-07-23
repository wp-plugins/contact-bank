<?php
$show_banner = get_option("contact-bank-banner");
if($show_banner == "")
{
 	echo'<div id="ux_buy_pro" class="updated">
     <div class="gb_buy_pro">
      <div class="gb_text_control">
       It\'s time to upgrade your <strong>Contact Bank Standard Edition</strong> to <strong>Premium</strong> Edition!<br />
       <span>Extend standard plugin functionality with 200+ awesome features! <br/>Go for Premium Version Now! Starting at <strong>11£/- only</strong></span>
      </div>
      <a class="button gb_message_buttons" href="admin.php?page=pro_version&msg=no">CLOSE</a>
      <a class="button gb_message_buttons" target="_blank" href="http://wordpress.org/support/view/plugin-reviews/contact-bank?filter=5">RATE US 5 ★</a>
      <a class="button gb_message_buttons" target="_blank" href="http://tech-banker.com/contact-bank/demo/">LIVE DEMO</a>
      <a class="button gb_message_buttons" target="_blank" href="http://tech-banker.com/contact-bank/">UPGRADE NOW</a>
     </div>
    </div>';
	
}
$cb_lang = array();
$cb_lang_translated_languages = array();
array_push($cb_lang_translated_languages,"fr_FR","ru_RU","en_US","es_ES", "nl_NL","hu_HU","de_DE", "pt_BR","pt_PT","he_IL", "tr","it_IT", "da_DK", "pl_PL", "sv_SE", "zh_CN","cs_CZ","en_GB", "sk_SK");

array_push($cb_lang, "ar", "bg_BG", "fi_FI", "id_ID", "ja", "ko_KR", "ms_MY", "ro_RO", "sl_SI", "sq_AL", "sr_RS", "th");
$cb_language = get_locale();
?>
<script>
jQuery(document).ready(function()
{
	jQuery(".nav-tab-wrapper > a#<?php echo $_REQUEST["page"];?>").addClass("nav-tab-active");
});
</script>
<img style="margin: 10px;" src="<?php echo CONTACT_BK_PLUGIN_URL .'/assets/images/cb-logo.png';?>"/>
<?php
switch ($role) {
	case "administrator":
		?>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab " id="dashboard" href="admin.php?page=dashboard">Dashboard</a>
			<a class="nav-tab " id="short_code" href="admin.php?page=short_code">Short-Codes</a>
			<a class="nav-tab " id="frontend_data" href="admin.php?page=frontend_data">Form Entries</a>
			<a class="nav-tab " id="contact_email" href="admin.php?page=contact_email">Email Settings</a>
			<a class="nav-tab " id="layout_settings" href="admin.php?page=layout_settings">Global Settings</a>
			<a class="nav-tab " id="system_status" href="admin.php?page=system_status">System Status</a>
			<a class="nav-tab " id="pro_version" href="admin.php?page=pro_version">Purchase Pro Version</a>
		</h2>
		<?php
	break;
	case "editor":
		?>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab " id="dashboard" href="admin.php?page=dashboard">Dashboard</a>
			<a class="nav-tab " id="short_code" href="admin.php?page=short_code">Short-Codes</a>
			<a class="nav-tab " id="frontend_data" href="admin.php?page=frontend_data">Form Entries</a>
			<a class="nav-tab " id="contact_email" href="admin.php?page=contact_email">Email Settings</a>
			<a class="nav-tab " id="layout_settings" href="admin.php?page=layout_settings">Global Settings</a>
			<a class="nav-tab " id="system_status" href="admin.php?page=system_status">System Status</a>
			<a class="nav-tab " id="pro_version" href="admin.php?page=pro_version">Purchase Pro Version</a>
		</h2>
		<?php
	break;
	case "author":
		?>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab " id="dashboard" href="admin.php?page=dashboard">Dashboard</a>
			<a class="nav-tab " id="short_code" href="admin.php?page=short_code">Short-Codes</a>
			<a class="nav-tab " id="frontend_data" href="admin.php?page=frontend_data">Form Entries</a>
			<a class="nav-tab " id="contact_email" href="admin.php?page=contact_email">Email Settings</a>
			<a class="nav-tab " id="layout_settings" href="admin.php?page=layout_settings">Global Settings</a>
			<a class="nav-tab " id="pro_version" href="admin.php?page=pro_version">Purchase Pro Version</a>
		</h2>
		<?php
	break;
	case "contributor":
		?>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab " id="dashboard" href="admin.php?page=dashboard">Dashboard</a>
			<a class="nav-tab " id="short_code" href="admin.php?page=short_code">Short-Codes</a>
			<a class="nav-tab " id="frontend_data" href="admin.php?page=frontend_data">Form Entries</a>
			<a class="nav-tab " id="contact_email" href="admin.php?page=contact_email">Email Settings</a>
			<a class="nav-tab " id="layout_settings" href="admin.php?page=layout_settings">Global Settings</a>
			<a class="nav-tab " id="pro_version" href="admin.php?page=pro_version">Purchase Pro Version</a>
		</h2>
		<?php
	break;
}
if(in_array($cb_language, $cb_lang))
{
	?>
	<div class="message red" style="display: block;margin-top:10px">
		<span style="padding: 4px 0;">
			<strong><p style="font:12px/1.0em Arial !important;">This plugin language is translated with the help of Google Translator.</p>
				<p style="font:12px/1.0em Arial !important;">If you would like to translate & help us, we will reward you with a free Pro Edition License of Contact Bank worth 18£.</p>
				<p style="font:12px/1.0em Arial !important;">Contact Us at <a target="_blank" href="http://tech-banker.com">http://tech-banker.com</a> or email us at <a href="mailto:support@tech-banker.com">support@tech-banker.com</a></p>
			</strong>
		</span>
	</div>
	<?php
}
elseif(!(in_array($cb_language, $cb_lang_translated_languages)) && !(in_array($cb_language, $cb_lang)) && $cb_language != "")
{
	?>
	<div class="message red" style="display: block;margin-top:10px">
		<span style="padding: 4px 0;">
			<strong><p style="font:12px/1.0em Arial !important;">If you would like to translate Contact Bank in your native language, we will reward you with a free Pro Edition License of Contact Bank worth 18£.</p>
				<p style="font:12px/1.0em Arial !important;">Contact Us at <a target="_blank" href="http://tech-banker.com">http://tech-banker.com</a> or email us at <a href="mailto:support@tech-banker.com">support@tech-banker.com</a></p>
			</strong>
		</span>
	</div>
	<?php	
}
?>

<div class="message red" style="display: block;margin-top:10px">
 <span>
  <strong>You will be only allowed to add 1 Form. Kindly purchase Premium Edition for full access.</strong>
 </span>
</div>