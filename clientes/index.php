<?php



require __DIR__.'/vendor/autoload.php'; // carregando as classes que serão criadas

use App\Entity\Cliente;

// //Busca
// $busca_nome = filter_input(INPUT_GET,'busca_nome');
// $busca_email = filter_input(INPUT_GET,'busca_email');


// //Condições sql

// $condicoesNome = [
//     strlen($busca_nome) ? 'nome LIKE "%'.str_replace(' ','%',$busca_nome).'%"': null    
// ];
// $condicoesEmail = [
//     strlen($busca_email) ? 'nome LIKE "%'.str_replace(' ','%',$busca_email).'%"': null   
// ];
// if($condicoesNome != ''){
//     $whereNome = implode(' AND ', $condicoesNome);
//     $clientes = Cliente::getClientes(10,$whereNome);
// } if($condicoesEmail != ''){
//     $whereEmail = implode(' AND ', $condicoesEmail);
//     $clientes = Cliente::getClientes(10,$whereEmail);
// }




Cliente::getClientes(10);
//clausula where

// if(!($condicoes[0] == '' || $condicoes[1] == '')){
//    
// }
// print_r($where);
// exit;





// echo '<pre>';
// print_r($where);
// echo '</pre>';exit;



// $clientes = Cliente::getClientes(10,$where); // limitando a exibição de registros no frontend
// Descomentar para testar
// echo '<pre>';
// print_r($clientes);
// echo '</pre>';exit;

//header dinamico
include __DIR__.'/includes/header.php';
//pagina de listagem de clientes
include __DIR__.'/includes/listing.php';
//footer dinamico
include __DIR__.'/includes/footer.php';