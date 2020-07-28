
        
        
        <div class="table">
            <table>
                <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>EMAIL</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                </tr>

                <?php while($datos = $result->fetch(PDO::FETCH_OBJ)): ?>
                    <tr>
                        <td><?=$datos->nombre?></td>
                        <td><?=$datos->apellido?></td>
                        <td><?=$datos->email?></td>
                        <td><a href="<?=base_url?>controller/editar&id=<?=$datos->id?>"><i class="icon fas fa-user-edit"></i></a></td>
                        <td><a href="<?=base_url?>controller/eliminar&id=<?=$datos->id?>"><i class="icon fas fa-trash"></i></a></td>
                    </tr>
                <?php endwhile; ?>
              
            </table>
        </div>

       
     