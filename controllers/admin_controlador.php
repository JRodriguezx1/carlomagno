<?php

namespace Controllers;

use Model\ActiveRecord;
use Model\estudiantes;
use Model\oferta;
use Model\estud_grupo;
use Model\programas;
use Model\sedes;
use Model\niveles;
use Model\grupos;
use Model\multidato;
use Model\pagos;
use Model\usuarios;
use Classes\paginacion;
use MVC\Router;  //namespace\clase

 
class admin_controlador{

    ////////////////////////////////admin programas//////////////////////////////
    public static function admin_programas(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $allgrupos = new grupos;
        $grupos = $allgrupos->all();
        foreach($grupos as $grupo){
            $grupo->nivel = niveles::uncampo('id', $grupo->id_nivel, 'nombrenivel');
            $grupo->sede = sedes::uncampo('id', $grupo->idsede, 'ciudad');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            if(!is_numeric($_POST['id']))return; //id = programa a eliminar
            $programa = new programas($_POST);
            $idgrupos = $allgrupos->idregistros('idprograma', $_POST['id']);
            $arrayestudiantes = [];
            $estudiantes = [];
            $r[] = 1;
            foreach($idgrupos as $idgrupo){
                $estudiantes = estud_grupo::idregistros('idgrupo', $idgrupo->id);
                if(!empty($estudiantes))break;
                $arrayestudiantes = array_merge($arrayestudiantes, $estudiantes); ////me obtiene todos los estudiantes de un programa con x grupos
            }
            if($estudiantes){
                $alertas['error'][] = "No se puede eliminar programa, hay estudiantes registrados.";
            }else{
                foreach($idgrupos as $idgrupo){
                    $r = $idgrupo->eliminar_registro(); //eliminar cada grupo
                }
                if($r){
                    $n = niveles::eliminar_idregistros('id_programa', $_POST); //eliminar los niveles dle programa
                }
                if($n)$x = $programa->eliminar_registro(); //elimina el programa
                if($x){
                    $alertas['exito'][] = "Programa eliminado correctamente";
                }else{
                    $alertas['error'][] = "No fue posible";
                }
            }
        }

        if(isset($_GET['accion'])){
            if($_GET['accion'] == "actualizado")$alertas['exito'][] = "Programa actualizado correctamente";
            if($_GET['accion'] == "creado")$alertas['exito'][] = "Programa registrado correctamente";
        }
        $programas = programas::all();
        $router->render('dashboard/adminprogramas/inicio', ['titulo'=>'Admin', 'programas'=>$programas, 'grupos'=>$grupos, 'alertas'=>$alertas, 'session'=>$_SESSION]);
    }


