<?php

namespace Model;

class pagos extends ActiveRecord {
    protected static $tabla = 'pagos';
    protected static $columnasDB = ['id', 'idmatricula', 'fecha', 'concepto', 'monto', 'identificacion', 'nombre', 'apellido'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->idmatricula = $args['idmatricula'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->concepto = $args['concepto'] ?? '';
        $this->monto = $args['monto'] ?? '';
        $this->identificacion = $args['identificacion'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
    }
    

    // Validación para pago nuevo
    public function validar_pago() {
        if(!$this->concepto || strlen($this->concepto) < 3 || strlen($this->concepto) > 199 || $this->concepto==' ') {
            self::$alertas['error'][] = 'Concepto no valida';
        }
        if(!$this->monto || strlen($this->monto) < 3) {
            self::$alertas['error'][] = 'El monto no es valido';
        }
        return self::$alertas;
    }

}