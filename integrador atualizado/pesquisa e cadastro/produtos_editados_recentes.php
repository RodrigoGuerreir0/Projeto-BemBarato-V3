<!DOCTYPE html>
<html>

<head>
    <title>Produtos Alterados Recentemente</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: auto;
            padding-top: 2vh;
            padding-bottom: 2vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 0;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fff;
        }

        .container {
            width: 800px;
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
            background-color: #2196f3;
            color: #fff;
        }

        .produto-table tr:nth-child(even) {
            background-color: #1565c0;
            color: #fff;
        }

        .produto-table tr:hover {
            background-color: #ddd;
        }

        .produto-container {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        @media only screen and (max-width: 800px) {
            .container {
                width: 90%;
            }

            .produto-table th,
            .produto-table td {
                padding: 4px;
            }
        }

        @media only screen and (max-width: 600px) {
            .container {
                width: 90%;
            }

            .produto-table th,
            .produto-table td {
                padding: 4px;
            }
        }

        @media only screen and (max-width: 400px) {
            .container {
                width: 90%;
            }

            .produto-table th,
            .produto-table td {
                padding: 4px;
            }
        }
    </style>
</head>

<body>
    <?php
    try {
        include 'banco.php';

        $stmt = $conn->prepare("SELECT * FROM tb_produtos ORDER BY data_modificacao DESC LIMIT 10");
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
                echo "</table>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "Nenhum produto foi alterado recentemente.";
        }
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
    ?>
</body>

</html>