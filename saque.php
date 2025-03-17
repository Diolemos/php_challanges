
<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    function calcularNotas($valor) {
        $notas = [100, 50, 20, 10, 5, 2, 1]; // Notas e moeda disponíveis
        $resultado = "";

        if (!is_numeric($valor) || $valor <= 0) {
            return "Digite um valor válido.";
        }

        foreach ($notas as $nota) {
            $quantidade = floor($valor / $nota);
            $valor %= $nota;

            if ($quantidade > 0) {
                if ($nota == 1 && $quantidade == 1) {
                    $resultado .= "{$quantidade} moeda de {$nota}<br>";
                } elseif ($nota == 1) {
                    $resultado .= "{$quantidade} moedas de {$nota}<br>";
                } else {
                    $resultado .= "{$quantidade} nota(s) de {$nota}<br>";
                }
            }
        }

        return $resultado;
    }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Notas e Moedas</title>
</head>
<body>

    <h1>Calculadora de Notas e Moedas</h1>

    <form method="POST">
        <label for="valor">Digite o valor:</label>
        <input type="number" id="valor" name="valor" required>
        <button type="submit">Calcular</button>
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valor'])) {
            $valor = $_POST['valor'];
            $resultado = calcularNotas($valor);
            echo "<p><strong>Resultado:</strong><br>$resultado</p>";
        }
    ?>

</body>
</html>
