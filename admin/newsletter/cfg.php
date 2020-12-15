<?php

$tabelaPai = "";
$tabela = "newsletter";
$titulo = "Newsletter recebidos";

$obj = new Base($tabela);
/* Esse campo define se possui nome ou somente e-mail... */
/* 1-nome; 2-email */
$id = dr($_GET["id"]);
?>
