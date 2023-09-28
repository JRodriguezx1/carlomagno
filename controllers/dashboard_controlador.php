<?php

namespace Controllers;

use Model\ActiveRecord;
use Model\infobasica;
use Model\infoindex;
use Model\infonosotros;
use Model\oferta;
use Model\oferta_cursos;
use Model\galeria;
use Model\infocontacto;
use Model\estud_grupo;
use Model\programas;
use Model\usuarios;
use Model\estudiantes;
use MVC\Router;  //namespace\clase

 
class dashboard_controlador{

    public static function control(Router $router){ //panel inicial del tablero de comandos
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        
        $totalestudiantes = estud_grupo::numregistros();
        $programas = programas::all();
        $totalprogramas = count($programas);
        $totalfuncionarios = usuarios::numregistros();

        $ultimosestudiantes = estud_grupo::ordenarlimite('id', 'DESC', 10);
        foreach($ultimosestudiantes as $element)
            $element->estudiante = estudiantes::find('id', $element->idestudiante);
        


        $router->render('dashboard/controladmin/controladmin', ['titulo'=>'Admin', 'totalestudiantes'=>$totalestudiantes, 'programas'=>$programas, 'totalprogramas'=>$totalprogramas, 'totalfuncionarios'=>$totalfuncionarios, 'ultimosestudiantes'=>$ultimosestudiantes, 'session'=>$_SESSION]);
    }


    public static function entrada(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $info =  infobasica::all();
        $router->render('dashboard/entrada/inicio', ['titulo'=>'Admin', 'info'=>$info, 'session'=>$_SESSION]);
    }

