<div id="custom-side-menu" class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="index.php">
            <img src="assets/img/logo.png" style="max-height: 45px" class="header-brand-img desktop-logo" alt="logo">
            <img src="assets/img/logo.png" style="max-height: 30px" class="header-brand-img icon-logo" alt="logo">
            <img src="assets/img/logo.png" style="max-height: 45px" class="header-brand-img desktop-logo theme-logo" alt="logo">
            <img src="assets/img/logo.png" style="max-height: 30px" class="header-brand-img icon-logo theme-logo" alt="logo">
        </a>
    </div>
    <div class="main-sidebar-body">
        <ul class="nav">
            <li class="nav-item <?=@$menu_ativo == "" ? 'active show': '' ?>" >
                <a class="nav-link <?=@$menu_ativo == "" ? 'active': '' ?>" href="index.php"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">Dashboard</span></a>
            </li>
            <?php $modulos = $this->confg->listModulos($this->session->userdata("SIC_SYS")); ?>
            <?php if($modulos):
                foreach ($modulos as $mod):?>
                    <li class="nav-header"><span class="nav-label"><?=traduzir($this->lang,$mod->mod_titulo )?></span></li>
                      <?php $menus = $this->confg->listMenus($mod->mod_id, '0');?>
                      <?php if($menus):
                          foreach ($menus as $menu):
                              $sub_menus = $this->confg->listMenus($mod->mod_id, $menu->men_id);
                              if (@$permisoes[$this->session->userdata("SIC_SYS")][$mod->mod_id][$menu->men_id]|| $this->session->userdata("SIC_GRUPO") == 1):?>
                                  <li class="nav-item <?=@$menu_ativo == @$menu->men_active ? 'active show': '' ?>">
                                      <a class="nav-link <?=count(@$sub_menus) > 0 ?  ' with-sub': '' ?>  <?=@$menu_ativo == @$menu->men_active ? 'active': '' ?>  <?=@$menu_ativo == @$menu->men_active ? 'active': '' ?>" href="<?=$menu->men_url?>"><span class="shape1"></span><span class="shape2"></span><i class="<?=$menu->men_icone?> sidemenu-icon"></i><span class="sidemenu-label"><?=$menu->men_titulo?></span><?=count(@$sub_menus) > 0 ?  '<i class="angle fe fe-chevron-right"></i>': '' ?></a>
                                      <?php if (@$sub_menus): ?>
                                          <ul class="nav-sub">
                                              <?php foreach ($sub_menus as $sub_menu): ?>
                                                  <li class="nav-sub-item">
                                                      <a class="nav-sub-link" href="<?=$sub_menu->men_url?>"><?=$sub_menu->men_titulo?></a>
                                                  </li>
                                              <?php
                                              endforeach;
                                              ?>
                                          </ul>
                                      <?php endif; ?>
                                  </li>
                              <?php endif;?>
                          <?php endforeach;
                      endif;?>
                <?php endforeach;
            endif;?>
        </ul>
    </div>
</div>
