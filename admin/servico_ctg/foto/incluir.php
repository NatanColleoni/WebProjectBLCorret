<?
if($_POST["enviar"]) {
    $arquivos = converteArrayFiles($_FILES[$campoNomeArquivo]);
    $desc = $_POST["descricao"];
    foreach((array) $arquivos as $ind => $valor) {
        $_FILES[$campoNomeArquivo] = $valor;
        $_POST[$tabelaPai."FK"]=$fk;
        $_POST["descricao"] = $desc[$ind];
        $obj->importArray($_POST);
        $obj->persist();
    }
    $obj->mensagem();
}

$pai = $objPai->consultaId($fk);
$titulo .= " - ".$pai["titulo"];

$url_prev = $pathSite."admin/{$tabelaPai}/foto/".cr($fk)."/lista";
?>

<div class="pnl-hd-title bg-opc-01"><h4><?=$titulo?></h4></div>
<form class="table-responsive" method="POST" action="" enctype="multipart/form-data">
    <table class="table">
        <thead>
            <tr class="cabecalho">
                <th width="40%">Imagem</th>
                <th class="text-center-f" width="60%">Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?
            for($i = 0; $i <= $maxFotos; $i++){
                ?>
                <tr class="bg-line-zebra">
                    <td><input type="file" name="<?=$campoNomeArquivo?>[]"/></td>
                    <td><input type="text" name="descricao[]" placeholder="<?=$img_size?>" style="width: 100%"/></td>
                </tr>
                <?
            }
            ?>
        </tbody>
    </table>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l" href="<?=$url_prev?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-100" type="submit" name="enviar" value="Salvar">
    </div>
</form>