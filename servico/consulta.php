<?
$obj_banner = new Base("banner");
$obj_produto = new Base("produto");
$obj_produto_topico = new Base("produto_topico");

$banner_desk = fetch_all($obj_banner->consulta("WHERE page_fk = {$pagina} AND tipo_fk = 5", "ORDER BY ordem ASC, data_cadastro DESC, id DESC"));
$banner_mobile = fetch_all($obj_banner->consulta("WHERE page_fk = {$pagina} AND tipo_fk = 2", "ORDER BY ordem ASC, data_cadastro DESC, id DESC"));

$produto_txt = $obj_texto->consultaId(3);

if(!empty($_GET["id"]) && is_numeric($_GET["id"])) {
    $chamada_prod_id = $_GET["id"];
}

$produtos = fetch_all($obj_produto->consulta("", "ORDER BY ordem ASC, data_cadastro DESC, id DESC"));
$list_produtos = array();
if($produtos) {
    foreach($produtos as $produto) {
        $list_produtos[$produto["id"]]["txt"] = $produto;
        $list_produtos[$produto["id"]]["topico"] = fetch_all($obj_produto_topico->consulta("WHERE produto_fk = {$produto["id"]}", "ORDER BY ordem ASC, data_cadastro DESC, id DESC"));
    }
}
