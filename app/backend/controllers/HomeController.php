<?php

class HomeController extends RenderView {
    public function index() {

        $clients = new ClientModel();

       $this->loadView('home', 
            [
                'title'=> 'Home Page'
            ]
        );
    }
}