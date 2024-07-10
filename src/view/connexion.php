<?php
    $myTitle = 'connection';
    $myDescription='Connection des joueurs du jeu Motus';
    $myEntete='Connection';
    require "header.php";
    use Motus\controller\Message;
?>
<body>
    <?php
    if (isset($isOk)) {
        ?>
            <div class="alert alert-success" role="alert"><?= Message::INS_SUCCESS ?></div>
        <?php 
    }
    ?>
    
    <form action="/connexion" method="post">
        <div class="entete mx-auto">
            <h1 class="mt-3 mb-3">Bonjour! Connectez-vous pour jouer à Motus!</h1>
        </div>
        <div class="inscription">
            <div class="champs-form">    
                <label class="label-formulaire" for="email">Email : </label>
                <input type="email" id="s-email" name="email">
            </div>
            <div class="champs-form">
                <label class="label-formulaire" for="password">Mot de passe : </label><input type="password" id="password" name="password">
            </div>
            <div>
                <button  class="btn btn-primary" type="submit" id="envoyer">Envoyer</button>
            </div>
        </div>
    </form>
    <?php
        if (isset($messageErr)) {
            foreach( $messageErr as $err){
            ?>
                <div class="alert alert-danger mt-50"  role="alert"><?= $err ?></div>
            <?php 
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
