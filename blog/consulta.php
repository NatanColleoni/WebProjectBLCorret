<?
$obj_blog = new Base("noticia");

$blog_txt = $obj_texto->consultaId(5);

if(!empty($_GET["id"]) && is_numeric($_GET["id"])) {
    $blog_id = $_GET["id"];
}

if($blog_id) {
    $blog = $obj_blog->consultaId($blog_id);
    
    $produto_txt = $obj_texto->consultaId(3);
} else  {
    $blogs = fetch_all($obj_blog->consulta("", "ORDER BY ordem", ""));
}
$materia = $obj_blog->consultaid($blog_id);