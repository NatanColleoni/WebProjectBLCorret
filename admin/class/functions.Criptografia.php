<?

function base64_url_encode($input) {
    return strtr(base64_encode($input), '+/=', '-_,');
}

function base64_url_decode($input) {
    return base64_decode(strtr($input, '-_,', '+/='));
}

function randomizar($iv_len) {
    $iv = '';
    while ($iv_len-- > 0) {
        $iv .= chr($iv_len & 0xff);
    }
    return $iv;
}

function cr($texto, $senha = "1nqv3w5", $iv_len = 16) {
    $texto .= "\x13";
    $n = strlen($texto);
    if ($n % 16)
        $texto .= str_repeat("\0", 16 - ($n % 16));
    $i = 0;
    $Enc_Texto = randomizar($iv_len);
    $iv = substr($senha ^ $Enc_Texto, 0, 512);
    while ($i < $n) {
        $Bloco = substr($texto, $i, 16) ^ pack('H*', md5($iv));
        $Enc_Texto .= $Bloco;
        $iv = substr($Bloco . $iv, 0, 512) ^ $senha;
        $i += 16;
    }
    $x = base64_url_encode($Enc_Texto);
    return $x;
}

function dr($Enc_Texto, $senha = "1nqv3w5", $iv_len = 16) {
    $Enc_Texto = base64_url_decode($Enc_Texto);
    $n = strlen($Enc_Texto);
    $i = $iv_len;
    $texto = '';
    $iv = substr($senha ^ substr($Enc_Texto, 0, $iv_len), 0, 512);
    while ($i < $n) {
        $Bloco = substr($Enc_Texto, $i, 16);
        $texto .= $Bloco ^ pack('H*', md5($iv));
        $iv = substr($Bloco . $iv, 0, 512) ^ $senha;
        $i += 16;
    }
    return preg_replace('/\\x13\\x00*$/', '', $texto);
}