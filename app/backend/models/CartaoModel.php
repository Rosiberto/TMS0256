<?php 

class CartaoModel extends Database
 {
    private $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();

    }

    public function fetch() {
        $stm = $this->pdo->query("SELECT * FROM pagamento");
        if($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function fetchById($id) {
        $stm = $this->pdo->prepare("SELECT * FROM pagamento WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function create($cardNumber, $cvc, $validity)
    {
        $stmt = $this->pdo->prepare("INSERT INTO pagamento (Num_Cartao, Cod_Seguranca_Cartao, Dt_Vencimento_Cartao) VALUES (:card_number, :cvc, :validity)");
        return $stmt->execute([':card_number' => $cardNumber, ':cvc' => $cvc, ':validity' => $validity]);
    }

    public function update($id, $cardNumber, $cvc, $validity)
    {
        $stmt = $this->pdo->prepare("UPDATE pagamento SET (Num_Cartao, Cod_Seguranca_Cartao, Dt_Vencimento_Cartao) WHERE (ID)");
        return $stmt->execute([ $cardNumber,$cvc,$validity, $id]);
    }
}
?>