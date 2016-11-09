(function ($) {
    $('#autocomplete').autocomplete({
        source: 'pays/index.json',        
        minLength: 1
    });
})(jQuery);
