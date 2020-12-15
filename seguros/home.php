<?
$id = $_GET['id'];
$consultaSQLservico = fetch_all($consultaServico -> consulta("", "ORDER BY ordem", "")); 
?>

<div id="seguros" class="container servicos" style="margin-bottom:60px;">
    <div class="subtitulo">
        <p><?= $consultaSQLServicos['titulo'] ?></p>
    </div>
    <div class="titulo">
        <p><?= $consultaSQLServicos['subtitulo'] ?></p>
    </div>
    <div class="row servico-conteudo">
        <? foreach ($consultaSQLservico as $item) { ?>
            <div class="col-md-4 col-sm-12">
				<a href="<?= $pathSite ?>seguros/<?= $item['id'] ?>/<?= arruma_string($item['titulo']) ?>" title="<?= $item['titulo']?>">
					<div class="seg-title">
						<img src="<?= $pathSite ?>servico/files/<?= $item['nome_foto'] ?>">
						<p><?= quebrar_texto($item['titulo'], 30) ?></p>
					</div>
					<p><?= quebrar_texto($item['descricao'], 200) ?></p>
					<span>Saiba mais ></span>
				</a>
			</div>
			
        <? } ?>

    </div>
</div>
<?
//include_once('chamadaServico.php');
?>