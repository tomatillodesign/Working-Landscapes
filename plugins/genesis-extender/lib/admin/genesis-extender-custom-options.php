<?php
/**
 * Builds the Custom Options admin page.
 *
 * @package Extender
 */
 
/**
 * Build the Genesis Extender Custom Options admin page.
 *
 * @since 1.0
 */
function genesis_extender_custom_options()
{
	global $message;
	$custom_functions = get_option( 'genesis_extender_custom_functions' );
	$custom_js = get_option( 'genesis_extender_custom_js' );
	$custom_templates = genesis_extender_get_templates();
	$custom_labels = genesis_extender_get_labels();
	$custom_conditionals = genesis_extender_get_conditionals();
	$custom_widgets = genesis_extender_get_widgets();
	$custom_hooks = genesis_extender_get_hooks();
?>
	<div class="wrap">
		
		<div id="genesis-extender-custom-saved" class="genesis-extender-update-box"></div>

		<?php
		if( !empty( $_POST['action'] ) && $_POST['action'] == 'reset' )
		{
			genesis_extender_reset_delete_template();
			update_option( 'genesis_extender_custom_css', genesis_extender_custom_css_options_defaults() );
			update_option( 'genesis_extender_custom_functions', genesis_extender_custom_functions_options_defaults() );
			update_option( 'genesis_extender_custom_js', genesis_extender_custom_js_options_defaults() );
			update_option( 'genesis_extender_custom_templates', array() );
			update_option( 'genesis_extender_custom_labels', array() );
			update_option( 'genesis_extender_custom_conditionals', array() );
			update_option( 'genesis_extender_custom_widget_areas', array() );
			update_option( 'genesis_extender_custom_hook_boxes', array() );

			genesis_extender_get_custom_css( null, $args = array( 'cached' => false, 'array' => false ) );
			$custom_functions = get_option( 'genesis_extender_custom_functions' );
			$custom_js = get_option( 'genesis_extender_custom_js' );
			$custom_templates = genesis_extender_get_templates();
			$custom_labels = genesis_extender_get_labels();
			$custom_conditionals = genesis_extender_get_conditionals();
			$custom_widgets = genesis_extender_get_widgets();
			$custom_hooks = genesis_extender_get_hooks();

			genesis_extender_write_files( $css = true, $ez = false );
		?>
			<script type="text/javascript">jQuery(document).ready(function($){ $('#genesis-extender-custom-saved').html('Custom Options Reset').css("position", "fixed").fadeIn('slow');window.setTimeout(function(){$('#genesis-extender-custom-saved').fadeOut( 'slow' );}, 2222); });</script>
		<?php
		}

		if( !empty( $_GET['activetab'] ) )
		{ ?>
			<script type="text/javascript">jQuery(document).ready(function($) { $('#<?php echo $_GET['activetab']; ?>').click(); });</script>	
		<?php
		} ?>
		
		<div id="icon-options-general" class="icon32"></div>
		
		<h2 id="genesis-extender-admin-heading"><?php _e( 'Extender - Custom Options', 'extender' ); ?></h2>
		
		<div class="genesis-extender-css-builder-button-wrap">
			<span id="show-hide-custom-css-builder" class="button"><?php _e( 'CSS Builder', 'extender' ); ?></span>
		</div>

		<div class="genesis-extender-php-builder-button-wrap">
			<span id="show-hide-custom-php-builder" class="button"><?php _e( 'PHP Builder', 'extender' ); ?></span>
		</div>
		
		<div id="genesis-extender-admin-wrap">
		
			<?php require_once( GENEXT_PATH . 'lib/admin/boxes/custom-css-builder.php' ); ?>
			<?php require_once( GENEXT_PATH . 'lib/admin/boxes/custom-php-builder.php' ); ?>
			
			<form action="/" id="custom-options-form" name="custom-options-form">
			
				<input type="hidden" name="action" value="genesis_extender_custom_options_save" />
				<input type="hidden" name="security" value="<?php echo wp_create_nonce( 'custom-options' ); ?>" />
			
				<div id="genesis-extender-floating-save">
					<img id="ajax-save-no-throb" src="<?php echo GENEXT_URL . 'lib/css/images/no-throb.png'; ?>" style="margin-bottom:11px;" /><img id="ajax-save-throbber" src="<?php echo GENEXT_URL . 'lib/css/images/throbber.gif'; ?>" width="16" height="16" style="display:none;margin-bottom:11px;" /><input type="image" src="<?php echo GENEXT_URL . 'lib/css/images/save-changes-x2.png'; ?>" value="<?php _e( 'Save Changes', 'extender' ); ?>" class="genesis-extender-save-button" name="Submit" alt="Save Changes" />
				</div>
					
				<div id="genesis-extender-custom-options-nav" class="genesis-extender-admin-nav">
					<ul>
						<li id="genesis-extender-custom-options-nav-css" class="genesis-extender-options-nav-all genesis-extender-options-nav-active"><a href="#">CSS</a></li><li id="genesis-extender-custom-options-nav-functions" class="genesis-extender-options-nav-all"><a href="#">Functions</a></li><li id="genesis-extender-custom-options-nav-js" class="genesis-extender-options-nav-all"><a href="#">JS</a></li><li id="genesis-extender-custom-options-nav-templates" class="genesis-extender-options-nav-all"><a href="#">Templates</a></li><li id="genesis-extender-custom-options-nav-labels" class="genesis-extender-options-nav-all"><a href="#">Labels</a></li><li id="genesis-extender-custom-options-nav-conditionals" class="genesis-extender-options-nav-all"><a href="#">Conditionals</a></li><li id="genesis-extender-custom-options-nav-widget-areas" class="genesis-extender-options-nav-all"><a href="#">Widget Areas</a></li><li id="genesis-extender-custom-options-nav-hook-boxes" class="genesis-extender-options-nav-all"><a href="#">Hook Boxes</a></li><li id="genesis-extender-custom-options-nav-image-uploader" class="genesis-extender-options-nav-all"><a class="genesis-extender-options-nav-last" href="#">Images</a></li>
					</ul>
				</div>
				
				<div class="genesis-extender-custom-options-wrap">
					<?php require_once( GENEXT_PATH . 'lib/admin/boxes/custom-css.php' ); ?>
					<?php require_once( GENEXT_PATH . 'lib/admin/boxes/custom-functions.php' ); ?>
					<?php require_once( GENEXT_PATH . 'lib/admin/boxes/custom-js.php' ); ?>
					<?php require_once( GENEXT_PATH . 'lib/admin/boxes/custom-templates.php' ); ?>
					<?php require_once( GENEXT_PATH . 'lib/admin/boxes/custom-labels.php' ); ?>
					<?php require_once( GENEXT_PATH . 'lib/admin/boxes/custom-conditionals.php' ); ?>
					<?php require_once( GENEXT_PATH . 'lib/admin/boxes/custom-widget-areas.php' ); ?>
					<?php require_once( GENEXT_PATH . 'lib/admin/boxes/custom-hook-boxes.php' ); ?>
				</div>
			
			</form>

			<?php require_once( GENEXT_PATH . 'lib/admin/boxes/custom-image-uploader.php' ); ?>

			<div id="genesis-extender-admin-footer">
				<p>
					<a href="http://cobaltapps.com" target="_blank">CobaltApps.com</a> | <a href="http://extenderdocs.cobaltapps.com/" target="_blank">Docs</a> | <a href="http://cobaltapps.com/my-account/" target="_blank">My Account</a> | <a href="http://cobaltapps.com/forum/" target="_blank">Community Forum</a> | <a href="http://cobaltapps.com/affiliates/" target="_blank">Affiliates</a> &middot;
					<a><span id="show-options-reset" class="genesis-extender-custom-fonts-button button" style="margin:0; float:none !important;"><?php _e( 'Custom Options Reset', 'extender' ); ?></span></a><a href="http://extenderdocs.cobaltapps.com/article/156-custom-options-reset" class="tooltip-mark" target="_blank">[?]</a>
				</p>
			</div>
			
			<div style="display:none; width:160px; border:none; background:none; margin:0 auto; padding:0; float:none; position:inherit;" id="show-options-reset-box" class="genesis-extender-custom-fonts-box">
				<form style="float:left;" id="genesis-extender-reset-custom-options" method="post">
					<input style="background:#D54E21; width:160px !important; color:#FFFFFF !important; -webkit-box-shadow:none; box-shadow:none;" type="submit" value="<?php _e( 'Reset Custom Options', 'extender' ); ?>" class="genesis-extender-reset button" name="Submit" onClick='return confirm("<?php _e( 'Are you sure your want to reset your Genesis Extender Custom Options?', 'extender' ); ?>")'/><input type="hidden" name="action" value="reset" />
				</form>
			</div>
		</div>
	</div> <!-- Close Wrap -->

	<script type="text/javascript">
		function editor(id)
		{
			var atts = {
				lineNumbers: true,
				matchBrackets: true,
				autoCloseBrackets: true,
				mode: "text/x-php",
				indentUnit: 4,
				indentWithTabs: true,
				enterMode: "keep",
				tabMode: "shift"
			};
		    CodeMirror.fromTextArea(id, atts).setSize(null, 400);
		}
		editor(document.getElementById("genesis-extender-custom-css"));
		editor(document.getElementById("genesis-extender-custom-functions"));
		editor(document.getElementById("genesis-extender-custom-js"));
	</script>
<?php
}

