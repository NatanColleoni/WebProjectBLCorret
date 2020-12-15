<?
include_once("lib.php");
header("Content-Type: text/html;  charset=ISO-8859-1", true);

if ($_POST["btn_sair"] == "Sair") {
    $login = new Login($urlLogin, $urlInicial, $tabela);
    $login->fechar();
}

$obj_config = new Base("config");
$config = mysql_fetch_assoc($obj_config->consulta());
?>

<!DOCTYPE HTML>
<html>
    <head>
        <!-- DD Fog _ 17/03/2020 _ Byte a Byte _ Poke -->
        <title><?=$config["titulo"]?> - Painel administrativo</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta name="description" content="<?= $config["descricao"] ?>">
        <meta name="author" content="Byte a Byte - Dev 7 - Poke">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Chrome, Firefox OS and Opera -->
        <meta name="theme-color" content="#024a55">
        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#024a55">
        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#024a55">
        <!-- Icon -->
        <link rel="shortcut icon" href="<?=$pathSite?>library/img/favicon/favicon.ico" type="image/x-icon" />

        <link type="text/css" rel="stylesheet" href="<?=$pathSite?>admin/library/bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?=$pathSite?>admin/library/bootstrap/css/bootstrap-select.css">
        <!--<link type="text/css" rel="stylesheet" href="<?=$pathSite?>admin/library/bootstrap/css/bootstrap-colorpicker.min.css">-->
        <!--<link type="text/css" rel="stylesheet" href="<?=$pathSite?>admin/library/bootstrap/css/bootstrap-datetimepicker.min.css">-->
        <link type="text/css" rel="stylesheet" href="<?=$pathSite?>library/fancybox/dist/jquery.fancybox.min.css">
        <link type="text/css" rel="stylesheet" href="<?=$pathSite?>admin/library/tagit/css/tagit-simple-blue.css">
        <link type="text/css" rel="stylesheet" href="<?=$pathSite?>admin/library/js/tagit/tagit.ui-zendesk.css">
        <link rel="stylesheet" type="text/css" href="<?=$pathSite?>library/sweetalert2/dist/sweetalert2.min.css" />
        <link rel="stylesheet" type="text/css" href="<?=$pathSite?>admin/library/css/z-endless-dreams.css" />
        <link type="text/css" rel="stylesheet" href="<?=$pathSite?>admin/library/css/z-endless-dreams.sm-md-gt.css">
        <link type="text/css" rel="stylesheet" href="<?=$pathSite?>admin/library/css/z-endless-dreams.mana.css">
        <link rel="stylesheet" type="text/css" href="<?=$pathSite?>admin/library/css/z-style.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$pathSite?>admin/library/css/painel.style.css"/>

        <script type="text/javascript" src="<?=$pathSite?>admin/library/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?=$pathSite?>admin/library/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?=$pathSite?>admin/library/js/jquery.mask.js"></script>
        <script type="text/javascript" src="<?=$pathSite?>admin/library/js/painel.functions.js"></script>
        <script type="text/javascript" src="<?=$pathSite?>admin/library/js/painel.scripts.js"></script>
        <script type="text/javascript" src="<?=$pathSite?>admin/library/tagit/js/tagit.js"></script>
        <script type="text/javascript" src="<?=$pathSite?>admin/library/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?=$pathSite?>admin/library/bootstrap/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="<?=$pathSite?>library/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="<?=$pathSite?>library/fancybox/dist/jquery.fancybox.min.js"></script>
        <!--<script type="text/javascript" src="<?=$pathSite?>admin/library/bootstrap/js/bootstrap-colorpicker.min.js"></script>-->
        <? include("configuraEditorTexto.php"); ?>
    </head>
    <body class="pg-board">
        <section class="container-fluid">
            <div class="col-xs-12 pdg-t-30 pdg-b-40 text-center">
                <div class="dsp-in-block">
                    <a class="flt-l act-actv act-zoom son-zoom live-2d" href="<?=$pathSite?>admin" title="Byte a Byte - Desenvolvimento de websites, lojas virtuais e marketing digital">
                        <img class="img-responsive" width="220" src="<?=$pathSite?>library/img/lg-byte-g.svg" alt="Byte a Byte - Desenvolvimento de websites, lojas virtuais e marketing digital">
                    </a>
