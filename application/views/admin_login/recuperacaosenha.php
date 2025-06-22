<!-- Row -->
<div class="row signpages text-center">
    <div class="col-md-12">
        <div class="card">
            <div class="row row-sm">
                <div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="row row-sm">
                            <div class="card-body mt-2 mb-2">
                                <div class="clearfix"></div>
                                <img src="assets/img/logo.png" class=" d-lg-none header-brand-img text-left float-left mb-4" alt="logo">
                                <div class="clearfix"></div>
                                <?php if($token):?>
                                    <form action="login/changer" name="login" method="post" class="parsley-form">
                                        <h5 class="text-left mb-2">RECUPERAÇÃO DE SENHA</h5>
                                        <p class="mb-4 text-muted tx-13 ml-0 text-left">Insira sua nova senha</p>
                                        <div class="form-group text-left">
                                            <label>Nova Senha</label>
                                            <input class="form-control" id="senha" required  name="senha" placeholder="Insira uma nova senha" type="password">
                                        </div>
                                        <div class="form-group text-left">
                                            <label>Confirmar Senha</label>
                                            <input class="form-control" required autocomplete="current-password" data-parsley-equalTo="#senha" name="n-senha" placeholder="Confirme sua nova senha" type="password">
                                        </div>
                                        <input type="hidden" name="token" value="<?=$token?>">
                                        <button class="btn ripple btn-main-primary btn-block">Alterar</button>
                                    </form>
                                <?php else:?>
                                    <div>
                                        <h5 class="text-left mb-2">RECUPERAÇÃO DE SENHA EXPIRADA</h5>
                                        <p class="mb-4 text-muted tx-13 ml-0 text-left">Token inválido ou expirado tente novamente</p>
                                        <br>
                                        <br>
                                        <br>
                                        <a href="login/esqueceu" class="remmemberPass btn btn-info">Recuperar Senha</a>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                <?php endif; ?>
                                <div class="text-left mt-5 ml-0">

                                    <div class="mb-1"><a href="login" class=""><i class="fa fa-arrow-left"></i> Voltar ao Login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->