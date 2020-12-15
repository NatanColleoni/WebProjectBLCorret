
$(window).ready(function(){
    
    $(".mk-date").mask("99/99/9999");
    $(".mk-datetime").mask("99/99/9999 99:99:99");
    $(".data").mask("99/99/9999");
    $('.fone-cel').change(function(){
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if(phone.length > 10){
            element.mask("99 99999-9999");
        } else {
            element.mask("99 9999-99999");
        }
    }).change();
    $('.fone-cel-2').change(function(){
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if(phone.length > 10) {
            element.mask("(99) 99999-9999");
        } else {
            element.mask("(99) 9999-99999");
        }
    }).change();
    $(".cel-full").mask("+99 99 99999-9999");
    $(".cpf").mask("999.999.999-99");
    $(".cnpj").mask("99.999.999/9999-99");
    $(".cep").mask("99999-999");
    $('.money').mask('#.##0,00', {reverse: true});
     
    $('.cpf-cnpj').change(function(){
        var reg, element;
        element = $(this);
        element.unmask();
        reg = element.val().replace(/\D/g, '');
        if(reg.length === 14) {
            element.mask("99.999.999/9999-99");
        } else if(reg.length === 11){
            element.mask("999.999.999-99999");
        } else {
            element.mask("99999999999999");
        }
    }).change();

    /* Usu */
    $("#chk-all").click(function(){
        $(".chk-item").prop('checked', $(this).prop('checked'));
    });
    $(".chk-item").change(function(){
        if (!$(this).prop("checked")){
            $("#chk-all, #chk_slc-all").prop("checked",false);
        }
    });
    $("#chk-adm-max").click(function(){
        $(".pnl-ctrl-access").children(
                
//            $(".slct-item").val('4'),
            $(".chk-item").prop('checked', $(this).prop('checked')),
//            $('.slct-item option').val(),
            $('.slct-item option:last-child').attr('selected', 'selected')
        );
    });
    
    $(".chk-grp").click(function(){
        var chk = $(this).data('grp');
//        $(".ct-grp-"+chk+" .slct-item").val('4'),
        $(".ct-grp-"+chk+" .slct-item option:last-child").attr('selected', 'selected');
        $(".ct-grp-"+chk+" .chk-item").prop('checked', $(this).prop('checked'));
    });
    
   /* Normal */
    $("#chk-all").click(function () {
        $(".chk-box").prop('checked', $(this).prop('checked'));
    });
    $(".chk-box").change(function(){
        if (!$(this).prop("checked")){
            $("#chk-all").prop("checked",false);
        }
    });
    $('.selectpicker').selectpicker({size: 8});
    
     $('#bn-opt-slct').change(function(){
        bn_size(this);
    });
    $('#bn-opt-target').change(function(){
        bn_target(this);
    });
    
    /* The Magic Control Storage - By Joseafs */
    $('.pz-table-mn [data-toggle="collapse"]').each(function (){
        var mn_local = $(this).attr('href');
        if(localStorage[mn_local] === 'active'){
            $(mn_local).addClass('in');
        } 
    });
    $('.pz-table-mn [data-toggle="collapse"]').click(function (){
        var mn_info = $(this).attr('href');
        if($(mn_info).hasClass('in')){
            delete(localStorage[mn_info]);
        } else{
            localStorage[mn_info] = "active";
        }
    });
});
