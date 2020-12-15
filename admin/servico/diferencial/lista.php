
<?
//include("foto/limpaGaleria.php");
$apaga = $obj->apagar("excluir");

$ft_aux = "";
$count = 0;
//if ($_GET['id'] == 'destaque') {
//    $aux['destaque'] = $_GET['sub'];
//    $obj->importArray($aux);
//    $obj->persist(dr($_GET['pg']));
//}
if ($_POST["ft_title"]) {
    $ft_title = preg_replace("(\"|\')", "", $_POST["ft_title"]);
    $ft_aux .= "WHERE {$tabelaPai}FK = {$fk}";
    if (!empty($_POST["ft_title"])) {
        $ft_aux .= " AND {$tabela}.titulo LIKE '%{$ft_title}%'";
        $count++;
    }
//    if(!empty($_POST["ft_ctg"])) {
//        if($count > 0) { $ft_aux .= " AND "; }
//        $ft_aux .= " ctg.id = {$_POST['ft_ctg']} ";
//        $count++;
//    }
//    if(!empty($_POST["ft_tipo"])) {
//        if($count > 0) { $ft_aux .= " AND "; }
//        $ft_aux .= " tipo.id = {$_POST['ft_tipo']} ";
//        $count++;
//    }
} else {
    $ft_aux = "WHERE {$tabelaPai}FK = {$fk}";
}
$consulta = fetch_all($obj->consulta($ft_aux, "ORDER BY ordem, data_cadastro DESC"));
//$imovel_ctg = fetch_all($obj_ctg->consulta("", "ORDER BY titulo ASC"));
//$imovel_tipo = fetch_all($obj_tipo->consulta("", "ORDER BY titulo ASC"));
$url_prev = $pathSite . "admin/{$tabelaPai}/lista";
$url_add = $pathSite . "admin/{$tabelaPai}/diferencial/form/" . cr($fk);
?>
<style>
    .glyphicon{
        font-size: 2em;
    }
    .red{
        color: #ff0000;
    }
    .green{
        color: green;
    }
</style>
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
                    <div class="form-group col-xs-4">
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
                <!--<th width="27%" class="text-left">Título</th>-->
                <!--<th width="5%" align="center">Índice</th>-->
                <th width="90%" align="center">Texto</th>
                <!--<th width="10%" align="center">Data</th>-->
                <!--<th width="10%" align="center">Fotos</th>-->
                <th width="10%" align="center">Ícone</th>
                <!--<th width="10%" align="center">Destaque</th>-->
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if (!empty($consulta)) {
                $index = 0;
                foreach ($consulta as $campo) {
                    $index++;
                    $img = rightImg($campo["nomeFoto"], $tabelaPai . "/files/");
//                    if ($campo['destaque'] == 0) {
//                        $valor = 1;
//                        $icon = "glyphicon-remove red";
//                    } else {
//                        $valor = 0;
//                        $icon = "glyphicon-ok green";
//                    }
                    $url_info = $pathSite . "admin/{$tabelaPai}/diferencial/form/" . cr($fk) . "/" . cr($campo["id"]) . "/" . arruma_string($campo["titulo"]);
//                    $url_show = $pathSite . "admin/" . $tabela . "/destaque/" . cr($campo['id']) . "/" . $valor . "/" . arruma_string($campo['titulo']);
                    ?>
                    <tr id="tp-info-<?= $campo["id"] ?>" class="sort bg-line-zebra text-center" rel="<?= $campo["id"] ?>" height="50">
                        <td><input type="checkbox" class="chk-item" name="excluir[]" value="<?= $campo["id"] ?>"/></td>
                        <!--<td class="text-center"><a href="<?= $url_info ?>"><?= $index ?></a></td>-->
                        <td class="text-center"><a href="<?= $url_info ?>"><?= quebrar_texto($campo["texto"], 200) ?></a></td>
                        <td><a class="dsp-in-block" href="<?= $url_info ?>"><img width="80" alt="<?= $campo["titulo"] ?>" title="<?= $campo["titulo"] ?>" src="<?= $img["nl"] ?>" /></a></td>
                       <!--<td class="text-center"><a href="<?= $url_info ?>"><?= $categoria["titulo"] ?></a></td>-->
                    </tr> 
                    <?
                }
            }
            ?>
        </tbody>
    </table>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?= $url_prev ?>">Voltar</a>
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