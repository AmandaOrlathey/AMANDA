<?php
// helpdesk-func.php

$arquivo = 'chamados.json';

// Função que lê os chamados salvos no arquivo JSON
function lerChamados() {
    global $arquivo;
    
    // Se o arquivo não existir, retorna uma lista vazia
    if (!file_exists($arquivo)) {
        return array();
    }
    
    $conteudo = file_get_contents($arquivo);
    $dados = json_decode($conteudo, true);
    
    if ($dados == null) {
        return array();
    }
    
    return $dados;
}

// Função que salva a lista no arquivo JSON
function salvarChamados($lista) {
    global $arquivo;
    $json = json_encode($lista, JSON_PRETTY_PRINT);
    file_put_contents($arquivo, $json);
}

// Função para Cadastrar um novo chamado
function cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade) {
    // Validação simples de campos obrigatórios
    if ($nome == "" || $descricao == "") {
        return "Preencha o nome e a descrição!";
    }

    $chamados = lerChamados();

    $novoChamado = array(
        'nome' => $nome,
        'setor' => $setor,
        'equipamento' => $equipamento,
        'descricao' => $descricao,
        'prioridade' => $prioridade,
        'status' => 'Aberto'
    );

    // Adiciona o novo chamado no final da lista
    $chamados[] = $novoChamado;
    
    salvarChamados($chamados);
    return "Chamado cadastrado com sucesso!";
}

// Função para Atualizar o Status
function atualizarStatus($posicao, $novoStatus) {
    $chamados = lerChamados();
    
    if (isset($chamados[$posicao])) {
        $chamados[$posicao]['status'] = $novoStatus;
        salvarChamados($chamados);
        return "Status atualizado com sucesso!";
    }
    
    return "Erro ao atualizar status.";
}

// Função para Excluir o chamado
function excluirChamado($posicao) {
    $chamados = lerChamados();
    
    if (isset($chamados[$posicao])) {
        // Remove a posição do array
        array_splice($chamados, $posicao, 1);
        salvarChamados($chamados);
        return "Chamado excluído!";
    }
    
    return "Erro ao excluir chamado.";
}

// Função para montar o relatório
function obterRelatorio() {
    $chamados = lerChamados();
    
    $total = count($chamados);
    $abertos = 0;
    $andamento = 0;
    $resolvidos = 0;

    foreach ($chamados as $item) {
        if ($item['status'] == 'Aberto') {
            $abertos++;
        }
        if ($item['status'] == 'Em andamento') {
            $andamento++;
        }
        if ($item['status'] == 'Resolvido') {
            $resolvidos++;
        }
    }

    return array(
        'total' => $total,
        'abertos' => $abertos,
        'andamento' => $andamento,
        'resolvidos' => $resolvidos
    );
}
?>