  <header id="header" class="bg-light">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <img src="assets/img/t-shirt.svg" alt="Tienda de camisetas" style="width:28px;">
          John Smith
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav px-1">
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
          </ul>
          <?php if (!isset($_SESSION["login"])) : ?>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login-modal">Entrar</button>
            <a class="btn btn-success ms-2" href="user/register">Registrarse</a>
          <?php else : ?>
            <div class="dropdown">
              <button class="btn btn-outline-light dropdown-toggle p-0" type="button" data-bs-toggle="dropdown">
                <img src="assets/img/user.svg" style="width:32px">
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <?php if ($_SESSION["login"] === 'user') : ?>
                  <li><a class="dropdown-item" href="#">Mis pedidos</a></li>
                <?php else : ?>
                  <li><a class="dropdown-item" href="user/getUsers">Usuarios</a></li>
                  <li><a class="dropdown-item" href="#">Productos</a></li>
                <?php endif; ?>
                <li>
                  <form id="logout" action="<?= base_url ?>user/logout" method="POST">
                    <button class="dropdown-item" href="#">Salir</a>
                  </form>
                </li>
              </ul>
            </div>
          <?php endif; ?>
        </div>
      </nav>
    </div>
  </header>
  <main class="flex-shrink-0">
    <?php
    if (!isset($_SESSION["rol"])) :
      require_once 'views/users/login-modal.php';
    endif;
    ?>