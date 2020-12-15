<?
$id = dr($_GET["pg"]);

if ($_POST["enviar"]){
    $obj->required = array(
        "titulo" => "Titulo"
    );
    $_POST["url"] = url($_POST["url"]);
    $_POST["class"] = arruma_string($_POST["titulo"]);
    $obj->importArray($_POST);
    $obj->persist($id);
    $obj->mensagem();
}

$_POST = $obj->consultaId($id);

$titulo.= ($_POST["titulo"])? " - ".$_POST["titulo"] : "";
$url_prev = $pathSite."admin/{$tabela}/lista";
?>

<div class="pnl-hd-title"><h4><?=$titulo?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Titulo</label>
        <input class="form-control" placeholder="Nome da Mídia Social" name="titulo" readonly value="<?=$_POST["titulo"]?>">
    </div>
    <div class="form-group">
        <label>Link</label>
        <input class="form-control" placeholder="Link para a mídia social" name="url" value="<?=$_POST["url"]?>">
    </div>

    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?=$url_prev?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>