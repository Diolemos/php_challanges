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
    return ERRO;
}

$resultadoFibonacci = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = isset($_POST["numero"]) ? (int)$_POST["numero"] : 0;
    if ($numero >= 0) {
        $resultadoFibonacci = geradorDeSequenciaFibonacci($numero);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador Fibonacci</title>
</head>
<body>
    <h2>Gerador de Sequencia Fibonacci</h2>
    <form method="post">
        <label for="numero">número:</label>
        <input type="number" name="numero" id="numero" min="0" required>
        <button type="submit">Gerar</button>
    </form>

    <?php if (!empty($resultadoFibonacci)): ?>
        <h3>Resultado:</h3>
        <ul>
            <?php foreach ($resultadoFibonacci as $num): ?>
                <li><?= $num ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>

