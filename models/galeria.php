<?php

namespace Model;

class galeria extends ActiveRecord {
    protected static $tabla = 'fotografias';
    protected static $columnasDB = ['id', 'titulo', 'descripcion', 'nombreimg', 'dato1', 'dato2'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->nombreimg = $args['nombreimg'] ?? '';
        $this->dato1 = $args['dato1'] ?? 0;
        $this->dato2 = $args['dato2'] ?? '';
    }

    public function validar_info() {
        $resaltarerror = [];
        if(strlen($this->titulo)<2 || $this->titulo == '' || strlen($this->titulo)>40) {
            self::$alertas['error'][] = 'El titulo de la imagen no es valido, caracteres min 2 y max 38';
            $resaltarerror['titulo'] = 0;
            return $resaltarerror;   
        }
        return self::$alertas;
    }
   
}