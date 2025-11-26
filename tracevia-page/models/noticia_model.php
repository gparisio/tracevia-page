<?php
require_once __DIR__ . '/../models/db.php';

class NoticiaModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Criar nova notícia
    public function create($titulo, $descricao, $slug, $date, $autor, $imagens) {
        $stmt = $this->pdo->prepare("INSERT INTO noticia (titulo, descricao, slug, date, autor) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$titulo, $descricao, $slug, $date, $autor]);
        $noticia_id = $this->pdo->lastInsertId();

        // salvar imagens
        if (!empty($imagens)) {
            foreach ($imagens as $img) {
                $stmtImg = $this->pdo->prepare("INSERT INTO noticia_img (noticia_id, image_path) VALUES (?, ?)");
                $stmtImg->execute([$noticia_id, $img]);
            }
        }
        return $noticia_id;
    }

    // Listar todas
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM noticia ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar por ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM noticia WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Editar
    public function update($id, $titulo, $descricao, $slug, $date, $autor) {
        $stmt = $this->pdo->prepare("UPDATE noticia SET titulo=?, descricao=?, slug=?, date=?, autor=? WHERE id=?");
        return $stmt->execute([$titulo, $descricao, $slug, $date, $autor, $id]);
    }

    // Deletar
    public function delete($id) {
        $stmtImg = $this->pdo->prepare("DELETE FROM noticia_img WHERE noticia_id = ?");
        $stmtImg->execute([$id]);

        $stmt = $this->pdo->prepare("DELETE FROM noticia WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Obter imagens da notícia
    public function getImages($noticia_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM noticia_img WHERE noticia_id = ?");
        $stmt->execute([$noticia_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        // Buscar últimas notícias
    public function getLatest($limit = 3) {
        $stmt = $this->pdo->prepare("SELECT * FROM noticia ORDER BY created_at DESC LIMIT ?");
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
?>
