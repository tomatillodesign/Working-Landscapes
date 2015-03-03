<?php
/**
 * Builds the Custom CSS admin content.
 *
 * @package Extender
 */
?>

<div id="genesis-extender-custom-options-nav-css-box" class="genesis-extender-optionbox-outer-1col genesis-extender-all-options genesis-extender-options-display">
	<div class="genesis-extender-optionbox-inner-1col">
		<h3 style="margin-bottom:15px;"><?php _e( 'Custom CSS', 'extender' ); ?>
		<span style="color:#777777;">( <?php _e( 'Activate Front-end CSS Builder', 'extender' ); ?>
		<input type="checkbox" id="genesis-extender-css-builder-popup-active" name="extender[css_builder_popup_active]" value="1" <?php if( checked( 1, genesis_extender_get_custom_css( 'css_builder_popup_active' ) ) ); ?> />
		<span id="genesis-extender-css-builder-popup-editor-only-wrap"<?php if( !genesis_extender_get_custom_css( 'css_builder_popup_active' ) ) { echo 'style="display:none;"'; } ?>><?php _e( 'Editor Only', 'extender' ); ?>
		<input type="checkbox" id="genesis-extender-css-builder-popup-editor-only" name="extender[css_builder_popup_editor_only]" value="1" <?php if( checked( 1, genesis_extender_get_custom_css( 'css_builder_popup_editor_only' ) ) ); ?> /></span> )</span>
		<a href="http://extenderdocs.cobaltapps.com/article/89-custom-css" class="tooltip-mark" target="_blank">[?]</a></h3>
		
		<div style="display:none;" id="css-builder-click-to-view">
			<a href="<?php echo home_url(); ?>" target="_blank"><?php _e( 'Click To View Front-end', 'extender' ); ?></a>
		</div>
		
		<div id="genesis-extender-custom-css-admin-p" class="genesis-extender-custom-option">
			<p style="margin:0;">
				<textarea wrap="off" id="genesis-extender-custom-css" class="genesis-extender-tabby-textarea" name="extender[custom_css]" rows="20"><?php echo esc_textarea( genesis_extender_get_custom_css( 'custom_css' ) ); ?></textarea>
			</p>
		</div>
	</div>
</div>