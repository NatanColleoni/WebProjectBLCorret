<?

class GerenciadorDeArquivos {

    var $diretorio = "";
    var $tabela = "";
    var $campoBD = "";

    function consultaArquivos() {
        $sql = "select * from arquivo";
        $consulta = mysql_query($sql) or die($sql . mysql_error());
        return $consulta;
    }

    // Seta o diretório, nome da tabela, e nome do campo da tabela que armazena o nome do arquivo que vai ser manipulado
    function GerenciadorDeArquivos($diretorio, $tabela, $campoBD) {
        $this->diretorio = $diretorio;
        $this->tabela = $tabela;
        $this->campoBD = $campoBD;
    }

    // Recebe o nome do campo do formulï¿½rio que estï¿½ enviando o arquivo
    function gravaArquivo($campoFormulario) {
        if (($_FILES[$campoFormulario][name] <> "") and ($_FILES[$campoFormulario][size]) > 0) {
            $arquivoTmp = $_FILES[$campoFormulario]['tmp_name'];
            $nome = arruma_string($_FILES[$campoFormulario]['name']);

            $sql = "insert into '$this->tabela' ($this->campoBD, comentario) values ('$nome', '$_POST[comentario]')";
            $insere = mysql_query($sql) or die($sql . mysql_error());
            $idGravado = mysql_insert_id();

            $novoNome = mysql_insert_id() . "_" . $nome;
            if ($copiar = copy($arquivoTmp, $this->diretorio . $novoNome)) {
                $sql = "update $this->tabela set $this->campoBD = '$novoNome' where id=" . $idGravado;
                $altualizaNome = mysql_query($sql) or die($sql . mysql_error);
            };
        }
        $this->sincroniza();
        return $idGravado;
    }

    // Recebe o id do registro na tabela
    function apagaArquivo($id) {
        $sql = "select * from '$this->tabela' where id=$id";
        $consulta = mysql_query($sql) or die($sql . mysql_error());
        $campo = mysql_fetch_array($consulta);

        $enderecoArquivo = $this->diretorio . $campo[$this->campoBD];
        if (file_exists($enderecoArquivo) and ($consulta) and ($campo[$this->campoBD])) {
            $excluirArquivo = unlink($enderecoArquivo);
        }

        if (($consulta) and ($campo[$this->campoBD])) {
            $sql = "delete from '$this->tabela' WHERE id='$id'";
            $excluir = mysql_query($sql);
        }
    }

    // Recebe o id do registro na tabela
    function removeArquivo($id) {
        $sql = "select * from '$this->tabela' where id=$id";
        $consulta = mysql_query($sql) or die($sql . mysql_error());
        $campo = mysql_fetch_array($consulta);

        $enderecoArquivo = $this->diretorio . $campo[$this->campoBD];
        if (file_exists($enderecoArquivo) and ($consulta) and ($campo[$this->campoBD])) {
            $excluirArquivo = unlink($enderecoArquivo);
        }

        if (($consulta) and ($campo[$this->campoBD])) {
            $sql = "update from '$this->tabela' set nome = ''";
            $excluir = mysql_query($sql);
        }
    }

    // Recebe o nome do campo do formulï¿½rio que estï¿½ enviando o arquivo
    function enviaArquivo($campoFormulario, $id) {
        if (($_FILES[$campoFormulario][name] <> "") and ($_FILES[$campoFormulario][size]) > 0) {
            $arquivoTmp = $_FILES[$campoFormulario]['tmp_name'];
            $nome = arruma_string($_FILES[$campoFormulario]['name']);

            $novoNome = $id . "_" . $nome;
            if ($copiar = copy($arquivoTmp, $this->diretorio . $novoNome)) {
                $sql = "update '$this->tabela' set $this->campoBD = '$novoNome' where id=" . $id;
                $altualizaNome = mysql_query($sql) or die($sql . mysql_error);
            };
        }
        $this->sincroniza();
        return $idGravado;
    }

    // Recebe o nome do campo do formulï¿½rio que estï¿½ mandando os idï¿½s que vï¿½o ser excluidos
    function apagaArquivos($campoFormulario) {
        if ($_POST[$campoFormulario]) {
            for ($i = 0; $i < count($_POST[$campoFormulario]); $i++) {
                $this->apagaArquivo($_POST[$campoFormulario][$i], $this->campoBD);
            }
        }
        $this->sincroniza();
    }

    // Apaga todos os arquivos que nï¿½o estï¿½o na tabela
    function removeArquivoSemRegistro() {
        if ($dir = opendir($this->diretorio)) {
            while (($arquivo = readdir($dir)) !== false) {
                if (!is_dir($arquivo)) {
                    $sql2 = "select count(id) as soma from '$this->tabela' where $this->campoBD = '$arquivo'";
                    $consulta = mysql_query($sql2) or die($sql2 . mysql_error());
                    $campo = mysql_fetch_array($consulta);

                    if ($campo[soma] == 0) {
                        unlink($this->diretorio . $arquivo);
                    }
                }
            }
        }
    }

    // Apaga os registros que nï¿½o possuem arquivos
    function removeRegistroSemArquivo() {
        $sql = "select * from '$this->tabela'";
        $consulta = mysql_query($sql) or die($sql2 . mysql_error());
        while ($campo = mysql_fetch_array($consulta)) {
            if (!file_exists($this->diretorio . $campo[$this->campoBD])) {
                $sql2 = "delete from '$this->tabela' where id=$campo[id]";
                $remove = mysql_query($sql2) or die($sql2 . mysql_error());
            }
        }
    }

    // Sincroniza apagando arquivos e registros sem referï¿½ncias
    function sincroniza() {
//		$this->removeRegistroSemArquivo();
//		$this->removeArquivoSemRegistro();
    }

}