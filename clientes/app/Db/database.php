<?php 
namespace App\Db;
use \PDO;
use \PDOException;
class Database 
{
    //constantes
    const HOST = 'localhost';
    const NAME = 'newm';
    const USER = 'root';
    const PASSWORD = '';
    //atributos
    private $table; // nome da tabela
    private $connection; // vai ser uma instancia do PDO
    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }
    //funcoes especificas do PDO
    private function setConnection(){
        try 
        {             
            $this->connection = new PDO('mysql: host='.self::HOST.';dbname='.self::NAME, self::USER,self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR: ". $e->getMessage());
        }
    }
    public function execute($query, $params = []){ // recebe a query a ser preparada e os parametros
        try 
        {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (\PDOException $e) 
        {
            die('ERROR: '.$e->getMessage());
        }
    }
    //Abstracao de um CRUD com PDO
    public function insert($values){
        //Dados da query
        $fields = array_keys($values);
        $binds = array_pad([], count($values), '?'); // ele pega um array com x posiÃ§Ãµes se o array passado nÃ£o tiver essas posiÃ§Ãµes ele cria pra mim 
        // comentario para testar a lï¿½gica
        // echo '<pre>';
        // print_r( implode(',',$binds));
        // echo '</pre>';
        $query = 'INSERT INTO '.$this->table. ' ('.implode(',', $fields).') VALUES ('.implode(',',$binds).')'; //monta a query
        // print_r($query);
        // exit;
        $this->execute($query, array_values($values));
        return $this->connection->lastInsertId(); //resultado me retorna um id
    }
    public function select($limit = null,$where = null, $order = null, $fields = '*') {
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        //monta 
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        // Descomentar para testar o retorno
        // echo $query;
        // exit;
        // executa
        return $this->execute($query);
    }
    public function update($where, $values){
        $fields = array_keys($values);
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $fields).'=? WHERE '.$where;
        $this->execute($query, array_values($values));
        return true;
    }
    public function delete($where) {
        //Monta a query
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where; 
        //Executa a query
        $this->execute($query);
        //Retorna sucesso
        return true;
    }
}