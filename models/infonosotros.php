<?php

namespace Model;

class infonosotros extends ActiveRecord {
    protected static $tabla = 'infonosotros';
    protected static $columnasDB = ['id', 'bienvds', 'mision', 'vision', 'objetivos', 'biografia'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->bienvds = $args['bienvds'] ?? '';
        $this->mision = $args['mision'] ?? '';
        $this->vision = $args['vision'] ?? '';
        $this->objetivos = $args['objetivos'] ?? '';
        $this->biografia = $args['biografia'] ?? '';
    }
   
}