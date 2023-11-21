<?php 
include 'modelos.php';

class Libro extends Modelos {

    public $isbn;
    protected $titulo;
    protected $autor;
    protected $genero;
    protected $año_publicacion;

    public function __construct()
    {
        $this->tabla = 'libros';
        parent::__construct();
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function getIsbn($isbn)
    {
        return $this->isbn;
    }
    
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo($titulo)
    {
        return $this->titulo;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function getAutor($autor)
    {
        return $this->autor;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function getGenero($genero)
    {
        return $this->genero;
    }

    public function setAñopublicacion($año_publicacion)
    {
        $this->año_publicacion = $año_publicacion;
    }
    public function getAñopublicacion($año_publicacion)
    {
        return $this->año_publicacion;
    }
 
}