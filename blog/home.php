<?/*<div class="bkg-img secao secao-banner-empresa banner-blog" style="background-image: url('<?= $pathSite ?>banner/files/<?= $bannerBlog['nomeFoto'] ?>')">
    <div class="container">
        <a href="<?= $pathSite ?>blog/<?= $destaque['id'] ?>/<?= arruma_string($destaque['titulo']) ?>.html" title="Leia a matéria completa">
            <div class="blog-destaque item-blog">
                <p class="publicado">Publicado em <?= $dia ?> de <?= mes($mes) ?> de <?= $ano ?></p>
                <h1><?= $destaque['titulo'] ?></h1>
                <h2><?= quebrar_texto($destaque['texto2'], 300) ?></h2>
                <button class="saiba-mais" type="button">
                    Continue lendo <span class="glyphicon glyphicon-menu-right"></span>
                </button>
            </div>
        </a>
    </div>
</div>*/?> 

<?
if(!$_GET['id']){
?>
<style>
    .blog-titulo h1{
        font-family: 'Raleway', sans-serif;
        font-size: 30px;
        text-align: left;
        letter-spacing: .05em;
        text-transform: uppercase;
        margin-top: 25px;
        color: #777777;
    }
    .blog-titulo h2 {
        font-family: 'Raleway', sans-serif;
        font-weight: 700;
        color: #484962;
        text-align: left;
        font-size: 36px;
    }
</style>


<section id="secao-blog-home">
    <div class="container">
        <div class="blog-titulo">
            <h1>BLOG</h1>
            <h2>Confira as novidades do setor</h2>
        </div>
        <div class="container-blog">
            <?
            foreach ($blogs as $valor) {
				if($valor['nome_foto']){
					$fundoBlog = $pathSite."/blog/files/".$valor['nome_foto'];
					$background = "bkg-img";
				}else {
					$fundoBlog = $pathSite."/images/BL_Corretora.png";
					$background = "bkg-img44";
				}
                $auxData = explode(' ', $valor['data_cadastro2']);
                $data = explode('/', $auxData[0]);
                $dia = $data[0];
                $mes = $data[1];
                $ano = $data[2];
                ?>
                <a title="Clique para ver a matéria completa" href="<?= $pathSite ?>blog/<?= $valor['id'] ?>/<?= arruma_string($valor['titulo']) ?>.html" class="item-blog">
                    <div class="<?=$background?>" style="background-image: url('<?= $fundoBlog ?>')">
                    </div>
                    <p class="publicado">Publicado em <?= $dia ?> de <?= mes($mes) ?> de <?= $ano ?></p>
                    <h1><?= quebrar_texto($valor['titulo'], 50) ?></h1>
                    <h2><?= quebrar_texto($valor['descricao'], 180) ?></h2>
					<div class="noticia-btn">
						<button type="button">
							Continue lendo <span class="glyphicon glyphicon-menu-right"></span>
						</button>
					
					</div>
                </a>
                <?
            }
            ?>
        </div>
    </div>
</section>
<?
if (!empty($informativos)) {
    ?>
    <section id="secao-informativo" class="bkg-img" style="background-image:url('<?= $pathSite ?>banner/files/<?= $bannerInformativo['nomeFoto'] ?>')">
        <div class="container">
            <div class="titulo-secao">
                <h1>Informativos</h1>
            </div>
            <div class="container-informativo">
                <?
                foreach ($informativos as $info) {
                    ?>
                    <div class="item-informativo">
                        <h3><?= $info['titulo'] ?></h3>
                        <h4><?= $info['texto'] ?></h4>
                        <a href="<?= $info['link'] ?>" download title="Clique para baixar o arquivo - <?= $info['link'] ?>">
                            <button type="button">Download PDF</button>
                        </a>
                    </div>
                    <?
                }
                ?>
            </div>
        </div>
    </section>
    <?
}
}else{
	include 'interna.php';
}
	?>

