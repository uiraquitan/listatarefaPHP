<?php

namespace App\Entity;

use App\Database\Connect;
use DateTime;
use \PDO;

class Tarefas
{

    /**
     * ID DA TAREFA
     *
     * @var integer
     */
    public $id;

    /**
     * ID DA TAREFA
     *
     * @var string
     */
    public $titulo;

    /**
     * DATA DA TAREFA
     *
     * @var int
     */
    public $data;

    /**
     * HORA DA TAREFA
     *
     * @var string
     */
    public $hora;

    /**
     * TAREFA
     *
     * @var string
     */
    public $tarefa;

    public function atualizar()
    {
        return (new Connect('tbtarefas'))->update([
            "titulo" => $this->titulo,
            "data" => $this->data,
            "hora" => $this->hora,
            "tarefa" => $this->tarefa
        ], $this->id);
    }


    /**
     * Método responsável por cadastrar tarefa
     *
     * @return boolean
     */
    public function cadastrar()
    {
        $db = new Connect('tbtarefas');
        $this->id = $db->insert([
            'titulo' => $this->titulo,
            'data' => $this->data,
            'hora' => $this->hora,
            'tarefa' => $this->tarefa
        ]);
        return true;
    }

    /**
     * Método responsável por listar todas as tarefas
     * @return array
     */
    public static function getTarefas($where = null, $order = null, $offset = null)
    {
        return (new Connect('tbtarefas'))
            ->select($where, $order, $offset)
            ->fetchAll(PDO::FETCH_CLASS);
    }


    /**
     * Método responsável por bucar um resultado
     *
     * @param integer $id
     * @return string
     */
    public static function getQuantityTarefa()
    {
        return (new Connect('tbtarefas'))
            ->select()
            ->fetchObject();
    }

    /**
     * Método responsável por listar todas as tarefas
     */
    public static function getTarefa($id)
    {
        return (new Connect('tbtarefas'))
            ->select('id = ' . $id)
            ->fetchObject(self::class);
    }

    /**
     * Método responspavel por nao deletar, mas ocultar,
     * este método ele altera de null e insere uma data 
     * onde o dado não é deltado, mas é ocultado
     *
     * @param [type] $id
     * @return void
     */
    public static function getDelTarefa($id)
    {

        $date = date("Y-m-d H:i:s");

        return (new Connect('tbtarefas'))->update(['deleted_at' => $date], $id);
    }
}
