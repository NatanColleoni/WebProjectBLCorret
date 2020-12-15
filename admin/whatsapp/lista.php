<?
$apaga = $obj->apagar("excluir");

$ft_aux = "";
if ($_POST["ft_title"]) {
    $ft_title = preg_replace("(\"|\')", "", $_POST["ft_title"]);
    $ft_aux .= "WHERE ";
    if (!empty($_POST["ft_title"])) {
        $ft_aux .= " whatsapp.titulo LIKE '%{$ft_title}%' OR whatsapp.responsavel LIKE '%{$ft_title}%' OR whatsapp.fone LIKE '%{$ft_title}%' ";
        $count++;
    }
}

$consulta = fetch_all($obj->consultaSelect("whatsapp.id, "
        . "whatsapp.titulo, "
        . "whatsapp.responsavel, "
        . "whatsapp.fone ",
        "$ft_aux",
        "ORDER BY whatsapp.ordem ASC, whatsapp.data_cadastro DESC, whatsapp.id DESC"));

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
                    <div class="form-group col-xs-7">
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
                <th width="37%" class="text-left">Título</th>
                <th width="45%" class="text-left">Responsável</th>
                <th width="15%" class="text-left">Número</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if (!empty($consulta)) {
                foreach ($consulta as $campo) {
                    $url_info = $pathSite . "admin/{$tabela}/form/" . cr($campo["id"]) . "/" . arruma_string($campo["titulo"]);
                    ?>
                    <tr id="tp-info-<?= $campo["id"] ?>" class="sort bg-line-zebra text-center" rel="<?= $campo["id"] ?>" height="50">
                        <td><input type="checkbox" class="chk-item" name="excluir[]" value="<?= $campo["id"] ?>"/></td>
                        <td class="text-left" ><a href="<?= $url_info ?>"><?= $campo["titulo"] ?></a></td>
                        <td class="text-left" ><a href="<?= $url_info ?>"><?= $campo["responsavel"] ?></a></td>
                        <td class="text-left" ><a href="<?= $url_info ?>"><?= $campo["fone"] ?></a></td>
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
        $.post("<?= $pathSite . "admin/" . $tabela . "/ordenacao.php" ?>", {lista: lista});
    }
    $("#pnl-searh").change(function () {
        $("#pnl-form").submit();
    });
</script>