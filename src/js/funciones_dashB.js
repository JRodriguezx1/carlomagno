/*document.addEventListener('DOMContentLoaded', function(){ 
    sidebar();
    //acordion();
    eliminaralerta();
    contar_chart(); //contador de caracteres
    cambiodebtn();  //cuano se da click se activa btn y si se da click en el otro se desctiva el primero y se activa el segundo
    validarsubmit();
    accion_checkbox();
    accion_barra_prog_new_student();
 });*/


export function sidebar(){
     document.querySelector('.logo').addEventListener('click', (e)=>{  //evento a la img menu-barra del aside
        if(e.target.alt === 'menu-barra'){
            document.querySelector('.sidebar-nav').classList.toggle('mostrar');
            document.querySelector('.menu').classList.toggle('mostrar');
            document.querySelector('.menux').classList.toggle('mostrar');
        }
        if(e.target.classList.contains('menux')){
            document.querySelector('.sidebar-nav').classList.toggle('mostrar');
            document.querySelector('.menu').classList.toggle('mostrar');
            document.querySelector('.menux').classList.toggle('mostrar');
        }
     });
 }

/*
export function acordion(){
    if(document.querySelector('#acordion')){
        document.querySelector('#acordion').addEventListener('click', e=>{
            document.querySelector('.acordion').classList.toggle('acordion-js');
            e.target.classList.toggle('cambiospeudoelement'); //clase que se agrefa a sidebar-nav en el dashboard
     });
    }
 }*/


export function eliminaralerta(){
    if(document.querySelector('.exito')){
        setTimeout(() => { //cuando se realize algun cambio y se guarde se llama la pagina inicio.php de editar_index y se ejecuta este script
            document.querySelector('.exito').remove();
        }, 3000);
    }
 }


export function contar_chart(){
    const numinput = document.querySelectorAll('.campo-contchart');  //labels contador de caracteres
    numinput.forEach(element =>{ //element es cada label
        element.textContent = element.dataset.num-element.previousElementSibling.value.length;
        element.previousElementSibling.addEventListener('input', (e)=>{ //seleccionamos el input o el textarea en donde se escribe y se le da el evento de teclas
            element.textContent = element.dataset.num-e.target.value.length;
            
            if(element.dataset.num-e.target.value.length <= 0){
                //e.preventDefault(); con keypress
                let cadena = e.target.value.slice(0, element.dataset.num);
                console.log(cadena);
                e.target.value = cadena;
                element.textContent = 0;
            }
        });
    });
 }


 export function deletefotografia(){
    const btn_vaciarimgs = document.querySelectorAll('.btn-vaciarimg a');
    console.log(btn_vaciarimgs);
    btn_vaciarimgs.forEach(btn_vaciarimg =>{
        btn_vaciarimg.addEventListener('click', (e)=>{
            e.preventDefault();
            Swal.fire({
                customClass: {
                    confirmButton: 'sweetbtn',
                    cancelButton: 'sweetbtn'
                },
                title: 'Desea eliminar la fotografia?',
                showCancelButton: true,
                confirmButtonText: 'Si',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Fotografia eliminada', '', 'success')
                    if(e.target.tagName == 'I'){
                        window.location = e.target.parentElement.href;
                    }else{
                        window.location = e.target.href;
                    }
                } 
            })
        });
    });
 }


