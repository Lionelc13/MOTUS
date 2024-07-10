<?php
    $myTitle = 'accueil';
    $myDescription='Page d accueil du jeu Motus';
    $myEntete='Bienvenue sur Motus!';
    require "header.php";
?>

        <main class="container mt-5">
            <div class="jumbotron text-center">
                <p class="lead  clafw-bold">Le jeu où deviner les mots est une aventure amusante et stimulante.</p>
                <hr class="my-4">
                <p class="clafw-bold">Prêt à tester vos compétens  ? Cliquez sur un des boutons ci-dessous pour vous inscrire ou vous connecter afin de commencer à jouer.</p>
                <a class="btn btn-primary btn-lg" href="/connexion" role="button">Connection</a>
                <a class="btn btn-primary btn-lg" href="/inscription" role="button">Inscription</a>
            
            </div>
        </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
