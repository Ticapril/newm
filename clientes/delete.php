<?php 

require __DIR__.'/vendor/autoload.php'; // carregando as classes que serão criadas

use \App\Entity\Cliente;
// var_dump($_POST);
// exit;

if(isset($_POST['idSend'])){
    $unique = $_POST['idSend'];
    $cliente = Cliente::getCliente($unique);
    $enderecoCliente = Cliente::getEnderecoCliente($unique);
    $cliente->excluirEndereco($enderecoCliente->getId());
    $cliente->excluirCliente();
    header('location: index.php');
    exit;
}

// if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
//     header('location: index.php?status=error');
//     exit;
// }



// echo '<pre>';
// print_r($enderecoCliente->getId());
// echo '</pre>';exit;
if(!$cliente instanceof Cliente){
    header('location: index.php');
    exit;
}

// echo '<pre>';
// print_r($cliente);
// echo '</pre>';exit;


if(isset($_POST['excluir'])){
    $cliente->excluirEndereco($enderecoCliente->getId());
    $cliente->excluirCliente();
    header('location: index.php');
    exit;
}

//header dinamico
include __DIR__.'/includes/header.php';
//pagina de listagem de clientes
include __DIR__.'/includes/confirm-delete.php';
//footer dinamico
include __DIR__.'/includes/footer.php';