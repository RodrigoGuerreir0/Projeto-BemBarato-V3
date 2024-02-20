<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar Produto</title>
    <style>
        .container form input[type="text"],
        .container form select,
        .container form input[type="date"],
        .container form input[type="file"] {
            width: calc(100% - 12px);
            margin-bottom: 10px;
        }

        select#categoria {
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Cadastrar Novo Produto</h2>
        <form id="cadastroForm" method="post" action="recebe-ProdutoCadastrado.php">
            <label for="codigo_barras">Código de Barras:</label>
            <input type="text" id="codigo_barras" name="codigo_barras" required><br>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br>
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required><br>
            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem" accept="image/*"><br>

            <label for="categoria">Categoria:</label>
            <div class="input-group">
                <select id="categoria" name="categoria" required>
                    <option value="">Selecione...</option>
                    <option value="Frios">Frios</option>
                    <option value="Bebida">Bebida</option>
                    <option value="Alimentos">Alimentos</option>
                    <option value="Higiene Pessoal">Higiene Pessoal</option>
                    <option value="Limpeza">Limpeza</option>
                    <option value="Lavanderia">Lavanderia</option>
                    <option value="Saúde e Bem-Estar">Saúde e Bem-Estar</option>
                    <option value="Cuidados com o Lar">Cuidados com o Lar</option>
                    <option value="Frutas e Legumes">Frutas e Legumes</option>
                </select><br>
            </div>
            <label for="estoque">Estoque:</label>
            <input type="text" id="estoque" name="estoque" required><br>
            <label for="peso">Peso:</label>
            <input type="text" id="peso" name="peso" required><br>
            <label for="valor">Valor:</label>
            <input type="text" id="valor" name="valor" required><br>
            <label for="validade">Validade:</label><br>
            <input type="date" id="validade" name="validade" required><br><br>
            <label for="fornecedor" style="margin-right: 52px;">Fornecedor:</label>
            <input type="text" id="fornecedor" name="fornecedor" required><br>
            <label for="codigo_fiscal">Código Fiscal:</label>
            <input type="text" id="codigo_fiscal" name="codigo_fiscal" required><br>
            <button type="submit" class="button">Cadastrar</button>
        </form>
    </div>

    <div id="alertaSucesso" class="alerta" style="display: none; background-color: #C8E6C9; color: #388E3C; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; padding: 20px; border-radius: 5px;">
        Produto cadastrado com sucesso!
    </div>

    <div id="alertaDuplicado" class="alerta" style="display: none; background-color: #FFEBEE; color: #D32F2F; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; padding: 20px; border-radius: 5px;">
        O código de barras inserido já está em uso para outro produto.
    </div>

    <script>

        function exibirAlertaSucesso() {
            var alerta = document.getElementById("alertaSucesso");
            alerta.style.display = 'block';
            setTimeout(function() {
                alerta.style.display = 'none';
            }, 3000); 
        }

     
        function exibirAlertaDuplicado() {
            var alerta = document.getElementById("alertaDuplicado");
            alerta.style.display = 'block';
            setTimeout(function() {
                alerta.style.display = 'none';
            }, 3000); 
        }
    </script>

    <script>
        document.getElementById('cadastroForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'recebe-ProdutoCadastrado.php', true);
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.error === "Código de barras duplicado") {
                        exibirAlertaDuplicado();
                    } else if (response.success === "Produto cadastrado com sucesso") {
                        exibirAlertaSucesso();
                        document.getElementById('cadastroForm').reset();
                    }
                }
            };
            xhr.send(formData);
        });
    </script>
</body>

</html>