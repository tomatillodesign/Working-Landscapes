<?php
/**
 * Build and Write the EZ Widget Area Structures.
 *
 * @package Extender
 */

function genesis_extender_ez_home_widget_reg( $number = '', $row_title = '', $row = '' )
{
	if( genesis_extender_get_settings( 'static_homepage' ) )
	{
		$ez_home_widget_reg = "
genesis_register_sidebar( array (
	'name'	=>	'EZ Home " . $row_title. " #" . $number . "',
	'id' 	=> 	'genesis_extender_ez_home_" . $row . "_" . $number . "'
) );
		";
	}
	else
	{
		$ez_home_widget_reg = "";
	}
			
	return $ez_home_widget_reg;
}

function genesis_extender_ez_home_widget( $number = '', $class = '', $row_title = '', $row = '', $single_row = false )
{
	$single_quote = "'";
	
	if( $number == '1' )
	{
		if( $row == 'top' )
		{
			$ez_home_bottom = $single_row ? ' ez-home-bottom' : '';
			$opening_div = '
		<div id="ez-home-top-container" class="ez-home-container-area' . $ez_home_bottom . ' clearfix">
			';
		}
		elseif( $row == 'middle' )
		{
			$opening_div = '
		<div id="ez-home-middle-container" class="ez-home-container-area clearfix">
			';
		}
		elseif( $row == 'bottom' )
		{
			$opening_div = '
		<div id="ez-home-bottom-container" class="ez-home-container-area ez-home-bottom clearfix">
			';
		}
	}
	else
	{
		$opening_div = '';
	}
	
	$ez_home_widget = $opening_div . '
			<div id="ez-home-' . $row . '-' . $number . '" class="widget-area ez-widget-area ' . $class . '">
				<?php if ( ! dynamic_sidebar( ' . $single_quote . 'EZ Home ' . $row_title . ' #' . $number . '' . $single_quote . ' ) ) { ?>
					<div class="widget">
						<h4><?php _e( ' . $single_quote . 'EZ Home ' . $row_title . ' #' . $number . '' . $single_quote . ', ' . $single_quote . 'extender' . $single_quote . ' ); ?></h4>
						<p><?php printf( __( ' . $single_quote . 'This is Extender Widget Area. You can add content to this area by going to <a href="%s">Appearance > Widgets</a> in your WordPress Dashboard and adding new widgets to this area.' . $single_quote . ', "extender" ), admin_url( "widgets.php" ) ); ?></p>
					</div>			
				<?php } ?>
			</div><!-- end #ez-home-' . $row . '-' . $number . ' -->
	';
					
	return $ez_home_widget;
}
		
function genesis_extender_build_ez_structures()
{
	$single_quote = "'";
	$ez_home_top_widget_reg = '';
	$ez_home_top_widgets = '';
	$ez_home_middle_widget_reg = '';
	$ez_home_middle_widgets = '';
	$ez_home_bottom_widget_reg = '';
	$ez_home_bottom_widgets = '';
	
	switch ( strlen( genesis_extender_get_settings( 'ez_homepage_select' ) ) )
	{
		case '9':
			switch ( substr( genesis_extender_get_settings( 'ez_homepage_select' ), -1 ) )
			{
				case '1':
					$ez_home_top_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Top', 'top' );
					$ez_home_top_widgets = 
genesis_extender_ez_home_widget( '1', 'ez-only', 'Top', 'top', true ) . '
		</div><!-- end #ez-home-top-container -->
		';
					break;
				case '2':
					$ez_home_top_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Top', 'top' ) . genesis_extender_ez_home_widget_reg( '2', 'Top', 'top' );
					$ez_home_top_widgets = 
genesis_extender_ez_home_widget( '1', 'one-half first', 'Top', 'top', true ) . genesis_extender_ez_home_widget( '2', 'one-half', 'Top', 'top' ) . '
		</div><!-- end #ez-home-top-container -->
		';
					break;
				case '3':
					$ez_home_top_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Top', 'top' ) . genesis_extender_ez_home_widget_reg( '2', 'Top', 'top' ) . genesis_extender_ez_home_widget_reg( '3', 'Top', 'top' );
					$ez_home_top_widgets = 
genesis_extender_ez_home_widget( '1', 'one-third first', 'Top', 'top', true ) . genesis_extender_ez_home_widget( '2', 'one-third', 'Top', 'top' ) . genesis_extender_ez_home_widget( '3', 'one-third', 'Top', 'top' ) . '
		</div><!-- end #ez-home-top-container -->
		';
					break;
			}
			break;
		case '11':
		case '14':
			switch ( substr( genesis_extender_get_settings( 'ez_homepage_select' ), -3, -2 ) )
			{
				case '1':
					$ez_home_top_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Top', 'top' );
					$ez_home_top_widgets = 
genesis_extender_ez_home_widget( '1', 'ez-only', 'Top', 'top' ) . '
		</div><!-- end #ez-home-top-container -->
		';
					break;
				case '2':
					switch ( substr( genesis_extender_get_settings( 'ez_homepage_select' ), -5, -4 ) )
					{
						case 'l':
							$widget_1_class = 'two-thirds';
							$widget_2_class = 'one-third';
							break;
						case 'r':
							$widget_1_class = 'one-third';
							$widget_2_class = 'two-thirds';
							break;
						default:
							$widget_1_class = 'one-half';
							$widget_2_class = 'one-half';
							break;
					}
					$ez_home_top_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Top', 'top' ) . genesis_extender_ez_home_widget_reg( '2', 'Top', 'top' );
					$ez_home_top_widgets = 
genesis_extender_ez_home_widget( '1', $widget_1_class . ' first', 'Top', 'top' ) . genesis_extender_ez_home_widget( '2', $widget_2_class, 'Top', 'top' ) . '
		</div><!-- end #ez-home-top-container -->
		';
					break;
				case '3':
					$ez_home_top_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Top', 'top' ) . genesis_extender_ez_home_widget_reg( '2', 'Top', 'top' ) . genesis_extender_ez_home_widget_reg( '3', 'Top', 'top' );
					$ez_home_top_widgets = 
genesis_extender_ez_home_widget( '1', 'one-third first', 'Top', 'top' ) . genesis_extender_ez_home_widget( '2', 'one-third', 'Top', 'top' ) . genesis_extender_ez_home_widget( '3', 'one-third', 'Top', 'top' ) . '
		</div><!-- end #ez-home-top-container -->
		';
					break;
			}
			
			switch ( substr( genesis_extender_get_settings( 'ez_homepage_select' ), -1 ) )
			{
				case '1':
					$ez_home_bottom_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Bottom', 'bottom' );
					$ez_home_bottom_widgets = 
genesis_extender_ez_home_widget( '1', 'ez-only', 'Bottom', 'bottom' ) . '
		</div><!-- end #ez-home-bottom-container -->
		';
					break;
				case '2':
					switch ( substr( genesis_extender_get_settings( 'ez_homepage_select' ), -5, -4 ) )
					{
						case 'l':
							$widget_1_class = 'two-thirds';
							$widget_2_class = 'one-third';
							break;
						case 'r':
							$widget_1_class = 'one-third';
							$widget_2_class = 'two-thirds';
							break;
						default:
							$widget_1_class = 'one-half';
							$widget_2_class = 'one-half';
							break;
					}
					$ez_home_bottom_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Bottom', 'bottom' ) . genesis_extender_ez_home_widget_reg( '2', 'Bottom', 'bottom' );
					$ez_home_bottom_widgets = 
genesis_extender_ez_home_widget( '1', $widget_1_class . ' first', 'Bottom', 'bottom' ) . genesis_extender_ez_home_widget( '2', $widget_2_class, 'Bottom', 'bottom' ) . '
		</div><!-- end #ez-home-bottom-container -->
		';
					break;
				case '3':
					$ez_home_bottom_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Bottom', 'bottom' ) . genesis_extender_ez_home_widget_reg( '2', 'Bottom', 'bottom' ) . genesis_extender_ez_home_widget_reg( '3', 'Bottom', 'bottom' );
					$ez_home_bottom_widgets = 
genesis_extender_ez_home_widget( '1', 'one-third first', 'Bottom', 'bottom' ) . genesis_extender_ez_home_widget( '2', 'one-third', 'Bottom', 'bottom' ) . genesis_extender_ez_home_widget( '3', 'one-third', 'Bottom', 'bottom' ) . '
		</div><!-- end #ez-home-bottom-container -->
		';
					break;
			}
			break;
		case '13':
		case '16':
			switch ( substr( genesis_extender_get_settings( 'ez_homepage_select' ), -5, -4 ) )
			{
				case '1':
					$ez_home_top_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Top', 'top' );
					$ez_home_top_widgets = 
genesis_extender_ez_home_widget( '1', 'ez-only', 'Top', 'top' ) . '
		</div><!-- end #ez-home-top-container -->
		';
					break;
				case '2':
					switch ( substr( genesis_extender_get_settings( 'ez_homepage_select' ), -7, -6 ) )
					{
						case 'l':
							$widget_1_class = 'two-thirds';
							$widget_2_class = 'one-third';
							break;
						case 'r':
							$widget_1_class = 'one-third';
							$widget_2_class = 'two-thirds';
							break;
						default:
							$widget_1_class = 'one-half';
							$widget_2_class = 'one-half';
							break;
					}
					$ez_home_top_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Top', 'top' ) . genesis_extender_ez_home_widget_reg( '2', 'Top', 'top' );
					$ez_home_top_widgets = 
genesis_extender_ez_home_widget( '1', $widget_1_class . ' first', 'Top', 'top' ) . genesis_extender_ez_home_widget( '2', $widget_2_class, 'Top', 'top' ) . '
		</div><!-- end #ez-home-top-container -->
		';
					break;
				case '3':
					$ez_home_top_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Top', 'top' ) . genesis_extender_ez_home_widget_reg( '2', 'Top', 'top' ) . genesis_extender_ez_home_widget_reg( '3', 'Top', 'top' );
					$ez_home_top_widgets = 
genesis_extender_ez_home_widget( '1', 'one-third first', 'Top', 'top' ) . genesis_extender_ez_home_widget( '2', 'one-third', 'Top', 'top' ) . genesis_extender_ez_home_widget( '3', 'one-third', 'Top', 'top' ) . '
		</div><!-- end #ez-home-top-container -->
		';
					break;
			}
			
			switch ( substr( genesis_extender_get_settings( 'ez_homepage_select' ), -3, -2 ) )
			{
				case '1':
					$ez_home_middle_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Middle', 'middle' );
					$ez_home_middle_widgets = 
genesis_extender_ez_home_widget( '1', 'ez-only', 'Middle', 'middle' ) . '
		</div><!-- end #ez-home-middle-container -->
		';
					break;
				case '2':
					switch ( substr( genesis_extender_get_settings( 'ez_homepage_select' ), -7, -6 ) )
					{
						case 'l':
							$widget_1_class = 'two-thirds';
							$widget_2_class = 'one-third';
							break;
						case 'r':
							$widget_1_class = 'one-third';
							$widget_2_class = 'two-thirds';
							break;
						default:
							$widget_1_class = 'one-half';
							$widget_2_class = 'one-half';
							break;
					}
					$ez_home_middle_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Middle', 'middle' ) . genesis_extender_ez_home_widget_reg( '2', 'Middle', 'middle' );
					$ez_home_middle_widgets = 
genesis_extender_ez_home_widget( '1', $widget_1_class . ' first', 'Middle', 'middle' ) . genesis_extender_ez_home_widget( '2', $widget_2_class, 'Middle', 'middle' ) . '
		</div><!-- end #ez-home-middle-container -->
		';
					break;
				case '3':
					$ez_home_middle_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Middle', 'middle' ) . genesis_extender_ez_home_widget_reg( '2', 'Middle', 'middle' ) . genesis_extender_ez_home_widget_reg( '3', 'Middle', 'middle' );
					$ez_home_middle_widgets = 
genesis_extender_ez_home_widget( '1', 'one-third first', 'Middle', 'middle' ) . genesis_extender_ez_home_widget( '2', 'one-third', 'Middle', 'middle' ) . genesis_extender_ez_home_widget( '3', 'one-third', 'Middle', 'middle' ) . '
		</div><!-- end #ez-home-middle-container -->
		';
					break;
			}
			
			switch ( substr( genesis_extender_get_settings( 'ez_homepage_select' ), -1 ) )
			{
				case '1':
					$ez_home_bottom_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Bottom', 'bottom' );
					$ez_home_bottom_widgets = 
genesis_extender_ez_home_widget( '1', 'ez-only', 'Bottom', 'bottom' ) . '
		</div><!-- end #ez-home-bottom-container -->
		';
					break;
				case '2':
					switch ( substr( genesis_extender_get_settings( 'ez_homepage_select' ), -7, -6 ) )
					{
						case 'l':
							$widget_1_class = 'two-thirds';
							$widget_2_class = 'one-third';
							break;
						case 'r':
							$widget_1_class = 'one-third';
							$widget_2_class = 'two-thirds';
							break;
						default:
							$widget_1_class = 'one-half';
							$widget_2_class = 'one-half';
							break;
					}
					$ez_home_bottom_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Bottom', 'bottom' ) . genesis_extender_ez_home_widget_reg( '2', 'Bottom', 'bottom' );
					$ez_home_bottom_widgets = 
genesis_extender_ez_home_widget( '1', $widget_1_class . ' first', 'Bottom', 'bottom' ) . genesis_extender_ez_home_widget( '2', $widget_2_class, 'Bottom', 'bottom' ) . '
		</div><!-- end #ez-home-bottom-container -->
		';
					break;
				case '3':
					$ez_home_bottom_widget_reg = 
genesis_extender_ez_home_widget_reg( '1', 'Bottom', 'bottom' ) . genesis_extender_ez_home_widget_reg( '2', 'Bottom', 'bottom' ) . genesis_extender_ez_home_widget_reg( '3', 'Bottom', 'bottom' );
					$ez_home_bottom_widgets = 
genesis_extender_ez_home_widget( '1', 'one-third first', 'Bottom', 'bottom' ) . genesis_extender_ez_home_widget( '2', 'one-third', 'Bottom', 'bottom' ) . genesis_extender_ez_home_widget( '3', 'one-third', 'Bottom', 'bottom' ) . '
		</div><!-- end #ez-home-bottom-container -->
		';
					break;
			}
			break;
	}

	$static_homepage_entry_class = genesis_extender_get_settings( 'static_homepage_entry_class' );

	$structure = '<?php
/**
 * Build and register EZ Widget Area structures.
 */
 
/**
 * Register EZ Widget Areas
 */';
	
	$structure .= $ez_home_top_widget_reg;
	
	$structure .= $ez_home_middle_widget_reg;
	
	$structure .= $ez_home_bottom_widget_reg;

	if( genesis_extender_get_settings( 'static_homepage' ) )
	{
		if( !empty( $static_homepage_entry_class ) )
		{
			$structure .= '
/**
 * Build the EZ Home Structure HTML.
 *
 * @since 1.0
 */
function genesis_extender_do_ez_home() { ?>
	<div id="ez-home-container-wrap" class="entry clearfix">
	
		<?php do_action( "genesis_extender_before_ez_home" ); ?>
			';
		}
		else
		{
			$structure .= '
/**
 * Build the EZ Home Structure HTML.
 *
 * @since 1.0
 */
function genesis_extender_do_ez_home() { ?>
	<div id="ez-home-container-wrap" class="clearfix">
	
		<?php do_action( "genesis_extender_before_ez_home" ); ?>
			';
		}
		
		$structure .= $ez_home_top_widgets;
		
		$structure .= $ez_home_middle_widgets;
		
		$structure .= $ez_home_bottom_widgets;
				
		$structure .= '
		<?php do_action( "genesis_extender_after_ez_home" ); ?>
	
	</div><!-- end #ez-home-container-wrap -->
<?php
}
';
	}
	
	return $structure;
}
