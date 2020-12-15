<?
$id = dr($_GET["pg"]);
if($id) {
    if($_POST["enviar"]) {
        $obj->required = array(
            "titulo" => "Titulo"
        );
        $_POST["codigo"] = str_replace("'",'"',$_POST["codigo"]);
        $obj->importArray($_POST);
        $obj->persist($id);
        $obj->mensagem();
    }
    $_POST = $obj->consultaId($id);
} else {
    echo "<div class='alert alert-danger text-center fBold'>Utilize o painel corretamente...</div>";
    die();
}
$titulo.= ($_POST["rf_nm"]) ? " - ".$_POST["rf_nm"] : "";

$url_prev = $pathSite."admin/{$tabela}/lista";
?>

<div class="pnl-hd-title"><h4><?=$titulo?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group" <?=$ipt_title?>>
        <label>Título</label>
        <input <?=$ipt_title?> class="form-control" placeholder="titulo" required name="titulo" type="text" maxlength="255" value="<?=$_POST["titulo"]?>">
    </div>
    <div class="form-group" <?=$ipt_code?>>
        <label>Código</label>
        <textarea <?=$ipt_code?> class="form-control" rows="10" placeholder="Insira o Código..." name="codigo"><?=$_POST["codigo"]?></textarea>
    </div>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a <?=$btn_prev?> class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?=$url_prev?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>