<?
$tabela = "servico_diferencial";
$tabelaPai = "servico";
$titulo = "Tópicos dos serviços";

$dirArquivo = "{$diretorioInicial}/$tabelaPai/files/";
$pathArquivo = "{$pathSite}$tabelaPai/files/";
$campoNomeArquivo = "nomeFoto";
$prefixoMiniatura = "mini_";
$prefixoMarcaDagua = "";

$maxFotos = 0;
$img_size = "530px x 385px";

$obj_pai = new Base($tabelaPai);
//$obj_img = new Base($tabela."_img");;
//$obj_ctg = new Base($tabela."_ctg");
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
