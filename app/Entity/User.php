<?php

namespace App\Entity;

use App\Database\Connect;

class User
{

    /**
     * Id do usuário
     *
     * @var integer
     */
    public $id;

    /**
     * Nome do usuário
     *
     * @var string
     */
    public $name;

    /**
     * Email do usuário
     *
     * @var string
     */
    public $email;

    /**
     * password do usuário
     *
     * @var string
     */
    public $password;


    public function cadastrarUser()
    {

        $obDatabase = new Connect('user');


        $this->id =  $obDatabase->insert([
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
        ]);
        return true;
    }

    public static function getUser($mail)
    {
        return (new Connect('user'))
        ->select('email = "' .  $mail . '"')
        ->fetchObject(self::class);
    }
}
