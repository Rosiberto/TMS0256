<?php

class ReservaController extends RenderView {
    private $reserva;

    public function __construct() {
        $this->reserva = new ReservaModel();
    }

    public function index() {
        $reserva = $this->reserva->fetch();
        $this->loadView("reserva", ['reserva' => $reserva]);
    }

    public function show($id) {
        $id_reserva = $id[0];
        $reserva = $this->reserva->fetchById($id_reserva);
        $this->loadView('reservaShow', ['reserva' => $reserva]);
    }

    public function create() {
        $name = "joaozinho";
        $email = "joaozinho@gmail.com";
    
        $result = $this->reserva->create($name, $email);
        
        if ($result === true) {
            echo "Reserva criada com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }
    }

    public function update($id) {
        $id_reserva = $id[0];

        $name = "editado";
        $email = "editado@gmail.com";
    
        $result = $this->reserva->update($name, $email, $id_reserva);
        
        if ($result === true) {
            echo "Reserva editada com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }
    }

    public function delete($id) {
        $id_reserva = $id[0];
    
        $result = $this->reserva->delete($id_reserva);
        
        if ($result === true) {
            echo "Reserva deletada com sucesso!";
        } else {
            echo "Desculpa, algo deu errado: " . $result;
        }        
    }
    
}
