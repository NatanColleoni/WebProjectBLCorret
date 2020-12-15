<?
    $consultaServicofooter = new base("servico");
    $consultaSQLservicofooter = fetch_all($consultaServicofooter -> consulta("", "", "LIMIT 5")); 
	
	
	$obj_midia_social = new base('midia_social');
	$cMidia_social =fetch_all($obj_midia_social->consulta());

?>
<div id="contato" class="footer">
            <div class="container content-footer">
                <div class="row col-12">
                    <div class=" col-md-4 d-flex justify-content-start">
                        <img src="<?=$pathSite?>images/bl-corretora-footer.png">
                    </div>
                    <div class=" col-md-4 colunseguros">
                        <div>
                            <div>
                                <div class="border-segur float-left">

                                </div>
                                <p>Nossos seguros</p>
                            </div>
                            <?foreach($consultaSQLservicofooter as $item) { ?>
                            <div class="espac-itens">
                                <a href="<?= $pathSite ?>seguros/<?= $item['id'] ?>/<?= arruma_string($item['titulo']) ?>" target="_blank"><?= quebrar_texto($item['titulo'], 50) ?></a>
                            </div>
                            <? } ?>
                            
                                 <div>
                                <a href="http://dev.web235.uni5.net/site/seguros/" target="_blank">Ver todos</a>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-4 coluncontato">
					<?
					$fone = ex_itens($configs['cel']);
					$fone2 = ex_itens($configs['fone']);
					$email2x = ex_itensmail($configs['email']);
					
					?>
                        <div>
                            <div class="d-flex align-items-center espac-itens">
                                <div>
                                    <img src="<?=$pathSite?>images/wppicon-rodape.png" alt="whatsapp icone">
                                </div>
                                <span><?=$fone[0]?></span>
                                <p><?= $fone[1]?></p>
                            </div>
                            <div class="d-flex align-items-center espac-itens">
                                <div>
                                    <img src="<?=$pathSite?>images/telefoneicone-rodape.png" alt="telefone icone">
                                </div>
                                <span><?=$fone2[0]?></span>
                                <p><?=$fone2[1]?></p>
                            </div>
                            <div class="email espac-itens">
                                <img src="<?=$pathSite?>images/emailicone-rodape.png" alt="email icone">
                                <a href="mailto:<?= $configs['email']?>"><span class="teste"><?= $email2x[0]?></span>@<?= $email2x[1]?></a>
                            </div>
                            <div class="redessoci d-sm-none d-md-block d-sm-block col-md d-flex justify-content-start espac-itens" style="padding: 0;margin-left: auto;
																																			margin-right: auto;
																																			width: 38%">
							<?if($cMidia_social){
								foreach($cMidia_social as $ind => $item4){
									?>
									<a href="<?=$item4['url']?>" target="_blank" title="<?=$item4['titulo']?>"><img src="<?=$pathSite?>images/<?=$item4['rodape']?>"></a>
									
								<?
								}
							}?>
                                
							</div>
                        </div>
                    </div>
						
                </div>
            </div>
            <footer>Todos os direitos reservados © 2020</footer>
        </div>