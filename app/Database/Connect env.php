<?php

namespace App\Database;

use \PDO;
use \PDOException;
use PDOStatement;

class Connect
{

    /**
     * HOST DE CONEXÂO
     * @var string
     */
    const HOST = '';

    /**
     * HOST DE CONEXÂO
     * @var string
     */
    const USER = '';

    /**
     * HOST DE CONEXÂO
     * @var string
     */
    const PASS = '';

    /**
     * HOST DE CONEXÂO
     * @var string
     */
    const DBNAME = '';

    /**
     * Nome da table ao ser manipulada
     *
     * @var string
     */
    private $table;

    /**
     * Undocumented variable
     *
     * @var PDO
     */
    private $connection;


    /**
     * Define a tabela e instancia a conexão
     *
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection()
    {
        try {

            $this->connection = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DBNAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro ao conectar";
        }
    }

    /**
     * Método responsável por execurar a query no banco
     *
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute(string $query, $params = [])
    {

        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            echo "erro ao executar";
        }
    }

    /**
     * Insere dados dentro do banco
     *
     * @param array $value
     * @return integer ID inserido
     */
    public function insert(array $value): ?int
    {

        $field = implode(', ', array_keys($value));
        $values = implode(', ', array_pad([], count(array_keys($value)), '?'));
        $query = "INSERT INTO " . $this->table . " (" . $field . ") VALUES (" . $values . ")";
        $this->execute($query, array_values($value));
        return $this->connection->lastInsertId();
    }


    /**
     * Undocumented function
     *
     * @param string|null $where
     * @param string $order
     * @param string $offset
     * @return PDOStatement
     */
    public function select(string $where = null, string $order = null, string $offset = null)
    {
        $where = mb_strlen($where) ? "WHERE " . $where : "";
        $order = mb_strlen($order) ? "ORDER BY " . $order : "";
        $offset = mb_strlen($offset) ? "LIMIT " . $offset : "";
        $query = "SELECT * FROM " . $this->table . " " . $where . " " . $order . " " . $offset;
        var_dump($query);
        return $this->execute($query);
    }


    /**
     * Método responsável por atualizar no banco as tarefas
     *
     * @param array $where
     * @param string $id
     */
    public function update(array $where, $id)
    {

        $field = implode("= ?, ", array_keys($where));
        $params = array_values($where);

        $query = "UPDATE " . $this->table . " SET " . $field . "= ? WHERE id = '" . $id . "'";
        var_dump($field);
        return $this->execute($query, $params);
    }
}
