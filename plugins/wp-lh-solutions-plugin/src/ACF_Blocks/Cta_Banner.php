<?php

namespace LH\ACF_Blocks;

class Cta_Banner extends ACF_Block
{
    static $slug = 'cta-banner';

    /**
     * Render the block
     *
     * @return Void
     */
    static function render_block($block, $content, $is_preview, $post_id, $wp_block, $context)
    {
        $el_id      = (!empty($block['anchor']) ? esc_attr($block['anchor']) : 'lh-acf-block-' . mt_rand(100000, 999999));
        $el_class   = !empty($block['className']) ? explode(' ', $block['className']) : [];
        $el_class[] = 'lh-acf-block';
        $el_class[] = 'lh-acf-block-' . self::$slug;

        // Get field values
        $section_title = get_field('section_title');
        $title = get_field('title');
        $description = get_field('description');
        $primary_button = get_field('primary_button');
        $secondary_button = get_field('secondary_button');
        $background_color = get_field('background_color');
        $background_image = get_field('background_image');

        require(self::get_template_path());
    }
}
