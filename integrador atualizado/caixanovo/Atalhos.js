function fecharAlerta() {
    var alerta = document.querySelector('.alerta');
    if (alerta) {
        alerta.remove();
    }
}

function criarAlerta() {

    var container = document.createElement('div');
    container.classList.add('container', 'alerta');

    const myRequest = new Request("http://localhost/api", {
        method: "POST",
        body: '{"foo":"bar"}',
      });

      
    container.innerHTML = `
        <h2>Quantidade</h2>
        <form method="GET" id="formCalculo" action="pesquisar.php" onsubmit="realizarCalculo(); return false;">
            <input type="number" id="num1" name="num1"><br><br>
            <input type="submit" value="Calcular">
        </form>
    `;

    document.body.appendChild(container);

    container.style.borderRadius = '20px';
    container.style.backgroundColor = '#1565c0';
    container.style.padding = '20px';
    container.style.position = 'absolute';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.color = 'white';
    container.style.textAlign = 'center';

    document.getElementById('num1').focus();
}

function realizarCalculo() {
    var valor = document.getElementById('num1').value;
    
    var formData = new FormData();
    formData.append('quantidade', valor);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'validarcaixa.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            fecharAlerta();
        } else {
        }
    };
    xhr.send(formData);
}

document.addEventListener('keydown', function(event) {
    if (event.shiftKey && event.key === 'F1') {
        criarAlerta();
    }

    if (event.key === 'Escape') {
        fecharAlerta();
    }
});

function abrirModal() {

    var container = document.createElement('div');
    container.classList.add('container', 'modal');


    container.innerHTML = `
        <h2>Nova Compra</h2>
        <p>Deseja iniciar uma nova compra?</p>
        <form method="post" action="processar_compra.php">
            <button class="button" type="submit" name="acao" value="confirmar">Sim</button>
            <button class="button" type="submit" name="acao" value="cancelar">Não</button>
        </form>
    `;

    container.classList.add('modal');

    document.body.appendChild(container);

    var botaoNao = container.querySelector('button[value="cancelar"]');
    botaoNao.addEventListener('click', function() {
        container.remove();
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            container.remove();
        }
    });

    container.style.borderRadius = '20px';
    container.style.backgroundColor = '#1565c0';
    container.style.padding = '20px';
    container.style.position = 'absolute';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.color = 'white';
    container.style.textAlign = 'center';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.5)';
}

document.addEventListener('keydown', function(event) {

    if (event.shiftKey && event.key === 'F2') {
        event.preventDefault(); 
        abrirModal();
    }
});

function InserirProduto(ultimoCodVenda) {

    var container = document.createElement('div');
    container.classList.add('container', 'alerta');

    const myRequest = new Request("http://localhost/api", {
        method: "POST",
        body: '{"foo":"bar"}',
      });

      
    container.innerHTML = `
    <h2>Inserir Produto</h2>
    <form method="GET" action="pesquisar.php">
        <label for="codigo_barras">Pesquisar por Código de Barras:</label><br><br>
        <input type="text" name="codigo_barras" id="codigo_barras" placeholder="Digite o código de barras"><br><br>
        <input class="ultimoCodVenda" type="hidden" value="`+ultimoCodVenda+`"name="venda" id="">
        <button type="submit">Pesquisar</button>
    </form>
    `;

    document.body.appendChild(container);

    container.style.borderRadius = '20px';
    container.style.backgroundColor = '#1565c0';
    container.style.padding = '20px';
    container.style.position = 'absolute';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.color = 'white';
    container.style.textAlign = 'center';
;

    document.getElementById('codigo_barras').focus();
}

document.addEventListener('keydown', function(event) {

    if (event.key === 'a') {
        event.preventDefault(); 
        var ultimoCodVenda = document.getElementById('ultimoCodVenda').textContent.trim();
        InserirProduto(ultimoCodVenda);
    }
});

