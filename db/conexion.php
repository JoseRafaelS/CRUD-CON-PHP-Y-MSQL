<?php
    
    class Conexion
    {
        public static function dbConexion()
        {
            try 
            {
                $dbConexion = new PDO('mysql:host=localhost;dbname=usuario','root','');
                $dbConexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $dbConexion->exec("SET CHARACTER SET utf8");
                return $dbConexion;
            } 
            catch (Exception $e) 
            {
                die("El error esta en la linea: ".$e->getLine(). " Y el error es: ".$e->getMessage());
            }
            finally
            {
                $dbConexion=null;
            }
        }
    }