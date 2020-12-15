<?
include("../lib.php");
include("cfg.php");
$nome_arquivo = "contato.csv";
header("Content-Type: application/force-download");
header("Content-disposition: attachment; filename=$nome_arquivo");

/* Contato */
$consulta = $obj->consulta("", "ORDER BY data DESC, id DESC");
if($consulta) {
    echo "Nome;";
    echo "E-mail;";
    echo "Telefone;";
    echo "Assunto;";
    echo "Mensagem;" . "\n";

    while ($campo = mysql_fetch_assoc($consulta)){
        echo $campo["nome"] . ";";
        echo $campo["email"] . ";";
        echo $campo["telefone"] . ";";
        echo $campo["assunto"] . ";";
        echo $campo["mensagem"] . ";" . "\n";
    }
}