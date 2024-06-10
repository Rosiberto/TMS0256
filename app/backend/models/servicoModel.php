<?php

class ServicoModel extends Database {
    
    private $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();
    }

    public function fetch() {
        $stm = $this->pdo->query("SELECT * FROM servico");
        if ($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function fetchById($id) {
        $stm = $this->pdo->prepare("SELECT * FROM servico WHERE ID = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function create($periodo_inicial, $periodo_final, $qtd_pessoas, $valor, $quarto_id) {
        // Verificar se o quarto está disponível para o período especificado
        $stmt = $this->pdo->prepare("SELECT * FROM servico WHERE fk_Quarto_ID = ? AND ((Periodo_Inicial BETWEEN ? AND ?) OR (Periodo_Final BETWEEN ? AND ?))");
        $stmt->execute([$quarto_id, $periodo_inicial, $periodo_final, $periodo_inicial, $periodo_final]);
    
        if ($stmt->rowCount() > 0) {
            return "O quarto já está reservado para o período especificado.";
        }
    
        try {
            $sql = "INSERT INTO servico (Periodo_Inicial, Periodo_Final, Qtd_Pessoa, Valor, fk_Quarto_ID) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$periodo_inicial, $periodo_final, $qtd_pessoas, $valor, $quarto_id]);
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }
    public function update($id, $periodo_inicial, $periodo_final, $qtd_pessoas, $valor, $quarto_id) {
        try {
            $sql = "UPDATE servico SET Periodo_Inicial = ?, Periodo_Final = ?, Qtd_Pessoa = ?, Valor = ?, fk_Quarto_ID = ? WHERE ID = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$periodo_inicial, $periodo_final, $qtd_pessoas, $valor, $quarto_id, $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM servico WHERE ID = ?");
            $stm->execute([$id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
