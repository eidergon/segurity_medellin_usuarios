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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Data</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="../estilos/info.css">
  <link rel="shortcut icon" href="../img/logo-removebg-preview.ico" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <?php
    require 'conexion.php';

    // Configuración de la paginación
    $registrosPorPagina = 10;
    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    $offset = ($paginaActual - 1) * $registrosPorPagina;

    // Variables para la búsqueda
    $nombreUsuarioBuscar = '';
    $consulta = "SELECT * FROM Usuarios";

    // Verificar si se ha enviado el formulario de búsqueda
    if (isset($_GET['usuarioBuscar']) && !empty($_GET['usuarioBuscar'])) {
      $nombreUsuarioBuscar = $_GET['usuarioBuscar'];

      // Consulta SQL con el filtro de búsqueda
      $consulta = "SELECT * FROM Usuarios WHERE usuario_onelock LIKE '%$nombreUsuarioBuscar%'";
    }

    // Agregar la cláusula LIMIT para la paginación
    $consulta .= " LIMIT $offset, $registrosPorPagina";
    $resultado = $conn->query($consulta);

    // Obtener el total de registros para la paginación
    $totalRegistros = $conn->query("SELECT COUNT(*) as total FROM Usuarios")->fetch_assoc()['total'];
    $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
  ?>

  <!-- volver la pagina administrativa -->
  <div class="btn">
    <button><a href="./admin.php">Administracion de usuarios</a></button>
  </div>

  <!-- Formulario de búsqueda -->
  <form method="GET" class="filtrar">
    <div class="form-group">
      <input type="text" class="form-control" id="usuarioBuscar" name="usuarioBuscar" placeholder="Usuario One Lock ">
    </div>
    <button type="submit" class="btn-1">Buscar</button>
  </form>

  <!-- tabla de la base de datos -->
  <h1>Tabla de datos</h1>
  <table class="table table-bordered">
    <tr>
      <th scope="col">Usuario </th>
      <th scope="col">Contraseña</th>
      <th scope="col">Usuario Poliedro</th>
      <th scope="col">Contraseña Poliedro</th>
      <th scope="col">Usuario IdVision</th>
      <th scope="col">Contraseña IdVision</th>
      <th scope="col">Usuario Crm</th>
      <th scope="col">Contraseña Crm</th>
      <th scope="col">Usuario Agendamiento</th>
      <th scope="col">Contraseña Agendamiento</th>
      <th scope="col">Usuario visor</th>
      <th scope="col">Contraseña Visor</th>
      <th scope="col">Usuario MyApp</th>
      <th scope="col">Contraseña MyApp</th>
      <th scope="col">Usuario Notus</th>
      <th scope="col">Contraseña Notus</th>
    </tr>
    <?php while ($fila = $resultado->fetch_assoc()) { ?>
      <tr scope="row">
        <td><?php echo $fila['usuario_onelock']; ?></td>
        <td><?php echo $fila['contraseña_onelock']; ?></td>
        <td><?php echo $fila['poliedro']; ?></td>
        <td><?php echo $fila['contraseña_poliedro']; ?></td>
        <td><?php echo $fila['id_vision']; ?></td>
        <td><?php echo $fila['contraseña_idvision']; ?></td>
        <td><?php echo $fila['crm']; ?></td>
        <td><?php echo $fila['contraseña_crm']; ?></td>
        <td><?php echo $fila['agendamiento']; ?></td>
        <td><?php echo $fila['contraseña_agendamiento']; ?></td>
        <td><?php echo $fila['visor']; ?></td>
        <td><?php echo $fila['contraseña_visor']; ?></td>
        <td><?php echo $fila['my_app']; ?></td>
        <td><?php echo $fila['contraseña_myapp']; ?></td>
        <td><?php echo $fila['notus']; ?></td>
        <td><?php echo $fila['contraseña_notus']; ?></td>
      </tr>
    <?php } ?>
  </table>

  <!-- Paginación -->
  <div class="pagination">
    <ul class="pagination">
      <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
        <li class="page-item <?php echo ($paginaActual == $i) ? 'active' : ''; ?>">
          <button class="page-link" onclick="window.location.href='?pagina=<?php echo $i; ?>'"><?php echo $i; ?></button>
        </li>
      <?php } ?>
    </ul>
  </div>

</body>
</html>