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

class StsLogin {

    private $Resultado;
    private $Dados;
    
    function getResultado() {
        return $this->Resultado;
    }

        public function logar(array $Dados) {
        $this->Dados = $Dados;

        $this->validarDados();

        if ($this->Resultado) {
            $pesquisarUser = new \App\sts\Model\helper\StsRead();
            $pesquisarUser->fullRead("SELECT id, nome, email, imagem, senha, adms_niveis_acesso_id FROM adms_usuarios WHERE email=:email", "email=" . $this->Dados['email']);

            $this->Resultado = $pesquisarUser->getResultado();
            
            if ($this->Resultado) {
                $this->validarSenha();
            } else {
                $_SESSION['msg'] = "<script>flatNotify().error('Usuário ou senha inválidos',2500)</script>";
            }
        }
    }

    public function cadastrarUser(array $Dados) {
        $this->Dados = $Dados;

        $this->validarDados();

        if ($this->Resultado) {
            $this->validarEmail();

            if ($this->Resultado) {

                $this->validarSenhaCad();
            } else {
                $_SESSION['msg'] = "<script>flatNotify().error('O email já está em uso',2500)</script>";
            }
        }
    }

    public function validarDados() {
        //Strip tags Remove as tags do php e do html
        $this->Dados = array_map('strip_tags', $this->Dados);
        //Remover os espaços em branco
        $this->Dados = array_map('trim', $this->Dados);

        if (in_array('', $this->Dados)) {
            $_SESSION['msg'] = "<script>flatNotify().error('Preencha todos os campos',2500)</script>";
            return $this->Resultado = false;
        } else {
            return $this->Resultado = true;
        }
    }

    public function validarSenha() {
        if ($this->Dados['senha'] == $this->Resultado[0]['senha']) {
            $_SESSION['usuario_id'] = $this->Resultado[0]['id'];
            $_SESSION['nome'] = $this->Resultado[0]['nome'];
            $_SESSION['email'] = $this->Resultado[0]['email'];
            $_SESSION['imagem'] = $this->Resultado[0]['imagem'];
            $_SESSION['adms_niveis_acesso_id'] = $this->Resultado[0]['adms_niveis_acesso_id'];
            $this->Resultado = true;
        } else {
            $_SESSION['msg'] = "<script>flatNotify().error('Usuário ou senha inválidos',2500)</script>";
            $this->Resultado = false;
        }
    }

    public function validarEmail() {
        $validarEmail = new \App\sts\Model\helper\StsRead();
        $validarEmail->fullRead("SELECT email FROM adms_usuarios WHERE email=:email", "email=" . $this->Dados['email']);

        $this->Resultado = $validarEmail->getResultado();
 
        if (empty($this->Resultado)) {
            $this->Resultado = true;
        } else {
            $this->Resultado = false;
        }
    }

    public function validarSenhaCad() {

        if (strlen($this->Dados['senha']) < 6) {
            $_SESSION['msg'] = "<script>flatNotify().error('Senha com menos de 6 caracteres',2500)</script>";
        } else {
            
            $cadastrarUser = new \App\sts\Model\helper\StsCreate();
            $cadastrarUser->exeCreate("adms_usuarios", $this->Dados);

            if ($cadastrarUser->getResultado()) {
                $_SESSION['msg'] = "<script>flatNotify().success('Cadastrado com sucesso',2500)</script>";
                $this->Resultado = true;
            } else {
                $_SESSION['msg'] = "<script>flatNotify().error('Erro ao cadastrar',2500)</script>";
                $this->Resultado = false;
            }
        }
    }

}
