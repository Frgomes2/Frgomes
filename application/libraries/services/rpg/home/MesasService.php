<?php
namespace Services\Rpg\Home;
require_once APPPATH . 'libraries/services/rpg/RpgBaseService.php';

use Services\Rpg\RpgBaseService;

class MesasService extends RpgBaseService {

    protected $controller;
    public function __construct($controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    public function index(){
        $data = [];
        $this->loadingView($data,'mesas');
    }
}
