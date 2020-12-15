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

$titulo.= " - ".$pai["titulo"];
$titulo.= ($_POST["titulo"])? " - ".$_POST["titulo"] : "";
$url_prev = $pathSite."admin/{$tabelaPai}/topico/".cr($fk)."/".arruma_string($pai["titulo"]);
?>

<div class="pnl-hd-title"><h4><?=$titulo?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Título</label>
        <input class="form-control" placeholder="..." required name="titulo" type="text" maxlength="255" value="<?=$_POST["titulo"]?>" autofocus>
    </div>

    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?=$url_prev?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>