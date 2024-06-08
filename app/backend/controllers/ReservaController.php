<?php

class ReservaController extends RenderView {
    private $reserva;

    public function __construct() {
        $this->reserva = new ReservaModel();
    }

    public function index() {
        $reservas = $this->reserva->fetch();
        $this->loadView("reservas", ['reservas' => $reservas]);
    }

    public function show($id) {
        $id_reserva = $id[0];
        $reserva = $this->reserva->fetchById($id_reserva);
        $this->loadView('reservaShow', ['reserva' => $reserva]);
    }

    public function create() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $requiredFields = ['check_in', 'check_out', 'valor_Pagamento', 'quarto'];
    
            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Preencha o campo " . ucfirst($field) . "!";
                    return;
                }
            }

            $check_in = $_POST['check_in'];
            $check_out = $_POST['check_out'];
            $valor_Pagamento = $_POST['valor_Pagamento'];
            $quarto = $_POST['quarto'];

            $result = $this->reservaModel->create($check_in, $check_out, $valor_Pagamento, $quarto);
            
            if ($result === true) {
                echo "Reserva criada com sucesso!";
            } else {
                echo "Desculpa, algo deu errado: " . $result;
            }
    }
}

    public function update($id) {
            $id_reserva = $id[0];

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_reserva = $id[0];
            $check_in = $_POST['check_in'];
            $check_out = $_POST['check_out'];
            $valor_Pagamento = $_POST['valor_Pagamento'];
            $quarto = $_POST['quarto'];

        $result = $this->reservaModel->update($id_reserva, $check_in, $check_out, $valor_Pagamento, $quarto);

        if ($result === true) {
            echo "Reserva atualizada com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }
    }
}

    public function delete($id) {
        $id_reserva = $id[0];
    
        $result = $this->reserva->delete($id_reserva);
        
        if ($result === true) {
            echo "Reserva deletada com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }        
    }
    
}
