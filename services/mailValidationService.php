<?php
function validateEmail ($email){
 $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
 $validEmail = filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL);
    if($validEmail){
        return $validEmail;
    } else {
        throw new Exception('El mail introducido es inválido');
    }
}

?>