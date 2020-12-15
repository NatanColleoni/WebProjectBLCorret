<?php

    if (!function_exists("array_column")) {
        function array_column(array $array, $columnKey, $indexKey = null) {
            $result = array();
            foreach ($array as $subArray) {
                if (!is_array($subArray)) {
                    continue;
                } elseif (is_null($indexKey) && array_key_exists($columnKey, $subArray)) {
                    $result[] = $subArray[$columnKey];
                } elseif (array_key_exists($indexKey, $subArray)) {
                    if (is_null($columnKey)) {
                        $result[$subArray[$indexKey]] = $subArray;
                    } elseif (array_key_exists($columnKey, $subArray)) {
                        $result[$subArray[$indexKey]] = $subArray[$columnKey];
                    }
                }
            }
            return $result;
        }
    }

    function validar_cpf($cpf) {
        $cpf = preg_replace("/[^0-9]/is", "", $cpf );

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match("/(\d)\1{10}/", $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }

    function validar_cnpj($cnpj) {
        $cnpj = preg_replace("/[^0-9]/", "", (string) $cnpj);

        if (strlen($cnpj) != 14) {
            return false;
        }

        if (preg_match("/(\d)\1{13}/", $cnpj)) {
            return false;
        }

        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    function verificaImg($img, $way, $semImg = "logo.png") {
        global $pathSite;
        if (substr($img, 0, 5) == "mini_") {
            $tpMin = substr($img, 5);
            $img = $tpMin;
        }
        if (!empty($img)) {
            $result["nl"] = $pathSite . $way . $img;
            $result["sm"] = $pathSite . $way . "mini_" . $img;
            $result["status"] = "1";
        } else {
            $result["nl"] = $pathSite . "library/img/{$semImg}";
            $result["sm"] = $pathSite . "library/img/{$semImg}";
            $result["status"] = "0";
        }
        return $result;
    }

    function createTinyUrl($strURL) {
        $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=" . $strURL);
        return $tinyurl;
    }
?>