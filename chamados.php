<?php
require_once 'helpdesk-func.php';

$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $acao = "";
    if (isset($_POST['acao'])) {
        $acao = $_POST['acao'];
    }

    // Ação de Cadastrar
    if ($acao == 'cadastrar') {
        $nome = $_POST['nome'];
        $setor = $_POST['setor'];
        $equipamento = $_POST['equipamento'];
        $descricao = $_POST['descricao'];
        $prioridade = $_POST['prioridade'];

        $mensagem = cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade);
    } 
    // Ação de Atualizar
    else if ($acao == 'atualizar') {
        $posicao = $_POST['posicao'];
        $status = $_POST['status'];

        $mensagem = atualizarStatus($posicao, $status);
    } 
    // Ação de Excluir
    else if ($acao == 'excluir') {
        $posicao = $_POST['posicao'];

        $mensagem = excluirChamado($posicao);
    }
}

// Carrega os dados atualizados para exibir na página
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

    <!-- CABEÇALHO -->
    <header>
        <div class="logo">
            <h2>HelpDesk <span>TI</span></h2>
        </div>
        <nav>
            <a href="#relatorio">Relatório</a>
            <a href="#novo-chamado">Novo Chamado</a>
            <a href="#chamados">Chamados</a>
        </nav>
    </header>

    <!-- CONTEÚDO PRINCIPAL -->
    <main>

        <?php 
        if ($mensagem != "") {
            echo '<div class="mensagem">' . $mensagem . '</div>';
        }
        ?>

        <!-- RELATÓRIO -->
        <section id="relatorio" class="relatorio-secao">
            <div class="titulo-secao">
                <p>Estatísticas do Sistema</p>
                <h2>Relatório de Atendimentos</h2>
            </div>

            <div class="cards-relatorio">
                <div class="card">
                    <h3>TOTAL REGISTRADOS</h3>
                    <p class="numero"><?php echo $relatorio['total']; ?></p>
                </div>
                <div class="card">
                    <h3>ABERTOS</h3>
                    <p class="numero"><?php echo $relatorio['abertos']; ?></p>
                </div>
                <div class="card">
                    <h3>EM ANDAMENTO</h3>
                    <p class="numero"><?php echo $relatorio['andamento']; ?></p>
                </div>
                <div class="card">
                    <h3>RESOLVIDOS</h3>
                    <p class="numero"><?php echo $relatorio['resolvidos']; ?></p>
                </div>
            </div>
        </section>

        <!-- FORMULÁRIO DE CADASTRO -->
        <section id="novo-chamado" class="cadastro-secao">
            <div class="titulo-secao">
                <p>Formulário</p>
                <h2>Abertura de Chamado</h2>
            </div>

            <!-- O action vazio faz enviar para a própria página index.php -->
            <form action="index.php" method="POST" class="formulario">
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

        <!-- LISTAGEM DOS CHAMADOS -->
        <section id="chamados" class="chamados-secao">
            <div class="titulo-secao">
                <p>Registros Atuais</p>
                <h2>Consulta de Chamados</h2>
            </div>

            <div class="projetos">
                <?php if (empty($lista)) { ?>
                    <p>Nenhum chamado registrado no momento.</p>
                <?php } else { ?>
                    <?php 
                    foreach ($lista as $posicao => $item) { 
                        $numeroExibicao = $posicao + 1;
                    ?>
                        <div class="card card-chamado">
                            <div class="numero-projeto">#<?php echo $numeroExibicao; ?></div>
                            <h3><?php echo $item['nome']; ?></h3>
                            <p><strong>Setor:</strong> <?php echo $item['setor']; ?></p>
                            <p><strong>Equipamento:</strong> <?php echo $item['equipamento']; ?></p>
                            <p><strong>Descrição:</strong> <?php echo $item['descricao']; ?></p>

                            <div class="tecnologias">
                                <span>Prioridade: <?php echo $item['prioridade']; ?></span>
                                <span>Status: <?php echo $item['status']; ?></span>
                            </div>

                            <div class="botoes-acao">
                                <!-- Alterar Status -->
                                <form action="index.php" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="acao" value="atualizar">
                                    <input type="hidden" name="posicao" value="<?php echo $posicao; ?>">
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="Aberto" <?php if($item['status'] == 'Aberto') echo 'selected'; ?>>Aberto</option>
                                        <option value="Em andamento" <?php if($item['status'] == 'Em andamento') echo 'selected'; ?>>Em andamento</option>
                                        <option value="Resolvido" <?php if($item['status'] == 'Resolvido') echo 'selected'; ?>>Resolvido</option>
                                    </select>
                                </form>

                                <!-- Excluir -->
                                <form action="index.php" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="acao" value="excluir">
                                    <input type="hidden" name="posicao" value="<?php echo $posicao; ?>">
                                    <button type="submit" class="botao botao-excluir" onclick="return confirm('Deseja excluir este chamado?')">Excluir</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </section>

    </main>

    <!-- RODAPÉ -->
    <footer>
        <p>SISTEMA DE HELPDESK - DESENVOLVIDO EM PHP + JSON</p>
    </footer>

</body>
</html>