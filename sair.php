<?php
require __DIR__ . "/vendor/autoload.php";

use App\Entity\Tarefas;
use App\Session\Login;

/**
 * RECEBENDO dados para sair
 */

Login::logout();
