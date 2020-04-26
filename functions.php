<?php
add_action( 'wp_enqueue_scripts', 'my_twentysixteen_enqueue_styles' );
function my_twentysixteen_enqueue_styles() 
{
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css'); 
	wp_enqueue_style( 'iconmoon', get_stylesheet_directory_uri() . '/icomoon/icomoon.css');
}

add_action('wp_head','sticky_menu');
function sticky_menu() {
	wp_enqueue_script( 'sticky-menu', get_stylesheet_directory_uri() . '/js/sticky-menu.js');
}

add_theme_support( 'infinite-scroll', array(
	'container' => 'content',
	'footer' => 'page',
	) 
);


add_action( 'customize_register', 'my_twenty_sixteen_customizer_settings' );
function my_twenty_sixteen_customizer_settings( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
	// Sticky Color
	$wp_customize->add_setting( 'sticky_color' , array(
		'default'     => '#fbf0d9',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_color', array(
		'label'        => __( 'Sticky Navigation Color', 'my-twentysixteen' ),
		'section'    => 'colors',
		'settings'   => 'sticky_color',
	) ) );
	
	
	// Selection Color
	$wp_customize->add_setting( 'selection_color' , array(
		'default'     => '#DEB887',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'selection_color', array(
		'label'        => __( 'Selection Color', 'my-twentysixteen' ),
		'section'    => 'colors',
		'settings'   => 'selection_color',
	) ) );
	
	
	// Theme Color
	$wp_customize->add_setting( 'theme_color' , array(
		'default'     => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color', array(
		'label'        => __( 'Theme Color', 'my-twentysixteen' ),
		'description'        => __( 'Change the color in the address bar, supported by Google Chrome Android.', 'cp' ),
		'section'    => 'colors',
		'settings'   => 'theme_color',
	) ) );
}


function my_twentysixteen_sticky_color()
{
	$sticky_color = get_theme_mod('sticky_color');
	?>
	<style type="text/css">
		.sticky-nav,
		.sticky-nav.main-navigation ul ul li
		{ 
			background: <?php echo $sticky_color; ?>; 
		}
	</style>
	
	<?php
}
add_action( 'wp_head', 'my_twentysixteen_sticky_color');


function my_twentysixteen_selection_color()
{
	$selection_color = get_theme_mod('selection_color');
	?>
	<style type="text/css">
		::selection
		{ 
			background: <?php echo $selection_color; ?>; 
		}
		::-moz-selection
		{ 
			background: <?php echo $selection_color; ?>; 
		}
	</style>
	
	<?php
}
add_action( 'wp_head', 'my_twentysixteen_selection_color');

function my_twentysixteen_theme_color()
{
	$theme_color = get_theme_mod('theme_color');
	?>
	<meta name="theme-color" content="<?php echo $theme_color; ?>">
	<?php
}
add_action( 'wp_head', 'my_twentysixteen_theme_color');
?>