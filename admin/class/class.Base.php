<?

class Base {

    public $prefixoMiniatura;
    public $prefixoMarcaDagua;
    public $prefixoPB;
    public $pathArquivo;
    public $urlArquivo;
    public $campoNomeArquivo;
    public $campoNomeArquivo2;
    public $status;
    public $mensagem;
    public $extensions = array(
        "jpg", "jpeg", "png", "gif", "doc", "docx", "xls", "xlsx", "pdf", "txt", "ppt", "pptx", "pps", "ppsx", "swf", "svg", "webm", "mp4", "mkv", "avi", "rmvb"
    );

    public function __construct($tabela = "", $valores = array(), $campos = "*") {
        global $database;
        $this->tabela = $tabela;
        $this->campos = $campos;
        $this->database = $database;
        $this->required = array();
        if (!$valores) {
            $this->importArray($_POST);
        } else {
            $this->importArray($valores);
        }
    }

    function upload() {
        return new Upload($this->pathArquivo, $this->tabela, $this->campoNomeArquivo, $this->prefixoMiniatura, $this->prefixoMarcaDagua, $this->extensions);
    }

    function importArray($array) {
        $this->valores = new stdClass();
        foreach ((array) $array as $indice => $valor) {
            $this->valores->$indice = $array[$indice];
        }
    }

    function totalRegistros($string) {
        $sql = mysql_query("SELECT count($this->campos) as total FROM $this->tabela $string AND excluido = '0'") or die(mysql_error());
        $res = mysql_fetch_assoc($sql);
        return $res['total'];
    }

    function colunas($string = "") {
        $buscaColunas = mysql_query("SELECT IS_NULLABLE as nullable, DATA_TYPE as tipo, COLUMN_NAME as campo FROM information_schema.COLUMNS WHERE TABLE_NAME = '$this->tabela' AND TABLE_SCHEMA = '$this->database' AND COLUMN_NAME != 'id' $string") or die(mysql_error());
        while ($coluna = mysql_fetch_assoc($buscaColunas)) {
            $colunas[] = $coluna;
        }
        return $colunas;
    }

    function consulta($filtro = "", $order = "", $limit = "") {
        $colunasData = $this->colunas("AND DATA_TYPE IN('date', 'datetime')");
        foreach ((array) $colunasData as $ind => $valor) {
            switch ($valor['tipo']) {
                case "date":
                    $formato = "%d/%m/%Y";
                    break;
                case "datetime":
                    $formato = "%d/%m/%Y %H:%i:%s";
                    break;
            }
            $camposExtra[] = "DATE_FORMAT($valor[campo], '$formato') as $valor[campo]2";
        }
        if (is_array($camposExtra)) {
            $camposExtra = ", " . implode(",", $camposExtra);
        }
        if ($filtro) {
            $filtro .= " AND excluido IN ('0','2')";
        } else {
            $filtro = "WHERE excluido IN ('0','2')";
        }
        $sql = "SELECT `{$this->tabela}`.{$this->campos}{$camposExtra} FROM `$this->tabela` $filtro $order $limit";
        $res = mysql_query($sql) or die(mysql_error() . " - " . $sql);
        return $res;
    }

    function consultaId($id) {
        $consulta = $this->consulta("where id = '$id'");
        return mysql_fetch_assoc($consulta);
    }

    function consultaJoin($coluna = "", $join = "", $filtro = "", $order = "", $limit = "") {
        if ($filtro) {
            $filtro .= " AND `{$this->tabela}`.excluido IN ('0','2')";
        } else {
            $filtro = "WHERE `{$this->tabela}`.excluido IN ('0','2')";
        }
        $sql = "SELECT $coluna FROM `$this->tabela` $join $filtro $order $limit";
        $res = mysql_query($sql) or die(mysql_error() . " - " . $sql);
        return $res;
    }

    function consultaSelect($coluna = "", $filtro = "", $order = "", $limit = "") {
        if ($filtro) {
            $filtro .= " AND `{$this->tabela}`.excluido IN ('0','2')";
        } else {
            $filtro = "WHERE `{$this->tabela}`.excluido IN ('0','2')";
        }
        $sql = "SELECT $coluna FROM `$this->tabela` $filtro $order $limit";
        $res = mysql_query($sql) or die(mysql_error() . " - " . $sql);
        return $res;
    }

