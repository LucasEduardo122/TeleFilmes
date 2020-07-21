<?php
extract($this->Dados['perfil'][0]);
?>
<div class="wrap">
    <div class="right-menu">
        <a  class="active" href="#profile"><i class="fa fa-user"></i><span>Perfil</span></a>
        <a href="#project"><i class="fa fa-photo"></i><span>Minha Lista</span></a>
        <a  href="#skills"><i class="fa fa-folder"></i><span>Breve</span></a>
    </div>
    <div class="content">
        <div class="profile open animated zoomIn">
            <div class="avatar">
                <?php
                if (isset($_SESSION['imagem']) && !empty($_SESSION['imagem'])) {
                    echo "<img src='http://www.arjunamgain.com.np/images/arjun.jpg'>";
                } else {
                    echo "<img src='" . URL . "assets/usuarios/download.png'>";
                }
                ?>
                <div class="bubble">
                    <h3><?php echo $nome_perfil ?></h3>
                    <a href="#"><?php echo $email ?></a>
                </div>

            </div>
        </div>	
        <div class="project animated zoomIn">
            <div class="avatar">

                <div class="bubble">
                    <h3>Acesse o link abaixo para ver a lista</h3>
                    <a href="<?php echo URL . 'perfil/minha-lista' ?>">Ver Lista </a>

                </div>

            </div>
        </div>

        <div class="skills animated zoomIn">
            <div class="avatar">

                <div class="bubble">
                    <h3>Em breve</h3>
                    <a href="#">Sem detalhes </a>

                </div>

            </div>
        </div>
    </div><!--End Content-->
    
    <?php
    if ($_SESSION['adms_niveis_acesso_id'] == 1) {
        echo "<div class='footer'>";
        foreach ($this->Dados['menuMod'] as $MenuMod) {
            extract($MenuMod);
            ?>
            <a href="<?php echo URL . "$menu_controller/$menu_metodo" ?>" target="_blank"><i class="<?php echo $icone_men ?>"></i><span><?php echo $nome_men?></span></a>

            <?php
        }
        echo "</div>";
    }
    ?>
</div>