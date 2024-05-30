<?php

class FuncionarioController extends RenderView {
    private $funcionario;

    public function __construct() {
        $this->funcionario = new FuncionarioModel();
    }

    public function index() {
        $funcionarios = $this->funcionario->fetch();
        $this->loadView("Funcionario", ['funcionarios' => $funcionarios]);
    }

    public function show($id) {
        $id_empregado = $id[0];
        $funcionario = $this->funcionario->fetchById($id_empregado);
        $this->loadView('FuncionarioShow', ['funcionario' => $funcionario]);
    }

    public function create() {
        $name = "joaozinho";
        $email = "joaozinho@gmail.com";
    
        $result = $this->funcionario->create($name, $email);
        
        if ($result === true) {
            echo "Funcionário criado com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }
    }

    public function update($id) {
        $id_empregado = $id[0];

        $name = "editado";
        $email = "editado@gmail.com";
    
        $result = $this->funcionario->update($name, $email, $id_empregado);
        
        if ($result === true) {
            echo "Funcionário editado com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }
    }

    public function delete($id) {
        $id_empregado = $id[0];
    
        $result = $this->funcionario->delete($id_empregado);
        
        if ($result === true) {
            echo "Funcionário deletado com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }        
    }
}

?>
