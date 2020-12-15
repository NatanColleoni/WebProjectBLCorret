<?php

include("foto/cfg.php");
foreach ((array) $_POST[$campoFormulario] as $ind => $valor) {
    $consulta = $obj->consulta("WHERE {$tabelaPai}FK = '$valor'");
    while ($foto = mysql_fetch_assoc($consulta)) {
        $obj->apagaId($foto["id"]);
    }
}
include("cfg.php");
?>
