<?php
/**
 * TRACEVIA - Controller da Home
 * Arquivo: controllers/api_get_noticias.php
 * 
 * Este controller gerencia a página inicial
 * Busca dados do backend e renderiza a view
 */

// Iniciar sessão se ainda não foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Incluir configurações (ajuste o caminho conforme sua estrutura)
require_once __DIR__ . '/../config/config.php';

// ==================== BUSCAR DADOS DO BACKEND ====================

// TODO: Aqui a equipe deve integrar com o backend existente
// Substituir estes arrays de exemplo pelos dados reais do banco

// Buscar últimas 3 notícias
// Exemplo: $noticias = NoticiaModel::getUltimas(3);
$noticias = [
    [
        'id' => 1,
        'titulo' => 'TRACEVIA anuncia expansão para novos mercados',
        'resumo' => 'Empresa abre novas filiais e amplia atuação no setor de tecnologia.',
        'imagem' => 'noticia1.jpg',
        'data_publicacao' => '2025-06-29',
        'data_formatada' => 'jun 29, 2025'
    ],
    [
        'id' => 2,
        'titulo' => 'A TRACEVIA divulgou os seus resultados anuais de 2024',
        'resumo' => 'Crescimento de 30% em relação ao ano anterior demonstra força da empresa.',
        'imagem' => 'noticia2.jpg',
        'data_publicacao' => '2025-03-05',
        'data_formatada' => 'mar 05, 2025'
    ],
    [
        'id' => 3,
        'titulo' => 'Nova parceria estratégica fortalece portfólio de soluções',
        'resumo' => 'Acordo permitirá desenvolvimento de produtos mais inovadores.',
        'imagem' => 'noticia3.jpg',
        'data_publicacao' => '2025-03-05',
        'data_formatada' => 'mar 05, 2025'
    ]
];

// Buscar 4 soluções em destaque
// Exemplo: $solucoes = SolucaoModel::getDestaque(4);
$solucoes = [
    [
        'id' => 1,
        'categoria' => 'TECNOLOGIA',
        'titulo' => 'Sistemas Inteligentes',
        'descricao' => 'Soluções avançadas de automação e inteligência artificial.',
        'imagem' => 'solucao1.jpg'
    ],
    [
        'id' => 2,
        'categoria' => 'CONSULTORIA',
        'titulo' => 'Transformação Digital',
        'descricao' => 'Consultoria especializada em modernização de processos.',
        'imagem' => 'solucao2.jpg'
    ],
    [
        'id' => 3,
        'categoria' => 'DESENVOLVIMENTO',
        'titulo' => 'Aplicações Web e Mobile',
        'descricao' => 'Desenvolvimento de apps sob medida para seu negócio.',
        'imagem' => 'solucao3.jpg'
    ],
    [
        'id' => 4,
        'categoria' => 'INFRAESTRUTURA',
        'titulo' => 'Cloud Computing',
        'descricao' => 'Migração e gestão de infraestrutura em nuvem.',
        'imagem' => 'solucao4.jpg'
    ]
];

// ==================== DEFINIR VARIÁVEIS DA VIEW ====================

// Título da página
$page_title = 'Home';

// Idioma atual (se necessário)
if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = 'PT';
}

// ==================== RENDERIZAR A VIEW ====================

// 1. Incluir Header (contém <html>, <head>, <body>, menu)
require_once (__DIR__ . '/../views/layouts/header.php');

// 2. Incluir View da Home (contém apenas o conteúdo)
require_once (__DIR__ . '/../views/home/index.php');

// 3. Incluir Footer (contém </body>, </html>, scripts)
require_once (__DIR__ . '/../views/layouts/footer.php');

?>
