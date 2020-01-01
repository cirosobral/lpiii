<?php

require_once 'DB.php';

class Usuario {
  public $id;
  public $nome;
  public $email;
  private $senha;
  public $nascimento;

  /* Métodos de acesso a dados */
  public static function buscaPor($campo, $valor) {
    $stmt = DB::getInstance()->prepare("SELECT * FROM `clientes` WHERE `$campo` = :valor;");
    $stmt->bindParam(':valor', $valor);

    $stmt->execute();

    return $stmt->fetchObject(__CLASS__);
  }

  public static function lista() {
    $stmt = DB::getInstance()->prepare("SELECT * FROM `clientes` ORDER BY `nome`;");

    $stmt->execute();

    $usuarios = array();
    while ($usuario = $stmt->fetchObject(__CLASS__)) {
        $usuarios[] = $usuario;
    }

    return $usuarios;
  }

  public static function buscaLista($valor) {
    $stmt = DB::getInstance()->prepare("SELECT * FROM `clientes`
      WHERE `nome` LIKE :valor
      OR`email` LIKE :valor
      ORDER BY `nome`;");

    $valor = "%$valor%";

    $stmt->bindParam(':valor', $valor);

    $stmt->execute();

    $usuarios = array();
    while ($usuario = $stmt->fetchObject(__CLASS__)) {
        $usuarios[] = $usuario;
    }

    return $usuarios;
  }

  public function salva() {
    // Se não existir um ID, é porque o objeto não existe, logo deve-se fazer um INSERT
    if (!isset($this->id))
      $this->insert();
    // Senão, faz um update
    else
      $this->update();
  }

  private function insert() {
    // Antes de inserir, encripta a senha
    $this->senha = $this->encriptaSenha($this->senha);

    $stmt = DB::getInstance()->prepare("INSERT INTO `clientes` VALUES (NULL, :nome, :email, :senha, :nascimento);");
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':senha', $this->senha);
    $stmt->bindParam(':nascimento', $this->nascimento);

    $stmt->execute();

    return DB::getInstance()->lastInsertId();
  }

  private function update() {
    $stmt = DB::getInstance()->prepare(
      "UPDATE `clientes` SET `nome` = :nome, `email` = :email, `senha` = :senha,
      `nascimento` = :nascimento WHERE `id` = :id;");
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':senha', $this->senha);
    $stmt->bindParam(':nascimento', $this->nascimento);
    $stmt->bindParam(':id', $this->id);

    $stmt->execute();

    return DB::getInstance()->lastInsertId();
  }

  public function delete() {
    $stmt = DB::getInstance()->prepare("DELETE FROM `clientes` WHERE `id` = :id;");
    $stmt->bindParam(':id', $this->id);

    $stmt->execute();
  }
  /* Fim dos métodos de acesso a dados */

  /* Métodos próprios da classe usuário */
  public function login($senha) {
    return password_verify($senha, $this->senha);
  }

  private function encriptaSenha($senhaPlana) {
    return password_hash($senhaPlana, PASSWORD_DEFAULT);
  }

  public function setSenha($senha) {
    $this->senha = $this->encriptaSenha($senha);
  }
  /* Fim dos métodos próprios da classe usuário */
}
