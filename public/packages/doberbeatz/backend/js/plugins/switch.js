(function ($) {
	 init.push(function () {
		var	dependClassName = 'switcher',
			workClassName = 'js-switch',
			workFn = function ($el) {
	            $el.switcher({
		            'on_state_content': 'вкл',
		            'off_stat_content': 'выкл'
		        });
	        };
    workFn($('.' + workClassName));

    $.subscribe('newElement', function (e, $el) {
    	if ($el.data('depends').indexOf(dependClassName) >= 0) {
            workFn($el.find('.' + workClassName));        		
    	}
    });
});
})(jQuery);