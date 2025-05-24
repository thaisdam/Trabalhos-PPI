
<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$modelo = $_GET['modelo'] ?? '';

try {
  $sql = "SELECT modelo, ano, cor, quilometragem FROM veiculo WHERE modelo = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$modelo]);
  $veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($veiculos);
} catch (Exception $e) {
  echo json_encode(["error" => $e->getMessage()]);
}
