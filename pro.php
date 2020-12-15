</div>
            <div class="footer">
                <? include("footer.php"); ?>
            </div>
            <div id="poke"></div>
        </div>

        <script type="text/javascript" src="<?= $pathSite ?>library/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?= $pathSite ?>library/jquery/jquery.mask.js"></script>
        <script type="text/javascript" src="<?= $pathSite ?>library/fancybox/dist/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="<?= $pathSite ?>library/slick/slick.min.js"></script>
        <script>
            var pg_id = "<?= $metatags["class"] ?>";
            var path_site = "<?= $pathSite ?>";
            var chamada_prod = "<?= $chamada_prod_id ?>";
        </script>
        <script type="text/javascript" src="<?= $pathSite ?>library/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= $pathSite ?>library/royalslider/jquery.royalslider.min.js"></script>
        <script type="text/javascript" src="<?= $pathSite ?>library/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="<?= $pathSite ?>library/js/konami.js"></script>
        <script type="text/javascript" src="<?= $pathSite ?>library/js/scripters.js"></script>
        <!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v5.0"></script>-->
        <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>-->
        <script type="text/javascript" src="<?= $pathSite ?>library/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?= $pathSite ?>library/owlcarousel/dist/owl.carousel.min.js"   ></script>

        <script>
            jQuery(document).ready(function ($) {
                $(".royalSlider").royalSlider({
                    // options go here
                    // as an example, enable keyboard arrows nav
                    keyboardNavEnabled: true
                });
            });
        </script>


        <script type="text/javascript" src="<?= $pathSite ?>library/jquery/jquery.mask.js"></script>
        <script type="text/javascript" src="<?= $pathSite ?>library/slick/slick.js"></script>
        


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?= $pathSite ?>library/royalslider/jquery.royalslider.min.js"></script>
        <script src="<?= $pathSite ?>library/js/scripters.js"></script>

        <script>
            function FunctionServ() {
                var x = document.getElementById("SelectServ").value;

                fcListItens(x);
            }

            var filtro = 0;
            var contador = 1;

            $(document).ready(function () {
                fcListItens(0);
            });

            function fcListItens(filtro) {



                $.post("<?= $pathSite ?>blog.php", {"quantidade": contador, "filtro": filtro}, function (retorno) {
                    $("#blog-conteudo").html(retorno);
                });
                contador++;



            }

            function carregaConteudo(ref) {
                var dataId;
                var dataSearch;

                dataId = $(ref).data('id');
                dataSearch = $(ref).data('search');

                fcListItens(dataSearch);

            if ($(dataId).hasClass('active')) {
                    $(dataId, ref).removeClass('active');
                } else {
                    $('.box-cont, .box-btn').removeClass('active');
                    $('.box-btn', ref).addClass('active');
                    $(dataId).addClass('active');
                }
            }

//            function carregaConteudo(ref) {
//                var dataId;
//
//                dataId = $(ref).data('id');
//                if ($(dataId).hasClass('active')) {
//                    $(dataId, ref).removeClass('active');
//                } else {
//                    $('.box-cont, .box-btn').removeClass('active');
//                    $(ref).addClass('active');
//                    $(dataId).addClass('active');
//                }
//            } 
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 15,
                dots: false,
                nav: true,
                navText: ["<img src='<?= $pathSite ?>images/return.png'>", "<img src='<?= $pathSite ?>images/next.png'>"],
                responsive: {
                    0: {
                        items: 1,
                        dots: true,
                        nav: true
                    },
                    600: {
                        items: 1,
                        dots: true,
                        nav: true
                    },
                    1000: {
                        items: 7
                    }
                }
            });
 




        </script>
		
		<script>
		$(document).ready(function(){
		  $("button").click(function(){
			$("navbar-collapse").removeClass("collapse, show");
		  });
		});
		</script>

        <?
        include_once("utilitarios/post_tratamento.php");
        include_once("utilitarios/analytics.php");
        include_once("utilitarios/whatsapp_fixo.php");
        include_once("utilitarios/post_enviar.php");
        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $("#submit").click(function(){
                var nome = $("#nome").val();
                var email = $("#email").val();
                var celular = $("#celular").val();
                
                if(nome == '' || email == '' || celular == ''){
                    swal({
                        title: "Preencha todos os campos",
                        text: "Verifique os campos vazios",
                        icon: "warning",
                    });
                }else {
                    swal({
                        title: "Formulário enviado com sucesso",
                        text: "Entraremos em contato em breve",
                        icon: "success",
                    });
                }
            });
            jQuery('.slider').slick({
                autoplay: true,
                arrows: true,
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 3
        });
         function FunctionServ() {
                var x = document.getElementById("SelectServ").value;
				
                fcListItens(x);
            }
        </script>

    </body>
</html>