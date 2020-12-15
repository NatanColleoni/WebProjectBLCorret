<?

function datamysql($data) {
    if ($data <> "") {
        $data = explode("/", $data);
        $data = $data[2] . "-" . $data[1] . "-" . $data[0];
    } else {
        $data = "NULL";
    }
    return($data);
}

function dataHoraMysql($dataHora) {
    if ($dataHora <> "") {
        $dataHora = explode(" ", $dataHora);
        $data = explode("/", $dataHora[0]);
        $data = $data[2] . "-" . $data[1] . "-" . $data[0];
        $dataHora = $data . " " . $dataHora[1];
    } else {
        $dataHora = "NULL";
    }
    return $dataHora;
}

function dataPorExtenso($cidade) {
    $texto .= $cidade . ", " . date("d") . " de " . mes(date("m")) . " de " . date("Y");
    return $texto;
}

function mes($mes) {
    switch ($mes) {
        case 1: $mes = "Janeiro";
            break;
        case 2: $mes = "Fevereiro";
            break;
        case 3: $mes = "Março";
            break;
        case 4: $mes = "Abril";
            break;
        case 5: $mes = "Maio";
            break;
        case 6: $mes = "Junho";
            break;
        case 7: $mes = "Julho";
            break;
        case 8: $mes = "Agosto";
            break;
        case 9: $mes = "Setembro";
            break;
        case 10: $mes = "Outubro";
            break;
        case 11: $mes = "Novembro";
            break;
        case 12: $mes = "Dezembro";
            break;
    }
    return $mes;
}

function diaSemana($dia) {
    switch ($dia) {
        case 0: $dia = "DOMINGO";
            break;
        case 1: $dia = "SEGUNDA FEIRA";
            break;
        case 2: $dia = "TERÇA-FEIRA";
            break;
        case 3: $dia = "QUARTA-FEIRA";
            break;
        case 4: $dia = "QUINTA-FEIRA";
            break;
        case 5: $dia = "SEXTA-FEIRA";
            break;
        case 6: $dia = "SÁBADO";
            break;
    }
    
    return $dia;
}

function mescurto($mes) {
    switch ($mes) {
        case 1: $mes = "Jan";
            break;
        case 2: $mes = "Fev";
            break;
        case 3: $mes = "Mar";
            break;
        case 4: $mes = "Abr";
            break;
        case 5: $mes = "Mai";
            break;
        case 6: $mes = "Jun";
            break;
        case 7: $mes = "Jul";
            break;
        case 8: $mes = "Ago";
            break;
        case 9: $mes = "Set";
            break;
        case 10: $mes = "Out";
            break;
        case 11: $mes = "Nov";
            break;
        case 12: $mes = "Dez";
            break;
    }
    return $mes;
}

;

function formataData($data) {
    $data = explode("-", $data);
    $data = "$data[2]/$data[1]/$data[0]";
    return $data;
}

function formataDataPonto($data) {
    $data = explode("-", $data);
    $data = "$data[2].$data[1].$data[0]";
    return $data;
}

function formataDataHora($data) {
    $data = explode(" ", $data);
    $hora = $data[1];
    $data = $data[0];
    $data = formataData($data);
    return $data . " " . $hora;
}