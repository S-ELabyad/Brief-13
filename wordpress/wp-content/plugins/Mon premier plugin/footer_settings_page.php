<?php
if(!defined('ABSPATH'))
{
    exit;
}
global $chk;
if(isset($_POST['wphw_submit'])){
    wphw_opt();
}
function wphw_opt(){
    $hellotxt = $_POST['footertextname'];
    global $chk;
    if( get_option('footer_text') != trim($hellotxt)){
        $chk =update_option( 'footer_text', trim($hellotxt));
    }
}
?>

<div class="wrap">
<div id="icon-options-general" class="icon32"><br>
</div>
<h2>Footer Settings</h2>
<?php if(isset($_POST['wphw_submit']) && $chk) : ?>
<div id="message" class="updated below-h2">
 <p>Content updated successfully</p>
</div>
<?php endif; ?>
<div class="metabox-holder">
<div class="postbox">
<h3><strong>Enter footer link and click on save button .</strong></h3>
<form method="POST" action="">
<table class="form-table">
<tr>
<th scope="row">Footer Text</th>
<td><input type="text" name="footertextname" 
 value="<?php echo get_option('footer_text'); ?>" style="width:350px;" /> </td>
</tr>
<tr>

<tr>
<th scope="row">&nbsp;</th>
<td style="padding-top:10px; padding-bottom:10px;">
<input type="submit" name="wphw_submit" value="Save changes" class="button-primary" />
</td>
</tr>

</table>
</form>
</div>
</div>
 
</div>