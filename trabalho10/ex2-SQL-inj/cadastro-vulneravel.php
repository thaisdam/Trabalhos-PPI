<?php

// Importa o arquivo de conexao com o banco de dados
require "../conexaoMysql.php";
// Estabelece a conexao com o banco de dados
$pdo = mysqlConnect();

// Obtem os dados enviados pelo formulario
$nome = $_POST["nome"] ?? "";
$telefone = $_POST["telefone"] ?? "";

try {

  // NÃO FAÇA ISSO! Este código permite que um usuário mal-intencionado
  // insira comandos indesejados no banco de dados ao invés de apenas dados válidos.
  /*$sql = <<<SQL
  INSERT INTO aluno (nome, telefone)
  VALUES ('$nome', '$telefone');
  SQL;  */

  // Como os valores sao inseridos diretamente dentro da string SQL,
  // qualquer conteudo vindo do usuario sera tratado como parte da consulta,
  // podendo modificar a operacao pretendida no banco de dados.
  
  // Para testar esse comportamento, tente cadastrar um aluno
  // e insira no campo telefone o texto sugerido pelo professor nos slides de aula.
  
  // Executa a consulta no banco
  //$pdo->exec($sql);

   // EX 2-4) UTILIZA PREPARED STATEMENTS 
   $sql = "INSERT INTO aluno (nome, telefone) VALUES (?, ?)";
   $stmt = $pdo->prepare($sql);
   $stmt->execute([$nome, $telefone]);
  
  // Redireciona o usuario para a pagina que exibe os alunos cadastrados
  header("location: mostra-alunos.php");
  exit();
} 
catch (Exception $e) {  
  // Exibe uma mensagem de erro e interrompe a execucao do script
  exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
