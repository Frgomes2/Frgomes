<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

    public function conexao()
    {
        // Tenta conectar usando o database carregado
        $this->load->database();

        if ($this->db->conn_id) {
            $driver = $this->db->dbdriver;
            $versao = $this->db->version();
            echo "<h2 style='color:green'>✅ Conexão bem-sucedida com o banco de dados!</h2>";
            echo "<p><strong>Driver:</strong> $driver</p>";
            echo "<p><strong>Versão:</strong> $versao</p>";
            echo "<p><strong>Ambiente:</strong> " . ENV . "</p>";
        } else {
            echo "<h2 style='color:red'>❌ Falha ao conectar com o banco de dados!</h2>";
            echo "<p>Verifique suas credenciais e conexão.</p>";
        }
    }
}
