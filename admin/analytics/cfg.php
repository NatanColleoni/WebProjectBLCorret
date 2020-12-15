<?
$tabela = "analytics";
$titulo = "Google Analytics";

$dirArquivo = "";
$pathArquivo = "";
$campoNomeArquivo = "";
$prefixoMiniatura = "";
$prefixoMarcaDagua = "";

$maxFotos = 0;

$obj = new Base($tabela);
$obj->prefixoMiniatura = $prefixoMiniatura;
$obj->prefixoMarcaDagua = $prefixoMarcaDagua;
$obj->pathArquivo = $dirArquivo;
$obj->urlArquivo = $pathArquivo;
$obj->campoNomeArquivo = $campoNomeArquivo;
$obj->extensions = array(
    "jpg",
    "jpeg",
    "png",
    "gif",
    "swf"
);
?>
