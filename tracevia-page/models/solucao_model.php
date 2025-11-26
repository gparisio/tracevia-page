<?php
require_once __DIR__ . '/../models/db.php';

class SolucaoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Criar nova solução
    public function create($titulo, $descricao, $slug, $autor, $imagens) {
        $stmt = $this->pdo->prepare("INSERT INTO solucao (titulo, descricao, slug, autor) VALUES (?, ?, ?, ?)");
        $stmt->execute([$titulo, $descricao, $slug, $autor]);
        $solucao_id = $this->pdo->lastInsertId();

        // salvar imagens
        if (!empty($imagens)) {
            foreach ($imagens as $img) {
                $stmtImg = $this->pdo->prepare("INSERT INTO solucao_img (solucao_id, image_path) VALUES (?, ?)");
                $stmtImg->execute([$solucao_id, $img]);
            }
        }
        return $solucao_id;
    }

    // Listar todas as soluções
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM solucao ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar solução por ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM solucao WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Editar solução
    public function update($id, $titulo, $descricao, $slug, $autor) {
        $stmt = $this->pdo->prepare("UPDATE solucao SET titulo=?, descricao=?, slug=?, autor=? WHERE id=?");
        return $stmt->execute([$titulo, $descricao, $slug, $autor, $id]);
    }

    // Deletar solução
    public function delete($id) {
        $stmtImg = $this->pdo->prepare("DELETE FROM solucao_img WHERE solucao_id = ?");
        $stmtImg->execute([$id]);

        $stmt = $this->pdo->prepare("DELETE FROM solucao WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Obter imagens da solução
    public function getImages($solucao_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM solucao_img WHERE solucao_id = ?");
        $stmt->execute([$solucao_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        // Buscar últimas soluções
    public function getLatest($limit = 3) {
        $stmt = $this->pdo->prepare("SELECT * FROM solucao ORDER BY created_at DESC LIMIT ?");
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
?>
