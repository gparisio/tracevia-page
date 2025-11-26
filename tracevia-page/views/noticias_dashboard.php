<?php
require_once __DIR__ . '/../models/noticia_model.php';
$model = new NoticiaModel($pdo);
$noticias = $model->getAll();

// imagem padrão caso não exista
$default_image_path = '../uploads/default_noticia.jpg';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Gerenciar Notícias</title>
    <link rel="stylesheet" href="../services/css/dashboard.css">
</head>

<body>

    <div class="container">

        <!-- FORMULÁRIO PRINCIPAL (CRIAR OU EDITAR) -->
        <div class="form-box" id="mainFormBox">
            <h1 id="formTitle">Criar Nova Notícia</h1>

            <form id="mainForm" action="../controllers/noticia_controller.php?action=create" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" id="edit-id">

                <label>Título:</label>
                <input type="text" name="titulo" id="titulo" required>

                <br><br>
                <label>Descrição:</label>
                <textarea name="descricao" id="descricao" required></textarea>

                <br><br>
                <label>Slug (ex: /nova-noticia):</label>
                <input type="text" name="slug" id="slug" required>

                <br><br>
                <label>Data:</label>
                <input type="datetime-local" name="date" id="date" required>

                <br><br>
                <label>Autor:</label>
                <input type="text" name="autor" id="autor">

                <br><br>
                <label>Imagens:</label>
                <input type="file" name="imagens[]" multiple>

                <br><br>
                <button type="submit" id="submitButton">Cadastrar</button>
            </form>
        </div>

        <!-- LISTA DE NOTÍCIAS -->
        <div class="lista-box">
            <h2>Notícias Cadastradas</h2>

            <?php foreach ($noticias as $n): ?>
                <?php
                $img = $default_image_path;
                $imgs = $model->getImages($n["id"]);
                if ($imgs && isset($imgs[0]["image_path"])) {
                    $img = $imgs[0]["image_path"];
                }
                ?>

                <div class="item">

                    <img src="<?= $img ?>" alt="Imagem">

                    <div class="item-info">
                        <h3><?= htmlspecialchars($n['titulo']) ?></h3>
                        <p>Autor: <?= htmlspecialchars($n['autor'] ?: 'Não informado') ?></p>
                    </div>

                    <div class="btns">
                        <button class="btn-edit"
                            onclick='startEdit(
        <?= $n["id"] ?>,
        <?= json_encode($n["titulo"], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT) ?>,
        <?= json_encode($n["descricao"], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT) ?>,
        <?= json_encode($n["slug"], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT) ?>,
        <?= json_encode($n["date"], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT) ?>,
        <?= json_encode($n["autor"], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT) ?>
    )'>Editar</button>

                        <a href="../controllers/noticia_controller.php?action=delete&id=<?= $n['id'] ?>" class="btn-del">
                            Excluir
                        </a>
                    </div>

                </div>

            <?php endforeach; ?>
        </div>

    </div>

    <script>
        function startEdit(id, titulo, descricao, slug, date, autor) {

            console.log("Editando notícia ID:", id); // DEBUG

            // Garante que não existe erro com null
            titulo = titulo || "";
            descricao = descricao || "";
            slug = slug || "";
            autor = autor || "";
            date = date || "";

            document.getElementById("formTitle").innerText = "Editar Notícia";
            document.getElementById("submitButton").innerText = "Salvar Alterações";

            const form = document.getElementById("mainForm");
            form.action = "../controllers/noticia_controller.php?action=update&id=" + id;

            document.getElementById("edit-id").value = id;
            document.getElementById("titulo").value = titulo;
            document.getElementById("descricao").value = descricao;
            document.getElementById("slug").value = slug;

            // Ajustar formato da data para datetime-local
            let formattedDate = date.includes(" ") ? date.replace(" ", "T") : date;
            document.getElementById("date").value = formattedDate;

            document.getElementById("autor").value = autor;

            // Rola para o topo
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    </script>

</body>

</html>