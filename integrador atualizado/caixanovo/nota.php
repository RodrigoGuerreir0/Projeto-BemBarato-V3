<?php
require 'validarcaixa.php';

// Obter os valores necessários
$somaValores = SomarValores();
$descontoCompra = CalcularDesconto();
$dados = ConsultarCaixa();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o método de pagamento selecionado do formulário
    $metodo_pagamento = $_POST["metodo_pagamento"];
}

$localEmpresa = "Cidade Exemplo, Estado Exemplo";
$tipoPagamento = $metodo_pagamento;
$soma = $somaValores;
$descricao = $dados;

// Função para gerar a nota fiscal em HTML
function gerarNotaFiscalHTML($localEmpresa, $tipoPagamento, $dataHora, $soma, $descricao)
{
    $html = "<!DOCTYPE html>
            <html lang='pt-br'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Nota Fiscal</title>
                <style>
                    body {
                        margin: 0;
                        padding: 0;
                        font-family: Arial, sans-serif;
                        background-color: #f0f0f0;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                    }
                    .nota-fiscal {
                        border: 1px solid #000;
                        padding: 20px;
                        width: 450px;
                        background-color: bisque;
                        text-align: left;
                        margin: 50px auto;
                    }
                    .nota-fiscal p {
                        margin: 5px 0;
                    }

                    h1,
                    .center,
                    .centerValor{
                        text-align: center;
                    }

                    .centerValor{
                        padding-top: 10px; 
                        font-size: 25px;
                    }

                    h1{
                        margin-top: -15px;
                        padding-top: 10px;
                    }

                    .Campos{
                        border: 1px transparent solid;
                        display: flex;
                        gap: 5px;
                    }

                    .Cnome{
                        border: 1px transparent solid;
                        width: 35vh;

                    }
                    .Cdescricao{
                        border: 1px transparent solid;
                        width: 40vh;
                        font-size: 15px;
                    }
                    .Cestoque{
                        border: 1px transparent solid;
                        width: 5vh;
                    }
                    .Cvalor{
                        border: 1px transparent solid;
                        width: 20vh;

                    }
                </style>
            </head>
            <body>
                <div class='nota-fiscal'>
                    <h1>Bem Barato</h1>
                    <p class='center'>Local: {$localEmpresa}</p>
                    <p class='center'>Data e Hora: {$dataHora}</p><br>
                    <p><b>CNPJ:</b> XX. XXX. XXX/0001-XX<p>
                    <p>------------------------------------------------------------------------------------</p>    
                    <p><b>Tipo de Pagamento:</b> {$tipoPagamento}</p>
                    <p>Produtos:</p>";

    // Loop para listar os produtos
    foreach ($descricao as $produto) {
        $html .= "<p class='Campos'>
        <span class='Cnome'>{$produto['nome']}</span> 
        <span class='Cdescricao'>{$produto['descricao']}</span>
        <span class='Cestoque'> {$produto['estoque']}x </span>
        <span class='Cvalor'> R$ {$produto['valor']} </span></p>";
    }

    $html .= "<p>------------------------------------------------------------------------------------</p>
                <p class='centerValor'><b>Valor Compra: R$ {$soma}</b></p>
                </div>
            </body>
            </html>";

    return $html;
}

// Definindo o fuso horário e data/hora atuais
date_default_timezone_set('America/Sao_Paulo');
$dataHora = date('Y-m-d H:i:s');

// Gerar e exibir a nota fiscal em HTML
echo gerarNotaFiscalHTML($localEmpresa, $tipoPagamento, $dataHora, $soma, $descricao);
