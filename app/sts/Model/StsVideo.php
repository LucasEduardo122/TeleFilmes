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

class StsVideo {
    private $id;
    private $resultado;
    private $Dados;
    private $result;
    
    function getResult() {
        return $this->result;
    }

        function getResultado() {
        return $this->resultado;
    }

        public function rodarVideo($id = null) {
        $this->id = (int) $id;
        
        
        $trazerDados = new \App\sts\Model\helper\StsRead();
        $trazerDados->fullRead("SELECT * FROM adms_videos WHERE id=:id", "id=".$this->id);
        $this->resultado = $trazerDados->getResultado();
        
        $this->exibirComentarios($this->id);
        
    }
    
    public function inserirLista($id = null) {
         $this->id = (int) $id;
         
         $hora = date('d/m/Y');
         
         $this->Dados = ['usuario_id' =>$_SESSION['usuario_id'], 'filme_perfil_id' =>$this->id,'created' => $hora];
         
         $inserir = new \App\sts\Model\helper\StsCreate();
         $inserir->exeCreate("adms_lista", $this->Dados);
         $this->resultado = $inserir->getResultado();
         if($this->resultado){
             $_SESSION['msg'] = "<script>flatNotify().success('Adicionado na lista',2500)</script>";
         } else {
             $_SESSION['msg'] = "<script>flatNotify().error('Erro ao adicionar',2500)</script>";
         }
    }
    
    private function exibirComentarios($id = null) {
        $this->id = (int) $id;
        $trazerComentario = new \App\sts\Model\helper\StsRead();
        $trazerComentario->fullRead("SELECT user.nome as nome_user,user.adms_niveis_acesso_id, coment.id as coment_id, coment.video_id, coment.usuario_id, coment.conteudo FROM adms_comentario as coment"
                . " INNER JOIN adms_usuarios as user"
                . " ON coment.usuario_id=user.id "
                . " WHERE video_id=:video_id", "video_id=".$this->id);
        $this->result = $trazerComentario->getResultado();
        
        
    }
    
    public function cadastrarComentario(array $Dados){
        
        $this->Dados = $Dados;
        
        $cad = new \App\sts\Model\helper\StsCreate();
        
        $cad->exeCreate("adms_comentario", $this->Dados);
        
        if($cad->getResultado()){
            return $this->resultado = true;
        } else {
            return $this->resultado = false;
        }
    }
}
