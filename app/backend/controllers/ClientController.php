<?php

class ClientController extends RenderView {
    private $client;

    public function __construct() {
        $this->client = new ClientModel();
    }

    public function index() {
        $clients = $this->client->fetch();
        $this->loadView("client", ['clientes' => $clients]);
    }

    public function show($id) {
        $id_client = $id[0];
        $client = $this->client->fetchById($id_client);
        $this->loadView('clientShow', ['cliente' => $client]);
    }

    
    
    public function create() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $requiredFields = ['nome', 'email', 'telefone', 'morada', 'documento', 'nacionalidade', 'dataNascimento', 'fkEmpresaID'];

            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo "Preencha o campo " . ucfirst($field) . "!";
                    return;
                }
            }

            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $morada = $_POST['morada'];
            $documento = $_POST['documento'];
            $nacionalidade = $_POST['nacionalidade'];
            $dataNascimento = $_POST['dataNascimento'];
            $fkEmpresaID = $_POST['fkEmpresaID'];

            if ($this->clientModel->create($nome, $email, $telefone, $morada, $documento, $nacionalidade, $dataNascimento, $fkEmpresaID)) {
                echo "Cliente criado com sucesso!";
            } else {
                echo "Desculpe, algo deu errado, tente mais tarde!";
            }
        }
            $this->showCreateForm();
        }

    public function update($id) {
    $id_client = $id[0];
    
    $requiredFields = ['nome', 'email', 'telefone', 'morada', 'documento', 'nacionalidade', 'dataNascimento'];
    
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            echo "Preencha o campo " . ucfirst($field) . "!";
            return;
        }
    }
    
    $this->showCreateForm();

    $name = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $morada = $_POST['morada'];
    $documento = $_POST['documento'];
    $nacionalidade = $_POST['nacionalidade'];
    $dataNascimento = $_POST['dataNascimento'];
    
    $result = $this->client->update($id_client, $name, $email, $telefone, $morada, $documento, $nacionalidade, $dataNascimento);
    
    if ($result === true) {
        echo "Cliente editado com sucesso!";
    } else {
        echo "Desculpa, algo deu errado: " . $result;
    }
}

public function delete($id) {
    $id_client = $id[0];
    
    $result = $this->client->delete($id_client);
    
    if ($result === true) {
        echo "Cliente deletado com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }        
    }

    
}

