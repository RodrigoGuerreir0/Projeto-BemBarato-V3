<?php
function ValidarCaixa()
{
    $conexao = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

    $query =   "SELECT * FROM tb_produtos";

    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();

    return $lista;
}

function ConsultarCaixa()
{
    $conexao = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

    $query =   "SELECT * FROM tb_produtos_venda
    LEFT JOIN tb_produtos ON tb_produtos_venda.id_produtos=tb_produtos.id
    WHERE processamento = 0";

    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();

    return $lista;
}

function CodigoCaixa()
{
    $conexaos = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

    $query =   "SELECT * FROM tb_vendas";

    $resultados = $conexaos->query($query);
    $lista = $resultados->fetchAll();

    return $lista;
}

function SomarValores()
{
    try {
        $conexao = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

        $query =   "SELECT * FROM tb_produtos_venda
        LEFT JOIN tb_produtos ON tb_produtos_venda.id_produtos=tb_produtos.id
        WHERE processamento = 0 ";

        $resultados = $conexao->query($query);

        $soma = 0;

        if ($resultados->rowCount() > 0) {
            foreach ($resultados as $row) {
                $soma += $row['valor'];
            }
        }

        $soma_formatada = number_format($soma, 2, ',', '.');

        
        return $soma_formatada;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return false;
    }
}

$valores = SomarValores();


function CalcularDesconto()
{
    $conexaos = new PDO("mysql:host=localhost;dbname=bd_bembarato", "root", "");

    $query = "SELECT * FROM tb_produtos_venda
    LEFT JOIN tb_produtos ON tb_produtos_venda.id_produtos=tb_produtos.id
    WHERE processamento = 0";
    $resultados = $conexaos->query($query);

    $soma = 0;

    if ($resultados->rowCount() > 0) {
        foreach ($resultados as $row) {
            $soma += $row['valor'];
        }
    }

    $desconto = $soma * 0.02;

    $desconto_formatado = number_format($desconto, 2, ',', '.');

    
    return $desconto_formatado;
}

$descontos = CalcularDesconto();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['quantidade'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "caixa";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO produtoscaixa (quantidade) VALUES (?)");

        $stmt->bind_param("i", $quantidade);

        $quantidade = $_POST['quantidade'];

        if ($stmt->execute() === TRUE) {
            echo "Quantidade inserida com sucesso!";
        } else {
            echo "Erro ao inserir quantidade: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    } else {
    }
}
