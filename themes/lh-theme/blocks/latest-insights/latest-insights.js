/* eslint-disable no-tabs */
(function ($) {
    const initialize_block = function ($block) {
        initPopup($block);
        return $block;
    };

    function initPopup ($block) {
        const $items = $block.find('.lh-latest-insights__item-link');
        const $popup = $block.find('.lh-latest-insights__popup');
        const $popupTitle = $popup.find('.lh-latest-insights__popup-title');
        const $popupBody = $popup.find('.lh-latest-insights__popup-body');
        const $popupClose = $popup.find('.lh-latest-insights__popup-close');
        const $popupOverlay = $popup.find('.lh-latest-insights__popup-overlay');

        $items.on('click', function (e) {
            e.preventDefault();
            const postId = $(this).data('post-id');
            $('body').append($spinner);

            $.ajax({
                url: window.ajaxurl || '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    action: 'get_post_content',
                    post_id: postId,
                    nonce: window.lh_theme ? window.lh_theme.nonce : '',
                },
                success: function (response) {
                    if (response.success) {
                        $popupTitle.text(response.data.title);
                        $popupBody.html(response.data.content);
                        $spinner.remove();
                        $popup.fadeIn(300);
                    } else {
                        $spinner.remove();
                        $popupTitle.text('Error');
                        $popupBody.html(
                            '<p>Could not load content. Please try again.</p>'
                        );
                        $popup.fadeIn(300);
                    }
                },
                error: function () {
                    $spinner.remove();
                    $popupTitle.text('Error');
                    $popupBody.html(
                        '<p>Could not load content. Please try again.</p>'
                    );
                    $popup.fadeIn(300);
                },
            });
        });

        const $spinner = $(
            '<div class="lh-spinner"><div></div><div></div><div></div><div></div></div>'
        );

        if (!$('#lh-spinner-styles').length) {
            $('head').append(`
                <style id="lh-spinner-styles">
                    .lh-spinner {
                        display: inline-block;
                        position: fixed;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 80px;
                        height: 80px;
                        z-index: 9999;
                    }
                    .lh-spinner div {
                        position: absolute;
                        top: 33px;
                        width: 13px;
                        height: 13px;
                        border-radius: 50%;
                        background: #FD7A23;
                        animation-timing-function: cubic-bezier(0, 1, 1, 0);
                    }
                    .lh-spinner div:nth-child(1) {
                        left: 8px;
                        animation: lh-spinner1 0.6s infinite;
                    }
                    .lh-spinner div:nth-child(2) {
                        left: 8px;
                        animation: lh-spinner2 0.6s infinite;
                    }
                    .lh-spinner div:nth-child(3) {
                        left: 32px;
                        animation: lh-spinner2 0.6s infinite;
                    }
                    .lh-spinner div:nth-child(4) {
                        left: 56px;
                        animation: lh-spinner3 0.6s infinite;
                    }
                    @keyframes lh-spinner1 {
                        0% { transform: scale(0); }
                        100% { transform: scale(1); }
                    }
                    @keyframes lh-spinner3 {
                        0% { transform: scale(1); }
                        100% { transform: scale(0); }
                    }
                    @keyframes lh-spinner2 {
                        0% { transform: translate(0, 0); }
                        100% { transform: translate(24px, 0); }
                    }
                </style>
            `);
        }
        $popupClose.add($popupOverlay).on('click', function () {
            $popup.fadeOut(300);
        });
        $(document).on('keydown', function (e) {
            if (e.key === 'Escape' && $popup.is(':visible')) {
                $popup.fadeOut(300);
            }
        });
    }

    $(function () {
        $('.lh-acf-block.lh-acf-block-latest-insights').each(function () {
            initialize_block($(this));
        });

        $(window).on('popstate', function () {
            location.reload();
        });
    });

    if (window.acf) {
        window.acf.addAction(
            'render_block_preview/type=lh/latest-insights',
            initialize_block
        );
    }
})(jQuery);
