<?
$id = 1;
if ($_POST["enviar"]) {
    $obj->required = array(
        "titulo" => "Título"
    );
    $obj->importArray($_POST);
    $obj->persist($id);
    $obj->mensagem();
}
$tip = "<p style='font-size: 14px;'>1º Abra o site do google maps (<a href='https://www.google.com/maps' target='_blank'>https://www.google.com/maps</a>)</p>"
     . "<p style='font-size: 14px;'>2º Insira o endereço no campo de pesquisa (Ex: Av. Advogado Horácio Raccanello Filho, 6090 - Novo Centro, Maringá - PR, 87020-035)</p>"
     . "<p style='font-size: 14px;'>3º Clique em compartilhar, logo após aparecerá um janela, clique na aba incorporar mapa e depois em COPIAR HTML</p>"
     . "<a data-fancybox='mapa' href='{$pathSite}admin/library/img/mapa-exemplo.jpg'>"
     . "<img width='800' src='{$pathSite}admin/library/img/mapa-exemplo.jpg' />"
     . "</a><br /><br />"
     . "<p style='font-size: 14px;'>4º Agora de volta ao painel, cole o que está copiado no campo mapa e salve</p>";
$_POST = $obj->consultaId($id);

$objEstado = new Base("estado");
$estado = fetch_all($objEstado->consulta("", "ORDER BY titulo ASC"));
?>

<div class="pnl-hd-title bg-opc-01"><h4><?=$titulo?></h4></div>
<form class="pnl-form table-responsive col-xs-12 pdg-0 pdg-t-20" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nome da Empresa</label>
        <input class="form-control" placeholder="titulo" required name="titulo" type="text" maxlength="255" value="<?=$_POST["titulo"]?>">
    </div>
    <div class="form-group">
        <label>E-mail Principal</label>
        <input class="form-control" placeholder="E-mail de contato" name="email" type="email" maxlength="255" value="<?=$_POST["email"]?>">
    </div>
    <div class="form-group">
        <label>Telefone Principal</label>
        <input class="form-control" placeholder="Telefone Principal" name="fone" type="tel" maxlength="255" value="<?=$_POST["fone"]?>">
    </div>
    <div class="form-group">
        <label>Telefone</label>
        <input class="form-control" placeholder="Telefone" name="fone_2" type="tel" maxlength="255" value="<?=$_POST["fone_2"]?>">
    </div>
    <div class="form-group">
        <label>Celular</label>
        <input class="form-control" placeholder="Telefone" name="cel" type="tel" maxlength="255" value="<?=$_POST["cel"]?>">
    </div>
    <div class="form-group">
        <label>CEP</label>
        <input class="form-control cep" placeholder="Informe um CEP..." name="cep" type="text" maxlength="255" onkeypress="return isNumber(event)" value="<?=$_POST["cep"]?>">
    </div>
    <div class="form-group">
        <label>Endereço</label>
        <input class="form-control" placeholder="Ex: Av. ... , Bloco ..." name="endereco" type="text" maxlength="255" value="<?=$_POST["endereco"]?>">
    </div>
    <div class="form-group">
        <label>Número</label>
        <input class="form-control" placeholder="Ex: 125, 2000, 2555" name="numero" type="text" maxlength="255" value="<?=$_POST["numero"]?>">
    </div>
    <div class="form-group">
        <label>Complemento</label>
        <input class="form-control" placeholder="Ex: apto 150, sala 102" name="complemento" type="text" maxlength="255" value="<?=$_POST["complemento"]?>">
    </div>
    <div class="form-group">
        <label>Bairro</label>
        <input class="form-control" placeholder="Bairro..." name="bairro" type="text" maxlength="255" value="<?= $_POST["bairro"] ?>">
    </div>
    <div class="form-group">
        <label>Cidade</label>
        <input class="form-control" placeholder="Cidade..." name="cidade" type="text" maxlength="255" value="<?=$_POST["cidade"]?>">
    </div>
    <div class="form-group">
        <label>Estado</label>
        <select name="estado_fk" class="form-control">
            <option value="">Selecione...</option>
            <?
            if (!empty($estado)) {
                foreach ($estado as $item) {
                    $selected = ($item["id"] == $_POST["estado_fk"]) ? "selected" : "";
                    echo "<option {$selected} value='{$item["id"]}'>{$item["titulo"]}</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Mapa</label> <span title="Dica" class="dica" data-toggle="modal" data-target="#modal-dica">?</span>
        <input class="form-control" placeholder="Mapa..." name="mapa" type="text" value="<?= htmlentities($_POST["mapa"]) ?>" />
    </div>

    <div class="form-group">
        <label>Atendimento</label>
        <textarea class="form-control tinymce" placeholder="..." rows="2" name="atendimento"><?=stripslashes($_POST["atendimento"])?></textarea>
    </div>

    <div class="pz-divisor bg-opc-06 mgn-b-10 mgn-t-20"></div>
    <div class="form-group" <?=$ipt_key?>>
        <label class="text-info h5 f-bold-s">&bull;&nbsp; Insira nesse campo, somente as <span class="text-danger">palavras associadas </span> de maneira geral ao seu website, <span class="text-danger">separadas por virgula(,)</span>.</label>
        <label class="text-info h5 f-bold-s">&bull;&nbsp; No <span class="text-danger">inicio </span> e <span class="text-danger">fim</span> do conteúdo inserido, por favor, coloque a virgula<span class="text-danger"> </span>.</label>
        <textarea maxlength="255" <?=$ipt_key?> class="form-control" rows="3" placeholder="Ex: pasta, dente, sal, limão, oregano, pizza, montanha, tubarão..." required name="keyword"><?=$_POST["keyword"]?></textarea>
    </div>
    <div class="form-group" <?=$ipt_desc?>>
        <label class="text-info h5 f-bold-s">&bull;&nbsp; Por favor, uma breve frase de efeito, que <span class="text-danger">represente</span> o seu empreendimento...</label>
        <textarea maxlength="255" <?=$ipt_desc?> class="form-control" rows="3" placeholder="Ex: Fé na Qualidade..." required name="descricao"><?=$_POST["descricao"]?></textarea>
    </div>
    <div class="pz-divisor bg-opc-06 mgn-b-20 mgn-t-20"></div>

    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20 text-center mgn-t-0">
        <input class="pz-btn-shadow op-live-2d bg-success text-success f-bold sm-wd-100" type="submit" name="enviar" value="Salvar">
    </div>
</form>

<div class="modal fade" style="z-index: 99992" id="modal-dica" tabindex="-1" role="dialog" aria-labelledby="modal-atencao" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content pdg-0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
                <div class="text-center text-uppercase"><h2>Dica</h2></div>
            </div>
            <div class="modal-body pdg-20">
                <?= $tip ?>
            </div>
        </div>
    </div>
</div>
