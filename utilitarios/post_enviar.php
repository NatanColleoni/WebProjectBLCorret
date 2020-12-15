<?
/* ENVIAR CONTATO */
if($_POST["enviarcontato"]) {
    $cEmailContato = new Base("email");
    $email_contato = fetch_all($cEmailContato->consultaJoin("email.nome, email.email",
            "LEFT JOIN email_rf_ctg ON email_rf_ctg.email_fk = email.id",
            "WHERE email_rf_ctg.email_ctg_fk = 1"));

    $nome = trim($_POST["nome"]);
    if (!$_POST["nome"]) {
        $erro[] = "Preencha o campo nome";
    }

    $telefone = trim($_POST["telefone"]);
    $celular = trim($_POST["celular"]);
    

    $email = trim($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || (!$_POST["email"])) {
        $erro[] = "Preencha o campo e-mail com um endereço válido";
    }

    $mensagem = trim($_POST["mensagem"]);
    $servicofk = trim($_POST["seguro_fk"]);
    if (!$_POST["mensagem"]) {
        $erro[] = "Preencha o campo mensagem";
    }

    $assunto = "Contato";

    if (!$erro) {
        $_POST["nome"] = $nome;
        $_POST["email"] = $email;
        $_POST["seguro_fk"] = $servico;
        $_POST["telefone"] = $telefone;
        $_POST["celular"] = $celular;
        $_POST["assunto"] = $assunto;
        $_POST["mensagem"] = $mensagem;
//        $_POST["nome"] = mysql_real_escape_string($nome);
//        $_POST["email"] = mysql_real_escape_string($email);
//        $_POST["telefone"] = mysql_real_escape_string($telefone);
//        $_POST["assunto"] = mysql_real_escape_string($assunto);
//        $_POST["mensagem"] = mysql_real_escape_string($mensagem);
        $_POST["ip"] = $ip;
        $contato = new Base("contato");
        $contato->importArray($_POST);
        $gravou = $contato->persist();
    }

    if ($gravou) {
        $swal_titulo = "Obrigado, ".$nome;
        $swal_msg = "Contato enviado com sucesso!";
        ob_start();
        ?>
        <div style="border: solid 1px #cfcfcf; padding: 15px; font-family: 'helvetica'; color: #5d5d5d; width: 60%; margin: auto; background: #f7f7f7; padding: 20px;">
            <p><strong>Nome:</strong> <?= $nome ?>;</p>
            <p><strong>E-mail:</strong> <?= $email ?>;</p>
            <p><strong>Telefone:</strong> <?= $telefone ?>;</p>
            <p><strong>Celular:</strong> <?= $celular ?>;</p>
            <p><strong>Mensagem:</strong> <?= $mensagem ?>;</p>
        </div>
        <?
        $mensagemEmail = ob_get_clean();

        if($email_contato) {
            $i = 0;
            foreach ($email_contato as $ind => $email_lista_contato) {
                $email_lista = explode(",", $email_lista_contato["email"]);
                foreach($email_lista as $e_cont) {
                    $i++;
                    $arrayEmail[$i]["email"] = $e_cont;
                    $arrayEmail[$i]["nome"] = $email_lista_contato["nome"];
                }
            }

            $replyTo = array("email" => $email, "nome" => $nome);

            //E-mail para Empresa
            $envio = enviaNotificacao("$mensagemEmail", $arrayEmail, "", $assunto . " - {$configs["titulo"]}", $replyTo);
        }

        unset($_POST);
    }
}
if($_POST["enviarorcamento"]) {
    $cEmailContato = new Base("email");
    $email_contato = fetch_all($cEmailContato->consultaJoin("email.nome, email.email",
            "LEFT JOIN email_rf_ctg ON email_rf_ctg.email_fk = email.id",
            "WHERE email_rf_ctg.email_ctg_fk = 1"));

    $nome = trim($_POST["nome"]);
    if (!$_POST["nome"]) {
        $erro[] = "Preencha o campo nome";
    }

    $telefone = trim($_POST["telefone"]);
    $celular = trim($_POST["celular"]);
    

    $email = trim($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || (!$_POST["email"])) {
        $erro[] = "Preencha o campo e-mail com um endereço válido";
    }

    $mensagem = trim($_POST["mensagem"]);
    $servicofk = trim($_POST["seguro_fk"]);
    if (!$_POST["mensagem"]) {
        $erro[] = "Preencha o campo mensagem";
    }

    $assunto = "Orçamento";

    if (!$erro) {
        $_POST["nome"] = $nome;
        $_POST["email"] = $email;
        $_POST["seguro_fk"] = $_POST["seguro_fk"];
        $_POST["telefone"] = $telefone;
        $_POST["celular"] = $celular;
        $_POST["assunto"] = $assunto;
        $_POST["mensagem"] = $mensagem;
//        $_POST["nome"] = mysql_real_escape_string($nome);
//        $_POST["email"] = mysql_real_escape_string($email);
//        $_POST["telefone"] = mysql_real_escape_string($telefone);
//        $_POST["assunto"] = mysql_real_escape_string($assunto);
//        $_POST["mensagem"] = mysql_real_escape_string($mensagem);
		$consultaSQLservico5 = $consultaServico -> consultaid($_POST["seguro_fk"]);
        $_POST["ip"] = $ip;
        $contato = new Base("orcamento");
        $contato->importArray($_POST);
        $gravou = $contato->persist();
    }

    if ($gravou) {
        $swal_titulo = "Obrigado, ".$nome;
        $swal_msg = "Contato enviado com sucesso!";
        ob_start();
        ?>
        <div style="border: solid 1px #cfcfcf; padding: 15px; font-family: 'helvetica'; color: #5d5d5d; width: 60%; margin: auto; background: #f7f7f7; padding: 20px;">
            <p><strong>Nome:</strong> <?= $nome ?>;</p>
            <p><strong>E-mail:</strong> <?= $email ?>;</p>
            <p><strong>Serviço:</strong> <?= $consultaSQLservico5["titulo"] ?>;</p>
            <p><strong>Telefone:</strong> <?= $telefone ?>;</p>
            <p><strong>Celular:</strong> <?= $celular ?>;</p>
            <p><strong>Mensagem:</strong> <?= $mensagem ?>;</p>
        </div>
        <?
        $mensagemEmail = ob_get_clean();

        if($email_contato) {
            $i = 0;
            foreach ($email_contato as $ind => $email_lista_contato) {
                $email_lista = explode(",", $email_lista_contato["email"]);
                foreach($email_lista as $e_cont) {
                    $i++;
                    $arrayEmail[$i]["email"] = $e_cont;
                    $arrayEmail[$i]["nome"] = $email_lista_contato["nome"];
                }
            }

            $replyTo = array("email" => $email, "nome" => $nome);

            //E-mail para Empresa
            $envio = enviaNotificacao("$mensagemEmail", $arrayEmail, "", $assunto . " - {$configs["titulo"]}", $replyTo);
        }

        unset($_POST);
    }
}