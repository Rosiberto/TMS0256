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
            $requiredFields = ['Dt_Entrada', 'Dt_Saida', 'Servico', 'fk_Empregado_ID'];

            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Preencha o campo " . ucfirst($field) . "!";
                    return;
                }
            }

            $dt_entrada = $_POST['Dt_Entrada'];
            $dt_saida = $_POST['Dt_Saida'];
            $servico = $_POST['Servico'];
            $fk_empregado_id = $_POST['fk_Empregado_ID'];

            $result = $this->servico->create($dt_entrada, $dt_saida, $servico, $fk_empregado_id);

            if ($result === true) {
                echo "Serviço criado com sucesso!";
            } else {
                echo "Desculpa, algo deu errado: " . $result;
            }
        }
    }

    public function update($id) {
        $id_servico = $id[0];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $dt_entrada = $_POST['Dt_Entrada'];
            $dt_saida = $_POST['Dt_Saida'];
            $servico = $_POST['Servico'];
            $fk_empregado_id = $_POST['fk_Empregado_ID'];

            $result = $this->servico->update($id_servico, $dt_entrada, $dt_saida, $servico, $fk_empregado_id);

            if ($result === true) {
                echo "Serviço atualizado com sucesso!";
            } else {
                echo "Desculpa, algo deu errado: " . $result;
            }
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