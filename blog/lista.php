<div class="espaco-top"></div>
<? if($blogs) { ?>
    <div class="container-fluid container-blog">
        <div class="row">
            <div class="col-12 pdg-0">
                <a href="<?=$pathSite."blog/".$blogs[0]["id"]."/".arruma_string($blogs[0]["titulo"]).".html"?>" title="<?=$blogs[0]["titulo"]?>">
                    <div class="blog-banner background-full" style="background-image: url('<?=$pathSite."blog/files/".$blogs[0]["nome_foto"]?>')">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="blog-header">
                                        <h1><?=$blog_txt["titulo"]?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mrg-0">
                            <div class="col-12 col-lg-6 offset-lg-6 pdg-0">
                                <div class="blog-banner-box">
                                    <div class="blog-banner-data">
                                        <? $data_hora = explode(" ", $blogs[0]["data_cadastro"]); ?>
                                        <? $data = explode("-", $data_hora[0]); ?>
                                        Publicado em <?=$data[2]?>.<?=$data[1]?>.<?=$data[0]?>
                                    </div>
                                    <div class="blog-banner-titulo">
                                        <?=$blogs[0]["titulo"]?>
                                    </div>
                                    <div class="blog-banner-desc">
                                        <?=$blogs[0]["descricao"]?>
                                    </div>
                                    <div class="blog-banner-ler">
                                        <div class="btn-blog-banner">
                                            Continuar lendo
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 pdg-0">
                <div class="blog-linha-2 background-full" style="background-image: url('<?=$pathSite."library/img/produto-chamada-fundo.jpg"?>')">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="blog-header-2">
                                    Mais recentes
                                </div>
                            </div>
                            <? if($blogs[1]) { ?>
                                <div class="col-12 col-lg-6">
                                    <a href="<?=$pathSite."blog/".$blogs[1]["id"]."/".arruma_string($blogs[1]["titulo"]).".html"?>" title="<?=$blogs[1]["titulo"]?>">
                                        <div class="blog-box-2 background-full efeito-hover" style="background-image: url('<?=$pathSite."blog/files/".$blogs[1]["nome_foto"]?>')">
                                            <div class="blog-box-2-fundo">
                                                <div class="blog-box-2-data">
                                                </div>
                                                <div class="blog-box-2-titulo">
                                                    <?=$blogs[1]["titulo"]?>
                                                </div>
                                                <div class="blog-box-2-ler">
                                                    Ler matéria completa
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <? } ?>
                            <? if($blogs[2]) { ?>
                                <div class="col-12 col-lg-6 espaco-menor">
                                    <a href="<?=$pathSite."blog/".$blogs[2]["id"]."/".arruma_string($blogs[2]["titulo"]).".html"?>" title="<?=$blogs[2]["titulo"]?>">
                                        <div class="blog-box-2 background-full efeito-hover" style="background-image: url('<?=$pathSite."blog/files/".$blogs[2]["nome_foto"]?>')">
                                            <div class="blog-box-2-fundo">
                                                <div class="blog-box-2-data">
                                                </div>
                                                <div class="blog-box-2-titulo">
                                                    <?=$blogs[2]["titulo"]?>
                                                </div>
                                                <div class="blog-box-2-ler">
                                                    Ler matéria completa
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
            <? if(count($blogs) > 3) { ?>
                <div class="col-12 pdg-0 blog-linha-3">
                    <div class="container">
                        <div class="row">
                            <? foreach($blogs as $ind => $blog_list) {
                                if($ind > 2) { ?>
                                    <div class="col-12 col-sm-6 col-lg-4 espaco-blog-linha-3">
                                        <a href="<?=$pathSite."blog/".$blog_list["id"]."/".arruma_string($blog_list["titulo"]).".html"?>" title="<?=$blog_list["titulo"]?>">
                                            <div class="blog-box efeito-hover">
                                                <div class="blog-box-img background-full" style="background-image: url('<?=$pathSite."blog/files/".$blog_list["nome_foto"]?>')"></div>
                                                <div class="blog-box-data">
                                                    <? $data_hora = explode(" ", $blog_list["data_cadastro"]); ?>
                                                    <? $data = explode("-", $data_hora[0]); ?>
                                                    Publicado em <?=$data[2]?>.<?=$data[1]?>.<?=$data[0]?>
                                                </div>
                                                <div class="blog-box-titulo">
                                                    <?=quebrar_texto($blog_list["titulo"], 42)?>
                                                </div>
                                                <div class="blog-box-desc">
                                                    <?=quebrar_texto($blog_list["descricao"], 90)?>
                                                </div>
                                                <div class="blog-box-ler">
                                                    Continuar lendo
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <? }
                            } ?>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
<? } ?>
