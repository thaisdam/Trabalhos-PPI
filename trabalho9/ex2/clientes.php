<?php

class Cliente
{
  public $nome;
  public $cpf;
  public $email;
  public $senha;
  public $cep;
  public $endereco;
  public $cidade;
  public $bairro;
 

  function __construct($nome, $cpf, $email, $senha, $cep, $endereco, $cidade, $bairro)
  {
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->email = $email;
    $this->senha = $senha;
    $this->cep = $cep;
    $this->endereco = $endereco;
    $this->cidade = $cidade;
    $this->bairro = $bairro;
  }

  public function SalvaEmArquivo()
  {
    // Abre o arquivo de texto para escrita de conteúdo no final
    $arq = fopen("clientes.txt", "a");

    // Neste exemplo os dados são armazenados de maneira simplificada,
    // no formato textual com campos separados por dois ponto-e-vírgula.
    fwrite($arq, "{$this->nome};{$this->cpf};{$this->email};{$this->senha};{$this->cep};{$this->endereco};{$this->cidade};{$this->bairro}\n");

    // Fecha o arquivo de texto.
    fclose($arq);
  }
}

// Carrega as informações dos contatos do arquivo de texto
// e retorna um array de objetos correspondente
function carregaClientesDeArquivo()
{
  $arrayClientes = [];

  // Abre o arquivo contatos.txt para leitura
  $arq = fopen("clientes.txt", "r");
  if (!$arq)
    return $arrayClientes;

  // Le os dados do arquivo, linha por linha, e armazena no vetor $contatos
  while (!feof($arq)) {
    // fgets lê uma linha de texto do arquivo, mas traz junto a quebra de linha (/n) no final, se houver
    // a função trim elimina caracteres em branco (inclusive /n) do início e do final da string
    $cliente = trim(fgets($arq));

    if ($cliente != "") {
      // Separa dados na linha utilizando o ';' como separador
      list($nome, $cpf, $email, $senha, $cep, $endereco, $cidade, $bairro ) = array_pad(explode(';', $cliente), 8, null);

      // Cria novo objeto representado o contato e adiciona no final do array
      $novoCliente= new Cliente($nome, $cpf, $email, $senha, $cep, $endereco, $cidade, $bairro);
      $arrayClientes[] = $novoCliente;
    }
  }

  // Fecha o arquivo
  fclose($arq);
  return $arrayClientes;
}
