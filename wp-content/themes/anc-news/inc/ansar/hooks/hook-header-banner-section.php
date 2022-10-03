<?php //Banner Advertisment
if (!function_exists('ancnews_banner_advertisement')):
    /**
     *
     * @since fameup 1.0.0
     *
     */
    function ancnews_banner_advertisement()
    {

        if (('' != fameup_get_option('banner_advertisement_section')) ) { ?>
            <div class="col-md-9 col-sm-12">  
                <?php if (('' != fameup_get_option('banner_advertisement_section'))):

                    $fameup_banner_advertisement = fameup_get_option('banner_advertisement_section');
                    $fameup_banner_advertisement = absint($fameup_banner_advertisement);
                    $fameup_banner_advertisement = wp_get_attachment_image($fameup_banner_advertisement, 'full');
                    $fameup_banner_advertisement_url = fameup_get_option('banner_advertisement_section_url');
                    $fameup_banner_advertisement_url = isset($fameup_banner_advertisement_url) ? esc_url($fameup_banner_advertisement_url) : '#';
                    $fameup_open_on_new_tab = get_theme_mod('fameup_open_on_new_tab',true);
                    ?>
                    <div class="header-ads text-end">
                        <a <?php echo esc_url($fameup_banner_advertisement_url); ?> href="<?php echo $fameup_banner_advertisement_url; ?>"
                            <?php if($fameup_open_on_new_tab) { ?>target="_blank" <?php } ?> >
                            <?php echo $fameup_banner_advertisement; ?>
                        </a>
                    </div>
                <?php endif; ?>                

            </div>
            <!-- Trending line END -->
            <?php
        }
    }
endif;

add_action('ancnews_action_banner_advertisement', 'ancnews_banner_advertisement', 10);