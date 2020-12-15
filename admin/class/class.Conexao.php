<?

class Conexao {

    var $host = "";
    var $db = "";
    var $user = "";
    var $pass = "";

    function myconnect() {
        $this->identifier = mysql_connect($this->host, $this->user, $this->pass);
        mysql_select_db($this->db) or die("Houve um problema ao conectar: ");
    }

    function close() {
        mysql_close($this->identifier);
    }

}