<?php
date_default_timezone_set('UTC');
require __DIR__ . "/vendor/autoload.php";

use App\Database\Connect;
use App\Entity\Tarefas;
use App\Session\Login;

Login::requiredLogged();

$list = Tarefas::getTarefas("deleted_at is null");



include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/home.php";
include __DIR__ . "/includes/footer.php";
