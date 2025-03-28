<?php

require "usuarios.php";

// Coleta os dados do formulário
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

// cria um novo usuario e acrescenta no arquivo de texto
$novoUsuario = new Usuario($email, $senha);
$novoUsuario->SalvaEmArquivo();

// Redireciona para a página de listagem de usuários
header("location: listaUsuarios.php");

?>