    function consulta_db_2($filtro = "", $order = "", $limit = "", $conexao = "") {
        $colunasData = $this->colunas("AND DATA_TYPE IN('date', 'datetime')");
        foreach ((array) $colunasData as $ind => $valor) {
            switch ($valor["tipo"]) {
                case "date":
                    $formato = "%d/%m/%Y";
                    break;
                case "datetime":
                    $formato = "%d/%m/%Y %H:%i:%s";
                    break;
            }
            $camposExtra[] = "DATE_FORMAT($valor[campo], '$formato') as $valor[campo]2";
        }
        if (is_array($camposExtra)) {
            $camposExtra = ", " . implode(",", $camposExtra);
        }
        $sql = "SELECT `{$this->tabela}`.{$this->campos}{$camposExtra} FROM `$this->tabela` $filtro $order $limit";
        $res = mysql_query($sql, $conexao) or die(mysql_error() . " - " . $sql);
        return $res;
    }

    function consultaId_db_2($id, $conexao) {
        $consulta = $this->consultaDB("WHERE id = $id", '', '', $conexao);
        return mysql_fetch_assoc($consulta);
    }

    function apagar($campoFormulario) {
        foreach ((array) $this->valores->$campoFormulario as $ind => $valor) {
            $this->apagaId($valor);
        }
    }

    function apagaId($id, $logico = false) {
        $this->upload = $this->upload();
        if ($this->pathArquivo != "") {
            $this->upload->apagaArquivo($id);
        } else {
            if ($logico) {
                $sql = "UPDATE $this->tabela SET excluido = '1' WHERE id = '$id'";
            } else {
                $sql = "DELETE FROM $this->tabela WHERE id = '$id'";
            }
            $run = mysql_query($sql);
        }
        return true;
    }

    function apaga($filtro, $logico = false) {
        if ($logico) {
            $sql = "UPDATE $this->tabela SET excluido = '1' $filtro";
        } else {
            $sql = "DELETE FROM $this->tabela $filtro";
        }
        $run = mysql_query($sql) or die(mysql_error());
        if ($run) {
            return true;
        } else {
            return false;
        }
    }

