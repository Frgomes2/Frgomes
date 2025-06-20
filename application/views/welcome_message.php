<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Portfólio de Flavio Raphael Gomes - Desenvolvedor Full Stack">
  <title>Flavio Raphael Gomes | Desenvolvedor Full Stack</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1d4ed8;
      --dark: #1e293b;
      --light: #f8fafc;
      --gray: #94a3b8;
    }
    
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    
    body {
      font-family: 'Inter', sans-serif;
      line-height: 1.6;
      background-color: var(--light);
      color: var(--dark);
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
    }
    
    /* Header */
    header {
      padding: 4rem 2rem;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    
    header::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(255,255,255,0.05)" d="M0,0 L100,0 L100,100 L0,100 Z" /></svg>');
      background-size: cover;
      opacity: 0.1;
    }
    
    header h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      position: relative;
    }
    
    header p {
      font-size: 1.2rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
      position: relative;
    }
    
    /* Seções */
    section {
      padding: 4rem 0;
    }
    
    section:nth-child(even) {
      background-color: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .section-title {
      text-align: center;
      margin-bottom: 3rem;
      font-size: 2rem;
      color: var(--primary);
    }
    
    /* Sobre */
    .about {
      display: flex;
      align-items: center;
      gap: 3rem;
      flex-wrap: wrap;
    }
    
    .about-text {
      flex: 1;
      min-width: 300px;
    }
    
    .about-text h3 {
      margin-bottom: 1rem;
      font-size: 1.5rem;
    }
    
    .about-text p {
      margin-bottom: 1rem;
      color: var(--gray);
    }
    
    /* Habilidades */
    .skills {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      justify-content: center;
      max-width: 800px;
      margin: 0 auto;
    }
    
    .skill {
      background: white;
      padding: 0.5rem 1rem;
      border-radius: 50px;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .skill:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .skill img {
      height: 20px;
    }
    
    /* Projetos */
    .projects {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 2rem;
    }
    
    .project-card {
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    }
    
    .project-card:hover {
      transform: translateY(-5px);
    }
    
    .project-image {
      height: 200px;
      background: #eee;
      position: relative;
      overflow: hidden;
    }
    
    .project-content {
      padding: 1.5rem;
    }
    
    .project-content h3 {
      margin-bottom: 0.5rem;
    }
    
    .project-content p {
      color: var(--gray);
      margin-bottom: 1rem;
    }
    
    .project-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-top: 1rem;
    }
    
    .project-tag {
      background: var(--light);
      padding: 0.3rem 0.8rem;
      border-radius: 50px;
      font-size: 0.8rem;
    }
    
    /* Contato */
    .contact-links {
      display: flex;
      justify-content: center;
      gap: 2rem;
      margin-top: 2rem;
    }
    
    .contact-links a {
      color: var(--dark);
      font-size: 2rem;
      transition: color 0.3s, transform 0.3s;
    }
    
    .contact-links a:hover {
      color: var(--primary);
      transform: scale(1.1);
    }
    
    /* Footer */
    footer {
      text-align: center;
      padding: 2rem;
      background: var(--dark);
      color: white;
    }
    
    /* Responsividade */
    @media (max-width: 768px) {
      header {
        padding: 3rem 1rem;
      }
      
      header h1 {
        font-size: 2rem;
      }
      
      .section-title {
        font-size: 1.5rem;
      }
      
      .about {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <h1>Flavio Raphael Gomes</h1>
      <p>Desenvolvedor Full Stack com experiência em PHP, Ruby on Rails, Python e JavaScript</p>
    </div>
  </header>

  <section id="sobre">
    <div class="container">
      <h2 class="section-title">Sobre Mim</h2>
      <div class="about">
        <div class="about-text">
          <h3>Olá, eu sou o Flavio!</h3>
          <p>Desenvolvedor Full Stack com X anos de experiência criando soluções web robustas e escaláveis. Apaixonado por resolver problemas complexos através de código limpo e eficiente.</p>
          <p>Minha abordagem combina habilidades técnicas sólidas com uma compreensão profunda das necessidades do negócio, garantindo que cada projeto atinja seus objetivos de forma eficaz.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="habilidades">
    <div class="container">
      <h2 class="section-title">Habilidades</h2>
      <div class="skills">
        <span class="skill"><img src="https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white" alt="PHP" /> PHP</span>
        <span class="skill"><img src="https://img.shields.io/badge/Ruby_on_Rails-CC0000?style=flat&logo=ruby-on-rails&logoColor=white" alt="Ruby on Rails" /> Ruby on Rails</span>
        <span class="skill"><img src="https://img.shields.io/badge/Python-3776AB?style=flat&logo=python&logoColor=white" alt="Python" /> Python</span>
        <span class="skill"><img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black" alt="JavaScript" /> JavaScript</span>
        <span class="skill"><img src="https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white" alt="MySQL" /> MySQL</span>
        <span class="skill"><img src="https://img.shields.io/badge/PostgreSQL-336791?style=flat&logo=postgresql&logoColor=white" alt="PostgreSQL" /> PostgreSQL</span>
        <span class="skill"><img src="https://img.shields.io/badge/CodeIgniter-E44D26?style=flat&logo=codeigniter&logoColor=white" alt="CodeIgniter" /> CodeIgniter</span>
        <span class="skill"><img src="https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white" alt="HTML5" /> HTML5</span>
        <span class="skill"><img src="https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white" alt="CSS3" /> CSS3</span>
        <span class="skill"><img src="https://img.shields.io/badge/jQuery-0769AD?style=flat&logo=jquery&logoColor=white" alt="jQuery" /> jQuery</span>
        <span class="skill"><img src="https://img.shields.io/badge/Bootstrap-7952B3?style=flat&logo=bootstrap&logoColor=white" alt="Bootstrap" /> Bootstrap</span>
      </div>
    </div>
  </section>

  <section id="projetos">
    <div class="container">
      <h2 class="section-title">Projetos</h2>
      <div class="projects">
        <div class="project-card">
          <div class="project-image"></div>
          <div class="project-content">
            <h3>Sistema de Gerenciamento</h3>
            <p>Plataforma completa desenvolvida em PHP e MySQL para gestão de processos internos.</p>
            <div class="project-tags">
              <span class="project-tag">PHP</span>
              <span class="project-tag">MySQL</span>
              <span class="project-tag">Bootstrap</span>
            </div>
          </div>
        </div>
        
        <div class="project-card">
          <div class="project-image"></div>
          <div class="project-content">
            <h3>E-commerce</h3>
            <p>Loja virtual desenvolvida com Ruby on Rails e PostgreSQL.</p>
            <div class="project-tags">
              <span class="project-tag">Ruby on Rails</span>
              <span class="project-tag">PostgreSQL</span>
              <span class="project-tag">JavaScript</span>
            </div>
          </div>
        </div>
        
        <div class="project-card">
          <div class="project-image"></div>
          <div class="project-content">
            <h3>Aplicativo Web</h3>
            <p>Aplicação Python com Django para análise de dados.</p>
            <div class="project-tags">
              <span class="project-tag">Python</span>
              <span class="project-tag">Django</span>
              <span class="project-tag">Chart.js</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contato">
    <div class="container">
      <h2 class="section-title">Contato</h2>
      <p style="text-align: center; max-width: 600px; margin: 0 auto 2rem;">
        Estou disponível para oportunidades de trabalho e colaborações. Sinta-se à vontade para entrar em contato!
      </p>
      <div class="contact-links">
	  <a href="flavio.raphael@msn.com" target="_blank" title="Email"><i class="fas fa-envelope"></i></a>
        <a href="https://github.com/Frgomes2" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
        <a href="https://www.linkedin.com/in/flavio-raphael-gomes-405847182/" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
        <a href="https://wa.me/5545998242585" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; <span id="year">2025</span> Flavio Raphael Gomes. Todos os direitos reservados.</p>
    </div>
  </footer>

  <script>
    // Atualiza o ano no footer automaticamente
    document.getElementById('year').textContent = new Date().getFullYear();
    
    // Suave scroll para as seções
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
    
    // Efeito de digitação no cabeçalho (opcional)
    const typedText = document.querySelector('header p');
    if (typedText) {
      const text = typedText.textContent;
      typedText.textContent = '';
      let i = 0;
      const typing = setInterval(() => {
        typedText.textContent += text[i];
        i++;
        if (i === text.length) clearInterval(typing);
      }, 50);
    }
  </script>
</body>
</html>
