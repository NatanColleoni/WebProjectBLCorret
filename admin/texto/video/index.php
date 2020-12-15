<?
include("video/cfg.php");
switch ($_GET["pg"]) {
    case "form":
        include("video/form.php");
        break;
    default:
        include("video/lista.php");
        break;
}
?>