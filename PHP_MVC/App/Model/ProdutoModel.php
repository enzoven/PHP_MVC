<?php


namespace App\Model;

use App\DAO\ProdutoDAO;



class ProdutoModel extends Model
{
    /**
     * Declaração das propriedades conforme campos da tabela no banco de dados.
     */
    public $id, $codigo, $descricao;
    public $estoque_min, $estoque_max;
    public $vencimento, $id_categoria;

    //public $rows;

    /**
     * Declaração do método save que chamará a DAO para gravar no banco de dados
     * o model preenchido.
     */
    public function save()
    {
        //include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        // Se id for nulo, significa que trata-se de um novo registro
        // caso contrário, é um update poque a chave primária já existe.
        if(empty($this->id)) 
        {
            // No que estamos enviado o proprio objeto model para o insert, por isso do this
            $dao->insert($this);
        } else {
            $dao->update($this); // Como existe um id, passando o model para ser atualizado.
        }
    
    }

    public function getAllRows()
    {
        //include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        $this->rows = $dao->select();
    }


    public function getById(int $id)
    {
        //include 'DAO/ProdutoDAO.php'; // Incluíndo o arquivo DAO

        $dao = new ProdutoDAO();

        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        // Para saber mais operador ternário, leia: https://pt.stackoverflow.com/questions/56812/uso-de-e-em-php
        return ($obj) ? $obj : new ProdutoModel(); // Operador Ternário e substitui o if

        /*if($obj)
        {
            return  $obj;
        } else {
            return new PessoaModel();
        }*/
    }



    /**
     * Método que encapsula o acesso a DAO do método delete.
     * O método recebe um parâmetro do tipo inteiro que é o id do registro
     * que será excluido da tabela no MySQL, via camada DAO.
     */
    public function delete(int $id)
    {
       // include 'DAO/ProdutoDAO.php'; // Incluíndo o arquivo DAO

        $dao = new ProdutoDAO();

        $dao->delete($id);
    }


}