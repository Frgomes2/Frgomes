<?php
namespace Services\Admin_login\Admin_login;
require_once APPPATH . 'libraries/services/BaseService.php';
use Services\BaseService;

class SigninService extends BaseService{

    protected $controller;
    public function __construct($controller) {
        $this->controller = $controller;
    }

    public function index(){
        try {
            $data = ['sy' => 1];
            $this->is_ajax();
            $this->getDataPost($data);
            $this->getUser($data);
            $this->validUser($data);
            $this->validAcess($data);
            $this->validAcessExternal($data);
            $this->setMessageSucess($data);
            $this->buildSession($data);
            $this->buildPermissoes($data);
            $this->buildPreferencias($data);
            $this->setStartSystem($data);
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

    public function getDataPost(&$data){
        if ($this->controller->input->post("remember", 1) == "on") {set_cookie('remember', $_user->usu_id, '3600');}
        $data['user']                       = $this->controller->input->post("l-username", 1);
        $data['pass']                       = sha1($this->controller->input->post("l-password", 1));
    }

    public function getUser(&$data){
        $data['_user']                      = $this->controller->users->login( $data['user'], $data['pass'] );
    }

    public function validUser(&$data){
        if(!@$data['_user']) {
            $data['return']['status']       = 'error';
            $data['return']['title']        = 'Falha';
            $data['return']['msg']          = 'Usuário ou Senha Inválidos!';
            $this->controller->hisuser->save("login", "Usuário Incorreto", "Tentativa de acesso Usuário: " . $data['user']);
            echo json_encode($data['return']);
            die();
        }
    }

    public function validAcess(&$data){
        if($data['_user'] && @$data['_user']->usu_status != 1) {
            $data['return']['status']       = 'info';
            $data['return']['title']        = 'Falha!';
            $data['return']['msg']          = 'Usuário desativado, entre em contato com os administradores!';
            $this->controller->hisuser->save("login", "Tentativa Bloqueado", "Tentativa de acesso Usuário Bloqueado ou desativado!");
            echo json_encode($data['return']);
            die();
        }
    }

    public function validAcessExternal(&$data){
        if(!in_array($_SERVER["REMOTE_ADDR"], IP_MASCARELLO) && !strstr($_SERVER["REMOTE_ADDR"], "192.168.") && @$data['_user']->usu_externo == 1 && @$data['_user']) {
            $data['return']['status']       = 'info';
            $data['return']['title']        = 'Falha!';
            $data['return']['msg']          = 'Usuário sem privilégio para acesso Externo, entre em contato com os administradores!';
            $this->controller->hisuser->save("login", "Tentativa Externa", "Tentativa de acesso ao sistema externamente");
            echo json_encode($data['return']);
            die();
        }
    }

    public function setMessageSucess(&$data){
        if(!@$data['return']['status'] && $data['_user']){
            $data['return']['status']       = 'success';
            $data['return']['title']        = 'Sucesso!';
            $data['return']['msg']          = 'Você será direcionado!';
            $data['return']['url']          = '/sic' . ($data['_user']->usu_lastlogin == null ? '?first=1' : '');
            $this->controller->hisuser->save("login", "Acesso", "Acesso ao sistema");
        }
    }

    public function buildSession(&$data){
        if(@$data['return']['status'] == 'success'){
            $this->setUserdata($data);
        }
    }

    public function buildPermissoes(&$data){
        $permissoesGrupo                    = $this->controller->permissoes->getById($data['_user']->usu_grupo);
        $data['permissoes']                 = $permissoesGrupo->per_permissao;
        if ($data['_user']->usu_grupo != 1) {
            $sysm                           = array_keys(unserialize($permissoesGrupo->per_permissao));
            $data['sy']                     = $sysm[0];
        }
    }

    public function buildPreferencias(&$data){
        @$preferencias = @json_decode(@$_SESSION['SIC_PREFERENCIAS'] , 1);
        if(@$preferencias['idioma']){
            $this->controller->session->set_userdata("SIC_IDIOMA",@$preferencias['idioma']);
        }

        $_conf_user = @json_decode(@$data['_user']->usu_preferencias, 1);
        if (@count(@$_conf_user) > 0) {
            $data['sy'] = $_conf_user['sistema_inicial'];
        }

        if(!$_SESSION['SIC_IDIOMA']){
            $this->controller->session->set_userdata("SIC_IDIOMA",1);
        }
    }

    public function setStartSystem(&$data){
        $this->controller->session->set_userdata("SIC_PERMISSOES", $data['permissoes']);
        $this->controller->session->set_userdata("SIC_SYS", $data['sy']);  /* Aqui vamos pegar o sistema padrao do usuário */
        $this->controller->usuario->update(array("usu_lastlogin" => date("Y-m-d H:i:s")), array("usu_id" => $data['_user']->usu_id));
    }

    public function returnData(&$data){
        echo json_encode($data['return']);
    }
}
