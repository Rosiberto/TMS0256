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
            $requiredFields = ['Dt_Entrada', 'Dt_Saida','qtd_Pessoas'];

            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Preencha o campo " . ucfirst($field) . "!";
                    return;
                }
            }

            $check_in = $_POST['Dt_Entrada'];
            $check_out = $_POST['Dt_Saida'];
            $qtd_Pessoas = $_POST['qtd_Pessoas'];
            $valor_Pagamento = 1000;
            $quarto = 1;

            function obterEstacao($data) {
                $dia = date('d', strtotime($data));
                $mes = date('m', strtotime($data));
                
                if (($mes == 3 && $dia >= 21) || ($mes == 4) || ($mes == 5) || ($mes == 6 && $dia < 21)) {
                    return "Primavera";
                } elseif (($mes == 6 && $dia >= 21) || ($mes == 7) || ($mes == 8) || ($mes == 9 && $dia < 21)) {
                    return "Verão";
                } elseif (($mes == 9 && $dia >= 21) || ($mes == 10) || ($mes == 11) || ($mes == 12 && $dia < 21)) {
                    return "Outono";
                } else {
                    return "Inverno";
                }
            }

            $estacaoCheckIn = obterEstacao($check_in);

            switch ($estacaoCheckIn) {
                case "Primavera":
                    $valor_Pagamento += 10;
                    break;
                case "Verão":
                    $valor_Pagamento += 20;
                    break;
                case "Outono":
                    $valor_Pagamento += 30;
                    break;
                case "Inverno":
                    $valor_Pagamento += 40;
                    break;
            }


            $result = $this->reserva->create($check_in, $check_out, $valor_Pagamento, $quarto, $qtd_Pessoas);

            if ($result === true) {
                echo "Reserva criada com sucesso!";
            } else {
                echo "Erro ao criar reserva.";
            }
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
