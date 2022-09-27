<?php

namespace App\DAO;

use App\Model\ProdutoModel;
use \PDO;


/**
 * As classes DAO (Data Access Object) são responsáveis por executar os
 * SQL junto ao banco de dados.
 */
class ProdutoDAO extends DAO
{


   
    
    public function __construct()
    {
        /**
         * Chamando o construtor da classe DAO, isto é, toda vez que chamos o consturo da classe DAO
         * estamos fazendo a conexão com o banco de dados.
         */
        parent::__construct();       
    }





    //function __construct() 
    //{
        // DSN (Data Source Name) onde o servidor MySQL será encontrado
        // (host) em qual porta o MySQL está operado e qual o nome do banco pretendido. 
      //  $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
       // $user = "root";
       // $pass = "etecjau";
        
        // Criando a conexão e armazenado na propriedade definida para tal.
      //  $this->conexao = new PDO($dsn, $user, $pass);
   // }


    /**
     * Método que recebe um model e extrai os dados do model para realizar o insert
     * na tabela correspondente ao model. Note o tipo do parâmetro declarado.
     */
    function insert(ProdutoModel $model) 
    {
        // Trecho de código SQL com marcadores ? para substituição posterior, no prepare   
        $sql = "INSERT INTO produtos
                (codigo, descricao, estoque_min, estoque_max, vencimento, id_categoria) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        // Declaração da variável stmt que conterá a montagem da consulta. Observe que
        // estamos acessando o método prepare dentro da propriedade que guarda a conexão
        // com o MySQL, via operador seta "->". Isso significa que o prepare "está dentro"
        // da propriedade $conexao e recebe nossa string sql com os devidor marcadores.
        $stmt = $this->conexao->prepare($sql);

        // Nesta etapa os bindValue são responsáveis por receber um valor e trocar em uma 
        // determinada posição, ou seja, o valor que está em 3, será trocado pelo terceiro ?
        // No que o bindValue está recebendo o model que veio via parâmetro e acessamos
        // via seta qual dado do model queremos pegar para a posição em questão.
        $stmt->bindValue(1, $model->codigo);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->estoque_min);
        $stmt->bindValue(4, $model->estoque_max);
        $stmt->bindValue(5, $model->vencimento);
        $stmt->bindValue(6, $model->id_categoria);


        
        // Ao fim, onde todo SQL está montando, executamos a consulta.
        $stmt->execute();      
    }



   public function update(ProdutoModel $model)
   {
       $sql = "UPDATE produtos SET codigo=?, descricao=?, estoque_min=?, estoque_max=?, vencimento=?, id_categoria=?  WHERE id=? ";

       $stmt = $this->conexao->prepare($sql);
       $stmt->bindValue(1, $model->codigo);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->estoque_min);
        $stmt->bindValue(4, $model->estoque_max);
        $stmt->bindValue(5, $model->vencimento);
        $stmt->bindValue(6, $model->id_categoria);
        $stmt->bindValue(7, $model->id);

       
       $stmt->execute();
   }



    public function select()
    {
        $sql = "SELECT * FROM produtos ";

       $stmt = $this->conexao->prepare($sql);
       $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }


    public function selectById(int $id)
    {
        //include_once 'Model/ProdutoModel.php';

        $sql = "SELECT * FROM produtos WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\ProdutoModel"); // Retornando um objeto específico PessoaModel
    }

    /**
     * Remove um registro da tabela pessoa do banco de dados.
     * Note que o método exige um parâmetro $id do tipo inteiro.
     */
    public function delete(int $id)
    {
        $sql = "DELETE FROM produtos WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

}