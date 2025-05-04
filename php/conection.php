<?php
// Defina as configurações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'gilmar_moveis';
$user = 'root';
$password = '';

try {
    // Cria a instância do PDO para conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    
    // Configura o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Caso haja erro na conexão, exibe a mensagem
    echo json_encode(['erro' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage()]);
    exit; // Interrompe a execução do script
}
?>