export function filtro_personalizado(){ //en adminestudiante.php busqueda de estudaintes por programa, semestre y grupo
    const filtros = document.querySelector('#filtros-personalizado');
    if(filtros){
        const selectfiltro = document.querySelector('#selectprogramas');

        filtros.addEventListener('click', ()=>{
            let idprograma = selectfiltro.options[selectfiltro.options.selectedIndex].value; //toma el id del select programa

            Swal.fire({
                customClass: {
                    //confirmButton: 'sweetbtnconfirm',
                   // cancelButton: 'sweetbtncancel'
                },
                title: 'Consulta de estudiantes!',
                html: `<form class="modalform" action="/admin/dashboard/admin_estudiantes/filtro_personalizado?pagina=1" method="POST">    
                            <div>
                                <label for="nivel">Semestre/nivel:</label>
                                <div>
                                    <select id="nivel" name="idnivel" required>
                                        <option value="" disabled selected>-- Seleccione Semestre --</option>    
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="nivel">Grupo:</label>
                                <div>
                                    <select id="grupo" name="idgrupo" required>
                                        <option value="" disabled selected>-- Seleccione grupo --</option>    
                                    </select>
                                </div>
                            </div>
                            <input class="filter-consulta" type="submit" value="Consultar">
                       </form>`,
                showCancelButton: false,
                showConfirmButton: false,
                //confirmButtonText: 'Aceptar',
                //cancelButtonText: 'Cancelar',
            })/*.then((result) => {
                if (result.isConfirmed) {
                  Swal.fire('Actualizando', '', 'success')
                  //modificar el servicio
                } 
            })*/

            const nivel = document.querySelector('#nivel');
            const nivel_grupos = document.querySelectorAll('#grupo');
            traerniveles(idprograma, nivel);
            nivel.addEventListener('change', (e)=>{
                traer_grupos_sedes(e.target.value, nivel_grupos, 0); //se envia idnivel, el elemento select, y el num del select en el dom al cual corresponde
            });

        });
    }
}

export function cambiodebtn(){  //para la pagina de admin estudiantes para elegir el tipo de filtro si es por nombre o por cc
    const btns_filtro = document.querySelectorAll('#filtro');
    btns_filtro.forEach(element=>{
        element.addEventListener('click', (e)=>{
            
            if(!e.target.classList.contains('plus_btn')){
                btns_filtro.forEach(btn=>{
                    btn.classList.remove('plus_btn');
                });
                e.target.classList.add('plus_btn');
            }
        });
    });
}

export function validarsubmitoferta(){  //funcion para eliminar el registro de un usuario coordinador.
    const forms = document.querySelectorAll('#eliminar-oferta');
    if(forms){  
        forms.forEach(form => {
            form.addEventListener('submit', (e)=>{
                e.preventDefault();
                Swal.fire({
                    customClass: {
                        confirmButton: 'sweetbtn',
                        cancelButton: 'sweetbtn'
                    },
                    text: "ELIMINARA El PROGRAMA DEL LA PAGINA WEB.",
                    title: 'Desea eliminar la oferta',
                    showCancelButton: true,
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                      //Swal.fire('Eliminando', '', 'success')
                      e.target.submit();
                    } 
                })
            }); //fin evento addeventlistener
        }); //fin foreach
    }
}


export function validarsubmitprograma(){  //funcion para eliminar el registro de un programa academico
    const forms = document.querySelector('#eliminar-registro');
    if(forms){  
        forms.addEventListener('submit', (e)=>{
            e.preventDefault();
            Swal.fire({
                customClass: {
                    confirmButton: 'sweetbtn',
                    cancelButton: 'sweetbtn'
                },
                text: "NO DEBE HABER ESTUDIANTES EN EL PROGRAMA!. TAMBIEN SE ELIMINARAN LOS GRUPOS.",
                title: 'Desea eliminar el registro completo?',
                showCancelButton: true,
                confirmButtonText: 'Si',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                  //Swal.fire('Eliminando', '', 'success')
                  e.target.submit();
                } 
            })
        });
    }
}


export function validarsubmitusers(){  //funcion para eliminar el registro de un usuario coordinador.
    const forms = document.querySelectorAll('#eliminar-users');
    if(forms){  
        forms.forEach(form => {
            form.addEventListener('submit', (e)=>{
                e.preventDefault();
                Swal.fire({
                    customClass: {
                        confirmButton: 'sweetbtn',
                        cancelButton: 'sweetbtn'
                    },
                    text: "ELIMINARA AL USUARIO COLABORADOR DE LA BASE DE DATOS.",
                    title: 'Desea eliminar el registro completo?',
                    showCancelButton: true,
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                      //Swal.fire('Eliminando', '', 'success')
                      e.target.submit();
                    } 
                })
            }); //fin evento addeventlistener
        }); //fin foreach
    }
}


