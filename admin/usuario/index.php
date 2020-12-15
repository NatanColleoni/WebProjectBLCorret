<?
include("../pre.php");
include("cfg.php");

switch($_GET["id"]) {
    case "form":
        include("form.php");
        break;
    default:
        include("lista.php");
        break;
}
include("../pro.php");
?>