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

		$this->load->model("Rpg_personages_model"                    	, "rpg_personagens");
		$this->load->model("Rpg_inventarios_model"                    	, "rpg_inventario");
		$this->load->model("Rpg_habilidades_model"                    	, "rpg_habilidades");
		$this->load->model("Rpg_observacoes_model"                    	, "rpg_observacoes");

        // Carregar todos os serviços automaticamente
        $this->services = new ServiceLoader($this);
    }

    public function index() {
        $this->services->listService->index();
    }

	public function mesa($pk_mesa = 1) {
		$this->services->mesaService->index($pk_mesa);
	}

	public function mesas() {
		$this->services->mesasService->index();
	}
}
