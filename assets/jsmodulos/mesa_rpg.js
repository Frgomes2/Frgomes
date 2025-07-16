var Script = function () {
	$(document).ready(function () {
		// Controle de atributos
		$('.stat-card').each(function () {
			const $card = $(this);
			const $valueEl = $card.find('.stat-value');

			const $controls = $('<div>').css('margin-top', '10px');
			const $minus = $('<button>').text('➖').css('margin-right', '5px').css('cursor', 'pointer');
			const $plus = $('<button>').text('➕').css('cursor', 'pointer');

			$minus.on('click', function () {
				let val = parseInt($valueEl.text());
				if (!isNaN(val) && val > 0) $valueEl.text(val - 1);
			});

			$plus.on('click', function () {
				let val = parseInt($valueEl.text());
				if (!isNaN(val)) $valueEl.text(val + 1);
			});

			$controls.append($minus, $plus);
			$card.append($controls);
		});

		// Dados das habilidades
		const habilidades = {
			'Tiro Gambiarra': {
				titulo: 'Tiro Gambiarra',
				custo: '0 Energia',
				alcance: '5-10 metros',
				recarga: 'Nenhuma',
				dano: 'CAR x1 + 1d6',
				efeito: `Dispara munição aleatória:<br>- Pedra: Dano normal<br>- Parafuso: -1 DEF inimigo<br>- Fósforo: Dano contínuo (1 + INT por 2 turnos)<br>- Tampa: Explosão 3m, AGI 10`,
				frase: 'Hora de disparar a bestábuja. Seja o que for que saia dela... vai doer!'
			},
			'Bomba de Fita Isolante': {
				titulo: 'Bomba de Fita Isolante Hextec',
				custo: '10 Energia',
				alcance: '10 metros',
				recarga: '4 turnos',
				dano: 'CAR + 1d6',
				efeito: 'Explosão aleatória. Teste de CAR vs RES 12 — se falhar, acerta aliado mais próximo.',
				frase: 'Fita isolante, pólvora e hextec... uma explosão garantida.'
			},
			'Fumaça do Truqueiro': {
				titulo: 'Fumaça do Truqueiro Hextec',
				custo: '15 Energia',
				alcance: 'Área de 6 metros ao redor',
				recarga: '4 turnos',
				dano: 'Nenhum',
				efeito: '-1 acerto inimigo, troca de posição possível',
				frase: 'Agora você me vê... agora não vê mais nada!'
			},
			'Tiro Gambiarra Hextec': {
				titulo: 'Tiro Gambiarra Hextec (Melhorado)',
				custo: '35 Energia',
				alcance: '15 metros',
				recarga: '3 turnos',
				dano: 'CAR + 3d8',
				efeito: 'Versão melhorada com munições aprimoradas com efeitos extras',
				frase: 'Às vezes, a gambiarra sai certa... às vezes, explode bonito.'
			},
			'Falha Criticamente Calculada (ULT)': {
				titulo: 'Falha Criticamente Calculada (Ultimate)',
				custo: '50 Energia',
				alcance: '6 metros (em área)',
				recarga: '8 turnos',
				dano: 'CAR x4 + 4d8',
				efeito: `1d6 define o efeito:<br>1 = falha crítica<br>2 = sem efeito<br>3 = explosão geral<br>4 = bônus de esquiva/ataque<br>5 = inimigos atordoados<br>6 = tudo isso sem afetar aliados.`,
				frase: 'Quando tudo falha ao mesmo tempo... pelo menos uma coisa dá certo.'
			}
		};

		// Criar modal
		const $modal = $('<div>', {
			css: {
				display: 'none',
				position: 'fixed',
				top: 0,
				left: 0,
				width: '100%',
				height: '100%',
				background: 'rgba(0,0,0,0.8)',
				zIndex: 9999,
				justifyContent: 'center',
				alignItems: 'center'
			}
		}).appendTo('body');

		const $modalContent = $('<div>', {
			css: {
				background: '#0a1428',
				color: '#f0e6d2',
				border: '2px solid #c8aa6e',
				borderRadius: '10px',
				padding: '20px',
				maxWidth: '600px',
				maxHeight: '90vh',
				overflowY: 'auto',
				boxShadow: '0 0 15px #c8aa6e'
			}
		}).appendTo($modal);

		$('body').append($modal);

		// Clique nas habilidades
		$('.ability-card').each(function () {
			const $card = $(this);
			const nome = $card.find('.ability-name').text().trim();
			$card.css('cursor', 'pointer').on('click', function () {
				const data = habilidades[nome];
				if (!data) return;

				$modalContent.html(`
          <span style="float:right;cursor:pointer;font-size:20px;" onclick="$(this).closest('div').parent().hide()">✖</span>
          <h2 style="color:#c8aa6e">${data.titulo}</h2>
          <p><strong>Custo:</strong> ${data.custo}</p>
          <p><strong>Alcance:</strong> ${data.alcance}</p>
          <p><strong>Recarga:</strong> ${data.recarga}</p>
          <p><strong>Dano:</strong> ${data.dano}</p>
          <p><strong>Efeito:</strong><br>${data.efeito}</p>
          <blockquote style="margin-top:10px;color:#e6b93d">“${data.frase}”</blockquote>
        `);

				$modal.css('display', 'flex');
			});
		});
	});
}();
