<?php

// CAMINHO DO ARQUIVO JSON
$arquivo = __DIR__ . "dados/teste.json";

//1. LER O ARQUIVO JSON
$conteudo = file_get_contents($arquivo);

//2. TRANSFORMAR O JSON EM ARRAY PHP
$alunos = json_decode($conteudo, true);

//3. PERCORRER TODOS OS LUNOS
foreach($alunos as $alunos){

//4. PROURAR O ALUNO COM NOME: "MARIA"
if($aluno["nome"]== "Maria"){

//5. ALTERAR O DADO
$aluno["idade"] = 15;

}

}

//6. TRANSFORMAR ARRAY PHP EM JSON NOVAMENTE
$json = json_encode($alunos, JSON_PRETTY_PRINT| JSON_UNESCAPED_UNICODE);

//7. SALVAR NO ARQUIVO
file_put_contents($arquivo, $json);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>