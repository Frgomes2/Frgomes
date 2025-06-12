<html lang="pt-BR"><head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
<body cz-shortcut-listen="true">

<!-- Fundo com corações animados -->
<div class="hearts" aria-hidden="true"><div class="heart" style="left: 14.0203vw; font-size: 24.3697px; animation-delay: 0.720123s; animation-duration: 10.495s;">❤</div><div class="heart" style="left: 80.7216vw; font-size: 35.8554px; animation-delay: 1.03976s; animation-duration: 8.39609s;">❤</div><div class="heart" style="left: 24.5788vw; font-size: 27.4641px; animation-delay: 3.64612s; animation-duration: 9.24848s;">❤</div><div class="heart" style="left: 82.0499vw; font-size: 27.7181px; animation-delay: 2.72761s; animation-duration: 10.9294s;">❤</div><div class="heart" style="left: 45.0548vw; font-size: 20.7236px; animation-delay: 0.645192s; animation-duration: 10.8771s;">❤</div><div class="heart" style="left: 80.093vw; font-size: 14.6004px; animation-delay: 1.64435s; animation-duration: 9.43792s;">❤</div><div class="heart" style="left: 16.9947vw; font-size: 13.0733px; animation-delay: 7.56715s; animation-duration: 11.2115s;">❤</div><div class="heart" style="left: 54.7458vw; font-size: 15.6834px; animation-delay: 8.9161s; animation-duration: 7.08802s;">❤</div><div class="heart" style="left: 54.6286vw; font-size: 13.5942px; animation-delay: 3.56209s; animation-duration: 11.7613s;">❤</div><div class="heart" style="left: 28.4942vw; font-size: 22.3416px; animation-delay: 4.70394s; animation-duration: 11.6417s;">❤</div><div class="heart" style="left: 93.1327vw; font-size: 16.2878px; animation-delay: 0.590211s; animation-duration: 9.17262s;">❤</div><div class="heart" style="left: 17.059vw; font-size: 18.8579px; animation-delay: 0.753403s; animation-duration: 8.67813s;">❤</div><div class="heart" style="left: 61.8888vw; font-size: 30.6619px; animation-delay: 0.513405s; animation-duration: 8.87752s;">❤</div><div class="heart" style="left: 62.7837vw; font-size: 29.8357px; animation-delay: 7.70529s; animation-duration: 8.41041s;">❤</div><div class="heart" style="left: 66.9749vw; font-size: 18.2211px; animation-delay: 0.946978s; animation-duration: 9.54087s;">❤</div><div class="heart" style="left: 59.1342vw; font-size: 12.713px; animation-delay: 6.81255s; animation-duration: 10.1964s;">❤</div><div class="heart" style="left: 67.4985vw; font-size: 23.5533px; animation-delay: 0.242709s; animation-duration: 6.46886s;">❤</div><div class="heart" style="left: 45.856vw; font-size: 13.1334px; animation-delay: 6.25283s; animation-duration: 10.0292s;">❤</div><div class="heart" style="left: 12.4052vw; font-size: 27.5905px; animation-delay: 4.59146s; animation-duration: 11.5435s;">❤</div><div class="heart" style="left: 61.9136vw; font-size: 33.198px; animation-delay: 0.915175s; animation-duration: 11.7323s;">❤</div><div class="heart" style="left: 54.8101vw; font-size: 17.0872px; animation-delay: 3.57594s; animation-duration: 6.71549s;">❤</div><div class="heart" style="left: 59.4484vw; font-size: 31.3517px; animation-delay: 4.57043s; animation-duration: 10.0985s;">❤</div><div class="heart" style="left: 23.5041vw; font-size: 17.0253px; animation-delay: 7.46225s; animation-duration: 7.71466s;">❤</div><div class="heart" style="left: 3.82222vw; font-size: 28.4393px; animation-delay: 6.08664s; animation-duration: 7.2388s;">❤</div><div class="heart" style="left: 96.8231vw; font-size: 27.4496px; animation-delay: 8.38525s; animation-duration: 8.26036s;">❤</div><div class="heart" style="left: 77.4593vw; font-size: 19.0962px; animation-delay: 1.81936s; animation-duration: 11.5207s;">❤</div><div class="heart" style="left: 94.469vw; font-size: 28.2783px; animation-delay: 1.21993s; animation-duration: 7.89302s;">❤</div><div class="heart" style="left: 12.4453vw; font-size: 15.8654px; animation-delay: 8.64818s; animation-duration: 6.87121s;">❤</div><div class="heart" style="left: 9.63654vw; font-size: 15.61px; animation-delay: 1.84702s; animation-duration: 7.7424s;">❤</div><div class="heart" style="left: 83.8056vw; font-size: 33.0337px; animation-delay: 3.53686s; animation-duration: 7.65412s;">❤</div></div>

