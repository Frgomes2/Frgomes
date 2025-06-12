<?php
$host     = 'containers-us-west-123.railway.app';
$port     = 5432;
$dbname   = 'frgomes';
$user     = 'postgres';
$password = 'OkgbNBwrOZODgfuVChRErrUkztWQRXAC'; // Substitua pela real

$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

$conn = pg_connect($conn_string);

if (!$conn) {
	echo "<h2 style='color:red'>❌ Falha na conexão com o PostgreSQL!</h2>";
	echo "<pre>" . pg_last_error() . "</pre>";
} else {
	echo "<h2 style='color:green'>✅ Conexão com PostgreSQL feita com sucesso!</h2>";
	pg_close($conn);
}
?>
