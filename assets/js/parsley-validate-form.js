var Script = function () {

    var parsleyForm = jQuery(".parsley-form");

    var applyParsley = function () {
        jQuery(this).parsley().on('field:validated', function () {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout').find("h4").html('Oh não!');
            $('.bs-callout').find(".msg").html('Há Campos sem preencher :(');
            $('.bs-callout').addClass('bs-callout-warning').toggleClass('hidden', ok);
        })
                .on('form:submit', function (formInstance) {

                    if ($(".ckeditor").length) {
                        for (instance in CKEDITOR.instances) {
                            CKEDITOR.instances[instance].updateElement();
                        }
                    }

                    var myForm = formInstance.$element,
                            call = myForm.attr("data-callback"),
                            btSubmit = myForm.find("button[type='submit']");

                    var nomeform = myForm.attr('name');

                    if (nomeform == '' || nomeform == undefined) {
                        alert("Formulário sem atributo name é Obrigatório!");
                    }
                    var formData = new FormData($("form[name='" + nomeform + "']")[0]);

                    jQuery.ajax({
                        url: myForm.attr('action'),
                        type: 'POST',
                        dataType: 'JSON',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        xhr: function () {  // Custom XMLHttpRequest
                            var myXhr = $.ajaxSettings.xhr();
                            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                                myXhr.upload.addEventListener('progress', function () {
                                    /* faz alguma coisa durante o progresso do upload */
                                }, false);
                            }
                            return myXhr;
                        },
                        beforeSend: function () {
                            //btSubmit.button('loading');
                            btSubmit.attr("disabled");
                        },
                        complete: function () {
                            btSubmit.removeAttr("disabled");
                        },
                        success: function (data) {

                            var status = data.status,
                                    msg = data.msg,
                                    title = data.title,
                                    direciona = data.url,
                                    clearInput = data.clear,
                                    modalx = data.closeModal,
                                    alert = myForm.find(".messages .bs-callout");

                            // ---------------------
                            // Exibe mensagem de sucesso/erro para usuário
                            // ---------------------                       
                            if(!data.noSwal){
                                swal(
                                    title,
                                    msg,
                                    status
                                );
                            }

                            if(modalx){
                                $("#"+modalx).modal("hide");
                            }

                            // ---------------------
                            // Função auxiliar extra
                            // ---------------------                       
                            if (call != '' && call != undefined) {
                                console.log(call);
                                if (jQuery.isFunction(customFunction[call])) {
                                    customFunction[call](data);
                                }
                            }

                            if (clearInput) {
                                myForm.find("input[type='text'], input[type='email'], input[type='password']").val("");
                                myForm.find("textarea").val("");
                            }

                            if (direciona) {
                                setTimeout(function () {
                                    window.location.href = direciona;
                                    return false;
                                }, 500);
                            }
                        },
                        error: function (xhr, textStatus, errorThrown) {
                            btSubmit.removeAttr("disabled");
                        }
                    });
                    return false;
                });
    };

    jQuery.each(parsleyForm, function (index, el) {
        applyParsley.apply(el);
    });
    
}();