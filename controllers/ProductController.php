<?php

class ProductController
{
    public function index()
    {
        echo "<h1> Hello </h1>";
    }

    public function register()
    {
        require_once 'views/users/register.php';
    }
    public function postUser()
    {
        $register = $_POST["register"];

        if (isset($register) && $register === "register") {
            var_dump($_POST);
        }
    }
}
