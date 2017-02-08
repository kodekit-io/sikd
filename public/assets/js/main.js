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
        //letterRendering: true,
        allowTaint: true,
        background: '#eeeeee',
        onrendered: function (canvas) {
            var url = canvas.toDataURL();
            //var url = Canvas2Image.saveAsPNG(canvas);
            $("<a>", {
                href: url,
                download: "sikd.png"
            })
            .on("click", function() {
                $(this).remove();
            })
            .appendTo("body")[0].click();
        }
    });
}