    function persist($id = "") {
        $this->upload = $this->upload();
        $colunas = $this->colunas();

        $new_val = array();

        foreach ($colunas as $coluna) {
            if (array_key_exists($coluna["campo"], $this->valores)) {
                $indice = $coluna["campo"];
                $valor = addslashes($this->valores->$indice);

                switch ($coluna["tipo"]) {
                    case "decimal":
                    case "float":
                    case "double":
                        $valor = vtop($valor);
                        $validado = ($valor > 0);
                        break;
                    case "int":
                        $valor = (int) $valor;
                        $validado = ($valor > 0);
                        break;
                    case "date":
                        $validado = ($valor != "");
                        $valor = datamysql($valor);
                        break;
                    case "datetime":
                        $validado = ($valor != "");
                        $valor = dataHoraMysql($valor);
                        break;
                    case "varchar":
                        $valor = strip_tags($valor);
                    default:
                        $validado = ($valor) ? true : false;
                        break;
                }
                if ($coluna["campo"] != "data_alteracao") {
                    if (!$validado && $coluna["nullable"] == "YES") {
                        $campos[] = "{$coluna["campo"]} = NULL";
                    } else {
                        $campos[] = "{$coluna["campo"]} = '" . stripslashes($valor) . "'";
                    }
                }
            }
            if (array_key_exists($coluna["campo"], (array) $this->required) && !$validado) {
                $this->erros[] = "Preencha o campo: {$this->required[$coluna["campo"]]}";
            }
        }
        if (is_array($campos) && !is_array($this->erros)) {
            if (!$id) {
                $campos[] = "data_cadastro = NOW()";
            }
            $campos[] = "data_alteracao = NOW()";
            $values = implode(", ", $campos);
            if ($id) {
                $comando = "UPDATE";
                $condicao = "WHERE id = '$id'";
                $ext = pathinfo($_FILES[$this->campoNomeArquivo]["name"], PATHINFO_EXTENSION);
                if ($this->pathArquivo != "" && $_FILES[$this->campoNomeArquivo]["size"] > 0 && in_array(strtolower($ext), $this->extensions)) {
                    $this->upload->removeArquivo($id);
                }
                /* VALOR ANTIGO - LOG */
                $old_val = $this->consultaId($id);
            } else {
                $comando = "INSERT";
            }

            /* VALOR NOVO - LOG */
            $campo_array = explode(",", $values);
            foreach($campo_array as $camp_arr) {
                $camp = explode("=", $camp_arr);
                $new_val[$camp[0]] = $camp[1];
            }

            $sql = "$comando $this->tabela SET $values $condicao";
            mysql_query("BEGIN");
            $run = mysql_query($sql) or die(mysql_error());
        }
        if ($run) {
            $id = ($id) ? $id : mysql_insert_id();
            if ($this->pathArquivo != "" && $_FILES[$this->campoNomeArquivo]["size"] > 0) {
                $upload = $this->upload->uploadArquivo($this->campoNomeArquivo, $id);
                if (!$upload) {
                    $this->erros[] = "Erro ao fazer upload!";
                }
            }
        }
        if (!is_array($this->erros)) {
            mysql_query("COMMIT");
            echo mysql_error();
            $this->status = "OK";
            $this->mensagem = "Operação realizada com sucesso.";
            $retorno = $id;
            if(!array_key_exists("id", $new_val)) {
                $new_val["id"] = $id;
            }
            $this->log_alteracao($new_val, $old_val, $this->tabela, $comando);
        } else {
            mysql_query("ROLLBACK");
            $this->status = "ERRO";
            $this->mensagem = $this->erros;
            $retorno = false;
        }

        return $retorno;
    }

    function updateSql($coluna, $filtro = "") {
        /* VALOR ANTIGO - LOG */
        $old_val = mysql_fetch_assoc($this->consulta($filtro));

        $sql = "UPDATE `$this->tabela` SET $coluna $filtro";
        $res = mysql_query($sql) or die(mysql_error() . " - " . $sql);

        /* VALOR NOVO - LOG */
        $retira_where = str_replace("WHERE", "", $filtro);
        $troca_and = str_replace("AND", ",", $retira_where);
        $coluna .= ",".$troca_and;
        $campo_array = explode(",", $coluna);
        foreach($campo_array as $camp_arr) {
            $camp = explode("=", $camp_arr);
            $new_val[$camp[0]] = $camp[1];
        }
        $this->log_alteracao($new_val, $old_val, $this->tabela, "UPDATE");
        return $res;
    }

    function mensagem() {
        switch ($this->status) {
            case "OK":
                echo "<div class='alert alert-success h6 mgn-t-0 pnl-msg'>$this->mensagem</div>";
                break;
            case "ERRO":
                echo "<div class='alert alert-danger h6 mgn-t-0 pnl-msg'>"
                . "<b >Ocorreram os seguintes erros:</b><br/><br/>";
                foreach ($this->mensagem as $ind => $valor) {
                    echo " - $valor<br/>";
                }
                echo "</div>";
                break;
        }
    }

    function log_alteracao($valor_novo = "", $valor_antigo = "", $tabela, $comando) {
//        $ip = $_SERVER["REMOTE_ADDR"];
//        $sql = "INSERT INTO log_alteracao (`usuario_fk`, `usuario_nome`, `ip`, `tabela`, `acao`, `valor_novo`, `valor_antigo`, `data`) VALUES (".$_SESSION["user_pnl"]["id"].", '".mysql_real_escape_string($_SESSION["user_pnl"]["nm"])."', '{$ip}', '{$tabela}', '{$comando}', '". mysql_real_escape_string(serialize($valor_novo))."', '". mysql_real_escape_string(serialize($valor_antigo))."', NOW())";
//        $res = mysql_query($sql) or die(mysql_error() . " - " . $sql);
    }
}
