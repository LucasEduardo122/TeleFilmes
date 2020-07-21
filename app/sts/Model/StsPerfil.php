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

class StsPerfil {
    private $Resultado;
    
    function getResultado() {
        return $this->Resultado;
    }

        
    public function pesquisarPerfil() {
        
        $trazerPerfil = new \App\sts\Model\helper\StsRead();
        $trazerPerfil->fullRead("SELECT id, nome as nome_perfil, email, imagem FROM adms_usuarios WHERE id=:id", "id=".$_SESSION['usuario_id']);
        $this->Resultado = $trazerPerfil->getResultado();
        
      
        
    }
    
    public function pesquisarMinhaLista() {
        $trazerPerfil = new \App\sts\Model\helper\StsRead();
        $trazerPerfil->fullRead("SELECT lista.id, filme.nome_filme, filme.sinopse, filme.imagem1,"
                . " filme.ano_filme, legenda.nome_legenda, categoria.nome as categoria_nome, "
                . " idioma.nome_idioma FROM adms_lista as lista"
                . " INNER JOIN adms_filme as filme "
                . " ON lista.filme_perfil_id=filme.id"
                . " INNER JOIN adms_categoria as categoria"
                . " ON filme.categoria_id=categoria.id"
                . " INNER JOIN adms_legenda as legenda"
                . " ON filme.legenda_id=legenda.id"
                . " INNER JOIN adms_idioma as idioma"
                . " ON filme.audio_id=idioma.id "
                . " WHERE lista.usuario_id=:usuario_id","usuario_id=".$_SESSION['usuario_id']);
        $this->Resultado = $trazerPerfil->getResultado();
    }
}
