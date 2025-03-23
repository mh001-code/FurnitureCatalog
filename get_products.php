<?php
// Habilitar o relatório de erros para facilitar a depuração
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Cabeçalho indicando que a resposta será em JSON
header('Content-Type: application/json');

// Código PHP para processar os produtos
$host = 'localhost';
$dbname = 'gilmar_moveis';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $categoria = $_GET['categoria'] ?? '';
    
    if (empty($categoria)) {
        echo json_encode(['erro' => 'Categoria não informada']);
        exit();
    }

    // Consulta segura com prepared statement
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE categoria = :categoria");
    $stmt->execute(['categoria' => $categoria]);

    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($produtos)) {
        echo json_encode(['erro' => 'Nenhum produto encontrado']);
    } else {
        echo json_encode(['produtos' => $produtos]);
    }
} catch (PDOException $e) {
    echo json_encode(['erro' => 'Erro ao conectar: ' . $e->getMessage()]);
}
?>
