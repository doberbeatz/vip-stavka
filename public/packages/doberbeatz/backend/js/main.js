(function ($) {

    window.PixelAdmin.start(init);

    $('.js-image-collection').each(function () {
        var ic = new ICCollection();
        ic.$el = $(this);
        var icView = new ICCollectionView({
            collection : ic
        });
    });

    $('input.year').datepicker({
        format: "yyyy",
        startView: 1,
        minViewMode: 2
    });

    $(".jquery-select2").select2();

    $('.switcher-sm').on('click', function () {
        var $this = $(this);
        var url = $this.data('url'),
            name = $this.find('input').attr('name');
        sendData = {data:{}};

        sendData.data[name] = !$this.hasClass('checked')?1:0;
        if (url) {
            $.ajax({
                url: url,
                data: sendData,
                dataType: "JSON",
                type: "GET"
            });
        }
    });

})(jQuery);