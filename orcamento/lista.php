<div class="container-fluid container-contato">
    <div class="row">
        <div class="container">
            <div class="contato-header">
                <span class="contato-header-barra">I</span><h1>Solicite um orçamento</h1>
            </div>

            <div class="col-xs-12 pdg-0 contato-formulario">
                <div class="form-contato">
                    <form method="post">
           
                        <div class="col-xs-12 col-sm-6 form-item form-nome float-left">
                            <input required id="nome" class="outline-none" type="text" name="nome" placeholder="Nome" maxlength="255" value="<?= $_POST["nome"] ?>" onkeyup="pressionarContato('nome')" />
                            <div class="icone-obrigatorio">
                                <i class="icone-check fa fa-check verde pull-left"></i>
                                <i class="icone-asterisk fa fa-asterisk vermelho pull-left"></i>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 form-item form-email validar-email float-left" data-validate="email">
                            <input required id="email" class="outline-none" type="email" name="email" placeholder="E-mail" maxlength="255" value="<?= $_POST["email"] ?>" />
                            <div class="icone-obrigatorio">
                                <i class="icone-check fa fa-check verde pull-left"></i>
                                <i class="icone-asterisk fa fa-asterisk vermelho pull-left"></i>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 form-item form-tel float-left">
                            <input id="telefone" class="telefone outline-none" type="tel" name="telefone" placeholder="Telefone" maxlength="255" value="<?= $_POST["telefone"] ?>" onkeyup="pressionarContato('telefone')" />
                            
                        </div>
                        <div class="col-xs-12 col-sm-6 form-item form-cel float-left">
                            <input required id="celular" class="telefone outline-none" type="tel" name="celular" placeholder="Celular" maxlength="255" value="<?= $_POST["celular"] ?>" onkeyup="pressionarContato('celular')" />
                            <div class="icone-obrigatorio">
                                <i class="icone-check fa fa-check verde pull-left "></i>
                                <i class="icone-asterisk fa fa-asterisk vermelho pull-left"></i>
                            </div>
                        </div>
                       
                        <div class="col-xs-12 col-12 w-100 col-sm-12 form-item form-estado float-left">
                            <select required name="seguro_fk" class="outline-none">
                                <option value="">Selecione o seguro</option>
                                <?
                                if ($consultaSQLformservicos) {
                                    foreach ($consultaSQLformservicos as $item) {
                                        $selected = ($item["id"] == $_POST["seguro_fk"]) ? "selected" : "";
                                        echo "<option {$selected} value='{$item["id"]}'>{$item["titulo"]}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="col-xs-12 form-item form-msg">
                            <textarea required id="mensagem" class="preto outline-none" rows="5" type="text" name="mensagem" placeholder="Mensagem" onkeyup="pressionarContato('mensagem')"><?= $_POST["mensagem"] ?></textarea>
                            
                        </div>
                        <div class="col-xs-12 botao">
                            <button type="submit" name="enviarorcamento" id="submit" class="btn-contato outline-none" value="enviarorcamento">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- <div class="contato-mapa">
            <div class="container">
                <div class="col-xs-12 col-md-6 logo-opacidade">
                    <img class="img-responsive" src="<?=$pathSite?>library/img/logo-img.png"/>
                </div>
                <div class="col-xs-12 col-md-6 contato-img-mapa">
                    <div>Nossa localização</div>
                    <img class="img-responsive" src="<?=$pathSite?>library/img/mapa-contato.jpg"/>
                </div>
            </div>
        </div> -->
        
        <div class="contato-info" style="width: 100%;">
            <div class="container">
                <div class="col-xs-12 col-md-4 text-center float-left">
                    <? if($configs["cidade"]) { ?>
                        <div class="localizacao-titulo">
                            <img src="<?=$pathSite?>library/img/location.svg"/><?=  $configs["cidade"] ?>
                        </div>
                    <? } ?>
                    <? if($endereco) { ?>
                        <div class="localizacao-endereco">
                            <?= $endereco?>
                        </div>
                    <? } ?>
                    <? if($configs["bairro"]) { ?>
                        <div class="localizacao-bairro">
                            <?= $configs["bairro"] ?>
                        </div>
                    <? } ?>
                    <? if($configs["cep"]) { ?>
                        <div class="localizacao-cep">
                            CEP <?= $configs["cep"] ?>
                        </div>
                    <? } ?>
                </div>
                <div class="col-xs-12 col-md-4 text-center float-left tele-espac">
                    <? if($configs["fone"]) { ?>
                        <div class="localizacao-titulo text-uppercase">
                            <img src="<?=$pathSite?>library/img/telephone.svg"/> Telefone
                        </div>
                    <? } ?>
                    <? if($configs["fone"]) { ?>
                        <div class="localizacao-endereco">
                            <a href="tel:<?= preg_replace("/[^0-9]/", "", $configs["fone"]) ?>" target="_blank">
                                <?= $configs["fone"] ?>
                            </a>
                        </div>
                    <? } ?>
                </div>
                <div class="col-xs-12 col-md-4 text-center text-uppercase float-left">
                    <? if($configs["email"]) { ?>
                        <div class="localizacao-titulo">
                            <img src="<?=$pathSite?>library/img/gmail.png"/> E-mail
                        </div>
                    <? } ?>
                    <? if($configs["email"]) { ?>
                        <div class="localizacao-endereco">
                            <a href="mailto:<?= $configs["email"] ?>" target="_blank">
                                <?= $configs["email"] ?>
                            </a>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="localizacao">
    <div class="container">
        <div class="subtitulo">
            <p>localização</p>
        </div>
        <div class="titulo">
            <p>Venha conhecer a nossa empresa</p>
        </div>
    </div>
	
    <?=$configs['mapa']?>
</div>