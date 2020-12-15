<?
$id = dr($_GET["pg"]);
if ($id){
    if ($_POST["enviar"]) {
        $obj->required = array(
            "texto" => "Texto"
        );
        $_POST["descricao"] = str_replace("'",'"',$_POST["descricao"]);
        $obj->importArray($_POST);
        $obj->persist($id);
        $obj->mensagem();
    } else {
        $_POST = $obj->consultaId($id);
    }
}

$titulo.= ($_POST["rf_nm"]) ? " - ".$_POST["rf_nm"] : "";
$url_prev = $pathSite."admin/{$tabela}/lista";
?>

<div class="pnl-hd-title"><h4><?=$titulo?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Título</label>
        <input class="form-control" placeholder="titulo" required readonly name="titulo" type="text" maxlength="255" value="<?=$_POST["titulo"]?>">
    </div>
    <div class="form-group" <?=$ipt_key?>>
        <label>Palavras Chave</label>
        <textarea <?=$ipt_key?> class="form-control" rows="3" placeholder="Insira Palavras Chave" required name="keyword"><?=$_POST["keyword"]?></textarea>
    </div>
    <div class="form-group" <?=$ipt_desc?>>
        <label>Descrição</label>
        <textarea <?=$ipt_desc?> class="form-control rz-v" rows="3" placeholder="Insira a Desriçao" required name="descricao"><?=$_POST["descricao"]?></textarea>
    </div>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a <?=$btn_prev?> class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?=$url_prev?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>