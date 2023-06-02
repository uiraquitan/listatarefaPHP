<?php

$message = '';
if (isset($_GET['msg'])) {

    switch ($_GET['msg']) {
        case 'cad':
            $message = "<p class='success'>Cadastrado com sucesso</p>";
            break;
        case 'edit':
            $message = "<p class='success'>Editado com Sucesso</p>";
            break;
        case 'err':
            $message = "<p class='danger'>Error: Verifique os dados</p>";
            break;
        case 'del':
            $message = "<p class='danger'>Deletado com Sucesso</p>";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="./includes/assets/style.css">
</head>

<body>
    <header class="header">
        <div class="main_header">
            <div class="main_header_logo">
                <a href="./">
                    <h1>Lista de tarefas</h1>
                </a>
            </div>
            <nav class="main_header_nav">
                <ul>
                    <li><a href="./" title="Lista">Lista</a></li>
                    <li><a href="adicionartarefa.php" title="Adicionar">
                            <span class="material-symbols-outlined">
                                add
                            </span>
                        </a>
                    </li>
                    <li><a href="login.php" title="Fazer Login">
                            <span class="material-symbols-outlined">
                                login
                            </span>
                        </a>
                    </li>
                    <li><a href="sair.php" title="Sair">
                            <span class="material-symbols-outlined">
                                logout
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main">


        <div class="main_home">