<header>
	<h1>❤ Minha Amada ❤</h1>
	<p>Você ilumina minha vida todos os dias</p>
</header>

<nav aria-label="Navegação do site">
	<button class="active" id="btn-gallery" aria-controls="gallery" aria-selected="true" role="tab">Fotos</button>
	<button id="btn-phrases" aria-controls="phrases" aria-selected="false" role="tab">Frases</button>
</nav>

<main>
	<section id="gallery" role="tabpanel" aria-hidden="false" style="display: block;">
		<div class="gallery" aria-label="Galeria de fotos">
			<img src="assets/imagens/my_darling/foto1.jpeg" alt="Com você, até no meio da multidão, eu só enxergo o nosso amor.">
			<img src="assets/imagens/my_darling/foto2.jpeg" alt="Te ter ao meu lado é o meu maior presente todos os dias.">
			<img src="assets/imagens/my_darling/foto3.jpeg" alt="Seu sorriso ilumina meu coração como o nascer do sol.">
			<img src="assets/imagens/my_darling/foto4.jpeg" alt="Nossas loucuras juntos são as lembranças mais doces da minha vida.">
			<img src="assets/imagens/my_darling/foto5.jpeg" alt="Na simplicidade de um momento, mora o nosso infinito.">
			<img src="assets/imagens/my_darling/foto6.jpeg" alt="Segurar sua mão é segurar o mundo que eu sempre sonhei.">
			<img src="assets/imagens/my_darling/foto7.jpeg" alt="Com você, até o vento na praia parece dizer ‘eu te amo’.">
			<img src="assets/imagens/my_darling/foto8.jpeg" alt=".">
		</div>
	</section>
	<section id="phrases" role="tabpanel" aria-hidden="true" style="display: none; text-align: center;">
		<div class="phrases" aria-live="polite">
			<p class="phrase">"Com você, até no meio da multidão, eu só enxergo o nosso amor."</p>
			<p class="phrase">"Te ter ao meu lado é o meu maior presente todos os dias."</p>
			<p class="phrase">"Seu sorriso ilumina meu coração como o nascer do sol."</p>
			<p class="phrase">"Nossas loucuras juntos são as lembranças mais doces da minha vida."</p>
			<p class="phrase">"Na simplicidade de um momento, mora o nosso infinito."</p>
			<p class="phrase">"Segurar sua mão é segurar o mundo que eu sempre sonhei."</p>
			<p class="phrase">"Com você, até o vento na praia parece dizer ‘eu te amo’."</p>
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


<div class="modal" role="dialog" aria-modal="true" aria-label="Visualização da foto">
	<div class="modal-content">
		<button class="modal-close" aria-label="Fechar modal">×</button>
		<img src="" alt="">
	</div>
</div>

<audio id="music" loop="">
	<source src="https://cdn.pixabay.com/download/audio/2022/03/25/audio_3366a460f2.mp3?filename=romantic-piano-10845.mp3" type="audio/mpeg">
	Seu navegador não suporta áudio.
</audio>

<!-- ✨ Corações + Letras Japonesas de Amor ✨ -->
<div class="hearts" aria-hidden="true"></div>

<script>
	const symbols = ['❤', '愛', '恋', '好き', '永遠', '心'];
	const heartsContainer = document.querySelector('.hearts');
	const heartsCount = 40;

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
</script>

<script>
	const modal = document.querySelector('.modal');
	const modalImg = modal.querySelector('img');
	const modalCloseBtn = modal.querySelector('.modal-close');
	const galleryImgs = document.querySelectorAll('.gallery img');

	// Quando clicar numa imagem
	galleryImgs.forEach(img => {
		img.addEventListener('click', () => {
			modalImg.src = img.src;
			modalImg.alt = img.alt;
			modal.classList.add('active');
		});
	});

	// Fecha o modal clicando no botão X
	modalCloseBtn.addEventListener('click', () => {
		modal.classList.remove('active');
		modalImg.src = ''; // limpa pra não travar
	});

	// Fecha clicando fora da imagem
	modal.addEventListener('click', e => {
		if (e.target === modal) {
			modal.classList.remove('active');
			modalImg.src = '';
		}
	});

	// Fecha com ESC
	document.addEventListener('keydown', e => {
		if (e.key === 'Escape' && modal.classList.contains('active')) {
			modal.classList.remove('active');
			modalImg.src = '';
		}
	});
</script>

<script>
	document.addEventListener('DOMContentLoaded', () => {
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
	});
</script>

<style>
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

	@keyframes floatUp {
		0% {
			transform: translateY(100vh) scale(0.7) rotate(0deg);
			opacity: 0;
		}
		20% {
			opacity: 0.9;
		}
		100% {
			transform: translateY(-20vh) scale(1.2) rotate(360deg);
			opacity: 0;
		}
	}
</style>



</body></html>
