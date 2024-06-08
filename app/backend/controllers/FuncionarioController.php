<?php

class FuncionarioController extends RenderView {
    private $Funcionario;

    public function __construct() {
        $this->Funcionario = new FuncionarioModel();
    }

    public function index() {
        $funcionarios = $this->Funcionario->fetch();
        $this->loadView("Funcionario", ['funcionarios' => $funcionarios]);
    }

    public function show($id) {
        $id_funcionario = $id[0];
        $funcionario = $this->Funcionario->fetchById($id_funcionario);
        $this->loadView('FuncionarioShow', ['funcionario' => $funcionario]);
    }

    public function create() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $requiredFields = ['nomeUsuario', 'senha', 'nome', 'fkEmpresa', 'fkFuncaoEmpregado'];
    
            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Preencha o campo " . ucfirst($field) . "!";
                    return;
                }
            }

            $empresas = $this->funcionario->getEmpresas();
            $funcoesEmpregado = $this->funcionario->getFuncoesEmpregado();
            $this->loadView("Funcionario", ['empresas' => $empresas, 'funcoesEmpregado' => $funcoesEmpregado]);
        }

            $nomeUsuario = $_POST['nomeUsuario'];
            $senha = $_POST['senha'];
            $nome = $_POST['nome'];
            $fkEmpresa = $_POST['fkEmpresa'];
            $fkFuncaoEmpregado = $_POST['fkFuncaoEmpregado'];
          
            $result = $this->funcionario->create($nomeUsuario, $senha, $nome, $fkEmpresa, $fkFuncaoEmpregado);
            
            if ($result === true) {
                echo "Funcionário criado com sucesso!";
            } else {
                echo "Desculpa, algo deu errado.";
            }
        } 
    }



    // public function update($id) {
    //     $id_funcionario = $id[0];

    //     $nome = "Funcionário Editado";

    //     $result = $this->Funcionario->update($nome, $id_funcionario);
        
    //     if ($result === true) {
    //         echo "Funcionário editado com sucesso!";
    //     } else {
    //         echo "Desculpa, algo deu errado: " . $result;
    //     }
    // }

    // public function delete($id) {
    //     $id_funcionario = $id[0];
    
    //     $result = $this->Funcionario->delete($id_funcionario);
        
    //     if ($result === true) {
    //         echo "Funcionário deletado com sucesso!";
    //     } else {
    //         echo "Desculpa, algo deu errado: " . $result;
    //     }        
    // }

    // private function showCreateForm() {
    //     $empresas = $this->FuncionarioModel->getEmpresas();
    // }


