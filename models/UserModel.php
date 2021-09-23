<?php
require_once 'config/db.php';
require_once 'services/passwordValidationService.php';

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
    $this->name = $name;
  }

  function setSurname($surname)
  {
    $this->surname = $surname;
  }
  function setEmail($email)
  {
    $this->email = $email;
  }
  function setPassword(string $password)
  {
    $validPassword = validatePassword($password);
    if ($validPassword) {
      $this->password = password_hash($password, PASSWORD_BCRYPT);
    }
  }
  function setRol($rol)
  {
    if ($rol === 'admin' || $rol === 'user') {
      $this->rol = $rol;
    } else {
      $this->rol = null;
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
    $sql = "INSERT INTO users VALUES(
            NULL,
            '$this->name',
            '$this->surname',
            '$this->email',
            '$this->password',
            '$this->rol',
            '$this->image'
        )";
    $db = DataBase::connect();
    $result = $db->query($sql);
    return $result;
  }

  function update($id)
  {
    if (is_int($id)) {
      $db = DataBase::connect();
      $query = $db->prepare("UPDATE users SET name=?, surname=?,email=?,password=?,rol=?, image=? WHERE id=?");
      $query->bind_param('ssssssi', $this->name, $this->surname, $this->email, $this->password, $this->rol, $this->image, $id);
      $query->execute();
      if ($query->affected_rows === 0) {
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
      if ($query->affected_rows === 0) {
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
    return $result;
  }
  static function login(){
    //pendiente
  }
}
