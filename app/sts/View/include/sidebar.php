<div class="wrapper row0">
    <div id="topbar" class="hoc clear"> 
        <!-- ################################################################################################ -->
        <div class="fl_left">
            <ul class="nospace inline pushright">
            </ul>
        </div>
        <div class="fl_right">
            <ul class="faico clear">

            </ul>
        </div>
        <!-- ################################################################################################ -->
    </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
    <header id="header" class="hoc clear"> 
        <!-- ################################################################################################ -->
        <div id="logo" class="fl_left">
            <h1><a href="index.html">Tele Filmes</a></h1>
        </div>
        <div id="quickinfo" class="fl_right">
            <ul class="nospace inline">
                <li><strong>Contato:</strong><br>
                    telefilmes@gmail.com</li>
                <li><strong>Não compartilhe</strong><br>
                    sua senha</li>
            </ul>
        </div>
        <!-- ################################################################################################ -->
    </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
    <nav id="mainav" class="hoc clear"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
            <?php
            foreach ($this->Dados['menu'] as $Menu) {
                extract($Menu);

                if ($dropdown == 1) {
                    echo "<li>";
                    echo "<a class = 'drop' href = '#'>{$nome_men}</a>";
                    echo "<ul>";
                    foreach ($this->Dados['categoria'] as $Categoria) {
                        extract($Categoria);
                        echo "<li><a href ='".URL."{$menu_controle}/{$menu_methodo}/{$nome}'>{$nome}</a></li>";
                    }
                    echo "</ul>";
                    echo "</li>";
                } else {
                    echo "<li class='active'><a href='".URL."{$menu_controller}/{$menu_metodo}'>{$nome_men}</a></li>";
                }
            }
            ?>

            <!--
            <li><a class="drop" href="#">Categoria</a>
              <ul>
                <li><a href="pages/gallery.html">Gallery</a></li>
                <li><a href="pages/full-width.html">Full Width</a></li>
                <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
                <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
                <li><a href="pages/basic-grid.html">Basic Grid</a></li>
              </ul>
            </li>
            
            <li><a href="#">Logar</a></li>
            <li><a href="#">Registrar</a></li>
            -->
        </ul>
        <!-- ################################################################################################ -->
    </nav>
</div>
