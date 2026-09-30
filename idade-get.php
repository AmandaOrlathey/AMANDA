<?php
$nome = $_GET["nome"];
$idade = $_GET["idade"];
$resultado = "";

if ($idade >= 18) {
    $resultado = "Maior de Idade ($idade anos) - Acesso Liberado!";
} else {
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
        <div class="logo">
        
        <h2>Amanda <span>Orlathey</span></h2>
    </div>
    <nav>
        <a href="#inicio">Inicio</a>
        <a href="#sobre">Sobre</a>
        <a href="#projetos">Projetos</a>
        <a href="#contato">Contato</a>
        <a href=" index.php">Cadastro</a>
        <br> <br>
        <a href="idade.php">Verificador de idade</a>
        <br>
        <br>
        </nav>

    </header>

<main>
    <section class="projetos">
        </h1>Cadastro</h1>
        <form method="GET">
            <label> name :</label>
            <input type="text" class="nome" id="nome" name="nome">
            <br>
            <br>
            <label> idade</label >
            <input type="number" class="idade" id="idade" name="idade">

            <button type="submit"> Verificar</button>
        </form>
        <p> <?= $resultado ?></p>
    </section>
</main>

</body>

</html>