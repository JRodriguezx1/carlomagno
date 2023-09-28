window.addEventListener('load', function() { 
    background_slider();
    efectos_barra_superior();
    observarelemento();  //me observa el div class banda2 cuando entra en patalla ejecuta la funcion contador animado
    slider_tarjetas_cursos();
 });

 let i = 0;
 let stop_interval;

 ///////// slider barra superior  ////////////////
 function background_slider(){
     
    const bkg = document.querySelector('.container');
    const bkgd = document.querySelector('.bkg');
    let img_slider = [];

        var url = ['build/img/background0.jpg', 'build/img/background1.jpg', 'build/img/background2.jpg', 'build/img/background3.jpg', 'build/img/background4.jpg', 'build/img/background5.jpg', 'build/img/background6.jpg', 'build/img/background7.jpg'];
        url.forEach(element =>{
            var image = new Image();
            image.src = element;
            image.addEventListener('load', () => {
                img_slider.push('url('+element+')');
                bkg.style.backgroundImage = img_slider[0];
            });
            image.addEventListener('error', () => console.log('no esta'));    
        }); 


    
    setTimeout(() => {
        bkgd.style.backgroundImage = img_slider[1]; 
        let arrayslider;
        for(let j = 0; j<img_slider.length; j++){
            for(let k = j+1; k<img_slider.length; k++){
                if(img_slider[j].charAt(24)>img_slider[k].charAt(24)){
                    arrayslider=img_slider[j];
                    img_slider[j]=img_slider[k];
                    img_slider[k] = arrayslider;
                }
            }    
        }
    }, 71);

    

   /* setTimeout(() => {
        bkgd.style.backgroundImage = img_slider[2]; 
    }, 350);
    setTimeout(() => {
        bkgd.style.backgroundImage = img_slider[3]; 
    }, 650);
    setTimeout(() => {
        bkgd.style.backgroundImage = img_slider[4]; 
    }, 950); 
    */

   


    /*bkg.style.backgroundPosition = 'center center';
    bkg.style.backgroundSize = 'cover';*/
    const eslogan = document.querySelector('#eslogan');
    const izq = document.querySelector('#izq');
    const der = document.querySelector('#der');

    eslogan.style.visibility = 'hidden';

    timepo_slider(img_slider, bkg, eslogan);

    izq.addEventListener('click', function(e){ 
        clearInterval(stop_interval);   
        if(i==0){i=img_slider.length-1;  
        }else{i--;}
        if(i==-2)i=img_slider.length-2;
        bkg.style.backgroundImage = img_slider[i]; 
        
        if(i!=0)eslogan.style.visibility = 'visible';
        else{eslogan.style.visibility = 'hidden'; 
             eslogan.style.transform = 'scale(1.5)'; 
            }
        if(i==img_slider.length-1){
            eslogan.style.transform = 'scale(0.9)';
        }
        timepo_slider(img_slider, bkg, eslogan);
    });

    der.addEventListener('click', function(e){
        clearInterval(stop_interval);
        if(i==img_slider.length-1){i=0;
        }else{i++;} 
        bkg.style.backgroundImage = img_slider[i];
        if(i==img_slider.length-1)i=-1; 
        
        if(i!=0){eslogan.style.visibility = 'visible';}
        else{eslogan.style.visibility = 'hidden'; 
             eslogan.style.transform = 'scale(1.5)';
            }   
        if(i==1){eslogan.style.transform = 'scale(0.9)';}
        timepo_slider(img_slider, bkg, eslogan);  
    });
 }


 function timepo_slider(img_slider, bkg, eslogan){
    stop_interval = setInterval(() =>{
        if(i==img_slider.length-1){i=-1;}
        i++;
        //bkg.style.backgroundImage = "";
        bkg.style.backgroundImage = img_slider[i];
        bkg.style.transition = "background-Image 1s ease-in-out";
        if(i==0){eslogan.style.visibility = 'hidden';
                eslogan.style.transform = 'scale(1.5)';
        }
        else{eslogan.style.visibility = 'visible';
             eslogan.style.transform = 'scale(0.9)';
            }     
    }, 5400);
 }


 //////////cambiar el tamaño de logo de la barra y que la barra sea fija /////////
function efectos_barra_superior(){
    let i = true;
    window.addEventListener('scroll', ()=>{
        const scrollpixely = window.scrollY;

        const barra_superior = document.querySelector('.barra-header');
        if(scrollpixely>40.25 && window.innerWidth>=768){
            barra_superior.classList.add('barrafija');  //clase esta en el header se añade al div de la barra
        }else{
            barra_superior.classList.remove('barrafija');
        }
        
        if(scrollpixely>28 && i){
        cambiar_dimension_logo('10rem');
        efecto_barra('rgba(10, 29, 85, 0.6)');
        i=false;                }
        if(scrollpixely==0){
            cambiar_dimension_logo('12rem');
            efecto_barra('rgba(10, 29, 85, 1)');
            i=true;        }
    });
}

function cambiar_dimension_logo(dimension){
    const logo = document.querySelector('.column-logo img');
    logo.style.width = dimension;
}

function efecto_barra(transparencia){
    const barra_superior = document.querySelector('.barra-header');
    barra_superior.style.backgroundColor = transparencia;
}


