<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$marca = $_GET['marca'] ?? '';

try {
  $sql = "SELECT DISTINCT modelo FROM veiculo WHERE marca = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$marca]);
  $modelos = $stmt->fetchAll(PDO::FETCH_COLUMN);
  echo json_encode($modelos);
} catch (Exception $e) {
  echo json_encode(["error" => $e->getMessage()]);
}
