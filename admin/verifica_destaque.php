<?
include_once("lib.php");
header("Content-Type: text/html;  charset=ISO-8859-1", true);

if($_POST["quantidade"]) {
    $qtde = $_POST["quantidade"];
} else {
    $qtde = 0;
}

if($_POST["id_destaque"] && $_POST["tabela"] && $_POST["campo"]) {
    $id = $_POST["id_destaque"];
    $tabela = $_POST["tabela"];
    $campo = $_POST["campo"];

    $objAlterar = new Base($tabela);

    $objPrincipal = $objAlterar->consultaId($id);

    $num_dest = count(fetch_all($objAlterar->consulta("WHERE {$campo} = 1")));
    $destaque = $objPrincipal[$campo] == 0 ? 1 : 0;

    if(($num_dest < $qtde && $destaque == 1) || $destaque == 0 || $qtde == 0) {
        $objAlterar->updateSql("{$campo} = {$destaque}", "WHERE id = {$id}");
        echo "sucesso";
    } else {
        echo "erro";
    }
}

