<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_bembarato";

// Verifica se todos os campos foram recebidos
if(isset($_POST['codigo_barras'], $_POST['nome'], $_POST['descricao'], $_POST['categoria'], $_POST['estoque'], $_POST['peso'], $_POST['valor'], $_POST['validade'], $_POST['fornecedor'], $_POST['codigo_fiscal'])) {
    try {
        // Conecta ao banco de dados
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Define o modo de erro PDO para exceção
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verifica se o código de barras já está em uso
        $codigo_barras = $_POST['codigo_barras'];
        $stmt_verifica = $conn->prepare("SELECT * FROM tb_produtos WHERE codigo_barras = :codigo_barras");
        $stmt_verifica->bindParam(':codigo_barras', $codigo_barras);
        $stmt_verifica->execute();

        // Se o código de barras já estiver em uso, retorna uma mensagem de erro
        if ($stmt_verifica->rowCount() > 0) {
            echo json_encode(array("error" => "Código de barras duplicado"));
            exit;
        }

        // Prepara a instrução SQL para inserir os dados do produto
        $stmt = $conn->prepare("INSERT INTO tb_produtos (codigo_barras, nome, descricao, categoria, estoque, peso, valor, validade, fornecedor, codigo_fiscal) 
                                VALUES (:codigo_barras, :nome, :descricao, :categoria, :estoque, :peso, :valor, :validade, :fornecedor, :codigo_fiscal)");

        // Define os parâmetros da instrução SQL
        $stmt->bindParam(':codigo_barras', $_POST['codigo_barras']);
        $stmt->bindParam(':nome', $_POST['nome']);
        $stmt->bindParam(':descricao', $_POST['descricao']);
        $stmt->bindParam(':categoria', $_POST['categoria']);
        $stmt->bindParam(':estoque', $_POST['estoque']);
        $stmt->bindParam(':peso', $_POST['peso']);
        $stmt->bindParam(':valor', $_POST['valor']);
        $stmt->bindParam(':validade', $_POST['validade']);
        $stmt->bindParam(':fornecedor', $_POST['fornecedor']);
        $stmt->bindParam(':codigo_fiscal', $_POST['codigo_fiscal']);

        // Executa a instrução SQL para inserir o produto no banco de dados
        $stmt->execute();

        // Se tudo ocorreu bem, retorna uma mensagem de sucesso
        echo json_encode(array("success" => "Produto cadastrado com sucesso"));
    } catch(PDOException $e) {
        // Em caso de erro, retorna a mensagem de erro
        echo json_encode(array("error" => "Erro ao cadastrar produto: " . $e->getMessage()));
    }
} else {
    // Se algum campo estiver faltando, retorna uma mensagem de erro
    echo json_encode(array("error" => "Por favor, preencha todos os campos."));
}
?>
