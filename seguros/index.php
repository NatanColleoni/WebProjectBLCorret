<?

$pagina = 3;
include_once("../pre.php");
if ($_GET['id'] > 0) {
    include_once 'interna.php';
} else {

    include_once("home.php");
}
include_once("../pro.php");
?>