<?php if ( ! function_exists( 'ancnews_custom_style' ) ) :
function ancnews_custom_style()
{
$ancnews_header_overlay_size = get_theme_mod('ancnews_header_overlay_size',200);
?>
<style>
    .bs-default .bs-header-main .ancinner{ height:<?php echo esc_attr(get_theme_mod('ancnews_header_overlay_size',200)).'px'; ?> !important; }
    }
</style>
<?php } add_action('wp_head','ancnews_custom_style',10,0); endif; ?>
