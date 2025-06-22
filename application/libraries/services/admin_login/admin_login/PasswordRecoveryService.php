<?php
namespace Services\Login\Login;
require_once APPPATH . 'libraries/services/BaseService.php';
use Services\BaseService;

class PasswordRecoveryService extends BaseService{

    protected $controller;
    public function __construct($controller) {
        $this->controller = $controller;
    }


    public function index($token){
        try {
            $data = ['token' => $token,'valid'];
            $this->getUserToken($data);
            $this->validateUserToken($data);
            $this->loadView($data);
        } catch (Exception $e){
            $this->returnMessageErro($e);
        }
    }

    public function getUserToken(&$data){
        $data['u'] = $this->controller->usuario->get_by_token($data['token']);
    }

    public function validateUserToken(&$data){
        if (@$data['u']->usu_id > 0) {
            $now = strtotime("NOW");
            $expired = strtotime($data['u']->usu_token_expired);
            if ($now <= $expired) {
                $data['valid'] = true;
            }
        }
    }

    public function loadView(&$data){
        $this->controller->template->loadsimples('login', 'changepass', $data);
    }
}
