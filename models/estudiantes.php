<?php

namespace Model;

class estudiantes extends ActiveRecord {
    protected static $tabla = 'estudiantes';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'cedula', 'fecha_nacimiento', 'ciudad', 'direccion', 'telefono', 'email', 'sede', 'fecha_registro', 'idcoordinador', 'clave', 'dato1', 'dato2'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->cedula = $args['cedula'] ?? '';
        $this->fecha_nacimiento = $args['fecha_nacimiento'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->sede = $args['sede']??'';
        $this->fecha_registro = date('Y-m-d');
        $this->idcoordinador = $args['idcoordinador'] ?? 1; //quien registra
        $this->clave = $args['clave'] ?? '';
        $this->dato1 = $args['dato1'] ?? '';
        $this->dato2 = $args['dato2'] ?? '';
    }

    

    // Validación para estudiante nuevo
    public function validar_estudiantes() {
        if(!$this->nombre || strlen($this->nombre) < 2) {
            self::$alertas['error'][] = 'Nombre no valida';
        }
        if(!$this->apellido || strlen($this->apellido) < 2) {
            self::$alertas['error'][] = 'Apellido no valido';
        }
        if(!$this->cedula || strlen($this->cedula) < 7) {
            self::$alertas['error'][] = 'cedula no es valido';
        }
        if(!$this->ciudad || strlen($this->ciudad) < 3) {
            self::$alertas['error'][] = 'Ciudad no es valido';
        }
        if(!$this->direccion || strlen($this->direccion) < 5) {
            self::$alertas['error'][] = 'Direccion no valida';
        }
        if(!$this->telefono || strlen($this->telefono) < 7) {
            self::$alertas['error'][] = 'Telefono no valida';
        }      
        return self::$alertas;
    }


    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }
        return self::$alertas;
    }  
}