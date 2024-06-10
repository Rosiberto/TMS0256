<?php
class EmpresaModel extends Database {
    
    private $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();
    }

    public function fetch() {
        $stm = $this->pdo->query("SELECT * FROM empresa");
        if($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function fetchAll() {
        $stm = $this->pdo->query("SELECT id, nome FROM empresa");
        if($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function fetchById($id) {
        $stm = $this->pdo->prepare("SELECT * FROM empresa WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $endereco, $telefone, $categoria, $email) {
        try {
            $sql = "INSERT INTO empresa (Nome, endereço, telefone, categoria, email) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$name, $endereco, $telefone, $categoria, $email]);
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

    public function update($name, $endereco, $telefone, $categoria, $email, $id_Empresa) {
        try {
            $stm = $this->pdo->prepare("UPDATE empresa SET nome = ?,endereco = ?, telefone = ?, categoria = ? email = ? WHERE id = ?");
            $stm->execute([$name, $endereco, $telefone, $categoria, $email, $id_Empresa]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM empresa WHERE id = ?");
            $stm->execute([$id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }      
    }

}
