<!-- 
    TRACEVIA - Footer
    Arquivo: views/layouts/footer.php
-->
    <!-- Footer -->
    <footer class="footer" id="contatos">
        <div class="footer-content">
            <div>
                <a href="/tracevia-page/tracevia-page/controllers/tracevia-home-controller-novo.php">
                <img src="/tracevia-page/tracevia-page/assets/images/bluelogo_tracevia.png"
                     alt="logo-tracevia"
                     class="img-fluid"
                     style="max-width: 300px;">
            </a>
            </div>
            
            <div class="footer-links">
                <div class="footer-column">
                    <h4>Empresa</h4>
                    <ul>
                        <li><a href="/tracevia-page/tracevia-page/controllers/sobre.php">Sobre Nós</a></li>
                        <li><a href="/tracevia-page/tracevia-page/controllers/equipe.php">Nossa Equipe</a></li>
                        <li><a href="/tracevia-page/tracevia-page/controllers/carreiras.php">Carreiras</a></li>
                        <li><a href="/tracevia-page/tracevia-page/controllers/investidores.php">Investidores</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>Soluções</h4>
                    <ul>
                        <li><a href="/tracevia-page/tracevia-page/controllers/api_get_solucao.php">Todas as Soluções</a></li>
                        <li><a href="/tracevia-page/tracevia-page/controllers/api_get_solucao.php?categoria=tecnologia">Tecnologia</a></li>
                        <li><a href="/tracevia-page/tracevia-page/controllers/api_get_solucao.php?categoria=consultoria">Consultoria</a></li>
                        <li><a href="/tracevia-page/tracevia-page/controllers/api_get_solucao.php?categoria=desenvolvimento">Desenvolvimento</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>Suporte</h4>
                    <ul>
                        <li><a href="/tracevia-page/tracevia-page/controllers/noticia_controller.php">Notícias</a></li>
                        <li><a href="/tracevia-page/tracevia-page/controllers/contatos.php">Contatos</a></li>
                        <li><a href="/tracevia-page/tracevia-page/controllers/faq.php">FAQ</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-social">
                <h4>Siga-nos:</h4>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook">f</a>
                    <a href="#" aria-label="LinkedIn">in</a>
                    <a href="#" aria-label="YouTube">▶</a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="footer-bottom-links">
                <a href="/tracevia-page/tracevia-page/controllers/privacidade.php">Política de Privacidade</a>
                <a href="/tracevia-page/tracevia-page/controllers/cookies.php">Política de Cookies</a>
            </div>
            <div>© <?php echo date('Y'); ?> Tracevia</div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="/tracevia-page/tracevia-page/assets/js/main.js"></script>
</body>
</html>