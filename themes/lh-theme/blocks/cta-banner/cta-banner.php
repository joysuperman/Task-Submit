<section
    id="<?php print $el_id; ?>"
    class="<?php print implode(' ', $el_class); ?>">

    <div class="lh-cta-banner-block__container">
        <?php lh_print_block_style(self::$slug); ?>
        <?php if (!empty($section_title)) : ?>
            <div class="lh-cta-banner__header">
                <h2 class="lh-cta-banner__title">
                    <span class="lh-icon-megaphone">
                        <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1745 5.08134C9.95187 8.80267 5.6332 11.7147 2.0212 13.3547C1.44787 13.604 0.998536 14.0733 0.774536 14.6573C0.549203 15.2467 0.57187 15.9027 0.838536 16.4747C1.38654 17.6587 2.21187 19.4293 2.7652 20.616C3.03454 21.1907 3.5252 21.632 4.1252 21.8373C4.71987 22.04 5.37187 21.9947 5.93187 21.712C9.49987 19.984 14.5119 18.58 19.4319 18.4987L13.1745 5.08134ZM14.5639 3.32667L21.6665 18.5573C22.0679 18.5853 22.4665 18.624 22.8625 18.6733C23.7185 18.8027 24.5625 18.4613 25.0759 17.7827C25.5932 17.0973 25.6905 16.1827 25.3279 15.404C23.7799 12.0493 20.9172 5.90934 19.3519 2.552C18.9852 1.768 18.2159 1.25067 17.3519 1.20934C16.4959 1.16667 15.6852 1.59867 15.2425 2.32934C15.0265 2.66667 14.7999 3 14.5639 3.32667Z" fill="#FD7A23" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.8828 8.89067L27.2988 7.76401C27.7988 7.53067 28.0161 6.93467 27.7828 6.43467C27.5494 5.93467 26.9534 5.71734 26.4534 5.95067L24.0374 7.07734C23.5361 7.31067 23.3201 7.90667 23.5534 8.40667C23.7868 8.90667 24.3814 9.12401 24.8828 8.89067Z" fill="#FD7A23" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M25.4852 13.4347L27.9906 14.3467C28.5092 14.536 29.0839 14.268 29.2732 13.7493C29.4612 13.2307 29.1932 12.656 28.6759 12.468L26.1692 11.556C25.6506 11.3667 25.0759 11.6347 24.8879 12.1533C24.6986 12.672 24.9666 13.2467 25.4852 13.4347Z" fill="#FD7A23" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.8227 4.37867L23.7347 1.87334C23.9241 1.35467 23.6561 0.780003 23.1374 0.59067C22.6187 0.40267 22.0441 0.67067 21.8561 1.18934L20.9441 3.69467C20.7547 4.21334 21.0227 4.788 21.5414 4.976C22.0601 5.16534 22.6334 4.89734 22.8227 4.37867Z" fill="#FD7A23" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.4143 20.3573C12.5717 20.7053 10.7997 21.2013 9.19434 21.7853L10.7503 25.1213C11.2957 26.2893 12.6837 26.7947 13.8517 26.2507C14.0503 26.1573 14.257 26.0613 14.4557 25.968C15.017 25.7067 15.4503 25.2333 15.6623 24.652C15.8743 24.0707 15.8463 23.428 15.5837 22.868L14.4143 20.3573Z" fill="#FD7A23" />
                        </svg>

                    </span>
                    <?php echo esc_html($section_title); ?>
                </h2>
            </div>
        <?php endif; ?>
        <?php
        $style = '';
        if (!empty($background_image) && !empty($background_color)) {
            $style .= 'background-image: url(" . esc_url($background_image) . "); ';
            $style .= 'background-size: cover; ';
            $style .= 'background-position: center; ';
            $style .= 'background-color: ' . esc_attr($background_color) . ';';
        } else {
            $default_image = get_template_directory_uri() . '/assets/images/default-cta-background.png';
            $style .= 'background-image: url(' . esc_url($default_image) . '); ';
            $style .= 'background-size: cover; ';
            $style .= 'background-position: center; ';
            $style .= 'background-color: ' . esc_attr($background_color) . ';';
        }
        ?>
        <div class="lh-cta-banner__container" style="<?php echo esc_attr($style); ?>">
            <div class="lh-cta-banner__content">
                <?php if (!empty($title)) : ?>
                    <h3 class="lh-cta-banner-content__title"><?php echo esc_html($title); ?></h3>
                <?php endif; ?>

                <?php if (!empty($description)) : ?>
                    <p class="lh-cta-banner__description">
                        <?php echo wp_kses_post($description); ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="lh-cta-banner__buttons">
                <?php if (!empty($primary_button) && !empty($primary_button['text']) && !empty($primary_button['link'])) : ?>
                    <a href="<?php echo esc_url($primary_button['link']); ?>" class="lh-cta-banner__button lh-cta-banner__button--primary">
                        <?php echo esc_html($primary_button['text']); ?>
                    </a>
                <?php endif; ?>

                <?php if (!empty($secondary_button) && !empty($secondary_button['text']) && !empty($secondary_button['link'])) : ?>
                    <a href="<?php echo esc_url($secondary_button['link']); ?>" class="lh-cta-banner__button lh-cta-banner__button--secondary">
                        <?php echo esc_html($secondary_button['text']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>