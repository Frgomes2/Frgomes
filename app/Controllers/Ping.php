<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Ping extends Controller
{
	public function index()
	{
		return "✅ CodeIgniter está rodando!";
	}
}
