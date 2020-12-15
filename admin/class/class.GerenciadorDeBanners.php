<?

include_once ("class.GerenciadorDeArquivos.php");

class GerenciadorDeBanners extends GerenciadorDeArquivos {

    function gravaBanner($campoFormulario) {
        $idArquivoGravado = $this->gravaArquivo($campoFormulario);
        if ($idArquivoGravado) {
            $sql = "SELECT MAX(ordem) as maximo FROM banner";
            $busca = mysql_fetch_assoc(mysql_query($sql));
            $ordem = $busca[maximo] + 1;
            $formato = $_FILES[$campoFormulario][type];
            $sql = "update banner set link = '$_POST[link]', target='$_POST[target]', titulo='$_POST[titulo]', ativo='$_POST[ativo]', formato='$formato', comentario='$_POST[comentario]', ordem = '$ordem' where id = " . $idArquivoGravado;
            $atualizaBanner = mysql_query($sql) or die($sql . mysql_error());
        }
    }

    function gravaBanner2($campoFormulario) {
        $idArquivoGravado = $this->gravaArquivo($campoFormulario);
        if ($idArquivoGravado) {
            $formato = $_FILES[$campoFormulario][type];
            $sql = "update banner2 set link = '$_POST[link]', target='$_POST[target]', titulo='$_POST[titulo]', ativo='$_POST[ativo]', formato='$formato', comentario='$_POST[comentario]' where id = " . $idArquivoGravado;
            $atualizaBanner = mysql_query($sql) or die($sql . mysql_error());
        }
    }

    function ordenaBanner($id, $ordem) {
        echo $sql = "update banner set ordem = '$ordem' where id = " . $id;
        $atualizaBanner = mysql_query($sql) or die($sql . mysql_error());
    }

    function alteraBanner($id, $ordem) {
        $sql = "update banner set link = '$_POST[link]', target='$_POST[target]', titulo='$_POST[titulo]', ativo='$_POST[ativo]', comentario='$_POST[comentario]', ordem = '$ordem' where id = " . $id;
        $atualizaBanner = mysql_query($sql) or die($sql . mysql_error());
    }

    function alteraBanner2($id) {
        $sql = "update banner2 set link = '$_POST[link]', target='$_POST[target]', titulo='$_POST[titulo]', ativo='$_POST[ativo]', comentario='$_POST[comentario]' where id = " . $id;
        $atualizaBanner = mysql_query($sql) or die($sql . mysql_error());
    }

    function consultaBanners($order = "order by ordem") {
        $sql = "select * from banner $order";
        $consulta = mysql_query($sql) or die($sql . mysql_error());
        return $consulta;
    }

    function consultaBanners2($order = "order by ordem") {
        $sql = "select * from banner2 $order";
        $consulta = mysql_query($sql) or die($sql . mysql_error());
        return $consulta;
    }

    function banner2aleatorio() {
        $sql = "SELECT * FROM banner2 ORDER BY RAND()";
        $consulta = mysql_query($sql);
        $registro = mysql_fetch_assoc($consulta);
        return $registro;
    }

    function consultaBannersAtivos($order = "order by ordem") {
        $sql = "select * from banner where ativo = 1 $order";
        $consulta = mysql_query($sql) or die($sql . mysql_error());
        return $consulta;
    }

    function consultaId($id) {
        $sql = "select * from banner where id = $id";
        $consulta = mysql_query($sql) or die($sql . mysql_error());
        $campo = mysql_fetch_array($consulta);
        return $campo;
    }

    function ativo($ativo) {
        if ($ativo == 1) {
            return "Sim";
        } else {
            return "Não";
        }
    }

}