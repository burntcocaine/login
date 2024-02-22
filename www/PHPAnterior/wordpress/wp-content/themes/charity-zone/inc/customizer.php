<?php
/**
 * Charity Zone Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Charity Zone
 */

if ( ! defined( 'CHARITY_ZONE_URL' ) ) {
    define( 'CHARITY_ZONE_URL', esc_url( 'https://www.themagnifico.net/themes/charity-wordpress-theme/', 'charity-zone') );
}
if ( ! defined( 'CHARITY_ZONE_TEXT' ) ) {
    define( 'CHARITY_ZONE_TEXT', __( 'Charity Zone Pro','charity-zone' ));
}
if ( ! defined( 'CHARITY_ZONE_BUY_TEXT' ) ) {
    define( 'CHARITY_ZONE_BUY_TEXT', __( 'Buy Charity Zone Pro','charity-zone' ));
}

use WPTRT\Customize\Section\Charity_Zone_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Charity_Zone_Button::class );

    $manager->add_section(
        new Charity_Zone_Button( $manager, 'charity_zone_pro', [
            'title'       => CHARITY_ZONE_TEXT,
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'charity-zone' ),
            'button_url'  => CHARITY_ZONE_URL
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'charity-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'charity-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function charity_zone_customize_register($wp_customize){

    // Pro Version
    class Charity_Zone_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( CHARITY_ZONE_BUY_TEXT,'charity-zone' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Charity_Zone_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->add_setting('charity_zone_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'charity_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'charity_zone_logo_title_text',array(
      'label'          => __( 'Enable Disable Title', 'charity-zone' ),
      'section'        => 'title_tagline',
      'settings'       => 'charity_zone_logo_title_text',
      'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('charity_zone_theme_description', array(
      'default' => false,
      'sanitize_callback' => 'charity_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'charity_zone_theme_description',array(
      'label'          => __( 'Enable Disable Tagline', 'charity-zone' ),
      'section'        => 'title_tagline',
      'settings'       => 'charity_zone_theme_description',
      'type'           => 'checkbox',
    )));

    //Logo
    $wp_customize->add_setting('charity_zone_logo_max_height',array(
        'default'   => '',
        'sanitize_callback' => 'charity_zone_sanitize_number_absint'
    ));
    $wp_customize->add_control('charity_zone_logo_max_height',array(
        'label' => esc_html__('Logo Width','charity-zone'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // Theme Color
    $wp_customize->add_section('charity_zone_color_option',array(
        'title' => esc_html__('Theme Color','charity-zone'),
        'priority'   => 10
    ));

    $wp_customize->add_setting( 'charity_zone_theme_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'charity_zone_theme_color', array(
        'label' => esc_html__('First Color Option','charity-zone'),
        'section' => 'charity_zone_color_option',
        'settings' => 'charity_zone_theme_color'
    )));

    $wp_customize->add_setting( 'charity_zone_theme_color_2', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'charity_zone_theme_color_2', array(
        'label' => esc_html__('Second Color Option','charity-zone'),
        'section' => 'charity_zone_color_option',
        'settings' => 'charity_zone_theme_color_2'
    )));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_theme_color', array(
        'sanitize_callback' => 'Charity_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Charity_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_theme_color', array(
        'section'     => 'charity_zone_color_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'charity-zone' ),
        'description' => esc_url( CHARITY_ZONE_URL ),
        'priority'    => 100
    )));

    // General Settings
     $wp_customize->add_section('charity_zone_general_settings',array(
        'title' => esc_html__('General Settings','charity-zone'),
        'priority'   => 30,
    ));
    
    $wp_customize->add_setting('charity_zone_preloader_hide', array(
        'default' => false,
        'sanitize_callback' => 'charity_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'charity_zone_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'charity-zone' ),
        'section'        => 'charity_zone_general_settings',
        'settings'       => 'charity_zone_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'charity_zone_preloader_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'charity_zone_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','charity-zone'),
        'section' => 'charity_zone_general_settings',
        'settings' => 'charity_zone_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'charity_zone_preloader_dot_1_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'charity_zone_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','charity-zone'),
        'section' => 'charity_zone_general_settings',
        'settings' => 'charity_zone_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'charity_zone_preloader_dot_2_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'charity_zone_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','charity-zone'),
        'section' => 'charity_zone_general_settings',
        'settings' => 'charity_zone_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('charity_zone_scroll_hide', array(
        'default' => '',
        'sanitize_callback' => 'charity_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'charity_zone_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'charity-zone' ),
        'section'        => 'charity_zone_general_settings',
        'settings'       => 'charity_zone_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('charity_zone_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'charity_zone_sanitize_choices'
    ));
    $wp_customize->add_control('charity_zone_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'charity_zone_general_settings',
        'choices' => array(
            'Right' => __('Right','charity-zone'),
            'Left' => __('Left','charity-zone'),
            'Center' => __('Center','charity-zone')
        ),
    ) );

    $wp_customize->add_setting('charity_zone_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'charity_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'charity_zone_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'charity-zone' ),
        'section'        => 'charity_zone_general_settings',
        'settings'       => 'charity_zone_sticky_header',
        'type'           => 'checkbox',
    )));

     // Product Columns
    $wp_customize->add_setting( 'charity_zone_products_per_row' , array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'charity_zone_sanitize_select',
    ) );

    $wp_customize->add_control('charity_zone_products_per_row', array(
        'label' => __( 'Product per row', 'charity-zone' ),
        'section'  => 'charity_zone_general_settings',
        'type'     => 'select',
        'choices'  => array(
            '2' => '2',
            '3' => '3',
            '4' => '4',
        ),
    ) );

    $wp_customize->add_setting('charity_zone_product_per_page',array(
        'default'   => '9',
        'sanitize_callback' => 'charity_zone_sanitize_float'
    ));
    $wp_customize->add_control('charity_zone_product_per_page',array(
        'label' => __('Product per page','charity-zone'),
        'section'   => 'charity_zone_general_settings',
        'type'      => 'number'
    ));

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('charity_zone_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'charity_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'charity_zone_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'charity-zone' ),
        'section'        => 'charity_zone_general_settings',
        'settings'       => 'charity_zone_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

  $wp_customize->add_setting('charity_zone_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'charity_zone_sanitize_choices'
    ));
    $wp_customize->add_control('charity_zone_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','charity-zone'),
        'section' => 'charity_zone_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','charity-zone'),
            'Right Sidebar' => __('Right Sidebar','charity-zone'),
        ),
    ) );

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('charity_zone_woocommerce_shop_page_sidebar', array(
        'default' => false,
        'sanitize_callback' => 'charity_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'charity_zone_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'charity-zone' ),
        'section'        => 'charity_zone_general_settings',
        'settings'       => 'charity_zone_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

  $wp_customize->add_setting('charity_zone_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'charity_zone_sanitize_choices'
    ));
    $wp_customize->add_control('charity_zone_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','charity-zone'),
        'section' => 'charity_zone_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','charity-zone'),
            'Right Sidebar' => __('Right Sidebar','charity-zone'),
        ),
    ) );

    $wp_customize->add_setting('charity_zone_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'charity_zone_sanitize_choices'
    ));
    $wp_customize->add_control('charity_zone_woocommerce_product_sale',array(
        'type' => 'radio',
        'section' => 'charity_zone_general_settings',
        'choices' => array(
            'Right' => __('Right','charity-zone'),
            'Left' => __('Left','charity-zone'),
            'Center' => __('Center','charity-zone')
        ),
    ) );

     // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Charity_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Charity_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'charity_zone_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'charity-zone' ),
        'description' => esc_url( CHARITY_ZONE_URL ),
        'priority'    => 100
    )));

    // Top Header
    $wp_customize->add_section('charity_zone_top_header',array(
        'title' => esc_html__('Top Header','charity-zone'),
        'priority'   => 110
    ));

    $wp_customize->add_setting('charity_zone_phone_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('charity_zone_phone_icon',array(
        'label' => esc_html__('Phone Icon','charity-zone'),
        'section' => 'charity_zone_top_header',
        'setting' => 'charity_zone_phone_icon',
        'type'  => 'text',
        'default' => 'fa fa-phone-square',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-phone-square','charity-zone')
    ));

    $wp_customize->add_setting('charity_zone_phone_number_info',array(
        'default' => '',
        'sanitize_callback' => 'charity_zone_sanitize_phone_number'
    ));
    $wp_customize->add_control('charity_zone_phone_number_info',array(
        'label' => esc_html__('Phone Number','charity-zone'),
        'section' => 'charity_zone_top_header',
        'setting' => 'charity_zone_phone_number_info',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('charity_zone_email_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('charity_zone_email_icon',array(
        'label' => esc_html__('Email Icon','charity-zone'),
        'section' => 'charity_zone_top_header',
        'setting' => 'charity_zone_email_icon',
        'type'  => 'text',
        'default' => 'fas fa-envelope-square',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-envelope-square','charity-zone')
    ));

    $wp_customize->add_setting('charity_zone_email_info',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('charity_zone_email_info',array(
        'label' => esc_html__('Email Address','charity-zone'),
        'section' => 'charity_zone_top_header',
        'setting' => 'charity_zone_email_info',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('charity_zone_donate_button',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('charity_zone_donate_button',array(
        'label' => esc_html__('Donate Page Link','charity-zone'),
        'section' => 'charity_zone_top_header',
        'setting' => 'charity_zone_donate_button',
        'type'  => 'url'
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_top_header_setting', array(
        'sanitize_callback' => 'Charity_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Charity_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_top_header_setting', array(
        'section'     => 'charity_zone_top_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'charity-zone' ),
        'description' => esc_url( CHARITY_ZONE_URL ),
        'priority'    => 100
    )));

    // Social Link
    $wp_customize->add_section('charity_zone_social_link',array(
        'title' => esc_html__('Social Links','charity-zone'),
        'priority'   => 110
    ));

    $wp_customize->add_setting('charity_zone_facebook_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('charity_zone_facebook_icon',array(
        'label' => esc_html__('Social Icon','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_facebook_icon',
        'type'  => 'text',
        'default' => 'fab fa-facebook-f',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-facebook-f','charity-zone')
    ));

    $wp_customize->add_setting('charity_zone_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('charity_zone_facebook_url',array(
        'label' => esc_html__('Facebook Link','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('charity_zone_twitter_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('charity_zone_twitter_icon',array(
        'label' => esc_html__('Social Icon','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_twitter_icon',
        'type'  => 'text',
        'default' => 'fab fa-twitter',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-twitter','charity-zone')
    ));

    $wp_customize->add_setting('charity_zone_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('charity_zone_twitter_url',array(
        'label' => esc_html__('Twitter Link','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_twitter_url',
        'type'  => 'url'
    ));

     $wp_customize->add_setting('charity_zone_instagram_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('charity_zone_instagram_icon',array(
        'label' => esc_html__('Social Icon','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_instagram_icon',
        'type'  => 'text',
        'default' => 'fab fa-instagram',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-instagram','charity-zone')
    ));

    $wp_customize->add_setting('charity_zone_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('charity_zone_intagram_url',array(
        'label' => esc_html__('Intagram Link','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('charity_zone_linkedin_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('charity_zone_linkedin_icon',array(
        'label' => esc_html__('Social Icon','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_linkedin_icon',
        'type'  => 'text',
        'default' => 'fab fa-linkedin-in',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-linkedin-in','charity-zone')
    ));

    $wp_customize->add_setting('charity_zone_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('charity_zone_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('charity_zone_pinterest_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('charity_zone_pinterest_icon',array(
        'label' => esc_html__('Social Icon','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_pinterest_icon',
        'type'  => 'text',
        'default' => 'fab fa-pinterest-p',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-pinterest-p','charity-zone')
    ));

    $wp_customize->add_setting('charity_zone_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('charity_zone_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','charity-zone'),
        'section' => 'charity_zone_social_link',
        'setting' => 'charity_zone_pintrest_url',
        'type'  => 'url'
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_social_setting', array(
        'sanitize_callback' => 'Charity_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Charity_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_social_setting', array(
        'section'     => 'charity_zone_social_link',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'charity-zone' ),
        'description' => esc_url( CHARITY_ZONE_URL ),
        'priority'    => 100
    )));

    //Slider
    $wp_customize->add_section('charity_zone_top_slider',array(
        'title' => esc_html__('Slider Settings','charity-zone'),
        'description' => esc_html__('Here you have to add 3 different pages in below dropdown. Note: Image Dimensions 1200 x 400 px','charity-zone'),
        'priority'   => 130
    ));

    $wp_customize->add_setting('charity_zone_slider_setting', array(
        'default' => false,
        'sanitize_callback' => 'charity_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'charity_zone_slider_setting',array(
        'label'          => __( 'Enable Disable Slider', 'charity-zone' ),
        'section'        => 'charity_zone_top_slider',
        'settings'       => 'charity_zone_slider_setting',
        'type'           => 'checkbox',
    )));

    for ( $charity_zone_count = 1; $charity_zone_count <= 3; $charity_zone_count++ ) {

        $wp_customize->add_setting( 'charity_zone_top_slider_page' . $charity_zone_count, array(
            'default'           => '',
            'sanitize_callback' => 'charity_zone_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'charity_zone_top_slider_page' . $charity_zone_count, array(
            'label'    => __( 'Select Slide Page', 'charity-zone' ),
            'section'  => 'charity_zone_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    //Opacity
    $wp_customize->add_setting('charity_zone_slider_opacity_color',array(
      'default'              => '',
      'sanitize_callback' => 'charity_zone_sanitize_choices'
    ));

    $wp_customize->add_control( 'charity_zone_slider_opacity_color', array(
    'label'       => esc_html__( 'Slider Image Opacity','charity-zone' ),
    'section'     => 'charity_zone_top_slider',
    'type'        => 'select',
    'choices' => array(
      '0' =>  esc_attr('0','charity-zone'),
      '0.1' =>  esc_attr('0.1','charity-zone'),
      '0.2' =>  esc_attr('0.2','charity-zone'),
      '0.3' =>  esc_attr('0.3','charity-zone'),
      '0.4' =>  esc_attr('0.4','charity-zone'),
      '0.5' =>  esc_attr('0.5','charity-zone'),
      '0.6' =>  esc_attr('0.6','charity-zone'),
      '0.7' =>  esc_attr('0.7','charity-zone'),
      '0.8' =>  esc_attr('0.8','charity-zone'),
      '0.9' =>  esc_attr('0.9','charity-zone')
    ),
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Charity_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Charity_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'charity_zone_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'charity-zone' ),
        'description' => esc_url( CHARITY_ZONE_URL ),
        'priority'    => 100
    )));

    //Our Services section
    $wp_customize->add_section( 'charity_zone_services_section' , array(
        'title'      => __( 'Services Settings', 'charity-zone' ),
        'priority'   => 140
    ) );

    $wp_customize->add_setting('charity_zone_services_setting', array(
        'default' => false,
        'sanitize_callback' => 'charity_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'charity_zone_services_setting',array(
        'label'          => __( 'Enable Disable Services', 'charity-zone' ),
        'section'        => 'charity_zone_services_section',
        'settings'       => 'charity_zone_services_setting',
        'type'           => 'checkbox',
    )));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('charity_zone_services',array(
        'default'   => 'select',
        'sanitize_callback' => 'charity_zone_sanitize_choices',
    ));
    $wp_customize->add_control('charity_zone_services',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display Services','charity-zone'),
        'description' => __('Image Size (50 x 50)','charity-zone'),
        'section' => 'charity_zone_services_section',
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_services_setting', array(
        'sanitize_callback' => 'Charity_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Charity_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_services_setting', array(
        'section'     => 'charity_zone_services_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'charity-zone' ),
        'description' => esc_url( CHARITY_ZONE_URL ),
        'priority'    => 100
    )));

    //About
    $wp_customize->add_section('charity_zone_about_section',array(
        'title' => esc_html__('About Settings','charity-zone'),
        'priority'   => 150
    ));

    $wp_customize->add_setting('charity_zone_about_setting', array(
        'default' => false,
        'sanitize_callback' => 'charity_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'charity_zone_about_setting',array(
        'label'          => __( 'Enable Disable About', 'charity-zone' ),
        'section'        => 'charity_zone_about_section',
        'settings'       => 'charity_zone_about_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'charity_zone_about_page', array(
        'default'           => '24',
        'sanitize_callback' => 'charity_zone_sanitize_dropdown_pages'
    ) );
    $wp_customize->add_control( 'charity_zone_about_page', array(
        'label'    => __( 'Select About Page', 'charity-zone' ),
        'section'  => 'charity_zone_about_section',
        'type'     => 'dropdown-pages'
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_about_setting', array(
        'sanitize_callback' => 'Charity_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Charity_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_about_setting', array(
        'section'     => 'charity_zone_about_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'charity-zone' ),
        'description' => esc_url( CHARITY_ZONE_URL ),
        'priority'    => 100
    )));

    // Footer
    $wp_customize->add_section('charity_zone_site_footer_section', array(
        'title' => esc_html__('Footer', 'charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('charity_zone_footer_text_setting', array(
        'label' => __('Replace the footer text', 'charity-zone'),
        'section' => 'charity_zone_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('charity_zone_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'charity_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control('charity_zone_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','charity-zone'),
        'section' => 'charity_zone_site_footer_section',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Charity_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Charity_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'charity_zone_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'charity-zone' ),
        'description' => esc_url( CHARITY_ZONE_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('charity_zone_post_settings',array(
        'title' => esc_html__('Post Settings','charity-zone'),
        'priority'   =>40,
    ));

     $wp_customize->add_setting('charity_zone_post_page_title',array(
        'sanitize_callback' => 'charity_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('charity_zone_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'charity-zone'),
        'section'     => 'charity_zone_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_post_page_meta',array(
        'sanitize_callback' => 'charity_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('charity_zone_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'charity-zone'),
        'section'     => 'charity_zone_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_post_page_thumb',array(
        'sanitize_callback' => 'charity_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('charity_zone_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'charity-zone'),
        'section'     => 'charity_zone_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_post_page_cat',array(
        'sanitize_callback' => 'charity_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('charity_zone_post_page_cat',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Category And Tags', 'charity-zone'),
        'section'     => 'charity_zone_post_settings',
        'description' => esc_html__('Check this box to enable category and tags on post page.', 'charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_single_post_thumb',array(
        'sanitize_callback' => 'charity_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('charity_zone_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'charity-zone'),
        'section'     => 'charity_zone_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_single_post_meta',array(
        'sanitize_callback' => 'charity_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('charity_zone_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'charity-zone'),
        'section'     => 'charity_zone_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_single_post_title',array(
            'sanitize_callback' => 'charity_zone_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('charity_zone_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'charity-zone'),
        'section'     => 'charity_zone_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_single_post_tags',array(
            'sanitize_callback' => 'charity_zone_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('charity_zone_single_post_tags',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Category and Tags', 'charity-zone'),
        'section'     => 'charity_zone_post_settings',
        'description' => esc_html__('Check this box to enable category and tags on single post.', 'charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('charity_zone_single_post_comment_title',array(
        'label' => __('Add Comment Title','charity-zone'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'charity-zone' ),
        ),
        'section'=> 'charity_zone_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('charity_zone_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('charity_zone_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','charity-zone'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'charity-zone' ),
        ),
        'section'=> 'charity_zone_post_settings',
        'type'=> 'text'
    ));

     // Page Settings
    $wp_customize->add_section('charity_zone_page_settings',array(
        'title' => esc_html__('Page Settings','charity-zone'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('charity_zone_single_page_title',array(
            'sanitize_callback' => 'charity_zone_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('charity_zone_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'charity-zone'),
        'section'     => 'charity_zone_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'charity-zone'),
    ));

    $wp_customize->add_setting('charity_zone_single_page_thumb',array(
        'sanitize_callback' => 'charity_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('charity_zone_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'charity-zone'),
        'section'     => 'charity_zone_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'charity-zone'),
    ));
}
add_action('customize_register', 'charity_zone_customize_register');

/*
** Load dynamic logic for the customizer controls area.
*/
function charity_zone_panels_js() {
    wp_enqueue_style( 'charity-zone-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'charity-zone-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'charity_zone_panels_js' );