export function validarsubmitestudiante(){  //funcion para eliminar el registro de un estudiante
    const forms = document.querySelectorAll('#eliminar-registro-estudiante');
    if(forms){
        forms.forEach(element=>{
            element.addEventListener('submit', (e)=>{
                e.preventDefault();
                Swal.fire({
                    customClass: {
                        confirmButton: 'sweetbtn',
                        cancelButton: 'sweetbtn'
                    },
                    text: "SE PERDERA TODA LA INFORMACION DEL ESTUDIANTE CONTENIDO EN EL SISTEMA!",
                    title: 'Desea eliminar el registro completo?',
                    showCancelButton: true,
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                      //Swal.fire('Eliminando', '', 'success')
                      e.target.submit();
                    } 
                })
            });
        });  
    }
}

export function accion_checkbox(){  //funcion cunado se edita programa  y se desea editar el grupo
    const checkbox = document.querySelector('#activar-input');
    if(checkbox){
        checkbox.addEventListener('change', function(){
            if(this.checked){
                this.parentElement.nextElementSibling.disabled = false;  //id = selectgrupo selector multiple
                document.querySelector('#selectestadogrupo').disabled = false;
                document.querySelector('#sede').disabled = false;
                document.querySelector('#nombregrupo').disabled = false;
                document.querySelector('#detallegrupo').disabled = false;
                document.querySelector('#idprograma').disabled = false;
                if(document.querySelector('#selectgrupo').options.selectedIndex) //si al activar el selector multiple quitando el disabled pregunta en que posicion del selector esta
                    document.querySelector('.btn-eliminargrupo').style.display = 'block';
                
            }else{ 
                this.parentElement.nextElementSibling.disabled = true;
                document.querySelector('#selectestadogrupo').disabled = true;
                document.querySelector('#sede').disabled = false;
                document.querySelector('#nombregrupo').disabled = true;
                document.querySelector('#detallegrupo').disabled = true;
                document.querySelector('#idprograma').disabled = true;
                document.querySelector('.btn-eliminargrupo').style.display = 'none';
            }
        });
    } 
}


export function accion_barra_prog_new_student(){
    const btn_prog_new_student = document.querySelectorAll('.barra-nuevo-registro i');
    if(btn_prog_new_student){
        btn_prog_new_student.forEach((element, index)=>{
            element.addEventListener('click', (e)=>{
                const abrirdivs = document.querySelectorAll('.desplegardiv');
                abrirdivs.forEach((abrirdiv, i)=>{
                    if(index === i)abrirdiv.classList.toggle('activar-desplegardiv');
                });
            });
        });
    }
}


export function agregarsemestre(){ //cunado se crea programa y se desea añadir varios niveles o semestres
    const btn_nivel = document.querySelector('.btn_nivel');
    if(btn_nivel){
        const niveles = document.querySelector('.niveles');
        let i=1;
        btn_nivel.addEventListener('click', (e)=>{
            let clone = e.target.parentElement.nextElementSibling.cloneNode(true);
            console.log(clone.children[1].name = `niveles[nombrenivel${++i}]`);
            niveles.appendChild(clone);
        });
    }
}

export function selectprograma(){  //cuando se registra estudiante por primera vez y se inscribe en un programa y luego en un grupo
    const selectprogramas = document.querySelectorAll('.selectprograma');
    if(selectprogramas){
        const selectgrupo = document.querySelectorAll('.selectgrupo-crear-ver .selectgrupo');
        selectprogramas.forEach((selectprograma, index) =>{
            selectprograma.addEventListener('change', function(e){
                let idprograma = e.target.value;
                selectgrupo[index].disabled = false;
                while(selectgrupo[index].firstChild)selectgrupo[index].removeChild(selectgrupo[index].firstChild);
    
                traergrupos(idprograma).then(resultado => {
                    resultado.forEach(element =>{
                        if(element.sede.ciudad != 'Final'){
                            const option = document.createElement('option');
                            option.textContent = element.nombregrupo+'-'+element.nombrenivel.nombrenivel+'-'+element.sede.ciudad;
                            option.value = element.id;
                            selectgrupo[index].appendChild(option);
                        }
                    });
                });
            }); //cierre del evento addeventlistener
        });
    }
}
async function traergrupos(idprograma){ //esta en admin_controlador.php
    const datos = new FormData();
    datos.append('idprograma', idprograma);
    try {
        const url = "http://mvc_carlomagno.com.co.test/apitraergrupos";
        const respuesta = await fetch(url, {method: 'POST', body: datos}); 
        const resultado = await respuesta.json(); //respuesta que viene del backend de public static function apislider()
        console.log(resultado);
        return resultado;
    } catch (error) {
        console.log(error);
    }
}

