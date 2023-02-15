<?php 
add_action( 'wp_enqueue_scripts', 'blogging_essentials_enqueue_styles' );
function blogging_essentials_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 


if ( ! function_exists( 'flatmagazinews_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function flatmagazinews_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'blogging-essentials' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);


		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

//Dequeue old font
function blogging_essentials_dequeue_fonts() {
    wp_dequeue_style( 'flatmagazinews-google-fonts' );
        wp_deregister_style( 'flatmagazinews-google-fonts' );
}
add_action( 'wp_print_styles', 'blogging_essentials_dequeue_fonts' );


function blogging_essentials_enqueue_assets()
{
    // Include the file.
    require_once get_theme_file_path('webfont-loader/wptt-webfont-loader.php');
    // Load the webfont.
    wp_enqueue_style(
        'blogging-essentials-fonts',
        wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins:wght@400;600&display=swap'),
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'blogging_essentials_enqueue_assets');



require get_stylesheet_directory() . '/inc/custom-header.php';

function blogging_essentials_customize_register( $wp_customize ) {
		$wp_customize->add_section( 'navigation_settings', array(
		'title'      => __('Navigation Settings','blogging-essentials'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		) );

	$wp_customize->add_setting( 'navigation_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_background_color', array(
		'label'       => __( 'Background Color', 'blogging-essentials' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_background_color',
		) ) );

	$wp_customize->add_setting( 'navigation_text_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_text_color', array(
		'label'       => __( 'Link Color', 'blogging-essentials' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_text_color',
		) ) );

	$wp_customize->add_setting( 'navigation_border_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_border_color', array(
		'label'       => __( 'Border Color', 'blogging-essentials' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_border_color',
		) ) );


}
add_action( 'customize_register', 'blogging_essentials_customize_register', 999 );




if(! function_exists('blogging_essentials_customizer_css_final_output' ) ):
	function blogging_essentials_customizer_css_final_output(){
		?>

		<style type="text/css">
			.main-navigation ul li a, .main-navigation ul li .sub-arrow, .super-menu .toggle-mobile-menu,.toggle-mobile-menu:before, .mobile-menu-active .smenu-hide { color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
			#smobile-menu.show .main-navigation ul ul.children.active, #smobile-menu.show .main-navigation ul ul.sub-menu.active, #smobile-menu.show .main-navigation ul li, .smenu-hide.toggle-mobile-menu.menu-toggle, #smobile-menu.show .main-navigation ul li, .primary-menu ul li ul.children li, .primary-menu ul li ul.sub-menu li, .primary-menu .pmenu, .super-menu { border-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; border-bottom-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; }
			.header-widgets-wrapper .swidgets-wrap{ background: <?php echo esc_attr(get_theme_mod( 'upperwidgets_bg_color')); ?>; }
			.primary-menu .pmenu, .super-menu, #smobile-menu, .primary-menu ul li ul.children, .primary-menu ul li ul.sub-menu { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
			#secondary .swidgets-wrap{ background: <?php echo esc_attr(get_theme_mod( 'sidebar_bg_color')); ?>; }
			#secondary .swidget { border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }
			.archive article.fbox, .search-results article.fbox, .blog article.fbox { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_bg_color')); ?>; }
			.comments-area, .single article.fbox, .page article.fbox { background: <?php echo esc_attr(get_theme_mod( 'postpage_bg_color')); ?>; }
		</style>
		<?php }
		add_action( 'wp_head', 'blogging_essentials_customizer_css_final_output' );
		endif;