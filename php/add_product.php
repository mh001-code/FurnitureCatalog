<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// Inclui o arquivo de conexão
include 'conection.php'; // Inclui a conexão com o banco

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se os dados foram enviados corretamente
    $dados = json_decode(file_get_contents("php://input"), true);

    if (!isset($dados['nome'], $dados['preco'], $dados['descricao'], $dados['imagem'], $dados['categoria'], $dados['subcategoria'])) {
        echo json_encode(["success" => false, "message" => "Todos os campos são obrigatórios."]);
        exit;
    }

    // Prepara a consulta SQL
    $sql = "INSERT INTO produtos (nome, preco, descricao, imagem, categoria, subcategoria) VALUES (:nome, :preco, :descricao, :imagem, :categoria, :subcategoria)";
    $stmt = $pdo->prepare($sql);

    // Executa a consulta
    $stmt->execute([
        ':nome' => $dados['nome'],
        ':preco' => $dados['preco'],
        ':descricao' => $dados['descricao'],
        ':imagem' => $dados['imagem'],
        ':categoria' => $dados['categoria'],
        ':subcategoria' => $dados['subcategoria']
    ]);

    echo json_encode(["success" => true, "message" => "Produto adicionado com sucesso!"]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Erro ao conectar: " . $e->getMessage()]);
}
