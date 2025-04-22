<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'gilmar_moveis';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!isset($_GET['id'])) {
        echo json_encode(["error" => "ID não fornecido."]);
        exit;
    }

    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produto) {
        echo json_encode($produto);
    } else {
        echo json_encode(["error" => "Produto não encontrado."]);
    }
} catch (PDOException $e) {
    echo json_encode(["error" => "Erro no banco de dados: " . $e->getMessage()]);
}
?>
