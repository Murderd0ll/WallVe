<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <!-- Fuentes  -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/estilos.css"/>
   <link rel= "stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Agregar usuario | Wall-VE</title>
</head>
<body>
    <header>
        <ul class="navig">
            <li><a>Agregar Usuario</a></li>            
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
        if(isset($_POST['agregarUsuario'])){
            
            $generoEmp = "";
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
            if(isset($_POST['generoEmp'])){
                $generoEmp = $_POST['generoEmp'];
            }else{
                $generoEmp = "";
            }

            include("connection/conexion.php");

            $sql="insert into tusuario(nombreEmp,apellidoPEmp,apellidoMEmp,fechaNacEmp,telEmp,generoEmp,ciudadEmp,direccionEmp,emailEmp,
            turnoEmp,rolEmp,idloginEmp,passEmp, fIngreso) values ('".$nombreEmp."','".$apellidoPEmp."','".$apellidoMEmp."','".$fechaNacEmp."'
            ,'".$telEmp."','".$generoEmp."','".$ciudadEmp."','".$direccionEmp."','".$emailEmp."','".$turnoEmp."','".$rolEmp."'
            ,'".$idloginEmp."','".$passEmp."',NOW())";

            $resultado = mysqli_query($conexion, $sql);

            if($resultado){
                echo" <script language ='JavaScript'>
                alert('Se ha agregado un nuevo usuario a la BDD.');
                location.assign('Admin_Usuarios.php');
                </script>";

            }else{
                echo"<script language ='JavaScript'>
                alert('Error, NO se ha agregado un nuevo usuario a la BDD.');
                location.assign('Admin_Usuarios.php');
                </script>";

            }
            mysqli_close($conexion);
        }
        else{
    ?>
    <div class="TAgregar">

    <form action="<?=$_SERVER['PHP_SELF']?>" method ="post">

    <div class="DNombre">
        <label>Nombre </label>
        <input type="text" name ="nombreEmp" placeholder="Nombres Completos"><br>
    </div>
    
    <div class="DPAT">
        <label>Apellido paterno </label>
        <input type="text" name ="apellidoPEmp" placeholder="Apellido Paterno"><br>
    </div>
    
    <div class="DMAT">
        <label>Apellido materno </label>
        <input type="text" name ="apellidoMEmp" placeholder="Apellido Materno"><br>
    </div>

    <div class="DFecha">
        <label>Fecha de nacimiento </label>
        <input type="date" name ="fechaNacEmp"><br>
    </div>
    
    <div class="DTel">
        <label>Teléfono </label>
        <input type="text" name ="telEmp" placeholder="Teléfono"><br>
    </div>
    
    <div class="DgeneroLab">
        <label>Género </label>
    </div>
    <div class="DGeneroInputs">
        <input type="radio" name="generoEmp" value="Masculino">Masculino
        
        <input type="radio" name="generoEmp" value="Femenino">Femenino
    </div>
    

    <div class="Dciudad">
        <label>Ciudad </label>
        <input type="text" name ="ciudadEmp" placeholder="Ciudad"><br>
    </div>


    <div class="DDire">
        <label>Dirección </label>
        <input type="text" name ="direccionEmp" placeholder="Dirección"><br>
    </div>


    <div class="DEmail">
        <label>E-Mail </label>
        <input type="text" name ="emailEmp" placeholder="E-Mail"><br>
    </div>


    <div class="DTurno">
        <label>Turno </label>
    </div>
    <div class="DTurnoInputs">
        <input type="radio" name="turnoEmp" value="Matutino">Matutino
        
        <input type="radio" name="turnoEmp" value="Vespertino">Vespertino
    </div>


    <div class="DRol">
        <label>Rol </label>
        <input type="text" name ="rolEmp" placeholder="Rol"><br>
    </div>
    

    <div class="DLogin">
        <label>Nombre de usuario </label>
        <input type="text" name ="idloginEmp" placeholder="Nombre de usuario"><br>
    </div>
    

    <div class="DContra">
        <label>Contraseña </label>
        <input type="text" name ="passEmp" placeholder="Contraseña"><br>
    </div>

    
    <div class="BotonCan">
        <a href="Admin_Usuarios.php">Cancelar</a>
        
    </div>
    <div class="BotonAgg">
        <input type="submit" name ="agregarUsuario" value="Crear">
    </div>
    
    
    </form>
    </div>

 
    <?php
            }
    ?>

</body>
</html>