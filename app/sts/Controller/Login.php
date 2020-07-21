<?php

namespace App\sts\Controller;

if (!defined('URL')) {
    header("Location: /");
    exit();
}


class Login {

    private $Dados;

    public function acessar() {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        
        if (!empty($this->Dados['sendUser'])) {
            unset($this->Dados['sendUser']);
            
            $pesquisarUser = new \App\sts\Model\StsLogin();
            $pesquisarUser->logar($this->Dados);
            
            if($pesquisarUser->getResultado()){
                $urlDestino = URL. "home/index";
                header("Location: $urlDestino");
            }
        } else {
            $this->Dados['form'] = $this->Dados;
        }
        
        $listarMenu = new \App\sts\Model\StsMenu();
        $listarMenu->menu();
        $listarMenu->menuCategoria();

        $this->Dados['menu'] = $listarMenu->getResultado();
        $this->Dados['categoria'] = $listarMenu->getResultadoCate();

        $viewLogin = new \Core\ConfigView("sts/View/login/login", $this->Dados);
        $viewLogin->renderizarLogin();
    }
    
    public function logOut() {
        
        unset($_SESSION['usuario_id'], $_SESSION['email'], $_SESSION['imagem'],
            $_SESSION['adms_niveis_acesso_id']);
        
        
        $urlDestino = URL."home/index";
        $_SESSION['msg'] = "<script>flatNotify().success('Deslogado',2500)</script>";
        header("Location:$urlDestino");
    }

}
