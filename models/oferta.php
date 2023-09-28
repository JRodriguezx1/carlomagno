<?php

namespace Model;

class oferta extends ActiveRecord {
    protected static $tabla = 'oferta';
    protected static $columnasDB = ['id', 'tipo', 'nombre', 'descripcion', 'modalidad', 'duracion', 'jornada', 'horario', 'ubicacion', 'matricula', 'imagen', 'resolucion', 'titulo', 'valor', 'dato1', 'dato2', 'estado'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->modalidad = $args['modalidad'] ?? '';
        $this->duracion = $args['duracion'] ?? '';
        $this->jornada = $args['jornada'] ?? '';
        $this->horario = $args['horario'] ?? '';
        $this->ubicacion = $args['ubicacion'] ?? '';
        $this->matricula = $args['matricula'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->resolucion = $args['resolucion'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->valor = $args['valor'] ?? '';
        $this->dato1 = $args['dato1'] ?? '';
        $this->dato2 = $args['dato2'] ?? '';
        $this->estado = $args['estado'] ?? null;
    }

    public function validar_oferta() {
        $resaltarerror = [];
        if(strlen($this->tipo)<3 || $this->tipo == '') {
            self::$alertas['error'][] = 'Nivel Educativo no es valido';
            $resaltarerror['tipo'] = 0;
            return $resaltarerror;
            
        }
        if(!$this->nombre || strlen($this->nombre)<4) {
            self::$alertas['error'][] = 'El nombre del programa no es valido';
            $resaltarerror['nombre'] = 0;
            return $resaltarerror;
        }
        if(!$this->descripcion || (strlen($this->descripcion)<5)) {
            self::$alertas['error'][] = 'La descripcion no es valido';
            $resaltarerror['descripcion'] = 0;
            return $resaltarerror;
        }
        return self::$alertas;
    }
   
}