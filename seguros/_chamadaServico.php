<?
if ($pagina == 3 && !is_numeric($id)) {
    $limit = '';
} else {
    $limit = 'LIMIT 4';
}
//$textoServico = $objTexto->consultaId(24);
$consultaSQLservico = fetch_all($consultaServico -> consulta("", "", ""));

if ($pagina == 3 && !is_numeric($id)) {
    $first = array_shift($consultaSQLservico);
}
?>
<section id="secao-servico">
    <div class="container">
        <div class="align-servico">
            <div class="titulo-chamada">
                <p><?= $textoServico['titulo'] ?></p>
                <strong><?= $textoServico['subtitulo'] ?></strong>
                <h3><?= $textoServico['descricao'] ?></h3>
            </div>
            <div class="container-servico">
                <?
                if ($pagina == 3 && !is_numeric($id)) {
                    ?>                    
                    <a style="background-image:url('<?= $pathSite ?>servico/files/<?= $first['nome_foto'] ?>')" class="full-servico bkg-img item-servico" href="<?= $pathSite ?>servico/<?= $first['id'] ?>/<?= arruma_string($valor['titulo']) ?>" title="Veja mais sobre - <?= $first['titulo'] ?>">
                        <div class="titulo-servico">
                            <img src="<?= $pathSite ?>servico/files/<?= $first['nomeFoto2'] ?>">
                            <p><?= $first['titulo'] ?></p>
                            <button type="button">Saiba mais <span>&#187;</span></button>
                        </div>
                        <!--<h2><?= quebrar_texto($valor['texto'], 100) ?></h2>-->
                    </a>
                    <?
                }
                ?>
                <?
                foreach ($consultaSQLservico as $valor) {
                    ?>
                    <a style="background-image:url('<?= $pathSite ?>servico/files/<?= $valor['nome_foto'] ?>')" class="item-servico" href="<?= $pathSite ?>servico/<?= $valor['id'] ?>/<?= arruma_string($valor['titulo']) ?>" title="Veja mais sobre - <?= $valor['titulo'] ?>">
                        <div class="titulo-servico">
                            <img src="<?= $pathSite ?>servico/files/<?= $valor['nomeFoto2'] ?>">
                            <p><?= $valor['titulo'] ?></p>
                            <button type="button">Saiba mais <span>&#187;</span></button>
                        </div>
                        <!--<h2><?= quebrar_texto($valor['texto'], 100) ?></h2>-->
                    </a>
                    <?
                }
                ?>
            </div>
        </div>
       
    </div>
</section>
<?

?>