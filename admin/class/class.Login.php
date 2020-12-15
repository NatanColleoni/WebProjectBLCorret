<?
class Login{
    function Login($urlLogin, $urlInicial, $tabela) {
        $this->urlLogin = $urlLogin;
        $this->urlInicial = $urlInicial;
        $this->tabela = $tabela;
    }
    function verificaLogin(){
        if ($_SESSION["user_pnl"]["login"] != 1) {
//          $_SESSION[redirectUrl] = "http://" . $_SERVER[SERVER_ADDR] . $_SERVER[REQUEST_URI];
            header("Location: {$this->urlLogin}");
            die();
        }
    }

    function logar($login, $senha){
        if((!empty($login) && !empty($senha))){
            $objUser= new Base($this->tabela);
            $login = addslashes($login);
			$consulta = $objUser->consulta("WHERE login='{$login}' AND (senha=md5('{$senha}') OR senha_provisoria=md5('{$senha}'))");
            $user = mysql_fetch_assoc($consulta);
			
			if(!empty($user)){
                $_SESSION["user_pnl"]["login"] = 1;
                $_SESSION["user_pnl"]["id"] = $user["id"];
                $_SESSION["user_pnl"]["nm"] = $user["nome"];
                
                if ($_SESSION['redirectUrl']){
                    $this->urlInicial = $_SESSION["redirectUrl"];
                    unset($_SESSION[redirectUrl]);
                }
                header("Location: $this->urlInicial");
                die();
            } else {
                return false;
            }
        } else {
            return -1;
        }
    }
    function fechar(){
        session_destroy();
        header("Location: $this->urlLogin");
        die();
    }
}