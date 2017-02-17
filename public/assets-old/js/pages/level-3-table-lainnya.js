$(document).ready(function() {
    var tableInfrastruktur = '<h4 class="uk-text-uppercase">Infrastruktur</h4><table class="uk-table bordered" id="Infrastruktur" style="width: 100%"></table>';
    $('#lainnya').append(tableInfrastruktur);

    function infrastruktur(result) {
        var Infrastruktur = $("#Infrastruktur").dataTable({
            data: result.lainnya.Infrastruktur[0].data,
            dom: 't',
            columns: [
                { "data": "id", "title": "ID", "width": "10%" },
                { "data": "name", "title": "Infrastruktur", "width": "45%" },
                { "data": "anggaran", "title": "Anggaran", "width": "45%" }
            ],
            order: [[0, 'asc']]
        });
    }

    var tableSimpananPemda = '<h4 class="uk-text-uppercase">Simpanan Pemda</h4><table class="uk-table bordered" id="SimpananPemda" style="width: 100%"></table>';
    $('#lainnya').append(tableSimpananPemda);

    function simpananPemda(result) {
        var SimpananPemda = $("#SimpananPemda").dataTable({
            data: result.lainnya.SimpananPemda,
            dom: 't',
            columns: [
                { "data": "tahun", "title": "Tahun", "width": "50%" },
                { "data": "value", "title": "Value", "width": "50%" }
            ],
            order: [[0, 'asc']]
        });
    }

    var $otherTableUrl = $baseUrl + '/get-pemda-other-table-data/' + $satkerCode;
    $.getJSON($otherTableUrl, function(result) {
        infrastruktur(result);
        simpananPemda(result);
    });
});