//*******ADMIN PROGRAMAS **funciones q gestionan la seleccion de grupos e eliminacion************///
export function selectgrupo(){ //funcion que detecta una opcion del select y se trae la info del grupo elegido
    const selectoption = document.querySelector('#selectgrupo');
    if(selectoption){
        selectoption.addEventListener('change', async function(e){

            document.querySelector('.btn-eliminargrupo').style.display = 'block'; //muesta el btn eliminar grupo
            const datos = new FormData();
            datos.append('id', e.target.value);
            
            try {
                const url = "http://mvc_carlomagno.com.co.test/apigrupo";
                const respuesta = await fetch(url, {method: 'POST', body: datos}); 
                const resultado = await respuesta.json(); //respuesta que viene del backend de public static function 
                
                const sede = document.querySelector('#sede');
                const estadogrupo = document.querySelector('#selectestadogrupo');
                const nombregrupo = document.querySelector('#nombregrupo');
                const detallegrupo = document.querySelector('#detallegrupo');
                const cantidadestud = document.querySelector('.estudiantesxgrupo');
                const btneliminargrupo = document.querySelector('.btn-eliminargrupo a');

                for(let i=0; i<sede.options.length; i++)
                    if(sede.options[i].value == resultado.idsede)
                        sede.options[i].selected = true;
                
                for(let i=0; i<estadogrupo.options.length; i++)
                    if(estadogrupo.options[i].value == resultado.estado)
                        estadogrupo.options[i].selected = true;
                    
                nombregrupo.value = resultado.nombregrupo;
                detallegrupo.value = resultado.detallegrupo;
                cantidadestud.textContent = resultado.cantidad_estud;
                btneliminargrupo.href = '/admin/dashboard/admin_programas/actualizar/eliminar_grupo?id='+resultado.id;
    
                btneliminargrupo.onclick = eliminargrupo;       
    
            } catch (error) {
                console.log(error);
            }  
        });
    }  
}
function eliminargrupo(e){
    e.preventDefault();
    console.log(e.target.parentElement.href);
    Swal.fire({
        customClass: {
            confirmButton: 'sweetbtn',
            cancelButton: 'sweetbtn'
        },
        text: "NO DEBE HABER ESTUDIANTES EN EL GRUPO!",
        title: 'Desea eliminar el Grupo?',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
          //Swal.fire('Grupo eliminando', '', 'success')
          window.location = e.target.parentElement.href;
        } 
    })
}
//*******

