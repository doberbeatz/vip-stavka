(function ($) {

    window.PixelAdmin.start(init);

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