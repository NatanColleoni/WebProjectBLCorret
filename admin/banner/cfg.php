<?php
$tabelaPai = "";
$tabela = "banner";
$titulo = "Banners";

$dirArquivo = "{$diretorioInicial}/$tabela/files/";
$pathArquivo = "{$pathSite}$tabela/files/";
$campoNomeArquivo = "nome_foto";
$prefixoMiniatura = "mini_";
$prefixoMarcaDagua = "";

$maxFotos = 5;

$obj_linha = new Base("linha");
$obj_page = new Base("metatags");
$obj = new Base($tabela);
$obj_tp = new Base($tabela."_tipo");
$obj_target = new Base($tabela."_target");
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
    "webm",
    "mp4",
    "mkv",
    "avi",
    "rmvb"
);
?>
