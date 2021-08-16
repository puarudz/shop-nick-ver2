//javascript login
    $(document).ready(function () {
        $("#login_ajax").validate({
            rules: {
                    username: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    username: '<small>Tài khoản phải từ 6-20 kí tự</small>',
                    password: '<small>Mật khẩu phải từ 6 kí tự</small>'
                },
            submitHandler: function (e) {
            $( '#loading_login' ).show();
            $('button[id="login"]').prop('disabled', true);
            $.post("/assets/ajax/client/login.php", $('#login_ajax').serialize(), function(data) {
            $( '#loading_login' ).hide();
            $('button[id="login"]').prop('disabled', false);
            swal(data.title, data.msg, data.status);
            if(data.status == "success"){
                window.location.href = "/";
            }
          }, "json");
              return false;
          }
      });
      });

//javascript register
    $(document).ready(function () {
        $("#register_ajax").validate({
            rules: {
                    name: {
                        required: true,
                        minlength: 6,
                        maxlength: 24
                    },
                    username: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    },
                    repassword: {
                        required: true
                    }
                },
                messages: {
                    name: '<small>Họ tên phải từ 6-24 kí tự</small>',
                    username: '<small>Tài khoản phải từ 6-20 kí tự</small>',
                    password: '<small>Mật khẩu phải từ 6 kí tự</small>',
                    repassword: '<small>Vui lòng nhập lại mật khẩu</small>'
                },
            submitHandler: function (e) {
            $( '#loading_reg' ).show();
            $('button[id="register"]').prop('disabled', true);     
            $.post("/assets/ajax/client/register.php", $('#register_ajax').serialize(), function(data) {
            $( '#loading_reg' ).hide();
            $('button[id="register"]').prop('disabled', false);
            swal(data.title, data.msg, data.status);
            if(data.status == "success"){
                window.location.href = "/";
            }
          }, "json");
              return false;
          }
      });
      });
//javascript forgot
    $(document).ready(function () {
        $("#forgot_ajax").validate({
            rules: {
                    username_forgot: {
                        required: true,
                        minlength: 6
                    },
                    email_forgot: {
                        required: true
                    },
                    phone_forgot: {
                        required: true,
                        minlength: 10,
                        maxlength: 10
                    }
                },
                messages: {
                    username_forgot: '<small style="color:red;">Tài khoản ít nhất 6 kí tự</small>',
                    email_forgot: '<small style="color:red;">Vui lòng nhập Email</small>',
                    phone_forgot: '<small style="color:red;">Số điện thoại gồm 10 chữ số</small>'
                },
            submitHandler: function (e) {
            $( '#loading_forgot' ).show();
            $('button[id="forgot"]').prop('disabled', true);
            $.post("/assets/ajax/client/forgot.php", $('#forgot_ajax').serialize(), function(data) {
            $( '#loading_forgot' ).hide();
            $('button[id="forgot"]').prop('disabled', false);
            swal({
                  title : data.title,
                  type: data.status,
                  text: data.msg
                }, function() {
                  if(data.link){
                    window.location = data.link;}
                });
          }, "json");
              return false;
          }
      });
      });
//buy acc
    function buy_acc(id) {
                swal(
                {
                  title: "Tài Khoản Số #"+id,
                  text: "Bạn có chắc chắn muốn mua tài khoản này ?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Có",
                  cancelButtonText: "Không",
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                }, function () {
                  $.post("/assets/ajax/site/check_buy.php", {id: id}, function (data) {
                    if (data.status == "success") {
                        swal({
                            title : "Thành công",
                            type: "success",
                            text: data.msg
                      }, function() {
                        window.location = '/history/buy.html';
                      });       
                    } else {
                      swal({
                        title : "Có lỗi xảy ra",
                        type: "error",
                        text: data.msg
                      }, function() {
                        if(data.link){
                        window.location = data.link;}
                      });
                    }
                  }, "json");
                }
                );
            }
