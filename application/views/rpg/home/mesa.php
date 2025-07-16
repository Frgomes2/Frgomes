  <!-- Main container -->
  <div class="container">
	  <!-- Characters panel -->
	  <div class="characters-panel">
		  <div class="panel-header">
			  <h2>Personagens</h2>
		  </div>
		  <div class="character-list" id="character-list"><div class="character-card selected" data-id="1752616062802">
				  <div class="character-name">FLAVIO RAPHAEL GOMES</div>
				  <div class="character-info">
					  <span>teste</span>
					  <span>undefined</span>
				  </div>
			  </div></div>
	  </div>

	  <!-- Character sheet -->
	  <?php foreach ($personangens as $personangem):?>
		  <div class="character-sheet" id="character-sheet-<?=$personangem->per_id?>">
			  <div class="character-header">
				  <img src="<?= BASE_URL?>arquivos/rpg/fichas/<?=$personangem->per_id?>/avatar.jpg" alt="Avatar" class="character-image">
				  <div class="character-main-info">
					  <h1 class="character-title" id="sheet-name"><?=@$personangem->per_nome?> / <?=@$personangem->per_apelido?></h1>
					  <p class="character-subtitle" id="sheet-class"><?=$personangem->per_classe?></p>
					  <p class="character-region" id="sheet-region"><?=$personangem->per_regiao?></p>
				  </div>
			  </div>

			  <!-- Stats -->
			  <div class="section-block">
				  <h2>ATRIBUTOS</h2>
				  <div class="stats-grid" id="stats-grid">
					  <div class="stat-card">
						  <div class="stat-name">Força</div>
						  <div class="stat-value"><?=$personangem->per_forca?></div>
					  </div>
					  <div class="stat-card">
						  <div class="stat-name">Agilidade</div>
						  <div class="stat-value"><?=$personangem->per_agilidade?></div>
					  </div><div class="stat-card">
						  <div class="stat-name">Intelecto</div>
						  <div class="stat-value"><?=$personangem->per_intelecto?></div>
					  </div><div class="stat-card">
						  <div class="stat-name">Vontade</div>
						  <div class="stat-value"><?=$personangem->per_vontade?></div>
					  </div><div class="stat-card">
						  <div class="stat-name">Carisma</div>
						  <div class="stat-value"><?=$personangem->per_carisma?></div>
					  </div><div class="stat-card">
						  <div class="stat-name">Vitalidade</div>
						  <div class="stat-value"><?=$personangem->per_vitalidade?></div>
					  </div><div class="stat-card">
						  <div class="stat-name">HP</div>
						  <div class="stat-value"><?=$personangem->per_hp + ($personangem->per_vitalidade* 2)?></div>
					  </div><div class="stat-card">
						  <div class="stat-name">Defesa</div>
						  <div class="stat-value"><?=$personangem->per_defesa + $personangem->per_agilidade?></div>
					  </div><div class="stat-card">
						  <div class="stat-name">Iniciativa</div>
						  <div class="stat-value">1d20</div>
					  </div><div class="stat-card">
						  <div class="stat-name">Energia</div>
						  <div class="stat-value"><?=$personangem->per_energia?></div>
					  </div>
				  </div>
			  </div>

			  <!-- Abilities -->
			  <div class="section-block">
				  <h2>HABILIDADES</h2>
				  <div class="abilities-grid">
					  <?php if($habilidades[$personangem->per_id]):?>
						  <?php foreach ($habilidades[$personangem->per_id] as  $hab):?>
							  <div class="ability-card">
								  <div class="ability-name"><?=nl2br($hab->hab_nome)?></div>
								  <div><?= nl2br($hab->hab_descricao)?></div>
							  </div>
						  <?php endforeach;?>
					  <?php endif;?>
				  </div>
			  </div>

			  <!-- Inventory -->
			  <div class="section-block">
				  <h2>INVENTÁRIO</h2>
				  <div class="inventory-grid" id="inventory-grid"><div class="item-slot"></div><div class="item-slot"></div><div class="item-slot"></div><div class="item-slot"></div><div class="item-slot"></div><div class="item-slot"></div></div>
				  <button class="btn" id="add-item-btn" style="margin-top: 1rem;">Adicionar Item</button>
			  </div>

			  <?php if($observacoes[$personangem->per_id]):?>
				  <div class="section-block">
					  <?php foreach ($observacoes[$personangem->per_id] as  $obs):?>
						  <h2><?=nl2br($obs->obs_titulo)?></h2>
						  <pre><?= nl2br($obs->obs_conteudo)?> </pre>
					  <?php endforeach;?>
				  </div>
			  <?php endif;?>

			  <!-- History -->
			  <div class="section-block">
				  <h2>HISTÓRIA</h2>
				  <pre id="sheet-history"><?=$personangem->per_historia?></pre>
			  </div>
		  </div>
	  <?php endforeach;?>
  </div>


  <!-- Item Modal -->
  <div class="modal" id="item-modal">
	  <div class="modal-content">
		  <div class="modal-header">
			  <h2 class="modal-title">Adicionar Item</h2>
			  <button class="close-modal">×</button>
		  </div>
		  <form id="item-form">
			  <input type="hidden" id="item-character-id">
			  <div class="form-group">
				  <label for="item-name">Nome do Item</label>
				  <input type="text" id="item-name" required="">
			  </div>
			  <div class="form-group">
				  <label for="item-quantity">Quantidade</label>
				  <input type="number" id="item-quantity" min="1" value="1" required="">
			  </div>
			  <div class="form-group">
				  <label for="item-description">Descrição</label>
				  <textarea id="item-description"></textarea>
			  </div>
			  <div class="form-actions">
				  <button type="button" class="btn btn-secondary" id="cancel-item">Cancelar</button>
				  <button type="submit" class="btn">Adicionar</button>
			  </div>
		  </form>
	  </div>
  </div>

  <!-- Ability Modal -->
  <div class="modal" id="ability-modal">
	  <div class="modal-content">
		  <div class="modal-header">
			  <h2 class="modal-title">Adicionar Habilidade</h2>
			  <button class="close-modal">×</button>
		  </div>
		  <form id="ability-form">
			  <input type="hidden" id="ability-character-id">
			  <div class="form-group">
				  <label for="ability-name">Nome da Habilidade</label>
				  <input type="text" id="ability-name" required="">
			  </div>
			  <div class="form-group">
				  <label for="ability-description">Descrição</label>
				  <textarea id="ability-description" required=""></textarea>
			  </div>
			  <div class="form-actions">
				  <button type="button" class="btn btn-secondary" id="cancel-ability">Cancelar</button>
				  <button type="submit" class="btn">Adicionar</button>
			  </div>
		  </form>
	  </div>
  </div>
