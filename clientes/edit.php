<?php 

require __DIR__.'/vendor/autoload.php'; // carregando as classes que serão criadas
use \App\Entity\Cliente;
if(isset($_POST['idSend']))
{
    $cliente = new Cliente();
    $clienteSelecionado = $cliente->getCliente($_POST['idSend']);
    $clienteEndereco = $cliente->getEnderecoCliente($_POST['idSend']);
    $arrayInformacao =
    [  
        $clienteSelecionado->getNome(),
        $clienteSelecionado->getData_nascimento(),
        $clienteSelecionado->getCpf(), 
        $clienteSelecionado->getCelular(), 
        $clienteSelecionado->getEmail(), 
        $clienteSelecionado->getObservacao(),
        $clienteEndereco->cidade,
        $clienteEndereco->bairro,
        $clienteEndereco->rua,
        $clienteEndereco->numero,
        $clienteEndereco->complemento
    ];
    $json = json_encode($arrayInformacao);
    echo $json;
}
else
{
    $response['status'] = 404;
    $response['message'] = 'Dados Não Encontrados';
}
if(isset($_POST['hiddenDataSend']))
{
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
    // print_r($enderecoCliente);
    $enderecoCliente->cidade = $cidade;
    $enderecoCliente->bairro = $bairro;
    $enderecoCliente->rua = $rua;
    $enderecoCliente->numero = $numero;
    $enderecoCliente->complemento = $complemento;
    print_r($enderecoCliente);
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