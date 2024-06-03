<?php 
class ClientModel extends Database{
    private $conn;
    private $cliente = "cliente";

    public $id_cliente;
    public $nome;
    public $sobrenome;
    public $email;
    public $telefone;
    public $cpf;
    public $sexo;
    public $estado;
    public $senha;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->cliente . " (nome, email, telefone, documento, sexo, nacionalid_clienteade, senha) 
                  VALUES (:nome, :email, :telefone, :cpf, :sexo, :estado, :senha)";
        $stmt = $this->conn->prepare($query);

        $this->nome = $this->nome . ' ' . $this->sobrenome;
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':sexo', $this->sexo);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':senha', $this->senha);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function checkDuplicate() {
        $query = "SELECT * FROM " . $this->cliente . " WHERE email = :email OR documento = :cpf";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
      $query = "UPDATE " . $this->cliente . " SET nome = :nome, email = :email, telefone = :telefone, documento = :cpf, sexo = :sexo, nacionalid_clienteade = :estado WHERE id_cliente = :id_cliente";
      $stmt = $this->conn->prepare($query);
  
      $stmt->bindParam(':id_cliente', $this->id_cliente);
      $stmt->bindParam(':nome', $this->nome);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':telefone', $this->telefone);
      $stmt->bindParam(':cpf', $this->cpf);
      $stmt->bindParam(':sexo', $this->sexo);
      $stmt->bindParam(':estado', $this->estado);
  
      return $stmt->execute();
  }

    public function delete() {
      $query = "DELETE FROM " . $this->cliente . " WHERE id_cliente = :id_cliente";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id_cliente', $this->id_cliente);
      return $stmt->execute();
}
    public function login($email, $senha) {
      $query = "SELECT * FROM " . $this->cliente . " WHERE email = :email";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($cliente) {
          // Verificar se a senha está correta
          if (password_verify($senha, $cliente['senha'])) {
              return $cliente; // Retorna os dados do cliente se as credenciais estiverem corretas
          }
      }
      
      return false; // Retorna false se as credenciais estiverem incorretas
}

}
?>