    public static function crear_programas(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $i = true;
        
        $programa = new programas;
        $niveles = new niveles;
        $grupo = new grupos;

        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $programa->compara_objetobd_post($_POST);
            $alertas = $programa->validar_programa();
            if(empty($alertas)){
                foreach($_POST['niveles'] as $value){
                    $array['nombrenivel'] = $value;
                    $niveles->compara_objetobd_post($array);
                    $alertas = $niveles->validar_nivel();
                    if(!empty($alertas)){
                       $i = false; 
                       break;
                    }
                }
                if($i){
                    $p = $programa->crear_guardar(); //se crea el programa
                    if($p[0]){
                        //crear nivel Final y grupo final
                        $array['nombrenivel'] = "Final";
                        $niveles->compara_objetobd_post($array);
                        $niveles->id_programa = $p[1];
                        $n_final = $niveles->crear_guardar();
                        if($n_final){ //creamos grupo Finalizado
                            $grupo->compara_objetobd_post(['idprograma'=>$p[1], 'id_nivel'=>$n_final[1], 'idsede'=>1, 'nombregrupo'=>'Finalizado']);
                            $g_final = $grupo->crear_guardar();
                        }
                        foreach($_POST['niveles'] as $value){
                            $array['nombrenivel'] = $value;
                            $niveles->compara_objetobd_post($array);
                            $niveles->id_programa = $p[1];
                            $n = $niveles->crear_guardar();
                        }
                    }
                    if($n[0])$alertas['exito'][] = "Programa y nivele(s)/semestre(s) creado(s) correctamente";
                }
            }    
        }
        $router->render('dashboard/adminprogramas/crear', ['titulo'=>'Admin', 'alertas'=>$alertas, 'programa'=>$programa, 'session'=>$_SESSION]);
    }


    public static function actualizar_programas(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $id = $_GET['id'];
        if(!is_numeric($id))return;

        if(isset($_GET['grupoeliminado'])){
        $grupoeliminado = $_GET['grupoeliminado'];
        if($grupoeliminado == '1x')$alertas['exito'][] = "El grupo se ha eliminado correctamente";
        if($grupoeliminado == '1bx')$alertas['error'][] = "El grupo tiene estudiantes actualmente";
        }

        $programa = programas::find('id', $id);
        $niveles = niveles::idregistros('id_programa', $id); //trae todos lo registros especificando la columna
        $grupos = grupos::idregistros('idprograma', $id);
        $sedes = sedes::all();
        foreach($grupos as $grupo){
            $grupo->nombrenivel = niveles::find('id', $grupo->id_nivel);
            $grupo->sede = sedes::uncampo('id', $grupo->idsede, 'ciudad');
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            // cuando se actualiza programa o grupo o programa y grupo
            if(isset($_POST['update-programa'])){
                $programa->compara_objetobd_post($_POST['programa']);
                $alertas = $programa->validar_programa();
                if(isset($_POST['grupo'])){
                    if($id != $_POST['grupo']['idprograma'])return;
                    $grupo = new grupos($_POST['grupo']);
                    $idnivel = grupos::uncampo('id', $_POST['grupo']['id'], 'id_nivel'); //metrae solo el valor del campo id_nivel deacuero al id
                    //$grupo->id_nivel = $idnivel['id_nivel'];
                    $grupo->id_nivel = $idnivel;
                    $alertas = $grupo->validar_grupo();
                    if(empty($alertas))$g = $grupo->actualizar();
                }
                if(empty($alertas)){
                    if($id != $_POST['programa']['id'])return;
                    $p = $programa->actualizar();
                    if($p)header('Location: /admin/dashboard/admin_programas?accion=actualizado');
                }
            }
            //cuando se crea un grupo nuevo a un programa ya existente
            if(isset($_POST['nuevo-grupo'])){
                if($id != $_POST['idprograma'])return;
                $grupo = new grupos($_POST);
                $alertas = $grupo->validar_grupo();
                if(empty($alertas)){ 
                    $r = $grupo->crear_guardar();
                    if($r[0])$alertas['exito'][] = "El grupo se ha creado correctamente";
                }
            }
            //cuando se crea un grupo nuevo a un programa ya existente
            if(isset($_POST['actualizar-nivel'])){
                if($id != $_POST['id_programa'])return;
                $nivel = new niveles($_POST);
                $alertas = $nivel->validar_nivel();
                if(empty($alertas)){
                    $n = $nivel->actualizar();
                    if($n)$alertas['exito'][] = "El nivel se ha actualizado correctamente";
                }
            }
            //cuando se crea un grupo nuevo a un programa ya existente
            if(isset($_POST['crear-nivel'])){
                if($id != $_POST['id_programa'])return;
                $nivel = new niveles($_POST);
                $alertas = $nivel->validar_nivel();
                if(empty($alertas)){
                    $n = $nivel->crear_guardar();
                    if($n[0])$alertas['exito'][] = "El nivel se ha creado correctamente";
                }
            }
        }
        $router->render('dashboard/adminprogramas/actualizar', ['titulo'=>'Admin', 'programa'=>$programa, 'sedes'=>$sedes, 'grupos'=>$grupos, 'niveles'=>$niveles, 'alertas'=>$alertas, 'session'=>$_SESSION]);
    }


    public static function cambio_grupo(){ // endpoint: apigrupo => api cuando se selecciona otro grupo en actualizar programa
        $idgrupo = $_POST['id'];
        $grupo = grupos::find('id', $idgrupo);
        $cantidad_estud = estud_grupo::totalarray(['idgrupo'=>$idgrupo]);
        $grupo->cantidad_estud = $cantidad_estud;
        echo json_encode($grupo);
    }

    public static function eliminar_grupo(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $id = $_GET['id']; //id es el id del grupo q viene del icono de eliminar el grupo
        if(!is_numeric($id))return;
        $grupo = grupos::find('id', $id);
        $programa = programas::find('id', $grupo->idprograma);
        if($grupo){
            ////antes de eliminar el grupo se debe verificar si no hay estudiantes registrados ne lka tabla estud_grupo
            $estudiantes = estud_grupo::idregistros('idgrupo', $id);  //me trea todos los registros
            if(!$estudiantes){ //si no hay estudiantes se puede eliminar el grupo
                $r = $grupo->eliminar_registro();
                if($r)
                    //$alertas['exito'][] = "El grupo se ha eliminado correctamente"; 
                    header("Location: /admin/dashboard/admin_programas/actualizar?id={$grupo->idprograma}&grupoeliminado=1x");
            }
            else{
                //$alertas['error'][] = "El grupo tiene estudiantes actualmente";
                header("Location: /admin/dashboard/admin_programas/actualizar?id={$grupo->idprograma}&grupoeliminado=1bx");
            }
            //$grupos = grupos::idregistros('idprograma', $grupo->idprograma);
        }else{
            header('Location: /admin/dashboard/inicio');
        }

        //$router->render('dashboard/adminprogramas/actualizar', ['titulo'=>'Admin', 'programa'=>$programa, 'grupos'=>$grupos, 'alertas'=>$alertas, 'session'=>$_SESSION]);
    }

    ////////////////////////// Niveles ///////////////////////////

    //////////////////////FIN ADMIN PROGRAMAS, GRUPO y NIVELES//////////////////



    ///////////////admin estudiantes/////////////
    public static function admin_estudiantes(Router $router){
        session_start();
        isauth();
        $alertas = [];
        $programas = programas::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $matriculas = estud_grupo::idregistros('idestudiante', $_POST['idestudiante']);
            foreach($matriculas as $matricula)$idmatriculas[] = $matricula->id;
            //eliminar pagos de la tabla pagos
            $pagos = pagos::eliminar_idregistros('idmatricula', $idmatriculas);
            //eliminar registros de estud_grupo
            if($pagos){
                $est = estud_grupo::eliminar_idregistros('idestudiante', $_POST);
            }else{ $alertas['error'][] = "Error al eliminar registro de pagos"; return;}
            //eliminar de la tabla estudiantes
            if($est){
                $estudiante = estudiantes::eliminar_idregistros('id', $_POST);
            }else{ $alertas['error'][] = "Error al eliminar registro del estudiante"; return;}
            /*
            if($estudiante){
                $alertas['exito'][] = "Registro eliminado correctamente";
            }else{ $alertas['exito'][] = "Error al eliminar datos de estudiante";}*/
        }

        $pagina_actual = $_GET['pagina'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual<1)header('Location: /admin/dashboard/admin_estudiantes?pagina=1');
       
        $registros_por_pagina = 10;
        $registros_total = estud_grupo::numregistros();
        $paginacion = new paginacion($pagina_actual, $registros_por_pagina, $registros_total);
        if($pagina_actual>$paginacion->total_paginas()&&$paginacion->total_paginas()!=0)header('Location: /admin/dashboard/admin_estudiantes?pagina=1');
        //$estudiantes = estud_grupo::paginar($registros_por_pagina, $paginacion->offset());
        
        $consulta = "SELECT estudiantes.nombre, estudiantes.apellido, estudiantes.cedula, estudiantes.sede, estudiantes.fecha_registro, estud_grupo.id, estud_grupo.idestudiante, estud_grupo.estado, estud_grupo.fecha_inicio, niveles.nombrenivel, programas.nombre AS programa, grupos.nombregrupo, sedes.ciudad FROM estudiantes ";
        $consulta.= "INNER JOIN estud_grupo ON estudiantes.id = estud_grupo.idestudiante ";
        $consulta.= "INNER JOIN niveles ON estud_grupo.idnivel = niveles.id ";
        $consulta.= "INNER JOIN grupos ON grupos.id = estud_grupo.idgrupo ";
        $consulta.= "INNER JOIN sedes ON grupos.idsede = sedes.id ";
        $consulta.= "INNER JOIN programas ON programas.id = grupos.idprograma ORDER BY id DESC LIMIT 10 OFFSET {$paginacion->offset()};";
        $estudiantes = multidato::inner_join($consulta);
        
        $router->render('dashboard/adminestudiantes/inicio', ['titulo'=>'Admin', 'alertas'=>$alertas, 'estudiantes'=>$estudiantes, 'programas'=>$programas, 'paginacion'=>$paginacion->paginacion(), 'session'=>$_SESSION]);
    }


    public static function crear_estudiante(Router $router){
        session_start();
        isauth();
        $alertas = [];
        
        $programas = programas::idregistros('estado', 'activo');
        $estudiante = new estudiantes;
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $estudiante->compara_objetobd_post($_POST);
            $alertas = $estudiante->validar_estudiantes();
            $alertas = $estudiante->validarEmail();
            if(empty($alertas)){
                //validar la cedula y email del estudiante que no exista en la BD
                $cc = $estudiante::find('cedula', $_POST['cedula']);
                if(!$cc){
                    $estudiante->idcoordinador = $_SESSION['id'];
                    $r = $estudiante->crear_guardar();  //$r = [true/false, 1,2]  r toma arreglo en donde es true/falsa la creacion de registro y un numero del ultimo registro guardado o creado
                    if($r[0]){
                    // unset($estudiante);
                        $estudiante = '';
                        $idestudiante = $r[1];
                        //$idprograma = $_POST['programa']; //toma el name="programa" del archivo views/adminestudiantes/crear.php
                        $idgrupo = $_POST['idgrupo'];
                        $grupo = grupos::find('id', $idgrupo);
                        if($grupo){
                            //debuguear($grupo);
                            $idnivel = $grupo->id_nivel;
                            $arreglo_fk = ['idestudiante'=>$idestudiante, 'idnivel'=>$idnivel, 'idgrupo'=>$idgrupo, 'idcolaborador'=>$_SESSION['id'], 'estado'=>$_POST['estado']];
                            $x = new estud_grupo($arreglo_fk);
                            $rx = $x->crear_guardar();
                            if($rx[0])
                                header('Location: /admin/dashboard/admin_estudiantes?accion=creado');
                        }
                    }
                }else{ //fin if validar cc
                    $alertas['error'][] = "Estudiante con la CC: ".$_POST['cedula']." ya esta registrado.";
                } 
            } //fin del empty $alertas
        }
        $router->render('dashboard/adminestudiantes/crear', ['titulo'=>'Admin', 'alertas'=>$alertas, 'estudiante'=>$estudiante, 'programas'=>$programas, 'session'=>$_SESSION]);
    }


    public static function excel_estudiantes(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){ //para exportar a excel estudiante
            $consulta = "SELECT estudiantes.nombre, estudiantes.apellido, estudiantes.cedula, estudiantes.telefono, estudiantes.email, estudiantes.sede, estudiantes.fecha_registro, estud_grupo.id, estud_grupo.idestudiante, estud_grupo.estado, estud_grupo.fecha_inicio, niveles.nombrenivel, programas.nombre AS programa, grupos.nombregrupo, sedes.ciudad FROM estudiantes ";
            $consulta.= "INNER JOIN estud_grupo ON estudiantes.id = estud_grupo.idestudiante ";
            $consulta.= "INNER JOIN niveles ON estud_grupo.idnivel = niveles.id ";
            $consulta.= "INNER JOIN grupos ON grupos.id = estud_grupo.idgrupo ";
            $consulta.= "INNER JOIN sedes ON grupos.idsede = sedes.id ";
            $consulta.= "INNER JOIN programas ON programas.id = grupos.idprograma ORDER BY id DESC;";
            $estudiantes = multidato::inner_join($consulta);
            
            //debuguear($estudiantes);
            //$array = (array)$estudiantes[0];

            //$r = json_encode($estudiantes[0]);
            //$outr = json_decode($r, true);
            
            if(isset($_POST['excel'])){
                if(!empty($estudiantes)){
                    $filename = "estudiantes.xls";
                    header("Content-Type: application/vnd.ms-excel");
                    header("Content-Disposition: attachment; filename=".$filename);

                    $mostrar_columnas = false;

                    foreach($estudiantes as $estudiante){
                        if(!$mostrar_columnas){
                            echo implode("\t", array_keys((array)$estudiante)) . "\n";
                            $mostrar_columnas = true;
                        }
                        echo implode("\t", array_values((array)$estudiante)) . "\n";
                    }
                }else{ echo 'No hay datos a exportar'; }
                exit;
            } 
        }
    }

    public static function cambio_nivel(Router $router){ //cuando se consulta el programa el semestre/nivel y grupo a cambiar el nivel/semestre
        session_start();
        isauth();
        $alertas = [];
        $programas = programas::all();
        $estudiantes = [];
        $niveles = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $idnivel = $_POST['idnivel'];
            $idgrupo = $_POST['idgrupo'];
            $estudiantes = estud_grupo::whereArray(['idnivel'=>$idnivel, 'idgrupo'=>$idgrupo]);
            foreach($estudiantes as $estudiante){
                $estudiante->nombre = estudiantes::uncampo('id', $estudiante->idestudiante, 'nombre');
                $estudiante->apellido = estudiantes::uncampo('id', $estudiante->idestudiante, 'apellido');
                $estudiante->cedula = estudiantes::uncampo('id', $estudiante->idestudiante, 'cedula');
                $estudiante->nivel = niveles::uncampo('id', $estudiante->idnivel, 'nombrenivel');
                $estudiante->grupo = grupos::uncampo('id', $estudiante->idgrupo, 'nombregrupo');
                $estudiante->idprograma = grupos::uncampo('id', $estudiante->idgrupo, 'idprograma');
                $estudiante->programa = programas::uncampo('id', $estudiante->idprograma, 'nombre');
                $estudiante->idsede = grupos::uncampo('id', $estudiante->idgrupo, 'idsede');
                $estudiante->sede = sedes::uncampo('id', $estudiante->idsede, 'ciudad');
            }
            $niveles = niveles::idregistros('id_programa', $_POST['idprograma']); //traer los niveles segun programa elegido para cambiar a los estudiantes
        }
        
        $router->render('dashboard/adminestudiantes/cambio_nivel', ['titulo'=>'Admin', 'alertas'=>$alertas, 'estudiantes'=>$estudiantes, 'programas'=>$programas, 'niveles'=>$niveles, 'session'=>$_SESSION]);
    }
    public static function traer_niveles(){
        $niveles = niveles::idregistros('id_programa', $_POST['id_programa']);
        echo json_encode($niveles);
    }
    public static function traer_grupos_sedes(){
        $grupos = grupos::idregistros('id_nivel', $_POST['id_nivel']);
        foreach($grupos as $grupo){
            $grupo->sede = sedes::uncampo('id', $grupo->idsede, 'ciudad');
        }
        echo json_encode($grupos);
    }
    public static function lista(){ //sacar lista de estudiantes segun programa, semestre y grupo

        if(($_SERVER['REQUEST_METHOD'] === 'POST') && !empty($_POST['idnivel']) && !empty($_POST['idgrupo'])){ //para exportar a excel lista de estudiante
            $idnivel = $_POST['idnivel'];  $idgrupo = $_POST['idgrupo'];
            $consulta = "SELECT estudiantes.nombre, estudiantes.apellido, estudiantes.cedula, estudiantes.telefono, estudiantes.email, estudiantes.sede, estudiantes.fecha_registro, estud_grupo.id, estud_grupo.idestudiante, estud_grupo.idgrupo, estud_grupo.idnivel, estud_grupo.estado, estud_grupo.fecha_inicio, niveles.nombrenivel, programas.nombre AS programa, grupos.nombregrupo, sedes.ciudad FROM estudiantes ";
            $consulta.= "INNER JOIN estud_grupo ON estudiantes.id = estud_grupo.idestudiante ";
            $consulta.= "INNER JOIN niveles ON estud_grupo.idnivel = niveles.id ";
            $consulta.= "INNER JOIN grupos ON grupos.id = estud_grupo.idgrupo ";
            $consulta.= "INNER JOIN sedes ON grupos.idsede = sedes.id ";
            $consulta.= "INNER JOIN programas ON programas.id = grupos.idprograma WHERE idnivel = {$idnivel} AND idgrupo = {$idgrupo} ORDER BY id DESC;";
            $estudiantes = multidato::inner_join($consulta);
            
            if(isset($_POST['lista'])){
                if(!empty($estudiantes)){
                    $filename = "list_estudiantes.xls";
                    header("Content-Type: application/vnd.ms-excel");
                    header("Content-Disposition: attachment; filename=".$filename);

                    $mostrar_columnas = false;

                    foreach($estudiantes as $estudiante){
                        if(!$mostrar_columnas){
                            echo implode("\t", array_keys((array)$estudiante)) . "\n";
                            $mostrar_columnas = true;
                        }
                        echo implode("\t", array_values((array)$estudiante)) . "\n";
                    }
                }else{ echo 'No hay datos a exportar'; }
                exit;
            } 
        }else{
            header("Location: /admin/dashboard/admin_estudiantes/cambio_nivel");
        }
    }
    public static function aplicar_CN(Router $router){ //metodo q se llama cunado se aplica cambios en nivel o semestre o cuando se termina la carreara
        session_start();
        isauth();
        $alertas = [];
        $estudiantes = [];
        $programas = programas::all();
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            //revisar si el grupo es finalizado o no, si es final modificar campo estado=Finalizado y fecha_fin
            $grupofinal = grupos::uncampo('id', $_POST['idgrupo'], 'nombregrupo');
            if($grupofinal == "Finalizado"){
                $matriculas = estud_grupo::actualizar_ids(['idnivel'=>$_POST['idnivel'], 'idgrupo'=>$_POST['idgrupo'], 'estado'=>'Finalizado', 'fecha_fin'=>date('Y-m-d')], $_POST['matricula']);
            }else{
                $matriculas = estud_grupo::actualizar_ids(['idnivel'=>$_POST['idnivel'], 'idgrupo'=>$_POST['idgrupo']], $_POST['matricula']);
            }
            if($matriculas){
                $alertas['exito'][] = "Actualizacion correcta a estudiante(s)";
            }else{
                $alertas['error'][] = "Hubo error vuelva a intentarlo";
            }
        }
        $router->render('dashboard/adminestudiantes/cambio_nivel', ['titulo'=>'Admin', 'alertas'=>$alertas, 'programas'=>$programas, 'estudiantes'=>$estudiantes, 'session'=>$_SESSION]);
    }

    
    public static function filtro_estudiantes(Router $router){ //metodo que busca por cedula o nombre
        session_start();
        isauth();
        $alertas = [];

        $programas = programas::all();

        $pagina_actual = $_GET['pagina'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual<1)header('Location: /admin/dashboard/admin_estudiantes?pagina=1');

        $registros_por_pagina = 10;
        //$registros_total = estud_grupo::numregistros();
        if($_POST['filtro'] == "cedula"){
        $registros_total = estudiantes::inner_join("SELECT COUNT(*) FROM estudiantes WHERE cedula LIKE '{$_POST['buscar']}%';");
        }else{
            $registros_total = estudiantes::inner_join("SELECT COUNT(*) FROM estudiantes WHERE nombre LIKE '{$_POST['buscar']}%';");
        }
        $paginacion = new paginacion($pagina_actual, $registros_por_pagina, $registros_total);
        if($pagina_actual>$paginacion->total_paginas()&&$paginacion->total_paginas()!=0)header('Location: /admin/dashboard/admin_estudiantes/filtro?pagina=1');

    
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){ 
            $tipofiltro = $_POST['filtro']; //puede tomar value = 'cedula' o 'estudiantes.nombre'
            $dato = $_POST['buscar'];
            $consulta = "SELECT estudiantes.nombre, estudiantes.apellido, estudiantes.cedula, estudiantes.fecha_registro, estud_grupo.id, estud_grupo.idestudiante, estud_grupo.estado, estud_grupo.fecha_inicio, niveles.nombrenivel, programas.nombre AS programa, grupos.nombregrupo FROM estudiantes ";
            $consulta.= "INNER JOIN estud_grupo ON estudiantes.id = estud_grupo.idestudiante ";
            $consulta.= "INNER JOIN niveles ON estud_grupo.idnivel = niveles.id ";
            $consulta.= "INNER JOIN grupos ON grupos.id = estud_grupo.idgrupo ";
            $consulta.= "INNER JOIN programas ON programas.id = grupos.idprograma WHERE {$tipofiltro} LIKE "."'%{$dato}%'"." ORDER BY id ASC LIMIT 10 OFFSET {$paginacion->offset()};";
            $estudiantes = multidato::inner_join($consulta);
        }
       
           
        $router->render('dashboard/adminestudiantes/inicio', ['titulo'=>'Admin', 'alertas'=>$alertas, 'estudiantes'=>$estudiantes, 'programas'=>$programas, 'paginacion'=>$paginacion->paginacion(), 'session'=>$_SESSION]);
    }


    public static function filtro_personalizado(Router $router){  //metodo que busca por programa, semestre y grupo
        session_start();
        isauth();
        $alertas = [];
        $programas = programas::all();

        $pagina_actual = $_GET['pagina'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual<1)header('Location: /admin/dashboard/admin_estudiantes?pagina=1');

        $registros_por_pagina = 10;
        //$registros_total = estud_grupo::numregistros();
        $registros_total = ActiveRecord::inner_join("SELECT COUNT(*) FROM estud_grupo WHERE idnivel = {$_POST['idnivel']} AND idgrupo = {$_POST['idgrupo']};");
        $paginacion = new paginacion($pagina_actual, $registros_por_pagina, $registros_total);
        if($pagina_actual>$paginacion->total_paginas()&&$paginacion->total_paginas()!=0)header('Location: /admin/dashboard/admin_estudiantes/filtro_personalizado?pagina=1');

        if($_SERVER['REQUEST_METHOD'] === 'POST' ){ 
            $idgrupo = $_POST['idgrupo'];  $idnivel = $_POST['idnivel'];
            $consulta = "SELECT estudiantes.nombre, estudiantes.apellido, estudiantes.cedula, estudiantes.fecha_registro, estud_grupo.id, estud_grupo.idestudiante, estud_grupo.estado, estud_grupo.fecha_inicio, estud_grupo.idgrupo, estud_grupo.idnivel, niveles.nombrenivel, programas.nombre AS programa, grupos.nombregrupo FROM estudiantes ";
            $consulta.= "INNER JOIN estud_grupo ON estudiantes.id = estud_grupo.idestudiante ";
            $consulta.= "INNER JOIN niveles ON estud_grupo.idnivel = niveles.id ";
            $consulta.= "INNER JOIN grupos ON grupos.id = estud_grupo.idgrupo ";
            $consulta.= "INNER JOIN programas ON programas.id = grupos.idprograma WHERE idnivel = {$idnivel} AND idgrupo = {$idgrupo}"." ORDER BY id ASC LIMIT 10 OFFSET {$paginacion->offset()};";
            $estudiantes = multidato::inner_join($consulta);
        }   
        $router->render('dashboard/adminestudiantes/inicio', ['titulo'=>'Admin', 'alertas'=>$alertas, 'estudiantes'=>$estudiantes, 'programas'=>$programas, 'paginacion'=>$paginacion->paginacion(), 'session'=>$_SESSION]);
    }


    public static function ver_estudiante(Router $router){
        session_start();
        isauth();
        $alertas = [];
        $pagos = [];
        $array_temp = [];
        $id = $_GET['id'];  //este id es de la tabla estud_grupo = idmatricula para la tabla pagos
        if(!is_numeric($id))return;
       
        if(isset($_GET['nivel'])){
            $url = "/admin/dashboard/admin_estudiantes/cambio_nivel";
        }else{
            $url = "/admin/dashboard/admin_estudiantes";

        }
        //traer los programas para cunado quiere registrar nuevo programa
        $programas = programas::idregistros('estado', 'activo');

        //traer todos los registros(matriculas o programas) q el estudiante halla hecho, es decir q el estudiante se halla registrado varias veces en programas diferentes
        $idestudiante = estud_grupo::uncampo('id', $id, 'idestudiante');
        $datos_estudiante = estud_grupo::idregistros('idestudiante', $idestudiante);
        foreach($datos_estudiante as $key => $value){
            $value->idprograma = grupos::uncampo('id', $value->idgrupo, 'idprograma');
            $value->nombreprograma = programas::uncampo('id', $value->idprograma, 'nombre');
        }  

        //traer todos los pagos de un estudiante
        $consulta = "SELECT pagos.id, pagos.idmatricula, pagos.fecha, pagos.concepto, pagos.monto, estud_grupo.idestudiante FROM pagos ";
        $consulta.= "INNER JOIN estud_grupo ON pagos.idmatricula = estud_grupo.id ";
        $consulta.= "WHERE idestudiante = {$idestudiante} ORDER BY fecha DESC;"; 
        $pagos = pagos::inner_join($consulta);
        
        foreach($pagos as $pago){
            $pago->idgrupo = estud_grupo::uncampo('id', $pago->idmatricula, 'idgrupo');
            $pago->idprograma = grupos::uncampo('id', $pago->idgrupo, 'idprograma');
            $pago->nombreprograma = programas::uncampo('id', $pago->idprograma, 'nombre');
        }

        //registro inicial del estudiante de la tabla estudiantes
        $registroinicial = estudiantes::find('id', $idestudiante);
        //traer todos los pagos
        //$pagos = pagos::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $matricula = new estud_grupo;
            if(isset($_POST['actualizar-matricula'])){
                $actualizarmatricula = $matricula->find('id', $_POST['id']);  //$_POST['id'] = matricula o id de la tabla estud_grupo o programa
                $actualizarmatricula->compara_objetobd_post($_POST);
                if($actualizarmatricula->idcolaborador == null){
                    $actualizarmatricula->idcolaborador = $_SESSION['id'];
                }
                //Actualizar nivel segun grupo elegido
                if(isset($_POST['idgrupo'])){
                    $idnivel = grupos::uncampo('id', $_POST['idgrupo'], 'id_nivel');
                    $actualizarmatricula->idnivel = $idnivel;
                }
                $r = $actualizarmatricula->actualizar();
                if($r){
                    $alertas['exito'][] = "Matricula estudiante actualizada";
                }else{
                    $alertas['error'][] = "Hubo un error revise los campos";
                }
            }

            /////registrar nuevo programa o matricula a estudiante
            if(isset($_POST['registrar-programa-estudiante'])){
                //obtener el id nivel
                $idgrupo = $_POST['idgrupo'];
                    $grupo = grupos::find('id', $idgrupo);
                    if($grupo){
                        $idnivel = $grupo->id_nivel;
                        $_POST['idnivel'] = $idnivel;
                        $x = new estud_grupo($_POST);
                        $rx = $x->crear_guardar();
                        if($rx[0])header('Location: /admin/dashboard/admin_estudiantes?accion=creado');
                    }
            }
        }
        
            if(isset($_GET['exito'])){ //viene del metodo pago
                if($_GET['exito'] == 1)$alertas['exito'][] = 'Pago realizado correctamente';
                if($_GET['exito'] == 2)$alertas['exito'][] = 'Pago eliminado correctamente';
                if($_GET['exito'] == 0)$alertas['error'][] = 'Error vuelva a intentarlo';
                
            }
        $router->render('dashboard/adminestudiantes/ver', ['titulo'=>'Admin', 'alertas'=>$alertas, 'url'=>$url, 'programas'=>$programas, 'registroinicial'=>$registroinicial, 'datos_estudiante'=>$datos_estudiante, 'pagos'=>$pagos, 'session'=>$_SESSION]);
    }
    public static function pagos(Router $router){ //este metodo se llama desde la vista ver "detalle estudiante" cunado se registra pago nuevo el formulario envia info a este metodo
        session_start();
        isauth();
        $alertas = [];
        $pagos = pagos::all();
        $datos_estudiante = estud_grupo::find('id', $_POST['idmatricula']);

        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $pagar = new pagos($_POST);
            $alertas = $pagar->validar_pago();
            if(empty($alertas)){
                $r = $pagar->crear_guardar();
                if($r[0]){
                    header("Location: /admin/dashboard/admin_estudiantes/ver?id={$_POST['idmatricula']}&exito=1");
                    //$alertas['exito'][] = 'Pago realizado correctamente';}
                }else{
                    header("Location: /admin/dashboard/admin_estudiantes/ver?id={$_POST['idmatricula']}&exito=0");
                }
            }else{
                header("Location: /admin/dashboard/admin_estudiantes/ver?id={$_POST['idmatricula']}&exito=0");
            }  
        }
        //$router->render('dashboard/adminestudiantes/ver', ['titulo'=>'Admin', 'alertas'=>$alertas, 'datos_estudiante'=>$datos_estudiante, 'pagos'=>$pagos, 'session'=>$_SESSION]);
    }
    public static function eliminar_pago(Router $router){
        session_start();
        isauth();
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $pago = pagos::find('id', $_POST['id']);
            $idmatricula = $pago->idmatricula;
            $r = $pago->eliminar_registro();
            if($r){
                header("Location: /admin/dashboard/admin_estudiantes/ver?id={$idmatricula}&exito=2");
            }else{
                header("Location: /admin/dashboard/admin_estudiantes/ver?id={$idmatricula}&exito=0");
            }
        }
    }
    
    public static function traermatricula(){ //api para traer la info de estud_grupo o matricula seleccionado el programa en ver.php
        $id = $_POST['id']; //$id = matricula o id de la tabla estud_grupo
        if(!is_numeric($id))return;
        $matricula = estud_grupo::find('id', $id);
        $matricula->idprograma = grupos::uncampo('id', $matricula->idgrupo, 'idprograma');
        $matricula->nombreprograma = programas::uncampo('id', $matricula->idprograma, 'nombre');
        if($matricula->idcolaborador == null){
            $matricula->nombrecolaborador = "No ";
            $matricula->apellidocolaborador = "Aplica";
        }else{ $matricula->nombrecolaborador = usuarios::uncampo('id', $matricula->idcolaborador, 'nombre');
            $matricula->apellidocolaborador = usuarios::uncampo('id', $matricula->idcolaborador, 'apellido');
        }
     
        $matricula->nombregrupo = grupos::uncampo('id', $matricula->idgrupo, 'nombregrupo');
        $matricula->idsede = grupos::uncampo('id', $matricula->idgrupo, 'idsede');
        $matricula->ciudad = sedes::uncampo('id', $matricula->idsede, 'ciudad');
        $matricula->nivel = niveles::uncampo('id', $matricula->idnivel, 'nombrenivel');
        echo json_encode($matricula);
    }


    public static function traergrupos(){  //api que se trae los grupos segun el programa elegido cuando se crea estudiante nuevo 
        $idprograma = $_POST['idprograma'];
        //$grupos = grupos::idregistros('idprograma', $idprograma);
        $grupos = grupos::whereArray(['idprograma'=>$idprograma, 'estado'=>"abierto", ]);
        foreach($grupos as $grupo){
            $grupo->nombrenivel = niveles::find('id', $grupo->id_nivel);
            $grupo->sede = sedes::find('id', $grupo->idsede);
        }
        
        echo json_encode($grupos);
    }

