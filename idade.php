<?php 
 $nome = "Amanda";
 $idade = 27;

 if ($idade >= 18){
    $resultado = "Maior de Idade ($idade anos) - Acesso Liberado!";
 }

 else {
    $resultado = "menor de Idade ($idade) - Acesso Negado!";
 }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de idade</title>
    <link rel="stylesheet" href="idade.css">
</head>
<body>
<header>
        <nav>
            <a href=" index.php">inicio</a>
            <a href="idade.php">Verificador de idade</a>
        </nav> 
    
</header>
</body>

<main>
    <section class="projetos">
    </h1>Verificador de idade</h1>
    <form>
        <label> name :</label>
        <input type="text">
        <label> idade</label>
        <input type="number">

        <button type="submit"> cadastro</button> 
    </form>
</section>
</main>
</html>
</body>
</html>