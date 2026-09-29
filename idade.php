<?php 
 $nome = $_POST["nome"];
 $idade = $_post ["idade"];

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
            <a href=" index.php">projetos</a>
            <a href="idade.php">Verificador de idade</a>
        </nav> 
    
</header>
</body>

<main>
    <section class="projetos">
    </h1>Verificador de idade</h1>
    <form method="POST">
        <label> name :</label>
        <input type="text" class="nome" id="nome" name="nome">
        <label> idade</label class="idade" id = "idade" idade= "idade" >
        <input type="number">

        <button type="submit"> cadastro</button> 
    </form>
</section>
</main>
</html>
</body>
</html>