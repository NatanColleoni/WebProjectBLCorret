<?
	
	$obj_midia_social = new base('midia_social');
	$cMidia_social =fetch_all($obj_midia_social->consulta());
?>
<header>
    <div class="fundo-topo">
            <section class="d-flex justify-content-end container topo">

                <div class="telef d-flex align-items-center">
                    <img class="float-left" src="<?=$pathSite?>images/telef-icon.png">
                    <span><?= $configs['fone']?></span>
                </div>

                <div class="whats d-flex align-items-center">
                    <img class="float-left" src="<?=$pathSite?>images/wpp-icon.png">
                    <span><?= $configs['cel']?></span>
                </div>

                <div class="redes-sociais">
				<?if($cMidia_social){
					foreach($cMidia_social as $ind => $item3){
						?>
						<a href="<?=$item3['url']?>" target="_blank" title="<?=$item3['titulo']?>"><img src="<?=$pathSite?>images/<?=$item3['class']?>"></a>
						
					<?
					}
				}?>
                    
                </div>


            </section>
        </div>

        <section class="navega container">
            <nav id="navegacao" class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="<?=$pathSite?>index.php"><img src="<?=$pathSite?>images/BL_Corretora.png" alt="BL_Corretora Logo"></a>
                <button class="navbar-toggler navbar-light bg-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item menu-home-none">
                            <a class="nav-link <?= ($pagina == 1) ? "ativo" : "" ?>" href="<?=$pathSite?>index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($pagina == 2) ? "ativo" : "" ?>" href="<?=$pathSite?>quem_somos">Quem somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($pagina == 3) ? "ativo" : "" ?>" href="<?=$pathSite?>seguros">Seguros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($pagina == 4) ? "ativo" : "" ?>" href="<?=$pathSite?>parceiros">Parceiros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($pagina == 11) ? "ativo" : "" ?>" href="<?=$pathSite?>orcamento">Orçamentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($pagina == 5) ? "ativo" : "" ?>" href="<?=$pathSite?>blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($pagina == 6) ? "ativo" : "" ?>" href="<?=$pathSite?>contato">Contato</a>
                        </li>
                        <div class="d-xl-none d-lg-none">
						<li class="nav-item">
                            <a class="nav-link" href="https://whats.link/blcorretora" target="_blank">Atendimento online</a>
                        </li>
                        <li class="telef-responsivo d-flex justify-content-start">
                            <a href="tel:<?= $configs['fone'] ?>"><?= $configs['fone']?></a>
                        </li>

                        <li class="whats-responsivo d-flex justify-content-start">
                            <a href="tel:<?= $configs['cel'] ?>"><?= $configs['cel']?></a>
                        </li>
                        </div>
                    </ul>
                    <a class="navega-atendimento d-sm-none d-md-block d-none d-sm-block d-md-none d-lg-block" href="https://whats.link/blcorretora" target="_blank">Atendimento online</a>
                </div>
            </nav>
        </section>

<?/*
    <div class="container-fluid container-header">
        <div class="row menu-linha">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg">
                        <div class="col-12 m-auto pdg-0 nav-menu">
                            <div class="nav-brand">
                                <a class="navbar-brand" href="<?=$pathSite?>" title="<?=$configs["titulo"]?>">
                                    <img class="img-fluid" src="<?=$pathSite?>images/BL_Corretora.png" alt="<?=$configs["titulo"]?>" />
                                </a>
                            </div>

                            <button id="btn-menu-none" class="" type="button"></button>
                            <button id="btn-menu" class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="sr-only">Menu</span>
                                <div class="icon-bar icon-top"></div>
                                <div class="icon-bar icon-mid"></div>
                                <div class="icon-bar icon-bot"></div>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
									<div class="menu-item">
                                    <li class="nav-item menu-home-none">
										<a class="nav-link <?= ($pagina == 1) ? "ativo" : "" ?>" href="<?=$pathSite?>index.php">Home</a>
									</li>
									</div>
									<div class="menu-item">
									<li class="nav-item">
										<a class="nav-link <?= ($pagina == 2) ? "ativo" : "" ?>" href="<?=$pathSite?>quem_somos">Quem somos</a>
									</li>
									</div>
									<div class="menu-item">
									<li class="nav-item">
										<a class="nav-link <?= ($pagina == 3) ? "ativo" : "" ?>" href="<?=$pathSite?>seguros">Seguros</a>
									</li>
									</div>
									<div class="menu-item">
									<li class="nav-item">
										<a class="nav-link <?= ($pagina == 4) ? "ativo" : "" ?>" href="<?=$pathSite?>parceiros">Parceiros</a>
									</li>
									</div>
									<div class="menu-item">
									<li class="nav-item">
										<a class="nav-link <?= ($pagina == 11) ? "ativo" : "" ?>" href="<?=$pathSite?>orcamento">Orçamentos</a>
									</li>
									</div>
									<div class="menu-item">
									<li class="nav-item">
										<a class="nav-link <?= ($pagina == 5) ? "ativo" : "" ?>" href="<?=$pathSite?>blog">Blog</a>
									</li>
									</div>
									<div class="menu-item">
									<li class="nav-item">
										<a class="nav-link <?= ($pagina == 6) ? "ativo" : "" ?>" href="<?=$pathSite?>contato">Contato</a>
									</li>
									</div>
									<div class="d-xl-none d-lg-none">
									<li class="nav-item">
										<a class="nav-link" href="https://whats.link/blcorretora" target="_blank">Atendimento online</a>
									</li>
									<li class="telef-responsivo d-flex justify-content-start">
										<a href="tel:<?= $configs['fone'] ?>"><?= $configs['fone']?></a>
									</li>

									<li class="whats-responsivo d-flex justify-content-start">
										<a href="tel:<?= $configs['cel'] ?>"><?= $configs['cel']?></a>
									</li>
									</div>
                                </ul>
								<a class="navega-atendimento d-sm-none d-md-block d-none d-sm-block d-md-none d-lg-block" href="https://whats.link/blcorretora" target="_blank">Atendimento online</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
	*/?>
</header>
