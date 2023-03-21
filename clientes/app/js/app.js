// Criação do Cliente
$("#form_client").submit(function (event) {
  event.preventDefault(); // evita o submeter do formulario
  let nome = $('#nome_cliente').val();
  let data_nascimento = $('#data_nascimento_cliente').val();
  let cpf = $('#cpf_cliente').val();
  let telefone = $('#telefone_cliente').val();
  let email = $('#email_cliente').val();
  let observacao = $('#observacao_cliente').val();
  let cidade = $('#cidade_cliente').val();
  let bairro = $('#bairro_cliente').val();
  let rua = $('#rua_cliente').val();
  let numero = $('#numero_cliente').val();
  let complemento = $('#complemento_cliente').val();
  $.ajax({
    url: 'http://localhost/newmProject/clientes/create.php',
    method: 'POST',
    data: {
      client: nome,
      birth_date: data_nascimento,
      register_person: cpf,
      cellphone: telefone,
      email: email,
      description: observacao,
      city: cidade,
      neighboorhood: bairro,
      street: rua,
      number: numero,
      complement: complemento
    },
    dataType: 'json'
  }).done(function (result) {
    console.log(result)
  })
});

//Exibição do Cliente na Página index
if (document.URL === 'http://localhost/newmProject/clientes/index.php') {
  const tbody = document.querySelector("tbody");
  const listarClientes = async () => {
    const dados = await fetch('http://localhost/newmProject/clientes/teste.php');
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
  }
  listarClientes();
}
const inputName = document.querySelector("#nome_cliente");
inputName.addEventListener("keypress", function (event) {
  if (!checkChar(event)) {
    event.preventDefault();
  }
});

function checkChar(e) {
  const char = String.fromCharCode(e.keyCode);
  const pattern = '[a-z\d A-Zà-úÀ-Ú0-9]'; // aceitando apenas letras com ou sem acento
  if (char.match(pattern)) {
    return true;
  }
}
//Função retirada do site  DevMedia
function TestaCPF(strCPF) {
  var Soma;
  var Resto;
  Soma = 0;
if (strCPF == "00000000000") return false;

for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
Resto = (Soma * 10) % 11;

  if ((Resto == 10) || (Resto == 11))  Resto = 0;
  if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

Soma = 0;
  for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
  Resto = (Soma * 10) % 11;

  if ((Resto == 10) || (Resto == 11))  Resto = 0;
  if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
  return true;
}
const inputCpf = document.querySelector("#cpf_cliente");
inputCpf.addEventListener("blur", function () {
  resultado = TestaCPF($(inputCpf).val());
  if(!resultado){
    inputCpf.value = '';
    inputCpf.focus();
  }
});




