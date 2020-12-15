<?
$id = dr($_GET["pg"]);

if ($_POST) {
    if ($_POST["enviar"]) {
        $obj->required = array(
            "nome" => "Nome"
        );

        $_POST["facebook"] = url($_POST["facebook"]);
        $_POST["instagram"] = url($_POST["instagram"]);

        $obj->importArray($_POST);
        $id_new = $obj->persist($id);
        $obj->mensagem();
    }
}

$_POST = $obj->consultaId($id);
$cidade = fetch_all($obj_cidade->consultaSelect("id, titulo, (SELECT uf FROM estado WHERE estado.id = cidade.estado_fk) AS estado", "", "ORDER BY titulo ASC"));

$titulo .= ($_POST["titulo"]) ? " - " . $_POST["titulo"] : "";

$url_prev = $pathSite . "admin/{$tabela}/lista";
?>

<div class="pnl-hd-title"><h4><?= $titulo ?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">
    <div class="col-xs-12 pdg-0 form-group">
        <label>Cidade</label>
        <select required name="cidade_fk" class="form-control">
            <option value="">Selecione...</option>
            <?
            if (!empty($cidade)) {
                foreach ($cidade as $item) {
                    $selected = ($item["id"] == $_POST["cidade_fk"]) ? "selected" : "";
                    echo "<option {$selected} value='{$item["id"]}'>{$item["titulo"]} - {$item["estado"]}</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="col-xs-12 pdg-0 form-group">
        <label class="titulo">Nome</label>
        <input class="form-control" placeholder="Nome" required name="nome" type="text" maxlength="255" value="<?= htmlentities($_POST["nome"]) ?>" />
    </div>
    <div class="col-xs-12 pdg-0 form-group">
        <label class="titulo">Endereço</label>
        <input class="form-control" placeholder="Endereço" required name="endereco" type="text" maxlength="255" value="<?= htmlentities($_POST["endereco"]) ?>" />
    </div>
    <div class="col-xs-12 pdg-0 form-group">
        <label class="titulo">Número</label>
        <input class="form-control" placeholder="Número" required name="numero" type="text" maxlength="255" value="<?= htmlentities($_POST["numero"]) ?>" />
    </div>
    <div class="col-xs-12 pdg-0 form-group">
        <label class="titulo">Complemento</label>
        <input class="form-control" placeholder="Complemento" name="complemento" type="text" maxlength="255" value="<?= htmlentities($_POST["complemento"]) ?>" />
    </div>
    <div class="col-xs-12 pdg-0 form-group">
        <label class="titulo">Bairro</label>
        <input class="form-control" placeholder="Bairro" required name="bairro" type="text" maxlength="255" value="<?= htmlentities($_POST["bairro"]) ?>" />
    </div>
    <div class="col-xs-12 pdg-0 form-group">
        <label class="titulo">Nome</label>
        <input class="form-control cep" placeholder="CEP" required name="cep" type="text" maxlength="255" value="<?= $_POST["cep"] ?>" />
    </div>

    <div class="col-xs-12 pdg-0 form-group">
        <label>WhatsApp</label>
        <input class="form-control fone-cel" placeholder="Link para a mídia social" name="whatsapp" value="<?=$_POST["whatsapp"]?>">
    </div>
    <div class="col-xs-12 pdg-0 form-group">
        <label>Facebook</label>
        <input class="form-control" placeholder="Link para a mídia social" name="facebook" value="<?=$_POST["facebook"]?>">
    </div>
    <div class="col-xs-12 pdg-0 form-group">
        <label>Instagram</label>
        <input class="form-control" placeholder="Link para a mídia social" name="instagram" value="<?=$_POST["instagram"]?>">
    </div>

    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?= $url_prev ?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>
