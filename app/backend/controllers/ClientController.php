<?php

class ClientController extends RenderView {
    private $cliente;
    private $empresa;
    private $login;

    public function __construct() {
        $this->cliente = new  ClientModel();
        $this->empresa = new EmpresaModel();
        $this->login = new LoginModel();
    }

    public function index() {
        $clients = $this->cliente->fetch();
        $this->loadView("cliente", ['clientes' => $clients]);
    }

    public function show($id) {
        $id_client = $id[0];
        $client = $this->cliente->fetchById($id_client);
        $this->loadView('clienteShow', ['cliente' => $client]);
    }

    
    
    public function create() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $requiredFields = ['nome', 'email', 'telefone', 'morada', 'cpf', 'nacionalidade', 'dataNascimento', 'empresa', 'usuario', 'senha'];

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
            $documento = $_POST['cpf'];
            $nacionalidade = $_POST['nacionalidade'];
            $dataNascimento = $_POST['dataNascimento'];
            $fkEmpresaID = $_POST['empresa'];

            //Login
            $login = $_POST['usuario'];
            $senha = $_POST['senha'];
            
            $loginId = $this->login->create($login, $senha);

            if ($this->cliente->create($nome, $email, $telefone, $morada, $documento, $nacionalidade, $dataNascimento, $fkEmpresaID, $loginId)) {
               header("location:http://localhost/TMS0256/app/front-end/home.php");
            } else {
                header("location:http://localhost/TMS0256/app/front-end/cadastro.php");
            }
        }
       
    }

    public function update($id) {
        $id_client = $id[0];
        
            
            $name = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $morada = $_POST['morada'];
            $documento = $_POST['cpf'];
            $nacionalidade = $_POST['nacionalidade'];
            $dataNascimento = $_POST['dataNascimento'];
            
            $result = $this->cliente->update($id_client, $name, $email, $telefone, $morada, $documento, $nacionalidade, $dataNascimento);

            $cliente = $this->cliente->fetchById($id_client);
            $empresaList = $this->empresa->fetch();
            $this->loadView('clienteEdit', ['cliente' => $cliente, 'empresas' => $empresaList]);
            
            if ($result === true) {
                echo "Cliente editado com sucesso!";
            } else {
                echo "Desculpa, algo deu errado: " . $result;
            }

    }


    public function delete($id) {
    $id_client = $_SESSION['cliente_id'];
    
    $result = $this->client->delete($id_client);
    
    if ($result === true) {
        echo "Cliente deletado com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }        
    }

    
}

