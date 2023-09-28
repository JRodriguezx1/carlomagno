<?php

namespace Model;

class infoindex extends ActiveRecord {
    protected static $tabla = 'infoindex';
    protected static $columnasDB = ['id', 'etxb1', 'etxv1', 'etxb2', 'etxv2', 'txfhb1', 'txfha1', 'txfhb2', 'txfha2', 'ttcurso', 'ttpp1', 'txpp1', 'txa1p1', 'txa2p1', 'txa3p1', 'subtp1', 'txa4p1', 'minfop1', 'tel1', 'tel2', 'sedes', 'sede1', 'sede2', 'sede3', 
                                    'ttpd', 'subtd', 'dscpd', 'ttpb', 'subtb1', 'descpb1', 'subtb2', 'descpb2', 'subtb3', 'descpb3', 'subtb4', 'descpb4', 'stact', 'numsedes' ,'stgrad'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->etxb1 = $args['etxb1'] ?? '';
        $this->etxv1 = $args['etxv1'] ?? '';
        $this->etxb2 = $args['etxb2'] ?? '';
        $this->etxv2 = $args['etxv2'] ?? '';
        $this->txfhb1 = $args['txfhb1'] ?? '';
        $this->txfha1 = $args['txfha1'] ?? '';
        $this->txfhb2 = $args['txfhb2'] ?? '';
        $this->txfha2 = $args['txfha2'] ?? '';
        $this->ttcurso = $args['ttcurso'] ?? '';
        $this->ttpp1 = $args['ttpp1']??'';
        $this->txpp1 = $args['txpp1'] ?? '';
        $this->txa1p1 = $args['txa1p1']??'';
        $this->txa2p1 = $args['txa2p1'] ?? '';
        $this->txa3p1 = $args['txa3p1'] ?? '';
        $this->subtp1 = $args['subtp1'] ?? '';
        $this->txa4p1 = $args['txa4p1'] ?? '';
        $this->minfop1 = $args['minfop1'] ?? '';
        $this->tel1 = $args['tel1'] ?? '';
        $this->tel2 = $args['tel2'] ?? '';
        $this->sedes = $args['sedes'] ?? '';
        $this->sede1 = $args['sede1'] ?? '';
        $this->sede2 = $args['sede2']??'';
        $this->sede3 = $args['sede3'] ?? '';
        $this->ttpd = $args['ttpd'] ?? '';
        $this->subtd  = $args['subtd']??'';
        $this->dscpd = $args['dscpd'] ?? '';
        $this->ttpb = $args['ttpb']??'';
        $this->subtb1 = $args['subtb1'] ?? '';
        $this->descpb1 = $args['descpb1'] ?? '';
        $this->subtb2 = $args['subtb2'] ?? '';
        $this->descpb2 = $args['descpb2'] ?? '';
        $this->subtb3 = $args['subtb3'] ?? '';
        $this->descpb3 = $args['descpb3'] ?? '';
        $this->subtb4 = $args['subtb4'] ?? '';
        $this->descpb4 = $args['descpb4'] ?? '';
        $this->stact = $args['stact'] ?? '';
        $this->numsedes = $args['numsedes'] ?? '';
        $this->stgrad = $args['stgrad']??'';
    }

    

