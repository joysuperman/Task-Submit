(function ($) {
    const initialize_block = function (_$block) {
        return _$block;
    };

    $(function () {
        $('.lh-acf-block.lh-acf-block-cta-banner').each(function () {
            initialize_block($(this));
        });
    });
    if (window.acf) {
        window.acf.addAction(
            'render_block_preview/type=lh/cta-banner',
            initialize_block
        );
    }
})(jQuery);
