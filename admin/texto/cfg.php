<?php

$tabela = "texto";
$titulo = "Textos";

$dirArquivo = "{$diretorioInicial}/$tabela/files/";
$pathArquivo = "{$pathSite}$tabela/files/";
$campoNomeArquivo = "nome_foto";
$prefixoMiniatura = "mini_";
$prefixoMarcaDagua = "";

$maxFotos = 0;
$img_size = "391px x 355px";

$obj_img = new Base($tabela . "_img");
$obj_vid = new Base($tabela . "_video");
$obj_top = new Base($tabela . "_topico");
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
