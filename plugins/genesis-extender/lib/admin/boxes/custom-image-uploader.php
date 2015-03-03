<?php
/**
 * Builds the Genesis Extender Image Uploader admin content.
 *
 * @package Extender
 */
?>

<?php
global $blog_id;
$genesis_extender_multisite = false;
if( $blog_id > 1 )
{
    $genesis_extender_multisite = $blog_id;
}
?>
<div id="genesis-extender-custom-options-nav-image-uploader-box" class="genesis-extender-optionbox-outer-1col genesis-extender-all-options">
	<div class="genesis-extender-optionbox-inner-1col genesis-extender-uploader-inner-1col" style="border: 1px solid #DFDFDF; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05); box-shadow: 0 1px 2px rgba(0,0,0,.05);">
		<h3 style="border:0;"><?php _e( 'Image Uploader: Images are uploaded to the', 'extender' ); if( $genesis_extender_multisite ) { echo '<code>/wp-content/blogs.dir/' . $genesis_extender_multisite . '/files/genesis-extender/plugin/images/</code>'; } else { echo '<code>/wp-content/uploads/genesis-extender/plugin/images/</code>'; } _e( 'directory.', 'extender' ); ?> <a href="http://extenderdocs.cobaltapps.com/article/157-image-uploader" class="tooltip-mark" target="_blank">[?]</a></h3>
		<div style="width:100%; float:left; padding:10px; border-top:1px solid #F0F0F0; background:#FFFFFF; -webkit-box-sizing:border-box; -moz-box-sizing:border-box; box-sizing:border-box;">
			<div class='placeholder'>
			
				<div class='containercontent'>
					<div class='containercontent-input'>
						<p>
							<form method="post" action="?page=genesis-extender-custom&activetab=genesis-extender-custom-options-nav-image-uploader&fct=upload" enctype="multipart/form-data" >
								<input type="file" name="image" size="60" class="fileinput" ></input>
							<div id="upload-progress" style="display:none" class="uploadprogress">
								<?php _e( 'Please wait, uploading image.', 'extender' ); ?>
							</div>
						</p>
					</div>
			
					<?php if( !empty( $message ) ) { echo $message; } ?>
			
					<div class="buttoncontainer">
						<input type="submit" name="upload" value="Upload Image" class="upload-button button" onClick="displayLoading();"></input>
					</div>
						</form>
				<!--This code displays success and error messages when they occur-->
				</div>

			</div>
			<form method="post" action="?page=genesis-extender-custom&activetab=genesis-extender-custom-options-nav-image-uploader&fct=bulkdelete" onSubmit="return verify()">
			<?php genesis_extender_listimages(); ?>
			<div class="buttoncontainer">
				<p style="margin-left:7px;">
					<input class="upload-button button" type="submit" value="Delete Selected Images" name="action"/>
				</p>
				
				<span onclick="jQuery('input[type=checkbox].image_check').removeAttr('checked')" class="select-all-images button"><?php _e( 'Deselect All', 'extender' ); ?></span>
				<span onclick="jQuery('input[type=checkbox].image_check').attr('checked', 'checked')" class="select-all-images button"><?php _e( 'Select All', 'extender' ); ?></span>				
			</div>
			</form>
		</div>
	</div>
</div>