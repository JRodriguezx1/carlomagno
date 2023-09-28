<?php

namespace Model;

class oferta_cursos extends ActiveRecord {
    protected static $tabla = 'oferta_cursos';
    protected static $columnasDB = ['id', 'idoferta', 'nombre', 'tipo', 'lugar', 'duracion', 'intensidad_hrs', 'modalidad', 'titulo', 'imagen', 'descripcion', 'estado', 'temario', 'objetivos', 'area'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->idoferta = $args['idoferta'] ?? 0;
        $this->nombre = $args['nombre'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->lugar = $args['lugar'] ?? '';
        $this->duracion = $args['duracion'] ?? '';
        $this->intensidad_hrs = $args['intensidad_hrs'] ?? '';
        $this->modalidad = $args['modalidad'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->estado = $args['estado'] ?? null;
        $this->temario = $args['temario'] ?? '';
        $this->objetivos = $args['objetivos'] ?? '';
        $this->area = $args['area'] ?? '';
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
        if(!$this->temario || (strlen($this->temario)<5)) {
            self::$alertas['error'][] = 'Debe colocar almenos un temario';
            $resaltarerror['temario'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->titulo)<3 || $this->titulo == '') {
            self::$alertas['error'][] = 'Titulo no es valido';
            $resaltarerror['titulo'] = 0;
            return $resaltarerror;   
        }
        if(strlen($this->duracion)<3 || $this->duracion == '') {
            self::$alertas['error'][] = 'La duracion no es valido';
            $resaltarerror['duracion'] = 0;
            return $resaltarerror;   
        }
        return self::$alertas;
    }
   
}