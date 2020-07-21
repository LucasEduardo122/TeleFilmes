<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\sts\Controller;

/**
 * Description of Categoria
 *
 * @author luklu
 */
class Categoria {

    private $Dados;
    private $Nome;

    public function listar($nome = null) {

        $this->Nome = (string) $nome;

        $trazerCategoria = new \App\sts\Model\StsCategoria();
        $trazerCategoria->listarFilmesCategoria($this->Nome);
        $this->Dados['categoriaFilme'] = $trazerCategoria->getResultado();


        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();

        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();

        $view = new \Core\ConfigView("sts/View/categoria/categoria", $this->Dados);
        $view->renderizar();
    }

    public function cadastrar() {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if(!empty($this->Dados['sendCate'])) {
            unset($this->Dados['sendCate']);
            
            $cadCategoria = new \App\sts\Model\StsCategoria();
            $cadCategoria->cadastrarCategoria($this->Dados);
            if ($cadCategoria->getResultado()) {
                $_SESSION['msg'] = "<script>flatNotify().success('Categoria cadastrada',2500)</script>";
            } else {
                $_SESSION['msg'] = "<script>flatNotify().error('Falha ao cadastrar',2500)</script>";
            }
        }
        
        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();

        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();

        $view = new \Core\ConfigView("sts/View/perfil/categoria", $this->Dados);
        $view->renderizarCadastro();
    }

}
