<?

function previsaotempo($arrayCidades) {
    global $pathSite;
    global $diretorioInicial;
    $tempo[ec][] = "Encoberto com Chuvas Isoladas";
    $tempo[ec][] = "chuva.png";

    $tempo[ci][] = "Chuvas Isoladas";
    $tempo[ci][] = "chuva.png";

    $tempo[c][] = "Chuva";
    $tempo[c][] = "chuva.png";

    $tempo[in][] = "Instável";
    $tempo[in][] = "nublado.png";

    $tempo[pp][] = "Poss. de Pancadas de Chuva";
    $tempo[pp][] = "chuva.png";

    $tempo[cm][] = "Chuva pela Manhã";
    $tempo[cm][] = "chuva.png";

    $tempo[pt][] = "Pancadas de Chuva a Tarde";
    $tempo[pt][] = "chuva.png";

    $tempo[pm][] = "Pancadas de Chuva pela Manhã";
    $tempo[pm][] = "chuva.png";

    $tempo[np][] = "Nublado e Pancadas de Chuva";
    $tempo[np][] = "chuva.png";

    $tempo[pc][] = "Pancadas de Chuva";
    $tempo[pc][] = "chuva.png";

    $tempo[pn][] = "Parcialmente Nublado";
    $tempo[pn][] = "nublado.png";

    $tempo[cv][] = "Chuvisco";
    $tempo[cv][] = "chuva.png";

    $tempo[ch][] = "Chuvoso";
    $tempo[ch][] = "chuva.png";

    $tempo[t][] = "Tempestade";
    $tempo[t][] = "tempestade.png";

    $tempo[ps][] = "Predomínio de Sol";
    $tempo[ps][] = "sol.png";

    $tempo[e][] = "Encoberto";
    $tempo[e][] = "nublado.png";

    $tempo[n][] = "Nublado";
    $tempo[n][] = "nublado.png";

    $tempo[cl][] = "Céu Claro";
    $tempo[cl][] = "sol.png";

    $tempo[nv][] = "Nevoeiro";
    $tempo[nv][] = "nublado.png";

    $tempo[g][] = "Geada";
    $tempo[g][] = "neve.png";

    $tempo[ne][] = "Neve";
    $tempo[ne][] = "neve.png";

    $tempo[nd][] = "Não Definido";
    $tempo[nd][] = "nao.png";

    $tempo[pnt][] = "Pancadas de Chuva a Noite";
    $tempo[pnt][] = "chuva.png";

    $tempo[psc][] = "Possibilidade de Chuva";
    $tempo[psc][] = "chuva.png";

    $tempo[pcm][] = "Possibilidade de Chuva pela Manhã";
    $tempo[pcm][] = "chuva.png";

    $tempo[pct][] = "Possibilidade de Chuva a Tarde";
    $tempo[pct][] = "chuva.png";

    $tempo[pcn][] = "Possibilidade de Chuva a Noite";
    $tempo[pcn][] = "chuva.png";

    $tempo[npt][] = "Nublado com Pancadas a Tarde";
    $tempo[npt][] = "nublado.png";

    $tempo[npn][] = "Nublado com Pancadas a Noite";
    $tempo[npn][] = "nublado.png";

    $tempo[ncn][] = "Nublado com Poss. de Chuva a Noite";
    $tempo[ncn][] = "nublado.png";

    $tempo[nct][] = "Nublado com Poss. de Chuva a Tarde";
    $tempo[nct][] = "nublado.png";

    $tempo[ncm][] = "Nubl. c/ Poss. de Chuva pela Manhã";
    $tempo[ncm][] = "nublado.png";

    $tempo[npm][] = "Nublado com Pancadas pela Manhã";
    $tempo[npm][] = "nublado.png";

    $tempo[npp][] = "Nublado com Possibilidade de Chuva";
    $tempo[npp][] = "nublado.png";

    $tempo[vn][] = "Variação de Nebulosidade";
    $tempo[vn][] = "nublado.png";

    $tempo[ct][] = "Chuva a Tarde";
    $tempo[ct][] = "chuva.png";

    $tempo[ppn][] = "Poss. de Panc. de Chuva a Noite";
    $tempo[ppn][] = "chuva.png";

    $tempo[ppt][] = "Poss. de Panc. de Chuva a Tarde";
    $tempo[ppt][] = "chuva.png";

    $tempo[ppm][] = "Poss. de Panc. de Chuva pela Manhã";
    $tempo[ppm][] = "chuva.png";

    foreach ($arrayCidades as $ind => $cidade) {
        $cidade = arruma_string($cidade);
        $linkCidade = str_replace(" ", "%20", $cidade);
        $hoje = getdate();
        if (strlen($hoje[mon]) != 2) {
            $hoje[mon] = "0$hoje[mon]";
        }
        if (strlen($hoje[mday]) != 2) {
            $hoje[mday] = "0$hoje[mday]";
        }
        if (file_exists("{$diretorioInicial}/tempo/$cidade.xml")) {
            $consultaTempo = simplexml_load_file("{$diretorioInicial}/tempo/$cidade.xml");
            if ("$consultaTempo->atualizacao" != "$hoje[year]-$hoje[mon]-$hoje[mday]") {
                $consultaCidade = simplexml_load_file("http://servicos.cptec.inpe.br/XML/listaCidades?city=$linkCidade");
                $codigo = $consultaCidade->cidade;
                $id = $codigo->id;
                if ($id == "") {
                    return false;
                }
                $consultaTempo = simplexml_load_file("http://servicos.cptec.inpe.br/XML/cidade/$id/previsao.xml");
                $consultaTempo->asXML("{$diretorioInicial}/tempo/$cidade.xml");
            }
        } else {
            $consultaCidade = simplexml_load_file("http://servicos.cptec.inpe.br/XML/listaCidades?city=$linkCidade");
            $codigo = $consultaCidade->cidade;
            $id = $codigo->id;
            if ($id == "") {
                return false;
            }
            $consultaTempo = simplexml_load_file("http://servicos.cptec.inpe.br/XML/cidade/$id/previsao.xml");
            $consultaTempo->asXML("{$diretorioInicial}/tempo/$cidade.xml");
        }
        $retorno = array();
        $retorno[nome] = utf8_decode($consultaTempo->nome);
        $retorno[uf] = $consultaTempo->uf;
        $previsao = $consultaTempo->previsao;
        foreach ($previsao as $ind => $prev) {
            $i++;
            $retorno['dia' . $i][dia] = utf8_decode("$prev->dia");
            $retorno['dia' . $i][cod] = utf8_decode("$prev->tempo");
            $retorno['dia' . $i][tempo] = $tempo["$prev->tempo"][0];
            $retorno['dia' . $i][imagem] = utf8_decode($tempo["$prev->tempo"][1]);
            $retorno['dia' . $i][maxima] = utf8_decode("$prev->maxima");
            $retorno['dia' . $i][minima] = utf8_decode("$prev->minima");
        }
        $return[] = $retorno;
    }
    return $return;
}