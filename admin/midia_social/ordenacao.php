<?
include_once("../lib.php");
$obj = new Base("midia_social");

if(isset($_POST["lista"])){
    $consulta = fetch_all($obj->consulta());
    foreach($_POST["lista"] as $ind => $valores){
        $obj->importArray(array("ordem" => ($ind + 1)));
        $obj->persist($valores);
        $i++;
    }
}