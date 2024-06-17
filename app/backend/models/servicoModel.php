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
        $stm = $this->pdo->prepare("SELECT * FROM servico WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function create($dt_entrada, $dt_saida, $servico, $fk_empregado_id) {
        try {

            
            $this->pdo->beginTransaction();
            
            $sql = "INSERT INTO servico (Dt_Entrada, Dt_Saida, Servico, fk_Empregado_ID) VALUES (?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$dt_entrada, $dt_saida, $servico, $fk_empregado_id]);
            
            $this->pdo->commit();
            return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function update($id_servico, $dt_entrada, $dt_saida, $servico, $fk_empregado_id) {

        $id_servico = $id;
        
        try {
            $stm = $this->pdo->prepare("UPDATE servico SET Dt_Entrada = ?, Dt_Saida = ?, Servico = ?, fk_Empregado_ID = ? WHERE id = ?");
            $stm->execute([$dt_entrada, $dt_saida, $servico, $fk_empregado_id, $id_servico]);
            return true;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function delete($id) {
        $id_servico = $id;
        try {
            $stm = $this->pdo->prepare("DELETE FROM servico WHERE id = ?");
            $stm->execute([$id_servico]);
            return true;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }
}
?>
