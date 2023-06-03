<?php

namespace App\Session;

class Login
{


    public static function logout()
    {
        self::init();
        unset($_SESSION['usuario']);
        header('location: login.php');
        exit;
    }

    /**
     * Undocumented function
     *
     * @param [type] $user
     * @return void
     */
    public static function login($user)
    {
        self::init();

        $_SESSION['usuario'] = [
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email
        ];
        header('location: index.php');
        exit;
    }

    /**
     * Método responsável por iniciar a sessão
     */
    private static function init()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * Método responsável por verificar se o usuário está logado
     */
    private static function isLogged()
    {
        self::init();

        return isset($_SESSION['usuario']['id']);
    }

    /**
     * Método responsável por obrigar o usuário a se logar
     */
    public static function requiredLogged()
    {
        if (!self::isLogged()) {
            header('location: login.php');
            exit;
        }
    }

    /**
     * Força o usuário a não estar logado
     */
    public static function requiredLoggout()
    {
        self::init();

        if (self::isLogged()) {
            header('location: index.php');
            exit;
        }
    }
}
