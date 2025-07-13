<?php
namespace Services;
class BaseService{

    protected $CI;
    protected $controller; // Adiciona a propriedade controller
    public function __construct($controller) {
        $this->CI =& get_instance();
        $this->controller = $controller; // Armazena o controller recebido
    }

    public function is_ajax(){
        if (!is_ajax()) {
            redirect(BASE_URL);
            return false;
        }
    }

	public function checkPermission($type = 'list'){
		checkPermissao($type, $this->controller->id_module, $_SESSION['SIC_SYS'], $_SESSION['SIC_PERMISSOES']);
	}
	public function loadingView(&$data,$view){
		$this->controller->template->load($this->controller->sys_area, $this->controller->sys_module, $view, $data);
	}

	public function setUserdata(&$data){
		$this->controller->session->set_userdata("FR_LOGIN", true);
		$this->controller->session->set_userdata("FR_UID", $data['_user']->usu_id);
		$this->controller->session->set_userdata("FR_USER", $data['_user']->usu_nome);
		$this->controller->session->set_userdata("FR_GRUPO", $data['_user']->usu_grupo);
		$this->controller->session->set_userdata("FR_IMG", $data['_user']->usu_image);
		$this->controller->session->set_userdata("FR_FORCE", 0);
		$this->controller->session->set_userdata("FR_IDIOMA",@$data['_user']->pais_idioma);
		$this->controller->session->set_userdata("FR_PREFERENCIAS", $data['_user']->usu_preferencias);
		if (@$this->controller->session->userdata("direcionar") != "") {
			$data['return']['url']     = @$this->controller->session->userdata("direcionar");
			$this->controller->session->set_userdata("direcionar", "");
		}
	}
}