add_action( 'wp_ajax_genesis_extender_custom_options_save', 'genesis_extender_custom_options_save' );
/**
 * Use ajax to update the Custom Options based on the posted values.
 *
 * @since 1.0
 */
function genesis_extender_custom_options_save()
{
	check_ajax_referer( 'custom-options', 'security' );
	
	if( !empty( $_POST['extender']['css_builder_popup_active'] ) || genesis_extender_get_custom_css( 'css_builder_popup_active' ) )
		$custom_css = genesis_extender_preserve_backslashes( genesis_extender_get_custom_css( 'custom_css' ) );
	else
		$custom_css = $_POST['extender']['custom_css'];

	$css_update = array(
		'custom_css' => $custom_css,
		'css_builder_popup_active' => !empty( $_POST['extender']['css_builder_popup_active'] ) ? 1 : 0,
		'css_builder_popup_editor_only' => !empty( $_POST['extender']['css_builder_popup_editor_only'] ) ? 1 : 0
	);
	$css_update_merged = array_merge( genesis_extender_custom_css_options_defaults(), $css_update );
	update_option( 'genesis_extender_custom_css', $css_update_merged );
	
	$functions_default = '<?php
/* Do not remove this line. Add your functions below. */
';
	
	if( !empty( $_POST['custom_functions'] ) )
	{
		$functions_update = array(
			'custom_functions_effect_admin' => !empty( $_POST['custom_functions']['custom_functions_effect_admin'] ) ? 1 : 0,
			'custom_functions' => ( $_POST['custom_functions']['custom_functions'] != '' ) ? $_POST['custom_functions']['custom_functions'] : $functions_default
		);
		$functions_update_merged = array_merge( genesis_extender_custom_functions_options_defaults(), $functions_update );
		update_option( 'genesis_extender_custom_functions', $functions_update_merged );
	}

	if( !empty( $_POST['custom_js'] ) )
	{
		$js_update = array(
			'custom_js_in_head' => !empty( $_POST['custom_js']['custom_js_in_head'] ) ? 1 : 0,
			'custom_js' => $_POST['custom_js']['custom_js']
		);
		$js_update_merged = array_merge( genesis_extender_custom_js_options_defaults(), $js_update );
		update_option( 'genesis_extender_custom_js', $js_update_merged );
	}

	if( !empty( $_POST['custom_template_ids'] ) )
	{
		$template_ids_empty = true;
		foreach( $_POST['custom_template_ids'] as $key )
		{
			if( !empty( $key ) )
			{
				$template_ids_empty = false;
			}
		}
		foreach( $_POST['custom_template_ids'] as $key )
		{
			if( empty( $key ) && !$template_ids_empty )
			{
				echo 'Please fill in ALL "File Name" fields';
				exit();
			}
		}
		genesis_extender_update_templates( $_POST['custom_template_ids'], $_POST['custom_template_names'], $_POST['custom_template_types'], $_POST['custom_template_textarea'] );
	}

	if( !empty( $_POST['custom_label_names'] ) )
	{
		$label_names_empty = true;
		foreach( $_POST['custom_label_names'] as $key )
		{
			if( !empty( $key ) )
			{
				$label_names_empty = false;
			}
		}
		foreach( $_POST['custom_label_names'] as $key )
		{
			if( empty( $key ) && !$label_names_empty )
			{
				echo 'Please fill in ALL "Name" fields';
				exit();
			}
		}
		genesis_extender_update_labels( $_POST['custom_label_names'] );

		if( !empty( $_POST['custom_label_create_conditionals'] ) )
		{
			$custom_conditional_ids = array();
			$custom_conditional_tags = array();
			foreach( $_POST['custom_label_create_conditionals'] as $key => $value )
			{
				$custom_conditional_ids[] = 'has_label_' . str_replace( '-', '_', genesis_extender_sanatize_string( $_POST['custom_label_names'][$key] ) );
				$custom_conditional_tags[] = 'extender_has_label(\'' . genesis_extender_sanatize_string( $_POST['custom_label_names'][$key] ) . '\')';
			}
			genesis_extender_update_conditionals( $custom_conditional_ids, $custom_conditional_tags );
		}
	}
	
	if( !empty( $_POST['custom_widget_conditionals_list'] ) )
	{
		$custom_widget_conditionals_list = $_POST['custom_widget_conditionals_list'];
	}
	else
	{
		$custom_widget_conditionals_list = array();
	}
	
	if( !empty( $_POST['custom_hook_conditionals_list'] ) )
	{
		$custom_hook_conditionals_list = $_POST['custom_hook_conditionals_list'];
	}
	else
	{
		$custom_hook_conditionals_list = array();
	}
	
	if( !empty( $_POST['custom_conditional_ids'] ) )
	{
		$conditional_ids_empty = true;
		foreach( $_POST['custom_conditional_ids'] as $key )
		{
			if( !empty( $key ) )
			{
				$conditional_ids_empty = false;
			}
		}
		foreach( $_POST['custom_conditional_ids'] as $key )
		{
			if( empty( $key ) && !$conditional_ids_empty )
			{
				echo 'Please fill in ALL "Name" fields';
				exit();
			}
		}
		genesis_extender_update_conditionals( $_POST['custom_conditional_ids'], $_POST['custom_conditional_tags'] );
	}
	if( !empty( $_POST['custom_widget_ids'] ) )
	{
		$widget_ids_empty = true;
		foreach( $_POST['custom_widget_ids'] as $key )
		{
			if( !empty( $key ) )
			{
				$widget_ids_empty = false;
			}
		}
		foreach( $_POST['custom_widget_ids'] as $key )
		{
			if( empty( $key ) && !$widget_ids_empty )
			{
				echo 'Please fill in ALL "Name" fields';
				exit();
			}
		}
		genesis_extender_update_widgets( $_POST['custom_widget_ids'], $custom_widget_conditionals_list, $_POST['custom_widget_hook'], $_POST['custom_widget_class'], $_POST['custom_widget_description'], $_POST['custom_widget_status'], $_POST['custom_widget_priority'] );
	}
	if( !empty( $_POST['custom_hook_ids'] ) )
	{
		$hook_ids_empty = true;
		foreach( $_POST['custom_hook_ids'] as $key )
		{
			if( !empty( $key ) )
			{
				$hook_ids_empty = false;
			}
		}
		foreach( $_POST['custom_hook_ids'] as $key )
		{
			if( empty( $key ) && !$hook_ids_empty )
			{
				echo 'Please fill in ALL "Name" fields';
				exit();
			}
		}
		genesis_extender_update_hooks( $_POST['custom_hook_ids'], $custom_hook_conditionals_list, $_POST['custom_hook_hook'], $_POST['custom_hook_status'], $_POST['custom_hook_priority'], $_POST['custom_hook_textarea'] );
	}
	
	genesis_extender_write_files( $css = true, $ez = false );
	
	echo 'Custom Options Updated';
	exit();
}

