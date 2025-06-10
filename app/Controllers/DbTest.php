<?php namespace App\Controllers;

use CodeIgniter\Controller;

class DbTest extends Controller
{
	public function index()
	{
		return "<h3>Variáveis de ambiente do Railway</h3><pre>" .
			'PGHOST=' . getenv('PGHOST') . "\n" .
			'PGUSER=' . getenv('PGUSER') . "\n" .
			'PGPASSWORD=' . (getenv('PGPASSWORD') ? '***' : 'vazio') . "\n" .
			'PGDATABASE=' . getenv('PGDATABASE') . "\n" .
			'PGPORT=' . getenv('PGPORT') . "\n" .
			"</pre>";
	}
}
