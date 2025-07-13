 <!-- Navbar -->
 <nav class="navbar">
    <a href="/" class="navbar-brand">
      <i class="fas fa-dragon"></i>
      Portal RPGomes
    </a>
    <div class="navbar-links">
      <a href="/" class="navbar-link">Home</a>
      <a href="/mesas.php" class="navbar-link">Mesas</a>
      <a href="/regras.php" class="navbar-link">Regras</a>
      <a href="/comunidade.php" class="navbar-link">Comunidade</a>
      
      <?php if(1 > 2):?>
        <?php if (@$_SESSION['RPG_USER']): ?>
        <span class="user-greeting">
          <i class="fas fa-user"></i> <?php echo htmlspecialchars($username); ?>
        </span>
        <a href="/personagens.php" class="navbar-link">
          <i class="fas fa-scroll"></i> Personagens
        </a>
        <a href="/logout.php" class="btn" style="padding: 8px 16px; font-size: 0.9rem;">
          <i class="fas fa-sign-out-alt"></i> Sair
        </a>
      <?php else: ?>
        <div class="login-container">
          <button class="login-btn">
            <i class="fas fa-sign-in-alt"></i> Entrar
          </button>
          <div class="dropdown-content">
            <a href="auth/google">
              <i class="fab fa-google"></i> Entrar com Google
            </a>
            <a href="auth/facebook">
              <i class="fab fa-facebook-f"></i> Entrar com Facebook
            </a>
            <a href="auth/twitch">
              <i class="fab fa-twitch"></i> Entrar com Twitch
            </a>
            <div class="dropdown-divider"></div>
            <a href="/registro.php">
              <i class="fas fa-user-plus"></i> Criar Conta
            </a>
          </div>
        </div>
      <?php endif; ?>
      <?php endif;?>

    </div>
  </nav>
  <img src="https://cdn-icons-png.flaticon.com/512/616/616554.png" class="floating-dragon" alt="Dragão" loading="lazy">
  <img src="https://cdn-icons-png.flaticon.com/512/3208/3208753.png" class="floating-runestone" alt="Runa" loading="lazy">