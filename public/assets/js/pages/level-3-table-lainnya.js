$(document).ready(function() {
    var tableInfrastruktur = '<h5>Infrastruktur</h5>'
        + '<div class="uk-overflow-auto">'
            + '<table class="uk-table uk-table-striped" id="Infrastruktur" style="width: 100%"></table>'
        + '</div>';
    $('#lainnya').append(tableInfrastruktur);

    function infrastruktur(result) {
        var Infrastruktur = $("#Infrastruktur").dataTable({
            data: result.lainnya.Infrastruktur[0].data,
            dom: 't',
            language: {"sZeroRecords": "", "sEmptyTable": "Tidak ada data"},
            columns: [
                { "data": "id", "title": "ID", "width": "10%" },
                { "data": "name", "title": "Infrastruktur", "width": "45%" },
                { "data": "anggaran", "title": "Anggaran", "width": "45%", "class": "uk-text-right",
                    "render": function ( cellData ) {
                        var v = numeral(cellData).format('0,0');
                        return v;
                    }
                }
            ],
            order: [[0, 'asc']]
        });
    }

    var tableSimpananPemda = '<h5>Simpanan Pemda</h5>'
        + '<div class="uk-overflow-auto">'
            + '<table class="uk-table uk-table-striped" id="SimpananPemda" style="width: 100%"></table>'
        + '</div>';
    $('#lainnya').append(tableSimpananPemda);

    function simpananPemda(result) {
        var SimpananPemda = $("#SimpananPemda").dataTable({
            data: result.lainnya.SimpananPemda,
            dom: 't',
            columns: [
                { "data": "tahun", "title": "Tahun", "width": "50%" },
                { "data": "value", "title": "Value", "width": "50%", "class": "uk-text-right",
                    "render": function ( cellData ) {
                        var v = numeral(cellData).format('0,0');
                        return v;
                    }
                }
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