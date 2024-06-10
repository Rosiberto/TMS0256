<?php
class LoginModel extends Database{
    
    private $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();

    }

    public function  fetch() {
        $stm = $this->pdo->query("SELECT * FROM login");
        if($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
    public function fetchByLogin($login) {
        $stm = $this->pdo->prepare("SELECT * FROM login WHERE Login = ?");
        $stm->execute([$login]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function create($login, $senha) {
        try {
            $sql = "INSERT INTO login (Login, Senha) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($sql);
            
            if ($stmt->execute([$login, $senha])) {
                $lastId = $this->pdo->lastInsertId();
                if ($lastId > 0) {
                    return $lastId;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }
    
  
    public function update($id, $login, $senha) {
      try {
          $stm = $this->pdo->prepare("UPDATE  login SET Login = ?, Senha = ?, WHERE id = ?");
          $stm->execute([$login, $senha, $id]);
          return true;
      } catch (PDOException $e) {
          error_log('Database error: ' . $e->getMessage());
          return false;
      }
  }

    public function delete($id) {
      try {
        $stm = $this->pdo->prepare("DELETE FROM login WHERE id = ?");
        $stm->execute([$id]);
        return true;
      } catch (PDOException $e) {
        return false;
      }      
    }

    

}