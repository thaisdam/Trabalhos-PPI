
<?php

function exitWhenNotLoggedIn()
{ 
  if (!isset($_SESSION['loggedIn'])) { // Verifica se a variável de sessão 'loggedIn' não está definida
    header("Location: index.html"); // Se não estiver definida, redireciona o usuário para a página de login
    exit();                         // Interrompe a execução do script 
  }
}
