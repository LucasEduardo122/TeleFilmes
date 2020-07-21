<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\sts\Model\helper;
use PDO;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of AdmsCreate
 *
 * @author luklu
 */
class StsCreate extends StsConn {

    private $Tabela;
    private $Dados;
    private $Query;
    private $Conn;
    private $Resultado;
    private $Create;
    private $Values;
    
    function getResultado() {
        return $this->Resultado;
    }

    public function exeCreate($Tabela, array $Dados) {
        $this->Tabela = (String) $Tabela;
        $this->Dados = $Dados;
        
        $this->getIntrucao();
        $this->executarInstrucao();
    }
    
    
    public function fullCreate($Query, $ParseString = null)
    {
        $this->Create = (string) $Query;
        if (!empty($ParseString)) {
            parse_str($ParseString, $this->Values);
        }
        
        $this->exeInstrucao();
    }
    
    private function getIntrucao() {
        $colunas = implode(", ", array_keys($this->Dados));
        $valores = ':'. implode(", :", array_keys($this->Dados));
        $this->Query = "INSERT INTO {$this->Tabela} ($colunas) VALUES ($valores)";
        var_dump($this->Query);
    }

    private function executarInstrucao() {
        $this->conexao();
        try {
            $this->Query->execute($this->Dados);
            $this->Resultado = $this->Conn->lastInsertId();
        } catch (Exception $ex) {
            $this->Resultado = null;
        }
    }
    private function exeInstrucao()
    {
        $this->conexao2();
        try {
            $this->getInstrucao();
            $this->Query->execute();
            $this->Resultado = $this->Conn->lastInsertId();
        } catch (Exception $ex) {
            $this->Resultado = null;
        }
    }

    private function conexao() {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Query);
    }
    
    private function conexao2() {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Create);
    }
    
    
     private function getInstrucao()
    {
        if ($this->Values) {
            foreach ($this->Values as $Link => $Valor) {
                if ($Link == 'limit' || $Link == 'offset') {
                    $Valor = (int) $Valor;
                }
                $this->Query->bindValue(":{$Link}", $Valor, (is_int($Valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }
}
