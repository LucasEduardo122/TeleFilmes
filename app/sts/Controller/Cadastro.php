<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\sts\Controller;

if (!defined('URL')) {
    header("Location: /");
    exit();
}


if(!empty($_SESSION['usuario_id'])){
    $urlDestino = URL. "home/index";
    header("Location: $urlDestino");
    exit();
}

class Cadastro {

    private $Dados;
    private $Resultado;

    public function cadastrarUsuario() {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->Dados['sendUser'])) {
            unset($this->Dados['sendUser']);
            
            $cadastrar = new \App\sts\Model\StsLogin();
            $cadastrar->cadastrarUser($this->Dados);
        } else {
            $this->Dados['form'] = $this->Dados;
        }

        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();

        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();
        
        
        $View = new \Core\ConfigView("sts/View/login/cadastro", $this->Dados);
        $View->renderizarLogin();
    }

}
