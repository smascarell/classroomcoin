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
          $sql = 'SELECT * FROM cursos';
          $result = $db->Query($sql);
          $db->Close();
          ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Roles</h4>
                  <form class="" action="nuevo.php" method="post">
                    <button name="nuevo" type="submit" class="btn btn-success mr-2">Nuevo</button>
                  </form>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th> Nombre </th>
                        <th> Opciones </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                          while ($row = mysqli_fetch_assoc($result)) {
                          echo "<tr>";
                          echo "<td>" . $row['nombre'] . "</td>";
                    ?>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                    <?php
                    if ($_SESSION['rol'] == 1) { ?>
                      <td>
                        <button class="btn btn-inverse-danger" onclick="eliminarRol(rol=<?= $row['id']?>)">Eliminar</button>
                        <button class="btn btn-inverse-primary" onclick="editarRol()">Editar</button>
                     </td>
                <?php }
                      echo "</tr>";
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
  <script src="http://localhost/classroomcoin/js/script.js"></script>

  <!-- endinject -->
</body>

</html>
