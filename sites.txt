<?php
require_once 'helpdesk-func.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';

    if ($acao === 'cadastrar') {
        $mensagem = cadastrarChamado(
            $_POST['nome'] ?? '',
            $_POST['setor'] ?? '',
            $_POST['equipamento'] ?? '',
            $_POST['descricao'] ?? '',
            $_POST['prioridade'] ?? ''
        );
    } 
    elseif ($acao === 'atualizar') {
        $mensagem = atualizarStatus($_POST['posicao'] ?? '', $_POST['status'] ?? '');
    } 
    elseif ($acao === 'excluir') {
        $mensagem = excluirChamado($_POST['posicao'] ?? '');
    }
}

$lista = lerChamados();
$relatorio = obterRelatorio();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Help Desk</title>
    <link rel="stylesheet" href="chamados.css">
</head>
<body>

    <header>
        <div class="logo">
            <h2>HelpDesk <span>TI</span></h2>
        </div>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="#sobre">Sobre</a>
            <a href="#projetos">Projetos</a>
            <a href="#contato">Contato</a>
            <a href="#relatorio">Relatório</a>
            
        </nav>
    </header>

    <main>

        <?php if ($mensagem): ?>
            <div class="mensagem"><?= htmlspecialchars($mensagem) ?></div>
        <?php endif; ?>

        <!-- SEÇÃO RELATÓRIO DE ATENDIMENTOS -->
        <section id="relatorio" class="relatorio-secao">
            <div class="titulo-secao">
                <p>Estatísticas do Sistema</p>
                <h2>Relatório de Atendimentos</h2>
            </div>

            <div class="cards-relatorio">
                <div class="card">
                    <h3>TOTAL REGISTRADOS</h3>
                    <p class="numero"><?= $relatorio['total'] ?></p>
                </div>
                <div class="card">
                    <h3>ABERTOS</h3>
                    <p class="numero"><?= $relatorio['abertos'] ?></p>
                </div>
                <div class="card">
                    <h3>EM ANDAMENTO</h3>
                    <p class="numero"><?= $relatorio['andamento'] ?></p>
                </div>
                <div class="card">
                    <h3>RESOLVIDOS</h3>
                    <p class="numero"><?= $relatorio['resolvidos'] ?></p>
                </div>
            </div>
        </section>

        <!-- SEÇÃO ABERTURA DE CHAMADOS (CREATE) -->
        <section id="novo-chamado" class="cadastro-secao">
            <div class="titulo-secao">
                <p>Formulário</p>
                <h2>Abertura de Chamado</h2>
            </div>

            <!-- action="" garante que o formulário envia para a página correta -->
            <form action="" method="POST" class="formulario">
                <input type="hidden" name="acao" value="cadastrar">

                <div class="campo">
                    <label>Nome do Funcionário Solicitante:</label>
                    <input type="text" name="nome" required>
                </div>

                <div class="campo">
                    <label>Setor da Empresa:</label>
                    <select name="setor" required>
                        <option value="Produção">Produção</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Logística">Logística</option>
                        <option value="Financeiro">Financeiro</option>
                        <option value="TI">TI</option>
                    </select>
                </div>

                <div class="campo">
                    <label>Equipamento Afetado:</label>
                    <select name="equipamento" required>
                        <option value="Computador">Computador</option>
                        <option value="Impressora">Impressora</option>
                        <option value="Rede">Rede</option>
                        <option value="Sistema">Sistema</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>

                <div class="campo">
                    <label>Descrição do Problema:</label>
                    <textarea name="descricao" rows="3" required></textarea>
                </div>

                <div class="campo">
                    <label>Prioridade:</label>
                    <select name="prioridade" required>
                        <option value="Baixa">Baixa</option>
                        <option value="Média">Média</option>
                        <option value="Alta">Alta</option>
                    </select>
                </div>

                <button type="submit" class="botao">Registrar Chamado</button>
            </form>
        </section>

        <!-- SEÇÃO CONSULTA DE CHAMADOS (READ, UPDATE, DELETE) -->
        <section id="chamados" class="chamados-secao">
            <div class="titulo-secao">
                <p>Registros Atuais</p>
                <h2>Consulta de Chamados</h2>
            </div>

            <div class="projetos">
                <?php if (empty($lista)): ?>
                    <p>Nenhum chamado registrado no momento.</p>
                <?php else: ?>
                    <?php foreach ($lista as $posicao => $item): ?>
                        <div class="card card-chamado">
                            <div class="numero-projeto">#<?= sprintf('%02d', $posicao + 1) ?></div>
                            <h3><?= htmlspecialchars($item['nome']) ?></h3>
                            <p><strong>Setor:</strong> <?= htmlspecialchars($item['setor']) ?></p>
                            <p><strong>Equipamento:</strong> <?= htmlspecialchars($item['equipamento']) ?></p>
                            <p><strong>Descrição:</strong> <?= htmlspecialchars($item['descricao']) ?></p>

                            <div class="tecnologias">
                                <span>Prioridade: <?= htmlspecialchars($item['prioridade']) ?></span>
                                <span>Status: <?= htmlspecialchars($item['status']) ?></span>
                            </div>

                            <div class="botoes-acao">
                                <!-- Alterar Status (UPDATE) -->
                                <form action="" method="POST" style="display:inline-block;"><!-- Action envia as informações para o mesmo site no qual estou utilizando -->
                                    <input type="hidden" name="acao" value="atualizar">
                                    <input type="hidden" name="posicao" value="<?= $posicao ?>">
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="Aberto" <?= $item['status'] == 'Aberto' ? 'selected' : '' ?>>Aberto</option>
                                        <option value="Em andamento" <?= $item['status'] == 'Em andamento' ? 'selected' : '' ?>>Em andamento</option>
                                        <option value="Resolvido" <?= $item['status'] == 'Resolvido' ? 'selected' : '' ?>>Resolvido</option>
                                    </select>
                                </form>

                                <!-- Excluir (DELETE) -->
                                <form action="" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="acao" value="excluir">
                                    <input type="hidden" name="posicao" value="<?= $posicao ?>">
                                    <button type="submit" class="botao botao-excluir" onclick="return confirm('Deseja excluir este chamado?')">Excluir</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

    </main>

    <footer>
        <p>SISTEMA DE HELPDESK - DESENVOLVIDO EM PHP + JSON</p>
    </footer>

</body>
</html>