///////////////////// slider de cursos /////////////////////////////
//tarjeta.style.right = '-15rem';
let desplazar = 0;
function slider_tarjetas_cursos(){
    const arrow_izq = document.querySelector('.flecha-izq');
    const arrow_der = document.querySelector('.flecha-der');
    const all_tarjetas = document.querySelectorAll('.tarjeta');

    //let movilmedia = window.matchMedia("(max-width: 768px)"); //rtorna un objeto que indica que si la pantalla es <= 768px
   // console.log(movilmedia);
   
    //arrow_izq.onclick = function(e){ mover_izq(e); };
    arrow_izq.onclick = function(){mover_izq(all_tarjetas);};
    arrow_der.onclick = function(){ mover_der(all_tarjetas);};

    window.addEventListener('resize', ()=>{
        desplazar = 0;
        all_tarjetas.forEach( (tarjeta) => {
            tarjeta.style.right = '0';   
        });
    });
}
function mover_der(all_tarjetas){
    let paso, x, pasomax;
    if(window.innerWidth<=479){
        paso = ((document.documentElement.clientWidth*95)/100)+12;  //calcula el ancho de la tarjeta en px para luego ir moviendo en esta proporcion
        x=6;  //tarjetas ocultas pendiente por mostrar
    }
    if(window.innerWidth>479 && window.innerWidth<=767){
        paso = ((document.documentElement.clientWidth*95)/200)+12;
        x=5;  //tarjetas ocultas pendiente por mostrar
    }
    if(window.innerWidth>767 && window.innerWidth<=959){
        paso = ((document.documentElement.clientWidth*95)/300)+12;
        x=4;  //tarjetas ocultas pendiente por mostrar
    }
    if(window.innerWidth>959){
        paso = ((document.documentElement.clientWidth*95)/500)+5;
        x = 2;  //tarjetas ocultas pendiente por mostrar
    }
    pasomax = paso*x;
    desplazar+=paso;

    if(desplazar>pasomax+1)desplazar = desplazar - paso;

    all_tarjetas.forEach( (tarjeta) => {
        tarjeta.style.right = desplazar+"px";   
    });
}
function mover_izq(all_tarjetas){
    let paso;
    if(window.innerWidth<=479)
        paso = ((document.documentElement.clientWidth*95)/100)+12;
        
    if(window.innerWidth>479 && window.innerWidth<=767)
        paso = ((document.documentElement.clientWidth*95)/200)+12;
    
    if(window.innerWidth>767 && window.innerWidth<=959)
    paso = ((document.documentElement.clientWidth*95)/300)+12;

    if(window.innerWidth>959)
    paso = ((document.documentElement.clientWidth*95)/500)+5; //calcula el ancho de la tarjeta en px para luego ir moviendo en esta proporcion
    
    desplazar-=paso;

    if(desplazar<0)desplazar=0;
    all_tarjetas.forEach( (tarjeta) => {
        tarjeta.style.right = desplazar+"px"; 
    });
}


function observarelemento(){
    const banda2 = document.querySelector('.banda2'); //animacion contador numerico
    const observar_banda2 = new IntersectionObserver(contador_animado_num, {root: null, rootMargin: '0px 0px -130px 0px', threshold: 1.0});
    observar_banda2.observe(banda2);                                          //threshold: 1.0 hasta que toda la imagen este en viewport o pantalla
    
    const tarjetas = document.querySelector('.tarjetas');
    const observar_slider2 = new IntersectionObserver(efecto_maquina_escribir, {root: null, rootMargin: '0px 0px 0px 0px', threshold: 0.3});
    observar_slider2.observe(tarjetas); //cuando este visible el div de tajetas empieza laanimacion maquina de escribir
}


function efecto_maquina_escribir(entrada, observador){
    if(entrada[0].isIntersecting && escribir_una_vez){ //animacion maquina de escribir
        const maquina_de_escribir = document.querySelector('#maquina-de-escribir'); //selecciona el span
        maquina_de_escribir.classList.add('maquina-escribir');
        escribir_una_vez = false;
    }
}


function contador_animado_num(entrar, observador){  
    if(entrar[0].isIntersecting && habilitar_interseccion){
        let nums = document.querySelectorAll('.num');  //selecciona el span que muestra los numeros
        const intervalo = 3500;
    
        nums.forEach( num =>{
            let num_inicial = 0;
            let num_end = parseInt(num.getAttribute('data-valor'));
            let duracion = Math.floor(intervalo/num_end);  // rendondea hacia a bajo 2.7 rendondea a 2

            let tiempo = setInterval(() => {
                if(num.nextElementSibling.textContent === 'Estudiantes Activos')
                    num_inicial+=4;
                if(num.nextElementSibling.textContent === 'Estudiantes Graduados')
                    num_inicial+=2;
                if(num.nextElementSibling.textContent === 'Sedes Nacionales')
                    num_inicial++;
                if(num_inicial == num_end && num.nextElementSibling.textContent === 'Sedes Nacionales')
                    clearInterval(tiempo);    
                if(num_inicial >= num_end-4 && num.nextElementSibling.textContent === 'Estudiantes Activos'){
                    clearInterval(tiempo);
                    num_inicial = num_end
                }
                if(num_inicial >= num_end-16 && num.nextElementSibling.textContent === 'Estudiantes Graduados'){
                    clearInterval(tiempo);
                    num_inicial = num_end
                }

               num.textContent = num_inicial+"+"; 
            }, duracion);
       });
       habilitar_interseccion = 0;
    }
}