/*
    public static function eliminar_estudiante(Router $router){

    }
*/

    public static function actualizar_estudiante(Router $router){
        session_start();
        isauth();
        $id = $_GET['id'];
        if(!is_numeric($id))return;
        $alertas = [];

        $estudiante = estudiantes::find('id', $id);
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $estudiante->compara_objetobd_post($_POST);
            $alertas = $estudiante->validar_estudiantes();
            $alertas = $estudiante->validarEmail();
            if(empty($alertas)){
                $r = $estudiante->actualizar();
                if($r){
                    $alertas['exito'][] = "Datos basicos de contacto actualizados";
                }else{
                    $alertas['exito'][] = "Error en la actualizacion de la informacion";
                }
            }
        }
        $router->render('dashboard/adminestudiantes/actualizar', ['titulo'=>'Admin', 'alertas'=>$alertas, 'estudiante'=>$estudiante, 'session'=>$_SESSION]);
    }/////////// fin crud admin estudiantes  ///////////

    //////////inicio admin coordinadores tabla funcionarios usuarios ////////////
    public static function admin_coordinadores(Router $router){
        session_start();
        isauth();
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            if(isset($_POST['cambiarpass'])){ //cambiar pass a user 
                $user = usuarios::find('id', $_POST['id']);
                $user->compara_objetobd_post($_POST);
                $user->hashPassword();
                $u = $user->actualizar();
                if($u)$alertas['exito'][] = "Password actualizado";
            }
            if(isset($_POST['id_eliminar'])){ //eliminar user o coordinador
                $user = usuarios::find('id', $_POST['id_eliminar']);
                $x = $user->eliminar_registro();
                if($x)$alertas['exito'][] = "Usuario colaborador eliminado del sistema";
            }
        }
        $coordinadores = usuarios::all();

        $router->render('dashboard/admincoordinadores/inicio', ['titulo'=>'Admin', 'alertas'=>$alertas, 'coordinadores'=>$coordinadores, 'session'=>$_SESSION]);
    }
    
    ///// fin admin coordinadores

    //perfil
    public static function perfil(Router $router){
        session_start();
        isauth();
        $alertas = [];
        $usuario = usuarios::find('email', $_SESSION['email']);
        
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $usuario->compara_objetobd_post($_POST);
            $usuarioexiste = $usuario->validar_registro();
            if($usuarioexiste){
                $r = $usuario->actualizar();
                if($r){
                   $alertas['exito'][] = "Datos basicos actualizados";
                }
            }
        }
        $router->render('dashboard/perfil/inicio', ['titulo'=>'Admin', 'alertas'=>$alertas, 'usuario'=>$usuario, 'session'=>$_SESSION]);
    }

    public static function cambiar_password(Router $router){
        session_start();
        isAuth();
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usuario = usuarios::find('id', $_SESSION['id']);  //se trae los datos del usuario actual logeado de la bd
            $validar_pass_antiguo = password_verify($_POST['password'], $usuario->password); //validar la contraseña  ingresada en el formulario si es la misma en la bd
            if($validar_pass_antiguo){  
                $validar_pass_new = password_verify($_POST['password2'], $usuario->password); //valida si la contraseña2 del formulario es la misma en la bd
                if($validar_pass_new){
                    usuarios::setAlerta('error', 'la contraseña es igual, ingresar otra');
                }
                $usuario->compara_objetobd_post($_POST);
                $usuario->password = $usuario->password2;
                $alertas = $usuario->validarPassword(); //valida que el campo de password cumpla con los requisitos
                
                if(empty($alertas)){
                    //hashear nueva contraseña
                    $usuario->hashPassword();
                    //guardar nueva contraseña
                    $resultado = $usuario->actualizar();
                    if($resultado)
                    $alertas['exito'][] = 'contraseña actualizada';
                }
            }
            else{
                $alertas['error'][] = 'contraseña actual no es correcto';
            }    
        }
        $router->render('dashboard/perfil/cambiar_password', ['titulo'=>'Admin', 'alertas'=>$alertas, 'session'=>$_SESSION]);
    }
    //perfil
    

    //gestionar usuarios
    public static function crear_usuarios(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        if(isset($_GET['accion']))
            if($_GET['accion'] == "user")$alertas['exito'][] = "Usuario creado correctamente";
        
        $router->render('dashboard/crearusuarios/inicio', ['titulo'=>'Admin', 'alertas'=>$alertas, 'session'=>$_SESSION]);
    }


}