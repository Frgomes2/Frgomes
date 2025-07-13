<?php

class MY_Controller extends CI_Controller {


    protected $sendEmail = "P"; /* P -  pendente de envio */
    protected $sendNotification = 0;   /* 0 - Notificado 1- lida 2 - nao salva no banco */


    public function __construct() {
        parent::__construct();
        if (@!$this->session->userdata("FR_LOGIN"))
            redirect(BASE_URL . "login");

        if (@$_GET['debug'] == 1) {
            ini_set('display_errors', '1');
            ini_set('display_startup_errors', '1');
            error_reporting(E_ALL);
        }

        $systemas = $this->confg->listSystemas();
        $this->load->vars('systemas', $systemas);
    }
}
