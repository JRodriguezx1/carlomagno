<?php

namespace Model;

class multidato extends ActiveRecord{  //modelo o clase que se utiliza para traer todas las tablas con inner join
   // protected static $tabla = "multidato";
    protected static $columnasDB = ['id', 'idestudiante', 'nombrenivel', 'nombre', 'apellido', 'cedula', 'telefono', 'email', 'sede', 'fecha_registro', 'estado', 'fecha_inicio', 'ciudad', 'programa', 'nombregrupo', 'idgrupo', 'idnivel'];
    
    public $id; //id de la tabla estud_grupo = matricula
    public $idestudiante;  //id de la tabla estudiantes
    public $nombrenivel;
    public $nombre;
    public $apellido;
    public $cedula;
    public $telefono;
    public $email;
    public $sede;
    public $fecha_registro;
    public $estado;
    public $fecha_inicio;
    public $ciudad;
    public $programa;
    public $nombregrupo;
    public $idgrupo;
    public $idnivel;

    public function __construct($args= [])
    {
        $this->id = $args['id']??'';
        $this->idestudiante = $args['idestudiante']??'';
        $this->nombrenivel = $args['nombrenivel']??'';
        $this->nombre = $args['nombre']??'';
        $this->apellido = $args['apellido']??'';
        $this->cedula = $args['cedula']??'';
        $this->telefono = $args['telefono']??'';
        $this->email = $args['email']??'';
        $this->sede = $args['sede']??'';
        $this->fecha_registro = $args['fecha_registro']??'';
        $this->estado = $args['estado']??'';
        $this->fecha_inicio = $args['fecha_inicio']??'';
        $this->ciudad = $args['ciudad']??'';
        $this->programa = $args['programa']??'';
        $this->nombregrupo = $args['nombregrupo']??'';
        $this->idgrupo = $args['idgrupo']??'';
        $this->idnivel = $args['idnivel']??'';
    }

}