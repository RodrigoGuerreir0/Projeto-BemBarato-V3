const cpfInput = document.getElementById('cpf');

cpfInput.addEventListener('input', function (event) {
  let cpf = event.target.value;

  cpf = cpf.replace(/\D/g, '');
  if (cpf.length > 3 && cpf.length <= 6) {
    cpf = cpf.replace(/(\d{3})(\d{1,3})/, '$1.$2');
  } else if (cpf.length > 6 && cpf.length <= 9) {
    cpf = cpf.replace(/(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
  } else if (cpf.length > 9) {
    cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
  }

  event.target.value = cpf;
});

function formatarCep(cepInput) {
    let cep = cepInput.value;

    cep = cep.replace(/\D/g, '');

    if (cep.length > 5) {
      cep = cep.replace(/(\d{5})(\d{1,3})/, '$1-$2');
    }

    cepInput.value = cep;
  }

  function formatarTelefone(telefoneInput) {
    let telefone = telefoneInput.value;

    telefone = telefone.replace(/\D/g, '');

    if (telefone.length > 2) {
      telefone = '(' + telefone.substring(0, 2) + ') ' + telefone.substring(2);
    }
    if (telefone.length > 10) {
      telefone = telefone.replace(/(\d{4})(\d{4})$/, '$1-$2');
    } else {
      telefone = telefone.replace(/(\d{4})(\d{1,4})$/, '$1-$2');
    }

    telefoneInput.value = telefone;
  }