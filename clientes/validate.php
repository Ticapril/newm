<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Cpf;

$validado = true;

//VALIDAÇÃO DATA NASCIMENTO
$ano_nascimento = substr($_POST['dataNascimentoSend'], 0, 4);
$pessoa_mais_velha_atualmente = 1907;
if ($ano_nascimento > 2007) {
    echo "Idade mínima 16 anos!";
    $validado = false;
    exit;
} else if ($ano_nascimento < $pessoa_mais_velha_atualmente) {
    echo "Impossível alguém ter mais de $pessoa_mais_velha_atualmente anos";
    $validado = false;
    exit;
}
//VALIDAÇÃO CPF
//Verificar se existe esse cpf na base de dados
if ($_POST['cpfSend']) {
    $cpf = $_POST['cpfSend'];
    $cpfRegistrado = Cpf::getCpf($cpf);
    if (isset($cpfRegistrado)) {
        echo 'Cpf já registrado!';
        $validado = false;
        exit;
    } else {
        $resultado = Cpf::validate($cpf);
        if (!$resultado) {
            echo 'Cpf Inválido';
            $validado = false;
            exit;
        }
    }
}
echo $validado;
