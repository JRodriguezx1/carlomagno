document.addEventListener('DOMContentLoaded', function(){ iniciarapp(); });

let habilitar_interseccion = 1;
let escribir_una_vez = true;

function iniciarapp(){
    btn_menu();  //muestra oculta el div del btn menu hambuerguesa
    mostrar_btnflotante_ws();
    eventoformularios();
    eliminarpaddingeslogan();
}

// funcion que le asigna evento click al div que contiene la img menu
function btn_menu(){
    const movilmenu = document.querySelector('.movil-menu'); //seleccionamos el div que contiene la img menu
    movilmenu.addEventListener('click', function(){ 
        const nav = document.querySelector('.column-nav nav'); //selecciona el <nav>...</nav> de la barra del header
        nav.classList.toggle('mostrar_nav');
        if(nav.classList.contains('mostrar_nav')&&movilmenu.classList.contains('soloindex')){ 
            const barra_superior = document.querySelector('.barra-header');
            barra_superior.style.backgroundColor = 'rgba(10, 29, 85, 0.6)';
        }
    });
}


function mostrar_btnflotante_ws(){
    window.addEventListener('scroll', ()=>{
        const scrollpixely = window.scrollY;
        const btn_flotante_ws = document.querySelector('.btn-flotante');
        if(scrollpixely>200){
            btn_flotante_ws.style.visibility = "visible";
        }
    });
    
}


function eventoformularios(){
    const formularios = document.querySelectorAll('.formulario');
    formularios.forEach((formulario)=>{
        formulario.addEventListener('submit', (e)=>{
           // e.preventDefault();
            enviarformulario(e.target);  
        });
    });
}
function enviarformulario(datos){
    console.log(datos);
}


function eliminarpaddingeslogan(){
    const esloganverde = document.querySelectorAll('.bkg-flechas-sliders span');
    esloganverde.forEach(Element=>{
        if(Element.textContent == '')
            Element.style.padding = '0rem';
    });
}


// Galeria de Imagenes

// window.swiper = new Swiper({
//     el: '.slider-contenedor',
//     sliderClass: 'slider-slide',
//     createElements: true,
//     autoplay: {
//         delay: 5000
//     },
//     loop: true,
//     pagination: true,
//     navigation: true
// });

var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    loop: true,
    pagination: {
      el: ".swiper-pagination",
    },
    autoplay: {
                 delay: 5000
             }
  });

