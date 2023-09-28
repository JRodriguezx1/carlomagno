<?php

namespace Model;

class infobasica extends ActiveRecord {
    protected static $tabla = 'infobasica';
    protected static $columnasDB = ['id', 'direccion_p', 'tel1', 'tel2', 'whatsapp', 'nit', 'facebook', 'instagram', 'youtube', 'infolegal', 'logo', 'fecha'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->direccion_p = $args['direccion_p'] ?? '';
        $this->tel1 = $args['tel1'] ?? '';
        $this->tel2 = $args['tel2'] ?? '';
        $this->whatsapp = $args['whatsapp'] ?? '';
        $this->nit = $args['nit'] ?? '';
        $this->facebook = $args['facebook'] ?? '';
        $this->instagram = $args['instagram'] ?? '';
        $this->youtube = $args['youtube'] ?? '';
        $this->infolegal = $args['infolegal']??'';
        $this->logo = $args['logo'] ?? '';
        $this->fecha = date('d-m-Y');
    }

    

    // Validación para cuentas nuevas
    public function validar_infobasica() {
        if(strlen($this->direccion_p)<7) {
            self::$alertas['error'][] = 'Direccion no valida';
        }
        if(strlen($this->tel1) != 10) {
            self::$alertas['error'][] = 'Telefono principal no valido';
        }
        if(strlen($this->whatsapp) != 10) {
            self::$alertas['error'][] = 'El whatsapp no es valido';
        }
        if(!$this->nit) {
            self::$alertas['error'][] = 'El NIT es obligatorio';
        }
        if(strlen($this->infolegal) < 30) {
            self::$alertas['error'][] = 'Informacion Legal minimo 30 caracteres';
        }
        if(!$this->logo) {
            self::$alertas['error'][] = 'El logo es obligatorio';
        }
        return self::$alertas;
    }

   
}