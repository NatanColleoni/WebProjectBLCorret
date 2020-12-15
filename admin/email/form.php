<?
$id = dr($_GET["pg"]);

if ($_POST["enviar"]) {
    $obj->required = array(
        "nome" => "Nome"
    );

    $obj->importArray($_POST);
    $id = $obj->persist($id);

    $email_rf_id = $_POST["email_rf_ctg"];
    $_POST["email_fk"] = $id;
    $_POST["email_ctg_fk"] = $_POST["email_ctg_fk"];
    $obj_rf_ctg->importArray($_POST);
    $email_rf_id = $obj_rf_ctg->persist($email_rf_id);

    $array = array();
    if($_POST["emails"]) {
        foreach($_POST["emails"] as $email) {
            $email_ul .= $email.",";
        }
        $email_ul = substr($email_ul, 0, -1);
        $_POST["email"] = $email_ul;
        $obj->importArray($_POST);
        $id = $obj->persist($id);
    }
}
$_POST = $obj->consultaId($id);
if($id) {
    $email_rf = mysql_fetch_assoc($obj_rf_ctg->consulta("WHERE email_fk = ".$id));
    $email_rf_id = $email_rf["id"];
}

if($_POST["email"]) {
    $emails = explode(",", $_POST["email"]);
    foreach($emails as $load) {
        $email_load .= '<li data-value="'.$load.'">'.$load.'<li>';
    }
}

$categorias = fetch_all($obj_ctg->consulta());

$titulo .= ($_POST["nome"]) ? " - " . $_POST["nome"] : "";
$url_prev = $pathSite . "admin/{$tabela}/lista";
?>

<div class="pnl-hd-title bg-opc-01"><h4><?= $titulo ?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">        
    <div class="form-group">
        <label>Nome</label>
        <input class="form-control" placeholder="Nome" required name="nome" type="text" maxlength="255" value="<?= $_POST["nome"] ?>">
    </div>
    <div class="form-group">
        <label>E-mail</label>
        <ul id="email" name="emails[]"><?= $email_load ?></ul>
    </div>

    <input type="hidden" name="email_rf_ctg" value="<?= $email_rf_id ?>">
    <div class="form-group">
        <label>Categoria</label>
        <select required name="email_ctg_fk" class="form-control">
            <option value="">Selecione...</option>
            <?
            if (!empty($categorias)) {
                foreach ($categorias as $item) {
                    $selected = ($item["id"] == $email_rf["email_ctg_fk"]) ? "selected" : "";
                    echo "<option {$selected} value='{$item["id"]}'>{$item["titulo"]}</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?= $url_prev ?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>

<script>
    $(function(){
        var sampleTags = [];
        $(document).ready(function () {
            $("#email").tagit({
                tagSource: sampleTags,
                allowNewTags: true,
                triggerKeys: ["enter", "comma", "space", "tab"],
                select: true,
                sortable: true
            });
        });
    });
</script>