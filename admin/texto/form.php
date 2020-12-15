<?
$id = dr($_GET["pg"]);

if(empty($id)){
    echo "<div class='alert alert-danger text-center fBold'>Nenhuma página encontrada...</div>";
    die();
}

$objMeta = new Base("metatags");
if ($_POST["enviar"]){
    $obj->required = array(
        "titulo" => "Título"
    );

    if ($_POST["del_img"] == 1) {
        $upload = $obj->upload();
        $upload->removeArquivo($id);
    }

    $_POST["nome_video"] = idYT($_POST["nome_video"]);

    $obj->importArray($_POST);
    $txtID = $obj->persist($id);
    $obj->mensagem();
}

$_POST = $obj->consultaId($id);
$grp = $objMeta->consultaId($_POST["page_fk"]);
/* Base on field 'config' of table 'texto' */
$i_ctrl  = explode("-", $_POST["ctrl"]);
$i_tit   = $i_ctrl[0];/* Title */
$i_sub   = $i_ctrl[1];/* Subtitle */
$i_txt   = $i_ctrl[2];/* text/description */
$i_img   = $i_ctrl[3];/* Photo/img */
$i_vid   = $i_ctrl[4];/* Video/vid */
$i_del   = $i_ctrl[5];/* btn Delete/add */
$i_btn_p = $i_ctrl[6];/* btn prev/back */
/* For more config, add on panel and get here */

/* Title */
$ipt_title = ($i_tit == 0) ? "hidden disabled" : "";
/* Subtitle */
$ipt_subtitle = ($i_sub == 0) ? "hidden disabled" : "";
/* description */
$ipt_desc = ($i_txt == 0) ? "hidden disabled" : "";
/* btn Prev */
$btn_prev = ($i_btn_p == 0) ? "hidden disabled" : "";

/* Disable tiny subtitle */
//$tiny_sub = (in_array($_POST["id"], $id_tiny_sub) || in_array($_POST["page_fk"], $pg_tiny_sub)) ? "" : "tiny-title";

$nm_subtitle = "Subtitulo";

$titulo.= ($_POST["rf_nm"]) ? " - ".$_POST["rf_nm"] : "";
$url_prev = $pathSite."admin/{$tabela}/".cr($grp["id"])."/".arruma_string($grp["rf_nm"]);

$sem_foto_id = array(4,5,7);
$sem_video_id = array(1,3,4,5,6,7);

if($id == 2) {
    $img_size = "1920px x 654px";
} else if($id == 3) {
    $img_size = "764px x 428px";
}

?>

<div class="pnl-hd-title"><h4><?=$titulo?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group" <?=$ipt_title?>>
        <label>Título</label>
        <input <?=$ipt_title?> class="form-control" placeholder="titulo" required name="titulo" type="text" <?=$limit_titulo ? "maxlength='{$limit_titulo}'" : "maxlength='255'"?> value="<?=$_POST["titulo"]?>">
    </div>
    <div class="form-group" <?=$ipt_subtitle?>>
        <label>Subtitulo</label>
        <textarea <?=$ipt_subtitle?> class="form-control" maxlength="45" placeholder="..." rows="2" name="subtitulo" <?=$limit_subtitulo ? "maxlength='{$limit_subtitulo}'" : ""?>><?=stripslashes($_POST["subtitulo"])?></textarea>
    </div>
    <div class="form-group" <?=$ipt_desc?>>
        <label>Texto</label>
        <textarea <?=$ipt_desc?> class="form-control tinymce <?=$limit_desc ? "limit" : ""?>" <?=$limit_desc ? "maxlength='{$limit_desc}'" : "" ?> placeholder="Descreva..." rows="6" name="descricao" ><?=stripslashes($_POST["descricao"])?></textarea>
    </div>
    
    <? if(!in_array($id, $sem_foto_id)) { ?>
		<?if($id <> 3) {?>
        <div class="form-group">
            <h6 class="h6">Tamanho recomendado de <span id="bn-size" class="text-info f-bold"><?=$img_size?></span></h6>
            <label>Foto</label>
            <input type="file" class="form-control" name="<?= $obj->campoNomeArquivo ?>"><br/><br/>
        </div>
	<?}?>
        <div class="form-group text-center">
            <? if($_POST["nome_foto"]) {
                $img = rightImg($_POST["nome_foto"], $tabela."/files/"); ?>
                <label>Imagem Atual</label>
                <br/>
                <div style="height: 100px; width: 80px;" class="pnl-img-1">
                    <a class="img-on-in wrap-on" data-fancybox="gallery" href="<?=$img["nl"]?>" style="background-image: url('<?=$img["sm"]?>');" title="<?=$_POST["titulo"]?>"></a>
                </div>
                <br/>
                <label><input type="checkbox" name="del_img" value="1"/>&nbsp;Remover</label>
            <? } ?>
        </div>
    <? } ?>

    <? if(!in_array($id, $sem_video_id)) { ?>
        <div class="form-group" <?=$ipt_video?>>
            <label>Vídeo</label><br />
            <strong style="padding-top: 8px; padding-right: 3px; width: 181px;"> https://www.youtube.com/watch?v=</strong><input <?=$ipt_video?> class="form-control" placeholder="ID do vídeo" name="nome_video" type="text" maxlength="255" style="width: calc(100% - 182px); display: inline-block;" value="<?= htmlentities($_POST["nome_video"]) ?>">
        </div>
        <? if($_POST["nome_video"]) { ?>
            <div class="form-group text-center" <?=$ipt_video?>>
                <label>Vídeo Atual</label><br />
                <div style="width: 120px; height: 90px;" class="pnl-img-1">
                    <a class="img-on-in wrap-on" href="https://www.youtube.com/watch?v=<?= ($_POST["nome_video"]) ?>" target="_blank" style="background-image: url('http://i1.ytimg.com/vi/<?= ($_POST["nome_video"]) ?>/default.jpg');" title="<?= $_POST["titulo"] ?>"></a>
                </div>
            </div>
        <? } ?>
    <? } ?>

    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a <?=$btn_prev?> class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?=$url_prev?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>