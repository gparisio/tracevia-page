<?php
/**
 * TRACEVIA - Controller de Notícias
 * Arquivo: controllers/noticia_controller.php
 * 
 * Este controller gerencia a listagem de notícias com paginação
 */

// Iniciar sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Incluir configurações
require_once __DIR__ . '/../config/config.php';

// ==================== CONFIGURAÇÃO DE PAGINAÇÃO ====================

$items_per_page = 12; // 4 fileiras x 3 cards

// Pegar página atual da URL (padrão = 1)
$current_page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

// Calcular offset
$offset = ($current_page - 1) * $items_per_page;

// ==================== BUSCAR DADOS DO BACKEND ====================

// TODO: Integrar com o backend da equipe
// Exemplo de como buscar do banco:
// $noticias = NoticiaModel::getAllPaginated($items_per_page, $offset);
// $total_items = NoticiaModel::countAll();

// Função auxiliar para formatar data
function formatarData($data) {
    $meses = [
        '01' => 'jan', '02' => 'fev', '03' => 'mar', '04' => 'abr',
        '05' => 'mai', '06' => 'jun', '07' => 'jul', '08' => 'ago',
        '09' => 'set', '10' => 'out', '11' => 'nov', '12' => 'dez'
    ];
    
    $dataObj = new DateTime($data);
    $mes = $meses[$dataObj->format('m')];
    
    return $mes . ' ' . $dataObj->format('d, Y');
}

// Dados de exemplo (substituir pelos dados reais do banco)
$all_noticias = [
    // Simular 18 notícias para testar paginação (2 páginas)
    ['id' => 1, 'titulo' => 'TRACEVIA inaugura novo centro de operações', 'resumo' => 'Nova instalação amplia capacidade de monitoramento.', 'imagem' => 'not1.jpg', 'data_publicacao' => '2025-11-20'],
    ['id' => 2, 'titulo' => 'Expansão internacional em andamento', 'resumo' => 'Empresa inicia operações em mercados da América Latina.', 'imagem' => 'not2.jpg', 'data_publicacao' => '2025-10-15'],
    ['id' => 3, 'titulo' => 'Tecnologia 5G aplicada ao transporte', 'resumo' => 'Implementação de rede 5G melhora comunicação entre sistemas.', 'imagem' => 'not3.jpg', 'data_publicacao' => '2025-09-28'],
    ['id' => 4, 'titulo' => 'Parceria com universidades fortalece P&D', 'resumo' => 'Acordo de cooperação técnica amplia pesquisa em ITS.', 'imagem' => 'not4.jpg', 'data_publicacao' => '2025-09-10'],
    ['id' => 5, 'titulo' => 'TRACEVIA recebe prêmio de inovação', 'resumo' => 'Empresa é reconhecida por soluções tecnológicas avançadas.', 'imagem' => 'not5.jpg', 'data_publicacao' => '2025-08-22'],
    ['id' => 6, 'titulo' => 'Novos contratos assinados para 2026', 'resumo' => 'Crescimento de 40% em novos projetos confirmados.', 'imagem' => 'not6.jpg', 'data_publicacao' => '2025-08-05'],
    ['id' => 7, 'titulo' => 'Sistema de IA previne acidentes em rodovias', 'resumo' => 'Inteligência artificial reduz incidentes em 35%.', 'imagem' => 'not7.jpg', 'data_publicacao' => '2025-07-18'],
    ['id' => 8, 'titulo' => 'Sustentabilidade é foco de novos projetos', 'resumo' => 'Iniciativas verdes são incorporadas em todas as soluções.', 'imagem' => 'not8.jpg', 'data_publicacao' => '2025-07-01'],
    ['id' => 9, 'titulo' => 'TRACEVIA participa de congresso internacional', 'resumo' => 'Empresa apresenta cases de sucesso em evento global.', 'imagem' => 'not9.jpg', 'data_publicacao' => '2025-06-29'],
    ['id' => 10, 'titulo' => 'Resultados financeiros do 1º semestre', 'resumo' => 'Balanço mostra crescimento acima das expectativas.', 'imagem' => 'not10.jpg', 'data_publicacao' => '2025-06-15'],
    ['id' => 11, 'titulo' => 'Nova linha de produtos lançada', 'resumo' => 'Portfólio é expandido com soluções inovadoras.', 'imagem' => 'not11.jpg', 'data_publicacao' => '2025-05-28'],
    ['id' => 12, 'titulo' => 'Certificação internacional ISO obtida', 'resumo' => 'TRACEVIA conquista selos de qualidade reconhecidos.', 'imagem' => 'not12.jpg', 'data_publicacao' => '2025-05-10'],
    ['id' => 13, 'titulo' => 'Programa de trainee abre 50 vagas', 'resumo' => 'Empresa investe em formação de novos talentos.', 'imagem' => 'not13.jpg', 'data_publicacao' => '2025-04-22'],
    ['id' => 14, 'titulo' => 'Investimento em cibersegurança é ampliado', 'resumo' => 'Proteção de dados é prioridade nos sistemas desenvolvidos.', 'imagem' => 'not14.jpg', 'data_publicacao' => '2025-04-05'],
    ['id' => 15, 'titulo' => 'TRACEVIA completa 30 anos de atuação', 'resumo' => 'Celebração marca trajetória de sucesso da empresa.', 'imagem' => 'not15.jpg', 'data_publicacao' => '2025-03-18'],
    ['id' => 16, 'titulo' => 'A TRACEVIA divulgou os seus resultados anuais de 2024', 'resumo' => 'Crescimento de 30% em relação ao ano anterior.', 'imagem' => 'not16.jpg', 'data_publicacao' => '2025-03-05'],
    ['id' => 17, 'titulo' => 'Nova sede é inaugurada', 'resumo' => 'Instalações modernas aumentam capacidade operacional.', 'imagem' => 'not17.jpg', 'data_publicacao' => '2025-02-20'],
    ['id' => 18, 'titulo' => 'Projeto piloto de mobilidade urbana', 'resumo' => 'Cidade parceira testa soluções inteligentes de transporte.', 'imagem' => 'not18.jpg', 'data_publicacao' => '2025-02-05'],
];

// Formatar datas
foreach ($all_noticias as &$noticia) {
    $noticia['data_formatada'] = formatarData($noticia['data_publicacao']);
}

// Simular paginação (remover quando integrar com banco real)
$total_items = count($all_noticias);
$noticias = array_slice($all_noticias, $offset, $items_per_page);

// Calcular total de páginas
$total_pages = ceil($total_items / $items_per_page);

// ==================== DEFINIR VARIÁVEIS DA VIEW ====================

$page_title = 'Notícias';

// ==================== RENDERIZAR A VIEW ====================

// 1. Incluir Header
require_once (__DIR__ . '/../views/layouts/header.php');

// 2. Incluir View de Notícias
require_once (__DIR__ . '/../views/noticias/index.php');

// 3. Incluir Footer
require_once (__DIR__ . '/../views/layouts/footer.php');

?>
