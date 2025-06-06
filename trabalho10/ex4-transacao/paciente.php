<?php

class Paciente
{
  static function Create($pdo,
    $nome,  $sexo, $email,
    $peso, $altura,  $tipoSanguineo) 
  {
    try {
      $pdo->beginTransaction();

      // Inserção na tabela cliente. Repare que o campo id foi omitido por do tipo auto_increment
      // É necessário utilizar prepared statements para prevenir
      // inj. de S Q L, pois temos parâmetros fornecidos pelo usuário.
      // Uma exceção será lançada em caso de falha no prepare ou no execute.
      $stmt1 = $pdo->prepare(
        <<<SQL
        INSERT INTO pessoa (nome,  sexo, email)
        VALUES (?, ?, ?)
        SQL
      );
      $stmt1->execute([$nome,  $sexo, $email]);

      // Inserção na tabela endereco_cliente
      // O id do novo cliente gerado automaticamente na inserção anterior 
      // é resgatado por meio do método lastInsertId(). Precisamos desse id
      // para o campo id_cliente, que é chave estrangeira conectando o endereço
      // ao cliente da outra tabela.
      // Uma exceção será lançada em caso de falha no prepare ou no execute.
      $idNovaPessoa = $pdo->lastInsertId();
      $stmt2 = $pdo->prepare(
        <<<SQL
        INSERT INTO paciente (peso, altura, tipoSanguineo, idPessoa)
        VALUES (?, ?, ?, ?)
        SQL
      );
      $stmt2->execute([$peso, $altura, $tipoSanguineo, $idNovaPessoa]);

      // Efetiva as operações
      $pdo->commit();
    } 
    catch (Exception $e) {
      // Caso ocorra alguma falha nas operações da transação, a operação
      // rollback irá desfazer as operações que eventualmente tenham sido feitas,
      // voltando o BD ao estado em que se encontrava antes da chamada
      // de beginTransaction.
      $pdo->rollBack();
      throw $e;
    }

    // retorna o Id do novo cliente criado
    return $pdo->lastInsertId();
  }

  static function GetFirst30($pdo)
  {
    // Neste exemplo não é necessário utilizar prepared statements
    // porque não há a possibilidade de inj. de S Q L, 
    // pois nenhum parâmetro do usuário é utilizado na query SQL. 
    $stmt = $pdo->query(
      <<<SQL
      SELECT pessoa.id, nome,  sexo, email, peso, altura, tipoSanguineo
      FROM pessoa INNER JOIN paciente ON paciente.idPessoa = pessoa.id
      LIMIT 30
      SQL
    );

    // Resgata os dados dos clientes como um array de objetos
    $arrayPessoas = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $arrayPessoas;
  }
}
