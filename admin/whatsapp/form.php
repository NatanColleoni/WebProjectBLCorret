<?
$id = dr($_GET["pg"]);

if ($_POST["enviar"]) {
    $obj->required = array(
        "titulo" => "Título"
    );

    $obj->importArray($_POST);
    $id = $obj->persist($id);
    $obj->mensagem();
}

$_POST = $obj->consultaId($id);

$titulo .= ($_POST["titulo"]) ? " - " . $_POST["titulo"] : "";
$url_prev = $pathSite . "admin/{$tabela}/lista";
?>

<div class="pnl-hd-title"><h4><?= $titulo ?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Título</label>
        <input class="form-control" placeholder="Título" required name="titulo" type="text" maxlength="255" value="<?= htmlentities($_POST["titulo"]) ?>" />
    </div>
    <div class="form-group" <?= $ipt_local ?>>
        <label>Responsável</label>
        <input class="form-control" placeholder="Responsável..." name="responsavel" type="text" maxlength="255" value="<?= $_POST["responsavel"] ?>">
    </div>
    <div class="form-group" <?= $ipt_fone ?>>
        <label>Telefone</label>
        <input class="form-control" placeholder="DDD + Número" required name="fone" type="tel" maxlength="255" value="<?= $_POST["fone"] ?>">
    </div>

    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?= $url_prev ?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>
