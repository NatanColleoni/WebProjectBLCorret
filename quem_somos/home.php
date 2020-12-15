<?
	//include("consulta_.php");
	$obj_txt_img = new base("texto_img");
	$galeria = fetch_all($obj_txt_img->consulta("WHERE texto_fk = 1","ORDER BY ordem ASC"));
?>
<div class="espaco-top"></div>

<section class="conteudo">

	<div class="container ">
	
		<div class="col-12 ">
			<div class="text-center mrg-tp-60 subtitulo">
				<p class="subtitulo">
				   <?=$institucional_txt["titulo"]?>
				</p>
			</div>
			<div class="titulo">
			   <p><?=$institucional_txt["subtitulo"]?></p>
			</div>
			<p class="text-qsomos mrg-bt-30">
				
			</p>
		</div>		
	</div>
    


	<div class="container">
		<h1 class="text-left tit-pagina mb-5  titulo-pg" style="font-size: 3rem;"></h1>
		<div class="row">
			<div class="col-12 <?=($galeria)?"col-lg-6":"col-lg-12"?> text-justify text-qsomos2">
				<?= $institucional_txt['descricao']?>
			</div>
			<?php if($galeria){ ?>
			<div class="col-12 col-lg-6">
				<section class="slider-for slider">
				   
						<?php foreach ($galeria as $valor) { ?>
						    	<a href="<?= $pathSite ?>texto/files/<?= $valor['nome_foto']?>" data-fancybox >
					    			<div class="box-galeria">
						      			<img src="<?= $pathSite ?>texto/files/<?= $valor['nome_foto']?>">
						    		</div>
					      		</a>
						<?php } ?>
				
			  	</section>

				<section class="regular slider">
					<?php if($galeria){ ?>
						<?php foreach ($galeria as $valor) { ?>
						    <div style="height: 140px; width: 140px !important;overflow: hidden;">
						      <img src="<?= $pathSite ?>texto/files/<?= $valor['nome_foto']?>">
						    </div>
						<?php } ?>
					<?php } ?>
			  	</section>
			</div>
<?php } ?>

		</div>

		<div class="row">
			<? if($topico){ ?>
				<? foreach ($topico as $valor) { 
					if($valor['descricao']){?>
						<div class="col-12 col-lg-4 box-topico">
							<div class="topico-empresa">
								<div class="topico-header">
									<h2 class="text-center"><?= $valor['titulo'] ?></h2>
								</div>
								<div class="topico-body text-lg-left">
									<?= $valor['descricao'] ?>
								</div>
							</div>
						</div>
					<? }
				}
			} ?>
		</div>
		<?if($consultaMetaTratamento['ctrl'] != 0){?>
			<div class="row">
				<div class="col-12">
					<h2>Conheça nossos serviços</h2>
					<hr class="mb-0">
				</div>
			</div>
			<style type="text/css">
				.servicos-clinica a:hover{text-decoration: none;color: #37b6c0;}
				.categ-icone img{width: 170px;height: auto; padding: 15px;}
			</style>
			<div class="col-12">
				<div class="servicos-clinica slider">
					<?php if($tratamento_categ){ ?>
						<?php foreach ($tratamento_categ as $valor) { ?>
							<div class="col-12">
							<a href="<?= $pathSite?>tratamento">
								<div class="categ-icone">
									<img class="img-fluid m-auto" src="<?= $pathSite ?>tratamento_ctg/files/<?= $valor['nomeFoto'] ?>">
								</div>
								<div class="categ-titulo"> 
									<h5 class="text-center"><?php echo $valor['titulo'] ?></h5>
								</div>
							</a>							
							</div>

						<?php } ?>
					<?php } ?>
				
				</div>
			</div>
		<?}?>
                        
	</div>
	<div class="container-fluid p-0 mt-5 mapa">
		<?= $configs['mapa'] ?>
	</div>
</section>
