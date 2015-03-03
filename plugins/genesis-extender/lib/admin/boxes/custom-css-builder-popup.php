<?php
/**
 * Builds the Custom CSS Builder Popup content.
 *
 * @package Extender
 */
?>

<?php if( !genesis_extender_get_custom_css( 'css_builder_popup_editor_only' ) ) { ?>
<div style="display:none;" id="genesis-extender-custom-css-builder-nav">
	<ul>
		<li id="custom-css-builder-nav-open-close-elements" class="genesis-extender-css-builder-nav-all genesis-extender-options-nav-active"><a>Elements</a></li><li id="custom-css-builder-nav-backgrounds" class="genesis-extender-css-builder-nav-all"><a>Backgrounds</a></li><li id="custom-css-builder-nav-borders" class="genesis-extender-css-builder-nav-all"><a>Borders</a></li><li id="custom-css-builder-nav-margins-padding" class="genesis-extender-css-builder-nav-all"><a>Margins & Padding</a></li><li id="custom-css-builder-nav-fonts" class="genesis-extender-css-builder-nav-all"><a>Fonts</a></li><li id="custom-css-builder-nav-dimensions-position" class="genesis-extender-css-builder-nav-all"><a>Dimensions & Position</a></li><li id="custom-css-builder-nav-shadows" class="genesis-extender-css-builder-nav-all"><a>Shadows</a></li><li id="custom-css-builder-nav-scripts" class="genesis-extender-css-builder-nav-all"><a>Scripts</a></li><li id="custom-css-builder-nav-html" class="genesis-extender-css-builder-nav-all"><a class="genesis-extender-options-nav-last">HTML</a></li>
	</ul>
</div>

<div style="display:none;" id="genesis-extender-custom-css-builder" class="genesis-extender-optionbox-outer-1col">
	<div class="genesis-extender-optionbox-inner-1col">

		<div id="genesis-extender-custom-css-builder-wrap">
		<form name="form">
			<div id="genesis-extender-custom-css-builder-wrap-inner" class="bg-box">

				<div id="custom-css-builder-nav-open-close-elements-box" class="genesis-extender-all-css-builder genesis-extender-options-display">
					<p style="float:left;">
						<span style="color:#444; font-size:13px; font-weight:bold; line-height:21px;"><?php _e( 'Select/Insert [&raquo;] Elements to be styled:', 'extender' ); ?><br /></span>
						<?php _e( 'General Elements', 'extender' ); ?><br />
						<select id="custom_css_divs" class="css-builder-elements-select" name="custom_css_divs" size="1">
						<?php genesis_extender_build_css_elements_menu(); ?>
						</select>
						<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.custom_css_divs.value+'\n\n}\n')"><br />
						
						<span id="css-builder-element-selectors-wrap"><input id="css-builder-element-selectors-enable" type="button" value="Enable Element Selectors"><input style="display:none;" id="css-builder-element-selectors-disable" type="button" value="Disable Element Selectors"></span>
						<span id="css-builder-element-selectors-info"><?php _e( 'Click an element #label to reveal list of Elements.', 'extender' ); ?></span>
						
						<span id="body-label-select" class="all-labeled-elements">
							<?php _e( 'Body Elements', 'extender' ); ?><br />
							<select id="body_elements_list" class="css-builder-elements-select" name="body_elements_list" size="1">
							<?php genesis_extender_build_body_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.body_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="inner-label-select" class="all-labeled-elements">
							<?php _e( 'Inner Elements', 'extender' ); ?><br />
							<select id="inner_elements_list" class="css-builder-elements-select" name="inner_elements_list" size="1">
							<?php genesis_extender_build_inner_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.inner_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="header-label-select" class="all-labeled-elements">
							<?php _e( 'Header Elements', 'extender' ); ?><br />
							<select id="header_elements_list" class="css-builder-elements-select" name="header_elements_list" size="1">
							<?php genesis_extender_build_header_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.header_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="header-menu-label-select" class="all-labeled-elements">
							<?php _e( 'Header Menu Elements', 'extender' ); ?><br />
							<select id="header_menu_elements_list" class="css-builder-elements-select" name="header_menu_elements_list" size="1">
							<?php genesis_extender_build_header_menu_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.header_menu_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="nav-label-select" class="all-labeled-elements">
							<?php _e( 'Nav Elements', 'extender' ); ?><br />
							<select id="nav_elements_list" class="css-builder-elements-select" name="nav_elements_list" size="1">
							<?php genesis_extender_build_nav_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.nav_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="subnav-label-select" class="all-labeled-elements">
							<?php _e( 'Subnav Elements', 'extender' ); ?><br />
							<select id="subnav_elements_list" class="css-builder-elements-select" name="subnav_elements_list" size="1">
							<?php genesis_extender_build_subnav_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.subnav_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="content-label-select" class="all-labeled-elements">
							<?php _e( 'Content Elements', 'extender' ); ?><br />
							<select id="content_elements_list" class="css-builder-elements-select" name="content_elements_list" size="1">
							<?php genesis_extender_build_content_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.content_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="breadcrumb-label-select" class="all-labeled-elements">
							<?php _e( 'Breadcrumb Elements', 'extender' ); ?><br />
							<select id="breadcrumbs_elements_list" class="css-builder-elements-select" name="breadcrumbs_elements_list" size="1">
							<?php genesis_extender_build_breadcrumb_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.breadcrumbs_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="taxonomy-description-label-select" class="all-labeled-elements">
							<?php _e( 'Taxonomy Description Elements', 'extender' ); ?><br />
							<select id="taxonomy_descriptions_elements_list" class="css-builder-elements-select" name="taxonomy_descriptions_elements_list" size="1">
							<?php genesis_extender_build_taxonomy_description_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.taxonomy_descriptions_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="author-description-label-select" class="all-labeled-elements">
							<?php _e( 'Author Description Elements', 'extender' ); ?><br />
							<select id="author_descriptions_elements_list" class="css-builder-elements-select" name="author_descriptions_elements_list" size="1">
							<?php genesis_extender_build_author_description_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.author_descriptions_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="author-box-label-select" class="all-labeled-elements">
							<?php _e( 'Author Box Elements', 'extender' ); ?><br />
							<select id="author_box_elements_list" class="css-builder-elements-select" name="author_box_elements_list" size="1">
							<?php genesis_extender_build_author_box_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.author_box_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="comments-label-select" class="all-labeled-elements">
							<?php _e( 'Comments Elements', 'extender' ); ?><br />
							<select id="comments_elements_list" class="css-builder-elements-select" name="comments_elements_list" size="1">
							<?php genesis_extender_build_comments_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.comments_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="respond-label-select" class="all-labeled-elements">
							<?php _e( 'Respond Elements', 'extender' ); ?><br />
							<select id="respond_elements_list" class="css-builder-elements-select" name="respond_elements_list" size="1">
							<?php genesis_extender_build_respond_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.respond_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="sidebar-label-select" class="all-labeled-elements">
							<?php _e( 'Sidebar Elements', 'extender' ); ?><br />
							<select id="sidebar_elements_list" class="css-builder-elements-select" name="sidebar_elements_list" size="1">
							<?php genesis_extender_build_sidebar_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.sidebar_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="sidebar-alt-label-select" class="all-labeled-elements">
							<?php _e( 'Sidebar Alt Elements', 'extender' ); ?><br />
							<select id="sidebar_alt_elements_list" class="css-builder-elements-select" name="sidebar_alt_elements_list" size="1">
							<?php genesis_extender_build_sidebar_alt_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.sidebar_alt_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="footer-label-select" class="all-labeled-elements">
							<?php _e( 'Footer Elements', 'extender' ); ?><br />
							<select id="footer_elements_list" class="css-builder-elements-select" name="footer_elements_list" size="1">
							<?php genesis_extender_build_footer_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.footer_elements_list.value+'\n\n}\n')">
						</span>

						<span id="ez-home-label-select" class="all-labeled-elements">
							<?php _e( 'EZ Home Elements', 'extender' ); ?><br />
							<select id="ez_home_elements_list" class="css-builder-elements-select" name="ez_home_elements_list" size="1">
							<?php genesis_extender_build_ez_home_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.ez_home_elements_list.value+'\n\n}\n')">
						</span>

						<span id="customwidget-label-select" class="all-labeled-elements">
							<?php _e( 'Custom Widget Area Elements', 'extender' ); ?><br />
							<select id="customwidget_elements_list" class="css-builder-elements-select" name="customwidget_elements_list" size="1">
							<?php genesis_extender_build_customwidget_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.customwidget_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="featuredpost-label-select" class="all-labeled-elements">
							<?php _e( 'Featured Post Elements', 'extender' ); ?><br />
							<select id="featuredpost_elements_list" class="css-builder-elements-select" name="featuredpost_elements_list" size="1">
							<?php genesis_extender_build_featuredpost_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.featuredpost_elements_list.value+'\n\n}\n')">
						</span>
						
						<span id="featuredpage-label-select" class="all-labeled-elements">
							<?php _e( 'Featured Page Elements', 'extender' ); ?><br />
							<select id="featuredpage_elements_list" class="css-builder-elements-select" name="featuredpage_elements_list" size="1">
							<?php genesis_extender_build_featuredpage_elements_menu(); ?>
							</select>
							<input class="custom-css-builder-button-elements custom-css-builder-buttons custom-css-builder-raquo labeled-elements-button" type="button" value="&raquo;" onclick="insertAtCaret(this.form.text, this.form.featuredpage_elements_list.value+'\n\n}\n')">
						</span>
					</p>
				</div>
				
				<div id="custom-css-builder-nav-backgrounds-box" class="genesis-extender-all-css-builder">
					<p style="float:left;">
						<select id="background_type" name="background_type" size="1" class="iewide" style="width:225px;">
							<option value="no-repeat"><?php _e( 'No-Repeat Image (Left)', 'extender' ); ?></option>
							<option value="top center no-repeat"><?php _e( 'No-Repeat Image (Center)', 'extender' ); ?></option>
							<option value="top right no-repeat"><?php _e( 'No-Repeat Image (Right)', 'extender' ); ?></option>
							<option value="fixed no-repeat"><?php _e( 'No-Repeat Image (Left Fixed)', 'extender' ); ?></option>
							<option value="top center fixed no-repeat"><?php _e( 'No-Repeat Image (Center Fixed)', 'extender' ); ?></option>
							<option value="top right fixed no-repeat"><?php _e( 'No-Repeat Image (Right Fixed)', 'extender' ); ?></option>
							<option value="top left repeat-x"><?php _e( 'Horizontal-Repeat Image (Left)', 'extender' ); ?></option>
							<option value="top center repeat-x"><?php _e( 'Horizontal-Repeat Image (Center)', 'extender' ); ?></option>
							<option value="top right repeat-x"><?php _e( 'Horizontal-Repeat Image (Right)', 'extender' ); ?></option>
							<option value="top left fixed repeat-x"><?php _e( 'Horizontal-Repeat Image (Left Fixed)', 'extender' ); ?></option>
							<option value="top center fixed repeat-x"><?php _e( 'Horizontal-Repeat Image (Center Fixed)', 'extender' ); ?></option>
							<option value="top right fixed repeat-x"><?php _e( 'Horizontal-Repeat Image (Right Fixed)', 'extender' ); ?></option>				
							<option value="top left repeat-y"><?php _e( 'Vertical-Repeat Image (Left)', 'extender' ); ?></option>
							<option value="top center repeat-y"><?php _e( 'Vertical-Repeat Image (Center)', 'extender' ); ?></option>
							<option value="top right repeat-y"><?php _e( 'Vertical-Repeat Image (Right)', 'extender' ); ?></option>
							<option value="top left fixed repeat-y"><?php _e( 'Vertical-Repeat Image (Left Fixed)', 'extender' ); ?></option>
							<option value="top center fixed repeat-y"><?php _e( 'Vertical-Repeat Image (Center Fixed)', 'extender' ); ?></option>
							<option value="top right fixed repeat-y"><?php _e( 'Vertical-Repeat Image (Right Fixed)', 'extender' ); ?></option>						
							<option value="repeat"><?php _e( 'Horizontal & Vertical-Repeat Image', 'extender' ); ?></option>
							<option value="fixed repeat"><?php _e( 'Horizontal & Vertical-Repeat Image (Fixed)', 'extender' ); ?></option>
						</select> <?php _e( 'Type', 'extender' ); ?><br />
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box-230" id="background_color" name="background_color" value="" /> <?php _e( 'Color', 'extender' ); ?><br />
						<script type="text/javascript">
							var ImagesUrl = ' url(images/';
						</script>
						<select id="background_image" name="background_image" size="1" style="width:225px; margin-bottom:10px;"><?php genesis_extender_list_images(); ?></select> <?php _e( 'Image', 'extender' ); ?><br />
						<input class="custom-css-builder-button-bgs custom-css-builder-buttons" type="button" value="Insert Image Background CSS" onclick="insertAtCaret(this.form.text, '\tbackground: #'+this.form.background_color.value+ImagesUrl+this.form.background_image.value+') '+this.form.background_type.value+';\n')"><br />
						
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box-230" id="background_color2" name="background_color2" value="" style="margin-bottom:10px;" /> <?php _e( 'Color', 'extender' ); ?><br />
						<input class="custom-css-builder-button-bgs custom-css-builder-buttons" type="button" value="Insert Color Background CSS" onclick="insertAtCaret(this.form.text, '\tbackground: #'+this.form.background_color2.value+';\n')"><br />
						
						<input class="custom-css-builder-button-bgs custom-css-builder-buttons" type="button" value="Insert Transparent Background CSS" onclick="insertAtCaret(this.form.text, '\tbackground: transparent;\n')"><br />
					
						<?php _e( 'Gradients? Check out this', 'extender' ); ?> <a href="http://www.colorzilla.com/gradient-editor/" target="_blank"><?php _e( 'CSS Gradient Generator &raquo;', 'extender' ); ?></a>
					</p>
				</div>
				
				<div id="custom-css-builder-nav-borders-box" class="genesis-extender-all-css-builder">
					<p style="float:left;">
						<?php _e( 'Type', 'extender' ); ?>
						<select id="border_type" name="border_type" size="1" style="width:100px;">
							<option value="border"><?php _e( 'Full', 'extender' ); ?></option>
							<option value="border-top"><?php _e( 'Top', 'extender' ); ?></option>
							<option value="border-bottom"><?php _e( 'Bottom', 'extender' ); ?></option>
							<option value="border-left"><?php _e( 'Left', 'extender' ); ?></option>
							<option value="border-right"><?php _e( 'Right', 'extender' ); ?></option>
						</select>
						<?php _e( 'Thickness', 'extender' ); ?>
						<input type="text" id="border_thickness" name="border_thickness" value="0" style="width:35px;" /><?php _e( 'px', 'extender' ); ?><br />
						<?php _e( 'Style', 'extender' ); ?>
						<select id="border_style" name="border_style" size="1" style="width:100px;">
							<?php genesis_extender_list_borders(); ?>
						</select>
						<?php _e( 'Color', 'extender' ); ?>
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'}" style="width:70px;" id="border_color" name="border_color" value="" /><br />
						<input class="custom-css-builder-button-bgs custom-css-builder-buttons" type="button" value="Insert Border CSS" style="margin-top:10px;" onclick="insertAtCaret(this.form.text, '\t'+this.form.border_type.value+': '+this.form.border_thickness.value+'px '+this.form.border_style.value+' #'+this.form.border_color.value+';\n')"><br />
					
						<?php _e( 'Tp-Lft', 'extender' ); ?>
						<input type="text" id="border_radius_top" name="border_radius_top" value="0" style="width:24px;" />
						<?php _e( 'Tp-Rt', 'extender' ); ?>
						<input type="text" id="border_radius_right" name="border_radius_right" value="0" style="width:24px;" />
						<?php _e( 'Btm-Rt', 'extender' ); ?>
						<input type="text" id="border_radius_bottom" name="border_radius_bottom" value="0" style="width:24px;" />
						<?php _e( 'Btm-Lft', 'extender' ); ?>
						<input type="text" id="border_radius_left" name="border_radius_left" value="0" style="width:24px; margin-bottom:10px;" /><br />
						<input class="custom-css-builder-button-bgs custom-css-builder-buttons" type="button" value="Insert Border Radius CSS (in pixels)" onclick="insertAtCaret(this.form.text, '\t-webkit-border-radius: '+this.form.border_radius_top.value+'px '+this.form.border_radius_right.value+'px '+this.form.border_radius_bottom.value+'px '+this.form.border_radius_left.value+'px;\n\tborder-radius: '+this.form.border_radius_top.value+'px '+this.form.border_radius_right.value+'px '+this.form.border_radius_bottom.value+'px '+this.form.border_radius_left.value+'px;\n')">
					</p>
				</div>
				
				<div id="custom-css-builder-nav-margins-padding-box" class="genesis-extender-all-css-builder">
					<p style="float:left;">
						<?php _e( 'Top', 'extender' ); ?>
						<input type="text" id="margin_top" name="margin_top" value="0" style="width:25px;" />
						<?php _e( 'Right', 'extender' ); ?>
						<input type="text" id="margin_right" name="margin_right" value="0" style="width:25px;" />
						<?php _e( 'Bottom', 'extender' ); ?>
						<input type="text" id="margin_bottom" name="margin_bottom" value="0" style="width:25px;" />
						<?php _e( 'Left', 'extender' ); ?>
						<input type="text" id="margin_left" name="margin_left" value="0" style="width:25px; margin-bottom:10px;" /><br />
						<input class="custom-css-builder-button-bgs custom-css-builder-buttons" type="button" value="Insert Margin CSS" onclick="insertAtCaret(this.form.text, '\tmargin: '+this.form.margin_top.value+'px '+this.form.margin_right.value+'px '+this.form.margin_bottom.value+'px '+this.form.margin_left.value+'px;\n')"><br />

						<?php _e( 'Top', 'extender' ); ?>
						<input type="text" id="padding_top" name="padding_top" value="0" style="width:25px;" />
						<?php _e( 'Right', 'extender' ); ?>
						<input type="text" id="padding_right" name="padding_right" value="0" style="width:25px;" />
						<?php _e( 'Bottom', 'extender' ); ?>
						<input type="text" id="padding_bottom" name="padding_bottom" value="0" style="width:25px;" />
						<?php _e( 'Left', 'extender' ); ?>
						<input type="text" id="padding_left" name="padding_left" value="0" style="width:25px; margin-bottom:10px;" /><br />
						<input class="custom-css-builder-button-bgs custom-css-builder-buttons" type="button" value="Insert Padding CSS" onclick="insertAtCaret(this.form.text, '\tpadding: '+this.form.padding_top.value+'px '+this.form.padding_right.value+'px '+this.form.padding_bottom.value+'px '+this.form.padding_left.value+'px;\n')">
					</p>
				</div>

				<div id="custom-css-builder-nav-fonts-box" class="genesis-extender-all-css-builder">
					<p style="float:left;">
						<input id="font-type-button" class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Font Type" onclick="insertAtCaret(this.form.text, '\tfont-family: '+this.form.font_type.value+';\n')">
						<select id="font_type" class="css-builder-font-options-width-control" name="font_type" size="1">
							<?php genesis_extender_build_font_menu( 'font_type' ); ?>
						</select><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Font Size" onclick="insertAtCaret(this.form.text, '\tfont-size: '+this.form.font_size.value+'px;\n')">
						<input type="text" id="font_size" name="font_size" value="12" style="width:35px;" /><?php _e( 'px', 'extender' ); ?><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Font Color" onclick="insertAtCaret(this.form.text, '\tcolor: #'+this.form.font_color.value+';\n')">
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box-150" style="width:110px;" id="font_color" name="font_color" value="" /><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Font Weight" onclick="insertAtCaret(this.form.text, '\tfont-weight: '+this.form.font_weight.value+';\n')">
						<select id="font_weight" name="font_weight" size="1" class="iewide css-builder-font-options-width-control">
							<option value="normal"><?php _e( 'Normal', 'extender' ); ?></option>
							<option value="bold"><?php _e( 'Bold', 'extender' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Font Style" onclick="insertAtCaret(this.form.text, '\tfont-style: '+this.form.font_style.value+';\n')">
						<select id="font_style" class="css-builder-font-options-width-control" name="font_style" size="1" class="iewide">
							<option value="normal"><?php _e( 'Normal', 'extender' ); ?></option>
							<option value="italic"><?php _e( 'Italic', 'extender' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Text Align" onclick="insertAtCaret(this.form.text, '\ttext-align: '+this.form.text_align.value+';\n')">
						<select id="text_align" class="css-builder-font-options-width-control" name="text_align" size="1" class="iewide">
							<option value="left"><?php _e( 'Left', 'extender' ); ?></option>
							<option value="center"><?php _e( 'Center', 'extender' ); ?></option>
							<option value="right"><?php _e( 'Right', 'extender' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Transform" onclick="insertAtCaret(this.form.text, '\ttext-transform: '+this.form.font_caps.value+';\n')">
						<select id="font_caps" class="css-builder-font-options-width-control" name="font_caps" size="1" class="iewide">
							<option value="none"><?php _e( 'None', 'extender' ); ?></option>
							<option value="uppercase"><?php _e( 'Uppercase', 'extender' ); ?></option>
							<option value="lowercase"><?php _e( 'Lowercase', 'extender' ); ?></option>
							<option value="capitalize"><?php _e( 'Capitalize', 'extender' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Letter Spacing" onclick="insertAtCaret(this.form.text, '\tletter-spacing: '+this.form.letter_spacing.value+';\n')">
						<select id="letter_spacing" class="css-builder-font-options-width-control" name="letter_spacing" size="1" class="iewide">
							<option value=".5px"><?php _e( '.5px', 'extender' ); ?></option>
							<option value="1px"><?php _e( '1px', 'extender' ); ?></option>
							<option value="1.5px"><?php _e( '1.5px', 'extender' ); ?></option>
							<option value="2px"><?php _e( '2px', 'extender' ); ?></option>
							<option value="2.5px"><?php _e( '2.5px', 'extender' ); ?></option>
							<option value="3px"><?php _e( '3px', 'extender' ); ?></option>
							<option value="3.5px"><?php _e( '3.5px', 'extender' ); ?></option>
							<option value="4px"><?php _e( '4px', 'extender' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Line Height" onclick="insertAtCaret(this.form.text, '\tline-height: '+this.form.line_height.value+';\n')">
						<select id="line_height" class="css-builder-font-options-width-control" name="line_height" size="1" class="iewide">
							<option value="100%"><?php _e( '100%', 'extender' ); ?></option>
							<option value="110%"><?php _e( '110%', 'extender' ); ?></option>
							<option value="120%"><?php _e( '120%', 'extender' ); ?></option>
							<option value="130%"><?php _e( '130%', 'extender' ); ?></option>
							<option value="140%"><?php _e( '140%', 'extender' ); ?></option>
							<option value="150%"><?php _e( '150%', 'extender' ); ?></option>
							<option value="160%"><?php _e( '160%', 'extender' ); ?></option>
							<option value="170%"><?php _e( '170%', 'extender' ); ?></option>
							<option value="180%"><?php _e( '180%', 'extender' ); ?></option>
							<option value="190%"><?php _e( '190%', 'extender' ); ?></option>
							<option value="200%"><?php _e( '200%', 'extender' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Txt Decoration" onclick="insertAtCaret(this.form.text, '\ttext-decoration: '+this.form.text_decoration.value+';\n')">
						<select id="text_decoration" class="css-builder-font-options-width-control" name="text_decoration" size="1" class="iewide">
							<option value="none"><?php _e( 'none', 'extender' ); ?></option>
							<option value="underline"><?php _e( 'underline', 'extender' ); ?></option>
							<option value="overline"><?php _e( 'overline', 'extender' ); ?></option>
							<option value="line-through"><?php _e( 'line-through', 'extender' ); ?></option>
							<option value="blink"><?php _e( 'blink', 'extender' ); ?></option>
							<option value="inherit"><?php _e( 'inherit', 'extender' ); ?></option>
						</select><br />
					</p>
				</div>
				
				<div id="custom-css-builder-nav-dimensions-position-box" class="genesis-extender-all-css-builder">
					<p style="float:left;">		
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert px Width CSS" onclick="insertAtCaret(this.form.text, '\twidth: '+this.form.width_px.value+'px;\n')">
						<input type="text" id="width_px" name="width_px" value="" style="width:40px;" /><?php _e( 'px', 'extender' ); ?><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert % Width CSS" onclick="insertAtCaret(this.form.text, '\twidth: '+this.form.width_percent.value+'%;\n')">
						<input type="text" id="width_percent" name="width_percent" value="" style="width:40px;" /><?php _e( '%', 'extender' ); ?><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert px Max Width CSS" onclick="insertAtCaret(this.form.text, '\tmax-width: '+this.form.max_width_px.value+'px;\n')">
						<input type="text" id="max_width_px" name="max_width_px" value="" style="width:40px;" /><?php _e( 'px', 'extender' ); ?><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert % Max Width CSS" onclick="insertAtCaret(this.form.text, '\tmax-width: '+this.form.max_width_percent.value+'%;\n')">
						<input type="text" id="max_width_percent" name="max_width_percent" value="" style="width:40px;" /><?php _e( '%', 'extender' ); ?><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Height CSS" onclick="insertAtCaret(this.form.text, '\theight: '+this.form.height.value+'px;\n')">
						<input type="text" id="height" name="height" value="" style="width:40px;" /><?php _e( 'px', 'extender' ); ?><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Float CSS" onclick="insertAtCaret(this.form.text, '\tfloat: '+this.form.float_direction.value+';\n')">
						<select id="float_direction" name="float_direction" size="1" class="iewide" style="width:110px;">
							<option value="none"><?php _e( 'None', 'extender' ); ?></option>
							<option value="left"><?php _e( 'Left', 'extender' ); ?></option>
							<option value="right"><?php _e( 'Right', 'extender' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Position" onclick="insertAtCaret(this.form.text, '\tposition: '+this.form.position.value+';\n')">
						<select id="position" name="position" size="1" class="iewide" style="width:110px;">
							<option value="absolute"><?php _e( 'absolute', 'extender' ); ?></option>
							<option value="fixed"><?php _e( 'fixed', 'extender' ); ?></option>
							<option value="relative"><?php _e( 'relative', 'extender' ); ?></option>
							<option value="static"><?php _e( 'static', 'extender' ); ?></option>
							<option value="inherit"><?php _e( 'inherit', 'extender' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button custom-css-builder-buttons" type="button" value="Insert Display" onclick="insertAtCaret(this.form.text, '\tdisplay: '+this.form.display.value+';\n')">
						<select id="display" name="display" size="1" class="iewide" style="width:110px;">
							<option value="none"><?php _e( 'none', 'extender' ); ?></option>
							<option value="block"><?php _e( 'block', 'extender' ); ?></option>
							<option value="inline"><?php _e( 'inline', 'extender' ); ?></option>
							<option value="inline-block"><?php _e( 'inline-block', 'extender' ); ?></option>
							<option value="inline-table"><?php _e( 'inline-table', 'extender' ); ?></option>
							<option value="list-item"><?php _e( 'list-item', 'extender' ); ?></option>
							<option value="run-in"><?php _e( 'run-in', 'extender' ); ?></option>
							<option value="table"><?php _e( 'table', 'extender' ); ?></option>
							<option value="table-caption"><?php _e( 'table-caption', 'extender' ); ?></option>
							<option value="table-cell"><?php _e( 'table-cell', 'extender' ); ?></option>
							<option value="table-column"><?php _e( 'table-column', 'extender' ); ?></option>
							<option value="table-column-group"><?php _e( 'table-column-group', 'extender' ); ?></option>
							<option value="table-footer-group"><?php _e( 'table-footer-group', 'extender' ); ?></option>
							<option value="table-header-group"><?php _e( 'table-header-group', 'extender' ); ?></option>
							<option value="table-row"><?php _e( 'table-row', 'extender' ); ?></option>
							<option value="table-row-group"><?php _e( 'table-row-group', 'extender' ); ?></option>
							<option value="inherit"><?php _e( 'inherit', 'extender' ); ?></option>
						</select>
					</p>
				</div>
				
				<div id="custom-css-builder-nav-shadows-box" class="genesis-extender-all-css-builder">
					<p style="float:left;">
						<?php _e( 'Lft-Rt', 'extender' ); ?>
						<input type="text" id="box_shadow_lr" name="box_shadow_lr" value="0" style="width:40px;" />
						<?php _e( 'Tp-Btm', 'extender' ); ?>
						<input type="text" id="box_shadow_tb" name="box_shadow_tb" value="0" style="width:40px;" /><br />
						<?php _e( 'Blur', 'extender' ); ?>
						<input type="text" id="box_shadow_blur" name="box_shadow_blur" value="0" style="width:30px;" />
						<?php _e( 'Spread', 'extender' ); ?>
						<input type="text" id="box_shadow_spread" name="box_shadow_spread" value="0" style="width:30px; margin-bottom:10px;" />
						<?php _e( 'Color', 'extender' ); ?>
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'}" style="width:70px;" id="box_shadow_color" name="box_shadow_color" value="" style="margin-bottom:10px;"/><br />
						<input class="custom-css-builder-button-bgs custom-css-builder-buttons" type="button" value="Insert Box Shadow CSS (in pixels)" onclick="insertAtCaret(this.form.text, '\t-webkit-box-shadow: '+this.form.box_shadow_lr.value+'px '+this.form.box_shadow_tb.value+'px '+this.form.box_shadow_blur.value+'px '+this.form.box_shadow_spread.value+'px #'+this.form.box_shadow_color.value+';\n\tbox-shadow: '+this.form.box_shadow_lr.value+'px '+this.form.box_shadow_tb.value+'px '+this.form.box_shadow_blur.value+'px '+this.form.box_shadow_spread.value+'px #'+this.form.box_shadow_color.value+';\n')"><br />
						
						<?php _e( 'Lft-Rt', 'extender' ); ?>
						<input type="text" id="text_shadow_lr" name="text_shadow_lr" value="0" style="width:40px;" />
						<?php _e( 'Tp-Btm', 'extender' ); ?>
						<input type="text" id="text_shadow_tb" name="text_shadow_tb" value="0" style="width:40px;" /><br />
						<?php _e( 'Blur', 'extender' ); ?>
						<input type="text" id="text_shadow_blur" name="text_shadow_blur" value="0" style="width:30px; margin-bottom:10px;" />
						<?php _e( 'Color', 'extender' ); ?>
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'}" style="width:70px;" id="text_shadow_color" name="text_shadow_color" value="" style="margin-bottom:10px;"/><br />
						<input class="custom-css-builder-button-bgs custom-css-builder-buttons" type="button" value="Insert Text Shadow CSS (in pixels)" onclick="insertAtCaret(this.form.text, '\ttext-shadow: '+this.form.text_shadow_lr.value+'px '+this.form.text_shadow_tb.value+'px '+this.form.text_shadow_blur.value+'px #'+this.form.text_shadow_color.value+';\n')">
					</p>
				</div>
				
				<div id="custom-css-builder-nav-scripts-box" class="genesis-extender-all-css-builder">
					<p style="float:left;">
						<?php _e( 'Add scripts below to append them to the &lt;head&gt; of your site.', 'extender' ); ?>
						<?php _e( '(eg. Linking to Google Font Stylesheets)', 'extender' ); ?><br />
						<a href="http://www.google.com/fonts/" target="_blank">http://www.google.com/fonts/</a><br />
						<textarea id="css-builder-scripts" name="scripts"></textarea>
						<input id="css-builder-scripts-highlight" type="button" value="Click To Highlight Scripts For Copy/Paste">
					</p>
				</div>
				
				<div id="custom-css-builder-nav-html-box" class="genesis-extender-all-css-builder">
					<p>
						<span style="float:left;"><?php _e( 'Current &lt;body&gt; classes for this page:', 'extender' ); ?></span><br />
						<textarea wrap="off" id="css-builder-body-classes" name="body_classes"></textarea><br />
						<?php _e( '&lt;HTML&gt; of last clicked Element #label:', 'extender' ); ?><br />
						<textarea wrap="off" id="css-builder-html" name="html"></textarea>
					</p>
				</div>

				<div id="css-builder-output-wrap">
					<textarea wrap="off" id="css-builder-output" name="text"></textarea>
					<input id="css-builder-output-insert" type="button" value="Click To Insert Into Custom CSS Editor &raquo;">
				</div>
			</div>
		</form>
		<?php genesis_extender_css_builder_custom_css(); ?>
		</div>
	</div>
</div>
<?php } else { ?>
<div style="display:none;" id="genesis-extender-custom-css-builder-nav"></div>
<?php genesis_extender_css_builder_custom_css(); ?>
<?php } ?>