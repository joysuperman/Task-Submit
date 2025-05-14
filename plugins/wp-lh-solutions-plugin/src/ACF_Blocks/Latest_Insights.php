<?php

namespace LH\ACF_Blocks;

class Latest_Insights extends ACF_Block
{
    static $slug = 'latest-insights';
    /**
     * Render the block
     *
     * @return Void
     */
    static function render_block($block, $content, $is_preview, $post_id, $wp_block, $context)
    {
        $el_id      = !empty($block['anchor']) ? esc_attr($block['anchor']) : 'lh-acf-block-' . mt_rand(100000, 999999);
        $el_class   = !empty($block['className']) ? explode(' ', $block['className']) : [];
        $el_class[] = 'lh-acf-block';
        $el_class[] = 'lh-acf-block-' . self::$slug;

        $section_title     = get_field('title');
        $post_type         = get_field('post_type');
        $content_selection = get_field('selection_type');
        $selected_posts    = get_field('manual_posts');
        $selected_category = get_field('category');
        $grid_columns      = get_field('grid_columns') ?: '3';
        $posts_per_page    = get_field('posts_per_page') ?: 3;
        $current_page      = isset($_GET['paged']) ? (int)$_GET['paged'] : 1;

        $posts = null;
        $show_no_posts_message = false;

        // Manual selection
        if ($content_selection === 'manual') {
            if (!empty($selected_posts)) {
                $post_ids = array_map(fn($post) => $post->ID, $selected_posts);
                $selected_post_types = array_unique(array_map(fn($p) => get_post_type($p->ID), $selected_posts));

                $args = [
                    'post_type'      => $selected_post_types ?: 'any',
                    'post__in'       => $post_ids,
                    'posts_per_page' => $posts_per_page,
                    'orderby'        => 'post__in',
                    'paged'          => $current_page
                ];

                $posts = new \WP_Query($args);
            } else {
                $posts = self::empty_query();
                $show_no_posts_message = true;
            }
        }

        // Category selection
        elseif ($content_selection === 'category') {
            if (!empty($selected_category)) {
                $term = get_term($selected_category);

                if (!is_wp_error($term) && !empty($term)) {
                    $taxonomy = $term->taxonomy;
                    $query_post_type = $post_type ?: self::get_post_types_by_taxonomy($taxonomy);

                    $args = [
                        'post_type'      => $query_post_type,
                        'tax_query'      => [[
                            'taxonomy' => $taxonomy,
                            'field'    => 'term_id',
                            'terms'    => $selected_category
                        ]],
                        'posts_per_page' => $posts_per_page,
                        'paged'          => $current_page,
                        'post_status'    => 'publish'
                    ];

                    $posts = new \WP_Query($args);
                } else {
                    $query_post_type = $post_type ?: self::get_post_types_by_taxonomy('category');

                    $args = [
                        'post_type'      => $query_post_type,
                        'cat'            => $selected_category,
                        'posts_per_page' => $posts_per_page,
                        'paged'          => $current_page,
                        'post_status'    => 'publish'
                    ];

                    $posts = new \WP_Query($args);
                }

                if (!$posts || !$posts->have_posts()) {
                    $posts = self::empty_query();
                    $show_no_posts_message = true;
                }
            } else {
                $posts = self::empty_query();
                $show_no_posts_message = true;
            }
        }

        // Auto
        elseif ($content_selection === 'auto') {
            $current_post_id = get_the_ID();

            if ($current_post_id) {
                $current_post_type = get_post_type($current_post_id);
                $taxonomy = 'category';
                $specific_taxonomy = $current_post_type . '_category';

                if (taxonomy_exists($specific_taxonomy) && is_object_in_taxonomy($current_post_type, $specific_taxonomy)) {
                    $taxonomy = $specific_taxonomy;
                }

                $categories = get_the_terms($current_post_id, $taxonomy);

                if (!empty($categories) && !is_wp_error($categories)) {
                    $category_ids = wp_list_pluck($categories, 'term_id');

                    $args = [
                        'post_type'      => $current_post_type,
                        'tax_query'      => [[
                            'taxonomy' => $taxonomy,
                            'field'    => 'term_id',
                            'terms'    => $category_ids
                        ]],
                        'posts_per_page' => $posts_per_page,
                        'post__not_in'   => [$current_post_id],
                        'paged'          => $current_page,
                        'post_status'    => 'publish',
                        'orderby'        => 'date',
                        'order'          => 'DESC'
                    ];

                    $posts = new \WP_Query($args);
                }

                if (!$posts || !$posts->have_posts()) {
                    $args = [
                        'post_type'      => $current_post_type,
                        'posts_per_page' => $posts_per_page,
                        'post__not_in'   => [$current_post_id],
                        'paged'          => $current_page,
                        'post_status'    => 'publish',
                        'orderby'        => 'date',
                        'order'          => 'DESC'
                    ];

                    $posts = new \WP_Query($args);
                }

                if (!$posts || !$posts->have_posts()) {
                    $posts = self::empty_query();
                    $show_no_posts_message = true;
                }
            } else {
                $posts = self::empty_query();
                $show_no_posts_message = true;
            }
        }

        if ($posts === null) {
            $posts = self::empty_query();
            $show_no_posts_message = true;
        }

        $post_categories = [];
        if ($posts && $posts->have_posts()) {
            while ($posts->have_posts()) {
                $posts->the_post();
                $post_id = get_the_ID();
                $post_type = get_post_type();

                $taxonomy = 'category';
                $specific_taxonomy = $post_type . '_category';

                if (taxonomy_exists($specific_taxonomy) && is_object_in_taxonomy($post_type, $specific_taxonomy)) {
                    $taxonomy = $specific_taxonomy;
                } elseif (is_object_in_taxonomy($post_type, 'category')) {
                    $taxonomy = 'category';
                }

                $categories = get_the_terms($post_id, $taxonomy);

                if (!empty($categories) && !is_wp_error($categories)) {
                    $post_categories[$post_id] = [];
                    foreach ($categories as $category) {
                        $post_categories[$post_id][] = [
                            'id' => $category->term_id,
                            'name' => $category->name,
                            'slug' => $category->slug,
                            'url' => get_term_link($category)
                        ];
                    }
                }
            }
            wp_reset_postdata();
        }

        $template_data = [
            'posts' => $posts,
            'post_categories' => $post_categories,
            'show_no_posts_message' => $show_no_posts_message,
            'section_title' => $section_title,
            'grid_columns' => $grid_columns,
            'el_id' => $el_id,
            'el_class' => $el_class,
        ];
        extract($template_data);

        require(self::get_template_path());
    }

    /**
     * Helper method to get post types that use a specific taxonomy
     * 
     * @param string $taxonomy The taxonomy name
     * @return array Array of post types
     */
    static function get_post_types_by_taxonomy($taxonomy)
    {
        global $wp_taxonomies;
        $post_types = [];

        if (isset($wp_taxonomies[$taxonomy])) {
            $post_types = $wp_taxonomies[$taxonomy]->object_type;
        }

        if (empty($post_types)) {
            $post_types = get_post_types(['public' => true]);
            unset($post_types['attachment'], $post_types['page']);
        }

        return $post_types;
    }

    /**
     * Returns an empty WP_Query object
     *
     * @return WP_Query
     */
    static function empty_query()
    {
        return new \WP_Query(['post__in' => [0]]);
    }
}
