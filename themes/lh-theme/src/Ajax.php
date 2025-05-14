<?php

namespace LH_THEME;

class Ajax
{
    /**
     * Get pagination HTML for AJAX endpoint to get posts listing
     * 
     * Some parameters for this function are taken from $_POST global variable
     * 
     * @param integer $max_page
     * 
     * @return void
     */
    public function get_pagination($max_page)
    {
        $base_url                       = isset($_POST['base_url'])             ? esc_attr($_POST['base_url'])                  : "/";
        $page_num                       = isset($_POST['posts_page'])           ? (int)esc_attr($_POST['posts_page'])           : 1;
        $first_pages_count              = isset($_POST['first_pages_count'])    ? (int)esc_attr($_POST['first_pages_count'])    : 3;
        $last_pages_count               = isset($_POST['last_pages_count'])     ? (int)esc_attr($_POST['last_pages_count'])     : 3;
        $around_current_page_count      = isset($_POST['around_current_page'])  ? (int)esc_attr($_POST['around_current_page'])  : 4;
        $display_all_count_less_than    = isset($_POST['display_all_count'])    ? (int)esc_attr($_POST['display_all_count'])    : 6;
        $ajaxed_pagination = true;

        ob_start();
        lh_print_pagination($base_url, $max_page, $page_num, $first_pages_count, $last_pages_count, $around_current_page_count, $display_all_count, $ajaxed_pagination);
        $pagination_html = ob_get_contents();
        ob_end_clean();

        return $pagination_html;
    }
}
