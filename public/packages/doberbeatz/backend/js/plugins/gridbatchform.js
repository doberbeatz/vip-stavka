/**
 * Форма под гридом
 */
(function ($) {

    init.push(function () {
        function updateFormAction(action) {
            $form.attr('action', action);
        };

        var $select = $('.js-form-batch-select'),
            $form = $select.closest('form');

        updateFormAction($select.val());

        $select.on('change', function (event) {
            updateFormAction($select.val());
        });
    });

})(jQuery);