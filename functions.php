<?php

/*
 * You can add your own functions here. You can also override functions that are
 * called from within the parent theme. For a complete list of function you can
 * override here, please see the docs:
 *
 * https://github.com/raamdev/independent-publisher#functions-you-can-override-in-a-child-theme
 *
 */


/*
 * Uncomment the following to add a favicon to your site. You need to add favicon
 * image to the images folder of Independent Publisher Child Theme for this to work.
 */
/*
function blog_favicon() {
  echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/favicon.ico" />' . "\n";
}
add_action('wp_head', 'blog_favicon');
*/

/*
 * Add version number to main style.css file with version number that matches the
 * last modified time of the file. This helps when making frequent changes to the
 * CSS file as the browser will always load the newest version.
 */
/*
function independent_publisher_stylesheet() {
	wp_enqueue_style( 'independent-publisher-style', get_stylesheet_uri(), '', filemtime( get_stylesheet_directory() . '/style.css') );
}
*/

/*
 * Modifies the default theme footer.
 * This also applies the changes to JetPack's Infinite Scroll footer, if you're using that module.
 */
/*
function independent_publisher_footer_credits() {
	$my_custom_footer = 'This is my custom footer.';
	return $my_custom_footer;
}
*/

function wpb_add_google_fonts() {
 
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Rubik|Inconsolata|ZCOOL+KuaiLe', false ); 
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


function footer_text_changer($wp_customize) {
	$wp_customize->add_setting( 'gg_footer_text' , array(
		'default'   => 'Hello world!',
		'transport' => 'refresh',
	) );

	$wp_customize->add_section( 'independent_publisher_footer_section' , array(
		'title'      => __( 'Footer', 'independent_publisher' ),
		'priority'   => 190,
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gg_footer_text', array(
		'label'      => __( 'Footer Text', 'independent_publisher' ),
		'section'    => 'independent_publisher_footer_section',
		'settings'   => 'gg_footer_text',
		'type' => 'textarea'
	) ) );

}
add_action('customize_register','footer_text_changer');





function independent_publisher_footer_credits() {
	echo get_theme_mod( 'gg_footer_text');
}