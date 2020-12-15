<?
$consulta = fetch_all($obj->consulta());

$url_add = $pathSite."admin/{$tabela}/form/adicionar";
?>

<div class="pnl-hd-title"><h4><?=$titulo?></h4></div>
<form class="table-responsive col-xs-12 pdg-0" method="POST" action="" enctype="multipart/form-data">
    <table class="table">
        <thead>
            <tr class="text-center">
                <th class="text-left-f">Titulo</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if(!empty($consulta)) {
                foreach($consulta as $campo) {
                    $url_info = $pathSite."admin/{$tabela}/form/".cr($campo["id"])."/".arruma_string($campo["rf_nm"]);
                    ?>
                    <tr class="sort bg-line-zebra" rel="<?=$campo["id"]?>" height="60">
                        <td><a href="<?=$url_info?>"><?=$campo["titulo"]?></a></td>
                    </tr>
                <?
                }
            }
            ?>
        </tbody>
    </table>
    <br />
</form>