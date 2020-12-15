<?
include_once("../pre.php");
include("cfg.php");

switch ($_GET["id"]) {
    default:
        include("lista.php");
        break;
}
include_once("../pro.php");
?>