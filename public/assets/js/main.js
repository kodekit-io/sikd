// IIFE - Immediately Invoked Function Expression
(function(main) {

    // The global jQuery object is passed as a parameter
    main(window.jQuery, window, document);

}(function($, window, document) {
    // Listen for the jQuery ready event on the document
    $(function() {
        // The DOM is ready!
        $('.sikd-btn-sidedrawer').sideNav({
            menuWidth: 250,
        });
        $('.sikd-account').dropdown();

        // listProvinsi('listProvinsi');
    });

}));


function abbr(number, decimal) {
    decimal = Math.pow(10,decimal);
    var abbrev = [ " K", " M", " B", " T" ];
    for (var i=abbrev.length-1; i>=0; i--) {
        var size = Math.pow(10,(i+1)*3);
        if(size <= number) {
            number = Math.round(number*decimal/size)/decimal;
            if((number == 1000) && (i < abbrev.length - 1)) {
                number = 1;
                i++;
            }
            number += abbrev[i];
            break;
        }
    }
    return number;
}