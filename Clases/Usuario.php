<?php 
include 'modelos.php';

class Usuario extends Modelos {

    public $username;
    protected $email;
    protected $password;
    protected $rol;

    public function __construct()
    {
        $this->tabla = 'usuarios';
        parent::__construct();
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername($username)
    {
        return $this->username;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail($email)
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword($password)
    {
        return $this->password;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function getRol($rol)
    {
        return $this->rol;
    }
}