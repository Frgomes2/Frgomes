
  <!-- Partículas de fundo -->
  <div class="particles" id="particles"></div>
  
  <!-- Efeitos de brilho -->
  <div class="glow glow-1"></div>
  <div class="glow glow-2"></div>
  
  <div class="login-container animate__animated animate__fadeIn">
    <h2 class="animate__animated animate__fadeInDown">Faça seu login</h2>
    <form method="post" action="admin/signin" id="loginForm" name="loginForm" class="parsley-form login100-form validate-form">
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Digite seu email" required />
        <div class="input-icon">✉️</div>
      </div>
      <div class="input-group">
        <label for="senha">Senha</label>
        <input type="password" id="senha" placeholder="Digite sua senha" required />
        <div class="input-icon">🔒</div>
      </div>

      <div class="forgot">
        <a href="#">
          Esqueceu sua senha?
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </div>

      <button type="submit" class="animate__animated animate__fadeInUp">Entrar</button>
    </form>
  </div>

  <script>
    // Criar partículas dinâmicas
    function createParticles() {
      const particlesContainer = document.getElementById('particles');
      const particleCount = 20;
      
      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.classList.add('particle');
        
        // Posição e tamanho aleatórios
        const size = Math.random() * 10 + 5;
        const posX = Math.random() * 100;
        const posY = Math.random() * 100 + 100;
        const delay = Math.random() * 15;
        const duration = Math.random() * 20 + 10;
        
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.left = `${posX}%`;
        particle.style.top = `${posY}%`;
        particle.style.animationDelay = `${delay}s`;
        particle.style.animationDuration = `${duration}s`;
        
        particlesContainer.appendChild(particle);
      }
    }
    
    // Efeito de digitação no placeholder
    function typeWriterEffect() {
      const emailInput = document.getElementById('email');
      const phrases = ["seu@email.com", "contato@exemplo.com", "usuario@dominio.com"];
      let currentPhrase = 0;
      let charIndex = 0;
      let isDeleting = false;
      let typingSpeed = 100;
      
      function type() {
        const currentText = phrases[currentPhrase];
        
        if (isDeleting) {
          emailInput.placeholder = currentText.substring(0, charIndex - 1);
          charIndex--;
          typingSpeed = 50;
        } else {
          emailInput.placeholder = currentText.substring(0, charIndex + 1);
          charIndex++;
          typingSpeed = 100;
        }
        
        if (!isDeleting && charIndex === currentText.length) {
          isDeleting = true;
          typingSpeed = 1500; // Pausa no final
        } else if (isDeleting && charIndex === 0) {
          isDeleting = false;
          currentPhrase = (currentPhrase + 1) % phrases.length;
          typingSpeed = 500; // Pausa no início
        }
        
        setTimeout(type, typingSpeed);
      }
      
      setTimeout(type, 1000);
    }
    
    
    // Inicializar efeitos
    window.addEventListener('DOMContentLoaded', () => {
      createParticles();
    });
  </script>
