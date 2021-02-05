<?php
    $urlBase = 'https://pokeapi.co/api/v2/pokemon/'; 
    $pokeName = strtolower($_POST['pokeName']);
    $urlFull = $urlBase.$pokeName;
    $Pokemon = json_decode(file_get_contents($urlFull));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./logo.png">
    <title>Pokemon API</title>
</head>
<body>
   <div class="app">
       <div class="app-header">
         <img src="./pokeapi_256.png" alt="pokeapi" class="app-logo"> 
       </div>
       <div class="app-content">
           <form action="index.php" method="post">
               <div class="app-inputField">
                   <input type="text" class="app-input" placeholder="Aegislash" name="pokeName" required>
                   <button type="submit" name="submit">Search</button>
                   
               </div>
           </form>
           <div class="app-output">
               <div class="pokemon">
               <img src="<?= $Pokemon->sprites->front_default ?>" alt="<?= $Pokemon->name ?>" title="Pokemon <?= ucfirst($Pokemon->name) ?>">
                   <div class="pokemon-section">
                       <h1><?= ucfirst($Pokemon->name) ?></h1>
                       <h2>ID <?=($Pokemon->id) ?></h2>
                       <h2>Type: <?php 
                       if (count($Pokemon->types) == 1){
                             echo ucfirst($Pokemon->types[0]->type->name);;
                        }else{
                            echo ucfirst($Pokemon->types[0]->type->name)."/".ucfirst($Pokemon->types[1]->type->name);;
                        }
                       ?></h2>
                       <h3>Weight: <?=$Pokemon->weight?> </h3>
                       <h3>Height: <?=$Pokemon->height?> <h3>
                   </div>
               </div>
           </div>
       </div>
   </div>
</body>
<script src="js.js"></script>
</html>
