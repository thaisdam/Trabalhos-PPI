<?php

require "usuarios.php";

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

$usuarios = carregaUsuariosDeArquivo();

foreach ($usuarios as $usuario) {
    if ($usuario->email == $email && password_verify($senha, $usuario->senha)) {
        // Login bem-sucedido, redireciona para a página de sucesso
        header("Location: sucesso.html");
        exit();
    }
}

// Se não encontrar correspondência, volta para a página de login
header("Location: login.html");
exit;
?>
