<?php

class FuncionarioController extends RenderView {
    private $funcionario;

    public function __construct() {
        $this->funcionario = new FuncionarioModel();
        $this->empresa = new EmpresaModel();
    }

    public function index() {
        $funcionarios = $this->funcionario->fetch();
        $this->loadView("Funcionario", ['funcionarios' => $funcionarios]);
    }

    public function show($id) {
        $id_funcionario = $id[0];
        $funcionario = $this->funcionario->fetchById($id_funcionario);
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

            $nomeUsuario = $_POST['nomeUsuario'];
            $senha = $_POST['senha'];
            $nome = $_POST['nome'];
            $fkEmpresa = $_POST['fkEmpresa'];
            $fkFuncaoEmpregado = $_POST['fkFuncaoEmpregado'];
          
            if ($this->funcionario->create($nomeUsuario, $senha, $nome, $fkEmpresa,$fkFuncaoEmpregado)) {
                echo "funcionario criado com sucesso!";
            } else {
                echo "Desculpe, algo deu errado, tente mais tarde!";
            }
        }
        else {
            $empresaList = $this->empresa->fetch();
            $this->loadView('funcionarioCreate', ['empresas' => $empresaList]);
            $funcionarioFuncao = $this->funcionario->getFuncoesEmpregado();
            $this->loadView('funcionarioCreate', ['funcionarios' => $funcionarioFuncao]);
        }
    }
}

