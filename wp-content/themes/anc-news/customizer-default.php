<?php
/**
 * Default theme options.
 *
 * @package Anc News
 */

if (!function_exists('ancnews_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function ancnews_get_default_theme_options() {

    $defaults = array();

    $defaults['fameup_content_layout'] = 'grid-right-sidebar';
    $defaults['blog_perk_slider_main_news_section'] = 0;

	return $defaults;

}
endif;