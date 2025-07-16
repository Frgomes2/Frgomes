<?php
namespace Services\Rpg\Home;
require_once APPPATH . 'libraries/services/rpg/RpgBaseService.php';

use Services\Rpg\RpgBaseService;

class MesaService extends RpgBaseService {

    protected $controller;
    public function __construct($controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    public function index($pk_mesa = null){
        $data = ['extraStyles' => ['mesa_rpg'],'extraScripts' => ['mesa_rpg'],'pk_mesa' => $pk_mesa];
        $this->getPersonagem($data);
        $this->getDadosPersonagem($data);
        $this->loadingView($data,'mesa');
    }

    public function getPersonagem (&$data){
       $data['personangens'] 										= $this->controller->rpg_personagens->listAllPaginator();
    }

	public  function getDadosPersonagem (&$data){
		if($data['personangens']){
			foreach ($data['personangens'] as $personagem) {
				$filtro_habilidade 									= [];
				$filtro_habilidade['order']['hab_ordem_exibicao'] 	= 'asc';;
				$filtro_habilidade[] 								= 'hab_pk_personagem = "'.$personagem->per_id.'"';
				$data['habilidades'][$personagem->per_id]			= $this->controller->rpg_habilidades->listAllPaginator($filtro_habilidade);
				$data['inventario'][$personagem->per_id] 			= $this->controller->rpg_inventario->listAllPaginator(['inv_pk_personagem = "'.$personagem->per_id.'"']);
				$data['observacoes'][$personagem->per_id] 			= $this->controller->rpg_observacoes->listAllPaginator(['obs_pk_personagem = "'.$personagem->per_id.'"']);
			}
		}
	}
}
