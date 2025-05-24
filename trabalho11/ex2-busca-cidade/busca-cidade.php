<?php

// Obtém o valor do CEP enviado pela URL (GET), ou uma string vazia se não foi enviado
$cep = $_GET['cep'] ?? '';

// Verifica se o CEP é igual a 38400-100
if ($cep == '38400-100'
  echo 'Uberlândia'; // Retorna o nome da cidade

// Verifica se o CEP é igual a 38700-000
else if ($cep == '38700-000')
  echo 'Patos de Minas'; // Retorna outra cidade

// Se o CEP não for nenhum dos dois, retorna erro
else {
  // Altera o status HTTP para 404 (não encontrado)
  http_response_code(404);
  
  // Retorna uma mensagem informando que o CEP não está disponível
  echo "$cep is not available";
}
