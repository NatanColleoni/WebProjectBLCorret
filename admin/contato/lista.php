<?
$apaga = $obj->apagar("excluir");

$id = dr($_GET["id"]);

$consulta = fetch_all($obj->consulta("", "ORDER BY id DESC"));

$url_csv = $pathSite . "admin/contato/csv.php";
?>

<div class="pnl-hd-title"><h4><?= $titulo ?></h4></div>
<form class="table-responsive" method="POST" action="">
    <table class="table">
        <thead>
            <tr>
                <th width="3%">
                    <?
                    if(!empty($consulta)) {
                        echo "<input id='chk-all' type='checkbox' name='gt_all' value='' /></th>";
                    }
                    ?>
                </th>
                <th class="text-center-f text-capitalize" width="30%">Nome</th>
                <th width="67%">Detalhes</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if($consulta) {
                foreach($consulta as $campo) {
                    $url_info = $pathSite."admin/".$tabela."/form/".cr($campo["id"])."/".arruma_string($campo["titulo"]);
                    ?>
                    <tr class="sort bg-line-zebra text-center <?=$campo["data_leitura"] ? "" : "bg-nao-lida"?>" rel="<?= $campo["id"] ?>" height="30">
                        <td><input type="checkbox" class="chk-item" name="excluir[]" value="<?= $campo["id"] ?>"/></td>
                        <td class="text-left"><a href="<?= $url_info ?>"><?= $campo["nome"] ?></a></td>
                        <td><?= quebrar_texto($campo["mensagem"], 500) ?></td>
                    </tr>
                    <?
                }
            }
            ?>
        </tbody>
    </table>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <?
        if(!empty($consulta)) {
            if($id == 999) {
                ?>
                <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-100" href="<?= $url_csv ?>" target="_blank">Gerar CSV</a>
            <? }
            ?>
            <input class="pz-btn-shadow op-live-2d bg-danger text-danger flt-r f-bold sm-wd-100" type="submit" value="Excluir">
        <? }
        ?>
    </div>
</form>