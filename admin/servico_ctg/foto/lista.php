<?
$apaga = $obj->apagar("excluir");
$objMeta = new Base("metatags");

$fk = dr($_GET["pg"]);

if(!empty($fk)){
    $consulta = fetch_all($obj->consulta("WHERE {$tabelaPai}FK='$fk'", "ORDER BY ordem ASC"));
    $grp = $objMeta->consultaId($fk);
} else {
    echo "<div class='alert alert-danger text-center fBold'>Utilize o painel corretamente...</div>";
    die();
}

$pai = $objPai->consultaId($fk);

$titulo .= " - ".$pai["titulo"];

$url_prev = $pathSite."admin/{$tabelaPai}/lista";
$url_add = $pathSite."admin/{$tabelaPai}/foto/form/".cr($fk)."/adicionar";
?>

<div class="pnl-hd-title bg-opc-01">
    <h4><?=$titulo?>
        <small> - <a class="text-info" href="<?=$url_add?>">Adicionar</a></small>
    </h4>
</div>
<form class="table-responsive" method="POST" action="">
    <table class="table">
        <thead>
            <tr class="cabecalho text-center">
                <th width="3%">
                    <?
                    if($consulta > 0){
                        echo "<input id='chk-all' type='checkbox' name='gt_all' value='' /></th>";
                    } ?>
                </th>
                <th width="30%">Imagem</th>
                <th class="text-left" width="67%">Comentário</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if(!empty($consulta)){
                foreach($consulta as $campo){
                    $cp_link=$pathSite."admin/".$tabelaPai."/foto/form/".cr($fk)."/".cr($campo["id"])."/".arruma_string($campo["descricao"]);
                    $img=rightImg($campo["nomeFoto"], $tabelaPai."/files/");
                    ?>
                    <tr class="sort bg-line-zebra" rel="<?=$campo["id"]?>" title="<?=$campo["descricao"]?>" height="30">
                        <td><input type="checkbox" class="chk-item" name="excluir[]" value="<?= $campo["id"] ?>" /></td>
                        <td><a class="pnl-img-2" href="<?=$cp_link?>"><div class="img-on-in wrap-on" style="background-image: url(<?=$img["sm"]?>)" title="<?=$campo["descricao"]?>"></div></a></td>
                        <td><a href="<?=$cp_link?>"><?=$campo["descricao"]?></a></td>
                    </tr>
                    <?
                }
            }
            ?>
        </tbody>
    </table>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l" href="<?=$url_prev?>">Voltar</a>
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
        $.post("<?=$pathSite."admin/".$tabelaPai."/foto/ordenacao.php"?>", {lista: lista});
    }
</script>