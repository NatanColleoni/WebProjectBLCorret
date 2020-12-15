<?
$id = dr($_GET["pg"]);

if ($_POST["enviar"]) {
    $obj->required = array(
        "titulo" => "Título"
    );

    if($_POST["del_img"] == 1){
        $upload = $obj->upload();
        $upload->removeArquivo($id);
    }

    $obj->importArray($_POST);
    $id_new = $obj->persist($id);
    $obj->mensagem();
}

$_POST = $obj->consultaId($id);

$titulo .= ($_POST["titulo"]) ? " - " . $_POST["titulo"] : "";

$url_prev = $pathSite . "admin/{$tabela}/lista";
?>

<div class="pnl-hd-title"><h4><?= $titulo ?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">
    <div class="col-xs-12 form-group">
        <label class="titulo">Título</label>
        <input class="form-control" placeholder="Título" required name="titulo" type="text" maxlength="255" value="<?= htmlentities($_POST["titulo"]) ?>" />
    </div>
	<div class="col-xs-12 form-group">
        <label class="titulo">Link</label>
        <input class="form-control" placeholder="Link"  name="link" type="text" maxlength="255" value="<?= htmlentities($_POST["link"]) ?>" />
    </div>

    <div class="col-xs-12 form-group">
        <label class="titulo">Descrição</label>
        <textarea class="form-control tinymce" placeholder="Descreva..." rows="6" name="descricao" ><?=stripslashes($_POST["descricao"])?></textarea>
    </div>

    <div class="col-xs-12 form-group">
        <h6 class="h6">Tamanho recomendado de <span id="bn-size" class="text-info f-bold"><?=$img_size?></span></h6>
        <label>Foto Capa</label>
        <input type="file" class="form-control" name="<?=$campoNomeArquivo?>"><br/><br/>
    </div>
    <div class="col-xs-12 form-group text-center">
        <? if($_POST["nome_foto"]) {
            $img = rightImg($_POST["nome_foto"], $tabela."/files/"); ?>
            <label>Imagem Atual</label>
            <br/>
            <div style="height: 100px; width: 80px;" class="pnl-img-1">
                <a class="img-on-in wrap-on" data-fancybox="gallery" href="<?=$img["nl"]?>" style="background-image: url('<?=$img["sm"]?>');" title="<?=$_POST["titulo"]?>"></a>
            </div>
            <br/>
            <label><input type="checkbox" name="del_img_2" value="1"/>&nbsp;Remover</label>
        <? } ?>
    </div>

    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?= $url_prev ?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>
