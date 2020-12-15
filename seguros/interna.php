<?
    $servicos = new Base ("servico");
    $servico = $servicos->consultaId($_GET['id']);
?>

    <div class="container position-relative">
        <div class="titulo-banner-interna seg-interna-imagem">
            
            <img style="margin-top: 25px;" src="<?= $pathSite ?>servico/files/<?=$servico['nome_foto']?>" />
            <div class="subtitulo1">
            <h1><?= quebrar_texto($servico['titulo'], 60) ?></h1>
            </div>
            <div class="descr-servico">
            <p><?= $servico['descricao'] ?></p>
            </div>
        </div>
    </div>

<style>
 .subtitulo1 {
  font-family: 'Raleway', sans-serif;
  font-size: 24px;
  text-align: left;
  letter-spacing: .05em;
  text-transform: uppercase;
  margin-bottom: 0;
  color: #777777;
  }
  .descr-servico {
  color: #484962;
  font-weight: 400;
  line-height: 24px;
  font-size: 16px;
  font-family: 'Raleway', sans-serif;
  }
</style>
