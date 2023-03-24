<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Cliente;

if (isset($_POST['displaySend'])) {
    $clientes = Cliente::getClientes(10);
    $resultados = '';
    foreach ($clientes as $cliente) {
        $resultados .=
            '<tr>
                <td id="nome_cliente">' . $cliente->getNome() . '</td>   
                <td id="celular_cliente">' . $cliente->getCelular() . '</td>
                <td id="email_cliente">' . $cliente->getEmail() . '</td>
                <td id="observacao_cliente">' . $cliente->getObservacao() . '</td>
                <td >
                   <td class="text-center"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="getDetails(' . $cliente->getId() . ')"><i class="fa-solid fa-pencil"></i></button></td>
                   <td class="text-center"><button type="button" class="btn btn-danger" onclick="deleteClient(' . $cliente->getId() . ')"><i class="fa-solid fa-trash"></i></button></td>
                </td>
            </tr>';
    }
    $resultados = strlen($resultados) ? $resultados : '<tr>
                                                            <td colspan="6" class="text-center">
                                                                Nenhum Cliente encontrado!.
                                                            </td>
                                                      </tr>';
    echo $resultados;
}
