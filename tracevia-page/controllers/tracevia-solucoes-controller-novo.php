<?php
/**
 * TRACEVIA - Controller de Soluções
 * Arquivo: controllers/api_get_solucao.php
 * 
 * Este controller gerencia a listagem de soluções com paginação
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
// $solucoes = SolucaoModel::getAllPaginated($items_per_page, $offset);
// $total_items = SolucaoModel::countAll();

// Dados de exemplo (substituir pelos dados reais do banco)
$all_solucoes = [
    // Simular 15 soluções para testar paginação
    ['id' => 1, 'categoria' => 'TECNOLOGIA', 'titulo' => 'Sistema de Gestão de Tráfego', 'descricao' => 'Software avançado para gerenciamento de fluxo de veículos.', 'imagem' => 'sol1.jpg'],
    ['id' => 2, 'categoria' => 'TECNOLOGIA', 'titulo' => 'Circuito Fechado de TV', 'descricao' => 'Monitoramento em tempo real com alta resolução.', 'imagem' => 'sol2.jpg'],
    ['id' => 3, 'categoria' => 'INFRAESTRUTURA', 'titulo' => 'Centro de Controle', 'descricao' => 'Central integrada de operações e monitoramento.', 'imagem' => 'sol3.jpg'],
    ['id' => 4, 'categoria' => 'TECNOLOGIA', 'titulo' => 'Sistema de Contagem de Veículos', 'descricao' => 'Classificação e pesagem automática de veículos.', 'imagem' => 'sol4.jpg'],
    ['id' => 5, 'categoria' => 'INFRAESTRUTURA', 'titulo' => 'Painéis de Mensagens Variáveis', 'descricao' => 'Comunicação dinâmica com motoristas.', 'imagem' => 'sol5.jpg'],
    ['id' => 6, 'categoria' => 'TECNOLOGIA', 'titulo' => 'Detecção Automática de Incidentes', 'descricao' => 'Sistema inteligente de identificação de eventos.', 'imagem' => 'sol6.jpg'],
    ['id' => 7, 'categoria' => 'INFRAESTRUTURA', 'titulo' => 'Monitoramento Meteorológico', 'descricao' => 'Estações meteorológicas para rodovias.', 'imagem' => 'sol7.jpg'],
    ['id' => 8, 'categoria' => 'TECNOLOGIA', 'titulo' => 'Telefonia de Emergência', 'descricao' => 'Call boxes para atendimento em rodovias.', 'imagem' => 'sol8.jpg'],
    ['id' => 9, 'categoria' => 'CONSULTORIA', 'titulo' => 'Consultoria em ITS', 'descricao' => 'Planejamento de sistemas inteligentes de transporte.', 'imagem' => 'sol9.jpg'],
    ['id' => 10, 'categoria' => 'CONSULTORIA', 'titulo' => 'Gestão de Projetos', 'descricao' => 'Acompanhamento completo de implementação.', 'imagem' => 'sol10.jpg'],
    ['id' => 11, 'categoria' => 'DESENVOLVIMENTO', 'titulo' => 'Software Customizado', 'descricao' => 'Desenvolvimento de sistemas sob medida.', 'imagem' => 'sol11.jpg'],
    ['id' => 12, 'categoria' => 'DESENVOLVIMENTO', 'titulo' => 'Integração de Sistemas', 'descricao' => 'Conexão entre diferentes plataformas.', 'imagem' => 'sol12.jpg'],
    ['id' => 13, 'categoria' => 'INFRAESTRUTURA', 'titulo' => 'Manutenção Preventiva', 'descricao' => 'Serviços de manutenção de equipamentos.', 'imagem' => 'sol13.jpg'],
    ['id' => 14, 'categoria' => 'TECNOLOGIA', 'titulo' => 'Análise de Dados', 'descricao' => 'Big data aplicado ao tráfego rodoviário.', 'imagem' => 'sol14.jpg'],
    ['id' => 15, 'categoria' => 'CONSULTORIA', 'titulo' => 'Treinamento Técnico', 'descricao' => 'Capacitação de equipes operacionais.', 'imagem' => 'sol15.jpg'],
];

// Simular paginação (remover quando integrar com banco real)
$total_items = count($all_solucoes);
$solucoes = array_slice($all_solucoes, $offset, $items_per_page);

// Calcular total de páginas
$total_pages = ceil($total_items / $items_per_page);

// ==================== DEFINIR VARIÁVEIS DA VIEW ====================

$page_title = 'Soluções';

// ==================== RENDERIZAR A VIEW ====================

// 1. Incluir Header
require_once (__DIR__ . '/../views/layouts/header.php');

// 2. Incluir View de Soluções
require_once (__DIR__ . '/../views/solucoes/index.php');

// 3. Incluir Footer
require_once (__DIR__ . '/../views/layouts/footer.php');

?>
