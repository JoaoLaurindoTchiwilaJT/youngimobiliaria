// Estrutura resumida do front-end com integração de dados API

// 1) Adicione IDs aos elementos HTML para facilitar o JS
// No seu index.html:

/*
  Substitua o bloco estático .properties de Todas as categorias por algo como:

  <div class="tab-content active" id="all">
    <div id="propertiesContainerAll" class="properties"></div>
  </div>

  E nos outros tabs, coloque containers com IDs:
  - venda-casas → 'propertiesContainerVenda'
  - venda-terrenos → 'propertiesContainerTerrenos'
  - aluguel        → 'propertiesContainerAluguel'
*/

// 2) No index.js, substitua a chamada estática por funções que:
//    • Buscam /api/services
//    • Filtram por tipo e finalidade
//    • Populam cada container dinamicamente

// src/js/index.js

document.addEventListener('DOMContentLoaded', () => {
    
      
    // Navegação entre abas de imóveis
    const categoryBtns = document.querySelectorAll('.category-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            categoryBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            // Show corresponding tab content
            const tabId = this.getAttribute('data-tab');
            tabContents.forEach(tab => {
                if (tab.id === tabId) {
                    tab.classList.add('active');
                } else {
                    tab.classList.remove('active');
                }
            });
        });
    });
    
    // Navegação principal
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('.section');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links
            navLinks.forEach(l => l.classList.remove('active'));
            // Add active class to clicked link
            this.classList.add('active');
            
            // Show corresponding section
            const sectionId = this.getAttribute('data-target');
            sections.forEach(section => {
                if (section.id === sectionId) {
                    section.classList.add('active');
                } else {
                    section.classList.remove('active');
                }
            });
        });
    });
    
    
    // Mobile menu toggle
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const nav = document.querySelector('nav');
    
    mobileMenuBtn.addEventListener('click', function() {
        nav.classList.toggle('active');
    });
});