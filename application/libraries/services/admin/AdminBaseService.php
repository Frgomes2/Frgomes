<?php
namespace Services\Admin;
require_once APPPATH . 'libraries/services/BaseService.php';

use Services\BaseService;

class AdminBaseService extends BaseService
{

	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}
}
