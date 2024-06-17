<?php

class ReservaModel extends Database {

    private $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();
    }


    public function fetch() {
        $stmt = $this->pdo->query("SELECT * FROM reserva");
        return $stmt->fetchAll();
    }

    public function fetchById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM reserva WHERE ID = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($check_in, $check_out, $servico, $valor_Pagamento, $quarto, $qtd_Pessoas) {
        
        try {
            $this->pdo->beginTransaction();

            $stmt = $this->pdo->prepare("INSERT INTO reserva (Qtd_Pessoa, Dt_Entrada, Dt_Saida, status) VALUES (?, ?, ?, ?)");
            $stmt->execute([$qtd_Pessoas, $check_in, $check_out, 1]);

            $stmt = $this->pdo->prepare("INSERT INTO estadia (Dt_Entrada, Dt_Saida, Servico) VALUES (?, ?, ?, ?)");
            $stmt->execute([$check_in, $check_out, $servico]);

            $reservaId = $this->pdo->lastInsertId();

            $stmt = $this->pdo->prepare("INSERT INTO quarto_reserva (fk_Quarto_ID, fk_Reserva_ID) VALUES (?, ?)");
            $stmt->execute([$quarto, $reservaId]);

            $stmt = $this->pdo->prepare("INSERT INTO fatura (Dt_Pagamento, Valor_Pagamento) VALUES (?, ?)");
            $stmt->execute([date('Y-m-d'), $valor_Pagamento]);
            $faturaId = $this->pdo->lastInsertId();

            $stmt = $this->pdo->prepare("INSERT INTO pode_ter_cliente_reserva_estadia (fk_Cliente_ID, fk_Reserva_ID, fk_Fatura_ID) VALUES (?, ?, ?)");
            $stmt->execute([1, $reservaId, $faturaId]);

            $this->pdo->commit();

            return true;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            return false;
        }
    }

    public function update($id, $check_in, $check_out, $valor_Pagamento, $quarto, $qtd_Pessoas) {
        $stmt = $this->pdo->prepare("UPDATE reserva SET Qtd_Pessoa = ?, Dt_Entrada = ?, Dt_Saida = ?, servico = ? WHERE ID = ?");
        return $stmt->execute([$qtd_Pessoas, $check_in, $check_out, $servico, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM reserva WHERE ID = ?");
        return $stmt->execute([$id]);
    }
}

?>
