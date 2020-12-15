<?

class Upload {

    public $diretorio = "";
    public $tabela = "";
    public $campoBD = "";
    public $extensions = array(
        "jpg", "jpeg", "png", "gif", "doc", "docx", "xls", "xlsx", "pdf", "txt", "ppt", "pptx", "pps", "ppsx", "swf", "svg", "webm", "mp4", "mkv", "avi", "rmvb"
    );

    // Seta o diretório, nome da tabela, o nome do campo da tabela que armazena o nome do arquivo que vai ser manipulado e o prefixo do arquivo da imagem miniatura
    function __construct($diretorio, $tabela, $campoBD, $prefixoMiniatura = "mini_", $prefixoMarcaDagua = "", $extensions = array()) {
        $this->diretorio = $diretorio;
        $this->tabela = $tabela;
        $this->campoBD = $campoBD;
        $this->prefixoMiniatura = $prefixoMiniatura;
        $this->prefixoMarcaDagua = $prefixoMarcaDagua;
        $this->extensions = $extensions;
    }

    // Recebe o nome do campo do formulário que está enviando o arquivo - Função utilizada para gravar arquivo em um registro já existente
    function uploadArquivo($campoFormulario, $idGravado) {
        $ext = pathinfo($_FILES[$campoFormulario]["name"], PATHINFO_EXTENSION);
        if (($_FILES[$campoFormulario]["name"] <> "") && ($_FILES[$campoFormulario]["size"]) > 0 && in_array(strtolower($ext), $this->extensions)) {
            $arquivoTmp = $_FILES[$campoFormulario]["tmp_name"];
            $nome = str_replace(".", "", microtime(true)) . "_" . arruma_string($_FILES[$campoFormulario]["name"]);

            if (function_exists("exif_imagetype")) {
                $test = @exif_imagetype($arquivoTmp);
                $image_type = $test;
            } else {
                $test = getimagesize($arquivoTmp);
                $image_type = $test[2];
            }

            if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
                $image = new SimpleImage();
                $image->load($arquivoTmp);
                $l = $image->getWidth();
                $h = $image->getHeight();
                if ($l > $h) {
                    $funcao = "resizeToWidth";
                    $novoTamanho = 1920;
                } else {
                    $funcao = "resizeToHeight";
                    $novoTamanho = 1084;
                }
                $image->$funcao($novoTamanho);
                $copiou = $image->save($this->diretorio . $nome);
                if ($this->prefixoMarcaDagua) {
                    $image->$funcao(300);
                    $image->watermark();
                    $image->save($this->diretorio . $this->prefixoMarcaDagua . $nome);
                }
                if ($this->prefixoMiniatura) {
                    $image->load($arquivoTmp);
                    $image->$funcao(380);
                    $image->save($this->diretorio . $this->prefixoMiniatura . $nome);
                }
            } else {
                $copiou = copy($arquivoTmp, $this->diretorio . $nome);
            }
            if ($copiou) {
                $sql = "update `$this->tabela` set $this->campoBD = '$nome' where id='$idGravado'";
                $altualizaNome = mysql_query($sql) or die($sql . mysql_error());
            }
            
        } else {
            return false;
        }
        return $idGravado;
    }

    // Recebe o id do registro que armazena o nome do arquivo - Efetiva a exclusão do arquivo do disco
    function delArquivo($id) {
        $sql = "select * from `$this->tabela` where id='$id'";
        $consulta = mysql_query($sql) or die($sql . mysql_error());
        $campo = mysql_fetch_assoc($consulta);
        $enderecoArquivo = $this->diretorio . $campo[$this->campoBD];
        if (file_exists($enderecoArquivo) and $campo[$this->campoBD]) {
            $excluirArquivo = unlink($enderecoArquivo);
        }

        if ($this->prefixoMarcaDagua) {
            $enderecoArquivoMini = $this->diretorio . $this->prefixoMarcaDagua . $campo[$this->campoBD];
            if (file_exists($enderecoArquivoMini) and $campo[$this->campoBD]) {
                $excluirArquivo = unlink($enderecoArquivoMini);
            }
        }
        if ($this->prefixoMiniatura) {
            $enderecoArquivoMini = $this->diretorio . $this->prefixoMiniatura . $campo[$this->campoBD];
            if (file_exists($enderecoArquivoMini) and $campo[$this->campoBD]) {
                $excluirArquivo = unlink($enderecoArquivoMini);
            }
        }

        if ($consulta) {
            return true;
        } else {
            return false;
        }
    }

    // Recebe o id do registro na tabela - Remove o arquivo de um registro sem apagar o registro
    function removeArquivo($id) {
        if ($this->delArquivo($id)) {
            $sql = "update `$this->tabela` set $this->campoBD = '' where id=" . $id;
            $excluir = mysql_query($sql);
        }
    }

    // Recebe o id do registro na tabela - Apaga o arquivo e exclui o registro
    function apagaArquivo($id) {
        if ($this->delArquivo($id)) {
            $sql = "delete from `$this->tabela` WHERE id='$id'";
            $excluir = mysql_query($sql);
        }
    }

    // Recebe o nome do campo do formulário que está mandando os id's que vão ser excluidos
    function apagaArquivos($campoFormulario) {
        if ($_POST[$campoFormulario]) {
            for ($i = 0; $i < count($_POST[$campoFormulario]); $i++) {
                $this->apagaArquivo($_POST[$campoFormulario][$i], $this->campoBD);
            }
        }
    }
}