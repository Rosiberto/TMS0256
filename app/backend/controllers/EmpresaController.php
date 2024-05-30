<?php

class EmpresaController extends RenderView {
    private $Empresa;

    public function __construct() {
        $this->Empresa = new EmpresaModel();
    }

    public function index() {
        $companies = $this->Empresa->fetch();
        $this->loadView("Empresa", ['empresas' => $companies]);
    }

    public function show($id) {
        $id_Empresa = $id[0];
        $Empresa = $this->Empresa->fetchById($id_Empresa);
        $this->loadView('EmpresaShow', ['empresa' => $Empresa]);
    }

    public function create() {
        $name = "Empresa XYZ";
        $email = "contato@empresaxyz.com.br";
    
        $result = $this->Empresa->create($name, $email);
        
        if ($result === true) {
            echo "Empresa criada com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
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

?>
