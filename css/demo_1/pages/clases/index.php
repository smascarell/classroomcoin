<?php session_start();
  if (!isset($_SESSION['usuario'])) {
    // code...
  header('location: http://localhost/classroomcoin/login2.php');
  exit;
  }
  include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');

  $db = new Database();
  $sql = "SELECT * from clases";
  $result = $db->Query($sql);
  $db->Close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />

  <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../../assets/vendors/iconfonts/ionicons/css/ionicons.css">
  <link rel="stylesheet" href="../../../assets/vendors/iconfonts/typicons/src/font/typicons.css">
  <link rel="stylesheet" href="../../../assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../assets/css/shared/style.css">
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../../assets/css/demo_1/style.css">
  <!-- End Layout styles -->
  <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">

    <!-- partial:../../partials/_navbar.html -->
  <?php include('../../partials/_navbar.php') ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.php -->
    <?php include('../../partials/_sidebar.php') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h1>Listado de clases</h1>
                  <div id="errores"></div>
                  <form class="" action="nuevo.php" method="post">
                    <button name="nuevo" type="submit" class="btn btn-success mr-2">Nueva</button>
                  </form>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Clase</th>
                        <th>Grupo</th>
                        <th>Profesor</th>
                        <?php if ($_SESSION['rol'] == 1) { ?>
                          <th> Opciones </th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($clase = mysqli_fetch_assoc($result)) {
                          echo "<tr>";
                          echo "<td>" . $clase['nombre'] . "</td>";
                          echo "<td>" . $clase['grupo'] . "</td>";

                          $sql = "SELECT nombre, apellidos FROM usuarios WHERE id = $clase[profesor_id]";
                          $db = new Database();
                          $result_profesor = $db->Query($sql);
                          $nombre_profesor = mysqli_fetch_assoc($result_profesor);
                          $db->Close();
                          echo "<td>" . $nombre_profesor['nombre'] . " " . $nombre_profesor['apellidos'] ."</td>";

                          if ($_SESSION['rol'] == 1) { ?>
                            <td>
                              <button name="alumnos" value="alumnos" onclick="verAlumnosClase(<?=$clase['id']?>)" class="btn btn-inverse-info">Alumnos
                              <button name="editar" value="editar" onclick="editarClase(<?=$clase['id']?>)" class="btn btn-inverse-primary">Editar
                              <button name="eliminar" value="eliminar" onclick="eliminarRecompensa(<?=$clase['id']?>)" class="btn btn-inverse-danger">Eliminar</button>
                           </td>
                         <?php }  echo "</tr>";
                      } //while ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
      <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
        </span>
      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../../assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../../assets/js/shared/off-canvas.js"></script>
  <script src="../../../assets/js/shared/misc.js"></script>
  <script src="/classroomcoin/js/script.js"></script>

  <!-- endinject -->


</body>

</html>
