<?
include_once("../pre.php");
$pg = dr($_GET["pg"]);
$id = dr($_GET["sub"]);

if(empty($pg)){
    echo "<div class='alert alert-danger text-center fBold'>Selecione a Página Desejada a inserir Banners... </div>";
    die();
}

$grp = $obj_page->consultaId($pg);

$obj->campoNomeArquivo = "nome_foto";

if($_POST["enviar"]) {
    if($_POST["removerBanner"] == 1) {
        $upload = $obj->upload();
        $upload->removeArquivo($id);
    }
    if($_POST["removerVideo"] == 1) {
        $obj->campoNomeArquivo = "nome_video";
        $upload = $obj->upload();
        $upload->removeArquivo($id);
    }

    $_POST["url"] = url($_POST["url"]);
    $_POST["page_fk"] = $pg;

    $obj->importArray($_POST);
    $new_id = $obj->persist($id);
    $obj->campoNomeArquivo = "nome_video";
    $obj->persist($new_id);
    $obj->mensagem();
}

$_POST = $obj->consultaId($id);

$bn_ctrl = explode("-", $grp["banner"]);
$pg_tp = explode("/", $bn_ctrl[0]);
$pg_target = explode("/", $bn_ctrl[1]);
$pg_status = $bn_ctrl[2];

/* Target/Link/URL */
if(!empty($pg_target)){
    foreach ($pg_target as $i => $item){
        $ax_targ.= ($i > 0)? ",".$item : $item;
    }
    $opt_target = fetch_all($obj_target->consulta("WHERE id IN({$ax_targ})"));
}

/* Opcao Mobile/Desk */
if(!empty($pg_tp)){
    foreach ($pg_tp as $i => $item){
        $ax_tp.= ($i > 0)? ','.$item : $item;
    }
    $opt_tipo = fetch_all($obj_tp->consulta("WHERE id IN({$ax_tp})"));
    
    $ipt_tp = (count($opt_tipo) == 1) ? "hidden" : "";
}

$titulo.= $_POST["titulo"] ? " - ".$_POST["titulo"] : "";
$url_prev=$pathSite."admin/{$tabela}/".cr($grp["id"])."/".arruma_string($grp["titulo"]);
?>

