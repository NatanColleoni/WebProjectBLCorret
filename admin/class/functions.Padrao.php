<?

function boasVindas() {
    $hora = date("H");
    switch ($hora) {
        case ($hora > "18"):
            return "Boa noite";
            break;
        case ($hora > "12"):
            return "Boa tarde";
            break;
        default:
            return "Bom dia";
            break;
    }
}

function url($url, $scheme = "http://") {
    if ($url) {
        if (parse_url($url, PHP_URL_SCHEME) === null) {
            return $scheme . $url;
        }
        return $url;
    }
}

function idYT($url) {
    if ($url) {
        $last_bar = explode("/", $url);
        $last = end($last_bar);
        $verifica_string = strpos($last, "watch?v=");
        if(is_numeric($verifica_string)) {
            $last = substr($last, 8, strlen($last));
        }
        return $last;
    }
}

function boolean($boolean) {
    if ($boolean > 0) {
        return "Sim";
    } else {
        return "Não";
    }
}

function videoThumb($idVideo, $fonte, $titulo = "", $largura = "", $padding = "", $center = false, $return = false) {
    if ($idVideo) {
        switch ($fonte) {
            case "YOUTUBE":
                $src = "http://img.youtube.com/vi/$idVideo/0.jpg";
                break;
            case "VIMEO":
                $dados = @simplexml_load_file("http://vimeo.com/api/v2/video/$idVideo.xml");
                $src = $dados->video->thumbnail_medium;
                break;
        }
        if ($src) {
            if ($padding) {
                $padding = "padding: $padding";
            }
            if ($return) {
                return $src;
            } else {
                if ($center) {
                    $resize = "onload='resizeToRatio(this, $largura, " . ($largura / 2) . ", 1, 1)'";
                } else {
                    $resize = "width = '$largura'";
                }
                echo "<img alt='$titulo' title='$titulo' src='$src' style='$padding' $resize class='videoThumb'/>";
            }
        }
    }
}

function imgThumb($pathArquivo, $nomeArquivo, $width, $height, $title = "", $link = "", $rel = "", $mini = "mini_", $centerH = false, $centerV = false, $target = "") {
    global $pathSite;
    $fileType = imagetype($pathArquivo . $nomeArquivo);

    if ($fileType) {
        if ($fileType == "image") {
            if ($link) {
                ?>
                <a href="<?= $link ?>" rel="<?= $rel ?>" target="<?= $target ?>">
                    <?
                }
                ?>
                <img alt="<?= $title ?>" title="<?= $title ?>" src="<?= $pathArquivo ?><?= ($mini) ? $mini : "" ?><?= $nomeArquivo ?>" <?= (!strstr($width, "%")) ? "onload='resizeToRatio(this, $width, $height, " . (int) $centerH . ", " . (int) $centerV . ")'" : "width='$width'" ?>/>
                <?
                if ($link) {
                    ?>
                </a>
                <?
            }
        } elseif ($fileType == "swf") {
            $test = getimagesize($pathArquivo . $nomeArquivo);
            $widthArquivo = $test[0];
            $heightArquivo = $test[1];
            if ($widthArquivo >= $heightArquivo) {
                $ratio = $widthArquivo / $heightArquivo;
                $height = $width / $ratio;
            } else {
                $ratio = $heightArquivo / $widthArquivo;
                $width = $height / $ratio;
            }
            ?>
            <object type="application/x-shockwave-flash" data="<?= $pathArquivo . $nomeArquivo ?>" width="100%" height="100%">
                <param name="movie" value="<?= $pathArquivo . $nomeArquivo ?>" />
                <param name="quality" value="high"/>
                <param name="wmode" value="transparent"/>
            </object>
            <?
        }
    } else {
        if ($link) {
            ?>
            <a href="<?= $link ?>" rel="<?= $rel ?>" target="<?= $target ?>">
                <?
            }
            ?>
            <img alt="<?= $title ?>" title="<?= $title ?>" src="<?= $pathSite ?>imagens/semFoto.png" <?= (!strstr($width, "%")) ? "onload='resizeToRatio(this, $width, $height, " . (int) $centerH . ", " . (int) $centerV . ")'" : "width='$width'" ?>/>
            <?
            if ($link) {
                ?>
            </a>
            <?
        }
    }
}

function imagetype($arquivo) {
    if (function_exists("exif_imagetype")) {
        $test = @exif_imagetype($arquivo);
        $image_type = $test;
    } else {
        $test = getimagesize($arquivo);
        $image_type = $test[2];
    }
    if ($test) {
        if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
            return "image";
        } elseif (in_array($image_type, array(IMAGETYPE_SWF, IMAGETYPE_SWC))) {
            return "swf";
        }
    } else {
        return false;
    }
}

function validaDocumento($documento) {
    $l = strlen($documento = str_replace(array(".", "-", "/"), "", $documento));
    if ((!is_numeric($documento)) || (!in_array($l, array(11, 14))) || (count(count_chars($documento, 1)) == 1)) {
        return false;
    }
    $cpfj = str_split(substr($documento, 0, $l - 2));
    $k = 9;
    for ($j = 0; $j < 2; $j++) {
        for ($i = (count($cpfj)); $i > 0; $i--) {
            $s += $cpfj[$i - 1] * $k;
            $k--;
            $l == 14 && $k < 2 ? $k = 9 : 1;
        }
        $cpfj[] = $s % 11 == 10 ? 0 : $s % 11;
        $s = 0;
        $k = 9;
    }
    if ($documento == join($cpfj)) {
        return $documento;
    }
    return false;
}

function fetch_all($consulta) {
    while ($registro = mysql_fetch_assoc($consulta)) {
        $resultado[] = $registro;
    }
    return $resultado;
}
function limpaTelefone($item){
	$item = trim($item);
	$item = str_replace("(", "", $item);
	$item = str_replace(")", "", $item);
	$item = str_replace("-", "", $item);
	$item = str_replace(" ", "", $item); 
	$item = str_replace(".", "", $item); 
	return $item; 
}

function ex_itens($item){
	$item = explode(" ", $item);
	return $item;
}

function ex_itensmail($item){
	$item = explode("@", $item);
	return $item;
}