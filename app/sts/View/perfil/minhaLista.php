
<div class="slide-container">

    <div class="wrapperr">
        <div class="clash-card barbarian">
            <?php
            if (!empty($this->Dados['MinhaLista'])) {
                foreach ($this->Dados['MinhaLista'] as $lista) {
                    extract($lista);
                    ?>
                    <div class="clash-card__image clash-card__image--barbarian">
                        <img class="image" src="<?php echo $imagem1 ?>" alt="barbarian" />
                    </div>
                    <div class="clash-card__level clash-card__level--barbarian">Lançamento: <?php echo $ano_filme ?></div>
                    <div class="clash-card__unit-name"><?php echo $nome_filme ?></div>
                    <div class="clash-card__unit-description">
                        <?php echo $sinopse ?>
                    </div>

                    <div class="clash-card__unit-stats clash-card__unit-stats--barbarian clearfix">
                        <div class="one-third">
                            <div class="stat">Legenda</div>
                            <div class="stat-value"><?php echo $nome_legenda ?></div>
                        </div>

                        <div class="one-third">
                            <div class="stat">Idioma</div>
                            <div class="stat-value"><?php echo $nome_idioma ?></div>
                        </div>

                        <div class="one-third no-border">
                            <div class="stat">Categoria</div>
                            <div class="stat-value"><?php echo $categoria_nome ?></div>
                        </div>

                    </div>

                </div> <!-- end clash-card barbarian-->
            </div> <!-- end wrapper -->
            <?php
        }
    } else {
        ?>

        <div class="clash-card__image clash-card__image--barbarian">
            <img class="image" src="data:image/png;base64,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" alt="barbarian" />
        </div>
        <div class="clash-card__level clash-card__level--barbarian">Lançamento: nenhum</div>
        <div class="clash-card__unit-name">OOOOPPSSSSS</div>
        <div class="clash-card__unit-description">
            Você não possui nenhum filme adicionado na lista
        </div>

        <div class="clash-card__unit-stats clash-card__unit-stats--barbarian clearfix">
            <div class="one-third">
                <div class="stat">Legenda</div>
                <div class="stat-value">Nenhum</div>
            </div>

            <div class="one-third">
                <div class="stat">Idioma</div>
                <div class="stat-value">Nenhum</div>
            </div>

            <div class="one-third no-border">
                <div class="stat">Categoria</div>
                <div class="stat-value">Nenhum</div>
            </div>

        </div>

    </div> <!-- end clash-card barbarian-->
    </div> <!-- end wrapper -->
    <?php }
?>

</div> <!-- end container -->