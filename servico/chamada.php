<div class="container-fluid container-produto-chamada">
    <div class="row">
        <div class="col-12 pdg-0">
            <div class="prod-chamada-fundo background-full" style="background-image: url('<?=$pathSite."library/img/produto-chamada-fundo.jpg"?>')">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="prod-chamada-txt">
                                <div class="prod-chamada-titulo">
                                    <?=$produto_txt["titulo"]?>
                                </div>
                                <div class="prod-chamada-subtitulo">
                                    <?=$produto_txt["subtitulo"]?>
                                </div>
                                <div class="prod-chamada-desc">
                                    <?=$produto_txt["descricao"]?>
                                </div>
                                <div class="prod-chamada-mais">
                                    <a href="<?=$pathSite."produto/produtos.html"?>" title="Produtos">
                                        <div class="btn-prod-chamada-mais efeito-hover">
                                            Saiba mais
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="prod-chamada-img">
                                <img class="img-fluid" src="<?=$pathSite."texto/files/".$produto_txt["nome_foto"]?>" alt="Produtos" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
