<?php 

class ServicoController extends RenderView {
    private $servico;

    public function __construct() {
        $this->servico = new ServicoModel();
    }

    public function index() {
        $servicos = $this->servico->fetch();
        $this->loadView("servico", ['servicos' => $servicos]);
    }

    public function show($id) {
        $id_servico = $id[0];
        $servico = $this->servico->fetchById($id_servico);
        $this->loadView('servicoShow', ['servico' => $servico]);
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $requiredFields = ['Periodo_Inicial', 'Periodo_Final', 'Qtd_Pessoa', 'Valor', 'fk_Quarto_ID'];

            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Preencha o campo " . ucfirst($field) . "!";
                    return;
                }
            }

            $Periodo_Inicial = $_POST['Periodo_Inicial'];
            $Periodo_Final = $_POST['Periodo_Final'];
            $Qtd_Pessoa = $_POST['Qtd_Pessoa'];
            $Valor = $_POST['Valor'];
            $fk_Quarto_ID = $_POST['fk_Quarto_ID'];

            $result = $this->servico->create($Periodo_Inicial, $Periodo_Final, $Qtd_Pessoa, $Valor, $fk_Quarto_ID);

            if ($result === true) {
                echo "Serviço criado com sucesso!";
            } else {
                echo "Desculpa, algo deu errado: " . $result;
            }
        } else {
            $this->loadView('servicoCreate');
        }
    }

    public function update($id) {
        $id_servico = $id[0];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $requiredFields = ['Periodo_Inicial', 'Periodo_Final', 'Qtd_Pessoa', 'Valor', 'fk_Quarto_ID'];

            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Preencha o campo " . ucfirst($field) . "!";
                    return;
                }
            }

            $Periodo_Inicial = $_POST['Periodo_Inicial'];
            $Periodo_Final = $_POST['Periodo_Final'];
            $Qtd_Pessoa = $_POST['Qtd_Pessoa'];
            $Valor = $_POST['Valor'];
            $fk_Quarto_ID = $_POST['fk_Quarto_ID'];

            $result = $this->servico->update($id_servico, $Periodo_Inicial, $Periodo_Final, $Qtd_Pessoa, $Valor, $fk_Quarto_ID);

            if ($result === true) {
                echo "Serviço atualizado com sucesso!";
            } else {
                echo "Desculpa, algo deu errado: " . $result;
            }
        } else {
            $servico = $this->servico->fetchById($id_servico);
            $this->loadView('servicoUpdate', ['servico' => $servico]);
        }
    }

    public function delete($id) {
        $id_servico = $id[0];
    
        $result = $this->servico->delete($id_servico);
        
        if ($result === true) {
            echo "Serviço deletado com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }        
    }
}
?>









?>