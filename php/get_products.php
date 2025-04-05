<?php
header('Content-Type: application/json');

// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'gilmar_moveis';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obter categoria e subcategoria da URL
    $categoria = $_GET['categoria'] ?? '';
    $subcategoria = $_GET['subcategoria'] ?? '';

    // Consulta SQL com base nos parâmetros
    $sql = "SELECT * FROM produtos WHERE categoria = :categoria";
    if (!empty($subcategoria)) {
        $sql .= " AND subcategoria = :subcategoria";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':categoria', $categoria);
    if (!empty($subcategoria)) {
        $stmt->bindParam(':subcategoria', $subcategoria);
    }

    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($produtos);

} catch (PDOException $e) {
    echo json_encode(['erro' => 'Erro ao conectar: ' . $e->getMessage()]);
}
