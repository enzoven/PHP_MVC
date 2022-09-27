<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//echo $uri_parse;
//echo "<hr />";

include 'config.php';

//incluindo todas os arquivos da controller que irão direcionar as views (rotas)
include 'Autoload.php';

use App\Controller\
{
    CategoriaController,
    PessoaController,
    ProdutoController,

};



include 'Controller/PessoaController.php';
include 'Controller/ProdutoController.php';
include 'Controller/CategoriaController.php';

//vai realizar as tentativas para direcinar a rota pedida
switch($uri_parse)
{
    case '/pessoa':
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/save':
        PessoaController::save();
    break;

    case '/pessoa/delete':
        PessoaController::delete();
    break;

    
    case '/formulario':
        include 'View/udy.php';
    break;

    case '/processa':
        echo "vai pegar o que o usuário digitou <br />";
        echo $_POST['nome'];
        echo "<br />";
       var_dump($_POST);
    break;
    






   
/** Parte de produto */

case '/produto':
    ProdutoController::index();
break;

case '/produto/form':
    ProdutoController::form();
break;

case '/produto/save':
    ProdutoController::save();
break;

case '/produto/delete':
    ProdutoController::delete();
break;




case '/formProduto':
    include 'View/Produto.php';
break;

case '/processa':
   echo "vai pegar o que o usuário digitou <br />";
    echo $_POST['nome'];
    echo "<br />";
   var_dump($_POST);
break;

case '/produto':
    echo "listar produtos";
break;

case '/produto/ver':
    echo "ver detalhes de produto";
break;

case '/produto/delete':
    echo "remover produto";
break;

case '/produto/salvar':
    echo "salva no banco de dados";
break;
    



//listagem de categorias
    case '/categoria':
        CategoriaController::index();
    break;

    //formulario de categorias
    case '/categoria/form':
        CategoriaController::form();
    break;

    //chamando o metodo save de categorias
    case '/categoria/save':
        CategoriaController::save();
    break;

    //chamando o metodo delete de categorias
    case '/categoria/delete':
        CategoriaController::delete();
    break;

    case '/formulario':
        include 'View/Categorias.php';
    break;

    case '/processa':
        echo "vai pegar o que o usuário digitou <br />";
       echo $_POST['descricao'];
       echo "<br />";
       var_dump($_POST);
   break;





//erro caso o switch não entre em nenhuma das rotas
default:
    echo "erro 404";
break;
    }
