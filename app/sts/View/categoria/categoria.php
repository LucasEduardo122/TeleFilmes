<?php
foreach ($this->Dados['categoriaFilme'] as $Filmes) {
    extract($Filmes);
    $a = [$imagem1, $imagem2, $imagem3];

     
   $imagemFilme = $a[mt_rand(0, count($a) - 1)];
}
?>
<div class="wrapper row4">
    <div class="hoc container clear"> 
        <!-- ################################################################################################ -->
        <ul class="nospace elements">

            <?php
            if (empty($this->Dados['categoriaFilme'])) {

                echo "<li class='one_third'>";
                echo "<article>";
                echo "<figure>";
                echo "<img src='https://neilpatel.com/wp-content/uploads/2019/05/ilustracao-sobre-o-error-404-not-found.jpeg' style='width:320px; height:220px' alt='teste'/>";
                echo "<figcaption>";
                echo "<a href='#'>Sem detalhes. &raquo</a>";
                echo "</figcaption>";
                echo "</figure>";
                echo "<div class='txtwrap'>";
                echo "<h6 class='heading'>OOOPPPSSS</h6>";
                echo "<p>Nenhum filme foi encontrado no acervo com essa categoria</p>";
                echo "</div>";
                echo "</article>";
                echo "</li>";
            } else {

                foreach ($this->Dados['categoriaFilme'] as $Filmes) {
                    extract($Filmes);

                    echo "<li class='one_third'>";
                    echo "<article>";
                    echo "<figure>";
                    echo "<img src='$imagemFilme'  style='width:320px; height:220px; ' alt=''>";
                    echo "<figcaption>";
                    echo "<a href='" . URL . "video/assistir/$id'>Assistir &raquo</a>";
                    echo "</figcaption>";
                    echo "</figure>";
                    echo "<div class='txtwrap'>";
                    echo "<h6 class='heading'>$nome_filme</h6>";
                    echo "<p>$sinopse...</p>";
                    echo" </div>";
                    echo "</article>";
                    echo " </li>";
                }
            }
            ?>
        </ul>
        <!-- ################################################################################################ -->
        <div class="clear"></div>
    </div>
</div>