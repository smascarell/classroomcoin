<?php session_start();
  if (!isset($_SESSION['usuario'])) {
    // code...
  header('location: http://localhost/classroomcoin/login2.php');
  exit;
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <?php include($_SERVER['DOCUMENT_ROOT'].'/classroomcoin/database.php');
          $db = new Database();
          if (isset($_GET['rol'])) {
            $sql = "SELECT * from usuarios where rol = $_GET[rol]";
          } else {
            $sql = "SELECT * from usuarios";
          }
          $result = $db->Query($sql);
        //  $db->Query($sql);
          $db->Close();
          ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Administradores</h4>
                  <form class="" action="nuevo.php" method="post">
                    <button name="nuevo" type="submit" class="btn btn-success mr-2">Nuevo</button>
                  </form>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th> Nombre </th>
                        <th> Apellidos </th>
                        <th> Usuario </th>
                        <th> Email </th>
                        <th> Rol </th>
                        <th> Nivel </th>
                        <?php if ($_SESSION['rol'] == 1) { ?>
                          <th> Opciones </th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                          $nombrerol = '';
                          if ($row['rol'] == 1) {
                            $nombrerol = 'Administrador';
                          } elseif ($row['rol'] == 2) {
                            $nombrerol = 'Alumno';
                          } else {
                            $nombrerol = 'Profesor';
                          }
                          echo "<tr>";
                          echo "<td>" . $row['nombre'] . "</td>";
                          echo "<td>" . $row['apellidos'] . "</td>";
                          echo "<td>" . $row['usuario'] . "</td>";
                          echo "<td>" . $row['email'] . "</td>";
                          echo "<td>" . $nombrerol . "</td>";
                    ?>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar"
                                style="width: <?php echo $row['monedas'] * 10 ?>%" aria-valuenow="<?php echo $row['monedas'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                              <?php
                          if ($_SESSION['rol'] == 1) { ?>
                            <td>
                              <form method="post" action="editar_eliminar_usuario.php">
                                <input type="submit" name="editar" value="Editar" class="btn btn-inverse-primary">
                                <input type="submit" name="eliminar" value="Eliminar" class="btn btn-inverse-danger">
                                <input type="hidden" name="id" value="<?= $row['id']?>" >
                                <input type='hidden' name='objeto' value="<?php echo htmlentities(serialize($row)); ?>" />
                                <input type="button" value="+" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="asignar(<?= $row['id']?>);">
                             </form>
                           </td>
                           <!-- Button trigger modal -->
                         <?php }  echo "</tr>";
                      } //while
                        include('asignar_comportamiento.php');
                      ?>
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
