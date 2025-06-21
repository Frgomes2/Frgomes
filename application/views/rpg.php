<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Portal RPGomes - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal completo para jogadores de RPG - crie campanhas, personagens e aventuras com seu grupo">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;700&family=MedievalSharp&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/rpg.css">
  </head>
  <body>
    <div class="overlay"></div>
    <?php include 'rpg/includes/header.php'; ?>
    <?php echo $contents; ?>
    <?php include 'rpg/includes/footer.php'; ?>
  </body>
</html>
