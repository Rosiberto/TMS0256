<?php
include_once("Database.php");

class ReservaModel extends Database{
    
    private $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();
    }

    public function  fetch() {
        $stm = $this->pdo->query("SELECT * FROM reserva");
        if($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
    public function fetchById($id) {
        $stm = $this->pdo->prepare("SELECT * FROM reserva WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function create($name, $email) {
        try {
            $stm = $this->pdo->prepare("INSERT INTO reserva (nome, email) VALUES (?, ?)");
            $stm->execute([$name, $email]);
      
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
  
    public function update($name, $email, $id) {
      try {
        $stm = $this->pdo->prepare("UPDATE reserva SET nome = ?, email = ? WHERE id = ?");
        $stm->execute([$name, $email, $id]);
        return true;
      } catch (PDOException $e) {
        return false;
      }
    }

    public function delete($id) {
      try {
        $stm = $this->pdo->prepare("DELETE FROM reserva WHERE id = ?");
        $stm->execute([$id]);
        return true;
      } catch (PDOException $e) {
        return false;
      }      
    }

}