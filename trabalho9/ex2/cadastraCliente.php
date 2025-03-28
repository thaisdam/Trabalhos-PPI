<?php

require "clientes.php";

// coleta os dados do formulário
$nome = $_POST["nome"] ?? "";
$cpf = $_POST["cpf"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$cep = $_POST["cep"] ?? "";
$endereco = $_POST["endereco"] ?? "";
$bairro = $_POST["bairro"] ?? "";
$cidade = $_POST["cidade"] ?? "";


// cria um novo contato e acrescenta no arquivo de texto
$novoCliente = new Cliente($nome, $cpf, $email, $senha, $cep, $endereco, $bairro, $cidade);
$novoCliente->SalvaEmArquivo();

// redireciona o navegador para a página de listagem de contatos
header("location: listaClientes.php");

?>