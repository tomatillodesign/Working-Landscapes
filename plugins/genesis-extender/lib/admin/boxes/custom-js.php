<?php
/**
 * Builds the Custom JS admin content.
 *
 * @package Extender
 */
?>

<div id="genesis-extender-custom-options-nav-js-box" class="genesis-extender-optionbox-outer-1col genesis-extender-all-options">
	<div class="genesis-extender-optionbox-inner-1col">
		<h3 style="margin-bottom:15px;"><?php _e( 'Custom Javascript', 'extender' ); ?>
		<span style="color:#777777;">( <?php _e( 'Place In &lt;head&gt;', 'extender' ); ?>
		<input type="checkbox" id="genesis-extender-custom-js-in-head" name="custom_js[custom_js_in_head]" value="1" <?php if( checked( 1, $custom_js['custom_js_in_head'] ) ); ?> /> )</span>
		<a href="http://extenderdocs.cobaltapps.com/article/91-custom-javascript" class="tooltip-mark" target="_blank">[?]</a></h3>

		<p style="margin:0;">
			<textarea wrap="off" id="genesis-extender-custom-js" class="genesis-extender-tabby-textarea" name="custom_js[custom_js]" rows="20"><?php echo stripslashes( esc_textarea( $custom_js['custom_js'] ) ); ?></textarea>
		</p>
	</div>
</div>