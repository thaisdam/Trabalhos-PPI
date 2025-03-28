<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- 1: Tag de responsividade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página Dinâmica - Listagem de Contatos - Vulnerável</title>

  <!-- 2: Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <div class="container">

    <h3>Clientes Carregados do Arquivo <i>clientes.txt</i></h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nome</th>
          <th>CPF</th>
          <th>Email</th>
          <th>Senha</th>
          <th>CEP</th>
          <th>Endereço</th>
          <th>Cidade</th>
          <th>Bairro</th>
        </tr>
      </thead>

      <tbody>
        <?php
        require "clientes.php";
        $arrayClientes = carregaClientesDeArquivo();
        foreach ($arrayClientes as $cliente) {
          echo <<<HTML
            <tr>
              <td>$cliente->nome</td>
              <td>$cliente->cpf</td>
              <td>$cliente->email</td>
              <td>$cliente->senha</td>
              <td>$cliente->cep</td>
              <td>$cliente->endereco</td>
              <td>$cliente->cidade</td>
              <td>$cliente->bairro</td>
            </tr>
          HTML;
        }
        ?>
      </tbody>
    </table>
    <a href="index.html">Voltar à página inicial</a>
  </div>

</body>
</html>