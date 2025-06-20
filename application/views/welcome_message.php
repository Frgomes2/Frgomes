<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flavio Raphael Gomes</title>
    <style>
        :root {
            --primary: #2563eb;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #94a3b8;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        /* Header */
        header {
            padding: 2rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        /* Hero Section */
        .hero {
            padding: 6rem 0;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        
        .hero p {
            font-size: 1.2rem;
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        
        .btn {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 0.8rem 1.8rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
        }
        
        /* About Section */
        .about {
            padding: 5rem 0;
        }
        
        .section-title {
            font-size: 2rem;
            margin-bottom: 3rem;
            text-align: center;
        }
        
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }
        
        .about-text p {
            margin-bottom: 1.5rem;
            color: var(--gray);
        }
        
        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin-top: 1.5rem;
        }
        
        .skill {
            background-color: #e0e7ff;
            color: var(--primary);
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        /* Projects Section */
        .projects {
            padding: 5rem 0;
            background-color: #f1f5f9;
        }
        
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }
        
        .project-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);
        }
        
        .project-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
        
        .project-info {
            padding: 1.5rem;
        }
        
        .project-info h3 {
            margin-bottom: 0.5rem;
        }
        
        .project-info p {
            color: var(--gray);
            margin-bottom: 1rem;
        }
        
        .project-links {
            display: flex;
            gap: 1rem;
        }
        
        .project-links a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        /* Contact Section */
        .contact {
            padding: 5rem 0;
        }
        
        .contact-form {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
            font-size: 1rem;
        }
        
        .form-group textarea {
            height: 150px;
            resize: vertical;
        }
        
        /* Footer */
        footer {
            padding: 2rem 0;
            background-color: var(--dark);
            color: white;
            text-align: center;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .social-links a {
            color: white;
            font-size: 1.2rem;
            transition: color 0.3s;
        }
        
        .social-links a:hover {
            color: var(--primary);
        }
        
        @media (max-width: 768px) {
            .about-content {
                grid-template-columns: 1fr;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <div class="logo">SeuNome</div>
                <div class="nav-links">
                    <a href="#about">Sobre</a>
                    <a href="#projects">Projetos</a>
                    <a href="#contact">Contato</a>
                </div>
            </nav>
        </div>
    </header>
    
    <section class="hero">
        <div class="container">
            <h1>Olá, eu sou <span style="color: var(--primary);">SeuNome</span></h1>
            <p>Desenvolvedor Front-end especializado em criar experiências digitais incríveis e funcionais.</p>
            <a href="#projects" class="btn">Ver Projetos</a>
        </div>
    </section>
    
    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title">Sobre Mim</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>Olá! Meu nome é [Seu Nome] e sou um desenvolvedor front-end apaixonado por criar interfaces bonitas e funcionais. Com [X] anos de experiência, ajudo empresas a transformar suas ideias em realidade digital.</p>
                    <p>Minha abordagem combina design cuidadoso com código limpo e eficiente, sempre buscando a melhor experiência para o usuário final.</p>
                    <p>Quando não estou codando, você pode me encontrar [hobbies/interesses].</p>
                    
                    <div class="skills">
                        <span class="skill">HTML</span>
                        <span class="skill">CSS</span>
                        <span class="skill">JavaScript</span>
                        <span class="skill">React</span>
                        <span class="skill">UI/UX</span>
                        <span class="skill">Figma</span>
                    </div>
                </div>
                <div class="about-img">
                    <!-- Substitua pelo caminho da sua imagem -->
                    <img src="https://via.placeholder.com/400x500" alt="Sua Foto" style="width: 100%; border-radius: 8px;">
                </div>
            </div>
        </div>
    </section>
    
    <section id="projects" class="projects">
        <div class="container">
            <h2 class="section-title">Meus Projetos</h2>
            <div class="projects-grid">
                <!-- Projeto 1 -->
                <div class="project-card">
                    <img src="https://via.placeholder.com/350x200" alt="Projeto 1" class="project-img">
                    <div class="project-info">
                        <h3>Nome do Projeto 1</h3>
                        <p>Descrição breve do projeto e tecnologias utilizadas. O que você construiu e por quê.</p>
                        <div class="project-links">
                            <a href="#" target="_blank">Demo</a>
                            <a href="#" target="_blank">Código</a>
                        </div>
                    </div>
                </div>
                
                <!-- Projeto 2 -->
                <div class="project-card">
                    <img src="https://via.placeholder.com/350x200" alt="Projeto 2" class="project-img">
                    <div class="project-info">
                        <h3>Nome do Projeto 2</h3>
                        <p>Descrição breve do projeto e tecnologias utilizadas. O que você construiu e por quê.</p>
                        <div class="project-links">
                            <a href="#" target="_blank">Demo</a>
                            <a href="#" target="_blank">Código</a>
                        </div>
                    </div>
                </div>
                
                <!-- Projeto 3 -->
                <div class="project-card">
                    <img src="https://via.placeholder.com/350x200" alt="Projeto 3" class="project-img">
                    <div class="project-info">
                        <h3>Nome do Projeto 3</h3>
                        <p>Descrição breve do projeto e tecnologias utilizadas. O que você construiu e por quê.</p>
                        <div class="project-links">
                            <a href="#" target="_blank">Demo</a>
                            <a href="#" target="_blank">Código</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="contact" class="contact">
        <div class="container">
            <h2 class="section-title">Entre em Contato</h2>
            <div class="contact-form">
                <form>
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Mensagem</label>
                        <textarea id="message" required></textarea>
                    </div>
                    <button type="submit" class="btn">Enviar Mensagem</button>
                </form>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="container">
            <div class="social-links">
                <a href="#" target="_blank">GitHub</a>
                <a href="#" target="_blank">LinkedIn</a>
                <a href="#" target="_blank">Twitter</a>
                <a href="#" target="_blank">Instagram</a>
            </div>
            <p>&copy; 2025 SeuNome. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>