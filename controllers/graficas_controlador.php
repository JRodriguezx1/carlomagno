<?php

namespace Controllers;

use Model\ActiveRecord;
use Model\estudiantes;
use Model\oferta;
use Model\estud_grupo;
use Model\programas;
use Model\grupos;
use Model\multidato;
use Model\usuarios;

 
class graficas_controlador{

    ////////////////////////////////admin programas//////////////////////////////
    public static function apiprogramas(){

        $g = new grupos;
        $grupos = $g->all();
        //foreach($grupos as $grupo)
        //    $grupo->total = estud_grupo::totalarray(['idgrupo'=>$grupo->id]);

        $estudiantesporprogramas = programas::all();

        foreach($estudiantesporprogramas as $element){
            $x = 0;
           foreach($grupos as $grupo){
               // $grupo->total = estud_grupo::totalarray(['idgrupo'=>$grupo->id, 'fecha_inicio'=>'2023-01-26']);
               $grupo->total = estud_grupo::totalarray(['idgrupo'=>$grupo->id]);
               if($grupo->idprograma == $element->id)
                   $x += (int)$grupo->total;
           }
           $element->total = $x;
        }

        echo json_encode($estudiantesporprogramas);
    }

    public static function estudiantes_grupo(){  // me cuenta cuantos estudiantes hay por grupo 

        echo json_encode($x);
    }
}