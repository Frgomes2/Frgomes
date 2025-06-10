<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Database;

class Dbtest extends Controller
{
    public function index()
    {
        $db = Database::connect();
        $query = $db->query("SELECT NOW() as current_time");
        $row = $query->getRow();
        return '🕒 Hora atual no banco: ' . $row->current_time;
    }
}