    // Validación para cuentas nuevas
    public function validar_infoindex() {
        $resaltarerror = [];
        if(strlen($this->etxb1)>25) {
            self::$alertas['error'][] = 'Texto blanco del eslogan no debe superar los 25 caracteres';
            $resaltarerror['etxb1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->etxv1)> 12) {
            self::$alertas['error'][] = 'Texto verde del eslogan no debe superar los 12 caracteres';
            $resaltarerror['etxv1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->etxb2) > 45) {
            self::$alertas['error'][] = 'Texto blanco del eslogan no debe superar los 45 caracteres';
            $resaltarerror['etxb2'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->etxv2)> 12) {
            self::$alertas['error'][] = 'Texto verde del eslogan no debe superar los 12 caracteres';
            $resaltarerror['etxv2'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->ttcurso)> 42) {
            self::$alertas['error'][] = 'Titulo de la seccion de cursos no debe superar los 42 catacteres';
            $resaltarerror['ttcurso'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->txfhb1)>58) {
            self::$alertas['error'][] = 'Texto no debe superar los 55 caracteres';
            $resaltarerror['txfhb1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->txfha1)> 58) {
            self::$alertas['error'][] = 'Texto no debe superar los 55 caracteres';
            $resaltarerror['txfha1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->txfhb2) > 58) {
            self::$alertas['error'][] = 'Texto no debe superar los 55 caracteres';
            $resaltarerror['txfhb2'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->txfha2)> 58) {
            self::$alertas['error'][] = 'Texto no debe superar los 55 caracteres';
            $resaltarerror['txfha2'] = 0;
            return $resaltarerror;
        }
        //validacion del post1
        if(strlen($this->ttpp1)>45) {
            self::$alertas['error'][] = 'Texto no debe superar los 45 caracteres';
            $resaltarerror['ttpp1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->txpp1)> 155) {
            self::$alertas['error'][] = 'Texto no debe superar los 155 caracteres';
            $resaltarerror['txpp1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->txa1p1) > 80) {
            self::$alertas['error'][] = 'Texto no debe superar los 80 caracteres';
            $resaltarerror['txa1p1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->txa2p1)> 80) {
            self::$alertas['error'][] = 'Texto no debe superar los 80 caracteres';
            $resaltarerror['txa2p1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->txa3p1)>80) {
            self::$alertas['error'][] = 'Texto no debe superar los 80 caracteres';
            $resaltarerror['txa3p1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->subtp1)> 45) {
            self::$alertas['error'][] = 'Texto no debe superar los 45 caracteres';
            $resaltarerror['subtp1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->txa4p1) > 45) {
            self::$alertas['error'][] = 'Texto no debe superar los 45 caracteres';
            $resaltarerror['txa4p1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->minfop1)> 33) {
            self::$alertas['error'][] = 'Texto no debe superar los 33 caracteres';
            $resaltarerror['minfop1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->tel1)>13) {
            self::$alertas['error'][] = 'Texto no debe superar los 13 caracteres';
            $resaltarerror['tel1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->tel2)> 13) {
            self::$alertas['error'][] = 'Texto no debe superar los 13 caracteres';
            $resaltarerror['tel2'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->sedes) > 33) {
            self::$alertas['error'][] = 'Texto no debe superar los 33 caracteres';
            $resaltarerror['sedes'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->sede1)> 60) {
            self::$alertas['error'][] = 'Texto no debe superar los 60 caracteres';
            $resaltarerror['sede1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->sede2)>60) {
            self::$alertas['error'][] = 'Texto no debe superar los 60 caracteres';
            $resaltarerror['sede2'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->sede3)> 60) {
            self::$alertas['error'][] = 'Texto no debe superar los 60 caracteres';
            $resaltarerror['sede3'] = 0;
            return $resaltarerror;
        }
        //validacion distintivo
        if(strlen($this->ttpd) > 45) {
            self::$alertas['error'][] = 'Texto no debe superar los 45 caracteres';
            $resaltarerror['ttpd'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->subtd)> 54) {
            self::$alertas['error'][] = 'Texto no debe superar los 54 caracteres';
            $resaltarerror['subtd'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->ttpb) > 33) {
            self::$alertas['error'][] = 'Texto no debe superar los 33 caracteres';
            $resaltarerror['ttpb'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->subtb1)> 33) {
            self::$alertas['error'][] = 'Texto no debe superar los 33 caracteres';
            $resaltarerror['subtb1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->descpb1)> 199) {
            self::$alertas['error'][] = 'Texto no debe superar los 199 caracteres';
            $resaltarerror['descpb1'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->subtb2)> 33) {
            self::$alertas['error'][] = 'Texto no debe superar los 33 caracteres';
            $resaltarerror['subtb2'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->descpb2)> 199) {
            self::$alertas['error'][] = 'Texto no debe superar los 199 caracteres';
            $resaltarerror['descpb2'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->subtb3)> 33) {
            self::$alertas['error'][] = 'Texto no debe superar los 33 caracteres';
            $resaltarerror['subtb3'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->descpb3)> 199) {
            self::$alertas['error'][] = 'Texto no debe superar los 199 caracteres';
            $resaltarerror['descpb3'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->subtb4)> 33) {
            self::$alertas['error'][] = 'Texto no debe superar los 33 caracteres';
            $resaltarerror['subtb4'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->descpb4)> 199) {
            self::$alertas['error'][] = 'Texto no debe superar los 199 caracteres';
            $resaltarerror['descpb4'] = 0;
            return $resaltarerror;
        }
        //validacion de datos estadisticos
        if(strlen($this->stact)> 5) {
            self::$alertas['error'][] = 'Texto no debe superar los 5 caracteres';
            $resaltarerror['stact'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->numsedes)> 3) {
            self::$alertas['error'][] = 'Texto no debe superar los 3 caracteres';
            $resaltarerror['numsedes'] = 0;
            return $resaltarerror;
        }
        if(strlen($this->stgrad)> 5) {
            self::$alertas['error'][] = 'Texto no debe superar los 5 caracteres';
            $resaltarerror['stgrad'] = 0;
            return $resaltarerror;
        }  
        //return self::$alertas;
    }

   
}