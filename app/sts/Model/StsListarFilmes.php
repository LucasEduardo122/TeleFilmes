<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\sts\Model;


if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsListarFilmes {
    private $resultado;
    
    function getResultado() {
        return $this->resultado;
    }

        
    public function listarFilmes() {
        $listarfilmes = new \App\sts\Model\helper\StsRead();
        
        $listarfilmes->fullRead("SELECT * FROM adms_filme");
        
        $this->resultado = $listarfilmes->getResultado();
        
        return $this->resultado;
    }
    
    public function listarLegenda() {
        $listarLegenda = new \App\sts\Model\helper\StsRead();
        $listarLegenda->fullRead("SELECT * FROM adms_legenda");
        $this->resultado = $listarLegenda->getResultado();
    }
    
    public function listarIdioma() {
        $listarIdioma = new \App\sts\Model\helper\StsRead();
        $listarIdioma->fullRead("SELECT * FROM adms_idioma");
        $this->resultado = $listarIdioma->getResultado();
    }
}
