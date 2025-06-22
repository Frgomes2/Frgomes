<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
                <form method="post" action="login/changer" id="f-login" name="f-login" class="parsley-form login100-form validate-form">
                    <?php if (@$valid): ?>
                        <span class="login100-form-title p-b-43">
                            (SIC) - Sistema Integrado Comil.<br>
                            <small>Alteração de Senha</small>
                        </span>
                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="password" name="l-senha" id="senha">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Nova Senha</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="l-password" id="password">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Confirmar Senha</span>
                        </div>
                        <div class="container-login100-form-btn">
                            <input type="hidden" name="token" value="<?=$token?>">
                            <div class="col-md-6 col-lg-6">
                                <a href="login" class="login100-form-btn" style="    background: #9f9f9f;">Voltar</a>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <button class="login100-form-btn">Salvar</button>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="panel-body p15">
                            <h2 style="text-align: center">Token de Acesso Expirado!</h2>
                        </div>
                        <div class="container-login100-form-btn">
                            <a href="login" class="login100-form-btn" style="    background: #9f9f9f;">Voltar</a>
                        </div>
                    <?php endif; ?>
                </form>
            <div class="login100-more" style="background-image: url('assets/themes/login/images/bg-01.jpg');"></div>
        </div>
    </div>
</div>
