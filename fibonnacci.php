<?php

const SEQUENCIA_INICIAL = [0, 1, 1];
const ERRO = -1;
function geradorDeSequenciaFibonacci(int $numeroDoUsuario) {
    if ($numeroDoUsuario >= 0 && $numeroDoUsuario <= 3) {
        return SEQUENCIA_INICIAL[$numeroDoUsuario]; 
    }elseif($numeroDoUsuario > 2){
        $sequencia = SEQUENCIA_INICIAL; //is this valid ?
        for($i = ($numeroDoUsuario - 3); $i >= 0; $i-- ){
            $sequencia[] = $sequencia[count($sequencia) - 1] + $sequencia[count($sequencia) - 2];
        }
        return $sequencia;
    };
}

$novaSequencia = geradorDeSequenciaFibonacci(10);

foreach ($novaSequencia as $numeroAtualDaSequencia){
    echo $numeroAtualDaSequencia .",";
}

