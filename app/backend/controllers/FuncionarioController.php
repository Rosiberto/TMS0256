<?php

class FuncionarioController extends RenderView {
    private $funcionario;

    public function __construct() {
        $this->funcionario = new FuncionarioModel();
        $this->empresa = new EmpresaModel();
        $this->login = new LoginModel();
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
            $requiredFields = ['usuario', 'senha', 'nome', 'fkEmpresa', 'fkFuncaoEmpregado'];
    
            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Preencha o campo " . ucfirst($field) . "!";
                    return;
                }
            }

           
            $nome = $_POST['nome'];
            $fkEmpresa = $_POST['fkEmpresa'];
            $fkFuncaoEmpregado = $_POST['fkFuncaoEmpregado'];

            $login = $_POST['usuario'];
            $senha = $_POST['senha'];
            
            $loginId = $this->login->create($login, $senha);
          
            $this->funcionario->create($nome, $fkEmpresa, $fkFuncaoEmpregado, $loginId );
          
            } else {
                $empresas = $this->empresa->fetchAll();
                $this->loadView("FuncionarioCreate", ['empresas' => $empresas, 'funcoesEmpregado' => $funcoesEmpregado]);
                $funcoesEmpregado = $this->funcionario->getFuncoesEmpregado();
                $this->loadView("FuncionarioCreate", ['funcionario' => $funcoesEmpregado]);
            }
        } 

        public function update($id) {
            $id_funcionario = $id[0];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $requiredFields = ['usuario', 'senha', 'nome', 'fkEmpresa', 'fkFuncaoEmpregado'];
        
                foreach ($requiredFields as $field) {
                    if (!isset($_POST[$field]) || empty($_POST[$field])) {
                        echo "Preencha o campo " . ucfirst($field) . "!";
                        return;
                    }
                }
    
               
                $nome = $_POST['nome'];
                $fkEmpresa = $_POST['fkEmpresa'];
                $fkFuncaoEmpregado = $_POST['fkFuncaoEmpregado'];
    
                $login = $_POST['usuario'];
                $senha = $_POST['senha'];
                
                $loginId = $this->login->update($id_funcionario, $login, $senha);
              
                $this->funcionario->update($id_funcionario, $nome, $fkEmpresa, $fkFuncaoEmpregado, $loginId );
              
                } else {
                    $empresas = $this->empresa->fetchAll();
                    $this->loadView("FuncionarioEdit", ['empresas' => $empresas, 'funcoesEmpregado' => $funcoesEmpregado]);
                    $funcoesEmpregado = $this->funcionario->getFuncoesEmpregado();
                    $this->loadView("FuncionarioEdit", ['funcionario' => $funcoesEmpregado]);
                }
            } 

            public function delete($id) {
                $id_funcionario = $id[0];
    
                $result = $this->Funcionario->delete($id_funcionario);
        
                if ($result === true) {
                    echo "Funcionário deletado com sucesso!";
                } else {
                    echo "Desculpa, algo deu errado: " . $result;
            }        
        }
    
    }
    
    

    // private function showCreateForm() {
    //     $empresas = $this->FuncionarioModel->getEmpresas();
    // }