export function selectnivel(){ //aplica en adminprogramas para actualizar el nivel del programa
    const nivels = document.querySelectorAll('#selectnivel');
    if(nivels){
        nivels.forEach((nivel, index)=>{
            if(index>0){
                const inputnivel = document.querySelector('.inputnivel');
                nivel.addEventListener('change', function(e){
                // console.log(e.target.options[this.options.selectedIndex].textContent); //se tree el tecto del option selected
                    inputnivel.value = e.target.options[this.options.selectedIndex].textContent;
                });
            }
        });
    }
}
////////////////seleccionar programa segun estudiante en visa ver.php//////////////////////
export function traermatricula(){  //maricula = al programa q tenga el estudiante registrado = id de la tabla estud_grupo

    const traermatricula = document.querySelector('#selectmatricula');
    if(traermatricula){
        traermatricula.addEventListener('change', async(e)=>{
            console.log(e.target.value);
            document.querySelector('input[type=submit]').disabled = false; //Activar btn submit guardar cambios
            document.querySelector('.nombre-programa label').textContent = e.target.options[e.target.options.selectedIndex].textContent;

            const datos = new FormData();
            datos.append('id', e.target.value);
            const url = "http://mvc_carlomagno.com.co.test/apitraermatricula";
            try {
                const respuesta = await fetch(url, {method: 'POST', body: datos}); 
                const resultado = await respuesta.json();
                console.log(resultado);
                //llenar campos
                document.querySelector('#fecha_inicio').value = resultado.fecha_inicio;
                document.querySelector('#fecha_finalizacion').value = resultado.fecha_fin;
                document.querySelector('#nmatricula').value = resultado.id;
                document.querySelector('#idcoordinador').value = resultado.idcolaborador;
                document.querySelector('#nombrecoordinador').value = resultado.nombrecolaborador+' '+resultado.apellidocolaborador;
                document.querySelector('#nivel').value = resultado.nivel;
                document.querySelector('#grupo').value = resultado.nombregrupo+'-'+resultado.ciudad;
                const estado = document.querySelector('#estadomatricula').options;
                for(let i=1; i<5; i++)
                    if(estado[i].textContent === resultado.estado)
                        estado[i].selected = true;
                
                document.querySelector('#observacion').value = resultado.observacion;
            }catch(error){
                console.log(error);
            }
        });
    }
}
////// cuando se desea cambiar de programa o grupo por equivocacion a estudiante en ver.php //////
export function cambiogrupo(){
    const checkbox = document.querySelector('#activar-cambioprograma');
    if(checkbox){
        checkbox.addEventListener('change', function(){
            if(this.checked){
                this.parentElement.nextElementSibling.disabled = false;
                //document.querySelector('#nombregrupo').disabled = false;
            }else{
                this.parentElement.nextElementSibling.disabled = true;
                if(!document.querySelector('#selectcambiogrupo').disabled){ //si disable = false = desahbilitado
                    document.querySelector('#selectcambiogrupo').disabled = true;
                }
            }
        });
    }
}

////seleccionar programa o matricula del estudiante para hacer el pago en ver.php////
export function selectpagoidmatricula(){
    const pagomatricula = document.querySelector('#selectpagoidmatricula');
    if(pagomatricula){
        pagomatricula.addEventListener('change', (e)=>{
            document.querySelector('.idmatricula').textContent = e.target.value;
        });
    }
}


export function cambio_niveles(){ //traer estudiantes deacuerdo a la carrera, nivel y sede
    const nivelprogramas = document.querySelector('#nivel_programas');
    const nivel_semestres = document.querySelectorAll('#nivel_semestres');
    const nivel_grupos = document.querySelectorAll('#nivel_grupos');
    if(nivelprogramas){
        nivelprogramas.addEventListener('change', function(e){
            while(nivel_grupos[0].firstChild)nivel_grupos[0].removeChild(nivel_grupos[0].firstChild);
            let id_programa = e.target.value;
            traerniveles(id_programa, nivel_semestres[0]);
        });
        nivel_semestres.forEach((nivel_semestre, index) => {
            nivel_semestre.addEventListener('change', (e)=>{
                traer_grupos_sedes(e.target.value, nivel_grupos, index); //id = semestre/nivel, el elemento select, y el indice dle select al cual corresponde en el dom
            });
        });
    }
}
async function traerniveles(id_programa, nivel_semestres){
    while(nivel_semestres.firstChild)nivel_semestres.removeChild(nivel_semestres.firstChild);
    const datos = new FormData();
    datos.append('id_programa', id_programa);
    const url = '/api/traer_niveles';
    try {
        const respuesta = await fetch(url, {method: 'POST', body: datos});
        const resultado = await respuesta.json();
        
        const option = document.createElement('option');
        option.textContent = '-- Seleccione --';
        option.value = '';
        option.disabled = true;
        option.selected = true;
        nivel_semestres.appendChild(option);

        resultado.forEach(nivel =>{
            const option = document.createElement('option');
            option.textContent = nivel.nombrenivel;
            option.value = nivel.id;
            nivel_semestres.appendChild(option);
        });
    } catch (error) {
        console.log(error);
    }
}
async function traer_grupos_sedes(id_nivel, nivel_grupos, index){
    //const nivel_grupos = document.querySelector('#nivel_grupos');
    while(nivel_grupos[index].firstChild)nivel_grupos[index].removeChild(nivel_grupos[index].firstChild);
    const datos = new FormData();
    datos.append('id_nivel', id_nivel);
    const url = '/api/traer_grupos_sedes';
    try {
        const respuesta = await fetch(url, {method: 'POST', body: datos});
        const resultado = await respuesta.json();
        console.log(resultado);
        /*const option = document.createElement('option');
        option.textContent = '-- Seleccione --';
        option.value = '';
        option.disabled = true;
        option.selected = true;
        nivel_grupos.appendChild(option);*/
        const varidsede = document.querySelector('#idsede');
        let idsede = null;
        if(varidsede)idsede = varidsede.value;

        resultado.forEach(grupo_sede =>{ // los semestres no tiene el id = 1 por eso no se muestra los grupos cunado se elige grupo finalizado de alguna carrera
            if(!index || (index&&(grupo_sede.idsede == idsede)) || (grupo_sede.idsede == 1 && idsede)){
            const option = document.createElement('option');
            option.textContent = grupo_sede.nombregrupo+'-'+grupo_sede.sede;
            option.value = grupo_sede.id;
            nivel_grupos[index].appendChild(option);
            }

        });
    } catch (error) {
        console.log(error);
    }
}

