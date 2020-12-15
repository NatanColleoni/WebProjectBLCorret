<div id="inicio" class="container-fluid p-0 pos-rel">
    <? if ($banner_desk && !$possui_video_banner) { ?>
        <div class="banner-principal royalSlider heroSlider rsMinW d-none d-lg-block w-100">
            <? foreach ($banner_desk as $valor) { ?>
                <div class="rsContent">
                    <?= $valor["url"] ? "<a href='" . $valor["url"] . "' target='" . $valor["target"] . "' title='" . $valor["titulo"] . "'>" : "" ?>
                    <img class="rsImg" src="<?= $pathSite ?>banner/files/<?= $valor["nome_foto"] ?>" alt="<?= $valor["titulo"] ?>" title="<?= $valor["titulo"] ?>" />
                    <?= $valor["url"] ? "</a>" : "" ?>
                </div>
            <? } ?>
        </div>
        <?
    }
    
    if ($banner_mobile && !$possui_video_banner) {
        ?>
        <div class="banner-principal-mob royalSlider heroSlider rsMinW d-block d-lg-none w-100">
            <? foreach ($banner_mobile as $valor) { ?>
                <div class="rsContent">
                    <?= $valor["url"] ? "<a href='" . $valor["url"] . "' target='" . $valor["target"] . "' title='" . $valor["titulo"] . "'>" : "" ?>
                    <img class="rsImg" style="height: 778px;" src="<?= $pathSite ?>banner/files/<?= $valor["nome_foto"] ?>" alt="<?= $valor["titulo"] ?>" title="<?= $valor["titulo"] ?>" />
                    <?= $valor["url"] ? "</a>" : "" ?>
                </div>
            <? } ?>
        </div>
        <?
    }
    if ($possui_video_banner) {
        ?>
        <div class="banner-video">
            <video muted autoplay playsinline loop src="<?= $pathSite ?>banner/files/<?= $video_banner ?>" id="banner-video-play" class="banner-video-play"></video>
            <div class="banner-video-som video-s-som">
                <?= file_get_contents($pathSite . "library/img/silence.svg") ?>
            </div>
            <div class="banner-video-som video-c-som display-none">
                <?= file_get_contents($pathSite . "library/img/sound.svg") ?>
            </div>
        </div>
    <? } ?>
</div>


<div id="parceiros" class="marcas">
    <p class="text-center">As melhores marcas do mercado você encontra aqui</p>
    <div class="container-fluid">




        <div class="owl-carousel owl-theme">
            <? foreach ($consultaSQLmarcas as $item) { ?>
                <div class="item justify-content-center">
                    <div class="item-tamanho">
						<?if($item['link']){?><a href="<?=$item['link']?>"><?}?>
							<img src="<?= $pathSite ?>marcas/files/<?= $item['nome_foto'] ?>" alt="Marcas slide">
						<?if($item['link']){?></a><?}?>
                    </div>
                </div>
            <? } ?>



        </div>


    </div>
</div>




<div id="seguros" class="container servicos">
    <div class="subtitulo">
        <p><?= $consultaSQLServicos['titulo'] ?></p>
    </div>
    <div class="titulo">
        <p><?= $consultaSQLServicos['subtitulo'] ?></p>
    </div>
    <div id="removeRow" class="row servico-conteudo">
        <? foreach ($consultaSQLservico as $item) { ?>
            <div class="col-md-4 servico-espacamento">
                <div class="seg-title">
                    <img src="<?= $pathSite ?>servico/files/<?= $item['nome_foto'] ?>">
                    <p><?= quebrar_texto($item['titulo'], 30) ?></p>
                </div>
                <p><?= quebrar_texto($item['descricao'], 200) ?></p>
                <a href="<?= $pathSite ?>seguros/<?= $item['id'] ?>/<?= arruma_string($item['titulo']) ?>">Saiba mais ></a>
            </div>
        <? } ?>

    </div>
    <div class="d-flex justify-content-center btn-servicos">
        <a href="<?= $pathSite ?>seguros">Veja outros serviços</a>
    </div>
</div>

