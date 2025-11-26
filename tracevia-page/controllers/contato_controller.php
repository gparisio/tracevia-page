<?php
/**
 * TRACEVIA - Controller Contatos
 * Arquivo: controllers/contato_controller.php
 */

// Iniciar sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Incluir configurações (se tiver)
// require_once __DIR__ . '/../config/config.php';

// ==================== DEFINIR VARIÁVEIS DA VIEW ====================

$page_title = 'Contatos';

// ==================== RENDERIZAR A VIEW ====================

// 1. Incluir Header
require_once __DIR__ . '/../views/layouts/header.php';

// 2. Incluir View de Contatos
require_once __DIR__ . '/../views/contatos/index.php';

// 3. Incluir Footer
require_once __DIR__ . '/../views/layouts/footer.php';

?>