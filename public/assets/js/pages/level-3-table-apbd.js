var arrPush = [];
var arrPush1 = [];
var arrPush2 = [];
$(document).ready(function() {
    var ctl = "<a class='fa fa-plus'></a>";

    function level0(result) {
        var apbd0 = $("#apbd").dataTable({
            data: result.apbd.level_0,
            dom: 't',
            language: {"sZeroRecords": "", "sEmptyTable": "Tidak ada data"},
            columns: [
                {
                    "data": null, "class": "control", "orderable": false, "width": "5%",
                    "render": function ( data ) {
                        if (data.level_1 != null) {
                            return ctl;
                        } else {
                            return '';
                        }
                    }
                },
                { "data": "id", "title": "ID", "width": "15%" },
                { "data": "name", "title": "Nama", "width": "20%" },
                { "data": "anggaran", "title": "Anggaran", "width": "20%", "class": "uk-text-right",
                    "render": function ( cellData ) {
                        var v = numeral(cellData).format('0,0');
                        return v;
                    }
                },
                { "data": "realisasi", "title": "Realisasi", "width": "20%", "class": "uk-text-right",
                    "render": function ( cellData ) {
                        var v = numeral(cellData).format('0,0');
                        return v;
                    }
                },
                { "data": "percent", "title": "Persen", "width": "20%", "class": "uk-text-right",
                    "render": function ( cellData ) {
                        var v = numeral(cellData).format('0.0');
                        return v+'%';
                    }
                }
            ],
            order: [[1, 'asc']]
        });

        /* level_1 */
        $('#apbd').on("click", "td.control a",function() {
            $(this).toggleClass('fa-minus').toggleClass('fa-plus');

            var ntr = this.parentNode.parentNode;
            var a = $.inArray(ntr, arrPush);
            if (a === -1) {
                var pos = apbd0.fnGetPosition(ntr);
                var nDetailsRow = apbd0.fnOpen(ntr, '<table id="apbd1'+pos+'" class="uk-table bordered"></table>', 'details');
                $('div.innerDetails', nDetailsRow).slideDown();
                arrPush.push(ntr);

                var apbd1 = $('#apbd1'+pos).dataTable({
                    data: result.apbd.level_0[pos].level_1,
                    dom: 't',
                    columns: [
                        {
                            "data": null, "class": "control"+pos, "orderable": false, "width": "5%",
                            "render": function ( data ) {
                                if (data.level_2 != null) {
                                    return ctl;
                                } else {
                                    return '';
                                }
                            }
                        },
                        { "data": "id", "width": "15%" },
                        { "data": "name", "width": "20%" },
                        { "data": "anggaran", "width": "20%", "class": "uk-text-right",
                            "render": function ( cellData ) {
                                var v = numeral(cellData).format('0,0');
                                return v;
                            }
                        },
                        { "data": "realisasi", "width": "20%", "class": "uk-text-right",
                            "render": function ( cellData ) {
                                var v = numeral(cellData).format('0,0');
                                return v;
                            }
                        },
                        { "data": "percent", "width": "20%", "class": "uk-text-right",
                            "render": function ( cellData ) {
                                var v = numeral(cellData).format('0.0');
                                return v+'%';
                            }
                        }
                    ],
                    order: [[1, 'asc']]
                });

                /* level_2 */
                $('#apbd1'+pos).on("click", "td.control"+pos+" a",function() {
                    $(this).toggleClass('fa-minus').toggleClass('fa-plus');
                    var ntr1 = this.parentNode.parentNode;
                    var b = $.inArray(ntr1, arrPush1);
                    if (b === -1) {
                        var pos1 = apbd1.fnGetPosition(ntr1);
                        var nDetailsRow1 = apbd1.fnOpen(ntr1, '<table id="apbd2'+pos+''+pos1+'" class="uk-table bordered"></table>', 'details1');
                        $('div.innerDetails1', nDetailsRow1).slideDown();
                        arrPush1.push(ntr1);

                        var apbd2 = $('#apbd2'+ pos +''+ pos1).dataTable({
                            data: result.apbd.level_0[pos].level_1[pos1].level_2,
                            dom: 't',
                            columns: [
                                {
                                    "data": null, "class": "control"+pos+pos1, "orderable": false, "width": "5%",
                                    "render": function ( data ) {
                                        if (data.level_3 != null) {
                                            return ctl;
                                        } else {
                                            return '';
                                        }
                                    }
                                },
                                { "data": "id", "width": "15%" },
                                { "data": "name", "width": "20%" },
                                { "data": "anggaran", "width": "20%", "class": "uk-text-right",
                                    "render": function ( cellData ) {
                                        var v = numeral(cellData).format('0,0');
                                        return v;
                                    }
                                },
                                { "data": "realisasi", "width": "20%", "class": "uk-text-right",
                                    "render": function ( cellData ) {
                                        var v = numeral(cellData).format('0,0');
                                        return v;
                                    }
                                },
                                { "data": "percent", "width": "20%", "class": "uk-text-right",
                                    "render": function ( cellData ) {
                                        var v = numeral(cellData).format('0.0');
                                        return v+'%';
                                    }
                                }
                            ],
                            order: [[1, 'asc']]
                        });

                        /* level_3 */
                        $('#apbd2'+ pos +''+ pos1).on("click", "td.control"+pos+pos1+" a",function() {
                            $(this).toggleClass('fa-minus').toggleClass('fa-plus');
                            var ntr2 = this.parentNode.parentNode;
                            var c = $.inArray(ntr2, arrPush2);
                            if (c === -1) {
                                var pos2 = apbd2.fnGetPosition(ntr2);
                                var nDetailsRow2 = apbd2.fnOpen(ntr2, '<table id="apbd3'+pos+''+pos1+''+pos2+'" class="uk-table bordered"></table>', 'details2');
                                $('div.innerDetails2', nDetailsRow2).slideDown();
                                arrPush2.push(ntr2);

                                var apbd3 = $('#apbd3'+ pos +''+ pos1 +''+ pos2).dataTable({
                                    data: result.apbd.level_0[pos].level_1[pos1].level_2[pos2].level_3,
                                    dom: 't',
                                    columns: [
                                        {
                                            "data": null, "class": "control"+pos+pos1+pos2, "orderable": false, "width": "5%",
                                            "render": function ( data ) {
                                                if (data.level_4 != null) {
                                                    return ctl;
                                                } else {
                                                    return '';
                                                }
                                            }
                                        },
                                        { "data": "id", "width": "15%" },
                                        { "data": "name", "width": "20%" },
                                        { "data": "anggaran", "width": "20%", "class": "uk-text-right",
                                            "render": function ( cellData ) {
                                                var v = numeral(cellData).format('0,0');
                                                return v;
                                            }
                                        },
                                        { "data": "realisasi", "width": "20%", "class": "uk-text-right",
                                            "render": function ( cellData ) {
                                                var v = numeral(cellData).format('0,0');
                                                return v;
                                            }
                                        },
                                        { "data": "percent", "width": "20%", "class": "uk-text-right",
                                            "render": function ( cellData ) {
                                                var v = numeral(cellData).format('0.0');
                                                return v+'%';
                                            }
                                        }
                                    ],
                                    order: [[1, 'asc']]
                                });

                            } else {
                                apbd2.fnClose(this.parentNode);
                                arrPush2.splice(c, 1);
                                event.stopPropagation();
                            }
                        });

                    } else {
                        apbd1.fnClose(this.parentNode);
                        arrPush1.splice(b, 1);
                        event.stopPropagation();
                    }
                });

            } else {
                apbd0.fnClose(this.parentNode);
                arrPush.splice(a, 1);
                event.stopPropagation();
            }
        });

    }

    var $apbdTableUrl = $baseUrl + '/get-pemda-apbd-table-data/' + $year + '/' + $satkerCode;
    $.getJSON($apbdTableUrl, function(result) {
        level0(result);
    });
    
    /*
    var $apbdTableUrl = $baseUrl + '/data/L3_Table_APBD.json';
    $.getJSON($apbdTableUrl, function(result) {
        level0(result);
    });
    */
});