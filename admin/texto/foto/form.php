<?
$fk = dr($_GET["sub"]);
$id = dr($_GET["aux1"]);

$pai = new Base($tabelaPai);
$pai = $pai->consultaId($fk);

if (!$id) {
    include("incluir.php");
} else {
    include("alterar.php");
}
?>