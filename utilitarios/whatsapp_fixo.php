<? if($whatsapp_fixo) { ?>
    <ul class="ul-whatsapp">
        <li class="topo-whats">Fale conosco.</li>
        <div class="cont-wpp">
            <? foreach($whatsapp_fixo as $whatsapp) { ?>
                <a href="<?= $link_whats . preg_replace("/[^0-9]/", "", $whatsapp["fone"]) ?>" title="Enviar mensagem para <?= $whatsapp["responsavel"] ?>" rel=external target=_blank>
                    <li>
                        <img src="<?= $pathSite ?>library/img/whatsapp-fixo-interna.svg" />
                        <div class="info-wpp">
                            <p><?= $whatsapp["titulo"] ?></p>
                            <h2><?= $whatsapp["responsavel"] ?></h2>
                        </div>
                    </li>
                </a>
            <? } ?>
        </div>
    </ul>
    <div class="whatsapp-fale">
        <?= file_get_contents($pathSite . "library/img/whatsapp-fixo.svg") ?>
        <div class="whatsapp-fale-txt-mob"><?=$whatsapp_titulo["titulo"]?></div>
    </div>
    <div class="whatsapp-notificacao"><?=count($whatsapp_fixo)?></div>
    <div class="whatsapp-fale-txt"><?=$whatsapp_titulo["titulo"]?></div>
<? } ?>

<script>
    $(".whatsapp-fale").on("click",function(){
        listaWhatsapp();
    });
    $(".whatsapp-fale-txt").on("click",function(){
        listaWhatsapp();
    });
    function listaWhatsapp() {
        if($(".shown").length <= 0){
            $(".whatsapp").addClass("shown");
            $(".ul-whatsapp").addClass("shown");
        } else {
            $(".whatsapp").removeClass("shown");
            $(".ul-whatsapp").removeClass("shown");
        }
        if($(".whatsapp-notificacao").hasClass("ativo")) {
            $(".whatsapp-notificacao").removeClass("ativo");
        }
    }
    $(window).on("load", function () {
        setTimeout(function () {
            $(".whatsapp-notificacao").addClass("ativo");
        }, 7000);
    });
</script>