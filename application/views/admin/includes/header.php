<div class="main-header side-header sticky">
    <div class="container-fluid">
        <div class="main-header-left" style="width:0%">
            <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
        </div>
        <div class="main-header-left" style="width:79%">
            <a class="topbar-menu-toggle" id="mainSelectModuloToggle" style="cursor:pointer"> <i class="fa fa-magic"></i> </a>
        </div>

        <div class="main-header-right">
            <div class="dropdown main-header-notification">
                <a class="nav-link icon" href="">
                    <i class="fe fe-bell header-icons"></i>
                    <span class="badge badge-danger nav-link-badge"></span>
                    <?php if(@$notificationsNews):?>
                        <span class="label label-warning" style="color:#c10000"><?=count($notificationsNews)?></span>
                    <?php endif; ?>
                </a>
                <div class="dropdown-menu">
                    <?php $fotoPadrao = NULL;?>
                    <?php if(@$notifications):
                        foreach($notifications as $notification):
                            if($notification->not_quem > 0 ){
                                $fotoPadrao = "arquivos/profile/semfoto.png";
                                if(@$notification->usu_image != ''){
                                    $fotoPadrao = "arquivos/profile/".$notification->not_quem."/".@$notification->usu_image;
                                }
                            }?>
                            <li class="media border-bottom py-2 px-3 " style="margin-top:10px">
                                <a href="notifications/direct/<?= $notification->not_id ?>" class="d-flex align-items-start notificationStatus_<?= $notification->not_status ?>">
                                    <div class="me-3 pt-1" style=" margin-right: 10px;">
                                        <img src="<?= $fotoPadrao ?>" class="rounded-circle img-thumbnail" style="width: 40px; height: 40px; object-fit: cover;" alt="avatar">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">
                                            <strong><?= $notification->not_titulo ?></strong>
                                            <small class="text-muted ms-2"><?= data_hora($notification->not_datacad) ?></small>
                                        </h6>
                                        <p class="mb-0 text-muted" style="font-size: 0.9em;"><?= substr($notification->not_texto, 0, 200) ?></p>
                                        <?php if ($notification->not_quem > 0): ?>
                                            <small class="text-primary"><?= $notification->usu_nome ?></small>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach;?>
                    <?php else:?>
                        <div class="header-navheading">
                            <p class="main-notification-text">Nenhuma notificação</p>
                        </div>
                    <?php endif;?>
                    <div class="main-notification-list"></div>
                    <li class="text-center py-2" style="background: #f2f7fa;">
                        <a href="notifications" class="text-primary fw-bold d-block" style="text-decoration: none;">
                            <i class="fa fa-eye"></i> Ver todas as notificações
                        </a>
                    </li>
                </div>
            </div>
            <div class="dropdown main-profile-menu">
                <a class="d-flex profile-item"  href="">
                  <?php if($_SESSION['SIC_IMG']):?>
                    <img src="arquivos/profile/<?=$_SESSION['SIC_UID']?>/<?=$_SESSION['SIC_IMG']?>" class="rounded-circle img-thumbnail " style="max-width: 40px !important;" alt="avatar">
                  <?php else:?>
                    <span class="icon"><i class="fa fa-user"></i></span>
                  <?php endif;?>
                    <span class="nome"> <?=$this->session->userdata(NAME_SESSION."USER")?></span>
                </a>
                <div class="dropdown-menu">
                    <div class="header-navheading">
                        <h6 class="main-notification-title"><?=$this->session->userdata(NAME_SESSION."USER")?></h6>
                        <p class="main-notification-text"></p>
                    </div>
                    <a class="dropdown-item border-top" href="profile">
                        <i class="fe fe-user"></i> Minha Conta
                    </a>
                    <a class="dropdown-item border-top" href="profile?aba=senha">
                        <i class="fe fe-lock"></i> Alterar Senha
                    </a>
                    <a class="dropdown-item border-top" href="profile/changePermission">
                        <i class="fa fa-refresh"></i> Recarregar Permissões
                    </a>
                    <a class="dropdown-item" href="login/logout">
                        <i class="fe fe-power"></i> Sair
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="topbar-dropmenu" class="" style="display: none;">
        <div class="topbar-menu row">
            <div class="col-lg-9 col-md-8 col-sm-12 animated animated-short fadeInDown" style="z-index: 1030;">
                <h4 style="color:#FFF;">SIC - Sistemas Integrados Comil</h4>
                <ul  class="top-sistemas">
                    <?php
                    /* Exibirá se o usuário tiver acesso a mais de um sistema */
                    $sysm = [];
                    if ($this->session->userdata("SIC_GRUPO") != 1) {
                        $sysm = array_keys(unserialize($this->session->userdata("SIC_PERMISSOES")));
                    }
                    /* Verifica quais sistemas tenho permissão */
                    foreach ($systemas as $systema):
                        if (in_array($systema->sys_id, $sysm) || $this->session->userdata("SIC_GRUPO") == 1 || $this->session->userdata("SIC_USURPADOR") > 0):?>
                            <li>
                                <a href="profile/changesistema/<?= $systema->sys_id ?>" class="" style="opacity: 1;">
                                    <span class="glyphicon <?= $systema->sys_icone ?>"></span>
                                    <span class="metro-title"><?= traduzir($this->lang,$systema->sys_titulo )?></span>
                                </a>
                            </li>
                        <?php endif;
                    endforeach;
                    ?>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-12  animated animated-short fadeInDown">
                <h4 style="color:#FFF;">Outros</h4>
                <ul class="top-sistemas subdivisao">
                    <li>
                        <a target="_blank" href="http://extranet.mascarello.com.br/sim/" class="" style="opacity: 1;">
                            <span class="glyphicon 	fa fa-tasks"></span>
                            <span class="metro-title"><?= traduzir($this->lang,'Teste')?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-container-fluid">
        <div class="main-header-left justify-content-start" style="width: 33%">
            <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
        </div>
        <div class="main-header-center" style="width: 33%">
            <a class="main-logo" href="index.php">
                <img src="assets/img/logo.png" style="max-height: 30px" class="header-brand-img icon-logo" alt="logo">
            </a>
        </div>
        <div class="main-header-right justify-content-end" style="width: 33%;">
            <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
            </button><!-- Navresponsive closed -->
        </div>
    </div>
    <?php if(isset($extraButtons)): ?>
    <div class="sub-header buttons-actions">
        <?php foreach($extraButtons as $b):?>
            <a href="<?=$b['url']?>" class="btn btn-primary  btn-sm <?=$b['class']?>" target="<?=@$b['target']?>" <?= $b['url'] == '' ? 'onclick="(function(e){e.preventDefault();})(event)"' : '' ?> <?php if(isset($b['custom_data'])) { foreach ($b['custom_data'] as $name => $value) {echo('data-'.$name.'="'.$value.'"');}} ?>>
                <i class="<?=$b['icon']?>"></i> <?=$b['title']?>
            </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
