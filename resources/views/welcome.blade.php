<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <title>ImobPrime - Seu imóvel dos sonhos está aqui</title>
    
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">Young<span>Imobiliaria</span></div>
            <nav>
                <ul>
                    <li><a href="#" class="nav-link active" data-target="home">Início</a></li>
                    <li><a href="#" class="nav-link" data-target="sobre">Sobre nós</a></li>
                    <li><a href="#" class="nav-link" data-target="contato">Contato</a></li>
                    <!-- <li><a href="#" class="nav-link" data-target="blog">Blog</a></li>
                    <li><a href="#" class="nav-link" data-target="depoimentos">Depoimentos</a></li> -->
                </ul>
            </nav>
            <div class="mobile-menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>
    
    <!-- Seção Home (Ativa por padrão) -->
    <div id="home" class="section active">

        <section class="hero">
            <div class="hero-content">
                <h1>Seu imóvel dos sonhos está aqui</h1>
                <p>Casas, apartamentos e terrenos para compra ou aluguel. Oferecemos as melhores opções do mercado com atendimento personalizado.</p>
                <p>Encontre seu imóvel !</p>
            </div>
        </section>
        
        <section class="container">
            <div class="section-title">
                <h2>Descubra o Imóvel Ideal</h2>
                <p>Explore nossa seleção de imóveis para venda e aluguel</p>
            </div>
            
            <div class="categories">
                <button class="category-btn active" data-tab="all">Todos</button>
                <button class="category-btn" data-tab="venda-casas">Casas à Venda</button>
                <button class="category-btn" data-tab="venda-terrenos">Terrenos</button>
                <button class="category-btn" data-tab="aluguel">Aluguel</button>
            </div>
            
            <!-- Todos Imóveis (Active by default) -->
            <div class="tab-content active" id="all">
                <div class="properties">
                    @for ($i = 0; $i < count($data); $i++)
                       @if ($data[$i]['tipo'] === "compra")
                            <!-- Casa 1 (Venda) -->
                            <div class="property-card">
                                <div class="property-img">
                                    <img src="" alt="{{$data[$i]['nome']}}">
                                    <div class="property-label">Venda</div>
                                </div>
                                <div class="property-info">
                                    <h3>{{$data[$i]['nome']}}</h3>
                                    <p>{{$data[$i]['descricao']}}</p>
                                    <div class="property-meta">
                                        <span>{{$data[$i]['quartos']}} Quartos</span>
                                        <span>{{$data[$i]['banheiros']}} Banheiros</span>
                                        <span>{{$data[$i]['area']}} m²</span>
                                    </div>
                                    <div class="property-price">{{$data[$i]['valor']}} Kz</div>
                                    <a href="#" class="nav-link" data-target="contato" data-id="casa1" data-type="venda-casas">Agendar Visita</a>
                                </div>
                            </div>
                       @elseif ($data[$i]['tipo'] === "terreno")
                            <!-- Terreno 1 -->
                            <div class="property-card">
                                <div class="property-img">
                                    <img src="" alt="{{$data[$i]['nome']}}">
                                    <div class="property-label">Venda</div>
                                </div>
                                <div class="property-info">
                                    <h3>{{$data[$i]['nome']}}</h3>
                                    <p>{{$data[$i]['descricao']}}</p>
                                    <div class="property-meta">
                                        <span>{{$data[$i]['area']}} m²</span>
                                        <span>{{$data[$i]['zona']}}</span>
                                    </div>
                                    <div class="property-price">{{$data[$i]['valor']}} Kz</div>
                                    <a href="#" class="nav-link" data-target="contato" data-id="terreno1" data-type="venda-terrenos">Agendar Visita</a>
                                </div>
                            </div>
                       @elseif ($data[$i]['tipo'] === "aluguel")   
                            <!-- Casa 2 (Aluguel) -->
                            <div class="property-card">
                                <div class="property-img">
                                    <img src="" alt="{{$data[$i]['nome']}}">
                                    <div class="property-label rent">Aluguel</div>
                                </div>
                                <div class="property-info">
                                    <h3>{{$data[$i]['nome']}}o</h3>
                                    <p>{{$data[$i]['descricao']}}</p>
                                    <div class="property-meta">
                                        <span>{{$data[$i]['quartos']}} Quartos</span>
                                        <span>{{$data[$i]['banheiros']}} Banheiro</span>
                                        <span>{{$data[$i]['area']}} m²</span>
                                    </div>
                                    <div class="property-price">{{$data[$i]['valor']}} Kz /mês</div>
                                    <a href="#" class="nav-link" data-target="contato" data-id="aluguel1" data-type="aluguel">Agendar Visita</a>
                                </div>
                            </div>
                       @endif     
                    @endfor
                </div>
            </div>
            
            @for ($i = 0; $i < count($data); $i++)
                @if ($data[$i]['tipo'] === "compra")
                    <!-- Casas à Venda Tab -->
                    <div class="tab-content" id="venda-casas">
                        <div class="properties">
                        <div class="property-card">
                                <div class="property-img">
                                    <img src="" alt="{{$data[$i]['nome']}}">
                                    <div class="property-label">Venda</div>
                                </div>
                                <div class="property-info">
                                    <h3>{{$data[$i]['nome']}}</h3>
                                    <p>{{$data[$i]['descricao']}}</p>
                                    <div class="property-meta">
                                        <span>{{$data[$i]['quartos']}} Quartos</span>
                                        <span>{{$data[$i]['banheiros']}} Banheiros</span>
                                        <span>{{$data[$i]['area']}} m²</span>
                                    </div>
                                    <div class="property-price">{{$data[$i]['valor']}} Kz</div>
                                    <a href="#"  class="nav-link" data-id="casa1" data-type="venda-casas" data-target="contato">Agendar Visita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($data[$i]['tipo'] === "terreno")
                    <!-- Terreno  -->
                    <div class="tab-content" id="venda-terrenos">
                        <div class="properties">
                            <div class="property-card">
                                <div class="property-img">
                                    <img src="" alt="{{$data[$i]['nome']}}">
                                <div class="property-label">Venda</div>
                            </div>
                            <div class="property-info">
                                <h3>{{$data[$i]['nome']}}</h3>
                                <p>{{$data[$i]['descricao']}}</p>
                                <div class="property-meta">
                                    <span>{{$data[$i]['area']}} m²</span>
                                    <span>{{$data[$i]['zona']}}</span>
                                </div>
                                <div class="property-price">{{$data[$i]['valor']}} Kz</div>
                                    <a href="#" class="nav-link" data-target="contato" data-id="terreno1" data-type="venda-terrenos">Agendar Visita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($data[$i]['tipo'] === "aluguel")   
                    <!-- Casa (Aluguel) -->
                    <div class="tab-content" id="aluguel">
                        <div class="properties">
                            <div class="property-card">
                                <div class="property-img">
                                    <img src="" alt="{{$data[$i]['nome']}}">
                                    <div class="property-label rent">Aluguel</div>
                                </div>
                                <div class="property-info">
                                    <h3>{{$data[$i]['nome']}}o</h3>
                                    <p>{{$data[$i]['descricao']}}</p>
                                    <div class="property-meta">
                                        <span>{{$data[$i]['quartos']}} Quartos</span>
                                        <span>{{$data[$i]['banheiros']}} Banheiro</span>
                                        <span>{{$data[$i]['area']}} m²</span>
                                    </div>
                                    <div class="property-price">{{$data[$i]['valor']}} Kz /mês</div>
                                    <a href="#" class="nav-link" data-target="contato" data-id="aluguel1" data-type="aluguel" >Agendar Visita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif     
            @endfor
                    
        </section>
        
        <section class="container">
            <div class="section-title">
                <h2>Por que escolher a YoungImobiliaria</h2>
                <p>Somos especialistas em encontrar o imóvel perfeito para você</p>
            </div>
            
            <div class="features">
                <div class="feature-item">
                    <div class="feature-icon">&#x1F3E0;</div>
                    <h3>Ampla variedade de imóveis</h3>
                    <p>Oferecemos uma vasta seleção de casas, apartamentos, terrenos e imóveis comerciais para atender todas as suas necessidades.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">&#x1F464;</div>
                    <h3>Atendimento personalizado</h3>
                    <p>Nossa equipe de corretores especializados está pronta para oferecer um atendimento exclusivo e encontrar exatamente o que você procura.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">&#x1F4B0;</div>
                    <h3>Financiamento facilitado</h3>
                    <p>Trabalhamos com os melhores bancos para oferecer as melhores condições de financiamento para a compra do seu imóvel.</p>
                </div>
            </div>
        </section>

    </div>
    
    <!-- Seção Sobre Nós -->
    <div id="sobre" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Sobre a ImobPrime</h2>
                <p>Conheça nossa história e nossos valores</p>
            </div>
            
            <div>
                <p>A YoungImobiliaria é uma imobiliária com 2 anos de experiência no mercado, dedicada a proporcionar as melhores experiências de compra, venda e locação de imóveis.</p>
                <p>Fundada em 2024, nossa empresa cresceu com base na confiança e na satisfação de nossos clientes. Nossa missão é facilitar o acesso à moradia e a investimentos imobiliários, oferecendo um serviço completo e transparente.</p>
                <p>Contamos com uma equipe de corretores altamente qualificados e com profundo conhecimento do mercado local, prontos para oferecer um atendimento personalizado e encontrar as melhores oportunidades para você.</p>
                <p>Na YoungImobiliaria, valorizamos a transparência, a ética e o compromisso com nossos clientes. Nosso objetivo é construir relacionamentos duradouros, baseados na confiança e na satisfação.</p>
            </div>
        </div>
    </div>
    
    <!-- Seção Contato -->
    <div id="contato" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Entre em Contato</h2>
                <p>Estamos à disposição para atender você</p>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                <div>
                    <h3>Informações de Contato</h3>
                    <p><strong>Endereço:</strong> Av. Principal, 1000 - Centro</p>
                    <p><strong>Telefone:</strong> (11) 5555-1234</p>
                    <p><strong>WhatsApp:</strong> (11) 98765-4321</p>
                    <p><strong>Email:</strong> contato@imobprime.com.br</p>
                    <p><strong>Horário de Funcionamento:</strong> Segunda a Sexta, das 9h às 18h | Sábado, das 9h às 13h</p>
                </div>
                
                <div>
                    <h3>Envie uma Mensagem</h3>
                    <form style="display: grid; gap: 15px;">
                        <input type="text" placeholder="Nome completo" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <input type="email" placeholder="E-mail" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <input type="tel" placeholder="Telefone" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <textarea placeholder="Mensagem" rows="5" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;"></textarea>
                        <button type="submit" class="btn">Enviar Mensagem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Seção Blog -->
    <div id="blog" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Blog ImobPrime</h2>
                <p>Dicas e informações sobre o mercado imobiliário</p>
            </div>
            
            <!-- <div class="properties">
                <div class="property-card">
                    <div class="property-img">
                        <img src="/api/placeholder/400/300" alt="Dicas para comprar seu primeiro imóvel">
                    </div>
                    <div class="property-info">
                        <h3>Dicas para comprar seu primeiro imóvel</h3>
                        <p>Confira as principais dicas para quem está planejando comprar seu primeiro imóvel e evite cair em armadilhas comuns.</p>
                        <p><small>Publicado em: 15/03/2025</small></p>
                        <a href="#" class="btn btn-sm">Ler mais</a>
                    </div>
                </div>
            </div> -->
            
        </div>
    </div>
    
    <!-- Seção Depoimentos -->
    <div id="depoimentos" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Depoimentos</h2>
                <p>O que nossos clientes dizem sobre nós</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                <div style="background-color: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                    <p style="font-style: italic;">"Excelente atendimento! A ImobPrime me ajudou a encontrar a casa dos meus sonhos em apenas duas semanas. A corretora Ana foi super atenciosa e me mostrou opções que realmente se encaixavam no meu perfil."</p>
                    <p style="margin-top: 15px; font-weight: 600;">Carlos Silva</p>
                    <p style="font-size: 14px; color: #666;">São Paulo - SP</p>
                </div>
                
                <div style="background-color: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                    <p style="font-style: italic;">"Já é a terceira vez que fecho negócio com a ImobPrime. A seriedade e o profissionalismo da equipe fazem toda a diferença. Recomendo a todos que estão procurando um imóvel."</p>
                    <p style="margin-top: 15px; font-weight: 600;">Maria Oliveira</p>
                    <p style="font-size: 14px; color: #666;">Rio de Janeiro - RJ</p>
                </div>
                
                <div style="background-color: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                    <p style="font-style: italic;">"O processo de financiamento do meu apartamento foi muito mais fácil do que eu imaginava, graças à ajuda da ImobPrime. Eles cuidaram de toda a burocracia e me mantiveram informado durante todo o processo."</p>
                    <p style="margin-top: 15px; font-weight: 600;">Fernando Santos</p>
                    <p style="font-size: 14px; color: #666;">Belo Horizonte - MG</p>
                </div>
            </div>
        </div>
    </div>
        
    <footer>
        <div class="footer-content">
            <div>
                <div class="footer-logo">Young<span>Imobiliaria</span></div>
                <p>Seu parceiro imobiliário de confiança. Ajudamos você a encontrar o imóvel perfeito para suas necessidades.</p>
            </div>
            
            <div class="footer-contact">
                <h4>Contato</h4>
                <p>Av. Principal, 1000 - Centro</p>
                <p>(11) 5555-1234</p>
                <p>contato@imobprime.com.br</p>
            </div>
            
            <div class="footer-social">
                <h4>Redes Sociais</h4>
                <div class="social-icons">
                    <a href="#" title="Facebook">F</a>
                    <a href="#" title="Instagram">I</a>
                    <a href="#" title="LinkedIn">L</a>
                    <a href="#" title="YouTube">Y</a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 YoungImobiliaria. Todos os direitos reservados.</p>
        </div>
    </footer>
    
    <script src="/js/index.js"></script>
</body>
</html>