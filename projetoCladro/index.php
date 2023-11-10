<?php
require_once './shared/header.php';
?>
<header>
    <a href="index.php"><img src="img/logo.png" class="logo"></a>
    <ul class="menu">
        <li><a href="cadastro.php"><b>Cadastrar</b></a></li>
        <li><a href="login.php"><b>Entrar</b></a></li>
        <li><a href="local.php"><b>Localização</b></a></li>
    </ul>
</header>


<form method="POST" action="controller/loginController.php">
    <div class="info">
        <div class="entrar">
            <h1>Clínica Epitelis</h1>
            <h3>Serviços oferecidos:</h3>
            <p>
                Os serviços são realizados por enfermeiras expecialistas com ampla experiência na sua area de atuação e com mais de 20 anos de atuação em enfermagem.
            </p>
            <p>
                A clínica epitelis oferece os serviços de:
                Prevençãoe tratamento de feridas: feridas crônicas, feridas de perna, pé diabetico, lesões por pressão, queimaduras;
                Podiatria: corte das unhas, controle de onicomicose, cuidados com pés diabéticos, onicocriptose;
                Tratamento estéticos para gerenciamento do envelhecimento: limpeza de pele, microagulhamento, aplicação de Toxina botulínica;
            </p>
            <h3>Atendimento Home care:</h3>
            <p>Caso o paciente não puder se deslocar para ir até a clínica, nós vamos até o domicilio do paciente para realizar todos os procedimentos oferecidos pela clínica.</p>
        </div>
        <div class="entrar">
            <h1>Quem somos nós?</h1>

            <p> Lorem ipsum dolor sit amet. Est consequatur error aut animi incidunt eos minima aliquam in quisquam alias.
                Ea alias quos et distinctio repellendus ab tempore quaerat quo nemo modi. At enim facilis non natus sint qui nisi ipsa qui deserunt enim cum ipsa sunt cum iure cumque qui rerum perspiciatis. Et excepturi cumque eos quibusdam ducimus rem voluptatem impedit qui similique nulla.
                Sit saepe quia vel quasi velit aut laboriosam incidunt ut galisum temporibus sit consequatur distinctio et sint ducimus a aperiam quia. Et quia aperiam ab voluptates eveniet sed error veniam vel omnis quia. Ab dolorum galisum id adipisci suscipit qui expedita corporis nam temporibus sunt ad expedita repellendus quo molestias laudantium rem dignissimos consequatur.

            </p>
        </div>
        <div class="entrar">
            <h1>Como cadastrar-se?</h1>

            <p> Lorem ipsum dolor sit amet. Est consequatur error aut animi incidunt eos minima aliquam in quisquam alias.
                Ea alias quos et distinctio repellendus ab tempore quaerat quo nemo modi. At enim facilis non natus sint qui nisi ipsa qui deserunt enim cum ipsa sunt cum iure cumque qui rerum perspiciatis. Et excepturi cumque eos quibusdam ducimus rem voluptatem impedit qui similique nulla.
            </p>
        </div>
    </div>
</form>
<?php
require_once './shared/footer.php'
?>