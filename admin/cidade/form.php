<?
$id = dr($_GET["pg"]);

if ($_POST["enviar"]) {
    $obj->required = array(
        "titulo" => "Título"
    );

    $obj->importArray($_POST);
    $id_new = $obj->persist($id);
    $obj->mensagem();
}

$_POST = $obj->consultaId($id);
$estado = fetch_all($obj_estado->consulta("", "ORDER BY titulo ASC"));

$titulo .= ($_POST["titulo"]) ? " - " . $_POST["titulo"] : "";

$url_prev = $pathSite . "admin/{$tabela}/lista";
?>

<div class="pnl-hd-title"><h4><?= $titulo ?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">
    <div class="col-xs-12 form-group">
        <label>Estado</label>
        <select required name="estado_fk" class="form-control">
            <option value="">Selecione...</option>
            <?
            if (!empty($estado)) {
                foreach ($estado as $item) {
                    $selected = ($item["id"] == $_POST["estado_fk"]) ? "selected" : "";
                    echo "<option {$selected} value='{$item["id"]}'>{$item["titulo"]}</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="col-xs-12 form-group">
        <label class="titulo">Nome</label>
        <input class="form-control" placeholder="Título" required name="titulo" type="text" maxlength="255" value="<?= htmlentities($_POST["titulo"]) ?>" />
    </div>

    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?= $url_prev ?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>
