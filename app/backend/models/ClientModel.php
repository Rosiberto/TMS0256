<?php
include_once("Database.php");

class ClientModel extends Database{
    
    private $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();
    }

    public function  fetch() {
        $stm = $this->pdo->query("SELECT * FROM cliente");
        if($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
    public function fetchById($id) {
        $stm = $this->pdo->prepare("SELECT * FROM cliente WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function create( $name, $email, $telefone, $morada, $documento, $nacionalidade, $dataNascimento ) {
        try {
            $stm = $this->pdo->prepare("INSERT INTO cliente (Nome, Email, Telefone, Morada, Documento ,Nacionalidade, Dt_Nascimento) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stm->execute([ $name, $email, $telefone, $morada, $documento, $nacionalidade, $dataNascimento ]);
      
            if ($this->pdo->lastInsertId() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }
  
    public function update($id, $name, $email, $telefone, $morada, $documento, $nacionalidade, $dataNascimento) {
      try {
          $stm = $this->pdo->prepare("UPDATE cliente SET Nome = ?, Email = ?, Telefone = ?, Morada = ?, Documento = ?, Nacionalidade = ?, Dt_Nascimento = ? WHERE id = ?");
          $stm->execute([$name, $email, $telefone, $morada, $documento, $nacionalidade, $dataNascimento, $id]);
          return true;
      } catch (PDOException $e) {
          error_log('Database error: ' . $e->getMessage());
          return false;
      }
  }

    public function delete($id) {
      try {
        $stm = $this->pdo->prepare("DELETE FROM clientes WHERE id = ?");
        $stm->execute([$id]);
        return true;
      } catch (PDOException $e) {
        return false;
      }      
    }

}