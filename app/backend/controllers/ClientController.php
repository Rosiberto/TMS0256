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
        $name = "joaozinho";
        $email = "joaozinho@gmail.com";
    
        $result = $this->client->create($name, $email);


        
        if ($result === true) {
            echo "Cliente criado com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }
    }

    public function update($id) {
        $id_client = $id[0];

        $name = "editado";
        $email = "editado@gmail.com";
    
        $result = $this->client->update($name, $email, $id_client);
        
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
