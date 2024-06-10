<?php 
class CartaoController extends RenderView
{
    private $cartao;
    
    public function __construct() {
        $this->cartao = new CartaoModel();
    }
    
    public function index() {
        $cartaos = $this->cartao->fetch();
        $this->loadView("cartao", ['cartaos' => $cartaos]);
    }

    public function show($id) {
        $id_cartao = $id[0];
        $cartao = $this->cartao->fetchById($id_cartao);
        $this->loadView('cartaoShow', ['cartao' => $cartao]);
    }
    
    
    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $cardNumber = $_POST['nCartao'];
            $cvc = $_POST['cvc'];
            $validity = $_POST['validade'];
        
            if (!$this->validateCardData($cardNumber, $cvc, $validity)) {
                echo "Dados do cartão inválidos.";
                return;
            }

            if ($this->cartao->create($cardNumber, $cvc, $validity)) {
                header("location:http://localhost/TMS0256/app/front-end/LoginCliente.php");
            } else {
                echo "Erro ao inserir o cartão.";
            }
        }
    }

    public function update($id) {
        $id_cartao = $id[0];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $cardNumber = $_POST['nCartao'];
            $cvc = $_POST['cvc'];
            $validity = $_POST['validade'];
        
            if (!$this->validateCardData($cardNumber, $cvc, $validity)) {
                echo "Dados do cartão inválidos.";
                return;
            }

            if ($this->cartao->update($cardNumber, $cvc, $validity)) {
                echo "Cartão inserido com sucesso!";
            } else {
                echo "Erro ao inserir o cartão.";
            }
        }
    }

    private function validateCardData($cardNumber, $cvc, $validity)
    {
        // Aqui você pode adicionar sua lógica de validação
        // Por exemplo, verificar se o número do cartão possui um formato válido,
        // se o CVC é um número de 3 ou 4 dígitos, e se a validade está no formato correto
        // Esta é apenas uma validação básica, você pode implementar uma validação mais detalhada conforme necessário

        if (!preg_match('/^\d{16}$/', $cardNumber)) {
            return false; // O número do cartão não possui 16 dígitos
        }

        if (!preg_match('/^\d{3,4}$/', $cvc)) {
            return false; // O CVC não possui 3 ou 4 dígitos
        }

        if (!preg_match('/^\d{2}\/\d{4}$/', $validity)) {
            return false; // A validade não está no formato MM/AAAA
        }

        // Outras verificações podem ser adicionadas aqui, como verificar o algoritmo de Luhn para o número do cartão

        return true; // Se todas as verificações passarem, os dados do cartão são válidos
    }

}
?>
