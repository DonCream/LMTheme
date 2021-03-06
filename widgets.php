<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lm_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'right-sidebar', 'lm' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'lm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          =>  esc_html__( 'Footer Sidebar', 'lm' ),
		'id'            => 'footer_sidebar',
		'before_widget' => '',
    	'after_widget' => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widget_init',  'lm_widgets_init' );
