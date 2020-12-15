<?
	include("consulta_.php");
?>
<section class="conteudo">
	<div class="container">
		<!-- <h1 class="text-center tit-pagina"><?= $tit_convenio['titulo']?></h1> -->
		<div class= "d-lg-block conteudo-interno">
			<h1 class="text-center">As melhores marcas você encontra aqui</h1>
				<div id="parceiros" class="parceiros <?/*responsivo-car*/?>" style="background: #fff;">
					<div class="container">
						<div class="item row">
							<? foreach ($consultaSQLmarcas as $item) { ?>
								
									<div class="item-espac">
										<?if($item['link']){?><a href="<?=$item['link']?>"><?}?>
											<img src="<?= $pathSite ?>marcas/files/<?= $item['nome_foto'] ?>" alt="Marcas slide">
										
										<?if($item['link']){?></a><?}?>
									</div>
								
							<? } ?>
						</div>
					</div>
				</div>
				
				<?/*<div class="container-fluid responsivo-car2">
				
					<div class="owl-carousel owl-theme">
						<? foreach ($consultaSQLmarcas as $item) { ?>
							<div class="item justify-content-center">
								<div class="item-tamanho">
									<?if($item['link']){?><a href="<?=$item['link']?>"><?}?>
									<img src="<?= $pathSite ?>marcas/files/<?= $item['nome_foto'] ?>" alt="Marcas slide">
									<?if($item['link']){?></a><?}?>
								</div>
							</div>
						<? } ?>


					</div>
				</div>
*/?>
		</div>
		
	</div>
</section>