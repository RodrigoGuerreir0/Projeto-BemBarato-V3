<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="cadastro.css" />
  <title>Singup</title>
</head>

<body>
  <div class="container">
    <div class="card">
      <h1>Cadastrar</h1>

      <form class="login" method="POST" action="verificacadastro.php">
        <div id="msgError"></div>
        <div id="msgSuccess"></div>

        <div class="label-float">
          <input type="text" id="nome" placeholder=" " required name="nome" />
          <label id="labelNome" for="nome">Nome completo</label>
        </div>
        <div class="label-float">
          <input type="number" id="nome" placeholder=" " required name="cpf" />
          <label id="labelNome" for="nome">CPF</label>
        </div>

        <div class="label-float">
          <input type="text" id="email" placeholder=" " required name="email" />
          <label id="labelEmail" for="email">E-mail</label>
        </div>

        <div class="label-float">
          <input type="date" id="" placeholder="nascimento" required name="nascimento" />
        </div>

        <div class="label-float">
          <input type="number" id="telefone" placeholder=" " required name="telefone" />
          <label id="labelTelefone" for="senha">Telefone</label>

        </div>

        <div class="label-float">
          <input type="text" id="cidade" placeholder=" " required name="cidade" />
          <label id="labelcidade" for="cidade">Cidade</label>

        </div>
        <div class="label-float">
          <input type="text" id="bairro" placeholder=" " required name="bairro" />
          <label id="labelBairro" for="bairro">Bairro</label>

        </div>
        <div class="label-float">
          <input type="text" id="rua" placeholder=" " required name="rua" />
          <label id="labelRua" for="rua">Rua</label>

        </div>
        <div class="label-float">
          <input type="number" id="numero" placeholder=" " required name="numero" />
          <label id="labelNumero" for="Numero">Numero</label>

        </div>
        <div class="label-float">
          <input type="number" id="cep" placeholder=" " required name="cep" />
          <label id="labelCep" for="cep">CEP</label>

        </div>

        <div class="justify-center">
          <button onclick="cadastrar()">Cadastrar</button>
        </div>
    </div>
    </form>
  </div>

  <script src="../js/signup.js"></script>
</body>

</html>