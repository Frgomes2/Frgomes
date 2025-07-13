<?php
namespace Services\Admin\Dashboard;
require_once APPPATH . 'libraries/services/admin/AdminBaseService.php';
use Services\Admin\AdminBaseService;

class DashGenericService extends AdminBaseService{

	protected $controller;
	public function __construct($controller) {
		parent::__construct();
		$this->controller = $controller;
	}

	public function index(){
		$data = ['dash_title' => 'Em Construção:'];
		$this->loadingView($data,'dash_generico');
	}
}
