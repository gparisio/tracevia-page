<!-- 
    TRACEVIA - Página de Notícias
    Arquivo: app/views/noticias/index.php
-->

<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../layouts/header.php';
?>


<section class="page-section">
    <div class="page-header">
        <h2 style="font-size: 42px; color: #061922; font-weight: 700; margin-bottom: 30px;">
                NOTÍCIAS
            </h2>
        <p>Fique por dentro das últimas novidades, lançamentos e acontecimentos da TRACEVIA. Acompanhe nossos projetos, conquistas e inovações que estão transformando o mercado.</p>
    </div>
    
    <div class="page-divider"></div>
    
    <?php if (!empty($noticias)): ?>
        <div class="content-grid">
            <?php foreach ($noticias as $noticia): ?>
                <div class="content-card">
                    <div class="content-card-image" style="background-image: url('<?php echo UPLOADS_URL . '/' . $noticia['imagem']; ?>');">
                    </div>
                    <div class="content-card-body">
                        <div class="news-date" style="font-size: 14px; color: #999; margin-bottom: 10px;">
                            <?php echo $noticia['data_formatada']; ?>
                        </div>
                        <h3 class="content-card-title"><?php echo htmlspecialchars($noticia['titulo']); ?></h3>
                        <p class="content-card-description">
                            <?php echo htmlspecialchars(substr($noticia['resumo'], 0, 120)) . '...'; ?>
                        </p>
                        <a href="<?php echo SITE_URL; ?>/noticia/<?php echo $noticia['id']; ?>" class="btn-read-more">
                            Ler artigo
                            <span class="arrow">→</span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Paginação -->
        <?php if ($total_pages > 1): ?>
            <div class="pagination">
                <!-- Primeira página -->
                <?php if ($current_page > 1): ?>
                    <a href="?page=1">«</a>
                    <a href="?page=<?php echo $current_page - 1; ?>">‹</a>
                <?php else: ?>
                    <span class="disabled">«</span>
                    <span class="disabled">‹</span>
                <?php endif; ?>
                
                <!-- Páginas numeradas -->
                <?php
                $start = max(1, $current_page - 2);
                $end = min($total_pages, $current_page + 2);
                
                for ($i = $start; $i <= $end; $i++):
                ?>
                    <?php if ($i == $current_page): ?>
                        <span class="active"><?php echo $i; ?></span>
                    <?php else: ?>
                        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                
                <!-- Última página -->
                <?php if ($current_page < $total_pages): ?>
                    <a href="?page=<?php echo $current_page + 1; ?>">›</a>
                    <a href="?page=<?php echo $total_pages; ?>">»</a>
                <?php else: ?>
                    <span class="disabled">›</span>
                    <span class="disabled">»</span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
    <?php else: ?>
        <p style="text-align: center; padding: 60px 0; color: #666;">
            Nenhuma notícia encontrada no momento.
        </p>
    <?php endif; ?>
</section>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
