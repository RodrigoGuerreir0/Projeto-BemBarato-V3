<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Pesquisar Produto</title>
    
</head>
<body>
    <div class="container">
        <h2>Pesquisar e Cadastro</h2>
        <form action="editar_produto.php" method="post">
            <label for="codigo_barras">Código de Barras:</label><br>
            <input type="text" id="codigo_barras" name="codigo_barras"><br><br>
            <input class="button" type="submit" value="Pesquisar">
            
            
        </form>
        <br>
        <a href='cadastrar_produto.php' class='button'>Cadastrar Novo Produto</a>
    </div>
</body>
</html>
