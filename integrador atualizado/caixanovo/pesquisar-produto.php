<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Pesquisa de Produto</title>
</head>
<body>

<h2>Pesquisa de Produto</h2>

<form method="GET" action="">
    <label for="search">Pesquisar Produto:</label>
    <input type="text" name="search" id="search" placeholder="Digite o nome do produto">
    <button type="submit">Pesquisar</button>
</form>

<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root"; // Supondo que o usuário seja "root"
$password = ""; // Deixe a senha em branco conforme indicado
$dbname = "bd_bembarato"; // Nome do banco de dados

try {
    // Conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configura o modo de erro do PDO para lançar exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se a pesquisa foi submetida
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $_GET['search'];

        // Consulta SQL para pesquisar produtos com base no nome
        $stmt = $conn->prepare("SELECT * FROM tb_produtos WHERE nome LIKE ?");
        $stmt->execute(["%$search%"]);

        if ($stmt->rowCount() > 0) {
            // Exibe os resultados encontrados
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<p>Nome: " . $row['nome'] . " - Peso: " . $row['peso'] . " kg</p>";
                echo "<button>Adicionar ao carrinho</button>";
            }
        } else {
            echo "<p>Nenhum produto encontrado com esse nome.</p>";
        }
    }
} catch(PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}

// Fecha a conexão
$conn = null;
?>

</body>
</html>
