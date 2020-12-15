<?
if ($_POST["enviar"]) {
    $obj->importArray($_POST);
    $obj->persist($id);
    $obj->mensagem();
}
$_POST = $obj->consultaId($id);

$pai = $objPai->consultaId($fk);

$titulo .= " - ".$pai["rf_nm"];

$titulo.= ($_POST["titulo"]) ? " - ".$_POST["titulo"] : "";
$url_prev = $pathSite."admin/{$tabelaPai}/foto/".cr($fk)."/".arruma_string($pai["titulo"]);
?>

<div class="pnl-hd-title"><h4><?=$titulo?></h4></div>
<form class="table-responsive" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group" <?=$ipt_desc?>>
        <label>Descrição</label>
        <input <?=$ipt_desc?> class="form-control" placeholder="Insira uma breve descrição..." name="descricao" value="<?=$_POST["descricao"]?>">
    </div>
    <div class="form-group">
        <label>Tamanho recomendado de <span class="text-success"><?=$img_size?></span></label>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="<?=$obj->campoNomeArquivo?>"><br/><br/>
    </div>
    <div class="form-group text-center">
        <?
        if($_POST["nomeFoto"]){
            $img=rightImg($_POST["nomeFoto"], $tabelaPai."/files/");
            ?>
            <label>Imagem Atual</label>
            <br/>
            <div class="pnl-img-1">
                <a class="img-on-in wrap-on" data-fancybox="gallery" href="<?=$img["nl"]?>" style="background-image: url(<?=$img["sm"]?>);" title="<?=$_POST["titulo"]?>"></a>
            </div>
            <?
        } ?>
    </div>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?=$url_prev?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>