<div class="pnl-hd-title bg-opc-01"><h4><?=$titulo?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group" <?=$ipt_title?>>
        <label>Título</label>
        <input class="form-control" placeholder="titulo" required name="titulo" type="text" maxlength="255" value="<?=$_POST["titulo"]?>">
    </div>
    <?
    if(!empty($opt_tipo)){
        ?>
        <div class="form-group" <?=$ipt_tp?>>
            <label>Modelo de Tela</label>
            <select <?=$ipt_tp?> id="bn-opt-tp" required name="tipo_fk" class="form-control" onchange="bn_size()">
                <option hidden value="">Selecione o modelo de tela apropriado...</option>
                <?
                foreach($opt_tipo as $item){
                    $selected = ($item["id"] == $_POST["tipo_fk"] || count($opt_tipo) == 1) ? "selected" : "";
                    echo "<option {$selected} value='{$item["id"]}'>{$item["titulo"]}</option>";
                }
                ?>
            </select>
        </div>
        <h6 class="h6">Tamanho recomendado de <span id="bn-size" class="text-info f-bold"><?=$img_size?></span></h6>
        <?
    }
    ?>

    <div id="link" class="form-group" <?=$ipt_url?>>
        <label>Link</label>
        <input <?=$ipt_url?> class="form-control" placeholder="Link" name="url" type="text" maxlength="255" value="<?=$_POST["url"]?>">
    </div>

    <?
    if(!empty($opt_target)){
        ?>
        <div class="form-group" <?=$ipt_target?>>
            <label>Funcionalidade</label>
            <select <?=$ipt_target?> id="bn-opt-target" required name="target" class="form-control">
                <option hidden value="">Selecione uma especificação ao Banner...</option>
                <?
                foreach ($opt_target as $item){
                    $selected = ($item["class"] == $_POST["target"]) ? "selected" : "";
                    echo "<option {$selected} value='{$item["class"]}'>{$item["titulo"]}</option>";
                }
                ?>
            </select>
            <h6 class="h6"><span id="bn-target" class="text-info f-bold">...</span></h6>
        </div>
        <?
    }
    ?>

    <div id="upload-foto">
        <div class="form-group">
            <label>Banner</label>
            <input id="input-foto" type="file" class="form-control" name="nome_foto"><br/><br/>
        </div>
        <div class="form-group text-center">
            <?
            if ($_POST["nome_foto"]){
                $img=rightImg($_POST["nome_foto"], $tabela."/files/");
                ?>
                <label>Imagem Atual</label>
                <br/>
                <div class="pnl-img-1">
                    <a class="img-on-in wrap-on" data-fancybox="gallery" href="<?= $img["nl"] ?>" style="background-image: url(<?= $img["sm"] ?>);" title="<?= $_POST["titulo"] ?>"></a>
                </div>
                <br/>
                <?
                if($pg_status == 1){
                    echo "<label><input type='checkbox' name='removerBanner' value='1'/>&nbsp;Remover</label>";
                }
            } ?>
        </div>
    </div>

    <div id="upload-video">
        <div class="form-group">
            <label>Vídeo</label>
            <input id="input-video" type="file" class="form-control" name="nome_video"><br/><br/>
        </div>
        <div class="form-group text-center">
            <?
            if ($_POST["nome_video"]){
                $video_extensao = end(explode(".", $_POST["nome_video"]));
                ?>
                <label>Vídeo Atual</label>
                <br/>
                <div class="pnl-img-1">
                    <video controls>
                        <source src="<?=$pathSite?>banner/files/<?=$_POST["nome_video"]?>" type="video/<?=$video_extensao?>">
                    </video>
                </div>
                <br/>
                <?
                if($pg_status == 1){
                    echo "<label><input type='checkbox' name='removerVideo' value='1'/>&nbsp;Remover</label>";
                }
            } ?>
        </div>
    </div>

    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?=$url_prev?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>
<script>
    <?
    if(!empty($opt_tipo)){
        ?>
        function bn_size(){
            var valor_tipo = document.getElementById("bn-opt-tp").value;
            var iTarget, iTxt;
            iTarget = valor_tipo;

            switch(iTarget){
                <? foreach ($opt_tipo as $item){
                    ?>
                    case "<?=$item["id"]?>":
                        iTxt = "<?=$item["resolucao"]?>";
                        break;
                    <?
                }?>
                default:
                    iTxt = "Selecione uma opção de tela...";
            }
            document.getElementById("bn-size").innerHTML = iTxt;
        };
        bn_size("#bn-opt-tp");
        <?
    }
    if(!empty($opt_target)){
        ?>
        function bn_target(rf){
            var iTarget, iTxt;
            iTarget= $(rf).val();

            switch(iTarget){
                <? 
                foreach ($opt_target as $item){
                    ?>
                    case "<?=$item["class"]?>":
                        iTxt = "<?=$item["descricao"]?>";
                        break;
                    <?
                } ?>
                default:
                    iTxt = "...";
            }
            document.getElementById("bn-target").innerHTML = iTxt;

            if(iTarget == "up") {
                document.getElementById("upload-foto").style.display = "none";
                document.getElementById("upload-video").style.display = "block";
                document.getElementById("input-foto").setAttribute("disabled", "disabled");
                document.getElementById("input-video").removeAttribute("disabled");
                document.getElementById("link").style.display = "none";
            } else {
                document.getElementById("upload-foto").style.display = "block";
                document.getElementById("upload-video").style.display = "none";
                document.getElementById("input-foto").removeAttribute("disabled");
                document.getElementById("input-video").setAttribute("disabled", "disabled");
                document.getElementById("link").style.display = "block";
            }
        };
        bn_target("#bn-opt-target");
        <?
    }
    ?>
</script>
<script type="text/javascript" src="<?=$pathSite ?>library/js/pers-input-file.js"></script>
