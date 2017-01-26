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