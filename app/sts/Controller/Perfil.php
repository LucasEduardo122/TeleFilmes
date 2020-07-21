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

if ($_SESSION['usuario_id'] == null) {
    $urlDestino = URL . "home/index";
    header("Location: $urlDestino");
    exit();
}

class Perfil {

    private $Dados;
    private $resultado;

    public function meuPerfil() {

        $listarUserLogado = new \App\sts\Model\StsPerfil();
        $listarUserLogado->pesquisarPerfil();

        $this->Dados['perfil'] = $listarUserLogado->getResultado();

        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();


        if ($_SESSION['adms_niveis_acesso_id'] == 1) {
            $listarMenuMod = new \App\sts\Model\StsMenu();
            $listarMenuMod->menuMod();
            $this->Dados['menuMod'] = $listarMenuMod->getResultadoMod();
        }

        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();

        $view = new \Core\ConfigView("sts/View/perfil/perfil", $this->Dados);
        $view->renderizarPerfil();
    }

    public function minhaLista() {
        $listarLista = new \App\sts\Model\StsPerfil();
        $listarLista->pesquisarMinhaLista();
        $this->Dados['MinhaLista'] = $listarLista->getResultado();

        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();


        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();
        $view = new \Core\ConfigView("sts/View/perfil/minhaLista", $this->Dados);
        $view->renderizarPerfil();
    }

    public function adicionarIdioma() {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->Dados['sendIdioma'])) {
            unset($this->Dados['sendIdioma']);
            
            $cadastrarIdiomar = new \App\sts\Model\StsMod();
            $cadastrarIdiomar->addIdioma($this->Dados);

            $this->resultado = $cadastrarIdiomar->getResultado();

            if ($this->resultado) {
                $_SESSION['msg'] = "<script>flatNotify().success('Idioma cadastrado',2500)</script>";
            } else {
                $_SESSION['msg'] = "<script>flatNotify().error('Falha ao cadastrar',2500)</script>";
            }
        }
        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();

        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();
        
        $view = new \Core\ConfigView("sts/View/perfil/idioma", $this->Dados);
        $view->renderizarCadastro();
    }

    public function adicionarFilme() {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(isset($this->Dados['sendFilme'])) {
            unset($this->Dados['sendFilme']);
            
            $cadastrarFilme = new \App\sts\Model\StsMod();
            $cadastrarFilme->addFilme($this->Dados);

            $this->resultado = $cadastrarFilme->getResultado();

            if ($this->resultado) {
                $_SESSION['msg'] = "<script>flatNotify().success('Perfil cadastrado',2500)</script>";
            } else {
                $_SESSION['msg'] = "<script>flatNotify().error('Falha ao cadastrar',2500)</script>";
            }
        } else {
            $_SESSION['msg'] = "<script>flatNotify().error('Preencha os campos',2500)</script>";
        }
        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();
        
        $listarLegenda = new \App\sts\Model\StsListarFilmes();
        $listarLegenda->listarLegenda();
        
        $listarIdioma = new \App\sts\Model\StsListarFilmes();
        $listarIdioma->listarIdioma();
        
        $this->Dados['legenda'] = $listarLegenda->getResultado();
        $this->Dados['idioma'] = $listarIdioma->getResultado();
        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();
        
        
        $view = new \Core\ConfigView("sts/View/perfil/filme", $this->Dados);
        $view->renderizarCadastro();
    }

    public function adicionarLegenda() {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->Dados['sendLegenda'])) {
            unset($this->Dados['sendLegenda']);
            
            $cadastrarLegenda = new \App\sts\Model\StsMod();
            $cadastrarLegenda->addLegenda($this->Dados);

            $this->resultado = $cadastrarLegenda->getResultado();

            if ($this->resultado) {
                $_SESSION['msg'] = "<script>flatNotify().success('Legenda cadastrada',2500)</script>";
            } else {
                $_SESSION['msg'] = "<script>flatNotify().error('Falha ao cadastrar',2500)</script>";
            }
        } else {
            $_SESSION['msg'] = "<script>flatNotify().error('Preencha os campos',2500)</script>";
        }
        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();

        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();
        
        $view = new \Core\ConfigView("sts/View/perfil/legenda", $this->Dados);
        $view->renderizarCadastro();
    }

    public function adicionarVideo() {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->Dados['sendVideo'])) {
            unset($this->Dados['sendVideo']);
            
            $cadastrarVideo = new \App\sts\Model\StsMod();
            $cadastrarVideo->addVideo($this->Dados);

            $this->resultado = $cadastrarVideo->getResultado();

            if ($this->resultado) {
                $_SESSION['msg'] = "<script>flatNotify().success('Video cadastrado',2500)</script>";
            } else {
                $_SESSION['msg'] = "<script>flatNotify().error('Falha ao cadastrar',2500)</script>";
            }
        } else {
            $_SESSION['msg'] = "<script>flatNotify().error('Preencha os campos',2500)</script>";
        }
        
        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();
        
        $lisatrPerfis = new \App\sts\Model\StsListarFilmes();
        $lisatrPerfis->listarFilmes();
        
        $this->Dados['listFilm'] = $lisatrPerfis->getResultado();
        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();
        
        $view = new \Core\ConfigView("sts/View/perfil/video", $this->Dados);
        $view->renderizarCadastro();
    }

}
