<?php

namespace Controllers;

use Model\infobasica;
use Model\infoindex;
use Model\oferta_cursos;
use Model\infonosotros;
use Model\oferta;
use Model\galeria;
use Model\infocontacto;
use Model\estudiantes;
use Model\estud_grupo;
use Model\grupos;
use Model\niveles;
use Model\programas;
use MVC\Router;  //namespace\clase
 
class paginas_controlador{

    public static function index(Router $router){
        $info =  infobasica::find('id', 1);
        $infoidx = infoindex::find('id', 1);
        $cursos = oferta_cursos::all();
        $router->render('paginas/index', ['titulo'=>'index', 'info'=>$info, 'infoidx'=>$infoidx, 'cursos'=>$cursos]);    
    }
    public static function detalle_curso(Router $router){
        $info =  infobasica::find('id', 1);
        $id = $_GET['id'];
        if(!is_numeric($id))return;
        $curso = oferta_cursos::find('id', $id);
        if($curso->estado==0)header('Location: /');
        $router->render('paginas/detalle_curso', ['titulo'=>'detalle_curso', 'info'=>$info, 'curso'=>$curso]);
    }
    public static function nosotros(Router $router){
        $info =  infobasica::find('id', 1);
        $infonosotros = infonosotros::find('id', 1);
        $router->render('paginas/nosotros', ['titulo'=>'nosotros', 'info'=>$info, 'infonosotros'=>$infonosotros]);    
    }
    public static function biografia(Router $router){
        $info =  infobasica::find('id', 1);
        $infonosotros = infonosotros::find('id', 1);
        $router->render('paginas/biografia', ['titulo'=>'biografia', 'info'=>$info, 'infonosotros'=>$infonosotros]);    
    }
    public static function objetivo(Router $router){
        $info =  infobasica::find('id', 1);
        $infonosotros = infonosotros::find('id', 1);
        $router->render('paginas/objetivo', ['titulo'=>'objetivo', 'info'=>$info, 'infonosotros'=>$infonosotros]);    
    }
    public static function mision(Router $router){
        $info =  infobasica::find('id', 1);
        $infonosotros = infonosotros::find('id', 1);
        $router->render('paginas/mision', ['titulo'=>'mision', 'info'=>$info, 'infonosotros'=>$infonosotros]);    
    }
    public static function vision(Router $router){
        $info =  infobasica::find('id', 1);
        $infonosotros = infonosotros::find('id', 1);
        $router->render('paginas/vision', ['titulo'=>'vision', 'info'=>$info, 'infonosotros'=>$infonosotros]);    
    }
    public static function estudiantes(Router $router){
        $info =  infobasica::find('id', 1);
        $estudiante = new estudiantes;
        $registros = new estud_grupo;
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $cedula = $_POST['cedula'];
            $estudiante = $estudiante->find('cedula', $cedula);
            if($estudiante != NULL){
                $registros = $registros->idregistros('idestudiante', $estudiante->id); // = matricula = estud_grupo

                foreach($registros as $registro){
                    $registro->idprograma = grupos::uncampo('id', $registro->idgrupo, 'idprograma');
                    $registro->nombreprograma = programas::uncampo('id', $registro->idprograma, 'nombre');
                    $registro->nivel = niveles::uncampo('id', $registro->idnivel,'nombrenivel');
                }
            }
        }
        $router->render('paginas/estudiantes', ['titulo'=>'estudiantes', 'registros'=>$registros, 'estudiante'=>$estudiante, 'info'=>$info]);    
    }
    public static function oferta_academica(Router $router){
        $info =  infobasica::find('id', 1);
        $ofertas = oferta::all();
        $router->render('paginas/oferta_academica', ['titulo'=>'oferta_academica', 'ofertas'=>$ofertas, 'info'=>$info]);    
    }
    public static function galeria(Router $router){
        $info =  infobasica::find('id', 1);
        $fotos = galeria::all();
        $router->render('paginas/galeria', ['titulo'=>'galeria', 'fotos'=>$fotos, 'info'=>$info]);    
    }
    public static function contacto(Router $router){
        $info =  infobasica::find('id', 1);
        $contacto = infocontacto::find('id', 1);
        $router->render('paginas/contacto', ['titulo'=>'contacto', 'contacto'=>$contacto, 'info'=>$info]);    
    }
}