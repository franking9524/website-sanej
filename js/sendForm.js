$("#btn_enviar").click(function(){

    var result = null;
    var name = $("#name").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var message = $("#message").val();
        if (name == '' || phone == '' || email == '' || message == '') {
            swal("", "Deber llenar todos los campos!", "warning");return true;
        } else {

            $.ajax({
                url: 'email.php',
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    message: message
                },
                type: 'post',
                dataType: 'html',
                async: false,
                cache: false,
                beforeSend:function(){
                    $("#loader1").show();
                },
                success: function (data) {
                    $("#loader1").hide();
                    swal("", "Gracias por inscribirte, en breve nos comunicaremos contigo.!", "success");
                    document.getElementById("IndFrees").reset();
                    return true;
                }
            });
            $.ajax({
                url: 'email2.php',
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    message: message
                },
                type: 'post',
                dataType: 'html',
                async: false,
                cache: false,
                beforeSend:function(){
                    $("#loader1").show();
                },
                success: function (data) {
                    $("#loader1").hide();
                    swal("", "Gracias por inscribirte, en breve nos comunicaremos contigo.!", "success");
                    document.getElementById("IndFrees").reset();
                    return true;
                }
            });

        }
});