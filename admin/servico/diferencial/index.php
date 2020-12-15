<?

include_once("../pre.php");
include("diferencial/cfg.php");


switch ($_GET["pg"]) {
    case "form":
        $id = dr($_GET['aux1']);
        $fk = dr($_GET['sub']);
        include("diferencial/form.php");
        break;
    default:
        $id = dr($_GET['sub']);
        $fk = dr($_GET['pg']);
        include("diferencial/lista.php");
        break;
}
include_once("../pro.php");
?>