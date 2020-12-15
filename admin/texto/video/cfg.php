<?php
$tabelaPai = "texto";
$tabela = "texto_video";
$titulo = "Vídeos de Texto";

$dirArquivo = "";
$pathArquivo = "";
$campoNomeArquivo = "";
$prefixoMiniatura = "";
$prefixoMarcaDagua = "";

$maxFotos = 0;

$obj_pai = new Base($tabelaPai);
$obj = new Base($tabela);
$obj->prefixoMiniatura = $prefixoMiniatura;
$obj->prefixoMarcaDagua = $prefixoMarcaDagua;
$obj->pathArquivo = $dirArquivo;
$obj->urlArquivo = $pathArquivo;
$obj->campoNomeArquivo = $campoNomeArquivo;
$obj->extensions = array();
?>
