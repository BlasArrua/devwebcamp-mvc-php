<?php 
namespace Model;

class Ponente extends ActiveRecord{

    protected static $tabla = 'ponentes';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'ciudad', 'pais', 'imagen', 'tags', 'redes'];

    public $id;
    public $nombre;
    public $apellido;
    public $ciudad;
    public $pais;
    public $imagen;
    public $imagen_actual;
    public $tags;
    public $redes;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tags = $args['tags'] ?? '';
        $this->redes = $args['redes'] ?? '';
    }   

    public function validar() {
        if(!$this->nombre) {self::$alertas['error'][] = 'Nombre Obligatorio';}
        if(!$this->apellido) {self::$alertas['error'][] = 'Apellido Obligatorio';}
        if(!$this->ciudad) {self::$alertas['error'][] = 'Ciudad Obligatorio';}
        if(!$this->pais) {self::$alertas['error'][] = 'País Obligatorio';}
        if(!$this->imagen) {self::$alertas['error'][] = 'imagen obligatoria';}
        if(!$this->tags) {self::$alertas['error'][] = 'áreas obligatorio';}
    
        return self::$alertas;
    }
}