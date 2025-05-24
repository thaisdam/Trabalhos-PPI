<?php

/* O formulário foi enviado da forma tradicional?
Não. O envio foi feito via JavaScript com XMLHttpRequest, o que caracteriza uma requisição assíncrona (AJAX).

Houve redirecionamento?
Ao usar a senha incorreta (123):
Não. Foi exibida apenas uma mensagem de erro.

Houve redirecionamento?
Ao usar a senha correta (123456):
Sim. O usuário foi redirecionado para home.html.
*/

// Classe usada para criar a resposta em JSON com as informações do login
class LoginResult
{
  public $isAuthorized;   // true ou false, dependendo da verificação
  public $newLocation;    // URL de destino se o login for bem-sucedido

  function __construct($isAuthorized, $newLocation)
  {
    $this->isAuthorized = $isAuthorized;
    $this->newLocation = $newLocation;
  }
}

// Recebe os dados enviados via POST (pela requisição AJAX)
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// R: A verificação é feita no servidor e compara o e-mail e a senha.
// A senha correta é '123456'. Caso contrário, o login falha.

// Essa validação é simplificada e não deve ser usada em produção.
if ($email == 'fulano@mail.com' && $senha == '123456')
  // Login autorizado -> envia resposta com isAuthorized = true e redireciona para home.html
  $loginResult = new LoginResult(true, 'home.html');
else
  //Login não autorizado -> envia isAuthorized = false e nenhum redirecionamento
  $loginResult = new LoginResult(false, '');

// Define o tipo da resposta como JSON
header('Content-type: application/json');
// Envia a resposta em JSON para o navegador
echo json_encode($loginResult);
?>
