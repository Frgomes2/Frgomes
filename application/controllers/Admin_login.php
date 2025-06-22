<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/services/ServiceLoader.php';

class Admin_login extends CI_Controller {

    public $sys_area           = "admin_login";
    public $sys_module         = "admin_login";
    public $total_of_page      = 15;
    public $id_module          = 3;

	public function __construct(){
		parent::__construct();
        $this->load->model("Users_model"                    , "usuario");
        $this->load->model("Grupopermissoes_model"          , "permissoes");
        $this->load->model("Menus_model"                    , "menus_sistema");


        // Carregar todos os serviços automaticamente
        $this->services = new ServiceLoader($this);
	}

    public function index(){
        $this->template->loadsimples('admin_login', 'login.php',[]);
	}

    public function signin(){
        $this->services->signinService->index( );
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(BASE_URL);
	}

    public function forgotPassword(){
        $this->services->forgotPasswordService->index( );
    }

    public function passwordrecovery($token = null) {
        $this->services->passwordRecoveryService->index( $token);
    }

    public function changer(){
        $this->services->changerService->index( );
    }

    public function isLogged(){
        return $this->session->userdata(NAME_SESSION.'LOGGED');
    }
}