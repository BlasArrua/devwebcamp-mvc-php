<?php
namespace Model;

class Evento extends ActiveRecord{

    protected static $tabla = 'eventos';
    protected static $columnasDB = ['id', 'nombre','descripcion','disponibles','categoria_id','dia_id','hora_id','ponente_id'];

    public $id;
    public $nombre;
    public $descripcion;
    public $disponibles;
    public $categoria_id;
    public $dia_id;
    public $hora_id;
    public $ponente_id;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->categoria_id = $args['categoria_id'] ?? '';
        $this->dia_id = $args['dia_id'] ?? '';
        $this->hora_id = $args['hora_id'] ?? '';
        $this->ponente_id = $args['ponente_id'] ?? '';
    }

    // Mensajes de validación para la creación de un evento
    public function validar() {
        if(!$this->nombre) {self::$alertas['error'][] = 'Nombre Obligatorio';}
        if(!$this->descripcion) {self::$alertas['error'][] = 'Descripción Obligatoria';}
        if(!$this->categoria_id  || !filter_var($this->categoria_id, FILTER_VALIDATE_INT)) {self::$alertas['error'][] = 'Elige Categoría';}
        if(!$this->dia_id  || !filter_var($this->dia_id, FILTER_VALIDATE_INT)) {self::$alertas['error'][] = 'Elige Día';}
        if(!$this->hora_id  || !filter_var($this->hora_id, FILTER_VALIDATE_INT)) {self::$alertas['error'][] = 'Elige Hora';}
        if(!$this->disponibles  || !filter_var($this->disponibles, FILTER_VALIDATE_INT)) {self::$alertas['error'][] = 'Agrega Lugares Disponibles';}
        if(!$this->ponente_id || !filter_var($this->ponente_id, FILTER_VALIDATE_INT) ) {self::$alertas['error'][] = 'Selecciona Orador';}
        return self::$alertas;
    }
    
}