var page = 1, rank = 1, frame = 1, price = 0, order = 0, champ_str = "", skin_str = "";

$(document).ready(function() {
    $('#skinFilter').on('change', function(){
        var item = $(".dropdown[data-filter='trang-phuc'] ul.typeahead li.active").data('value');
        skin_str = item;
        load_account_list();
        $(".dropdown[data-filter='trang-phuc'] button").html(item);
        $(".dropdown[data-filter='trang-phuc']").toggleClass("open");
    });
    $('#champFilter').on('change', function(){
        var item = $(".dropdown[data-filter='tim-theo-tuong'] ul.typeahead li.active").data('value');
        champ_str = item;
        load_account_list();
        $(".dropdown[data-filter='tim-theo-tuong'] button").html(item);
        $(".dropdown[data-filter='tim-theo-tuong']").toggleClass("open");
    });
$(document).ready(function () {
    $.get('/assets/js/json/skin_lq.php', function (data) {
        $('#skinFilter').typeahead({source: data,});
    }, "json");
    $.get('/assets/js/json/champion_lq.php', function (data) {
        $('#champFilter').typeahead({source: data})
    }, "json");
});
    $(document).on('click', '.acfiit', function (e) {
        e.preventDefault();

        if (!$(this).closest('li').hasClass('is-multi')) {
            $(this).closest('ul').find('a.acfiitac').removeClass('acfiitac');
        }

        $(this).closest('li').find('i').addClass('show-remove');
        $(this).addClass('acfiitac');

        var _name = '';

        $(this).closest('ul').find('li').each(function (i) {
            if ($(this).find('a').hasClass('acfiitac')) {
                _name += (_name === '' ? '' : ', ') + $(this).find('a').text();
            }
        });

        $(this).closest('.dropdown').find('.dropdown-toggle').html(_name + '<span class="caret"></span>');

        if ($(this).closest('li').hasClass('is-multi')) {
            return false;
        }

    });

    $(".dropdown ul.dropdown-menu.select li").click(function() {
        page = 1;
        load_account_list();
    });

    // $('.btn-filter').click(function (e) {
    //     e.preventDefault();
    //     page = 1;
    //     load_account_list();
    // });

    $('.sa-ftbtndel').click(function (e) {
        e.preventDefault();
        order = 0;
        page = 1;
        rank = 1;
        frame = 1;
        price = 0;
        champ_str = "";
        skin_str = "";
        $(".dropdown[data-filter='tim-theo-rank'] button").html("Tìm Theo Rank <span class='caret'></span>");
        $(".dropdown[data-filter='tim-theo-khung'] button").html("Tìm Theo Khung <span class='caret'></span>");
        $(".dropdown[data-filter='tim-theo-gia'] button").html("Tìm Theo Giá <span class='caret'></span>");
        $(".dropdown[data-filter='sap-xep'] button").html("Sắp Xếp Theo <span class='caret'></span>");
        $(".dropdown[data-filter='tim-theo-tuong'] button").html("Nhập tên tướng");
        $(".dropdown[data-filter='trang-phuc'] button").html("Nhập tên trang phục");
        load_account_list();
    });

    $(".dropdown-menu.filter-clothes").on('click', function(event){
        event.stopPropagation();
    });

    $(".sa-lpmain").on("click", "ul.sa-pagging li", function() {
        load_account_list();
        return false;
    });
});


function load_account_list() {
    var data_post = { type : type, page : page, rank : rank, frame : frame, price : price, order : order, champ_str : champ_str, skin_str : skin_str};
    $("#loading").show();
    $(".sa-lpmain").empty();
    $.post("/assets/ajax/site/account_list.php", data_post, function(data) {
        $(".sa-lpmain").html(data);
        $("#loading").hide();
    });
}
load_account_list();