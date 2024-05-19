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
        $name = "Lucas";
        $email = "lucas123@gmail.com";
        
        if ($this->client->create($name, $email)) {
           echo "Produto criado com sucesso!";
        } else {
           echo "Desculpa, algo deu errado, tente mais tarde!";
        }
    }
}
