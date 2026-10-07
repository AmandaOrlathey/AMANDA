<?php

// CAMINHO DO ARQUIVO JSON
$arquivo = __DIR__ . "dados/teste.json";

//1. LER O ARQUIVO JSON
$conteudo = file_get_contents($arquivo);

//2. TRANSFORMAR O JSON EM ARRAY PHP
$alunos = json_decode($conteudo, true);

//3. PERCORRER TODOS OS ALUNOS 
// PARA CADA ALUNO DENTRO DE $ALUNOS, GUARDE A POSIÇÃO DELE EM $POSIÇÃO E OS DADOS DELE EM $ALUNO
foreach($alunos as $posicao => $alunos){
    //4. PROURAR O ALUNO COM NOME: "MARIA"
if($aluno["nome"]== "Maria"){

// 5. EXCLUIR O ALUNO
unset($alunos[$posicao]);//remover o "set" é colocar
}
}

//6. REORGANIZAR AS POSOÇOES DO ARRAY
$aluno = array_values($alunos);

//7. TRANSFORMAR ARRAY PHP EM JSON NOVAMENTE
$json = json_encode($alunos, JSON_PRETTY_PRINT| JSON_UNESCAPED_UNICODE);

//8.SALVAR NO ARQUIVO
file_put_contents($arquivo, $json);
echo"ALUNO EXCLUIDO";