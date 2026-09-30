<?php 
 $nome = $_POST["nome"];
 $idade = $_post ["idade"];
 $resultado = "";

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
            <a href=" index.php">Cadastro</a>
            <br> <br>
            <a href="idade.php">Verificador de idade</a>
            <br> 
            <br>
        </nav> 
    
</header>
</body>

<main>
    <section class="projetos">
    </h1>Cadastro</h1>
    <form method="POST">
        <label> name :</label>
        <input type="text" class="nome" id="nome" name="nome">
        <br> 
        <br>
        <label> idade</label class="idade" id = "idade" idade= "idade" >
        <input type="number">

        <button type="submit"> Verificar</button> 
    </form>
    <p> <?= $resultado ?></p>
</section>
</main>
</html>
</body>
</html>