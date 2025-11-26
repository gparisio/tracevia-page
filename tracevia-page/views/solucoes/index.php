<!-- 
    TRACEVIA - Página de Soluções
    Arquivo: app/views/solucoes/index.php
-->
<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../layouts/header.php';
?>



<section class="page-section">
    <div class="page-header">
        <h2 style="font-size: 42px; color: #061922; font-weight: 700; margin-bottom: 30px;">
                SOLUÇÕES
            </h2>
        <p>Desde finais dos anos 90, a Tracévia opera na área de ITS. Concebemos, instalamos e asseguramos a manutenção de sistemas em centenas de quilômetros de rodovias. A confiança demonstrada pelos nossos clientes, projeto após projeto, é produto da nossa qualidade, eficiência e eficácia.</p>
    </div>
    
    <div class="page-divider"></div>
    
    <?php if (!empty($solucoes)): ?>
        <div class="content-grid">
            <?php foreach ($solucoes as $solucao): ?>
                <div class="content-card">
                    <div class="content-card-image" style="background-image: url('<?php echo UPLOADS_URL . '/' . $solucao['imagem']; ?>');">
                    </div>
                    <div class="content-card-body">
                        <h3 class="content-card-title"><?php echo htmlspecialchars($solucao['titulo']); ?></h3>
                        <p class="content-card-description">
                            <?php echo htmlspecialchars(substr($solucao['descricao'], 0, 120)) . '...'; ?>
                        </p>
                        <a href="<?php echo SITE_URL; ?>/solucao/<?php echo $solucao['id']; ?>" class="btn-read-more">
                            Saber mais
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
            Nenhuma solução encontrada no momento.
        </p>
    <?php endif; ?>
</section>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
