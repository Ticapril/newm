<?php 

require __DIR__.'/vendor/autoload.php'; // carregando as classes que serão criadas

// var_dump($_POST);
// exit;
use \App\Entity\Cliente;
use \App\Entity\Endereco;

if(isset($_POST['client'],$_POST['birth_date'],$_POST['register_person'],$_POST['cellphone'],$_POST['email'],$_POST['description'],$_POST['city'],$_POST['neighboorhood'],$_POST['street'],$_POST['number'],$_POST['complement'])){
    // Descomentar para realizar o teste 
    // echo '<pre>';
    // print_r($endereco);
    // echo '</pre>'; exit;
    $cliente = new Cliente();
    $cliente->setNome($_POST['client']);
    $cliente->setData_nascimento($_POST['birth_date']);
    $cliente->setCpf($_POST['register_person']);
    $cliente->setCelular($_POST['cellphone']);
    $cliente->setEmail($_POST['email']);
    $cliente->setObservacao($_POST['description']);
    $cliente->cadastrar();
    // echo $cliente->getId();
    // exit;
    $endereco = new Endereco();
    $endereco->setCidade($_POST['city']);
    $endereco->setBairro($_POST['neighboorhood']);
    $endereco->setRua($_POST['street']);
    $endereco->setNumero($_POST['number']);
    $endereco->setComplemento($_POST['complement']);
    $endereco->setFk_end_cliente($cliente->getId());
    $endereco->cadastrar();
    header('location: index.php');
    exit;
}

//header dinamico
include __DIR__.'/includes/header.php';
//pagina de listagem de clientes
include __DIR__.'/includes/form.php';
//footer dinamico
include __DIR__.'/includes/footer.php';