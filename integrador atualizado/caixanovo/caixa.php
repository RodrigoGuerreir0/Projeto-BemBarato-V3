<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/caixa.css">
    <title>CAIXA ABERTO</title>
</head>
<?php
require 'validarcaixa.php';

$codVenda = CodigoCaixa();
$somaValores = SomarValores();
$descontoCompra = CalcularDesconto();
$dados = ConsultarCaixa();
?>
<?php foreach ($dados as $linha) { ?>
    <tr>
        <p class="txtinfoscaixa"><?php $linha["id_produtos"] ?></p>
        <?php $ultimoID = $linha["id_produtos"] ?>
    </tr>
<?php } ?>


<?php foreach ($dados as $linha) { ?>
    <tr>
        <p class="txtinfoscaixa"><?php $linha["codigo_barras"] ?></p>
        <?php $ultimoCodBarra = $linha["codigo_barras"] ?>
    </tr>
<?php } ?>

<?php foreach ($dados as $linha2) { ?>
    <tr>
        <p class="txtinfoscaixa"><?php $linha2["id_venda"] ?></p>
        <?php $ultimoCodVenda = $linha2["id_venda"] ?>
    </tr>
<?php } ?>

<body>
    <main class="main">
        <div>
            <div class="adicionaiscaixa">
                <div class="div1">
                    <p class="name"><b>MERCADO BEM BARATO</b></p>
                </div>
                <div class="div2">
                    <fieldset class="CodProduto">
                        <legend class="legend"><b>Cód. do Produto</b></legend>
                        <div class="centralizarqtdgeral-main">
                            <p class="centralizarqtdgeral">
                                <?php echo $ultimoID ?>
                            </p>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div>
            <div class="divisoria">
                <div class="caixa">
                    <div class="fundocaixa">
                        <div class="divisoriacaixa1">
                            <div>
                                <fieldset class="Logo-Produtos">
                                    <legend class="legend"><b>Logo Produtos</b></legend>
                                </fieldset>
                                <fieldset class="CodBarra">
                                    <legend class="legend"><b>Valor Desconto </b></legend>
                                    <div class="centralizarqtdgeral-main">
                                        <p class="centralizarqtdgeral">
                                            <?php echo "R$ " . $descontoCompra  ?>
                                        </p>
                                    </div>
                                </fieldset>
                                <form action="MetodoPagamento.php" method="post">
                                    <fieldset class="ValorCompra">
                                        <legend class="legend"><b>Valor da Compra</b></legend>
                                        <div class="centralizarqtdgeral-main">
                                            <p class="centralizarqtdgeral">
                                                <?php echo "R$ " . $somaValores; ?>
                                            </p>
                                            <input type="hidden" name="valor_compra" value="<?php echo $somaValores; ?>">
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn"><b>Finalizar Compra</b></button>
                                </form>
                            </div>
                        </div>
                        <div class="divisoriacaixa2">
                            <fieldset class="Caixa">
                                <div class="NumeroDeProdutos">
                                    <div class="NumeroDeProdutos-title__main">
                                        <p class="NumeroDeProdutos-title"><b>Nº</b></p>
                                    </div>
                                    <?php foreach ($dados as $linha) { ?>
                                        <tr>
                                            <p class="txtinfoscaixa"><?php echo $linha["id_produtos"] ?></p>
                                            <?php $ultimoID = $linha["id_produtos"] ?>
                                        </tr>
                                    <?php } ?>
                                </div>
                                <div class="NomeDoProduto">
                                    <div class="NomeDoProduto-title__main">
                                        <p class="NomeDoProduto-title"><b>Nome</b></p>
                                    </div>
                                    <?php foreach ($dados as $linha) { ?>
                                        <tr>
                                            <p class="txtinfoscaixa"><?php echo $linha["nome"] ?></p>
                                            <?php $ultimoNome = $linha["nome"] ?>
                                        </tr>
                                    <?php } ?>
                                </div>

                                <div class="DescricaoDoProduto">
                                    <div class="DescricaoDoProduto-title__main">
                                        <p class="DescricaoDoProduto-title"><b>Descrição</b></p>
                                    </div>
                                    <?php foreach ($dados as $linha) { ?>
                                        <tr>
                                            <p class="txtinfoscaixa"><?php echo $linha["descricao"] ?></p>

                                        </tr>
                                    <?php } ?>
                                </div>

                                <div class="QuantidadeDoProduto">
                                    <div class="QuantidadeDoProduto-title__main">
                                        <p class="QuantidadeDoProduto-title"><b>Quantidade</b></p>
                                    </div>
                                    <?php foreach ($dados as $linha) { ?>
                                        <tr>
                                            <p class="txtinfoscaixa"><?php echo $linha["estoque"] ?></p>
                                            <?php $ultimaQuantidade = $linha["estoque"] ?>

                                        </tr>
                                    <?php } ?>
                                </div>

                                <div class="ValorDoProduto">
                                    <div class="ValorDoProduto-title__main">
                                        <p class="ValorDoProduto-title"><b>Valor</b></p>
                                    </div>
                                    <?php foreach ($dados as $linha) { ?>
                                        <tr>
                                            <p class="txtinfoscaixa"><?php echo "R$ " . $linha["valor"] ?></p>
                                            <?php $ultimoValor = $linha["valor"] ?>

                                        </tr>
                                    <?php } ?>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="atalhos">
                    <fieldset class="CodVenda">
                        <legend class="legend"><b>Cód. da Venda</b></legend>
                        <div class="centralizarqtdgeral-main">
                            <p class="centralizarqtdgeral" id="ultimoCodVenda">
                                <?php echo $ultimoCodVenda ?>
                            </p>
                        </div>
                    </fieldset>
                    <fieldset class="ValorUnidade">
                        <legend class="legend"><b>Valor Unidade</b></legend>
                        <div class="centralizarqtdgeral-main">
                            <p class="centralizarqtdgeral">
                                <?php echo "R$ " . $ultimoValor ?>
                            </p>
                        </div>
                    </fieldset>
                    <fieldset class="ValorQuantidade">
                        <legend class="legend"><b>Quantidade</b></legend>
                        <div class="centralizarqtdgeral-main">
                            <p class="centralizarqtdgeral">
                                <?php echo $ultimaQuantidade ?>
                            </p>
                        </div>
                    </fieldset>
                    <fieldset class="Atalhos">
                        <legend class="legend"><b>Atalhos</b></legend>
                        <p><b>Quantidade- SHIFT + F2</b></p>
                        <p><b>Nova Venda- SHIFT + F1</b></p>
                        <p><b>Inserir Produto- A</b></p>
                        <p><b>A definir- SHIFT + ?</b></p>
                        <p><b>A definir- SHIFT + ?</b></p>
                        <p><b>A definir- SHIFT + ?</b></p>
                        <p><b>A definir- SHIFT + ?</b></p>
                        <p><b>A definir- SHIFT + ?</b></p>
                        <p><b>A definir- SHIFT + ?</b></p>
                        <p><b>Fechar- ESC/Escape</b></p>
                    </fieldset>
                </div>
            </div>
        </div>

    </main>
</body>
<script src="Atalhos.js"></script>

</html>