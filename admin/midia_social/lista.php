<?
$apaga = $obj->apagar("excluir");
$consulta = fetch_all($obj->consultaSelect("midia_social.id, "
        . "midia_social.titulo, "
        . "midia_social.url ",
        "",
        "ORDER BY midia_social.ordem ASC, midia_social.data_cadastro DESC, midia_social.id DESC"));

$url_add = $pathSite."admin/{$tabela}/form/adicionar";
?>

<div class="pnl-hd-title">
    <h4><?=$titulo?>
        <!--<small> - <a class="text-info" href="<?//=$url_add?>">Adicionar</a></small>-->
    </h4>
</div>
<form class="table-responsive" method="POST" action="">    
    <table class="table">
        <thead>
            <tr>
                <th width="3%"></th>
                <th class="text-left-f" width="30%">Titulo</th>
                <th width="37%">URL</th>
            </tr>
        </thead>
        <tbody id="sortable">
        <?
        if($consulta){
            foreach($consulta as $campo){
                $url_info = $pathSite."admin/".$tabela."/form/".cr($campo["id"])."/".arruma_string($campo["titulo"]);
                ?>
                <tr class="sort bg-line-zebra text-center" rel="<?= $campo["id"]?>" height="30">
                    <td><input type='checkbox' name='excluir[]' value='<?=$campo["id"]?>'/></td>
                    <td class="text-left f-bold"><a href="<?=$url_info?>"><?=$campo["titulo"]?></a></td>
                    <td><a href="<?=$campo["url"]?>" target="_blank"><?=$campo["url"]?></a></td>
                </tr>
                <?
            }
        }
        ?>
        </tbody>
    </table>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <!--<input class="pz-btn-shadow op-live-2d bg-danger text-danger flt-r f-bold sm-wd-100" type="submit" value="Excluir">-->
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
    function ordena(lista){
        $.post("<?=$pathSite."admin/".$tabela."/ordenacao.php"?>", {lista: lista});
    }
</script>