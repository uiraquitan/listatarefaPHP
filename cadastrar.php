<?php

require __DIR__ . "/vendor/autoload.php";

use App\Entity\User;
use App\Session\Login;

Login::requiredLoggout();

$cadastrar = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($cadastrar)) {

    $obCadastro = User::getUser($cadastrar['email']);

    // VERIFICANDO SE O E-MAIL JA ESTÁ  CADASTRADO NA BASE DE DADOS

    if ($cadastrar['email'] === $obCadastro->email) {
        header('location: cadastrar.php?msg=cadusererr');
        exit;
    }
}

if (!empty($cadastrar)) {
    $obCadastro = new User;
    $obCadastro->name = $cadastrar['name'];
    $obCadastro->email = $cadastrar['email'];
    $obCadastro->password = password_hash($cadastrar['password'], PASSWORD_BCRYPT);
    $obCadastro->cadastrarUser();
    header('location: login.php?msg=caduser');
    exit;
}

include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/cadastrar.php";
include __DIR__ . "/includes/footer.php";
