<?
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.iso-8859-1", "portuguese");
date_default_timezone_set("America/Sao_Paulo");

include("admin/lib.php");
header("Content-Type: text/html; charset=ISO-8859-1", true);

include("consulta_base.php");
include("consulta.php");
include("utilitarios/post_enviar.php");

$iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
if ($iphone || $android || $palmpre || $ipod || $berry == true) {
    $link_whats = "https://api.whatsapp.com/send?phone=55";
} else {
    $link_whats = "https://web.whatsapp.com/send?phone=55";
}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
		<title><?=$configs["titulo"]?> - <?=($metatag_especifica["titulo"]) ? $metatag_especifica["titulo"] : $metatags["titulo"]?></title>
        <meta name="author" content="Desenvolvedor 10 - Byte a Byte - Agência Digital" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta http-equiv="Content-Language" content="pt-br">


        <meta http-equiv="X-UA-Compatible" content="IE=8,IE=Edge,chrome=1" />

        <link rel="apple-touch-icon" sizes="57x57" href="<?= $pathSite ?>/library/img/favicon//apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= $pathSite ?>/library/img/favicon//apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= $pathSite ?>/library/img/favicon//apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= $pathSite ?>/library/img/favicon//apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= $pathSite ?>/library/img/favicon//apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= $pathSite ?>/library/img/favicon//apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= $pathSite ?>/library/img/favicon//apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= $pathSite ?>/library/img/favicon//apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= $pathSite ?>/library/img/favicon//apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?= $pathSite ?>/library/img/favicon//android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= $pathSite ?>/library/img/favicon//favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= $pathSite ?>/library/img/favicon//favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $pathSite ?>/library/img/favicon//favicon-16x16.png">
        <link rel="manifest" href="<?= $pathSite ?>/library/img/favicon//manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= $pathSite ?>/library/img/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!--<link rel="stylesheet" type="text/css" href="<? //=$pathSite  ?>library/css/preload.css" />-->
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/bootstrap/css/bootstrap-glyphicon.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/css/animacao.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/fancybox/dist/jquery.fancybox.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/slick/slick.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/slick/slick-theme.css"/>
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/css/whatsapp-fixo.css"/>
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/royalslider/royalslider.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/royalslider/skins/minimal-white/rs-minimal-white.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/sweetalert2/dist/sweetalert2.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/fonts/fonts.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/fontawesome/css/fontawesome.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/fontawesome/css/solid.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/owlcarousel/dist/assets/owl.carousel.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/owlcarousel/dist/assets/owl.theme.default.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/mapaBrasil/main.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>library/css/estilo.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;500;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="<?= $pathSite ?>blog.css">

        <link rel="stylesheet" href="<?= $pathSite ?>fonts/style.css">
        
        <link rel="stylesheet" href="<?=$pathSite?>contato/contato.css">
        <link rel="stylesheet" href="<?=$pathSite?>blog/blog.css">
        <link rel="stylesheet" href="<?= $pathSite ?>style.css">
        <title>BL Corretora</title>
    </head>

    <body>
        

        <div id="fb-root"></div>

        <div class="header">
            <? include("header.php"); ?>
        </div>

        <div class="fundo-opacidade"></div>

        <div id="conteudo-site">
            <div class="home">
                
            