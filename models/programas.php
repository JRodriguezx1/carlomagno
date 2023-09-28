<?php

namespace Model;

class programas extends ActiveRecord {
    protected static $tabla = 'programas';
    protected static $columnasDB = ['id', 'nombre', 'codigo', 'niveleducativo', 'estado'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->codigo = $args['codigo'] ?? '';
        $this->niveleducativo = $args['niveleducativo'] ?? '';
        $this->estado = $args['estado'] ?? 'Activo';
    }
    

    // Validación para estudiante nuevo
    public function validar_programa() {
        if(!$this->nombre || strlen($this->nombre) < 2 || strlen($this->nombre) > 42 || $this->nombre==' ') {
            self::$alertas['error'][] = 'Nombre del programa no valida';
        }
        if(strlen($this->codigo) > 12) {
            self::$alertas['error'][] = 'El codigo no puede pasar los 12 caracteres';
        }
        if(!$this->niveleducativo || strlen($this->niveleducativo)>15 || $this->nombre==' ') {
            self::$alertas['error'][] = 'Nivel educativo del programa no valido';
        }
        return self::$alertas;
    }

}