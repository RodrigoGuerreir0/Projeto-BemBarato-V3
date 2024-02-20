<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pagamento.css">
    <title>Forma De Pagamento</title>
<body>
    <div class="container">
        <h2>Selecione a forma de pagamento:</h2>
        <form id="form_pagamento" method="post" action="processa_pagamento.php">
            <input type="radio" id="dinheiro" name="forma_pagamento" value="dinheiro">
            <label for="dinheiro">Dinheiro (Shift + D)</label><br>
            
            <input type="radio" id="pix" name="forma_pagamento" value="pix">
            <label for="pix">PIX (Shift + P)</label><br>
            
            <input type="radio" id="cartao_credito" name="forma_pagamento" value="cartao_credito">
            <label for="cartao_credito">Cartão de Crédito (Shift + C)</label><br>
            
            <input type="radio" id="cartao_debito" name="forma_pagamento" value="cartao_debito">
            <label for="cartao_debito">Cartão de Débito (Shift + B)</label><br>
            
            <button type="submit">Enviar (Shift + PageUp)</button>
            
        </form>
    </div>
    <script src="atalhoPagamento.js"></script>
</body>
</html>
