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
//Screenshot
function capture() {
    $('main').html2canvas({
        letterRendering: true,
        background: '#cccccc',
        onrendered: function (canvas) {
            var a = document.createElement('a');
            a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
            a.download = 'sikd.jpg';
            a.click();
        }
    });
}