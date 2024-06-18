<?php

class FuncionarioModel extends Database {
    
    private $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();
    }

    public function fetch() {
        $stm = $this->pdo->query("SELECT * FROM empregado");
        if($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function fetchSearch() {
        $stm = $this->pdo->query("SELECT id, nome FROM empregado");
        if($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function fetchById($id) {
        $stm = $this->pdo->prepare("SELECT * FROM empregado WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nome, $fkEmpresa, $fkFuncaoEmpregado, $loginId ) {
        try {
        
            $sql = "INSERT INTO empregado (Nome, fk_Empresa_ID, fk_Funcao_Empregado_ID, fk_Login_ID) VALUES (?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$nome, $fkEmpresa, $fkFuncaoEmpregado, $loginId]);
      
            if ($stm->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }


    public function update($id_funcionario, $nome, $fkEmpresa, $fkFuncaoEmpregado, $loginId ) {
        try {
        
            $sql = "UPDATE empregado SET Nome = ?, fk_Empresa_ID = ?, fk_Funcao_Empregado_ID = ?, fk_Login_ID = ? WHERE ID = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$nome, $fkEmpresa,  $fkFuncaoEmpregado, $loginId]);
      
            if ($stm->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function delete($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM estadia WHERE ID = ?");
            return $stm->execute([$id_estadia]);
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }


    public function getEmpresas() {
            $stmt = $this->pdo->prepare("SELECT id, nome  FROM empresa");
            $stmt->execute();
            while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                $empresas = $row;
            }
            return $empresas;
      
}

}



