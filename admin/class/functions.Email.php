<?

function enviaNotificacao($mensagem, $destino, $bcc = array(), $assunto = "") {
    global $configs;

    //  print_r($configs);
    ///  exit();
    include_once ("mail/class.phpmailer.php");
    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->IsHTML(true);

    $mail->Host = "smtp.byteabyte.com.br";
    $mail->Port = "587"; //465 - 587
    $mail->SMTPAuth = true;
    $mail->Username = "autenticacao@byteabyte.com.br";
    $mail->Password = "bab30252004";
    $mail->Sender = "autenticacao@byteabyte.com.br";
    $mail->From = "autenticacao@byteabyte.com.br";
    $mail->Subject = $assunto;
    $mail->Body = $mensagem;

    foreach ($destino as $ind => $valor) {
        $mail->AddAddress($valor["email"], $valor["nome"]);
    }

    if (!$mail->Send()) {
        return false;
    } else {
        return true;
    }
}

function sendMail($subject,$message,$sender,$destiny,$file,$cc){
    
    require_once("mail/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP(); // telling the class to use SMTP

//    $mail->SMTPDebug  = 2;                     
//    enables SMTP debug information (for testing).  
//    1 = errors and messages.
//    2 = messages only.
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    
    $mail->SMTPSecure = "tls";  // ssl - tls - (null this line)
    $mail->Host = "smtp-vip-farm74.uni5.net";
    $mail->Port = 587;
    
    $mail->Username   = "site@drmauricioguazzelli.com.br";  // GMAIL username
    $mail->Password   = "byte2013";            // GMAIL password
    $mail->FromName = $subject;
    $mail->Subject = $subject;
    
    $mail->SetFrom($sender);
    $mail->MsgHTML($message);
     
    if(!empty($file)){
        foreach ($file as $item) {
            if(!empty($item["arquivo"]["name"])){
                $mail->AddAttachment($item["arquivo"]["tmp_name"], $item["arquivo"]["name"]);
            }
        }
    }
    if(!empty($cc)){
        foreach ($cc as $item) {
            $mail->AddCC($item);
        }
    }

    if(!empty($destiny)){
        foreach ($destiny as $item) {
            $mail->AddAddress($item["mail"], $item["nm"]);
            $mail->Send();
            $mail->ClearAddresses();
        }
    }
    
    if (!$mail->Send()){
        return false;
    } else {
        return true;
    }
    
}