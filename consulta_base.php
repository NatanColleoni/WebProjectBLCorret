<?
$obj_metatags = new Base("metatags");
$obj_config = new Base("config");
$obj_estado = new Base("estado");
$obj_texto = new Base("texto");
$obj_midia_social = new Base("midia_social");
$obj_whatsapp = new Base("whatsapp");

$configs = $obj_config->consultaId(1);
$configs_estado = $obj_estado->consultaId($configs["estado_fk"]);
$configs_fone = preg_replace("/[^0-9]/", "", $configs["fone"]);
$configs_cel = preg_replace("/[^0-9]/", "", $configs["cel"]);

$search_colchete  = array("[", "]");
$replace_sem_colchete = array("", "");
$replace_span = array("<span>", "</span>");
$replace_span_br = array("<br /><span>", "</span>");

$todas_metatags = fetch_all($obj_metatags->consulta("WHERE excluido IN (0,2)", "ORDER BY ordem ASC, data_cadastro DESC, id DESC"));

$whatsapp_titulo = mysql_fetch_assoc($obj_texto->consulta("WHERE class='whatsapp'", "", "LIMIT 1"));
$whatsapp_fixo = fetch_all($obj_whatsapp->consulta("", "ORDER BY ordem ASC, data_cadastro DESC, id DESC"));

$redes = fetch_all($obj_midia_social->consulta("WHERE url IS NOT NULL", "ORDER BY ordem ASC, data_cadastro DESC, id DESC"));

$metatags = $obj_metatags->consultaId($pagina);
