<?php
    require './core/Config.php';
    require './vendor/autoload.php';

    use Core\ConfigController as Home;
    
    $URL = new Home;
    
    $URL->carregar();