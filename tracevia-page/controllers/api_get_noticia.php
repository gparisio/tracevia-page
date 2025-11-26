<?php
require_once __DIR__ . '/../models/db.php';
require_once __DIR__ . '/../models/noticia_model.php';

$model = new NoticiaModel($pdo);

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(["error" => "ID não informado"]);
    exit;
}

$noticia = $model->getById($id);
echo json_encode($noticia);
?>
