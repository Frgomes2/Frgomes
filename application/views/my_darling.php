<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>❤ Minha Amada ❤</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Sacramento&display=swap');

		/* Fundo animado com corações */
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
			margin: 10px 0 30px;
			font-weight: 600;
			text-shadow: 0 0 5px #bc1957aa;
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

		main {
			width: 90%;
			max-width: 960px;
			background: rgba(255 255 255 / 0.9);
			border-radius: 30px;
			box-shadow: 0 0 40px #ff1e56aa;
			padding: 40px 30px 60px;
			position: relative;
			z-index: 10;
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
			max-width: 90vw;
			max-height: 90vh;
			border-radius: 30px;
			overflow: hidden;
			box-shadow: 0 0 30px #ff417ccc;
			animation: popIn 0.5s ease forwards;
		}
		.modal-content img {
			width: 100%;
			height: auto;
			display: block;
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
			transition: opacity 1.2s ease;
		}

		.phrase.active {
			opacity: 1;
			position: relative;
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
		}
	</style>
</head>
<body>

<!-- Fundo com corações animados -->
<div class="hearts" aria-hidden="true"></div>

<header>
	<h1>❤ Minha Amada ❤</h1>
	<p>Você ilumina minha vida todos os dias</p>
</header>

<nav aria-label="Navegação do site">
	<button class="active" id="btn-gallery" aria-controls="gallery" aria-selected="true" role="tab">Fotos</button>
	<button id="btn-phrases" aria-controls="phrases" aria-selected="false" role="tab">Frases</button>
</nav>

<main>
	<section id="gallery" role="tabpanel" aria-hidden="false">
		<div class="gallery" aria-label="Galeria de fotos">
			<img src="foto1.jpg" alt="Nós na praia sorrindo" tabindex="0" />
			<img src="foto2.jpg" alt="Nosso jantar romântico" tabindex="0" />
			<img src="foto3.jpg" alt="Passeio no parque" tabindex="0" />
			<img src="foto4.jpg" alt="Viagem inesquecível" tabindex="0" />
			<img src="foto5.jpg" alt="Abraço apertado" tabindex="0" />
			<!-- Substitua pelas suas fotos -->
		</div>
	</section>
	<section id="phrases" role="tabpanel" aria-hidden="true" style="display:none; text-align:center;">
		<div class="phrases" aria-live="polite">
			<p class="phrase active">"Meu amor por você é infinito e cada dia cresce mais."</p>
			<p class="phrase">"Você é a luz que ilumina meus dias mais escuros."</p>
			<p class="phrase">"Estar ao seu lado é a minha felicidade completa."</p>
			<p class="phrase">"Com você, sonhar virou realidade."</p>
			<p class="phrase">"Nosso amor é a melodia mais bonita que já ouvi."</p>
			<!-- Adicione mais frases -->
		</div>
	</section>
</main>

<!-- Modal ampliado -->
<div class="modal" role="dialog" aria-modal="true" aria-label="Visualização da foto">
	<div class="modal-content">
		<button class="modal-close" aria-label="Fechar modal">&times;</button>
		<img src="" alt="" />
	</div>
</div>

<!-- Controle de música -->
<button aria-label="Tocar / Pausar música" class="music-control" id="music-btn" title="Tocar / Pausar música">
	<svg id="icon-play" viewBox="0 0 24 24">
		<path d="M8 5v14l11-7z" />
	</svg>
	<svg id="icon-pause" viewBox="0 0 24 24" style="display:none;">
		<path d="M6 19h4V5H6zm8-14v14h4V5z"/>
	</svg>
</button>

<audio id="music" loop>
	<source src="https://cdn.pixabay.com/download/audio/2022/03/25/audio_3366a460f2.mp3?filename=romantic-piano-10845.mp3" type="audio/mpeg">
	Seu navegador não suporta áudio.
</audio>

<script>
	// ===== Navegação Fotos x Frases
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

	// ===== Modal imagens
	const modal = document.querySelector('.modal');
	const modalImg = modal.querySelector('img');
	const modalCloseBtn = modal.querySelector('.modal-close');
	const galleryImgs = document.querySelectorAll('.gallery img');

	galleryImgs.forEach(img => {
		img.addEventListener('click', () => {
			modalImg.src = img.src;
			modalImg.alt = img.alt;
			modal.classList.add('active');
			modal.focus();
		});
		img.addEventListener('keydown', e => {
			if (e.key === 'Enter' || e.key === ' ') {
				e.preventDefault();
				img.click();
			}
		});
	});

	modalCloseBtn.addEventListener('click', () => {
		modal.classList.remove('active');
	});
	modal.addEventListener('click', e => {
		if (e.target === modal) {
			modal.classList.remove('active');
		}
	});
	document.addEventListener('keydown', e => {
		if (e.key === 'Escape' && modal.classList.contains('active')) {
			modal.classList.remove('active');
		}
	});

	// ===== Troca automática de frases com fade
	const phrasesList = document.querySelectorAll('.phrase');
	let currentPhrase = 0;

	function nextPhrase() {
		phrasesList[currentPhrase].classList.remove('active');
		currentPhrase = (currentPhrase + 1) % phrasesList.length;
		phrasesList[currentPhrase].classList.add('active');
	}

	setInterval(() => {
		if (phrases.style.display !== 'none') {
			nextPhrase();
		}
	}, 5000);

	// ===== Música de fundo
	const music = document.getElementById('music');
	const musicBtn = document.getElementById('music-btn');
	const iconPlay = document.getElementById('icon-play');
	const iconPause = document.getElementById('icon-pause');
	let isPlaying = false;

	musicBtn.addEventListener('click', () => {
		if (isPlaying) {
			music.pause();
		} else {
			music.play();
		}
	});

	music.onplay = () => {
		isPlaying = true;
		iconPlay.style.display = 'none';
		iconPause.style.display = 'block';
	};
	music.onpause = () => {
		isPlaying = false;
		iconPlay.style.display = 'block';
		iconPause.style.display = 'none';
	};

	// ===== Corações usados no fundo
	const heartsContainer = document.querySelector('.hearts');
	const heartsCount = 30;
	for (let i = 0; i < heartsCount; i++) {
		const heart = document.createElement('div');
		heart.classList.add('heart');
		heart.style.left = ${Math.random() * 100}vw;
		heart.style.fontSize = ${12 + Math.random() * 24}px;
		heart.style.animationDelay = ${Math.random() * 10}s;
		heart.style.animationDuration = ${6 + Math.random() * 6}s;
		heart.innerHTML = '❤';
		heartsContainer.appendChild(heart);
	}
</script>

</body>
</html>
