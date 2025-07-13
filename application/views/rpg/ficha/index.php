  <title>Ficha Kaelion - Estilo LoL</title>
  <link href="https://fonts.cdnfonts.com/css/beaufort-for-lol" rel="stylesheet">
  <div class="container" >
    <div class="character-sheet">
    <h1>FICHA DE PERSONAGEM</h1>
    <div class="character-header">
      <img src="arquivos/rpg/fichas/<?=$personangem->per_id?>/avatar.jpg" alt="Kaelion Avatar" class="character-image">
      <div class="character-info">
        <div class="character-name"><?=$personangem->per_nome?>“<?=$personangem->per_apelido?>”</div>
        <div class="character-class"><?=$personangem->per_classe?></div>
        <div class="character-region"><?=$personangem->per_regiao?></div>
      </div>
    </div>

    <h2>ATRIBUTOS</h2>
    <div class="stats-grid">
      <div class="stat-card"><div class="stat-name">Força</div><div class="stat-value"><?=$personangem->per_forca?></div></div>
      <div class="stat-card"><div class="stat-name">Agilidade</div><div class="stat-value"><?=$personangem->per_agilidade?></div></div>
      <div class="stat-card"><div class="stat-name">Intelecto</div><div class="stat-value"><?=$personangem->per_intelecto?></div></div>
      <div class="stat-card"><div class="stat-name">Vontade</div><div class="stat-value"><?=$personangem->per_vontade?></div></div>
      <div class="stat-card"><div class="stat-name">Carisma</div><div class="stat-value"><?=$personangem->per_carisma?></div></div>
      <div class="stat-card"><div class="stat-name">Vitalidade</div><div class="stat-value"><?=$personangem->per_vitalidade?></div></div>
      <div class="stat-card"><div class="stat-name">HP</div><div class="stat-value"><?=$personangem->per_hp?></div></div>
      <div class="stat-card"><div class="stat-name">Defesa</div><div class="stat-value"><?=$personangem->per_defesa?></div></div>
      <div class="stat-card"><div class="stat-name">Iniciativa</div><div class="stat-value">1d20 + <?=$personangem->per_iniciativa?></div></div>
      <div class="stat-card"><div class="stat-name">Energia</div><div class="stat-value"><?=$personangem->per_energia?></div></div>
    </div>

    <div class="section-block">
      <h2>HISTÓRIA</h2>
      <pre><?=$personangem->per_historia?></pre>
    </div>

    <div class="section-block">
      <h2>HABILIDADES</h2>
      <div class="abilities-grid">
        <div class="ability-card">
          <div class="ability-name">Tiro Gambiarra</div>
          <div>Arma improvisada com munições aleatórias. Pode falhar.</div>
        </div>
        <div class="ability-card">
          <div class="ability-name">Bomba de Fita Isolante</div>
          <div>Explosão aleatória. Pode atingir aliados. Teste de CAR.</div>
        </div>
        <div class="ability-card">
          <div class="ability-name">Fumaça do Truqueiro</div>
          <div>Cortina de fumaça que confunde inimigos e facilita fuga.</div>
        </div>
        <div class="ability-card">
          <div class="ability-name">Tiro Gambiarra Hextec</div>
          <div>Versão melhorada com efeitos baseados na munição.</div>
        </div>
        <div class="ability-card">
          <div class="ability-name">Falha Criticamente Calculada (ULT)</div>
          <div>Explosão com efeitos aleatórios. Pode causar falhas ou acertos críticos.</div>
        </div>
      </div>
    </div>

	<?php if($observacoes):?>
		<div class="section-block">
			<?php foreach ($observacoes as  $obs):?>
				<h2><?=nl2br($obs->obs_titulo)?></h2>
				<pre><?= nl2br($obs->obs_conteudo)?> </pre>
			<?php endforeach;?>
		</div>
	<?php endif;?>

    <div class="section-block">
      <h2>INVENTÁRIO</h2>
      <div class="inventory-grid">
        <div class="item-slot"></div>
        <div class="item-slot"></div>
        <div class="item-slot"></div>
        <div class="item-slot"></div>
        <div class="item-slot"></div>
        <div class="item-slot"></div>
      </div>
    </div>
    </div>
  </div>
