<?
$fk = dr($_GET["sub"]);
$id = dr($_GET["aux1"]);

$pai = $obj_pai->consultaId($fk);

if ($_POST["enviar"]) {
    $obj->required = array(
        "titulo" => "Título"
    );
    $_POST[$tabelaPai."_fk"] = $fk;

    $obj->importArray($_POST);
    $obj->persist($id);
    $obj->mensagem();
}
$_POST = $obj->consultaId($id);

$titulo.= " - ".$pai["rf_nm"];
$titulo.= ($_POST["titulo"])? " - ".$_POST["titulo"] : "";
$url_prev = $pathSite."admin/{$tabelaPai}/topico/".cr($fk)."/".arruma_string($pai["titulo"]);

$sem_foto = array();
$sem_subtitulo = array(1);
$sem_descricao = array();
?>

<div class="pnl-hd-title"><h4><?=$titulo?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Título</label>
        <input class="form-control" placeholder="..." required name="titulo" type="text" maxlength="255" value="<?=$_POST["titulo"]?>" autofocus>
    </div>
    <? if(!in_array($fk, $sem_subtitulo)) { ?>
        <div class="form-group">
            <label>Subtítulo</label>
            <input class="form-control" placeholder="..." required name="subtitulo" type="text" maxlength="255" value="<?=$_POST["subtitulo"]?>">
        </div>
    <? } ?>
    <? if(!in_array($fk, $sem_descricao)) { ?>
        <div class="form-group">
            <label>Texto</label>
            <textarea class="form-control tinymce" placeholder="Descreva..." rows="4" name="descricao" ><?=stripslashes($_POST["descricao"])?></textarea>
        </div>
    <? } ?>
    <? if(!in_array($fk, $sem_foto)) { ?>
        <div class="form-group">
            <?= ($img_size != "null")? "<label>Tamanho recomendado: <span class='text-success'>{$img_size}</span></label>": ''; ?>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="<?=$obj->campoNomeArquivo?>"><br/><br/>
        </div>
        <div class="form-group text-center">
            <?
            if($_POST["nome_foto"]){
                $img = rightImg($_POST["nome_foto"], $tabelaPai."/files/");
                ?>
                <label>Imagem Atual</label>
                <br/>
                <div class="pnl-img-60">
                    <a class="img-on-in wrap-on" data-fancybox="gallery" href="<?=$img["nl"]?>" style="background-image: url(<?=$img["nl"]?>);" title="<?=$_POST["titulo"]?>"></a>
                </div>
                <br />
                <label><input type="checkbox" name="del_img" value="1"/>&nbsp;Remover</label>
                <?
            } ?>
        </div>
    <? } ?>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?=$url_prev?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>