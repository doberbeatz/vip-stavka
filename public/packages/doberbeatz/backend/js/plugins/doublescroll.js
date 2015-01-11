/**
 * Горзионтальный и вертикальный скролл для высоких и широких таблиц
 */
(function () {

    init.push(function () {
        var $container = $('.js-double-scroll'),
            $topscroll = $container.find('.js-topscroll'),
            $content = $container.find('.js-content'),
            $fake = $container.find('.js-fake'),
            content_width = $content.find('table').width();

        $topscroll.width($container.width());
        $content.width(content_width);
        $fake.width(content_width);

        $container.on('scroll', function () {
            $topscroll.scrollLeft($(this).scrollLeft());
        });
        $topscroll.on('scroll', function () {
            $container.scrollLeft($(this).scrollLeft());
        });
    });

})(jQuery);