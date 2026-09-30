<?php /* Precisa abrir e fechar dessa forma para que ele entenda que é um PHP e não precisa indicar um tipo de variavel*/
$nome = "Amanda"; /* é utilizado o $ para declarar uma variavel  */
$idade = 27;
$altura = 1.58;
$matricula_ativa = true;

if($idade>=18){
  $resultado = "É maior de Idade";
}

else {
$resultado = "É menor de Idade";
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Amanda</title>
    <link rel="stylesheet" href="portfolio.css">
</head>
<body>

    <!--COMENTARIO-->
    <header>
    <div class="logo">
        
        <h2>Amanda <span>Orlathey</span></h2>
    </div>
    <nav>
        <a href="#inicio">Inicio</a>
        <a href="#sobre">Sobre</a>
        <a href="#projetos">Projetos</a>
        <a href="#contato">Contato</a>
        
    </nav>
    </header>

    <!--CONTEUDO PRINCIPAL-->
    <main>
        <!-- SECAO DE INICIO -->
         <section id="inicio" class="inicio">
            <div class="inicio-conteudo">
                <p class="apresentacao"> Olá, eu sou </p>
                <h1> Amanda Orlathey </h1>
                <h2> DESENVOLVEDORA DE SOFTWARE </h2>
                <p class="descricao">
                    DESENVOLVEDORA FULL STACK, FOCADO EM RESOLUÇÔES CIBERNETICAS
                </p>
                <div class="botoes">
                    <a href="#projetos" class="botao">Ver Projetos</a>
                    <a href="#contato" class="botao botao-secundario">Entrar Em Contato</a>
                </div>
            </div>
         </section>

         <!-- SOBRE -->
          <section id="sobre" class="sobre">
            <div class="titulo-secao">
                <p>Conheça Um Pouco</p>
                <h2>Sobre mim</h2>
            </div>
            <div class="sobre-conteudo">
                <div class="sobre-texto">
                    <p>
                        27 anos, Administradora e programadora, apaixonada por jogos, e desenvolver projetos.
                    </p>
                    <p>
                        Obejetivo principal usar IA para viabilizar sistemas, segurança e desenvolvimentos Webs, e desenvolver jogos e ferramentas no qual facilitem o cotidiano.
                    </p>
                </div>
                <div class="habilidades">
                    <div class="habilidade">
                        <h3>HTML</h3>
                        <p>Estruturaçao de paginas web.</p>
                    </div>
                    <div class="habilidade">
                        <h3>CSS</h3>
                        <p>Estilizaçao e criaçao de interface.</p>
                    </div>
                    <!--div class="habilidade">
                        <h3>PHP</h3>
                        <p>Desenvolvimento de aplicaçoes web.</p>
                    </div-->
                </div>
            </div>
          </section>

          <section id="projetos" class="projetos-secao">
            <div class="titulo-secao">
                <p>Alguns trabalhos</p>
                <h2>Meus Projetos</h2>
            </div>
            <div class="projetos">
                <div class="card">
                    <div class="numero-projeto">
                        01
                    </div>
                    <h3>Verificador de idade</h3>
                    <p>
                        Verificar se é maior de idade.
                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                    </div>
                    <a href="idade.php">Ver Projeto</a>
                </div>
                <!-- PROJETO 2 -->
                <div class="projetos">
                <div class="card">
                    <div class="numero-projeto">
                        02
                    </div>
                    <h3>Verificador de idade</h3>
                    <p>
                        Verificar se é maior de idade.
                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                    </div>
                    </div>
                    <a href="idade-get.php">Ver Projeto</a>
                </div>
                <!-- PROJETO 3 -->
                <div class="card">
                    <div class="numero-projeto">
                        03
                    </div>
                    <h3>Sistema de Cadastro</h3>
                    <p>
                        Descriçao do sistema de Cadastro
                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <!--span>PHP</span-->
                    </div>
                    <a href="cadastro.html">Ver Projeto</a>
                </div>
            </div>
        </section>
        <section id="contatos" class="contatos">
            <div class="titulo-secao">
                <p>Vamos conversar</p>
                <h2>Contato</h2>
            </div>
            <div class="contato-links">
                <a href="amanda.orlatei.documentos@gmail.com">Email</a>
                <a href="https://github.com/AmandaOrlathey/AMANDA">GitHub</a>
                <a href="">LinkedIn</a>
            </div>
        </section>
    </main>
    <footer>
        <p>
            DESENVOLVIDO POR <a href="https://Amanda755.devlook.xyz">Eduadro Augusto</a>
        </p>
        <p>
            HTML + CSS
        </p>
    </footer>

</body>
</html>