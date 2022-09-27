<?php


namespace App\Controller;

use App\Model\ProdutoModel;




/**
 * Classes Controller são responsáveis por processar as requisições do usuário.
 * Isso significa que toda vez que um usuário chama uma rota, um método (função)
 * de uma classe Controller é chamado.
 * O método poderá devolver uma View (fazendo um include), acessar uma Model (para
 * buscar algo no banco de dados), redirecionar o usuário de rota, ou mesmo,
 * chamar outra Controller.
 */
class ProdutoController extends Controller
{
    /**
     * Os métodos index serão usados para devolver uma View.
     */
    public static function index() 
    {
    
        //include 'Model/ProdutoModel.php'; 

        $model = new ProdutoModel();
        $model->getAllRows();

        //include 'View/modules/Produto/ProdutoListar.php';
        parent::render('Produto/ProdutoListar', $model);
    }

   /**
     * Devolve uma View contendo um formulário para o usuário.
     */
    public static function form()
    {
        //include 'Model/ProdutoModel.php'; // inclusão do arquivo model.
        $model = new ProdutoModel();

        if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
            $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
            // Para saber mais sobre Typecast, leia: https://tiago.blog.br/type-cast-ou-conversao-de-tipos-do-php-isso-pode-te-ajudar-muito/
        
        //var_dump( $model); 

        //include 'View/modules/Produto/formProduto.php';
        parent::render('Produto/formProduto', $model);
    }

    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function save() {

       // include 'Model/ProdutoModel.php'; // inclusão do arquivo model.

        // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
        // pelo usuário no formulário (note o envio via POST)
        $produto = new ProdutoModel();
        $produto->id = $_POST['id'];
        $produto->codigo = $_POST['codigo'];
        $produto->descricao = $_POST['descricao'];
        $produto->estoque_min = $_POST['estoque_min'];
        $produto->estoque_max = $_POST['estoque_max'];
        $produto->vencimento = $_POST['vencimento'];
        $produto->id_categoria = $_POST['id_categoria'];

        $produto->save();  // chamando o método save da model.

        header("Location: /produto"); // redirecionando o usuário para outra rota.
    }




     /**
     * Método para tratar a rota delete. 
     */
    public static function delete()
    {
       // include 'Model/ProdutoModel.php'; // inclusão do arquivo model.

        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /produto"); // redirecionando o usuário para outra rota.
    }
}