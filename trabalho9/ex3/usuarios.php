<?php

class Usuario
{
    public $email;
    public $senha; // Agora armazena o hash

    function __construct($email, $senha)
    {
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function SalvaEmArquivo()
    {
        // Abre o arquivo para adicionar novos usuários no final
        $arq = fopen("usuarios.txt", "a");

        // Escreve os dados no formato email;hash_da_senha
        fwrite($arq, "{$this->email};{$this->senha}\n");

        // Fecha o arquivo
        fclose($arq);
    }
}

// Carrega os usuários do arquivo e retorna um array de objetos
function carregaUsuariosDeArquivo()
{
    $arrayUsuarios = [];

    // Abre o arquivo para leitura
    $arq = fopen("usuarios.txt", "r");
    if (!$arq) return $arrayUsuarios;

    // Lê os dados do arquivo linha por linha
    while (!feof($arq)) {
        $usuario = trim(fgets($arq));

        if ($usuario!= "") {
            list($email, $senha) = array_pad(explode(';', $usuario), 2, null);
            $usuario = new Usuario($email, '');
            $usuario->senha = $senha;
            $arrayUsuarios[] = $usuario;
        }
    }

    // Fecha o arquivo
    fclose($arq);
    return $arrayUsuarios;
}

