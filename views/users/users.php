<section class="py-5">
  <div class="overflow-auto mx-5">
    <div class="users-table mx-auto">
      <h1 class="my-5">Lista de usuarios</h1>
      <table class="table bg-light shadow-sm rounded">
        <thead>
          <tr>
            <th> ID </th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Contraseña</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Imagen</th>
            <th class="text-center">Editar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $key => $user) : ?>
            <tr>
              <td><strong class="d-flex align-items-center"><?= $user["id"] ?></strong></td>
              <form id="user_form_<?= $key ?>" action="<?= base_url ?>user/putUser" method="POST" enctype="multipart/form-data">
                <td>
                  <input class="form-control" type="text" name="name" value=<?= $user["name"] ?>>
                </td>
                <td><input class="form-control" type="text" name="surname" value=<?= $user["surname"] ?>></td>
                <td><input class="form-control" type="password" name="password" value=<?= $user["password"] ?>></td>
                <td><input class="form-control" type="email" name="email" value=<?= $user["email"] ?>></td>
                <td><input class="form-control" type="rol" name="rol" value=<?= $user["rol"] ?>></td>
                <td>
                  <label class="btn btn-primary">
                    <img style="width:18px;" src=" assets/img/upload.svg" alt="Añadir Archivo">
                    <input type="file" style="display:none;" name="image" value=<?= $user["image"] ?>>
                  </label>
                </td>
              </form>
              <td>
                <div class="d-flex align-items-center justify-content-between" style="height:50px">
                  <button type="submit" form="user_form_<?= $key ?>" class="btn" name="edit" value=<?= $user["id"] ?>>
                    <img style="width:18px;" src="assets/img/pencil.svg" alt="Editar">
                  </button>
                  <form action="<?= base_url ?>user/deleteUser" method="POST">
                    <button type="submit" class="btn btn-danger" name="delete" value=<?= $user["id"] ?>>
                      <img style=" width:18px;" src="assets/img/trash.svg" alt="Borrar">
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php if (isset($_SESSION["success_msg"])) : ?>
      <p class="text-success fs-5"><?= $_SESSION["success_msg"] ?></p>
    <?php endif; ?>
    <?php if (isset($_SESSION["error_msg"])) : ?>
      <p class="text-danger fs-5"><?= $_SESSION["error_msg"] ?></p>
    <?php endif; ?>
  </div>
</section>