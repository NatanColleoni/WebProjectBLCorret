<div class="espaco-top"></div>
<div class="container-fluid container-blog">
    <div class="row">
        <div class="col-12 pdg-0 font-0 text-center">
            <img class="img-fluid" src="<?=$pathSite."blog/files/".$blog["nome_foto"]?>" alt="<?=$blog["titulo"]?>" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-data">
                        <? $data_hora = explode(" ", $blog["data_cadastro"]); ?>
                        <? $data = explode("-", $data_hora[0]); ?>
                        Publicado em <?=$data[2]?>.<?=$data[1]?>.<?=$data[0]?>
                    </div>
                    <div class="blog-titulo">
                        <h1><?=$blog["titulo"]?></h1>
                    </div>
                    <div class="blog-descricao">
                        <?=$blog["descricao"]?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<? include_once ("../produto/chamada.php"); ?>
