<?php

// inicia a sessão
session_start(); // Cria ou resume uma sessão existente para poder manipulá-la

// apaga as variáveis de sessão de $_SESSION
session_unset(); // Remove todos os dados armazenados na variável global $_SESSION

// destrói a sessão e as variáveis fisicamente (em arquivo)
session_destroy(); // Finaliza a sessão no servidor e apaga o arquivo de sessão

// exclui o cookie da sessão no computador do usuário
setcookie(session_name(), "", 1, "/"); // Cria um cookie vazio com data de expiração no passado para apagar o cookie de sessão

// redireciona o usuário para a página de login
header('Location: index.html'); // Envia um cabeçalho HTTP para redirecionar o navegador para a página de login
exit(); // Interrompe imediatamente a execução do script para garantir o redirecionamento



