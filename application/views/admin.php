<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include("admin/includes/head.php"); ?>
        <?php
        if (isset($extraCSS)):
            foreach ($extraCSS as $css):
                ?>
                <link href="<?= BASE_URL ?>assets/css_modulos/<?= $css ?>.css?i=<?php echo time();?>" rel="stylesheet">
            <?php
            endforeach;
        endif;
        ?>
        <script src="<?= BASE_URL ?>assets/plugins/jquery/jquery.min.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/lightbox/ekko-lightbox.min.js"></script>
        <script type="text/javascript" src="assets/plugins/slick/slick.js"></script>
        <script src="assets/plugins/jquery.json-viewer/jquery.json-viewer.js"></script>
        <link href="assets/plugins/jquery.json-viewer/jquery.json-viewer.css" type="text/css" rel="stylesheet">
        <script src="assets/js/jquery.PrintArea.js"></script>
        <script>
            var customFunction = [];
            var base_url = "<?=BASE_SITE?>";
        </script>
    </head>
    <body class="main-body leftmenu">
        <!-- Loader -->
        <div id="global-loader">
            <img src="<?= BASE_URL ?>assets/img/loader.svg" class="loader-img" alt="Loader">
        </div>

        <div class="page">
            <?php include("admin/includes/side-menu.php"); ?>
            <?php include("admin/includes/header.php"); ?>
            <div class="main-content side-content pt-0">
                <?php echo $contents; ?>
            </div>
            <?php include("admin/includes/footer.php") ?>
            <?php // include("includes/side-right.php"); ?>
        </div>


        <!-- Back-to-top -->
        <a href="#top" id="back-to-top <?=@$Back_tipo == true ? '':'hidden'?>"><i class="fe fe-arrow-up"></i></a>

        <script src="<?= BASE_URL ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/sidemenu/sidemenu.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/sidebar/sidebar.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/select2/js/select2.min.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/select2/i18n/pt-BR.js"></script>
        <script src="<?= BASE_URL ?>assets/js/sticky.js"></script>
        <script src="<?= BASE_URL ?>assets/js/custom.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/switcher/js/switcher.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/raphael/raphael.min.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/morris.js/morris.min.js"></script>
        <!-- Circle Progress js
        <script src="<?= BASE_URL ?>assets/js/circle-progress.min.js"></script>
        <script src="<?= BASE_URL ?>assets/js/chart-circle.js"></script>
        Internal Dashboard js-->
        <script src="<?= BASE_URL ?>assets/js/index.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="<?= BASE_URL ?>assets/js/jquery.mask.min.js"></script>
        <script src="<?= BASE_URL ?>assets/js/mask.predefinidas.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/parsley/parsley.min.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/parsley/pt-br.js"></script>
        <script src="<?= BASE_URL ?>assets/js/parsley-validate-form.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/clipcopy/clipboard.min.js"></script>


        <!-- Internal Data Table js-->
        <script src="<?= BASE_URL ?>assets/plugins/datatable/jquery.dataTables.min.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/datatable/DT_bootstrap.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/datatable/dataTables.responsive.min.js"></script>

        <!-- Internal Chart.Bundle js-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
        <script src="<?= BASE_URL ?>assets/plugins/chart.js/chart.chartjs.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/echarts/echarts.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= BASE_URL ?>assets/plugins/icheck/icheck.min.js"></script>

        <?php
        if (isset($extraScripts)):
            foreach ($extraScripts as $script):
                ?>
                <script src="<?= BASE_URL ?>assets/js_modulos/<?= $script ?>.js?i=<?=rand(0,999999)?>"></script>
            <?php
            endforeach;
        endif;
        ?>
        <script src="<?= BASE_URL ?>assets/js/main.js"></script>
        <script src="<?= BASE_URL ?>assets/js/plataforma.js"></script>
        <script>
            $(document).ready(function() {
                $( ".select2Simples").select2( {
                    theme: "bootstrap",
                    language: "pt-BR"}
                );
            });
        </script>
    </body>
</html>
