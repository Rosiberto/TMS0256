<?php

class EmpresaController extends RenderView {
    private $Empresa;

    public function __construct() {
        $this->Empresa = new EmpresaModel();
    }

    public function index() {
        $empresas = $this->Empresa->fetch();
        $this->loadView("Empresa", ['empresas' => $empresas]);
    }

    public function show($id) {
        $id_Empresa = $id[0];
        $Empresa = $this->Empresa->fetchById($id_Empresa);
        $this->loadView('EmpresaShow', ['empresa' => $Empresa]);
    }

    public function create() {

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            

        $name = $_POST['nomeEmpresa'];
        $endereco =$_POST['endereco'];
        $telefone =$_POST['telefone'];
        $categoria =$_POST['nomeCategoria'];
        $email =$_POST['email'];
        
    
        $result = $this->Empresa->create($name, $endereco, $telefone, $categoria, $email);
        
        if ($result === true) {
            echo "Empresa criada com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }
    }
}

    public function update($id) {
        $id_Empresa = $id[0];

        $name = "Empresa Editada";
        $email = "editado@empresa.com.br";
    
        $result = $this->Empresa->update($name, $email, $id_Empresa);
        
        if ($result === true) {
            echo "Empresa editada com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }
    }

    public function delete($id) {
        $id_Empresa = $id[0];
    
        $result = $this->Empresa->delete($id_Empresa);
        
        if ($result === true) {
            echo "Empresa deletada com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }        
    }
}
