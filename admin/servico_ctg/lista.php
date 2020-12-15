
<?
//include("foto/limpaGaleria.php");
$apaga = $obj->apagar("excluir");

$ft_aux = "";
$count = 0;
if ($_GET['id'] == 'destaque') {
    $aux['destaque'] = $_GET['sub'];
    $obj->importArray($aux);
    $obj->persist(dr($_GET['pg']));
}
if ($_POST["ft_title"]) {
    $ft_title = preg_replace("(\"|\')", "", $_POST["ft_title"]);
    $ft_aux .= "WHERE ";
    if (!empty($_POST["ft_title"])) {
        $ft_aux .= " {$tabela}.titulo LIKE '%{$ft_title}%'";
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
}
$consulta = fetch_all($obj->consulta($ft_aux, "ORDER BY destaque DESC, ordem, data_cadastro DESC"));
//$imovel_ctg = fetch_all($obj_ctg->consulta("", "ORDER BY titulo ASC"));
//$imovel_tipo = fetch_all($obj_tipo->consulta("", "ORDER BY titulo ASC"));

$url_add = $pathSite . "admin/{$tabela}/form/adicionar";
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
                <th width="27%" class="text-left">Título</th>
                <!--<th width="10%" align="center">Categoria</th>-->
                <!--<th width="10%" align="center">Data</th>-->
                <th width="10%" align="center">Fotos</th>
                <!--<th width="10%" align="center">Capa</th>-->
                <th width="10%" align="center">Destaque</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if (!empty($consulta)) {
                foreach ($consulta as $campo) {
                    if ($campo['destaque'] == 0) {
                        $valor = 1;
                        $icon = "glyphicon-remove red";
                    } else {
                        $valor = 0;
                        $icon = "glyphicon-ok green";
                    }
//                    $categoria = $obj_ctg->consultaId($campo['categoriaFK']);
//                    $img = rightImg($campo['nomeFoto'], $tabela . "/files/");
//                    $qtd_img = $obj_img->totalRegistros("WHERE {$tabela}FK =".$campo["id"]);
                    $url_info = $pathSite . "admin/{$tabela}/form/" . cr($campo["id"]) . "/" . arruma_string($campo["titulo"]);
                    $url_show = $pathSite . "admin/" . $tabela . "/destaque/" . cr($campo['id']) . "/" . $valor . "/" . arruma_string($campo['titulo']);
                    $url_img = $pathSite."admin/".$tabela."/foto/".cr($campo["id"])."/".arruma_string($campo["titulo"]);
                    ?>
                    <tr id="tp-info-<?= $campo["id"] ?>" class="sort bg-line-zebra text-center" rel="<?= $campo["id"] ?>" height="50">
                        <td><input type="checkbox" class="chk-item" name="excluir[]" value="<?= $campo["id"] ?>"/></td>
                        <td class="text-left"><a href="<?= $url_info ?>"><?= $campo["titulo"] ?></a></td>
<!--                        <td class="text-center"><a href="<?= $url_info ?>"><?= $categoria["titulo"] ?></a></td>
                        <td class="text-center"><a href="<?= $url_info ?>"><?= ($campo["data_cadastro2"]) ?></a></td>-->
                        <td class="text-center"><a href="<?= $url_img ?>">Fotos (<?= $qtd_img ?>)</a></td>
<!--                        <td>
                            <a class="pnl-img-2" href="<?= $url_info ?>">                
                                <div class="img-on-in wrap-on" style="background-image: url('<?= $img["sm"] ?>')" title="<?= $campo["titulo"] ?>"></div>
                            </a>
                        </td>-->
                        <td class="text-center">
                            <a href="<?= $url_show ?>">
                                <span class="glyphicon <?= $icon ?>"></span>
                            </a>
                        </td>
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