
<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

try {
  $sql = "SELECT DISTINCT marca FROM veiculo";
  $stmt = $pdo->query($sql);
  $marcas = $stmt->fetchAll(PDO::FETCH_COLUMN);
  echo json_encode($marcas);
} catch (Exception $e) {
  echo json_encode(["error" => $e->getMessage()]);
}
