<?php

include("topico/cfg.php");
foreach ((array) $_POST[$campoFormulario] as $ind => $valor) {
    $consulta = $obj->consulta("WHERE {$tabelaPai}_fk='$valor'");
    while ($foto = mysql_fetch_assoc($consulta)) {
        $obj->apagaId($foto["id"]);
    }
}
include("cfg.php");
?>
