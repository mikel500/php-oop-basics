<?php
require_once 'config/db.php';
require_once 'services/passwordValidationService.php';
require_once 'services/mailValidationService.php';


class User
{
  private int $id;
  private string $name;
  private string $surname;
  private string $password;
  private string $email;
  private $rol;
  private $image;

  function __construct($name, $surname, $password, $email, $rol, $image)
  {
    $this->setName($name);
    $this->setSurname($surname);
    $this->setEmail($email);
    $this->setPassword($password);
    $this->setRol($rol);
    $this->setImage($image);
  }

  function getId()
  {
    return $this->id;
  }

  function getName()
  {
    return $this->name;
  }

  function getSurname()
  {
    return $this->surname;
  }
  function getEmail()
  {
    return $this->email;
  }
  function getPassword()
  {
    return $this->password;
  }
  function getRol()
  {
    return $this->rol;
  }
  function getImage()
  {
    return $this->image;
  }

  function setName($name)
  {
    if (strlen($name) <= 100) {
      $this->name = $name;
    } else {
      throw new Exception("Introduzca un nombre válido.");
    }
  }

  function setSurname($surname)
  {
    if (strlen($surname) <= 100) {
      $this->surname = $surname;
    } else {
      throw new Exception("Introduzca un apellido válido.");
    }
  }
  function setEmail($email)
  {
    if (strlen($email) <= 100) {
      $validEmail = validateEmail($email);
      if ($validEmail) {
        $this->email = $email;
      }
    }
  }
  function setPassword(string $password)
  {
    if (strlen($password) <= 75) {
      $validPassword = validatePassword($password);
      if ($validPassword) {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
      }
    }
  }
  function setRol($rol)
  {
    if ($rol === 'admin' || $rol === 'user') {
      $this->rol = $rol;
    } else {
      $this->rol = 'user';
    }
  }
  function setImage($image)
  {
    if ($image) {
      $this->image = $image;
    } else {
      $this->image = null;
    }
  }
  function newUser()
  {
    $db = DataBase::connect();
    $query = $db->prepare("INSERT INTO users VALUES (?,?,?,?,?,?,?)");
    $query->bind_param('sssssss', $id, $this->name, $this->surname, $this->email, $this->password, $this->rol, $this->image);
    $id = null;
    $result = $query->execute();
    $db->close();
    return $result;
  }

  function update($id)
  {
    if (is_int($id)) {
      $db = DataBase::connect();
      $query = $db->prepare("UPDATE users SET name=?, surname=?,email=?,password=?,rol=?, image=? WHERE id=?");
      $query->bind_param('ssssssi', $this->name, $this->surname, $this->email, $this->password, $this->rol, $this->image, $id);
      $query->execute();
      $affectedRows = $query->affected_rows;
      $db->close();
      if ($affectedRows === 0) {
        return false;
      } else {
        return true;
      }
    }
  }


  static function delete($id)
  {
    if (is_int($id)) {
      $db = DataBase::connect();
      $query = $db->prepare("DELETE FROM users WHERE id = ?");
      $query->bind_param('i', $id);
      $query->execute();
      $affectedRows = $query->affected_rows;
      $db->close();
      if ($affectedRows === 0) {
        return false;
      } else {
        return true;
      }
    }
  }

  static function getUsers()
  {
    $db = DataBase::connect();
    $sql = "SELECT * FROM users";
    $result = $db->query($sql);
    $db->close();
    return $result;
  }
  static function login($password, $email)
  {
    $validPassword = validatePassword($password);
    $validEmail = validateEmail($email);
    
    if ($validPassword && $validEmail) {
      $db = DataBase::connect();
      $query = $db->prepare("SELECT password,rol FROM users WHERE email=?");
      $query->bind_param('s', $validEmail);
      $query->execute();
      $result = $query->get_result();
      if(!$result->num_rows){
        return false;
      }
      $user = $result->fetch_assoc();
      $userPassword = $user["password"];
      if(password_verify($password, $userPassword)){
        return $user["rol"];
      } else {
        return false;
      }
      $db->close();
    }
  }
}
