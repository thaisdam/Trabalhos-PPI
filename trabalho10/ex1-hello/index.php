<?php



// Importa o arquivo de conexao com o banco de dados

require "../conexaoMysql.php";

// Estabelece a conexao com o banco de dados

$pdo = mysqlConnect();



try {

  // Define a consulta SQL para selecionar os campos nome e telefone da tabela aluno

  $sql = <<<SQL

    SELECT nome, telefone

    FROM aluno

  SQL;



  // Executa a consulta e armazena o resultado na variavel $stmt

  $stmt = $pdo->query($sql);

} 

catch (Exception $e) {

  // Em caso de erro, exibe uma mensagem e encerra o script

  exit('Ocorreu uma falha: ' . $e->getMessage());

}



?>

<!doctype html>

<html lang="pt-BR">



<head>

  <meta charset="utf-8">

  <!-- 1: Tag de responsividade -->

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Hello World - Listagem de Dados em Tabela do MySQL</title>



  <!-- 2: Bootstrap CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>



<body>

  <div class="container">

    <h3>Dados na tabela <b>aluno</b></h3>

    <table class="table table-striped table-hover">

      <tr>

        <th>Nome</th>

        <th>Telefone</th>

      </tr>

      <?php

      // Itera sobre os resultados da consulta

      while ($row = $stmt->fetch()) 

      {

        // Obtem os valores da linha atual e aplica htmlspecialchars para evitar XSS

        $nome = htmlspecialchars($row['nome']);

        $telefone = htmlspecialchars($row['telefone']);



        // Exibe os dados dentro da tabela HTML

        echo <<<HTML

        <tr>

          <td>$nome</td> 

          <td>$telefone</td>

        </tr>      

        HTML;

      }

      ?>

    </table>

    <!-- Link para voltar ao menu de opcoes -->

    <a href="../index.html">Menu de opcoes</a>

  </div>



</body>



</html>