    public static function actualizar(Router $router){ // metodo que se llamada cuando se presion btn actualizar dle inicio
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $info = infobasica::get(1); //al instaciar las propiedades del objeto va a tomar lo de la base de datos y por lo tanto pasa la validacion del logo
        //debuguear($info[0]->facebook);
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $info[0]->compara_objetobd_post($_POST);
            $info[0]->validar_infobasica();
            $alertas = ActiveRecord::getAlertas();
            if(!$alertas){

                if($_FILES['logo']['name']){ //valida si se seleccion img en el form
                    $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/logoazulpng1.png");
                    if($existe_archivo)
                        unlink($_SERVER['DOCUMENT_ROOT']."/build/img/logoazulpng1.png");
                        $url_temp = $_FILES["logo"]["tmp_name"];
                        move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/logoazulpng1.png");
                }
                $info[0]->fecha = date('Y-m-d');
                $r = $info[0]->actualizar();
                
                if($r)header('Location: /admin/dashboard/entrada');
            }
        }
        $router->render('dashboard/entrada/actualizar', ['titulo'=>'Admin', 'info'=>$info, 'alertas'=>$alertas, 'session'=>$_SESSION]);
    }


    public static function editar_index(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $resaltarerror = [];
        $info = infoindex::get(1);
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $info[0]->compara_objetobd_post($_POST);
            $resaltarerror = $info[0]->validar_infoindex();
            $alertas = ActiveRecord::getAlertas();
            if(!$alertas){
                $r = $info[0]->actualizar();
                if($r)$alertas['exito'][]="Actualizacion Correcta";
            }
        }
        $router->render('dashboard/editar_index/inicio', ['titulo'=>'Admin', 'resaltarerror'=>$resaltarerror, 'info'=>$info[0], 'alertas'=>$alertas, 'session'=>$_SESSION]);
    }


    //////////////       api       ////////////////
    public static function apislider(){ //este metodo se llama desde js en editar_index.js 
        //if($_SESSION['admin']=='0')return;
        if(isset($_FILES['img']))
        $url_temp = $_FILES['img']['tmp_name']; //captura el arvico tipo img enviado desde js
        $i = 0;

        if(!isset($_POST['dataset'])){
        do{
            $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/background{$i}.jpg");
            if(!$existe_archivo){
                move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/background{$i}.jpg");
                $i=8;
            }
            $i++;
        }while($i<8);
        $img = 'carga de img';
        }else{
            unlink($_SERVER['DOCUMENT_ROOT']."/build/img/background{$_POST['dataset']}.jpg");
            $img = 'img eliminada';
        }
        echo json_encode($img);
    }


    public static function apiimgpost1(){ //este metodo se llama desde js en editar_index.js 
        //if($_SESSION['admin']=='0')return;
        if(isset($_FILES['img']))
        $url_temp = $_FILES['img']['tmp_name']; //captura el arvico tipo img enviado desde js
        $i = 0;
        $imgpost1 = ['clases-bachillerato.jpg', 'mujer graduada bachiller.jpg'];

        if(!isset($_POST['dataset'])){  //si dio click en eliminar imagen del post1 en el dashboard no entra al if
        do{
            $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/{$imgpost1[$i]}");
            if(!$existe_archivo){
                move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/{$imgpost1[$i]}");
                $i=2;
            }
            $i++;
        }while($i<2);
        $img = 'carga de img post1';
        }else{
            unlink($_SERVER['DOCUMENT_ROOT']."/build/img/{$_POST['dataset']}");
            $img = 'img eliminada';
        }
        echo json_encode($img);
    }


    public static function imgdistintivo(){
        //if($_SESSION['admin']=='0')return;
        if(isset($_FILES['img']))
        $url_temp = $_FILES['img']['tmp_name']; //captura el arvico tipo img enviado desde js

        if(!isset($_POST['dataset'])){  //si dio click en eliminar imagen del post1 en el dashboard no entra al if
            $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/graduacion-cm.jpg");
            if(!$existe_archivo){
                move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/graduacion-cm.jpg");   
            }  
        $img = 'carga de img distintivo';
        }else{
            unlink($_SERVER['DOCUMENT_ROOT']."/build/img/graduacion-cm.jpg");
            $img = 'img eliminada';
        }
        echo json_encode($img);
    }


    public static function imgbenef(){
        //if($_SESSION['admin']=='0')return;
        if(isset($_FILES['img'])){  //si dio click en eliminar imagen del post1 en el dashboard no entra al if
            $url_temp = $_FILES['img']['tmp_name']; //captura el arvico tipo img enviado desde js
            $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/{$_POST['dataset']}");
            if(!$existe_archivo){
                move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/{$_POST['dataset']}");   
            }  
        $img = 'carga de img beneficio';
        }else{
            unlink($_SERVER['DOCUMENT_ROOT']."/build/img/{$_POST['dataset']}");
            $img = 'img eliminada';
        }
        echo json_encode($img);
    }


    //nosotros
    public static function editar_nosotros(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $info = infonosotros::get(1);
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $info[0]->compara_objetobd_post($_POST);
            $r = $info[0]->actualizar();
            if($r)$alertas['exito'][]="Actualizacion Correcta";
        }
        $router->render('dashboard/editar_nosotros/inicio', ['titulo'=>'Admin', 'info'=>$info[0], 'alertas'=>$alertas, 'session'=>$_SESSION]);
    }


    //gestionar programas
    public static function gestionar_oferta(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){

            if(isset($_POST['id_curso'])){  
                $oferta = oferta_cursos::find('id', $_POST['id_curso']);
                unlink($_SERVER['DOCUMENT_ROOT']."/build/img/img-cursos/{$oferta->imagen}");
            }else{
                $oferta = oferta::find('id', $_POST['id']);
                unlink($_SERVER['DOCUMENT_ROOT']."/build/img/img-programas/{$oferta->imagen}");
            }
            $r = $oferta->eliminar_registro();
            if($r){
                $alertas['exito'][] = "Registro eliminado correctamente";
            }
        }

        if(isset($_GET['accion'])){
            if($_GET['accion'] == "actualizado")$alertas['exito'][] = "Programa actualizado correctamente";
            if($_GET['accion'] == "creado")$alertas['exito'][] = "Programa creado correctamente";
        }
        $ofertas = oferta::all();
        $cursos = oferta_cursos::all();
        $router->render('dashboard/gestionaroferta/inicio', ['titulo'=>'Admin', 'ofertas'=>$ofertas, 'cursos'=>$cursos, 'alertas'=>$alertas, 'session'=>$_SESSION]);
    }
