<?php

namespace Model;

class estud_grupo extends ActiveRecord{
    protected static $tabla = "estud_grupo";
    protected static $columnasDB = ['id', 'idestudiante', 'idnivel', 'idgrupo', 'idcolaborador', 'estado', 'observacion', 'profesor', 'fecha_inicio', 'fecha_fin', 'matricula', 'mensualidad', 'derechos', 'promocion', 'dato1' ,'dato2']; 

    public $id;
    public $idestudiante;
    public $idnivel;
    public $idgrupo;
    public $idcolaborador;
    public $estado;
    public $observacion;
    public $profesor;
    public $fecha_inicio;
    public $fecha_fin;
    public $matricula;
    public $mensualidad;
    public $derechos;
    public $promocion;
    public $dato1;
    public $dato2;

    public function __construct($args = [])
    {
        $this->id = $args['id']??null;
        $this->idestudiante = $args['idestudiante']??'';
        $this->idnivel = $args['idnivel']??'';
        $this->idgrupo = $args['idgrupo']??'';
        $this->idcolaborador = $args['idcolaborador']??'';
        $this->estado = $args['estado']??'Registrado';
        $this->observacion = $args['observacion']??'';
        $this->profesor = $args['profesor']??'';
        $this->fecha_inicio = $args['fecha_inicio']?? date('Y-m-d');
        $this->fecha_fin = $args['fecha_fin']?? date('Y-m-d');
        $this->matricula = $args['matricula']??'';
        $this->mensualidad = $args['mensualidad']??'';
        $this->derechos = $args['derechos']??'';
        $this->promocion = $args['promocion']??'';
        $this->dato1 = $args['dato1']??'';
        $this->dato2 = $args['dato2']??'';
    }
}