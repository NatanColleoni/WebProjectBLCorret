<?
include_once("../pre.php");
include("cfg.php");

switch($_GET["id"]) {
    case "form":
        include("form.php");
        break;
    case "foto":
        include("foto/index.php");
        break;
    case "video":
        include("video/index.php");
        break;
    default:
        include("lista.php");
        break;
}
include_once("../pro.php");
?>