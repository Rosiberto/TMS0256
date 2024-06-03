<?php

$routes = [
    // Rota para clientes
    '/' => 'HomeController@index',
    '/cliente' => 'ClientController@index',
    '/cliente/{id}' => 'ClientController@show',
    '/cliente/novo' => 'ClientController@create',
    '/cliente/editar/{id}' => 'ClientController@update',
    '/cliente/deletar/{id}' => 'ClientController@delete',

         

    // Rotas para funcionários
    '/funcionario' => 'FuncionarioController@index',
    '/funcionario/{id}' => 'FuncionarioController@show',
    '/funcionario/novo' => 'FuncionarioController@create',
    '/funcionario/editar/{id}' => 'FuncionarioController@update',
    '/funcionario/deletar/{id}' => 'FuncionarioController@delete',

    
    // Rotas para empresas
    '/empresa' => 'EmpresaController@index',
    '/empresa/{id}' => 'EmpresaController@show',
    '/empresa/novo' => 'EmpresaController@create',
    '/empresa/editar/{id}' => 'EmpresaController@update',
    '/empresa/deletar/{id}' => 'EmpresaController@delete',

    // Rotas para reservas
    '/reserva' => 'ReservaController@index',
    '/reserva/{id}' => 'ReservaController@show',
    '/reserva/novo' => 'ReservaController@create',
    '/reserva/editar/{id}' => 'ReservaController@update',
    '/reserva/deletar/{id}' => 'ReservaController@delete'

];
