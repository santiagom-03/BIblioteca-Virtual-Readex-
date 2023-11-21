<?php
class Modelos {
    protected $data;
    protected $tabla;
    protected $id;
    protected $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
    }

    public function load($data)
    {
        foreach ($data as $key => $value) {
            $this->data[$key] = $this->$key = $value;
        }
    }

    public function borrar(){
        try {            
            $stmt = $this->conn->prepare("DELETE FROM $this->tabla WHERE id=$this->id");

            $stmt->execute();
        } catch(PDOException $e) {            
            echo "El registro no pudo ser eliminado";
        }
    }

    public function guardar()
    {   
        try {        
            $campos = "";            

            foreach ($this->data as $key => $value) {
                $campos .= $key ."='$value'" . ",";
            }

            $campos = trim($campos, ",");

            if ($this->id) {
                $query = "UPDATE $this->tabla SET ";
                $query .= $campos;
                $query .= " WHERE id=$this->id";                
            } else {
                $query = "INSERT INTO $this->tabla SET ";
                $query .= $campos;                
            }            
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        } catch(PDOException $e) {            
            echo "El registro no pudo ser insertado/actualizado";
        } 
    }
}