export function selectall(){ //funciona para seleccionar todos los estudiante a cambiar nivel o semestre
    const selectall = document.querySelector('#selectall');
    const all_student = document.querySelectorAll('input[type="checkbox"]');
    let a = false;
    if(selectall){
        selectall.addEventListener('click', ()=>{
            all_student.forEach(element => element.checked = a );
            if(!a){
                selectall.style.color = "#585858";
                a= true;
            }else{
                selectall.style.color = "#3d72fc";
                a = false;
            }
        });
    }
}

//////preguntar si se desea cambiar el semestre o finalizar////
export function confirmar_cn(){
    const form_update_nivel = document.querySelector('#form-update-nivel');
    if(form_update_nivel){
        form_update_nivel.addEventListener('submit', (e)=>{
            e.preventDefault();
            Swal.fire({
                customClass: {
                    confirmButton: 'sweetbtn',
                    cancelButton: 'sweetbtn'
                },
                text: "SE Actualizara el semestre o nivel academico de los estudiantes!",
                title: 'Desea realizar el cambio?',
                showCancelButton: true,
                confirmButtonText: 'Si',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                  e.target.submit();
                } 
            })
        });
    }
}

////////////////////grafias chart.js /////////////////////////

export function graficoprogramas(){
    const grafica = document.querySelector('#programas-grafica');
    if(grafica){
        obtenerprogramas();
        async function obtenerprogramas(){
            const url = '/api/programas';
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            let a = ['#ea580c', '#84cc16', '#22d3ee', '#a855f7', '#ef4444', '#14b8a6', '#db2777', '#e11d48', '#7e22ce'];
            for(let i=0; i<(resultado.length-9); i++)a=[...a, a[i]];     //si los programas supera 9 se repite color 

            const ctx = document.getElementById('programas-grafica').getContext('2d');
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: resultado.map(programa=>programa.nombre),
                    datasets: [{
                    label: '# of Votes',
                    data: resultado.map(programa=>programa.total),
                    backgroundColor: a,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {legend: {display: false } } //elimina el label del dataset
                }
            });

        } //cierre de la funcion async
    } //cierre del if
} //cierre de la funcion principal exoprt


export function graficagruposprogram(){
    const selectprograma = document.querySelector('#grafica-selectprograma');
    let ax;    
    if(selectprograma){
        const ctx2 = document.getElementById('grupos-grafica').getContext('2d');
        selectprograma.addEventListener('change', function(e){
            let idprograma = e.target.value;
            let a = ['#ea580c', '#84cc16', '#22d3ee', '#a855f7', '#ef4444', '#14b8a6', '#db2777', '#e11d48', '#7e22ce'];


            traergrupos(idprograma).then(resultado => {
                console.log(resultado);
                
                for(let i=0; i<(resultado.length-9); i++)a=[...a, a[i]];

                if(ax)ax.destroy();
                    
                    ax = new Chart(ctx2, {
                        type: 'bar',
                        data: {
                            labels: resultado.map(grupo=>grupo.nombregrupo),
                            datasets: [{
                            label: '# of Votes',
                            data: resultado.map(grupo=>grupo.id),
                            backgroundColor: a,
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {legend: {display: false } }//elimina el label del dataset        
                        }
                    });
            });
        }); //cierre del evento addeventlistener
    }   
}