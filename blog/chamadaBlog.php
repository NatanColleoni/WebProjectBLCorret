<?
if (!empty($blogs)) {
    ?>
    <section id="secao-blog-home" <?= ($pagina == 5) ? "class='mais-materia'" : "" ?>>
        <div class="container">
            <div class="titulo-secao">
                <?
                if ($pagina != 5) {
                    ?>
                    <h1>BLOG</h1>
                    <h2>Confira as novidades do setor</h2>
                    <?
                } else {
                    ?>
                    <h1>Outras matérias</h1>
                    <?
                }
                ?>
            </div>
            <div class="container-blog">
                <?
                foreach ($blogs as $valor) {
                    $auxData = explode(' ', $valor['data_cadastro2']);
                    $data = explode('/', $auxData[0]);
                    $dia = $data[0];
                    $mes = $data[1];
                    $ano = $data[2];
                    ?>
                    <a title="Clique para ver a matéria completa" href="<?= $pathSite ?>blog/<?= $valor['id'] ?>/<?= arruma_string($valor['titulo']) ?>.html" class="item-blog">
                        <div class="bkg-img" style="background-image: url('<?= $pathSite ?>blog/files/<?= $valor['nomeFoto'] ?>')">
                        </div>
                        <p class="publicado">Publicado em <?= $dia ?> de <?= mes($mes) ?> de <?= $ano ?></p>
                        <h1><?= quebrar_texto($valor['titulo'], 50) ?></h1>
                        <h2><?= quebrar_texto($valor['texto2'], 200) ?></h2>
                        <button class="saiba-mais" type="button">
                            Continue lendo <span class="glyphicon glyphicon-menu-right"></span>
                        </button>
                    </a>
                    <?
                }
                ?>
            </div>
        </div>
    </section>
    <?
}
?>
