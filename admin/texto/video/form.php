<?
$fk = dr($_GET["sub"]);
$id = dr($_GET["aux1"]);

if ($_POST["enviar"]) {
    $obj->required = array(
        "titulo" => "Título"
    );
    $_POST[$tabelaPai."_fk"] = $fk;
    $_POST["url"] = idYT($_POST["url"]);

    $obj->importArray($_POST);
    $obj->persist($id);
    $obj->mensagem();
}
$_POST = $obj->consultaId($id);

$pai = $obj_pai->consultaId($fk);

$titulo .= ($pai["titulo"]) ? " - " . $pai["titulo"] : "";
$titulo .= ($_POST["titulo"]) ? " - " . $_POST["titulo"] : "";
$url_prev = $pathSite . "admin/{$tabelaPai}/video/" . cr($fk) . "/" . arruma_string($pai["titulo"]);
?>

<div class="pnl-hd-title"><h4><?= $titulo ?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <strong>Título</strong><br/>
        <input class="form-control" type="text" placeholder="Título" name="titulo" maxlength="255" value="<?= $_POST["titulo"] ?>" />
    </div>

    <div class="form-group">
        <strong>ID do Vídeo:</strong><br />
        <strong style="float: left; padding-top: 8px; padding-right: 3px;"> https://www.youtube.com/watch?v=</strong><input type="text" class="form-control" placeholder="ID do Vídeo" name="url" maxlength="255" style="float: left; width: 80%" value="<?= $_POST["url"] ?>" />
    </div>

    <? if($_POST["url"]) { ?>
        <div class="form-group" style="display: inline-block; width: 100%; text-align: center;">
            <br /><label>Vídeo Atual</label><br />
            <div style="width: 120px; height: 90px;" class="pnl-img-1">
                <a class="img-on-in wrap-on" data-fancybox="gallery" href="https://www.youtube.com/watch?v=<?= ($_POST["url"]) ?>" style="background-image: url('http://i1.ytimg.com/vi/<?= ($_POST["url"]) ?>/default.jpg');" title="<?= $_POST["titulo"] ?>"></a>
            </div>
        </div>
    <? } ?>

    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?= $url_prev ?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar" />
    </div>
</form>