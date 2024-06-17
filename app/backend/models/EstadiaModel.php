<?php

class EstadiaModel extends Database {
    private $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();
    }

    public function fetch() {
        $stm = $this->pdo->query("SELECT * FROM estadia");
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchById($id) {
        $stm = $this->pdo->prepare("SELECT * FROM estadia WHERE ID = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function create($dt_entrada, $dt_saida, $servico, $fk_empregado_id) {
        try {
            $sql = "INSERT INTO estadia (Dt_Entrada, Dt_Saida, Servico, fk_Empregado_ID) VALUES (?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$dt_entrada, $dt_saida, $servico, $fk_empregado_id]);
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function update($id_estadia, $dt_entrada, $dt_saida, $servico, $fk_empregado_id) {
        try {
            $sql = "UPDATE estadia SET Dt_Entrada = ?, Dt_Saida = ?, Servico = ?, fk_Empregado_ID = ? WHERE ID = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$dt_entrada, $dt_saida, $servico, $fk_empregado_id, $id_estadia]);
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

    public function fetchByDateRange($dt_entrada, $dt_saida) {
        $sql = "SELECT * FROM estadia WHERE Dt_Entrada >= ? AND Dt_Saida <= ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$dt_entrada, $dt_saida]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
