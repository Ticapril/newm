    <!-- fechamento container -->
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <!-- Ajax Cdn include -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="./app/js/app.js"></script>
    <script>
          //Carrega os registros na pagina principla
          $(document).ready(function(){
                  displayData();
                  executeAction("#buscar_nome", 'nome');
                  executeAction("#buscar_email", 'email');
          });
          function displayData(){
                  console.log('Cheguei!');
                  var displayData = "true";
                  $.ajax({
                    url: "http://localhost/newmProject/clientes/display.php",
                    type:'post',
                    data:{
                      displaySend: displayData,
                    },
                    success:function(data,status){
                      console.log($("#displayDataTable").html(data));
                    }
                  });
          }
          function addClient(){
                  //pegar o valores do formulario
                      let nome = $('#nome_modal').val();
                      let data_nascimento = $('#data_nascimento_modal').val();
                      let cpf = $('#cpf_modal').val();
                      let telefone = $('#telefone_modal').val();
                      let email = $('#email_modal').val();
                      let observacao = $('#observacao_modal').val();
                      let cidade = $('#cidade_modal').val();
                      let bairro = $('#bairro_modal').val();
                      let rua = $('#rua_modal').val();
                      let numero = $('#numero_modal').val();
                      let complemento = $('#complemento_modal').val();
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
                        success: function(data, status){
                          displayData();
                          $("#completeModal").modal('hide');
                        }
                        
                      });
          }
          function getDetails(id){
                    $("#nome_modal_edit").val();
                    $("#hiddendata").val(id);
                    $.post("edit.php", {idSend:id}, function(data, status){
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
                      $("#complemento_modal_edit").val(clientId[9]);
                    
                    });
                    // $("#updateModal").attr("data-bs-dismiss", "modal");
          }
          function updateDetails(){
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
                    nomeSend:nome,
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
                    }, function(data, status){
                      // $("#updateModal").attr("data-bs-dismiss", "modal");
                      console.log(data);
                      displayData();
                    });
          }
          function DeleteClient(deleteId){
                    $.ajax({
                      url: "http://localhost/newmProject/clientes/delete.php",
                      type: 'post',
                      data: {
                        idSend: deleteId
                      },
                      success: function(data, status){
                        displayData();
                        console.log(status);
                      }
                    });
          }
          function buscarNomeOuEmail(string, campo){
            $.ajax({
              url: 'http://localhost/newmProject/clientes/search.php',
              method: 'POST',
              data: {
                  stringSend:string,
                  campoSend:campo,
              },
              success: function(data, status){
                $('#displayDataTable').html(data);
              }
            });
          }
          function executeAction(selector,campo){
            $(selector).keyup(function(){
                    let string = $(this).val();
                    if(string != '')
                      buscarNomeOuEmail(string,campo);
                    else
                      buscarNomeOuEmail();
            });
          }
    </script>
</body>
</html>