<?php
require __DIR__.'/vendor/autoload.php'; // carregando as classes que serão criadas
use App\Entity\Cliente;
$clientes = Cliente::getClientes(10); // limitando a exibição de registros no frontend
//header dinamico
include __DIR__.'/includes/header.php';
//pagina de listagem de clientes
include __DIR__.'/includes/listing.php';
//footer dinamico
include __DIR__.'/includes/footer.php';