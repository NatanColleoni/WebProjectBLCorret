<?
$apaga = $obj->apagar("excluir");

$consulta = fetch_all($obj->consulta());

$url_add = $pathSite . "admin/{$tabela}/form/adicionar";
?>

<div class="pnl-hd-title">
    <h4><?= $titulo ?>
        <small> - <a class="text-info" href="<?= $url_add ?>">Adicionar</a></small>
    </h4>
</div>
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
                <th class="text-left-f" width="40%">Nome</th>
                <th width="57%">E-mail</th>
            </tr>
        </thead>
        <tbody id="sortable">
        <tbody>
            <?
            if(!empty($consulta)) {
                foreach($consulta as $campo) {
                    $url_info = $pathSite . "admin/" . $tabela . "/form/" . cr($campo["id"]) . "/" . arruma_string($campo["nome"]);
                    ?>
                    <tr id="tp-info-<?= $campo["id"] ?>" class="sort bg-line-zebra text-center" rel="<?= $campo["id"] ?>" height="50">
                        <td><input type="checkbox" class="chk-item" name="excluir[]" value="<?= $campo["id"] ?>"/></td>
                        <td class="text-left"><a href="<?= $url_info ?>"><?= $campo["nome"] ?></a></td>
                        <td><a href="<?= $url_info ?>"><?= $campo["email"] ?></a></td>
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