<?php
/**
 * Builds the Custom PHP Builder admin content.
 *
 * @package Extender
 */
?>

<div style="display:none;" id="genesis-extender-custom-php-builder" class="genesis-extender-optionbox-outer-1col">
	<div class="genesis-extender-optionbox-inner-1col">
		<h3 style="width:804px; border-bottom:0;"><?php _e( 'Custom PHP Builder', 'extender' ); ?> <a href="http://extenderdocs.cobaltapps.com/article/98-custom-php-builder" class="tooltip-mark" target="_blank">[?]</a></h3>

		<div id="genesis-extender-custom-php-builder-wrap">
		<form name="form">
			<div id="genesis-extender-custom-php-builder-wrap-inner" class="bg-box">
				<div id="genesis-extender-custom-php-builder-options">
					<p>
						<select id="php_action_or_filter" name="php_action_or_filter" size="1" class="iewide" style="width:125px;">
							<option value="add_action"><?php _e( 'add_action', 'extender' ); ?></option>
							<option value="remove_action"><?php _e( 'remove_action', 'extender' ); ?></option>
							<option value="replace_action"><?php _e( '"replace"_action', 'extender' ); ?></option>
							<option value="add_filter"><?php _e( 'add_filter', 'extender' ); ?></option>
						</select>
						<span id="php_actions_wrap" class="php-builder-hidden-option">
						<?php _e( 'Actions', 'extender' ); ?>
						<select id="php_actions" class="php-builder-elements-select" name="php_actions" size="1">
						<?php genesis_extender_build_php_actions_menu(); ?>
						</select>
						</span>
						<span id="php_filters_wrap" class="php-builder-hidden-option">
						<?php _e( 'Filters', 'extender' ); ?>
						<select id="php_filters" class="php-builder-elements-select" name="php_filters" size="1">
						<?php genesis_extender_build_php_filters_menu(); ?>
						</select>
						</span>
						<span id="custom_function_name_wrap" class="php-builder-hidden-option">
						<input type="text" class="forbid-chars default-text" id="custom_function_name" name="custom_function_name" value="" title="<?php _e( 'Your Custom Function Name', 'extender' ); ?>" style="width:200px;" />
						</span>
						<input id="build_add_action_php" class="custom-php-builder-button button" type="button" value="Build Actions" onclick="insertAtCaret(this.form.text, 'add_action'+this.form.php_actions.value+'\n')">
						<input id="build_remove_action_php" class="custom-php-builder-button button" style="display:none;" type="button" value="Build Actions" onclick="insertAtCaret(this.form.text, 'remove_action'+this.form.php_actions.value+'\n')">
						<input id="build_replace_action_php" class="custom-php-builder-button button" style="display:none;" type="button" value="Build Actions" onclick="insertAtCaret(this.form.text, 'remove_action'+this.form.php_actions.value+'\nadd_action( \''+this.form.php_actions.value.match(/'(.*?)'/)[1]+'\', \''+this.form.custom_function_name.value+'\' );\nfunction '+this.form.custom_function_name.value+'() {\n\t// YOUR PHP CODE GOES HERE\n}\n')">
						<input id="build_add_filter_php" class="custom-php-builder-button button" style="display:none;" type="button" value="Build Filters" onclick="insertAtCaret(this.form.text, 'add_filter( \''+this.form.php_filters.value+'\', \''+this.form.custom_function_name.value+'\' );\nfunction '+this.form.custom_function_name.value+'() {\n\t// YOUR PHP CODE GOES HERE\n}\n')">
					</p>
					<p style="width:48%; margin-top:0; float:left;">
						<select id="wa_shortcodes" class="php-builder-elements-select" name="wa_shortcodes" size="1" style="width:150px;">
						<?php genesis_extender_list_wa_shortcode_options(); ?>
						</select>
						<input id="build_defined_wa_shortcode_php" class="button" type="button" value="Create Widget Area Shortcode" onclick="insertAtCaret(this.form.text, '['+this.form.wa_shortcodes.value+']\n')">
					</p>
					<p style="width:46%; margin-top:0; float:right;">
						<select id="hb_shortcodes" class="php-builder-elements-select" name="hb_shortcodes" size="1" style="width:150px;">
						<?php genesis_extender_list_hb_shortcode_options(); ?>
						</select>
						<input id="build_defined_hb_shortcode_php" class="button" type="button" value="Create Hook Box Shortcode" onclick="insertAtCaret(this.form.text, '['+this.form.hb_shortcodes.value+']\n')">
					</p>
					<p style="width:48%; margin-top:0; float:left;">
						<?php _e( 'Layouts', 'extender' ); ?>
						<select id="forced_layouts" class="php-builder-elements-select" name="forced_layouts" size="1">
						<?php genesis_extender_list_forced_layout_options(); ?>
						</select>
						<input id="build_forced_layout_php" class="button" type="button" value="Insert Forced Layout" onclick="insertAtCaret(this.form.text, this.form.forced_layouts.value+'\n')">
					</p>
					<p style="width:48%; margin-top:0; float:right;">
						<input id="wrap_in_php_tags" class="button" type="button" value="&#60;?php Wrap Code ?&#62;">
						<input id="build_new_line_php" class="button" type="button" value="\n" title="New Line" onclick="insertAtCaret(this.form.text, '\n')">
						<input id="build_genesis_php" class="button" type="button" value="Insert genesis() Function" onclick="insertAtCaret(this.form.text, 'genesis();\n')">
					</p>
				</div>

				<div id="php-builder-output-wrap">
					<textarea wrap="off" id="php-builder-output" class="genesis-extender-tabby-textarea" name="text"></textarea>
					<input id="php-builder-output-highlight" class="button" type="button" value="Click To Highlight Custom PHP For Copy/Paste">
				</div>
			</div>
		</form>
		</div>
	</div>
</div>