<?

function vtop($valor) {
    $valor = str_replace(",", ".", str_replace(".", "", $valor));
    return($valor);
}
function ptov($valor) {
    $valor = number_format($valor, 2, ",", ".");
    return($valor);
}
