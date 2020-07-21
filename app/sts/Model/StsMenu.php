<?php

namespace App\sts\Model;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsMenu {
    private $Resultado;
    private $ResultadoCate;
    private $ResultadoMod;
    
    function getResultadoMod() {
        return $this->ResultadoMod;
    }

        function getResultadoCate() {
        return $this->ResultadoCate;
    }

        function getResultado() {
        return $this->Resultado;
    }

        
    public function menu() {
        $buscarMenu = new \App\sts\Model\helper\StsRead();
        
        if(empty($_SESSION['adms_niveis_acesso_id'])){
        $buscarMenu->fullRead("SELECT nivpg.dropdown, men.id id_men, men.nome
                nome_men, men.icone icone_men,pg.id id_pg,pg.menu_controller,
                pg.menu_metodo ,pg.nome_pagina, pg.icone icone_pg FROM adms_nivacs_pgs nivpg 
                INNER JOIN adms_menus men ON men.id=nivpg.adm_menu_id
                INNER JOIN adms_paginas pg ON pg.id=nivpg.adms_pagina_id
                WHERE nivpg.permissao =:permissao AND nivpg.lib_menu =:libmenu 
                AND men.id != 6 AND men.id != 8 AND men.id != 9 AND men.id != 10 AND men.id != 11 AND men.id != 12 AND men.id != 13
                ORDER BY men.ordem, nivpg.ordem ASC", "permissao=2&libmenu=1");
        } else if($_SESSION['adms_niveis_acesso_id'] == 1) {
            $buscarMenu->fullRead("SELECT nivpg.dropdown, men.id id_men, men.nome
                nome_men, men.icone icone_men,pg.id id_pg,pg.menu_controller,
                pg.menu_metodo ,pg.nome_pagina, pg.icone icone_pg FROM adms_nivacs_pgs nivpg 
                INNER JOIN adms_menus men ON men.id=nivpg.adm_menu_id
                INNER JOIN adms_paginas pg ON pg.id=nivpg.adms_pagina_id
                WHERE nivpg.permissao =:permissao AND nivpg.lib_menu =:libmenu 
                AND men.id != 4 AND men.id != 5 AND men.id != 9 AND men.id != 10 AND men.id != 11 AND men.id != 12 AND men.id != 13
                ORDER BY men.ordem, nivpg.ordem ASC", "permissao=2&libmenu=1");
        }else {
            $buscarMenu->fullRead("SELECT nivpg.dropdown, men.id id_men, men.nome
                nome_men, men.icone icone_men,pg.id id_pg,pg.menu_controller,
                pg.menu_metodo ,pg.nome_pagina, pg.icone icone_pg FROM adms_nivacs_pgs nivpg 
                INNER JOIN adms_menus men ON men.id=nivpg.adm_menu_id
                INNER JOIN adms_paginas pg ON pg.id=nivpg.adms_pagina_id
                WHERE nivpg.permissao =:permissao AND nivpg.lib_menu =:libmenu
                AND men.id != 4 AND men.id != 5 AND men.id != 9 AND men.id != 10 AND men.id != 11 AND men.id != 12 AND men.id != 13
                ORDER BY men.ordem, nivpg.ordem ASC", "permissao=2&libmenu=1");
        }
        $this->Resultado = $buscarMenu->getResultado();
        
        return $this->Resultado;
    }
    
    public function menuCategoria() {
        $listarCategoria = new \App\sts\Model\helper\StsRead();
        
        $listarCategoria->fullRead("SELECT * FROM adms_categoria");
        $this->ResultadoCate = $listarCategoria->getResultado();
        
        return $this->ResultadoCate;
    }
    
    public function menuMod() {
        $trazerMenu = new \App\sts\Model\helper\StsRead();
        $trazerMenu->fullRead("SELECT nivpg.dropdown, men.id id_men, men.nome
                nome_men, men.icone icone_men,pg.id id_pg,pg.menu_controller,
                pg.menu_metodo ,pg.nome_pagina, pg.icone icone_pg FROM adms_nivacs_pgs nivpg 
                INNER JOIN adms_menus men ON men.id=nivpg.adm_menu_id
                INNER JOIN adms_paginas pg ON pg.id=nivpg.adms_pagina_id
                WHERE nivpg.permissao =:permissao AND nivpg.lib_menu =:libmenu 
                AND men.id != 4 AND men.id != 5 AND men.id != 9
                ORDER BY men.ordem, nivpg.ordem ASC", "permissao=1&libmenu=2");
        $this->ResultadoMod = $trazerMenu->getResultado();
        
        return $this->ResultadoMod;
    }
}
