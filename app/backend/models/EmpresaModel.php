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

    public function fetchById($id) {
        $stm = $this->pdo->prepare("SELECT * FROM empresa WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function create( $name, $email, $telefone, $endereco, $nomeCategoria ) {
        try {
            $stm = $this->pdo->prepare("INSERT INTO cliente (Nome, Email, Telefone, Endereço, Categoria) VALUES (?, ?, ?, ?, ?)");
            $stm->execute([ $name, $email, $telefone, $endereco, $nomeCategoria ]);
      
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

    public function update($id, $name, $email, $telefone, $endereco, $nomeCategoria) {
        try {
            $stm = $this->pdo->prepare("UPDATE empresa SET Nome = ?, Email = ?, Telefone = ?, Endereco = ?, NomeCategoria = ? WHERE id = ?");
            $stm->execute([$name, $email, $telefone, $endereco, $nomeCategoria, $id]);
            return true;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
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
