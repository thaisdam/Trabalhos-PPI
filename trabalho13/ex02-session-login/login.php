<?php

require "conexaoMysql.php";

// Classe para encapsular o resultado do login
class LoginResult
{
  public $success; // Booleano indicando se o login foi bem-sucedido
  public $newLocation; // Página para redirecionar em caso de sucesso

  function __construct($success, $newLocation)
  {
    $this->success = $success;
    $this->newLocation = $newLocation;
  }
}

// Função para verificar se o email e a senha fornecidos são válidos
function checkUserCredentials($pdo, $email, $senha)
{
  $sql = <<<SQL
    SELECT senhaHash
    FROM cliente
    WHERE email = ?
    SQL;

  try {
    // Prepared statement para evitar ataques de injeção de SQL
    // É necessário utilizar prepared statements por incluir
    // parâmetros informados pelo usuário
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    // Busca o hash da senha armazenada para o email fornecido
    $senhaHash = $stmt->fetchColumn();

    if (!$senhaHash) 
      return false; // a consulta não retornou nenhum resultado (email não encontrado)

    if (!password_verify($senha, $senhaHash))
      return false; // email e/ou senha incorreta
      
    // email e senha corretos
    return true;
  } 
  catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
  }
}

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$pdo = mysqlConnect();

// Verifica se as credenciais do usuário estão corretas
if (checkUserCredentials($pdo, $email, $senha)) {
  // Define o parâmetro 'httponly' para o cookie de sessão, para que o cookie
  // possa ser acessado apenas pelo navegador nas requisições http (e não por código JavaScript).
  // Aumenta a segurança evitando que o cookie de sessão seja roubado por eventual
  // código JavaScript proveniente de ataq. X S S.
  $cookieParams = session_get_cookie_params();
  $cookieParams['httponly'] = true;
  session_set_cookie_params($cookieParams);
  
  session_start(); //inicia a sessão

  // Define variáveis de sessão para indicar que o usuário está logado
  $_SESSION['loggedIn'] = true;
  $_SESSION['user'] = $email;
  
  // Cria um objeto indicando sucesso e a página para redirecionamento
  $response = new LoginResult(true, 'home.php');
} 
else
  $response = new LoginResult(false, '');   // Se o login falhar, cria um objeto de resposta indicando falha
// Define o tipo de conteúdo da resposta para JSON
header('Content-Type: application/json; charset=utf-8');
// Retorna o resultado da tentativa de login para o JavaScript do front-end
echo json_encode($response);