<?
$tabelaPai = "texto";
$tabela = "texto_img";
$titulo = "Fotos de Textos";

$dirArquivo = "{$diretorioInicial}/$tabelaPai/files/";
$pathArquivo = "{$pathSite}$tabelaPai/files/";
$campoNomeArquivo = "nome_foto";
$prefixoMiniatura = "mini_";
$prefixoMarcaDagua = "";

$maxFotos = 5;
$img_size= "1366px x 768px";
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
