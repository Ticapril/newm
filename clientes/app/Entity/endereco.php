<?php 

namespace App\Entity;
use App\Db\Database;

class Endereco {
    private $id;
    private $cidade;
    private $bairro;
    private $rua;
    private $numero;
    private $complemento;
    private $fk_end_cliente;

    public function cadastrar()
    {
        $database = new Database('endereco');
        $this->setId($database->insert(
            [
            'cidade' => $this->cidade, 
            'bairro' => $this->bairro, 
            'rua' => $this->rua, 
            'numero' => $this->numero, 
            'complemento' => $this->complemento,
            'fk_end_cliente' => $this->fk_end_cliente,
            ]
        ));
        return true;
    }
    public function excluir()
    {
        $dbEndereco =  new Database('endereco');
        $dbEndereco->delete('id = '.$this->getId());
    }
    public function atualizar()
    {
        return (new Database('clientes'))->update('id = '.$this->getId(), [
                                                                            'cidade' => $this->cidade, 
                                                                            'bairro' => $this->bairro, 
                                                                            'numero' => $this->numero, 
                                                                            'complemento' => $this->complemento
                                                                          ]);
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
     * Get the value of cidade
     */ 
    public function getCidade()
    {
        return $this->cidade;
    }
    /**
     * Set the value of cidade
     *
     * @return  self
     */ 
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }
    /**
     * Get the value of bairro
     */ 
    public function getBairro()
    {
        return $this->bairro;
    }
    /**
     * Set the value of bairro
     *
     * @return  self
     */ 
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }
    /**
     * Get the value of rua
     */ 
    public function getRua()
    {
        return $this->rua;
    }
    /**
     * Set the value of rua
     *
     * @return  self
     */ 
    public function setRua($rua)
    {
        $this->rua = $rua;
        return $this;
    }
    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }
    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }
    /**
     * Get the value of complemento
     */ 
    public function getComplemento()
    {
        return $this->complemento;
    }
    /**
     * Set the value of complemento
     *
     * @return  self
     */ 
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
        return $this;
    }
    /**
     * Get the value of fk_end_cliente
     */ 
    public function getFk_end_cliente()
    {
        return $this->fk_end_cliente;
    }
    /**
     * Set the value of fk_end_cliente
     *
     * @return  self
     */ 
    public function setFk_end_cliente($fk_end_cliente)
    {
        $this->fk_end_cliente = $fk_end_cliente;
        return $this;
    }
}