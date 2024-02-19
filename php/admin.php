<?php
    session_start();

    // Verificar si la sesión de inicio de sesión existe
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        // La sesión no existe o no ha iniciado sesión correctamente, redirigir a la página de inicio de sesión
        header('Location: ../index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="shortcut icon" href="../img/logo-removebg-preview.ico" type="image/x-icon">
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <!-- botonespara mostrar los formularios -->
    <div class="btn">
        <button onclick="mostrarFormulario('usuarios')">Nuevo Usuario</button>
        <button onclick="mostrarFormulario('actualizar')">Actualizar Clave Usuario</button>
        <button onclick="mostrarFormulario('eliminar')">Eliminar Usuario</button>
        <button onclick="mostrarFormulario('formularioApp')">Actualizar aplicativos</button>
        <button onclick="mostrarFormulario('generico')">Aplicativos Genericos</button>
        <button><a href="./info.php">Tabla de usuarios</a></button>
    </div>

    <!-- agregar usuario -->
    <form action="" class="formulario usuarios" id="usuarios" method="POST">
        <h1>Nuevo Usuario</h1>

        <div class="row">
            <div class="col-md-3">
                <label for="cc_usuario">CC de usuario</label>
                <input type="text" name="cc_usuario" placeholder="One Lock" required>

                <label for="clave_usuario">Clave de usuario</label>
                <input type="text" name="clave_usuario" required>
            </div>

            <div class="col-md-3">
                <label for="cc_usuario">usuario poliedro</label>
                <input type="text" name="usuario_poliedro" placeholder="Poliedro">

                <label for="clave_usuario">Clave poliedro</label>
                <input type="text" name="clave_poliedro">
            </div>

            <div class="col-md-3">
                <label for="cc_usuario">usuario id visión</label>
                <input type="text" name="usuario_idvision" placeholder="Id Visión">

                <label for="clave_usuario">Clave de id visión</label>
                <input type="text" name="clave_idvision">
            </div>

            <div class="col-md-3">
                <label for="cc_usuario">usuario crm</label>
                <input type="text" name="usuario_crm" placeholder="Crm">

                <label for="clave_usuario">Clave de crm</label>
                <input type="text" name="clave_crm">
            </div>

            <div class="col-md-3">
                <label for="cc_usuario">usuario my apps</label>
                <input type="text" name="usuario_myapp" placeholder="My App">

                <label for="clave_usuario">Clave de my apps</label>
                <input type="text" name="clave_myapp">
            </div>

            <div class="col-md-3">
                <label for="cc_usuario">usuario agendamiento</label>
                <input type="text" name="usuario_agendamiento" placeholder="Agendamiento">

                <label for="clave_usuario">Clave de agendamiento</label>
                <input type="text" name="clave_agendamiento">
            </div>

            <div class="col-md-3">
                <label for="cc_usuario">usuario visor</label>
                <input type="text" name="usuario_visor" placeholder="Visor">

                <label for="clave_usuario">Clave de visor</label>
                <input type="text" name="clave_visor">
            </div>

            <div class="col-md-3">
                <label for="cc_usuario">usuario notus</label>
                <input type="text" name="usuario_notus" placeholder="Notus">

                <label for="clave_usuario">Clave de notus</label>
                <input type="text" name="clave_notus">
            </div>

            <div class="col-md-3">
                <label for="cc_usuario">usuario RR</label>
                <input type="text" name="usuario_rr" placeholder="RR">

                <label for="clave_usuario">Clave de notus</label>
                <input type="text" name="clave_rr">
            </div>

            <div class="col-md-3">
                <label for="cc_usuario">usuario OCM</label>
                <input type="text" name="usuario_ocm" placeholder="OCM">

                <label for="clave_usuario">Clave de notus</label>
                <input type="text" name="clave_ocm">
            </div>

            <div class="col-md-3">
                <label for="clave_usuario">Clave de AC</label>
                <input type="text" name="clave_ac" placeholder="Clave AC">
            </div>
        </div>

        <div class="btn">
            <input type="submit" value="Crear Usuario" class="submit">
            <input type="reset" value="Limpiar" class="limpiar">
        </div>
    </form>

    <!-- actualizar la clave del usuario -->
    <form action="" class="formulario actualizar" id="actualizar" style="display: none;" method="POST">
        <h1>Actualizar clave Usuario</h1>
        <div class="row form">
            <div class="col-md-6">
                <label for="cc_usuario_actualizar">CC de usuario</label>
                <input type="text" name="cc_usuario_actualizar" placeholder="One lock" required>

                <label for="clave_usuario_actualizar">Clave nueva</label>
                <input type="text" name="clave_usuario_actualizar" required>
            </div>
        </div>

        <div class="btn">
            <input type="submit" value="Actualizar clave" class="submit">
            <input type="reset" value="Limpiar" class="limpiar">
        </div>
    </form>

    <!-- eliminar usuario -->
    <form action="" class="formulario eliminar" id="eliminar" style="display: none;" method="POST">
        <h1>Eliminar Usuario</h1>
        <div class="row form">
            <div class="col-md-6">
                <label for="cc_usuario_eliminar">CC de usuario</label>
                <input type="text" name="cc_usuario_eliminar" required placeholder="One Lock">
            </div>
        </div>
        <div class="btn">
            <input type="submit" value="Eliminar Usuario" class="submit">
        </div>
    </form>

    <!-- actualizar clave y usuario de aplicativos -->
    <form action="" class="formulario app" id="formularioApp" style="display: none;" method="POST">
        <h1>Actualizar clave de aplicativo</h1>
        <div class="row form">
            <label for="usuario_asignar">CC de usuario</label>
            <input type="text" name="usuario_asignar" placeholder="One Lock" required>

            <!-- div para ambos  -->
            <div class="col-md-6 ambos" id="ambos">
                <label for="usuario_app">Nuevo usuario</label>
                <input type="text" name="usuario_app" placeholder="Nuevo usuario aplicativo" required>

                <label for="clave_usuario_app">Nueva clave</label>
                <input type="text" name="clave_usuario_app" placeholder="Nueva clave de aplicativo" required>
            </div>

            <!-- select con las aplicativos -->
            <select name="aplicativos" id="app" class="select" required>
                <option value="seleccion">Selecciona el aplicativo</option>
                <option value="id_vision">Id Visión</option>
                <option value="id_vision_x">Id Visión X</option>
                <option value="crm">CRM</option>
                <option value="poliedro">Poliedro</option>
                <option value="poliedro_x">Poliedro X</option>
                <option value="notus">Notus</option>
                <option value="rr">RR</option>
                <option value="ocm">OCM</option>
                <option value="ac">AC</option>
                <option value="modulo">Modulo De Gestion</option>
                <option value="modulo_x">Modulo De Gestion X</option>
            </select>
        </div>

        <!-- select con la operacion a realizar el boton de envio -->
        <div class="btn">
            <input type="submit" value="Actualizar" class="submit">
        </div>
    </form>

    <!-- actualizar clave aplicativos genericos -->
    <form action="" class="formulario generico" id="generico" style="display: none;" method="POST">
        <h1>Actualizar clave de aplicativo</h1>
        <div class="row form">
            <div class="col-md-6">
                <label for="clave_generico">Clave de usuario</label>
                <input type="text" name="clave_generico" required>
            </div>
            <select name="aplicativos_genericos" id="app" class="select" required>
                <option value="seleccion">Selecciona el aplicativo</option>
                <option value="biometria">Biometria</option>
                <option value="logytech">Logytech</option>
                <option value="esm">Esm</option>
                <option value="integra">Integra</option>
                <option value="cali_express">Cali Express</option>
                <option value="lecta">Lecta</option>
            </select>
        </div>

        <div class="btn">
            <input type="submit" value="Cambiar Clave" class="submit">
        </div>
    </form>

    <!-- CRUD -->
    <?php
        require 'conexion.php';

        // Codigo para los formularios
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // guardar nuevo usuario
            if (isset($_POST["cc_usuario"]) && isset($_POST["clave_usuario"]) && isset($_POST["usuario_poliedro"]) && isset($_POST["clave_poliedro"]) && isset($_POST["usuario_idvision"]) && isset($_POST["clave_idvision"]) && isset($_POST["usuario_crm"]) && isset($_POST["clave_crm"]) && isset($_POST["usuario_myapp"]) && isset($_POST["clave_myapp"]) && isset($_POST["usuario_agendamiento"]) && isset($_POST["clave_agendamiento"]) && isset($_POST["usuario_visor"]) && isset($_POST["clave_visor"]) && isset($_POST["usuario_notus"]) && isset($_POST["clave_notus"]) && isset($_POST["usuario_rr"]) && isset($_POST["clave_rr"]) && isset($_POST["usuario_ocm"]) && isset($_POST["clave_ocm"]) && isset($_POST["clave_ac"]) ) {
                $cc_usuario = $_POST["cc_usuario"];
                $clave_usuario = $_POST["clave_usuario"];
                $usuario_poliedro = $_POST["usuario_poliedro"];
                $clave_poliedro = $_POST["clave_poliedro"];
                $usuario_idvision = $_POST["usuario_idvision"];
                $clave_idvision = $_POST["clave_idvision"];
                $usuario_crm = $_POST["usuario_crm"];
                $clave_crm = $_POST["clave_crm"];
                $usuario_myapp = $_POST["usuario_myapp"];
                $clave_myapp = $_POST["clave_myapp"];
                $usuario_agendamiento = $_POST["usuario_agendamiento"];
                $clave_agendamiento = $_POST["clave_agendamiento"];
                $usuario_visor = $_POST["usuario_visor"];
                $clave_visor = $_POST["clave_visor"];
                $usuario_notus = $_POST["usuario_notus"];
                $clave_notus = $_POST["clave_notus"];
                $usuario_rr = $_POST["usuario_rr"];
                $clave_rr = $_POST["clave_rr"];
                $usuario_ocm = $_POST["usuario_ocm"];
                $clave_ocm = $_POST["clave_ocm"];
                $clave_ac = $_POST["clave_ac"];

                $sql = "INSERT INTO Usuarios (usuario_onelock, contraseña_onelock, poliedro, contraseña_poliedro, id_vision, contraseña_idvision, crm, contraseña_crm, agendamiento, contraseña_agendamiento, visor, contraseña_visor, my_app, contraseña_myapp, notus, contraseña_notus, rr, contraseña_rr, ocm, contraseña_ocm, contraseña_ac) VALUES ('$cc_usuario', '$clave_usuario', '$usuario_poliedro' , '$clave_poliedro', '$usuario_idvision' , '$clave_idvision', '$usuario_crm' , '$clave_crm', '$usuario_agendamiento' , '$clave_agendamiento', '$usuario_visor' , '$clave_visor', '$usuario_myapp', '$clave_myapp', '$usuario_notus', '$clave_notus', '$usuario_rr' , '$clave_rr', '$usuario_ocm' , '$clave_ocm', '$clave_ac')";
                mysqli_query($conn, $sql);
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<script>Swal.fire(
                                    'Good job!',
                                    'Usuario agregado correctamente',
                                    'success'
                                );</script>";
                } else {
                    echo "<script>Swal.fire({
                                    icon: 'error',
                                    title: 'ERROR',
                                    text: 'No se pudo agregar el usuario'
                                });</script>";
                }
            } //. mysqli_error($conn) .

            //actualizar clave de usuario
            if (isset($_POST["cc_usuario_actualizar"]) && isset($_POST["clave_usuario_actualizar"])) {
                $cc_usuario_actualizar = $_POST["cc_usuario_actualizar"];
                $clave_usuario_actualizar = $_POST["clave_usuario_actualizar"];

                $sql = "UPDATE Usuarios SET contraseña_onelock = '$clave_usuario_actualizar' WHERE usuario_onelock = '$cc_usuario_actualizar'";
                mysqli_query($conn, $sql);
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<script>Swal.fire(
                                    'Good job!',
                                    'Clave cambiada correctamente',
                                    'success'
                                );</script>";
                } else {
                    echo "<script>Swal.fire({
                                    icon: 'error',
                                    title: 'ERROR',
                                    text: 'No se pudo cambiar la clave'
                                });</script>";
                }
            }

            // Eliminar usuario
            if (isset($_POST["cc_usuario_eliminar"])) {
                $cc_usuario_eliminar = $_POST["cc_usuario_eliminar"];

                $sql = "DELETE FROM Usuarios WHERE usuario_onelock = '$cc_usuario_eliminar'";
                mysqli_query($conn, $sql);

                if (mysqli_affected_rows($conn) > 0) {
                    echo "<script>Swal.fire(
                                    '¡Buen trabajo!',
                                    'Usuario eliminado correctamente',
                                    'success'
                                );</script>";
                } else {
                    echo "<script>Swal.fire({
                                    icon: 'error',
                                    title: 'ERROR',
                                    text: 'No se pudo encontrar el usuario ocurrio un error al eliminarlo'
                                });</script>";
                }
            }

            //asignar aplicativos
            if (isset($_POST["usuario_asignar"]) && isset($_POST["aplicativos"]) && isset($_POST["clave_usuario_app"]) && isset($_POST["usuario_app"])) {
                $usuario_app = $_POST["usuario_app"];
                $clave_usuario_app = $_POST["clave_usuario_app"];
                $aplicativo = $_POST["aplicativos"];
                $usuario_asignar = $_POST["usuario_asignar"];

                $columna = "";
                $columna2 = "";
                $columna3 = "";
                $columna4 = "";
                $columna5 = "";
                $columna6 = "";
                $columna7 = "";
                $columna8 = "";
                $sql = "";

                if ($aplicativo === "id_vision") {
                    $columna = "contraseña_idvision";
                    $columna2 = "id_vision";
                    $sql = "UPDATE Usuarios SET $columna2 = '$usuario_app',$columna = '$clave_usuario_app' WHERE usuario_onelock = '$usuario_asignar'";
                } elseif ($aplicativo === "crm") {
                    $columna = "contraseña_crm";
                    $columna2 = "crm";
                    $sql = "UPDATE Usuarios SET $columna2 = '$usuario_app',$columna = '$clave_usuario_app' WHERE usuario_onelock = '$usuario_asignar'";
                } elseif ($aplicativo === "poliedro") {
                    $columna = "contraseña_poliedro";
                    $columna2 = "poliedro";
                    $sql = "UPDATE Usuarios SET $columna2 = '$usuario_app',$columna = '$clave_usuario_app' WHERE usuario_onelock = '$usuario_asignar'";
                } elseif ($aplicativo === "notus") {
                    $columna = "contraseña_notus";
                    $columna2 = "notus";
                    $sql = "UPDATE Usuarios SET $columna2 = '$usuario_app',$columna = '$clave_usuario_app' WHERE usuario_onelock = '$usuario_asignar'";
                } elseif ($aplicativo === "modulo") {
                    $columna3 = "contraseña_myapp";
                    $columna4 = "my_app";
                    $columna5 = "contraseña_agendamiento";
                    $columna6 = "agendamiento";
                    $columna7 = "contraseña_visor";
                    $columna8 = "visor";
                    $sql = "UPDATE Usuarios SET $columna4 = '$usuario_app',$columna3 = '$clave_usuario_app', $columna6 = '$usuario_app',$columna5 = '$clave_usuario_app', $columna8 = '$usuario_app',$columna7 = '$clave_usuario_app' WHERE usuario_onelock = '$usuario_asignar'";
                } elseif ($aplicativo === "rr") {
                    $columna = "contraseña_rr";
                    $columna2 = "rr";
                    $sql = "UPDATE Usuarios SET $columna2 = '$usuario_app',$columna = '$clave_usuario_app' WHERE usuario_onelock = '$usuario_asignar'";
                } elseif ($aplicativo === "ocm") {
                    $columna = "contraseña_ocm";
                    $columna2 = "ocm";
                    $sql = "UPDATE Usuarios SET $columna2 = '$usuario_app',$columna = '$clave_usuario_app' WHERE usuario_onelock = '$usuario_asignar'";
                } elseif ($aplicativo === "ac") {
                    $columna = "contraseña_ac";
                    $sql = "UPDATE Usuarios SET $columna = '$clave_usuario_app' WHERE usuario_onelock = '$usuario_asignar'";
                } elseif ($aplicativo === "id_vision_x") {
                    $columna = "contraseña_idvision";
                    $columna2 = "id_vision";
                    $sql = "UPDATE Usuarios SET $columna2 = '$usuario_app',$columna = '$clave_usuario_app' WHERE id_vision = '$usuario_asignar'";
                } elseif ($aplicativo === "poliedro_x") {
                    $columna = "contraseña_poliedro";
                    $columna2 = "poliedro";
                    $sql = "UPDATE Usuarios SET $columna2 = '$usuario_app',$columna = '$clave_usuario_app' WHERE poliedro = '$usuario_asignar'";
                } elseif ($aplicativo === "modulo_x") {
                    $columna3 = "contraseña_myapp";
                    $columna4 = "my_app";
                    $columna5 = "contraseña_agendamiento";
                    $columna6 = "agendamiento";
                    $columna7 = "contraseña_visor";
                    $columna8 = "visor";
                    $sql = "UPDATE Usuarios SET $columna4 = '$usuario_app',$columna3 = '$clave_usuario_app', $columna6 = '$usuario_app',$columna5 = '$clave_usuario_app', $columna8 = '$usuario_app',$columna7 = '$clave_usuario_app' WHERE my_app = '$usuario_asignar'";
                }

                mysqli_query($conn, $sql);
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<script>Swal.fire(
                                    'Good job!',
                                    'Aplicativo asignado correctamente',
                                    'success'
                                );</script>";
                } else {
                    echo "<script>Swal.fire({
                                    icon: 'error',
                                    title: 'ERROR',
                                    text: 'No se pudo asignar el aplicativo'
                                });</script>";
                }
            }

            // Clave aplicativos genericos
            if (isset($_POST["aplicativos_genericos"]) && isset($_POST["clave_generico"])) {
                $aplicativo_generico = $_POST["aplicativos_genericos"];
                $clave_generico = $_POST["clave_generico"];

                $complemento = "";

                if ($aplicativo_generico === "biometria") {
                    $complemento = "Biometria";
                } elseif ($aplicativo_generico === "logytech") {
                    $complemento = "Logytech";
                } elseif ($aplicativo_generico === "esm") {
                    $complemento = "Esm";
                } elseif ($aplicativo_generico === "integra") {
                    $complemento = "Integra";
                } elseif ($aplicativo_generico === "cali_express") {
                    $complemento = "Cali_express";
                } elseif ($aplicativo_generico === "lecta") {
                    $complemento = "Lecta";
                }

                $sql = "UPDATE Aplicativos SET contraseña = '$clave_generico' WHERE complemento = '$complemento'";
                mysqli_query($conn, $sql);
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<script>Swal.fire(
                                    'Good job!',
                                    'Clave cambiada',
                                    'success'
                                );</script>";
                } else {
                    echo "<script>Swal.fire({
                                    icon: 'error',
                                    title: 'ERROR',
                                    text: 'No se cambio la clave'
                                });</script>";
                }
            }
        }
        // Cerrar la conexión con la base de datos
        mysqli_close($conn);
    ?>

</body>
</html>