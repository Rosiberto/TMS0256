<?php 
class QuartoModel extends Database {
    
    private $pdo;
    
    public function __construct() {
        $this->pdo = $this->getConnection();
    }

    public function  fetch() {
        $stm = $this->pdo->query("SELECT * FROM quarto");
        if($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function fetchById($id) {
        $stm = $this->pdo->prepare("SELECT * FROM quarto WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function fetchEmpresas() {
        $stm = $this->pdo->query("SELECT id, Nome FROM empresa");
        if ($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return getMessage();
        }
    }

    public function fetchAvailable() {
        try {
            $stm = $this->pdo->query("SELECT * FROM quarto_reserva WHERE id= 1");
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return [];
        }
    }
    

    public function create($numero, $capacidadePessoa, $fkEmpresaID) {
        // Verifica se a empresa existe
        $stm = $this->pdo->prepare("SELECT * FROM empresa WHERE id = ?");
        $stm->execute([$fkEmpresaID]);
        if ($stm->rowCount() === 0) {
            return "Empresa não encontrada!";
        }

        try {
            $sql = "INSERT INTO quarto (Numero, Capacidade_Pessoa, fk_Empresa_ID) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$numero, $capacidadePessoa, $fkEmpresaID]);

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
    
}

?>
