<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Portfólio de Flavio Raphael Gomes sincronizado com o GitHub" />
  <title>Flavio Raphael Gomes | Portfólio</title>

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f4f8;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #2563eb;
      color: white;
      text-align: center;
      padding: 3rem 1rem;
    }

    header h1 {
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }

    header p {
      font-size: 1.1rem;
      opacity: 0.9;
    }

    #readme {
      background: white;
      max-width: 900px;
      margin: 2rem auto;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    }

    a {
      color: #2563eb;
    }

    pre {
      background: #f1f5f9;
      padding: 1rem;
      overflow-x: auto;
      border-radius: 5px;
    }

    img {
      max-width: 100%;
    }

    .repos-wrapper {
  display: flex;
  flex-direction: column;
  gap: 1.2rem;
}

.repo-card {
  background: #f1f5f9;
  border-left: 6px solid #2563eb;
  border-radius: 8px;
  padding: 1rem 1.5rem;
  transition: transform 0.2s ease;
}

.repo-card:hover {
  transform: translateY(-3px);
  background: #e0ecff;
}

.repo-card h3 {
  margin: 0;
  font-size: 1.2rem;
  color: #1d4ed8;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.repo-card p {
  margin: 0.5rem 0 0.8rem;
  color: #475569;
}

.repo-card a {
  text-decoration: none;
  color: #2563eb;
  font-weight: 500;
  display: inline-flex;
  align-items: center;
  gap: 0.3rem;
  transition: color 0.3s ease;
}

.repo-card a:hover {
  color: #1e40af;
}


    /* Responsivo */
    @media (max-width: 768px) {
      #readme {
        padding: 1rem;
      }
    }

     /* Adicione isso ao seu CSS existente */
  
  /* Melhorias gerais */
  :root {
    --primary-color: #2563eb;
    --primary-dark: #1d4ed8;
    --text-color: #1e293b;
    --light-bg: #f8fafc;
  }
  
  body {
    color: var(--text-color);
    line-height: 1.6;
  }
  
  /* Header aprimorado */
  header {
    background: linear-gradient(135deg, var(--primary-color), #1e40af);
    padding: 4rem 1rem;
    position: relative;
    overflow: hidden;
  }
  
  header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 10px;
    background: rgba(255,255,255,0.2);
  }
  
  header h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
  
  /* Cards de projetos aprimorados */
  .repo-card {
    background: white;
    border-left: 6px solid var(--primary-color);
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  }
  
  .repo-card:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  }
  
  /* Adicionar footer */
  footer {
    text-align: center;
    padding: 2rem;
    background: var(--light-bg);
    margin-top: 3rem;
  }
  </style>
</head>
<body>
  <header>
    <h1>Portfólio de Flavio Raphael Gomes</h1>
    <p>Conteúdo sincronizado com o README do GitHub</p>
  </header>

  <div id="readme">Carregando conteúdo do GitHub...</div>
  <section id="projetos" style="max-width: 900px; margin: 2rem auto; padding: 2rem; background: white; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.05);">
  <h2 style="text-align:center; color:#2563eb; font-size: 1.5rem;">📁 Meus Projetos Públicos no GitHub</h2>
  <div class="repos-wrapper" id="repos-container">Carregando projetos...</div>
</section>


  <script src="https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js"></script>
  <script>
    async function carregarReadme(usuario, repo, destinoId) {
      const url = `https://api.github.com/repos/${usuario}/${repo}/readme`;

      try {
        const resposta = await fetch(url, {
          headers: {
            Accept: "application/vnd.github.v3.raw"
          }
        });

        const markdown = await resposta.text();
        const converter = new showdown.Converter({
          tables: true,
          simplifiedAutoLink: true,
          ghCodeBlocks: true
        });
        const html = converter.makeHtml(markdown);
        document.getElementById(destinoId).innerHTML = html;

      } catch (e) {
        console.error("Erro ao carregar README:", e);
        document.getElementById(destinoId).innerText = "Erro ao carregar conteúdo.";
      }
    }

    carregarReadme("Frgomes2", "Frgomes2", "readme");
  </script>
  <script>
async function carregarRepos(usuario, destinoId) {
  const url = `https://api.github.com/users/${usuario}/repos?sort=updated`;

  try {
    const resposta = await fetch(url);
    const repos = await resposta.json();

    const container = document.getElementById(destinoId);
    container.innerHTML = '';

    repos.forEach(repo => {
      if (repo.fork) return;

      const div = document.createElement('div');
      div.className = 'repo-card';
      div.innerHTML = `
        <h3>📦 ${repo.name}</h3>
        <p>${repo.description || 'Sem descrição.'}</p>
        <a href="${repo.html_url}" target="_blank">🔗 Ver no GitHub</a>
      `;
      container.appendChild(div);
    });

  } catch (erro) {
    console.error('Erro ao carregar repositórios:', erro);
    document.getElementById(destinoId).innerText = 'Erro ao carregar repositórios.';
  }
}

carregarRepos("Frgomes2", "repos-container");

</script>
<!-- Adicione isso antes do fechamento do body -->
<footer>
  <p>© 2025 Flavio Raphael Gomes. Todos os direitos reservados.</p>
  <div style="margin-top: 1rem;">
    <a href="https://github.com/Frgomes2" target="_blank" style="margin: 0 0.5rem;">GitHub</a>
    <!-- Adicione outros links sociais se tiver -->
  </div>
</footer>
</body>
</html>
