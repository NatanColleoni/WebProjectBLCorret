<?
include("topico/cfg.php");

switch ($_GET["pg"]) {
    case "form":
        include("topico/form.php");
        break;
    default:
        include("topico/lista.php");
        break;
}
?>