/**
 * Create an array of Custom CSS Options default values.
 *
 * @since 1.0
 * @return an array of Custom CSS Options default values.
 */
function genesis_extender_custom_css_options_defaults()
{	
	$defaults = array(
		'custom_css' => '',
		'css_builder_popup_active' => 0,
		'css_builder_popup_editor_only' => 0
	);
	
	return apply_filters( 'genesis_extender_custom_css_options_defaults', $defaults );
}

/**
 * Create an array of Custom Functions Options default values.
 *
 * @since 1.0
 * @return an array of Custom Functions Options default values.
 */
function genesis_extender_custom_functions_options_defaults()
{	
	$defaults = array(
		'custom_functions_effect_admin' => 0,
		'custom_functions' => '<?php' . "\n" . '/* Do not remove this line. Add your functions below. */' . "\n"
	);
	
	return apply_filters( 'genesis_extender_custom_functions_options_defaults', $defaults );
}

/**
 * Create an array of Custom JS Options default values.
 *
 * @since 1.2
 * @return an array of Custom JS Options default values.
 */
function genesis_extender_custom_js_options_defaults()
{	
	$defaults = array(
		'custom_js_in_head' => 0,
		'custom_js' => ''
	);
	
	return apply_filters( 'genesis_extender_custom_js_options_defaults', $defaults );
}
