<?php 

class QuartoController extends RenderView {
    private $quarto;

    public function __construct() {
        $this->quarto = new QuartoModel();
    }

    
    public function index() {
        $quartos = $this->quarto->fetch();
        $this->loadView("quarto", ['quartos' => $quartos]);
    }

    public function show($id) {
        $id_quarto = $id[0];
        $quarto = $this->quarto->fetchById($id_quarto);
        $this->loadView('quartoShow', ['quarto' => $quarto]);
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $requiredFields = ['roomNumber', 'roomCapacity', 'roomCompany'];

            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Preencha o campo " . ucfirst(str_replace('_', ' ', $field)) . "!";
                    return;
                }
            }

            $numero = $_POST['roomNumber'];
            $capacidadePessoa = $_POST['roomCapacity'];
            $fkEmpresaID = $_POST['roomCompany'];

            $result = $this->quarto->create($numero, $capacidadePessoa, $fkEmpresaID);
            if ($result === true) {
                echo "Quarto criado com sucesso!";
            } else {
                echo "Desculpe, algo deu errado: " . $result;
            }
        }
    }

    public function update($id) {

        $id_quarto = $id[0];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $requiredFields = ['Numero', 'Capacidade_Pessoa', 'fk_Empresa_ID'];

            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Preencha o campo " . ucfirst(str_replace('_', ' ', $field)) . "!";
                    return;
                }
            }

            $numero = $_POST['Numero'];
            $capacidadePessoa = $_POST['Capacidade_Pessoa'];
            $fkEmpresaID = $_POST['fk_Empresa_ID'];

            $result = $this->quarto->update($id_quarto, $numero, $capacidadePessoa, $fkEmpresaID);
            if ($result === true) {
                echo "Quarto criado com sucesso!";
            } else {
                echo "Desculpe, algo deu errado: " . $result;
            }
        }
        $this->showCreateForm();
    }

    public function delete($id) {
        $id_quarto = $id[0];

        $result = $this->reserva->delete($id_quarto);

        if ($result === true) {
            echo "Reserva deletada com sucesso!";
        } else {
            echo "Erro ao deletar reserva.";
        }
    }
}


?>