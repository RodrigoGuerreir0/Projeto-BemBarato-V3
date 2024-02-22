<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Editar e Cadastrar Produto</title>
  
</head>
<style>
    body {
    background-color: #1565c0;
    color: #fff;
    font-family: Arial, sans-serif;
}

.container {
    background-color: #2196f3;
    padding: 20px;
    border-radius: 10px;
}

.button {
    background-color: #fff;
    color: #2196f3;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #1565c0;
    color: #fff;
}

.alert {
    background-color: #ff0000;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-align: center;
    margin-bottom: 20px;
}

.Title{
    color: #fff;
}

</style>
<body>

    <div class="container">
        <h2 class="Title">Editar e Cadastrar Produto</h2>

        <?php
        session_start(); // Inicia a sessão
        // Verifica se há uma mensagem de sucesso na sessão
        if(isset($_SESSION['success_message'])) {
            // Exibe o alerta
            echo '<div id="alert" class="alert">' . $_SESSION['success_message'] . '</div>';

            // Remove a mensagem da sessão para que ela não seja exibida novamente
            unset($_SESSION['success_message']);
        }
        ?>

        <form action="editar_produto.php" method="post">
            <label for="codigo_barras">Código de Barras:</label><br><br>
            <input type="text" id="codigo_barras" name="codigo_barras" required><br><br>
            <input class="button" type="submit" value="Editar">        
        </form>
        <br>
        <a href='cadastrar_produto.php' class='button'>Cadastrar Novo Produto</a>
        <br><br>

        
        <!-- Botão para Alterações -->
        <form action="produtos_editados_recentes.php" method="get">
            <input class="button" type="submit" value="Alterações"><br><br>
        </form>
        
        <!-- Botão Sair -->
        <a id="sairButton" href="index.php" style="background-color: #ff0000; color: #ffffff; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Sair</a>
        
    </div>

    <script>
        // Mostrar o alerta
        var alertBox = document.getElementById("alert");
        if (alertBox) {
            alertBox.style.display = "block";
            // Esconder o alerta após 3 segundos
            setTimeout(function(){
                alertBox.style.display = "none";
            }, 3000);
        }
    </script>
   
</body>
</html>
