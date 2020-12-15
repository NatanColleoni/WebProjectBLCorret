<?
include("foto/cfg.php");

switch ($_GET["pg"]) {
    case "form":
        include("foto/form.php");
        break;
    default:
        include("foto/lista.php");
        break;
}
?>
