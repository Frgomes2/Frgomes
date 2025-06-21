<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/services/ServiceLoader.php';

class  Rpg extends CI_Controller {
    public $sys_area               = "rpg";
    public $sys_module             = "home";
    public $total_of_page          = 15;
    public $id_module              = 1;/*ex:1*/


    public function __construct() {
        parent::__construct();

        // add library of Pdf
        $this->load->library('Pdf');
        $this->load->library('emails/EmailSender');

        // Carregar todos os serviços automaticamente
        $this->services = new ServiceLoader($this);
    }

    public function index() {
        $this->services->listService->index(1, $this->total_of_page );
    }
}
