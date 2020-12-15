<?
include ("../lib.php");
$objConfig = new Base("config");
$config = mysql_fetch_assoc($objConfig->consulta());

header("Content-Type: text/html; charset=ISO-8859-1", true);
$login = new Login($urlLogin, $urlInicial, $tabela);
if (!$logado = $login->logar($_POST["login"], $_POST["senha"])) {
    $erro = "Dados inválidos!";
}

$meta["title"] = $config["titulo"];
$meta["info"] = (empty($metatags["descricao"])) ? $config["descricao"] : $metatags["descricao"];
$meta["key"] = $config["keyword"];
$meta["key"].= (!empty($metatags["keyword"])) ? ", " . $metatags["keyword"] : "";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <!--_- Painel Administrativo Byte (a) Byte -- 08/08/2019 -_-Poke-_-->
        <title><?= $meta["title"] ?> - Painel administrativo</title>
        <meta name="description" content="<?= $meta["info"] ?>">
        <meta name="keywords" content="<?= $meta["key"] ?>">
        <meta name="author" content="Byte a Byte - Robson (Poke - dev7)">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow" />

        <meta property="og:url" content="<?= $_SERVER["SCRIPT_URI"] ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?= $meta["title"] ?>" />
        <meta property="og:description" content="<?= $meta["info"] ?>" />
        <meta property='og:image' content="<?= $pathSite ?>library/img/lg_fb.jpg" />
        <meta property="og:image:type" content="image/jpeg" />

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Chrome, Firefox OS and Opera -->
        <meta name="theme-color" content="#341a0f">
        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#341a0f">
        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#341a0f">
        <!-- Icon -->
        <link rel="apple-touch-icon" sizes="32x32" href="<?= $pathSite ?>library/img/favicon/favicon.ico">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= $pathSite ?>library/img/favicon/favicon.ico">
        <meta name="msapplication-TileImage" content="<?= $pathSite ?>library/img/favicon/favicon.ico">
        <link rel="shortcut icon" type="image/x-icon" href="<?= $pathSite ?>library/img/favicon/favicon.ico">
        <!--<link rel="manifest" href="<?= $pathSite ?>library/img/favicon/manifest.json">-->
        <link rel="mask-icon" href="<?= $pathSite ?>library/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">

        <link type="text/css" rel="stylesheet" href="<?= $pathSite ?>admin/library/bootstrap/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="<?= $pathSite ?>admin/library/bootstrap/css/bootstrap-theme.min.css" />
        <link type="text/css" rel="stylesheet" href="<?= $pathSite ?>admin/library/bootstrap/css/bootstrap-select.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>admin/library/css/z-endless-dreams.css" />
        <link type="text/css" rel="stylesheet" href="<?= $pathSite ?>admin/library/css/z-endless-dreams.sm-md-gt.css" />
        <link type="text/css" rel="stylesheet" href="<?= $pathSite ?>admin/library/css/z-endless-dreams.mana.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>admin/library/css/z-style.css" />
        <link rel="stylesheet" type="text/css" href="<?= $pathSite ?>admin/library/css/painel.style.css" />
    </head>
    <body class="pg-login">
        <section>
            <div class="col-xs-12 text-center pdg-t-40">
                <div class="dsp-in-block">
                    <a class="flt-l" href="https://www.byteabyte.com.br/">
                        <img class="img-responsive" width="400" src="<?= $pathSite ?>library/img/lg-byte-g.svg">
                    </a>
<!--                    <div class="text-right h4">
                        Soluções Tecnológicas
                    </div>-->
                </div>
                <br/>
                <h1 class="dsp-in-block pg-title h3">
                    Painel Administrativo
                </h1>
            </div>
            <div class="col-xs-12 text-center pdg-30">
                <form class="col-md-4 col-xs-12 dsp-in-block flt-off form-info form-opt-hidden f-rob-c" method="POST" action="">
                    <div class="form-group col-xs-12">
                        <input class="form-control bg-1" placeholder="Login" required name="login" type="text" maxlength="255" value="<?= $_POST["login"] ?>">
                    </div>
                    <div class="form-group col-xs-12">
                        <input class="form-control" placeholder="Senha" required name="senha" type="password" maxlength="255">
                    </div>
                    <?
                    if (!empty($erro)) {
                        echo "<div class='col-xs-12 cRed fSBold pdg10 h6'>" . $erro . "</div>";
                        if ($erro2) {
                            echo "<div class='col-xs-12 cRed pdg0 mgn0 h6 pdg20B'>" . $erro2 . "</div>";
                        }
                    }
                    ?>
                    <div class="form-group col-xs-12 text-center">
                        <button class="bg-first sm-wd-100 pz-btn-shadow c-1 op-live-2d" type="submit" name="formLogin" value="Enviar">
                            ENVIAR
                        </button>
                    </div>
                    <br />
                    <div class="col-xs-12 pdg-10">
                        Em caso de Dúvidas:
                        <br />
                        <a href="mailto:suporte@byteabyte.com.br">suporte@byteabyte.com.br</a>
                    </div>
                </form>
            </div>
        </section>
        <script type="text/javascript" src="<?= $pathSite ?>library/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?= $pathSite ?>admin/library/bootstrap/js/bootstrap.min.js"></script>
        <!--<script type="text/javascript" src="<?= $pathSite ?>admin/library/bootstrap/js/bootstrap-select.min.js"></script>-->
    </body>
</html>