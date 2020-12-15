<?
///////////////////////////////////////////////////////////////////////////////////////////////////
//echo getcwd(); //Função para pegar o endereçoo inicial que estão os arquivos a serem incluidos;
//exit();
ini_set("default_charset", "ISO-8859-1");

//if(false) {
  //  error_reporting(E_WARNING);
    //ini_set("display_errors", 1);
//}

//$clientAcess = (!empty($_SERVER["HTTP_HOST"])) ? explode(".", ($_SERVER["HTTP_HOST"])) : "";

    $pathSite = "http://dev.web235.uni5.net/site/";
    $diretorioInicial = "/home/dev/www/site/";
   
    //$pathSite = "http://www.reidapide.com.br/site/";
    //$diretorioInicial = $_SERVER["DOCUMENT_ROOT"]."/site/";
    includePath($diretorioInicial."admin/class");
    $cfg = new Conexao;
    $cfg->host = "mysql02-farm2.uni5.net";
    $cfg->db = "dev54";
    $cfg->user = "dev54";
    $cfg->pass = "OtDT86lK3a";


$cfg->myconnect();
$database = $cfg->db;

function includePath($path) {
    $ponteiro = opendir($path);
    while ($nome_itens = readdir($ponteiro)) {
        $itens[] = $nome_itens;
    }
    sort($itens);
    foreach ($itens as $listar) {
        if ($listar != "." && $listar != "..") {
            if (is_dir("$path/$listar")) {
                if ($listar <> ".svn") {
                    includePath("$path/$listar");
                }
            } else {
                require_once ("$path/$listar");
            }
        }
    }
}

if ($_SERVER["SESSAO"] == "ADMIN" || $_SERVER["REDIRECT_SESSAO"] == "ADMIN") {
    $urlLogin = "{$pathSite}admin/login/";
    $urlInicial = "{$pathSite}admin/";
    $tabela = "usuario";
    $project = session_name("wb-br2telecon");
}
session_start();

if ($_SERVER["VERIFICA_LOGIN"] == "1" || $_SERVER["REDIRECT_VERIFICA_LOGIN"] == "1") {
    $login = new Login($urlLogin, $urlInicial, $tabela);
    $login->verificaLogin();
}

function rightImg($img, $way) {
    global $pathSite;
    if (substr($img, 0, 5) == "mini_") {
        $tpMin = substr($img, 5);
        $img = $tpMin;
    }
    if (!empty($img)) {
        $result["nl"] = $pathSite.$way.$img;
        $result["sm"] = $pathSite.$way."mini_".$img;
        $result["status"] = "1";
    } else {
        $result["nl"] = $pathSite."admin/library/img/sem_img.svg";
        $result["sm"] = $pathSite."admin/library/img/sem_img.svg";
        $result["status"] = "0";
    }
    return $result;
}

function rightImgSite($img, $way) {
    global $pathSite;
    if (substr($img, 0, 5) == "mini_") {
        $tpMin = substr($img, 5);
        $img = $tpMin;
    }
    if (!empty($img)) {
        $result["nl"] = $pathSite.$way.$img;
        $result["sm"] = $pathSite.$way."mini_".$img;
        $result["status"] = "1";
    } else {
        $result["nl"] = $pathSite."library/img/logo.png";
        $result["sm"] = $pathSite."library/img/logo.png";
        $result["status"] = "0";
    }
    return $result;
}
