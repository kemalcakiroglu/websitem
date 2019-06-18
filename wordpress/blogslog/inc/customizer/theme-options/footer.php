<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage BlogSlog
 * @since BlogSlog 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'blogslog_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'blogslog' ),
		'priority'   			=> 900,
		'panel'      			=> 'blogslog_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'blogslog_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'blogslog_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'blogslog_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'blogslog' ),
		'section'    			=> 'blogslog_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogslog_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'blogslog_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'blogslog_copyright_text_partial',
    ) );
}


// footer text
$wp_customize->add_setting( 'blogslog_theme_options[powered_by_text]',
	array(
		'default'       		=> $options['powered_by_text'],
		'sanitize_callback'		=> 'blogslog_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'blogslog_theme_options[powered_by_text]',
    array(
		'label'      			=> esc_html__( 'Powered By Text', 'blogslog' ),
		'section'    			=> 'blogslog_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogslog_theme_options[powered_by_text]', array(
		'selector'            => '.site-info .powered-by p',
		'settings'            => 'blogslog_theme_options[powered_by_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'blogslog_powered_by_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'blogslog_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'blogslog_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogSlog_Switch_Control( $wp_customize, 'blogslog_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'blogslog' ),
		'section'    			=> 'blogslog_section_footer',
		'on_off_label' 		=> blogslog_switch_options(),
    )
) );