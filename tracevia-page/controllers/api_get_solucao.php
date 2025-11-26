<?php
require_once __DIR__ . '/../models/db.php';
require_once __DIR__ . '/../models/solucao_model.php';

$model = new SolucaoModel($pdo);

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(["error" => "ID não informado"]);
    exit;
}

$solucao = $model->getById($id);
echo json_encode($solucao);
?>
