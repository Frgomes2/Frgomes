<?php
namespace Services\Login\Login;
require_once APPPATH . 'libraries/services/BaseService.php';
use Services\BaseService;

class ForgotPasswordService extends BaseService{

    protected $controller;
    public function __construct($controller) {
        $this->controller = $controller;
    }


    public function index(){
        try {
            $data = [];
            $this->is_ajax();
            $this->setMessageError($data);
            $this->getDataPost($data);
            $this->getUser($data);
            $this->createTokenRecoveryPassword($data);
            $this->sendEmailUser($data);
            $this->returnDados($data);
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
        $data['return']['status']           = 'error';
        $data['return']['title']            = 'Falha!';
        $data['return']['msg']              = 'E-mail não encontrado, entre em contato com o administrador!';
    }

    public function getDataPost(&$data){
        $data['email']                      = $this->controller->input->post("email", 1);
    }

    public function getUser(&$data){
        $data['_user']                      = $this->controller->users->getbyCampo(  "email", $data['email']  );
    }

    public function createTokenRecoveryPassword(&$data){
        if (@$data['_user']->usu_id > 0) {
            $data['dados']                          = [];
            $data['dados']['usu_token_expired']     = date("Y-m-d H:i:s", strtotime("+1 day"));
            $data['dados']['usu_token']             = md5($data['_user']->usu_id . date("Y-m-d") . rand(1000, 100000));
            $this->controller->users->update($data['dados'], array("usu_id" => $data['_user']->usu_id));
        }
    }

    public function sendEmailUser(&$data){
        if (@$data['_user']->usu_id > 0) {
            $dados = array(
                'token'                         => $data['dados']['usu_token']
                , 'assunto'                     => 'Recuperação de Senha'
                , 'ip'                          => $_SERVER['REMOTE_ADDR']
                , 'nome'                        => $data['_user']->usu_nome
                , 'email'                       => $data['_user']->usu_email
                , 'login'                       => $data['_user']->usu_usuario
                , 'mensagem'                    => $this->controller->input->post("c-mensagem")
            );

            if ($this->controller->emailsender->sendEmail($dados, 'emailEsqueceuSenha.phtml')) {
                $data['return']['status']       = 'success';
                $data['return']['title']        = 'Sucesso!';
                $data['return']['msg']          = 'Encaminhado e-mail com link para alteração da sua senha!';
            }
        }
    }


    public function returnDados(&$data){
        echo json_encode($data['return']);
    }
}
