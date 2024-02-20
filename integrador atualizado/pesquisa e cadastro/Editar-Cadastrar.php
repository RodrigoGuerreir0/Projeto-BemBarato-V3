<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Editar e Cadastrar Produto</title>
  
</head>
<body>

    <div class="container">
        <h2>Editar e Cadastrar Produto</h2>

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
            <label for="codigo_barras">Código de Barras:</label><br>
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
