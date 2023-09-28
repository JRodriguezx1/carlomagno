<?php

namespace Model;

class niveles extends ActiveRecord {
    protected static $tabla = 'niveles';
    protected static $columnasDB = ['id', 'id_programa', 'nombrenivel', 'año', 'dato1', 'dato2'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->id_programa = $args['id_programa'] ?? '';
        $this->nombrenivel = $args['nombrenivel'] ?? '';
        $this->año = $args['año'] ?? date("Y");
        $this->dato1 = $args['dato1'] ?? '';
        $this->dato2 = $args['dato2'] ?? '';
    }
    

    // Validación para estudiante nuevo
    public function validar_nivel() {
        if(!$this->nombrenivel || strlen($this->nombrenivel) < 2 || $this->nombrenivel==' ' || strlen($this->nombrenivel) > 53) {
            self::$alertas['error'][] = 'Nombre del nivel no es valida';
        }
        return self::$alertas;
    }

}