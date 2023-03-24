   
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <!-- Ajax Cdn include -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="./app/js/app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
      //Carrega os registros na pagina principal
      $(document).ready(function() {
        displayData();
        executeAction("#buscar_nome", 'nome');
        executeAction("#buscar_email", 'email');
      });

      function displayData() {
        var displayData = "true";
        $.ajax({
          url: "http://localhost/newmProject/clientes/display.php",
          type: 'post',
          data: {
            displaySend: displayData,
          },
          success: function(data, status) {
            $("#displayDataTable").html(data);
          }
        });
      }

      function addClient() {
        let nome = $('#nome_modal').val(); // validação para evitar caracteres especiais(somente acentos letras, numeros, vogais)
        let data_nascimento = $('#data_nascimento_modal').val(); // validação para evitar valores absurdos
        let cpf = $('#cpf_modal').val(); // validação de cpf
        let telefone = $('#telefone_modal').val(); // criar a mascara e validar se a quantidade de numeros está correta
        let email = $('#email_modal').val(); // 
        let observacao = $('#observacao_modal').val();
        let cidade = $('#cidade_modal').val(); // esses dados são pegos da api
        let bairro = $('#bairro_modal').val(); // esses dados são pegos da api
        let rua = $('#rua_modal').val(); // esses dados são pegos da api
        let numero = $('#numero_modal').val(); // validar se foi informado um numero
        let complemento = $('#complemento_modal').val(); // validar se foi 

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
          success: function(data, status) {
            displayData();
          }
        });
      }

      function getDetails(id) {
        $("#nome_modal_edit").val();
        $("#hiddendata").val(id);
        $.post("edit.php", {
          idSend: id
        }, function(data, status) {
          let clientId = JSON.parse(data);
          console.log(clientId);
          $("#nome_modal_edit").val(clientId[0]);
          $("#data_nascimento_modal_edit").val(clientId[1]);
          $("#cpf_modal_edit").val(clientId[2]);
          $("#telefone_modal_edit").val(clientId[3]);
          $("#email_modal_edit").val(clientId[4]);
          $("#observacao_modal_edit").val(clientId[5]);
          $("#cidade_modal_edit").val(clientId[6]);
          $("#bairro_modal_edit").val(clientId[7]);
          $("#rua_modal_edit").val(clientId[8]);
          $("#numero_modal_edit").val(clientId[9]);
          $("#complemento_modal_edit").val(clientId[10]);
        });
      }

      function updateDetails() {
        let nome = $("#nome_modal_edit").val();
        let data_nascimento = $("#data_nascimento_modal_edit").val();
        let cpf = $("#cpf_modal_edit").val();
        let telefone = $("#telefone_modal_edit").val();
        let email = $("#email_modal_edit").val();
        let observacao = $("#observacao_modal_edit").val();
        let cidade = $("#cidade_modal_edit").val();
        let bairro = $("#bairro_modal_edit").val();
        let rua = $("#rua_modal_edit").val();
        let numero = $("#numero_modal_edit").val();
        let complemento = $("#complemento_modal_edit").val();
        let hiddenData = $("#hiddendata").val();

        $.post("http://localhost/newmProject/clientes/edit.php", {
          nomeSend: nome,
          data_nascimentoSend: data_nascimento,
          cpfSend: cpf,
          telefoneSend: telefone,
          emailSend: email,
          observacaoSend: observacao,
          cidadeSend: cidade,
          bairroSend: bairro,
          ruaSend: rua,
          numeroSend: numero,
          complementoSend: complemento,
          hiddenDataSend: hiddenData
        }, function(data, status) {
          console.log(data)
          displayData();
        });
      }

      function deleteClient(deleteId) {
        $.ajax({
          url: "http://localhost/newmProject/clientes/delete.php",
          type: 'post',
          data: {
            idSend: deleteId
          },
          success: function(data, status) {
            displayData();
          }
        });
      }

      function searchNameOrEmail(string, campo) {
        $.ajax({
          url: 'http://localhost/newmProject/clientes/search.php',
          method: 'POST',
          data: {
            stringSend: string,
            campoSend: campo,
          },
          success: function(data, status) {
            $('#displayDataTable').html(data);
          }
        });
      }

      function executeAction(selector, campo) {
        $(selector).keyup(function() {
          let string = $(this).val();
          if (string != '')
            searchNameOrEmail(string, campo);
          else
            searchNameOrEmail();
        });
      }

      function makeRequest() {
        key = "key=732pF8NXQTLWFRFTHd9weninM1tWjKh9";
        url = "https://www.mapquestapi.com/geocoding/v1/reverse?"
        if ('geolocation' in navigator) {
          navigator.geolocation.getCurrentPosition(function(position) {
            request = url + key + "&location=" + position.coords.latitude + "," + position.coords.longitude + "&includeRoadMetadata=true&includeNearestIntersection=true"
            let xhttp = new XMLHttpRequest();
            xhttp.open("GET", request, true);

            xhttp.onreadystatechange = function() {
              if (xhttp.readyState == 4 || xhttp.status == 200) {
                response = JSON.parse(xhttp.responseText);
                //tratamento de endereco que vem com numero
                arrayRua = response.results[0].locations[0].street.split(' ');
                rua = ''
                for (let index = 1; index < arrayRua.length; index++) {
                  rua += arrayRua[index].concat(" ")
                }

                $("#cidade_modal").val(response.results[0].locations[0].adminArea5)
                $("#bairro_modal").val(response.results[0].locations[0].adminArea6)
                $("#rua_modal").val(rua.trim())
              }
            }
            xhttp.send();
          }, function(error) {
            console.log(error)
          });
        } else {
          alert("ops, foi negada a permissao")
        }
      }

      function validadeData(event) {
        //fazer um ajax que vai mandar pra uma página php validar todos os dados
        let nome = $('#nome_modal').val(); // tem que validar
        let data_nascimento = $('#data_nascimento_modal').val(); // criar uma validação para o usuário ser forçado a digitar um valor coerente
        let cpf = $('#cpf_modal').val();
        let telefone = $('#telefone_modal').val();
        let email = $('#email_modal').val();
        let cidade = $('#cidade_modal').val();
        let bairro = $('#bairro_modal').val();
        let rua = $('#rua_modal').val();
        let numero = $('#numero_modal').val();
        let complemento = $('#complemento_modal').val();
        if (nome == '' || data_nascimento == '' || cpf == '' || telefone == '' || email == '' || cidade == '' || bairro == '' || rua == '' || numero == '' || complemento == '') {
          alert("O preenchimento de todos os campos são obrigatórios, exceto Observação ")
          event.preventDefault();
        } else {

          $.ajax({
            url: 'http://localhost/newmProject/clientes/validate.php',
            method: 'POST',
            data: {
              nomeSend: nome,
              dataNascimentoSend: data_nascimento,
              cpfSend: cpf,
              celularSend: telefone,
              emailSend: email,
              cidadeSend: cidade,
              bairroSend: bairro,
              ruaSend: rua,
              numeroSend: numero,
              complementoSend: complemento
            },
            success: function(data, status) {
              if (data == true) {
                addClient();
              } else {
                alert(data);
              }
            }
          });
        }
      }

      function checkChar(event) {
        let char = String.fromCharCode(event.keyCode);
        console.log(char);
        let pattern = /^([a-zA-Zà-úÀ-Ú0-9]|-|_|\s)+$/
        if (char.match(pattern)) {
          return true;
        }
      }

      function checkNumeric(event) {
        let char = String.fromCharCode(event.keyCode);
        console.log(char);
        let pattern = '[0-9]';
        if (char.match(pattern)) {
          return true;
        }
      }
      //Validação NOME FRONTEND
      let nome = document.getElementById("nome_modal");
      nome.addEventListener("keypress", function(event) {
        if (!checkChar(event)) {
          event.preventDefault();
        }
      });
      //Validação NUMERO FRONTEND
      let numero = document.getElementById("numero_modal");
      numero.addEventListener("keypress", function(event) {
        if (!checkNumeric(event)) {
          event.preventDefault();
        }
      });
      //Mascara cpf
      let inputCpf = document.getElementById("cpf_modal");
      inputCpf.addEventListener("keypress", function(event) {
        inputCpfLenght = inputCpf.value.length
        if (inputCpfLenght === 3 || inputCpfLenght === 7) {
          inputCpf.value += '.'
        } else if (inputCpfLenght === 11) {
          inputCpf.value += '-'
        }
      });
      //Evitar copiar e colar
      inputCpf.addEventListener("paste", function(event) {
        event.preventDefault();
      });
    </script>
    </body>

    </html>