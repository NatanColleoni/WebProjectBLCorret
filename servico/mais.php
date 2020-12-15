<div class="container-fluid container-servico mais">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="servico-mais-header">
                        Conheça nossos <span>principais serviços</span>
                    </div>
                </div>
                <? if($servicos) { ?>
                    <div class="col-12">
                        <div class="slick-size-4 font-0">
                            <? foreach($servicos as $servico_mais) { ?>
                                <div class="slide">
                                    <a href="<?=$pathSite."servico/".$servico_mais["id"]."/".arruma_string($servico_mais["titulo"]).".html"?>" title="<?=$servico_mais["titulo"]?>">
                                        <div class="servico-mais-box">
                                            <? $img = rightImgSite($servico_mais["nome_foto_2"], "servico/files/")?>
                                            <img class="img-fluid" src="<?=$img["nl"]?>" />
                                            <div class="servico-mais-fundo-azul"></div>
                                            <div class="servico-mais-titulo"><?=$servico_mais["titulo"]?></div>
                                        </div>
                                    </a>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="servico-mais-btn">
                            <a href="<?=$pathSite."servico/servicos.html"?>" title="Ver outros serviços">
                                <div class="btn-servico-mais efeito-hover">
                                    Ver outros serviços
                                </div>
                            </a>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
</div>