<?php

class ClientModel extends Database{
    
    private $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();
    }

    public function  fetch() {
        $stm = $this->pdo->query("SELECT * FROM clientes");
        if($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
    public function fetchById($id) {
        $stm = $this->pdo->prepare("SELECT * FROM clientes WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function create($name, $email) {
        try {
            $stm = $this->pdo->prepare("INSERT INTO clientes (nome, email) VALUES ( ?, ?)");
            $stm->execute([$name, $email]);
      
            if ($this->pdo->lastInsertId() > 0) {
              return true;
            } else {
              return false;
            }
          } catch (PDOException $e) {
            return false;
          }
    }

}