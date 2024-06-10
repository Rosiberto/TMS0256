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
    
    public function create($check_in, $check_out, $valor_Pagamento, $quarto, $qtd_Pessoas) {
        $stmt = $this->pdo->prepare("SELECT * FROM quarto WHERE ID = ?");
        $stmt->execute([$quarto]);
        if ($stmt->rowCount() === 0) {
            return "Quarto não disponível!";
        }

        try {
            $sql = "INSERT INTO reserva (Dt_Entrada, Dt_Saida, Valor_Pagamento, fk_Quarto_ID, Qtd_Pessoas) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$check_in, $check_out, $valor_Pagamento, $quarto, $qtd_Pessoas]);
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function update($id, $check_in, $check_out, $valor_Pagamento, $quarto, $qtd_Pessoas) {
        try {
            $sql = "UPDATE reserva SET Dt_Entrada = ?, Dt_Saida = ?, Valor_Pagamento = ?, fk_Quarto_ID = ?, Qtd_Pessoas = ? WHERE ID = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$check_in, $check_out, $valor_Pagamento, $quarto, $qtd_Pessoas, $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return $e->getMessage();
        }
    }

    public function delete($id) {
      try {
        $stm = $this->pdo->prepare("DELETE FROM reservas WHERE id = ?");
        $stm->execute([$id]);
        return true;
      } catch (PDOException $e) {
        return false;
      }      
    }

}