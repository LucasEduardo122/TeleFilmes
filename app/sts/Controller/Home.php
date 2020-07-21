<?php

namespace App\sts\Controller;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Home {

    public $Dados;

    public function index() {
        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();
        
        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();
        
        $listarFilme = new \App\sts\Model\StsListarFilmes();
        $listarFilme->listarFilmes();
        
        $this->Dados['filmes'] = $listarFilme->getResultado();
        
        $carregarView = new \Core\ConfigView("sts/View/home/home", $this->Dados);
        $carregarView->renderizar();
    }

}
