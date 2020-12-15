<div class="espaco-top"></div>
<div class="container-fluid container-produto">
    <div class="row produto-header-linha">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="produto-txt-header">
                        <h1><?=$produto_txt["titulo"]?></h1>
                    </div>
                    <? if($produto_txt["subtitulo"]) { ?>
                        <div class="produto-txt-subtitulo">
                            <?=$produto_txt["subtitulo"]?>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <? if($list_produtos) {
                    foreach($list_produtos as $produto) { ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div id="produto-id-<?=$produto["txt"]["id"]?>" class="lista-produto-item">
                                <div class="lista-produto-img">
                                    <img class="img-fluid" src="<?=$pathSite."produto/files/".$produto["txt"]["nome_foto"]?>" alt="<?=$produto["txt"]["titulo"]?>" />
                                </div>
                                <div class="lista-produto-titulo" title="<?=$produto["txt"]["titulo"]?>">
                                    <?=$produto["txt"]["titulo"]?>
                                </div>
                                <div class="lista-produto-desc" title="<?=strip_tags($produto["txt"]["descricao"])?>">
                                    <?=$produto["txt"]["descricao"]?>
                                </div>
                                <? if($produto["topico"]) { ?>
                                    <div class="lista-produto-topico">
                                        <button data-toggle="collapse" data-target="#lista-prod-top-<?=$produto["txt"]["id"]?>" class="lista-produto-topico-btn">
                                            Veja nossos sabores <i class="fas fa-chevron-down"></i>
                                        </button>
                                        <div id="lista-prod-top-<?=$produto["txt"]["id"]?>" class="lista-prod-top collapse">
                                            <? foreach($produto["topico"] as $prod_top) { ?>
                                                <div class="lista-prod-top-item">
                                                    <?=$prod_top["titulo"]?>
                                                </div>
                                            <? } ?>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    <? }
                } ?>
            </div>
        </div>
    </div>
</div>
