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

class StsMod {
    
    private $Dados;
    private $resultado;
    
    function getResultado() {
        return $this->resultado;
    }

        
   public function addIdioma(array $Dados) {
       $this->Dados = $Dados;
       
       $adicionar = new \App\sts\Model\helper\StsCreate();
       $adicionar->exeCreate("adms_idioma", $this->Dados);
       $this->resultado = $adicionar->getResultado();

   }
   
   public function addFilme(array $Dados) {
       $this->Dados = $Dados;
       
       $adicionar = new \App\sts\Model\helper\StsCreate();
       $adicionar->exeCreate("adms_filme", $this->Dados);
       $this->resultado = $adicionar->getResultado();

   }
   
   public function addVideo(array $Dados) {
       $this->Dados = $Dados;
       
       $adicionar = new \App\sts\Model\helper\StsCreate();
       $adicionar->exeCreate("adms_videos", $this->Dados);
       $this->resultado = $adicionar->getResultado();

   }
   
   public function addLegenda(array $Dados) {
       $this->Dados = $Dados;
       
       $adicionar = new \App\sts\Model\helper\StsCreate();
       $adicionar->exeCreate("adms_legenda", $this->Dados);
       $this->resultado = $adicionar->getResultado();

   }
}
