<?php
namespace Services\Rpg\Ficha;
require_once APPPATH . 'libraries/services/rpg/RpgBaseService.php';
use Services\Rpg\RpgBaseService;

class FichaService extends RpgBaseService {

    protected $controller;
    public function __construct($controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    public function index($pk_ficha_rpg = null){
        $data = ['extraStyles' => ['ficha_rpg'],'extraScripts' => ['ficha_rpg'],'pk_ficha_rpg' => $pk_ficha_rpg];
        $this->getPersonagem($data);
        $this->getDadosPersonagem($data);
        $this->carregaView($data,'index');
    }

    public function getPersonagem (&$data){
       $data['personangem'] 	= $this->controller->rpg_personagens->getById($data['pk_ficha_rpg']);
    }

	public  function getDadosPersonagem (&$data){
		$data['inventario'] 	= $this->controller->rpg_inventario->getByPersonagem($data['pk_ficha_rpg']);
		$data['habilidades'] 	= $this->controller->rpg_habilidades->getByPersonagem($data['pk_ficha_rpg']);
		$data['observacoes'] 	= $this->controller->rpg_observacoes->getByPersonagem($data['pk_ficha_rpg']);
	}
}
