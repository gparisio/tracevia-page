<?php
require_once __DIR__ . '/../models/solucao_model.php';
$model = new SolucaoModel($pdo);
$solucoes = $model->getAll();

// Caminho padrão caso a solução não tenha imagem
$default_image_path = '../uploads/default_solucao.jpg';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Criar Solução</title>
    <link rel="stylesheet" href="../services/css/dashboard.css">
</head>

<body>

    <div class="container">

        <!-- FORMULÁRIO -->
        <div class="form-box">
            <h1>Criar Nova Solução</h1>

            <form action="../controllers/solucao_controller.php?action=create" method="POST" enctype="multipart/form-data">

                <label>Título:</label>
                <input type="text" name="titulo" required>

                <br><br>
                <label>Descrição:</label>
                <textarea name="descricao" required></textarea>

                <br><br>
                <label>Slug (ex: /nova-solucao):</label>
                <input type="text" name="slug" required>

                <br><br>
                <label>Autor:</label>
                <input type="text" name="autor">

                <br><br>
                <label>Imagens:</label>
                <input type="file" name="imagens[]" multiple>

                <br><br>
                <button type="submit">Cadastrar</button>
            </form>
        </div>

        <!-- LISTA DE SOLUÇÕES -->
        <div class="lista-box">
            <h2>Soluções Cadastradas</h2>

            <?php foreach ($solucoes as $s): ?>
                <?php
                // pega primeira imagem ou usa padrão
                $img = $default_image_path;

                $imgs = $model->getImages($s['id']);
                if ($imgs && isset($imgs[0]["image_path"])) {
                    $img = $imgs[0]["image_path"];
                }
                ?>

                <div class="item">
                    <img src="<?= $img ?>" alt="Imagem">

                    <div class="item-info">
                        <h3><?= htmlspecialchars($s['titulo']) ?></h3>
                        <p>Autor: <?= htmlspecialchars($s['autor'] ?: 'Não informado') ?></p>
                    </div>

                    <div class="btns">
                        <a href="../controllers/solucao_controller.php?action=edit&id=<?= $s['id'] ?>" class="btn-edit">Editar</a>
                        <a href="../controllers/solucao_controller.php?action=delete&id=<?= $s['id'] ?>" class="btn-del">Excluir</a>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            // Seleciona todos os botões de editar
            const editButtons = document.querySelectorAll(".btn-edit");

            editButtons.forEach(btn => {
                btn.addEventListener("click", async (e) => {
                    e.preventDefault();

                    const url = btn.getAttribute("href");
                    const id = url.split("id=")[1];

                    // Buscar dados da solução por AJAX
                    const response = await fetch("../controllers/api_get_solucao.php?id=" + id);
                    const data = await response.json();

                    // Preencher formulário
                    document.querySelector("input[name='titulo']").value = data.titulo;
                    document.querySelector("textarea[name='descricao']").value = data.descricao;
                    document.querySelector("input[name='slug']").value = data.slug;
                    document.querySelector("input[name='autor']").value = data.autor;

                    // Mudar título do formulário
                    document.querySelector(".form-box h1").innerText = "Editar Solução";

                    // Ajustar ação do formulário
                    const form = document.querySelector(".form-box form");
                    form.action = "../controllers/solucao_controller.php?action=update&id=" + id;

                    // Alterar texto do botão
                    form.querySelector("button").innerText = "Salvar Alterações";

                    // Rolar para cima
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                });
            });

        });
    </script>

</body>

</html>