//buy acc
    function buy_acc_random(id) {
                swal(
                {
                  title: "Thử vận may ID #"+id,
                  text: "Thử vận may hên xui nhé! Bạn có chắc chắn muốn mua tài khoản này ?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Có",
                  cancelButtonText: "Không",
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                }, function () {
                  $.post("/assets/ajax/site/buy_random.php", {id: id}, function (data) {
                    if (data.status == "success") {
                        swal({
                            title : "Thành công",
                            type: "success",
                            text: data.msg
                      }, function() {
                        window.location = '/history/buy.html';
                      });       
                    } else {
                      swal({
                        title : "Có lỗi xảy ra",
                        type: "error",
                        text: data.msg
                      }, function() {
                        if(data.link){
                        window.location = data.link;}
                      });
                    }
                  }, "json");
                }
                );
            }
//javascript recharge
    $(document).ready(function () {
        $("#card_charing_ajax").validate({
            rules: {
                    card_type_id: {
                        required: true
                    },
                    price_guest: {
                        required: true
                    },
                    seri: {
                        required: true,
                        minlength: 6
                    },
                    pin: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    card_type_id: '<small style="color:red;">Vui lòng chọn nhà mạng</small>',
                    price_guest: '<small style="color:red;">Vui lòng chọn mệnh giá</small>',
                    seri: '<small style="color:red;">Vui lòng nhập serial</small>',
                    pin: '<small style="color:red;">Vui lòng nhập mã thẻ</small>',
                },
            submitHandler: function (e) {
            $( '#loading' ).show();
            $('button[type="submit"]').prop('disabled', true);
            $.post("/assets/ajax/site/card.php", $('#card_charing_ajax').serialize(), function(data) {
            $( '#loading' ).hide();
            $('button[type="submit"]').prop('disabled', false);
            swal(data.title, data.msg, data.status);
          }, "json");
              return false;
          }
      });
      });

//javascript changeinffo
    $(document).ready(function () {
        $("#change_info").validate({
            rules: {
                    oldinfo: {
                        required: true
                    },
                    newinfo: {
                        required: true
                    },
                    renewinfo: {
                        required: true
                    }
                },
                messages: {
                    oldinfo: '<small style="color:red;">Vui lòng nhập thông tin này</small>',
                    newinfo: '<small style="color:red;">Vui lòng nhập thông tin này</small>',
                    renewinfo: '<small style="color:red;">Vui lòng nhập thông tin này</small>'
                },
            submitHandler: function (e) {
            $( '#loading' ).show();
            $('button[type="submit"]').prop('disabled', true);
            $.post("/assets/ajax/client/change_info.php", $('#change_info').serialize(), function(data) {
            $( '#loading' ).hide();
            $('button[type="submit"]').prop('disabled', false);
             swal({
                  title : data.title,
                  type: data.status,
                  text: data.msg
                }, function() {
                  if(data.link){
                    window.location = data.link;}
                });

          }, "json");
              return false;
          }
      });
      });

//javascript rut_kc_ff_luauytin
    $(document).ready(function () {
        $("#rut_kc_ff_luauytin").validate({
            rules: {
                    id_ingame: {
                        required: true
                    },
                    soluong: {
                        required: true
                    }
                },
                messages: {
                    id_ingame: '<small style="color:red;">Vui lòng nhập ID Ingame</small>',
                    soluong: '<small style="color:red;">Vui lòng nhập số lượng</small>'
                },
            submitHandler: function (e) {
            $( '#loading' ).show();
            $('button[type="submit"]').prop('disabled', true);
            $.post("/assets/ajax/site/rut_kc_ff.php", $('#rut_kc_ff_luauytin').serialize(), function(data) {
            $( '#loading' ).hide();
            $('button[type="submit"]').prop('disabled', false);
            swal(data.title, data.msg, data.status);
            if(data.status == 'success') load_page();
          }, "json");
              return false;
          }
      });
      });
