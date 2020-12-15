<?

class Usuario {

    function consulta($where = "") {
        if ($where <> "") {
            $where = "where " . $where;
        }
        $sql = "select * from usuario nome $where";
        $consulta = mysql_query($sql) or die($sql . mysql_error());
        return $consulta;
    }

    function consultaId($id) {
        $sql = "select * from usuario where id = '$id'";
        $tabela = mysql_query($sql) or die($sql . mysql_error());
        $campo = mysql_fetch_array($tabela);
        return $campo;
    }

    function apaga($campoFormulario) {
        if ($_POST[$campoFormulario]) {
            for ($i = 0; $i < count($_POST[$campoFormulario]); $i++) {
                $id = $_POST[$campoFormulario][$i];
                $sql = "delete from usuario WHERE id='$id'";
                $excluir = mysql_query($sql);
            }
        }
    }

    function grava($nome, $login, $senha) {
        $sql = "insert into usuario (nome,login,senha) values ('$nome','$login','" . md5($senha) . "')";
        $consulta = mysql_query($sql) or die($sql . mysql_error());

        $id = mysql_insert_id();
    }

    function altera($nome, $login, $senha, $id) {
        $sql2 = "update usuario set nome='$nome', login='$login', senha='" . md5($senha) . "' where id = $id";
        $consulta2 = mysql_query($sql2) or die($sql2 . mysql_error());
    }

    function Usuario($tabela = "usuario") {
        $this->tabela = $tabela;
    }

    function verificaExistencia($login, $senha) {
        $sql = "select * from '$this->tabela' where login='$login' and senha='" . md5($senha) . "'";
        $consulta = mysql_query($sql) or die(mysql_error());
        if ($cont = mysql_num_rows($consulta) == 1) {
            $campo = mysql_fetch_array($consulta);
            return $campo;
        } else {
            return false;
        }
    }

}