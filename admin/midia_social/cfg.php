<?
$tabela = "midia_social";
$titulo = "Mídias Sociais";

$dirArquivo = "{$diretorioInicial}/$tabela/files/";
$pathArquivo = "{$pathSite}$tabela/files/";
$campoNomeArquivo = "nomeFoto";
$prefixoMiniatura = "mini_";
$prefixoMarcaDagua = "";

$maxFotos = 0;

$obj = new Base($tabela);
$obj->prefixoMiniatura = $prefixoMiniatura;
$obj->prefixoMarcaDagua = $prefixoMarcaDagua;
$obj->pathArquivo = $dirArquivo;
$obj->urlArquivo = $pathArquivo;
$obj->campoNomeArquivo = $campoNomeArquivo;
$obj->extensions = array("svg","png","jpg","jpeg");
?>
