<?php

namespace App\Entity;

use PDO;
use App\Db\Database;

class Cpf
{

    /**
     * Método responsável por verificar se um CPF é realmente válido
     * @param string $cpf
     * @return boolean
     */
    public static function validate($cpf)
    {
        $cpf = preg_replace('/\D/', '', $cpf);
        // echo $cpf;
        // exit;
        //verifica a quantidade de caracteres
        if (strlen($cpf) != 11) {
            return false;
        }
        //Digito Verificador
        $cpf_validacao = substr($cpf, 0, 9);
        $cpf_validacao .= self::calcularDigitoVerificador($cpf_validacao);
        $cpf_validacao .= self::calcularDigitoVerificador($cpf_validacao);

        return $cpf_validacao === $cpf;
    }
    /**
     * Método responsável por calcular um digito verificador com base em uma sequencia númerica
     * @param string $base
     * @return string
     */
    public static function calcularDigitoVerificador($base)
    {
        //Auxiliares
        $tamanho = strlen($base);
        $multiplicador = $tamanho + 1;

        //Soma
        $soma = 0;

        //ITERA os numeros do cpf

        for ($index = 0; $index < $tamanho; $index++) { //base = 364420810
            $soma += $base[$index] * $multiplicador; // 1 - 3x10 = 30 2 - 6x9 = 54 3 - 4x8 = 32 4 - 4x7 = 28 5 - 2x6 = 12 6 - 0x5 = 0 7 - 8x4 = 32 8 - 1x3 = 3 9 - 0x2 = 0 
            $multiplicador--;
        }
        // echo $soma;
        // exit;

        //Resto da divisao

        $resto = $soma % 11;

        //Retorna o digito verificador
        return $resto > 1 ? 11 - $resto : 0;

        /**
         * 123456789
         * => 1x10, 2x9, 3x8, 4x7, 5x6, 6x5, 7x4, 8x3, 9x2
         */
    }
    public static function getCpf($cpf)
    {
        $db = new Database("clientes");
        $where = "cpf = $cpf";
        $cpfsBase = $db->select(100, $where)->fetchAll(PDO::FETCH_CLASS, self::class);
        $message = 'Cpf já registrado no sistema!';
        if (isset($cpfsBase)) {
            return $message;
        }
    }
}