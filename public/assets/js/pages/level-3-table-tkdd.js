var arrPush = [];
var arrPush1 = [];
var arrPush2 = [];
$(document).ready(function() {
    var ctl = "<a class='uk-icon uk-icon-plus'></a>";

    function level0(result) {
        var tkdd0 = $("#tkdd").dataTable({
            data: result.tkdd.level_0,
            dom: 't',
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
                { "data": "anggaran", "title": "Anggaran", "width": "20%" },
                { "data": "realisasi", "title": "Realisasi", "width": "20%" },
                { "data": "percent", "title": "Persen", "width": "20%" }
            ],
            order: [[1, 'asc']]
        });

        /* level_1 */
        $('#tkdd').on("click", "td.control a",function() {
            $(this).toggleClass('uk-icon-minus').toggleClass('uk-icon-plus');

            var ntr = this.parentNode.parentNode;
            var a = $.inArray(ntr, arrPush);
            if (a === -1) {
                var pos = tkdd0.fnGetPosition(ntr);
                var nDetailsRow = tkdd0.fnOpen(ntr, '<table id="tkdd1'+pos+'" class="uk-table bordered"></table>', 'details');
                $('div.innerDetails', nDetailsRow).slideDown();
                arrPush.push(ntr);

                var tkdd1 = $('#tkdd1'+pos).dataTable({
                    data: result.tkdd.level_0[pos].level_1,
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
                        { "data": "anggaran", "width": "20%" },
                        { "data": "realisasi", "width": "20%" },
                        { "data": "percent", "width": "20%" }
                    ],
                    order: [[1, 'asc']]
                });

                /* level_2 */
                $('#tkdd1'+pos).on("click", "td.control"+pos+" a",function() {
                    $(this).toggleClass('uk-icon-minus').toggleClass('uk-icon-plus');
                    var ntr1 = this.parentNode.parentNode;
                    var b = $.inArray(ntr1, arrPush1);
                    if (b === -1) {
                        var pos1 = tkdd1.fnGetPosition(ntr1);
                        var nDetailsRow1 = tkdd1.fnOpen(ntr1, '<table id="tkdd2'+pos+''+pos1+'" class="uk-table bordered"></table>', 'details1');
                        $('div.innerDetails1', nDetailsRow1).slideDown();
                        arrPush1.push(ntr1);

                        var tkdd2 = $('#tkdd2'+ pos +''+ pos1).dataTable({
                            data: result.tkdd.level_0[pos].level_1[pos1].level_2,
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
                                { "data": "anggaran", "width": "20%" },
                                { "data": "realisasi", "width": "20%" },
                                { "data": "percent", "width": "20%" }
                            ],
                            order: [[1, 'asc']]
                        });

                        /* level_3 */
                        $('#tkdd2'+ pos +''+ pos1).on("click", "td.control"+pos+pos1+" a",function() {
                            $(this).toggleClass('uk-icon-minus').toggleClass('uk-icon-plus');
                            var ntr2 = this.parentNode.parentNode;
                            var c = $.inArray(ntr2, arrPush2);
                            if (c === -1) {
                                var pos2 = tkdd2.fnGetPosition(ntr2);
                                var nDetailsRow2 = tkdd2.fnOpen(ntr2, '<table id="tkdd3'+pos+''+pos1+''+pos2+'" class="uk-table bordered"></table>', 'details2');
                                $('div.innerDetails2', nDetailsRow2).slideDown();
                                arrPush2.push(ntr2);

                                var tkdd3 = $('#tkdd3'+ pos +''+ pos1 +''+ pos2).dataTable({
                                    data: result.tkdd.level_0[pos].level_1[pos1].level_2[pos2].level_3,
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
                                        { "data": "anggaran", "width": "20%" },
                                        { "data": "realisasi", "width": "20%" },
                                        { "data": "percent", "width": "20%" }
                                    ],
                                    order: [[1, 'asc']]
                                });

                            } else {
                                tkdd2.fnClose(this.parentNode);
                                arrPush2.splice(c, 1);
                                event.stopPropagation();
                            }
                        });

                    } else {
                        tkdd1.fnClose(this.parentNode);
                        arrPush1.splice(b, 1);
                        event.stopPropagation();
                    }
                });

            } else {
                tkdd0.fnClose(this.parentNode);
                arrPush.splice(a, 1);
                event.stopPropagation();
            }
        });

    }
    $.getJSON("../data/L3_Table_TKDD.json", function(result) {
        level0(result);
    });
});