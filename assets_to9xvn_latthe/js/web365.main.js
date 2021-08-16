web365.main = (function () {


    function initEvent() {

        $('.ac-buy-acc').click(function (e) {
            e.preventDefault();

            $.post('/Content/ajax/site/buy.php', { accId: $(this).attr('data-id') }, function (res) {
                if (res.error) {
                    web365.utility.toastWarning(res.message);
                    if (res.isNotLogin) {
                        document.location.href = '/user/login';
                    }
                }
                else {
                    web365.utility.toastSuccess(res.message);
                    document.location.href = '/lich-su-mua/';
                }
            }, "json");

        });

        $(".chat_fb").click(function (e) {
            e.preventDefault();

            $('.fchat').toggle('slow');
        });

        $('.sa-ptbtn').click(function (e) {
            e.preventDefault();

            $('#popImg .modal-title').html($(this).closest('li').find('label').html());

            $('.sa-popimg img').attr('src', $(this).attr('data-src'));

            $('#popImg').modal('show');

        });

        $('.btn-search').click(function (e){
            e.preventDefault();

            $('.sa-header').toggleClass('has-search');
        });
    }


    return {
        initEvent: initEvent
    };

})();