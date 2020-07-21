<?php

namespace Core;

/**
 * Description of ConfigView
 *
 * @copyright (c) year, Cesar Szpak - Celke
 */
class ConfigView {

    private $Nome;
    private $Dados;

    public function __construct($Nome, array $Dados = null) {
        $this->Nome = (string) $Nome;
        $this->Dados = $Dados;
    }

    public function renderizar() {
        include 'app/sts/View/include/cabecalho.php';
        include 'app/sts/View/include/sidebar.php';
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/' . $this->Nome . '.php';
        } else {
            echo "Erro ao carregar a Página: {$this->Nome}";
        }
        include 'app/sts/View/include/rodape.php';
    }

    public function renderizarCadastro() {
        include 'app/sts/View/include/cabecalhoAdm.php';
        include 'app/sts/View/include/sidebar.php';
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/' . $this->Nome . '.php';
        } else {
            echo "Erro ao carregar a Página: {$this->Nome}";
        }
        include 'app/sts/View/include/rodape.php';
    }

    public function renderizarPerfil() {
        include 'app/sts/View/include/cabecalhoPerfil.php';
        include 'app/sts/View/include/sidebar.php';
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/' . $this->Nome . '.php';
        } else {
            echo "Erro ao carregar a Página: {$this->Nome}";
        }
        include 'app/sts/View/include/rodape.php';
    }

    public function renderizarLogin() {
        include 'app/sts/View/include/cabecalho.php';
        include 'app/sts/View/include/sidebar.php';
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/' . $this->Nome . '.php';
        } else {
            echo "Erro ao carregar a Página: {$this->Nome}";
        }
    }

    public function renderizarEsquecerSenha() {
        include 'app/adms/Views/include/cabecalho.php';
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/' . $this->Nome . '.php';
        } else {
            echo "Erro ao carregar a Página: {$this->Nome}";
        }
    }

    public function renderizarPlayer() {
        include 'app/sts/View/include/cabecalhoPlayer.php';
        include 'app/sts/View/include/sidebar.php';
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/' . $this->Nome . '.php';
        } else {
            echo "Erro ao carregar a Página: {$this->Nome}";
        }
    }

}
