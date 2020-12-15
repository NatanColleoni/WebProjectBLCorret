<?
include("consulta.php");
$key = array_search("pg-produto", array_column($todas_metatags, "class"));

if(is_numeric($key)) {
    if($todas_metatags[$key]["mostrar"] == 1) {
        if($produto_id) {
            include_once ("item.php");
        } else {
            include_once ("lista.php");
        }
    }
}
?>