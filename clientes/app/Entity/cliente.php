<?php 

namespace App\Entity;

use \PDO;
use App\Db\Database;

class Cliente {
    private $id;
    private $nome;
    private $data_nascimento;
    private $cpf;
    private $celular;
    private $email;
    private $observacao;

    public function cadastrar(){
        //inserir a vaga no banco
        $database = new Database('clientes');
        // descomentar para testar a lógica da função
        // echo '<pre>';
        // print_r($database);
        // echo '</pre>';
        $this->setId($database->insert([
           'nome' => $this->nome, 
           'data_nascimento' => $this->data_nascimento, 
           'cpf' => $this->cpf, 
           'celular' => $this->celular, 
           'email' => $this->email, 
           'observacao' => $this->observacao, 
        ]));
        // descomentar para testar a lógica da função
        // echo '<pre>';
        // print_r($this);
        // echo '</pre>';
        return true;
    }
    public function atualizar()
    {
        return (new Database('clientes'))->update('id = '.$this->getId(), [
                                                                            'nome' => $this->nome, 
                                                                            'data_nascimento' => $this->data_nascimento, 
                                                                            'cpf' => $this->cpf, 
                                                                            'celular' => $this->celular, 
                                                                            'email' => $this->email, 
                                                                            'observacao' => $this->observacao, 
                                                                          ]);
    }
    public function atualizaEndereco($cidade,$bairro,$rua,$numero,$complemento)
    {
        return (new Database('endereco'))->update('fk_end_cliente = '.$this->getId(), [
                                                                            'cidade' => $cidade,
                                                                            'bairro' => $bairro, 
                                                                            'rua' => $rua,
                                                                            'numero' => $numero, 
                                                                            'complemento' => $complemento, 
                                                                          ]);
    }
    public function excluirCliente()
    {
        //Excluo o cliente
        $dbClient =  new Database('clientes');
        $dbClient->delete('id = '.$this->getId());
      
    }
    public function excluirEndereco($id)
    {
        //Excluo o cliente
        $dbClient =  new Database('endereco');
        $dbClient->delete('id = '.$id);
      
    }
    public static function getClientes($limit = null, $where = null, $order = null)
    {
        return (new Database('clientes'))->select($limit, $where, $order)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function getCliente($id)
    {
        return (new Database('clientes'))->select(1,'id = '.$id)->fetchObject(self::class);
    }
    public static function getEnderecoCliente($id)
    {
        return (new Database('endereco'))->select(1,'fk_end_cliente = '.$id)->fetchObject(self::class);
    }

    //Getters and Setters
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }
    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
    /**
     * Get the value of data_nascimento
     */ 
    public function getData_nascimento()
    {
        return $this->data_nascimento;
    }
    /**
     * Set the value of data_nascimento
     *
     * @return  self
     */ 
    public function setData_nascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
        return $this;
    }
    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }
    /**
     * Set the value of cpf
     *
     * @return  self
     */ 
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }
    /**
     * Get the value of celular
     */ 
    public function getCelular()
    {
        return $this->celular;
    }
    /**
     * Set the value of celular
     *
     * @return  self
     */ 
    public function setCelular($celular)
    {
        $this->celular = $celular;
        return $this;
    }
    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get the value of observacao
     */ 
    public function getObservacao()
    {
        return $this->observacao;
    }
    /**
     * Set the value of observacao
     *
     * @return  self
     */ 
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
        return $this;
    }
}