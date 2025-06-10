<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Database;

class Dbtest extends Controller
{
	public function index()
	{
		try {
			$db = Database::connect();
			$query = $db->query("SELECT NOW() as current_time");
			$row = $query->getRow();
			return "✅ Banco conectado com sucesso!<br>🕒 Hora atual no banco: <strong>{$row->current_time}</strong>";
		} catch (\Throwable $e) {
			return "❌ Erro ao conectar no banco:<br><pre>" . $e->getMessage() . "</pre>";
		}
	}
}
