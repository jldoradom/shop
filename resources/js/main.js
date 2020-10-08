const { set } = require("lodash");

Livewire.on('postAdded', () => {
    // document.querySelector("html, body").animate({scrollTop: 1000},600);
    $("html, body").scrollTop(1000);
});


Livewire.on('eliminar', () => {
    let alerta = $('.alert');
    if(alerta){
        setTimeout(function(){
            $('.alert').hide();
        }, 4000);
    }
});


Livewire.on('editar', () => {
    $("html, body").scrollTop(1000);
    let alerta = $('.alert');
    if(alerta){
        setTimeout(function(){
            $('.alert').hide();
        }, 7000);
    }
});
