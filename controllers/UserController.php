<?php

require_once 'models/UserModel.php';

class UserController
{
  public function register()
  {
    require_once 'views/users/register.php';
  }

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
        $user = new User($u["name"], $u["surname"], $u["password"], $u["email"], $u["rol"], '');
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
      header("location:http://localhost/store-php/user/getUsers");
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
      header("location:http://localhost/store-php/user/getUsers");
      exit();
    }
  }

  public function postUser()
  {
    if (isset($_POST)) {
      $u = $_POST;
      if (isset($u["terms"]) && $u["terms"] === 'accepted') {
        try {
          $user = new User($u["name"], $u["surname"], $u["password"], $u["email"], '', '');
          $result = $user->newUser();
          if (!$result) {
            throw new Exception('El usuario no se ha registrado.');
          } else {
            $_SESSION["success_msg"] = 'El usuario se ha registrado con éxito';
          }
        } catch (TypeError $e) {
          $_SESSION["error_msg"] = 'Introduzca un valor válido en todos los campos.';
        } catch (Exception $e) {
          $_SESSION["error_msg"] = $e->getMessage();
        }
      } else {
        $_SESSION["error_msg"] = 'Debe aceptar los términos y condiciones.';
      }
      header("location:http://localhost/store-php/user/register");
      exit();
    }
  }
  public function login()
  {
    if (isset($_POST)) {
      try {
        $login = User::login($_POST["password"], $_POST["email"]);
        if ($login) {
          $_SESSION["login"] = $login;
          echo json_encode(["code" => 200, "message" => "Autentificación correcta"]);
        } else {
          http_response_code(401);
          echo json_encode(["code" => 401, "error_message" => "Los datos introducidos no son válidos"]);
        }
      } catch (Exception $e) {
        http_response_code(401);
        echo json_encode(["code" => 401, "error_message" => $e->getMessage()]);
      }
    }
  }
  public function logout()
  {
    unset($_SESSION["login"]);
    header("Location:http://localhost/store-php/");
  }
}
