<?php
if (!function_exists('ancnews_header_type_section')) :
/**
 *  Header
 *
 * @since Fameup
 *
 */
function ancnews_header_type_section()
{
    do_action('fameup_action_side_menu_section');
?> 
    <header class="bs-default">
    <?php 
        do_action('ancnews_action_header_logo_section');
        do_action('fameup_action_header_menu_section');  ?>
    </header>
<?php }
endif;
add_action('ancnews_action_header_type_section', 'ancnews_header_type_section', 6);