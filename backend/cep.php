<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $cep = isset($_GET['cep']) ? preg_replace('/\D/', '', $_GET['cep']) : '';

    if (strlen($cep) != 8) {
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['error' => 'CEP deve conter 8 dígitos']);
        exit();
    }

    // Make the request 
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    $response = file_get_contents($url);
    
    // valid response?
    if ($response === false) {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'Erro ao buscar cep']);
        exit();
    }

    // decode the JSON response from ViaCEP
    $data = json_decode($response, true);
    
    if (isset($data['erro']) && $data['erro']) {
        header('HTTP/1.1 404 Not Found');
        echo json_encode(['error' => 'CEP não encontrado']);
        exit();
    }

    // return the data to the frontend
    echo json_encode($data);
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['error' => 'Método não permitido']);
}
?>
