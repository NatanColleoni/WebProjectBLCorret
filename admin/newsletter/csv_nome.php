<?php

include("../lib.php");
include("cfg.php");
$nome_arquivo = "newsletter.csv";
header("Content-Type: application/force-download");
header("Content-disposition: attachment; filename=$nome_arquivo");

/* Newsletter */
$consulta = $obj->consulta("", "ORDER BY id DESC");
if($consulta) {
    echo "Nome;";
    echo "E-mail;" . "\n";

    while ($campo = mysql_fetch_assoc($consulta)) {
        echo $campo["nome"].";";
        echo $campo["email"] . ";" . "\n";
    }
}