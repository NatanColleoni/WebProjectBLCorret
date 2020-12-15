<?
$id = dr($_GET["pg"]);
if($_POST["enviar"]) {
    $obj->required = array(
        "nome" => "Nome",
        "login" => "Login"
    );
    if(!$id) {
        $obj->required["senha"] = "Senha";
    } else {
        if($_POST["senha"] == "") {
            unset($_POST["senha"]);
        }
    }
    if($_POST["senha"]) {
        if($_POST["senha"] != $_POST["confirmaSenha"]) {
            $obj->erros[] = "Os campos Senha e Confirma Senha devem ser iguais.";
        } else {
            $_POST["senha"] = md5($_POST["senha"]);
        }
    }
    $obj->importArray($_POST);
    $obj->persist($id);
    $obj->mensagem();
}

$_POST = $obj->consultaId($id);

$titulo.= ($_POST["nome"]) ? " - ".$_POST["nome"] : "";
$url_prev = $pathSite."admin/{$tabela}";
?>

<div class="pnl-hd-title bg-opc-01"><h4><?=$titulo?></h4></div>
<form class="table-responsive col-xs-12 pdg-0" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nome</label>
        <input class="form-control" placeholder="Nome" required name="nome" type="text" maxlength="255" value="<?=$_POST["nome"]?>">
    </div>
    <div class="form-group">
        <label>Login</label>
        <input class="form-control" placeholder="Informe um Login" required name="login" type="text" maxlength="255" value="<?=$_POST["login"]?>">
    </div>
    <div class="form-group">
        <label>Senha</label>
        <input class="form-control" placeholder="Informe sua Senha" <?= (!$id) ? "required" : "" ?> name="senha" type="password" maxlength="255" value="">
    </div>
    <div class="form-group">
        <label>Confirme a Senha</label>
        <input class="form-control" placeholder="Informe sua Senha" <?= (!$id) ? "required" : "" ?> name="confirmaSenha" type="password" maxlength="255" value="">
    </div>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <a class="pz-btn-shadow op-live-2d bg-info text-info flt-l f-bold sm-wd-50" href="<?=$url_prev?>">Voltar</a>
        <input class="pz-btn-shadow op-live-2d bg-success text-success flt-r f-bold sm-wd-50" type="submit" name="enviar" value="Salvar">
    </div>
</form>