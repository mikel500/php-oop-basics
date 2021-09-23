<?php

require_once 'models/UserModel.php';

class UserController
{
  public function getUsers()
  {
    if ($_GET) {
      $users = User::getUsers();
      require_once 'views/users/users.php';
    }
  }

  public function putUser()
  {
    if ($_POST["edit"]) {
      $u = $_POST;
      $id = intval($_POST["edit"]);
      try {
        $user = new User($u["name"], $u["surname"], $u["password"], $u["email"], '', '');
        $result = $user->update($id);
        if (!$result) {
          throw new Exception("Se ha producido un error al intentar actualizar el usuario.");
        } else {
          $_SESSION["success_msg"] = 'Se ha actualizado el usuario correctamente.';
        }
      } catch (TypeError $e) {
        $_SESSION["error_msg"] = 'Introduzca un valor válido en todos los campos.';
      } catch (Exception $e) {
        $_SESSION["error_msg"] = $e->getMessage();
      }
      header("location:getUsers");
      exit();
    }
  }

  public function deleteUser()
  {
    if ($_POST["delete"]) {
      $id = intval($_POST["delete"]);
      $result = User::delete($id);
      if (!$result) {
        $_SESSION["message"] = "Se ha producido un error al intentar borrar el usuario.";
      }
      header("location:getUsers");
      exit();
    }
  }

  public function register()
  {
    require_once 'views/users/register.php';
  }
  public function postUser()
  {
    if (isset($_POST)) {
      $u = $_POST;
      if ($u["register"] === "register") {
        try {
          $user = new User($u["name"], $u["surname"], $u["password"], $u["email"], '', '');
          $result = $user->newUser();
          if (!$result) {
            throw new Exception('El usuario no se ha registrado.');
          } else {
            $message = 'El usuario se ha registrado con éxito';
          }
        } catch (TypeError $e) {
          $message = 'Introduzca un valor válido en todos los campos.';
        } catch (Exception $e) {
          $message = $e->getMessage();
        }
        require_once 'views/users/register.php';
      }
    }
  }
  public function login (){
    if(isset($_POST)){
      $login = User::login();
      //pendiente//
    }
  }
}