<div id="quemsomos"class="quemsomos container">
    <div class="row">
        <div class="col-md-7">
            <img class="img-fluid" src="<?= $pathSite ?>texto/files/<?= $consultaSQLqSomos['nome_foto'] ?>">
        </div>
        <div class="col-sm-12 col-md-5 text-qsomos-r">
            <div class="subtitulo">
                <p><?= $consultaSQLqSomos['titulo'] ?></p>
            </div>
            <div class="titulo2">
                <p><?= $consultaSQLqSomos['subtitulo'] ?></p>
            </div>
            <div class="text-qsomos">
                <p><?= quebrar_texto($consultaSQLqSomos['descricao'], 200) ?></p>
                <div class="d-flex justify-content-end btn-servicos">
                    <a href="<?= $pathSite ?>quem_somos">Nossa história</a>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="atendimento">
    <div class="container">
        <div class="subtitulo">
            <p><?= $consultaSQLAtendimentoO['titulo'] ?></p>
        </div>
        <div class="titulo">
            <p><?= $consultaSQLAtendimentoO['subtitulo'] ?></p>
        </div>
        <div class="atendimento-txt">
            <p><?= $consultaSQLAtendimentoO['descricao'] ?></p>
        </div>
        <div class="atendimento-btn">
            <a href="https://whats.link/blcorretora" target="_blank">Atendimento online</a>
        </div>
    </div>
</div>

<div id="blog" class="blog">
    <div class="container">
        <div class="subtitulo">
            <p><?= $consultaSQLBlog['titulo'] ?></p>
        </div>
        <div class="titulo">
            <p><?= $consultaSQLBlog['subtitulo'] ?></p>
        </div>

        <div id="removeRow" class="btn-blog row justify-content-start d-responsivo-n">
            

            <button onclick="carregaConteudo(this)"  
                    data-id="#box-id-" 
                    data-cont="0" 
                    data-search="0" 
                    class="box-btn active Lato-Light">Todos</button>

            <?
			
			foreach ($consultaSQLNoticiaCTG as $ind => $item) {
$consultaSQLNoticia2 = fetch_all($consultaNoticia->consulta("WHERE categoria_FK = {$item['id']}"));
if($consultaSQLNoticia2){
               ?> 
                <button onclick="carregaConteudo(this)"  
                        data-id="#box-id-<?= $item[id] ?>" 
                        data-cont="<?= $item[id] ?>" 
                        data-search="<?= $item[id] ?>" 
                        class="box-btn Lato-Light"><?= $item[titulo] ?></button>

            <? } 
			}?>
        </div>
        
        <div id="removeRow" class="btn-blog row justify-content-start d-xl-none d-lg-none">
            <!--<button onclick="carregaConteudo(this)" data-id="#box-id-0" data-cont="0" data-search="0" class="box-btn active">Todos</button>
            <button onclick="carregaConteudo(this)" data-id="#box-id-1" data-cont="1" data-search="1" class="box-btn">Notï¿½cias</button>
            <button onclick="carregaConteudo(this)" data-id="#box-id-2" data-cont="2" data-search="2" class="box-btn">Seguros</button>-->

            <select id="SelectServ"  onchange="FunctionServ()">
                <option onclick="carregaConteudo(this)"  
                        data-id="#box-id-" 
                        data-cont="0" 
                        data-search="0" 
                        class="box-btn active Lato-Light">Todos</option>

                <? foreach ($consultaSQLNoticiaCTG as $ind => $item) {
				$validaNoticia= fetch_all($consultaNoticia->consulta("WHERE categoria_FK = {$item['id']}"));
				if($validaNoticia){
                    ?> 
                    <option onclick="carregaConteudo(this)"  
                            data-id="#box-id-<?= $item[id] ?>" 
                            data-cont="<?= $item[id] ?>" 
                            data-search="<?= $item[id] ?>"
                            value="<?= $item[id] ?>"
                            class="box-btn Lato-Light"><?= $item[titulo] ?></option>

                <? } 
				}?>
            </select>
            
        </div>


        <div id="blog-conteudo">

			
        </div>
		<div class="btn-servicos d-flex justify-content-center">
			<a href="<?= $pathSite ?>blog/">Continue lendo</a>
		</div>
    </div>
</div>


<div class="localizacao">
    <div class="container">
        <div class="subtitulo">
            <p>localização</p>
        </div>
        <div class="titulo">
            <p>Venha conhecer a nossa empresa</p>
        </div>
    </div>
    <?=$configs['mapa']?>
</div>