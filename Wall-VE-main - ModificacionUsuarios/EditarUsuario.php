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
    <div class="TEditar">

    <div class="Did">
    <label>ID del usuario: <?php echo $idEmp; ?></label><br><br>
    </div>

    <div class="DNombre">
        <label>Nombre </label>
        <input type="text" name="nombreEmp" value="<?php echo $nombreEmp; ?>"> <br>
    </div>

    <div class="DPAT">
        <label>Apellido paterno </label>
        <input type="text" name="apellidoPEmp" value="<?php echo $apellidoPEmp; ?>"> <br>
    </div>

    <div class="DMAT">
        <label>Apellido materno </label>
        <input type="text" name="apellidoMEmp" value="<?php echo $apellidoMEmp; ?>"> <br>
    </div>

    <div class="DFecha">
    <label>Fecha de nacimiento </label>
    <input type="text" name="fechaNacEmp" value="<?php echo $fechaNacEmp; ?>"> <br>
    </div>
    
    <div class="DTel">
    <label>Telefono </label>
    <input type="text" name="telEmp" value="<?php echo $telEmp; ?>"> <br>
    </div>

    <div class="DgeneroLab">
    <label>Genero </label>
    <input type="text" name="generoEmp" value="<?php echo $generoEmp; ?>"> <br>
    
    </div>
    <div class="DGeneroInputs">
        
        <input type="radio" name="generoEmp" value="Femenino" <?php if($generoEmp == "Femenino") echo "checked";?>>Femenino
        <input type="radio" name="generoEmp" value="Masculino" <?php if($generoEmp == "Masculino") echo "checked";?>>Masculino

    </div>
    

    <div class="Dciudad">
    <label>Ciudad </label>
    <input type="text" name="ciudadEmp" value="<?php echo $ciudadEmp; ?>"> <br>
    </div>

    <div class="DDire">
    <label>Dirección </label>
    <input type="text" name="direccionEmp" value="<?php echo $direccionEmp; ?>"> <br>
    </div>

    <div class="DEmail">
    <label>E-Mail </label>
    <input type="text" name="emailEmp" value="<?php echo $emailEmp; ?>"> <br>
    </div>

    <div class="DTurno">
    <label>Turno </label>
    <input type="text" name="turnoEmp" value="<?php echo $turnoEmp; ?>"> <br>
    </div>
    <div class="DTurnoInputs">
    <input type="radio" name="turnoEmp" value="Vespertino" <?php if($turnoEmp == "Vespertino") echo "checked";?>>Vespertino
    <input type="radio" name="turnoEmp" value="Matutino" <?php if($turnoEmp == "Matutino") echo "checked";?>>Matutino

    

    
    </div>

    <div class="DRol">
    <label>Rol </label>
    <input type="text" name="rolEmp" value="<?php echo $rolEmp; ?>"> <br>
    </div>

    <div class="DLogin">
    <label>Nombre de usuario </label>
    <input type="text" name="idloginEmp" value="<?php echo $idloginEmp; ?>"> <br>
    </div>

    <div class="DContra">
    <label>Contraseña </label>
    <input type="text" name="passEmp" value="<?php echo $passEmp; ?>"> <br>
    </div>

    <input type="hidden" name ="idEmp" value ="<?php echo $idEmp; ?>">

    <div class="BotonCan">
        <a href="Admin_Usuarios.php">Regresar</a>
        </div>

        <div class="BotonAgg">
    <input type="submit" name ="editarUsuario" value="Actualizar">
        </div >
    </form>
    </div>

    
    <?php 
}?>
    
</body>
</html>