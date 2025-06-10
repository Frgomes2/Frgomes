<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;

class DbTest extends Controller
{
	public function index()
	{
		try {
			$db = \Config\Database::connect();
			$query = $db->query("SELECT NOW()");
			$result = $query->getRow();
			return "✅ Banco conectado com sucesso! <br>Hora atual no PostgreSQL: <strong>{$result->now}</strong>";
		} catch (DatabaseException $e) {
			return "❌ Erro ao conectar no banco: <br><pre>" . $e->getMessage() . "</pre>";
		}
	}
}
