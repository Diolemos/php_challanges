<?php 
const NOT_FOUND = -1;
function binarySearch(array $arr, int $target) {
    $left = 0;
    $right = count($arr) - 1;

    while ($left <= $right) {
        $mid = floor(($left + $right) / 2);

        if ($arr[$mid] == $target) {
            return $mid; 
        } elseif ($arr[$mid] < $target) {
            $left = $mid + 1; 
        } else {
            $right = $mid - 1; 
        }
    }
    return NOT_FOUND; 
}

$result = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = isset($_POST["numero"]) ? (int)$_POST["numero"] : 0;
    $sortedArray = [1, 4, 6, 8, 15, 19, 22, 24, 26, 29, 33, 35, 37, 38, 40, 49, 51, 55];

    if ($numero >= 0) {
        $result = binarySearch($sortedArray,$numero);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca Binária</title>
</head>
<body>
    <h2>Busca Binária</h2>
    <form method="post">
        <p>Busque um número em uma lista binária.</p>
        <label for="numero">número:</label>
        <input type="number" name="numero" id="numero" min="0" required>
        <button type="submit">Buscar</button>
    </form>
    
    <!-- b -->
    <?php if (isset($result) && $result !== NOT_FOUND): ?>
        <h3>Resultado:</h3> 
        <p>O número foi encontrado no índice: <strong><?php echo $result; ?></strong></p>
    <?php elseif ($result === NOT_FOUND): ?>
        <h3>Número não encontrado.</h3>
    <?php endif; ?>
</body>
</html>