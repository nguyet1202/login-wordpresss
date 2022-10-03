<?php /**
 * Theme functions and definitions
 *
 * @package Anc News
 */
if ( ! function_exists( 'ancnews_enqueue_styles' ) ) :
    /**
     * @since 0.1
     */
    function ancnews_enqueue_styles() {
        wp_enqueue_style( 'fameup-style-parent', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'ans-news-style', get_stylesheet_directory_uri() . '/style.css', array( 'fameup-style-parent' ), '1.0' );
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
        anc_news_color_css();
        if(is_rtl()){
        wp_enqueue_style( 'fameup_style_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css' );
        }
        
    }

endif;
add_action( 'wp_enqueue_scripts', 'ancnews_enqueue_styles', 9999 );


/* color css file. */
require( get_stylesheet_directory() . '/css/colors/color-css.php');


require( get_stylesheet_directory() . '/customizer-default.php');

require( get_stylesheet_directory() . '/inc/ansar/hooks/hook-header-banner-section.php');

require( get_stylesheet_directory() . '/inc/ansar/hooks/hook-header-logo-section.php');

require( get_stylesheet_directory() . '/inc/ansar/hooks/hook-header-type-section.php');

require( get_stylesheet_directory() . '/inc/ansar/widgets/widget-recent-news.php');

require( get_stylesheet_directory() . '/css/custom-style.php');

function ancnews_theme_setup() {

//Load text domain for translation-ready
load_theme_textdomain('ancnews', get_stylesheet_directory() . '/languages');

// custom header Support
            $args = array(
            'default-image'     =>  '',
            'width'         => '1600',
            'height'        => '600',
            'flex-height'       => false,
            'flex-width'        => false,
            'header-text'       => true,
            'default-text-color'    => '#fff'
        );
        add_theme_support( 'custom-header', $args );
} 
add_action( 'after_setup_theme', 'ancnews_theme_setup' );

function ancnews_remove_some_widgets(){
// Unregister Frontpage sidebar
unregister_sidebar( 'front-page-sidebar' );
}
add_action( 'widgets_init', 'ancnews_remove_some_widgets', 11 );

function ancnews_menu(){ ?>
<script>
jQuery('a,input').bind('focus', function() {
    if(!jQuery(this).closest(".menu-item").length && ( jQuery(window).width() <= 992) ) {
    jQuery('.navbar-collapse').removeClass('show');
}})
</script>
<?php }
add_action( 'wp_footer', 'ancnews_menu' );

if ( ! function_exists( 'fameup_header_color' ) ) :

function fameup_header_color() {
    $fameup_logo_text_color = get_header_textcolor();
    $ancnews_title_font_size = get_theme_mod('ancnews_title_font_size',50);

    ?>
    <style type="text/css">
    <?php
        if ( ! display_header_text() ) :
    ?>
        .site-title,
        .site-description {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
        }
    <?php
        else :
    ?>
        body .site-title a,
        body .site-description {
            color: #<?php echo esc_attr( $fameup_logo_text_color ); ?>;
        }

        .site-branding-text .site-title a {
                font-size: <?php echo esc_attr( $ancnews_title_font_size ); ?>px;
            }

            @media only screen and (max-width: 640px) {
                .site-branding-text .site-title a {
                    font-size: 40px;

                }
            }

            @media only screen and (max-width: 375px) {
                .site-branding-text .site-title a {
                    font-size: 32px;

                }
            }

    <?php endif; ?>
    </style>
    <?php
}
endif;

/************************* Theme Customizer with Sanitize function *********************************/
function ancnews_theme_option( $wp_customize )
{
    function ancnews_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

            /*--- Site title Font size **/
    $wp_customize->add_setting('ancnews_title_font_size',
        array(
            'default'           => 50,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control('ancnews_title_font_size',
        array(
            'label'    => esc_html__('Site Title Size', 'anc-news'),
            'section'  => 'title_tagline',
            'type'     => 'number',
            'priority' => 50,
        )
    );

    $wp_customize->add_setting('ancnews_header_overlay_size',
        array(
            'default'           => 200,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control('ancnews_header_overlay_size',
        array(
            'label'    => esc_html__('Height', 'anc-news'),
            'section'  => 'header_image',
            'type'     => 'number',
            'priority' => 100,
        )
    );

/*--- Get Site info control ---*/
$wp_customize->get_control( 'header_textcolor')->section = 'title_tagline';

$wp_customize->remove_control('fameup_title_font_size');

$wp_customize->remove_control('fameup_header_overlay_size');

}
add_action('customize_register','ancnews_theme_option');


if ( ! function_exists( 'fameup_custom_js' ) ) :
add_action( 'wp_footer', 'anc_news_remmove_script', 11 );
function anc_news_remmove_script()
{
    wp_dequeue_script( 'fameup-custom-time' );
}
endif;