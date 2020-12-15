<?
$id = dr($_GET["pg"]);

if ($_POST["enviar"]) {
    $obj->required = array(
        "titulo" => "Título"
    );

    if (($_POST["del_img"] == 1)) {
        $upload = $obj->upload();
        $upload->removeArquivo($id);
    }
    $obj->importArray($_POST);
    $id_new = $obj->persist($id);
    $obj->campoNomeArquivo = 'nomeFoto2';
    $obj->persist($id_new);
    $obj->mensagem();
}
//$objCategoria = new Base($tabela . "_ctg");
//$categorias = fetch_all($objCategoria->consulta("", "ORDER BY titulo"));
$_POST = $obj->consultaId($id);
$titulo .= ($_POST["titulo"]) ? " - " . $_POST["titulo"] : "";
//$objEstado = new Base("estado");
//$estado = fetch_all($objEstado->consulta("", "ORDER BY titulo ASC"));
$url_prev = $pathSite . "admin/{$tabela}/lista";
?>
<style>
    .third{
        width: 31.33%;
        margin: 0 1%;
        margin-bottom: 15px;
        float: left;
    }
</style>
<div class="pnl-hd-title"><h4><?= $titulo ?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">
    <!--
        <div class="col-xs-12 pdg-0 form-group">
            <label class="titulo">Categorias</label>
            <select class="form-control selectpicker" required title="Selecione a categoria" name="categoriaFK" data-size="8" data-live-search="true">
    <?
    foreach ($categorias as $grp) {
        $selected = ($grp["id"] == $_POST['categoriaFK']) ? "selected" : "";
        echo "<option {$selected} data-tokens='{$grp["titulo"]}' data-content='{$grp["titulo"]}' value='{$grp["id"]}'></option>";
    }
    ?>
            </select>
        </div>-->
    <div class="col-xs-12 pdg-0 form-group">
        <label class="descricao">Destaque</label>
        <select class="form-control" name="destaque">
            <option <?= (!$_POST['destaque']) ? "selected" : "" ?> value="0">Não</option>
            <option <?= ($_POST['destaque'] == 1) ? "selected" : '' ?> value="1">Sim</option>
        </select>
    </div>
    <div class="col-xs-12 pdg-0 form-group">
        <label class="titulo">Título</label>
        <input class="form-control" placeholder="Título" required name="titulo" type="text" maxlength="255" value="<?= $_POST["titulo"] ?>" />
    </div>


    <div class="col-xs-12 pdg-0 form-group">
        <label class="titulo">Texto 1</label>
        <textarea class="form-control tinymce" placeholder="Descreva..." rows="6" name="texto" ><?= stripslashes($_POST["texto"]) ?></textarea>
    </div>

    <div class="col-xs-12 pdg-0 form-group">
        <label class="descricao">Texto 2</label>
        <textarea class="form-control tinymce" placeholder="Descreva..." rows="6" name="texto2" ><?= stripslashes($_POST["texto2"]) ?></textarea>
    </div>

<!--    <div class="form-group">
        <label>Ícone</label>
        <br>
        **Dê preferência para ícones de formato .svg
        <input id="input-foto" type="file" class="form-control" name="nomeFoto2"><br/><br/>
    </div>
    <div class="form-group text-center">
        <?
        if ($_POST["nomeFoto2"]) {
            $img = rightImg($_POST["nomeFoto2"], $tabela . "/files/");
            ?>
            <label>Ícone Atual</label>
            <br/>
            <div class="pnl-img-1">
                <img src="<?= $img['nl'] ?>" width="100px">
                <a class="img-on-in wrap-on" data-fancybox="gallery" href="<?= $img["nl"] ?>" style="background-image: url(<?= $img["sm"] ?>);" title="<?= $_POST["titulo"] ?>"></a>
            </div>
            <br/>
            <?
            if ($pg_status == 1) {
                echo "<label><input type='checkbox' name='removerBanner' value='1'/>&nbsp;Remover</label>";
            }
        }
        ?>
    </div>-->
    <div class="form-group">
        <label>Imagem de fundo (DESTAQUE HOME)</label>
        <input id="input-foto" type="file" class="form-control" name="nomeFoto"><br/><br/>
    </div>
    <div class="form-group text-center">
        <?
        if ($_POST["nomeFoto"]) {
            $img = rightImg($_POST["nomeFoto"], $tabela . "/files/");
            ?>
            <label>Capa Atual</label>
            <br/>
            <div class="pnl-img-1">
                <a class="img-on-in wrap-on" data-fancybox="gallery" href="<?= $img["nl"] ?>" style="background-image: url(<?= $img["sm"] ?>);" title="<?= $_POST["titulo"] ?>"></a>
            </div>
            <br/>
            <?
            if ($pg_status == 1) {
                echo "<label><input type='checkbox' name='removerBanner' value='1'/>&nbsp;Remover</label>";
            }
        }
        ?>
    </div>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?= $url_prev ?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>
