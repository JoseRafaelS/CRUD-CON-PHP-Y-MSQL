
<?php while($datos = $result->fetch(PDO::FETCH_OBJ)): ?>

    <div class="formulario" >
        <form action="<?= base_url?>controller/update&id=<?=$datos->id?>" method="POST">
            <input type="text" name="name" value="<?=isset($datos->nombre)? $datos->nombre:''?>">
            <input type="text" name="lastname" value="<?=isset($datos->nombre)? $datos->apellido:''?>">
            <input type="email" name="email" value="<?=isset($datos->nombre)? $datos->email:''?>">
            <input type="submit" value="Editar">
        </form>
    </div>
    
<?php endwhile; ?>