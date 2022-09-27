<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/produto/save" method="post">
        <fieldset>
            <legend>Cadastro de Produtos</legend>
            <label for="codigo">Codigo:</label>
            <input name="codigo" id="codigo" type="number" />

            <label for="descricao">Descricao:</label>
            <input name="descricao" id="descricao" type="text" />

            <label for="estoque_min">Estoque minimo:</label>
            <input name="estoque_min" id="estoque_min" type="text" />

            <label for="estoque_max">Estoque maximo:</label>
            <input name="estoque_max" id="estoque_max" type="text" />

            <label for="vencimento">Vencimento:</label>
            <input name="vencimento" id="vencimento" type="vencimento" />

            <label for="id_categoria">Categoria:</label>
            <input name="id_categoria" id="id_categoria" type="number" />


            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>