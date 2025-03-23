<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'gilmar_moveis';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;

    if ($categoria) {
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE categoria = ?");
        $stmt->execute([$categoria]);
    } else {
        $stmt = $pdo->query("SELECT * FROM produtos");
    }

    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($produtos, JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    echo json_encode(['erro' => 'Erro ao conectar: ' . $e->getMessage()]);
}
?>
