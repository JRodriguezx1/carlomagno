<?php

namespace Model;

class infocontacto extends ActiveRecord {
    protected static $tabla = 'infocontacto';
    protected static $columnasDB = ['id', 'direccion', 'contacto', 'horario', 'dato1', 'dato2'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->direccion = $args['direccion'] ?? '';
        $this->contacto = $args['contacto'] ?? '';
        $this->horario = $args['horario'] ?? '';
        $this->dato1 = $args['dato1'] ?? 0;
        $this->dato2 = $args['dato2'] ?? '';
    }
}