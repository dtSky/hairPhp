//
//document.addEventListener("contextmenu", function(e){
//    e.preventDefault();
//}, false);
//
//document.onkeypress = function (event) {
//        event = (event || window.event);
//        if (event.keyCode === 123) {
//           //alert('No F-12');
//            return false;
//        }
//    }
//    document.onmousedown = function (event) {
//        event = (event || window.event);
//        if (event.keyCode === 123) {
//            //alert('No F-keys');
//            return false;
//        }
//    }
//document.onkeydown = function (event) {
//        event = (event || window.event);
//        if (event.keyCode === 123) {
//            //alert('No F-keys');
//            return false;
//        }
//    }

//$(function() {
//    $(".input-search").keyup(function() {
//        //pega o css da tabela 
//        var tabela = $(this).attr('alt');
//        if ($(this).val() !== "") {
//            $("." + tabela + " tbody>tr").hide();
//            $("." + tabela + " td:contains-ci('" + $(this).val() + "')").parent("tr").show();
//        } else {
//            $("." + tabela + " tbody>tr").show();
//        }
//    });
//});
//$.extend($.expr[":"], {
//    "contains-ci": function(elem, i, match, array) {
//        return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
//    }
//});



$(document).ready(function() {

    $.site = 'http://localhost/hairphp/';
    $('#paging_container').pajinate({
        items_per_page: 40,
        item_container_id: '.alt_content',
        nav_panel_id: '.alt_page_navigation'
    });
    $("#clear").click(function() {

    });
    $(document).ready(function() {
        $("#clear").click(function() {

            $("input").val('');
            $("tbody").show();
            $(".alt_page_navigation").show();
            $("#tbody").hide();
        });
        $(".input-search").keyup(function() {
            var data = $(this).val();
            $("tbody").hide();
            $(".alt_page_navigation").hide();
            $("#tbody").show();
            //alert(data);
            if (data === '') {
                $("tbody").show();
                $(".alt_page_navigation").show();
                $("#tbody").hide();
            } else {


                $.ajax({
                    type: "POST",
                    url: "../admin/cliente",
                    data: {
                        search: data
                    }
                }).done(function(ok) {
                    $("#tbody").html(ok);
                });
            }
        });
        $("#estado").ready(function() {
            $.ajax({
                type: "GET",
                url: $.site + "public/xml/estados.xml",
                dataType: "xml",
                success: function(data) {

                    $(data).find('ESTADO').each(function() {

                        var id = $(this).find('ID').text();
                        var sigla = $(this).find('SIGLA').text();
                        $("#estado").append("<option value='" + id + "'>" + sigla + "</option>");
                    });
                }
            });
        });
        $("#estado").change(function() {
            var idestado = $(this).val();
            $("#cidade").html("<option>Carregando...</option>");
            $.ajax({
                type: "GET",
                url: "../../../public/xml/cidades.xml",
                dataType: "xml",
                success: function(data) {
                    $("#cidade").html("<option></option>");
                    $(data).find('CIDADE').each(function() {

                        var id = $(this).find('ID').text();
                        var nome = $(this).find('NOME').text();
                        if ($(this).find('IDESTADO').text() === idestado) {
                            $("#cidade").append("<option value='" + id + "'>" + nome + "</option>");
                        }


                    });
                }
            });
        });
    });
});

