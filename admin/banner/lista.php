<?
//if(count($obj->valores->excluir) > 0) {
//    $apaga = $obj->valores->excluir;
//    foreach($apaga as $linha) {
//        $obj->campoNomeArquivo = "nome_video";
//        $upload = $obj->upload();
//        $upload->removeArquivo($linha);
//        $obj->apagaId($linha);
//    }
//}

$apaga = $obj->apagar("excluir");

$id = dr($_GET["id"]);

$grp = $obj_page->consultaId($id);

$consulta = fetch_all($obj->consultaSelect("banner.id, "
        . "banner.titulo, "
        . "banner.nome_foto, "
        . "banner.nome_video, "
        . "banner.tipo_fk, "
        . "banner.target, "
        . "(SELECT titulo FROM banner_tipo WHERE id = banner.tipo_fk) AS tipo ",
        "WHERE page_fk=" . $id,
        "ORDER BY ordem ASC"));

$nm = $titulo;
$nm2 = ($grp["titulo"]) ? $grp["titulo"] : "";
$titulo = $nm2 . " - " . $nm;

$bn_ctrl = explode("-", $grp["banner"]);
$pg_tp = explode("/", $bn_ctrl[0]);
$pg_target = explode("/", $bn_ctrl[1]);
$pg_status = $bn_ctrl[2];
?>

<div class="pnl-hd-title">
    <h4><?= $titulo ?>
        <? if ($pg_status == 1) {
            echo " - <small><a class='text-info' href='{$pathSite}admin/{$tabela}/form/" . cr($id) . "/adicionar'>Adicionar</a></small>";
        } ?>
    </h4>
</div>

<form class="table-responsive col-xs-12 pdg-0" method="POST" action="" enctype="multipart/form-data">
    <table class="table">
        <thead>
            <tr class="text-center-f">
                <th width="3%"></th>
                <th width="33%">Título</th>
                <th width="33%">Banner</th>
                <th width="21%">Tela</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if (!empty($consulta)) {
                foreach ($consulta as $campo) {
                    $img = rightImg($campo["nome_foto"], $tabela."/files/");
                    $video_extensao = end(explode(".", $campo["nome_video"]));
                    ?>
                    <tr class="sort bg-line-zebra text-center" rel="<?= $campo["id"] ?>" height="40">
                        <td>
                            <?
                            $cp_link = $pathSite."admin/".$tabela."/form/".cr($id)."/".cr($campo["id"])."/".arruma_string($campo["titulo"]);
                            if ($pg_status == 1) {
                                echo "<input type='checkbox' name='excluir[]' value='{$campo["id"]}'/>";
                            }
                            ?>
                        </td>
                        <td class="text-left"><a href="<?= $cp_link ?>"><?= $campo["titulo"] ?></a></td>
                        <td>
                            <a class="pnl-img-2" href="<?= $cp_link ?>">
                                <? if($campo["target"] == "up") { ?>
                                    <video>
                                        <source src="<?=$pathSite?>banner/files/<?=$campo["nome_video"]?>" type="video/<?=$video_extensao?>">
                                    </video>
                                <? } else { ?>
                                    <div class="img-on-in wrap-on" style="background-image: url('<?= ($campo["target"] == "yt") ? "https://i1.ytimg.com/vi/".$campo["url"]."/hqdefault.jpg" : $img["sm"]?>')" title="<?=$campo["titulo"]?>"></div>
                                <? } ?>
                            </a>
                        </td>
                        <td class="text-left"><a href="<?= $cp_link ?>"><?= $campo["tipo"] ?></a></td>
                    </tr>
                <?
            }
        }
        ?>
        </tbody>
    </table>
    <br />
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <?
        if ($pg_status == 1) {
            echo "<input class='pz-btn-shadow op-live-2d bg-danger text-danger flt-r' type='submit' value='Excluir'>";
        } ?>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function(){
        $(function () {
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
        });
        function ordena(lista) {
            $.post("<?=$pathSite?>admin/banner/ordenacao.php", {lista: lista});
        }
    });
</script>
