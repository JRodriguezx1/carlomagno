<?php

namespace Model;

class sedes extends ActiveRecord {
    protected static $tabla = 'sedes';
    protected static $columnasDB = ['id', 'ciudad'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->ciudad = $args['ciudad'] ?? '';
    }
    

    // Validación para sede nueva
    public function validar_sede() {
        if(!$this->ciudad || strlen($this->ciudad) < 3 || strlen($this->ciudad) > 23 || $this->ciudad==' ') {
            self::$alertas['error'][] = 'Ciudad no valida';
        }
        return self::$alertas;
    }

}