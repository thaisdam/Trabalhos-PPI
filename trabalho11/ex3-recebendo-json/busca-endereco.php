<?php

// Classe que representa um endereço com atributos rua, bairro e cidade
class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  // Construtor para inicializar os atributos do endereço
  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
  }
}

// Obtém o valor do parâmetro 'cep' da URL (via GET), ou uma string vazia se não existir
$cep = $_GET['cep'] ?? '';

// Verifica o valor do CEP informado e cria um objeto Endereco com base nele
if ($cep == '38400-100')
  $endereco = new Endereco('Av Floriano', 'Centro', 'Uberlândia');
else if ($cep == '38400-200')
  $endereco = new Endereco('Rua Tiradentes', 'Fundinho', 'Uberlândia');
else {
  // Caso o CEP não seja reconhecido, retorna um endereço vazio
  $endereco = new Endereco('', '', '');
}

// Define o tipo de conteúdo da resposta como JSON
header('Content-type: application/json');

// Converte o objeto Endereco em JSON e imprime como resposta
echo json_encode($endereco);
