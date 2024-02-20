<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/cadastro.css">
    <title>Document</title>
</head>

<body>

<div class="fudo-login">
        <div class="divisorias1">
            <div class="fundo-logo__main">
                <div class="fundo-logo">
                    <img class="logoMercado" src="./img/logo.png" alt="Logo Do Mercado">
                </div>
            </div>
        </div>
        <div class="divisorias2">
            <div class="separacao-fundo1">
                <p class="txt-Permissao">PERMISSÃO</p>
                <p class="txt-funcao">PERMISSÃO PARA (CAIXA).</p>
                <?php
                if (isset($_GET['mensagemErrada'])) {
                    echo '<h3 class="text-center mb-4">Usuario cadastrado</h3>';
                } 
                if (isset($_GET['mensagemCerta'])) {
                  echo '<h3 class="text-center mb-4">Algo deu erro em nosso sistema. Tente Novamente...</h3>';
              } 
                ?>
            </div>
            <div class="separacao-fundo3">
                <form method="POST" action="verificacadastro.php">
                    <div class="espacamento">
                        <div class="">
                            <label for="usuario">Nome do Funcionario:</label>
                            <input type="text" class="input txt" id="usuario" name="nome" placeholder="Digite o nome do Funcionario">
                        </div>
                        <div class="">
                            <label for="senha">N° de Matricula:</label>
                            <input type="text" class="input txt" id="senha" name="matricula" placeholder="Digite o numero de Matricula">
                        </div>
                        <div class="">
                            <label for="usuario">Email:</label>
                            <input type="text" class="input txt" id="usuario" name="email" placeholder="Digite o seu e-mail">
                        </div>
                        <div class="">
                            <label for="usuario">Cpf:</label>
                            <input type="text" class="input txt" id="usuario" name="cpf" placeholder="Digite o cpf">
                        </div>
                        <div class="">
                            <label for="usuario">Usuário:</label>
                            <input type="text" class="input txt" id="usuario" name="usuario" placeholder="Digite o Usuário">
                        </div>
                        <div class="">
                            <label for="usuario">Senha:</label>
                            <input type="passaword" class="input txt" id="usuario" name="senha" placeholder="Digite a senha">
                        </div>
                        <div class="">
                            <label for="usuario">Telefone:</label>
                            <input type="text" class="input txt" id="usuario" name="telefone" placeholder="Digite o telefone">
                        </div>
                        
                    </div>
            </div>
            <div class="separacao-fundo4">
                <div class="botoes">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
<script src="script.js"></script>
</html>