<?php 
   session_start();
   require_once "model/ModelController.php";
    class Controller{

        function usuarios()
        {
            $show = new ModelController();
            $result = $show->sacandoUsuario();

            require_once "view/mostrar.php";
        }

        /* Llama la vsita para inserta el usuario */

        function insertar()
        {
            require_once "view/crear.php";
        }

        /* Llama la vistapara editar el usuario */

        function editar()
        {
            if(isset($_GET['id']) && !empty($_GET['id']))
            {
                $id = $_GET['id'];

                $edit = new ModelController();
                $edit->setId($id);
                $result = $edit->edit();
                require_once "view/editar.php";
            }
        }

        function insertarUsuario()
        {
            if(isset($_POST) && !empty($_POST))
            {
               $name = $_POST['name'];
               $lasName = $_POST['lastname'];
               $email = $_POST['email'];
               $error = array();

               /* Validando los datos */
               if(empty($name) || is_numeric($name) || preg_match('/[0-9]/',$name))
               {
                    $error [] = "Inserte el nommbre correctamente";
               }

               if(empty($lasName) || is_numeric($lasName) || preg_match('/[0-9]/', $lasName))
               {
                    $error [] = "Inserte el apellido correcto";
               }

               if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL))
               {
                    $error [] = "Correo incorrecto";
               }
                
               if(count($error) == 0)
               {
                    $insert = new ModelController();
                    $insert->setNombre($name);
                    $insert->setApellido($lasName);
                    $insert->setEmail($email); 
                    $insert->agregar();
                    header("location:".base_url);

               }else
               {
                   $_SESSION['error'] = $error;
                   header("location:".base_url."controller/insertar");
               }

            }else
            {
                header("location:" . base_url);
            }

        }

        /* Elimina el usuario */

        function eliminar()
        {
            if(isset($_GET['id']) && !empty($_GET['id']))
            {
               $id = $_GET['id'];

               $delete = new ModelController();
               $delete->setId($id);
               $delete->deleteUser();
            }
            header("location:" . base_url);
        }

        function update()
        {
           if(isset($_GET['id']))
           {
                $id = $_GET['id'];
                $name = $_POST['name'];
                $lasName = $_POST['lastname'];
                $email = $_POST['email'];

                $update = new ModelController();
                $update->setId($id);

                $update->setNombre($name);
                $update->setApellido($lasName);
                $update->setEmail($email); 
                
                $update->actualizar();
           }
           
           header("location:" . base_url);
        }

    }
    
