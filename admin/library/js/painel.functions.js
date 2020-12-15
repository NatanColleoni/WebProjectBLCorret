/* -------------------------------------------------------------------------- */
/* ---- v3.5 - Z-Endless-Dreams - 14/11/2016 ---------_-Joseafs---------------*/
/* -------------------------------------------------------------------------- */
function goTarget(target, posit){
    if(posit === "middle"){
        var vrPosit =$(window).height();
        console.log(vrPosit);
        posit = (vrPosit/2);
        console.log(posit);
    }
    setTimeout(function(){
        $('html, body').animate({
            scrollTop: $(target).offset().top -posit
        }, 0);
    }, 250);
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}