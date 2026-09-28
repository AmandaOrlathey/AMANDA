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
</head>
<body>
<header>
        <nav>
            <a href=" index.html">inicio</a>
            <a href="cadastro.html">cadastro</a>
        </nav> 
    
</header>
</body>

<main>
    <section class="cadastro">
    </h1>cadastro</h1>
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