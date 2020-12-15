<?
$campoFormulario = "excluir";
$apaga = $obj->apagar($campoFormulario);

$consulta = fetch_all($obj->consulta("WHERE excluido = 0","ORDER BY ordem ASC"));
$url_add = $pathSite."admin/{$tabela}/form/adicionar";
?>

<div class="pnl-hd-title">
    <h4><?=$titulo?>
        <!--<small> - <a class='text-info' href='<?=$url_add?>'>Adicionar</a></small>-->
    </h4>
</div>
<form class="table-responsive col-xs-12 pdg-0" method="POST" action="" enctype="multipart/form-data">
    <table class="table">
        <thead>
            <tr class="text-center">
                <th width="25%" class="text-left-f">Página</th>
                <th width="25%">Titulo</th>
                <th width="40%">Descrição</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if(!empty($consulta)){
                foreach($consulta as $campo){
                    $url_info = $pathSite . "admin/".$tabela."/form/".cr($campo["id"])."/".arruma_string($campo["titulo"]);
                    ?>
                    <tr class="sort bg-line-zebra text-center" rel="<?=$campo["id"]?>" height="50">
                        <td class="text-left-f"><a href="<?=$url_info?>"><?=$campo["rf_nm"]?></a></td>
                        <td><a href="<?=$url_info?>"><?=$campo["titulo"]?></a></td>
                        <td><a href="<?=$url_info?>"><?=$campo['descricao']?></a></td>
                    </tr>
                <?
                }
            }
            ?>
        </tbody>
    </table>
    <br />
</form>
<?
/*
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
        $.post("<?=$pathSite."admin/".$tabela."/ordenacao.php"?>", {lista: lista});
    }
</script>
*/
?>

<script type="text/javascript">
    $(".ib-icon-body").click(function() {
        var id_destaque = $(this).data("id-destaque");
        var destaque = $(this).data("destaque");
        var erroVerificacao = 0;
        $.ajax({
            type: "POST",
            url: "<?= $pathSite ?>admin/verifica_destaque.php",
            async: false,
            data:{id_destaque: id_destaque, quantidade: 0, tabela: "metatags", campo: "mostrar"}
        })
        .done(function(retorno) {
            if(retorno === "erro") {
                erroVerificacao = 1;
                Swal.fire({
                    title: "Ops!",
                    text: "Ocorreu um erro!",
                    type: "error"
                });
            }
        });

        if(erroVerificacao == 0) {
            if(destaque == 1) {
                $(".ib-icon-body.id-"+id_destaque).removeClass("aprovado");
                $(".ib-icon-body.id-"+id_destaque).addClass("rejeitado");
                $(".ib-icon-body.id-"+id_destaque).html("<span class='ib-icon glyphicon glyphicon-remove'></span>");
                $(this).data("destaque", "0");
            } else {
                $(".ib-icon-body.id-"+id_destaque).removeClass("rejeitado");
                $(".ib-icon-body.id-"+id_destaque).addClass("aprovado");
                $(".ib-icon-body.id-"+id_destaque).html("<span class='ib-icon glyphicon glyphicon-ok'></span>");
                $(this).data("destaque", "1");
            }
        }
    });
</script>
