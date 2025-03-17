<?php
    declare(strict_types = 1);

    function isPerfectNumber(int $n):bool{
        if ($n <= 1) return false;

        $sum = 0;
        for($i =1;$i<=$n /2;$i++){
            if($n % $i === 0){
                $sum += $i;
            }
        }
        return $sum === $n;
    }

    $result = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numero = isset($_POST["numero"]) ? (int)$_POST["numero"] : 0;

    if ($numero >= 0) {
        $result = isPerfectNumber($numero) ? "O número $numero é perfeito!" : "O número $numero não é perfeito.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Número Perfeito</title>
</head>
<body>
    <h2>Verificador de Número Perfeito</h2>
    <form method="post">
        <p>Digite um número para verificar se ele é perfeito.</p>
        <label for="numero">Número:</label>
        <input type="number" name="numero" id="numero" min="0" required>
        <button type="submit">Verificar</button>
    </form>

    <?php if ($result !== null): ?> 
        <h3>Resultado:</h3> 
        <p><?php echo $result; ?></p>
    <?php endif; ?>
</body>
</html>