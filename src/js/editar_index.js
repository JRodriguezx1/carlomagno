
const btn_imgslider = document.querySelector('#img-slider'); //btn tipo file para cargar las imagenes del slier del header
const btn_eliminar_imgslider = document.querySelectorAll('#btn-eliminar-slider');
const btnimgpost1 = document.querySelector('#imgpost1');  //btn tipo file q carga las imagenes del post1
const btn_elim_imgpost1 = document.querySelectorAll('#btn-eliminar-post1');
const btn_imgdistintivo = document.querySelector('#imgdistintivo');  //btn tipo file q carga la imagen distintivo de la escuela
const btn_elim_distintiv = document.querySelectorAll('#btn-eliminar-distintivo');
const btn_benf = document.querySelectorAll('.btn-benf');  //btn para cargar las imagenes de la seccion del beneficio
const btn_elim_beneficio = document.querySelectorAll('#btn-eliminar-beneficio'); //btn para eliminar las imagenes de la seccion del beneficio

btn_imgslider.addEventListener('change', img_servidor); //btn para cargar imagenes del slider dle header
btn_eliminar_imgslider.forEach((element) => {
    element.addEventListener('click', (e)=>{    
        eliminarimgslider(e);
    });
});
btnimgpost1.addEventListener('change', imgpost1_servidor);
btn_elim_imgpost1.forEach((element)=>{
    element.addEventListener('click', (e)=>{
        eliminarimgpost1(e);
    });
});
btn_imgdistintivo.addEventListener('change', imgdistintivo_servidor);
btn_elim_distintiv.forEach((element)=>{
    element.addEventListener('click', (e)=>{
        eliminarimgdistintivo(e);
    });
});

btn_benf.forEach(element =>{
    element.addEventListener('change', imgbeneficio_servidor);
});
btn_elim_beneficio.forEach((element)=>{
    element.addEventListener('click', (e)=>{
        eliminarimgbeneficio(e);
    });
});

///// api para el procesamiento del slider del header del index
async function img_servidor(){  //funcion q carga la imagen y se envia por api rest al backend
    console.log(this.files[0]); //this.files[0] hace referencia al archivo
    const datos = new FormData();
    datos.append('img', this.files[0]);

    try {
        const url = "http://mvc_carlomagno.com.co.test/api/slider";
        const respuesta = await fetch(url, {method: 'POST', body: datos}); 
        const resultado = await respuesta.json(); //respuesta que viene del backend de public static function apislider()
        if(resultado === 'carga de img')
        window.location.reload();
    } catch (error) {
        console.log(error);
    }
}
async function eliminarimgslider(e){
    let dataset = e.target.parentElement.parentElement.dataset.img;
    //const btns_imagenes = document.querySelectorAll('#btn-eliminar-slider').length;
    //console.log(btns_imagenes);
    const datos = new FormData();
    datos.append('dataset', dataset);

    try {
        const url = "http://mvc_carlomagno.com.co.test/api/slider";
        const respuesta = await fetch(url, {method: 'POST', body: datos}); 
        const resultado = await respuesta.json();
        if(resultado === 'img eliminada')
        window.location.reload();
    } catch (error) {
        console.log(error);
    }
}


async function imgpost1_servidor(){  //funcion q carga la imagen y se envia por api rest al backend
    const datos = new FormData();
    datos.append('img', this.files[0]);
    try {
        const url = "http://mvc_carlomagno.com.co.test/api/img-post1";
        const respuesta = await fetch(url, {method: 'POST', body: datos}); 
        const resultado = await respuesta.json(); //respuesta que viene del backend de public static function apislider()
        if(resultado === 'carga de img post1')
        window.location.reload();
    } catch (error) {
        console.log(error);
    }
}
async function eliminarimgpost1(e){
    let dataset = e.target.parentElement.parentElement.dataset.img;
    console.log(dataset);
    const datos = new FormData();
    datos.append('dataset', dataset);
    try {
        const url = "http://mvc_carlomagno.com.co.test/api/img-post1";
        const respuesta = await fetch(url, {method: 'POST', body: datos}); 
        const resultado = await respuesta.json();
        if(resultado === 'img eliminada')
        window.location.reload();
    } catch (error) {
        console.log(error);
    }
}


async function imgdistintivo_servidor(){  //funcion q carga la imagen y se envia por api rest al backend
    const datos = new FormData();
    datos.append('img', this.files[0]);
    try {
        const url = "http://mvc_carlomagno.com.co.test/api/imgdistintivo";
        const respuesta = await fetch(url, {method: 'POST', body: datos}); 
        const resultado = await respuesta.json(); //respuesta que viene del backend de public static function apislider()
        if(resultado === 'carga de img distintivo')
        window.location.reload();
    } catch (error) {
        console.log(error);
    }
}
async function eliminarimgdistintivo(e){
    const datos = new FormData();
    datos.append('dataset', 'delete');
    try {
        const url = "http://mvc_carlomagno.com.co.test/api/imgdistintivo";
        const respuesta = await fetch(url, {method: 'POST', body: datos}); 
        const resultado = await respuesta.json();
        if(resultado === 'img eliminada')
        window.location.reload();
    } catch (error) {
        console.log(error);
    }
}

/////////////////
async function imgbeneficio_servidor(e){  //funcion q carga la imagen y se envia por api rest al backend
    let dataset = e.target.parentElement.parentElement.dataset.beneficio;
    const datos = new FormData();
    datos.append('img', this.files[0]);
    datos.append('dataset', dataset);
    try {
        const url = "http://mvc_carlomagno.com.co.test/api/imgbenef";
        const respuesta = await fetch(url, {method: 'POST', body: datos}); 
        const resultado = await respuesta.json(); //respuesta que viene del backend de public static function apislider()
        if(resultado === 'carga de img beneficio')
        window.location.reload();
    } catch (error) {
        console.log(error);
    }
}
async function eliminarimgbeneficio(e){
    let dataset = e.target.parentElement.parentElement.dataset.beneficio;
    const datos = new FormData();
    datos.append('dataset', dataset);
    try {
        const url = "http://mvc_carlomagno.com.co.test/api/imgbenef";
        const respuesta = await fetch(url, {method: 'POST', body: datos}); 
        const resultado = await respuesta.json();
        if(resultado === 'img eliminada')
        window.location.reload();
    } catch (error) {
        console.log(error);
    }
}
/*
const numinput = document.querySelectorAll('.campo-contchart');  //labels contador de caracteres
numinput.forEach(element =>{ //element es cada label
    element.textContent = element.dataset.num-element.previousElementSibling.value.length;
    element.previousElementSibling.addEventListener('input', (e)=>{ //seleccionamos el input en donde se escribe y se le da el evento de teclas
        element.textContent = element.dataset.num-e.target.value.length;
        
        if(element.dataset.num-e.target.value.length <= 0){
            //e.preventDefault(); con keypress
            let cadena = e.target.value.slice(0, element.dataset.num);
            console.log(cadena);
            e.target.value = cadena;
            element.textContent = 0;
        }
        
    });
});*/