var Script = function() {


    /* Actions Login PAGE */
    $("body").on("click", ".remmemberPass", function(){
        swal({
            title: "Esqueceu sua Senha?",
            text: "Informe o endereço de e-mail",
            type: "input",
            input: "email",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Enviar",
            cancelButtonText: "Cancelar",
            cancelButtonClass: "btn btn-outline-secondary btn-fw",
            inputPlaceholder: "email@dominio.com.br",
            showLoaderOnConfirm: true
        }, function(inputValue) {
            if (inputValue === "" || inputValue === false) {
                return false;
            } else {

                $.post("login/forgotPassword", {
                    email: inputValue,
                    type: "empresa"
                }, function(data) {
                    swal(data.title, data.msg, data.status);
                }, "json");

            }

        });

        return false;
    });

}();