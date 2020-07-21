<?php

namespace App\adms\model\helper;

use PDO;

if (!defined('URL')) {
    header("Location: /");
    exit();
}



class AdmsConn {
    public static $Host = HOST;
    public static $User = USER;
    public static $Senha = PASS;
    public static $DBname = DBNAME;
    public static $Connect = null;
    
    
    private static function conectar() {
        try {
            if(self::$Connect == null){
                self::$Connect = new PDO('mysql:host=' . self::$Host . ';dbname=' . self::$DBname, self::$User, self::$Senha);
            }
        } catch (Exception $exc) {
            echo "Erro ao conectar na base";
            die;
        }
        
        return self::$Connect;
    }
    
    
    public function getConn() {
        return self::conectar();
    }
}
