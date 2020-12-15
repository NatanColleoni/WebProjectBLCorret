<?php

function converteArrayFiles($arrayFiles) {
    foreach ((array) $arrayFiles['size'] as $ind => $valor) {
        if ($valor > 0) {
            $retorno[$ind] = array(
                "name" => $arrayFiles['name'][$ind],
                "type" => $arrayFiles['type'][$ind],
                "tmp_name" => $arrayFiles['tmp_name'][$ind],
                "error" => $arrayFiles['error'][$ind],
                "size" => $arrayFiles['size'][$ind]
            );
        }
    }
    return $retorno;
}