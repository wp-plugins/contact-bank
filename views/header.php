<?php
$cb_lang = array();
array_push($cb_lang, "ar", "bg_BG", "da_DK", "de_DE", "es_ES", "fi_FI", "fr_FR", "he_IL", "hu_HU", "id_ID",
 "it_IT", "ja", "ko_KR", "ms_MY", "nl_NL", "pl_PL", "pt_BR", "pt_PT", "ro_RO", "ru_RU", "sk_SK", "sl_SI", "sq_AL",
 "sr_RS", "sv_SE", "th", "tr", "zh_CN");
$cb_language = get_locale();
?>

<img style="margin: 10px;" src="<?php echo CONTACT_BK_PLUGIN_URL .'/assets/images/cb-logo.png';?>"/>
<a target="_blank" href="http://tech-banker.com/contact-bank/">
<img style="float: right;margin: 7px 11px;" src="<?php echo CONTACT_BK_PLUGIN_URL .'/assets/images/banner.png';?>"/></a>
<?php
if(in_array($cb_language, $cb_lang))
{
 ?>
 <div class="message red" style="display: block;margin-top:10px">
  <span style="padding: 4px 0;">
   <strong><p style="font:12px/1.0em Arial !important;">This plugin language is translated with the help of Google Translator.</p>
    <p style="font:12px/1.0em Arial !important;">If you would like to translate & help us, we will reward you with a free Pro Version License of Contact Bank worth 16£.</p>
    <p style="font:12px/1.0em Arial !important;">Contact Us at <a target="_blank" href="http://tech-banker.com">http://tech-banker.com</a> or email us at <a href="mailto:support@tech-banker.com">support@tech-banker.com</a></p>
   </strong>
  </span>
 </div>
 <?php
}
?>
<div class="message red" style="display: block;margin-top:10px">
 <span>
  <strong>You will be only allowed to add 1 Form. Kindly purchase Premium Version for full access.</strong>
 </span>
</div>