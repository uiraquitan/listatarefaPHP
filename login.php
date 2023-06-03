<?php

require __DIR__ . "/vendor/autoload.php";

use App\Entity\User;
use App\Session\Login;

Login::requiredLoggout();

$login = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($login)) {

    $obUsuario = User::getUser($login['email']);

    if (!$obUsuario instanceof User || !password_verify($login['password'], $obUsuario->password)) {
        header('location: login.php?msg=logusererr');
        exit;
    }

    Login::login($obUsuario);
}



include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/login.php";
include __DIR__ . "/includes/footer.php";
