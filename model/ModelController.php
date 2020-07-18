<?php
    require_once 'db/conexion.php';
    class ModelController 
    {
        public $id;
        public $nombre;
        public $apellido;
        public $email;
        public $db; 

        function __construct()
        {
             $this->db = Conexion::dbConexion();
        }

        /* Metodos getter y setter */
        function setId($id)
        {
            $this->id = $id;
        }

        function setNombre($name){
            $this->nombre = $name;
        }

        function setApellido($lasname){
            $this->apellido = $lasname;
        }

        function setEmail($email){
            $this->email = $email;
        }

        function getId()
        {
            return $this->id;
        }

        function getNombre(){
            return $this->nombre;
        }

        function getLasname(){
            return $this->apellido;
        }

        function getEmail(){
            return $this->email;
        }

        /* Metodo para Mostrar usuario */

        function sacandoUsuario()
        {
            $sql = "SELECT * FROM persona";
            $query = $this->db->prepare($sql);
            $query->execute();

            $result = false;

            if($query)
            {
                $result = $query;
            }
            
            return $result;
        }

         /* Metodo para insertar Usuario */

        function agregar()
        {
            $sql = "INSERT INTO persona (nombre, apellido, email) VALUE (:nombre, :apellido, :email)";
            $result = $this->db->prepare($sql);
            $result->execute(array(":nombre"=>"{$this->getNombre()}",":apellido"=>"{$this->getLasname()}",
            ":email"=>"{$this->getEmail()}"));
            $result->closeCursor();
        }

        /* Eliminando Usuario */

        function deleteUser()
        {
            $sql = "DELETE FROM persona WHERE id = :id";
            $dro = $this->db->prepare($sql);
            $dro->execute(array(":id"=>"{$this->getId()}"));
        }

        function edit()
        {
            $sql = "SELECT * FROM persona WHERE id = :id";
            $query = $this->db->prepare($sql);
            $query->execute(array(":id"=>"{$this->getId()}"));

            $result = false;

            if($query)
            {
                $result = $query;
            }
            return $result;
        }
            /* actualizando Usuario*/
        function  actualizar()
        {
            $sql = "UPDATE persona SET nombre = :nombre, apellido = :apellido, email = :email WHERE id = :id";
            $query = $this->db->prepare($sql);
            $query->execute(array(":nombre"=> "{$this->getNombre()}", ":apellido"=>"{$this->getLasname()}",
            ":email"=>"{$this->getEmail()}", ":id"=>"{$this->getId()}"));
            $query->closeCursor();
        }
    }
?>