<!-- End Main Header-->
<!-- Mobile-header -->
<div class="mobile-main-header">
    <div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

          <div class="d-flex order-lg-2 ml-auto justify-content-between">
                <div class="dropdown header-search" style="width: 50% !important;">

                </div>
                <div class="dropdown main-profile-menu">
                    <a class="d-flex profile-item"  href="">
                        <span class="icon mr-0"><i class="fa fa-user"></i></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="header-navheading">
                            <h6 class="main-notification-title"><?=$this->session->userdata(NAME_SESSION."NAME")?></h6>
                            <p class="main-notification-text"></p>
                        </div>
                        <a class="dropdown-item border-top" href="profile">
                            <i class="fe fe-user"></i> Minha Conta
                        </a>
                        <a class="dropdown-item" href="login/logout">
                            <i class="fe fe-power"></i> Sair
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<header id="topbar" class="affix ph10 <?= @$show_top_header == "" ? 'hidden' : '' ?>">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <?php
            if (@$submenus):
                foreach (@$submenus as $m):
                    ?>
                    <li class="<?= $m['status'] ?> <?= @$m['classes'] ?>">
                        <a href="<?= $m['url'] ?>"><?= $m['titulo'] ?></a>
                    </li>
                <?php
                endforeach;
            endif;
            ?>
        </ul>
    </div>
    <div class="topbar-right ">
        <?php
        if (@$botoes_extra):
            foreach (@$botoes_extra as $botao):
                ?>
                <a href="<?= $botao['url'] ?>" class="btn <?= @$botao['tipo'] != ''? @$botao['tipo']:'btn-default' ?>  btn-sm light fw600 ml10 <?= @$botao['classes'] ?>">
                    <span class="fa <?= $botao['icone'] ?> pr5"></span> <?= $botao['titulo'] ?></a>
            <?php
            endforeach;
        endif;
        ?>
    </div>
</header>
