<?php
require_once __DIR__ . '/../models/db.php';
require_once __DIR__ . '/../models/solucao_model.php';
$model = new SolucaoModel($pdo);

$action = $_GET['action'] ?? '';

switch ($action) {

    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $slug = $_POST['slug'];
            $autor = $_POST['autor'] ?? null;

            // upload de imagens
            $imagens = [];
            if (!empty($_FILES['imagens']['name'][0])) {
                foreach ($_FILES['imagens']['tmp_name'] as $key => $tmp_name) {
                    $nome = basename($_FILES['imagens']['name'][$key]);
                    $destino = "../uploads/" . uniqid() . "_" . $nome;
                    move_uploaded_file($tmp_name, $destino);
                    $imagens[] = $destino;
                }
            }

            $model->create($titulo, $descricao, $slug, $autor, $imagens);
            exit;
        }
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $model->delete($id);
        }
        header("Location: ../index.php");
        break;

        case 'update':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $slug = $_POST['slug'];
        $autor = $_POST['autor'];

        $model->update($id, $titulo, $descricao, $slug, $autor);
        header("Location: ../views/solucoes_dashboard.php");
        exit;
    }
    break;

    default:
        echo "Ação inválida.";
        break;

}
?>
