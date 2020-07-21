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



class Video {
    private $id;
    private $Dados;
    private $resultado;
    
    public function assistir($id = null) {
        
        $this->id = (int) $id;
        
        $trazerVideo = new \App\sts\Model\StsVideo();
        $trazerVideo->rodarVideo($this->id);
        
        $this->Dados['video'] = $trazerVideo->getResultado();
        
        $this->Dados['comentario'] = $trazerVideo->getResult();
        
        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();
        
        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();
        $view = new \Core\ConfigView("sts/View/video/video", $this->Dados);
        $view->renderizarPlayer();
    }
    
    public function adicionarLista($id = null) {
        
        if(!empty($_SESSION['usuario_id'])){
            $this->id = (int) $id;
            
            
            $inserirLista = new \App\sts\Model\StsVideo();
            $inserirLista->inserirLista($this->id);
        } else {
            $_SESSION['msg'] = "<script>flatNotify().error('Você precisa estar logado para efetuar essa ação',2500)</script>";
        }
        
        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();
        
        $listarFilme = new \App\sts\Model\StsListarFilmes();
        $listarFilme->listarFilmes();
        
        $this->Dados['filmes'] = $listarFilme->getResultado();
        
        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();
        $view = new \Core\ConfigView("sts/View/home/home", $this->Dados);
        $view->renderizar();
    }
    
    
    
    public function adicionarComentario() {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->id = $this->Dados['video_id'];
        if(!empty($_SESSION['usuario_id'])){
            
            $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $this->id = $this->Dados['video_id'];
            
            if(isset($this->Dados['sendComentario'])){
                unset($this->Dados['sendComentario']);
                
                $this->id = $this->Dados['video_id'];
                
                $cadastrarComent = new \App\sts\Model\StsVideo();
                $cadastrarComent->cadastrarComentario($this->Dados);
                $this->resultado = $cadastrarComent->getResultado();
                
                if($this->resultado){
                    $_SESSION['msg'] = "<script>flatNotify().success('Comentário cadastrado',2500)</script>";
                     header("Location: assistir/{$this->id}");
                } else {
                    $_SESSION['msg'] = "<script>flatNotify().error('Falha ao cadastrar',2500)</script>";
                    header("Location: assistir/{$this->id}");
                }
            } else {
                $_SESSION['msg'] = "<script>flatNotify().error('Você precisa preencher o campo de comentário',2500)</script>";
                header("Location: assistir/{$this->id}");
            }
        } else {
            $_SESSION['msg'] = "<script>flatNotify().error('Você precisa estar logado para comentar',2500)</script>";
            header("Location: assistir/{$this->id}");
        }
        
    }
}
