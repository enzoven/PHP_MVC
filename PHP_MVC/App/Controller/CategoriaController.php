<?php


namespace App\Controller;

use App\Model\CategoriaModel;


/**
 * Classes Controller recebem requisições e decidem quam view será direcionada
 */
class CategoriaController extends Controller
{
    /**
     * métodos index devolvem uma View.
     */
    public static function index() 
    {
       //include 'Model/CategoriaModel.php'; // incluindo a model.
        
        $model = new CategoriaModel();
        $model->getAllRows();

        parent::render('Categorias/ListaCategorias', $model);
    }

   /**
     * Devolve a view do formulario.
     */
    public static function form()
    {
        //include 'Model/CategoriaModel.php'; // incluindo a model.
        $model = new CategoriaModel();

        if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
            $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
        
        
        //var_dump( $model); -- auxilia a verificar o codigo e os erros   

        parent::render('Categorias/FormCategorias', $model);
    }

    /**
     * Preenche a model e envia para o banco, salvando os dados.
     */
    public static function save() {

        //include 'Model/CategoriaModel.php'; // incluindo a model.

        // Aqui as propriedades do objeto receberam os dados correspondentes
        // do formulario (via POST)
        $categoria = new CategoriaModel();

        $categoria->id = $_POST['id'];     
        $categoria->descricao = $_POST['descricao'];


        $categoria->save();  // método save sendo chamado (model).

        header("Location: /categoria"); // mandando para outra rota.
    }



    /**
     * Método que executa a rota delete. 
     */
    public static function delete()
    {
        //include 'Model/CategoriaModel.php'; // incluindo a model.

        $model = new CategoriaModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o delete (método)

        header("Location: /categoria"); // mandando para outra rota.
    }
}