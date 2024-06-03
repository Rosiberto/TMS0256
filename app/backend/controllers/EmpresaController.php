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
        $requiredFields = ['nomeEmpresa', 'email', 'telefone', 'endereco', 'nomeCategoria'];
        
        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                echo "Preencha o campo " . ucfirst($field) . "!";
                return;
            }
        }
    
        $name = $_POST['nomeEmpresa'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $nomeCategoria = $_POST['nomeCategoria'];

    
        if ($this->client->create($name, $email, $telefone, $endereco, $nomeCategoria)) {
            echo "Cliente criado com sucesso!";
        } else {
            echo "Desculpe, algo deu errado, tente mais tarde!";
        }
    }
    public function update($id) {
        $id_Empresa = $id[0];

        $requiredFields = ['nomeEmpresa', 'email', 'telefone', 'endereco', 'nomeCategoria'];
        
        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                echo "Preencha o campo " . ucfirst($field) . "!";
                return;
            }
        }

        $name = $_POST['nomeEmpresa'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $nomeCategoria = $_POST['nomeCategoria'];

        $result = $this->company->update($id_Empresa, $name, $email, $telefone, $endereco, $nomeCategoria);

        if ($result === true) {
            echo "Empresa atualizada com sucesso!";
        } else {
            echo "Desculpe, algo deu errado: " . $result;
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
