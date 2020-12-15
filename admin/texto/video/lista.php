<?
$apaga = $obj->apagar("excluir");
$objMeta = new Base("metatags");

$fk = dr($_GET["pg"]);

if(empty($fk)){
    echo "<div class='alert alert-danger text-center fBold'>Utilize o painel corretamente...</div>";
    die();
}

$consulta = fetch_all($obj->consulta("WHERE {$tabelaPai}_fk='$fk'", "ORDER BY ordem ASC, data_cadastro DESC, id DESC")); 
$pai = $obj_pai->consultaId($fk);

$titulo .= " - " . $pai["titulo"];

$url_prev = $pathSite."admin/{$tabelaPai}/".cr($pai["page_fk"])."/lista";
$url_add = $pathSite."admin/{$tabelaPai}/video/form/".cr($fk)."/adicionar";
?>

<div class="pnl-hd-title">
    <h4><?=$titulo?>
        <small> - <a class="text-info" href="<?=$url_add?>">Adicionar</a></small>
    </h4>
</div>
<form class="table-responsive" method="POST" action="">
    <table class="table">
        <thead>
            <tr class="text-center-f">
                <th width="3%">
                    <?
                    if($consulta) {
                        echo "<input id='chk-all' type='checkbox' name='gt_all' value='' /></th>";
                    } ?>
                </th>
                <th width="87%" class="text-left">T�tulo</th>
                <th width="10%">V�deo</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if(!empty($consulta)) {
                foreach ($consulta as $campo) {
                    $url_info = $pathSite."admin/".$tabelaPai."/video/form/".cr($fk)."/".cr($campo["id"])."/".arruma_string($campo["titulo"]);
                    $campo["descricao"] = quebrar_texto($campo["descricao"], 200);
                    ?>
                    <tr id="targ-i-<?=$campo["id"]?>" class="sort bg-line-zebra text-center" rel="<?=$campo["id"]?>" height="30">
                        <td><input type="checkbox" class="chk-item" name="excluir[]" value="<?= $campo["id"] ?>" /></td>
                        <td class="text-left"><a href="<?=$url_info?>"><?=$campo["titulo"]?></a></td>
                        <td><a class="dsp-in-block" href="<?=$url_info?>"><img src="http://i1.ytimg.com/vi/<?= ($campo["url"]) ?>/default.jpg" /></a></td>
                    </tr>
                    <?
                }
            }
            ?>
        </tbody>
    </table>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l" href="<?=$url_prev?>">Voltar</a>
        <? if(!empty($consulta)) {
            echo "<input class='pz-btn-shadow op-live-2d bg-danger text-danger flt-r f-bold sm-wd-100' type='submit' value='Excluir'>";
        } ?>
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
        $.post("<?=$pathSite."admin/".$tabelaPai."/video/ordenacao.php"?>", {lista: lista});
    }
</script>