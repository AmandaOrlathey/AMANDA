<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    if ($idade >= 18) {
        $mensagem = "{$nome} - Maior de idade ({$idade}) - Acesso Permitido!";
    } else {
        $mensagem = "{$nome} - Menor de idade ({$idade}) - Acesso Negado!";
    }
}
?>

<header class="header">
  <div class="logo">
    Amanda <span>Orlathey</span>
  </div>
  <nav class="nav">
    <a href="#">Início</a>
    <a href="#">Sobre</a>
    <a href="#">Projetos</a>
    <a href="#">Contato</a>
  </nav>
</header>

<main class="container">
  <form class="card-form" method="POST">
    <h2 class="title">Cadastro</h2>
    <a href="#" class="sub-link">Verificador de idade</a>

    <div class="input-group">
      <label for="nome">nome:</label>
      <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>
    </div>

    <div class="input-group inline-group">
      <label for="idade">idade:</label>
      <div class="input-button-wrapper">
        <input type="number" name="idade" id="idade" placeholder="Sua idade" required>
        <button type="submit" class="btn-primary">Verificador</button>
      </div>
    </div>

    <p class="status-message"><?php echo $mensagem; ?></p>
  </form>
</main>