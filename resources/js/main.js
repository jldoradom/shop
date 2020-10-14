const { set } = require("lodash");
// var Turbolinks = require("turbolinks")
// Turbolinks.start()

// const { default: Axios } = require("axios");


// document.addEventListener('DOMContentLoaded' , () =>{

//     if(document.querySelector('div#dropzone')){
//         Dropzone.autoDiscover = false;

//         const dropzone = new Dropzone('div#dropzone' , {
//             url: '/imagenes/store',
//             dictDefaultMessage: 'Sube hasta 10 imágenes',
//             maxFiles: 10,
//             required: true,
//             acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
//             addRemoveLinks: true,
//             dictRemoveFile: "Eliminar imagen",
//             headers: {
//                 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
//             },
//             init: function(){
//                 const galeria = document.querySelectorAll('.galeria');

//                 if(galeria.length > 0 ){
//                     galeria.forEach(imagen => {
//                         const imagenPublicada = {};
//                         imagenPublicada.size = 1;
//                         imagenPublicada.name = imagen.value;
//                         imagenPublicada.nombreServidor = imagen.value;

//                         this.options.addedfile.call(this, imagenPublicada);
//                         this.options.thumbnail.call(this, imagenPublicada, `/storage/${imagenPublicada.name}`);

//                         imagenPublicada.previewElement.classList.add('dz-success');
//                         imagenPublicada.previewElement.classList.add('dz-complete');

//                     });
//                 }
//             },
//             success: function(file, response){
//                 // console.log(file);
//                 console.log(response);
//                 file.nombreServidor = response.archivo;
//             },
//             sending: function(file, xhr, formData) {
//                 formData.append('uuid', document.querySelector('#uuid').value);
//                 // console.log("Enviando...");
//             },
//             removedfile: function(file, response){
//                 console.log(file);
//                 const params = {
//                     imagen: file.nombreServidor,
//                     uuid: document.querySelector('#uuid').value
//                 }

//                 axios.post('/imagenes/destroy', params)
//                         .then(response => {
//                             console.log(response);

//                             // Eliminar del DOM
//                             file.previewElement.parentNode.removeChild(file.previewElement);
//                         })
//                         .catch(error => {
//                             console.log(error);
//                         })
//             }
//         });
//     }

// });




document.onreadystatechange = () => {
    if(document.readyState === 'complete'){
        window.livewire.on('file_upload_start', () => {
            try{
                let file = event.target.files[0];
                if(file){
                    console.log(file);
                    let reader = new FileReader();
                    reader.onloadend = () => {
                        window.livewire.emit('file_upload_end', {
                            data: reader.result,
                            filename: file.name
                        });
                    }

                    reader.readAsDataURL(file);
                }
            } catch(e) {
                console.log(e);
            }
        });
    }
}


Livewire.on('view', () => {
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
