<?
if (!function_exists("mysql_pconnect")) {
    function mysql_real_escape_string($db) {
        global $conexaoglobal_senhasecreta;
        return mysqli_real_escape_string($conexaoglobal_senhasecreta, $db) or die("Houve um problema ao se conectar");
    }

    function mysql_connect($host, $user, $pass) {
        global $conexaoglobal_senhasecreta;
        return $conexaoglobal_senhasecreta = mysqli_connect($host, $user, $pass) or die("Houve um problema ao conectar: 1");
    }

    function mysql_insert_id() {
        global $conexaoglobal_senhasecreta;
        return $conexaoglobal_senhasecreta->insert_id;
    }

    function mysql_pconnect($host, $user, $pass) {
        global $conexaoglobal_senhasecreta;
        return $conexaoglobal_senhasecreta = mysqli_connect($host, $user, $pass) or die("Houve um problema ao conectar: 1");
    }

    function mysql_select_db($db) {
        global $conexaoglobal_senhasecreta;
        return mysqli_select_db($conexaoglobal_senhasecreta, $db) or die("Houve um problema ao conectar: 2 ");
    }

    function mysql_close($db) {
        global $conexaoglobal_senhasecreta;
        return mysqli_close($conexaoglobal_senhasecreta);
    }

    function mysql_query($sql) {
        global $conexaoglobal_senhasecreta;
        return mysqli_query($conexaoglobal_senhasecreta, $sql);
    }

    function mysql_error($sql="") {
        global $conexaoglobal_senhasecreta;
        return $conexaoglobal_senhasecreta->error;
    }

    function mysql_fetch_assoc($consulta) {
        global $conexaoglobal_senhasecreta;
        $retorno = $consulta->fetch_assoc();
        return (array) $retorno;
    }

    function mysql_fetch_array($consulta) {
        global $conexaoglobal_senhasecreta;
        $retorno = $consulta->fetch_array();
        return (array) $retorno;
    }

    function mysql_num_rows($consulta) {
        return $consulta->num_rows;
    }

    function ereg_replace($pattern , $replacement , $string) {
        return preg_replace ($pattern , $replacement , $string);
    }

    function mysql_realescapestring($string) {
        global $conexaoglobal_senhasecreta;
        return mysqli_real_escape_string($conexaoglobal_senhasecreta, $string);
    }
}
