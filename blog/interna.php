<?
$auxData = explode(' ', $materia['data_cadastro2']);
$data = explode('/', $auxData[0]);
$dia = $data[0];
$mes = $data[1];
$ano = $data[2];
?>
<div class="secao">
    <div class="container">
        <div class="position-relative">
            <ul class="share-blog">
                <li>
                    <a title="Clique para compartilhar a matéria no seu facebook" rel="external" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $pathSite ?>blog/<?= $materia['id'] ?>/<?= arruma_string($materia['titulo']) ?>.html">
                        <img src="<?= $pathSite ?>library/img/fb-blog.png">
                    </a>
                </li>
                <li class="wpp-share">
                    <a title="Clique para enviar a matéria pelo whatsapp" rel="external" target="_blank" href="https://api.whatsapp.com/send?text=<?= $pathSite ?>blog/<?= $materia['id'] ?>/<?= arruma_string($materia['titulo']) ?>.html">
                        <img src="<?= $pathSite ?>library/img/whatsapp-blog.png">
                    </a>
                </li>
            </ul>
            <div class="info-blog">
                <div class="nav-blog">
                    <a href="<?= $pathSite ?>blog" title="Veja todas as matérias">
                        Blog
                    </a>
                    <span class="glyphicon glyphicon-menu-right"></span>
                    <p><?= $materia['titulo'] ?></p>
                </div>
                <p class="publicado">Publicado em <?= $dia ?> de <?= mes($mes) ?> de <?= $ano ?></p>
                <h1><?= $materia['titulo'] ?></h1>
                <h2><?= $materia['descricao'] ?></h2>
            </div>
        </div>
    </div>
</div>
<?
include_once('chamadaBlog.php');
?>