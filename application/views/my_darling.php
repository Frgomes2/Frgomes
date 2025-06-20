<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>❤ Minha Amada ❤</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Sacramento&display=swap');

		/* Estilos base */
		body {
			margin: 0;
			overflow-x: hidden;
			font-family: 'Poppins', sans-serif;
			background: radial-gradient(circle at center, #ffdde1, #ee9ca7);
			min-height: 100vh;
			display: flex;
			flex-direction: column;
			align-items: center;
			color: #83003c;
			position: relative;
			cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="%23ff1e56" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>'), auto;
		}

		/* Camadas parallax */
		.parallax-layer {
			position: fixed;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			z-index: 1;
			pointer-events: none;
		}

		.layer-1 {
			background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path fill="%23ff5c8d22" d="M50,30 C60,20 70,30 50,50 C30,30 40,20 50,30 Z"/></svg>');
			opacity: 0.3;
			animation: float 30s infinite linear;
		}

		.layer-2 {
			background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 100 100"><path fill="%23ff1e5622" d="M30,50 C20,40 30,30 50,50 C30,70 40,60 30,50 Z"/></svg>');
			opacity: 0.2;
			animation: floatReverse 40s infinite linear;
		}

		@keyframes float {
			0% { background-position: 0 0; }
			100% { background-position: 100px 100px; }
		}

		@keyframes floatReverse {
			0% { background-position: 100px 100px; }
			100% { background-position: 0 0; }
		}

		/* Partículas (corações) */
		.hearts {
			position: fixed;
			top: 0;
			left: 0;
			width: 100vw;
			height: 100vh;
			pointer-events: none;
			overflow: hidden;
			z-index: 0;
		}

		.heart {
			position: absolute;
			color: #ff5c8d;
			font-size: 16px;
			opacity: 0.8;
			animation-name: floatUp;
			animation-timing-function: ease-in-out;
			animation-iteration-count: infinite;
		}

		/* Variação dos corações */
		.heart:nth-child(odd) {
			animation-duration: 6s;
		}

		.heart:nth-child(even) {
			animation-duration: 8s;
		}

		.heart:nth-child(3n) {
			animation-duration: 10s;
		}

		/* Corações ao clicar */
		.heart-click {
			position: absolute;
			font-size: 24px;
			animation: heartClick 1s ease-out forwards;
			pointer-events: none;
			z-index: 100;
			color: #ff1e56;
		}

		@keyframes floatUp {
			0% {
				transform: translateY(100vh) scale(0.7) rotate(0deg);
				opacity: 0;
			}
			20% {
				opacity: 0.8;
			}
			100% {
				transform: translateY(-20vh) scale(1.2) rotate(360deg);
				opacity: 0;
			}
		}

		@keyframes heartClick {
			0% { transform: translate(-50%, -50%) scale(0); opacity: 1; }
			100% { transform: translate(-50%, -50%) scale(3); opacity: 0; }
		}

		/* Header */
		header {
			margin-top: 40px;
			text-align: center;
			z-index: 10;
			position: relative;
		}

		header h1 {
			font-family: 'Sacramento', cursive;
			font-size: 5rem;
			letter-spacing: 3px;
			margin: 0;
			text-shadow: 0 2px 6px #bc1957cc, 0 0 30px #ff4d7eaa;
			animation: pulse 2s infinite;
		}

		header p {
			font-size: 1.5rem;
			margin: 10px 0 5px;
			font-weight: 600;
			text-shadow: 0 0 5px #bc1957aa;
		}

		.love-counter {
			font-size: 1.2rem;
			margin-bottom: 20px;
			background: rgba(255,255,255,0.7);
			padding: 8px 20px;
			border-radius: 20px;
			box-shadow: 0 0 10px rgba(188, 25, 87, 0.3);
		}

		@keyframes pulse {
			0%, 100% {
				text-shadow:
					0 0 25px #ff6a95,
					0 0 40px #ff6a95,
					0 0 60px #ff4d7e,
					0 0 10px #ff4d7e;
				color: #ff1e56;
			}
			50% {
				text-shadow:
					0 0 15px #ff3050,
					0 0 25px #ff3050,
					0 0 40px #ff1e56,
					0 0 5px #ff1e56;
				color: #ef3b5a;
			}
		}

		/* Navegação */
		nav {
			display: flex;
			justify-content: center;
			gap: 30px;
			margin-bottom: 30px;
			position: relative;
			z-index: 10;
		}

		nav button {
			background: linear-gradient(45deg, #ff1e56, #ff6a95);
			border: none;
			padding: 14px 40px;
			border-radius: 40px;
			color: #fff;
			font-weight: 700;
			font-size: 1.2rem;
			cursor: pointer;
			box-shadow: 0 0 15px #ff1e56bb;
			transition: background 0.4s, box-shadow 0.4s, transform 0.2s;
			user-select: none;
		}

		nav button:hover, nav button.active {
			background: linear-gradient(45deg, #ff6a95, #ff1e56);
			box-shadow: 0 0 25px #ff417c, 0 0 40px #ff417cbb;
			transform: scale(1.1);
		}

		/* Conteúdo principal */
		main {
			width: 90%;
			max-width: 960px;
			background: rgba(255 255 255 / 0.9);
			border-radius: 30px;
			box-shadow: 0 0 40px #ff1e56aa;
			padding: 40px 30px 60px;
			position: relative;
			z-index: 10;
			margin-bottom: 40px;
		}

		/* Galeria */
		.gallery {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(140px,1fr));
			gap: 25px;
		}

		.gallery img {
			border-radius: 20px;
			box-shadow: 0 6px 20px #ff417cbb;
			cursor: pointer;
			transition: transform 0.3s ease, box-shadow 0.3s ease;
			width: 100%;
			height: 140px;
			object-fit: cover;
			filter: drop-shadow(0 0 8px #ff1e56aa);
		}

		.gallery img:hover {
			transform: scale(1.1);
			box-shadow: 0 10px 30px #ff6a95cc;
			filter: drop-shadow(0 0 15px #ff417ccee);
		}

		/* Modal */
		.modal {
			position: fixed;
			top: 0; left: 0;
			width: 100vw; height: 100vh;
			background: rgba(136, 14, 79, 0.9);
			display: flex;
			align-items: center;
			justify-content: center;
			visibility: hidden;
			opacity: 0;
			transition: opacity 0.4s ease;
			z-index: 9999;
		}

		.modal.active {
			visibility: visible;
			opacity: 1;
		}

		.modal-content {
			position: relative;
			width: 100vw;
			height: 100vh;
			border-radius: 0;
			overflow: hidden;
			box-shadow: none;
			background: black;
			animation: popIn 0.5s ease forwards;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.modal-content img {
			width: auto;
			height: 100%;
			object-fit: contain;
		}

		@keyframes popIn {
			0% {
				transform: scale(0.8);
				opacity: 0;
			}
			100% {
				transform: scale(1);
				opacity: 1;
			}
		}

		.modal-close {
			position: absolute;
			top: 15px; right: 15px;
			background: #ff1e56;
			border: none;
			border-radius: 50%;
			width: 40px;
			height: 40px;
			font-weight: 900;
			font-size: 1.8rem;
			color: white;
			cursor: pointer;
			box-shadow: 0 0 18px #ff417ccc;
			transition: background 0.3s;
			user-select: none;
			line-height: 40px;
			text-align: center;
			z-index: 10;
		}

		.modal-close:hover {
			background: #ff6a95;
		}

		/* Frases */
		.phrases {
			font-family: 'Sacramento', cursive;
			font-size: 2.7rem;
			color: #d81b60;
			text-align: center;
			min-height: 140px;
			position: relative;
			overflow: hidden;
		}

		.phrase {
			position: absolute;
			width: 100%;
			opacity: 0;
			top: 0;
			left: 0;
			transition: opacity 1.2s ease, transform 1.2s ease;
			transform: translateY(20px);
		}

		.phrase.active {
			opacity: 1;
			position: relative;
			transform: translateY(0);
		}

		/* Música */
		.music-control {
			position: fixed;
			bottom: 20px;
			right: 20px;
			background: #ff1e56;
			border-radius: 50%;
			height: 60px;
			width: 60px;
			box-shadow: 0 0 20px #ff417ccc;
			border: 2px solid white;
			cursor: pointer;
			display: flex;
			justify-content: center;
			align-items: center;
			z-index: 20;
			transition: background 0.3s;
		}

		.music-control:hover {
			background: #ff6a95;
		}

		.music-control svg {
			fill: white;
			width: 28px;
			height: 28px;
		}

		/* Responsividade */
		@media (max-width: 600px) {
			header h1 {
				font-size: 3.8rem;
			}

			header p {
				font-size: 1.2rem;
			}

			.love-counter {
				font-size: 1rem;
				padding: 6px 15px;
			}

			nav button {
				padding: 10px 25px;
				font-size: 1rem;
			}

			main {
				padding: 30px 20px 50px;
			}

			.gallery img {
				height: 110px;
			}

			.phrases {
				font-size: 2rem;
				min-height: 110px;
			}

			.music-control {
				width: 50px;
				height: 50px;
			}
		}
	</style>
</head>
<body>

<!-- Camadas parallax -->
<div class="parallax-layer layer-1"></div>
<div class="parallax-layer layer-2"></div>

<!-- Fundo com corações animados -->
<div class="hearts" aria-hidden="true"></div>

<header>
	<h1>❤ Minha Amada ❤</h1>
	<p>Você ilumina minha vida todos os dias</p>
	<div class="love-counter">
		Estamos juntos há <span id="days-together">0</span> dias!
	</div>
</header>

<nav aria-label="Navegação do site">
	<button class="active" id="btn-gallery" aria-controls="gallery" aria-selected="true" role="tab">Fotos</button>
	<button id="btn-phrases" aria-controls="phrases" aria-selected="false" role="tab">Frases</button>
</nav>

<main>
	<section id="gallery" role="tabpanel" aria-hidden="false" style="display: block;">
		<div class="gallery" aria-label="Galeria de fotos">
			<img loading="lazy" src="assets/imagens/my_darling/foto1.jpeg" alt="Com você, até no meio da multidão, eu só enxergo o nosso amor.">
			<img loading="lazy" src="assets/imagens/my_darling/foto2.jpeg" alt="Te ter ao meu lado é o meu maior presente todos os dias.">
			<img loading="lazy" src="assets/imagens/my_darling/foto3.jpeg" alt="Seu sorriso ilumina meu coração como o nascer do sol.">
			<img loading="lazy" src="assets/imagens/my_darling/foto4.jpeg" alt="Nossas loucuras juntos são as lembranças mais doces da minha vida.">
			<img loading="lazy" src="assets/imagens/my_darling/foto5.jpeg" alt="Na simplicidade de um momento, mora o nosso infinito.">
			<img loading="lazy" src="assets/imagens/my_darling/foto6.jpeg" alt="Segurar sua mão é segurar o mundo que eu sempre sonhei.">
			<img loading="lazy" src="assets/imagens/my_darling/foto7.jpeg" alt="Com você, até o vento na praia parece dizer 'eu te amo'.">
			<img loading="lazy" src="assets/imagens/my_darling/foto8.jpeg" alt="Nosso amor em um momento especial.">
		</div>
	</section>

	<section id="phrases" role="tabpanel" aria-hidden="true" style="display: none; text-align: center;">
		<div class="phrases" aria-live="polite">
			<p class="phrase active">"Com você, até no meio da multidão, eu só enxergo o nosso amor."</p>
			<p class="phrase">"Te ter ao meu lado é o meu maior presente todos os dias."</p>
			<p class="phrase">"Seu sorriso ilumina meu coração como o nascer do sol."</p>
			<p class="phrase">"Nossas loucuras juntos são as lembranças mais doces da minha vida."</p>
			<p class="phrase">"Na simplicidade de um momento, mora o nosso infinito."</p>
			<p class="phrase">"Segurar sua mão é segurar o mundo que eu sempre sonhei."</p>
			<p class="phrase">"Com você, até o vento na praia parece dizer 'eu te amo'."</p>
		</div>
	</section>
</main>

<!-- Modal ampliado -->
<div class="modal" role="dialog" aria-modal="true" aria-label="Visualização da foto">
	<div class="modal-content">
		<button class="modal-close" aria-label="Fechar modal">×</button>
		<img src="" alt="">
	</div>
</div>

<!-- Controle de música -->
<div class="music-control" id="music-control" aria-label="Controle de música" role="button" aria-pressed="false" style="display: none">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
		<path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
	</svg>
</div>

<script>
	// ============ [ CONFIGURAÇÕES INICIAIS ] ============
	const startDate = new Date('2023-05-13'); // Data do início do relacionamento
	const symbols = ['❤', '愛', '恋', '好き', '永遠', '心']; // Símbolos para os corações
	const heartsContainer = document.querySelector('.hearts');
	const heartsCount = 40;

	// ============ [ INICIALIZAÇÃO ] ============
	document.addEventListener('DOMContentLoaded', () => {
		// Configura contador de dias
		setupDaysCounter();

		// Cria corações animados
		createHearts();

		// Configura controles de música
		setupMusicPlayer();

		// Configura navegação por tabs
		setupTabNavigation();

		// Configura galeria de fotos
		setupGallery();

		// Configura carrossel de frases
		setupPhrasesCarousel();

		// Configura corações ao clicar
		setupClickHearts();
	});

	// ============ [ FUNÇÕES PRINCIPAIS ] ============

	// Contador de dias juntos
	function setupDaysCounter() {
		const today = new Date();
		const diffTime = Math.abs(today - startDate);
		const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
		document.getElementById('days-together').textContent = diffDays;
	}

	// Cria corações flutuantes
	function createHearts() {
		for (let i = 0; i < heartsCount; i++) {
			const el = document.createElement('div');
			el.classList.add('heart');
			const symbol = symbols[Math.floor(Math.random() * symbols.length)];
			el.innerHTML = symbol;
			el.style.left = `${Math.random() * 100}vw`;
			el.style.fontSize = `${12 + Math.random() * 24}px`;
			el.style.animationDelay = `${Math.random() * 10}s`;
			el.style.animationDuration = `${6 + Math.random() * 6}s`;
			heartsContainer.appendChild(el);
		}
	}

	// Configura player de música
	function setupMusicPlayer() {
		const music = document.getElementById('music');
		const musicControl = document.getElementById('music-control');
		let isPlaying = false;

		musicControl.addEventListener('click', () => {
			if (isPlaying) {
				music.pause();
				musicControl.setAttribute('aria-pressed', 'false');
				musicControl.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                    </svg>`;
			} else {
				music.play();
				musicControl.setAttribute('aria-pressed', 'true');
				musicControl.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                    </svg>`;
			}
			isPlaying = !isPlaying;
		});
	}

	// Navegação por tabs
	function setupTabNavigation() {
		const btnGallery = document.getElementById('btn-gallery');
		const btnPhrases = document.getElementById('btn-phrases');
		const gallery = document.getElementById('gallery');
		const phrases = document.getElementById('phrases');

		btnGallery.addEventListener('click', () => {
			btnGallery.classList.add('active');
			btnGallery.setAttribute('aria-selected', 'true');
			btnPhrases.classList.remove('active');
			btnPhrases.setAttribute('aria-selected', 'false');
			gallery.style.display = 'block';
			gallery.setAttribute('aria-hidden', 'false');
			phrases.style.display = 'none';
			phrases.setAttribute('aria-hidden', 'true');
		});

		btnPhrases.addEventListener('click', () => {
			btnPhrases.classList.add('active');
			btnPhrases.setAttribute('aria-selected', 'true');
			btnGallery.classList.remove('active');
			btnGallery.setAttribute('aria-selected', 'false');
			phrases.style.display = 'block';
			phrases.setAttribute('aria-hidden', 'false');
			gallery.style.display = 'none';
			gallery.setAttribute('aria-hidden', 'true');
		});
	}

	// Galeria de fotos
	function setupGallery() {
		const modal = document.querySelector('.modal');
		const modalImg = modal.querySelector('img');
		const modalCloseBtn = modal.querySelector('.modal-close');
		const galleryImgs = document.querySelectorAll('.gallery img');

		galleryImgs.forEach(img => {
			img.addEventListener('click', () => {
				modalImg.src = img.src;
				modalImg.alt = img.alt;
				modal.classList.add('active');
				document.body.style.overflow = 'hidden';
			});
		});

		modalCloseBtn.addEventListener('click', () => {
			modal.classList.remove('active');
			modalImg.src = '';
			document.body.style.overflow = 'auto';
		});

		modal.addEventListener('click', e => {
			if (e.target === modal) {
				modal.classList.remove('active');
				modalImg.src = '';
				document.body.style.overflow = 'auto';
			}
		});

		document.addEventListener('keydown', e => {
			if (e.key === 'Escape' && modal.classList.contains('active')) {
				modal.classList.remove('active');
				modalImg.src = '';
				document.body.style.overflow = 'auto';
			}

			if (modal.classList.contains('active')) {
				const currentIndex = Array.from(galleryImgs).findIndex(img => img.src === modalImg.src);

				if (e.key === 'ArrowRight') {
					const nextIndex = (currentIndex + 1) % galleryImgs.length;
					modalImg.src = galleryImgs[nextIndex].src;
					modalImg.alt = galleryImgs[nextIndex].alt;
				} else if (e.key === 'ArrowLeft') {
					const prevIndex = (currentIndex - 1 + galleryImgs.length) % galleryImgs.length;
					modalImg.src = galleryImgs[prevIndex].src;
					modalImg.alt = galleryImgs[prevIndex].alt;
				}
			}
		});
	}

	// Carrossel de frases
	function setupPhrasesCarousel() {
		const phrases = document.querySelectorAll('.phrase');
		let currentPhrase = 0;

		function showNextPhrase() {
			phrases[currentPhrase].classList.remove('active');
			currentPhrase = (currentPhrase + 1) % phrases.length;
			phrases[currentPhrase].classList.add('active');
		}

		setInterval(showNextPhrase, 5000);
	}

	// Corações ao clicar
	function setupClickHearts() {
		document.addEventListener('click', function(e) {
			const heart = document.createElement('div');
			heart.classList.add('heart-click');
			heart.innerHTML = symbols[0]; // Usa sempre o coração
			heart.style.left = `${e.clientX}px`;
			heart.style.top = `${e.clientY}px`;
			document.body.appendChild(heart);

			setTimeout(() => {
				heart.remove();
			}, 1000);
		});
	}
</script>
</body>
</html>
