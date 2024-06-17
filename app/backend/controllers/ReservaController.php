<?php

class ReservaController extends RenderView {
    private $reserva;

    public function __construct() {
        $this->reserva = new ReservaModel();
    }

    public function index() {
        $reservas = $this->reserva->fetch();
        $this->loadView("reserva", ['reservas' => $reservas]);
    }

    public function show($id) {
        $id_reserva = $id[0];
        $reserva = $this->reserva->fetchById($id_reserva);
        $this->loadView('reservaShow', ['reserva' => $reserva]);
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $requiredFields = ['Dt_Entrada', 'Dt_Saida', 'servico', 'qtd_Pessoas'];

            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Preencha o campo " . ucfirst($field) . "!";
                    return;
                }
            }

            $check_in = $_POST['Dt_Entrada'];
            $check_out = $_POST['Dt_Saida'];
            $servico = $_POST['servico'];
            $valor_Pagamento = 1000;
            $quarto = 1;
            $qtd_Pessoas = $_POST['qtd_Pessoas'];

            $result = $this->reserva->create($check_in, $check_out, $servico, $valor_Pagamento,$quarto, $qtd_Pessoas);

            if ($result === true) {
                echo "Reserva criada com sucesso!";
            } else {
                echo "Erro ao criar reserva.";
            }
        } else {
            $this->loadView('reservaCreate');
        }
    }

    public function update($id) {
        $id_reserva = $id[0];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $requiredFields = ['check_in', 'check_out', 'valor_Pagamento', 'quarto', 'qtd_Pessoas'];

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
            $qtd_Pessoas = $_POST['qtd_Pessoas'];

            $result = $this->reserva->update($id_reserva, $check_in, $check_out, $valor_Pagamento, $quarto, $qtd_Pessoas);

            if ($result === true) {
                echo "Reserva atualizada com sucesso!";
            } else {
                echo "Erro ao atualizar reserva.";
            }
        } else {
            $reserva = $this->reserva->fetchById($id_reserva);
            $this->loadView('reservaEdit', ['reserva' => $reserva]);
        }
    }

    public function delete($id) {
        $id_reserva = $id[0];

        $result = $this->reserva->delete($id_reserva);

        if ($result === true) {
            echo "Reserva deletada com sucesso!";
        } else {
            echo "Erro ao deletar reserva.";
        }
    }
}

?>
