<?php
/**
 * Builds the Custom Functions admin content.
 *
 * @package Extender
 */
?>

<div id="genesis-extender-custom-options-nav-functions-box" class="genesis-extender-optionbox-outer-1col genesis-extender-all-options">
	<div class="genesis-extender-optionbox-inner-1col">
		<h3 style="margin-bottom:15px;"><?php _e( 'Custom Functions', 'extender' ); ?>
		<span style="color:#777777;">( <?php _e( 'Affect Admin', 'extender' ); ?>
		<input type="checkbox" id="genesis-extender-custom-functions-effect-admin" name="custom_functions[custom_functions_effect_admin]" value="1" <?php if( checked( 1, $custom_functions['custom_functions_effect_admin'] ) ); ?> /> )</span>
		<a href="http://extenderdocs.cobaltapps.com/article/90-custom-functions" class="tooltip-mark" target="_blank">[?]</a></h3>

		<p style="margin:0;">
			<textarea wrap="off" id="genesis-extender-custom-functions" class="genesis-extender-tabby-textarea" name="custom_functions[custom_functions]" rows="20"><?php echo stripslashes( esc_textarea( $custom_functions['custom_functions'] ) ); ?></textarea>
		</p>
	</div>
</div>