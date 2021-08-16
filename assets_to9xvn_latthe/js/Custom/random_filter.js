$(document).ready(function() {
        $(".sa-lpmain").on("click", "ul.sa-pagging li", function() {
        load_account_list();
        return false;
    });
});
function load_account_list() {
    var data_post = {page : page, type : type};
    $("#loading").show();
    $(".sa-lpmain").empty();
    $.post("/assets/ajax/site/random_list.php", data_post, function(data) {
        $(".sa-lpmain").html(data);
        $("#loading").hide();
    });
}
load_account_list();