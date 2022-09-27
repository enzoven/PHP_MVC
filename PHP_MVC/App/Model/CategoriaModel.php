<?php


namespace App\Model;

use App\DAO\CategoriaDAO;



class CategoriaModel extends Model
{
    /**
     * Propriedades correspondentes aos campos da tabela no banco.
     */


    public $id, $descricao;

    //public $rows;


    /**
     * O metodo save, chamando a DAO, vai gravar os dados preenchidos na
     * model no banco
     */
    public function save()
    {
       // include 'DAO/CategoriaDAO.php';

        $dao = new CategoriaDAO();

        // Se id nao existir, será um novo item e se ja existir deverá atualizar o mesmo
        if(empty($this->id)) 
        {
           
            $dao->insert($this);
        } else {

            $dao->update($this); // Como existe um id, passando o model para ser atualizado.
        }
    }

// metodo que recebe todas as linhas para a listagem
    public function getAllRows()
    {
        //include 'DAO/CategoriaDAO.php';

        $dao = new CategoriaDAO();

        $this->rows = $dao->select();
    }




/**
     * Método que recebe um id para retornar um registro com todos os seus dados
     */
    public function getById(int $id)
    {
       //include 'DAO/CategoriaDAO.php'; // Incluíndo o arquivo DAO

        $dao = new CategoriaDAO();

        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

       
        return ($obj) ? $obj : new CategoriaModel(); // Operador Ternário e substitui o if

        /*Ex.:
        if($obj)
        {
            return  $obj;
        } else {
            return new PessoaModel();
        }*/
    }


    /**
     * Método que recebe um id especifico para deletar o registro correspondente
     */
    public function delete(int $id)
    {
       // include 'DAO/CategoriaDAO.php'; // Incluíndo o arquivo DAO

        $dao = new CategoriaDAO();

        $dao->delete($id);
    }




}