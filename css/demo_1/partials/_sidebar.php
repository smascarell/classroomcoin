<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="../assets/images/faces/face8.jpg" alt="profile image">
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
          <p class="profile-name">Samuel Mascarell</p>
          <p class="designation">Superusuario</p>
        </div>
      </a>
    </li>
    <li class="nav-item nav-category">Main Menu</li>
    <li class="nav-item">
      <a class="nav-link" href="../../">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <!-- Usuarios -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-usuarios" aria-expanded="false" aria-controls="ui-usuarios">
        <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Usuarios</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-usuarios">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="../usuarios/index.php">Todos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../usuarios/index.php?rol=1">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../usuarios/index.php?rol=2">Alumnos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../usuarios/index.php?rol=3">Profesores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../usuarios/roles.php">Roles</a>
          </li>
        </ul>
      </div>
    </li>
    <!-- Recompensas -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-recompensas" aria-expanded="false" aria-controls="ui-recompensas">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Recompensas</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-recompensas">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="../comportamientos/index.php">Comportamientos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../recompensas/index.php">Recompensas</a>
          </li>
          </li>
        </ul>
      </div>
    </li>
    <!-- Clases -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-clases" aria-expanded="false" aria-controls="ui-clases">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Clases</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-clases">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="../clases">Clases</a>
          </li>
        </ul>
      </div>
    </li>
</ul>
</nav>
