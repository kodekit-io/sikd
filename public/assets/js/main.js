(function(main) {
    main(window.jQuery, window, document);
}(function($, window, document) {
    $(function() {

    });

}));
//Screenshot
function capture() {
    $('main').html2canvas({
        //letterRendering: true,
        //allowTaint: true,
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