<!--                    <div class="text-right h6 mgn-0 f-bold-s flt-r clear-b">
                        Soluções Tecnológias
                    </div>-->
                </div>
                <h1 class="dsp-in-block pg-title h3">
                    Painel Administrativo
                </h1>
            </div>
            <table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
                <tr height="100%">
                    <td align="center" valign="top">
                        <table class="pnl-content panel-group" width="100%">
                            <tr>
                                <td class="pnl-menu pz-table-mn" style="width: 220px;" valign="top">
                                    <div class="col-xs-12 pdg-0">
                                        <a class="h6 btn-principal op-live-3d" href="<?=$pathSite?>admin/">Menu</a>
                                    </div>
                                    <br />
                                    <br />
                                    <br />

                                    <div class="panel panel-default">
                                        <a class="panel-title panel-heading" data-toggle="collapse" href="#collapse-0">Home</a>
                                        <ul id="collapse-0" class="list-group panel-collapse collapse">
                                            <a class="list-group-item" href="<?=$pathSite."admin/banner/".cr(1)."/home"?>">Banner Pág. Inicial</a>
                                        </ul>
                                    </div>

                                    <div class="panel panel-default">
                                        <a class="panel-title panel-heading" data-toggle="collapse" href="#collapse-1">Institucional</a>
                                        <ul id="collapse-1" class="list-group panel-collapse collapse">
                                            <!--<a class="list-group-item" href="<?=$pathSite."admin/banner/".cr(2)."/home"?>">Banner</a>-->
                                            <a class="list-group-item" href="<?=$pathSite."admin/texto/".cr(2)?>">Texto</a>
                                        </ul>
                                    </div>

                                    <div class="panel panel-default">
                                        <a class="panel-title panel-heading" data-toggle="collapse" href="#collapse-2">Seguros</a>
                                        <ul id="collapse-2" class="list-group panel-collapse collapse">
                                            <!--<a class="list-group-item" href="<?=$pathSite."admin/banner/".cr(3)."/home"?>">Banner</a>-->
                                            <a class="list-group-item" href="<?=$pathSite."admin/texto/form/".cr(3)."/home"?>">Título</a>
                                            <a class="list-group-item" href="<?=$pathSite."admin/servico/lista" ?>">Listagem</a>
                                        </ul>
                                    </div>

                                    <div class="panel panel-default">
                                        <a class="panel-title panel-heading" data-toggle="collapse" href="#collapse-3">Atendimento online</a>
                                        <ul id="collapse-3" class="list-group panel-collapse collapse">
                                            <a class="list-group-item" href="<?=$pathSite."admin/texto/form/".cr(4)."/home"?>">Texto</a>
                                        </ul>
                                    </div>

                                    <div class="panel panel-default">
                                        <a class="panel-title panel-heading" data-toggle="collapse" href="#collapse-4">Blog</a>
                                        <ul id="collapse-4" class="list-group panel-collapse collapse">
                                            <a class="list-group-item" href="<?=$pathSite."admin/texto/form/".cr(5)."/home"?>">Texto</a>
                                            <a class="list-group-item" href="<?=$pathSite."admin/noticia_ctg/lista"?>">Categorias</a>
                                            <a class="list-group-item" href="<?=$pathSite."admin/noticia/lista"?>">Noticias</a>
                                        </ul>
                                    </div>
                                    
                                    <div class="panel panel-default">
                                        <a class="panel-title panel-heading" data-toggle="collapse" href="#collapse-5">Parceiros</a>
                                        <ul id="collapse-5" class="list-group panel-collapse collapse">
                                            <?//<a class="list-group-item" href="<?=$pathSite."admin/texto/form/".cr(5)."/home"">Texto</a>?>
                                            <a class="list-group-item" href="<?=$pathSite."admin/marcas/lista"?>">Listagem</a>
                                        </ul>
                                    </div>
	
									<?/*
                                    <div class="panel panel-default">
                                        <a class="panel-title panel-heading" data-toggle="collapse" href="#collapse-6">Contato</a>
                                        <ul id="collapse-6" class="list-group panel-collapse collapse">
                                           <!-- <a class="list-group-item" href="<?=$pathSite."admin/banner/".cr(6)."/home"?>">Banner</a>-->
                                            <a class="list-group-item" href="<?=$pathSite."admin/texto/form/".cr(6)."/home"?>">Texto</a>
                                        </ul>
                                    </div>
									*/
									?>


                                    <!-- Componentes Do site -->
                                    <div class="pz-divisor mgn-t-20 mgn-b-20 bg-opc-01"></div>
                                    <div class="panel panel-default">
                                        <a class="panel-title panel-heading" data-toggle="collapse" href="#collapse-20">Contato através do site</a>
                                        <ul id="collapse-20" class="list-group panel-collapse collapse">
										    <a class="list-group-item" href="<?=$pathSite."admin/email"?>">E-mails de Contato</a>
                                            <a class="list-group-item" href="<?=$pathSite."admin/contato/".cr(1)."/contato"?>">Contatos recebidos</a>
                                        </ul>
                                    </div>
                                    <div class="panel panel-default">
                                        <a class="panel-title panel-heading" data-toggle="collapse" href="#collapse-21">Otimização</a>
                                        <ul id="collapse-21" class="list-group panel-collapse collapse">
                                            <a class="list-group-item" href="<?=$pathSite."admin/metatags"?>">Metatags</a>
                                            <a class="list-group-item" href="<?=$pathSite."admin/analytics"?>">Analytics</a>
                                        </ul>
                                    </div>
                                    <div class="panel panel-default">
                                        <a class="panel-title panel-heading" data-toggle="collapse" href="#collapse-22">Administração</a>
                                        <ul id="collapse-22" class="list-group panel-collapse collapse">
                                            <a class="list-group-item" href="<?=$pathSite."admin/config"?>">Configurações</a>
                                            <a class="list-group-item" href="<?=$pathSite."admin/usuario"?>">Usuários</a>
                                            <a class="list-group-item" href="<?=$pathSite."admin/texto/form/".cr(7)."/home"?>">Whatsapp Título</a>
                                            <a class="list-group-item" href="<?=$pathSite."admin/whatsapp"?>">Whatsapp</a>
                                            <a class="list-group-item" href="<?=$pathSite."admin/midia_social"?>">Mídias Sociais</a>
                                        </ul>
                                    </div>
                                    <form class="col-xs-12 pdg-b-20 pdg-t-20 text-center" method="POST">
                                        <div class="row">
                                            <div class="col-xs-6 pdg-3  pdg-l-0">
                                                <button name="btn_sair" value="Sair" class="pz-btn-shadow op-live-2d bg-danger text-danger flt-r f-bold wd-100" title="Sair">
                                                    <i class="glyphicon glyphicon-log-out"></i>
                                                </button>
                                            </div>
                                            <div class="col-xs-6 pdg-3 pdg-r-0">
                                                <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold wd-100 mgn-b-20" href="mailto:suporte@byteabyte.com.br" title="Contate o Suporte Byte a Byte">
                                                    <i class="glyphicon glyphicon-info-sign"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td class="pnl-body" valign="top" align="left">