<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/produto/save" method="post">
        <fieldset>
            <legend>Cadastro de Produtos</legend>
            <input name="id" id="id" type="hidden" value="<?= $model->id ?>" />

            <label for="codigo">Codigo:</label>
            <input name="codigo" id="codigo" type="number"  value="<?= $model->codigo ?>"/>

            <label for="descricao">Descricao:</label>
            <input name="descricao" id="descricao" type="text" value="<?= $model->descricao ?>"/>

            <label for="estoque_min">Estoque minimo:</label>
            <input name="estoque_min" id="estoque_min" type="text" value="<?= $model->estoque_min ?>" />

            <label for="estoque_max">Estoque maximo:</label>
            <input name="estoque_max" id="estoque_max" type="text" value="<?= $model->estoque_max ?>"/>

            <label for="vencimento">Vencimento:</label>
            <input name="vencimento" id="vencimento" type="date" value="<?= $model->vencimento ?>"/>

            <label for="id_categoria">Categoria:</label>
            <input name="id_categoria" id="id_categoria" type="number" value="<?= $model->id_categoria ?>"/>


            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>