<?php
// helpdesk-func.php

$arquivo = 'chamados.json';

// Função para ler o ficheiro JSON
function lerChamados() {
    global $arquivo;
    if (!file_exists($arquivo)) {
        return [];
    }
    $json = file_get_contents($arquivo);
    return json_decode($json, true) ?? [];
}

// Função para salvar no ficheiro JSON
function salvarChamados($dados) {
    global $arquivo;
    $dados = array_values($dados); // Reorganiza os índices do array
    file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT));
}

// CADASTRAR (CREATE)
function cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade) {
    if (empty(trim($nome)) || empty(trim($descricao))) {
        return "Erro: O nome do solicitante e a descrição são obrigatórios!";
    }

    $chamados = lerChamados();

    $novo = [
        'nome' => $nome,
        'setor' => $setor,
        'equipamento' => $equipamento,
        'descricao' => $descricao,
        'prioridade' => $prioridade,
        'status' => 'Aberto'
    ];

    $chamados[] = $novo;
    salvarChamados($chamados);
    return "Chamado cadastrado com sucesso!";
}

// ATUALIZAR STATUS (UPDATE)
function atualizarStatus($posicao, $novoStatus) {
    $chamados = lerChamados();
    if (isset($chamados[$posicao])) {
        $chamados[$posicao]['status'] = $novoStatus;
        salvarChamados($chamados);
        return "Status atualizado!";
    }
    return "Chamado não encontrado.";
}

// EXCLUIR (DELETE)
function excluirChamado($posicao) {
    $chamados = lerChamados();
    if (isset($chamados[$posicao])) {
        unset($chamados[$posicao]);
        salvarChamados($chamados);
        return "Chamado removido!";
    }
    return "Chamado não encontrado.";
}

// RELATÓRIO DE ATENDIMENTOS (READ)
function obterRelatorio() {
    $chamados = lerChamados();
    
    $total = count($chamados);
    $abertos = 0;
    $andamento = 0;
    $resolvidos = 0;

    foreach ($chamados as $c) {
        if ($c['status'] == 'Aberto') $abertos++;
        if ($c['status'] == 'Em andamento') $andamento++;
        if ($c['status'] == 'Resolvido') $resolvidos++;
    }

    return [
        'total' => $total,
        'abertos' => $abertos,
        'andamento' => $andamento,
        'resolvidos' => $resolvidos
    ];
}
