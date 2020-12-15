<?

function removeAcento($nomeParaSerConvertido) {
    $temp = strtr($nomeParaSerConvertido, "ABCDEFGHIJKLMNOPQRSTUVXZYWáàâãäéèêëíìîïóòôõöúùûüçÁÀÂÃÄÉÈÊËÍÌÎÏÓÒÔÕÖÚÙÛÜÇ",
                                          "abcdefghijklmnopqrstuvxzywaaaaaeeeeiiiiooooouuuucaaaaaeeeeiiiiooooouuuuc");
    $nomeConvertido = ereg_replace('[^a-z0-9_.]', '', $temp);
    return $nomeConvertido;
}

function converteParaUrlValida($nomeParaSerConvertido) {
    $temp = strtr($nomeParaSerConvertido, "ABCDEFGHIJKLMNOPQRSTUVXZYWáàâãäéèêëíìîïóòôõöúùûüçÁÀÂÃÄÉÈÊËÍÌÎÏÓÒÔÕÖÚÙÛÜÇ ",
                                          "abcdefghijklmnopqrstuvxzywaaaaaeeeeiiiiooooouuuucaaaaaeeeeiiiiooooouuuuc_");
    $nomeConvertido = ereg_replace('[^a-z0-9_.]', '', $temp);
    return $nomeConvertido;
}

function arruma_string($string) {
    return converteParaUrlValida($string);
}

function converteUTFparaISO($vetor) { // Recebe &$_POST ou similar
    foreach ($vetor as $campo => $valor) {
        $vetor[$campo] = utf8_decode($vetor[$campo]);
    }
}

function quebrar_texto($texto, $tamanho) {
    $texto = strip_tags($texto);
    $texto = html_entity_decode($texto, ENT_COMPAT, 'ISO-8859-1');
    $texto = trim($texto);

    $vetor = explode(" ", $texto);
    $cont = 0;
    foreach ($vetor as $valor) {
        $cont += strlen($valor) + 1;

        if ($tamanho >= $cont)
            $resTxt .= $valor . " ";
        else
            break;
    }
    return $resTxt . ((strlen($texto) > $tamanho) ? "[...]" : "");
}