<?php 

require __DIR__.'/vendor/autoload.php'; // carregando as classes que serão criadas

// var_dump($_POST);
// exit;

use \App\Entity\Cliente;

if(isset($_POST['idSend'])){
    
    $cliente = new Cliente();
    $clienteSelecionado = $cliente->getCliente($_POST['idSend']);
    $clienteEndereco = $cliente->getEnderecoCliente($_POST['idSend']);
    $arrayInfo = [  
                    $clienteSelecionado->getNome(),
                    $clienteSelecionado->getData_nascimento(),
                    $clienteSelecionado->getCpf(), 
                    $clienteSelecionado->getCelular(), 
                    $clienteSelecionado->getEmail(), 
                    $clienteSelecionado->getObservacao(),
                    $clienteEndereco->cidade,
                    $clienteEndereco->bairro,
                    $clienteEndereco->numero,
                    $clienteEndereco->complemento
                ];
    $json = json_encode($arrayInfo);
    echo $json;
    // exit;
    // $teste = $db->select(1, 'id = '.$client_id);
    // echo '<pre>';
    // print_r($teste);
    // echo '</pre>';exit;
    // $response = array();
}else {
    $response['status'] = 200;
    $response['message'] = 'Dados n�o encontrados';
}

if(isset($_POST['hiddenDataSend'])){
    // echo 'Teste';
    // exit;
    $nome = $_POST['nomeSend'];
    $data_nascimento = $_POST['data_nascimentoSend'];
    $cpf = $_POST['cpfSend'];
    $telefone = $_POST['telefoneSend'];
    $email = $_POST['emailSend'];
    $observacao = $_POST['observacaoSend'];
    $cidade = $_POST['cidadeSend'];
    $bairro = $_POST['bairroSend'];
    $rua = $_POST['ruaSend'];
    $numero = $_POST['numeroSend'];
    $complemento = $_POST['complementoSend'];


    $enderecoCliente = Cliente::getEnderecoCliente($_POST['hiddenDataSend']);
  
    $enderecoCliente->cidade = $cidade;
    $enderecoCliente->bairro = $bairro;
    $enderecoCliente->rua = $rua;
    $enderecoCliente->numero = $numero;
    $enderecoCliente->complemento = $complemento;
    $enderecoCliente->atualizaEndereco($cidade,$bairro,$rua,$numero,$complemento);


    $cliente = Cliente::getCliente($_POST['hiddenDataSend']);
    $cliente->setNome($nome);
    $cliente->setData_nascimento($data_nascimento);
    $cliente->setCpf($cpf);
    $cliente->setCelular($telefone);
    $cliente->setEmail($email);
    $cliente->setObservacao($observacao);
    $cliente->atualizar();
}





// if(!isset($_POST['idSend']) or !is_numeric($_POST['idSend'])){
//     header('location: index.php');
//     exit;
// }

// $cliente = Cliente::getCliente($_POST['idSend']);
// $enderecoCliente = Cliente::getEnderecoCliente($_POST['idSend']);

// // echo '<pre>';
// // print_r($enderecoCliente->cidade);
// // echo '</pre>';exit;
// if(!$cliente instanceof Cliente){
//     header('location: index.php');
//     exit;
// }


// if(isset($_POST['client'],$_POST['birth_date'],$_POST['register_person'],$_POST['cellphone'],$_POST['email'],$_POST['description'],$_POST['city'],$_POST['neighboorhood'],$_POST['street'],$_POST['number'],$_POST['complement'])){
//     // Descomentar para realizar o teste 
//     // echo '<pre>';
//     // print_r($endereco);
//     // echo '</pre>'; exit;

//     // Descomentar para realizar os testes
//     // echo '<pre>';print_r($cliente);echo '</pre>';exit;
//     $cliente->atualizar();

//     header('location: index.php');
//     exit;
// }

//header dinamico
// include __DIR__.'/includes/header.php';
// //pagina de listagem de clientes
// include __DIR__.'/includes/formEdit.php';
// //footer dinamico
// include __DIR__.'/includes/footer.php';