<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/services/ServiceLoader.php';

class Admin extends My_Controller {

    public $sys_area           = "admin";
    public $sys_module         = "dashboard";
    public $total_of_page      = 15;
    public $id_module          = 3;

    public function __construct() {
        parent::__construct();
        // Carregar todos os serviços automaticamente
        $this->services = new ServiceLoader($this);
    }

    public function index() {
        $this->services->dashGenericService->index( );
    }
}
