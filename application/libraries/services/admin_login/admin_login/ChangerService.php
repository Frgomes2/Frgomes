<?php
namespace Services\Login\Login;
require_once APPPATH . 'libraries/services/BaseService.php';
use Services\BaseService;

class ChangerService extends BaseService{

    protected $controller;
    public function __construct($controller) {
        $this->controller = $controller;
    }

    public function index(){
        try {
            $data = [];
            $this->is_ajax();
            $this->setMessageError($data);
            $this->getPostData($data);
            $this->validatePasswords($data);
            $this->getUserToken($data);
            $this->validateUser($data);
            $this->updateUser($data);
            $this->returnData($data);
        } catch (Exception $e){
            $this->returnMessageErro($e);
        }
    }

    public function is_ajax(){
        if (!is_ajax()) {
            redirect(BASE_URL);
            return false;
        }
    }

    public function setMessageError(&$data){
        $data['return']['status']       = 'info';
        $data['return']['title']        = 'Sucesso!';
        $data['return']['msg']          = "Falha ao modificar a senha, tente mais tarde!";
    }

    public function getPostData(&$data){
        $data['token']                  = $this->controller->input->post("token", 1);
        $data['pass']                   = $this->controller->input->post("l-senha", 1);
        $data['pass_confirm']           = $this->controller->input->post("l-password", 1);
    }

    public function validatePasswords(&$data){
        if($data['pass'] != $data['pass_confirm']){
            $data['return']['status']   = 'warning';
            $data['return']['title']    = 'Atenção!';
            $data['return']['msg']      = "As senhas informadas não coincidem.";
            echo json_encode($data['return']);
            die();
        }
    }

    public function getUserToken(&$data){
        $data['u']                      = $this->controller->users->getbyCampo( "token" , $data['token']);
    }

    public function validateUser(&$data){
        if(!$data['u']){
            $data['return']['status']   = 'warning';
            $data['return']['title']    = 'Atenção!';
            $data['return']['msg']      = "Token Inválido.";
            echo json_encode($data['return']);
            die();
        }
    }

    public function updateUser(&$data){
        $dado                           = [];
        $dado['usu_password']           = sha1($data['pass']);
        $dado['usu_token']              = NULL;
        $dado['usu_token_expired']      = NULL;
        $this->controller->users->update($dado, array("usu_id" =>  $data['u']->usu_id));
    }

    public function returnData(&$data){
        $data['return']['status']       = 'success';
        $data['return']['title']        = 'Sucesso!';
        $data['return']['msg']          = 'Senha alterada com sucesso';
        $data['return']['url']          = 'login';
        echo json_encode($data['return']);
    }
}
