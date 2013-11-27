<div class="layout-control-group div_border" id="div_3_1" style="display:none">
	<label class="layout-control-label" id="control_label_3">Untitled : </label>
	<span id="txt_required_3" class="error">*</span>
	<div class="layout-controls hovertip" id="show_tooltip3" data-original-title="" title="">
		<input class="layout-span7" type="text" id="txt_3" name="txt_3">
		<a class="btn btn-info inline" id="add_setting_control_3" href="#setting_controls_postback">Settings</a>
		<a style="cursor:pointer;" onclick="delete_textbox(div_3_1,3)" id="anchor_del_3"> 
			<img src="http://localhost:81/contact-bank3.7/wp-content/plugins/contact-bank/assets/images/delete-bg.png" style="margin-left: 1%;margin-bottom:-9px" onmouseover="img_show(3)" onmouseout="img_hide(3)">
	 	</a>
		<br>
		<span class="span-description" id="txt_description_3"></span>
	</div>
</div>
<button onclick="test();">textbox</button>

<script type="text/javascript">
function test()
{
	var dynamicId = Math.floor((Math.random()*10000)+1);	
	jQuery("#div_3_1").clone().attr('id',dynamicId).insertAfter("#div_3_1");
	jQuery("#"+dynamicId).children('label').attr('id','control_label_'+dynamicId);
	jQuery("#"+dynamicId).attr("style","display:block");
}
</script>