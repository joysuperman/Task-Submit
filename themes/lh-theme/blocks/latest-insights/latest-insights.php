<section id="<?php print $el_id; ?>" class="<?php print implode(' ', $el_class); ?>" data-grid-columns="<?php echo esc_attr($grid_columns); ?>">
    <?php lh_print_block_style(self::$slug); ?>
    <div class="lh-latest-insights-block__container">
        <?php if (!empty($section_title)) : ?>
            <div class="lh-latest-insights__header">
                <h2 class="lh-latest-insights__title">
                    <span class="lh-icon-lightbulb">
                        <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0184 0.300003H14.9877C14.9571 0.300003 14.9233 0.300003 14.8896 0.306143C14.3927 0.361351 14.0216 0.787701 14.0308 1.28459V3.22613C14.0185 3.75985 14.4417 4.20458 14.9785 4.21686C15.5153 4.22913 15.957 3.80585 15.9692 3.26908V1.28459C15.9784 0.750896 15.5521 0.309214 15.0184 0.300003ZM7.48836 5.97438C7.47608 5.96519 7.46688 5.95598 7.45767 5.94679L6.08356 4.57879C5.9026 4.3917 5.65109 4.28126 5.39036 4.28126C5.35663 4.28126 5.32289 4.28126 5.28916 4.2874C4.75544 4.34261 4.37204 4.8211 4.42727 5.35479C4.45179 5.57871 4.55609 5.78728 4.71557 5.94679L6.08356 7.3209C6.4547 7.70737 7.07122 7.72271 7.45767 7.34849C7.84722 6.97737 7.85948 6.36392 7.48836 5.97438ZM25.2936 4.57572C25.1065 4.38556 24.8489 4.28126 24.582 4.2874C24.3305 4.29354 24.0943 4.40089 23.9165 4.57879L22.5424 5.94679C22.1559 6.31791 22.1436 6.93443 22.5147 7.3209C22.8858 7.71044 23.4993 7.72271 23.8888 7.35156C23.898 7.34237 23.9073 7.33009 23.9165 7.3209L25.2844 5.94679C25.6648 5.57257 25.6709 4.95913 25.2936 4.57572ZM3.40894 13.894H1.42136C0.887669 13.8817 0.442917 14.305 0.430655 14.8418C0.418393 15.3785 0.844724 15.8202 1.37844 15.8325H3.36293C3.89969 15.8447 4.34444 15.4214 4.35671 14.8847C4.36899 14.351 3.94264 13.9062 3.40894 13.894ZM28.6215 13.894H26.6371C26.1034 13.8817 25.6586 14.305 25.6463 14.8418C25.6341 15.3785 26.0574 15.8202 26.5942 15.8325H28.5786C29.1123 15.8447 29.5571 15.4214 29.5693 14.8847C29.5816 14.351 29.1553 13.9062 28.6215 13.894ZM7.48529 22.4086C7.29512 22.2123 7.03441 22.105 6.76142 22.1111H6.74914C6.49765 22.1203 6.25839 22.2246 6.08356 22.4055L4.71557 23.7797C4.31071 24.1293 4.26162 24.7397 4.61129 25.1476C4.95789 25.5525 5.57134 25.6016 5.97928 25.2519C6.01609 25.2213 6.0529 25.1845 6.08356 25.1476L7.45767 23.7797C7.84415 23.4085 7.85643 22.7951 7.48529 22.4086ZM25.401 23.8962C25.3642 23.8533 25.3273 23.8165 25.2844 23.7797L23.9165 22.4055C23.7355 22.2184 23.4839 22.1111 23.2233 22.1111C22.6865 22.108 22.2509 22.5405 22.2479 23.0773C22.2448 23.341 22.3521 23.5956 22.5424 23.7797L23.9165 25.1476C24.263 25.5556 24.8765 25.6077 25.2844 25.2642C25.6954 24.9176 25.7476 24.3072 25.401 23.8962Z" fill="#FD7A23" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.5528 29.5491C18.5416 30.2006 18.0018 30.7144 17.3502 30.6995H12.6516C12.0224 30.7181 11.4863 30.2378 11.4416 29.6086C11.3933 28.9608 11.881 28.3949 12.5288 28.3465C12.5325 28.3465 12.5325 28.3428 12.5325 28.3428C12.5735 28.3428 12.6107 28.3428 12.6516 28.3465H17.4023C18.0539 28.3614 18.5677 28.8975 18.5528 29.5491Z" fill="#FD7A23" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 6.13388C10.1906 6.13388 6.27065 10.0538 6.27065 14.8632C6.27065 17.866 7.83495 20.4763 10.1507 22.0436V25.482C10.1507 26.0187 10.5862 26.4512 11.1199 26.4512H18.8801C19.4137 26.4512 19.8493 26.0187 19.8493 25.482V22.0436C22.165 20.4763 23.7293 17.866 23.7293 14.8632C23.7293 10.0538 19.8094 6.13388 15 6.13388ZM14.9969 11.9555C13.3774 11.9555 12.0892 13.2499 12.0892 14.8663C12.0892 15.403 11.6567 15.8386 11.1199 15.8386C10.5832 15.8386 10.1476 15.403 10.1476 14.8663C10.1476 12.2009 12.3285 10.0139 14.9969 10.0139C15.5337 10.0139 15.9662 10.4464 15.9662 10.9832C15.9662 11.5199 15.5337 11.9555 14.9969 11.9555Z" fill="#FD7A23" />
                        </svg>
                    </span>
                    <?php echo esc_html($section_title); ?>
                </h2>
            </div>
        <?php endif; ?>

        <div class="lh-latest-insights__grid lh-latest-insights__grid--columns-<?php echo esc_attr($grid_columns); ?>">
            <?php if ($posts && $posts->have_posts()) : ?>
                <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                    <div class="lh-latest-insights__item">
                        <div class="lh-latest-insights__item-link" data-post-type="<?php echo get_post_type(); ?>" data-post-id="<?php echo get_the_ID(); ?>">
                            <div class="lh-latest-insights__item-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium_large'); ?>
                                <?php else : ?>
                                    <div class="lh-latest-insights__item-image-placeholder"></div>
                                <?php endif; ?>
                            </div>
                            <div class="lh-latest-insights__item-content">
                                <div class="lh-latest-insights__item-category-wrap">
                                    <?php
                                    if (isset($content_selection) && $content_selection === 'category' && !empty($selected_category)) {
                                        $term = get_term($selected_category);
                                        if (!is_wp_error($term) && !empty($term)) {
                                            echo '<div class="lh-latest-insights__item-category">';
                                            echo esc_html($term->name);
                                            echo '</div>';
                                        }
                                    } else {
                                        if (!empty($post_categories[get_the_ID()])) {
                                            foreach ($post_categories[get_the_ID()] as $category) {
                                                echo '<div class="lh-latest-insights__item-category">';
                                                echo esc_html($category['name']);
                                                echo '</div>';
                                            }
                                        } else {
                                            $post_type = get_post_type();
                                            $taxonomy = 'category'; // Default
                                            $specific_taxonomy = $post_type . '_category';

                                            if (taxonomy_exists($specific_taxonomy) && is_object_in_taxonomy($post_type, $specific_taxonomy)) {
                                                $taxonomy = $specific_taxonomy;
                                            } elseif (is_object_in_taxonomy($post_type, 'category')) {
                                                $taxonomy = 'category';
                                            }

                                            $terms = get_the_terms(get_the_ID(), $taxonomy);

                                            if (!empty($terms) && !is_wp_error($terms)) {
                                                foreach ($terms as $term) {
                                                    echo '<div class="lh-latest-insights__item-category">';
                                                    echo esc_html($term->name);
                                                    echo '</div>';
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <h3 class="lh-latest-insights__item-title"><?php the_title(); ?></h3>
                            </div>

                            <div class="lh-latest-insights__item-read-more">
                                <span class="lh-latest-insights__read-more-text">Read This</span>
                                <span class="lh-latest-insights__read-more-arrow">
                                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.24407 0.410765C7.56951 0.0853278 8.09715 0.0853278 8.42258 0.410765L13.4226 5.41077C13.5789 5.56705 13.6667 5.77901 13.6667 6.00002C13.6667 6.22104 13.5789 6.433 13.4226 6.58928L8.42258 11.5893C8.09715 11.9147 7.56951 11.9147 7.24407 11.5893C6.91864 11.2638 6.91864 10.7362 7.24407 10.4108L10.8215 6.83335L1.16666 6.83336C0.706424 6.83336 0.333328 6.46026 0.333328 6.00002C0.333328 5.53978 0.706424 5.16669 1.16666 5.16669L10.8215 5.16669L7.24407 1.58928C6.91864 1.26384 6.91864 0.736202 7.24407 0.410765Z" fill="#FD7A23" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="lh-latest-insights__no-posts">
                    <p><?php _e('No posts found.', 'lh-theme'); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($posts && $posts->max_num_pages > 1) : ?>
            <div class="lh-latest-insights__pagination"
                data-total-pages="<?php echo esc_attr($posts->max_num_pages); ?>"
                data-current-page="<?php echo esc_attr($current_page); ?>"
                data-posts-per-page="<?php echo esc_attr($posts_per_page); ?>"
                data-grid-columns="<?php echo esc_attr($grid_columns); ?>">
                <?php if ($current_page <= 1) : ?>
                    <a href="#" class="lh-latest-insights__pagination-prev disabled" aria-disabled="true">Previous</a>
                <?php else : ?>
                    <a href="<?php echo esc_url(add_query_arg('paged', max(1, $current_page - 1))); ?>" class="lh-latest-insights__pagination-prev">Previous</a>
                <?php endif; ?>

                <div class="lh-latest-insights__pagination-numbers">
                    <?php
                    $total_pages = $posts->max_num_pages;

                    $pagination_range = wp_is_mobile() ? 1 : 2;

                    if ($current_page > 1) {
                        echo '<a href="' . esc_url(add_query_arg('paged', 1)) . '" class="lh-latest-insights__pagination-number">1</a>';
                    } else {
                        echo '<a href="' . esc_url(add_query_arg('paged', 1)) . '" class="lh-latest-insights__pagination-number active">1</a>';
                    }

                    if ($current_page - $pagination_range > 2) {
                        echo '<span class="lh-latest-insights__pagination-ellipsis">...</span>';
                    }

                    for ($i = max(2, $current_page - $pagination_range); $i <= min($current_page + $pagination_range, $total_pages - 1); $i++) {
                        if ($i == $current_page) {
                            echo '<a href="' . esc_url(add_query_arg('paged', $i)) . '" class="lh-latest-insights__pagination-number active">' . $i . '</a>';
                        } else {
                            echo '<a href="' . esc_url(add_query_arg('paged', $i)) . '" class="lh-latest-insights__pagination-number">' . $i . '</a>';
                        }
                    }

                    if ($current_page + $pagination_range < $total_pages - 1) {
                        echo '<span class="lh-latest-insights__pagination-ellipsis">...</span>';
                    }
                    if ($total_pages > 1) {
                        if ($current_page < $total_pages) {
                            echo '<a href="' . esc_url(add_query_arg('paged', $total_pages)) . '" class="lh-latest-insights__pagination-number">' . $total_pages . '</a>';
                        } else {
                            echo '<a href="' . esc_url(add_query_arg('paged', $total_pages)) . '" class="lh-latest-insights__pagination-number active">' . $total_pages . '</a>';
                        }
                    }
                    ?>
                </div>

                <?php if ($current_page >= $posts->max_num_pages) : ?>
                    <span class="lh-latest-insights__pagination-next disabled" aria-disabled="true">Next</span>
                <?php else : ?>
                    <a href="<?php echo esc_url(add_query_arg('paged', min($posts->max_num_pages, $current_page + 1))); ?>" class="lh-latest-insights__pagination-next">Next</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Popup Container -->
        <div class="lh-latest-insights__popup" style="display: none;">

            <div class="lh-latest-insights__popup-overlay"></div>
            <div class="lh-latest-insights__popup-content">
                <div class="lh-latest-insights__popup-content-inner">
                    <button class="lh-latest-insights__popup-close">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.4 17.5L12 13.9L15.6 17.5L17 16.1L13.4 12.5L17 8.9L15.6 7.5L12 11.1L8.4 7.5L7 8.9L10.6 12.5L7 16.1L8.4 17.5ZM12 22.5C10.6167 22.5 9.31667 22.2375 8.1 21.7125C6.88333 21.1875 5.825 20.475 4.925 19.575C4.025 18.675 3.3125 17.6167 2.7875 16.4C2.2625 15.1833 2 13.8833 2 12.5C2 11.1167 2.2625 9.81667 2.7875 8.6C3.3125 7.38333 4.025 6.325 4.925 5.425C5.825 4.525 6.88333 3.8125 8.1 3.2875C9.31667 2.7625 10.6167 2.5 12 2.5C13.3833 2.5 14.6833 2.7625 15.9 3.2875C17.1167 3.8125 18.175 4.525 19.075 5.425C19.975 6.325 20.6875 7.38333 21.2125 8.6C21.7375 9.81667 22 11.1167 22 12.5C22 13.8833 21.7375 15.1833 21.2125 16.4C20.6875 17.6167 19.975 18.675 19.075 19.575C18.175 20.475 17.1167 21.1875 15.9 21.7125C14.6833 22.2375 13.3833 22.5 12 22.5ZM12 20.5C14.2333 20.5 16.125 19.725 17.675 18.175C19.225 16.625 20 14.7333 20 12.5C20 10.2667 19.225 8.375 17.675 6.825C16.125 5.275 14.2333 4.5 12 4.5C9.76667 4.5 7.875 5.275 6.325 6.825C4.775 8.375 4 10.2667 4 12.5C4 14.7333 4.775 16.625 6.325 18.175C7.875 19.725 9.76667 20.5 12 20.5Z" fill="#B8B8B8" />
                        </svg>
                    </button>
                    <div class="lh-latest-insights__popup-header">
                        <h2 class="lh-latest-insights__popup-title"></h2>
                    </div>
                    <div class="lh-latest-insights__popup-body"></div>
                </div>
            </div>
        </div>
    </div>
</section>