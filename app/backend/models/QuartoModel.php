<?php

class QuartoModel extends Database {
    private $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();
    }

    public function fetch() {
        $stm = $this->pdo->query("SELECT * FROM quarto");
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchById($id) {
        $stm = $this->pdo->prepare("SELECT * FROM quarto WHERE ID = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function create($numero, $capacidadePessoa, $fkEmpresaID) {
        try {
            $sql = "INSERT INTO quarto (Numero, Capacidade_Pessoa, fk_Empresa_ID) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$numero, $capacidadePessoa, $fkEmpresaID]);
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function update($id_quarto, $numero, $capacidadePessoa, $fkEmpresaID) {
        try {
            $sql = "UPDATE quarto SET Numero = ?, Capacidade_Pessoa = ?, fk_Empresa_ID = ? WHERE ID = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$numero, $capacidadePessoa, $fkEmpresaID, $id_quarto]);
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function delete($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM quarto WHERE ID = ?");
            return $stm->execute([$id]);
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function fetchAvailableRooms($dt_entrada, $dt_saida, $cp_pessoa) {
        $sql = "
            SELECT * FROM quarto 
            WHERE Capacidade_Pessoa >= :cp_pessoa
            AND ID NOT IN (
                SELECT fk_Quarto_ID FROM estadia 
                WHERE (Dt_Entrada <= :dt_saida AND Dt_Saida >= :dt_entrada)
            )
        ";
    
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':cp_pessoa' => $cp_pessoa,
                ':dt_saida' => $dt_saida,
                ':dt_entrada' => $dt_entrada
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Database query error: ' . $e->getMessage());
            return [];
        }
    }  
} 
?>
