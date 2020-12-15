<?
include 'admin/lib.php';
$consultaNoticiaCTG = new base("noticia_ctg");
$consultaSQLNoticiaCTG = fetch_all($consultaNoticiaCTG->consulta());

$consultaNoticia = new base("noticia");
$NoticiaValue = $_POST['filtro'];
//$consultaSQLnoticia = fetch_all($consultaNoticia -> consulta("WHERE categoria_FK = {$NoticiaValue}"));

    
    if ($NoticiaValue != 0) {
        $consultaSQLNoticial = fetch_all($consultaNoticia->consulta("WHERE categoria_FK = {$NoticiaValue}", "ORDER BY ordem", "LIMIT 3"));
    } else {
        $consultaSQLNoticial = fetch_all($consultaNoticia->consulta("", "ORDER BY ordem ", "LIMIT 3"));
    }

foreach ($consultaSQLNoticiaCTG as $ind => $item) {
	
    ?>      
    <div id="box-id-<?= $item[id] ?>" class="row box-cont <? if ($ind == 0) { ?> active <? } ?>" style="display: none">
        <div class="row itens">
            <? foreach ($consultaSQLNoticial as $items) {
				$auxData = explode(' ', $items['data_cadastro2']);
                $data = explode('/', $auxData[0]);
                $dia = $data[0];
                $mes = $data[1];
                $ano = $data[2];
				if($items['nome_foto']){
					$fundoBlog = $pathSite."/blog/files/".$items['nome_foto'];
					$background = "bkg-img";
				}else {
					$fundoBlog = $pathSite."/images/BL_Corretora.png";
					$background = "bkg-img44";
				}				?>
                <div class="col-12  col-lg-4 blog-espacamento" id="SelectServ"  onclick="FunctionServ(this)">
                    <img style="width:100%; height: 183px;"src="<?= $fundoBlog ?>" alt="<?= $items['titulo']; ?>">
                    <div class="data-noticia">
                        <span>Publicado em <?= $dia ?> de <?= mes($mes) ?> de <?= $ano ?></span>
                    </div>
                    <div class="titulo-noticia">
                        <p><?= $items['titulo']; ?></p>
                    </div>
                    <div class="texto-noticia">
                        <p><?= quebrar_texto($items['descricao'], 70); ?></p>
                    </div>
                    <div class="noticia-btn">
                        <a href="<?= $pathSite ?>blog/<?= $items['id'] ?>/<?= arruma_string($items['titulo']) ?>.html">Saiba mais ></a>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>                
<? } ?>
            

