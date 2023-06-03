<?php
require __DIR__ . "/vendor/autoload.php";

use App\Entity\Tarefas;
use App\Session\Login;

Login::requiredLogged();

$mensagem = '';
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$dadosValid = is_array($dados) ? $dados : null;

$tarefa = new Tarefas;

/**
 * VALIDANDO O CAMPO TÍTULO
 */
if ($dadosValid) {
    if (!empty($dadosValid)) {
        $tarefa->titulo = $dadosValid['titulo'];
        $tarefa->data = $dadosValid['data'];
        $tarefa->hora = $dadosValid['hora'];
        $tarefa->tarefa = $dadosValid['tarefa'];
        $tarefa->cadastrar();
        header('location: index.php?msg=cad');
        exit;
    } else {
        $mensagem = "Por favor Preencha todos os campos";
        header('location: adicionartarefa.php?msg=err');
        exit;
    }
}


include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/cadastrartarefas.php";
include __DIR__ . "/includes/footer.php";
