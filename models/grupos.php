<?php

namespace Model;

class grupos extends ActiveRecord {
    protected static $tabla = 'grupos';
    protected static $columnasDB = ['id', 'idprograma', 'id_nivel', 'idsede', 'nombregrupo', 'detallegrupo', 'año_inicio', 'estado'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->idprograma = $args['idprograma'] ?? '';
        $this->id_nivel = $args['id_nivel'] ?? '';
        $this->idsede = $args['idsede'] ?? '';
        $this->nombregrupo = $args['nombregrupo'] ?? '';
        $this->detallegrupo = $args['detallegrupo'] ?? '';
        $this->año_inicio = $args['año_inicio'] ?? date("Y");
        $this->estado = $args['estado'] ?? 'abierto';
    }
    

    // Validación para estudiante nuevo
    public function validar_grupo() {
        if(!$this->nombregrupo || strlen($this->nombregrupo) < 2 || $this->nombregrupo==' ' || strlen($this->nombregrupo) > 26) {
            self::$alertas['error'][] = 'Nombre del grupo no valida';
        }
        if(strlen($this->detallegrupo) > 65) {
            self::$alertas['error'][] = 'detalle del grupo demasiado largo';
        }
        return self::$alertas;
    }

}