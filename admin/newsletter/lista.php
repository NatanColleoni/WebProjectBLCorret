<?
$apaga = $obj->apagar("excluir");

$id = dr($_GET["id"]);

$consulta = fetch_all($obj->consulta("", "ORDER BY id DESC"));

/* Esse campo define tanto um nome quanto uma posição em array... */
$rf_nm_tb = ($id == 1) ? "nome" : "email";

if($rf_nm_tb == "nome") {
    $url_csv = $pathSite . "admin/newsletter/csv_nome.php";
} else {
    $url_csv = $pathSite . "admin/newsletter/csv.php";
}

?>

<div class="pnl-hd-title"><h4><?= $titulo ?></h4></div>
<form class="table-responsive" method="POST" action="">
    <table class="table">
        <thead>
            <tr>
                <th width="3%">
                    <?
                    if (!empty($consulta)) {
                        echo "<input id='chk-all' type='checkbox' name='gt_all' value='' /></th>";
                    }
                    ?>
                </th>
                <th class="text-center-f text-capitalize" width="<?= ($id == 1) ? '47%' : '97%' ?>"><?= $rf_nm_tb ?></th>
                <? if ($id == 1) { ?>
                    <th class="text-center-f text-capitalize" width="50%">e-mail</th>
                <? } ?>
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if ($consulta) {
                foreach ($consulta as $campo) {
                    ?>
                    <tr class="sort bg-line-zebra text-center" rel="<?= $campo["id"] ?>" height="30">
                        <td><input type="checkbox" class="chk-item" name="excluir[]" value="<?= $campo["id"] ?>" /></td>
                        <? if ($id == 1) { ?>
                            <td><?= $campo["nome"] ?></td>
                        <? } ?>
                        <td><?= $campo["email"] ?></td>
                    </tr>
                    <?
                }
            }
            ?>
        </tbody>
    </table>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <?
        if (!empty($consulta)) { ?>
            <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-100" href="<?= $url_csv ?>" target="_blank">Gerar CSV</a>
            <input class="pz-btn-shadow op-live-2d bg-danger text-danger flt-r f-bold sm-wd-100" type="submit" value="Excluir">
        <? } ?>
    </div>
</form>