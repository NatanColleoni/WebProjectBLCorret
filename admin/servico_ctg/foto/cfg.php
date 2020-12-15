<?
$tabelaPai = "evento";
$tabela = "evento_img";
$titulo = "Fotos dos eventos";

$dirArquivo = "{$diretorioInicial}/$tabelaPai/files/";
$pathArquivo = "{$pathSite}$tabelaPai/files/";
$campoNomeArquivo = "nomeFoto";
$prefixoMiniatura = "mini_";
$prefixoMarcaDagua = "";

$maxFotos = 5;
$img_size = "305px x 225px";
$campoFormulario = "excluir";

$objPai = new Base($tabelaPai);
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
