<!-- 
    TRACEVIA - Homepage
    Arquivo: views/home/index.php
    
    IMPORTANTE: Este arquivo deve ser chamado pelo controller
    O controller já inclui header.php e footer.php automaticamente
-->

<!-- Hero Carousel -->
<section class="hero-carousel">
    <div class="carousel-slide active" style="background-image: url('https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=1600');">
        <div class="carousel-content">
            <h1>Conectando o futuro através da tecnologia</h1>
            <p>Desenvolvemos soluções inovadoras que transformam a forma como empresas operam e crescem no mercado global.</p>
            <button class="btn-primary" onclick="window.location.href='/tracevia-page/controllers/sobre.php'">Conheça nossos projetos →</button>
        </div>
    </div>
    
    <div class="carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1600');">
        <div class="carousel-content">
            <h1>Inovação que move o mundo</h1>
            <p>Com expertise em tecnologia de ponta, criamos sistemas inteligentes para otimizar processos e aumentar a eficiência.</p>
            <button class="btn-primary" onclick="window.location.href='/tracevia-page/controllers/sobre.php'">Saiba mais sobre nós →</button>
        </div>
    </div>
    
    <div class="carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1600');">
        <div class="carousel-content">
            <h1>Soluções sob medida para seu negócio</h1>
            <p>Oferecemos consultoria especializada e desenvolvimento de sistemas personalizados para empresas de todos os portes.</p>
            <button class="btn-primary" onclick="window.location.href='/tracevia-page/controllers/api_get_solucao.php'">Explore nossas soluções →</button>
        </div>
    </div>
    
    <div class="carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=1600');">
        <div class="carousel-content">
            <h1>Compromisso com a excelência</h1>
            <p>Nossa equipe altamente qualificada trabalha com dedicação para entregar resultados que superam expectativas.</p>
            <button class="btn-primary" onclick="window.location.href='/tracevia-page/controllers/contatos.php'">Entre em contato →</button>
        </div>
    </div>
    
    <div class="carousel-dots">
        <div class="dot active"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</section>

<!-- Legacy Section -->
<section class="legacy-section" id="sobre">
    <h2>O nosso legado inspira e compromete-nos na construção de um mundo melhor</h2>
    <p>Guiados pelos nossos princípios fundamentais: compromisso, criação de valor, inovação, qualidade e proximidade. Temos orgulho num passado que será motivo de orgulho no futuro que estamos a construir hoje.</p>
    <button class="btn-blue" onclick="window.location.href='/tracevia-page/tracevia-page/controllers/sobre_controller.php'">Saiba mais sobre o nosso propósito →</button>
</section>

<!-- Solutions Section -->
<section class="solutions-section" id="solucoes">

    <div class="solutions-header">
        <h2>Soluções</h2>
        <button class="btn-white" onclick="window.location.href='/tracevia-page/tracevia-page/controllers/tracevia-solucoes-controller-novo.php'">
            Mais soluções →
        </button>
    </div>

    <div class="solutions-grid">
        <?php if (!empty($solucoes)): ?>
            <?php foreach ($solucoes as $solucao): ?>
                <div class="solution-card"
                        style="background-image: url('uploads/<?php echo $solucao['imagem']; ?>');"
                        onclick="window.location.href='/tracevia-page/controllers/solucao_single.php?id=<?php echo $solucao['id']; ?>'">

                    <div class="solution-info">
                        <h3><?php echo htmlspecialchars(strtoupper($solucao['categoria'])); ?></h3>
                        <p><?php echo htmlspecialchars($solucao['titulo']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Cards de exemplo caso não tenha no banco -->
            <div class="solution-card" style="background-image: url('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=600');">
                <div class="solution-info">
                    <h3>TECNOLOGIA</h3>
                    <p>Sistemas Inteligentes</p>
                </div>
            </div>
            <div class="solution-card" style="background-image: url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600');">
                <div class="solution-info">
                    <h3>CONSULTORIA</h3>
                    <p>Transformação Digital</p>
                </div>
            </div>
            <div class="solution-card" style="background-image: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=600');">
                <div class="solution-info">
                    <h3>DESENVOLVIMENTO</h3>
                    <p>Aplicações Web e Mobile</p>
                </div>
            </div>
            <div class="solution-card" style="background-image: url('https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=600');">
                <div class="solution-info">
                    <h3>INFRAESTRUTURA</h3>
                    <p>Cloud Computing</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- News Section -->
<section class="news-section" id="noticias">
    <div class="news-header">
        <h2>Notícias</h2>
        <button class="btn-white" onclick="window.location.href='/tracevia-page/tracevia-page/controllers/tracevia-noticias-controller-novo.php'">Mais notícias →</button>
    </div>
    
    <div class="news-grid">
        <?php if (!empty($noticias)): ?>
            <?php foreach ($noticias as $noticia): ?>
                <div class="news-card">
                    <div class="news-date"><?php echo $noticia['data_formatada']; ?></div>
                    <h3><?php echo htmlspecialchars($noticia['titulo']); ?></h3>
                    <a href="/tracevia-page/controllers/noticia_single.php?id=<?php echo $noticia['id']; ?>" class="btn-link">Ler artigo →</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Notícias de exemplo caso não tenha no banco -->
            <div class="news-card">
                <div class="news-date">jun 29, 2025</div>
                <h3>TRACEVIA anuncia expansão para novos mercados</h3>
                <a href="#" class="btn-link">Ler artigo →</a>
            </div>
            <div class="news-card">
                <div class="news-date">mar 05, 2025</div>
                <h3>A TRACEVIA divulgou os seus resultados anuais de 2024</h3>
                <a href="#" class="btn-link">Ver publicação →</a>
            </div>
            <div class="news-card">
                <div class="news-date">mar 05, 2025</div>
                <h3>Nova parceria estratégica fortalece portfólio de soluções</h3>
                <a href="#" class="btn-link">Ver publicação →</a>
            </div>
        <?php endif; ?>
    </div>
</section>