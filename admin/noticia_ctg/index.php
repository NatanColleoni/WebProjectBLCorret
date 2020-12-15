<?
$pg_pnl_ID= 10;
include_once('../pre.php');

include('cfg.php');
switch ($_GET['id']) {
    case "form":
        include('form.php');
        break;
    case "foto":
        include('foto/index.php');
        break;
    case "tipo":
        include('tipo/index.php');
        break;
    default:
        include('lista.php');
        break;
}
include_once('../pro.php');
?>