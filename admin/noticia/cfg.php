<?
$tabela = "noticia";
$titulo = "Noticias";

$dirArquivo = "{$diretorioInicial}/blog/files/";
$pathArquivo = "{$pathSite}blog/files/";
$campoNomeArquivo = "nome_foto";
$prefixoMiniatura = "mini_";
$prefixoMarcaDagua = "";

$maxFotos = 0;
$img_size = "1350px x 1250px";

$obj = new Base($tabela);
$obj_ctg = new Base ("noticia_ctg");
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
    "svg"
);

?>
