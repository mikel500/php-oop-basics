<?php
function validatePassword($password)
{
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        throw new Exception("La contraseña debe tener al menos 8 caracteres de longitud y debe contener al menos un número, una letra mayúscula, una letra minúscula y un carácter especial.");
    } else {
        return true;
    }
}
