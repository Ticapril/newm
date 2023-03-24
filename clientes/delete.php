<?php 

require __DIR__.'/vendor/autoload.php'; // carregando as classes que serão criadas
use \App\Entity\Cliente;

if(isset($_POST['idSend'])){
    $unique = $_POST['idSend'];
    $cliente = Cliente::getCliente($unique);
    $enderecoCliente = Cliente::getEnderecoCliente($unique);
    $cliente->excluirEndereco($enderecoCliente->getId());
    $cliente->excluirCliente();
    header('location: index.php');
    exit;
}