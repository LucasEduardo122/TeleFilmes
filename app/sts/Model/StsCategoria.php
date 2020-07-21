<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\sts\Model;

/**
 * Description of StsCategoria
 *
 * @author luklu
 */
class StsCategoria {
    
    private $Resultado;
    private $Nome;
    private $Dados;
    function getResultado() {
        return $this->Resultado;
    }

    public function listarFilmesCategoria($Nome = null){
        $this->Nome = (string) $Nome;
        
        $pesquisar = new \App\sts\Model\helper\StsRead();
        $pesquisar->fullRead("SELECT * FROM adms_categoria as cate"
                . " INNER JOIN adms_filme as filme"
                . " ON filme.categoria_id=cate.id WHERE nome=:nome",
                "nome=".$this->Nome);
        $this->Resultado = $pesquisar->getResultado();
        
    } 
    
    public function cadastrarCategoria(array $Dados) {
        $this->Dados = $Dados;
        
        $cad = new \App\sts\Model\helper\StsCreate();
        $cad->exeCreate("adms_categoria", $this->Dados);
        $this->Resultado = $cad->getResultado();
    }
}