/*
    public static function crear_oferta(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $resaltarerror = [];
        $programa = new oferta;
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $programa->compara_objetobd_post($_POST); //se carga los datos del form al objeto
            if($_FILES['imagen']['name']&&$_FILES['imagen']['tmp_name']){
                $nombre_unico_imagen = md5(rand()).".jpg";
                $programa->imagen = $nombre_unico_imagen;
            }else{
                //$alertas = $programa->setAlerta('error', 'Debe seleccionar imagen');
                $alertas = $programa::setAlerta('error', 'Debe seleccionar imagen');
            }
            $resaltarerror = $programa->validar_oferta();
            $alertas = ActiveRecord::getAlertas();
            if(empty($alertas)){
                $url_temp = $_FILES['imagen']['tmp_name'];
                move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/img-programas/{$nombre_unico_imagen}");
                $r = $programa->crear_guardar();
                if($r)
                header('Location: /admin/dashboard/gestionar_oferta?accion=creado');
            }
        }
        $router->render('dashboard/gestionaroferta/crear', ['titulo'=>'Admin', 'programa'=>$programa, 'alertas'=>$alertas, 'resaltarerror'=>$resaltarerror, 'session'=>$_SESSION]);
    }*/

    public static function nuevo_reg(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $resaltarerror = [];
        $oferta = new oferta;
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $oferta->compara_objetobd_post($_POST); //se carga los datos del form al objeto
            if($_FILES['imagen']['name']&&$_FILES['imagen']['tmp_name']){
                $nombre_unico_imagen = md5(rand()).".jpg";
                $oferta->imagen = $nombre_unico_imagen;
            }else{
                //$alertas = $oferta->setAlerta('error', 'Debe seleccionar imagen');
                $alertas = $oferta::setAlerta('error', 'Debe seleccionar imagen');
            }
            $resaltarerror = $oferta->validar_oferta();
            $alertas = ActiveRecord::getAlertas();
            if(empty($alertas)){
                $url_temp = $_FILES['imagen']['tmp_name'];
                move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/img-programas/{$nombre_unico_imagen}");
                $r = $oferta->crear_guardar();
                if($r)
                header('Location: /admin/dashboard/gestionar_oferta?accion=creado');
            }
        }
        $router->render('dashboard/gestionaroferta/registrar', ['titulo'=>'Admin', 'oferta'=>$oferta, 'alertas'=>$alertas, 'resaltarerror'=>$resaltarerror, 'session'=>$_SESSION]);
    }

    public static function actualizar_oferta(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $resaltarerror = [];
        $id = $_GET['id'];
        if(!is_numeric($id))return;  //si no es numerico el id que se pasa en la url como get no continua
 
        $oferta = oferta::find('id', $id);
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $oferta->compara_objetobd_post($_POST);  //toma los datos del post y los copia al objeto
            $resaltarerror = $oferta->validar_oferta();
            $alertas = ActiveRecord::getAlertas();
            if(empty($alertas)){
                if($_FILES['imagen']['name']&&$_FILES['imagen']['tmp_name']){
                    $nombre_unico_imagen = md5(rand()).".jpg";
                    unlink($_SERVER['DOCUMENT_ROOT']."/build/img/img-programas/{$oferta->imagen}");
                    $url_temp = $_FILES['imagen']['tmp_name'];
                    move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/img-programas/{$nombre_unico_imagen}");
                    $oferta->imagen = $nombre_unico_imagen;
                }
                $r = $oferta->actualizar();
                if($r){
                    header('Location: /admin/dashboard/gestionar_oferta?accion=actualizado');
                }
            }
        }
        $router->render('dashboard/gestionaroferta/actualizar', ['titulo'=>'Admin', 'oferta'=>$oferta, 'alertas'=>$alertas, 'resaltarerror'=>$resaltarerror, 'session'=>$_SESSION]);
    }

    public static function crear_curso(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $resaltarerror = [];
        $oferta = new oferta_cursos;

        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $oferta->compara_objetobd_post($_POST); //se carga los datos del form al objeto
            if($_FILES['imagen']['name']&&$_FILES['imagen']['tmp_name']){
                $nombre_unico_imagen = md5(rand()).".jpg";
                $oferta->imagen = $nombre_unico_imagen;
            }else{
                //$alertas = $oferta->setAlerta('error', 'Debe seleccionar imagen');
                $alertas = $oferta::setAlerta('error', 'Debe seleccionar imagen');
            }
            $resaltarerror = $oferta->validar_oferta();
            $alertas = ActiveRecord::getAlertas();
            if(empty($alertas)){
                $url_temp = $_FILES['imagen']['tmp_name'];
                move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/img-cursos/{$nombre_unico_imagen}");
                $r = $oferta->crear_guardar();
                if($r)
                header('Location: /admin/dashboard/gestionar_oferta?accion=creado');
            }
        }
        $router->render('dashboard/gestionaroferta/curso', ['titulo'=>'Admin', 'alertas'=>$alertas, 'oferta'=>$oferta, 'resaltarerror'=>$resaltarerror, 'session'=>$_SESSION]);
    }

    public static function actualizar_curso(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $resaltarerror = [];
        $id = $_GET['id'];
        if(!is_numeric($id))return;  //si no es numerico el id que se pasa en la url como get no continua
 
        $oferta = oferta_cursos::find('id', $id);
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $oferta->compara_objetobd_post($_POST);  //toma los datos del post y los copia al objeto
            $resaltarerror = $oferta->validar_oferta();
            $alertas = ActiveRecord::getAlertas();
            if(empty($alertas)){
                if($_FILES['imagen']['name']&&$_FILES['imagen']['tmp_name']){
                    $nombre_unico_imagen = md5(rand()).".jpg";
                    unlink($_SERVER['DOCUMENT_ROOT']."/build/img/img-cursos/{$oferta->imagen}");
                    $url_temp = $_FILES['imagen']['tmp_name'];
                    move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/img-cursos/{$nombre_unico_imagen}");
                    $oferta->imagen = $nombre_unico_imagen;
                }
                $r = $oferta->actualizar();
                if($r){
                    header('Location: /admin/dashboard/gestionar_oferta?accion=actualizado');
                }
            }
        }
        $router->render('dashboard/gestionaroferta/actualizar_curso', ['titulo'=>'Admin', 'oferta'=>$oferta, 'alertas'=>$alertas, 'resaltarerror'=>$resaltarerror, 'session'=>$_SESSION]);
    }

    // gestionar recursos fotograficos
    public static function contenido_fotografico(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $resaltarerror = [];
        //$foto = new galeria;
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $foto = new galeria;
            $foto->compara_objetobd_post($_POST);
            if($_FILES['imagen']['name']&&$_FILES['imagen']['tmp_name']){ 
                $nombre_unico_imagen = md5(rand()).".jpg";
                $foto->nombreimg = $nombre_unico_imagen;
            }else{
                $alertas = $foto::setAlerta('error', 'Debe seleccionar imagen');
            }
            $resaltarerror = $foto->validar_info();
            $alertas = ActiveRecord::getAlertas();
            if(empty($alertas)){
                $url_temp = $_FILES['imagen']['tmp_name'];
                move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/Fotos CarloMagno/{$nombre_unico_imagen}");
                $r = $foto->crear_guardar();
                if($r)
                    $alertas['exito'][] = "Imagen subida correctamente";
            }
        }
        $foto = galeria::all();
        $router->render('dashboard/galeria/inicio', ['titulo'=>'Admin', 'alertas'=>$alertas, 'resaltarerror'=>$resaltarerror, 'foto'=>$foto, 'session'=>$_SESSION]);
    }

    public static function delete_fotografia(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $id = $_GET['id'];
        if(!is_numeric($id))return;

        if($_SERVER['REQUEST_METHOD'] === 'GET' ){
            $foto = galeria::find('id', $id);
            if($foto){
                unlink($_SERVER['DOCUMENT_ROOT']."/build/img/Fotos CarloMagno/{$foto->nombreimg}");
                $r = $foto->eliminar_registro();
                if($r)$alertas['exito'][] = "imagen eliminada correctamente";
            }else{
                header('Location: /admin/dashboard/contenido_fotografico');
            }
        }
        $foto = galeria::all();
        $router->render('dashboard/galeria/inicio', ['titulo'=>'Admin', 'alertas'=>$alertas, 'foto'=>$foto, 'session'=>$_SESSION]);
    }


    //gestionar contacto
    public static function editar_contacto(Router $router){
        session_start();
        isauth();
        if($_SESSION['admin']=='0')return;
        $alertas = [];
        $contacto = infocontacto::get(1);
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $contacto[0]->compara_objetobd_post($_POST);
            $r = $contacto[0]->actualizar();
            if($r)$alertas['exito'][]="Actualizacion Correcta";
        }
        $router->render('dashboard/contacto/inicio', ['titulo'=>'Admin', 'contacto'=>$contacto, 'alertas'=>$alertas, 'session'=>$_SESSION]);
    }

}
