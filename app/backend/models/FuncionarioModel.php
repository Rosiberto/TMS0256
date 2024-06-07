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

    public function fetchById($id) {
        $stm = $this->pdo->prepare("SELECT * FROM empregado WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    // public function create1($nomeUsuario, $password, $name, $empresa, $funcao) {
    //     try {
    //         $sql = "INSERT INTO login (login, senha) VALUES (?, ?)";
    //         $stm = $this->pdo->prepare($sql);
    //         $stm->execute([$nomeUsuario, $password]);

    //         $sql1 = "INSERT INTO empregado (nome, fk_Funcao_Empregado, fk_Empresa_ID) VALUES (?, ?, ?)";
    //         $stm = $this->pdo->prepare($sql1);
    //         $stm->execute([$name, $empresa,  $funcao]);
      
    //         if ($this->pdo->lastInsertId() > 0) {
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     } catch (PDOException $e) {
    //         error_log('Database error: ' . $e->getMessage());
    //         return false;
    //     }
    // }

    public function create($nomeUsuario, $senha, $nome, $fkEmpresa, $fkFuncaoEmpregado) {
        try {
            $sql = "INSERT INTO login (login, senha) VALUES (?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$nomeUsuario, $senha]);

            $sql1 = "INSERT INTO empregado (Nome, fk_Empresa_ID, fk_Funcao_Empregado_ID, fk_Login_ID) VALUES (?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql1);
            $stm->execute([$nome, $fkEmpresa,  $fkFuncaoEmpregado, $this->pdo->lastInsertId()]);
      
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

    public function getFuncoesEmpregado() {
        $stmt = $this->pdo->prepare("SELECT ID, Nome_Funcao FROM funcao_empregado");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // public function update($nome, $id) {
    //     try {
    //         $stm = $this->pdo->prepare("UPDATE empregado SET nome = ? WHERE id = ?");
    //         $stm->execute([$nome, $id]);
    //         return true;
    //     } catch (PDOException $e) {
    //         return false;
    //     }
    // }

    // public function delete($id) {
    //     try {
    //         $stm = $this->pdo->prepare("DELETE FROM empregado WHERE id = ?");
    //         $stm->execute([$id]);
    //         return true;
    //     } catch (PDOException $e) {
    //         return false;
    //     }      
    // }

    public function getEmpresas() {
            $stmt = $this->pdo->prepare("SELECT id, nome  FROM empresa");
            $stmt->execute();

            $empresas = [];
            while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                $empresas = $row;
            }
            return $empresas;
      
}

}



