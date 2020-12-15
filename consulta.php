<?
$obj_banner = new Base("banner");
$obj_produto = new Base("servico");
$obj_produto_topico = new Base("servico_topico");
$consultaTabelaqSomos = new Base("texto");
$consultaServico = new base("servico");
$consultaMarcas = new base ("marcas");
$consultaNoticiaCTG = new base("noticia_ctg");
$consultaNoticia = new base("noticia");
$obj_txt_img = new base("texto_img");

$consultaSQLqSomos = $consultaTabelaqSomos -> consultaid(1);
$consultaSQLServicos = $consultaTabelaqSomos -> consultaid(3);
$consultaSQLBlog = $consultaTabelaqSomos -> consultaid(5);
$consultaSQLAtendimentoO = $consultaTabelaqSomos -> consultaid(4);
$consultaSQLservico = fetch_all($consultaServico -> consulta("", "ORDER BY ordem", "LIMIT 3"));
$consultaSQLmarcas = fetch_all($consultaMarcas -> consulta("", "ORDER BY ordem", ""));
$consultaSQLNoticiaCTG = fetch_all($consultaNoticiaCTG -> consulta());
$consultaSQLnoticia = fetch_all($consultaNoticia -> consulta("", "", "LIMIT 3"));
$consultaSQLnoticiaInterna = fetch_all($consultaNoticia -> consulta());

$banner_desk = fetch_all($obj_banner->consulta("WHERE page_fk = {$pagina} AND tipo_fk = 1", "ORDER BY ordem ASC"));
if($banner_desk) {
    foreach($banner_desk as $banner_desk_check) {
        if($banner_desk_check["target"] == "up") {
            $possui_video_banner = true;
            $video_banner = $banner_desk_check["nome_foto"];
        }
    }
}
$banner_mobile = fetch_all($obj_banner->consulta("WHERE page_fk = {$pagina} AND tipo_fk = 2", "ORDER BY ordem ASC"));
if($banner_mobile) {
    foreach($banner_mobile as $banner_mob_check) {
        if($banner_mob_check["target"] == "up") {
            $possui_video_banner = true;
            $video_banner = $banner_mob_check["nome_foto"];
        }
    }
}

$institucional_txt = $obj_texto->consultaId(1);

$banner_prod_desk = mysql_fetch_assoc($obj_banner->consulta("WHERE page_fk = 3 AND tipo_fk = 3", "ORDER BY ordem ASC"));
$banner_prod_mobile = mysql_fetch_assoc($obj_banner->consulta("WHERE page_fk = 3 AND tipo_fk = 2", "ORDER BY ordem ASC"));

$contato_txt = $obj_texto->consultaId(6);

$menu_produtos_temp = fetch_all($obj_produto->consulta("", "ORDER BY ordem ASC, data_cadastro DESC, id DESC", "LIMIT 4"));
$menu_produtos = array();
if($menu_produtos_temp) {
    foreach($menu_produtos_temp as $menu_produto_temp) {
        $menu_produtos[$menu_produto_temp["id"]]["txt"] = $menu_produto_temp;
        $menu_produtos[$menu_produto_temp["id"]]["sabor"] = fetch_all($obj_produto_topico->consulta("WHERE servico_fk = {$menu_produto_temp["id"]}", "ORDER BY ordem ASC, data_cadastro DESC, id DESC", "LIMIT 4"));
    }
}






