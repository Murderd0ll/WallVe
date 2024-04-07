<?php 
include("connection/conexion.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <!-- Fuentes  -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/estilos.css"/>
    <title>Modificar Usuario| Wall-VE</title>
</head>
<body>
    <header>
        <ul class="navig">
            <li><a>Modificar Usuario</a></li>            
        </ul>
    </header>
   

    <div class="barralateral">
        <div class="logo"></div>

            <ul class="menu" id ="dropdown">

                <li class="list_btn">
                    <a href="#">
                        <i class="fa-solid fa-chevron-up"></i>
                        <span>Opciones</span>
                    </a>
                </li>

                <li>
                    <a href="Admin_Ventas.html">
                        <i class="fa-solid fa-dollar-sign"></i>
                        <span>Ventas</span>
                    </a>
                </li>

                <li>
                    <a href="Admin_Precios.html">
                        <i class="fa-solid fa-tags"></i>
                        <span>Precios</span>
                    </a>
                </li>

                <li  class="activo">
                    <a href="Admin_Usuarios.php">
                        <i class="fa-solid fa-user-group"></i>
                        <span>Usuarios</span>
                    </a>
                </li>

                <li>
                    <a href="Admin_Reportes.html">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Reportes</span>
                    </a>
                </li>

                <li>
                    <a href="Admin_CopiasSeg.html">
                        <i class="fa-solid fa-download"></i>

                        <span>Copia de seguridad</span>
                    </a>
                </li>

                <li>
                    <a href="Admin_Perfil.html">
                        <i class="fa-regular fa-id-card"></i>
                        <span>Perfil</span>
                    </a>
                </li>

                <button class="regresar">
                    <a href="menu.php">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Regresar</span>
                    </a>
            </ul>
    </div>
    <?php
        if(isset($_POST['editarUsuario'])){
            
            $idEmp = $_POST['idEmp'];
            $nombreEmp = $_POST['nombreEmp'];
            $apellidoPEmp = $_POST['apellidoPEmp'];
            $apellidoMEmp = $_POST['apellidoMEmp'];
            $fechaNacEmp = $_POST['fechaNacEmp'];
            $telEmp = $_POST['telEmp'];
            $generoEmp = $_POST['generoEmp'];
            $ciudadEmp = $_POST['ciudadEmp'];
            $direccionEmp = $_POST['direccionEmp'];
            $emailEmp = $_POST['emailEmp'];
            $turnoEmp = $_POST['turnoEmp'];
            $rolEmp = $_POST['rolEmp'];            
            $idloginEmp = $_POST['idloginEmp'];
            $passEmp = $_POST['passEmp'];
            

            $sql ="update tusuario set nombreEmp='".$nombreEmp."',apellidoPEmp='".$apellidoPEmp."',apellidoMEmp='".$apellidoMEmp."',fechaNacEmp='".$fechaNacEmp."',telEmp='".$telEmp."
            ',generoEmp='".$generoEmp."',ciudadEmp='".$ciudadEmp."',direccionEmp='".$direccionEmp."',emailEmp='".$emailEmp."',turnoEmp='".$turnoEmp."
            ',rolEmp='".$rolEmp."',idloginEmp='".$idloginEmp."',passEmp='".$passEmp."'where idEmp ='".$idEmp."'";
           
            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                echo "<script language ='JavaScript'> 
                alert('Se actualizó el usuario correctamente.'); 
                location.assign('Admin_Usuarios.php');
                </script>";

            }else{
                echo "<script language ='JavaScript'> 
                alert('No se actualizó el usuario.'); 
                location.assign('Admin_Usuarios.php'); 
                </script>";
            }
            mysqli_close($conexion);

        }else{

            $idEmp =$_GET['idEmp'];
            $sql="select * from tusuario where idEmp ='".$idEmp ."'";

            $resultado=mysqli_query($conexion,$sql);

            $filas=mysqli_fetch_assoc($resultado);

            $nombreEmp = $filas["nombreEmp"];
            $apellidoPEmp = $filas["apellidoPEmp"];
            $apellidoMEmp = $filas["apellidoMEmp"];
            $fechaNacEmp = $filas["fechaNacEmp"];
            $telEmp = $filas["telEmp"];
            $generoEmp = $filas["generoEmp"];
            $ciudadEmp = $filas["ciudadEmp"];
            $direccionEmp = $filas["direccionEmp"];
            $emailEmp = $filas["emailEmp"];
            $turnoEmp = $filas["turnoEmp"];
            $rolEmp = $filas["rolEmp"];            
            $idloginEmp = $filas["idloginEmp"];
            $passEmp = $filas["passEmp"];

            mysqli_close($conexion);        

    ?>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <br>

    <label>ID del usuario: <?php echo $idEmp; ?></label><br><br>
    <label>Nombre </label>
    <input type="text" name="nombreEmp" value="<?php echo $nombreEmp; ?>"> <br>

    <label>Apellido paterno </label>
    <input type="text" name="apellidoPEmp" value="<?php echo $apellidoPEmp; ?>"> <br>

    <label>Apellido materno </label>
    <input type="text" name="apellidoMEmp" value="<?php echo $apellidoMEmp; ?>"> <br>

    <label>Fecha de nacimiento </label>
    <input type="text" name="fechaNacEmp" value="<?php echo $fechaNacEmp; ?>"> <br>

    <label>Telefono </label>
    <input type="text" name="telEmp" value="<?php echo $telEmp; ?>"> <br>

    <label>Genero </label>
    <input type="text" name="generoEmp" value="<?php echo $generoEmp; ?>"> <br>

    <label>Ciudad </label>
    <input type="text" name="ciudadEmp" value="<?php echo $ciudadEmp; ?>"> <br>

    <label>Dirección </label>
    <input type="text" name="direccionEmp" value="<?php echo $direccionEmp; ?>"> <br>

    <label>E-Mail </label>
    <input type="text" name="emailEmp" value="<?php echo $emailEmp; ?>"> <br>

    <label>Turno </label>
    <input type="text" name="turnoEmp" value="<?php echo $turnoEmp; ?>"> <br>

    <label>Rol </label>
    <input type="text" name="rolEmp" value="<?php echo $rolEmp; ?>"> <br>

    <label>Nombre de usuario </label>
    <input type="text" name="idloginEmp" value="<?php echo $idloginEmp; ?>"> <br>

    <label>Contraseña </label>
    <input type="text" name="passEmp" value="<?php echo $passEmp; ?>"> <br>

    <input type="hidden" name ="idEmp" value ="<?php echo $idEmp; ?>">

    <input type="submit" name ="editarUsuario" value="Actualizar">
    <a href="Admin_Usuarios.php">Regresar</a>
    </form>
    <?php 
}?>
    
</body>
</html>