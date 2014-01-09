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
    $('#paging_container').pajinate({
        items_per_page: 10,
        item_container_id: '.alt_content',
        nav_panel_id: '.alt_page_navigation'
    });
});

$(document).ready(function() {
    $("#clear").click(function(){
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
        }else{
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
});
