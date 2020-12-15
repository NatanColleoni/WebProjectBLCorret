<?
$apaga = $obj->apagar("excluir");

$ft_aux = "";
if ($_POST["ft_title"]) {
    $ft_title = preg_replace("(\"|\')", "", $_POST["ft_title"]);
    $ft_aux .= "WHERE ";
    if (!empty($_POST["ft_title"])) {
        $ft_aux .= " noticia.titulo LIKE '%{$ft_title}%' ";
    }
}

$consulta = fetch_all($obj->consultaSelect("noticia.id, "
        . "noticia.titulo, "
        . "noticia.nome_foto ",
        "$ft_aux",
        ""));

$url_add = $pathSite . "admin/{$tabela}/form/adicionar";
?>

<div class="pnl-hd-title">
    <h4> <?= $titulo ?>
        <small> - <a class="text-info" href="<?= $url_add ?>/">Adicionar</a></small>
    </h4>
</div>
<form id="pnl-form" class="form-info" method="POST" action="">
    <table class="table">
        <thead>
            <tr>
                <td class="bg-off sdw-off dsp-middle"colspan="100">
                    <div class="form-group col-xs-10">
                        <input class="form-control" type="text" name="ft_title" value="<?= $_POST["ft_title"] ?>" placeholder="Digite o que procura..." />
                    </div>
                    <div class="form-group col-xs-2">
                        <button class="glyphicon glyphicon-search col-xs-12 pz-btn-shadow c-1 op-live-2d bg-opc-01 rad-10" type="submit" name="go_search" value="Pesquisar"></button>
                    </div>
                </td>
            </tr>
            <tr class="text-center-f">
                <th width="3%">
                    <?
                    if (!empty($consulta)) {
                        echo "<input id='chk-all' type='checkbox' name='gt_all' value='' /></th>";
                    }
                    ?>
                </th>
                <th width="77%" class="text-left">Título</th>
                <th width="10%" class="text-left">Capa</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if (!empty($consulta)) {
                foreach ($consulta as $campo) {
                    $url_info = $pathSite . "admin/{$tabela}/form/" . cr($campo["id"]) . "/" . arruma_string($campo["titulo"]);
                    $img = rightImg($campo["nome_foto"], "blog/files/");
                    ?>
                    <tr id="tp-info-<?= $campo["id"] ?>" class="sort bg-line-zebra text-center" rel="<?= $campo["id"] ?>" height="50">
                        <td><input type="checkbox" class="chk-item" name="excluir[]" value="<?= $campo["id"] ?>"/></td>
                        <td class="text-left"><a href="<?= $url_info ?>"><?= $campo["titulo"] ?></a></td>
                        <td><a class="pnl-img-2" href="<?= $url_info ?>"><div class="img-on-in wrap-on" style="background-image: url('<?=$img["nl"]?>')" title="<?=$campo["titulo"]?>"></div></a></td>
                    </tr>
                    <?
                }
            }
            ?>
        </tbody>
    </table>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <input class="pz-btn-shadow op-live-2d bg-danger text-danger flt-r f-bold sm-wd-100" type="submit" value="Excluir">
    </div>
</form>
<script type="text/javascript">
    $("#sortable").sortable({
        items: ".sort", opacity: 0.5, update: function (event, ui) {
            var lista = [];
            $("#sortable .sort").each(function (cont, element) {
                lista.push($(element).attr("rel"));
            });
            ordena(lista);
        }
    });
    $("#sortable").disableSelection();
    function ordena(lista) {
        $.post("ordenacao.php" , {lista: lista});
    }
    $("#pnl-searh").change(function () {
        $("#pnl-form").submit();
    });
</script>