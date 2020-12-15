<?
$id = dr($_GET["pg"]);

if (empty($id)) {
    echo "<div class='alert alert-danger text-center fBold'>Nenhum resultado encontrado...</div>";
    die();
}

$campo = $obj->consultaId($id);

if(!$campo["data_leitura"]) {
    $obj->updateSql("data_leitura = NOW()", "WHERE id = {$id}");
    $campo = $obj->consultaId($id);
}

$titulo .= " - " . $campo["assunto"];

$url_prev = $pathSite . "admin/{$tabela}";
?>

<div class="pnl-hd-title"><h4><?= $titulo ?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Data de encaminhamento</label>
        <input readonly class="form-control" type="text" value="<?=formataDataHora($campo["data_cadastro"])?>" />
    </div>
    <div class="form-group">
        <label>Data de leitura</label>
        <input readonly class="form-control" type="text" value="<?=formataDataHora($campo["data_leitura"])?>" />
    </div>
    <div class="form-group" <?= $ipt_nm ?>>
        <label>Nome</label>
        <input readonly class="form-control" <?= $ipt_nm ?> type="text" value="<?= $campo["nome"] ?>" />
    </div>
    <div class="form-group" <?= $ipt_mail ?>>
        <label>E-mail</label> 
        <input readonly class="form-control" <?= $ipt_mail ?> type="text" value="<?= $campo["email"] ?>" />
    </div>
    <div class="form-group" <?= $ipt_fone1 ?>>
        <label>Telefone</label> 
        <input readonly class="form-control" <?= $ipt_fone1 ?> type="text" value="<?= $campo["telefone"] ?>" />
    </div>
    <div class="form-group" <?= $ipt_assunto ?>>
        <label>Assunto</label>
        <input readonly class="form-control" <?= $ipt_assunto ?> type="text" value="<?= $campo["assunto"] ?>" />
    </div>
    <div class="form-group" <?= $ipt_msg1 ?>>
        <label>Mensagem</label>
        <textarea <?= $ipt_msg1 ?> readonly class="form-control" rows="4"><?= $campo["mensagem"] ?></textarea>
    </div>

    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?= $url_prev ?>">Voltar</a>
    </div>
</form>
