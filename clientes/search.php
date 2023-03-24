<?php
require __DIR__ . '/vendor/autoload.php'; // carregando as classes que serao criadas
use App\Entity\Cliente;
$data = '';
if(isset($_POST['stringSend']) && isset($_POST['campoSend'])){
    $busca = $_POST['stringSend'];
    $campo = $_POST['campoSend'];
    $where = $campo." LIKE '%".str_replace(' ','%',$busca)."%'";
    $clientes = Cliente::getClientes(10,$where);
}else {
     $clientes = Cliente::getClientes(10);
}
if (isset($clientes)) {
        foreach ($clientes as $cliente) {
            $data .= '
            <tr>
                <td>' . $cliente->getNome() . '</td>
                <td>' . $cliente->getCelular() . '</td>
                <td>' . $cliente->getEmail() . '</td>
                <td>' . $cliente->getObservacao() . '</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="getDetails('.$cliente->getId().')">Editar Cliente</button>
                    <button type="button" class="btn btn-danger" onclick="DeleteClient('.$cliente->getId().')">Deletar Cliente</button>
                </td>
            </tr>';
        }
} 
$data = strlen($data) ? $data : '<tr>
                                    <td colspan="6" class="text-center">
                                            Nenhum Cliente encontrado!.
                                    </td>
                                </tr>';
echo $data;
