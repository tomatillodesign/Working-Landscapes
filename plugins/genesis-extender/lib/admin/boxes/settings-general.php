<?php
/**
 * Builds the Genesis Extender General Settings admin content.
 *
 * @package Extender
 */
?>

<div id="genesis-extender-settings-nav-general-box" class="genesis-extender-all-options">
	<h3 style="margin-bottom:15px; float:left;"><?php _e( 'General Settings', 'extender' ); ?></h3>

	<div class="genesis-extender-optionbox-2col-left-wrap">

		<div class="genesis-extender-optionbox-outer-2col">
			<div class="genesis-extender-optionbox-inner-2col">
				<h4><?php _e( 'Static Homepage', 'extender' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="genesis-extender-static-homepage" name="extender[static_homepage]" value="1" <?php if( checked( 1, genesis_extender_get_settings( 'static_homepage' ) ) ); ?> /> <?php _e( 'Activate the Genesis Extender Static Homepage', 'extender' ); ?>
						<a href="http://extenderdocs.cobaltapps.com/article/76-activate-the-genesis-extender-static-homepage" class="tooltip-mark" target="_blank">[?]</a>
					</p>

					<p style="display:none;" class="genesis-extender-static-homepage-box">
						<?php _e( 'Select An EZ Home Widget Area Structure:', 'extender' ); ?>
						<a href="http://extenderdocs.cobaltapps.com/article/77-select-an-ez-home-widget-area-structure" class="tooltip-mark" target="_blank">[?]</a>
					</p>

					<p style="display:none;" class="genesis-extender-static-homepage-box">
						<select id="genesis-extender-ez-homepage-select" name="extender[ez_homepage_select]" size="1" style="width:250px;">
							<?php genesis_extender_list_ez_home_structure_options( genesis_extender_get_settings( 'ez_homepage_select' ) ); ?>
						</select> <a href="http://extenderdocs.cobaltapps.com/article/78-ez-home-structure-reference-examples" class="tooltip-mark" target="_blank">[<?php _e( 'Examples', 'extender' ); ?>]</a>
					</p>
					
					<p style="display:none;" class="genesis-extender-static-homepage-box">
						<strong><?php _e( 'Static Homepage Type:', 'extender' ); ?></strong>
						<label><?php _e( 'Full Page', 'extender' ); ?></label> <input id="genesis-extender-static-homepage-full" class="genesis-extender-static-homepage-type" type="radio" name="extender[static_homepage_type]" value="full" <?php if( genesis_extender_get_settings( 'static_homepage_type' ) == 'full' ) echo 'checked="checked" '; ?>/>
						<label><?php _e( 'Content Column', 'extender' ); ?></label> <input id="genesis-extender-static-homepage-content" class="genesis-extender-static-homepage-type" type="radio" name="extender[static_homepage_type]" value="content" <?php if( genesis_extender_get_settings( 'static_homepage_type' ) == 'content' ) echo 'checked="checked" '; ?>/>
						<a href="http://extenderdocs.cobaltapps.com/article/79-ez-static-homepage-type" class="tooltip-mark" target="_blank">[?]</a>
					</p>

					<p style="display:none;" id="genesis-extender-static-homepage-content-box">
						<?php _e( 'Static Homepage Layout:', 'extender' ); ?> <select id="genesis-extender-static-homepage-content-layout" name="extender[static_homepage_content_layout]" size="1" style="width:180px;">
							<option value="content_sidebar"<?php if( genesis_extender_get_settings( 'static_homepage_content_layout' ) == 'content_sidebar' ) echo ' selected="selected"'; ?>><?php _e( 'Content-Sidebar', 'extender' ); ?></option>
							<option value="sidebar_content"<?php if( genesis_extender_get_settings( 'static_homepage_content_layout' ) == 'sidebar_content' ) echo ' selected="selected"'; ?>><?php _e( 'Sidebar-Content', 'extender' ); ?></option>
							<option value="content_sidebar_sidebar"<?php if( genesis_extender_get_settings( 'static_homepage_content_layout' ) == 'content_sidebar_sidebar' ) echo ' selected="selected"'; ?>><?php _e( 'Content-Sidebar-Sidebar', 'extender' ); ?></option>
							<option value="sidebar_sidebar_content"<?php if( genesis_extender_get_settings( 'static_homepage_content_layout' ) == 'sidebar_sidebar_content' ) echo ' selected="selected"'; ?>><?php _e( 'Sidebar-Sidebar-Content', 'extender' ); ?></option>
							<option value="sidebar_content_sidebar"<?php if( genesis_extender_get_settings( 'static_homepage_content_layout' ) == 'sidebar_content_sidebar' ) echo ' selected="selected"'; ?>><?php _e( 'Sidebar-Content-Sidebar', 'extender' ); ?></option>
							<option value="full_width_content"<?php if( genesis_extender_get_settings( 'static_homepage_content_layout' ) == 'full-width-content' ) echo ' selected="selected"'; ?>><?php _e( 'Full Width Content', 'extender' ); ?></option>
						</select> <a href="http://extenderdocs.cobaltapps.com/article/99-ez-static-homepage-layout" class="tooltip-mark" target="_blank">[?]</a>
					</p>

					<p style="display:none;" class="genesis-extender-static-homepage-box">
						<input type="checkbox" id="genesis-extender-static-homepage-entry-class" name="extender[static_homepage_entry_class]" value="1" <?php if( checked( 1, genesis_extender_get_settings( 'static_homepage_entry_class' ) ) ); ?> /> <?php _e( 'Add the ".entry" class to the EZ Home Container Wrap div', 'extender' ); ?>
						<a href="http://extenderdocs.cobaltapps.com/article/128-add-the-entry-class-to-the-ez-home-container-wrap-div" class="tooltip-mark" target="_blank">[?]</a>
					</p>
				</div>
			</div>
		</div>

		<div class="genesis-extender-optionbox-outer-2col">
			<div class="genesis-extender-optionbox-inner-2col">
				<h4><?php _e( 'Google Font Control', 'extender' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<?php _e( 'Add Google Fonts:', 'extender' ); ?>
						<a href="http://www.google.com/fonts/" class="tooltip-mark" target="_blank">[http://www.google.com/fonts/]</a>
						<span id="show-add-google-fonts" class="genesis-extender-custom-fonts-button button" style="float:none !important;">Google Fonts</span><a href="http://extenderdocs.cobaltapps.com/article/106-add-google-fonts" class="tooltip-mark" target="_blank">[?]</a>
						<div style="display:none; margin:0;" id="show-add-google-fonts-box" class="genesis-extender-custom-fonts-box">
							<p style="padding:5px 0;">
								<input type="text" id="google-font-shortcode-creator" class="default-text" value="" title="Link Code goes here..." style="width:135px;" />
								<span id="google-fonts-create-sans-serif" class="google-fonts-create button" style="float:none !important;">sans-serif</span><span id="google-fonts-create-serif" class="google-fonts-create button" style="float:none !important;">serif</span><span id="google-fonts-create-cursive" class="google-fonts-create button" style="float:none !important;">cursive</span>
							</p>
							<textarea id="genesis-extender-add-google-fonts" name="extender[add_google_fonts]" style="width:100%;" rows="10"><?php echo genesis_extender_get_settings( 'add_google_fonts' ); ?></textarea>
						</div>
					</p>
				</div>
			</div>
		</div>
		
		<div class="genesis-extender-optionbox-outer-2col">
			<div class="genesis-extender-optionbox-inner-2col">
				<h4><?php _e( 'Page Titles', 'extender' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="genesis-extender-remove-all-page-titles" name="extender[remove_all_page_titles]" value="1" <?php if( checked( 1, genesis_extender_get_settings( 'remove_all_page_titles' ) ) ); ?> /> <?php _e( 'Remove All Page Titles', 'extender' ); ?>
						<a href="http://extenderdocs.cobaltapps.com/article/80-remove-page-titles" class="tooltip-mark" target="_blank">[?]</a>
					</p>
					
					<p style="display:none;" id="genesis-extender-remove-all-page-titles-box">
						<?php _e( 'Remove Specific Page Titles By IDs: (ie. 2,17 etc.)', 'extender' ); ?> <span id="content-page-ids" class="tooltip-mark">[IDs]</span><br />
						<input type="text" id="genesis-extender-remove-page-titles-ids" name="extender[remove_page_titles_ids]" value="<?php echo genesis_extender_get_settings( 'remove_page_titles_ids' )?>" style="width:100%;" />
					</p>
					
					<div id="content-page-ids-box" style="display:none;">
						<h5 style="margin-bottom:-10px;"><?php _e( 'Page ID Reference:', 'extender' ); ?></h5>
						<p class="page-cat-id-scrollbox">
							<?php $pages = get_pages('orderby=ID&hide_empty=0');
							echo '<strong>Page IDs/Names</strong><br />'; 
								foreach($pages as $page) { 
									echo $page->ID . ' = ' . $page->post_name . '<br />'; 
								} ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="genesis-extender-optionbox-outer-2col">
			<div class="genesis-extender-optionbox-inner-2col">
				<h4><?php _e( 'Custom Post Types', 'extender' ); ?></h4>
				
				<div class="bg-box">
					<p>
						<input type="checkbox" id="genesis-extender-include-inpost-cpt-all" name="extender[include_inpost_cpt_all]" value="1" <?php if( checked( 1, genesis_extender_get_settings( 'include_inpost_cpt_all' ) ) ); ?> /> <?php _e( 'Include Theme In-Post Options With All Custom Post Types', 'extender' ); ?>
						<a href="http://extenderdocs.cobaltapps.com/article/81-include-theme-in-post-options-with-all-custom-post-types" class="tooltip-mark" target="_blank">[?]</a>
					</p>

					<div style="display:none;" id="genesis-extender-include-inpost-cpt-all-box">
						<p>
							<?php _e( 'Include Theme In-Post Options With Specific Custom Post Types', 'extender' ); ?>
							<a href="http://extenderdocs.cobaltapps.com/article/82-include-theme-in-post-options-with-specific-custom-post-types" class="tooltip-mark" target="_blank">[?]</a>
						</p>
					
						<p>
							<?php _e( 'Add Custom Post Type Names Below: (ie. products,recipes etc.)', 'extender' ); ?> <span id="custom-post-type-names" class="tooltip-mark">[Names]</span><br />
							<input type="text" id="genesis-extender-include-inpost-cpt-names" name="extender[include_inpost_cpt_names]" value="<?php echo genesis_extender_get_settings( 'include_inpost_cpt_names' )?>" style="width:100%;" />
						</p>
						
						<div id="custom-post-type-names-box" style="display:none;">
							<h5 style="margin-bottom:-10px;"><?php _e( 'Custom Post Type Name Reference', 'extender' ); ?></h5>
							<p class="page-cat-id-scrollbox">
							<?php
							$args=array(
								'public'   => true,
								'_builtin' => false
							);
							$output = 'names';
							$operator = 'and';
							$post_types = get_post_types( $args, $output, $operator ); 
							echo '<strong>Custom Post Type Names:</strong><br />'; 
							foreach( $post_types as $post_type )
							{
								echo '- ' . $post_type . '<br />';
							} ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="genesis-extender-optionbox-outer-2col">
			<div class="genesis-extender-optionbox-inner-2col">
				<h4><?php _e( 'WordPress Post Formats', 'extender' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="genesis-extender-post-formats-active" name="extender[post_formats_active]" value="1" <?php if( checked( 1, genesis_extender_get_settings( 'post_formats_active' ) ) ); ?> /> <?php _e( 'Activate WordPress Post Formats', 'extender' ); ?>
						<a href="http://extenderdocs.cobaltapps.com/article/83-activate-wordpress-post-formats" class="tooltip-mark" target="_blank">[?]</a>
					</p>
				</div>
			</div>
		</div>

		<div class="genesis-extender-optionbox-outer-2col">
			<div class="genesis-extender-optionbox-inner-2col">
				<h4><?php _e( 'Stylesheet Options', 'extender' ); ?></h4>
				
				<div class="bg-box">
					<p>
						<input type="checkbox" id="genesis-extender-include-column-class-styles" name="extender[include_column_class_styles]" value="1" <?php if( checked( 1, genesis_extender_get_settings( 'include_column_class_styles' ) ) ); ?> /> <?php _e( 'Include Genesis "Column Classes" with the Default Stylesheet', 'extender' ); ?>
						<a href="http://extenderdocs.cobaltapps.com/article/84-include-genesis-column-classes-with-the-default-stylesheet" class="tooltip-mark" target="_blank">[?]</a>
					</p>

					<p>
						<input type="checkbox" id="genesis-extender-minify-stylesheets" name="extender[minify_stylesheets]" value="1" <?php if( checked( 1, genesis_extender_get_settings( 'minify_stylesheets' ) ) ); ?> /> <?php _e( 'Combine & Minify The Default & Custom Stylesheets', 'extender' ); ?>
						<a href="http://extenderdocs.cobaltapps.com/article/85-combine-minify-the-default-custom-stylesheets" class="tooltip-mark" target="_blank">[?]</a>
					</p>
				</div>
			</div>
		</div>

		<div class="genesis-extender-optionbox-outer-2col">
			<div class="genesis-extender-optionbox-inner-2col">
				<h4><?php _e( 'Font Awesome Styles', 'extender' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="genesis-extender-font-awesome-css" name="extender[font_awesome_css]" value="1" <?php if( checked( 1, genesis_extender_get_settings( 'font_awesome_css' ) ) ); ?> /> <?php _e( 'Add Support For Font Awesome Icons', 'extender' ); ?>
						<a href="http://extenderdocs.cobaltapps.com/article/184-add-support-for-font-awesome-icons" class="tooltip-mark" target="_blank">[?]</a> | <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><span style="font-style:underline;"><?php _e( 'Click here to view available icons', 'dynamik' ); ?></a> 
					</p>
				</div>
			</div>
		</div>
		
	</div>
	<div class="genesis-extender-optionbox-2col-right-wrap">
		
		<div class="genesis-extender-optionbox-outer-2col">
			<div class="genesis-extender-optionbox-inner-2col">
				<h4><?php _e( 'Custom Thumbnail Sizes', 'extender' ); ?> <a href="http://extenderdocs.cobaltapps.com/article/86-custom-thumbnail-sizes" class="tooltip-mark" target="_blank">[?]</a></h4>
					
				<div class="bg-box">
					<p>
						<strong><?php _e( 'Please Note The Following For Proper Use:', 'extender' ); ?></strong>
					</p>
					<p>
						<?php _e( '- The "Mode" value must be set for the Custom Thumbnail to work.', 'extender' ); ?>
					</p>
					
					<p>
						<?php _e( '- custom-thumb-1 must be set in order for thumb-2 through 5 to work.', 'extender' ); ?>
					</p>
				</div>
				<div class="bg-box">
					<p>
						<strong><?php _e( 'custom-thumb-1', 'extender' ); ?></strong>
					</p>
					<p>
						<?php _e( 'Mode', 'extender' ); ?>
						<select id="genesis-extender-custom-image-size-one-mode" name="extender[custom_image_size_one_mode]" size="1" style="width:70px;">
							<option value="">&nbsp;</option>
							<option value="resize"<?php if( genesis_extender_get_settings( 'custom_image_size_one_mode' ) == 'resize' ) echo ' selected="selected"'; ?>><?php _e( 'Resize', 'extender' ); ?></option>
							<option value="crop"<?php if( genesis_extender_get_settings( 'custom_image_size_one_mode' ) == 'crop' ) echo ' selected="selected"'; ?>><?php _e( 'Crop', 'extender' ); ?></option>
						</select>
						<?php _e( 'Width', 'extender' ); ?> <input type="text" id="genesis-extender-custom-image-size-one-width" name="extender[custom_image_size_one_width]" value="<?php echo genesis_extender_get_settings( 'custom_image_size_one_width' ) ?>" style="width:50px;" /><?php _e( 'px', 'extender' ); ?> | 
						<?php _e( 'Height', 'extender' ); ?> <input type="text" id="genesis-extender-custom-image-size-one-height" name="extender[custom_image_size_one_height]" value="<?php echo genesis_extender_get_settings( 'custom_image_size_one_height' ) ?>" style="width:50px;" /><?php _e( 'px', 'extender' ); ?>
					</p>
				</div>
				<div class="bg-box">
					<p>
						<strong><?php _e( 'custom-thumb-2', 'extender' ); ?></strong>
					</p>
					<p>
						<?php _e( 'Mode', 'extender' ); ?>
						<select id="genesis-extender-custom-image-size-two-mode" name="extender[custom_image_size_two_mode]" size="1" style="width:70px;">
							<option value="">&nbsp;</option>
							<option value="resize"<?php if( genesis_extender_get_settings( 'custom_image_size_two_mode' ) == 'resize' ) echo ' selected="selected"'; ?>><?php _e( 'Resize', 'extender' ); ?></option>
							<option value="crop"<?php if( genesis_extender_get_settings( 'custom_image_size_two_mode' ) == 'crop' ) echo ' selected="selected"'; ?>><?php _e( 'Crop', 'extender' ); ?></option>
						</select>
						<?php _e( 'Width', 'extender' ); ?> <input type="text" id="genesis-extender-custom-image-size-two-width" name="extender[custom_image_size_two_width]" value="<?php echo genesis_extender_get_settings( 'custom_image_size_two_width' ) ?>" style="width:50px;" /><?php _e( 'px', 'extender' ); ?> | 
						<?php _e( 'Height', 'extender' ); ?> <input type="text" id="genesis-extender-custom-image-size-two-height" name="extender[custom_image_size_two_height]" value="<?php echo genesis_extender_get_settings( 'custom_image_size_two_height' ) ?>" style="width:50px;" /><?php _e( 'px', 'extender' ); ?>
					</p>
				</div>
				<div class="bg-box">
					<p>
						<strong><?php _e( 'custom-thumb-3', 'extender' ); ?></strong>
					</p>
					<p>
						<?php _e( 'Mode', 'extender' ); ?>
						<select id="genesis-extender-custom-image-size-three-mode" name="extender[custom_image_size_three_mode]" size="1" style="width:70px;">
							<option value="">&nbsp;</option>
							<option value="resize"<?php if( genesis_extender_get_settings( 'custom_image_size_three_mode' ) == 'resize' ) echo ' selected="selected"'; ?>><?php _e( 'Resize', 'extender' ); ?></option>
							<option value="crop"<?php if( genesis_extender_get_settings( 'custom_image_size_three_mode' ) == 'crop' ) echo ' selected="selected"'; ?>><?php _e( 'Crop', 'extender' ); ?></option>
						</select>
						<?php _e( 'Width', 'extender' ); ?> <input type="text" id="genesis-extender-custom-image-size-three-width" name="extender[custom_image_size_three_width]" value="<?php echo genesis_extender_get_settings( 'custom_image_size_three_width' ) ?>" style="width:50px;" /><?php _e( 'px', 'extender' ); ?> | 
						<?php _e( 'Height', 'extender' ); ?> <input type="text" id="genesis-extender-custom-image-size-three-height" name="extender[custom_image_size_three_height]" value="<?php echo genesis_extender_get_settings( 'custom_image_size_three_height' ) ?>" style="width:50px;" /><?php _e( 'px', 'extender' ); ?>
					</p>
				</div>
				<div class="bg-box">
					<p>
						<strong><?php _e( 'custom-thumb-4', 'extender' ); ?></strong>
					</p>
					<p>
						<?php _e( 'Mode', 'extender' ); ?>
						<select id="genesis-extender-custom-image-size-four-mode" name="extender[custom_image_size_four_mode]" size="1" style="width:70px;">
							<option value="">&nbsp;</option>
							<option value="resize"<?php if( genesis_extender_get_settings( 'custom_image_size_four_mode' ) == 'resize' ) echo ' selected="selected"'; ?>><?php _e( 'Resize', 'extender' ); ?></option>
							<option value="crop"<?php if( genesis_extender_get_settings( 'custom_image_size_four_mode' ) == 'crop' ) echo ' selected="selected"'; ?>><?php _e( 'Crop', 'extender' ); ?></option>
						</select>
						<?php _e( 'Width', 'extender' ); ?> <input type="text" id="genesis-extender-custom-image-size-four-width" name="extender[custom_image_size_four_width]" value="<?php echo genesis_extender_get_settings( 'custom_image_size_four_width' ) ?>" style="width:50px;" /><?php _e( 'px', 'extender' ); ?> | 
						<?php _e( 'Height', 'extender' ); ?> <input type="text" id="genesis-extender-custom-image-size-four-height" name="extender[custom_image_size_four_height]" value="<?php echo genesis_extender_get_settings( 'custom_image_size_four_height' ) ?>" style="width:50px;" /><?php _e( 'px', 'extender' ); ?>
					</p>
				</div>
				<div class="bg-box">
					<p>
						<strong><?php _e( 'custom-thumb-5', 'extender' ); ?></strong>
					</p>
					<p>
						<?php _e( 'Mode', 'extender' ); ?>
						<select id="genesis-extender-custom-image-size-five-mode" name="extender[custom_image_size_five_mode]" size="1" style="width:70px;">
							<option value="">&nbsp;</option>
							<option value="resize"<?php if( genesis_extender_get_settings( 'custom_image_size_five_mode' ) == 'resize' ) echo ' selected="selected"'; ?>><?php _e( 'Resize', 'extender' ); ?></option>
							<option value="crop"<?php if( genesis_extender_get_settings( 'custom_image_size_five_mode' ) == 'crop' ) echo ' selected="selected"'; ?>><?php _e( 'Crop', 'extender' ); ?></option>
						</select>
						<?php _e( 'Width', 'extender' ); ?> <input type="text" id="genesis-extender-custom-image-size-five-width" name="extender[custom_image_size_five_width]" value="<?php echo genesis_extender_get_settings( 'custom_image_size_five_width' ) ?>" style="width:50px;" /><?php _e( 'px', 'extender' ); ?> | 
						<?php _e( 'Height', 'extender' ); ?> <input type="text" id="genesis-extender-custom-image-size-five-height" name="extender[custom_image_size_five_height]" value="<?php echo genesis_extender_get_settings( 'custom_image_size_five_height' ) ?>" style="width:50px;" /><?php _e( 'px', 'extender' ); ?>
					</p>
				</div>
			</div>
		</div>

		<div class="genesis-extender-optionbox-outer-2col">
			<div class="genesis-extender-optionbox-inner-2col">
				<h4><?php _e( 'Code Editor Syntax Highlighting', 'extender' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="genesis-extender-codemirror-active" name="extender[codemirror_active]" value="1" <?php if( checked( 1, genesis_extender_get_settings( 'codemirror_active' ) ) ); ?> /> <?php _e( 'Enable Custom CSS/Functions/JS Syntax Highlighting', 'extender' ); ?>
						<a href="http://extenderdocs.cobaltapps.com/article/163-code-editor-syntax-highlighting" class="tooltip-mark" target="_blank">[?]</a>
					</p>
				</div>
			</div>
		</div>

		<?php
		if( PARENT_THEME_VERSION < '2.0' )
			$genesis_pre_two_point_oh = ' style="display:none;"';
		else
			$genesis_pre_two_point_oh = '';

		if( current_theme_supports( 'html5' ) && !genesis_extender_get_settings( 'html_five_active' ) )
		{
			$html_five_child_theme = __( '<br \><strong>Note:</strong> The Active Child Theme is already HTML5 enabled.', 'extender' );
			$html_five_child_theme_class = ' html-five-child-theme';
		}
		else
		{
			$html_five_child_theme = '';
			$html_five_child_theme_class = '';
		}
		?>

		<div class="genesis-extender-optionbox-outer-2col"<?php echo $genesis_pre_two_point_oh; ?>>
			<div class="genesis-extender-optionbox-inner-2col">
				<h4><?php _e( 'Genesis HTML5 Markup', 'extender' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="genesis-extender-html-five-active" name="extender[html_five_active]" value="1" <?php if( checked( 1, genesis_extender_get_settings( 'html_five_active' ) ) ); ?> /> <?php _e( 'Activate Genesis HTML5 Markup', 'extender' ); ?>
						<?php echo $html_five_child_theme; ?>
						<a href="http://extenderdocs.cobaltapps.com/article/87-if-the-active-child-theme-is-already-html5-enabled" class="tooltip-mark" target="_blank">[?]</a>
					</p>
				</div>
			</div>
		</div>

		<div id="genesis-extender-fancy-dropdowns-active-box" class="genesis-extender-optionbox-outer-2col<?php echo $html_five_child_theme_class; ?>" style="display:none;">
			<div class="genesis-extender-optionbox-inner-2col">
				<h4><?php _e( 'Genesis "Fancy Dropdowns"', 'extender' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="genesis-extender-fancy-dropdowns-active" name="extender[fancy_dropdowns_active]" value="1" <?php if( checked( 1, genesis_extender_get_settings( 'fancy_dropdowns_active' ) ) ); ?> /> <?php _e( 'Enable Genesis Menu "Fancy Dropdowns"', 'extender' ); ?>
						<a href="http://extenderdocs.cobaltapps.com/article/88-enable-genesis-menu-fancy-dropdowns" class="tooltip-mark" target="_blank">[?]</a>
					</p>
				</div>
			</div>
		</div>

		<div class="genesis-extender-optionbox-outer-2col">
			<div class="genesis-extender-optionbox-inner-2col">
				<h4><?php _e( 'Genesis Extender URL Protocols', 'extender' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="genesis-extender-protocol-relative-urls" name="extender[protocol_relative_urls]" value="1" <?php if( checked( 1, genesis_extender_get_settings( 'protocol_relative_urls' ) ) ); ?> /> <?php _e( 'Enable Protocol Relative URLs', 'extender' ); ?>
						<a href="http://extenderdocs.cobaltapps.com/article/161-enable-protocol-relative-urls" class="tooltip-mark" target="_blank">[?]</a>
					</p>
				</div>
			</div>
		</div>
		
	</div>
</div>