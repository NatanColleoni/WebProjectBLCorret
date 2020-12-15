function resizeToRatio(imagem, wid, hei, centralizar) {
    if (!$(imagem).hasClass('resized')) {
        $(imagem).addClass('resized');
        $(imagem).ready(function () {
            var largura = $(imagem).width();
            var altura = $(imagem).height();
            if (largura >= altura) {
                $(imagem).width(wid);
            } else {
                $(imagem).height(hei);
            }
            if (centralizar) {
                $(imagem).css({'position': 'absolute', 'top': '50%', 'left': '50%', 'margin-top': '-' + $(imagem).height() / 2 + 'px', 'margin-left': '-' + $(imagem).width() / 2 + 'px'});
            }
        });
    }
}
function resizeToRatioCut(imagem, wid, hei, centralizarH, centralizarV, alertT) {
    if (!$(imagem).hasClass('resized')) {
        $(imagem).addClass('resized');
        $(imagem).ready(function () {
            var largura = $(imagem).width();
            var altura = $(imagem).height();
            var proporcao = 0;
            proporcao = (largura / altura);
            if (largura <= altura) {
                $(imagem).width(wid);
                if ($(imagem).height() < hei) {
                    var diferenca = 0;
                    diferenca = hei - $(imagem).height();
                    $(imagem).height(hei);
                    var soma_largura;
                    soma_largura = (diferenca * proporcao);
                    var nova_largura;
                    nova_largura = Math.round(wid + soma_largura);
                    $(imagem).width(nova_largura);
                }
            } else {
                $(imagem).height(hei);
                if ($(imagem).width() < wid) {
                    var diferenca = 0;
                    diferenca = wid - $(imagem).width();
                    $(imagem).width(wid);
                    nova_altura = Math.round(hei + (diferenca / proporcao));
                    $(imagem).height(nova_altura);
                }
            }
            $(imagem).attr('data-center-h', centralizarH);
            $(imagem).attr('data-center-v', centralizarV);
            var top = '0';
            var left = '0';
            var marginTop = '0';
            var marginLeft = '0';
            if (centralizarH) {
                left = '50%';
                marginLeft = '-' + $(imagem).width() / 2 + 'px';
            }
            if (centralizarV) {
                top = '50%';
                marginTop = '-' + $(imagem).height() / 2 + 'px';
            }
            if (centralizarH || centralizarV) {
                $(imagem).css({
                    'position': 'absolute',
                    'top': top,
                    'left': left,
                    'margin-top': marginTop,
                    'margin-left': marginLeft
                });
            }
        });
    }
}
function resizeToRatioUncut(imagem, wid, hei, centralizarH, centralizarV) {
    if (!$(imagem).hasClass('resized')) {
        $(imagem).addClass('resized');
        $(imagem).ready(function () {
            var largura = $(imagem).width();
            var altura = $(imagem).height();
            if (largura >= altura) {
                $(imagem).width(wid);
                if ($(imagem).height() > hei) {
                    $(imagem).css({'width': 'auto'});
                    $(imagem).height(hei);
                }
            } else {
                $(imagem).height(hei);
                if ($(imagem).width() > wid) {
                    $(imagem).css({'height': 'auto'});
                    $(imagem).width(wid);
                }
            }
            $(imagem).attr('data-center-h', centralizarH);
            $(imagem).attr('data-center-v', centralizarV);
            var top = '0';
            var left = '0';
            var marginTop = '0';
            var marginLeft = '0';
            if (centralizarH) {
                left = '50%';
                marginLeft = '-' + $(imagem).width() / 2 + 'px';
            }
            if (centralizarV) {
                top = '50%';
                marginTop = '-' + $(imagem).height() / 2 + 'px';
            }
            if (centralizarH) {
                $(imagem).css({
                    'position': 'absolute',
                    'top': top,
                    'left': left,
                    'margin-top': marginTop,
                    'margin-left': marginLeft
                });
            }
        });
    }
}