<?php


class EstadiaController extends RenderView {
    private $estadia;
    private $quarto;
    private $funcionario;

    public function __construct() {
        $this->estadia = new EstadiaModel();
        $this->quarto = new QuartoModel();
        $this->funcionario = new FuncionarioModel();
    }

    public function index() {
        $estadias = $this->estadia->fetch();
        $this->loadView("estadia", ['estadias' => $estadias]);
    }

    public function show($id) {
        $id_estadia = $id[0];
        $estadia = $this->estadia->fetchById($id_estadia);
        $this->loadView('estadiaShow', ['estadia' => $estadia]);
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $requiredFields = ['Dt_Entrada', 'Dt_Saida', 'servico'];

            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Preencha o campo " . ucfirst(str_replace('_', ' ', $field)) . "!";
                    return;
                }
            }

            $dt_entrada = $_POST['Dt_Entrada'];
            $dt_saida = $_POST['Dt_Saida'];
            $servico = $_POST['servico'];
            $fk_empregado_id = 4;

            $result = $this->estadia->create($dt_entrada, $dt_saida, $servico, $fk_empregado_id);
            if ($result) {
                echo "Estadia criada com sucesso!";
            } else {
                echo "Desculpe, algo deu errado ao criar a estadia.";
            }
        } 
    }

    public function update($id) {
        $id_estadia = $id[0];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $dt_entrada = $_POST['Dt_Entrada'];
            $dt_saida = $_POST['Dt_Saida'];
            $servico = $_POST['Servico'];
            $fk_empregado_id = $_POST['fk_Empregado_ID'];

            $result = $this->estadia->update($id_estadia, $dt_entrada, $dt_saida, $servico, $fk_empregado_id);

            if ($result) {
                echo "Estadia atualizada com sucesso!";
            } else {
                echo "Desculpe, algo deu errado ao atualizar a estadia.";
            }
        } else {
            $estadia = $this->estadia->fetchById($id_estadia);
            $empregadoList = $this->funcionario->fetch();
            $this->loadView('estadiaEdit', ['estadia' => $estadia, 'empregados' => $empregadoList]);
        }
    }

    public function delete($id) {
        $id_estadia = $id[0];
        $result = $this->estadia->delete($id_estadia);

        if ($result) {
            echo "Estadia deletada com sucesso!";
        } else {
            echo "Desculpe, algo deu errado ao deletar a estadia.";
        }
    }

    public function search() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $dt_entrada = $_POST['Dt_Entrada'];
            $dt_saida = $_POST['Dt_Saida'];
            $cp_pessoa = $_POST['Capacidade_Pessoa'];

            $estadias = $this->estadia->fetchByDateRange($dt_entrada, $dt_saida);
            $quartos = $this->quarto->fetchAvailableRooms($dt_entrada, $dt_saida, $cp_pessoa);

            $this->loadView('estadiaSearch', ['estadias' => $estadias, 'quartos' => $quartos]);
            header("location:http://localhost/TMS0256/app/front-end/consultarEstadia.php");
        } 
    }
}
?>
