<!DOCTYPE html>
<html>
<head>
    <title>Produtos Alterados Recentemente</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 0;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 800px; /* largura do contêiner */
        }

        .produto-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .produto-table th,
        .produto-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .produto-table th {
            background-color: #f2f2f2;
        }

        .produto-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .produto-table tr:hover {
            background-color: #ddd;
        }

        .produto-container {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php
    try {
        // Conecta ao banco de dados
        include 'banco.php';

        // Consulta o banco de dados para obter os produtos alterados recentemente
        $stmt = $conn->prepare("SELECT * FROM tb_produtos ORDER BY data_modificacao DESC LIMIT 10"); // Limitando a 10 produtos alterados recentemente
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            echo "<div class='container'>";
            foreach ($result as $produto) {
                echo "<div class='produto-container'>";
                echo "<h3>Código de Barras: " . $produto["codigo_barras"] . "</h3>";
                echo "<table class='produto-table'>";
                echo "<tr><th>Nome</th><td>" . $produto["nome"] . "</td></tr>";
                echo "<tr><th>Última Modificação</th><td>" . $produto["data_modificacao"] . "</td></tr>";
                // Adicione aqui outras informações do produto que deseja exibir
                echo "</table>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "Nenhum produto foi alterado recentemente.";
        }
    } catch(PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
    ?>
</body>
</html>
