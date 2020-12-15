<?
$tabela = "franquia";
$titulo = "Franquias";

$dirArquivo = "{$diretorioInicial}/$tabela/files/";
$pathArquivo = "{$pathSite}$tabela/files/";
$campoNomeArquivo = "nome_foto";
$prefixoMiniatura = "mini_";
$prefixoMarcaDagua = "";

$maxFotos = 0;
$img_size = "505px x 165px";

$obj_cidade = new Base("cidade");
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
    "gif"
);
?>
